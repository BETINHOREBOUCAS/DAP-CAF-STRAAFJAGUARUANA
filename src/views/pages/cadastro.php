<?php $render('header'); ?>

<h1>Cadastrar sócio</h1>

<?php if (isset($aviso) && !empty($aviso)) : ?>
    <div class="aviso"><?= $aviso; ?></div>
<?php endif ?>

<form action="" method="post">

    <fieldset>
        <legend>
            <h3>Dados do sócio</h3>
        </legend>

        <div class="displayFlex">
            <div class="margin">
                <label for="cpf_socio">CPF</label><br>
                <input type="text" autocomplete="random-string" name="cpf_socio" id="inputCPF2" placeholder="___.___.___-___" required value="<?= ($dados['cpf_socio']) ?? '' ?>"><br><br>
            </div>

            <div class="margin">
                <label for="nome_socio">Nome Completo</label> <br>
                <input type="text" autocomplete="random-string" name="nome_socio" id="nome_socio" required value="<?= ($dados['nome_socio']) ?? '' ?>"> <br><br>
            </div>

            <div class="margin">
                <label for="dn_socio">Data de Nascimento</label><br>
                <input type="date" name="dn_socio" id="dn_socio" required value="<?= ($dados['dn_socio']) ?? '' ?>"><br><br>
            </div>

            <div class="margin">
                <label for="rg_socio">RG</label><br>
                <input type="text" autocomplete="random-string" name="rg_socio" id="rg_socio" required value="<?= ($dados['rg_socio']) ?? '' ?>"><br><br>
            </div>

        </div>

        <div class="displayFlex">
            <div class="margin">
                <label for="telefone_socio">Celular</label><br>
                <input type="text" autocomplete="random-string" name="telefone_socio" id="telefone_socio" required value="<?= ($dados['telefone_socio']) ?? '' ?>"><br><br>
            </div>

            <div class="margin">
                <label for="estado_civil_socio">Estado Civil</label>
                <select name="estado_civil_socio" id="estado_civil_socio" required>Estado Civil
                    <option value=""></option>
                    <option>Solteiro(a)</option>
                    <option>Casado(a)</option>
                    <option>Amasiado(a)</option>
                    <option>Separado(a)</option>
                    <option>Divorciado(a)</option>
                    <option>Viúvo(a)</option>
                </select>
            </div>

            <div class="margin">
                <label for="uf_nascimento_socio">UF de Nascimento</label><br>
                <input type="text" name="uf_nascimento_socio" id="uf_nascimento_socio" required autocomplete="random-string">
            </div>

            <div class="margin">
                <label for="municipio_nascimento_socio">Município de Nascimento</label><br>
                <input type="text" name="municipio_nascimento_socio" id="municipio_nascimento_socio" required autocomplete="random-string">
            </div>

        </div>
        <div class="displayFlex">
            <div class="margin">
                <label for="cep_socio">CEP da residência</label><br>
                <input type="text" name="cep_socio" id="inputCEP2" required autocomplete="random-string">
            </div>

            <div class="margin">
                <label for="uf_socio">UF de residência</label><br>
                <input type="text" name="uf_socio" id="endereco_socio" required autocomplete="random-string">
            </div>

            <div class="margin">
                <label for="cidade_socio">Município de residência</label><br>
                <input type="text" name="municipio_socio" id="endereco_socio" required autocomplete="random-string">
            </div>

            <div class="margin">
                <label for="endereco_socio">Endereço da residência</label><br>
                <input type="text" name="endereco_socio" id="endereco_socio" required autocomplete="random-string">
            </div>

            <div class="margin">
                <label for="bairro_socio">Bairro da residência</label><br>
                <input type="text" name="bairro_socio" id="bairro_socio" required autocomplete="random-string">
            </div>
        </div>

        <div class="displayFlex">

            <div class="margin">
                <label for="mae_socio">Nome da Mãe</label><br>
                <input type="text" autocomplete="random-string" name="mae_socio" id="mae_socio" required value="<?= ($dados['mae_socio']) ?? '' ?>"><br><br>
            </div>

            <div class="margin">
                <label for="pai_socio">Nome do Pai</label><br>
                <input type="text" autocomplete="random-string" name="pai_socio" id="pai_socio" required value="<?= ($dados['pai_socio']) ?? '' ?>"><br><br>
            </div>

            <div class="margin">
                <label for="escolaridade_socio">Escolaridade</label><br>
                <select name="escolaridade_socio" id="escolaridade_socio" required>
                    <option value=""></option>
                    <option <?= isset($dados['escolaridade_socio']) && $dados['escolaridade_socio'] == 'Analfabeto' ? 'selected' : '' ?>>
                        Analfabeto</option>
                    <option <?= isset($dados['escolaridade_socio']) && $dados['escolaridade_socio'] == 'Alfabetizado' ? 'selected' : '' ?>>
                        Alfabetizado</option>
                    <option <?= isset($dados['escolaridade_socio']) && $dados['escolaridade_socio'] == 'Fundamental Incompleto' ? 'selected' : '' ?>>
                        Fundamental Incompleto</option>
                    <option <?= isset($dados['escolaridade_socio']) && $dados['escolaridade_socio'] == 'Fundamental Completo' ? 'selected' : '' ?>>
                        Fundamental Completo</option>
                    <option <?= isset($dados['escolaridade_socio']) && $dados['escolaridade_socio'] == 'Médio Incompleto' ? 'selected' : '' ?>>
                        Médio Incompleto</option>
                    <option <?= isset($dados['escolaridade_socio']) && $dados['escolaridade_socio'] == 'Médio Completo' ? 'selected' : '' ?>>
                        Médio Completo</option>
                    <option <?= isset($dados['escolaridade_socio']) && $dados['escolaridade_socio'] == 'Superior Incompleto' ? 'selected' : '' ?>>
                        Superior Incompleto</option>
                    <option <?= isset($dados['escolaridade_socio']) && $dados['escolaridade_socio'] == 'Superior Completo' ? 'selected' : '' ?>>
                        Superior Completo</option>
                </select><br><br>
            </div>

            <div class="margin">
                <label for="cor_socio">Cor ou raça</label><br>
                <select name="cor_socio" id="cor_socio" required>
                    <option></option>
                    <option>Amarela</option>
                    <option>Branca</option>
                    <option>Indígena</option>
                    <option>Preta</option>
                    <option>Pardo</option>
                </select>
            </div>

        </div>

        <div class="displayFlex">
            <div class="margin">
                <label for="sexo_socio">
                    Sexo <br>
                    <input type="radio" name="sexo_socio" id="sexo_socio" value="masculino" required <?= isset($dados['sexo_socio']) && $dados['sexo_socio'] == 'masculino' ? 'checked' : '' ?>>
                    <label for="sim">Masculino</label><br>

                    <input type="radio" name="sexo_socio" id="sexo_socio" value="feminino" required <?= isset($dados['sexo_socio']) && $dados['sexo_socio'] == 'feminino' ? 'checked' : '' ?>>
                    <label for="sexo_socio">Feminino</label>
                </label> <br><br>
            </div>

            <div class="margin">
                <label for="assentado_socio">
                    É assentado da regorma agrária? <br>
                    <input type="radio" name="assentado_socio" id="assentado_socio" value="sim" required <?= isset($dados['assentado_socio']) && $dados['assentado_socio'] == 'sim' ? 'checked' : '' ?>>
                    <label for="sim">Sim</label><br>

                    <input type="radio" name="assentado_socio" id="assentado_socio" value="não" required <?= isset($dados['assentado_socio']) && $dados['assentado_socio'] == 'não' ? 'checked' : '' ?>>
                    <label for="nao">Não</label>
                </label> <br><br>
            </div>

            <div class="margin">
                <label for="credito_fundiario_socio">
                    É beneficiário do crédito fundiário? <br>
                    <input type="radio" name="credito_fundiario_socio" id="credito_fundiario_socio" value="sim" required <?= isset($dados['credito_fundiario_socio']) && $dados['credito_fundiario_socio'] == 'sim' ? 'checked' : '' ?>>
                    <label for="sim">Sim</label><br>

                    <input type="radio" name="credito_fundiario_socio" id="credito_fundiario_socio" value="não" required <?= isset($dados['credito_fundiario_socio']) && $dados['credito_fundiario_socio'] == 'não' ? 'checked' : '' ?>>
                    <label for="nao">Não</label>
                </label> <br><br>
            </div>

            <div class="margin">
                <label for="gestor_socio">
                    É gestor(a) da UFPA? <br>
                    <input type="radio" name="gestor_socio" id="gestor_socio" value="sim" required <?= isset($dados['gestor_socio']) && $dados['gestor_socio'] == 'sim' ? 'checked' : '' ?>>
                    <label for="sim">Sim</label><br>

                    <input type="radio" name="gestor_socio" id="gestor_socio" value="não" required <?= isset($dados['gestor_socio']) && $dados['gestor_socio'] == 'não' ? 'checked' : '' ?>>
                    <label for="nao">Não</label>
                </label> <br><br>
            </div>

            <div class="margin">
                <label for="mao_obra_socio">
                    É mão de obra na UFPA? <br>
                    <input type="radio" name="mao_obra_socio" id="mao_obra_socio" value="sim" required <?= isset($dados['mao_obra_socio']) && $dados['mao_obra_socio'] == 'sim' ? 'checked' : '' ?>>
                    <label for="sim">Sim</label><br>

                    <input type="radio" name="mao_obra_socio" id="mao_obra_socio" value="não" required <?= isset($dados['mao_obra_socio']) && $dados['mao_obra_socio'] == 'não' ? 'checked' : '' ?>>
                    <label for="nao">Não</label>
                </label> <br><br>
            </div>
        </div>

    </fieldset>

    <div class="ajust-button">
        <div class="button-navigation">
            <a href="<?= $base; ?>">
                <div class="divButton button-red">Voltar</div>
            </a>
        </div>

        <div class="button-navigation button-center button-green" style="border-radius: 5px">
            <button>Cadastrar</button>
        </div>
    </div>

</form>

<script src="<?= $base; ?>/assets/js/script2.js"></script>

</body>

</html>