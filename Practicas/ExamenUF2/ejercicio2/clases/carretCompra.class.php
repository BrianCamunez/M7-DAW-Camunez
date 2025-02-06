<?php

session_start();

class carrito{
    
    public $productos = array();
    public $total = 0;

    public function __construct(){
        if (isset($_SESSION['carrito'])) {
            $carrito = unserialize($_SESSION['carrito']);
            $this->productos = $carrito->productos;
            $this->total = $carrito->total;
        }
        echo "Constructor usado";
    }

    public function añadirProducto($producto){
        $this->productos[] = $producto;
        $this->total += $producto->precio;
        $_SESSION['carrito'] = serialize($this);
        echo $producto -> nombre;
        echo $producto -> precio;
        echo "Producto añadido al carrito";
    }

    public function mostrarCarrito(){
        echo "<h2>Carrito de la compra</h2>";
        echo "<ul>";
        foreach ($this->productos as $producto) {
            echo "<li>".$producto->nombre." - ".$producto->precio."€</li>";
    
        }
        echo "</ul>";
        echo "<p>Total: ".$this->total . "€</p>";
    }
}

?>