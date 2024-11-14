<?php
// Puedes agregar aquí cualquier lógica PHP si es necesario
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página de Inicio</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #f0f8ff;
            color: #333;
            text-align: center;
        }
        .container {
            border: 2px solid #007bff;
            border-radius: 10px;
            padding: 20px;
            background-color: #ffffff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        h1 {
            color: #007bff;
        }
        p {
            font-size: 1.2em;
            margin: 20px 0;
        }
        .btn {
            padding: 10px 20px;
            font-size: 1.2em;
            color: white;
            background-color: #007bff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
        }
        .btn:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

    <div class="container">
        <h1>¡Bienvenido a nuestra aplicación!</h1>
        <p>¡Estamos encantados de que estés aquí! Haz clic en el botón de abajo para iniciar sesión.</p>
        <a href="login.php" class="btn">Ir a Login</a>
    </div>

</body>
</html>
