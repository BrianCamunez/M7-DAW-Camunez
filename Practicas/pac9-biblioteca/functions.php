<?php
session_start();
function agregarLibro($titulo,$autor,$imagen,$descripcion){
    $id_libro = count($_SESSION['libros']) + 1; 
    $nuevo_libro = [
        'id' => $id_libro,
        'titulo' => $titulo,
        'autor' => $autor,
        'imagen' => $imagen,
        'descripcion' => $descripcion
    ];
    $_SESSION['libros'][] = $nuevo_libro;
    var_dump($_SESSION['libros']);
}

function editarLibro($id_libro, $titulo, $autor, $imagen, $descripcion) {
    $id_libro--;
    if (isset($_SESSION['libros'][$id_libro])) {
        $_SESSION['libros'][$id_libro] = ["titulo" => $titulo, "autor" => $autor, "imagen" => $imagen, "descripcion" => $descripcion];
    }else{
        echo "El libro con el ID $id_libro no existe.";
    }
    var_dump($_SESSION['libros']);
}

function eliminarLibro(){
}

?>