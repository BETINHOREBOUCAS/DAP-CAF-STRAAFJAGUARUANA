<?php

use Mpdf\Mpdf;

$mpdf = new Mpdf();
$data = new DateTime();
$data->setTimezone(new DateTimeZone('America/Fortaleza'));
$dataAtutal = $data->format('d/m/Y');
$titular1 = $dados['cpf1'];
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

<!-- Declaração Sepação de Corpos-->

<div class="titulo">
    Declaração de Separação de Corpos
</div>

<p>Eu, <strong><?= mb_convert_case($dados['titular1'], MB_CASE_TITLE); ?></strong>, brasileiro(a), agricultor(a), <?= strtolower ($dados['estado_civil']); ?>, portador(a) do RG <?= $dados['rg1']; ?>, CPF <?= $dados['cpf1']; ?>, residente e domiciliado em <?= mb_convert_case($dados['endereco'], MB_CASE_TITLE) . ", " . $dados['numero']; ?>, <?= mb_convert_case($dados['bairro'], MB_CASE_TITLE); ?>, Jaguaruana-CE.</p>

<p>
DECLARO
que estou separada de corpos desde <?=date("d/m/Y", strtotime($infoSeparado['dataSeparado']));?>, do senhor(a), <strong><?= mb_convert_case($infoSeparado['nomeSeparado'], MB_CASE_TITLE); ?></strong>, brasileiro(a), <?= strtolower ($dados['estado_civil']); ?>, portador(a) do RG <?= $infoSeparado['rgSeparado']; ?>, CPF <?= $infoSeparado['cpfSeparado']; ?>, residente e domiciliado em <?= mb_convert_case($infoSeparado['enderecoSeparado'], MB_CASE_TITLE); ?>, <?= mb_convert_case($infoSeparado['bairroSeparado'], MB_CASE_TITLE); ?>, <?= mb_convert_case($infoSeparado['cidadeEstadoSeparado'], MB_CASE_TITLE); ?>.
</p>
<p>
Para dar fé pública ao presente documento, eu e mais uma testemunha assinamos e reconhecemos firma das assinaturas assentadas na presente Declaração e assumimos a responsabilidade pelas informações prestadas, ciente de que omitir ou prestar declarações falsas, forjadas ou adulterados, em documento público ou particular, com o fim de prejudicar direito, criar obrigação ou alterar a verdade, configura crime de Falsidade Ideológica , tipificado no Art. 299 do Código Penal brasileiro.
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
            ASSINATURA DO DECLARANTE <br><br>
        </strong>
        <br><br>
        ________________________________________________ <br>
        <strong>
            <?= mb_convert_case($infoSeparado['nomeTestemunha'], MB_CASE_UPPER); ?> <br>
            CPF <?= $infoSeparado['cpfTestemunha']; ?> <br>
            ASSINATURA DA TESTEMUNHA
        </strong>
    </div>
</div>

<?php
$html = ob_get_contents();
ob_end_clean();

$mpdf->WriteHTML($css.$html);
$mpdf->Output();
?>