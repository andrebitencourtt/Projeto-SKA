<?php
class salabh {
  public function __construct(){
    //echo 'rodou!';
  }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <title>SKA - Belo Horizonte</title>
  <meta charset="utf-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <link rel="stylesheet" type="text/css" href="../css/style.css" />
  <link rel="shortcut icon" href="../img/icon.png">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <script>
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

    if (latitude != -19 && longitude != -43) {
      window.location.href = "http://localhost/reservasSKA/index.php";
    }
  }
  </script>
</head>
<body>
  <header>
    <div id="logo">SKA</div>
    <nav id="nav-menu-paginas">
      <ul id="ul-menu">
        <li><a href="../index.php">Home</a></li>
      </ul>
    </nav>
  </header>
  <script>
  window.onload = getLocation();
  </script>
  <div class="divcentro">
    <h1>SKA - Belo Horizonte:</h1>
    <h1>Salas Disponíveis:</h1>
    <form action="calendario.php" method="POST">
      <input type="hidden" name="id" value="minasgerais_sala01">
      <button type="submit"  class="btn btn-outline-primary">Sala 1</button>
    </form>
    <p></p>
    <form action="calendario.php" method="POST">
      <input type="hidden" name="id" value="minasgerais_sala02">
      <button type="submit"  class="btn btn-outline-primary">Sala 2</button>
    </form>
  </div>
  <img id="img-logoSka" src="../img/ska.png" width=150 height=50>
</body>
</html>
