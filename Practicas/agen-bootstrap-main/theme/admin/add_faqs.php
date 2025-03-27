<?php
require_once "../config.php";

session_start();

if ($_SESSION['admin'] != true) {
    header("Location: ../index.php");
}

// Verificar si se envió el formulario para crear la FAQ
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener los datos del formulario
    $question = $_POST['question'];
    $answer = $_POST['answer'];
    $date = $_POST['date'];

    // Preparar la consulta para evitar inyección SQL
    $consultaFaq = $conn->prepare("INSERT INTO FAQS (question, answer, date) VALUES (?, ?, ?)");
    $consultaFaq->bind_param("sss", $question, $answer, $date);
    
    if ($consultaFaq->execute()) {
        header("Location: ./panelAdmin.php");
        exit();
    } else {
        echo "Error al crear la FAQ: " . $conn->error;
    }
    
    $consultaFaq->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear FAQ</title>
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
        <h2>Crear FAQ</h2>
        <form action="" method="POST">
            <div class="mb-3">
                <label for="question" class="form-label">Pregunta:</label>
                <input type="text" class="form-control" id="question" name="question" required>
            </div>
            <div class="mb-3">
                <label for="answer" class="form-label">Respuesta:</label>
                <textarea class="form-control" id="answer" name="answer" rows="4" required></textarea>
            </div>
            <div class="mb-3">
                <label for="date" class="form-label">Fecha:</label>
                <input type="date" class="form-control" id="date" name="date" required>
            </div>
            <div class="d-flex justify-content-center">
                <button type="submit" class="btn btn-primary me-2">Crear FAQ</button>
                <a href="./panelAdmin.php" class="btn btn-secondary">Cancelar</a>
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
