<?php

namespace src\models;

use \core\Model;
use DateTime;
use DateTimeZone;
use PDO;

class Membros extends Model {

    public static function findMembroGeneral($id, $ativo = true) {
        $pdo = Conection::sqlSelect();

        if ($ativo) {
            $sql = "SELECT * FROM `membros` WHERE id_socio_responsavel = $id";
            $result = $pdo->query($sql);
            $sql = $result->fetchAll(PDO::FETCH_ASSOC);
            if ($result->rowCount()>0) {
                return $sql;
            }
        }
        
    }

    public static function editarMembro($idMembro, $table, $dados) {
        $pdo = Conection::sqlSelect();
        $alter = "";
        $contador = 0;
        foreach ($dados as $key => $value) {
            $contador++;
            if ($contador < count($dados)) {
                $alter .= "$key = '$value', ";
            } else {
                $alter .= "$key = '$value' ";
            }
            
        }

        $sql = "UPDATE $table SET $alter WHERE id = $idMembro";

        $sql = $pdo->query($sql);
        if ($sql->rowCount() > 0) {
            return true;
        }

    }
    
}
