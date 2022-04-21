<main>

    <section>
        <a href="index.php">
            <button class="btn btn-danger border-radius">Voltar</button>
        </a>
    </section>

    <h2 class="mt-3"><?=TITLE?></h2>

    <form method="post">
        <div class="form-row">
            <div class="form-group col-6">
                <label>Nome</label>
                <input type="text" class="form-control" name="nome" value="<?=$cliente->nome?>" required></input>
            </div>
            <div class="form-group col-6">
                <label>CNPJ</label>
                <input type="text" class="form-control mask-cnpj" name="cnpj" value="<?=$cliente->cnpj?>" required></input>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-6">
                <label>Telefone/Celular</label>
                <input type="text" class="form-control mask-tel" name="telefone" value="<?=$cliente->telefone?>" required></input>
            </div>
            <div class="form-group col-6">
                <label>E-Mail</label>
                <input type="email" class="form-control" name="email" value="<?=$cliente->email?>" required></input>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-6">
                <label>Estado</label>
                <select class="form-control" name="estado" id="estado" data-target="#cidade" disabled required></select>
            </div>
            <div class="form-group col-6">
                <label>Cidade</label>
                <select class="form-control" name="cidade" id="cidade" disabled required>
                    <option value="">Por favor, selecione um estado</option>
                </select>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-8">
                <label>Endereço</label>
                <input type="text" class="form-control" name="endereco" value="<?=$cliente->endereco?>" required></input>
            </div>
            <div class="form-group col-4">
                <label>CEP</label>
                <input type="text" class="form-control mask-cep" name="cep" value="<?=$cliente->cep?>" required></input>
            </div>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-danger border-radius" style="width: 100%">Enviar</button>
        </div>
    </form>

</main>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        loadEstados('#estado');
        $(document).on('change', '#estado', function (e) {
            var target = $(this).data('target');
            if (target) {
                loadCidades(target, $(this).val());
            }
        });
    }, false);

    var estados = [];

        function loadEstados(element) {
            if (estados.length > 0) {
                putEstados(element);
                $(element).removeAttr('disabled');
                $('#estado').trigger('change');
            } else {
                $.ajax({
                    url: 'js/estados.json',
                    method: 'get',
                    dataType: 'json',
                    beforeSend: function () {
                        $(element).html('<option>Carregando...</option>');
                    }
                }).done(function (response) {
                    estados = response.estados;
                    putEstados(element);
                    $(element).removeAttr('disabled');
                    if ('<?php echo $cliente->id ?>' > 0) {
                        $('#estado').trigger('change');
                    }
                });
            }
        }

        function putEstados(element) {

            var label = $(element).data('label');
            label = label ? label : 'Estado';

            var options = '<option selected disabled>Selecione um estado</option>';
            for (var i in estados) {
                var estado = estados[i];
                var estadoSel = '<?php echo $cliente->estado ?>';
                options += '<option value="' + estado.sigla + '"' + (estado.sigla === estadoSel ? ' selected' : '') + '>' + estado.nome + '</option>';
            }

            $(element).html(options);
        }

        function loadCidades(element, estado_sigla) {
            if (estados.length > 0) {
                putCidades(element, estado_sigla);
                $(element).removeAttr('disabled');
            } else {
                $.ajax({
                    url: theme_url + 'js/estados.json',
                    method: 'get',
                    dataType: 'json',
                    beforeSend: function () {
                        $(element).html('<option>Carregando...</option>');
                    }
                }).done(function (response) {
                    estados = response.estados;
                    putCidades(element, estado_sigla);
                    $(element).removeAttr('disabled');
                });
            }
        }

        function putCidades(element, estado_sigla) {
            var label = $(element).data('label');
            label = label ? label : 'Cidade';

            var options = '<option selected disabled>Selecione uma cidade</option>';
            for (var i in estados) {
                var estado = estados[i];
                if (estado.sigla !== estado_sigla)
                    continue;
                for (var j in estado.cidades) {
                    var cidade = estado.cidades[j];
                    var cidadeSel = '<?php echo $cliente->cidade ?>';
                    options += '<option value="' + cidade + '"' + (cidade === cidadeSel ? ' selected' : '') + '>' + cidade + '</option>';
                }
            }
            $(element).html(options);
        }
</script>