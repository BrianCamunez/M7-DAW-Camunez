<?php

class juegoAdivinar{

    public $numerosecreto;
    public $intentos = 0;

    public function __construct(){
        $this->numerosecreto = rand(1, 20);

        if (isset($_SESSION['juegoAdivinar'])) {
            $juegoAdivinar = unserialize($_SESSION['juegoAdivinar']);
            $this->numerosecreto = $juegoAdivinar->numerosecreto;
            $this->intentos = $juegoAdivinar->intentos;
        }

    }

    public function comprovar($num){

        switch($num){
            case $num < $this->numerosecreto:
                $this->intentos++;
                $_SESSION['juegoAdivinar'] = serialize($this);
                return "El número es más grande";
                break;
            case $num > $this->numerosecreto:
                $this->intentos++;
                $_SESSION['juegoAdivinar'] = serialize($this);
                return "El número es más pequeño";
                break;
            case $num == $this->numerosecreto:
                return "Has acertado!";
                break;

        }
    }
}

$juegoAdivinar = new juegoAdivinar();

$_SESSION['juegoAdivinar'] = serialize($juegoAdivinar);

?>