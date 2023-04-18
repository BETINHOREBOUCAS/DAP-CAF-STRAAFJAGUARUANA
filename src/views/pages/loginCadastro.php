<?php $render('headerLogin'); ?>

<div class="container">
    <form action="" method="post">
        <?php if (isset($aviso) && !empty($aviso)) : ?>
            <div class="sucess"><?= $aviso; ?></div>
        <?php endif ?>
        <fieldset>
            <legend>
                <h3>Dados do usuário</h3>
            </legend>
            <div class="displayFlex">
                <div class="margin">
                    <label for="cnpj" id="label-cpf">CNPJ</label><br>
                    <input type="text" autocomplete="random-string" name="cnpj" id="cnpj" required maxlength="14"><br><br>
                </div>

                <div class="margin">
                    <label for="razao">Razão Social</label> <br>
                    <input type="text" autocomplete="random-string" name="razao" id="razao" required> <br><br>
                </div>
            </div>
            <div class="displayFlex">
                
                <div class="margin">
                    <label for="inputCPF2" id="label-cpf">CPF</label><br>
                    <input type="text" autocomplete="random-string" name="cpf" id="inputCPF2" placeholder="___.___.___-___" required value="<?= $usuario['cpf'] ?? ""; ?>"><br><br>
                </div>

                <div class="margin">
                    <label for="nome">Nome Completo</label> <br>
                    <input type="text" autocomplete="random-string" name="nome" id="nome" required value="<?= $usuario['nome'] ?? ""; ?>"> <br><br>
                </div>

                <div class="margin">
                    <label for="user">Whatsapp</label> <br>
                    <input type="text" autocomplete="random-string" name="zap" id="user" required value="<?= $usuario['zap'] ?? ""; ?>"> <br><br>
                </div>

            </div>
            <div class="displayFlex">

                <div class="margin">
                    <label for="e-mail">E-mail</label> <br>
                    <input type="email" autocomplete="random-string" name="email" id="email" required value="<?= $usuario['email'] ?? ""; ?>"> <br><br>
                </div>

                <div class="margin">
                    <label for="password">Senha:</label> <br>
                    <input type="password" autocomplete="random-string" name="password" id="password" <?= !isset($usuario) ? "required" : ""; ?>> <br><br>
                </div>

                <div class="margin">
                    <label for="password2">Confirmar senha:</label> <br>
                    <input type="password" autocomplete="random-string" name="password2" id="password2" <?= !isset($usuario) ? "required" : ""; ?>> <br>
                    <div class="verifyPassaword">Senhas não confere!</div>
                </div>

            </div>

        </fieldset>

        <div class="ajust-button">
            <div class="button-navigation">
                <a href="<?= $base; ?>/gerenciar/user">
                    <div class="divButton button-red">Voltar</div>
                </a>
            </div>

            <div class="button-navigation button-center button-green" style="border-radius: 5px">
                <button>Salvar</button>
            </div>
        </div>

    </form>
</div>

<script src="<?= $base; ?>/assets/js/script2.js"></script>
<script src="<?= $base; ?>/assets/js/user.js"></script>
</body>

</html>