<?php
namespace src\controllers;

use \core\Controller;
use src\models\Usuarios;

class GerenciarController extends Controller {

    public $idEmpresa;
    public $usuario;

    public function __construct() {
        if (!isset($_SESSION['usuario']) || empty($_SESSION['usuario'])) {
            $this->redirect('/login');
        } else {
            $user = Usuarios::getUser($_SESSION['usuario']['email']);

            if ($_SESSION['usuario']['token'] != $user['token']) {
                $this->redirect('/login');
            }
        }

        $this->idEmpresa = $_SESSION['empresa']['id'];
        $this->usuario = $_SESSION['usuario'];
    }

    public function index() {
        $usuarios = Usuarios::getUserEmpresa($this->idEmpresa);
        
        $this->render('gerenciarHome');
    }

    public function user() {
        
        if ($this->usuario['nivel_acesso'] == 'master') {
            $dados['usuarios'] = Usuarios::getUserEmpresa($this->idEmpresa);
        } else {
            $dados['usuarios'] = $this->usuario;
        }
        
        $this->render('gerenciarUser', $dados);
    }

    public function addUser($args) {        
        $this->render('gerenciarAddUser');
    }

    public function addUserAction($args) {        
        
    }

    public function editUser($args) {
        $idUser = $args['iduser'];
        $dados['usuario'] = Usuarios::getUser($idUser);


        
        $this->render('gerenciarEditarUser', $dados);
    }

    public function editUserAction($args) {
        echo "<pre>";
        print_r($_POST);
    }

}