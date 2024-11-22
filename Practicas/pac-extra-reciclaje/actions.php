<?php

if (isset($_REQUEST['accion'])) {
    $accion = $_REQUEST['accion'];
    
    if ($accion == $_SESSION['basura'][0]) {
        switch ($accion) {
            case "paper":
                if ($_SESSION['contenedor']['paper'] < 7) {
                    $_SESSION['contenedor']['paper']++;
                    $_SESSION['contador']++;
                    array_shift($_SESSION['basura']);
                    $tiposBasura = ['paper', 'glass', 'organic', 'plastic'];
                    $_SESSION['basura'][] = $tiposBasura[array_rand($tiposBasura)];
                } else {
                    echo "<script>alert('Contenedor de papel lleno.');</script>";
                }
                break;
            case "plastic":
                if ($_SESSION['contenedor']['plastic'] < 7) {
                    $_SESSION['contenedor']['plastic']++;
                    $_SESSION['contador']++;
                    array_shift($_SESSION['basura']);
                    $tiposBasura = ['paper', 'glass', 'organic', 'plastic'];
                    $_SESSION['basura'][] = $tiposBasura[array_rand($tiposBasura)];
                } else {
                    echo "<script>alert('Contenedor de plástico lleno.');</script>";
                }
                break;
            case "organic":
                if ($_SESSION['contenedor']['organic'] < 7) {
                    $_SESSION['contenedor']['organic']++;
                    $_SESSION['contador']++;
                    array_shift($_SESSION['basura']);
                    $tiposBasura = ['paper', 'glass', 'organic', 'plastic'];
                    $_SESSION['basura'][] = $tiposBasura[array_rand($tiposBasura)];
                } else {
                    echo "<script>alert('Contenedor orgánico lleno.');</script>";
                }
                break;
            case "glass":
                if ($_SESSION['contenedor']['glass'] < 7) {
                    $_SESSION['contenedor']['glass']++;
                    $_SESSION['contador']++;
                    array_shift($_SESSION['basura']);
                    $tiposBasura = ['paper', 'glass', 'organic', 'plastic'];
                    $_SESSION['basura'][] = $tiposBasura[array_rand($tiposBasura)];
                } else {
                    echo "<script>alert('Contenedor de vidrio lleno.');</script>";
                }
                break;
        }     
    }
    if($accion == "vaciarCamion"){
        $_SESSION['contenedor'] = [
            'paper' => 0,
            'organic' => 0,
            'plastic' => 0,
            'glass' => 0 
        ];
    }
}

?>
