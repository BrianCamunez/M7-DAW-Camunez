<?php

class Carta
{

    public $palo;
    public $valor;
    public $index;

    public function pinta_carta(){
        return '<img src=./cartas_uno/' . $this->valor . "_" . $this->palo . ".png" . ' alt="Carta">';

    }
    
    public function pinta_carta_link($indice_carta) {
        // Cambiamos el enlace por un formulario que envía el índice de la carta
        return '<form method="POST" style="display:inline;">
                    <input type="hidden" name="accion" value="tirar">
                    <input type="hidden" name="indice_carta" value="' . $indice_carta . '">
                    <button type="submit" style="background:none;border:none;padding:0;">
                        ' . $this->pinta_carta() . '
                    </button>
                </form>';
    }

    public function pinta_carta_girada(){
        return '<img src=./cartas_uno/carta_girada.png alt="Carta">';
    }

    public function __construct($palo, $valor, $index){
        $this->palo = $palo;
        $this->valor = $valor;
        $this->index = $index;
    }

}



?>