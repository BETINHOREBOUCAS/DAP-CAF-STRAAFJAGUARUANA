<?php

namespace src\controllers;

use \core\Controller;
use src\Handlers\Acessor;
use src\Handlers\FacilityHandlers;
use src\models\Declaracao;
use src\models\Socios;
use src\models\Usuarios;

class DeclaracaoController extends Controller
{

    public function __construct() {
        if (!isset($_SESSION['usuario']) || empty($_SESSION['usuario'])) {
            $this->redirect('/login');
        } else {
            $user = Usuarios::getUser($_SESSION['usuario']['email']);

            if ($_SESSION['usuario']['token'] != $user['token']) {
                $this->redirect('/login');
            }
            
            if (in_array('master', json_decode($user['nivel_acesso'])) || in_array('caf', json_decode($user['nivel_acesso']))) {
                
            } else {
                $this->redirect('/permissao');
            }
        }
    }

    public function index($args) {

        $id_doc = $args['iddoc'];
        $dados = Acessor::somar(Socios::findGeneral('doc_rendas', 'id_doc_socio', $id_doc));
        $dados['id_doc'] = $id_doc;
        $dados['doc_socio'] = Socios::findGeneral('doc_socios', 'id', $id_doc);
        $dados['propriedade'] = Socios::findGeneral('doc_propriedades', 'id_doc_socio', $id_doc);
        $dados['membros'] = Socios::findGeneral('doc_membros', 'id_doc_socio', $id_doc);
        $idSocio = $dados['doc_socio'][0]['id_socio_responsavel'];
        FacilityHandlers::registrarAlteracao(['id_doc_socio' => $id_doc], $idSocio, 'emissao_declarações');
        
        $this->render("declaracao", $dados);
    }

    public function declaracaoSeparado($args) {
        $idDeclaracao = $args['iddeclaracao'];
        $dados = Declaracao::buscarInfoDeclaracao($idDeclaracao);
        $dadosSeparado = Declaracao::buscarSeparado($idDeclaracao);

        echo "<pre>";
        print_r($dadosSeparado);
        exit;
        if ($dadosSeparado) {            
            $dados['infoSeparado'] = $dadosSeparado[0];

            $this->render("declaracaoSeparado", $dados);
        }else {
            //$this->render("declaracaoSeparadoForm", $dados);
        }        
    }

    public function declaracaoSeparadoAction($args) {
        $nomeSeparado = filter_input(INPUT_POST, 'nomeSeparado', FILTER_DEFAULT);
        $rgSeparado = filter_input(INPUT_POST, 'rgSeparado', FILTER_DEFAULT);
        $cpfSeparado = filter_input(INPUT_POST, 'cpfSeparado', FILTER_DEFAULT);
        $dataSeparacao = filter_input(INPUT_POST, 'dataSeparacao', FILTER_DEFAULT);
        $enderecoSeparado = filter_input(INPUT_POST, 'enderecoSeparado', FILTER_DEFAULT);
        $bairroSeparado = filter_input(INPUT_POST, 'bairroSeparado', FILTER_DEFAULT);
        $cidadeEstadoSeparado = filter_input(INPUT_POST, 'cidadeEstadoSeparado', FILTER_DEFAULT);
        $nomeTestemunha = filter_input(INPUT_POST, 'nomeTestemunha', FILTER_DEFAULT);
        $rgTestemunha = filter_input(INPUT_POST, 'rgTestemunha', FILTER_DEFAULT);
        $cpfTestemunha = filter_input(INPUT_POST, 'cpfTestemunha', FILTER_DEFAULT);

        $idDeclaracao = $args['iddeclaracao'];
        $dados = Declaracao::buscarInfoDeclaracao($idDeclaracao);

        $dadosSeparado = [
            'nomeSeparado' => $nomeSeparado,
            'rgSeparado' => $rgSeparado,
            'cpfSeparado' => $cpfSeparado,
            'dataSeparado' => $dataSeparacao,
            'enderecoSeparado' => $enderecoSeparado,
            'bairroSeparado' => $bairroSeparado,
            'cidadeEstadoSeparado' => $cidadeEstadoSeparado,
            'id_socio' => $dados['dados']['id_socio_responsavel'],
            'id_documento' => $idDeclaracao,
            'nomeTestemunha' => $nomeTestemunha,
            'rgTestemunha' => $rgTestemunha,
            'cpfTestemunha' => $cpfTestemunha,
        ];

        Socios::addInfo('separados', $dadosSeparado);

        $this->redirect("/declaracao/separacao/".$idDeclaracao);
    }
}
