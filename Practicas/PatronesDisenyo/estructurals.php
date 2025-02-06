<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patrons Estructurals</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Patrons Estructurals</h1>
        <p class="text-center">Els patrons estructurals defineixen com es poden compondre classes i objectes per formar estructures més grans.</p>
        <form method="POST" action="redirigir.php">
            <select name="patro" class="form-select">
                <option value="" selected disabled>Selecciona un patró</option>
                <option value="adapter">Adapter</option>
                <option value="bridge">Bridge</option>
                <option value="composite">Composite</option>
                <option value="decorator">Decorator</option>
                <option value="facade">Facade</option>
                <option value="flyweight">Flyweight</option>
                <option value="proxy">Proxy</option>
            </select>
            <button type="submit" class="btn btn-primary mt-2">Veure Patró</button>
        </form>
    </div>
</body>
</html>