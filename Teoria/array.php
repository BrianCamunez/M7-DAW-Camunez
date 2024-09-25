<?php

//1.1 ARRAY ESCALAR INDEXADO
$lista = array("Suleiman", "Brian", "Dani");

//var_dump($lista)

print_r($lista);

//DESDE LA VERSION 5.4 PHP

$lista2 = ["Didac", "Kevin", "David", 87 , 32, 78.23, true];

echo $lista2[1];

$lista2[2] = "Yehor";

print_r($lista2);

//AÑADIR ELEMENTOS A UN ARRAY

$colores = ['rojo', 'azul', 'verde'];

$colores[] = 'naranja';

print_r($colores);

//2. ARRAY ASOCIATIVO

$tutor = [
    "nombre" => "Albert",
    "apellidos" => "Arrebola Sans",
    "edad" => 36
];

echo $tutor["apellidos"];

$tutor["edad"] = 18;

//RECORRER ARRAY CON UN FOR

$numeros = [1,2,3,4,5,6,7,8,9];
echo "<br>";
for($i=0;$i< count($numeros);$i++){
    echo $numeros[$i]. ' ';
}

//RECORRER ARRAY CON UN FOREACH

$numeros2 = [1,2,3,4,5,6,7,8,9];
 
echo "<br>";

foreach($numeros as $num){
    echo ($num * 2).' ';
}

//RECORRER UN ARRAY ASOCIATIVO

$cuidades = [
    "Paris" => "Francia",
    "Barcelona" => "España",
    "Londres" => "Reino Unido"  
];

foreach($cuidades as $cuidad => $pais){
    echo "<br>";
    echo "La ciudad de {$cuidad} esta en {$pais}";
}

//FOREACH EN ARRAYS MULTIDIMENSIONALES
//CREA UN ARRAY MULTIDIMENSIONAL DE ESTUDIAMTES Y SUS NOTAS, Y RECORRE CADA ESTUDIANTE CON FOREACH PARA MOSTRAR SUS DATOS

$estudiantes = [
    ["nombre" => "Anna", "nota" => 10, "genero" => 'm'],
    ["nombre" => "Dani", "nota" => 10, "genero" => 'h'],
    ["nombre" => "Yehor", "nota" => 11, "genero" => 'h'],
    ["nombre" => "Lucia", "nota" => 9, "genero" => 'm'],
    ["nombre" => "David", "nota" => 12, "genero" => 'h']
];

foreach($estudiantes as $estudiante){
    if($estudiante['genero'] == 'h'){
        echo "<br>";
        echo "Estudiante: {$estudiante['nombre']} ha sacado un {$estudiante['nota']}";
    }
    
}
?>