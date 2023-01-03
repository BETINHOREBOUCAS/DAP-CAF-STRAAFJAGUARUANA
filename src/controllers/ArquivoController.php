<?php

namespace src\controllers;

use \core\Controller;
use Mpdf\Mpdf;
use src\Handlers\Acessor;
use src\models\Membros;
use src\models\Socios;
use ZipArchive;

class ArquivoController extends Controller
{

    public function index($args)
    {
        $info = [];
        if (!empty($_SESSION['notice'])) {
            $info['aviso'] = $_SESSION['notice'];
            $_SESSION['notice'] = "";
        }
        if (!empty($_SESSION['dados'])) {
            $info['dados'] = $_SESSION['dados'];
            $_SESSION['dados'] = '';
        }

        $idSocio = $args['idsocio'];

        $info['idsocio'] = $idSocio;
        $info['socios'] = Socios::find('', '', $idSocio);
        $info['propriedade'] = Socios::findPropriedade($idSocio);
        $info['doc_socios'] = Socios::findGeneral('doc_socios', 'id_socio_responsavel', $idSocio);

        $this->render('arquivo', $info);
    }

    public function indexAction($args)
    {
        $idSocio = $args['idsocio'];

        $dados['idsocio'] = $idSocio;
        $dados['titulares'] = Socios::find('', '', $idSocio);
        $dados['renda'] = Socios::findRenda($idSocio);
        $dados['propriedade'] = Socios::findPropriedade($idSocio);
        $dados['membros'] = Membros::findMembroGeneral($idSocio);

        if (isset($dados['renda']) && !empty($dados['renda']) && isset($dados['propriedade']) && !empty($dados['propriedade'])) {
            // Adicionando algumas chaves para inserção
            $dados['titulares'][0]['id_socio_responsavel'] = $idSocio;
            $dados['propriedade'][0]['id_socio_responsavel'] = $idSocio;
            foreach ($dados['renda'] as $key => $value) {
                $dados['renda'][$key]['id_socio_responsavel'] = $idSocio;
            }
            foreach ($dados['membros'] as $key => $value) {
                $dados['membros'][$key]['id_socio_responsavel'] = $idSocio;
            }
            // Fim de inserção

            // Removendo a chave id e data de inclusão original que veio da consulta do banco
            unset($dados['titulares'][0]['id']);
            unset($dados['titulares'][0]['data_inclusao']);
            unset($dados['propriedade'][0]['id']);
            unset($dados['propriedade'][0]['id_socio_propriedade']);
            foreach ($dados['renda'] as $key => $value) {
                unset($value['id']);
                unset($value['id_socio']);
                $dados['renda'][] = $value;
                unset($dados['renda'][$key]);
            }

            foreach ($dados['membros'] as $key => $value) {
                unset($value['id']);
                unset($value['data_alteracao']);
                unset($value['data_inclusao']);
                unset($value['id_responsavel_alteracao']);
                $dados['membros'][] = $value;
                unset($dados['membros'][$key]);
            }

            // Fim da remoção das chaves

            $idDocumento = Socios::addInfo('doc_socios', $dados['titulares'][0]);
            $dados['propriedade'][0]['id_doc_socio'] = $idDocumento;
            Socios::addInfo('doc_propriedades', $dados['propriedade'][0]);


            foreach ($dados['renda'] as $key => $value) {
                $value['id_doc_socio'] = $idDocumento;
                Socios::addInfo('doc_rendas', $value);
            }
            foreach ($dados['membros'] as $key => $value) {
                $value['id_doc_socio'] = $idDocumento;
                Socios::addInfo('doc_membros', $value);
            }
        } else {
            $_SESSION['notice'] = "As infomações de renda ou de propriedade não foram prenchidas!";
        }

        $this->redirect('/arquivo/' . $idSocio);
    }

    public function emissao($args)
    {
        $id_doc = $args['iddoc'];
        $dados['renda'] = Acessor::somar(Socios::findRenda($id_doc));
        $dados['id_doc'] = $id_doc;
        $dados['doc_socio'] = Socios::findGeneral('doc_socios', 'id', $id_doc);
        $dados['propriedade'] = Socios::findGeneral('doc_propriedades', 'id_doc_socio', $id_doc);
        $dados['membros'] = Socios::findGeneral('doc_membros', 'id_doc_socio', $id_doc);

        $this->render('arquivoInfo', $dados);
    }

    public function emissaoAction($args)
    {
        $id_doc = $args['iddoc'];
        $dados['doc_socio'] = Socios::findGeneral('doc_socios', 'id', $id_doc);
        $idSocio = $dados['doc_socio'][0]['id_socio_responsavel'];

        $arquivos = $_FILES;
        $dados = Socios::findGeneral('doc_socios', 'id', $id_doc);
        $pasta = $id_doc . '_CAF_' . $dados[0]['cpf_socio'];

        // Verificar quando estiver vazio, pois empty estar dando problema

        if (!file_exists("$pasta")) {
            mkdir('' . $pasta);

            if (!empty($arquivos['file_rg_responsavel']['tmp_name']) && isset($arquivos['file_rg_responsavel']['tmp_name'])) {
                move_uploaded_file($arquivos['file_rg_responsavel']['tmp_name'], "$pasta/01_RG_RESPONSAVEL.pdf");

                $files[] = "$pasta/01_RG_RESPONSAVEL.pdf";
            }

            if (!empty($arquivos['file_cpf_responsavel']['tmp_name']) && isset($arquivos['file_rg_responsavel']['tmp_name'])) {
                move_uploaded_file($arquivos['file_cpf_responsavel']['tmp_name'], "$pasta/01_CPF_RESPONSAVEL.pdf");

                $files[] = "$pasta/01_CPF_RESPONSAVEL.pdf";
            }

            if (!empty($arquivos['file_rg_membros']['tmp_name'][0]) && isset($arquivos['file_rg_membros']['tmp_name'][0])) {
                for ($i = 0; $i < count($arquivos['file_rg_membros']['tmp_name']); $i++) {
                    move_uploaded_file($arquivos['file_rg_membros']['tmp_name'][$i], "$pasta/" . "02_" . $arquivos['file_rg_membros']['name'][$i]);

                    $files[] = "$pasta/" . "02_" . $arquivos['file_rg_membros']['name'][$i];
                }
            }

            if (!empty($arquivos['file_cpf_membros']['tmp_name'][0]) && isset($arquivos['file_cpf_membros']['tmp_name'][0])) {
                for ($i = 0; $i < count($arquivos['file_cpf_membros']['tmp_name']); $i++) {
                    move_uploaded_file($arquivos['file_cpf_membros']['tmp_name'][$i], "$pasta/" . "02_" . $arquivos['file_cpf_membros']['name'][$i]);

                    $files[] = "$pasta/" . "02_" . $arquivos['file_cpf_membros']['name'][$i];
                }
            }

            if (!empty($arquivos['file_endereco_responsavel']['tmp_name']) && isset($arquivos['file_rg_responsavel']['tmp_name'])) {
                move_uploaded_file($arquivos['file_endereco_responsavel']['tmp_name'], "$pasta/03_ENDERECO_RESPONSAVEL.pdf");

                $files[] = "$pasta/03_ENDERECO_RESPONSAVEL.pdf";
            }

            if (!empty($arquivos['file_doc_terra']['tmp_name']) && isset($arquivos['file_rg_responsavel']['tmp_name'])) {
                move_uploaded_file($arquivos['file_doc_terra']['tmp_name'], "$pasta/04_CONTRATO_RESPONSAVEL.pdf");

                $files[] = "$pasta/04_CONTRATO_RESPONSAVEL.pdf";
            }

            if (!empty($arquivos['file_terra_responsavel']['tmp_name'][0]) && isset($arquivos['file_terra_responsavel']['tmp_name'][0])) {

                $mpdf = new \Mpdf\Mpdf();

                foreach ($arquivos['file_terra_responsavel']['tmp_name'] as $key => $value) {
                    $pagecount = $mpdf->setSourceFile($value);
                    for ($q = 1; $q <= $pagecount; $q++) {
                        $mpdf->AddPage();
                        // Importa a página
                        $tplId = $mpdf->importPage($q);
                        // Cria PDF
                        $mpdf->UseTemplate($tplId);
                    }
                }
                $mpdf->Output("$pasta/DOC_TERRA_PROPRIETARIO.pdf", 'f');

                $files[] = "$pasta/DOC_TERRA_PROPRIETARIO.pdf";
            }

            if (!empty($arquivos['file_outros_responsavel']['tmp_name'][0]) && isset($arquivos['file_outros_responsavel']['tmp_name'][0])) {

                $mpdf = new \Mpdf\Mpdf();

                foreach ($arquivos['file_outros_responsavel']['tmp_name'] as $key => $value) {
                    $pagecount = $mpdf->setSourceFile($value);
                    for ($q = 1; $q <= $pagecount; $q++) {
                        $mpdf->AddPage();
                        // Importa a página
                        $tplId = $mpdf->importPage($q);
                        // Cria PDF
                        $mpdf->UseTemplate($tplId);
                    }
                }
                $mpdf->Output("$pasta/OUTROS_DOCS.pdf", 'f');

                $files[] = "$pasta/OUTROS_DOCS.pdf";
            }

            // Unificar em um arquivo todas as rendas

            if (!empty($arquivos['file_declaracao_renda']['tmp_name']) && isset($arquivos['file_declaracao_renda']['tmp_name'])) {

                $mpdf = new Mpdf();
                $pagecount = $mpdf->setSourceFile($arquivos['file_declaracao_renda']['tmp_name']);
                $mpdf->AddPage();
                $tplId = $mpdf->importPage(1);
                $mpdf->UseTemplate($tplId);

                if (!empty($arquivos['file_renda_CNIS']['tmp_name'][0]) && isset($arquivos['file_renda_CNIS']['tmp_name'][0])) {

                    foreach ($arquivos['file_renda_CNIS']['tmp_name'] as $key => $value) {
                        $pagecount = $mpdf->setSourceFile($value);
                        for ($q = 1; $q <= $pagecount; $q++) {
                            $mpdf->AddPage('L');
                            // Importa a página
                            $tplId = $mpdf->importPage($q);
                            // Cria PDF

                            $mpdf->UseTemplate($tplId);
                        }
                    }
                }

                if (!empty($arquivos['file_renda_bolsa_familia']['tmp_name']) && isset($arquivos['file_renda_bolsa_familia']['tmp_name'])) {
                    $pagecount = $mpdf->setSourceFile($arquivos['file_renda_bolsa_familia']['tmp_name']);
                    for ($q = 1; $q <= $pagecount; $q++) {
                        $mpdf->AddPage();
                        // Importa a página
                        $tplId = $mpdf->importPage($q);
                        // Cria PDF

                        $mpdf->UseTemplate($tplId);
                    }
                }

                if (!empty($arquivos['file_outras_rendas']['tmp_name'][0]) && isset($arquivos['file_outras_rendas']['tmp_name'][0])) {

                    foreach ($arquivos['file_outras_rendas']['tmp_name'] as $key => $value) {
                        $pagecount = $mpdf->setSourceFile($value);
                        for ($q = 1; $q <= $pagecount; $q++) {
                            $mpdf->AddPage();
                            // Importa a página
                            $tplId = $mpdf->importPage($q);
                            // Cria PDF

                            $mpdf->UseTemplate($tplId);
                        }
                    }
                }

                $mpdf->Output("$pasta/05_RENDA_UFPA.pdf", 'f');

                $files[] = "$pasta/05_RENDA_UFPA.pdf";
                
            }
        }
        
        $zip = new ZipArchive();
        $fileName = $id_doc . '_CAF_' . $dados[0]['cpf_socio'].'.zip';

        if($zip->open("$pasta/$fileName", ZIPARCHIVE::CREATE) == TRUE) {
            foreach ($files as $key => $value) {
                if (file_exists($value)) {
                    $zip->addFile($value);
                }
            }
            $zip->close();
            foreach ($files as $key => $value) {
                if (file_exists($value)) {
                    unlink($value);
                }
            }
        }

        $this->redirect('/arquivo/'.$idSocio);
    }
}
