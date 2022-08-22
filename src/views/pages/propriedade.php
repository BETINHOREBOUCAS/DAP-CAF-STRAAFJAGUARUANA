<?php $render('header'); ?>

<h1>Propriedade</h1>


<a href="<?= $base; ?>/?id=<?= $idsocio; ?>" style="font-size: 40px; padding: 20px;" title="Voltar"><i class="fa-solid fa-arrow-left"></i></a>


<?php if (isset($aviso) && !empty($aviso)) : ?>
    <div class="sucess"><?= $aviso; ?></div>
<?php endif ?>

<form action="" method="post">

    <fieldset>
        <legend><strong>
                <h4>Dados do Imóvel</h4>
            </strong></legend>

        <input type="hidden" name="idPropriedade" value="<?= isset($propriedade) && !empty($propriedade) ? $propriedade[0]['id'] : '0'; ?>">
        <div class="displayFlex">
            <div class="margin">
                <label for="registro">Nº ITR / INCRA</label>
                <input required type="text" autocomplete="random-string" name="registro" id="registro" value="<?= isset($propriedade) && !empty($propriedade) ? $propriedade[0]['registro'] : ''; ?>">
            </div>
            <div class="margin">
                <label for="are">Área Total</label>
                <input required type="text" autocomplete="random-string" name="areaTotal" id="areaTotal" maxlength="6" value="<?= isset($propriedade) && !empty($propriedade) ? $propriedade[0]['areaTotal'] : ''; ?>">
            </div>
            <div class="margin">
                <label for="are">Área Plantada</label>
                <input required type="text" autocomplete="random-string" name="area" id="area" maxlength="6" value="<?= isset($propriedade) && !empty($propriedade) ? $propriedade[0]['area'] : ''; ?>">
            </div>
        </div>
        <div class="displayFlex">
            <div class="margin">
                <label for="propriedade">Nome da Propriedade</label>
                <input required type="text" autocomplete="random-string" name="propriedade" id="propriedade" value="<?= isset($propriedade) && !empty($propriedade) ? $propriedade[0]['propriedade'] : ''; ?>">
            </div>
            <div class="margin">
                <label for="denominacao">Denominação do Imovel</label>
                <input required type="text" autocomplete="random-string" name="denominacao" id="denominacao" value="<?= isset($propriedade) && !empty($propriedade) ? $propriedade[0]['denominacao'] : ''; ?>">
            </div>
        </div>
    </fieldset>

    <br>


    <fieldset>
        <legend><strong>
                <h4>Dados do Proprietário</h4>
            </strong></legend>
        <div class="displayFlex">
            <div class="margin">
                <label for="proprietario">Nome do Proprietário</label>
                <input required type="text" autocomplete="random-string" name="proprietario" id="proprietario" value="<?= isset($propriedade) && !empty($propriedade) ? $propriedade[0]['proprietario'] : ''; ?>">
            </div>
            <div class="margin">
                <label for="rgP">RG do Proprietário</label>
                <input type="text" autocomplete="random-string" name="rgP" id="rgP" value="<?= isset($propriedade) && !empty($propriedade) ? $propriedade[0]['rgP'] : ''; ?>">
            </div>
            <div class="margin">
                <label for="cpfP">CPF do Proprietário</label>
                <input required type="text" autocomplete="random-string" name="cpfP" id="cpfP" maxlength="14" value="<?= isset($propriedade) && !empty($propriedade) ? $propriedade[0]['cpfP'] : ''; ?>">
            </div>
            <div class="margin">
                <label for="estado_civil_proprietario">Estado Civil do Proprietário</label>
                <input type="text" autocomplete="random-string" name="estado_civil_proprietario" id="estado_civil_proprietario" value="<?= isset($propriedade) && !empty($propriedade) ? $propriedade[0]['estado_civil_proprietario'] : ''; ?>">
            </div>
        </div>
        <div class="displayFlex">
            <div class="margin">
                <label for="endereco_proprietario">Endereco do Proprietário</label>
                <input required type="text" autocomplete="random-string" name="endereco_proprietario" id="endereco_proprietario" value="<?= isset($propriedade) && !empty($propriedade) ? $propriedade[0]['endereco_proprietario'] : ''; ?>">
            </div>
            <div class="margin">
                <label for="bairro_proprietario">Bairro do Proprietário</label>
                <input required type="text" autocomplete="random-string" name="bairro_proprietario" id="bairro_proprietario" value="<?= isset($propriedade) && !empty($propriedade) ? $propriedade[0]['bairro_proprietario'] : ''; ?>">
            </div>
        </div>
    </fieldset>

    <br>

    <fieldset>
        <legend><strong>
                <h4>Dados do Representante Legal</h4>
            </strong></legend>
        <div class="displayFlex">
            <div class="margin">
                <label for="RLegal">Nome do Representante Legal</label>
                <input type="text" autocomplete="random-string" name="RLegal" id="RLegal" value="<?= isset($propriedade) && !empty($propriedade) ? $propriedade[0]['RLegal'] : ''; ?>">
            </div>
            <div class="margin">
                <label for="rgR">RG do Representante Legal</label>
                <input type="text" autocomplete="random-string" name="rgR" id="rgR" value="<?= isset($propriedade) && !empty($propriedade) ? $propriedade[0]['rgR'] : ''; ?>">
            </div>
            <div class="margin">
                <label for="cpfR">CPF do Representante Legal</label>
                <input type="text" autocomplete="random-string" name="cpfR" id="cpfR" maxlength="14" value="<?= isset($propriedade) && !empty($propriedade) ? $propriedade[0]['cpfR'] : ''; ?>">
            </div>
            <div class="margin">
                <label for="estado_civil_representante">Estado Civil do Representante Legal</label>
                <input type="text" autocomplete="random-string" name="estado_civil_representante" id="estado_civil_representante" value="<?= isset($propriedade) && !empty($propriedade) ? $propriedade[0]['estado_civil_representante'] : ''; ?>">
            </div>
        </div>
        <div class="displayFlex">
            <div class="margin">
                <label for="endereco_RLegal">Endereço do Representante Legal</label>
                <input type="text" autocomplete="random-string" name="endereco_RLegal" id="endereco_RLegal" value="<?= isset($propriedade) && !empty($propriedade) ? $propriedade[0]['endereco_RLegal'] : ''; ?>">
            </div>
            <div class="margin">
                <label for="bairro_RLegal">Bairro do Representante Legal</label>
                <input type="text" autocomplete="random-string" name="bairro_RLegal" id="bairro_RLegal" value="<?= isset($propriedade) && !empty($propriedade) ? $propriedade[0]['bairro_RLegal'] : ''; ?>">
            </div>
        </div>
    </fieldset>

    <br>
    <div><input type="submit" value="Salvar"></div>
</form>

</body>

</html>