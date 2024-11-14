<?php
session_start(); // Inicia la sesión

// Inicializamos el array de usuarios si no existe
if (!isset($_SESSION['usuarios'])) {
    $_SESSION['usuarios'] = [
        'juan@example.com' => ['nombre' => 'Juan', 'contraseña' => '12345'],
        'brian@gmail.com' => ['nombre' => 'Brian', 'contraseña' => '12345']
    ];
}

// Verifica si el formulario de registro ha sido enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Verifica si el correo ya está registrado
    if (isset($_SESSION['usuarios'][$email])) {
        echo "<script>alert('El correo ya está registrado.');</script>";
    } else {
        // Agregar el nuevo usuario al array de usuarios
        $_SESSION['usuarios'][$email] = [
            'nombre' => $nombre,
            'contraseña' => $password
        ];

        // Redirigir al inicio de sesión después de registrar
        echo "<script>alert('Usuario registrado correctamente. Ahora puedes iniciar sesión.'); window.location.href='login.php';</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <h1 class="text-center mt-5">Regístrate</h1>
    <div class="container">
        <div class="row">
            <form action="registrarse.php" method="POST">
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Correo electrónico</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Contraseña</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <button type="submit" class="btn btn-primary">Registrar</button>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
