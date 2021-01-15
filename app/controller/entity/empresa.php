<?php

  namespace App\controller\entity;
  use \App\model\db\Database;
  use \PDO;

  class Empresa{

    /**
    * Identificador único da vaga
    * @var integer
    */
    public $id;

    /**
    * Nome da empresa
    * @var string
    */
    public $nome;

    /**
    * Razão Social da empresa
    * @var string
    */
    public $razao;

    /**
    * CNPJ da empresa
    * @var integer
    */
    public $maskCnpj;

    /**
    * Telefone da empresa
    * @var integer
    */
    public $phone;

    /**
    * CNAE da empresa
    * @var integer
    */
    public $maskCnae;

    /**
    * Opção de observação da empresa
    * @var boolean
    */
    public $formObs;

    /**
    * Observação escrita da empresa
    * @var string
    */
    public $formObservacao;

    /**
    * CEP da empresa
    * @var integer
    */
    public $cep;

    /**
    * Logradouro da empresa
    * @var string
    */
    public $rua;

    /**
    * complemento da empresa
    * @var string
    */
    public $complemento;

    /**
    * Numero da empresa
    * @var integer
    */
    public $numero;

    /**
    * Bairro da empresa
    * @var string
    */
    public $bairro;

    /**
    * Cidade da empresa
    * @var string
    */
    public $cidade;

    /**
    * Estado da empresa
    * @var integer
    */
    public $uf;

    /**
    * Status da empresa
    * @var string(ativa/inativa)
    */
    public $status;

    /**
    * Excluir empresa
    * @var boolean
    */
    public $excluido;

    /**
    * Método resposavelpor cadastrar no banco
    * @return boolean
    */
    public function cadastrar(){

      // Inserir a empresa no banco
      $obDatabase = new Database('cadastro_empresa');

      // Atribuir o ID a empresa na instancia caso insira os dados com sucesso
      $this->id = $obDatabase->insert([
        'razao'         => $this->razao,
        'nome'          => $this->nome,
        'maskCnpj'      => $this->maskCnpj,
        'phone'         => $this->phone,
        'maskCnae'      => $this->maskCnae,
        'formObs'       => $this->formObs,
        'formObservacao'=> $this->formObservacao,
        'cep'           => $this->cep,
        'rua'           => $this->rua,
        'complemento'   => $this->complemento,
        'numero'        => $this->numero,
        'bairro'        => $this->bairro,
        'cidade'        => $this->cidade,
        'uf'            => $this->uf,
        'status'        => $this->status,
      ]);

      // Retornar Sucesso
      return true;

    }

    /**
    * Método responsável por atualizar a empresa no banco
    * @return boolean
    */
    public function atualizar(){
      return (new Database('cadastro_empresa'))->update('id= '.$this->id, [
        'razao'         => $this->razao,
        'nome'          => $this->nome,
        'maskCnpj'      => $this->maskCnpj,
        'phone'         => $this->phone,
        'maskCnae'      => $this->maskCnae,
        'formObs'       => $this->formObs,
        'formObservacao'=> $this->formObservacao,
        'cep'           => $this->cep,
        'rua'           => $this->rua,
        'complemento'   => $this->complemento,
        'numero'        => $this->numero,
        'bairro'        => $this->bairro,
        'cidade'        => $this->cidade,
        'uf'            => $this->uf,
        'status'        => $this->status,
      ]);
    }

    /**
     * Método responsável por excluir a empresa
     * @return boolean
     */
    public function  excluir(){
      return (new Database('cadastro_empresa'))->update('id= '.$this->id, [
        'excluido' => $this->excluido,
      ]);

    }

    /**
    * Método responsável por obter as empresas dentro do banco de Dados para listagem
    * @param string $where
    * @param string $order
    * @param string $limit
    * @return array
    */
    public static function getEmpresas($where = 'excluido = 0', $order = null, $limit = null){
      return (new Database('cadastro_empresa'))->select($where, $order, $limit)
      //Todo retorno vai ser transformado em array e no segundo param passa o tipo de array de objetos
                                                ->fetchAll(PDO::FETCH_CLASS,self::class);
    }

    /**
    * Método responsável por buscar empresas com base em seu ID para edição
    * @param integer $id
    * @return Empresa
    */
    public static function getEmpresa($id){
      return (new Database('cadastro_empresa'))->select('id = '.$id)
      //retorno do fetch unitario que retorna apenas uma posição e retorno o objeto.
                                               ->fetchObject(self::class);
    }

  }
?>
