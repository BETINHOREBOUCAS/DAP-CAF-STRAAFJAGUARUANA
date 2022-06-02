<?php

namespace src\controllers;

use \core\Controller;
use src\Handlers\Acessor;
use src\models\Declaracao;
use src\models\Socios;

class DeclaracaoController extends Controller
{

    public function index($args) {

        $idDeclaracao = $args['iddeclaracao'];

        $dados = Declaracao::buscarInfoDeclaracao($idDeclaracao);
        $dados['renda'] = Acessor::somar($dados['renda']);
        
        $this->render("declaracao", $dados);
    }

    public function declaracaoSeparado($args) {
        $idDeclaracao = $args['iddeclaracao'];
        $dados = Declaracao::buscarInfoDeclaracao($idDeclaracao);
        $dadosSeparado = Declaracao::buscarSeparado($idDeclaracao);
        if ($dadosSeparado) {            
            $dados['infoSeparado'] = $dadosSeparado[0];

            $this->render("declaracaoSeparado", $dados);
        }else {
            $this->render("declaracaoSeparadoForm", $dados);
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
