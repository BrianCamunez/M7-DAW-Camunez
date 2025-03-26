<?php
require_once "../config.php";

// Verificar si se recibió un ID de proyecto para eliminar
if (isset($_GET['id'])) {
    $projectId = $_GET['id'];

    // Preparar la consulta para evitar inyección SQL
    $consultaProyecto = $conn->prepare("DELETE FROM PROJECTS WHERE id = ?");
    $consultaProyecto->bind_param("i", $projectId);
    
    if ($consultaProyecto->execute()) {
        // Redirigir a la página de administración después de eliminar el proyecto
        header("Location: ./panelAdmin.php");
        exit();
    } else {
        // Mostrar error si algo sale mal
        echo "Error al eliminar el proyecto: " . $conn->error;
    }
    
    // Cerrar la consulta preparada
    $consultaProyecto->close();
    // Cerrar la conexión a la base de datos
    $conn->close();
} else {
    // Si no se recibe el ID del proyecto, mostrar un error
    echo "ID de proyecto no proporcionado.";
}
?>
