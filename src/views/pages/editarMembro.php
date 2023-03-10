<?php $render('header'); ?>

<div class="container">
    <h1>Editar membro</h1>

    <form action="" method="post">

        <fieldset>
            <legend>
                <h3>Dados do Membro</h3>
            </legend>

            <div class="displayFlex">
                <div class="margin">
                    <label for="cpf_membro" id="label-cpf">CPF</label><br>
                    <input type="text" autocomplete="random-string" name="cpf_membro" id="inputCPF2" placeholder="___.___.___-___" required value="<?= ($membros[0]['cpf_membro']) ?? '' ?>"><br><br>
                </div>

                <div class="margin">
                    <label for="nome_membro">Nome Completo</label> <br>
                    <input type="text" autocomplete="random-string" name="nome_membro" id="nome_membro" required value="<?= ($membros[0]['nome_membro']) ?? '' ?>"> <br><br>
                </div>

                <div class="margin">
                    <label for="dn_membro">Data de Nascimento</label><br>
                    <input type="date" name="dn_membro" id="dn_membro" required value="<?= ($membros[0]['dn_membro']) ?? '' ?>"><br><br>
                </div>

                <div class="margin">
                    <label for="rg_membro">RG</label><br>
                    <input type="text" autocomplete="random-string" name="rg_membro" id="rg_membro" required value="<?= ($membros[0]['rg_membro']) ?? '' ?>"><br><br>
                </div>

                <div class="margin">
                    <label for="telefone_membro">Celular</label><br>
                    <input type="text" autocomplete="random-string" name="telefone_membro" id="telefone_membro" value="<?= ($membros[0]['telefone_membro']) ?? '' ?>"><br><br>
                </div>

            </div>

            <div class="displayFlex">

                <div class="margin">
                    <label for="estado_civil_membro">Estado Civil</label>
                    <select name="estado_civil_membro" id="estado_civil_membro" required>Estado Civil
                        <option value=""></option>
                        <option <?= isset($membros[0]['estado_civil_membro']) && $membros[0]['estado_civil_membro'] == 'Solteiro(a)' ? 'selected' : '' ?>>Solteiro(a)</option>
                        <option <?= isset($membros[0]['estado_civil_membro']) && $membros[0]['estado_civil_membro'] == 'Casado(a)' ? 'selected' : '' ?>>Casado(a)</option>
                        <option <?= isset($membros[0]['estado_civil_membro']) && $membros[0]['estado_civil_membro'] == 'Amasiado(a)' ? 'selected' : '' ?>>Amasiado(a)</option>
                        <option <?= isset($membros[0]['estado_civil_membro']) && $membros[0]['estado_civil_membro'] == 'Separado(a)' ? 'selected' : '' ?>>Separado(a)</option>
                        <option <?= isset($membros[0]['estado_civil_membro']) && $membros[0]['estado_civil_membro'] == 'Divorciado(a)' ? 'selected' : '' ?>>Divorciado(a)</option>
                        <option <?= isset($membros[0]['estado_civil_membro']) && $membros[0]['estado_civil_membro'] == 'Viúvo(a)' ? 'selected' : '' ?>>Viúvo(a)</option>
                    </select>
                </div>

                <div class="margin">
                    <label for="uf_nascimento_socio">UF de Nascimento</label><br>
                    <select name="uf_nascimento_membro" id="uf_nascimento_socio" required>
                        <option><?= ($membros[0]['uf_nascimento_membro']) ?? '' ?></option>
                    </select>
                </div>

                <div class="margin">
                    <label for="municipio_nascimento_socio">Município de Nascimento</label><br>
                    <select name="municipio_nascimento_membro" id="municipio_nascimento_socio">
                        <option><?= ($membros[0]['municipio_nascimento_membro']) ?? '' ?></option>
                    </select>
                </div>

                <div class="margin">
                    <label for="parentesco_membro">Parentesco</label><br>
                    <select name="parentesco_membro" id="parentesco_membro" required>
                        <option></option>
                        <option <?= isset($membros[0]['parentesco_membro']) && $membros[0]['parentesco_membro'] == 'Cônjugue ou companheiro(a)' ? 'selected' : '' ?>>Cônjugue ou companheiro(a)</option>
                        <option <?= isset($membros[0]['parentesco_membro']) && $membros[0]['parentesco_membro'] == 'Filho' ? 'selected' : '' ?>>Filho</option>
                        <option <?= isset($membros[0]['parentesco_membro']) && $membros[0]['parentesco_membro'] == 'Enteado(a)' ? 'selected' : '' ?>>Enteado(a)</option>
                        <option <?= isset($membros[0]['parentesco_membro']) && $membros[0]['parentesco_membro'] == 'Irmão(a)' ? 'selected' : '' ?>>Irmão(a)</option>
                        <option <?= isset($membros[0]['parentesco_membro']) && $membros[0]['parentesco_membro'] == 'Neto(a) ou bisneto(a)' ? 'selected' : '' ?>>Neto(a) ou bisneto(a)</option>
                        <option <?= isset($membros[0]['parentesco_membro']) && $membros[0]['parentesco_membro'] == 'Pai ou mãe' ? 'selected' : '' ?>>Pai ou mãe</option>
                        <option <?= isset($membros[0]['parentesco_membro']) && $membros[0]['parentesco_membro'] == 'Sogro(a)' ? 'selected' : '' ?>>Sogro(a)</option>
                        <option <?= isset($membros[0]['parentesco_membro']) && $membros[0]['parentesco_membro'] == 'Genro ou nora' ? 'selected' : '' ?>>Genro ou nora</option>
                        <option <?= isset($membros[0]['parentesco_membro']) && $membros[0]['parentesco_membro'] == 'Outro parente' ? 'selected' : '' ?>>Outro parente</option>
                        <option <?= isset($membros[0]['parentesco_membro']) && $membros[0]['parentesco_membro'] == 'Não parente' ? 'selected' : '' ?>>Não parente</option>
                    </select>
                </div>
            </div>

            <div class="displayFlex">

                <div class="margin">
                    <label for="mae_membro">Nome da Mãe</label><br>
                    <input type="text" autocomplete="random-string" name="mae_membro" id="mae_membro" required value="<?= ($membros[0]['mae_membro']) ?? '' ?>"><br><br>
                </div>

                <div class="margin">
                    <label for="pai_membro">Nome do Pai</label><br>
                    <input type="text" autocomplete="random-string" name="pai_membro" id="pai_membro" required value="<?= ($membros[0]['pai_membro']) ?? '' ?>"><br><br>
                </div>

                <div class="margin">
                    <label for="escolaridade_membro">Escolaridade</label><br>
                    <select name="escolaridade_membro" id="escolaridade_membro" required>
                        <option value=""></option>
                        <option <?= isset($membros[0]['escolaridade_membro']) && $membros[0]['escolaridade_membro'] == 'Analfabeto' ? 'selected' : '' ?>>Analfabeto</option>
                        <option <?= isset($membros[0]['escolaridade_membro']) && $membros[0]['escolaridade_membro'] == 'Alfabetizado' ? 'selected' : '' ?>>Alfabetizado</option>
                        <option <?= isset($membros[0]['escolaridade_membro']) && $membros[0]['escolaridade_membro'] == 'Fundamental Incompleto' ? 'selected' : '' ?>>Fundamental Incompleto</option>
                        <option <?= isset($membros[0]['escolaridade_membro']) && $membros[0]['escolaridade_membro'] == 'Fundamental Completo' ? 'selected' : '' ?>>Fundamental Completo</option>
                        <option <?= isset($membros[0]['escolaridade_membro']) && $membros[0]['escolaridade_membro'] == 'Médio Incompleto' ? 'selected' : '' ?>>Médio Incompleto</option>
                        <option <?= isset($membros[0]['escolaridade_membro']) && $membros[0]['escolaridade_membro'] == 'Médio Completo' ? 'selected' : '' ?>>Médio Completo</option>
                        <option <?= isset($membros[0]['escolaridade_membro']) && $membros[0]['escolaridade_membro'] == 'Superior Incompleto' ? 'selected' : '' ?>>Superior Incompleto</option>
                        <option <?= isset($membros[0]['escolaridade_membro']) && $membros[0]['escolaridade_membro'] == 'Superior Completo' ? 'selected' : '' ?>>Superior Completo</option>
                    </select><br><br>
                </div>

                <div class="margin">
                    <label for="cor_membro">Cor ou raça</label><br>
                    <select name="cor_membro" id="cor_membro" required>
                        <option></option>
                        <option <?= isset($membros[0]['cor_membro']) && $membros[0]['cor_membro'] == 'Amarela' ? 'selected' : '' ?>>Amarela</option>
                        <option <?= isset($membros[0]['cor_membro']) && $membros[0]['cor_membro'] == 'Branca' ? 'selected' : '' ?>>Branca</option>
                        <option <?= isset($membros[0]['cor_membro']) && $membros[0]['cor_membro'] == 'Indígena' ? 'selected' : '' ?>>Indígena</option>
                        <option <?= isset($membros[0]['cor_membro']) && $membros[0]['cor_membro'] == 'Preta' ? 'selected' : '' ?>>Preta</option>
                        <option <?= isset($membros[0]['cor_membro']) && $membros[0]['cor_membro'] == 'Pardo' ? 'selected' : '' ?>>Pardo</option>
                    </select>
                </div>

            </div>

            <div class="displayFlex">

                <div class="margin">
                    <label>
                        Sexo <br>
                        <input type="radio" name="sexo_membro" id="sexo_membro" value="masculino" required <?= isset($membros[0]['sexo_membro']) && $membros[0]['sexo_membro'] == 'masculino' ? 'checked' : '' ?>>
                        <label for="sexo_membro">Masculino</label><br>

                        <input type="radio" name="sexo_membro" id="sexo_membro" value="feminino" required <?= isset($membros[0]['sexo_membro']) && $membros[0]['sexo_membro'] == 'feminino' ? 'checked' : '' ?>>
                        <label for="sexo_membro">Feminino</label>
                    </label> <br><br>
                </div>

                <div class="margin">
                    <label for="assentado_membro">
                        É assentado da regorma agrária? <br>
                        <input type="radio" name="assentado_membro" id="assentado_membro" value="sim" required <?= isset($membros[0]['assentado_membro']) && $membros[0]['assentado_membro'] == 'sim' ? 'checked' : '' ?>>
                        <label for="sim">Sim</label><br>

                        <input type="radio" name="assentado_membro" id="assentado_membro" value="não" required <?= isset($membros[0]['assentado_membro']) && $membros[0]['assentado_membro'] == 'não' ? 'checked' : '' ?>>
                        <label for="nao">Não</label>
                    </label> <br><br>
                </div>

                <div class="margin">
                    <label for="credito_fundiario_membro">
                        É beneficiário do crédito fundiário? <br>
                        <input type="radio" name="credito_fundiario_membro" id="credito_fundiario_membro" value="sim" required <?= isset($membros[0]['credito_fundiario_membro']) && $membros[0]['credito_fundiario_membro'] == 'sim' ? 'checked' : '' ?>>
                        <label for="sim">Sim</label><br>

                        <input type="radio" name="credito_fundiario_membro" id="credito_fundiario_membro" value="não" required <?= isset($membros[0]['credito_fundiario_membro']) && $membros[0]['credito_fundiario_membro'] == 'não' ? 'checked' : '' ?>>
                        <label for="nao">Não</label>
                    </label> <br><br>
                </div>

                <div class="margin">
                    <label for="gestor_membro">
                        É gestor(a) da UFPA? <br>
                        <input type="radio" name="gestor_membro" id="gestor_membro" value="sim" required <?= isset($membros[0]['gestor_membro']) && $membros[0]['gestor_membro'] == 'sim' ? 'checked' : '' ?>>
                        <label for="sim">Sim</label><br>

                        <input type="radio" name="gestor_membro" id="gestor_membro" value="não" required <?= isset($membros[0]['gestor_membro']) && $membros[0]['gestor_membro'] == 'não' ? 'checked' : '' ?>>
                        <label for="nao">Não</label>
                    </label> <br><br>
                </div>

                <div class="margin">
                    <label for="mao_obra_membro">
                        É mão de obra na UFPA? <br>
                        <input type="radio" name="mao_obra_membro" id="mao_obra_membro" value="sim" required <?= isset($membros[0]['mao_obra_membro']) && $membros[0]['mao_obra_membro'] == 'sim' ? 'checked' : '' ?>>
                        <label for="sim">Sim</label><br>

                        <input type="radio" name="mao_obra_membro" id="mao_obra_membro" value="não" required <?= isset($membros[0]['mao_obra_membro']) && $membros[0]['mao_obra_membro'] == 'não' ? 'checked' : '' ?>>
                        <label for="nao">Não</label>
                    </label> <br><br>
                </div>
            </div>

        </fieldset>

        <div class="ajust-button">
            <div class="button-navigation">
                <a href="<?= $base; ?>/lista/membros/<?= $id_responsavel; ?>">
                    <div class="divButton button-red">Voltar</div>
                </a>
            </div>

            <div class="button-navigation button-center button-green" style="border-radius: 5px">
                <button>Editar</button>
            </div>
        </div>

    </form>
</div>

<script src="<?= $base; ?>/assets/js/script2.js"></script>
<script src="<?= $base; ?>/assets/js/api-cep.js"></script>

</body>

</html>