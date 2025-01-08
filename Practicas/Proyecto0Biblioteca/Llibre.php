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

    public function informacion(){
        return "El llibre ". $this->titol. " escrit per ". $this->autor. " i publicat en ". $this->anyPublicacio;
    }

}

?>