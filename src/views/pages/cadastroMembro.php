<?php $render('header'); ?>

<div class="container">
    <h1>Cadastrar membro</h1>
<input type="hidden" name="nome_mae" value="<?=$socio[0]['mae_socio'];?>" id="nome_mae">
<input type="hidden" name="nome_pai" value="<?=$socio[0]['pai_socio'];?>" id="nome_pai">
<input type="hidden" name="nome_socio" value="<?=$socio[0]['nome_socio'];?>" id="nome_socio">
<input type="hidden" name="sexo_socio" value="<?=$socio[0]['sexo_socio'];?>" id="sexo_socio">
    <form action="" method="post">

        <fieldset>
            <legend>
                <h3>Dados do membro</h3>
            </legend>

            <div class="displayFlex">
                <div class="margin">
                    <label for="cpf_membro" id="label-cpf">CPF</label><br>
                    <input type="text" autocomplete="random-string" name="cpf_membro" id="inputCPF2" placeholder="___.___.___-___" required value="<?= ($dados['cpf_membro']) ?? '' ?>"><br><br>
                </div>

                <div class="margin">
                    <label for="nome_membro">Nome Completo</label> <br>
                    <input type="text" autocomplete="random-string" name="nome_membro" id="nome_membro" required value="<?= ($dados['nome_membro']) ?? '' ?>"> <br><br>
                </div>

                <div class="margin">
                    <label for="dn_membro">Data de Nascimento</label><br>
                    <input type="date" name="dn_membro" id="dn_membro" required value="<?= ($dados['dn_membro']) ?? '' ?>"><br><br>
                </div>

                <div class="margin">
                    <label for="rg_membro">RG</label><br>
                    <input type="text" autocomplete="random-string" name="rg_membro" id="rg_membro" required value="<?= ($dados['rg_membro']) ?? '' ?>"><br><br>
                </div>

                <div class="margin">
                    <label for="telefone_membro">Celular</label><br>
                    <input type="text" autocomplete="random-string" name="telefone_membro" id="telefone_membro" value="<?= ($dados['telefone_membro']) ?? '' ?>"><br><br>
                </div>

            </div>

            <div class="displayFlex">

                <div class="margin">
                    <label for="estado_civil_membro">Estado Civil</label>
                    <select name="estado_civil_membro" id="estado_civil_membro" required>Estado Civil
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
                    <select name="uf_nascimento_membro" id="uf_nascimento_socio" required>
                        <option value=""></option>
                    </select>

                </div>

                <div class="margin">
                    <label for="municipio_nascimento_socio">Município de Nascimento</label><br>
                    <select name="municipio_nascimento_membro" id="municipio_nascimento_socio">
                        <option value=""></option>
                    </select>
                </div>

                <div class="margin">
                    <label for="parentesco_membro">Parentesco</label><br>
                    <select name="parentesco_membro" id="parentesco_membro" required>
                        <option></option>
                        <option>Cônjugue ou companheiro(a)</option>
                        <option>Filho</option>
                        <option>Enteado(a)</option>
                        <option>Irmão(a)</option>
                        <option>Neto(a) ou bisneto(a)</option>
                        <option>Pai ou mãe</option>
                        <option>Sogro(a)</option>
                        <option>Genro ou nora</option>
                        <option>Outro parente</option>
                        <option>Não parente</option>
                    </select>
                </div>
            </div>

            <div class="displayFlex">

                <div class="margin">
                    <label for="mae_membro">Nome da Mãe</label><br>
                    <input type="text" autocomplete="random-string" name="mae_membro" id="mae_membro" required value="<?= ($dados['mae_membro']) ?? '' ?>"><br><br>
                </div>

                <div class="margin">
                    <label for="pai_membro">Nome do Pai</label><br>
                    <input type="text" autocomplete="random-string" name="pai_membro" id="pai_membro" required value="<?= ($dados['pai_membro']) ?? '' ?>"><br><br>
                </div>

                <div class="margin">
                    <label for="escolaridade_membro">Escolaridade</label><br>
                    <select name="escolaridade_membro" id="escolaridade_membro" required>
                        <option value=""></option>
                        <option <?= isset($dados['escolaridade_membro']) && $dados['escolaridade_membro'] == 'Analfabeto' ? 'selected' : '' ?>>Analfabeto</option>
                        <option <?= isset($dados['escolaridade_membro']) && $dados['escolaridade_membro'] == 'Alfabetizado' ? 'selected' : '' ?>>Alfabetizado</option>
                        <option <?= isset($dados['escolaridade_membro']) && $dados['escolaridade_membro'] == 'Fundamental Incompleto' ? 'selected' : '' ?>>Fundamental Incompleto</option>
                        <option <?= isset($dados['escolaridade_membro']) && $dados['escolaridade_membro'] == 'Fundamental Completo' ? 'selected' : '' ?>>Fundamental Completo</option>
                        <option <?= isset($dados['escolaridade_membro']) && $dados['escolaridade_membro'] == 'Médio Incompleto' ? 'selected' : '' ?>>Médio Incompleto</option>
                        <option <?= isset($dados['escolaridade_membro']) && $dados['escolaridade_membro'] == 'Médio Completo' ? 'selected' : '' ?>>Médio Completo</option>
                        <option <?= isset($dados['escolaridade_membro']) && $dados['escolaridade_membro'] == 'Superior Incompleto' ? 'selected' : '' ?>>Superior Incompleto</option>
                        <option <?= isset($dados['escolaridade_membro']) && $dados['escolaridade_membro'] == 'Superior Completo' ? 'selected' : '' ?>>Superior Completo</option>
                    </select><br><br>
                </div>

                <div class="margin">
                    <label for="cor_membro">Cor ou raça</label><br>
                    <select name="cor_membro" id="cor_membro" required>
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
                    <label for="sexo_membro">
                        Sexo <br>
                        <input type="radio" name="sexo_membro" id="sexo_membro" value="masculino" required <?= isset($dados['sexo_membro']) && $dados['sexo_membro'] == 'masculino' ? 'checked' : '' ?>>
                        <label for="sim">Masculino</label><br>

                        <input type="radio" name="sexo_membro" id="sexo_membro" value="feminino" required <?= isset($dados['sexo_membro']) && $dados['sexo_membro'] == 'feminino' ? 'checked' : '' ?>>
                        <label for="sexo_membro">Feminino</label>
                    </label> <br><br>
                </div>

                <div class="margin">
                    <label for="assentado_membro">
                        É assentado da regorma agrária? <br>
                        <input type="radio" name="assentado_membro" id="assentado_membro" value="sim" required <?= isset($dados['assentado_membro']) && $dados['assentado_membro'] == 'sim' ? 'checked' : '' ?>>
                        <label for="sim">Sim</label><br>

                        <input type="radio" name="assentado_membro" id="assentado_membro" value="não" required <?= isset($dados['assentado_membro']) && $dados['assentado_membro'] == 'não' ? 'checked' : '' ?>>
                        <label for="nao">Não</label>
                    </label> <br><br>
                </div>

                <div class="margin">
                    <label for="credito_fundiario_membro">
                        É beneficiário do crédito fundiário? <br>
                        <input type="radio" name="credito_fundiario_membro" id="credito_fundiario_membro" value="sim" required <?= isset($dados['credito_fundiario_membro']) && $dados['credito_fundiario_membro'] == 'sim' ? 'checked' : '' ?>>
                        <label for="sim">Sim</label><br>

                        <input type="radio" name="credito_fundiario_membro" id="credito_fundiario_membro" value="não" required <?= isset($dados['credito_fundiario_membro']) && $dados['credito_fundiario_membro'] == 'não' ? 'checked' : '' ?>>
                        <label for="nao">Não</label>
                    </label> <br><br>
                </div>

                <div class="margin">
                    <label for="gestor_membro">
                        É gestor(a) da UFPA? <br>
                        <input type="radio" name="gestor_membro" id="gestor_membro" value="sim" required <?= isset($dados['gestor_membro']) && $dados['gestor_membro'] == 'sim' ? 'checked' : '' ?>>
                        <label for="sim">Sim</label><br>

                        <input type="radio" name="gestor_membro" id="gestor_membro" value="não" required <?= isset($dados['gestor_membro']) && $dados['gestor_membro'] == 'não' ? 'checked' : '' ?>>
                        <label for="nao">Não</label>
                    </label> <br><br>
                </div>

                <div class="margin">
                    <label for="mao_obra_membro">
                        É mão de obra na UFPA? <br>
                        <input type="radio" name="mao_obra_membro" id="mao_obra_membro" value="sim" required <?= isset($dados['mao_obra_membro']) && $dados['mao_obra_membro'] == 'sim' ? 'checked' : '' ?>>
                        <label for="sim">Sim</label><br>

                        <input type="radio" name="mao_obra_membro" id="mao_obra_membro" value="não" required <?= isset($dados['mao_obra_membro']) && $dados['mao_obra_membro'] == 'não' ? 'checked' : '' ?>>
                        <label for="nao">Não</label>
                    </label> <br><br>
                </div>
            </div>

        </fieldset>

        <div class="ajust-button">
            <div class="button-navigation">
                <a href="<?= $base; ?>/lista/membros/<?= $id_socio_responsavel; ?>">
                    <div class="divButton button-red">Voltar</div>
                </a>
            </div>

            <div class="button-navigation button-center button-green" style="border-radius: 5px">
                <button>Cadastrar</button>
            </div>
        </div>

    </form>
</div>

<script src="<?= $base; ?>/assets/js/cadastros.js"></script>
<script src="<?= $base; ?>/assets/js/api-cep.js"></script>

</body>

</html>