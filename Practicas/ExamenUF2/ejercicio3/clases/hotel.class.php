<?php

session_start();

require_once 'clases/habitacio.class.php';

class hotel{
    public $habitaciones = array();


    public function mostrarHabitacionesDisponibles(){
        foreach($this->habitaciones as $habitacion){
            if($habitacion->disponible == true){
                $habitacion->mostrarInfo();
            }
        }
    }

    public function reservarHabitacion($tipo){
        foreach($this->habitaciones as $habitacion){
            if($habitacion->tipo == $tipo && $habitacion->disponible == true){
                $habitacion->disponible = false;
                echo "Habitacion reservada";
            }
        }
    }

    public function mostrarDisponibilidad(){
        foreach($this->habitaciones as $habitacion){
                echo $habitacion->mostrarInfo();
            }
    }

}

?>