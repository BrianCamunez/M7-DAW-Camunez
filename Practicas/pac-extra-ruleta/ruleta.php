<?php
// Iniciar la sesión para acceder a los datos
session_start();

// Verificar si los datos llegaron a través del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Guardar los datos en la sesión
    $_SESSION['tipoApuesta'] = $_POST['TipoDeApuesta'];
    $_SESSION['apuesta'] = $_POST['ValorApuesta'];
    $_SESSION['dineroApostado'] = $_POST['CantidadDinero'];

    $tipoApuesta= $_SESSION['tipoApuesta'];
    $apuesta = $_SESSION['apuesta'];
    $dinero = $_SESSION['dineroApostado'];
    $numeroGanador= rand(0,35);
    $ganancia = 0;

    $_SESSION['dinero'] = $_SESSION['dinero'] - $dinero;

    switch ($tipoApuesta) {
        case "Rojo/Negro":
            if($numeroGanador!=0){
                $colorGanador = $numeroGanador%2;
                if ($colorGanador == 0) {
                    $colorGanador = "Rojo";
                }else{
                    $colorGanador = "Negro";
                }
                if($colorGanador==$apuesta){
                    $ganancia = $dinero * 1;
                    $textoFinal = "Has ganado";
                }else{
                    $textoFinal = "Has perdido";
                }   
            }
            break;

        case "Par/Impar":
            if ($numeroGanador != 0) {
                // Verifica si el número es par o impar
                $esPar = $numeroGanador % 2 == 0;
                if (($apuesta == "Par" && $esPar) || ($apuesta == "Impar" && !$esPar)) {
                    $ganancia = $dinero * 1;  // 1x1
                    $textoFinal = "Has ganado";
                } else {
                    $textoFinal = "Has perdido";
                }
            }
            break;
    
        case "Pasa/Falta":
            if ($numeroGanador != 0) {
                // Verifica si el número está en el rango 1-18 (Falta) o 19-36 (Pasa)
                if (($apuesta == "Falta" && $numeroGanador >= 1 && $numeroGanador <= 18) ||
                    ($apuesta == "Pasa" && $numeroGanador >= 19 && $numeroGanador <= 36)) {
                    $ganancia = $dinero * 1;  // 1x1
                    $textoFinal = "Has ganado";
                } else {
                    $textoFinal = "Has perdido";
                }
            }
            break;
    
        case "Docena":
            if ($numeroGanador != 0) {
                // Verifica a cuál docena pertenece el número
                if (($apuesta == "1" && $numeroGanador >= 1 && $numeroGanador <= 12) ||
                    ($apuesta == "2" && $numeroGanador >= 13 && $numeroGanador <= 24) ||
                    ($apuesta == "3" && $numeroGanador >= 25 && $numeroGanador <= 36)) {
                    $ganancia = $dinero * 2;  // 2x1
                    $textoFinal = "Has ganado";
                } else {
                    $textoFinal = "Has perdido";
                }
            }
            break;

            case "Columna":
                if ($numeroGanador != 0) {
                    // Las columnas son: Columna 1 (1, 4, 7, ..., 34), Columna 2 (2, 5, 8, ..., 35), Columna 3 (3, 6, 9, ..., 36)
                    if (($apuesta == "1" && in_array($numeroGanador, range(1, 36, 3))) ||
                        ($apuesta == "2" && in_array($numeroGanador, range(2, 36, 3))) ||
                        ($apuesta == "3" && in_array($numeroGanador, range(3, 36, 3)))) {
                        $ganancia = $dinero * 2; // 2x1
                        $textoFinal = "Has ganado";
                    } else {
                        $textoFinal = "Has perdido";
                    }
                }
                break;
            
                case "Dos docenas":
                    if ($numeroGanador != 0) {
                        // Docena 1 y 2 (1-24), Docena 2 y 3 (13-36)
                        if (($apuesta == "1" && $numeroGanador >= 1 && $numeroGanador <= 24) ||
                            ($apuesta == "2" && $numeroGanador >= 13 && $numeroGanador <= 36)) {
                            $ganancia = $dinero * 2; // 2x1
                            $textoFinal = "Has ganado";
                        } else {
                            $textoFinal = "Has perdido";
                        }
                    }
                    break;
                
                    case "Dos columnas":
                        if ($numeroGanador != 0) {
                            // Columna 1 y 2 (1-24), Columna 2 y 3 (12-36)
                            if (($apuesta == "1" && $numeroGanador >= 1 && $numeroGanador <= 24) ||
                                ($apuesta == "2" && $numeroGanador >= 12 && $numeroGanador <= 36)) {
                                $ganancia = $dinero * 2; // 2x1
                                $textoFinal = "Has ganado";
                            } else {
                                $textoFinal = "Has perdido";
                            }
                        }
                        break;
                    
                        case "Seisena":
                            if ($numeroGanador != 0) {
                                // Seisena 1 (1-6), Seisena 2 (4-9), ..., Seisena 11 (31-36)
                                $seisenaStart = [1, 4, 7, 10, 13, 16, 19, 22, 25, 28, 31];
                                $seisenaEnd = [6, 9, 12, 15, 18, 21, 24, 27, 30, 33, 36];
                    
                                // Verificar si el número ganador está en el rango correspondiente a la Seisena seleccionada
                                for ($i = 0; $i < 11; $i++) {
                                    if ($apuesta == ($i + 1) && $numeroGanador >= $seisenaStart[$i] && $numeroGanador <= $seisenaEnd[$i]) {
                                        $ganancia = $dinero * 5; // 5x1 (Apuesta a seis números)
                                        $textoFinal = "Has ganado";
                                        break;
                                    } else {
                                        $textoFinal = "Has perdido";
                                    }
                                }
                            }
                            break;
                        
                            case "Cuadro":
                                // Los cuadros son combinaciones de 4 números adyacentes en la ruleta
                                // A continuación, definimos las combinaciones de cuadros posibles
                                $cuadros = [
                                    [1, 2, 4, 5],
                                    [2, 3, 5, 6],
                                    [4, 5, 7, 8],
                                    [5, 6, 8, 9],
                                    [7, 8, 10, 11],
                                    [8, 9, 11, 12],
                                    [10, 11, 13, 14],
                                    [11, 12, 14, 15],
                                    [13, 14, 16, 17],
                                    [14, 15, 17, 18],
                                    [16, 17, 19, 20],
                                    [17, 18, 20, 21],
                                    [19, 20, 22, 23],
                                    [20, 21, 23, 24],
                                    [22, 23, 25, 26],
                                    [23, 24, 26, 27],
                                    [25, 26, 28, 29],
                                    [26, 27, 29, 30],
                                    [28, 29, 31, 32],
                                    [29, 30, 32, 33],
                                    [31, 32, 34, 35],
                                    [32, 33, 35, 36],
                                ];
                        
                                // Verificamos si el número ganador está en alguno de los cuadros seleccionados
                                foreach ($cuadros as $cuadro) {
                                    if (in_array($numeroGanador, $cuadro) && in_array($numeroGanador, $apuesta)) {
                                        $ganancia = $dinero * 8; // Cuadro paga 8x1
                                        $textoFinal = "Has ganado en el Cuadro";
                                        break;
                                    }
                                }
                                if (empty($textoFinal)) {
                                    $textoFinal = "Has perdido en el Cuadro";
                                }
                                break;
                            
                                case "Transversal":
                                    // Las transversales son 6 números que se agrupan en dos filas de 3 números cada una
                                    // Ejemplo: 1, 2, 3 (Transversal 1), 4, 5, 6 (Transversal 2), etc.
                                    $transversales = [
                                        [1, 2, 3],
                                        [4, 5, 6],
                                        [7, 8, 9],
                                        [10, 11, 12],
                                        [13, 14, 15],
                                        [16, 17, 18],
                                        [19, 20, 21],
                                        [22, 23, 24],
                                        [25, 26, 27],
                                        [28, 29, 30],
                                        [31, 32, 33],
                                        [34, 35, 36],
                                    ];
                            
                                    // Verificar si el número ganador está en alguna de las transversales seleccionadas
                                    foreach ($transversales as $transversal) {
                                        if (in_array($numeroGanador, $transversal) && in_array($numeroGanador, $apuesta)) {
                                            $ganancia = $dinero * 5; // Transversal paga 5x1
                                            $textoFinal = "Has ganado en la Transversal";
                                            break;
                                        }
                                    }
                                    if (empty($textoFinal)) {
                                        $textoFinal = "Has perdido en la Transversal";
                                    }
                                    break;
                                
                                    case "Caballo":
                                        // El Caballo es una apuesta a 2 números contiguos en la ruleta
                                        // Ejemplo: 1-2, 2-3, 4-5, 5-6, etc.
                                        $caballos = [
                                            [1, 2],
                                            [2, 3],
                                            [4, 5],
                                            [5, 6],
                                            [7, 8],
                                            [8, 9],
                                            [10, 11],
                                            [11, 12],
                                            [13, 14],
                                            [14, 15],
                                            [16, 17],
                                            [17, 18],
                                            [19, 20],
                                            [20, 21],
                                            [22, 23],
                                            [23, 24],
                                            [25, 26],
                                            [26, 27],
                                            [28, 29],
                                            [29, 30],
                                            [31, 32],
                                            [32, 33],
                                            [34, 35],
                                            [35, 36],
                                        ];
                                
                                        // Verificar si el número ganador está en alguno de los caballos seleccionados
                                        foreach ($caballos as $caballo) {
                                            if (in_array($numeroGanador, $caballo) && in_array($numeroGanador, $apuesta)) {
                                                $ganancia = $dinero * 17; // Caballo paga 17x1
                                                $textoFinal = "Has ganado en el Caballo";
                                                break;
                                            }
                                        }
                                        if (empty($textoFinal)) {
                                            $textoFinal = "Has perdido en el Caballo";
                                        }
                                        break;
                                    
                                        case "Pleno":
                                            // El Pleno es una apuesta a un solo número
                                            if ($numeroGanador == $apuesta) {
                                                $ganancia = $dinero * 35; // Pleno paga 35x1
                                                $textoFinal = "Has ganado en el Pleno";
                                            } else {
                                                $textoFinal = "Has perdido en el Pleno";
                                            }
                                            break;
                                


    }
    $apuestaData = [
        'tipoApuesta' => $tipoApuesta,
        'valorApuesta' => $apuesta,
        'cantidadDinero' => $dinero,
        'numeroGanador' => $numeroGanador,
        'ganancia' => $ganancia,
    ];

    // Añadir la apuesta al historial de apuestas en la sesión
    $_SESSION['apuestas'][] = $apuestaData;
    $_SESSION['dinero'] = $_SESSION['dinero'] + $ganancia;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resumen de la Apuesta</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
        }
        .card {
            border-radius: 15px;
        }
        .card-header {
            font-size: 1.25rem;
            font-weight: bold;
        }
        .card-body {
            font-size: 1rem;
        }
        
        .girar {
            width: 200px; 
            height: auto;
            animation: girar 3s linear infinite;
        }

        @keyframes girar {
            from {
                transform: rotate(0deg);
            }
            to {
            transform: rotate(360deg);
            }
        }
        
        img {
            max-height: 350px;
            width: 400px;
        }
    </style>
</head>
<body>

<div class="container mt-5">
<div class="row align-items-center pag">
      <div class="col-6 text-center">
        <img src="https://masinogames.com/wp-content/uploads/2021/05/roulette-wheel_eu.png" alt="Ruleta" class="img-fluid girar" />
      </div>
      <div class="col-6 text-center">
        <img src="https://www.casino.es/imagenes/juegos/ruleta/tapete-ruleta-americana.png" alt="Tapete" class="img-fluid" />
      </div>
    </div>
    <div class="row justify-content-center mt-5">
        <div class="col-12 col-md-8 col-lg-6">
            
            <!-- Card para mostrar los detalles -->
            <div class="card shadow-lg border-light">
                <div class="card-header text-center bg-primary text-white">
                    <h3 class="mb-0">Resumen de la Apuesta</h3>
                </div>
                <div class="card-body p-4">
                    <div class="list-group list-group-flush">
                        <!-- Información de la apuesta -->
                        <div class="list-group-item py-2">
                            <strong>Tu apuesta</strong> 
                        </div>
                        <div class="list-group-item py-2">
                            <strong>Tipo de Apuesta:</strong> 
                            <?php echo htmlspecialchars($_SESSION['tipoApuesta']); ?>
                        </div>
                        <div class="list-group-item py-2">
                            <strong>Valor de la Apuesta:</strong> 
                            <?php echo htmlspecialchars($_SESSION['apuesta']); ?>
                        </div>
                        <div class="list-group-item py-2">
                            <strong>Cantidad de dinero apostado:</strong> 
                            €<?php echo number_format($dinero, 2); ?>
                        </div>
                        <div class="list-group-item py-2">
                            <strong>Numero ganador:</strong> 
                            <?php echo number_format($numeroGanador) . " " . htmlspecialchars($colorGanador) ?>
                        </div>
                        <div class="list-group-item py-2">
                            <strong><?php echo $textoFinal; ?></strong> 
                        </div>
                        <div class="list-group-item py-2">
                            <strong>Ganancia/Perdida:</strong>
                            <?php echo number_format($ganancia)  ?>€
                        </div>
                    </div> <!-- Cierre de list-group -->
                </div> <!-- Cierre de card-body -->

                <!-- Botón para volver al formulario -->
                <div class="card-footer text-center">
                    <a href="formulario.php" class="btn btn-secondary btn-sm">Volver al Formulario</a>
                </div>
            </div> <!-- Cierre de card -->

        </div> <!-- Cierre de col -->
    </div> <!-- Cierre de row -->
</div> <!-- Cierre de container -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

