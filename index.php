<?php

  require __DIR__.'/vendor/autoload.php';
  use \App\controller\entity\Empresa;

  //Obtem a listagem de empresas atraves do metodo getEmpresas
  $empresas = Empresa::getEmpresas();

  include __DIR__.'/app/view/includes/header.php';
  include __DIR__.'/app/view/includes/listagem.php';
  include __DIR__.'/app/view/includes/footer.php';

?>
