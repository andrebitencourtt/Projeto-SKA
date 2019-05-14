<?php
//dados login/cancela reserva
$data = $_POST['data'];
$horario = $_POST['horario'];
$cidade = $_POST['cidade'];
$usuario = $_POST['email'];
$senha = $_POST['senha'];
$status = $_POST['status'];
//criptografa a senha.
$criptografada = md5($senha);

require '../includes/vendor/autoload.php';
//connect to mongodb
$client = new MongoDB\Client('mongodb://localhost:27017');
//select a database
$db_reservas = $client->db_reservas;

//select a collection
$collection = $db_reservas->login;
//busca usuario e senha do banco, se corresponderem ele efetua a reserva
$verifica_usuario = $collection->count(['Usuario' => $usuario, 'Senha' => $criptografada]);
if ($verifica_usuario == 0) {
  if ($status == "login") {
    header('Location: ../filiais/calendario.php?erro_login&id='.$cidade);
  }
  elseif ($status == "cancelar") {
    header('Location: ../filiais/calendario.php?erro_login&id='.$cidade);
  }
}
// insere os dados no banco.
if ($verifica_usuario == 1 && $status == "login") {

  $collection = $db_reservas->$cidade;

  $documento = array(
    "Data" => "$data" ,
    "Horario" => "$horario" ,
    "Usuario" => "$usuario"
  );
  $collection->insertOne($documento);

  header('Location: ../filiais/calendario.php?id='.$cidade.'&reserva=sucesso');

  // deleta os dados no banco.
}elseif ($verifica_usuario == 1 && $status == "cancelar") {
  $collection = $db_reservas->$cidade;
  $collection->deleteOne(["Usuario" => "$usuario" , "Data" => "$data" ,"Horario" => "$horario"]);

  header('Location: ../filiais/calendario.php?id='.$cidade.'&cancela_reserva=sucesso');
}

?>
