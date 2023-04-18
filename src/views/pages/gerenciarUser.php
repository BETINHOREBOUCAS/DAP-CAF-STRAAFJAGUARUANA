<?php $render('header'); ?>

<div class="container">

    <div class="sub-content">
        <?php if (in_array('master', json_decode($permissao))) :?>
        <div class="button-navigation">
            <a href="<?= $base; ?>/gerenciar/add/user">
                <div class="divButton button-blue">Cadastrar usuário</div>
            </a>
        </div>
        <?php endif ?>
        <br>
        <table class="table-list">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>CPF</th>
                    <th>E-mail</th>
                    <th>Whatsapp</th>
                    <th>Ações</th>
                </tr>
            </thead>

            <tbody>
                <?php foreach ($usuarios as $key => $value) : ?>
                    <tr>
                        <td><?= $value['nome']; ?></td>
                        <td><?= $value['cpf']; ?></td>
                        <td><?= $value['email']; ?></td>
                        <td><?= $value['zap']; ?></td>
                        <td>
                            <a href="<?= $base; ?>/gerenciar/user/edit/<?= $value['id']; ?>"><i class="fa-solid fa-user-pen"></i></a>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>

</body>

</html>