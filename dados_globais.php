<?php
if (session_status() !== 2) {
  session_start();
}
//recebe os dados dos checkboxs da pagina calendario e transforma em variaveis globais.
$_SESSION['data'] = $_POST['data'];
$_SESSION['id_cidade'] = $_POST['id_cidade'];
$_SESSION['horario1'] = $_POST['checkbox1'];
$_SESSION['horario2'] = $_POST['checkbox2'];
$_SESSION['horario3'] = $_POST['checkbox3'];
$_SESSION['horario4'] = $_POST['checkbox4'];
$_SESSION['horario5'] = $_POST['checkbox5'];
$_SESSION['horario6'] = $_POST['checkbox6'];
$_SESSION['horario7'] = $_POST['checkbox7'];
$_SESSION['horario8'] = $_POST['checkbox8'];
$_SESSION['horario9'] = $_POST['checkbox9'];
$_SESSION['horario10'] = $_POST['checkbox10'];

header('Location: login_reserva/login.php');
?>
