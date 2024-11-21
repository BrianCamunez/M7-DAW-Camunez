<?php

if (isset($_REQUEST['accion'])){
    $accion = $_REQUEST['accion'];
    
    switch ($accion){
        case "Paper":
            if ($_SESSION['contenedor']['paper'] < 7) {
                $_SESSION['contenedor']['paper']++;
                $_SESSION['contador']++;
            } else {
                echo "<script>alert('Contenedor de papel lleno.');</script>";
            }
            break;
        case "Plastic":
            if ($_SESSION['contenedor']['plastic'] < 7) {
                $_SESSION['contenedor']['plastic']++;
                $_SESSION['contador']++;
            } else {
                echo "<script>alert('Contenedor de plastico lleno.');</script>";
            }
            break;
        case "Organic":
            if ($_SESSION['contenedor']['organic'] < 7) {
                $_SESSION['contenedor']['organic']++;
                $_SESSION['contador']++;
            } else {
                echo "<script>alert('Contenedor organico lleno.');</script>";
            }
            break;
        case "Glass":
            if ($_SESSION['contenedor']['glass'] < 7) {
                $_SESSION['contenedor']['glass']++;
                $_SESSION['contador']++;
            } else {
                echo "<script>alert('Contenedor de vidrio lleno.');</script>";
            }
            break;
        case 'vaciarCamion':
            $_SESSION['contenedor'] = [
                'paper' => 0,
                'organic' => 0,
                'plastic' => 0,
                'glass' => 0 
            ];
            break;
    }
}

?>