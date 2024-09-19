<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio Extra 1</title>
    <style>

        html{
            background-color: #dedede;
        }

        body{
            font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
        }

        h1{
            text-align: center;
            margin-top: 100px;
        }

        .ejercicio{
            margin: 20px auto;
            background-color: #fbc2b5;
            border: 1px solid black;
            border-radius: 10px;
            width: 500px;
            text-align: center !important;
            padding: 50px;
            display: flex;
            flex-wrap: wrap;
        }

        .numeroRand{
            width: 100%;
            margin-bottom: 20px;
            font-size: 20px;
        }

        .divisor{
            margin: 5px;
            border: 1px solid black;
            border-radius: 2px;
            margin-bottom: 20px;
            padding: 5px;
            background-color: #b5f4fb;

        }

        .textoPrimo{
            width: 100%;
            font-size: 20px;
        }

    </style>
</head>
<body>
    <h1>Exercici extra 1: Divisors d'un nombre i verificació de nombre primer</h1>
    <div class="ejercicio">
        <?php
            $primo = true;
            $numeroAleatorio = rand(1, 100);
            echo "<div class='numeroRand'>El numero aleatorio es {$numeroAleatorio}\n</div>";

                echo "<div class='divisor'>1</div>";
                for($contador=2;$contador<$numeroAleatorio;$contador++){
                    if($numeroAleatorio%$contador==0){
                        echo "<div class='divisor'>{$contador}</div>";
                        $primo=false;
                    }
                }
                echo "<div class='divisor'>{$numeroAleatorio}</div>";
            
            if($primo==true){
                echo "<div class='textoPrimo'>{$numeroAleatorio} es un numero primo</div>";
            }else{
                echo "<div class='textoPrimo'>{$numeroAleatorio} no es un numero primo</div>";
            }
        ?>
    </div>
</body>
</html>