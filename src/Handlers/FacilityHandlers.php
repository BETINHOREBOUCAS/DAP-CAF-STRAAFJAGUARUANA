<?php

namespace src\Handlers;

use src\models\Membros;
use src\models\Socios;

class FacilityHandlers {

    public static function registrarAlteracao($dados, $idRegistro, String $action) {
        $registro['dados'] = json_encode($dados);
        $registro['acao'] = $action;
        $registro['id_socio'] = $idRegistro;
        $registro['nome_usuario'] = $_SESSION['usuario']['nome'];
        $registro['cpf_usuario'] = $_SESSION['usuario']['cpf'];
        $registro['id_usuario'] = $_SESSION['usuario']['id'];
        Socios::addInfo('log', $registro);
    }

    public static function verifificarAlteração($dados, $infoBD) {
        $dadosAlterados = [];
        foreach ($dados as $key => $value) {
            foreach ($infoBD[0] as $keySocio => $socio) {
                if ($key == $keySocio) {
                    if ($socio != $value) {
                        $dadosAlterados[$key] = ['info_anterior' => $socio, 'info_atual' => $value];
                    }
                }
            }
        }
        return $dadosAlterados;
    }

    public static function openListGET($get, $idEmpresa) {
        $dados = [];
        if (!empty($_SESSION['notice'])) {
            $dados['aviso'] = $_SESSION['notice'];
            $_SESSION['notice'] = "";
        }

        if (isset($get['nome']) && !empty($get['nome']) || isset($get['cpf']) && !empty($get['cpf']) || isset($get['id']) && !empty($get['id'])) {
            $nome = filter_input(INPUT_GET, 'nome', FILTER_DEFAULT);
            $cpf = filter_input(INPUT_GET, 'cpf', FILTER_DEFAULT);
            $id = filter_input(INPUT_GET, 'id', FILTER_DEFAULT);
            $dados['socios'] = Socios::find($nome, $cpf, $idEmpresa, $id);
        }

        if (isset($get['nomeMembro']) && !empty($get['nomeMembro']) || isset($get['cpfMembro']) && !empty($get['cpfMembro'])) {
            $nomeMembro = filter_input(INPUT_GET, 'nomeMembro', FILTER_DEFAULT);
            $cpfMembro = filter_input(INPUT_GET, 'cpfMembro', FILTER_DEFAULT);            
            $dados['membros'] = Membros::findMembroThu($nomeMembro, $idEmpresa, $cpfMembro);
        }

        return $dados;
    }
    
}
