<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patrons Estructurals</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Patrons Creacionals</h1>
        <p class="text-center">Els patrons estructurals defineixen com es poden compondre classes i objectes per formar estructures més grans.</p>
        <form method="POST" action="redirigir.php">
            <select name="patro" class="form-select">
                <option value="" selected disabled>Selecciona un patró</option>
                <option value="factoryMethod">Factory Method</option>
                    <option value="abstractFactory">Abstract Factory</option>
                <option value="builder">Builder</option>
                <option value="prototype">Prototype</option>
                <option value="singleton">Singleton</option>
            </select>
            <button type="submit" class="btn btn-primary mt-2">Veure Patró</button>
        </form>
    </div>
</body>
</html>