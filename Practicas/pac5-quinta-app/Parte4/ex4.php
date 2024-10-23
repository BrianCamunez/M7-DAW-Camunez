<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejericio 4 (Parte 4)</title>
</head>
<body>
Supón que tienes un sitio web multilingüe. Crea una página que
muestre un saludo en español si la variable $idioma es “es”, y en inglés
si la variable es “en”. Usa un operador ternario para cambiar el saludo
entre “Hola” y “Hello”.

<?php

    $idioma = "es";

    echo $idioma === "es"? "Hola" : "Hello";

?>

</body>
</html>