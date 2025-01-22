<?php

class Llibre
{
    public string $titol;
    public string $autor;
    public int $anyPublicacio;
    public string $foto;

    public function __construct($titol, $autor, $anyPublicacio, $foto)
    {
        $this->titol = $titol;
        $this->autor = $autor;
        $this->anyPublicacio = $anyPublicacio;
        $this->foto = $foto;
    }

    public function card() {
        return '
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="' . $this->foto . '" class="card-img-top" alt="Portada de ' . $this->titol . '" style="height: 300px; object-fit: cover;">
                    <div class="card-body">
                        <h5 class="card-title">' . $this->titol . '</h5>
                        <p class="card-text">Autor: ' . $this->autor . '</p>
                        <p class="card-text">Publicado en: ' . $this->anyPublicacio . '</p>
                    </div>
                </div>
            </div>';
    }

}

?>