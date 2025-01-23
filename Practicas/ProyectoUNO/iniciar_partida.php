<?php
session_start();  // Asegúrate de iniciar la sesión

include "./partida.class.php";

// Verificamos si hay una partida guardada en la sesión
if (isset($_SESSION['partida'])) {
    // Recuperamos la partida serializada desde la sesión
    $partida = unserialize($_SESSION['partida']);

} else {
    echo "No se ha encontrado ninguna partida. Por favor, inicia una partida desde el formulario.";
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Partida del Uno</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABQWlJ3+X6G6e/jR6F4ed5Jp4XXv9+gIb68Q3i5D5LHA4CV4p3Ww8bf" crossorigin="anonymous">
    <style>
        body {
            background-color: #f0f0f0;
        }
        .table-container {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            align-items: center;
            gap: 30px;
            padding: 50px;
            margin-top: 50px;
        }
        .player-card {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
            width: 180px;
        }
        .player-card h5 {
            margin-bottom: 15px;
        }
        .cards-container {
            display: flex;
            justify-content: center;
            gap: 10px;
            flex-wrap: wrap;
        }
        .player-card img {
            width: 80px;
            height: 120px;
        }
    </style>
</head>
<body>
    
    <!-- Aquí se mostraría la partida -->
    <?php
    if (isset($partida)) {
        $partida->jugar();
    }
    ?>

    <!-- Botón para reiniciar la partida -->
<form action="reiniciar.php" method="POST">
    <button type="submit" class="btn btn-danger">Reiniciar Partida</button>
</form>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz4fnFO9gyb63DjkRrP3WZsLk0to+HMD6l/ueJdM61L8t9bD09k/h9Ub9q5" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-pzjw8f+ua7Kw1TIq0P4U5mDHR4wJrB4V+20Hhf5SxaoyXxZ5WZT/dHh5mB2xLZ04" crossorigin="anonymous"></script>
</body>
</html>
