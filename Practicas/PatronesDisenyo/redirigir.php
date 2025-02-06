<?php
if (isset($_POST['patro'])) {
    $patro = $_POST['patro'];
    $ruta = "patrons/" . $patro . ".php";
        header("Location: $ruta");
        exit();
} else {
    echo "Error: No s'ha seleccionat cap patró.";
}
echo $ruta
?>