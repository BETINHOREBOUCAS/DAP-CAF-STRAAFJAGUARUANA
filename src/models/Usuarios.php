<?php
namespace src\models;
use \core\Model;
use PDO;

class Usuarios extends Model {
    public static function getUser($user) {
        $pdo = Conection::sqlSelect();

        $sql = "SELECT * FROM usuarios WHERE email = '$user' OR id = '$user'";
        $result = $pdo->query($sql);
        $sql = $result->fetch(PDO::FETCH_ASSOC);
        if ($result->rowCount()>0) {
            return $sql;
        } else {
            return false;
        }
    }

    public static function updateUser($table, $valor, $id) {
        $pdo = Conection::sqlSelect();
        $sql = "UPDATE $table SET token = '$valor' WHERE id = $id";
        $sql = $pdo->query($sql);
        if ($sql->rowCount()>0) {
            return true;
        } else {
            return false;
        }
    }

    public static function getEmpresa($id) {
        $pdo = Conection::sqlSelect();

        $sql = "SELECT * FROM empresa WHERE id = '$id'";
        $result = $pdo->query($sql);
        $sql = $result->fetch(PDO::FETCH_ASSOC);
        if ($result->rowCount()>0) {
            return $sql;
        } else {
            return false;
        }
    }

    public static function getUserEmpresa($idEmpresa) {
        $pdo = Conection::sqlSelect();

        $sql = "SELECT * FROM usuarios WHERE id_empresa = '$idEmpresa' ORDER BY nome ASC";
        $result = $pdo->query($sql);
        $sql = $result->fetchAll(PDO::FETCH_ASSOC);
        if ($result->rowCount()>0) {
            return $sql;
        } else {
            return false;
        }
    }
}