<?php

class Carta
{

    public $palo;
    public $valor;
    public $index;

    public function pinta_carta(){
        $nombreFoto = $this->valor . "_" . $this->palo . ".png";
        return $nombreFoto;
        var_dump($nombreFoto);

    }
    
     public function pinta_carta_link(){
        return '<a href="#"><img src=./cartas_uno/' . $this->pinta_carta(). '></img></a>';
     }

    public function pinta_carta_girada(){
        return '<img src="./cartas_uno/carta_girada.png" alt="Carta girada" />';
    }

    public function __construct($palo, $valor, $index){
        $this->palo = $palo;
        $this->valor = $valor;
        $this->index = $index;
    }

}



?>