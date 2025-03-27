<?php
require_once "../config.php";

session_start();

if($_SESSION['admin'] != true){
    header("Location: ../index.php");
}

// Verificar si se envió el formulario para crear el testimonio
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener los datos del formulario
    $nombre = $_POST['name'];
    $apellido = $_POST['surname'];
    $descripcion = $_POST['description'];
    $imagen = $_POST['image'];
    $fecha = $_POST['date'];

    // Preparar la consulta para evitar inyección SQL
    $consultaTestimonio = $conn->prepare("INSERT INTO TESTIMONIALS (name, surname, description, imatge, data) VALUES (?, ?, ?, ?, ?)");
    
    if ($consultaTestimonio) {
        $consultaTestimonio->bind_param("sssss", $nombre, $apellido, $descripcion, $imagen, $fecha);
        
        if ($consultaTestimonio->execute()) {
            header("Location: ./panelAdmin.php"); 
            exit();
        } else {
            echo "Error al ejecutar la consulta: " . $consultaTestimonio->error;
        }
        
        $consultaTestimonio->close();
    } else {
        echo "Error en la consulta SQL: " . $conn->error;
    }
    
    $conn->close();
}
?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Testimonio</title>
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
        <h2>Crear Testimonio</h2>
        <form action="" method="POST">
            <div class="mb-3">
                <label for="name" class="form-label">Nombre:</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="mb-3">
                <label for="surname" class="form-label">Apellido:</label>
                <input type="text" class="form-control" id="surname" name="surname" required>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Descripción:</label>
                <textarea class="form-control" id="description" name="description" rows="4" required></textarea>
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Imagen (URL):</label>
                <input type="text" class="form-control" id="image" name="image" required>
            </div>
            <div class="mb-3">
                <label for="date" class="form-label">Fecha:</label>
                <input type="date" class="form-control" id="date" name="date" required>
            </div>
            <div class="d-flex justify-content-center">
                <button type="submit" class="btn btn-primary me-2">Crear Testimonio</button>
                <a href="./panelAdmin.php" class="btn btn-secondary">Cancelar</a>
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
