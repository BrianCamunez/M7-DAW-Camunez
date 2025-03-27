<?php

require_once "../config.php";

session_start();

if($_SESSION['admin'] != true){
    header("Location: ../index.php");
}

$consultaUsers = $conn->query("SELECT * FROM USERS");

$usersArray = mysqli_fetch_all($consultaUsers, MYSQLI_ASSOC);

$consultaNews = $conn->query("SELECT * FROM NEWS");

$newsArray = mysqli_fetch_all($consultaNews, MYSQLI_ASSOC);

$consultaTestimonials = $conn->query("SELECT * FROM TESTIMONIALS");

$testimonialsArray = mysqli_fetch_all($consultaTestimonials, MYSQLI_ASSOC);

$consultaProjects = $conn->query("SELECT * FROM PROJECTS");

$projectsArray = mysqli_fetch_all($consultaProjects, MYSQLI_ASSOC);



?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Panel de Usuarios</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
    <div class="container mt-5">
        <h2 class="mb-4">Panel de Administración</h2>

        <!-- TARJETAS DE SELECCIÓN -->
        <div class="row mb-4">
            <div class="col-md-6">
                <div class="card card-toggle active" data-target="usuarios">
                    <div class="card-body text-center">
                        <h5 class="card-title">Usuarios</h5>
                        <p class="card-text">Administrar usuarios registrados</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card card-toggle" data-target="noticias">
                    <div class="card-body text-center">
                        <h5 class="card-title">Noticias</h5>
                        <p class="card-text">Administrar publicaciones</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card card-toggle" data-target="testimonials">
                    <div class="card-body text-center">
                        <h5 class="card-title">Testimonials</h5>
                        <p class="card-text">Administrar testimonials</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card card-toggle" data-target="projects">
                    <div class="card-body text-center">
                        <h5 class="card-title">Projects</h5>
                        <p class="card-text">Administrar proyectos</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- TABLA USUARIOS -->
        <div id="usuarios" class="toggle-section">
            <h4>Usuarios</h4>
            <table class="table table-bordered table-hover bg-white">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Email</th>
                        <th>Rol</th>
                        <th>Edad</th>
                        <th>Fecha de Registro</th>
                        <th style="width: 150px;">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($usersArray as $user) {
                        echo '
                        <tr>
                            <td>' . $user['id'] . '</td>
                            <td>' . $user['name'] . '</td>
                            <td>' . $user['surname'] . '</td>
                            <td>' . $user['email'] . '</td>
                            <td>' . $user['rol'] . '</td>
                            <td>' . $user['age'] . '</td>
                            <td>' . $user['date_register'] . '</td>
                            <td>
                                <a href="edit_user.php?id=' . $user['id'] . '" class="btn btn-sm btn-primary">Editar</a>
                                <a href="delete_user.php?id=' . $user['id'] . '" class="btn btn-sm btn-danger">Eliminar</a>
                            </td>
                        </tr>';
                    } ?>
                </tbody>
            </table>
            <a class="btn btn-success mt-3" href="add_user.php">Agregar Usuario</a>
        </div>

        <!-- TABLA NOTICIAS -->
        <div id="noticias" class="toggle-section d-none">
            <h4>Noticias</h4>
            <table class="table table-bordered table-hover bg-white">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Subtitle</th>
                        <th>Thumbmail</th>
                        <th>Fecha</th>
                        <th>Descripción</th>
                        <th style="width: 150px;">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($newsArray as $new) {
                        echo '
                        <tr>
                            <td>' . $new['id'] . '</td>
                            <td>' . $new['title'] . '</td>
                            <td>' . $new['subtitle'] . '</td>
                            <td>' . $new['thumbmail'] . '</td>
                            <td>' . $new['new_date'] . '</td>
                            <td>' . $new['description'] . '</td>
                            <td>
                                <a href="edit_news.php?id=' . $new['id'] . '" class="btn btn-sm btn-primary">Editar</a>
                                <a href="delete_new.php?id=' . $new['id'] . '" class="btn btn-sm btn-danger">Eliminar</a>
                            </td>
                        </tr>';
                    } ?>
                </tbody>
            </table>
            <a class="btn btn-success mt-3" href="add_news.php">Agregar Noticia</a>
        </div>

        <div id="testimonials" class="toggle-section d-none">
            <h4>Testimonials</h4>
            <table class="table table-bordered table-hover bg-white">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Descripción</th>
                        <th>Imagen</th>
                        <th>Fecha</th>
                        <th style="width: 150px;">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($testimonialsArray as $testimonial) {
                        echo '
                        <tr>
                            <td>' . $testimonial['id'] . '</td>
                            <td>' . $testimonial['name'] . '</td>
                            <td>' . $testimonial['surname'] . '</td>
                            <td>' . $testimonial['description'] . '</td>
                            <td>' . $testimonial['imatge'] . '</td>
                            <td>' . $testimonial['data'] . '</td>
                            <td>
                                <a href="edit_testimonials.php?id=' . $testimonial['id'] . '" class="btn btn-sm btn-primary">Editar</a>
                                <a href="delete_testimonial.php?id=' . $testimonial['id'] . '" class="btn btn-sm btn-danger">Eliminar</a>
                            </td>
                        </tr>';
                    } ?>
                </tbody>
            </table>
            <a class="btn btn-success mt-3" href="add_testimonials.php">Agregar Testimonio</a>
        </div>

        <div id="projects" class="toggle-section d-none">
            <h4>Projects</h4>
            <table class="table table-bordered table-hover bg-white">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>URL</th>
                        <th>Thumbnail</th>
                        <th>Description</th>
                        <th style="width: 150px;">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($projectsArray as $project) {
                        echo '
                        <tr>
                            <td>' . $project['id'] . '</td>
                            <td>' . $project['title'] . '</td>
                            <td>' . $project['url'] . '</td>
                            <td>' . $project['thumbnail'] . '</td>
                            <td>' . $project['description'] . '</td>
                            <td>
                                <a href="edit_projects.php?id=' . $project['id'] . '" class="btn btn-sm btn-primary">Editar</a>
                                <a href="delete_project.php?id=' . $project['id'] . '" class="btn btn-sm btn-danger">Eliminar</a>
                            </td>
                        </tr>';
                    } ?>
                </tbody>
            </table>
            <a class="btn btn-success mt-3" href="add_projects.php">Agregar Proyecto</a>
        </div>


    </div>

    <!-- ESTILO TARJETA ACTIVA -->
    <style>
        .card-toggle {
            cursor: pointer;
            transition: 0.3s;
            border: 2px solid transparent;
        }

        .card-toggle:hover {
            border-color: #0d6efd;
        }

        .card-toggle.active {
            border-color: #0d6efd;
            box-shadow: 0 0 10px rgba(13, 110, 253, 0.3);
        }
    </style>

    <!-- SCRIPT PARA CAMBIAR SECCIONES -->
    <script>
        const cards = document.querySelectorAll(".card-toggle");
        const sections = document.querySelectorAll(".toggle-section");

        cards.forEach(card => {
            card.addEventListener("click", () => {
                // Quitar clase activa de todas las tarjetas
                cards.forEach(c => c.classList.remove("active"));

                // Ocultar todas las secciones
                sections.forEach(section => section.classList.add("d-none"));

                // Activar la tarjeta clicada
                card.classList.add("active");

                // Mostrar la sección correspondiente
                const target = card.getAttribute("data-target");
                document.getElementById(target).classList.remove("d-none");
            });
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>


</html>