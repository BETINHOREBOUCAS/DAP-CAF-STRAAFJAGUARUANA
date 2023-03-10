<?php $render('header'); ?>

<div class="container">
    <h1>Cadastrar usuário</h1>

    <form action="" method="post">

        <fieldset>
            <legend>
                <h3>Dados do usuário</h3>
            </legend>

            <div class="displayFlex">

                <div class="margin">
                    <label for="inputCPF2" id="label-cpf">CPF</label><br>
                    <input type="text" autocomplete="random-string" name="cpf" id="inputCPF2" placeholder="___.___.___-___" required value="<?= ($membros[0]['cpf_membro']) ?? '' ?>"><br><br>
                </div>

                <div class="margin">
                    <label for="nome">Nome Completo</label> <br>
                    <input type="text" autocomplete="random-string" name="nome" id="nome" required> <br><br>
                </div>

                <div class="margin">
                    <label for="user">Whatsapp</label> <br>
                    <input type="text" autocomplete="random-string" name="zap" id="user" required> <br><br>
                </div>

            </div>
            <div class="displayFlex">
                
                <div class="margin">
                    <label for="e-mail">E-mail</label> <br>
                    <input type="email" autocomplete="random-string" name="email" id="email" required> <br><br>
                </div>

                <div class="margin">
                    <label for="password">Senha:</label> <br>
                    <input type="password" autocomplete="random-string" name="password" id="password" required> <br><br>
                </div>

                <div class="margin">
                    <label for="password2">Confirmar senha:</label> <br>
                    <input type="password" autocomplete="random-string" name="password2" id="password2" required> <br>
                    <div class="verifyPassaword">Senhas não confere!</div>
                </div>
                
            </div>

            <div class="displayFlex">
                <div class="margin">
                    <div>
                        <label>Nivel de Acesso</label>
                    </div>
                    <div>
                        <div><input type="checkbox" name="nivel[]" value="master"> Master</div>
                        <div><input type="checkbox" name="nivel[]" value="previdencia"> Previdência</div>
                        <div><input type="checkbox" name="nivel[]" value="caf"> CAF</div>
                    </div>
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