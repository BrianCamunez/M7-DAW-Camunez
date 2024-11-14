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
    $arrayOrdenada = array_filter($numeros, function($numero) use ($valor)  {
        return $numero > $valor;
    });
    
    echo implode(", ", $arrayOrdenada);
}

flitrarMayores([1, 2, 3, 4, 5, 6, 7, 8, 9, 10], 5);

?>

<h1>Ejercicio 4</h1>

<?php

function buscarEnArray($array, $valor){

$resultado = in_array($valor,$array);

echo $resultado? "El valor se encuentra en el array" : "El valor no se encuentra en el array";

}

buscarEnArray([1, 2, 3, 4, 5], 3);

?>

<h1>Ejercicio 5</h1>

<?php

function contarElementos($array){

    count($array);

    echo "El array tiene ". count($array). " elementos.";

}

contarElementos([1, 2, 3, 4, 5]);

?>

<h1>Ejercicio 6</h1>

<?php

function obtenerMaximo($numeros){

    max($numeros);

    echo "El número máximo es: ". max($numeros);

}

obtenerMaximo([1, 2, 3, 4, 5]);

?>

<h1>Ejercicio 7</h1>

<?php

function obtenerMinimo($numeros){

    min($numeros);

    echo "El número mínimo es: ". min($numeros);

}

obtenerMinimo([1, 2, 3, 4, 5]);

?>

<h1>Ejercicio 8</h1>


<?php

function eliminarDuplicados($array){

    $array = array_unique($array);

    echo implode(", ", $array);

}

eliminarDuplicados([1, 2, 3, 2, 4, 5, 3]);

?>

<h1>Ejercicio 9</h1>

<?php

function combinarArrays($array1, $array2){

    $arrayCombinado = array_merge($array1, $array2);

    echo implode(", ", $arrayCombinado);

}

combinarArrays([1, 2, 3], [4, 5, 6]);

?>

<h1>Ejercicio 10</h1>

<?php 

function dividirArray($array, $tamano){

    $arrayDividido = array_chunk($array, $tamano);

    print_r($arrayDividido);

}

dividirArray([1, 2, 3, 4, 5, 6, 7, 8, 9, 10], 3);

?>