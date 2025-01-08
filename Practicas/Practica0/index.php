<?php

class Llibre
{
    public string $titol = "Titulo por defecto";
    public string $autor = "Autor por defecto";
    public int $contador;

    public function descripcio() : string
    {
        return "Descripcion del libro " . $this->titol . " del autor " . $this->autor;
    }

    public function getAutor() : string
    {
        return $this->autor;
    }

    public function __construct($titol, $autor)
    {
        $this->titol = $titol;
        $this->autor = $autor;
    }

}

$libro = new Llibre("El señor de los anillos", "J.R.R. Tolkien");

class Persona
{
    public string $nom = "Brian";
    public int $edad = 19;
}

$persona = new Persona();

class Producte
{
    public string $nom;
    public int $preu = 10;

    public function __construct($nom, $preu) {
        $this->nom = $nom;
        $this->preu = $preu;
    }

    public function mostrarPreu(){
        echo "El preu del producte es: ". $this->preu;
    }

}

$producto = new Producte("avion", 100);
$producto1 = new Producte("Camiseta", 20);
$producto2 = new Producte("Pantalón", 30);
$producto3 = new Producte("Zapatos", 50);
$producto4 = new Producte("Gorra", 15);
$producto5 = new Producte("Diente", 5);

class Calculadora
{
    public int $numero1 = 20;
    public int $numero2 = 10;

    public function sumar() : int
    {
        return $this->numero1 + $this->numero2;
    }

    public function restar() : int
    {
        return $this->numero1 - $this->numero2;
    }

    public function multiplicar() : int
    {
        return $this->numero1 * $this->numero2;
    }

    public function dividir() : float
    {
        return $this->numero1 / $this->numero2;
    }
}

$calculadora = new Calculadora();

class Animal {
    public string $nombre;
    public string $tipo;

    public function __construct($nombre, $tipo) {
        $this->nombre = $nombre;
        $this->tipo = $tipo;
    }

    public function describir() {
        return "Este es un " . $this->tipo . " llamado " . $this->nombre . ".";
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $tipo = $_POST['tipo'];

    $animal = new Animal($nombre, $tipo);

    echo "<h2>Descripción del animal:</h2>";
    echo "<p>" . $animal->describir() . "</p>";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Practica 0</title>
    <style>
        table {
            width: 50%;
            border-collapse: collapse;
        }
        th, td {
            padding: 10px;
            text-align: center;
            border: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>Practica 0</h1>
    <br>
    <h1>Clase libro</h1>
    <h2><?php echo $libro->descripcio() ?></h2>
    <br>
    <h1>Clase persona</h1>
    <h2>Me llamo <?php echo $persona->nom ?></h2>
    <h2>Tengo <?php echo $persona->edad?> años</h2>
    <br>
    <h1>Clase producto</h1>
    <h2><?php echo $producto->mostrarPreu() ?></h2>
    <br>
    <h1>Clase calculadora</h1>
    <h2>Numero1 = 20, Numero2 = 10</h2>
    <h2>Suma : <?php echo $calculadora->sumar() ?></h2>
    <h2>Resta : <?php echo $calculadora->restar()?></h2>
    <h2>Multiplicación : <?php echo $calculadora->multiplicar()?></h2>
    <h2>División : <?php echo $calculadora->dividir()?></h2>
    <br>
    <h1>Tabla de objetos Producto</h1>
    <table>
        <tr>
            <th>Nombre del producto</th>
            <th>Precio</th>
        </tr>
        <tr>
            <td><?php echo $producto1->nom ?></td>
            <td><?php echo $producto1->mostrarPreu() ?></td>
        </tr>
        <tr>
            <td><?php echo $producto2->nom ?></td>
            <td><?php echo $producto2->mostrarPreu() ?></td>
        </tr>
        <tr>
            <td><?php echo $producto3->nom ?></td>
            <td><?php echo $producto3->mostrarPreu() ?></td>
        </tr>
        <tr>
            <td><?php echo $producto4->nom ?></td>
            <td><?php echo $producto4->mostrarPreu() ?></td>
        </tr>
        <tr>
            <td><?php echo $producto5->nom ?></td>
            <td><?php echo $producto5->mostrarPreu() ?></td>
        </tr>
    </table>
    <br>
    <h1>Clase animal</h1>
    <form method="POST">
        <label for="nombre">Nombre del animal:</label>
        <input type="text" id="nombre" name="nombre" required>
        <br>
        <label for="tipo">Tipo de animal:</label>
        <input type="text" id="tipo" name="tipo" required>
        <br>
        <input type="submit" value="Crear Animal">
    </form>

</body>
</html>