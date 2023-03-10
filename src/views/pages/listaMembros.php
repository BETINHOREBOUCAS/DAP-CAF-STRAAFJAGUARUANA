<?php $render('header'); ?>

<div class="container">
    <h1>Membros da UFPA</h1>
    <h3>Responsável da UFPA: </h3>
    <h4><?= $titular[0]['nome_socio']; ?> <br> CPF: <?= $titular[0]['cpf_socio']; ?></h4>

    <div class="ajust-button">
        <div class="button-navigation margin-rigth-5">
            <a href="<?= $base; ?>/?id=<?= $id_responsavel; ?>">
                <div class="divButton button-red">Voltar</div>
            </a>
        </div>

        <div class="button-navigation margin-left-5">
            <a href="<?= $base; ?>/cadastrar/membros/<?= $id_responsavel; ?>">
                <div class="divButton button-blue">Cadastrar Membro</div>
            </a>
        </div>
    </div>

    <?php if (isset($aviso) && !empty($aviso)) : ?>
        <div class="sucess"><?= $aviso; ?></div>
    <?php endif ?>

    <div>

        <?php if (!empty($membros)) : ?>
            <table class="centro">
                <tr>
                    <th>Nome</th>
                    <th>CPF</th>
                    <th>Parentesco</th>
                    <th>Ações</th>
                </tr>
                <?php foreach ($membros as $key => $value) : ?>
                    <tr>
                        <td><?= $value['nome_membro'] ?></td>
                        <td><?= $value['cpf_membro'] ?></td>
                        <td><?= $value['parentesco_membro'] ?></td>
                        <td>
                            <a href="<?= $base; ?>/lista/membros/editar/<?= $id_responsavel . "/" . $value['id']; ?>"><i class="fa-solid fa-pen-to-square" title="Editar"></i></a> | 
                            
                            <!--<a href="<?= $base; ?>/lista/membros/excluir/<?= $id_responsavel . "/" . $value['id']; ?>" style="color: red;" title="Excluir"><i class="fa-solid fa-trash-can"></i></a>-->

                            <a href="<?= $base; ?>/lista/membros/excluir/<?= $id_responsavel . "/" . $value['id']; ?>" class="del-registration" style="color: red;" title="Excluir" ><i class="fa-solid fa-trash-can"></i></a>
                        </td>
                    </tr>
                <?php endforeach ?>
            </table>
        <?php else : ?>
            <div class="aviso">Nenhum membro cadastrado!</div>
        <?php endif ?>
    </div>
</div>
<?= $render("modalDelete"); ?>
<script src="<?=$base;?>/assets/js/cadastros.js"></script>
</body>

</html>