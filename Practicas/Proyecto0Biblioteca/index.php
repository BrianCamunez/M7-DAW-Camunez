<?php

include_once("Biblioteca.php");
include_once("Llibre.php");

session_start();

if (!isset($_SESSION['biblioteca'])) {
    $_SESSION['biblioteca'] = new Biblioteca();
}

$biblioteca = $_SESSION['biblioteca'];

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['titol'])) {
    $titol = $_POST['titol'];
    $autor = $_POST['autor'];
    $anyPublicacio = (int)$_POST['publicacion'];
    $url = $_POST['url'];

    $llibre = new Llibre($titol, $autor, $anyPublicacio, $url);

    $biblioteca->afegirLlibre($llibre);

}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proyecto 0 - Biblioteca</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col">
                <h2>Lista de libros en la biblioteca:</h2>
                <?php $biblioteca->mostrarLlibres(); ?>
                <h2 class="mt-3">Añadir un libro</h2>
                <form action="" method="POST">
                    <label class="form-label" for="titol">Títol del llibre:</label>
                    <input class="form-control" type="text" id="titol" name="titol">
                    <label class="form-label" for="autor">Autor del llibre:</label>
                    <input class="form-control" type="text" id="autor" name="autor">
                    <label class="form-label" for="titol">Año de publicación del libro:</label>
                    <input class="form-control" type="number" id="publicacion" name="publicacion">
                    <label class="form-label" for="url">Url de la imagen del libro:</label>
                    <input class="form-control" type="url" id="url" name="url">
                    <input class="btn btn-primary mt-2" type="submit" value="Crear libro">
                </form>
                <h2 class="mt-3">Buscar un libro por título</h2>
                <form action="" method="GET">
                    <label class="form-label" for="tituloBusca">Título del libro:</label>
                    <input class="form-control" type="text" name="tituloBusca" id="tituloBusca" required>
                    <input class="btn btn-secondary mt-2" type="submit" value="Buscar">
                </form>

                <h3 class="mt-3">Resultado de la búsqueda:</h3>
                <?php if (isset($_GET['tituloBusca'])){
                    $titolBusca = $_GET['tituloBusca'];
                    $informacionBusqueda = $biblioteca->cercarLlibre($titolBusca);
                }
                    if (count($informacionBusqueda) > 0):
                ?>
                <div class="row">
                    <?php foreach ($informacionBusqueda as $llibre): ?>
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <!-- Mostrar la imagen del libro -->
                            <img src="<?php echo $llibre->foto; ?>" class="card-img-top" alt="Portada de <?php echo $llibre->titol; ?>" style="height: 300px; object-fit: cover;">
                            <div class="card-body">
                                <!-- Mostrar el título, autor y año -->
                                <h5 class="card-title"><?php echo $llibre->titol; ?></h5>
                                <p class="card-text">Autor: <?php echo $llibre->autor; ?></p>
                                <p class="card-text">Publicado en: <?php echo $llibre->anyPublicacio; ?></p>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
                <?php else: ?>
                <p>No se encontró el libro.</p>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>