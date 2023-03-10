<?php

namespace src\controllers;

use \core\Controller;
use DateTime;
use DateTimeZone;
use src\Handlers\FacilityHandlers;
use src\models\Membros;
use src\models\Socios;
use src\models\Usuarios;

class MembrosController extends Controller
{

    public $idEmpresa;

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
    }

    public function listaMembro($args) {
        $dados['id_responsavel'] = $args['id'];
    
        if (!empty($_SESSION['notice'])) {
            $dados['aviso'] = $_SESSION['notice'];
            $_SESSION['notice'] = "";
        }

        $dados['membros'] = Membros::findMembroGeneral($dados['id_responsavel'], $this->idEmpresa);
        $dados['titular'] = Socios::findGeneral('socios', 'id', $dados['id_responsavel']);
        
        $this->render('listaMembros', $dados);
    }

    public function cadastrarMembro($args) {
        $dados['id_socio_responsavel'] = $args['id'];
        $dados['socio'] = Socios::find("", "", $this->idEmpresa, $dados['id_socio_responsavel']);
        $this->render('cadastroMembro', $dados);
    }

    public function cadastrarMembroAction($args) {
        $idResponsavel = $args['id'];
        $dados['id_socio_responsavel'] = $idResponsavel;
        foreach ($_POST as $key => $value) {
            $dados[$key] = filter_var($value, FILTER_DEFAULT);
        }

        $idRegistro = Socios::addInfo('membros', $dados);
        if ($idRegistro) {
            FacilityHandlers::registrarAlteracao($dados, $idResponsavel, 'cadastro_membro');
            $_SESSION['notice'] = "Membro cadastrado com sucesso!";
            $this->redirect("/lista/membros/$idResponsavel");
        }
        
    }

    public function editarMembro($args) {
        $dados['id_responsavel'] = $args['id'];
        $idMembro = $args['idmembro'];
        $dados['membros'] = Membros::findMembroThu('', $this->idEmpresa, '', $idMembro);
        
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

        $membroDB = Membros::findMembroThu('', $this->idEmpresa, '', $idMembro);
        $dadosAlterados = FacilityHandlers::verifificarAlteração($dados, $membroDB);
        
        if (Membros::editarMembro($idMembro, "membros", $dados)) {
            FacilityHandlers::registrarAlteracao($dadosAlterados, $idResponsavel, 'editar_membro');
            $_SESSION['notice'] = "Membro alterado com sucesso!";
        }
        
        $this->redirect("/lista/membros/$idResponsavel");
    }

    public function excluirMembro($args) {
        $idResponsavel = $args['id'];
        $idMembro = $args['idmembro'];
        $membroDB = Membros::findMembroThu('', $this->idEmpresa, '', $idMembro)[0];
        FacilityHandlers::registrarAlteracao($membroDB, $idResponsavel, 'excluir_membro');
        Socios::delTable("membros", $idMembro);
    }
}
