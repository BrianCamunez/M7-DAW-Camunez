<?php
session_start();

include_once("functions.php");

if (isset($_GET['id'])) {
    $id_libro = $_GET['id'];
}

eliminarLibro($id_libro);

header("Location:home.php");

?>