<?php $render('header'); ?>

<h1>Membros da UFPA</h1>
<h3>Responsável da UFPA: </h3>
<h4>Maria Gislene da Silva <br> CPF: 568.895.986-99</h4>

<?php
/*
echo "<pre>";
print_r($responsavel);
echo "</pre>";*/
?>
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
                    <td><a href="<?= $base; ?>/lista/membros/editar/<?= $id_responsavel . "/" . $value['id']; ?>"><i class="fa-solid fa-pen-to-square" title="Editar"></i></a> | <a href="<?= $base; ?>/lista/membros/excluir/<?= $id_responsavel . "/" . $value['id']; ?>" style="color: red;" title="Excluir"><i class="fa-solid fa-trash-can"></i></a></td>
                </tr>
            <?php endforeach ?>
        </table>
        <?php else :?>
            <div class="aviso">Nenhum membro cadastrado!</div>
    <?php endif ?>
    <!--
<?php if (isset($socios) && !empty($socios)) : ?>
    <table class="centro">
        <tr>
            <th>Titular 1</th>
            <th>CPF</th>
            <th>Titular 2</th>
            <th>CPF</th>
            <th>Ações</th>
        </tr>
        
            <?php foreach ($socios as $key => $value) : ?>
                <tr>
                    <td style="width: 25%;"><?= $value['titular1']; ?></td>
                    <td style="width: 15%;"><?= $value['cpf1']; ?></td>
                    <td style="width: 25%;"><?= $value['titular2']; ?></td>
                    <td style="width: 15%;"><?= $value['cpf2']; ?></td>
                    <td class="acoes" style="width: 20%;">
                        <a href="<?= $base; ?>/arquivo/<?= $value['id']; ?>" title="Arquivos"><i class="fa-solid fa-folder-open"></i></a> | 
                        <a href="<?= $base; ?>/cadastro/membros/<?= $value['id']; ?>" title="Menbros da Família"><i class="fa-solid fa-people-roof"></i></a> | 
                        <a href="<?= $base; ?>/renda/<?= $value['id']; ?>" title="Renda"><i class="fa-solid fa-file-invoice-dollar"></i></a> | 
                        <a href="<?= $base; ?>/propriedade/<?= $value['id']; ?>" title="Propriedade"><i class="fa-solid fa-tractor"></i></a> | 
                        <a href="<?= $base; ?>/cadastro/editar/<?= $value['id']; ?>" title="Editar Cadastro"><i class="fa-solid fa-user-pen"></i></a>
                    </td>
                </tr>
            <?php endforeach ?>
        
    </table>
    <?php endif ?>
            -->
</div>
</body>

<script src="<?= $base; ?>/assets/js/script.js"></script>

</html>