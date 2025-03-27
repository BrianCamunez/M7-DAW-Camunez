<?php
require_once "../config.php";

session_start();

if($_SESSION['admin'] != true){
    header("Location: ../index.php");
}

// Verificar si se ha pasado un ID en la URL
if (isset($_GET['id'])) {
    $testimonialId = $_GET['id'];

    // Obtener los datos del testimonio con el ID correspondiente
    $consultaTestimonial = $conn->query("SELECT * FROM TESTIMONIALS WHERE id = $testimonialId");
    $testimonial = $consultaTestimonial->fetch_assoc();

    if (!$testimonial) {
        die("Testimonio no encontrado.");
    }
} else {
    die("ID de testimonio no proporcionado.");
}

// Verificar si se envió el formulario para actualizar el testimonio
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['name'];
    $apellido = $_POST['surname'];
    $descripcion = $_POST['description'];
    $imagen = $_POST['imatge'];
    $fecha = $_POST['data'];

    // Actualizar los datos del testimonio en la base de datos
    $updateQuery = $conn->prepare("UPDATE TESTIMONIALS SET name = ?, surname = ?, description = ?, imatge = ?, data = ? WHERE id = ?");
    $updateQuery->bind_param("sssssi", $nombre, $apellido, $descripcion, $imagen, $fecha, $testimonialId);
    
    if ($updateQuery->execute()) {
        header("Location: ./panelAdmin.php"); 
        exit();
    } else {
        echo "Error al actualizar el testimonio: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Testimonio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h2>Editar Testimonio</h2>
        <form action="edit_testimonials.php?id=<?php echo $testimonial['id']; ?>" method="POST">
            <div class="mb-3">
                <label for="name" class="form-label">Nombre:</label>
                <input type="text" class="form-control" id="name" name="name" value="<?php echo htmlspecialchars($testimonial['name']); ?>" required>
            </div>
            <div class="mb-3">
                <label for="surname" class="form-label">Apellido:</label>
                <input type="text" class="form-control" id="surname" name="surname" value="<?php echo htmlspecialchars($testimonial['surname']); ?>" required>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Descripción:</label>
                <textarea class="form-control" id="description" name="description" required><?php echo htmlspecialchars($testimonial['description']); ?></textarea>
            </div>
            <div class="mb-3">
                <label for="imatge" class="form-label">Imagen (URL):</label>
                <input type="text" class="form-control" id="imatge" name="imatge" value="<?php echo htmlspecialchars($testimonial['imatge']); ?>" required>
            </div>
            <div class="mb-3">
                <label for="data" class="form-label">Fecha:</label>
                <input type="date" class="form-control" id="data" name="data" value="<?php echo htmlspecialchars($testimonial['data']); ?>" required>
            </div>
            <div class="d-flex justify-content-center">
                <button type="submit" class="btn btn-primary me-2">Guardar Cambios</button>
                <a href="./panelAdmin.php" class="btn btn-secondary">Cancelar</a>
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
