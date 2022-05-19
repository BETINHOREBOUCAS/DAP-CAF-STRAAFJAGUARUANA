<?php
namespace src\controllers;

use \core\Controller;
use src\models\Socios;

class HomeController extends Controller {

    public function index() {
        //Adicionar sessiao cadastrado com sucesso
        
        $dados = [];
        if (!empty($_SESSION['notice'])) {
            $dados['aviso'] = $_SESSION['notice'];
            $_SESSION['notice'] = "";
        }

        if (isset($_GET['nome']) && !empty($_GET['nome']) || isset($_GET['cpf']) && !empty($_GET['cpf']) || isset($_GET['id']) && !empty($_GET['id'])) {
            $nome = filter_input(INPUT_GET, 'nome', FILTER_DEFAULT);
            $cpf = filter_input(INPUT_GET, 'cpf', FILTER_DEFAULT);
            $id = filter_input(INPUT_GET, 'id', FILTER_DEFAULT);
            $dados['socios'] = Socios::find($nome, $cpf, $id);

        }

        $this->render('lista', $dados);
    }

}