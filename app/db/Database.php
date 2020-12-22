<?php

  namespace App\Db;
  use \PDO;
  use \PDOException;

  class Database{

    /**
    * Host de conexão com o banco de dados
    * @var string
    */
    const HOST = '127.0.0.1';

    /**
    * Nome do banco de dados
    * @var string
    */
    const NAME = 'crud_empresa';

    /**
    * Usuário do banco de dados
    * @var string
    */
    const USER = 'root';

    /**
    * Password do banco de dados
    * @var string
    */
    const PASS = 'newpassword';

    /**
    * Nome da tabela a ser manipulada
    * @var string
    */
    private $table;

    /**
    * Instancia de conexão com o banco de dados
    * @var PDO
    */
    private $connection;


    /**
    * Define a tabela e instancia a conexão
    * @param string $table
    */
    public function __construct($table = null){
      $this->table = $table;
      $this->setConnection();
    }

    /**
    * Método responsável por criar a conexão com db
    *
    */
    private function setConnection(){
      try{
        $this->connection = new PDO('mysql:host='.self::HOST.';dbname='.self::NAME,self::USER,self::PASS);
        // toda vez que tiver uma sintaxe errada no db essa exception trava a execução do banco de dados
        $this->connection->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
      }catch(PDOException $e){
        // Não é aconselhavél utilizar em produção pode tratar de uma melhor maneira
        die('ERROR: '.$e->getMessage());
      }

    }

    /**
    * Método responsável por executar queries dentro do banco de dados
    * @param string $query
    * @param array $params
    * @return PDOStatement
    */
    public function execute($query,$params = []){
      try{
        $statement = $this->connection->prepare($query);
        $statement->execute($params);
        return $statement;
      }catch(PDOException $e){
        // Não é aconselhavél utilizar em produção pode tratar de uma melhor maneira
        die('ERROR: '.$e->getMessage());
      }
    }

    /**
    * Método responsável por inserir dados no banco
    * @param array $values [ field => value ]
    * @return integer ID Inserido
    */
    public function insert($values){

      //Dados da Quer
      $fields = array_keys($values);
      $binds = array_pad([], count($fields), '?');

      //Monta a Query
      $query = 'INSERT INTO '.$this->table.'('.implode(',',$fields).') VALUES ('.implode(',',$binds).')';

      //Executa o insert
      $this->execute($query, array_values($values));

      //Retorna o ID inserido
      return $this->connection->lastInsertId();

    }

    /**
    * Método responsável por executar uma consulta no banco
    * @param string $where
    * @param string $order
    * @param string $limit
    * @param string $fields
    * @return PDOStatement
    */
    public function select($where = null, $order = null, $limit = null, $fields = '*'){

      //Dados da query
      $where = strlen($where) ? 'WHERE '.$where : '';
      $order = strlen($order) ? 'ORDER BY '.$order : '';
      $limit = strlen($limit) ? 'LIMIT '.$limit : '';

      //Monta a Query
      $query = 'SELECT '.$fields.' FROM '.$this->table.' '.$where.' '.$order.' '.$limit.' ';

      //Executa a Query
      return $this->execute($query);

    }

    /**
     * Método responsavel por executar atualização no banco de dados
     * @param string $where
     * @param array $values [field => value]
     * @return boolean
     */
    public function update($where, $values){
      
      //Dados da query
      $fields = array_keys($values);

      //Monta a query
      $query = 'UPDATE '.$this->table.' SET '.implode('=?, ', $fields).'=? WHERE '.$where;

      //Executa a query
      $this->execute($query, array_values($values));

      return true;
    }

    /**
     * Método responsável por fazer a exclusão no banco de dados
     * @param string $where
     * @return boolean
     */
    public function delete($where){
      
      //Monta a query
      $query = 'DELETE FROM '.$this->table.' WHERE '.$where;

      //Executa a query
      $this->execute($query);

      //Retorna sucesso
      return true;
    }





  }


?>
