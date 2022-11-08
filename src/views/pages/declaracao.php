<?php

use Mpdf\Mpdf;

$mpdf = new Mpdf();
$data = new DateTime();
$data->setTimezone(new DateTimeZone('America/Fortaleza'));
$dataAtutal = $data->format('d/m/Y');
$titular1 = $dados['cpf1'];
$titular2 = $dados['cpf2'];
if ($dados['estado_civil'] == "Casados") {
    $estado_civil = "Casado(a)";
} elseif ($dados['estado_civil'] == "Amasiados") {
    $estado_civil = "Amasiado(a)";
} else {
    $estado_civil = $dados['estado_civil'];
}

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

    .assinatura {
        text-align: center;
        display: none;
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

<p>Eu, <strong><?= mb_convert_case($dados['titular1'], MB_CASE_TITLE); ?></strong>, brasileiro(a), agricultor(a), <?= strtolower($estado_civil); ?>, portador(a) do RG <?= $dados['rg1']; ?>, CPF <?= $dados['cpf1']; ?>, residente e domiciliado em <?= mb_convert_case($dados['endereco'], MB_CASE_TITLE) . ", " . $dados['numero']; ?>, <?= mb_convert_case($dados['bairro'], MB_CASE_TITLE); ?>, Jaguaruana-CE, na qualidade de responsável pela administração da <strong>Unidade Familiar de Produção Agrária - UFPA</strong> situada em <?= mb_convert_case($dados['propriedade'], MB_CASE_TITLE); ?>, <?= $dados['bairroPropriedade']; ?>, Jaguaruana-CE</p>


<!-- Teste para valores -->

<pre>
    <?php
    /*
        print_r($viewData);
        exit;
    */
    ?>
</pre>



<table class="centro">
    <tr>
        <th>Produto</th>
        <th>Valor</th>
    </tr>

    <?php foreach ($renda['valoresCategoria']['lista']['rural'] as $value) : ?>
        <tr>
            <td><?= $value['categoria']; ?></td>
            <td>R$ <?= number_format($value['valor'], 2, ',', '.'); ?></td>
        </tr>
    <?php endforeach ?>

</table>

<p>
    <strong>DECLARO</strong> que a renda bruta é de R$ <?= number_format($renda['valoresCategoria']['valRural'] + $renda['valoresCategoria']['valProgramasSociais'], 2, ',', '.'); ?> reais, oriunda do <strong>desenvolvimento de atividades de atividades econômicas do estabelecimento</strong> identificado anteriormente, auferidos nos últimos 12 meses.
</p>

<p>
    <strong>DECLARO</strong> que a renda bruta obtida <strong>fora do estabelecimento</strong> é composta pela soma das rendas auferidas pelos membros da (Unidade Familiar de Produção Agrária – UFPA), sendo composta por:
</p>

<table class="centro">
    <tr>
        <th>Tipo de Renda</th>
        <th>Membro Da Família</th>
        <th>Valor</th>
    </tr>

    <?php foreach ($renda['valoresCategoria']['lista']['urbano'] as $value) : ?>
        <tr>
            <td><?= $value['categoria']; ?></td>
            <td><?= $value['membro']; ?></td>
            <td>R$ <?= number_format($value['valor'], 2, ',', '.'); ?></td>
        </tr>
    <?php endforeach ?>
    <tr>
        <th colspan="2">Valor Total</th>
        <th>R$ <?= number_format($renda['valoresCategoria']['valUrbano'], 2, ',', '.'); ?></th>
    </tr>
</table>

<p>
    <strong>DECLARO</strong> para todos os fins de direito e sob as penas da Lei, serem verdadeiras as informações prestadas nesta Declaração, ciente de que a prestação de informação falsa e/ou apresentação de documento falso poderá incorrer nas penas de crime previstas nos Arts. 297, 298 e 299 do Código Penal - Decreto Lei nº 2.848, de 7 de dezembro de 1940, além da inativação do documento emitido, acaso configurada a prestação de informação falsa apurada posteriormente à emissão do documento, em procedimento que assegure a ampla defesa e o contraditório, de acordo com o Art. 67 da Portaria SAF/MAPA nº 242, de 8 de novembro de 2021, da Secretaria de Agricultura Familiar e Cooperativismo do Ministério da Agricultura, Pecuária e Abastecimento.
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
            <?= mb_convert_case($dados['titular1'], MB_CASE_UPPER); ?> <br>
            CPF <?= $dados['cpf1']; ?> <br>
            ASSINATURA 1º TITULAR <br><br>
        </strong>
        <br><br>
        <?php if (!empty($dados['cpf2'])) : ?>
            ________________________________________________ <br>
            <strong>
                <?= mb_convert_case($dados['titular2'], MB_CASE_UPPER); ?> <br>
                CPF <?= $dados['cpf2']; ?> <br>
                ASSINATURA 2º TITULAR
            </strong>
        <?php endif ?>
    </div>
</div>

<?php
$html = ob_get_contents();
ob_end_clean();
$mpdf->WriteHTML($css . $html);
$mpdf->AddPage();

?>
<!-- Declaração de enquadramento -->

<!--
<div class="titulo">
    <h2>Informações Para Emissão do CAF</h2>
</div>
<br>
<div>
    <div class="titleTable">Titular 1</div>
    <table class="enquadrar">
        
        <tr>
            <th class="width-25">Titular 1</th>
            <td><?= $dados['titular1']; ?></td>
        </tr>
        <tr>
            <th class="width-25">CPF</th>
            <td><?= $dados['cpf1']; ?></td>
        </tr>
        <tr>
            <th class="width-25">RG</th>
            <td><?= $dados['rg1']; ?></td>
        </tr>
        <tr>
            <th class="width-25">Nascimento</th>
            <td><?= $dados['dn1']; ?></td>
        </tr>
        <tr>
            <th class="width-25">Escolaridade</th>
            <td><?= $dados['escolaridade1']; ?></td>
        </tr>
        <tr>
            <th class="width-25">Mãe</th>
            <td><?= $dados['mae1']; ?></td>
        </tr>

    </table>

    <?php if (!empty($dados['titular2'])) : ?>

        <br>

        <div class="titleTable">Titular 2</div>
        <table class="enquadrar">
            <tr>
                <th style="width: 25%;">Nome Completo: </th>
                <td><?= $dados['titular2']; ?></td>
            </tr>
            <tr>
                <th class="width-25">CPF:</th>
                <td><?= $dados['cpf2']; ?></td>
            </tr>
            <tr>
                <th class="width-25">RG:</th>
                <td><?= $dados['rg2']; ?></td>
            </tr>
            <tr>
                <th class="width-25">Nascimento</th>
                <td><?= $dados['dn2']; ?></td>
            </tr>
            <tr>
                <th class="width-25">Escolaridade</th>
                <td><?= $dados['escolaridade2']; ?></td>
            </tr>
            <tr>
                <th class="width-25">Mãe</th>
                <td><?= $dados['mae2']; ?></td>
            </tr>
        </table>

    <?php endif ?>

    <br>

    <div class="titleTable">Membros da Família</div>
    <table class="centro">
        <tr>
            <th>Nome Completo</th>
            <th>CPF</th>
            <th>Parentesco</th>
        </tr>
        <tr>
            <td>teste</td>
            <td>565655</td>
            <td>Filho</td>
        </tr>
    </table>

    <br>

    <div class="titleTable">Endereço</div>
    <table class="centro">
        <tr>
            <th>Nome Completo</th>
            <th>CPF</th>
            <th>Parentesco</th>
        </tr>
        <tr>
            <td>teste</td>
            <td>565655</td>
            <td>Filho</td>
        </tr>
    </table>



</div>



<br><br><br>
    -->
<?php

$html = ob_get_contents();
ob_end_clean();
/*
$mpdf->WriteHTML($css . $html);
$mpdf->AddPage();
*/

ob_start();

?>

<!-- Declaração Proprietário -->

<div class="titulo" style="font-size: 25px;">
    CONTRATO PARTICULAR DE PARCERIA RURAL
</div>

<?php if (!empty($dados['cpfR'])) : ?>

    <p>
        Que entre si fazem, <strong><?= mb_convert_case($dados['RLegal'], MB_CASE_TITLE); ?></strong>, brasileiro(a), <?= strtolower($dados['estado_civil_representante'] = "Casados" ? "Casado(a)" : ""); ?>, inscrito no RG sob o nº <?= $dados['rgR']; ?>, e CPF nº <?= $dados['cpfR']; ?>, residente e domiciliado em <?= mb_convert_case($dados['endereco_RLegal'], MB_CASE_TITLE); ?>, <?= mb_convert_case($dados['bairro_RLegal'], MB_CASE_TITLE); ?>, Jaguaruana-CE, doravante denominado <strong>PARCEIRO REPRESENTANTE LEGAL DO PROPRIETÁRIO</strong>, e de outro lado, <strong><?= mb_convert_case($dados['titular1'], MB_CASE_TITLE); ?></strong>, brasileiro(a), <?= strtolower($estado_civil); ?>, agricultor(a), inscrito no RG sob o nº <?= $dados['rg1']; ?>, e CPF nº <?= $dados['cpf1']; ?>, residente e domiciliado em <?= mb_convert_case($dados['endereco'], MB_CASE_TITLE) . ", " . $dados['numero']; ?>, <?= mb_convert_case($dados['bairro'], MB_CASE_TITLE); ?>, Jaguaruana-CE, doravante denominado <strong>PARCEIRO CONTRATADO</strong>, firmam o presente contrato nas seguintes condições:
    </p>

    <P>
        1. O PARCEIRO REPRESENTANTE LEGAL DO PROPRIETÁRIO, legítimo proprietário de um imóvel rural, denominado em <?= mb_convert_case($dados['propriedade'], MB_CASE_TITLE); ?>, e localizado em <?= mb_convert_case($dados['denominacao'], MB_CASE_TITLE); ?>, com registro do imóvel na Receita Federal / INCRA sob o nº <?= mb_convert_case($dados['registro'], MB_CASE_TITLE); ?> com área total de <?= number_format($dados['areaTotal'], 1, ",", "."); ?>Ha.
    </P>

<?php else : ?>

    <p>
        Que entre si fazem, <strong><?= mb_convert_case($dados['proprietario'], MB_CASE_TITLE); ?></strong>, brasileiro(a), <?= strtolower($dados['estado_civil_proprietario'] = "Casados" ? "Casado(a)" : ""); ?>, inscrito no RG sob o nº <?= $dados['rgP']; ?>, e CPF nº <?= $dados['cpfP']; ?>, residente e domiciliado em <?= mb_convert_case($dados['endereco_proprietario'], MB_CASE_TITLE); ?>, <?= mb_convert_case($dados['bairro_proprietario'], MB_CASE_TITLE); ?>, Jaguaruana-CE, doravante denominado <strong>PARCEIRO PROPRIETÁRIO</strong>, e de outro lado, <strong><?= mb_convert_case($dados['titular1'], MB_CASE_TITLE); ?></strong>, brasileiro(a), <?= strtolower($estado_civil); ?>, agricultor(a), inscrito no RG sob o nº <?= $dados['rg1']; ?>, e CPF nº <?= $dados['cpf1']; ?>, residente e domiciliado em <?= mb_convert_case($dados['endereco'], MB_CASE_TITLE) . ", " . $dados['numero']; ?>, <?= mb_convert_case($dados['bairro'], MB_CASE_TITLE); ?>, Jaguaruana-CE, doravante denominado <strong>PARCEIRO CONTRATADO</strong>, firmam o presente contrato nas seguintes condições:
    </p>

    <P>
        1. O PARCEIRO PROPRIETÁRIO, legítimo proprietário de um imóvel rural, denominado em <?= mb_convert_case($dados['propriedade'], MB_CASE_TITLE); ?>, e localizado em <?= mb_convert_case($dados['denominacao'], MB_CASE_TITLE); ?>, com registro do imóvel na Receita Federal / INCRA sob o nº <?= mb_convert_case($dados['registro'], MB_CASE_TITLE); ?> com área total de <?= number_format($dados['areaTotal'], 1, ",", "."); ?>Ha.
    </P>
<?php endif ?>



<p>
    2. Consiste objeto do presente contrato de parceria rural a área de <?= number_format($dados['area'], 1, ",", "."); ?>0Ha, que será utilizada para lavoura em geral, cultivo de milho, pastagens, pecuária de leite, etc.
</p>

<p>
    3. O PARCEIRO CONTRATADO não poderá transferir os direitos e obrigações decorrentes do presente contrato sem prévio consentimento do PARCEIRO PROPRIETÁRIO.
</p>

<p>
    4. O valor do presente contrato será o equivalente a 25% da produção líquida, que será acertado a cada final de período de produção.
</p>

<p>
    5. O prazo da parceria é de 05 (cinco) anos, tendo início a partir do dia da assinatura do presente contrato.
</p>

<p>
    6. O PARCEIRO CONTRATADO não poderá fazer nenhuma modificação na propriedade parte integrante do presente contrato, sem prévia autorização do PARCEIRO PROPRIETÁRIO, sempre baseado na lei que rege o Estatuto da Terra e Código Civil.
</p>

<p>
    7. As partes elegem o foro da Comarca de Jaguaruana-CE para esclarecimentos de dúvidas a respeito do presente contrato.
</p>

<p>
    E por estarem as partes, PARCEIRO PROPRIETÁRIO e PARCEIRO CONTRATADO, em pleno acordo, em tudo quanto se encontra disposto neste instrumento particular, subscrevem em 2 (duas) vias de igual teor e forma, destinando-se uma via para cada uma das partes contratadas neste instrumento.
</p>

<br>

<div class="data">
    Jaguaruana - CE em <?= $dataAtutal; ?>.
</div>
<br><br><br>

<div class="container">
    <div class="assinatura">

        <?php if (!empty($dados['cpfR'])) : ?>
            __________________________________________________________ <br>
            <strong>
                REPRESENTANTE LEGAL <br><br><br><br>
            </strong>
        <?php else : ?>
            __________________________________________________________ <br>
            <strong>
                PROPRIETÁRIO <br><br><br><br>
            </strong>
        <?php endif ?>

        __________________________________________________________ <br>
        <strong>
            PARCEIRO
        </strong>
    </div>
</div>

<?php
if ($estado_civil != "Amasiado(a)") {
    $html = ob_get_contents();
    ob_end_clean();
    $mpdf->WriteHTML($css . $html);
    if (!empty($dados['cpf2'])) {
        $mpdf->Output("$titular1 e $titular2.pdf", 'I');
    } else {
        $mpdf->Output("$titular1.pdf", 'I');
    }
} else {
    $html = ob_get_contents();
    ob_end_clean();
    $mpdf->WriteHTML($css . $html);
    $mpdf->AddPage();
}


if ($estado_civil == "Amasiado(a)") {
    ob_start();
}

?>


<!-- Declaração União Estável -->

<div class="titulo">
    Declaração
</div>

<p>Eu, <strong><?= mb_convert_case($dados['titular1'], MB_CASE_TITLE); ?></strong>, brasileiro(a), agricultor(a), <?= strtolower($estado_civil); ?>, portador(a) do RG <?= $dados['rg1']; ?>, CPF <?= $dados['cpf1']; ?>, residente e domiciliado em <?= mb_convert_case($dados['endereco'], MB_CASE_TITLE) . ", " . $dados['numero']; ?>, <?= mb_convert_case($dados['bairro'], MB_CASE_TITLE); ?>, Jaguaruana-CE.</p>

<p>
    DECLARO sob as penas do “Art. 299 do CPB, in verbis: Omitir, em documento público ou particular, declaração que dele devia constar, ou nele inserir ou fazer inserir declaração falsa ou diversa da que devia ser escrita, com o fim de prejudicar direito, criar obrigação ou alterar a verdade sobre fato juridicamente relevante:
    Pena - reclusão, de 1 (um) a 5 (cinco) anos, e multa, se o documento é público, e reclusão de 1 (um) a 3 (três) anos, e multa, se o documento é particular”, <strong>que mantenho união estável, em conformidade com o Art. 1.723 do Código Civil (Lei 10.406/2002) com o Sr(a). <?= mb_convert_case($dados['titular2'], MB_CASE_TITLE); ?>, RG <?= $dados['rg2']; ?>, CPF <?= $dados['cpf2']; ?>. Termos em que dou fé.</strong>
</p>

<div class="data">
    Jaguaruana - CE em <?= $dataAtutal; ?>.
</div>
<br><br><br>

<div class="container">
    <div class="assinatura">
        ________________________________________________ <br>
        <strong>
            <?= mb_convert_case($dados['titular1'], MB_CASE_UPPER); ?> <br>
            CPF <?= $dados['cpf1']; ?> <br>
            ASSINATURA 1º TITULAR <br><br>
        </strong>
        <br><br>
        <?php if (!empty($dados['cpf2'])) : ?>
            ________________________________________________ <br>
            <strong>
                <?= mb_convert_case($dados['titular2'], MB_CASE_UPPER); ?> <br>
                CPF <?= $dados['cpf2']; ?> <br>
                ASSINATURA 2º TITULAR
            </strong>
        <?php endif ?>
    </div>
</div>
<?php
if ($dados['estado_civil'] == "Amasiados") {
    $html = ob_get_contents();
    ob_end_clean();
    $mpdf->WriteHTML($css . $html);
    if (!empty($dados['cpf2'])) {
        $mpdf->Output("$titular1 e $titular2.pdf", 'I');
    } else {
        $mpdf->Output("$titular1.pdf", 'I');
    }
}


?>