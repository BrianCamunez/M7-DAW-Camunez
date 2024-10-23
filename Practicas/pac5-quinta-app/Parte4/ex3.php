<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 3 (Parte 4)</title>
</head>
<body>
<?php
$nombre = "Brian";
?>
<input type="text" id="nombre1" value="<?php echo $nombre !== null ? $nombre : 'Ingrese su nombre'; ?>">
<?php
$nombre = null;
echo "<br>";
?>
<input type="text" id="nombre2" value="<?php echo $nombre !== null ? $nombre : 'Ingrese su nombre'; ?>">

</body>
</html>