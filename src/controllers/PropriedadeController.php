<?php

namespace src\controllers;

use \core\Controller;
use src\Handlers\FacilityHandlers;
use src\models\Socios;
use src\models\Usuarios;

class PropriedadeController extends Controller
{

    public $idEmpresa;

    public function __construct()
    {
        if (!isset($_SESSION['usuario']) || empty($_SESSION['usuario'])) {
            $this->redirect('/login');
        } else {
            $user = Usuarios::getUser($_SESSION['usuario']['email']);

            if ($_SESSION['usuario']['token'] != $user['token']) {
                $this->redirect('/login');
            }
        }

        $this->idEmpresa = $_SESSION['empresa']['id'];
    }

    public function index($args)
    {
        $idSocio = $args['idsocio'];
        $dados['idsocio'] = $idSocio;
        if (!empty($_SESSION['notice'])) {
            $dados['aviso'] = $_SESSION['notice'];
            $_SESSION['notice'] = "";
        }

        $dados['propriedade'] = Socios::findPropriedade($idSocio, $this->idEmpresa);

        $this->render('propriedade', $dados);
    }

    public function cadastro($args)
    {

        // Cria as variaveis recebida do POST
        foreach ($_POST as $key => $value) {
            $dados[$key] = filter_var($value, FILTER_DEFAULT);
        }        
        unset($dados['idPropriedade']);

        $idSocio = $args['idsocio'];
        $dados['id_socio_propriedade'] = $idSocio;
        $propriedadeBD = Socios::findPropriedade($idSocio, $this->idEmpresa);

        echo "<pre>";        

        if (isset($propriedadeBD) && !empty($propriedadeBD)) {
            $dadosAlterados = FacilityHandlers::verifificarAlteração($dados, $propriedadeBD);
            
            if (Socios::alterPropriedade($dados, $this->idEmpresa)) {
                FacilityHandlers::registrarAlteracao($dadosAlterados, $idSocio, 'editar_propriedade');
                $_SESSION['notice'] = "Cadastro alterado com sucesso!";
            }
        } else {
            $result = Socios::addInfo('propriedade', $dados);
            if ($result) {
                FacilityHandlers::registrarAlteracao($dados, $idSocio, 'cadastro_propriedade');
                $_SESSION['notice'] = "Cadastro efetuado com sucesso!";
            }
        }

        $this->redirect("/propriedade/$idSocio");
    }
}
