<?php
require_once "../config.php";

// Verificar si se recibió un ID de testimonial para eliminar
if (isset($_GET['id'])) {
    $testimonialId = $_GET['id'];

    // Preparar la consulta para evitar inyección SQL
    $consultaTestimonial = $conn->prepare("DELETE FROM TESTIMONIALS WHERE id = ?");
    $consultaTestimonial->bind_param("i", $testimonialId);
    
    if ($consultaTestimonial->execute()) {
        // Redirigir a la página de administración después de eliminar el testimonial
        header("Location: ./panelAdmin.php");
        exit();
    } else {
        // Mostrar error si algo sale mal
        echo "Error al eliminar el testimonial: " . $conn->error;
    }
    
    // Cerrar la consulta preparada
    $consultaTestimonial->close();
    // Cerrar la conexión a la base de datos
    $conn->close();
} else {
    // Si no se recibe el ID del testimonial, mostrar un error
    echo "ID de testimonial no proporcionado.";
}
?>
