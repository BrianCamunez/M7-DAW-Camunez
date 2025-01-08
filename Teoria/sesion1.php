<?php

class Saiyayin
{
    public string $nombre = "Goku";
    public int $nivel_pelea = 1000;

    public function Saludar() : string
    {
        return "Hola, mi nombre es " . $this->nombre;
    }

    public function NivelDePelea()
    {
        return $this->nombre . " tiene un nivel de pelea de " . $this->nombre;
    }

}

$objetoGoku = new Saiyayin();

$objetoBroly = new Saiyayin();

var_dump($objetoGoku);

echo "<br>";

var_dump($objetoBroly);

echo "<br>" . $objetoGoku->Saludar();

echo "<br>" . $objetoGoku->NivelDePelea();

echo "<br>" . $objetoGoku->nombre;

?>