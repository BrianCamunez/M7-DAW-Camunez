<?php

$cadena = "Hola mundo";

//1. Longitud de caracteres --> strien()

echo strlen($cadena);

//2. strpos

echo strpos($cadena, "mundo");

//3. str_replace

echo str_replace("mundo", "barcelona", $cadena);

//4. strtolower

echo strtolower($cadena);

//5. strtoupper

echo strtoupper($cadena);

//6. ucfirst

echo ucfirst($cadena);

//9. ucwords

echo ucwords($cadena);

//10. trim Elimina cuando hay mas de 1 espacio

$cadena2 = "        Hola como              estas             ";
echo '<br>';
echo trim($cadena2);

//11. substr obtiene parte de una cadena

echo substr($cadena, 4, 4);

//12.implode    Transforma una lista con un limitador que tu pongas

$array = ["Hola", "Mundo", "PHP"];
echo implode(" ", $array);

//13.Explode

$cadena3 = "Hola,mundo,PHP";
$palabras = explode(" , " ,$cadena3);
echo '<br>';
print_r($palabra);

//14. in_array      mira si existes en una array
$os = ["Mac", "NT", "Irix", "Linux"];
if(in_array("Irix", $os)){
    echo "Existe Irix";
}

//15. array_search  busca el valor en una array y devuelve la clave correspondiente

$array2 = ["manzana", "pera", "naranja"];
echo array_search("naranja", $array2);

//16. array_map

$arrayMap = [1, 2, 3, 4];
$resultado = array_map(function($numero){
    return $numero * 2;
}, $arrayMap);

print_r($resultado);

//17. array_filter
echo '<br>';
$arrayFilter = [1, 2, 3, 4, 5, 6, 7, 8];
$resultadoFilter = array_filter($arrayFilter, function($n){
    return $n % 2 == 0;
});
print_r($resultadoFilter);

?>