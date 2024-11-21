<?php

session_start();
function agregarLibro($nombre,$autor,$foto,$descripcion){
    $id_libro = count($_SESSION['libros']) + 1; 
    $nuevo_libro = [
        'id' => $id_libro,
        'nombre' => $nombre,
        'autor' => $autor,
        'foto' => $foto,
        'descripcion' => $descripcion
    ];
    $_SESSION['libros'][] = $nuevo_libro;
}

function editarLibro($id_libro, $titulo, $autor, $foto, $descripcion) {
    $id_libro--;
    if (isset($_SESSION['libros'][$id_libro])) {
            $_SESSION['libros'][$id_libro] = ["nombre" => $titulo, "autor" => $autor, "foto" => $foto, "descripcion" => $descripcion];
    }else{
        echo "El libro con el ID $id_libro no existe.";
    }
}

function eliminarLibro($id_libro){
   $_SESSION['libros'] = array_map(function($libro) use ($id_libro){
    if($libro['id']==$id_libro){
        return null;
    }
    return $libro;
   },$_SESSION['libros']);
   
   $_SESSION['libros']  = array_filter($_SESSION['libros'], function($libro){
    return $libro!=null;
   });
   $_SESSION['libros'] = array_values($_SESSION['libros']);
}

?>