<?php $render('header'); ?>

<h1>Cadastro</h1>

<a href="<?=$base;?>" style="font-size: 40px; padding: 20px;" title="Voltar"><i class="fa-solid fa-arrow-left"></i></a>

<?php if (isset($aviso) && !empty($aviso)) : ?>
    <div class="aviso"><?= $aviso; ?></div>
<?php endif ?>

<form action="" method="post">

    <fieldset>
        <legend>
            <h3>Dados Gerais</h3>
        </legend>
        <div class="displayFlex">
            <div style="width: 100%;">
                <label for="estado_civil">Estado Civil dos Titulares</label>
                <select name="estado_civil" id="estado_civil" required>Estado Civil
                    <option value=""></option>
                    <option>Solteiro(a)</option>
                    <option <?= isset($dados['estado_civil']) && $dados['estado_civil'] == 'Casados' ? 'selected' : '' ?>>Casados</option>
                    <option <?= isset($dados['estado_civil']) && $dados['estado_civil'] == 'Amasiados' ? 'selected' : '' ?>>Amasiados</option>
                    <option>Separado(a)</option>
                    <option>Divorciado(a)</option>
                    <option>Viúvo(a)</option>
                </select>
            </div> <br>

            <div class="margin">
                <label for="tel1">Celular 1</label><br>
                <input type="text" name="tel1" id="tel1" required value="<?= ($dados['tel1']) ?? '' ?>"><br><br>
            </div>

            <div class="margin">
                <label for="tel2">Celular 2</label><br>
                <input type="text" name="tel2" id="tel2" value="<?= ($dados['tel2']) ?? '' ?>"><br><br>
            </div>
        </div>

        <div class="displayFlex">

            <div class="margin">
                <label for="endereco">Endereço</label><br>
                <input type="text" name="endereco" id="endereco" required value="<?= ($dados['endereco']) ?? '' ?>"><br><br>
            </div>

            <div class="margin">
                <label for="numero">Nº</label><br>
                <input type="text" name="numero" id="numero" required value="<?= ($dados['numero']) ?? '' ?>"><br><br>
            </div>

            <div class="margin">
                <label for="bairro">Bairro</label><br>
                <input type="text" name="bairro" id="bairro" required value="<?= ($dados['bairro']) ?? '' ?>"><br><br>
            </div>
        </div>
    </fieldset>


    <fieldset>
        <legend>
            <h3>Titular 1</h3>
        </legend>

        <div class="displayFlex">
            <div class="margin">
                <label for="titular1">Nome Completo</label> <br>
                <input type="text" name="titular1" id="titular1" required value="<?= ($dados['titular1']) ?? '' ?>"> <br><br>
            </div>

            <div class="margin">
                <label for="rg1">RG</label><br>
                <input type="text" name="rg1" id="rg1" required value="<?= ($dados['rg1']) ?? '' ?>"><br><br>
            </div>

            <div class="margin">
                <label for="cpf1">CPF</label><br>
                <input type="text" name="cpf1" id="cpf1" required value="<?= ($dados['cpf1']) ?? '' ?>"><br><br>
            </div>

            <div class="margin">
                <label for="dn1">Data de Nascimento</label><br>
                <input type="date" name="dn1" id="dn1" required value="<?= ($dados['dn1']) ?? '' ?>"><br><br>
            </div>
        </div>

        <div class="displayFlex">

            <div class="margin">
                <label for="mae1">Nome da Mãe</label><br>
                <input type="text" name="mae1" id="mae1" required value="<?= ($dados['mae1']) ?? '' ?>"><br><br>
            </div>

            <div class="margin">
                <label for="escolaridade1">Escolaridade</label><br>
                <select name="escolaridade1" id="escolaridade1">
                    <option value=""></option>
                    <option <?= isset($dados['escolaridade1']) && $dados['escolaridade1'] == 'Analfabeto' ? 'selected' : '' ?>>Analfabeto</option>
                    <option <?= isset($dados['escolaridade1']) && $dados['escolaridade1'] == 'Alfabetizado' ? 'selected' : '' ?>>Alfabetizado</option>
                    <option <?= isset($dados['escolaridade1']) && $dados['escolaridade1'] == 'Fundamental Incompleto' ? 'selected' : '' ?>>Fundamental Incompleto</option>
                    <option <?= isset($dados['escolaridade1']) && $dados['escolaridade1'] == 'Fundamental Completo' ? 'selected' : '' ?>>Fundamental Completo</option>
                    <option <?= isset($dados['escolaridade1']) && $dados['escolaridade1'] == 'Médio Incompleto' ? 'selected' : '' ?>>Médio Incompleto</option>
                    <option <?= isset($dados['escolaridade1']) && $dados['escolaridade1'] == 'Médio Completo' ? 'selected' : '' ?>>Médio Completo</option>
                    <option <?= isset($dados['escolaridade1']) && $dados['escolaridade1'] == 'Superior Incompleto' ? 'selected' : '' ?>>Superior Incompleto</option>
                    <option <?= isset($dados['escolaridade1']) && $dados['escolaridade1'] == 'Superior Completo' ? 'selected' : '' ?>>Superior Completo</option>
                </select><br><br>
            </div>

        </div>

        <div class="margin">
            <label for="sindicato">
                Tem Sindicato? <br>
                <input type="radio" name="sindicato1" id="sim" value="sim" required <?= isset($dados['sindicato1']) && $dados['sindicato1'] == 'sim' ? 'checked' : '' ?>>
                <label for="sim">Sim</label><br>

                <input type="radio" name="sindicato1" id="nao" value="não" required <?= isset($dados['sindicato1']) && $dados['sindicato1'] == 'não' ? 'checked' : '' ?>>
                <label for="nao">Não</label>
            </label> <br><br>
        </div>
    </fieldset>
    <fieldset>
        <legend>
            <h3>Titular 2</h3>
        </legend>
        <div class="displayFlex">
            <div class="margin">
                <label for="titular2">Nome Completo</label> <br>
                <input type="text" name="titular2" id="titular2" value="<?= ($dados['titular2']) ?? '' ?>"> <br><br>
            </div>

            <div class="margin">
                <label for="rg2">RG</label><br>
                <input type="text" name="rg2" id="rg2" value="<?= ($dados['rg2']) ?? '' ?>"><br><br>
            </div>

            <div class="margin">
                <label for="cpf2">CPF</label><br>
                <input type="text" name="cpf2" id="cpf2" value="<?= ($dados['cpf2']) ?? '' ?>"><br><br>
            </div>

            <div class="margin">
                <label for="dn2">Data de Nascimento</label><br>
                <input type="date" name="dn2" id="dn2" value="<?= ($dados['dn2']) ?? '' ?>"><br><br>
            </div>
        </div>

        <div class="displayFlex">

            <div class="margin">
                <label for="mae2">Nome da Mãe</label><br>
                <input type="text" name="mae2" id="mae2" value="<?= ($dados['mae2']) ?? '' ?>"><br><br>
            </div>

            <div class="margin">
                <label for="escolaridade1">Escolaridade</label><br>
                <select name="escolaridade2" id="escolaridade1">
                <option value=""></option>
                    <option <?= isset($dados['escolaridade2']) && $dados['escolaridade2'] == 'Analfabeto' ? 'selected' : '' ?>>Analfabeto</option>
                    <option <?= isset($dados['escolaridade2']) && $dados['escolaridade2'] == 'Alfabetizado' ? 'selected' : '' ?>>Alfabetizado</option>
                    <option <?= isset($dados['escolaridade2']) && $dados['escolaridade2'] == 'Fundamental Incompleto' ? 'selected' : '' ?>>Fundamental Incompleto</option>
                    <option <?= isset($dados['escolaridade2']) && $dados['escolaridade2'] == 'Fundamental Completo' ? 'selected' : '' ?>>Fundamental Completo</option>
                    <option <?= isset($dados['escolaridade2']) && $dados['escolaridade2'] == 'Médio Incompleto' ? 'selected' : '' ?>>Médio Incompleto</option>
                    <option <?= isset($dados['escolaridade2']) && $dados['escolaridade2'] == 'Médio Completo' ? 'selected' : '' ?>>Médio Completo</option>
                    <option <?= isset($dados['escolaridade2']) && $dados['escolaridade2'] == 'Superior Incompleto' ? 'selected' : '' ?>>Superior Incompleto</option>
                    <option <?= isset($dados['escolaridade2']) && $dados['escolaridade2'] == 'Superior Completo' ? 'selected' : '' ?>>Superior Completo</option>
                </select><br><br>
            </div>

        </div>

        <div class="margin">
            <label for="sindicato">
                Tem Sindicato? <br>
                <input type="radio" name="sindicato2" id="sim" value="sim" <?= isset($dados['sindicato2']) && $dados['sindicato2'] == 'sim' ? 'checked' : '' ?>>
                <label for="sim">Sim</label><br>

                <input type="radio" name="sindicato2" id="nao" value="não" <?= isset($dados['sindicato2']) && $dados['sindicato2'] == 'não' ? 'checked' : '' ?>>
                <label for="nao">Não</label>
            </label> <br><br>
        </div>
    </fieldset>
    <input type="submit" value="Salvar">

</form>

<hr>
</div>





</body>

</html>