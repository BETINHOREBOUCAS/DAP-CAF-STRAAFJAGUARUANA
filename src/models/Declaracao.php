<?php

namespace src\models;

use \core\Model;
use DateTime;
use DateTimeZone;
use PDO;

class Declaracao extends Model
{

    
    public static function buscarInfoDeclaracao($id) {
        $pdo = Conection::sqlSelect();

        $sql = "SELECT * FROM doc_socios WHERE id = $id";
        $result = $pdo->query($sql);
        $sql = $result->fetchAll(PDO::FETCH_ASSOC);

        $info['dados'] = $sql[0];

        $sql = "SELECT * FROM doc_rendas WHERE id_doc_socio = $id";
        $result = $pdo->query($sql);
        $sql = $result->fetchAll(PDO::FETCH_ASSOC);

        $info['renda'] = $sql;

        if ($result->rowCount()>0) {
            return $info;
        } else {
            return false;
        }
    }
    

    public static function buscarSeparado($idDocumento) {
        $pdo = Conection::sqlSelect();

        $sql = "SELECT * FROM separados WHERE id_documento = $idDocumento";
        $result = $pdo->query($sql);
        $sql = $result->fetchAll(PDO::FETCH_ASSOC);

        if ($result->rowCount()>0) {
            return $sql;
        } else {
            return false;
        }
    }

}
