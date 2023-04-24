<?php $render('header'); ?>
<div class="container">
    <h1>Arquivos</h1>

    <h4><?= $socios[0]['nome_socio'] . '<br>CPF = ' . $socios[0]['cpf_socio']; ?></h4>
    <h4><?= isset($socios[0]['titular2']) && !empty($socios[0]['titular2']) ? $socios[0]['titular2'] . '<br>CPF = ' . $socios[0]['cpf2'] : ''; ?></h4>

    <div class="ajust-button">
        <div class="button-navigation">
            <a href="<?= $base; ?>/caf?id=<?= $idsocio; ?>">
                <div class="divButton button-red">Voltar</div>
            </a>
        </div>

        <div class="button-navigation button-center" style="border-radius: 5px">
            <div class="divButton button-blue" id="button-caf">
                <button>Criar CAF</button>
            </div>
        </div>
    </div>

    <?php if (isset($aviso) && !empty($aviso)) : ?>
        <div class="aviso"><?= $aviso; ?></div>
    <?php endif ?>
<br>
    <div>
        <?php if (isset($doc_socios) && !empty($doc_socios)) : ?>
            <table class="centro">
                <tr>
                    <th>Data de Inclusão</th>
                    <th>Nome do Imóvel</th>
                    <th>Proprietário</th>

                    <td></td>
                </tr>

                <?php foreach ($doc_socios as $key => $value) : ?>


                    <tr>
                        <td><?= $value['data_inclusao']; ?></td>
                        <td><?= $propriedade[0]['propriedade']; ?></td>
                        <td><?= $propriedade[0]['proprietario']; ?></td>
                        <td>
                            <?php if (!is_dir("docs_socios/" . $value['id'] . "_CAF_" . $socios[0]['cpf_socio'])) : ?>

                                <label>
                                    <a href="<?= $base; ?>/declaracao/<?= $value['id']; ?>" title="Declarações" target="_blank"><i class="fa-solid fa-file-invoice"></i></a>
                                </label> |

                                <label>
                                    <a href="<?= $base; ?>/arquivo/emissao/<?= $value['id']; ?>" title="Anexar Documentos"><i class="fa-solid fa-cloud-arrow-up"></i></a>
                                </label>
                            <?php else : ?>
                                <label>
                                    <a href="<?= "$base/docs_socios/" . $value['id'] . "_CAF_" . $socios[0]['cpf_socio'] . "/" . $value['id'] . "_CAF_" . $socios[0]['cpf_socio'] . ".zip"; ?>" title="Baixar documentos"><i class="fa-solid fa-file-arrow-down"></i></a>
                                </label>
                            <?php endif ?>

                        </td>
                    </tr>
                <?php endforeach ?>

            </table>
        <?php endif ?>
    </div>
</div>
<?= $render("modalDelete"); ?>

<script src="<?= $base; ?>/assets/js/control-anexos.js"></script>
</body>

</html>