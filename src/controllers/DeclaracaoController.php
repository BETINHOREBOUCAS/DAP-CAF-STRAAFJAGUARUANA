<?php

namespace src\controllers;

use \core\Controller;
use src\Handlers\Acessor;
use src\models\Declaracao;

class DeclaracaoController extends Controller
{

    public function index($args) {

        $idDeclaracao = $args['iddeclaracao'];

        $dados = Declaracao::buscarInfoDeclaracao($idDeclaracao);
        $dados['renda'] = Acessor::somar($dados['renda']);

        /*echo "<pre>";
        print_r($dados);*/
        
        $this->render("declaracao", $dados);
    }
}
