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

            <?php foreach ($titulares as $key => $value) : ?>

                <tr>
                    <td><?= $value['data_inclusao']; ?></td>
                    <td><?= $value['propriedade']; ?></td>
                    <td><?= $value['proprietario']; ?></td>
                    <td><?= $value['RLegal']; ?></td>

                    <td>
                        <label><a href="<?= $base; ?>/declaracao/<?= $value['id']; ?>" title="Declarações" target="_blank"><i class="fa-solid fa-file-invoice"></i></a></label>

                        <?php if ($titulares[$key]['estado_civil'] == "Separado(a)") : ?> |
                            <label>
                                <a href="<?= $base; ?>/declaracao/separacao/<?= $value['id']; ?>" title="Declaração de Separado" style="color: #F44A6C" target="_blank"><i class="fa-solid fa-heart-crack"></i></a>
                            </label>
                        <?php endif ?>

                        | <!-- Fazer funcionar o upload dos documentos -->
                        <label for="documentos" title="Enviar Documentos de Indentificação" style="color: #ff574d;"><i class="fa-solid fa-id-card"></i></label>
                        <input type="file" name="documentos" id="documentos" style="display: none;">
                        |
                        <label for="processo" title="Enviar Processo" style="color: #ff574d;"><i class="fa-solid fa-cloud-arrow-up"></i></label>
                        <input type="file" name="documentos" id="documentos" style="display: none;">

                    </td>
                </tr>
            <?php endforeach ?>

        </table>
    <?php endif ?>
</div>


</body>

</html>