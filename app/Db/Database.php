<?php
    namespace App\Db;

    use \PDO;

    class Database{
        const HOST = 'localhost';
        const NAME = 'crud';
        const USER = 'root';
        const PASS = '';

        private $table;
        private $connection;

        //Define a tabela e instancia a conexão
        public function __construct($table = null){
            $this->table = $table;
            $this->setConnection();
        }

        //Método responsável por criar uma conexão com o banco de dados
        private function setConnection(){
            try{
                $this->connection = new PDO('mysql:host='.self::HOST.';dbname='.self::NAME, self::USER, self::PASS);
                $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }catch(PDOException $e){
                die('ERROR: '.$e->getMessage());
            }
        }

        //Método responsável por executar queries dentro do banco de dados
        public function execute($query, $params = []){
             try{
                 $statement = $this->connection->prepare($query);
                 $statement->execute($params);
                 return $statement;
            }catch(PDOException $e){
                die('ERROR: '.$e->getMessage());
            }
        }

        //Método responsável por inserir dados no banco
        public function insert($values){
            //Dados da query
            $fields = array_keys($values);
            $binds = array_pad([], count($fields), '?');
            //Query
            $query = 'INSERT INTO '.$this->table.' ('.implode(',', $fields).') VALUES ('.implode(',', $binds).')';
            //Executa o insert
            $this->execute($query, array_values($values));
            //Retorna o ID inserido
            return $this->connection->lastInsertId();
        }

        //Método responsável por executar uma consulta no banco
        public function select($where = null, $order = null, $limit = null, $fields = '*'){
            //Dados da query
            $where = strlen($where) ? 'WHERE '.$where:'';
            $where = strlen($order) ? 'ORDER BY '.$order:'';
            $where = strlen($limit) ? 'LIMIT '.$limit:'';
            //Monta a query
            $query = 'SELECT '.$fields.' FROM '.$this->table.' '.$where.' '.$order.' '.$limit;
            //Executa a query
            return $this->execute($query);
        }
    }
?>