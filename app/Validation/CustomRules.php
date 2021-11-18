<?php

namespace App\Validation;
class CustomRules{
   

    public function cedula($str)
    {
        $cedula = (string)$str;
        $digito = substr($cedula, 0, 9);
        $validacion = substr($cedula, 9, 10);
        $arrayCoeficientes = array(2,1,2,1,2,1,2,1,2);
        $digitoVerificador = (int)$validacion;
        $digitosIniciales = str_split($digito);
        $total = 0;
        foreach ($digitosIniciales as $key => $value) {

            $valorPosicion = ( (int)$value * $arrayCoeficientes[$key] );

            if ($valorPosicion >= 10) {
                $valorPosicion = str_split($valorPosicion);
                $valorPosicion = array_sum($valorPosicion);
                $valorPosicion = (int)$valorPosicion;
            }

            $total = $total + $valorPosicion;
        }
        $residuo =  $total % 10;

        if ($residuo == 0) {
            $resultado = 0;
        } else {
            $resultado = 10 - $residuo;
        }

        if ($resultado != $digitoVerificador) {
            return false;
        }
        return true;
       
    }
   

  
}

?>