<?php

  $mensagem = '';
  if(isset($_GET['status'])){
    switch($_GET['status']){
      case 'success':
        $mensagem = ' <div class="alert alert-success">Ação executada com sucesso 
                        <button type="button" class="btn-close float-md-right" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>';
      break;
      case 'error':
        $mensagem = ' <div class="alert alert-success">Ação não executada
                       <button type="button" class="btn-close float-md-right" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>';
      break;
    }
  }

  $resultados = '';
  foreach ($empresas as $empresa) {
    $resultados .= '<tr class="'. ($empresa->status == 'Inativa' ? 'Inativa table-danger' : '').'">
                      <td>'.$empresa->id.'</td>
                      <td>'.$empresa->razao.'</td>
                      <td>'.$empresa->maskCnpj.'</td>
                      <td>'.$empresa->status.'</td>
                      <td>
                        <a href="editar.php?id='.$empresa->id.'" class="btn btn-primary">Editar</a>
                        <a href="excluir.php?id='.$empresa->id.'" class="btn btn-danger">Excluir</a>
                      </td>
                    <tr>';
  }

  $resultados = strlen($resultados) ? $resultados : '<tr>
                                                        <td colspan="6" class="text-center">
                                                          Nenhuma vaga encontrada!
                                                        </td>
                                                    </tr>';
?>

<main>

  <?=$mensagem?>

  <section>
    <a href="cadastrar.php" class="btn btn-success">
      Cadastrar Empresa
    </a>
  </section>

  <section>
    <table class="table bg-light mt-3">
      <thead>
        <tr>
          <th class="col-md-1">ID</th>
          <th class="col-md-3">Razão Social</th>
          <th class="col-md-4">CNPJ</th>
          <th class="col-md-2">Status</th>
          <th class="text-center">Ações</th>
        </tr>
      </thead>
      <tbody>
        <?=$resultados?>
      </tbody>
    </table>
  </section>

<main>
