<!DOCTYPE html>
<html lang="pt-br">
<head>
  <title>SKA - Automação</title>
  <meta charset="utf-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <link rel="stylesheet" type="text/css" href="css/style.css" />
  <link rel="shortcut icon" href="img/icon.png">
  
  <!-- função Geolocalização para localizar em qual filial o usuário está acessando. -->
  <script>
  function getLocation(){

    if (navigator.geolocation){
      navigator.geolocation.getCurrentPosition(showPosition);
    }
    else{alert("O seu navegador não suporta Geolocalização, tente em outro navegador.")}
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

    // latitude = -29;
    // longitude = -51;

    if (latitude == -26 && longitude == -48){
      window.location.href = "http://localhost/reservasSKA/filiais/salajlle.php";
    }else if (latitude == -25 && longitude == -49) {
      window.location.href = "http://localhost/reservasSKA/filiais/salactba.php";
    }else if (latitude == -19 && longitude == -43) {
      window.location.href = "http://localhost/reservasSKA/filiais/salabh.php";
    }else if (latitude == -29 && longitude == -51) {
      window.location.href = "http://localhost/reservasSKA/filiais/salasaoleo.php";
    }else if (latitude == -23 && longitude == -46) {
      window.location.href = "http://localhost/reservasSKA/filiais/salasaopaulo.php";
    }
  }
  </script>
</head>
<body>
  <header>
    <div id="logo">SKA</div>
    <nav id="nav-menu-index">
      <ul id="ul-menu">
        <li><a href="index.php">Home</a></li>
        <li><a>-</a></li>
        <li><a onclick="getLocation()">Reservas</a></li>
      </ul>
    </nav>
  </header>
  <main id="principal">
    <h1>Bem Vindo</h1>
    <p id="p-principal">Aqui você pode reservar sua sala de reunião.</p>
  </main>
  <img id="img-logoSka" src="img/ska.png" width=150 height=50>
</body>
</html>
