<?php

session_start();

require_once './clases/juegoAdivinar.class.php';
include_once './clases/carretCompra.class.php';
include_once './clases/producto.class.php';
include_once './clases/usuario.class.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['numero'])) {
        $numero = $_POST['numero'];


        if(!isset($_SESSION['juegoAdivinar'])){
            $juegoAdivinar = new juegoAdivinar();
            $_SESSION['juegoAdivinar'] = serialize($juegoAdivinar);
        }else{
            $juegoAdivinar = unserialize($_SESSION['juegoAdivinar']);
            $intentos = $juegoAdivinar->intentos;
            $inte = $juegoAdivinar->numerosecreto;
        }

        $resultado = $juegoAdivinar->comprovar($numero);
    }
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MiniJuegos</title>
</head>
<body>
    <h1>Joc 1: Endevinar un número amb formulari i intents</h1>
    <div>
        <form method="POST">
            <label for="numero">Escribe tu numero:</label>
            <input type="number" name="numero" id="numero">
            <?php echo $resultado; ?>
            <?php echo $intentos; ?>
            <?php echo $inte; ?>
        </form>
    </div>
    <h2>Joc 2: Carret de compra amb formulari</h2>
    <div>
        <form method="POST" action="">
            <label for="nombre">Nombre del producto:</label>
            <input type="text" name="nombre" id="nombre">
            <label for="precio">Precio del producto:</label>
            <input type="number" name="precio" id="precio">
            <button type="submit">Añadir al carrito</button>
        </form>
        <?php

            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                if (isset($_POST['nombre']) && isset($_POST['precio'])) {
                    $nombre = $_POST['nombre'];
                    $precio = $_POST['precio'];
                    echo $nombre . " " . $precio;
                    $producto = new producto($nombre, $precio);
                if(isset($_SESSION['carrito'])){
                    $carrito = unserialize($_SESSION['carrito']);
                    $carrito->añadirProducto($producto);
                    $_SESSION['carrito'] = serialize($carrito);
                }else{
                    $carrito = new carrito();
                    $_SESSION['carrito'] = serialize($carrito);
                }
                $carrito->mostrarCarrito();
                echo "Datos recibidos";
                }
                
            }else{
                echo "Introduce los datos";
            }
        ?>
    </div>
    <h2>Joc 3: Formulari d'inscripció amb validació</h2>
    <form method="POST" action="">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" id="nombre">
        <label for="edad">Edad:</label>
        <input type="text" name="edad" id="edad">
        <label for="email">Email:</label>
        <input type="text" name="email" id="email">
        <button type="submit">Enviar</button>
    </form>
    <?php
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            if (isset($_POST['nombre']) && isset($_POST['edad']) && isset($_POST['email'])) {
                $nombre = $_POST['nombre'];
                $edad = $_POST['edad'];
                $email = $_POST['email'];
                $usuario = new usuario($nombre, $edad, $email);
                if($usuario->validarDatos()){
                    echo "Datos validos";
                    $_SESSION['usuarios'] = $usuario;
                }else{
                    echo "Datos no validos";
                }
            }
        }
    ?>
    <h2>Joc 4: Factures amb descompte</h2>
    <table>
        <?php
            require_once './clases/factura.class.php';
            $factura1 = new factura('Cliente 1', 'Platanos', 10, 2);
            $factura2 = new factura('Cliente 2', 'Manzanas', 15, 4);
            $factura3 = new factura('Cliente 3', 'Uvas', 5, 8);
            $factura4 = new factura('Cliente 4', 'Melon', 7, 6);
            ?>
        <tr>
            <th>Cliente</th>
            <th>Producto</th>
            <th>Cantidad</th>
            <th>Precio</th>
            <th>Total</th>
            <th>Total con Descuento</th>
        </tr>
        <tr>
            <td><?php echo $factura1->getClient() ?></td>
            <td><?php echo $factura1->getProducto() ?></td>
            <td><?php echo $factura1->getCantidad() ?></td>
            <td><?php echo $factura1->getPrecio() ?></td>
            <td><?php echo $factura1->calcularTotal() ?></td>
            <td><?php echo $factura1->calcularDescuento(5) ?></td>
        </tr>
        <tr>
            <td><?php echo $factura2->getClient() ?></td>
            <td><?php echo $factura2->getProducto() ?></td>
            <td><?php echo $factura2->getCantidad() ?></td>
            <td><?php echo $factura2->getPrecio() ?></td>
            <td><?php echo $factura2->calcularTotal() ?></td>
            <td><?php echo $factura2->calcularDescuento(15) ?></td>
        </tr>
        <tr>
            <td><?php echo $factura3->getClient() ?></td>
            <td><?php echo $factura3->getProducto() ?></td>
            <td><?php echo $factura3->getCantidad() ?></td>
            <td><?php echo $factura3->getPrecio() ?></td>
            <td><?php echo $factura3->calcularTotal() ?></td>
            <td><?php echo $factura3->calcularDescuento(20) ?></td>
        </tr>
        <tr>
            <td><?php echo $factura4->getClient() ?></td>
            <td><?php echo $factura4->getProducto() ?></td>
            <td><?php echo $factura4->getCantidad() ?></td>
            <td><?php echo $factura4->getPrecio() ?></td>
            <td><?php echo $factura4->calcularTotal() ?></td>
            <td><?php echo $factura4->calcularDescuento(7) ?></td>
        </tr>
    </table>
    <a href="../reset.php">reset</a>
</body>
</html>