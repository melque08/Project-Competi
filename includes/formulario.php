<script src="/scripts/scriptsFormulario.js"></script>

<main>

  <section>
    <a href="index.php">
      <button class="btn btn-primary">Voltar</button>
    </a>
  </section>

  <h2 class="mt-3 mb-2">Cadastrar Empresa</h2>

  <form method="POST" class="row g-3" action="processa.php">
    <div class="col-md-4">
      <label for="validationDefault01" class="form-label">Razão Social</label>
      <input type="text" class="form-control" id="validationDefault01" required size="200" maxlength="200">
    </div>
    <div class="col-md-4">
      <label for="validationDefault02" class="form-label">Nome Fantasia</label>
      <input type="text" class="form-control" id="validationDefault02" required size="200" maxlength="200">
    </div>
    <div class="col-md-4">
      <label for="validationDefaultUsername" class="form-label">
        CNPJ
      </label>
      <input type="text" class="form-control" id="maskCnpj"  aria-describedby="inputGroupPrepend2" required
      onkeypress="return event.charCode >= 48 && event.charCode <= 57" size="18" maxlength="18">
    </div>
    <div class="col-md-3">
      <label for="validationDefault03" class="form-label">Telefone</label>
      <input type="text" name="phone" class="form-control" id="phone" onblur="mask(this, mphone)" onkeypress="mask(this, mphone)" required size="15" maxlength="15">
    </div>
    <div class="col-md-3">
      <label for="validationDefault05" class="form-label">CNAE</label>
      <input type="text" class="form-control" id="maskCnae" onkeypress="return event.charCode >= 48 && event.charCode <= 57"  required>
    </div>
    <div class="col-md-12">
      <div class="col-md-3" required>
        <p><h6>Deseja inserir observações?<h6></p>
        <label class="ml-2">Sim</label>
				<input type="radio" class="form-check-obs ml-2" name="obs" value="sim" id="formCheckObs" >
        <label class="ml-2">Não</label>
        <input type="radio" class="form-check-obs" name="obs" value="nao" id="formCheckObsnao" checked>
      </div>
      <div class="form-group" id="campoObservacao">
				<label for="formObservacao">Observação</label>
				<textarea class="form-control" id="formObservacao" rows="3" size="1000" maxlength="1000"></textarea>
			</div>
    </div>

    <div class="col-md-12 mt-4 mb-2"><h5>Endereço Empresa<h5></div></br>

    <div class="col-md-3">
      <label for="validationDefault05" class="form-label">CEP</label>
      <input type="text" class="form-control" id="cep" onkeypress="return event.charCode >= 48 && event.charCode <= 57"
      onblur="pesquisacep(this.value);" required size="10" maxlength="10">
    </div>
    <div class="col-md-3">
      <label for="validationDefault03" class="form-label">Logradouro</label>
      <input type="text" class="form-control" id="rua" size="100" maxlength="100" required>
    </div>
    <div class="col-md-3">
      <label for="validationDefault03" class="form-label">Complemento</label>
      <input type="text" class="form-control" id="validationDefault05" size="100" maxlength="100" required>
    </div>
    <div class="col-md-3">
      <label for="validationDefault05" class="form-label">Numero</label>
      <input type="text" class="form-control" id="validationDefault05" size="8" maxlength="8" onkeypress="return event.charCode >= 48 && event.charCode <= 57">
    </div>
    <div class="col-md-5">
      <label for="validationDefault03" class="form-label">Bairro</label>
      <input type="text" class="form-control" id="bairro" size="50" maxlength="50" required>
    </div>
    <div class="col-md-3">
      <label for="validationDefault05" class="form-label">Cidade</label>
      <input type="text" class="form-control" id="cidade" size="50" maxlength="50" required>
    </div>
    <div class="col-md-1">
      <label for="validationDefault05" class="form-label">Estado</label>
      <input type="text" class="form-control" id="uf" size="2" maxlength="2" required>
    </div>
    <div class="form-group">
        <label class="col-md-12 mt-4 mb-2"><h5>Status Empresa</h5></label>
      <div class="form-check form-check-inline">
        <label class="form-control">
          <input type="radio" name="status" value="ativa" checked> Ativo
        </label>
      </div>
      <div class="form-check form-check-inline">
        <label class="form-control">
          <input type="radio" name="status" value="inativa"> Inativo
        </label>
      </div>
    </div>

    <div class="col-12 mb-4">
      <button class="btn btn-success" type="submit">Cadastrar</button>
    </div>
  </form>

<main>
