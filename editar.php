<?php
    require __DIR__.'/vendor/autoload.php';

    define ('TITLE', 'Editar Cliente');

    use \App\Entity\Cliente;

    if(!isset($_GET['id']) or !is_numeric($_GET['id'])){
        header('location: index.php?status=error');
        exit;
    }

    //Consulta Cliente
    $cliente = Cliente::getCliente($_GET['id']);

    //Validação do Cliente
    if(!$cliente instanceof Cliente){
        header('location: index.php?status=error');
        exit;
    }

    //Validação do Cliente
    if(isset($_POST['nome'], $_POST['cnpj'], $_POST['telefone'], $_POST['email'])){
        $cliente->nome = $_POST['nome'];
        $cliente->cnpj = $_POST['cnpj'];
        $cliente->telefone = $_POST['telefone'];
        $cliente->email = $_POST['email'];
        $cliente->atualizar();

        header('location: index.php?status=success');
        exit;
    }

    include __DIR__.'/includes/header.php';
    include __DIR__.'/includes/formulario.php';
    include __DIR__.'/includes/footer.php';
?>