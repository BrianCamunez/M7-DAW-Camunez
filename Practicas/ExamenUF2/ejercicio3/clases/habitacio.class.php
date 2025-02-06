<?php

class habitacio{
    public $tipo;
    public $precio;
    public $disponible;


    public function __construct($tipo, $precio, $disponible){
        $this->tipo = $tipo;
        $this->precio = $precio;
        $this->disponible = $disponible;
    }

    public function mostrarInfo(){
        echo "<br>";
        echo "Tipo: " . $this->tipo . "<br>";
        echo "Precio: " . $this->precio . "<br>";
        if($this->disponible == true){
            echo "Disponible: Si";
        }else{
            echo "Disponible: No";
        }
        echo "<br>";
    }

}

?>