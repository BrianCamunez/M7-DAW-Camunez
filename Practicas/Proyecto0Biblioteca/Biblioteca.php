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
            echo '
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="' . $llibre->foto . '" class="card-img-top" alt="Portada de ' . $llibre->titol . '" style="height: 300px; object-fit: cover;">
                        <div class="card-body">
                            <h5 class="card-title">' . $llibre->titol . '</h5>
                            <p class="card-text">Autor: ' . $llibre->autor . '</p>
                            <p class="card-text">Publicado en: ' . $llibre->anyPublicacio . '</p>
                        </div>
                    </div>
                </div>';
        }
        echo '</div>';
        } else {
            echo '<p>No hay libros disponibles.</p>';
        }
    }

    public function cercarLlibre($titol){
        foreach($this->llibres as $llibre){
            if($llibre->titol == $titol){
                return [
                    'titol' => $llibre->titol,
                    'autor' => $llibre->autor,
                    'anyPublicacio' => $llibre->anyPublicacio,
                    'foto' => $llibre->foto
                ];
            }
        }
        return null;
    }

}

?>