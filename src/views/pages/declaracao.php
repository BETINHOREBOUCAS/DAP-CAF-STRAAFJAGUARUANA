<?php

use Mpdf\Mpdf;

$mpdf = new Mpdf();
$data = new DateTime();
$data->setTimezone(new DateTimeZone('America/Fortaleza'));
$dataAtutal = $data->format('d/m/Y');
$datafuturo = $data->format('d/m/') . $data->format('Y') + 2;
?>

<?php
ob_start();
?>

<style>
    table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }

    .enquadrar {
        font-size: 13px;
    }

    .centro {
        font-size: 13px;
    }

    .enquadrar td,
    .enquadrar th {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 2px;
        padding-left: 10px;
    }

    .centro td,
    .centro th {
        text-align: center;
        padding: 2px;
        border: 1px solid #dddddd;
        margin-left: 5px;
    }

    .titleTable {
        text-align: center;
        font-size: 15px;
        font-weight: bold;
        color: blue;
    }

    .titulo {
        border: 1px solid black;
        font-size: 18px;
        font-weight: bolder;
        text-align: center;
    }

    .container {
        display: flex;
        width: 100%;
        justify-content: center;
    }

    .assinatura {
        text-align: center;
    }

    p {
        text-align: justify;
        font-size: 11pt;
        font-family: 'Times New Roman', Times, serif;
        text-indent: 50px;
    }

    .text {
        text-align: justify;
    }

    .data {
        text-align: right;
    }
</style>

<?php
$css = ob_get_contents();
ob_end_clean();

//Inicia aqui a criação de declaração.
ob_start();
?>

<!-- Declaração Consumo-->

<div class="titulo">
    AUTO DECLARAÇÃO DE RENDA FAMILIAR DA UNIDADE FAMILIAR DE PRODUÇÃO AGRÁRIA (UFPA)
</div>

<p>Eu, <strong><?= mb_convert_case($doc_socio[0]['nome_socio'], MB_CASE_TITLE); ?></strong>, portador(a) do RG
    <?= $doc_socio[0]['rg_socio']; ?>, CPF <?= $doc_socio[0]['cpf_socio']; ?>, residente e domiciliado em
    <?= mb_convert_case($doc_socio[0]['endereco_socio'], MB_CASE_TITLE); ?>,
    <?= mb_convert_case($doc_socio[0]['bairro_socio'], MB_CASE_TITLE); ?>, município de
    <?= mb_convert_case($doc_socio[0]['municipio_socio'], MB_CASE_TITLE); ?>, estado do
    <?= mb_convert_case($doc_socio[0]['uf_socio'], MB_CASE_TITLE); ?>, CEP:
    <?= mb_convert_case($doc_socio[0]['cep_socio'], MB_CASE_TITLE); ?>, na qualidade de responsável pela administração
    da <strong>Unidade Familiar de Produção Agrária - UFPA</strong> situada em
    <?= mb_convert_case($propriedade[0]['denominacao'], MB_CASE_TITLE); ?>, denominado como
    <?= $propriedade[0]['propriedade']; ?>, no município de
    <?= mb_convert_case($doc_socio[0]['municipio_socio'], MB_CASE_TITLE); ?>, estado do
    <?= mb_convert_case($doc_socio[0]['uf_socio'], MB_CASE_TITLE); ?></p>


<!-- Teste para valores -->

<pre>
    <?php
    /*
        print_r($valoresCategoria['lista']);
        exit;
    */
    ?>
</pre>



<table class="centro">
    <tr>
        <th>Produto</th>
        <th>Valor</th>
    </tr>

    <?php foreach ($valoresCategoria['lista']['rural'] as $value) : ?>
        <tr>
            <td><?= $value['categoria']; ?></td>
            <td>R$ <?= number_format($value['valor'], 2, ',', '.'); ?></td>
        </tr>
    <?php endforeach ?>

</table>

<p>
    <strong>DECLARO</strong> que a renda bruta é de R$
    <?= number_format($valoresCategoria['valRural'] + $valoresCategoria['valProgramasSociais'], 2, ',', '.'); ?> reais,
    oriunda do <strong>desenvolvimento de atividades de atividades econômicas do estabelecimento</strong> identificado
    anteriormente, auferidos nos últimos 12 meses.
</p>

<p>
    <strong>DECLARO</strong> que a renda bruta obtida <strong>fora do estabelecimento</strong> é composta pela soma das
    rendas auferidas pelos membros da (Unidade Familiar de Produção Agrária – UFPA), sendo composta por:
</p>

<table class="centro">
    <tr>
        <th>Tipo de Renda</th>
        <th>Membro Da Família</th>
        <th>Valor</th>
    </tr>

    <?php if (!empty($valoresCategoria['lista']['urbano']) && isset($valoresCategoria['lista']['urbano'])) : ?>
        <?php foreach ($valoresCategoria['lista']['urbano'] as $value) : ?>
            <tr>
                <td><?= $value['categoria']; ?></td>
                <td><?= $value['membro']; ?></td>
                <td>R$ <?= number_format($value['valor'], 2, ',', '.'); ?></td>
            </tr>
        <?php endforeach ?>
    <?php endif ?>
    <tr>
        <th colspan="2">Valor Total</th>
        <th>R$ <?= number_format($valoresCategoria['valUrbano'], 2, ',', '.'); ?></th>
    </tr>
</table>

<p>
    <strong>DECLARO</strong> para todos os fins de direito e sob as penas da Lei, serem verdadeiras as informações
    prestadas nesta Declaração, ciente de que a prestação de informação falsa e/ou apresentação de documento falso
    poderá incorrer nas penas de crime previstas nos Arts. 297, 298 e 299 do Código Penal - Decreto Lei nº 2.848, de 7
    de dezembro de 1940, além da inativação do documento emitido, acaso configurada a prestação de informação falsa
    apurada posteriormente à emissão do documento, em procedimento que assegure a ampla defesa e o contraditório, de
    acordo com o Art. 67 da Portaria SAF/MAPA nº 242, de 8 de novembro de 2021, da Secretaria de Agricultura Familiar e
    Cooperativismo do Ministério da Agricultura, Pecuária e Abastecimento.
</p>

<!--
    <p>
    DECLARO sob as penas do “Art. 299 do CPB, in verbis: Omitir, em documento público ou particular, declaração que dele devia constar, ou nele inserir ou fazer inserir declaração falsa ou diversa da que devia ser escrita, com o fim de prejudicar direito, criar obrigação ou alterar a verdade sobre fato juridicamente relevante:
    Pena - reclusão, de 1 (um) a 5 (cinco) anos, e multa, se o documento é público, e reclusão de 1 (um) a 3 (três) anos, e multa, se o documento é particular”, <strong>que para sustentação da família tenho o trabalho familiar como base na exploração do estabelecimento e que não detenho nenhuma renda fora da unidade produtiva. Declaro também que produzi e utilizei para o consumo familiar, <?= $renda['valoresCategoria']['lista'] ?> auferindo uma renda de R$ <?= number_format($renda['valoresCategoria']['valConsumo'], 2, ',', '.'); ?> durante os últimos 12 meses. Pelo que firmo a presente declaração e termos em dou fé.</strong>

</p>
-->

<br>

<div class="data">
    Jaguaruana - CE em <?= $dataAtutal; ?>.
</div>
<br><br><br>

<div class="container">
    <div class="assinatura">
        ________________________________________________ <br>
        <strong>
            <?= mb_convert_case($doc_socio[0]['nome_socio'], MB_CASE_UPPER); ?> <br>
            CPF <?= $doc_socio[0]['cpf_socio']; ?> <br>
            RESPONSÁVEL DA UFPA <br><br>
        </strong>
    </div>
</div>

<?php
$html = ob_get_contents();
ob_end_clean();
$mpdf->WriteHTML($css . $html);
$mpdf->AddPage();

?>

<!-- Declaração de enquadramento -->

<div class="titulo">
    <h2>Informações Para Emissão do CAF</h2>
</div>
<br>
<div>
    <div class="titleTable">Responsável pela UFPA</div>
    <table class="enquadrar">

        <tr>
            <th class="width-25">CPF</th>
            <td><?= $doc_socio[0]['cpf_socio']; ?></td>
        </tr>
        <tr>
            <th class="width-25">Nome</th>
            <td><?= mb_convert_case($doc_socio[0]['nome_socio'], MB_CASE_TITLE); ?></td>
        </tr>
        <tr>
            <th class="width-25">Nascimento</th>
            <td><?= $doc_socio[0]['dn_socio']; ?></td>
        </tr>
        <tr>
            <th class="width-25">Sexo</th>
            <td><?= mb_convert_case($doc_socio[0]['sexo_socio'], MB_CASE_TITLE); ?></td>
        </tr>
        <tr>
            <th class="width-25">UF do nascimento</th>
            <td><?= mb_convert_case($doc_socio[0]['uf_nascimento_socio'], MB_CASE_TITLE); ?></td>
        </tr>
        <tr>
            <th class="width-25">Município de nascimento</th>
            <td><?= mb_convert_case($doc_socio[0]['municipio_nascimento_socio'], MB_CASE_TITLE); ?></td>
        </tr>
        <tr>
            <th class="width-25">RG</th>
            <td><?= $doc_socio[0]['rg_socio']; ?></td>
        </tr>
        <tr>
            <th class="width-25">Parentesco</th>
            <td><?= $doc_socio[0]['parentesco_socio']; ?></td>
        </tr>
        <tr>
            <th class="width-25">Mãe</th>
            <td><?= mb_convert_case($doc_socio[0]['mae_socio'], MB_CASE_TITLE); ?></td>
        </tr>
        <tr>
            <th class="width-25">Pai</th>
            <td><?= mb_convert_case($doc_socio[0]['pai_socio'], MB_CASE_TITLE); ?></td>
        </tr>
        <tr>
            <th class="width-25">Estado Cívil</th>
            <td><?= mb_convert_case($doc_socio[0]['estado_civil_socio'], MB_CASE_TITLE); ?></td>
        </tr>
        <tr>
            <th class="width-25">Cor</th>
            <td><?= mb_convert_case($doc_socio[0]['cor_socio'], MB_CASE_TITLE); ?></td>
        </tr>
        <tr>
            <th class="width-25">Escolaridade</th>
            <td><?= mb_convert_case($doc_socio[0]['escolaridade_socio'], MB_CASE_TITLE); ?></td>
        </tr>
        <tr>
            <th class="width-25">Telefone</th>
            <td><?= $doc_socio[0]['telefone_socio']; ?></td>
        </tr>
        <tr>
            <th class="width-25">É assentado da reforma agrária?</th>
            <td><?= mb_convert_case($doc_socio[0]['assentado_socio'], MB_CASE_TITLE); ?></td>
        </tr>
        <tr>
            <th class="width-25">É beneficiário do crédito fundiário?</th>
            <td><?= mb_convert_case($doc_socio[0]['credito_fundiario_socio'], MB_CASE_TITLE); ?></td>
        </tr>
        <tr>
            <th class="width-25">É gestor da UFPA</th>
            <td><?= mb_convert_case($doc_socio[0]['gestor_socio'], MB_CASE_TITLE); ?></td>
        </tr>
        <tr>
            <th class="width-25">É mão de obra?</th>
            <td><?= mb_convert_case($doc_socio[0]['mao_obra_socio'], MB_CASE_TITLE); ?></td>
        </tr>

    </table>

    <br>

    <div class="titleTable">Endereço</div>
    <table class="enquadrar">
        <tr>
            <th>Endereço</th>
            <td><?= mb_convert_case($doc_socio[0]['endereco_socio'], MB_CASE_TITLE); ?></td>
        </tr>
        <tr>
            <th>Bairro</th>
            <td><?= mb_convert_case($doc_socio[0]['bairro_socio'], MB_CASE_TITLE); ?></td>
        </tr>
        <tr>
            <th>Cidade/Estado</th>
            <td><?= mb_convert_case($doc_socio[0]['municipio_socio'] . '/' . $doc_socio[0]['uf_socio'], MB_CASE_TITLE); ?></td>
        </tr>

    </table>
    <br>
    <div class="titleTable">Propriedade</div>
    <table class="enquadrar">
        <tr>
            <th>Imóvel</th>
            <td><?= mb_convert_case($propriedade[0]['propriedade'], MB_CASE_TITLE); ?></td>
        </tr>
        <tr>
            <th>Denominação</th>
            <td><?= mb_convert_case($propriedade[0]['denominacao'], MB_CASE_TITLE); ?></td>
        </tr>
        <tr>
            <th>Bairro</th>
            <td><?= mb_convert_case($propriedade[0]['bairroPropriedade'], MB_CASE_TITLE); ?></td>
        </tr>
        <tr>
            <th>Área plantada</th>
            <td><?= mb_convert_case($propriedade[0]['area'], MB_CASE_TITLE); ?></td>
        </tr>
        <tr>
            <th>Área total</th>
            <td><?= mb_convert_case($propriedade[0]['areaTotal'], MB_CASE_TITLE); ?></td>
        </tr>
        <tr>
            <th>Condição de uso da terra</th>
            <td><?= mb_convert_case("parceria", MB_CASE_TITLE); ?></td>
        </tr>

    </table>

</div>

<?php

$html = ob_get_contents();
ob_end_clean();

$mpdf->WriteHTML($css . $html);
$mpdf->AddPage();

ob_start();

?>

<!-- Dados dos membros! -->

<?php foreach ($membros as $key => $value) : ?>
    <div class="titleTable">Membros da Família <?= $key + 1; ?></div>
    <table class="enquadrar">
        <tr>
            <th class="width-25">CPF</th>
            <td><?= $value['cpf_membro']; ?></td>
        </tr>
        <tr>
            <th class="width-25">Nome</th>
            <td><?= mb_convert_case($value['nome_membro'], MB_CASE_TITLE); ?></td>
        </tr>
        <tr>
            <th class="width-25">Nascimento</th>
            <td><?= $value['dn_membro']; ?></td>
        </tr>
        <tr>
            <th class="width-25">Sexo</th>
            <td><?= mb_convert_case($value['sexo_membro'], MB_CASE_TITLE); ?></td>
        </tr>
        <tr>
            <th class="width-25">UF do nascimento</th>
            <td><?= mb_convert_case($value['uf_nascimento_membro'], MB_CASE_TITLE); ?></td>
        </tr>
        <tr>
            <th class="width-25">Município de nascimento</th>
            <td><?= mb_convert_case($value['municipio_nascimento_membro'], MB_CASE_TITLE); ?></td>
        </tr>
        <tr>
            <th class="width-25">RG</th>
            <td><?= $value['rg_membro']; ?></td>
        </tr>
        <tr>
            <th class="width-25">Parentesco</th>
            <td><?= $value['parentesco_membro']; ?></td>
        </tr>
        <tr>
            <th class="width-25">Mãe</th>
            <td><?= mb_convert_case($value['mae_membro'], MB_CASE_TITLE); ?></td>
        </tr>
        <tr>
            <th class="width-25">Pai</th>
            <td><?= mb_convert_case($value['pai_membro'], MB_CASE_TITLE); ?></td>
        </tr>
        <tr>
            <th class="width-25">Estado Cívil</th>
            <td><?= mb_convert_case($value['estado_civil_membro'], MB_CASE_TITLE); ?></td>
        </tr>
        <tr>
            <th class="width-25">Cor</th>
            <td><?= mb_convert_case($value['cor_membro'], MB_CASE_TITLE); ?></td>
        </tr>
        <tr>
            <th class="width-25">Escolaridade</th>
            <td><?= mb_convert_case($value['escolaridade_membro'], MB_CASE_TITLE); ?></td>
        </tr>
        <tr>
            <th class="width-25">Telefone</th>
            <td><?= $value['telefone_membro']; ?></td>
        </tr>
        <tr>
            <th class="width-25">É assentado da reforma agrária?</th>
            <td><?= mb_convert_case($value['assentado_membro'], MB_CASE_TITLE); ?></td>
        </tr>
        <tr>
            <th class="width-25">É beneficiário do crédito fundiário?</th>
            <td><?= mb_convert_case($value['credito_fundiario_membro'], MB_CASE_TITLE); ?></td>
        </tr>
        <tr>
            <th class="width-25">É gestor da UFPA</th>
            <td><?= mb_convert_case($value['gestor_membro'], MB_CASE_TITLE); ?></td>
        </tr>
        <tr>
            <th class="width-25">É mão de obra?</th>
            <td><?= mb_convert_case($value['mao_obra_membro'], MB_CASE_TITLE); ?></td>
        </tr>
    </table>

    <br><br>
<?php endforeach ?>

<br><br><br>

<?php

$html = ob_get_contents();
ob_end_clean();

$mpdf->WriteHTML($css . $html);
$mpdf->AddPage();


ob_start();

?>

<!-- Declaração Proprietário -->

<div class="titulo" style="font-size: 25px;">
    CONTRATO PARTICULAR DE PARCERIA RURAL
</div>

<h4><u>I – IDENTIFICAÇÃO DAS PARTES</u></h4>

<div class="text">

    <strong>PARCEIRO-OUTORGANTE:</strong> <?= mb_convert_case($propriedade[0]['proprietario'], MB_CASE_TITLE); ?>,
    brasileiro,
    <?= $propriedade[0]['estado_civil_proprietario']; ?>, portador da Carteira de Identidade Nº
    <?= $propriedade[0]['rgP']; ?> e do C.P.F. Nº <?= $propriedade[0]['cpfP']; ?>, residente e domiciliado em
    <?= mb_convert_case($propriedade[0]['endereco_proprietario'], MB_CASE_TITLE); ?>, bairro:
    <?= mb_convert_case($propriedade[0]['bairro_proprietario'], MB_CASE_LOWER); ?>, município de
    <?= mb_convert_case($propriedade[0]['municipio_proprietario'], MB_CASE_TITLE); ?>, estado do
    <?= mb_convert_case($propriedade[0]['uf_proprietario'], MB_CASE_TITLE); ?>.

    <br><br>

    <strong>PARCEIRO-OUTORGADO:</strong> <?= mb_convert_case($doc_socio[0]['nome_socio'], MB_CASE_TITLE); ?>, brasileiro,
    <?= mb_convert_case($doc_socio[0]['estado_civil_socio'], MB_CASE_LOWER); ?>, portador da Carteira de Identidade Nº
    <?= $doc_socio[0]['rg_socio']; ?> e do C.P.F. Nº <?= $doc_socio[0]['cpf_socio']; ?>, residente e domiciliado em
    <?= mb_convert_case($doc_socio[0]['endereco_socio'], MB_CASE_TITLE); ?>, bairro:
    <?= mb_convert_case($doc_socio[0]['bairro_socio'], MB_CASE_LOWER); ?>, município de
    <?= mb_convert_case($doc_socio[0]['municipio_socio'], MB_CASE_TITLE); ?>, estado do
    <?= mb_convert_case($doc_socio[0]['uf_socio'], MB_CASE_TITLE); ?>.

    <br><br>

    As partes acima identificadas, capazes, tem entre si, justo e acertado o presente <strong>Contrato de Parceria Rural</strong>, que se regerá pelas cláusulas e condições descritas:

    <h4><u>II – DAS CLÁUSULAS DO CONTRATO</u></h4>

    <strong><strong>Cláusula 1ª</strong>.</strong> O presente instrumento tem como OBJETO, o imóvel constituído em <?= mb_convert_case($propriedade[0]['propriedade'], MB_CASE_TITLE); ?>, de propriedade
    do PARCEIRO-OUTORGANTE, qualificado neste contrato, tem área total de <?= $propriedade[0]['areaTotal']; ?> ha, está localizada em <?= mb_convert_case($propriedade[0]['denominacao'], MB_CASE_TITLE); ?>, <?= mb_convert_case($propriedade[0]['bairroPropriedade'], MB_CASE_LOWER); ?>, município de <?= mb_convert_case($propriedade[0]['municipio_proprietario'], MB_CASE_TITLE); ?>, estado do <?= mb_convert_case($propriedade[0]['uf_proprietario'], MB_CASE_TITLE); ?>; está
    devidamente cadastrado no ITR/INCRA, sob N° <?= $propriedade[0]['registro']; ?>.

    <br><br>


    <strong><strong>Cláusula 2ª</strong>.</strong> O presente Contrato de Parceria Rural para Exploração Agropecuária celebrado entre o PARCEIRO-OUTORGANTE e o PARCEIRO-OUTORGADO, terá vigência de de 2 (dois) anos, iniciada em <?= $dataAtutal; ?> e encerra em <?= $datafuturo; ?>, data em que será restituída a posse do imóvel a quem de direito.

    <br><br>

    <strong><strong>Cláusula 3ª</strong>.</strong> O PARCEIRO-OUTORGANTE cede para o PARCEIRO-OUTORGADO uma gleba de terra da referida propriedade, com uma área de <?= $propriedade[0]['area']; ?> hectare, demarcada em comum acordo pelos contratantes, a fim de que nela, com o seu conjunto familiar, o PARCEIRO-OUTORGADO possa plantar e cultivar lavouras de sequeiro: milho, feijão, outras, que se inserem no período do ano agrícola, mediante a paga de 25% (vinte e cinco por cento) da produção total colhida.

    <br><br>

    <strong>Cláusula 4ª</strong>. Caberá ao PARCEIRO-OUTORGANTE a cota de 25% (vinte e cinco por cento) de tudo que a mencionada atividade vier a produzir, devendo ser entregue regularmente ao seu agente responsável no depósito designado para esse fim.

    <br><br>

    <strong>Cláusula 5ª</strong>. Quando houver o uso de máquinas agrícolas no preparo do solo, no plantio e/ou na colheita, competirá ao PARCEIRO-OUTORGADO arcar com os custos da hora/máquina.

    <br><br>

    <strong>Cláusula 6ª</strong>. Na apuração da colheita, todo adiantamento pago e assumido unilateralmente pelo PARCEIRO-OUTORGANTE será pago pelo PARCEIRO-OUTORGADO, no valor correspondente ao investimento.

    <br><br>

    <strong>Cláusula 7ª</strong>. Na exploração da área concedida em parceria devem ser obedecidas as normas estabelecidas pelo PARCEIRO-OUTORGANTE, tendo em vista à conservação do solo, o combate à erosão por curvas de nível, o uso adequado de adubos e fertilizantes e o plantio com rotação de cultura, se for o caso, de modo a impedir o esgotamento do solo.

    <br><br>

    <strong>Cláusula 8ª</strong>. O PARCEIRO-OUTORGADO, ou pessoa de seu conjunto familiar, pode residir em casa de moradia dentro da área da Fazenda do PARCEIRO-OUTORGANTE, usar galpão para guardar a produção obtida, bem como trabalhar em serviços avulsos ou de empreitada, desde que não provoque prejuízo ao objeto da presente parceria rural.

    <br><br>

    <strong>Cláusula 9ª</strong>. O PARCEIRO-OUTORGADO não pode, em hipótese alguma, transferir o presente contrato, ceder ou emprestar o imóvel, ou parte dele, sem o prévio e expresso consentimento do PARCEIRO-OUTORGANTE, nem mudar a destinação do imóvel prevista neste termo, sob pena de extinção do contrato do contrato e consequente despejo do PARCEIRO-OUTORGADO.

    <br><br>

    <strong>Cláusula 10ª</strong>. Os restos das culturas cultivadas deverão ser destinados ao pastejo dos rebanhos bovinos, ovinos, caprinos, outros, existentes na propriedade.

    <br><br>

    <strong>Cláusula 11ª</strong>. Os tributos que recaírem sobre o imóvel serão de responsabilidade do PARCEIRO-OUTORGANTE.

    <br><br>

    <strong>Cláusula 12ª</strong>. Findando o contrato, o PARCEIRO-OUTORGADO fica obrigado a devolver o imóvel nas mesmas condições em que o recebeu, com seus acessórios, salvo as deteriorações naturais do uso regular.

    <br><br>

    <strong>§ 1º.</strong> O presente contrato poderá ainda ser rescindido, a qualquer tempo, pelas partes, mediante prévia notificação pessoal do parceiro.

    <br><br>

    <strong>§ 2º.</strong> Nos casos de uso predatório, doloso ou culposo dos bens imóveis, móveis e/ou semoventes disponibilizados pelo PARCEIRO-OUTORGANTE, extinguir-se-á o contrato independente de prévia notificação pessoal do PARCEIRO-OUTORGADO, respondendo este pelos danos causados.

    <br><br>

    <strong>Cláusula 13ª</strong>. Os prejuízos decorrentes de caso fortuito e força maior serão solucionados pela legislação civil pertinente, ficando, desde já, eleito o foro da Comarca de Bom Lugar, para dirimir as questões judiciais decorrentes deste contrato.

    <br><br>

    E, por estarem justos e acertados, assinam o presente termo em 2 (duas) vias de igual teor e forma.
</div>

<br>

<div class="data">
    Jaguaruana - CE em <?= $dataAtutal; ?>.
</div>
<br><br><br>

<div class="container">
    <div class="assinatura">

        __________________________________________________________ <br>
        <strong>
            PROPRIETÁRIO <br><br><br><br>
        </strong>
        __________________________________________________________ <br>
        <strong>
            PARCEIRO
        </strong>
    </div>
</div>

<?php

$html = ob_get_contents();
ob_end_clean();
$mpdf->WriteHTML($css . $html);
$mpdf->Output("declarações.pdf", 'I');

?>