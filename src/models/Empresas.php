<?php
namespace src\models;
use \core\Model;
use PDO;

class Empresas extends Model {  

    public static function verifyEmpresa($cnpj) {
        $pdo = Conection::sqlSelect();

        $sql = "SELECT * FROM empresa WHERE cnpj = '$cnpj'";
        $result = $pdo->query($sql);
        $sql = $result->fetch(PDO::FETCH_ASSOC);
        if ($result->rowCount()>0) {
            return $sql;
        } else {
            return false;
        }
    }

}