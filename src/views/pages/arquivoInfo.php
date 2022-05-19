<?php $render('header'); ?>

<h2>Informações Para Emissão de DAP</h2>

<a href="<?= $base; ?>/arquivo/<?= $idsocio; ?>" style="font-size: 40px; padding: 20px;" title="Voltar"><i class="fa-solid fa-arrow-left"></i></a>

<!--
<pre>
    <?php
    print_r($viewData);
    ?>
</pre>
-->
<div>
    <div class="titleTable">Titulares</div>
    <table class="enquadrar">
        <!-- Dados Titular 1 -->
        <tr>
            <th colspan="2">Estado Civil</th>
            <td colspan="2"><?= $titulares[0]['estado_civil']; ?></td>
        </tr>
        <tr>
            <th style="width: 25%;">Titula 1</th>
            <td style="width: 25%;"><?= $titulares[0]['titular1']; ?></td>
            <th style="width: 25%;">Titula 2</th>
            <td style="width: 25%;"><?= $titulares[0]['titular2']; ?></td>
        </tr>
        <tr>
            <th>CPF</th>
            <td><?= $titulares[0]['cpf1']; ?></td>
            <th>CPF</th>
            <td><?= $titulares[0]['cpf2']; ?></td>
        </tr>
        <tr>
            <th>RG</th>
            <td><?= $titulares[0]['rg1']; ?></td>
            <th>RG</th>
            <td><?= $titulares[0]['rg2']; ?></td>
        </tr>
        <tr>
            <th>Nascimento</th>
            <td><?= $titulares[0]['dn1']; ?></td>
            <th>Nascimento</th>
            <td><?= $titulares[0]['dn2']; ?></td>
        </tr>

    </table>

    <br>

    <div class="titleTable">Endereço</div>
    <table class="enquadrar">
        <!-- Dados Endereço -->
        <tr>
            <th style="width: 50%;">Endereço</th>
            <td style="width: 50%;"><?= $titulares[0]['endereco']; ?></td>
        </tr>

        <tr>
            <th>Numero</th>
            <td><?= $titulares[0]['numero']; ?></td>
        </tr>

        <tr>
            <th>Bairro</th>
            <td><?= $titulares[0]['bairro']; ?></td>
        </tr>

    </table>

    <br>

    <div class="titleTable">Propriedade</div>
    <?php if (isset($propriedade) && !empty($propriedade)) : ?>
        <table class="enquadrar">
            <!-- Dados Titular 1 -->
            <tr>
                <th colspan="2">Nome da Propriedade</th>
                <td colspan="2"><?= $propriedade[0]['propriedade']; ?></td>

            </tr>
            <tr>
                <th colspan="2">Denominação do Imóvel</th>
                <td colspan="2"><?= $propriedade[0]['denominacao']; ?></td>
            </tr>
            <tr>
                <th colspan="2">Área PLantada</th>
                <td colspan="2"><?= $propriedade[0]['area']; ?>ha</td>
            </tr>
            <tr>
                <th>Nome Proprietário</th>
                <td><?= $propriedade[0]['proprietario']; ?></td>
                <th>CPF</th>
                <td><?= $propriedade[0]['cpfP']; ?></td>
            </tr>
            <tr>
                <th>Nome Representante Legal</th>
                <td><?= $propriedade[0]['RLegal']; ?></td>
                <th>CPF</th>
                <td><?= $propriedade[0]['cpfR']; ?></td>
            </tr>
        </table>
    <?php endif ?>
    <br>

    <div class="titleTable">Renda</div>

    <?php if (isset($renda) && !empty($renda)) : ?>
        <div>
            <table class="enquadrar">
                <tr>
                    <th>Data Inclusão</th>
                    <th>Categoria</th>
                    <th>Valor</th>

                </tr>
                <?php foreach ($renda as $value) : ?>
                    <tr>
                        <td><?= $value['data_inclusao']; ?></td>
                        <td><?= $value['categoria']; ?></td>
                        <td>R$ <?= number_format($value['valor'], 2, ',', '.'); ?></td>

                    </tr>
                <?php endforeach ?>

            </table>

            <br>

            <table class="enquadrar">
                <tr>
                    <th>Renda Rural</th>
                    <th>R$ <?= number_format($valoresCategoria['valRural'], 2, ',', '.'); ?></th>
                </tr>
                <tr>
                    <th>Renda Urbana</th>
                    <th>R$ <?= number_format($valoresCategoria['valUrbano'], 2, ',', '.'); ?></th>
                </tr>
                <tr>
                    <th>% Rural</th>
                    <th><?= number_format($valoresCategoria['porcentagem'], 2, ',', '.'); ?>%</th>
                </tr>

            </table>
        </div>
    <?php endif ?>
</div>

<br>

<div>
    <?php if (isset($renda) && !empty($renda) && isset($propriedade) && !empty($propriedade)) : ?>
        <form method="post">
            <input type="submit" value="Confirmar Informações">
        </form>
    <?php endif ?>
</div>

</body>

</html>