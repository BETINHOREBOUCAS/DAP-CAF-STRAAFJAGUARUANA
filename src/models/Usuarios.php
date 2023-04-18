<?php
namespace src\models;
use \core\Model;
use DateTime;
use DateTimeZone;
use PDO;

class Usuarios extends Model {
    public static function addInfo($table, $dados, $idEmpresa = false) {
        
        $data = new DateTime();
        $data->setTimezone(new DateTimeZone('America/Fortaleza'));
        $dataAtutal = $data->format('d/m/Y H:i:s');
        $dados['data_inclusao'] = $dataAtutal;
        if ($idEmpresa) {
            $dados['id_empresa'] = $idEmpresa;
        }
        
        $pdo = Conection::sqlSelect();

        foreach ($dados as $key => $value) {
            $keyBind[] = ":$key";
            $valueData[] = $value;
        }

        $key = implode(', ', array_keys($dados));
        $keyBindStr = implode(', ', $keyBind);

        $sql = "INSERT INTO $table ($key) VALUES ($keyBindStr)";

        $sql = $pdo->prepare($sql);
        for ($i = 0; $i < count($dados); $i++) {
            $sql->bindValue("$keyBind[$i]", "$valueData[$i]");
        }

        $sql->execute();

        if ($sql->rowCount() > 0) {
            return $pdo->lastInsertId();
        }
    }

    public static function getUser($user) {
        $pdo = Conection::sqlSelect();

        $sql = "SELECT * FROM usuarios WHERE email = '$user' OR id = '$user' OR cpf = '$user'";
        $result = $pdo->query($sql);
        $sql = $result->fetch(PDO::FETCH_ASSOC);
        if ($result->rowCount()>0) {
            return $sql;
        } else {
            return false;
        }
    }

    public static function updateToken($table, $valor, $id) {
        $pdo = Conection::sqlSelect();
        $sql = "UPDATE $table SET token = '$valor' WHERE id = $id";
        $sql = $pdo->query($sql);
        if ($sql->rowCount()>0) {
            return true;
        } else {
            return false;
        }
    }

    public static function updateUser($table, $dados, $idUser) {
        print_r($dados);
        $pdo = Conection::sqlSelect();
        $string = '';
        foreach ($dados as $key => $value) {
            if ($key != 'nivel_acesso') {
                $string .= "$key = '$value', ";
            } else {
                $string .= "$key = '$value' ";
                break;
            }
        }
        $sql = "UPDATE $table SET $string WHERE id = $idUser";
        $sql = $pdo->query($sql);
        if ($sql->rowCount() > 0) {
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