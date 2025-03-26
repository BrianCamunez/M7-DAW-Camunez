<?php
require_once "../config.php";

// Verificar si se ha pasado un ID en la URL
if (isset($_GET['id'])) {
    $newsId = $_GET['id'];

    // Obtener los datos de la noticia con el ID correspondiente
    $consultaNews = $conn->query("SELECT * FROM NEWS WHERE id = $newsId");
    $news = $consultaNews->fetch_assoc();
    
    // Si la noticia no existe
    if (!$news) {
        die("Noticia no encontrada.");
    }

} else {
    die("ID de noticia no proporcionado.");
}

// Verificar si se envió el formulario para actualizar la noticia
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener los datos del formulario
    $title = $_POST['title'];
    $subtitle = $_POST['subtitle'];
    $thumbnail = $_POST['thumbnail'];
    $new_date = $_POST['new_date'];
    $description = $_POST['description'];

    // Actualizar los datos de la noticia en la base de datos
    $updateQuery = $conn->prepare("UPDATE NEWS SET title = ?, subtitle = ?, thumbnail = ?, new_date = ?, description = ? WHERE id = ?");
    $updateQuery->bind_param("sssssi", $title, $subtitle, $thumbnail, $new_date, $description, $newsId);
    
    if ($updateQuery->execute()) {
        header("Location: ./panelAdmin.php");
        exit();
    } else {
        echo "Error al actualizar la noticia: " . $conn->error;
    }
    
    $updateQuery->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Noticia</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h2>Editar Noticia</h2>
        <form action="edit_news.php?id=<?php echo $news['id']; ?>" method="POST">
            <div class="mb-3">
                <label for="title" class="form-label">Título:</label>
                <input type="text" class="form-control" id="title" name="title" value="<?php echo htmlspecialchars($news['title']); ?>" required>
            </div>
            <div class="mb-3">
                <label for="subtitle" class="form-label">Subtítulo:</label>
                <input type="text" class="form-control" id="subtitle" name="subtitle" value="<?php echo htmlspecialchars($news['subtitle']); ?>" required>
            </div>
            <div class="mb-3">
                <label for="thumbnail" class="form-label">URL de Miniatura:</label>
                <input type="text" class="form-control" id="thumbnail" name="thumbnail" value="<?php echo htmlspecialchars($news['thumbnail']); ?>" required>
            </div>
            <div class="mb-3">
                <label for="new_date" class="form-label">Fecha:</label>
                <input type="date" class="form-control" id="new_date" name="new_date" value="<?php echo htmlspecialchars($news['new_date']); ?>" required>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Descripción:</label>
                <textarea class="form-control" id="description" name="description" rows="4" required><?php echo htmlspecialchars($news['description']); ?></textarea>
            </div>
            <div class="d-flex justify-content-center">
                <button type="submit" class="btn btn-primary me-2">Guardar Cambios</button>
                <a href="news_list.php" class="btn btn-secondary">Cancelar</a>
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
