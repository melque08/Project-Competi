<script src="./scripts/scriptsFormulario.js"></script>

<main>

  <section>
    <a href="index.php">
      <button class="btn btn-primary">Voltar</button>
    </a>
  </section>

  <h2 class="mt-3 mb-2"><?=TITLE?></h2>

  <form method="post" class="row g-3">
    
    <div class="col-md-4">
      <label class="form-label">CNPJ</label>
      <input type="text" name="maskCnpj" class="form-control" id="maskCnpj"  aria-describedby="inputGroupPrepend2" required
      size="18" maxlength="18" onblur="maskcnpj(this, maskCnpj)" onkeypress="maskcnpj(this, maskCnpj)" value="<?=$obEmpresa->maskCnpj?>">
    </div>

    <div class="col-md-4">
      <label class="form-label">Razão Social</label>
      <input type="text" name="razao" class="form-control" id="razao"
      required size="200" maxlength="200" value="<?=$obEmpresa->razao?>">
    </div>

    <div class="col-md-4">
      <label class="form-label">Nome Fantasia</label>
      <input type="text" name="nome" class="form-control" id="nome" size="200" maxlength="200" value="<?=$obEmpresa->nome?>">
    </div>


    <div class="col-md-3">
      <label class="form-label">Telefone</label>
      <input type="text" name="phone" class="form-control" id="phone" onblur="mask(this, mphone)" onkeypress="mask(this, mphone)"
      required size="15" maxlength="15" value="<?=$obEmpresa->phone?>">
    </div>

    <div class="col-md-3">
      <label class="form-label">CNAE</label>
      <input type="text" name="maskCnae" class="form-control" id="maskCnae" value="<?=$obEmpresa->maskCnae?>"
      onblur="maskcnae(this, maskCnae)" onkeypress="maskcnae(this, maskCnae)" required>
    </div>

    <div class="col-md-12">
      <div class="col-md-3">
        <p><h6>Deseja inserir observações?<h6></p>
        <label class="ml-2">Sim</label>
				<input type="radio" class="form-check-obs ml-2" name="formObs" value="sim" <?=$obEmpresa->formObs =='sim' ? 'checked' : ''?> id="formObs" >
        <label class="ml-2">Não</label>
        <input type="radio" class="form-check-obs" name="formObs" value="nao" id="formObs" <?=$obEmpresa->formObs =='nao' ? 'checked' : ''?>>
      </div>
      
      <div class="form-group" id="campoObservacao">
				<label for="formObservacao">Observação</label>
				<textarea class="form-control" name="formObservacao" id="formObservacao" rows="3" size="1000" maxlength="1000"><?=$obEmpresa->formObservacao?></textarea>
			</div>
    </div>

    <div class="col-md-12 mt-4 mb-2"><h5>Endereço Empresa<h5></div></br>

    <div class="col-md-3">
      <label class="form-label">CEP</label>
      <input type="text" class="form-control" name="cep" id="cep" onkeypress="return event.charCode >= 48 && event.charCode <= 57"
      onblur="pesquisacep(this.value);" required size="10" maxlength="10" value="<?=$obEmpresa->cep?>">
    </div>

    <div class="col-md-3">
      <label class="form-label">Logradouro</label>
      <input type="text" class="form-control" name="rua" id="rua" size="100" maxlength="100" required value="<?=$obEmpresa->rua?>">
    </div>

    <div class="col-md-3">
      <label class="form-label">Complemento</label>
      <input type="text" class="form-control" name="complemento" id="complemento" size="100" maxlength="100" value="<?=$obEmpresa->complemento?>" required>
    </div>

    <div class="col-md-3">
      <label class="form-label">Numero</label>
      <input type="text" class="form-control" name="numero" id="numero" size="6" maxlength="6" onkeypress="return event.charCode >= 48 && event.charCode <= 57" value="<?=$obEmpresa->numero?>">
    </div>

    <div class="col-md-5">
      <label class="form-label">Bairro</label>
      <input type="text" class="form-control" name="bairro" id="bairro" size="50" maxlength="50" value="<?=$obEmpresa->bairro?>" required>
    </div>

    <div class="col-md-3">
      <label class="form-label">Cidade</label>
      <input type="text" class="form-control" name="cidade" id="cidade" size="50" maxlength="50" value="<?=$obEmpresa->cidade?>" required>
    </div>

    <div class="col-md-1">
      <label class="form-label">Estado</label>
      <input type="text" class="form-control" name="uf" id="uf" size="2" maxlength="2" value="<?=$obEmpresa->uf?>" required>
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
          <input type="radio" name="status" value="inativa" <?=$obEmpresa->status =='Inativa' ? 'checked' : ''?>> Inativo
        </label>
      </div>
    </div>

    <div class="col-12 mb-4">
      <button class="btn btn-success" type="submit">Confirmar</button>
    </div>
  </form>

<main>
