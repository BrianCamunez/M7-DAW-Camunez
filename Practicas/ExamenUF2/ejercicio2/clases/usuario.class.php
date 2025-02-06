<?php

session_start();

class usuario{
    public $nombre;
    public $edad;
    public $email;


    public function __construct($nombre, $edad, $email){
        $this->nombre = $nombre;
        $this->edad = $edad;
        $this->email = $email;
    }

    public function validarDatos(){
        $validar = 0;
        if(is_numeric($this->edad)){
            $validar++;
        }

        if(filter_var($this->email, FILTER_VALIDATE_EMAIL)){
             $validar++;
        }

        if($validar == 2){
            return true;
        }else{
            return false;
        }
    }

}

?>