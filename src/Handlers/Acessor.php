<?php

namespace src\Handlers;

class Acessor
{

    public static function somar($result)
    {

        if ($result != false) {
            $dados['renda'] = $result;
            $contador = 0;
            $contador2 = 1;
            $lista = array();
            $valRural = 0;
            $valUrbana = 0;
            $valConsumo = 0;
            $valProgramasSociais = 0;
            $valTotal = 0;

            //Cria um contador para controle de virgula na lista
            foreach ($dados['renda'] as $key => $value) {
                if ($value['categoria'] == "Milho" || $value['categoria'] == "Feijão" || $value['categoria'] == "Bovino - Carne" || $value['categoria'] == "Bovino - Leite" || $value['categoria'] == "Ovos" || $value['categoria'] == "Aves") {
                    $contador++;
                }
            }

            //Calculando renda rural e urbana %

            foreach ($dados['renda'] as $value) {
                $valTotal += $value['valor'];
                if ($value['categoria'] == "Emprego Urbano" || $value['categoria'] == "Aposentadoria Urbana") {
                    $valUrbana += $value['valor'];
                    $lista['urbano'][] = $value;
                } else if ($value['categoria'] == "Milho - Consumo Familiar" || $value['categoria'] == "Feijão - Consumo Familiar" || $value['categoria'] == "Bovino - Carne - Consumo Familiar" || $value['categoria'] == "Bovino - Leite - Consumo Familiar" || $value['categoria'] == "Ovos - Consumo Familiar" || $value['categoria'] == "Aves - Consumo Familiar" || $value['categoria'] == "Milho - Venda" || $value['categoria'] == "Feijão - Venda" || $value['categoria'] == "Bovino - Carne - Venda" || $value['categoria'] == "Bovino - Leite - Venda" || $value['categoria'] == "Ovos - Venda" || $value['categoria'] == "Aves - Venda" || $value['categoria'] == "Aposentadoria Rural" || $value['categoria'] == "Emprego Rural"){
                    $valRural += $value['valor'];
                    $lista['rural'][] = $value;
                } else if ($value['categoria'] == "Bolsa Família" || $value['categoria'] == "BPC - LOAS") {
                    $valProgramasSociais += $value['valor'];
                    $lista['rural'][] = $value;
                }

                /*
                // Cria uma lista de produto para colocar na declaração
                if ($value['categoria'] == "Milho - Consumo Familiar" || $value['categoria'] == "Feijão - Consumo Familiar" || $value['categoria'] == "Bovino - Carne - Consumo Familiar" || $value['categoria'] == "Bovino - Leite - Consumo Familiar" || $value['categoria'] == "Ovos - Consumo Familiar" || $value['categoria'] == "Aves - Consumo Familiar") {

                    if ($contador2 <= $contador) {
                        $contador2++;
                        $valConsumo += $value['valor'];
                        $lista .= $value['categoria'] . ", ";                        
                    }
                }*/
            }
            
            $dados['valoresCategoria'] = [
                'lista' => $lista,
                'valProgramasSociais' => $valProgramasSociais,
                'valUrbano' => $valUrbana,
                'valRural' => $valRural,
                'porcentagem' => ($valRural / $valTotal) * 100
            ];

            return $dados;
        } else {
            return false;
        }
    }
}
