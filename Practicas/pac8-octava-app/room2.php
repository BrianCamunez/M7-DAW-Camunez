<?php
session_start();

include_once("main.php");

if (!isset($_SESSION['current_room'])) {
    $_SESSION['current_room'] = 2; 
}

if (isset($_SESSION['datos'])) {
    $nombre = $_SESSION['datos']['Nombre'];
    $apellido1 = $_SESSION['datos']['Apellido1'];
    $apellido2 = $_SESSION['datos']['Apellido2'];
    $dificultad = $_SESSION['datos']['Dificultad'];
}

$respuesta_usuario = $_POST['respuesta'];

$respuesta_correcta = strtolower($adivinanzas[$dificultad][1]['respuesta']);

if($respuesta_usuario !=""){
    if(strtolower($respuesta_usuario) == $respuesta_correcta){
        $_SESSION['current_room']++;
        header("Location: room" . $_SESSION['current_room'] . ".php");
    }else{
        $mensaje = "Te has equivocado";
    }
}

include_once("headerRoom.php");

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Habitación 2</title>
    <style>
         /* Estilo general del body */
         body {
            margin: 0;
        }

        /* Este contenedor es el que tiene el flexbox para centrar solo la card */
        .main-container {
            display: flex;
            justify-content: center; /* Centra horizontalmente */
            align-items: center;     /* Centra verticalmente */
            min-height: 80vh; /* Altura mínima para el contenedor de la card (puedes ajustarlo) */
        }

        .card {
            width: 22rem; /* Tamaño fijo para la card */
        }
    </style>
</head>
<body>
    <div class="main-container">
    <div class="card p-4" style="width: 22rem;">
        <h2 class="card-title text-center">Habitación 2</h2>
        <p class="card-text"><?php echo $adivinanzas[$dificultad][1]['pregunta']; ?></p>
        <form method="POST">
            <div class="mb-3">
                <input type="text" name="respuesta" class="form-control" required placeholder="Respuesta">
            </div>
            <button type="submit" class="btn btn-success w-100">Enviar</button>
        </form>
        <?php if (isset($mensaje)) { echo "<p>$mensaje</p>"; } ?>
    </div>
    </div>
</body>
</html>