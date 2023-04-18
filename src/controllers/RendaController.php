<?php

namespace src\controllers;

use \core\Controller;
use src\Handlers\Acessor;
use src\Handlers\FacilityHandlers;
use src\models\Membros;
use src\models\Socios;
use src\models\Usuarios;

class RendaController extends Controller
{

    public $idEmpresa;

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

        $this->idEmpresa = $_SESSION['empresa']['id'];
    }

    public function index($args)
    {
        $result = Socios::findRenda($args['idsocio'], $this->idEmpresa);

        //Somar renda
        if ($result) {
            $dados = Acessor::somar($result);
        }    
        
        //Não mudar de linha/posição
        $dados['idsocio'] = $args['idsocio'];
        $dados['membros'] = Membros::findMembroGeneral($args['idsocio'], $this->idEmpresa);
        
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
        
        $idRegistro = Socios::addInfo('renda', $dados);
        if ($idRegistro) {
            FacilityHandlers::registrarAlteracao($dados, $idSocio, 'cadastro_renda');
        }
        
        $this->redirect("/renda/$idSocio");
    }

    public function excluir($args) {
        $idSocio = $args['idsocio'];
        $idObjeto = $args['idobjeto'];
        $dadosExcluidos = Socios::findRendaOne($idObjeto, $this->idEmpresa);
        
        Socios::delTable('renda', $idObjeto);
        FacilityHandlers::registrarAlteracao($dadosExcluidos, $idSocio, 'excluir_renda');
        $this->redirect("/renda/$idSocio");
    }
}