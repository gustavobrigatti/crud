<?php
    require __DIR__.'/vendor/autoload.php';

    //VALIDAÇÃO DO POST
    if(isset($_POST['nome'], $_POST['cnpj'], $_POST['telefone'], $_POST['email'])){
        die('Cadastrar');
    }

    include __DIR__.'/includes/header.php';
    include __DIR__.'/includes/formulario.php';
    include __DIR__.'/includes/footer.php';
?>