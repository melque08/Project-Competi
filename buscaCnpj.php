<?php

$cnpj = preg_replace('/[^0-9]/', '', $_POST['cnpj']);

$webservice = "https://www.receitaws.com.br/v1/cnpj/" . $cnpj;
$consulta = file_get_contents($webservice);
$retorno = json_decode($consulta, true);

if (empty($retorno)) {
    throw new Exception('Dados não encontrados');
}

if ($retorno["status"] == "OK") {
    
    if ($retorno["situacao"] == "ATIVA") {
        $empresa = new stdClass();
        $empresa->razao_social = $retorno["nome"];
        $empresa->nome_fantasia = $retorno["fantasia"];
        $empresa->cep = str_replace(".", "", str_replace("-", "", $retorno["cep"]));
        $empresa->endereco = $retorno["logradouro"];
        $empresa->numero = $retorno["numero"];
        $empresa->complemento = $retorno["complemento"];
        $empresa->bairro = $retorno["bairro"];
        $empresa->cidade = $retorno["municipio"];
        $empresa->numero = $retorno["numero"];
        $empresa->estado = $retorno["uf"];
        $empresa->telefone = str_replace("(", "", str_replace(")", "", str_replace("-", "", $retorno["telefone"])));
        $empresa->cnae = $retorno["atividade_principal"];
        
        echo json_encode($empresa);
    } else {
        throw new Exception('Dados não encontrados');
    }
} else {
    throw new Exception($retorno["message"]);
}
