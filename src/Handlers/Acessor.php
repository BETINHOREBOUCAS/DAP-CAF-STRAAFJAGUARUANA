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
            $lista = "";
            $valRural = 0;
            $valUrbana = 0;
            $valConsumo = 0;
            $valTotal = 0;
            /*echo "<pre>";
            print_r($dados);*/

            //Cria um contador para controle de virgula na lista
            foreach ($dados['renda'] as $key => $value) {
                if ($value['categoria'] == "Milho" || $value['categoria'] == "Feijão" || $value['categoria'] == "Bovino - Carne" || $value['categoria'] == "Bovino - Leite" || $value['categoria'] == "Ovos" || $value['categoria'] == "Aves") {
                    $contador++;
                }
            }

            //Calculando renda rural e urbana %

            foreach ($dados['renda'] as $value) {
                $valTotal += $value['valor'];
                if ($value['categoria'] == "Emprego Urbano") {
                    $valUrbana += $value['valor'];
                } else {
                    $valRural += $value['valor'];
                }

                if ($value['categoria'] == "Milho" || $value['categoria'] == "Feijão" || $value['categoria'] == "Bovino - Carne" || $value['categoria'] == "Bovino - Leite" || $value['categoria'] == "Ovos" || $value['categoria'] == "Aves") {

                    if ($contador2 <= $contador) {
                        $contador2++;
                        $valConsumo += $value['valor'];
                        $lista .= $value['categoria'] . ", ";                        
                    }
                }
            }
            //echo $contador2;
            $dados['valoresCategoria'] = [
                'lista' => $lista,
                'valConsumo' => $valConsumo,
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
