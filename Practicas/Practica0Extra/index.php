<?php

class Coche
{

    public string $marca = "Mercedes";
    public string $modelo = "EQE Berlina";

    public function descripcion(){
        return "El coche es de la marca ". $this->marca. " y el modelo es ". $this->modelo;
    }

}

$coche = new Coche();

class Persona
{
    public string $nombre;
    public int $edad;

    public function __construct($nombre, $edad) {
        $this->nombre = $nombre;
        $this->edad = $edad;
    }

    public function saludar() : string
    {
        return "Hola, mi nombre es ". $this->nombre. " y tengo ". $this->edad. " años.";
    }

}

$persona = new Persona("Brian", 19);

$persona2 = new Persona("David", 20);

class Calculadora
{
    public int $numero1;
    public int $numero2;
    public function __construct($numero1, $numero2) {
        $this->numero1 = $numero1;
        $this->numero2 = $numero2;
    }
    public function sumar() : int
    {
        return $this->numero1 + $this->numero2;
    }
}

class Animal
{
    public string $nombre;
    public string $tipo;

    public function __construct($nombre, $tipo) {
        $this->nombre = $nombre;
        $this->tipo = $tipo;
    }
    public function saludar() {
        return "Hola, sóc un ". $this->tipo. " i em dic ". $this->nombre;
    }
}

class Producto
{
    public string $nombre;
    public float $precio;

    // Constructor de la clase
    public function __construct($nombre, $precio)
    {
        $this->nombre = $nombre;
        $this->precio = $precio;
    }

    // Método para obtener el nombre del producto
    public function getNombre(): string
    {
        return $this->nombre;
    }

    // Método para obtener el precio del producto
    public function getPrecio(): float
    {
        return $this->precio;
    }
}

// Creamos algunos objetos Producto
$producto1 = new Producto("Camiseta", 20);
$producto2 = new Producto("Pantalón", 30);
$producto3 = new Producto("Zapatos", 50);
$producto4 = new Producto("Gorra", 15);
$producto5 = new Producto("Diente", 5);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Practica0 Extra</title>
</head>
<body>
    <h1>Practica0 Extra</h1>
    <br>
    <h1>Clase Coche</h1>
    <h2><?php echo $coche->descripcion() ?></h2>
    <br>
    <h1>Clase Persona</h1>
    <h2><?php echo $persona->saludar()?></h2>
    <h2><?php echo $persona2->saludar()?></h2>
    <br>
    <h1>Clase Calculadora</h1>
    <form method="POST">
        <input type="number" name="numero1" placeholder="Numero 1">
        <input type="number" name="numero2" placeholder="Numero 2">
        <input type="submit" value="Sumar">
    </form>
    <?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['numero1']) && isset($_POST['numero2'])) {
    $numero1 = $_POST['numero1'];
    $numero2 = $_POST['numero2'];
    $calculadora = new Calculadora($numero1, $numero2);
    echo "La suma es: " . $calculadora->sumar();
}
?>
    <br>
    <h1>Clase Persona formulario</h1>
    <form method="POST">
        <input type="text" name="nombre" placeholder="Nombre">
        <input type="number" name="edad" placeholder="Edad">
        <input type="submit">
    </form>
    <?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['nombre']) && isset($_POST['edad'])) {
    $nombre = $_POST['nombre'];
    $edad = $_POST['edad'];
    $persona3 = new Persona($nombre, $edad);
    echo $persona3->saludar();
}
?>
    <br>
    <h1>Clase Animal</h1>
    <form method="POST">
        <input type="text" name="nombre" placeholder="Nombre">
        <input type="text" name="tipo" placeholder="Tipo">
        <input type="submit">
    </form>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['nombre']) && isset($_POST['tipo'])) {
        $nombre = $_POST['nombre'];
        $tipo = $_POST['tipo'];
        $animal = new Animal($nombre, $tipo);
        echo $animal->saludar();
    }
    ?>
    <br>
    <h1>Clase Producto</h1>
    <table border="1">
        <tr>
            <th>Nombre del Producto</th>
            <th>Precio</th>
        </tr>
        <tr>
            <td><?php echo $producto1->getNombre() ?></td>
            <td><?php echo $producto1->getPrecio() ?>€</td>
        </tr>
        <tr>
            <td><?php echo $producto2->getNombre() ?></td>
            <td><?php echo $producto2->getPrecio() ?>€</td>
        </tr>
        <tr>
            <td><?php echo $producto3->getNombre() ?></td>
            <td><?php echo $producto3->getPrecio() ?>€</td>
        </tr>
        <tr>
            <td><?php echo $producto4->getNombre() ?></td>
            <td><?php echo $producto4->getPrecio() ?>€</td>
        </tr>
        <tr>
            <td><?php echo $producto5->getNombre() ?></td>
            <td><?php echo $producto5->getPrecio() ?>€</td>
        </tr>
    </table>
</body>
</html>