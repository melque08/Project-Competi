<?php

  require __DIR__.'/vendor/autoload.php';
  use \App\entity\Empresa;

  //Validação ID
  if(!isset($_GET['id']) or !is_numeric($_GET['id'])){
    header('location: index.php?status=error');
    exit;
  }

  //Consulta da Empresa
  $obEmpresa = Empresa::getEmpresa($_GET['id']);

  //Validação da empresa
  if(!$obEmpresa instanceof Empresa){
    header('location: index.php?status=error');
    exit;
  }

  //Validação POST
  if(isset( $_POST['excluido'])){

    $obEmpresa->excluido   = $_POST['excluido'];
    $obEmpresa->excluir();

    header('location: index.php?status=success');
    exit;

  }

  //echo "<pre>"; print_r($_POST); echo "<pre>"; exit;

  include __DIR__.'/includes/header.php';
  include __DIR__.'/includes/confirmarexclusao.php';
  include __DIR__.'/includes/footer.php';

?>
