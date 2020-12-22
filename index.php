<?php

  require __DIR__.'/vendor/autoload.php';

  use \App\entity\Empresa;

  header('Access-Control-Allow-Origin');

  $empresas = Empresa::getEmpresas();

  include __DIR__.'/includes/header.php';
  include __DIR__.'/includes/listagem.php';
  include __DIR__.'/includes/footer.php';

?>
