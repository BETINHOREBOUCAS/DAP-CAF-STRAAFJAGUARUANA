<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="<?= $base; ?>/assets/css/login.css">
</head>

<body>
    <div class="container">
        <div class="area-login">
            <div class="left">
                <div class="title">
                    <h1>SisCAF</h1>
                </div>
            </div>

            <div class="right">
                <div>
                    <?php if (isset($aviso)) : ?>
                        <div class="aviso"><?=$aviso;?></div>
                    <?php endif ?>

                    <form method="post">
                        <div>
                            <input type="email" name="user" placeholder="E-mail" value="<?=isset($email)?$email:"";?>">
                        </div>
                        <div>
                            <input type="submit" value="Recuperar">
                        </div>
                        <a href="<?= $base; ?>/login">Voltar para login</a>
                    </form>
                </div>
            </div>
        </div>

    </div>
</body>

</html>