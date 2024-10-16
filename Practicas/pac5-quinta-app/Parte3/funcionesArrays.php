<h1>Ejercicio 1</h1>

<?php 

function sumarArray($numeros){
    return array_sum($numeros);
}

echo sumarArray([1, 2, 3, 4, 5]);

?>

<h1>Ejercicio 2</h1>

<?php

function ordenarArrayAlfabetico($nombres){

    sort($nombres);

    echo implode(", ", $nombres);
    
}

ordenarArrayAlfabetico(["Pedro", "Juan", "Maria", "Ana"]);

?>

<h1>Ejercicio 3</h1>

<?php

function flitrarMayores($numeros, $valor){  
    $arrayOrdenada = array_filter($numeros, function($numero){
        return $numero > $valor;
    });
}

?>