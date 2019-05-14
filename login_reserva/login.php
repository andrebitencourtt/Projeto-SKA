<?php
class login {
  public function __construct(){
    //echo 'rodou!';
  }
}
?>
<?php
if (session_status() !== 2) {
  session_start();
}
require '../includes/vendor/autoload.php';
//connect to mongodb
$client = new MongoDB\Client('mongodb://localhost:27017');
// select a database
$db_reservas = $client->db_reservas;

//verifica a filial (cidade)
$cidade = $_SESSION['id_cidade'];

//recebe a data dos dados_globais e verifica a data escolhida com a atual
$data = $_SESSION['data'];
$data_atual = date('m/d/Y');
if ($data < $data_atual) {
  header('Location: ../filiais/calendario.php?horarioAntigo&id='.$cidade);
}else {

  //coloca todos os horarios em 1 array
  $vetor_horarios = array($_SESSION['horario1'],$_SESSION['horario2'],$_SESSION['horario3'],$_SESSION['horario4'],
  $_SESSION['horario5'],$_SESSION['horario6'],$_SESSION['horario7'],$_SESSION['horario8'],$_SESSION['horario9'],$_SESSION['horario10']);

  foreach ($vetor_horarios as $key) {
    if ($key != null) {
      $horario = $key;
    }
  }

  // seleciona a collection
  $collection = $db_reservas->$cidade;

  //COUNT - se o dia nao tiver nada registrado nessa data, insere dados no banco, ou se horario for null, retorna alert com erro.
  //FIND - verifica se horario vem null, se ja tem um horario reservado no mesmo horario, ambos retornam alert com erro,
  // ou redireciona para o login juntamente com o insert.
  $verifica_dia = $collection->count(['Data' => $data]);
  if ($verifica_dia == 0) {
    if ($horario == null) {
      header('Location: ../filiais/calendario.php?horario='.$horario.'&id='.$cidade);
    }
  }else {
    $verifica_horario = $collection->find(['Data' => $data]);
    foreach ($verifica_horario as $a) {
      if ($horario == null) {
        header('Location: ../filiais/calendario.php?horario='.$horario.'&id='.$cidade);
      }elseif ($a['Horario'] == $horario ) {
        header('Location: ../filiais/calendario.php?horario='.$horario.'&id='.$cidade);
      }
    }
  }
}

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <title>SKA - Login</title>
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <link rel="stylesheet" type="text/css" href="../css/style_login.css" />
  <link rel="shortcut icon" href="../img/icon.png">
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>


  <!-- função Geolocalização para localizar em qual filial o usuário está acessando. -->
  <script type="text/javascript">
  function getLocation(){

    if (navigator.geolocation){
      navigator.geolocation.getCurrentPosition(showPosition);
    }else{alert("O seu navegador não suporta Geolocalização, tente em outro navegador.")}
  }

  function showPosition(position){

    latitude = (position.coords.latitude);
    longitude = (position.coords.longitude);

    var latCurta = latitude.toString();
    var lonCurta = longitude.toString();

    var latString = latCurta.substring(0,3);
    var LonString = lonCurta.substring(0,3);

    latitude = parseInt(latString);
    longitude = parseInt(LonString);

    var cidade = "<?php echo $cidade; ?>";

    if (cidade == "joinville_sala01") {
      if (latitude != -26 && longitude != -48) {
        window.location.href = "http://localhost/reservasSKA/index.php";
      }
    }
    if (cidade == "curitiba_sala01") {
      if (latitude != -25 && longitude != -49) {
        window.location.href = "http://localhost/reservasSKA/index.php";
      }
    }
    if (cidade == "saopaulo_sala01") {
      if (latitude != -23 && longitude != -46) {
        window.location.href = "http://localhost/reservasSKA/index.php";
      }
    }
    if ((cidade == "minasgerais_sala01") || (cidade == "minasgerais_sala02")) {
      if (latitude != -19 && longitude != -43) {
        window.location.href = "http://localhost/reservasSKA/index.php";
      }
    }
    if ((cidade == "saoleopoudo_sala01") || (cidade == "saoleopoudo_sala02") || (cidade == "saoleopoudo_sala03") || (cidade == "saoleopoudo_sala04")) {
      if (latitude != -29 && longitude != -51) {
        window.location.href = "http://localhost/reservasSKA/index.php";
      }
    }
  }
  </script>
</head>
<body>
  <header>
    <div id="logo">SKA - Login</div>
    <nav id="nav-menu">
      <ul id="ul-menu">
      </ul>
    </nav>
  </header>
  <script>
  window.onload = getLocation();
  </script>
  <div class="wrapper fadeInDown">
    <div id="formContent">
      <div class="fadeIn first">
        <h5>Efetuar login para confirmar reserva!</h5>
      </div>
      <!-- Login Form -->
      <form action="verifica_login.php" method="POST">
        <input type="hidden" name="data" value="<?php echo $data; ?>"></input>
        <input type="hidden" name="horario" value="<?php echo $horario; ?>"></input>
        <input type="hidden" name="cidade" value="<?php echo $cidade; ?>"></input>
        <input type="hidden" name="status" value="login"></input>
        <input type="email" id="email" class="fadeIn second" name="email" placeholder="Email" required>
        <input type="password" id="password" class="fadeIn third" name="senha" placeholder="Senha" required>
        <input type="submit" class="fadeIn fourth" value="Confirmar">
      </form>
    </div>
  </div>
  <img id="img-logoSka" src="../img/ska.png" width=150 height=50>
</body>
</html>
