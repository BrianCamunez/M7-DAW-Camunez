<?php
require_once "../config.php";

session_start();

if($_SESSION['admin'] != true){
    header("Location: ../index.php");
}

// Verificar si se envió el formulario para crear el usuario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener los datos del formulario
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $email = $_POST['email'];
    $edad = $_POST['edad'];
    $rol = $_POST['rol'];

    // Manejo del avatar
    if (isset($_FILES['avatar']) && $_FILES['avatar']['error'] === UPLOAD_ERR_OK) {
        $uploadDir = 'uploads/';

        $fileTmpPath = $_FILES['avatar']['tmp_name'];
        $fileName = $_FILES['avatar']['name'];
        $fileNameCmps = explode(".", $fileName);
        $fileExtension = strtolower(end($fileNameCmps));

        $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];

        if (in_array($fileExtension, $allowedExtensions)) {
            $newFileName = md5(time() . $fileName) . '.' . $fileExtension;
            $destPath = $uploadDir . $newFileName;

            if (move_uploaded_file($fileTmpPath, $destPath)) {
                // Si el avatar se sube correctamente, almacenamos la ruta
                $avatarPath = $destPath;
            } else {
                die('Error: No se pudo mover el archivo a la carpeta de destino.');
            }
        } else {
            die('Error: Solo se permiten archivos de imagen (jpg, jpeg, png, gif).');
        }
    } else {
        // Si no se subió un avatar, no asignamos uno
        $avatarPath = null;
    }

    $fechaRegistro = date('Y-m-d');

    // Preparar la consulta para evitar inyección SQL
    $consultaUsuario = $conn->prepare("INSERT INTO USERS (name, surname, email, age, rol, date_register,avatar) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $consultaUsuario->bind_param("sssdsss", $nombre, $apellido, $email, $edad, $rol, $fechaRegistro, $avatarPath);
    
    if ($consultaUsuario->execute()) {
        header("Location: ./panelAdmin.php"); 
        exit();
    } else {
        echo "Error al crear el usuario: " . $conn->error;
    }
    
    $consultaUsuario->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Usuario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .container {
            max-width: 600px;
            background-color: rgb(192, 189, 189);
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 30px;
            margin-top: 50px;
        }

        h2 {
            color: #4e73df;
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Crear Usuario</h2>
        <form action="" method="POST">
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre:</label>
                <input type="text" class="form-control" id="nombre" name="nombre" required>
            </div>
            <div class="mb-3">
                <label for="apellido" class="form-label">Apellido:</label>
                <input type="text" class="form-control" id="apellido" name="apellido" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email:</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="mb-3">
                <label for="edad" class="form-label">Edad:</label>
                <input type="number" class="form-control" id="edad" name="edad" required>
            </div>
            <div class="mb-3">
                <label for="avatar" class="form-label">Avatar:</label>
                <input type="file" class="form-control" id="avatar" name="avatar" accept="image/*">
                <small class="form-text text-muted">Selecciona una imagen para el avatar del usuario.</small>
            </div>
            <div class="mb-3">
                <label for="rol" class="form-label">Rol:</label>
                <select class="form-select" id="rol" name="rol" required>
                    <option value="admin">Administrador</option>
                    <option value="user">Usuario</option>
                </select>
            </div>
            <div class="d-flex justify-content-center">
                <button type="submit" class="btn btn-primary me-2">Crear Usuario</button>
                <a href="./panelAdmin.php" class="btn btn-secondary">Cancelar</a>
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>