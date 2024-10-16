<h1>Ejercicio 1</h1>

<?php

function convertirMayusculas($texto){
    return strtoupper($texto);
}

echo convertirMayusculas("Toma pastilla de goma")

?>

<h1>Ejericio 2</h1>

<?php

function contarPalabras($texto){
    return str_word_count($texto);
}

echo contarPalabras("Pastilla de caramelo");

?>

<h1>Ejercicio 3</h1>

<?php 

function obtenerSubcadena($texto, $inicio, $longuitud){
    return substr($texto,$inicio, $longuitud);
}

echo obtenerSubcadena("Pitbull", 0, 5);

?>

<h1>Ejercicio 4</h1>

<?php

function reemplazarPalabras($texto, $buscar, $reemplazar){
    return str_replace($buscar, $reemplazar, $texto);
}

echo reemplazarPalabras("Buenos dias colegon", "colegon", "amiguito");

?>

<h1>Ejercicio 5</h1>

<?php

function invertirTexto($texto){
    return strrev($texto);
}

echo invertirTexto("yokoso, hanten sekai e");

?>

<h1>Ejercicio 6</h1>

<?php

function compararString($cadena1,$cadena2){
    $comparar = strcmp($cadena1, $cadena2);
    if($comparar){
        echo "No son iguales";
        echo "<br>";
    }else{
        echo "Son iguales";
        echo "<br>";
    }
}

compararString("holas","holas");
compararString("holas","hola");

?>

<h1>Ejercicio 7</h1>

<?php

function eliminarEspacio($texto){
    return trim($texto);
    
}

echo eliminarEspacio("   Hola mundo   ");

?>

<h1>Ejercicio 8</h1>

<?php

function contarOcurrencias($texto, $palabra){
    return substr_count($texto, $palabra);
}

echo contarOcurrencias("hola mundo, hola mundo", "hola");

?>

<h1>Ejercicio 9</h1>

<?php

function dividirPalabras($texto){
    return explode(" ", $texto);
}

$palabras = dividirPalabras("Ejercicio especial separar");

print_r($palabras);

?>