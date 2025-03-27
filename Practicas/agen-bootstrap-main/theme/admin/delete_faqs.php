<?php
require_once "../config.php";

session_start();

if ($_SESSION['admin'] != true) {
    header("Location: ../index.php");
}

// Verificar si se recibió un ID de FAQ para eliminar
if (isset($_GET['id'])) {
    $faqId = $_GET['id'];

    // Preparar la consulta para evitar inyección SQL
    $consultaFaq = $conn->prepare("DELETE FROM FAQS WHERE id = ?");
    $consultaFaq->bind_param("i", $faqId);
    
    if ($consultaFaq->execute()) {
        // Redirigir a la página de administración después de eliminar la FAQ
        header("Location: ./panelAdmin.php");
        exit();
    } else {
        // Mostrar error si algo sale mal
        echo "Error al eliminar la FAQ: " . $conn->error;
    }
    
    // Cerrar la consulta preparada
    $consultaFaq->close();
    // Cerrar la conexión a la base de datos
    $conn->close();
} else {
    // Si no se recibe el ID de la FAQ, mostrar un error
    echo "ID de FAQ no proporcionado.";
}
?>
