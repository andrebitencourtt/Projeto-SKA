<?php
class cadastro_usuario {
  public function __construct(){
    //echo 'rodou!';
  }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <title>SKA - Cadastro Usuário</title>
  <meta charset="utf-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <link rel="stylesheet" type="text/css" href="../css/style.css" />
  <link rel="shortcut icon" href="../img/icon.png">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
  <header>
    <div id="logo">SKA - ADM</div>
    <nav id="nav-menu-paginas">
      <ul id="ul-menu">
        <li><a href="../index.php">Home</a></li>
      </ul>
    </nav>
  </header>
  <div class="">
    <?php
    if (isset($_GET['01'])) {
      echo "<script>alert('Usuário cadastrado com sucesso!');</script>";
    }
    if(isset($_GET['02'])){
      echo "<script>alert('Usuário ja existente!');</script>";
    }
    ?>
  </div>
  <div class="divcentro_login">
    <h1>Cadastro:</h1>
    <form action="verifica_cadastro.php" method="POST">
      <div class="form-group">
        <label for="exampleInputEmail1">Email:</label>
        <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" maxlength="20" placeholder="Email" required>
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Senha:</label>
        <input type="password" class="form-control" name="senha" id="exampleInputPassword1" placeholder="Password" required>
      </div>
      <button type="submit" class="btn btn-primary">Cadastrar</button>
    </form>
  </div>
  <img id="img-logoSka" src="../img/ska.png" width=150 height=50>
</body>
</html>
