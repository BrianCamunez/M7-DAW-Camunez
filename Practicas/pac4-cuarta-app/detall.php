<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalls de la Pel·lícula</title>
    <link rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
    <style>
        body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    padding: 0;
}

.container {
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

.imatge {
    max-width: 300px; /* Ajusta el tamany de la imatge */
    height: auto;
}

.detalls {
    padding: 15px;
    flex: 1; /* Ocupa l'espai restant */
}

h2 {
    font-size: 1.8em;
    margin: 10px 0;
}

.descripcio {
    color: #555;
    margin: 10px 0;
}

strong {
    color: #333;
}
    </style>
</head>
<body>
    <?php

    include 'array.php';

    $informacion = 0;

    if(isset($_GET['id'])&& is_numeric($_GET['id'])){
        $informacion = $peliculas['id'];
        $informacion = ($_GET['id']);
        foreach($peliculas as $pelicula){
            if($informacion == $pelicula['id']){
                $infoPeli = $pelicula;
            }
        }
    }



    ?>
    <div class="container">
        <div class="pelicula">
            <?php
            echo "<img src='{$infoPeli['imatge']}' alt='Inception' class='imatge'>";
            echo '<div class="detalls">';
            echo "<h2>{$infoPeli['nom']}</h2>";
            echo  "<p class='descripcio'>{$infoPeli['sinopsi']}</p>";
            echo  '<p>Durada:'.$infoPeli["durada"].'</p>';
            echo "<p><strong>Director:</strong>{$infoPeli['director']}</p>";
            echo "<p><strong>Repartiment:</strong>";
            echo implode(" ", $infoPeli['repartiment']);
            echo "</p>";
            echo "<p><strong>Qualificació:</strong>{$infoPeli['qualificacio']}</p>";
            echo "<p><strong>Gènere:</strong>{$infoPeli['genere']}</p>";
            echo "<p><strong>Horaris:</strong>";
            echo implode(" ", $infoPeli['horaris']);
            echo "</p>";
            switch($infoPeli['valoracion']){
                case 1:
                    echo "<span style='color: #E5BE01;'>&#9733</span>";  
                    break;
                case 2:
                    echo "<span style='color: #E5BE01;'>&#9733</span>";  
                    echo "<span style='color: #E5BE01;'>&#9733</span>"; 
                    break; 
                case 3:
                    echo "<span style='color: #E5BE01;'>&#9733</span>";  
                    echo "<span style='color: #E5BE01;'>&#9733</span>";  
                    echo "<span style='color: #E5BE01;'>&#9733</span>"; 
                    break;
                case 4:
                    echo "<span style='color: #E5BE01;'>&#9733</span>";  
                    echo "<span style='color: #E5BE01;'>&#9733</span>";  
                    echo "<span style='color: #E5BE01;'>&#9733</span>";  
                    echo "<span style='color: #E5BE01;'>&#9733</span>";  
                    break;
                case 5:
                    echo "<span style='color: #E5BE01;'>&#9733</span>";  
                    echo "<span style='color: #E5BE01;'>&#9733</span>";  
                    echo "<span style='color: #E5BE01;'>&#9733</span>";  
                    echo "<span style='color: #E5BE01;'>&#9733</span>";  
                    echo "<span style='color: #E5BE01;'>&#9733</span>";  
                    break;
            };
            ?>
       <div id="carouselExample" class="carousel slide mt-4" data-bs-ride="carousel">
            <div class="carousel-inner">
                <?php foreach ($infoPeli['carusel'] as $index => $image): ?>
                    <div class="carousel-item <?php echo $index === 0 ? 'active' : ''; ?>">
                        <img src="<?php echo $image; ?>" class="d-block w-100" alt="Foto <?php echo $index + 1; ?>">
                    </div>
                <?php endforeach; ?>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
</div>
</div>
</body>
</html>

                    <!-- echo "<div class='carousel-item active'>";
                    echo "<img src='{$infoPeli['carusel'][0]}' class='d-block w-100' witdh='200px' height='100px' alt='Foto1'>";
                    echo "</div>";
                    echo "<div class='carousel-item'>";
                    echo "<img src='{$infoPeli['carusel'][1]}' class='d-block w-100' witdh='200px' height='100px' alt=Foto2>";
                    echo "</div>";
                    echo "<div class='carousel-item'>";
                    echo "<img src='{$infoPeli['carusel'][2]}' class='d-block w-100' witdh='200px' height='100px' alt=Foto3>"; -->
