<?php $render('header'); ?>

<h1>Editar Cadastro</h1>

<a href="<?=$base;?>/?id=<?=$socios[0]['id'];?>" style="font-size: 40px; padding: 20px;" title="Voltar"><i class="fa-solid fa-arrow-left"></i></a>

<?php if (isset($aviso) && !empty($aviso)) : ?>
    <?php if ($aviso == 'Todas as informações do titular 2 são obrigatórias quando a opção estado civil for casado!') : ?>
        <div class="aviso"><?= $aviso; ?></div>
    <?php else :?>
        <div class="sucess"><?= $aviso; ?></div>
    <?php endif ?>
<?php endif ?>

<?php if (isset($socios) && !empty($socios)) : ?>
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
                    <option <?= isset($socios[0]['estado_civil']) && $socios[0]['estado_civil'] == 'Solteiro(a)' ? 'selected' : '' ?>>Solteiro(a)</option>
                    <option <?= isset($socios[0]['estado_civil']) && $socios[0]['estado_civil'] == 'Casados' ? 'selected' : '' ?>>Casados</option>
                    <option <?= isset($socios[0]['estado_civil']) && $socios[0]['estado_civil'] == 'Amasiados' ? 'selected' : '' ?>>Amasiados</option>
                    <option <?= isset($socios[0]['estado_civil']) && $socios[0]['estado_civil'] == 'Separado(a)' ? 'selected' : '' ?>>Separado(a)</option>
                    <option <?= isset($socios[0]['estado_civil']) && $socios[0]['estado_civil'] == 'Divorciado(a)' ? 'selected' : '' ?>>Divorciado(a)</option>
                    <option <?= isset($socios[0]['estado_civil']) && $socios[0]['estado_civil'] == 'Viúvo(a)' ? 'selected' : '' ?>>Viúvo(a)</option>
                </select>
            </div> <br>

            <div class="margin">
                <label for="tel1">Celular 1</label><br>
                <input type="text" name="tel1" id="tel1" required value="<?= ($socios[0]['tel1']) ?? '' ?>"><br><br>
            </div>

            <div class="margin">
                <label for="tel2">Celular 2</label><br>
                <input type="text" name="tel2" id="tel2" value="<?= ($socios[0]['tel2']) ?? '' ?>"><br><br>
            </div>
        </div>

        <div class="displayFlex">

            <div class="margin">
                <label for="endereco">Endereço</label><br>
                <input type="text" name="endereco" id="endereco" required value="<?= ($socios[0]['endereco']) ?? '' ?>"><br><br>
            </div>

            <div class="margin">
                <label for="numero">Nº</label><br>
                <input type="text" name="numero" id="numero" required value="<?= ($socios[0]['numero']) ?? '' ?>"><br><br>
            </div>

            <div class="margin">
                <label for="bairro">Bairro</label><br>
                <input type="text" name="bairro" id="bairro" required value="<?= ($socios[0]['bairro']) ?? '' ?>"><br><br>
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
                <input type="text" name="titular1" id="titular1" required value="<?= ($socios[0]['titular1']) ?? '' ?>"> <br><br>
            </div>

            <div class="margin">
                <label for="rg1">RG</label><br>
                <input type="text" name="rg1" id="rg1" required value="<?= ($socios[0]['rg1']) ?? '' ?>"><br><br>
            </div>

            <div class="margin">
                <label for="cpf1">CPF</label><br>
                <input type="text" name="cpf1" id="cpf1" required value="<?= ($socios[0]['cpf1']) ?? '' ?>"><br><br>
            </div>

            <div class="margin">
                <label for="dn1">Data de Nascimento</label><br>
                <input type="date" name="dn1" id="dn1" required value="<?= ($socios[0]['dn1']) ?? '' ?>"><br><br>
            </div>
        </div>

        <div class="displayFlex">

            <div class="margin">
                <label for="mae1">Nome da Mãe</label><br>
                <input type="text" name="mae1" id="mae1" required value="<?= ($socios[0]['mae1']) ?? '' ?>"><br><br>
            </div>

            <div class="margin">
                <label for="escolaridade1">Escolaridade</label><br>
                <select name="escolaridade1" id="escolaridade1">
                    <option value=""></option>
                    <option <?= isset($socios[0]['escolaridade1']) && $socios[0]['escolaridade1'] == 'Analfabeto' ? 'selected' : '' ?>>Analfabeto</option>
                    <option <?= isset($socios[0]['escolaridade1']) && $socios[0]['escolaridade1'] == 'Alfabetizado' ? 'selected' : '' ?>>Alfabetizado</option>
                    <option <?= isset($socios[0]['escolaridade1']) && $socios[0]['escolaridade1'] == 'Fundamental Incompleto' ? 'selected' : '' ?>>Fundamental Incompleto</option>
                    <option <?= isset($socios[0]['escolaridade1']) && $socios[0]['escolaridade1'] == 'Fundamental Completo' ? 'selected' : '' ?>>Fundamental Completo</option>
                    <option <?= isset($socios[0]['escolaridade1']) && $socios[0]['escolaridade1'] == 'Médio Incompleto' ? 'selected' : '' ?>>Médio Incompleto</option>
                    <option <?= isset($socios[0]['escolaridade1']) && $socios[0]['escolaridade1'] == 'Médio Completo' ? 'selected' : '' ?>>Médio Completo</option>
                    <option <?= isset($socios[0]['escolaridade1']) && $socios[0]['escolaridade1'] == 'Superior Incompleto' ? 'selected' : '' ?>>Superior Incompleto</option>
                    <option <?= isset($socios[0]['escolaridade1']) && $socios[0]['escolaridade1'] == 'Superior Completo' ? 'selected' : '' ?>>Superior Completo</option>
                </select><br><br>
            </div>

        </div>

        <div class="margin">
            <label for="sindicato">
                Tem Sindicato? <br>
                <input type="radio" name="sindicato1" id="sim" value="sim" required <?= isset($socios[0]['sindicato1']) && $socios[0]['sindicato1'] == 'sim' ? 'checked' : '' ?>>
                <label for="sim">Sim</label><br>

                <input type="radio" name="sindicato1" id="nao" value="não" required <?= isset($socios[0]['sindicato1']) && $socios[0]['sindicato1'] == 'não' ? 'checked' : '' ?>>
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
                <input type="text" name="titular2" id="titular2" value="<?= ($socios[0]['titular2']) ?? '' ?>"> <br><br>
            </div>

            <div class="margin">
                <label for="rg2">RG</label><br>
                <input type="text" name="rg2" id="rg2" value="<?= ($socios[0]['rg2']) ?? '' ?>"><br><br>
            </div>

            <div class="margin">
                <label for="cpf2">CPF</label><br>
                <input type="text" name="cpf2" id="cpf2" value="<?= ($socios[0]['cpf2']) ?? '' ?>"><br><br>
            </div>

            <div class="margin">
                <label for="dn2">Data de Nascimento</label><br>
                <input type="date" name="dn2" id="dn2" value="<?= ($socios[0]['dn2']) ?? '' ?>"><br><br>
            </div>
        </div>

        <div class="displayFlex">

            <div class="margin">
                <label for="mae2">Nome da Mãe</label><br>
                <input type="text" name="mae2" id="mae2" value="<?= ($socios[0]['mae2']) ?? '' ?>"><br><br>
            </div>

            <div class="margin">
                <label for="escolaridade1">Escolaridade</label><br>
                <select name="escolaridade2" id="escolaridade1">
                <option value=""></option>
                    <option <?= isset($socios[0]['escolaridade2']) && $socios[0]['escolaridade2'] == 'Analfabeto' ? 'selected' : '' ?>>Analfabeto</option>
                    <option <?= isset($socios[0]['escolaridade2']) && $socios[0]['escolaridade2'] == 'Alfabetizado' ? 'selected' : '' ?>>Alfabetizado</option>
                    <option <?= isset($socios[0]['escolaridade2']) && $socios[0]['escolaridade2'] == 'Fundamental Incompleto' ? 'selected' : '' ?>>Fundamental Incompleto</option>
                    <option <?= isset($socios[0]['escolaridade2']) && $socios[0]['escolaridade2'] == 'Fundamental Completo' ? 'selected' : '' ?>>Fundamental Completo</option>
                    <option <?= isset($socios[0]['escolaridade2']) && $socios[0]['escolaridade2'] == 'Médio Incompleto' ? 'selected' : '' ?>>Médio Incompleto</option>
                    <option <?= isset($socios[0]['escolaridade2']) && $socios[0]['escolaridade2'] == 'Médio Completo' ? 'selected' : '' ?>>Médio Completo</option>
                    <option <?= isset($socios[0]['escolaridade2']) && $socios[0]['escolaridade2'] == 'Superior Incompleto' ? 'selected' : '' ?>>Superior Incompleto</option>
                    <option <?= isset($socios[0]['escolaridade2']) && $socios[0]['escolaridade2'] == 'Superior Completo' ? 'selected' : '' ?>>Superior Completo</option>
                </select><br><br>
            </div>

        </div>

        <div class="margin">
            <label for="sindicato">
                Tem Sindicato? <br>
                <input type="radio" name="sindicato2" id="sim" value="sim" <?= isset($socios[0]['sindicato2']) && $socios[0]['sindicato2'] == 'sim' ? 'checked' : '' ?>>
                <label for="sim">Sim</label><br>

                <input type="radio" name="sindicato2" id="nao" value="não" <?= isset($socios[0]['sindicato2']) && $socios[0]['sindicato2'] == 'não' ? 'checked' : '' ?>>
                <label for="nao">Não</label>
            </label> <br><br>
        </div>
    </fieldset>
    <input type="submit" value="Salvar">

</form>
<?php endif ?>
<hr>
</div>





</body>

</html>