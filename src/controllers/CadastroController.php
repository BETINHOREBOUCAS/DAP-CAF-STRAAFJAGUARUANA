<?php

namespace src\controllers;

use \core\Controller;
use src\models\Socios;

class CadastroController extends Controller
{

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
        // Verifica se existe o cpf cadastrado
    

        // Inserir no Banco de Dados
        if (Socios::addInfo('socios', $dados)) {
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

        $dados['socios'] = Socios::find('', '', $idSocio);

        $this->render('editarCadastro', $dados);
    }

    public function editarCadastroAction($args)
    {
        $idSocio = $args['id'];
        $dados = $_POST;        
        
        Socios::editarCadastro('socios', $dados, $idSocio);
        $_SESSION['notice'] = "Sócio editado com sucesso!";
        $this->redirect("/?id=$idSocio");
    }
}
