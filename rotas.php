<?php

include('roteador.php');
include('filiais/salajlle.php');
include('filiais/salabh.php');
include('filiais/salactba.php');
include('filiais/salasaoleo.php');
include('filiais/salasaopaulo.php');
include('login_reserva/login.php');
include('cancelar_reserva/login_reserva.php');
include('filiais/calendario.php');
include('cadastro/cadastro_usuario.php');

$roteador = new Roteador();
//salas/cidades
$roteador->nova_rota('/salajlle.php', 'salajlle');
$roteador->nova_rota('/salabh.php', 'salabh');
$roteador->nova_rota('/salactba.php', 'salactba');
$roteador->nova_rota('/salasaoleo.php', 'salasaoleo');
$roteador->nova_rota('/salasaopaulo.php', 'salasaopaulo');

//login/cancelar/calendario/cadastro
$roteador->nova_rota('/login.php', 'login');
$roteador->nova_rota('/login_cancelar.php', 'login_cancelar');
$roteador->nova_rota('/calendario.php', 'calendario');
$roteador->nova_rota('/cadastro_usuario.php', 'cadastro_usuario');


$roteador->rotear();




?>
