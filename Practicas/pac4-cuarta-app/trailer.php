<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trailer de la Pel·lícula</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
        }
        .contenido {
            max-width: 800px;
            margin: 20px auto;
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
        }
        
        h2 {
            text-align: center;
        }
        .trailer {
            text-align: center;
            margin: 20px 0;
        }
        .botonVolver {
            display: block;
            margin: 0 auto;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <?php
    include 'array.php';

    $infoPeli = null;

    if (isset($_GET['id']) && is_numeric($_GET['id'])) {
        $id = $_GET['id'];
        foreach ($peliculas as $pelicula) {
            if ($pelicula['id'] == $id) {
                $infoPeli = $pelicula;
                break;
            }
        }
    }
    ?>
    <div class="contenido">
        <?php if ($infoPeli): ?>
            <h2><?php echo ($infoPeli['nom']); ?></h2>
            <div class="trailer">
                <?php echo ($infoPeli['trailer']); ?>
            </div>
            <a href="peliculas.php" class="btn btn-primary botonVolver">Volver a la Cartelera</a>
        <?php endif; ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
