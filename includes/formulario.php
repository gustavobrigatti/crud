<main>

    <section>
        <a href="index.php">
            <button class="btn btn-danger border-radius">Voltar</button>
        </a>
    </section>

    <h2 class="mt-3">Cadastrar Cliente</h2>

    <form method="post">
        <div class="form-row">
            <div class="form-group col-6">
                <label>Nome</label>
                <input type="text" class="form-control" name="nome" required></input>
            </div>
            <div class="form-group col-6">
                <label>CNPJ</label>
                <input type="text" class="form-control mask-cnpj" name="cnpj" required></input>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-6">
                <label>Telefone/Celular</label>
                <input type="text" class="form-control mask-tel" name="telefone" required></input>
            </div>
            <div class="form-group col-6">
                <label>E-Mail</label>
                <input type="email" class="form-control" name="email" required></input>
            </div>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-danger border-radius" style="width: 100%">Enviar</button>
        </div>
    </form>

</main>