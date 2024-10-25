<?php
class TriangleGenerator {

    public static function generateTriangle(int $altura): string {
        $output = "<pre>"; 
        $cont = 0;

        // Bucle para las filas
        for ($i = 0; $cont < $altura; $i++) {
            // Verifica si la fila tiene un número impar de asteriscos (solo dibujamos si es impar)
            if (!($i % 2)) {
                // Bucle para generar los espacios en blanco antes de los asteriscos
                for ($j = 0; $j < ($altura - ($cont+1)); $j++) {
                    $output .= "&nbsp;";
                }

                // Bucle para generar los asteriscos en la fila actual
                for ($k = 0; $k <= $i; $k++) {
                    $output .= "*";
                }

                // Agrega un salto de línea al final de cada fila
                $output .= "<br>";
                $cont++;
            }
        }

        $output .= "</pre>"; 
        return $output; 
    }
}
