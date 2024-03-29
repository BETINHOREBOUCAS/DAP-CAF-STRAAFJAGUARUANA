<?php
namespace src\controllers;

use \core\Controller;
use src\Handlers\FacilityHandlers;
use src\models\Membros;
use src\models\Socios;
use src\models\Usuarios;

class HomeController extends Controller {

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

    public function index() {

        $dados = FacilityHandlers::openListGET($_GET, $this->idEmpresa);        

        $this->render('lista', $dados);
    }

    public function verifyCPF() {
        $cpf = $_POST['cpf'];
        $socios = Socios::find('', $cpf, $this->idEmpresa);
        if ($socios) {
            $cpf_verify['cpf_verify'] = $socios[0]['cpf_socio'];
        } else {
            $membros = Membros::findMembro($cpf, $this->idEmpresa);
            if ($membros) {
                $cpf_verify['cpf_verify'] = $membros[0]['cpf_membro'];
            } else {
                $cpf_verify['cpf_verify'] = 0;
            }
        }       
        echo json_encode($cpf_verify);
    }

}