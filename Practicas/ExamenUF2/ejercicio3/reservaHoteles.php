<?php

require_once 'clases/hotel.class.php';
require_once 'clases/habitacio.class.php';

$hotel = new hotel();

$habitacion1 = new habitacio('individual', 50, true);
$habitacion2 = new habitacio('doble', 100, true);
$habitacion3 = new habitacio('apartamento', 150, true);
$habitacion4 = new habitacio('suite', 200, true);
$habitacion5 = new habitacio('individual', 50, true);
$habitacion6 = new habitacio('doble', 100, true);
$habitacion7 = new habitacio('apartamento', 150, true);
$habitacion8 = new habitacio('suite', 200, true);

$hotel->habitaciones[] = $habitacion1;
$hotel->habitaciones[] = $habitacion2;
$hotel->habitaciones[] = $habitacion3;
$hotel->habitaciones[] = $habitacion4;
$hotel->habitaciones[] = $habitacion5;
$hotel->habitaciones[] = $habitacion6;
$hotel->habitaciones[] = $habitacion7;
$hotel->habitaciones[] = $habitacion8;

if(isset($_POST['tipoHabitacion'])){
    $hotel->reservarHabitacion($_POST['tipoHabitacion']);
    $hotel->mostrarDisponibilidad();
}



?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservar habitacion</title>
</head>
<body>
    <h2>Sistema reserva d’hotels</h2>
    <form method="POST" action="">
            <select name="tipoHabitacion" class="form-select">
                <option value="" selected disabled>Selecciona un habitacion</option>
                <option value="individual">Individual</option>
                <option value="doble">Doble</option>
                <option value="apartamento">Apartamento</option>
                <option value="suite">Suite</option>
            </select>
            <button type="submit" class="btn btn-primary mt-2">Ver habitaciones</button>
        </form>
</body>
</html>