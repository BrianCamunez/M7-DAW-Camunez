<?php
session_start();

include_once("functions.php");

$editando = false;
$nombreLibro = "";
$autorLibro = "";
$fotoLibro = "";
$descripcionLibro = "";

// Verificar si estamos editando un libro
if (isset($_GET['id'])) {
    $id_libro = $_GET['id'];
    $editando = true;
    
    // Verificar si el libro existe en la sesión
    foreach ($_SESSION['libros'] as $libro) {
        if ($libro['id'] == $id_libro) {
            $nombreLibro = $libro['nombre'];
            $autorLibro = $libro['autor'];
            $fotoLibro = $libro['foto'];
            $descripcionLibro = $libro['descripcion'];
            break; // Salir del bucle después de encontrar el libro
        }
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $titulo = $_POST['titulo'];
    $autor = $_POST['autor'];
    $imagen = $_POST['imagen'];
    $descripcion = $_POST['descripcion'];

    if ($editando) {
        // Si estamos editando, actualizamos el libro en la sesión
        editarLibro($id_libro, $titulo, $autor, $imagen, $descripcion);
    } else {
        // Si estamos agregando, creamos un nuevo libro
        agregarLibro($titulo, $autor, $imagen, $descripcion);
    }

}

?>

<!-- AQUI VA LA LÓGICA PHP  -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Biblioteca Virtual</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</head>
<body>
    <!-- Encabezado del formulario -->
    <header class="bg-light py-3 mb-4 shadow-sm">
        <div class="container d-flex align-items-center justify-content-between">
            <div>
                <h4 class="m-0">👋 Bienvenido, NOMBRE DE USUARIO</h4>
                <p class="text-muted m-0"><i class="fas fa-user-shield text-success"></i> ROL ADMIN O ROL LECTOR???</p>
            </div>
            <a href="home.php" class="btn btn-secondary btn-sm">
                <i class="fas fa-arrow-left"></i> Volver a la Biblioteca
            </a>
        </div>
    </header>

    <div class="container">
        <div class="text-center mb-5">
            <h2 class="fw-bold"></h2>
            <p class="lead"></p>
        </div>

        <form method="POST" class="mx-auto" style="max-width: 600px;">
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="titulo" name="titulo" value="<?php if($editando == true){echo $nombreLibro;} ?>" placeholder="Título" required>
                <label for="titulo">Título</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="autor" name="autor" value="<?php if($editando == true){echo $autorLibro;} ?>" placeholder="Autor" required>
                <label for="autor">Autor</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="imagen" name="imagen" value="<?php if($editando == true){echo $fotoLibro;} ?>" placeholder="URL de la Imagen">
                <label for="imagen">URL de la Imagen</label>
            </div>
            <div class="form-floating mb-4">
                <textarea class="form-control" id="descripcion" name="descripcion" placeholder="Descripción" style="height: 150px;"><?php if($editando == true){echo $descripcionLibro;} ?></textarea>
                <label for="descripcion">Descripción</label>
            </div>
            <div class="d-grid">
                <button type="submit" class="btn btn-primary btn-lg"><?php if($editando == true){echo "Cambiar datos";}else{echo "Crear libro";} ?></button>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>