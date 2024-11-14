<?php
session_start(); // Inicia la sesión

// Si el usuario ya está logueado, redirigimos a la página principal
if (isset($_SESSION['usuario'])) {
    header("Location: formulario.php");
    exit();
}

// Incluir el archivo de usuarios
include_once "usuarios.php";

// Validación de credenciales
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Verificamos si el correo existe en la lista de usuarios
    if (isset($usuarios[$email]) && $usuarios[$email]['contraseña'] === $password) {
        // Si las credenciales son correctas, guardamos los datos en la sesión
        $_SESSION['usuario'] = $usuarios[$email]['nombre'];
        $_SESSION['email'] = $email;

        // Redirigimos al usuario a la página principal (formulario.php)
        header("Location: formulario.php");
        exit();
    } else {
        // Si las credenciales no son correctas, mostramos un mensaje de error
        echo "<h1>Credenciales incorrectas</h1>";
    }
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar sesión</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <h1 class="text-center mt-5">Inicia sesión</h1>
    <div class="container">
        <div class="row">
            <form action="login.php" method="POST">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Correo electrónico</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" name="email" required>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Contraseña</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" name="password" required>
                </div>
                <button type="submit" class="btn btn-primary">Iniciar sesión</button>
                <div class="row">
                    <a href="registrarse.php" class="mt-3">Si no tienes una cuenta, regístrate aquí</a>
                </div>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
