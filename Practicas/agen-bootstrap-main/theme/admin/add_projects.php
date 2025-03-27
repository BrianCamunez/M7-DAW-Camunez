<?php
require_once "../config.php";

session_start();

if($_SESSION['admin'] != true){
    header("Location: ../index.php");
}
// Verificar si se envió el formulario para crear el proyecto
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener los datos del formulario
    $titulo = $_POST['title'];
    $url = $_POST['url'];
    $thumbnail = $_POST['thumbnail'];
    $descripcion = $_POST['description'];

    // Preparar la consulta para evitar inyección SQL
    $consultaProyecto = $conn->prepare("INSERT INTO PROJECTS (title, url, thumbnail, description) VALUES (?, ?, ?, ?)");
    
    if ($consultaProyecto) {
        // Bind de los parámetros
        $consultaProyecto->bind_param("ssss", $titulo, $url, $thumbnail, $descripcion);
        
        if ($consultaProyecto->execute()) {
            // Redirigir a la página de administración después de agregar el proyecto
            header("Location: ./panelAdmin.php"); 
            exit();
        } else {
            // Mostrar error si algo sale mal
            echo "Error al ejecutar la consulta: " . $consultaProyecto->error;
        }
        
        // Cerrar la consulta preparada
        $consultaProyecto->close();
    } else {
        // Mostrar error si prepare() falla
        echo "Error en la consulta SQL: " . $conn->error;
    }
    
    // Cerrar la conexión a la base de datos
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Proyecto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .container {
            max-width: 600px;
            background-color: rgb(192, 189, 189);
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 30px;
            margin-top: 50px;
        }

        h2 {
            color: #4e73df;
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Agregar Proyecto</h2>
        <form action="" method="POST">
            <div class="mb-3">
                <label for="title" class="form-label">Título:</label>
                <input type="text" class="form-control" id="title" name="title" required>
            </div>
            <div class="mb-3">
                <label for="url" class="form-label">URL:</label>
                <input type="url" class="form-control" id="url" name="url" required>
            </div>
            <div class="mb-3">
                <label for="thumbnail" class="form-label">Imagen en miniatura:</label>
                <input type="text" class="form-control" id="thumbnail" name="thumbnail" required>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Descripción:</label>
                <textarea class="form-control" id="description" name="description" required></textarea>
            </div>
            <div class="d-flex justify-content-center">
                <button type="submit" class="btn btn-primary me-2">Agregar Proyecto</button>
                <a href="./panelAdmin.php" class="btn btn-secondary">Cancelar</a>
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
