<?php
session_start();

include_once("main.php");

include_once("headerRoom.php");

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Habitación Final</title>
    <style>
        body {
            margin: 0;
        }
        .main-container {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 80vh;
        }
        .card {
            width: 22rem;
        }
    </style>
</head>
<body>
    <div class="main-container">
        <div class="card p-4">
                <h2 class="card-title text-center">¡Felicitaciones!</h2>
                <p class="card-text text-center">
                    Has completado todas las preguntas de la dificultad: <?= ucfirst($_SESSION['datos']['Dificultad']); ?>.
                </p>
                <form method="POST" action="index.php"> <!-- Aquí redirigimos a la página del formulario -->
                    <button type="submit" class="btn btn-primary w-100">Volver al formulario</button>
                </form>
        </div>
    </div>
</body>
</html>