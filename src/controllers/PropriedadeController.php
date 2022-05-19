<?php

namespace src\controllers;

use \core\Controller;
use src\models\Socios;

class PropriedadeController extends Controller
{

    public function index($args)
    {
        $idSocio = $args['id'];
        $dados['idsocio'] = $idSocio;
        if (!empty($_SESSION['notice'])) {
            $dados['aviso'] = $_SESSION['notice'];
            $_SESSION['notice'] = "";
        }

        $dados['propriedade'] = Socios::findPropriedade($idSocio);
        
        $this->render('propriedade', $dados);
    }

    public function cadastro($args)
    {

        $idSocio = $args['id'];
        $dados['id_socio_propriedade'] = $args['id'];
        // Cria as variaveis recebida do POST
        foreach ($_POST as $key => $value) {
            $dados[$key] = filter_var($value, FILTER_DEFAULT);
        }
        $idPropriedade = $dados['idPropriedade'];
        unset($dados['idPropriedade']);

        $result = Socios::addInfo('propriedade', $dados);
        if ($result) {
            $_SESSION['notice'] = "Cadastro efetuado com sucesso!";
            if (Socios::alterPropriedade($idPropriedade)) {
                $_SESSION['notice'] = "Cadastro alterado com sucesso!";
            }
        }

        $this->redirect("/propriedade/$idSocio");
    }
}
