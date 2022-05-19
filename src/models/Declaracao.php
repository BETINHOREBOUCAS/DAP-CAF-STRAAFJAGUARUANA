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

        $sql = "SELECT * FROM documentos WHERE id = $id";
        $result = $pdo->query($sql);
        $sql = $result->fetchAll(PDO::FETCH_ASSOC);

        $info['dados'] = $sql[0];

        $sql = "SELECT * FROM doc_renda WHERE id_documento = $id";
        $result = $pdo->query($sql);
        $sql = $result->fetchAll(PDO::FETCH_ASSOC);

        $info['renda'] = $sql;

        if ($result->rowCount()>0) {
            return $info;
        } else {
            return false;
        }
    }

}
