<?php

namespace src\controllers;

use \core\Controller;
use DateTime;
use DateTimeZone;
use src\models\Membros;
use src\models\Socios;

class MembrosController extends Controller
{

    public function listaMembro($args) {
        $dados['id_responsavel'] = $args['id'];
    
        if (!empty($_SESSION['notice'])) {
            $dados['aviso'] = $_SESSION['notice'];
            $_SESSION['notice'] = "";
        }

        $dados['membros'] = Membros::findMembroGeneral($dados['id_responsavel'], true);
        
        $this->render('listaMembros', $dados);
    }

    public function cadastrarMembro($args) {
        $dados['id_socio_responsavel'] = $args['id'];     
        
        $this->render('cadastroMembro', $dados);
    }

    public function cadastrarMembroAction($args) {
        $idResponsavel = $args['id'];
        $dados['id_socio_responsavel'] = $idResponsavel;
        foreach ($_POST as $key => $value) {
            $dados[$key] = filter_var($value, FILTER_DEFAULT);
        }

        if (Socios::addInfo('membros', $dados)) {
            $_SESSION['notice'] = "Membro cadastrado com sucesso!";
            $this->redirect("/lista/membros/$idResponsavel");
        }
        
    }

    public function editarMembro($args) {
        $dados['id_responsavel'] = $args['id'];
        $idMembro = $args['idmembro'];
        $dados['membros'] = Membros::findMembroGeneral($dados['id_responsavel']);
        
        $this->render("editarMembro", $dados);
    }

    public function editarMembroAction($args) {
        $data = new DateTime();
        $data->setTimezone(new DateTimeZone('America/Fortaleza'));
        $dataAtutal = $data->format('d/m/Y H:i:s');
        $idMembro = $args['idmembro'];
        $idResponsavel = $args['id'];
        $dados['data_alteracao'] = $dataAtutal;
        foreach ($_POST as $key => $value) {
            $dados[$key] = filter_var($value, FILTER_DEFAULT);
        }

        if (Membros::editarMembro($idMembro, "membros", $dados)) {
            $_SESSION['notice'] = "Membro alterado com sucesso!";
        }

        $this->redirect("/lista/membros/$idResponsavel");
    }

    public function excluirMembro($args) {
        $idMembro = $args['idmembro'];
        $idResponsavel = $args['id'];
        Socios::delTable("membros", $idMembro);

        $this->redirect("/lista/membros/$idResponsavel");
    }
}
