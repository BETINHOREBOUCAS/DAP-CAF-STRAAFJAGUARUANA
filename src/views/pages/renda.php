<?php $render('header'); ?>

<h1>Renda</h1>

<a href="<?= $base; ?>/?id=<?=$idsocio;?>" style="font-size: 40px; padding: 20px;" title="Voltar"><i class="fa-solid fa-arrow-left"></i></a>

<form action="" method="post">
    <div class="displayFlex">
        <div class="margin">
            <label for="categoria">Categoria</label>
            <select name="categoria" id="categoria" required>
                <option></option>
                <option>Milho</option>
                <option>Feijão</option>
                <option>Bovino - Carne</option>
                <option>Bovino - Leite</option>
                <option>Ovos</option>
                <option>Aves</option>
                <option>Aposentadoria Rural</option>
                <option>Aposentadoria Urbana</option>
                <option>Programas Sociais</option>
                <option>Emprego Rural</option>
                <option>Emprego Urbano</option>
            </select>
        </div>
        <div class="margin">
            <label for="valor">Valor R$</label>
            <input type="text" name="valor" id="valor" required>
        </div>
    </div>


    <div><input type="submit" value="Adicionar"></div> <br><br>

    <?php if (isset($renda) && !empty($renda)) : ?>
        <div>
            <table>
                <tr>
                    <th>Data Inclusão</th>
                    <th>Categoria</th>
                    <th>Valor</th>
                    <th style="width: 10%;"></th>
                </tr>
                <?php foreach ($renda as $value) : ?>
                    <tr>
                        <td><?= $value['data_inclusao']; ?></td>
                        <td><?= $value['categoria']; ?></td>
                        <td>R$ <?= number_format($value['valor'], 2, ',', '.'); ?></td>
                        <td><a href="<?=$base;?>/renda/excluir/<?=$value['id'].'/'.$value['id_socio'];?>" style="color: red;" title="Excluir"><i class="fa-solid fa-trash-can"></i></a></td>
                    </tr>
                <?php endforeach ?>

            </table>
            <br><br>
            <table>
                <tr>
                    <th>Renda Rural</th>
                    <th>R$ <?=number_format($valoresCategoria['valRural'], 2, ',', '.');?></th>
                </tr>
                <tr>
                    <th>Renda Urbana</th>
                    <th>R$ <?=number_format($valoresCategoria['valUrbano'], 2, ',', '.');?></th>
                </tr>
                <tr>
                    <th>% Rural</th>
                    <th><?=number_format($valoresCategoria['porcentagem'], 2, ',', '.');?>%</th>
                </tr>
                
            </table>
        </div>
    <?php endif ?>
</form>


</body>

</html>