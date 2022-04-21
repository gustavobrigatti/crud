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

        //Método responsável por obter os clientes do banco de dados
        public static function getClientes($where = null, $order = null, $limit = null){
            return (new Database('clientes'))->select($where, $order, $limit)->fetchAll(PDO::FETCH_CLASS, self::class);
        }

        //Método responsável por buscar um cliente com base em seu ID
        public static function getCliente($id){
             return (new Database('clientes'))->select('id = '.$id)->fetchObject(self::class);
        }

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

        //Método responsável por atualizar o cliente no banco
        public function atualizar(){
            return (new Database('clientes'))->update('id = '.$this->id, [
                'nome' => $this->nome,
                'cnpj' => $this->cnpj,
                'telefone' => $this->telefone,
                'email' => $this->email,
            ]);
        }

        //Método responsável por excluir o cliente do banco
        public function excluir(){
            return (new Database('clientes'))->delete('id = '.$this->id);
        }
    }
?>