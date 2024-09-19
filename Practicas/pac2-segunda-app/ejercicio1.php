<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 1</title>
    <style>
        h1{
            padding-top: 100px;
            text-align: center;
        }

        .numeros{
            align-items: center;
            flex-direction: row;
            flex-wrap: wrap;
            display: flex;
            margin-left: 130px;
            margin-right: 130px;
            background-color: #fcedee;
            padding-left: 25px;
        }

        .numero{
            background-color: rgb(220, 220, 220);
            width: 40px;
            height: 25px;
            text-align: center;
            padding: 10px;
            margin: 10px;
            padding-top: 15px;
            border-radius: 3px;
            border: 1px solid black;
        }
    </style>
</head>
<body>
    <h1>Exercici 1: Nombres parells entre 50 i 500</h1>
    <div class="numeros">
        <?php
        $minimo = 50;
        $maximo = 500;
        for($numero=50;$numero<=$maximo;$numero++){
            if($numero%2==0){
                echo "<div class='numero'>{$numero}</div>";
            }
        }
        ?>
    </div>

</body>
</html>