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

if (isset($_POST['color'])) {
    $_SESSION['colorSeleccionado'] = $_POST['color'];  // Guardamos el color en la sesión
    unset($_SESSION['mostrarModalColor']);
    $partida->carta_en_mesa->color = $_SESSION['colorSeleccionado'];
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
        .modal {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.7);
            z-index: 1;
            padding-top: 60px;
        }

        .modal-content {
            background-color: #fefefe;
            margin: 5% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
            max-width: 300px;
        }

        .close {
            color: #aaa;
            font-size: 28px;
            font-weight: bold;
            position: absolute;
            right: 10px;
            top: 0;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
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
    <div class="modal" style="display: <?php echo isset($_SESSION['mostrarModalColor']) && $_SESSION['mostrarModalColor'] ? 'block' : 'none'; ?>;">
    <div class="modal-content">
        <span class="close">&times;</span>
        <h3>¡Ha salido una carta que cambia el color! Elige un color:</h3>

        <form method="POST">
            <label>
                <input type="radio" name="color" value="Rojo" <?php echo (isset($_SESSION['colorSeleccionado']) && $_SESSION['colorSeleccionado'] == 'Rojo') ? 'checked' : ''; ?>>
                Rojo
            </label><br>
            <label>
                <input type="radio" name="color" value="Azul" <?php echo (isset($_SESSION['colorSeleccionado']) && $_SESSION['colorSeleccionado'] == 'Azul') ? 'checked' : ''; ?>>
                Azul
            </label><br>
            <label>
                <input type="radio" name="color" value="Verde" <?php echo (isset($_SESSION['colorSeleccionado']) && $_SESSION['colorSeleccionado'] == 'Verde') ? 'checked' : ''; ?>>
                Verde
            </label><br>
            <label>
                <input type="radio" name="color" value="Amarillo" <?php echo (isset($_SESSION['colorSeleccionado']) && $_SESSION['colorSeleccionado'] == 'Amarillo') ? 'checked' : ''; ?>>
                Amarillo
            </label><br><br>

            <button type="submit">Seleccionar color</button>
        </form>
    </div>
</div>

    <?php
    // Mostrar el color elegido después de cerrar el modal
    if (isset($_SESSION['colorSeleccionado'])) {
        echo "<p>El color seleccionado es: <strong>{$_SESSION['colorSeleccionado']}</strong></p>";
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
