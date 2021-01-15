<?php

  require '../../vendor/autoload.php';
  use \App\controller\entity\Empresa;

  //Obtem a listagem de empresas atraves do metodo getEmpresas
  $empresas = Empresa::getEmpresas();

  include __DIR__.'/includes/header.php';
  include __DIR__.'/includes/listagem.php';
  include __DIR__.'/includes/footer.php';

?>
