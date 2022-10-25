<?php $render('header'); ?>

<h2>Informações Para Emissão de DAP</h2>

<a href="<?= $base; ?>/arquivo/<?= $idsocio; ?>" style="font-size: 40px; padding: 20px;" title="Voltar"><i class="fa-solid fa-arrow-left"></i></a>

<div>
    <div class="titleTable">Titular 1</div>
    <table class="enquadrar">
        <!-- Dados Titular 1! -->
        <tr>
            <th class="width-25">Titular 1</th>
            <td><?= $titulares[0]['titular1']; ?></td>
        </tr>
        <tr>
            <th class="width-25">CPF</th>
            <td><?= $titulares[0]['cpf1']; ?></td>
        </tr>
        <tr>
            <th class="width-25">RG</th>
            <td><?= $titulares[0]['rg1']; ?></td>
        </tr>
        <tr>
            <th class="width-25">Nascimento</th>
            <td><?= $titulares[0]['dn1']; ?></td>
        </tr>
        <tr>
            <th class="width-25">Mãe</th>
            <td><?= $titulares[0]['mae1']; ?></td>
        </tr>

    </table>

    <?php if (!empty($titulares[0]['titular2'])) : ?>

        <br>

        <div class="titleTable">Titular 2</div>
        <table class="enquadrar">
            <tr>
                <th style="width: 25%;">Nome Completo: </th>
                <td><?= $titulares[0]['titular2']; ?></td>
            </tr>
            <tr>
                <th class="width-25">CPF:</th>
                <td><?= $titulares[0]['cpf2']; ?></td>
            </tr>
            <tr>
                <th class="width-25">RG:</th>
                <td><?= $titulares[0]['rg2']; ?></td>
            </tr>
            <tr>
                <th class="width-25">Nascimento</th>
                <td><?= $titulares[0]['dn2']; ?></td>
            </tr>
            <tr>
                <th class="width-25">Mãe</th>
                <td><?= $titulares[0]['mae2']; ?></td>
            </tr>
        </table>

    <?php endif ?>

    <br>

    <div class="titleTable">Informações Gerais</div>
    <table class="enquadrar">
        <tr>
            <th colspan="2" class="width-25">Estado Civil</th>
            <td colspan="2">Casados</td>
        </tr>
        <tr>
            <th colspan="2" class="width-25">Membros Que Reside na Propriedade</th>
            <td colspan="2"><?= $titulares[0]['Mreside']; ?></td>
        </tr>
        <tr>
            <th colspan="2" class="width-25">Membros que Ajuda na Propriedade</th>
            <td colspan="2"><?= $titulares[0]['Majuda']; ?></td>
        </tr>
    </table>

    <br>

    <div class="titleTable">Endereço</div>
    <table class="enquadrar">
        <!-- Dados Endereço -->
        <tr>
            <th class="width-25">Endereço</th>
            <td><?= $titulares[0]['endereco']; ?></td>
        </tr>

        <tr>
            <th class="width-25">Numero</th>
            <td><?= $titulares[0]['numero']; ?></td>
        </tr>

        <tr>
            <th class="width-25">Bairro</th>
            <td><?= $titulares[0]['bairro']; ?></td>
        </tr>

    </table>

    <br>

    <div class="titleTable">Renda</div>

    <?php if (isset($renda) && !empty($renda)) : ?>
        <div>
            <table class="centro">
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

            <table class="centro">
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

    <br>

    <div class="titleTable">Propriedade</div>
    <?php if (isset($propriedade) && !empty($propriedade)) : ?>
        <table class="enquadrar">
            <!-- Dados Titular 1 -->
            <tr>
                <th colspan="2" class="width-25">Nome da Propriedade</th>
                <td colspan="2"><?= $propriedade[0]['propriedade']; ?></td>
            </tr>
            <tr>
                <th colspan="2" class="width-25">Denominação do Imóvel</th>
                <td colspan="2"><?= $propriedade[0]['denominacao']; ?></td>
            </tr>
            <tr>
                <th colspan="2" class="width-25">Área PLantada</th>
                <td colspan="2"><?= $propriedade[0]['area']; ?>ha</td>
            </tr>
            <tr>
                <th colspan="2" class="width-25">Nome Proprietário</th>
                <td colspan="2"><?= $propriedade[0]['proprietario']; ?></td>
            </tr>
            <tr>
                <th colspan="2" class="width-25">CPF do Proprietário</th>
                <td colspan="2"><?= $propriedade[0]['cpfP']; ?></td>
            </tr>
            <tr>
                <th colspan="2" class="width-25">Nome Representante Legal</th>
                <td colspan="2"><?= $propriedade[0]['RLegal']; ?></td>
            </tr>
            <tr>
                <th colspan="2">CPF do Representante Legal</th>
                <td colspan="2"><?= $propriedade[0]['cpfR']; ?></td>
            </tr>
        </table>
    <?php endif ?>

    <br>

</div>

<div>
    <?php if (isset($renda) && !empty($renda) && isset($propriedade) && !empty($propriedade)) : ?>
        <form method="post">
            <input type="submit" value="Confirmar Informações">
        </form>
    <?php endif ?>
</div>

<div class="assinatura">
    _______________________________________________________ <br>
    Assinatura Declarante
</div>

</body>

</html>