<?php

include_once "./carta.class.php";

class Baraja
{

    public array $conjunto_cartas = [];

    public function crea_baraja(){
            $colores = ['red', 'yellow', 'blue', 'green'];
            $index = 0;
    
            foreach ($colores as $color) {
                for ($i = 1; $i <= 9; $i++) {
                    $this->conjunto_cartas[] = new Carta($color, $i, $index++);
                }
            }

            //cartas especiales
            for ($j = 0; $j < 2; $j++) {
                $this->conjunto_cartas[] = new Carta($color, 'reverse', $index++);
                $this->conjunto_cartas[] = new Carta($color, 'skip', $index++);
                $this->conjunto_cartas[] = new Carta($color, 'picker', $index++);
            }
    }

    public function mostrar_baraja()
    {
        foreach ($this->conjunto_cartas as $carta) {
            echo "Índice: {$carta->index} | Palo: {$carta->palo} | Valor: {$carta->valor}<br>";
            echo $carta->pinta_carta_link();
            echo "<br>";
        }
    }

        public function mezcla(){
            // Mezclar las cartas
            shuffle($this->conjunto_cartas);
        }

        public function pinta_baraja_girada(){
            foreach ($this->conjunto_cartas as $carta) {
                echo "Índice: {$carta->index} | Palo: {$carta->palo} | Valor: {$carta->valor}<br>";
                echo $carta->pinta_carta_girada();
                echo "<br>";
            }
        }

}

?>