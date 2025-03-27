<?php
require_once "../config.php";

session_start();

if($_SESSION['admin'] != true){
    header("Location: ../index.php");
}
// Verificar si se ha pasado un ID en la URL
if (isset($_GET['id'])) {
    $userId = $_GET['id'];

    // Obtener los datos del usuario con el ID correspondiente
    $consultaUser = $conn->query("SELECT * FROM USERS WHERE id = $userId");
    $user = $consultaUser->fetch_assoc();

    // Si el usuario no existe
    if (!$user) {
        die("Usuario no encontrado.");
    }
} else {
    die("ID de usuario no proporcionado.");
}

// Verificar si se envió el formulario para actualizar el usuario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener los datos del formulario
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $email = $_POST['email'];
    $edad = $_POST['edad'];
    $rol = $_POST['rol'];

    // Actualizar los datos del usuario en la base de datos
    $updateQuery = "UPDATE USERS SET name = '$nombre', surname = '$apellido', email = '$email', age = '$edad', rol = '$rol' WHERE id = $userId";

    if ($conn->query($updateQuery)) {
        header("Location: ./panelAdmin.php"); 
        exit();
    } else {
        echo "Error al actualizar el usuario: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuario</title>
    <!-- Vinculando el archivo de estilo de Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .container {
            max-width: 600px;
            background-color:rgb(192, 189, 189);
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 30px;
            margin-top: 50px;
        }

        h2 {
            color: #4e73df;
            text-align: center;
        }

        .form-label {
            font-weight: bold;
        }

        .btn-primary {
            background-color: #4e73df;
            border-color: #4e73df;
        }

        .btn-primary:hover {
            background-color: #2e59d9;
            border-color: #2e59d9;
        }

        .btn-secondary {
            background-color: #6c757d;
            border-color: #6c757d;
        }

        .btn-secondary:hover {
            background-color: #5a6268;
            border-color: #545b62;
        }

        .form-control:focus {
            border-color: #4e73df;
            box-shadow: 0 0 0 0.2rem rgba(78, 115, 223, 0.25);
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Editar Usuario</h2>

        <form action="edit_user.php?id=<?php echo $user['id']; ?>" method="POST">
            <!-- Campo de Nombre -->
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre:</label>
                <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo htmlspecialchars($user['name']); ?>" required>
            </div>

            <!-- Campo de Apellido -->
            <div class="mb-3">
                <label for="apellido" class="form-label">Apellido:</label>
                <input type="text" class="form-control" id="apellido" name="apellido" value="<?php echo htmlspecialchars($user['surname']); ?>" required>
            </div>

            <!-- Campo de Email -->
            <div class="mb-3">
                <label for="email" class="form-label">Email:</label>
                <input type="email" class="form-control" id="email" name="email" value="<?php echo htmlspecialchars($user['email']); ?>" required>
            </div>

            <!-- Campo de Edad -->
            <div class="mb-3">
                <label for="edad" class="form-label">Edad:</label>
                <input type="number" class="form-control" id="edad" name="edad" value="<?php echo htmlspecialchars($user['age']); ?>" required>
            </div>

            <!-- Campo de Rol -->
            <div class="mb-3">
                <label for="rol" class="form-label">Rol:</label>
                <select class="form-select" id="rol" name="rol" required>
                    <option value="admin" <?php echo ($user['rol'] === 'admin') ? 'selected' : ''; ?>>Administrador</option>
                    <option value="user" <?php echo ($user['rol'] === 'user') ? 'selected' : ''; ?>>Usuario</option>
                </select>
            </div>

            <!-- Botón para enviar -->
            <div class="d-flex justify-content-center">
                <button type="submit" class="btn btn-primary me-2">Guardar Cambios</button>
                <a href="./panelAdmin.php" class="btn btn-secondary">Cancelar</a>
            </div>
        </form>
    </div>

    <!-- Vinculando el archivo de script de Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
