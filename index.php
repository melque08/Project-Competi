<?php

  require __DIR__.'/vendor/autoload.php';

  use \App\entity\Empresa;

  $empresas = Empresa::getEmpresas();
  //echo "<pre>"; print_r($empresas); echo "<pre>"; exit;

  include __DIR__.'/includes/header.php';
  include __DIR__.'/includes/listagem.php';
  include __DIR__.'/includes/footer.php';

?>
