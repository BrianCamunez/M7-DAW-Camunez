<?php
session_start();

include_once("main.php");

if (isset($_SESSION['datos'])) {
    $nombre = $_SESSION['datos']['Nombre'];
    $apellido1 = $_SESSION['datos']['Apellido1'];
    $apellido2 = $_SESSION['datos']['Apellido2'];
    $dificultad = $_SESSION['datos']['Dificultad'];
}

$respuesta_usuario = $_POST['respuesta'];

$respuesta_correcta = strtolower($adivinanzas[$dificultad][2]['respuesta']);

if(strtolower($respuesta_usuario) == $respuesta_correcta){
    $_SESSION['current_room'] = 4;
    header("Location: room" . $_SESSION['current_room'] . ".php");
}else{
    $mensaje = "Te has equivocado";
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Habitación 1</title>
</head>
<body class="d-flex justify-content-center align-items-center vh-100">
    <div class="card p-4" style="width: 22rem;">
        <h2 class="card-title text-center">Habitación 3</h2>
        <p class="card-text"><?php echo $adivinanzas[$dificultad][2]['pregunta']; ?></p>
        <form method="POST">
            <div class="mb-3">
                <input type="text" name="respuesta" class="form-control" required placeholder="Respuesta">
            </div>
            <button type="submit" class="btn btn-success w-100">Enviar</button>
        </form>
        <?= $mensaje; ?> <!-- Muestra el mensaje de éxito o error -->
    </div>
</body>
</html>