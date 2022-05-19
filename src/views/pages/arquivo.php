<?php $render('header'); ?>

<h1>Arquivos</h1>

<a href="<?= $base; ?>/?id=<?= $idsocio; ?>" style="font-size: 40px; padding: 20px;" title="Voltar"><i class="fa-solid fa-arrow-left"></i></a>

<!-- ERRO LINK http://localhost/sistemadap/public/arquivo/10 -->
<h4><?= $socios[0]['titular1'] . '<br>CPF = ' . $socios[0]['cpf1']; ?></h4>
<h4><?= isset($socios[0]['titular2']) && !empty($socios[0]['titular2']) ? $socios[0]['titular2'] . '<br>CPF = ' . $socios[0]['cpf2'] : ''; ?></h4>
<!-- Fim do erro -->

<div style="font-size: 25px; color: red; padding: 5px" class="margin" title="Adicionar DAP">
    <a href="<?= $base; ?>/arquivo/emissao/<?= $socios[0]['id']; ?>"><i class="fa-solid fa-folder-plus"></i></a>
</div>

<?php if (isset($aviso) && !empty($aviso)) : ?>
    <div class="sucess"><?= $aviso; ?></div>
<?php endif ?>

<div>
    <?php if (isset($titulares) && !empty($titulares)) : ?>
        <table>
            <tr>
                <th>Data de Inclusão</th>
                <th>Nomo do Imóvel</th>
                <th>Proprietário</th>
                <th>Representante Legal</th>
                <td></td>
            </tr>

            <?php foreach ($titulares as $value) : ?>

                <tr>
                    <td><?= $value['data_inclusao']; ?></td>
                    <td><?= $value['propriedade']; ?></td>
                    <td><?= $value['proprietario']; ?></td>
                    <td><?= $value['RLegal']; ?></td>              

                    <td><a href="<?= $base; ?>/declaracao/<?= $value['id']; ?>" title="Declarações"><i class="fa-solid fa-file-invoice"></i></a> <!--|
                    <a href="" title="Processo"><i class="fa-solid fa-download"></i></a> |
                    <a href=""><label for="upload" style="margin: 0; padding: 0;"><i class="fa-solid fa-upload"></i></label></a>
                    <input type="file" name="upload" id="upload" style="display: none;">--></td>
                </td>
                </tr>
                <?php endforeach ?>

        </table>
    <?php endif ?>
</div>


</body>

</html>