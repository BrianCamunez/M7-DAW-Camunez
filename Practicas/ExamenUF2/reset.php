<?php
session_start();  // Inicia la sesión

// Destruir toda la sesión
session_unset();
session_destroy();

// Redirigir al formulario para iniciar una nueva partida
header('Location: index.php');
exit();
?>