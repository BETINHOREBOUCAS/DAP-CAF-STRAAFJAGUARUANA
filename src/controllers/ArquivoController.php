<?php

namespace src\controllers;

use \core\Controller;
use src\Handlers\Acessor;
use src\models\Socios;

class ArquivoController extends Controller
{

    public function index($args)
    {
        $idSocio = $args['idsocio'];

        $info['idsocio'] = $idSocio;
        $info['socios'] = Socios::find('', '', $idSocio);

        $info['titulares'] = Socios::findGeneral('documentos', $idSocio);

        $this->render('arquivo', $info);
    }

    public function emissao($args)
    {
        $idSocio = $args['idsocio'];
        $dados = Acessor::somar(Socios::findRenda($idSocio));
        $dados['idsocio'] = $idSocio;
        $dados['titulares'] = Socios::find('', '', $idSocio);
        $dados['propriedade'] = Socios::findPropriedade($idSocio);

        $this->render('arquivoInfo', $dados);
    }

    public function emissaoAction($args)
    {
        $idSocio = $args['idsocio'];
        $info['id_socio_responsavel'] = $idSocio;

        $dados['idsocio'] = $idSocio;
        $dados['titulares'] = Socios::find('', '', $idSocio);
        $dados['propriedade'] = Socios::findPropriedade($idSocio);
        $dados['renda'] = Socios::findRenda($idSocio);

        foreach ($dados['titulares'][0] as $key => $value) {
            if ($key != 'id' && $key != 'ativo' && $key != 'id_socio_propriedade') {
                $info[$key] = $value;
            }
            
        }
        foreach ($dados['propriedade'][0] as $key => $value) {
            if ($key != 'id' && $key != 'ativo' && $key != 'id_socio_propriedade') {
                $info[$key] = $value;
            }
        }
        foreach ($dados['renda'][0] as $key => $value) {
            if ($key != 'id' && $key != 'ativo' && $key != 'id_socio_propriedade') {
                $renda[$key] = $value;
            }
            if ($key == 'id_socio') {
                $renda['id_socio_responsavel'] = $value;
                unset($renda[$key]);
            }
        }

        $idDocumento = Socios::addInfo('documentos', $info);
        foreach ($dados['renda'] as $key => $value) {
            $dados['renda'][$key]['id_documento'] = $idDocumento;
        }
        Socios::addRendaAction('doc_renda', $dados['renda']);
        
        $this->redirect('/arquivo/'.$idSocio);
        
    }
}
