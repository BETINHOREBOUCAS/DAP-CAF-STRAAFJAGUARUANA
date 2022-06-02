<?=$render('header');?>

<p>Eu, <strong><?= mb_convert_case($dados['titular1'], MB_CASE_TITLE); ?></strong>, brasileiro(a), agricultor(a), <?= strtolower ($dados['estado_civil']); ?>, portador(a) do RG <?= $dados['rg1']; ?>, CPF <?= $dados['cpf1']; ?>, residente e domiciliado em <?= mb_convert_case($dados['endereco'], MB_CASE_TITLE) . ", " . $dados['numero']; ?>, <?= mb_convert_case($dados['bairro'], MB_CASE_TITLE); ?>, Jaguaruana-CE.</p>

<fieldset>
        <legend>
            <h3>Dados da Pessoa Separada</h3>
        </legend>

        <form method="post">
        <div class="displayFlex">
            <div class="margin">
                <label for="nomeSeparado">Nome Completo</label> <br>
                <input type="text" name="nomeSeparado" id="nomeSeparado" required> <br><br>
            </div>

            <div class="margin">
                <label for="rgSeparado">RG</label><br>
                <input type="text" name="rgSeparado" id="rgSeparado" required ><br><br>
            </div>

            <div class="margin">
                <label for="cpfSeparado">CPF</label><br>
                <input type="text" name="cpfSeparado" id="cpfSeparado" required ><br><br>
            </div>

            <div class="margin">
                <label for="dataSeparacao">Data da Separação</label><br>
                <input type="date" name="dataSeparacao" id="dataSeparacao" required ><br><br>
            </div>
        </div>

        <div class="displayFlex">

            <div class="margin">
                <label for="enderecoSeparado">Endereco</label><br>
                <input type="text" name="enderecoSeparado" id="enderecoSeparado" required><br><br>
            </div>
            <div class="margin">
                <label for="bairroSeparado">Bairro</label><br>
                <input type="text" name="bairroSeparado" id="bairroSeparado" required><br><br>
            </div>
            <div class="margin">
                <label for="cidadeEstadoSeparado">Cidade/Estado</label><br>
                <input type="text" name="cidadeEstadoSeparado" id="cidadeEstadoSeparado" required ><br><br>
            </div>
            
        </div>

        <div class="displayFlex">

            <div class="margin">
                <label for="nomeTestemunha">Nome da Testemunha</label><br>
                <input type="text" name="nomeTestemunha" id="nomeTestemunha" required><br><br>
            </div>
            <div class="margin">
                <label for="rgTestemunha">RG Testemunha</label><br>
                <input type="text" name="rgTestemunha" id="rgTestemunha" required><br><br>
            </div>
            <div class="margin">
                <label for="cpfTestemunha">CPF Testemunha</label><br>
                <input type="text" name="cpfTestemunha" id="cpfTestemunha" required ><br><br>
            </div>
            
        </div>
        <input type="submit" value="Salvar">
        </form>

        
    </fieldset>