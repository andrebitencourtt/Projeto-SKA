<?php
$usuario = $_POST['email'];
$senha = $_POST['senha'];
$criptografada = md5($senha);

require '../includes/vendor/autoload.php';
//connect to mongodb
$client = new MongoDB\Client('mongodb://localhost:27017');
// select a database
$db_reservas = $client->db_reservas;
//select a collection
$collection = $db_reservas->login;

$verifica_usuario = $collection->count(['Usuario' => $usuario]);
if ($verifica_usuario == 0) {
  //insert no banco
  $documento = array(
    "Usuario" => "$usuario" ,
    "Senha" => "$criptografada" ,
  );
  $collection->insertOne($documento);
  header('Location: cadastro_usuario.php?01');
}else {
  header('Location: cadastro_usuario.php?02');
}

?>
