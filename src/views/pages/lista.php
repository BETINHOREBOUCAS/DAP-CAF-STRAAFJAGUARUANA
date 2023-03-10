<?php $render('header'); ?>

<div class="container">
    <h1>Lista</h1>

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
        <div class="displayFlex search-home">

            <div class="search-socio">

                <div class="margin">
                    <label for="Nome">Nome do sócio</label><br>
                    <input type="text" autocomplete="off" name="nome" id="nome">
                </div>

                <div class="margin">
                    <label for="cpf">CPF do sócio</label><br>
                    <input type="text" autocomplete="off" name="cpf" id="inputCPF" placeholder="___.___.___-___">
                </div>

            </div>

            <div class="search-membro">

                <div class="margin">
                    <label for="nomeMembro">Nome do membro</label><br>
                    <input type="text" autocomplete="off" name="nomeMembro" id="nomeMembro">
                </div>

                <div class="margin">
                    <label for="cpfMembro">CPF do membro</label><br>
                    <input type="text" autocomplete="off" name="cpfMembro" id="inputCPF2" placeholder="___.___.___-___">
                </div>
            </div>
        </div>
        <div class="ajust-button">
            <div class="button-navigation button-center button-green" style="border-radius: 5px">
                <button>Pesquisar</button>
            </div>
        </div>
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
                            <a href="<?= $base; ?>/arquivo/<?= $value['id']; ?>" title="Arquivos"><i class="fa-solid fa-folder-open"></i></a> |
                            <a href="<?= $base; ?>/renda/<?= $value['id']; ?>" title="Renda"><i class="fa-solid fa-file-invoice-dollar"></i></a> |
                            <a href="<?= $base; ?>/propriedade/<?= $value['id']; ?>" title="Propriedade"><i class="fa-solid fa-tractor"></i></a> |
                            <a href="<?= $base; ?>/lista/membros/<?= $value['id']; ?>" title="Menbros da Família"><i class="fa-solid fa-people-roof"></i></a> |
                            <a href="<?= $base; ?>/cadastro/editar/<?= $value['id']; ?>" title="Editar Cadastro"><i class="fa-solid fa-user-pen"></i></a>
                        </td>
                    </tr>
                <?php endforeach ?>

            </table>
        <?php endif ?>

        <?php if (isset($membros) && !empty($membros)) : ?>
            <table class="centro">
                <tr>
                    <th>Membro</th>
                    <th>CPF</th>
                    <th>Sócio</th>
                </tr>
                <?php foreach ($membros as $key => $value) : ?>
                    <tr>
                        <td style="width: 40%;"><?= $value['nome_membro']; ?></td>
                        <td style="width: 40%;"><?= $value['cpf_membro']; ?></td>
                        <td class="acoes" style="width: 20%;">
                            <a href="<?= $base; ?>/?id=<?= $value['id_socio_responsavel']; ?>" title="Arquivos">Detalhar</a>
                        </td>
                    </tr>
                <?php endforeach ?>
            </table>
        <?php endif ?>
    </div>
</div>
</body>

<script src="<?= $base; ?>/assets/js/script.js"></script>
<script src="<?= $base; ?>/assets/js/script2.js"></script>

</html>