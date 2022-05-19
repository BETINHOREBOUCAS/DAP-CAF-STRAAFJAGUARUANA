<?php $render('header'); ?>

<h1>Lista</h1>

<?php
/*echo "<pre>";
print_r($socios);
echo "</pre>";*/
?>
<div style="font-size: 25px; color: red; padding: 5px" class="margin" title="Adicionar Sócio">
    <a href="<?= $base; ?>/cadastro"><i class="fa-solid fa-user-plus"></i></a>
</div>

<?php if (isset($aviso) && !empty($aviso)) : ?>
    <div class="sucess"><?= $aviso; ?></div>
<?php endif ?>

<form action="" method="get">
    <div class="displayFlex">

        <div class="margin">
            <label for="Nome">Nome</label><br>
            <input type="text" name="nome" id="nome">
        </div>

        <div class="margin">
            <label for="cpf">CPF</label><br>
            <input type="text" name="cpf" id="cpf">
        </div>
    </div>
    <div><input type="submit" value="Pesquisar"></div>
</form>

<div>
<?php if (isset($socios) && !empty($socios)) : ?>
    <table>
        <tr>
            <th>Titular 1</th>
            <th>CPF</th>
            <th>Titular 2</th>
            <th>CPF</th>
            <th>Açôes</th>
        </tr>
        
            <?php foreach ($socios as $key => $value) : ?>
                <tr>
                    <td style="width: 25%;"><?= $value['titular1']; ?></td>
                    <td style="width: 15%;"><?= $value['cpf1']; ?></td>
                    <td style="width: 25%;"><?= $value['titular2']; ?></td>
                    <td style="width: 15%;"><?= $value['cpf2']; ?></td>
                    <td class="acoes" style="width: 20%;">
                        <a href="<?=$base;?>/arquivo/<?=$value['id'];?>" title="Arquivos"><i class="fa-solid fa-folder-open"></i></a> | 
                        <a href="<?=$base;?>/renda/<?=$value['id'];?>" title="Renda"><i class="fa-solid fa-file-invoice-dollar"></i></a> | 
                        <a href="<?=$base;?>/propriedade/<?=$value['id'];?>" title="Propriedade"><i class="fa-solid fa-tractor"></i></a> | 
                        <a href="<?=$base;?>/cadastro/editar/<?=$value['id'];?>" title="Editar Cadastro"><i class="fa-solid fa-user-pen"></i></a>
                    </td>
                </tr>
            <?php endforeach ?>
        
    </table>
    <?php endif ?>
</div>
</body>

</html>