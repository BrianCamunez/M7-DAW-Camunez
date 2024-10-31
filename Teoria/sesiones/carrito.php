<?php

//Hola

$numeros=1;

session_start();

// incializar el carrito

if(!isset($_SESSION['carrito'])){
    $_SESSION['carrito'] = [];
}

var_dump($_SESSION['carrito']);

// Añadir productos al carrito

$item = $_POST['item'];
// Manera 1 de hacer push
$_SESSION['carrito'][] = $item;
// manera 2 de hacer push
array_push($_SESSION['carrito']);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Carrito compra con sesiones</h2>
 <form action="carrito.php" method="post">
    <input type="text" name="item" placeholder="Producto" require>
    <button type="submit">Agregar al carrito</button>
    
 </form>   

 <section>
    <h3>Productos del carrito</h3>
    <table>
        <tr>
            <th>Producto</th>
        </tr>
        <?php foreach($_SESSION['carrito'] as $item):?>
        <tr>
            <td><?php echo $item;?></td>
        </tr>
        <?php endforeach;?>
    </table>
 </section>
</body>
</html>