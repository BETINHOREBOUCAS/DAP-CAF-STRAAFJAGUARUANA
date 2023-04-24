<?php $render('header'); ?>

<div class="container">
    <h1>Renda</h1>

    <form action="" method="post">
        <div class="displayFlex">
            <div class="margin">
                <label for="categoria">Tipo de Renda</label>
                <select name="categoria" id="categoria" required>
                    <option></option>
                    <option>Milho - Consumo Familiar</option>
                    <option>Feijão - Consumo Familiar</option>
                    <option>Bovino - Carne - Consumo Familiar</option>
                    <option>Bovino - Leite - Consumo Familiar</option>
                    <option>Ovos - Consumo Familiar</option>
                    <option>Aves - Consumo Familiar</option>
                    <option>Milho - Venda</option>
                    <option>Feijão - Venda</option>
                    <option>Bovino - Carne - Venda</option>
                    <option>Bovino - Leite - Venda</option>
                    <option>Ovos - Venda</option>
                    <option>Aves - Venda</option>
                    <option>Aposentadoria Rural</option>
                    <option>Aposentadoria Urbana</option>
                    <option>Bolsa Família</option>
                    <option>BPC - LOAS</option>
                    <option>Emprego Rural</option>
                    <option>Emprego Urbano</option>
                    <option>Caprinhos - Consumo Familiar</option>
                    <option>Caprinho - Carne - Venda</option>
                    <option>Frutas - Consumo Familiar</option>
                    <option>Frutas - Venda</option>
                </select>
            </div>
            <div class="margin">
                <label for="membro">Membro Auferidor da Renda</label>
                <select name="membro" id="membro" required>
                    <option></option>
                    <option>Responsável - UFPA</option>
                    <?php foreach ($membros as $key => $value) : ?>
                        <option><?= $value['nome_membro'] . " - " . $value['parentesco_membro'] ?></option>
                    <?php endforeach ?>

                </select>
            </div>
            <div class="margin">
                <label for="valor">Valor R$</label>
                <input type="text" autocomplete="off" name="valor" id="valor" required>
            </div>
        </div>


        <div class="ajust-button">
            <div class="button-navigation">
                <a href="<?= $base; ?>/caf?id=<?= $idsocio; ?>">
                    <div class="divButton button-red">Voltar</div>
                </a>
            </div>

            <div class="button-navigation button-center button-green" style="border-radius: 5px">
                <button>Salvar</button>
            </div>
        </div>
        <br><br>

        <?php if (isset($renda) && !empty($renda)) : ?>
            <div>
                <table class="centro">
                    <tr>
                        <th>Data Inclusão</th>
                        <th>Tipo de Renda</th>
                        <th>Membro Auferidor da Renda</th>
                        <th>Valor</th>
                        <th style="width: 10%;"></th>
                    </tr>
                    <?php foreach ($renda as $value) : ?>
                        <tr>
                            <td><?= $value['data_inclusao']; ?></td>
                            <td><?= $value['categoria']; ?></td>
                            <td><?= $value['membro']; ?></td>
                            <td>R$ <?= number_format($value['valor'], 2, ',', '.'); ?></td>
                            <td><a href="<?= $base; ?>/renda/excluir/<?= $value['id'] . '/' . $value['id_socio']; ?>" style="color: red;" title="Excluir"><i class="fa-solid fa-trash-can"></i></a></td>
                        </tr>
                    <?php endforeach ?>

                </table>
                <br><br>
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
                        <th>Programas Sociais</th>
                        <th>R$ <?= number_format($valoresCategoria['valProgramasSociais'], 2, ',', '.'); ?></th>
                    </tr>
                    <tr>
                        <th>% Rural</th>
                        <th><?= number_format($valoresCategoria['porcentagem'], 2, ',', '.'); ?>%</th>
                    </tr>

                </table>
            </div>
        <?php endif ?>
    </form>
</div>


</body>

</html>