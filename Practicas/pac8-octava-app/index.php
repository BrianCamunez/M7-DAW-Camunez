<?php

session_start();

include_once("main.php");

$_SESSION['current_room'] = 1;

if(isset($_POST['Nombre']) && isset($_POST['Apellido1']) && isset($_POST['Apellido2']) && isset($_POST['Dificultad'])){
    $_SESSION['datos'] = [
        'Nombre' => $_POST['Nombre'],
        'Apellido1' => $_POST['Apellido1'],
        'Apellido2' => $_POST['Apellido2'],
        'Dificultad' => $_POST['Dificultad']
    ];
    header('Location: room1.php');
}

?>


<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario</title>
    <style>
      .fondo {
        background-color: rgb(240, 240, 240);
        padding: 20px;
      }
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    <div class="container mt-5 fondo">
      <div class="row">
        <h1 class="text-center">Formulario</h1>
      </div>
      <div class="row">
        <form method="post">
          <div class="mb-3 mt-3">
            <label for="exampleInputNombre1" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="exampleInputNombre1" name="Nombre" required>
          </div>
          <div class="mb-3">
            <label for="exampleInputApellido1" class="form-label">Primer apellido</label>
            <input type="text" class="form-control" id="exampleInputApellido1" name="Apellido1" required>
          </div>
          <div class="mb-3">
            <label for="exampleInputApellido2" class="form-label">Segundo apellido</label>
            <input type="text" class="form-control" id="exampleInputApellido2" name="Apellido2" required>
          </div>
          <div class="mb-3">
            <select class="form-select" aria-label="Seleccione la dificultad" id="dificultad" name="Dificultad" required>
                <option value="" selected disabled hidden>Seleccione la dificultad</option>
                <?php 
                    $niveles = array_keys($adivinanzas); 
                    for ($i = 0; $i < count($niveles); $i++) {
                        $nivel = $niveles[$i];
                        echo '<option value="' . $nivel . '">' . ucfirst($nivel) . '</option>';
                    }
                ?>
            </select>
          </div>
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>
