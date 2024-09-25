<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>p2</title>
</head>
<body>
    <h1>Esta es la pagina 2</h1>
    <?php

    if(isset($_GET['nom']) && isset($_GET['edat'])){
        $nom = $_GET['nom'];
        $edad = $_GET['edat'];

        echo "<p>Nom: $nom</p>";
        echo "<p>Edat: $edad</p>";

    }

    ?>
</body>
</html>