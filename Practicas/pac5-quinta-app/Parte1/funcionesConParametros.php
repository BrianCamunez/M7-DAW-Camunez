<h1>Ejercicio 1</h1>

<?php
function generarSaludo($nombre){
    echo "<h3>Hola, {$nombre}!</h3>";
}

generarSaludo('juan');

?>

<h1>Ejercicio 2</h1>

<?php
function calcularTotal($precio, $cantidad, $impuesto){
    $totalSinImpuesto = $precio * $cantidad;

    $impuestoRestar = ($impuesto / 100) * $totalSinImpuesto;

    $totalConImpuesto = $totalSinImpuesto + $impuestoRestar;

    return($totalConImpuesto);
}

echo calcularTotal(30,4,21);

?>

<h1>Ejercicio 3</h1>

<?php
function generarResum($texto, $limite){
    $tamaño = strlen($texto);
    $resultado = ($tamaño <$limite) ? $texto : substr($texto, 0, $limite) . "...";
    echo $resultado;

}

generarResum("hola",7);

?>

<h1>Ejercicio 4</h1>

<?php
function convertirTemperatura($temperatura, $escala){

    switch($escala){
        case 'C':
            $temperaturaConvertida = ($temperatura - 32) * 5 / 9;
            $escalaConvertida = " F";
            break;
        case 'F':
            $temperaturaConvertida = ($temperatura * 9 / 5) + 32;
            $escalaConvertida = " C";
            break;
        
    };

    echo $temperaturaConvertida . $escalaConvertida;
}

convertirTemperatura(32, "C");

?>

<h1>Ejercicio 5</h1>

<?php

function calcularEdad($anyoNacimiento){
    $fechaActual = date("Y");

    $edad = $fechaActual - $anyoNacimiento;

    echo $edad;
}

calcularEdad(2000);

?>

<h1>Ejericio 6</h1>

<?php 

function esPar($numero){
    if($numero % 2 == 0){
        echo "$numero es par";
        echo "<br>";
        return true;
    }else{
        echo "$numero no es par";
        echo "<br>";
        return false;
    }
}

esPar(23);
esPar(22);

?>

<h1>Ejercicio 7</h1>

<?php

function generarEnlaceDescarga($archivo){
    return "<a href='$archivo' download>Descargar</a>";
}

echo generarEnlaceDescarga("arcihvo.pdf");

?>

<h1>Ejericio 8</h1>

<?php

function calcularDescuento($precioOriginal, $descuento){
    return $precioOriginal - ($descuento * $precioOriginal / 100);
}

echo calcularDescuento(20, 25);

?>

<h1>Ejericio 9</h1>

<?php

function convertirHorasEnMinutos($horas){
    $minutos = $horas * 60;
    return $minutos;
}

echo convertirHorasEnMinutos(6);

?>