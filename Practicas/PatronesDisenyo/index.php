<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patrons de Disseny</title>
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
        .intro {
            margin-bottom: 20px;
            font-size: 1.1em;
            color: #555;
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
    <div class="container">
        <h1>Patrons de Disseny</h1>
        <div class="intro">
            <p>Els patrons de disseny són solucions reutilitzables per a problemes comuns en el disseny de software. Es classifiquen en tres categories principals: <strong>Estructurals</strong>, <strong>De Creació</strong> i <strong>De Comportament</strong>.</p>
        </div>
        <div class="cards">
            <a class="card" style="text-decoration: none;" href='estructurals.php';">
                <h2>Estructurals</h2>
                <p>Patrons que faciliten el disseny d'estructures de classes i objectes.</p>
            </a>
            <a class="card" style="text-decoration: none;" href='creacio.php';">
                <h2>De Creació</h2>
                <p>Patrons que tracten amb la creació d'objectes de manera flexible i reutilitzable.</p>
            </a>
            <a class="card" style="text-decoration: none;" href='comportament.php';">
                <h2>De Comportament</h2>
                <p>Patrons que se centren en la comunicació i la interacció entre objectes.</p>
            </a>
        </div>
    </div>
</body>
</html>