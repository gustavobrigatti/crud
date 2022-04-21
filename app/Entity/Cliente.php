<?php
    namespace App\Entity;

    use \App\Db\Database;

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
    }
?>