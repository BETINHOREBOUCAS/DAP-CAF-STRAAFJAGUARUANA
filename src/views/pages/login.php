<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="<?= $base; ?>/assets/css/login.css">
    <link rel="stylesheet" href="<?= $base; ?>/assets/css/style.css">
</head>

<body>
    <div class="container" style="margin:0;">
        <div class="area-login">

            <div class="left">
                <div class="title">
                    <h1>SisCAF</h1>
                    <a href="<?= $base; ?>/login/cadastro">
                        <div class="button">Cadastre-se</div>
                    </a>
                </div>
            </div>

            <div class="right">
                <div>
                    <?php if (isset($aviso) && !empty($aviso)) : ?>
                        <div class="sucess"><?= $aviso; ?></div>
                    <?php endif ?>
                    <form method="post">
                        <div>
                            <input type="text" name="user" placeholder="Usuário">
                        </div>
                        <div>
                            <input type="password" name="password" placeholder="Senha">
                        </div>
                        <div>
                            <input type="submit" value="Login">
                        </div>
                        <a href="<?= $base; ?>/login/recuperar/senha">Recuperar senha</a>
                    </form>
                </div>
            </div>
        </div>

    </div>
</body>

</html>