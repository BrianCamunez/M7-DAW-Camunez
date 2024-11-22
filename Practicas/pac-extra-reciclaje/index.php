<?php
session_start();

include 'actions.php';

if (!isset($_SESSION['basura'])) {
    $tiposBasura = ['paper', 'glass', 'organic', 'plastic'];
    $basura = [];
    for ($i = 0; $i < 5; $i++) {
        $basura[] = $tiposBasura[array_rand($tiposBasura)];
    }
    $_SESSION['basura'] = $basura;
}
if (!isset($_SESSION['contador'])) {
    $_SESSION['contador'] = 0;
}
if (!isset($_SESSION['contenedor'])) {
    $_SESSION['contenedor'] = [
        'paper' => 0,
        'organic' => 0,
        'plastic' => 0,
        'glass' => 0 
    ];
}

include_once("./components/navbar.php");

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Basura</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <h1 class="text-center">Gestión del reciclaje</h1>

        <button type="button" class="btn p-3 btn-secondary text-white">
            Basura procesada: <span class="badge bg-danger"><?php echo $_SESSION['contador']; ?></span>
        </button>
        <hr>

        <div class="mt-4">
            <h3>¿Qué toca reciclar ahora?</h3>
            <div class="d-flex align-items-center justify-content-center mb-4">
                <div class="text-center p-3 mx-2 border border-success rounded" style="background-color: #d4edda;">
                    <h4 class="text-success">Ahora: <?php echo $_SESSION['basura'][0] ?></h4>
                    <img src="./images/<?php echo $_SESSION['basura'][0]; ?>.jpg" alt="" class="img-fluid" style="width: 80px;">
                </div>

                <div class="d-flex gap-2">
                    <?php 
                    for ($i = 1; $i <= 4; $i++) {
                        if (isset($_SESSION['basura'][$i])) {
                            $basura_col = $_SESSION['basura'][$i];
                            echo '<div class="text-center p-3 mx-2 border rounded" style="background-color: #f8f9fa;">';
                            echo '<h6>' . $basura_col . '</h6>';
                            echo '<img src="./images/' . $basura_col . '.jpg" alt="" class="img-fluid" style="width: 50px;">';
                            echo '</div>';
                        }
                    }
                    ?>
                </div>
            </div>

        <div class="d-flex justify-content-center flex-wrap gap-3">
            <a href="index.php?accion=glass" class="btn btn-success">
                Glass
            </a>
            <a href="index.php?accion=organic" class="btn btn-secondary">
                Organic
            </a>
            <a href="index.php?accion=paper" class="btn btn-primary">
                Paper
            </a>
            <a href="index.php?accion=plastic" class="btn btn-warning">
                Plastic
            </a>
            <a href="index.php?accion=vaciarCamion" class="btn btn-danger">
                <img src="images/camion.png" alt="Vaciar Camión" class="img-fluid" style="width: 50px;"> Vaciar Camión
            </a>
        </div>

        <h2 class="mt-5">Estado de los Contenedores</h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Tipo</th>
                    <th>Cantidad</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Paper</td>
                    <td><?php echo $_SESSION['contenedor']['paper']; ?> / 7</td>
                </tr>
                <tr>
                    <td>Plastic</td>
                    <td><?php echo $_SESSION['contenedor']['plastic']; ?> / 7</td>
                </tr>
                <tr>
                    <td>Organic</td>
                    <td><?php echo $_SESSION['contenedor']['organic']; ?> / 7</td>
                </tr>
                <tr>
                    <td>Glass</td>
                    <td><?php echo $_SESSION['contenedor']['glass']; ?> / 7</td>
                </tr>
            </tbody>
        </table>
    </div>

    <?php include 'components/footer.php'; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
