<?php
    namespace App\Entity;

    use \App\Db\Database;
    use \PDO;

    class Cliente{
        public $id;
        public $nome;
        public $cnpj;
        public $telefone;
        public $email;

        //Método responsável por cadastrar um novo cliente no banco
        public function cadastrar(){
            $database = new Database('clientes');
            $this->id = $database->insert([
                'nome' => $this->nome,
                'cnpj' => $this->cnpj,
                'telefone' => $this->telefone,
                'email' => $this->email,
            ]);
            return true;
        }

        //Método responsável por obter os clientes do banco de dados
        public static function getClientes($where = null, $order = null, $limit = null){
            return (new Database('clientes'))->select($where, $order, $limit)->fetchAll(PDO::FETCH_CLASS, self::class);
        }
    }
?>