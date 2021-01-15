<?php

  require '../../vendor/autoload.php';
  use \App\controller\entity\Empresa;
  define('TITLE', 'Editar Empresa');
  define('NAME', 'Salvar');

  //Validação ID
  if(!isset($_GET['id']) or !is_numeric($_GET['id'])){
    header('location: index.php?status=error');
    exit;
  }

  //Consulta da Empresa e cria instancia de empresa
  $obEmpresa = Empresa::getEmpresa($_GET['id']);

  //Validação da empresa 
  if(!$obEmpresa instanceof Empresa){
    header('location: index.php?status=error');
    exit;
  }

  //Validação POST
  if(isset( $_POST['razao'], $_POST['nome'], $_POST['maskCnpj'], $_POST['phone'], $_POST['maskCnae'], $_POST['formObs'], $_POST['formObservacao'],
            $_POST['cep'], $_POST['rua'], $_POST['complemento'], $_POST['numero'], $_POST['bairro'], $_POST['cidade'], $_POST['uf'], $_POST['status'],
  )){
    $obEmpresa->razao           = $_POST['razao'];
    $obEmpresa->nome            = $_POST['nome'];
    $obEmpresa->maskCnpj        = $_POST['maskCnpj'];
    $obEmpresa->phone           = $_POST['phone'];
    $obEmpresa->maskCnae        = $_POST['maskCnae'];
    $obEmpresa->formObs         = $_POST['formObs'];
    $obEmpresa->formObservacao  = $_POST['formObservacao'];
    $obEmpresa->cep             = $_POST['cep'];
    $obEmpresa->rua             = $_POST['rua'];
    $obEmpresa->complemento     = $_POST['complemento'];
    $obEmpresa->numero          = $_POST['numero'];
    $obEmpresa->bairro          = $_POST['bairro'];
    $obEmpresa->cidade          = $_POST['cidade'];
    $obEmpresa->uf              = $_POST['uf'];
    $obEmpresa->status          = $_POST['status'];
    $obEmpresa->atualizar();


    header('location: index.php?status=success');
    exit;

  }

  //echo "<pre>"; print_r($_POST); echo "<pre>"; exit;

  include __DIR__.'/includes/header.php';
  include __DIR__.'/includes/formularioedit.php';
  include __DIR__.'/includes/footer.php';

?>
