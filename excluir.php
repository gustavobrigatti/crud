<?php
    require __DIR__.'/vendor/autoload.php';

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
    if(isset($_POST['excluir'])){
        $cliente->excluir();
        header('location: index.php?status=success');
        exit;
    }

    include __DIR__.'/includes/header.php';
    include __DIR__.'/includes/confirmar-exclusao.php';
    include __DIR__.'/includes/footer.php';
?>