<?php

session_start();

$libros = [
    [
        "nombre" => "Cien años de soledad",
        "autor" => "Gabriel García Márquez",
        "foto" => "https://m.media-amazon.com/images/I/91TvVQS7loL._AC_UF894,1000_QL80_.jpg",
        "id" => "1"
    ],
    [
        "nombre" => "1984",
        "autor" => "George Orwell",
        "foto" => "https://m.media-amazon.com/images/I/71sOSrd+JxL._AC_UF894,1000_QL80_.jpg",
        "id" => "2"
    ],
    [
        "nombre" => "El Principito",
        "autor" => "Antoine de Saint-Exupéry",
        "foto" => "https://m.media-amazon.com/images/I/714Hvb52n-L._AC_UF894,1000_QL80_.jpg",
        "id" => "3"
    ]
];

$_SESSION['libros'] = $libros;

?>

