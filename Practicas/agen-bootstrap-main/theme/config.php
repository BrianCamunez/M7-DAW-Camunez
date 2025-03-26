<?php
$servername = "mysql-camunezbenitezbrian.alwaysdata.net";
$username = "393799";
$password = "cachopo";
$dbname = "camunezbenitezbrian_proyectouf3";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
?>