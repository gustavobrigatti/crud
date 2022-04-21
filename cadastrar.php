<?php
    require __DIR__.'/vendor/autoload.php';

    define ('TITLE', 'Cadastrar Cliente');

    use \App\Entity\Cliente;

    $cliente = new Cliente;

    //VALIDAÇÃO DO POST
    if(isset($_POST['nome'], $_POST['cnpj'], $_POST['telefone'], $_POST['email'])){
        $cliente->nome = $_POST['nome'];
        $cliente->cnpj = $_POST['cnpj'];
        $cliente->telefone = $_POST['telefone'];
        $cliente->email = $_POST['email'];
        $cliente->cadastrar();

        header('location: index.php?status=success');
        exit;
    }

    include __DIR__.'/includes/header.php';
    include __DIR__.'/includes/formulario.php';
    include __DIR__.'/includes/footer.php';
?>