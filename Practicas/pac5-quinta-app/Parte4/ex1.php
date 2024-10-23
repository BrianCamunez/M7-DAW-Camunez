<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 1 (Parte 4)</title>
</head>
<body>
<?php

function autentificacion($autenticado) {

    echo $autenticado? "<h2>Bienvenido!</h2>" : "<p>Por favor, inicie sesión.</p>";

}

autentificacion(true); 

autentificacion(false); 

?>


</body>
</html>