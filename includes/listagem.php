<?php
    $resultados = '';
    foreach($clientes as $cliente){
        $resultados .= '<tr>
                            <td class="text-center">'.$cliente->id.'</td>
                            <td>'.$cliente->nome.'</td>
                            <td>'.$cliente->cnpj.'</td>
                            <td>'.$cliente->telefone.'</td>
                            <td>'.$cliente->email.'</td>
                            <td>
                                <a href="editar.php?id='.$cliente->id.'">
                                    <button type="button" class="btn btn-danger">Editar</button>
                                </a>
                                <a href="excluir.php?id='.$cliente->id.'">
                                    <button type="button" class="btn btn-danger"><i class="bi bi-trash"></i></button>
                                </a>
                            </td>
                        </td>';
    }
?>

<main>

    <section class="text-right">
        <a href="cadastrar.php">
            <button class="btn btn-danger border-radius">Novo Cliente</button>
        </a>
    </section>

    <section>
        <table class="table bg-light mt-3" style="border-radius: 0.25rem">
            <thead>
                <tr>
                    <th class="text-center">ID</th>
                    <th>Nome</th>
                    <th>CNPJ</th>
                    <th>Telefone/Celular</th>
                    <th>E-Mail</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?=$resultados?>
            </tbody>
        </table>
    </section>
</main>