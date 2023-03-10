<?php

namespace src\models;

use \core\Model;
use DateTime;
use DateTimeZone;
use PDO;

class Socios extends Model
{

    
    public static function addInfo($table, $dados)
    {
        $data = new DateTime();
        $data->setTimezone(new DateTimeZone('America/Fortaleza'));
        $dataAtutal = $data->format('d/m/Y H:i:s');
        $dados['data_inclusao'] = $dataAtutal;
        $dados['id_empresa'] = $_SESSION['usuario']['id_empresa'];

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

    public static function find($nome, $cpf, $idEmpresa, $id = false)
    {
        $pdo = Conection::sqlSelect();

        if ($id) {
            $sql = "SELECT * FROM `socios` WHERE id = $id AND id_empresa = $idEmpresa";
            $result = $pdo->query($sql);
            $sql = $result->fetchAll(PDO::FETCH_ASSOC);
        } else {
            if (empty($nome)) {
                $nome = ".";
            }
            if (empty($cpf)) {
                $cpf = ".";
            }

            $sql = "SELECT * FROM `socios` WHERE id_empresa = $idEmpresa AND nome_socio LIKE '%$nome%' OR id_empresa = $idEmpresa AND cpf_socio = '$cpf'";

            $result = $pdo->query($sql);
            $sql = $result->fetchAll(PDO::FETCH_ASSOC);
        }

        return $sql;
    }

    public static function findRenda($id, $idEmpresa)
    {
        $pdo = Conection::sqlSelect();

        $sql = "SELECT * FROM renda WHERE id_socio = $id AND id_empresa = $idEmpresa";
        $result = $pdo->query($sql);
        $sql = $result->fetchAll(PDO::FETCH_ASSOC);

        if ($result->rowCount() > 0) {
            return $sql;
        } else {
            return false;
        }
    }

    public static function findRendaOne($idRenda, $idEmpresa)
    {
        $pdo = Conection::sqlSelect();

        $sql = "SELECT * FROM renda WHERE id = $idRenda AND id_empresa = $idEmpresa";
        $result = $pdo->query($sql);
        $sql = $result->fetch(PDO::FETCH_ASSOC);

        if ($result->rowCount() > 0) {
            return $sql;
        } else {
            return false;
        }
    }

    public static function delTable($table, $id)
    {
        $pdo = Conection::sqlSelect();

        $sql = "DELETE FROM $table WHERE id = $id";
        $pdo->query($sql);
    }

    public static function findPropriedade($idSocio, $idEmpresa)
    {
        $pdo = Conection::sqlSelect();

        $sql = "SELECT * FROM propriedade WHERE id_socio_propriedade = $idSocio AND id_empresa = $idEmpresa";
        $result = $pdo->query($sql);
        $sql = $result->fetchAll(PDO::FETCH_ASSOC);
        if ($result->rowCount() > 0) {
            return $sql;
        } else {
            return false;
        }
    }

    public static function alterPropriedade($dados, $idEmpresa)
    {
        $pdo = Conection::sqlSelect();

        $string = '';
        $count = 0;

        foreach ($dados as $key => $value) {
            $count += 1;

            if ($count < 15) {
                $string .= "$key = '$value', ";
            } else {
                $string .= "$key = '$value' ";
            }
        }
        
        
        echo $sql = "UPDATE propriedade SET $string WHERE id_empresa = $idEmpresa";
        
        $result = $pdo->query($sql);
        $sql = $result->fetchAll(PDO::FETCH_ASSOC);
        if ($result->rowCount() > 0) {
            return true;
        }
        
    }

    public static function findGeneral($table, $coluna, $info_coluna)
    {
        $pdo = Conection::sqlSelect();
        $idEmpresa = $_SESSION['usuario']['id_empresa'];
        $sql = "SELECT * FROM $table WHERE $coluna = $info_coluna ORDER BY ID DESC";
        $result = $pdo->query($sql);
        $sql = $result->fetchAll(PDO::FETCH_ASSOC);
        if ($result->rowCount() > 0) {
            return $sql;
        }
    }

    public static function addRendaAction($table, $renda)
    {
        $pdo = Conection::sqlSelect();
        $data = new DateTime();
        $data->setTimezone(new DateTimeZone('America/Fortaleza'));
        $dataInclusao = $data->format('d/m/Y H:i:s');
        foreach ($renda as $key => $rendaIndividual) {

            $rendaIndividual['id'];
            $categoria = $rendaIndividual['categoria'];
            $membro = $rendaIndividual['membro'];
            $valor = $rendaIndividual['valor'];
            $idSocioResponsavel = $rendaIndividual['id_socio'];
            $idDocumento = $rendaIndividual['id_documento'];

            echo $sql = "INSERT INTO $table (membro, categoria, valor, data_inclusao, id_documento, id_socio_responsavel) VALUES ('$membro', '$categoria', $valor, '$dataInclusao', $idDocumento, $idSocioResponsavel)";
            $pdo->query($sql);
        }
    }

    public static function editarCadastro($table, $dados, $idSocio)
    {
        $pdo = Conection::sqlSelect();

        $string = '';
        foreach ($dados as $key => $value) {
            if ($key != 'mao_obra_socio') {
                $string .= "$key = '$value', ";
            } else {
                $string .= "$key = '$value' ";
                break;
            }
        }

        $sql = "UPDATE $table SET $string WHERE id = $idSocio";
        $sql = $pdo->query($sql);
        if ($sql->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    
}
