<?php $render('header'); ?>

<div class="container">
    <div class="displayFlex config-block">
        <!--
        <a href="<?= $base; ?>/cadastro">
            <div class="sub-block">
                <div>
                    <div class="icon-block"><i class="fa-solid fa-user-plus"></i></div>
                    <div class="text-block">Adicionar usuário</div>
                </div>
            </div>
        </a>
-->
        <?php if (in_array('caf', json_decode($permissao)) || in_array('master', json_decode($permissao))) : ?>
            <a href="<?= $base; ?>/caf">
                <div class="sub-block">
                    <div>
                        <div class="icon-block"><i class="fa-solid fa-seedling"></i></div>
                        <div class="text-block">CAF</div>
                    </div>
                </div>
            </a>
        <?php endif ?>
<!--
        <?php if (in_array('previdencia', json_decode($permissao)) || in_array('master', json_decode($permissao))) : ?>
            <a href="<?= $base; ?>/previdencia">
                <div class="sub-block">
                    <div>
                        <div class="icon-block"><i class="fa-solid fa-hands-holding-child"></i></div>
                        <div class="text-block">Previdência</div>
                    </div>
                </div>
            </a>
        <?php endif ?>
        
        <?php if (in_array('master', json_decode($permissao))) : ?>
            <div class="sub-block">
                <div>
                    <div class="icon-block"><i class="fa-solid fa-binoculars"></i></div>
                    <div class="text-block">Auditor</div>
                </div>
            </div>
        <?php endif ?>
        -->
        <a href="<?= $base; ?>/gerenciar/user">
            <div class="sub-block">
                <div>
                    <div class="icon-block"><i class="fa-solid fa-user-gear"></i></div>
                    <div class="text-block">Gerenciar usuários</div>
                </div>
            </div>
        </a>

    </div>

    </body>

    </html>