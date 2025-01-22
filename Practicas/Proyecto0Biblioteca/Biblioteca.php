<?php

include_once("Llibre.php");

class Biblioteca
{

    public array $llibres = [];

    public function afegirLlibre($llibre){
        array_push($this->llibres, $llibre);
    }

    public function mostrarLlibres(){
        // Verifica si hay libros
        if ($this->llibres) {
            echo '<div class="row">';
        foreach ($this->llibres as $llibre) {
            echo $llibre->card();
        }
        echo '</div>';
        } else {
            echo '<p>No hay libros disponibles.</p>';
        }
    }

    public function cercarLlibre($titol){
        $resultado = [];
        foreach($this->llibres as $llibre){
            if (stripos($llibre->titol, $titol ) !== false) {
                array_push($resultado, $llibre);
            }
        }
        return $resultado;
    }

}

?>