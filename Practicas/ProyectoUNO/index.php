<?php

include_once("./carta.class.php");

include_once("./baraja.class.php");

$carta = new Carta("blue", "0", 1);

$baraja = new Baraja();

print_r($carta);



?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Juego de Cartas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        /* Algunos estilos adicionales */
        .card-container {
            margin-top: 30px;
        }
        .card img {
            width: 100px;
            height: auto;
            margin: 5px;
        }
        .player-hand {
            display: flex;
            justify-content: center;
            margin-bottom: 20px;
        }
        .player-hand img {
            margin-right: 10px;
        }
    </style>
</head>
<body class="bg-light">

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h1 class="text-center mt-5">Formulario para iniciar la partida</h1>
            <form action="iniciar_partida.php" method="POST" class="mt-4">
                <div class="mb-3">
                    <label for="jugadores" class="form-label">Número de jugadores:</label>
                    <input type="number" id="jugadores" name="jugadores" class="form-control" min="2" max="10" required>
                </div>
                <div class="mb-3">
                    <label for="cartas_por_jugador" class="form-label">Número de cartas por jugador:</label>
                    <input type="number" id="cartas_por_jugador" name="cartas_por_jugador" class="form-control" min="1" max="10" required>
                </div>
                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-primary">Iniciar Partida</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>
