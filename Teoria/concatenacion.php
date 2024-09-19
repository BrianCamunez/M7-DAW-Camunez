<?php

$titulo = "<h1>Concatenacion</h1>";

echo $titulo;

$nombre = "Yehor";
$pais = "Ucrania";
$edad = 19;


echo "Hola me llamo " . $nombre . " tengo " . $edad . " años " . " Soy de " . $pais;
echo "<br>";
echo "Hola me llamo {$nombre} tengo {$edad} años soy de {$pais}";

?>