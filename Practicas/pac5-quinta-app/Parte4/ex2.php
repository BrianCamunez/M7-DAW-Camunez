<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 2 (Parte 4)</title>
</head>
<body>
    <?php

        function mostrarStock($stock) {

            echo $stock > 0? "<p style='color: green;'>Producto disponible</p>" : "<p style='color: red;'>Producto agotado</p>";
        
        }

        mostrarStock(10); 
        mostrarStock(0);

    ?>
</body>
</html>