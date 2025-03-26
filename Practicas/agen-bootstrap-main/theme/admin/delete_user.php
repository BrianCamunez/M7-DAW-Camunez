<?php
require_once "../config.php";

// Verificar si se recibió un ID de usuario para eliminar
if (isset($_GET['id'])) {
    $userId = $_GET['id'];

    // Preparar la consulta para evitar inyección SQL
    $consultaUser = $conn->prepare("DELETE FROM USERS WHERE id = ?");
    $consultaUser->bind_param("i", $userId);
    
    if ($consultaUser->execute()) {
        header("Location: ./panelAdmin.php");
        exit();
    } else {
        echo "Error al eliminar el usuario: " . $conn->error;
    }
    
    $consultaUser->close();
    $conn->close();
} else {
    echo "ID de usuario no proporcionado.";
}
?>
