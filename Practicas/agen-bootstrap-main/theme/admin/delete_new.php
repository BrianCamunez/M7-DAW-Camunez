<?php
require_once "../config.php";

session_start();

if($_SESSION['admin'] != true){
    header("Location: ../index.php");
}

// Verificar si se recibió un ID de noticia para eliminar
if (isset($_GET['id'])) {
    $newsId = $_GET['id'];

    // Preparar la consulta para evitar inyección SQL
    $consultaNoticia = $conn->prepare("DELETE FROM NEWS WHERE id = ?");
    $consultaNoticia->bind_param("i", $newsId);
    
    if ($consultaNoticia->execute()) {
        // Redirigir a la página de administración después de eliminar la noticia
        header("Location: ./panelAdmin.php");
        exit();
    } else {
        // Mostrar error si algo sale mal
        echo "Error al eliminar la noticia: " . $conn->error;
    }
    
    // Cerrar la consulta preparada
    $consultaNoticia->close();
    // Cerrar la conexión a la base de datos
    $conn->close();
} else {
    // Si no se recibe el ID de la noticia, mostrar un error
    echo "ID de noticia no proporcionado.";
}
?>
