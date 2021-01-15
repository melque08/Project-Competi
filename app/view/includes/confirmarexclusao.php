<script src="./scripts/scriptsFormulario.js"></script>

<main>
  <h2 class="mt-3 mb-2">Excluir Vaga</h2>

  <form method="post" class="row g-3">

    <div class="col-md-12">
      <p>Você deseja realmente excluir a empresa <strong><?=$obEmpresa->razao?>?</strong></p>
    </div>

    <div class="col-12 mb-4">
      <button class="btn btn-danger" name="excluido" type="submit" value="1">Confirmar</button>
      <a href="index.php" class="btn btn-primary">Cancelar</a>
    </div>
  </form>

<main>
