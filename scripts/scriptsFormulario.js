<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

<script type="text/javascript">

/*----------------------------- Campo Observação -----------------------------*/

  $( document ).ready(function() {
    $("#campoObservacao").hide();

    $("#formCheckObs").change(function() {
      if(this.checked) {
        $("#campoObservacao").show();
      }
    });
    $("#formCheckObsnao").change(function() {
      if(this.checked) {
        $("#campoObservacao").hide();
      }
    });
  });

/*---------------------------------Busca CEP ---------------------------------*/

    function limpa_formulário_cep() {
            //Limpa valores do formulário de cep.
            document.getElementById('rua').value=("");
            document.getElementById('bairro').value=("");
            document.getElementById('cidade').value=("");
            document.getElementById('uf').value=("");
    }

    function meu_callback(conteudo) {
        if (!("erro" in conteudo)) {
            //Atualiza os campos com os valores.
            document.getElementById('rua').value=(conteudo.logradouro);
            document.getElementById('bairro').value=(conteudo.bairro);
            document.getElementById('cidade').value=(conteudo.localidade);
            document.getElementById('uf').value=(conteudo.uf);
        } //end if.
        else {
            //CEP não Encontrado.
            limpa_formulário_cep();
            alert("CEP não encontrado.");
        }
    }

    function pesquisacep(valor) {

        //Nova variável "cep" somente com dígitos.
        var cep = valor.replace(/\D/g, '');

        //Verifica se campo cep possui valor informado.
        if (cep != "") {

            //Expressão regular para validar o CEP.
            var validacep = /^[0-9]{8}$/;

            //Valida o formato do CEP.
            if(validacep.test(cep)) {

                //Preenche os campos com "..." enquanto consulta webservice.
                document.getElementById('rua').value="...";
                document.getElementById('bairro').value="...";
                document.getElementById('cidade').value="...";
                document.getElementById('uf').value="...";

                //Cria um elemento javascript.
                var script = document.createElement('script');

                //Sincroniza com o callback.
                script.src = '//viacep.com.br/ws/'+ cep + '/json/?callback=meu_callback';

                //Insere script no documento e carrega o conteúdo.
                document.body.appendChild(script);

            } //end if.
            else {
                //cep é inválido.
                limpa_formulário_cep();
                alert("Formato de CEP inválido.");
            }
        } //end if.
        else {
            //cep sem valor, limpa formulário.
            limpa_formulário_cep();
        }
    };

/*--------------------------- Mascara telefone ------------------------------*/

    function mask(o, f) {
      setTimeout(function() {
        var v = mphone(o.value);
        if (v != o.value) {
          o.value = v;
        }
      }, 1);
    }
    function mphone(v) {
      var r = v.replace(/\D/g, "");
      r = r.replace(/^0/, "");
      if (r.length > 10) {
        r = r.replace(/^(\d\d)(\d{5})(\d{4}).*/, "($1) $2-$3");
      } else if (r.length > 5) {
        r = r.replace(/^(\d\d)(\d{4})(\d{0,4}).*/, "($1) $2-$3");
      } else if (r.length > 2) {
        r = r.replace(/^(\d\d)(\d{0,5})/, "($1) $2");
      } else {
        r = r.replace(/^(\d*)/, "($1");
      }
      return r;
    }

/*---------------------------- Mascara CNPJ ---------------------------------*/

    $("#maskCnpj").on("keyup", function(e)
    {
      $(this).val(
          $(this).val()
          .replace(/\D/g, '')
          .replace(/^(\d{2})(\d{3})?(\d{3})?(\d{4})?(\d{2})?/, "$1.$2.$3/$4-$5"));
    });

/*---------------------------- Mascara CNAE ----------------------------------*/

    $("#maskCnae").on("keyup", function(e)
    {
      $(this).val(
          $(this).val()
          .replace(/\D/g, '')
          .replace(/^(\d{2})?(\d{2})?(\d{1})?(\d{2}).*/, "$1.$2-$3-$4"));
    });
/*---------------------------- Mascara CNAE ----------------------------------*/

    $("#cep").on("keyup", function(e)
    {
      $(this).val(
          $(this).val()
          .replace(/\D/g, '')
          .replace(/^(\d{2})?(\d{3})?(\d{3})?/, "$1.$2-$3"));
    });


</script>
