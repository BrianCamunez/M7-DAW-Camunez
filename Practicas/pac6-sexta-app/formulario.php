<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col">
                <h1>Formulario de Apuestas</h1>
                <form>
                    <div class="mb-3">
                        <label for="TipoDeApuesta" class="form-label">Tipo de Apuesta</label>
                        <select class="form-select" aria-label="Default select example" id="TipoDeApuesta">
                            <option selected>Elige la apuesta</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="AQueApuestas" class="form-label">¿A que apuestas?</label>
                        <input type="text" class="form-control" id="AQueApuestas">
                    </div>
                    <div class="mb-3">
                        <label for="CantidadDinero" class="form-label">Cantidad de dinero (€)</label>
                        <input type="number" class="form-control" id="CantidadDinero">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
                <table class="table table-bordered">
                    ...
                </table>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>