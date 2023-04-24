<?php
namespace src\controllers;

use \core\Controller;
use src\Handlers\FacilityHandlers;
use src\models\Socios;
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
        $this->usuario = $user;
    }

    public function index() {
        $dados['permissao'] = $this->usuario['nivel_acesso'];
        $usuarios = Usuarios::getUserEmpresa($this->idEmpresa);
        
        $this->render('gerenciarHome', $dados);
    }

    public function user() {
        $dados['permissao'] = $this->usuario['nivel_acesso'];
        if (in_array('master', json_decode($this->usuario['nivel_acesso']))) {
            $dados['usuarios'] = Usuarios::getUserEmpresa($this->idEmpresa);
        } else {
            $dados['usuarios'][] = $this->usuario;
        }
        $this->render('gerenciarUser', $dados);
    }

    public function addUser($args) {    
        $dados = [] ;
        if (!empty($_SESSION['notice'])) {
            $dados['aviso'] = $_SESSION['notice'];
            $_SESSION['notice'] = "";
        }

        $this->render('gerenciarAddUser', $dados);
    }

    public function addUserAction($args) {
        
        $senha = filter_var($_POST['password'], FILTER_DEFAULT);
        $senha2 = filter_var($_POST['password2'], FILTER_DEFAULT);
        if ($senha == $senha2) {
            if (isset($_POST['nivel'])) {
                $nivel = filter_var_array($_POST['nivel'], FILTER_DEFAULT);
            } else {
                $nivel = array('inativo');
            }
            $dados['nivel_acesso'] = json_encode($nivel);
            $dados['senha'] = password_hash($senha, PASSWORD_DEFAULT);
        }
        
        $dados['nome'] = filter_var($_POST['nome'], FILTER_DEFAULT);
        $dados['cpf'] = filter_var($_POST['cpf'], FILTER_DEFAULT);
        $dados['zap'] = filter_var($_POST['zap'], FILTER_DEFAULT);
        $dados['email'] = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
        
        if (Usuarios::getUser($dados['cpf'])) {
            $_SESSION['notice'] = "O CPF ". $dados['cpf']. " já está cadastrado!";
            $this->redirect('/gerenciar/add/user');
        }
        if (Usuarios::getUser($dados['email'])) {
            $_SESSION['notice'] = "O e-mail ". $dados['email']. " já está cadastrado!";
            $this->redirect('/gerenciar/add/user');
        }

        $idCadastro = Socios::addInfo('usuarios', $dados);
        FacilityHandlers::registrarAlteracao($dados, $idCadastro, 'cadastro_usuario');

        $this->redirect('/gerenciar/user');
    }

    public function editUser($args) {
        if (!empty($_SESSION['notice'])) {
            $dados['aviso'] = $_SESSION['notice'];
            $_SESSION['notice'] = "";
        }

        $idUser = $args['iduser'];
        $dados['access_system'] = $this->usuario;
        $dados['usuario'] = Usuarios::getUser($idUser);
        
        $this->render('gerenciarAddUser', $dados);
    }

    public function editUserAction($args) {
        $idUser = filter_var($_POST['id'], FILTER_VALIDATE_INT);
        if (isset($_POST['nivel'])) {
            $nivel = filter_var_array($_POST['nivel'], FILTER_DEFAULT);
        } else {
            $nivel = array('inativo');
        }
        $dados['nome'] = filter_var($_POST['nome'], FILTER_DEFAULT);
        $dados['cpf'] = filter_var($_POST['cpf'], FILTER_DEFAULT);
        $dados['zap'] = filter_var($_POST['zap'], FILTER_DEFAULT);
        $dados['email'] = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
        $senha = filter_var($_POST['password'], FILTER_DEFAULT);
        $senha2 = filter_var($_POST['password2'], FILTER_DEFAULT);
        if (!empty($senha) && !empty($senha2)) {
            if ($senha == $senha2) {
                $dados['senha'] = password_hash($senha, PASSWORD_DEFAULT);
            } else {
                $this->redirect('/gerenciar/user/edit/'.$idUser);
            }
        }
        $dados['nivel_acesso'] = json_encode($nivel);

        $dadosDB[] = Usuarios::getUser($idUser);
        Usuarios::updateUser('usuarios', $dados, $idUser);
        $dadosAlterados = FacilityHandlers::verifificarAlteração($dados, $dadosDB);
        FacilityHandlers::registrarAlteracao($dadosAlterados, $idUser, "editar_usuario");
        $_SESSION['notice'] = "Usuário alterado com sucesso!";
        $this->redirect('/gerenciar/user/edit/'.$idUser);
    }

}