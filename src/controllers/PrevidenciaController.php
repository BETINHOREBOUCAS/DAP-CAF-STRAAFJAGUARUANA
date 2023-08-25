<?php
namespace src\controllers;

use \core\Controller;
use src\Handlers\FacilityHandlers;
use src\models\Usuarios;

class PrevidenciaController extends Controller {

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
        $this->render('previdenciaLista', $dados);
    }

}