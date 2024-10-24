<?php

$casas_info = [
    "Gryffindor" => [
        "background_color" => "#740001",
        "text_color" => "#FFD700",
        "welcome_message" => "Coratge, valor i determinació. Benvingut a Gryffindor!",
        "message_background" => "#D3A625",
        "image" => "https://static.wikia.nocookie.net/esharrypotter/images/b/b8/Logo_Gryffindor_2.jpg/revision/latest?cb=20160417160851"
    ],
    "Hufflepuff" => [
        "background_color" => "#FFDB00",
        "text_color" => "#60605B",
        "welcome_message" => "Lleialtat, paciència i treball dur. Benvingut a Hufflepuff!",
        "message_background" => "#EEE117",
        "image" => "https://cdn.shopify.com/s/files/1/1541/8579/files/Hufflepuff-harry_potter_large.JPG?v=1491538917"
    ],
    "Ravenclaw" => [
        "background_color" => "#0E1A40",
        "text_color" => "#946B2D",
        "welcome_message" => "Intel·ligència, creativitat i saviesa. Benvingut a Ravenclaw!",
        "message_background" => "#5D5D5D",
        "image" => "https://static.wikia.nocookie.net/esharrypotter/images/3/36/Logo_Ravenclaw_2.png/revision/latest/scale-to-width-down/250?cb=20160417160853"
    ],
    "Slytherin" => [
        "background_color" => "#1A472A",
        "text_color" => "#AAAAAA",
        "welcome_message" => "Ambició, astúcia i lideratge. Benvingut a Slytherin!",
        "message_background" => "#5D5D5D",
        "image" => "https://static.wikia.nocookie.net/esharrypotter/images/d/d0/Logo_Slytherin_2.png/revision/latest?cb=20160417160853"
    ]
];

$casas = array_keys($casas_info);
$casa_seleccionada = $casas[array_rand($casas)];

if (isset($_POST['Nombre']) && isset($_POST['Apellido'])) {
    $nombre = $_POST['Nombre'];
    $apellido = $_POST['Apellido'];
}

$info_casa = $casas_info[$casa_seleccionada];

?>

<!DOCTYPE html>
<html lang="ca">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Benvingut a la teva casa de Hogwarts</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body style="background-color: <?php echo $info_casa['background_color']; ?>;">
    <div class="container text-center">
        <h1>¡Benvingut a <?php echo  $casa_seleccionada ?></h1>
        <div class="welcome-message mt-4">
            <div class="row">
                <div class="col-12">
                    <?php echo "<h3 style='color: {$info_casa['text_color']}; background-color: {$info_casa['message_background']};'>" . $info_casa["welcome_message"] . " " . $nombre . " " . $apellido . "</h3>"; ?>
                </div>
                <div class="col-12">
                    <img src="<?php echo  $info_casa['image'] ?>" alt="<?php echo  $casa_seleccionada ?>" class="img-fluid mt-4">
                </div>
            </div>
        </div>
    </div>
</body>

</html>