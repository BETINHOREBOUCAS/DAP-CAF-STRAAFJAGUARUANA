<?php $render('header'); ?>

<h1>Lista</h1>

<?php
/*echo "<pre>";
print_r($socios);
echo "</pre>";*/
?>

<div class="button-navigation">
    <a href="<?= $base; ?>/cadastro">
        <div class="divButton button-blue">Cadastrar sócio</div>
    </a>
</div>
<br>

<?php if (isset($aviso) && !empty($aviso)) : ?>
    <div class="sucess"><?= $aviso; ?></div>
<?php endif ?>

<form action="" method="get">
    <div class="displayFlex">

        <div class="margin">
            <label for="Nome">Nome</label><br>
            <input type="text" autocomplete="off" name="nome" id="nome">
        </div>

        <div class="margin">
            <label for="cpf">CPF</label><br>
            <input type="text" autocomplete="off" name="cpf" id="inputCPF" placeholder="___.___.___-___">
        </div>
    </div>
    <div><input type="submit" value="Pesquisar"></div>
</form>

<div>
<?php if (isset($socios) && !empty($socios)) : ?>
    <table class="centro">
        <tr>
            <th>Sócio</th>
            <th>CPF</th>
            <th>Ações</th>
        </tr>
        
            <?php foreach ($socios as $key => $value) : ?>
                <tr>
                    <td style="width: 25%;"><?= $value['nome_socio']; ?></td>
                    <td style="width: 15%;"><?= $value['cpf_socio']; ?></td>
                    <td class="acoes" style="width: 20%;">
                        <a href="<?=$base;?>/arquivo/<?=$value['id'];?>" title="Arquivos"><i class="fa-solid fa-folder-open"></i></a> |  
                        <a href="<?=$base;?>/renda/<?=$value['id'];?>" title="Renda"><i class="fa-solid fa-file-invoice-dollar"></i></a> | 
                        <a href="<?=$base;?>/propriedade/<?=$value['id'];?>" title="Propriedade"><i class="fa-solid fa-tractor"></i></a> | 
                        <a href="<?=$base;?>/lista/membros/<?=$value['id'];?>" title="Menbros da Família"><i class="fa-solid fa-people-roof"></i></a> |
                        <a href="<?=$base;?>/cadastro/editar/<?=$value['id'];?>" title="Editar Cadastro"><i class="fa-solid fa-user-pen"></i></a>
                    </td>
                </tr>
            <?php endforeach ?>
        
    </table>
    <?php endif ?>
</div>
</body>

<script src="<?=$base;?>/assets/js/script.js"></script>
</html>