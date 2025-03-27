<?php
require_once "../config.php";

session_start();

if($_SESSION['admin'] != true){
    header("Location: ../index.php");
}

// Verificar si se envió el formulario para crear la noticia
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener los datos del formulario
    $titulo = $_POST['title'];
    $subtitulo = $_POST['subtitle'];
    $thumbnail = $_POST['thumbnail'];
    $fecha = $_POST['new_date'];
    $descripcion = $_POST['description'];

    // Preparar la consulta para evitar inyección SQL
    $consultaNoticia = $conn->prepare("INSERT INTO NEWS (title, subtitle, thumbmail, new_date, description) VALUES (?, ?, ?, ?, ?)");
    $consultaNoticia->bind_param("sssss", $titulo, $subtitulo, $thumbnail, $fecha, $descripcion);
    
    if ($consultaNoticia->execute()) {
        header("Location: ./panelAdmin.php"); 
        exit();
    } else {
        echo "Error al crear la noticia: " . $conn->error;
    }
    
    $consultaNoticia->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Noticia</title>
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
        <h2>Crear Noticia</h2>
        <form action="" method="POST">
            <div class="mb-3">
                <label for="title" class="form-label">Título:</label>
                <input type="text" class="form-control" id="title" name="title" required>
            </div>
            <div class="mb-3">
                <label for="subtitle" class="form-label">Subtítulo:</label>
                <input type="text" class="form-control" id="subtitle" name="subtitle" required>
            </div>
            <div class="mb-3">
                <label for="thumbnail" class="form-label">thumbnail (URL):</label>
                <input type="text" class="form-control" id="thumbnail" name="thumbnail" required>
            </div>
            <div class="mb-3">
                <label for="new_date" class="form-label">Fecha:</label>
                <input type="date" class="form-control" id="new_date" name="new_date" required>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Descripción:</label>
                <textarea class="form-control" id="description" name="description" rows="4" required></textarea>
            </div>
            <div class="d-flex justify-content-center">
                <button type="submit" class="btn btn-primary me-2">Crear Noticia</button>
                <a href="./panelAdmin.php" class="btn btn-secondary">Cancelar</a>
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
