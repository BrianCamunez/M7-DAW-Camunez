<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalls de la Pel·lícula</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .contenido {
            max-width: 800px;
            margin: 20px auto;
        }

        .pelicula {
            display: flex;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .imagen {
            max-width: 300px;
            height: auto;
            margin: 15px;
        }

        .detalles {
            padding: 15px;
            flex: 1;
        }

        h2 {
            font-size: 1.8em;
            margin: 10px 0;
        }

        .descripcion {
            color: #555;
            margin: 10px 0;
        }

        strong {
            color: #333;
        }
        
        .botonTrailer {
            margin-top: 15px;
            border: solid 2px black;
            border-radius: 2px;
            margin: 15px;
            text-decoration: none;
            color: grey;
        }

        .izquierda{
            display: flex;
            flex-direction: column;
        }

    </style>
</head>
<body>
    <?php
    include 'array.php';

    $informacion = 0;

    if (isset($_GET['id']) && is_numeric($_GET['id'])) {
        $informacion = $_GET['id'];
        foreach ($peliculas as $pelicula) {
            if ($informacion == $pelicula['id']) {
                $infoPeli = $pelicula;
                break; // Salir del bucle una vez encontrada la película
            }
        }
    }
    ?>
    <div class="contenido">
        <div class="pelicula">
            <div class="text-center">
                <div class="izquierda">
                    <img src='<?php echo $infoPeli['imatge']; ?>' alt='<?php echo $infoPeli['nom']; ?>' class='imagen'>
                    <a href="trailer.php?id=<?php echo $infoPeli['id']; ?>" class="botonTrailer">Ver Trailer</a>
                </div>
            </div>
            <div class="detalles">
                <h2><?php echo $infoPeli['nom']; ?></h2>
                <p class='descripcion'><?php echo $infoPeli['sinopsi']; ?></p>
                <p>Durada: <?php echo $infoPeli['durada']; ?></p>
                <p><strong>Director:</strong> <?php echo $infoPeli['director']; ?></p>
                <p><strong>Repartiment:</strong> <?php echo implode(", ", $infoPeli['repartiment']); ?></p>
                <p><strong>Qualificació:</strong> <?php echo $infoPeli['qualificacio']; ?></p>
                <p><strong>Gènere:</strong> <?php echo $infoPeli['genere']; ?></p>
                <p><strong>Horaris:</strong> <?php echo implode(", ", $infoPeli['horaris']); ?></p>
                <?php
                for ($i = 1; $i <= 5; $i++) {
                    if ($i <= $infoPeli['valoracion']) {
                        echo "<span style='color: #E5BE01;'>&#9733;</span>";  
                    } else {
                        echo "<span>&#9734;</span>";  
                    }
                }
                ?>
                
                <!-- Carrusel de imágenes -->
                <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <?php
                        foreach ($infoPeli['carusel'] as $posicion => $imagen) {
                            $activeClass = ($posicion === 0) ? 'active' : '';
                            echo "<div class='carousel-item $activeClass' data-bs-interval='2000'>";
                            echo "<img src='$imagen' class='d-block w-100' alt='Imagen de {$infoPeli['nom']}'>";
                            echo "</div>";
                        }
                        ?>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Anterior</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Siguiente</span>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
