<?php

session_start();

$users = [
    [
        "username" => "user1",
        "password" => "pass1",
    ],
    [
        "username" => "user2",
        "password" => "pass2",
    ],
    [
        "username" => "user3",
        "password" => "pass3",
    ]
];

$username = $_POST['username'];
$password = $_POST['password'];

//verifico si el usuario existe y la contraseña es correcta
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Verifico si el usuario existe y la contraseña es correcta
    foreach ($users as $user) {
        if ($user['username'] === $username && $user['password'] === $password) {
            // Lo envío a la página de bienvenida y guardo el username en la sesión
            $_SESSION['username'] = $username;
            header("Location: bienvenida.php");
            exit;
        }else{
            // Si llegamos aquí, significa que el usuario no fue encontrado
            $error = "Usuario o contraseña incorrectos";
            header("Location: index.php");
            exit;
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
    <h2>Inicio de la Sesion</h2>
    <form action="login.php" method="post">
        <label for="username">Usuario: </label>
        <input type="text" name="username" required>
        <label for="password">Contraseña: </label>
        <input type="password" name="password" required>
        <button type="submit">Iniciar Sesion</button>
    </form>
</body>
</html>