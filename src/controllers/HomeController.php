<?php
namespace src\controllers;

use \core\Controller;
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
        
        $dados = [];
        if (!empty($_SESSION['notice'])) {
            $dados['aviso'] = $_SESSION['notice'];
            $_SESSION['notice'] = "";
        }

        if (isset($_GET['nome']) && !empty($_GET['nome']) || isset($_GET['cpf']) && !empty($_GET['cpf']) || isset($_GET['id']) && !empty($_GET['id'])) {
            $nome = filter_input(INPUT_GET, 'nome', FILTER_DEFAULT);
            $cpf = filter_input(INPUT_GET, 'cpf', FILTER_DEFAULT);
            $id = filter_input(INPUT_GET, 'id', FILTER_DEFAULT);
            $dados['socios'] = Socios::find($nome, $cpf, $this->idEmpresa, $id);
        }

        if (isset($_GET['nomeMembro']) && !empty($_GET['nomeMembro']) || isset($_GET['cpfMembro']) && !empty($_GET['cpfMembro'])) {
            $nomeMembro = filter_input(INPUT_GET, 'nomeMembro', FILTER_DEFAULT);
            $cpfMembro = filter_input(INPUT_GET, 'cpfMembro', FILTER_DEFAULT);            
            $dados['membros'] = Membros::findMembroThu($nomeMembro, $this->idEmpresa, $cpfMembro);
        }

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