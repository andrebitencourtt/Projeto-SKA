<?php
class login_cancelar {
  public function __construct(){
    //echo 'rodou!';
  }
}
?>
<?php
$data = $_POST['data'];
$horario = $_POST['horario'];
$cidade = $_POST['cidade'];
$usuario = $_POST['email'];
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <title>SKA - Cancelamento</title>
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <link rel="stylesheet" type="text/css" href="../css/style_login.css" />
  <link rel="shortcut icon" href="../img/icon.png">
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>
  <header>
    <div id="logo">SKA - Cancelamento</div>
    <nav id="nav-menu">
      <ul id="ul-menu">
      </ul>
    </nav>
  </header>
  <div class="wrapper fadeInDown">
    <div id="formContent">
      <div class="fadeIn first">
        <h5>Efetuar login para cancelar a reserva!</h5>
      </div>
      <!-- Cancelar Form -->
      <form action="../login_reserva/verifica_login.php" method="POST">
        <input type="email" id="email" class="fadeIn second" name="email_input" value="<?php echo $usuario; ?>" readonly=“true”>
        <input type="password" id="password" class="fadeIn third" name="senha" placeholder="Senha" required>
        <input type="hidden" name="data" value="<?php echo $data; ?>"></input>
        <input type="hidden" name="horario" value="<?php echo $horario; ?>"></input>
        <input type="hidden" name="email" value="<?php echo $usuario; ?>"></input>
        <input type="hidden" name="cidade" value="<?php echo $cidade; ?>"></input>
        <input type="hidden" name="status" value="cancelar"></input>
        <input type="submit" class="fadeIn fourth" value="Confirmar">
      </form>
    </div>
  </div>
  <img id="img-logoSka" src="../img/ska.png" width=150 height=50>
</body>
</html>
