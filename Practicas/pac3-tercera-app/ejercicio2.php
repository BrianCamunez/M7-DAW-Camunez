<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Frutas favoritas</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Selecciona tu fruta favorita</h1>

        <table class="table table-bordered mt-4">
            <thead class="thead-dark">
                <tr>
                    <th>Fruta</th>
                    <th>Estado</th>
                    <th>Acción</th>
                </tr>
            </thead>
            <tbody>
                <tr class="table-danger">
                    <?php
                        if(isset($_GET['fruta']) && $_GET['fruta'] == 'manzana'){
                            echo "<td style='background-color: greenyellow''>Manzana</td>";
                            echo "<td style='background-color: greenyellow''>✔️ Seleccionada</td>";
                            echo "<td style='background-color: greenyellow''><a class='btn btn-primary' href='ejercicio2.php?fruta=manzana'>Seleccionar</a></td>";
                        }else{
                            echo "<td>Manzana</td>";
                            echo "<td>✖ No seleccionada</td>";
                            echo "<td><a class='btn btn-primary' href='ejercicio2.php?fruta=manzana'>Seleccionar</a></td>";
                        }
                    ?>
                </tr>
                <tr class="table-danger">
                <?php
                        if(isset($_GET['fruta']) && $_GET['fruta'] == 'platano'){
                            echo "<td style='background-color: greenyellow''>Plátano</td>";
                            echo "<td style='background-color: greenyellow''>✔️ Seleccionada</td>";
                            echo "<td style='background-color: greenyellow''><a class='btn btn-primary' href='ejercicio2.php?fruta=platano'>Seleccionar</a></td>";
                        }else{
                            echo "<td>Plátano</td>";
                            echo "<td>✖ No seleccionada</td>";
                            echo "<td><a class='btn btn-primary' href='ejercicio2.php?fruta=platano'>Seleccionar</a></td>";
                        }
                    ?>
                </tr>
                <tr class="table-danger">
                    <?php
                        if(isset($_GET['fruta']) && $_GET['fruta'] == 'naranja'){
                            echo "<td style='background-color: greenyellow''>Naranja</td>";
                            echo "<td style='background-color: greenyellow''>✔️ Seleccionada</td>";
                            echo "<td style='background-color: greenyellow''><a class='btn btn-primary' href='ejercicio2.php?fruta=naranja'>Seleccionar</a></td>";
                        }else{
                            echo "<td>Naranja</td>";
                            echo "<td>✖ No seleccionada</td>";
                            echo "<td><a class='btn btn-primary' href='ejercicio2.php?fruta=naranja'>Seleccionar</a></td>";
                        }
                    ?>
                </tr>
                <tr class="table-danger" style="background-color: greenyellow;">
                    <?php
                        if(isset($_GET['fruta']) && $_GET['fruta'] == 'fresa'){
                            echo "<td style='background-color: greenyellow''>Fresa</td>";
                            echo "<td style='background-color: greenyellow''>✔️ Seleccionada</td>";
                            echo "<td style='background-color: greenyellow''><a class='btn btn-primary' href='ejercicio2.php?fruta=fresa'>Seleccionar</a></td>";
                        }else{
                            echo "<td>Fresa</td>";
                            echo "<td>✖ No seleccionada</td>";
                            echo "<td><a class='btn btn-primary' href='ejercicio2.php?fruta=fresa'>Seleccionar</a></td>";
                        }
                    ?>
                </tr>
                <tr class="table-danger">
                    <?php
                        if(isset($_GET['fruta']) && $_GET['fruta'] == 'kiwi'){
                            echo "<td style='background-color: greenyellow''>Kiwi</td>";
                            echo "<td style='background-color: greenyellow''>✔️ Seleccionada</td>";
                            echo "<td style='background-color: greenyellow''><a class='btn btn-primary' href='ejercicio2.php?fruta=kiwi'>Seleccionar</a></td>";
                        }else{
                            echo "<td>kiwi</td>";
                            echo "<td>✖ No seleccionada</td>";
                            echo "<td><a class='btn btn-primary' href='ejercicio2.php?fruta=kiwi'>Seleccionar</a></td>";
                        }
                    ?>
                </tr>
            </tbody>
        </table>

        <!-- Mostrar tarjeta de la fruta seleccionada (actualmente estatica, siempre hay una manzana) -->
        <div class="card mt-4 w-25 shadow-lg">
            <?php

                if(isset($_GET['fruta'])){
                    $fruta = $_GET['fruta'];
                }

                switch($fruta){
                    case 'manzana':
                        echo "<img src='https://static.vecteezy.com/system/resources/previews/023/858/853/non_2x/ai-genrative-green-apple-free-png.png' class='card-img-top img-fluid' alt='Manzana'>";
                        echo "<div class='card-body bg-warning'>";
                            echo "<h5 class='card-title'>Manzana</h5>";
                            echo "<p class='card-text'>¡Esta es tu fruta favorita!</p>";
                        echo "</div>";
                        break;
                    case 'platano':
                        echo "<img src='https://platanosruiz.com/wp-content/uploads/2023/02/platano-montaje.jpg' class='card-img-top img-fluid' alt='Plátano'>";
                        echo "<div class='card-body bg-warning'>";
                            echo "<h5 class='card-title'>Plátano</h5>";
                            echo "<p class='card-text'>¡Esta es tu fruta favorita!</p>";
                        echo "</div>";
                        break;
                    case 'naranja':
                        echo "<img src='https://www.ammarket.com/wp-content/uploads/2021/12/NARANJA_MESA_AMMARKET.COM_2.jpg' class='card-img-top img-fluid' alt='Naranja'>";
                        echo "<div class='card-body bg-warning'>";
                            echo "<h5 class='card-title'>Naranja</h5>";
                            echo "<p class='card-text'>¡Esta es tu fruta favorita!</p>";
                        echo "</div>";
                       break;
                    case 'fresa':
                        echo "<img src='https://dialprix.es/blog/wp-content/uploads/fresas.jpg' class='card-img-top img-fluid' alt='Fresa'>";
                        echo "<div class='card-body bg-warning'>";
                            echo "<h5 class='card-title'>Fresa</h5>";
                            echo "<p class='card-text'>¡Esta es tu fruta favorita!</p>";
                        echo "</div>";
                       break;
                    case 'kiwi':
                        echo "<img src='https://imag.bonviveur.com/un-kiwi-entero-y-corte-transversal-de-un-kiwi.jpg' class='card-img-top img-fluid' alt='Kiwi'>";
                        echo "<div class='card-body bg-warning'>";
                            echo "<h5 class='card-title'>Kiwi</h5>";
                            echo "<p class='card-text'>¡Esta es tu fruta favorita!</p>";
                        echo "</div>";
                       break;
                }

            ?>
        </div>

    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>


<!-- aqui tienes el emoji de SELECCIONADA ✔️ para copiarlo y usarlo en la práctica -->