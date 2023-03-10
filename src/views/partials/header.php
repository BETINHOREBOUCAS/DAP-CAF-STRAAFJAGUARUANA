<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Sócio</title>
    <link rel="stylesheet" href="<?= $base; ?>/assets/css/style.css">
    <link rel="stylesheet" href="<?= $base; ?>/assets/css/modal.css">
    <link rel="stylesheet" href="<?= $base; ?>/assets/css/gerenciar.css">
    <script src="https://kit.fontawesome.com/adc9de9a21.js" crossorigin="anonymous"></script>
</head>

<body>

    <div class="user">
        <div>Usuário: <?= $_SESSION['usuario']['nome']; ?></div>
        <div class="button-action button-navigation">
            <button class="button-red" id="logof" url="<?=$base;?>/sair">Sair</button>
            
            <button class="button-blue" id="gerenciar" url="<?=$base;?>/gerenciar">Gerenciar</button>
        </div>
    </div>
    <script src="<?=$base;?>/assets/js/button.js"></script>