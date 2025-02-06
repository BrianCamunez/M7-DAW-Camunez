<?php



?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index Examen</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }
        .container {
            text-align: center;
            max-width: 800px;
            margin: 0 auto;
        }
        h1 {
            color: #333;
        }
        .cards {
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
        }
        .card {
            background-color: #ff9;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin: 10px;
            width: 200px;
            text-align: center;
            cursor: pointer;
            transition: transform 0.2s, box-shadow 0.2s;
        }
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
        }
        .card h2 {
            font-size: 1.2em;
            color: #333;
        }
        .card p {
            font-size: 0.9em;
            color: #777;
        }
    </style>
</head>
<body>
    <div>
    <div class="container">
        <h1>Examen UF2</h1>
        <div class="cards">
            <a class="card" style="text-decoration: none;" href='./ejercicio2/minijuegos.php';">
                <h2>Ejercicio 2 - Mini-Juegos</h2>
            </a>
            <a class="card" style="text-decoration: none;" href='./ejercicio3/reservaHoteles.php';">
                <h2>Ejercicio 3 - Reserva de Hoteles</h2>
            </a>
        </div>
    </div>
    </div>
</body>
</html>