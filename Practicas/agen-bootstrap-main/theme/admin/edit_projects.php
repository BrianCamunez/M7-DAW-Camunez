<?php
require_once "../config.php";

session_start();

if($_SESSION['admin'] != true){
    header("Location: ../index.php");
}
// Verificar si se ha pasado un ID en la URL
if (isset($_GET['id'])) {
    $projectId = $_GET['id'];

    // Obtener los datos del proyecto con el ID correspondiente
    $consultaProject = $conn->query("SELECT * FROM PROJECTS WHERE id = $projectId");
    $project = $consultaProject->fetch_assoc();

    // Si el proyecto no existe
    if (!$project) {
        die("Proyecto no encontrado.");
    }
} else {
    die("ID de proyecto no proporcionado.");
}

// Verificar si se envió el formulario para actualizar el proyecto
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener los datos del formulario
    $title = $_POST['title'];
    $url = $_POST['url'];
    $thumbnail = $_POST['thumbnail'];
    $description = $_POST['description'];

    // Actualizar los datos del proyecto en la base de datos
    $updateQuery = $conn->prepare("UPDATE PROJECTS SET title = ?, url = ?, thumbnail = ?, description = ? WHERE id = ?");
    $updateQuery->bind_param("ssssi", $title, $url, $thumbnail, $description, $projectId);
    
    if ($updateQuery->execute()) {
        header("Location: ./panelAdmin.php"); 
        exit();
    } else {
        echo "Error al actualizar el proyecto: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Proyecto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h2>Editar Proyecto</h2>
        <form action="edit_projects.php?id=<?php echo $project['id']; ?>" method="POST">
            <div class="mb-3">
                <label for="title" class="form-label">Título:</label>
                <input type="text" class="form-control" id="title" name="title" value="<?php echo htmlspecialchars($project['title']); ?>" required>
            </div>
            <div class="mb-3">
                <label for="url" class="form-label">URL:</label>
                <input type="text" class="form-control" id="url" name="url" value="<?php echo htmlspecialchars($project['url']); ?>" required>
            </div>
            <div class="mb-3">
                <label for="thumbnail" class="form-label">Imagen:</label>
                <input type="text" class="form-control" id="thumbnail" name="thumbnail" value="<?php echo htmlspecialchars($project['thumbnail']); ?>" required>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Descripción:</label>
                <textarea class="form-control" id="description" name="description" required><?php echo htmlspecialchars($project['description']); ?></textarea>
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
