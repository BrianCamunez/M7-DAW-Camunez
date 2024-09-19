<?php
// Inicializar una variable
$edad = 18;

// Usar condicionales para verificar la edad
if ($edad < 18) {
    echo "Eres menor de edad.\n";
} elseif ($edad >= 18 && $edad < 65) {
    echo "Eres adulto.\n";
} else {
    echo "Eres adulto mayor.\n";
}

// Ejemplo adicional con una variable de calificación
$calificacion = 85;

if ($calificacion >= 90) {
    echo "Excelente.\n";
} elseif ($calificacion >= 75) {
    echo "Bien.\n";
} elseif ($calificacion >= 60) {
    echo "Suficiente.\n";
} else {
    echo "Insuficiente.\n";
}
?>
