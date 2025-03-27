<?php

include_once 'config.php';

session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $consulta = $conn->query("SELECT * FROM USERS WHERE email = '$email'");

    if ($consulta && $consulta->num_rows > 0) {

        $usuario = $consulta->fetch_assoc();
     
        if (password_verify($password, $usuario['password'])) {
            // 6. Guardar el usuario en la sesion
            $_SESSION['user_email'] = $usuario['email'];
            $_SESSION['user_name'] = $usuario['name'];
            $_SESSION['user_surname'] = $usuario['surname'];
            $_SESSION['user_rol'] = $usuario['rol'];
            $_SESSION['user_id'] = $usuario['id'];
            if($usuario['rol'] == "admin"){
                $_SESSION["admin"] = true;
            }
            // 7. Redirigir al usuario a la pagina de inicio
            header('Location: index.php');
            exit;
        }
    } else {
        echo 'Usuario o contraseña incorrectos';
    }
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Login</title>
    <style>
        /* Estilos generales */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .login-container {
            background-color: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }

        .input-group {
            margin-bottom: 15px;
        }

        .input-group label {
            font-size: 14px;
            color: #333;
            display: block;
            margin-bottom: 5px;
        }

        .input-group input {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 4px;
            transition: border-color 0.3s ease;
        }

        .input-group input:focus {
            border-color: #007bff;
            outline: none;
        }

        .submit-btn {
            width: 100%;
            padding: 12px;
            background-color: #007bff;
            border: none;
            color: #fff;
            font-size: 16px;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .submit-btn:hover {
            background-color: #0056b3;
        }

        .submit-btn:active {
            background-color: #004085;
        }
    </style>
</head>

<body>
    <div class="login-container">
        <form class="login-form" action="" method="post">
            <h2>Iniciar sesión</h2>

            <div class="input-group">
                <label for="email">Correo Electrónico</label>
                <input type="email" id="email" name="email" required>
            </div>

            <div class="input-group">
                <label for="password">Contraseña</label>
                <input type="password" id="password" name="password" required>
            </div>

            <button type="submit" class="submit-btn">Entrar</button>
        </form>
    </div>
</body>

</html>