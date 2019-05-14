<?php

Class Roteador{

  private $_rotas = array();
  private $_acoes = array();

  public function nova_rota($uri, $acao){
    $this->_rotas[] = trim($uri, '/');
    $this->_acoes[] = $acao;
  }

  public function rotear(){

    if (isset($_GET['uri'])) {
      $uri = $_GET['uri'];
    }

    $chave = array_search($uri, $this->_rotas);
    if ($chave === false) {
      header('Location: ../index.php');

    }
  }
}


?>
