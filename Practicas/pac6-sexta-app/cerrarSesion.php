<?php
session_start(); // Inicia la sesión

// Destruir la sesión
session_unset();

// Redirigir al formulario de inicio de sesión
header("Location: login.php");
exit();
