<tr>
    <th class="width-25">CPF:</th>
    <td><?= $titulares[0]['cpf_socio']; ?></td>

    <th class="width-25">Pai:</th>
    <td><?= ucfirst($titulares[0]['pai_socio']); ?></td>
</tr>
<tr>
    <th class="width-25">Nome:</th>
    <td><?= ucfirst($titulares[0]['nome_socio']); ?></td>

    <th class="width-25">Estado cívil:</th>
    <td><?= ucfirst($titulares[0]['estado_civil_socio']); ?></td>
</tr>
<tr>
    <th class="width-25">Data de nascimento:</th>
    <td><?= $titulares[0]['dn_socio']; ?></td>

    <th class="width-25">Cor/Raça:</th>
    <td><?= ucfirst($titulares[0]['cor_socio']); ?></td>
</tr>
<tr>
    <th class="width-25">Sexo:</th>
    <td><?= ucfirst($titulares[0]['sexo_socio']); ?></td>

    <th class="width-25">Escolaridade:</th>
    <td><?= ucfirst($titulares[0]['escolaridade_socio']); ?></td>
</tr>
<tr>
    <th class="width-25">UF de nascimento:</th>
    <td><?= ucfirst($titulares[0]['uf_nascimento_socio']); ?></td>

    <th class="width-25">Celular:</th>
    <td><?= ucfirst($titulares[0]['telefone_socio']); ?></td>
</tr>
<tr>
    <th class="width-25">Município de nascimento:</th>
    <td><?= ucfirst($titulares[0]['municipio_nascimento_socio']); ?></td>

    <th class="width-25">É assentado da reforma agrária?</th>
    <td><?= ucfirst($titulares[0]['assentado_socio']); ?></td>
</tr>
<tr>
    <th class="width-25">RG:</th>
    <td><?= $titulares[0]['rg_socio']; ?></td>

    <th class="width-25">É beneficiário do crédito fundiário?</th>
    <td><?= ucfirst($titulares[0]['credito_fundiario_socio']); ?></td>
</tr>
<tr>
    <th class="width-25">Parentesco:</th>
    <td><?= ucfirst($titulares[0]['parentesco_socio']); ?></td>

    <th class="width-25">É gestor da UFPA?</th>
    <td><?= ucfirst($titulares[0]['gestor_socio']); ?></td>
</tr>
<tr>
    <th class="width-25">Mãe:</th>
    <td><?= ucfirst($titulares[0]['mae_socio']); ?></td>

    <th class="width-25">É mão de obra da UFPA?</th>
    <td><?= ucfirst($titulares[0]['mao_obra_socio']); ?></td>
</tr>










<div>
    <div class="titleTable">Responsável - UFPA</div>
    <table class="enquadrar">
        <!-- Dados do responsável! -->
        <tr>
            <th class="width-25">CPF:</th>
            <td><?= $titulares[0]['cpf_socio']; ?></td>

            <th class="width-25">Pai:</th>
            <td><?= ucfirst($titulares[0]['pai_socio']); ?></td>
        </tr>
        <tr>
            <th class="width-25">Nome:</th>
            <td><?= ucfirst($titulares[0]['nome_socio']); ?></td>

            <th class="width-25">Estado cívil:</th>
            <td><?= ucfirst($titulares[0]['estado_civil_socio']); ?></td>
        </tr>
        <tr>
            <th class="width-25">Data de nascimento:</th>
            <td><?= $titulares[0]['dn_socio']; ?></td>

            <th class="width-25">Cor/Raça:</th>
            <td><?= ucfirst($titulares[0]['cor_socio']); ?></td>
        </tr>
        <tr>
            <th class="width-25">Sexo:</th>
            <td><?= ucfirst($titulares[0]['sexo_socio']); ?></td>

            <th class="width-25">Escolaridade:</th>
            <td><?= ucfirst($titulares[0]['escolaridade_socio']); ?></td>
        </tr>
        <tr>
            <th class="width-25">UF de nascimento:</th>
            <td><?= ucfirst($titulares[0]['uf_nascimento_socio']); ?></td>

            <th class="width-25">Celular:</th>
            <td><?= ucfirst($titulares[0]['telefone_socio']); ?></td>
        </tr>
        <tr>
            <th class="width-25">Município de nascimento:</th>
            <td><?= ucfirst($titulares[0]['municipio_nascimento_socio']); ?></td>

            <th class="width-25">É assentado da reforma agrária?</th>
            <td><?= ucfirst($titulares[0]['assentado_socio']); ?></td>
        </tr>
        <tr>
            <th class="width-25">RG:</th>
            <td><?= $titulares[0]['rg_socio']; ?></td>

            <th class="width-25">É beneficiário do crédito fundiário?</th>
            <td><?= ucfirst($titulares[0]['credito_fundiario_socio']); ?></td>
        </tr>
        <tr>
            <th class="width-25">Parentesco:</th>
            <td><?= ucfirst($titulares[0]['parentesco_socio']); ?></td>

            <th class="width-25">É gestor da UFPA?</th>
            <td><?= ucfirst($titulares[0]['gestor_socio']); ?></td>
        </tr>
        <tr>
            <th class="width-25">Mãe:</th>
            <td><?= ucfirst($titulares[0]['mae_socio']); ?></td>

            <th class="width-25">É mão de obra da UFPA?</th>
            <td><?= ucfirst($titulares[0]['mao_obra_socio']); ?></td>
        </tr>

    </table>

    <br>

    <?php if (!empty($membros) && isset($membros)) : ?>
        <?php foreach ($membros as $key => $value) : ?>
            <div class="titleTable">Membro <?= $key + 1; ?> - UFPA</div>
            <table class="enquadrar">
                <!-- Dados dos membros! -->
                <tr>
                    <th class="width-25">CPF:</th>
                    <td><?= $value['cpf_membro']; ?></td>

                    <th class="width-25">Pai:</th>
                    <td><?= ucfirst($value['pai_membro']); ?></td>
                </tr>
                <tr>
                    <th class="width-25">Nome:</th>
                    <td><?= ucfirst($value['nome_membro']); ?></td>

                    <th class="width-25">Estado cívil:</th>
                    <td><?= ucfirst($value['estado_civil_membro']); ?></td>
                </tr>
                <tr>
                    <th class="width-25">Data de nascimento:</th>
                    <td><?= $value['dn_membro']; ?></td>

                    <th class="width-25">Cor/Raça:</th>
                    <td><?= ucfirst($value['cor_membro']); ?></td>
                </tr>
                <tr>
                    <th class="width-25">Sexo:</th>
                    <td><?= ucfirst($value['sexo_membro']); ?></td>

                    <th class="width-25">Escolaridade:</th>
                    <td><?= ucfirst($value['escolaridade_membro']); ?></td>
                </tr>
                <tr>
                    <th class="width-25">UF de nascimento:</th>
                    <td><?= ucfirst($value['uf_nascimento_membro']); ?></td>

                    <th class="width-25">Celular:</th>
                    <td><?= ucfirst($value['telefone_membro']); ?></td>
                </tr>
                <tr>
                    <th class="width-25">Município de nascimento:</th>
                    <td><?= ucfirst($value['municipio_nascimento_membro']); ?></td>

                    <th class="width-25">É assentado da reforma agrária?</th>
                    <td><?= ucfirst($value['assentado_membro']); ?></td>
                </tr>
                <tr>
                    <th class="width-25">RG:</th>
                    <td><?= $value['rg_membro']; ?></td>

                    <th class="width-25">É beneficiário do crédito fundiário?</th>
                    <td><?= ucfirst($value['credito_fundiario_membro']); ?></td>
                </tr>
                <tr>
                    <th class="width-25">Parentesco:</th>
                    <td><?= ucfirst($value['parentesco_membro']); ?></td>

                    <th class="width-25">É gestor da UFPA?</th>
                    <td><?= ucfirst($value['gestor_membro']); ?></td>
                </tr>
                <tr>
                    <th class="width-25">Mãe:</th>
                    <td><?= ucfirst($value['mae_membro']); ?></td>

                    <th class="width-25">É mão de obra da UFPA?</th>
                    <td><?= ucfirst($value['mao_obra_membro']); ?></td>
                </tr>


            </table>

            <br>
        <?php endforeach ?>
    <?php endif ?>
    <div class="titleTable">Endereço</div>
    <table class="enquadrar">
        <tr>
            <th colspan="2" class="width-25">CEP</th>
            <td colspan="2"><?= $titulares[0]['cep_socio']; ?></td>

            <th colspan="2" class="width-25">Reside em área de quilombo ou outras comunidades tradicionais?</th>
            <td colspan="2">Não</td>
        </tr>
        <tr>
            <th colspan="2" class="width-25">UF</th>
            <td colspan="2"><?= $titulares[0]['uf_socio']; ?></td>

            <th colspan="2" class="width-25">Reside em aldeias ou terra indígenas?</th>
            <td colspan="2">Não</td>
        </tr>
        <tr>
            <th colspan="2" class="width-25">Município</th>
            <td colspan="2"><?= $titulares[0]['municipio_socio']; ?></td>

            <th colspan="2" class="width-25">utilizar as informações acima para correspondência?</th>
            <td colspan="2">Sim</td>
        </tr>
        <tr>
            <th colspan="2" class="width-25">Endereço</th>
            <td colspan="2"><?= $titulares[0]['endereco_socio']; ?></td>

            <th colspan="2" class="width-25"></th>
            <td colspan="2"></td>
        </tr>


    </table>

    <br>

    <div class="titleTable">Renda</div>

    <?php if (isset($renda) && !empty($renda)) : ?>
        <div>
            <table class="centro">
                <tr>
                    <th>Data Inclusão</th>
                    <th>Categoria</th>
                    <th>Valor</th>
                </tr>
                <?php foreach ($renda as $value) : ?>
                    <tr>
                        <td><?= $value['data_inclusao']; ?></td>
                        <td><?= $value['categoria']; ?></td>
                        <td>R$ <?= number_format($value['valor'], 2, ',', '.'); ?></td>
                    </tr>
                <?php endforeach ?>

            </table>

            <br>

            <table class="centro">
                <tr>
                    <th>Renda Rural</th>
                    <th>R$ <?= number_format($valoresCategoria['valRural'], 2, ',', '.'); ?></th>
                </tr>
                <tr>
                    <th>Renda Urbana</th>
                    <th>R$ <?= number_format($valoresCategoria['valUrbano'], 2, ',', '.'); ?></th>
                </tr>
                <tr>
                    <th>Programas Sociais</th>
                    <th>R$ <?= number_format($valoresCategoria['valProgramasSociais'], 2, ',', '.'); ?></th>
                </tr>
                <tr>
                    <th>% Rural</th>
                    <th><?= number_format($valoresCategoria['porcentagem'], 2, ',', '.'); ?>%</th>
                </tr>

            </table>
        </div>
    <?php endif ?>

    <br>

    <div class="titleTable">Propriedade</div>
    <?php if (isset($propriedade) && !empty($propriedade)) : ?>
        <table class="enquadrar">
            <!-- Dados Titular 1 -->
            <tr>
                <th colspan="2" class="width-25">Nome da Propriedade</th>
                <td colspan="2"><?= $propriedade[0]['propriedade']; ?></td>
            </tr>
            <tr>
                <th colspan="2" class="width-25">Denominação do Imóvel</th>
                <td colspan="2"><?= $propriedade[0]['denominacao']; ?></td>
            </tr>
            <tr>
                <th colspan="2" class="width-25">Área PLantada</th>
                <td colspan="2"><?= $propriedade[0]['area']; ?>ha</td>
            </tr>
            <tr>
                <th colspan="2" class="width-25">Nome Proprietário</th>
                <td colspan="2"><?= $propriedade[0]['proprietario']; ?></td>
            </tr>
            <tr>
                <th colspan="2" class="width-25">CPF do Proprietário</th>
                <td colspan="2"><?= $propriedade[0]['cpfP']; ?></td>
            </tr>
            <tr>
                <th colspan="2" class="width-25">Nome Representante Legal</th>
                <td colspan="2"><?= $propriedade[0]['RLegal']; ?></td>
            </tr>
            <tr>
                <th colspan="2">CPF do Representante Legal</th>
                <td colspan="2"><?= $propriedade[0]['cpfR']; ?></td>
            </tr>
        </table>
    <?php endif ?>

    <br>

</div>