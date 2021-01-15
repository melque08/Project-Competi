/*----------------------------- Campo Observação -----------------------------*/

  $( document ).ready(function() {
    
    $("#campoObservacao").hide();
    
    if($("input[name='formObs']:checked").val() == 'sim') {
      $("#campoObservacao").show();
    }
    
    $("body").on("click","input[name='formObs']",function() {
      if($("input[name='formObs']:checked").val() == 'sim') {
        $("#campoObservacao").show();
      }else{
        $("#campoObservacao").hide();
        document.getElementById('formObservacao').value=("");
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

                document.getElementById('cep').value = cep.substring(0,5)
                +"-"
                +cep.substring(5);

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

function maskcnpj(o, f) {
  setTimeout(function() {
    var v = maskCnpj(o.value);
    if (v != o.value) {
      o.value = v;
    }
  }, 1);
}

function maskCnpj(v) {
  var r = v.replace(/\D/g, "");
  r = r.replace(/^(\d{2})(\d{3})?(\d{3})?(\d{4})?(\d{2})?/, "$1.$2.$3/$4-$5");
  return r;
}

$(document).ready(function(){

    $("input[name='maskCnpj']").change(function(){
        var cnpj = this.value;
        
        if (cnpj && cnpj != '') {
            $.post("http://localhost/Teste%20pr%C3%A1tico%20Competi/Project-Competi/buscaCnpj.php", {
                cnpj: cnpj
            }, function(retorno){

            if(retorno.status){
                document.getElementById('razao').value=(retorno.status);
            }else if(retorno.error) {
                document.getElementById('razao').value=(retorno.error);
             } else {
              document.getElementById('razao').value=(retorno.razao_social);
              document.getElementById('nome').value=(retorno.nome_fantasia);
              document.getElementById('phone').value=(retorno.telefone);
              document.getElementById('cep').value=(retorno.cep);
              document.getElementById('rua').value=(retorno.endereco);
              document.getElementById('cidade').value=(retorno.cidade);
              document.getElementById('uf').value=(retorno.estado);
              document.getElementById('bairro').value=(retorno.bairro);
              document.getElementById('complemento').value=(retorno.complemento);
              document.getElementById('numero').value=(retorno.numero);
              var cnae={} = retorno.cnae[0].code;
              document.getElementById('maskCnae').value=(cnae);
            }
          }, 'json');

        }
    });
  });

/*---------------------------- Mascara CNAE ----------------------------------*/

  function maskcnae(o, f) {
    setTimeout(function() {
      var v = maskCnae(o.value);
      if (v != o.value) {
        o.value = v;
      }
    }, 1);
  }
  function maskCnae(v) {
    var r = v.replace(/\D/g, "");
    r = r.replace(/^(\d{2})?(\d{2})?(\d{1})?(\d{2}).*/, "$1.$2-$3-$4");
    return r;
  }