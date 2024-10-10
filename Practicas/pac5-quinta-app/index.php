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

}



?>