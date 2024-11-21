<?php

session_start();

$libros = [
    [
        "nombre" => "Cien años de soledad",
        "autor" => "Gabriel García Márquez",
        "foto" => "https://m.media-amazon.com/images/I/91TvVQS7loL._AC_UF894,1000_QL80_.jpg",
        "id" => "1",
        "descripcion" => "Una de las obras más conocidas del escritor colombiano Gabriel García Márquez, que cuenta la historia de la familia Buendía en el pueblo ficticio de Macondo."
    ],
    [
        "nombre" => "1984",
        "autor" => "George Orwell",
        "foto" => "https://m.media-amazon.com/images/I/71sOSrd+JxL._AC_UF894,1000_QL80_.jpg",
        "id" => "2",
        "descripcion" => "Una obra distópica que describe un futuro totalitario en el que el gobierno controla todos los aspectos de la vida humana, escrita por George Orwell."
    ],
    [
        "nombre" => "El Principito",
        "autor" => "Antoine de Saint-Exupéry",
        "foto" => "https://m.media-amazon.com/images/I/714Hvb52n-L._AC_UF894,1000_QL80_.jpg",
        "id" => "3",
        "descripcion" => "Una fábula poética que trata temas como la amistad, el amor y la búsqueda de la verdad, contada a través de las aventuras de un niño que viaja por el universo."
    ]
];


if($_SESSION['libros']==null){
    $libros=$_SESSION['libros'];
}

header("Location:home.php");

?>

