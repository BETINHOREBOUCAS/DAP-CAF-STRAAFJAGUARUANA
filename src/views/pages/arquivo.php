<?php $render('header'); ?>

<h1>Arquivos</h1>

<!-- ERRO LINK http://localhost/sistemadap/public/arquivo/10 -->
<h4><?= $socios[0]['nome_socio'] . '<br>CPF = ' . $socios[0]['cpf_socio']; ?></h4>
<h4><?= isset($socios[0]['titular2']) && !empty($socios[0]['titular2']) ? $socios[0]['titular2'] . '<br>CPF = ' . $socios[0]['cpf2'] : ''; ?></h4>
<!-- Fim do erro -->

<div class="ajust-button">
    <div class="button-navigation">
        <a href="<?= $base; ?>/?id=<?= $idsocio; ?>">
            <div class="divButton button-red">Voltar</div>
        </a>
    </div>

    <div class="button-navigation button-center button-green" style="border-radius: 5px">
        <form method="post">
            <div class="divButton button-blue">
                <button>Criar CAF</button>
            </div>
        </form>
    </div>
</div>

<?php if (isset($aviso) && !empty($aviso)) : ?>
    <div class="aviso"><?= $aviso; ?></div>
<?php endif ?>

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
                            </label>

                            <!--<?php if ($value['estado_civil_socio'] == "Separado(a)") : ?> |
                            <label>
                                <a href="<?= $base; ?>/declaracao/separacao/<?= $value['id']; ?>" title="Declaração de Separado" style="color: #F44A6C" target="_blank"><i class="fa-solid fa-heart-crack"></i></a>
                            </label>
                                <?php endif ?>-->
                            |

                            <label>
                                <a href="<?= $base; ?>/arquivo/emissao/<?= $value['id']; ?>" title="Anexar Documentos"><i class="fa-solid fa-cloud-arrow-up"></i></a>
                            </label>
                        <?php else : ?>
                            <label>
                                <a href="<?= "$base/docs_socios/" . $value['id'] . "_CAF_" . $socios[0]['cpf_socio']."/".$value['id'] . "_CAF_" . $socios[0]['cpf_socio'].".zip"; ?>" title="Baixar documentos"><i class="fa-solid fa-file-arrow-down"></i></a>
                            </label>
                        <?php endif ?>

                    </td>
                </tr>
            <?php endforeach ?>

        </table>
    <?php endif ?>
</div>

</body>

</html>