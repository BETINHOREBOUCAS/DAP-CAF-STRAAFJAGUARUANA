<?php $render('header'); ?>

<div class="container">
    <h1>Propriedade</h1>

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
                    <input required type="text" autocomplete="random-string" name="cpfP" id="inputCPF2" placeholder="___.___.___-___" maxlength="14" value="<?= isset($propriedade) && !empty($propriedade) ? $propriedade[0]['cpfP'] : ''; ?>">
                </div>

                <div class="margin">
                    <label for="estado_civil_proprietario">Estado Civil</label>
                    <select name="estado_civil_proprietario" id="estado_civil_proprietario" required>Estado Civil
                        <option value=""></option>
                        <option <?= isset($propriedade[0]['estado_civil_proprietario']) && $propriedade[0]['estado_civil_proprietario'] == 'Solteiro(a)' ? 'selected' : '' ?>>Solteiro(a)</option>
                        <option <?= isset($propriedade[0]['estado_civil_proprietario']) && $propriedade[0]['estado_civil_proprietario'] == 'Casado(a)' ? 'selected' : '' ?>>Casado(a)</option>
                        <option <?= isset($propriedade[0]['estado_civil_proprietario']) && $propriedade[0]['estado_civil_proprietario'] == 'Amasiado(a)' ? 'selected' : '' ?>>Amasiado(a)</option>
                        <option <?= isset($propriedade[0]['estado_civil_proprietario']) && $propriedade[0]['estado_civil_proprietario'] == 'Separado(a)' ? 'selected' : '' ?>>Separado(a)</option>
                        <option <?= isset($propriedade[0]['estado_civil_proprietario']) && $propriedade[0]['estado_civil_proprietario'] == 'Divorciado(a)' ? 'selected' : '' ?>>Divorciado(a)</option>
                        <option <?= isset($propriedade[0]['estado_civil_proprietario']) && $propriedade[0]['estado_civil_proprietario'] == 'Viúvo(a)' ? 'selected' : '' ?>>Viúvo(a)</option>
                    </select>
                </div>

            </div>
            <div class="displayFlex">

                <div class="margin">
                    <label for="cep_proprietario">CEP da residência</label><br>
                    <input type="text" name="cep_proprietario" id="inputCEP2" required autocomplete="random-string" maxlength="8" value="<?= isset($propriedade) && !empty($propriedade) ? $propriedade[0]['cep_proprietario'] : ''; ?>">
                </div>

                <div class="margin">
                    <label for="endereco_proprietario">Endereco do Proprietário</label>
                    <input required type="text" autocomplete="random-string" name="endereco_proprietario" id="endereco_proprietario" value="<?= isset($propriedade) && !empty($propriedade) ? $propriedade[0]['endereco_proprietario'] : ''; ?>">
                </div>
                <div class="margin">
                    <label for="bairro_proprietario">Bairro do Proprietário</label>
                    <input required type="text" autocomplete="random-string" name="bairro_proprietario" id="bairro_proprietario" value="<?= isset($propriedade) && !empty($propriedade) ? $propriedade[0]['bairro_proprietario'] : ''; ?>">
                </div>
                <div class="margin">
                    <label for="uf_proprietario">UF de residência</label><br>
                    <input type="text" name="uf_proprietario" id="uf_proprietario" required autocomplete="random-string" value="<?= isset($propriedade) && !empty($propriedade) ? $propriedade[0]['uf_proprietario'] : ''; ?>" readonly>
                </div>

                <div class="margin">
                    <label for="municipio_proprietario">Município de residência</label><br>
                    <input type="text" name="municipio_proprietario" id="municipio_proprietario" required autocomplete="random-string" value="<?= isset($propriedade) && !empty($propriedade) ? $propriedade[0]['municipio_proprietario'] : ''; ?>" readonly>
                </div>
            </div>
        </fieldset>

        <!--<fieldset>
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
                    <input type="text" autocomplete="random-string" name="cpfR" id="inputCPF3" placeholder="___.___.___-___" maxlength="14" value="<?= isset($propriedade) && !empty($propriedade) ? $propriedade[0]['cpfR'] : ''; ?>">
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
        </fieldset>-->

        <div class="ajust-button">
            <div class="button-navigation">
                <a href="<?= $base; ?>/?id=<?= $idsocio; ?>">
                    <div class="divButton button-red">Voltar</div>
                </a>
            </div>

            <div class="button-navigation button-center button-green" style="border-radius: 5px">
                <button>Salvar</button>
            </div>
        </div>
    </form>
</div>

<script src="<?= $base; ?>/assets/js/script2.js"></script>
<script src="<?= $base; ?>/assets/js/api-cep-propriedade.js"></script>
</body>

</html>