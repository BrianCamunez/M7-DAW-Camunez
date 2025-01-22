<?php

include_once "./carta.class.php";
include_once "./baraja.class.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $numJugadores = intval($_POST['jugadores']);
    $cartasPorJugador = intval($_POST['cartas_por_jugador']);

    // Mostrar los datos recibidos
    echo "<div class='container mt-5'>";
    echo "<h2 class='text-center'>Datos de la partida</h2>";
    echo "<p><strong>Número de jugadores:</strong> $numJugadores</p>";
    echo "<p><strong>Número de cartas por jugador:</strong> $cartasPorJugador</p>";
    echo "<hr>";
}

if (!isset($baraja)) {
    $baraja = new Baraja();
    $baraja->crea_baraja();
    $baraja->mezcla();
}

if (!isset($jugadores)) {
    $jugadores = [];
}

if (empty($jugadores)) {
    $numeroJugadores = $numJugadores;
    $cartasPorJugadores = $cartasPorJugador;

    for ($i = 0; $i < $numJugadores; $i++) {
        $jugadores[$i] = [];
        for ($j = 0; $j < $cartasPorJugador; $j++) {
            $jugadores[$i][] = array_shift($baraja->conjunto_cartas);
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="container mt-5">
        <h2 class="text-center">Partida en Curso</h2>
        <div class="row">
            <?php foreach ($jugadores as $index => $mano): ?>
                <div class="col-3">
                    <h3>Jugador <?php $index + 1 ?></h3>
                    <ul class="list-unstyled">
                        <?php foreach ($mano as $carta): ?>
                            <li class="my-2">
                                <img src="cartas_uno/<?php $carta->pinta_carta() ?>" alt="Carta" width="80" height="120">
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endforeach; ?>
        </div>
    <?php print_r($jugadores) ?>
</body>
</html>