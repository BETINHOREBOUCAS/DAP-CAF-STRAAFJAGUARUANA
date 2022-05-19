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
}else {
    $estado_civil = $dados['estado_civil'];
}

/*echo "<pre>";
    print_r($renda);*/
?>

<?php
ob_start();
?>

<style>
    .titulo {
        border: 1px solid black;
        font-size: 40px;
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
    Declaração
</div>

<p>Eu, <strong><?= mb_convert_case($dados['titular1'], MB_CASE_TITLE); ?></strong>, brasileiro(a), agricultor(a), <?= strtolower ($estado_civil); ?>, portador(a) do RG <?= $dados['rg1']; ?>, CPF <?= $dados['cpf2']; ?>, residente e domiciliado em <?= mb_convert_case($dados['endereco'], MB_CASE_TITLE) . ", " . $dados['numero']; ?>, <?= mb_convert_case($dados['bairro'], MB_CASE_TITLE); ?>, Jaguaruana-CE.</p>

<p>
    DECLARO sob as penas do “Art. 299 do CPB, in verbis: Omitir, em documento público ou particular, declaração que dele devia constar, ou nele inserir ou fazer inserir declaração falsa ou diversa da que devia ser escrita, com o fim de prejudicar direito, criar obrigação ou alterar a verdade sobre fato juridicamente relevante:
    Pena - reclusão, de 1 (um) a 5 (cinco) anos, e multa, se o documento é público, e reclusão de 1 (um) a 3 (três) anos, e multa, se o documento é particular”, <strong>que para sustentação da família tenho o trabalho familiar como base na exploração do estabelecimento e que não detenho nenhuma renda fora da unidade produtiva. Declaro também que produzi e utilizei para o consumo familiar, <?= $renda['valoresCategoria']['lista'] ?> auferindo uma renda de R$ <?= number_format($renda['valoresCategoria']['valConsumo'], 2, ',', '.'); ?> durante os últimos 12 meses. Pelo que firmoa a presente declaração e termos em dou fé.</strong>

</p>

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
        ________________________________________________ <br>
        <strong>
            <?= mb_convert_case($dados['titular2'], MB_CASE_UPPER); ?> <br>
            CPF <?= $dados['cpf2']; ?> <br>
            ASSINATURA 2º TITULAR
        </strong>
    </div>
</div>

<?php
$html = ob_get_contents();
ob_end_clean();
$mpdf->WriteHTML($css . $html);
$mpdf->AddPage();

?>
<!-- Declaração de nao emprego público -->


<div class="titulo">
    Declaração
</div>

<p>Eu, <strong><?= mb_convert_case($dados['titular1'], MB_CASE_TITLE); ?></strong>, brasileiro(a), agricultor(a), <?= strtolower($estado_civil); ?>, portador(a) do RG <?= $dados['rg1']; ?>, CPF <?= $dados['cpf1']; ?>, residente e domiciliado em <?= mb_convert_case($dados['endereco'], MB_CASE_TITLE) . ", " . $dados['numero']; ?>, <?= mb_convert_case($dados['bairro'], MB_CASE_TITLE); ?>, Jaguaruana-CE.</p>

<p>
    DECLARO sob as penas do “Art. 299 do CPB, in verbis: Omitir, em documento público ou particular, declaração que dele devia constar, ou nele inserir ou fazer inserir declaração falsa ou diversa da que devia ser escrita, com o fim de prejudicar direito, criar obrigação ou alterar a verdade sobre fato juridicamente relevante:
    Pena - reclusão, de 1 (um) a 5 (cinco) anos, e multa, se o documento é público, e reclusão de 1 (um) a 3 (três) anos, e multa, se o documento é particular”, <strong>que para sustentação da família tenho o trabalho familiar como base na exploração do estabelecimento e que não tenho nenhum emprego, cargo ou função pública, concursado ou terceirizado, nas esferas, Federal, Estadual ou Municipal. Termos em que dou fé.</strong>
</p>

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
        ________________________________________________ <br>
        <strong>
            <?= mb_convert_case($dados['titular2'], MB_CASE_UPPER); ?> <br>
            CPF <?= $dados['cpf2']; ?> <br>
            ASSINATURA 2º TITULAR
        </strong>
    </div>
</div>

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

<p>
    Que entre si fazem, <strong><?= mb_convert_case($dados['proprietario'], MB_CASE_TITLE); ?></strong>, brasileiro(a), <?= strtolower($dados['estado_civil_proprietario'] = "Casados" ? "Casado(a)" : ""); ?>, inscrito no RG sob o nº <?= $dados['rgP']; ?>, e CPF nº <?= $dados['cpfP']; ?>, residente e domiciliado em <?= mb_convert_case($dados['endereco_proprietario'], MB_CASE_TITLE); ?>, <?= mb_convert_case($dados['bairro_proprietario'], MB_CASE_TITLE); ?>, Jaguaruana-CE, doravante denominado <strong>PARCEIRO PROPRIETÁRIO</strong>, e de outro lado, <strong><?= mb_convert_case($dados['titular1'], MB_CASE_TITLE); ?></strong>, brasileiro(a), <?= strtolower($estado_civil); ?>, agricultor(a), inscrito no RG sob o nº <?= $dados['rg1']; ?>, e CPF nº <?= $dados['cpf1']; ?>, residente e domiciliado em <?= mb_convert_case($dados['endereco'], MB_CASE_TITLE) . ", " . $dados['numero']; ?>, <?= mb_convert_case($dados['bairro'], MB_CASE_TITLE); ?>, Jaguaruana-CE, doravante denominado <strong>PARCEIRO CONTRATADO</strong>, firmam o presente contrato nas seguintes condições:
</p>

<P>
    1. O PARCEIRO PROPRIETÁTIO, legítimo proprietário de um imóvel rural localizado em, denominado em <?= mb_convert_case($dados['endereco_proprietario'], MB_CASE_TITLE); ?>, com registro do imóvel na Receita Federal / INCRA sob o nº <?= mb_convert_case($dados['registro'], MB_CASE_TITLE); ?> com área total de <?= number_format($dados['areaTotal'], 1, ",", "."); ?>Ha.
</P>

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
        __________________________________________________________ <br>
        <strong>
            PROPRIETÁRIO / REPRESENTANTE LEGAL <br><br><br><br>
        </strong>

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
    $mpdf->Output("$titular1 e $titular2.pdf", 'D');
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
        ________________________________________________ <br>
        <strong>
            <?= mb_convert_case($dados['titular2'], MB_CASE_UPPER); ?> <br>
            CPF <?= $dados['cpf2']; ?> <br>
            ASSINATURA 2º TITULAR
        </strong>
    </div>
</div>
<?php
if ($dados['estado_civil'] == "Amasiados") {
    $html = ob_get_contents();
    ob_end_clean();
    $mpdf->WriteHTML($css . $html);
    $mpdf->Output("$titular1 e $titular2.pdf", 'D');
}


?>