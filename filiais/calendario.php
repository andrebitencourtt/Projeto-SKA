<?php
class calendario {
  public function __construct(){
    //echo 'rodou!';
  }
}
?>
<?php

// id da cidade
if (isset($_GET['id'])){
  $cidade = $_GET['id'];
}elseif (isset($_POST['id'])) {
  $cidade = $_POST['id'];
}else {
  header('Location: ../index.php');
}

//verifica se o id que traz na url existe ou nao.
$vetor_cidades = array("joinville_sala01", "curitiba_sala01", "minasgerais_sala01", "minasgerais_sala02", "saoleopoudo_sala01",
"saoleopoudo_sala02", "saoleopoudo_sala03", "saoleopoudo_sala04", "saopaulo_sala01");
if (in_array($cidade, $vetor_cidades)) {

}else {
  header('Location: ../index.php');
}


require '../includes/vendor/autoload.php';
//connect to mongodb
$client = new MongoDB\Client('mongodb://localhost:27017');

// select a database
$db_reservas = $client->db_reservas;

//seleciona a colleciton cidade/sala
$collection = $db_reservas->$cidade;

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <title>SKA - Calendário</title>
  <meta charset="utf-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <link rel="shortcut icon" href="../img/icon.png">
  <link rel="stylesheet" type="text/css" href="../css/style.css" />
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <div class="">
    <!-- mensagens para usuário. -->
    <?php
    if (isset($_GET['reserva'])) {
      echo "<script>alert('Reserva efetuada com sucesso!');</script>";
    }
    if (isset($_GET['cancela_reserva'])) {
      echo "<script>alert('Reserva cancelada!');</script>";
    }
    if (isset($_GET['horario'])) {
      $mensagem = $_GET['horario'];
      if ($mensagem == null) {
        echo "<script>alert('É necessário selecionar um horário!');</script>";
      }else {
        echo "<script>alert('Das $mensagem, não está dísponivel!');</script>";
      }
    }
    if (isset($_GET['horarioAntigo'])) {
      echo "<script>alert('Impossível efetuar reservas em datas antigas!');</script>";
    }
    if (isset($_GET['erro_login'])) {
      echo "<script>alert('Usuário ou senha incorreto, tente novamente!');</script>";
    }
    ?>
  </div>
  <!-- //calendario -->
  <link rel="stylesheet" href="http://code.jquery.com/ui/1.9.0/themes/base/jquery-ui.css" />
  <script src="http://code.jquery.com/jquery-1.8.2.js"></script>
  <script src="http://code.jquery.com/ui/1.9.0/jquery-ui.js"></script>
  <script language="javascript">
  $(function() {
    $( "#calendario" ).datepicker();
  });
</script>
<!-- //calendario -->

<script type="text/javascript">

// função Geolocalização para localizar em qual filial o usuário está acessando.
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
  <script>
  window.onload = getLocation();
  </script>
  <header>
    <div id="logo">SKA</div>
    <nav id="nav-menu-paginas">
      <ul id="ul-menu">
        <li><a href="../index.php">Home</a></li>
      </ul>
    </nav>
  </header>
  <form action="../dados_globais.php" method="POST">
    <div class="divcentroCalendario">
      <div class="card" style="width: 18rem;">
        <div class="card-body">
          <h5 class="card-title">Calendário</h5>
          <p class="card-text">Data:</p>

          <div id="divcalendario">
            <input type="text" id="calendario" name="data" required placeholder="<?=date('d/m/Y')?>" readonly="true" />
          </div>

          <p>
            <p class="card-text">Horário:</p>
            <input type="checkbox" name="checkbox1" value="08:00 ás 09:00"/> 08:00 ás 09:00<br/>
            <input type="checkbox" name="checkbox2" value="09:00 ás 10:00"/> 09:00 ás 10:00<br/>
            <input type="checkbox" name="checkbox3" value="10:00 ás 11:00"/> 10:00 ás 11:00<br/>
            <input type="checkbox" name="checkbox4" value="11:00 ás 12:00"/> 11:00 ás 12:00<br/>
            <input type="checkbox" name="checkbox5" value="12:00 ás 13:00"/> 12:00 ás 13:00<br/><br/>
            <input type="checkbox" name="checkbox6" value="13:00 ás 14:00"/> 13:00 ás 14:00<br/>
            <input type="checkbox" name="checkbox7" value="14:00 ás 15:00"/> 14:00 ás 15:00<br/>
            <input type="checkbox" name="checkbox8" value="15:00 ás 16:00"/> 15:00 ás 16:00<br/>
            <input type="checkbox" name="checkbox9" value="16:00 ás 17:00"/> 16:00 ás 17:00<br/>
            <input type="checkbox" name="checkbox10"value="17:00 ás 18:00"/> 17:00 ás 18:00<br/><br/>
            <input type="hidden" name="id_cidade" value="<?php echo $cidade; ?>"></input>
            <button type="submit" class="btn btn-outline-primary">Reservar</button>
          </div>
        </div>
      </div>
    </form>
    <div class="div_tabela">
      <table class="table">
        <thead class="thead-dark">
          <tr>
            <th scope="col">Data</th>
            <th scope="col">Horário</th>
            <th scope="col">Nome / Email</th>
            <th scope="col"></th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <?php $verifica_reservas = $collection->find();
            foreach ($verifica_reservas as $key => $value) {  ?>
              <form class="" action="../cancelar_reserva/login_cancelar.php" method="post">
                <input type="hidden" name="data" value="<?php echo $value["Data"]; ?>"></input>
                <input type="hidden" name="horario" value="<?php echo $value["Horario"]; ?>"></input>
                <input type="hidden" name="email" value="<?php echo $value["Usuario"]; ?>"></input>
                <input type="hidden" name="cidade" value="<?php echo $cidade; ?>"></input>
                <td><?php echo date('d-m-Y',strtotime($value["Data"]))?></td>
                <td><?php echo $value["Horario"]?></td>
                <td><?php echo $value["Usuario"]?></td>
                <td><button type="submit" class="btn btn-outline-primary">Cancelar</button></td>
              </form>
            </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
    <img id="img-logoSka" src="../img/ska.png" width=150 height=50>
  </body>
  </html>
