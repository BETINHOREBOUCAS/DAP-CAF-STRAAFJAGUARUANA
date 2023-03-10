<?php

namespace src\Handlers;

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
    
}
