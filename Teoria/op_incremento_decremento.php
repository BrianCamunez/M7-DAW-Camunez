<?php
// Inicializar una variable
$numero = 5;

// Usar el operador de incremento
$numero++; // Esto aumenta el valor de $numero en 1
echo "Después del incremento: $numero\n"; // Salida: 6

// Usar el operador de decremento
$numero--; // Esto disminuye el valor de $numero en 1
echo "Después del decremento: $numero\n"; // Salida: 5

// Usar los operadores en un bucle
for ($i = 0; $i < 5; $i++) {
    echo "Valor de i: $i\n"; // Salida: 0, 1, 2, 3, 4
}

// Decrementar una variable
$contador = 10;
while ($contador > 0) {
    echo "Contador: $contador\n"; // Salida: 10, 9, 8, ..., 1
    $contador--; // Decrementa el contador
}
?>
