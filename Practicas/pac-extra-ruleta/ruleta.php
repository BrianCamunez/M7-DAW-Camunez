<?php
// Verificar si el formulario fue enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $tipoApuesta = $_GET['TipoDeApuesta'];  // Obtener el tipo de apuesta
    $cantidadDinero = $_GET['CantidadDinero']; // Obtener la cantidad de dinero apostado

    // Mostrar los valores recibidos (solo para debug)
    echo "Tipo de Apuesta: " . $tipoApuesta . "<br>";
    echo "Cantidad de dinero apostado: " . $cantidadDinero . "€<br>";
}

?>