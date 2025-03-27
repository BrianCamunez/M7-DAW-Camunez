<?php

include_once 'config.php';

session_start();

$uploadDir = 'uploads/';

// Asegurar que la carpeta de subida existe
if (!is_dir($uploadDir)) {
    mkdir($uploadDir, 0777, true);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $edad = $_POST['edad'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Verificar si el archivo fue subido correctamente
    if(isset($_FILES['avatar']) && $_FILES['avatar']['error'] === UPLOAD_ERR_OK){
        $fileTmpPath = $_FILES['avatar']['tmp_name'];
        $fileName = $_FILES['avatar']['name'];

        $fileNameCmps = explode(".", $fileName);
        $fileExtension = strtolower(end($fileNameCmps));

        $allowedExtensions = ['jpg' , 'jpeg', 'png', 'gif'];

        if(in_array($fileExtension, $allowedExtensions)){
            $newFileName = md5(time() . $fileName) . '.' . $fileExtension;
            $dest_path = $uploadDir . $newFileName;

            if(!move_uploaded_file($fileTmpPath, $dest_path)){
                die('Error: No se pudo mover el archivo a la carpeta de destino');
            }
        } else {
            die('Error: Solo se permiten archivos de imagen (jpg, jpeg, png, gif).');
        }
    } else {
        die('Error: La foto no se subió correctamente. Código de error: ' . $_FILES['avatar']['error']);
    }

    // Hash de la contraseña
    $passwordHashed = password_hash($password, PASSWORD_DEFAULT);
    $fechaRegistro = date('Y-m-d');

    // Preparar la consulta SQL
    $stmt = $conn->prepare(
        "INSERT INTO USERS (name, surname, email, password, rol, date_register, age, avatar) 
        VALUES (?, ?, ?, ?, 'user', ?, ?, ?)"
    );

    if(!$stmt){
        die('Error en la preparación de la consulta: ' . $conn->error);
    }

    // Enlazar parámetros correctamente
    $stmt->bind_param('sssssis', $nombre, $apellido, $email, $passwordHashed, $fechaRegistro, $edad, $dest_path);

    // Ejecutar la consulta
    if($stmt->execute()){
        echo 'Usuario registrado correctamente';
    } else {
        echo 'Error al registrar el usuario';
    }

    // Cerrar conexión
    $stmt->close();
    $conn->close();
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
        <form class="login-form" action="#" method="post" enctype="multipart/form-data">
            <h2>Registrarse</h2>

            <div class="input-group">
                <label for="nombre">Nombre</label>
                <input type="text" id="nombre" name="nombre" required>
            </div>

            <div class="input-group">
                <label for="apellido">Apellido</label>
                <input type="text" id="apellido" name="apellido" required>
            </div>

            <div class="input-group">
                <label for="edad">Edad</label>
                <input type="number" id="edad" name="edad" required>
            </div>
            
            <div class="input-group">
                <label for="email">Correo Electrónico</label>
                <input type="email" id="email" name="email" required>
            </div>

            <div class="input-group">
                <label for="password">Contraseña</label>
                <input type="password" id="password" name="password" required>
            </div>

            <div class="input-group">
                <label for="avatar">Avatar</label>
                <input type="file" id="avatar" name="avatar" accept="image/*"  required>
            </div>

            <button type="submit" class="submit-btn">Registrarse</button>
        </form>
    </div>
</body>

</html>