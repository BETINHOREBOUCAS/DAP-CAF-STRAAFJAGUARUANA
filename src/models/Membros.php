<?php

namespace src\models;

use \core\Model;
use PDO;

class Membros extends Model {

    /*---------------------------------------------------------------------------------*/
        // realizado configuração Multi Empresa
    /*---------------------------------------------------------------------------------*/

    public static function findMembroGeneral($id, $idEmpresa) {
        $pdo = Conection::sqlSelect();

        $sql = "SELECT * FROM `membros` WHERE id_socio_responsavel = $id AND id_empresa = $idEmpresa";
        $result = $pdo->query($sql);
        $sql = $result->fetchAll(PDO::FETCH_ASSOC);
        if ($result->rowCount()>0) {
            return $sql;
        }
                
    }

    /*---------------------------------------------------------------------------------*/
        // FIM
    /*---------------------------------------------------------------------------------*/

    /*---------------------------------------------------------------------------------*/
        // realizado configuração Multi Empresa
    /*---------------------------------------------------------------------------------*/

    public static function findMembro($cpf, $idEmpresa) {
        $pdo = Conection::sqlSelect();
        
        $sql = "SELECT * FROM `membros` WHERE id_empresa = $idEmpresa AND cpf_membro = '$cpf'";
        $result = $pdo->query($sql);
        $sql = $result->fetchAll(PDO::FETCH_ASSOC);
        if ($result->rowCount()>0) {
            return $sql;
        }

    }

    /*---------------------------------------------------------------------------------*/
        // FIM
    /*---------------------------------------------------------------------------------*/

    /*---------------------------------------------------------------------------------*/
        // realizado configuração Multi Empresa
    /*---------------------------------------------------------------------------------*/

    public static function findMembroThu($nome, $idEmpresa, $cpf, $id = false) {
        $pdo = Conection::sqlSelect();

        if (empty($nome)) {
            $nome = ".";
        }
        if (empty($cpf)) {
            $cpf = ".";
        }            
    
        if ($id) {
            $sql = "SELECT * FROM `membros` WHERE id_empresa = $idEmpresa AND id = $id"; 
        } else {
           $sql = "SELECT * FROM `membros` WHERE id_empresa = $idEmpresa AND nome_membro LIKE '%$nome%' OR id_empresa = $idEmpresa AND cpf_membro = '$cpf'";
        }
        
    
        $result = $pdo->query($sql);
        $sql = $result->fetchAll(PDO::FETCH_ASSOC);

        return $sql;
    }

    /*---------------------------------------------------------------------------------*/
        // FIM
    /*---------------------------------------------------------------------------------*/

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
