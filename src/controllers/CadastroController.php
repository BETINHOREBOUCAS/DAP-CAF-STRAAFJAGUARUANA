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
        // Verifica se é casado ou amasiado
        if ($dados['estado_civil'] == "Casados" || $dados['estado_civil'] == "Amasiados") {
            if (isset($dados['titular2']) && isset($dados['rg2']) && isset($dados['cpf2']) && isset($dados['dn2']) && isset($dados['mae2']) && isset($dados['escolaridade2'])) {

                //Verifica se existe algum campo vazio
                if (empty($dados['titular2']) || empty($dados['rg2']) || empty($dados['rg2']) || empty($dados['cpf2']) || empty($dados['dn2']) || empty($dados['mae2']) || empty($dados['escolaridade2']) || empty($dados['sindicato2'])) {
                    $_SESSION['notice'] = "Todas as informações do titular 2 são obrigatórias!";
                    $_SESSION['dados'] = $dados;
                    $this->redirect('/cadastro');
                }
            }
        }

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
        if ($dados['estado_civil'] == "Casados" || $dados['estado_civil'] == "Amasiados") {
            if (isset($dados['titular2']) && isset($dados['rg2']) && isset($dados['cpf2']) && isset($dados['dn2']) && isset($dados['mae2']) && isset($dados['escolaridade2'])) {

                //Verifica se existe algum campo vazio
                if (empty($dados['titular2']) || empty($dados['rg2']) || empty($dados['rg2']) || empty($dados['cpf2']) || empty($dados['dn2']) || empty($dados['mae2']) || empty($dados['escolaridade2']) || empty($dados['sindicato2'])) {
                    $_SESSION['notice'] = "Todas as informações do titular 2 são obrigatórias quando a opção estado civil for casado!";
                    $_SESSION['dados'] = $dados;
                    $this->redirect("/cadastro/editar/$idSocio");
                }
            }
        }
        Socios::editarCadastro('socios', $dados, $idSocio);
        $_SESSION['notice'] = "Sócio editado com sucesso!";
        $this->redirect("/cadastro/editar/$idSocio");
    }
}
