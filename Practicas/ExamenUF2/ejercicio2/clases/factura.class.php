<?php

session_start();

class factura{
    public int $nombre;
    public $client;
    public $producto;
    public $cantidad;
    public $precio;

    function __construct($client, $producto, $cantidad, $precio){
        $this->client = $client;
        $this->producto = $producto;
        $this->cantidad = $cantidad;
        $this->precio = $precio;
    }

    public function getClient(){
        return $this->client;
    }

    public function getProducto(){
        return $this->producto;
    }

    public function getCantidad(){
        return $this->cantidad;
    }

    public function getPrecio(){
        return $this->precio;
    }

    public function calcularTotal(){
        $total = $this->cantidad * $this->precio;
        return $total;
    }

    public function calcularDescuento($porcentaje){
        $descuento = $this->calcularTotal() * $porcentaje / 100;
        $precioFinal = $this->calcularTotal() - $descuento;
        return $precioFinal;
        
    }

}

?>