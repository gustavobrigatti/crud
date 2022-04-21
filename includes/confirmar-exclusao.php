<main>
    <h2 class="mt-3">Excluir Cliente</h2>

    <form method="post">

        <div class="form-group">
            <p>Você deseja realmente excluir o cliente <strong><?=$cliente->nome?></strong>?</p>
        </div>

        <div class="form-row">
            <div class="form-group col-6">
                <a href="index.php">
                    <button type="button" class="btn btn-danger border-radius" style="width: 100%">Cancelar</button>
                </a>
            </div>
            <div class="form-group col-6">
                <button type="submit" name="excluir" class="btn btn-danger border-radius" style="width: 100%">Excluir</button>
            </div>
        </div>
    </form>
</main>