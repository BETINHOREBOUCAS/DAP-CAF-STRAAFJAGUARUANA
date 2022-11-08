<?php

namespace src\controllers;

use \core\Controller;
use src\Handlers\Acessor;
use src\models\Socios;

class RendaController extends Controller
{

    public function index($args)
    {
        $result = Socios::findRenda($args['idsocio']);

        //Somar renda
        if ($result) {
            $dados = Acessor::somar($result);
        }    
        
        //Não mudar de linha/posição
        $dados['idsocio'] = $args['idsocio'];

        $this->render('renda', $dados);
    }

    public function addRenda($args)
    {
        $idSocio = $args['idsocio'];
        $dados['id_socio'] = $idSocio;
        $dados['valor'] = filter_var($_POST['valor'], FILTER_DEFAULT);
        $dados['categoria'] = filter_var($_POST['categoria'], FILTER_DEFAULT);
        $dados['membro'] = filter_var($_POST['membro'], FILTER_DEFAULT);

        $dados['valor'] = floatval(str_replace(',', '.', $dados['valor']));
        
        Socios::addInfo('renda', $dados);
        $this->redirect("/renda/$idSocio");
    }

    public function excluir($args) {
        $idSocio = $args['idsocio'];
        $idObjeto = $args['idobjeto'];
        Socios::delTable('renda', $idObjeto);
        $this->redirect("/renda/$idSocio");
    }
}