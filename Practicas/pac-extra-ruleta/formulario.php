<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        #divApuesta {
            background-color: #f8f9fa;
            padding: 20px;
            border: 1px solid #dee2e6;
            border-radius: 2px;
            margin-bottom: 50px;
        }
    </style>
</head>

<body>
    <a href="cerrarSesion.php"><button class="btn">cerrar sesion</button></a>
    <div class="container">
        <div class="row">
            <div class="col">
                <h1>Formulario de Apuestas</h1>
                <form action="ruleta.php">
                    <div id="divApuesta">
                        <div class="mb-3">
                            <label for="TipoDeApuesta" class="form-label">Tipo de Apuesta</label>
                            <select class="form-select" aria-label="Default select example" id="TipoDeApuesta" onchange="actualizarApuestas()">
                                <option selected>Elige la apuesta</option>
                                <option value="Rojo/Negro">Rojo/Negro</option>
                                <option value="Par/Impar">Par/Impar</option>
                                <option value="Pasa/Falta">Pasa/Falta</option>
                                <option value="Docena">Docena</option>
                                <option value="Columna">Columna</option>
                                <option value="Dos docenas">Dos docenas</option>
                                <option value="Dos columnas">Dos columnas</option>
                                <option value="Seisena">Seisena</option>
                                <option value="Cuadro">Cuadro</option>
                                <option value="Transversal">Transversal</option>
                                <option value="Caballo">Caballo</option>
                                <option value="Pleno">Pleno</option>
                            </select>
                        </div>
                        <div class="mb-3" id="seleccionaApuesta" style="display: none;">
                            <label for="ValorApuesta" class="form-label">Valor de la Apuesta</label>
                            <select class="form-select" id="ValorApuesta">
                            </select>
                        </div>
                         <div class="mb-3" id="ayudaApuesta1" style="display: none;">
                            <label for="ValorApuestaAyuda1" class="form-label"></label>
                            <select class="form-select" id="ValorApuestaAyuda1">
                            </select>
                        </div>
                        <div class="mb-3" id="ayudaApuesta2" style="display: none;">
                            <label for="ValorApuestaAyuda2" class="form-label"></label>
                            <select class="form-select" id="ValorApuestaAyuda2">
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="CantidadDinero" class="form-label">Cantidad de dinero (€)</label>
                            <input type="number" class="form-control" id="CantidadDinero" placeholder="¿Cantidad de dinero?" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
                <table class="table table-bordered table-striped">
                    <thead class="table-primary">
                        <tr>
                            <th>Apuesta</th>
                            <th>Se juega a</th>
                            <th>Premio</th>
                            <th>Ejemplo en la imagen (ficha)</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Rojo/Negro</td>
                            <td>Se apuesta al color del número ganador, si será rojo o negro.</td>
                            <td>1 x 1</td>
                            <td>1</td>
                        </tr>
                        <tr>
                            <td>Par/Impar</td>
                            <td>Se apuesta a si el número donde cae la bola será par o impar.</td>
                            <td>1 x 1</td>
                            <td>2</td>
                        </tr>
                        <tr>
                            <td>Pasa/Falta</td>
                            <td>Se apuesta si el número estará entre 1-18 (falta) o 19-36 (pasa).</td>
                            <td>1 x 1</td>
                            <td>3</td>
                        </tr>
                        <tr>
                            <td>Docena</td>
                            <td>Se apuesta a qué docena estará el número ganador.</td>
                            <td>2 x 1</td>
                            <td>4</td>
                        </tr>
                        <tr>
                            <td>Columna</td>
                            <td>Se apuesta a qué columna estará el número ganador.</td>
                            <td>2 x 1</td>
                            <td>5</td>
                        </tr>
                        <tr>
                            <td>Dos docenas</td>
                            <td>Se apuesta a dos docenas contiguas.</td>
                            <td>0,5 x 1</td>
                            <td>6</td>
                        </tr>
                        <tr>
                            <td>Dos columnas</td>
                            <td>Se apuesta a dos columnas contiguas.</td>
                            <td>0,5 x 1</td>
                            <td>7</td>
                        </tr>
                        <tr>
                            <td>Seisena</td>
                            <td>Se apuesta a 6 números con una sola apuesta.</td>
                            <td>5 x 1</td>
                            <td>8</td>
                        </tr>
                        <tr>
                            <td>Cuadro</td>
                            <td>Se apuesta a 4 números con una sola apuesta.</td>
                            <td>8 x 1</td>
                            <td>9</td>
                        </tr>
                        <tr>
                            <td>Transversal</td>
                            <td>Se apuesta a 3 números en una fila.</td>
                            <td>11 x 1</td>
                            <td>10, 11, 12</td>
                        </tr>
                        <tr>
                            <td>Caballo</td>
                            <td>Se apuesta a 2 números contiguos.</td>
                            <td>17 x 1</td>
                            <td>13, 14</td>
                        </tr>
                        <tr>
                            <td>Pleno</td>
                            <td>Se apuesta a un solo número.</td>
                            <td>35 x 1</td>
                            <td>15</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script src="main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
