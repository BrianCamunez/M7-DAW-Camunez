<?php

session_start();

if (!isset($_SESSION['sesionIniciada'])) {
    header("Location: login.php");
    exit(); 
}

include_once("arrayLibros.php");

$username = $_SESSION['sesionIniciada']['username'];
$role = $_SESSION['sesionIniciada']['role'];
$fotoPerfil = $_SESSION['sesionIniciada']['fotoDePerfil'];


?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Biblioteca Virtual - Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</head>
<body>

    <!-- Encabezado del usuario -->
    <header class="bg-light py-3 mb-4 shadow-sm">
        <div class="container d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center">
                <img src="<?php echo $fotoPerfil ?>" alt="Foto de perfil" class="w-25 rounded-circle me-3" width="80px" height="80px">
                <div>
                    <h4 class="m-0">👋 Bienvenido, AQUÍ VA EL USUARIO!</h4>
                    <?php
                        if($role == 'admin'){
                            echo '<p class="text-muted m-0"><i class="fas fa-user-shield text-success"></i> Admin ✏️</p>';
                        }else{
                            echo '<p class="text-muted m-0">Lector 📚</p>';
                        }
                    ?>
                </div>
            </div>
            <a href="" class="btn btn-warning btn-sm">
               Cerrar sesión ❌
            </a>
        </div>
    </header>

    <div class="container">
        <div class="text-center mb-5">
            <h1 class="display-4 fw-bold">Biblioteca Virtual</h1>
            <p class="lead">Disfruta explorando nuestra colección de libros</p>
        </div>

        <!-- Botón de agregar libro (solo visible para el admin) -->
      
            <?php
            if($role == 'admin'){
                echo '<div class="text-center mb-4">
                <a href="add_edit_book.php" class="btn btn-outline-success btn-lg">
                    <i class="fas fa-plus-circle me-2"></i>Agregar Nuevo Libro
                </a>
            </div>';
            }
            ?>

        <!-- Mostrar lista de libros en un grid de tarjetas con tamaño uniforme -->
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
            <?php foreach ($libros as $libro): ?>
                <div class="col">
                    <div class="card h-100 shadow-sm">
                        <img src="<?php echo $libro['foto']; ?>" class="card-img-top" alt="<?php echo $libro['nombre']; ?>" style="height: 400px; object-fit: cover;">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $libro['nombre']; ?></h5>
                            <p class="card-text"><strong>Autor:</strong> <?php echo $libro['autor']; ?></p>
                        </div>
                        <!-- Botones de editar y eliminar (solo visibles para el admin) -->
                        <?php if ($role == 'admin'): ?>
                            <div class="card-footer d-flex justify-content-between">
                                <a href="edit_book.php?id=<?php echo $libro['id']; ?>" class="btn btn-outline-primary btn-sm">
                                    <i class="fas fa-edit"></i> Editar
                                </a>
                                <a href="delete_book.php?id=<?php echo $libro['id']; ?>" class="btn btn-outline-danger btn-sm">
                                    <i class="fas fa-trash-alt"></i> Eliminar
                                </a>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>