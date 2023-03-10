<?php

namespace src\controllers;

use \core\Controller;
use src\Handlers\FacilityHandlers;
use src\models\Socios;
use src\models\Usuarios;

class CadastroController extends Controller
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

    public function index()
    {
        $dados = [];
        if (!empty($_SESSION['notice'])) {
            $dados['aviso'] = $_SESSION['notice'];
            $_SESSION['notice'] = "";
        }
        if (!empty($_SESSION['dados'])) {
            $dados['dados'] = $_SESSION['dados'];
            $_SESSION['dados'] = '';
        }
        $this->render('cadastro', $dados);
    }

    public function cadastroAction()
    {
        // Cria as variaveis recebida do POST
        foreach ($_POST as $key => $value) {
            $dados[$key] = filter_var($value, FILTER_DEFAULT);
        }
        // Verificar se existe o cpf cadastrado


        // Inserir no Banco de Dados
        $idRegistro = Socios::addInfo('socios', $dados);
        if ($idRegistro) {
            FacilityHandlers::registrarAlteracao($dados, $idRegistro, 'cadastro_socio');
            $_SESSION['notice'] = "Sócio cadastrado com sucesso!";
            $this->redirect('/');
        }
    }

    public function editarCadastro($args)
    {
        $idSocio = $args['id'];

        $dados = [];
        if (!empty($_SESSION['notice'])) {
            $dados['aviso'] = $_SESSION['notice'];
            $_SESSION['notice'] = "";
        }
        if (!empty($_SESSION['dados'])) {
            $dados['dados'] = $_SESSION['dados'];
            $_SESSION['dados'] = '';
        }

        $dados['socios'] = Socios::find('', '', $this->idEmpresa, $idSocio);

        $this->render('editarCadastro', $dados);
    }

    public function editarCadastroAction($args)
    {
        $idSocio = $args['id'];
        foreach ($_POST as $key => $value) {
            $dados[$key] = filter_var($value, FILTER_DEFAULT);
        }
        $socioBD = Socios::find('', '', $this->idEmpresa, $idSocio);
        $dadosAlterados = FacilityHandlers::verifificarAlteração($dados, $socioBD);
        
        if (Socios::editarCadastro('socios', $dados, $idSocio)) {
            FacilityHandlers::registrarAlteracao($dadosAlterados, $idSocio, 'editar_socio');
            $_SESSION['notice'] = "Sócio editado com sucesso!";
            $this->redirect("/?id=$idSocio");
        }
        $this->redirect("/?id=$idSocio");
    }
}
