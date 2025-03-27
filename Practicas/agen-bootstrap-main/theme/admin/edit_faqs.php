<?php
require_once "../config.php";

session_start();

if ($_SESSION['admin'] != true) {
    header("Location: ../index.php");
}

// Verificar si se ha pasado un ID en la URL
if (isset($_GET['id'])) {
    $faqId = $_GET['id'];

    // Obtener los datos de la FAQ con el ID correspondiente
    $consultaFaq = $conn->query("SELECT * FROM FAQS WHERE id = $faqId");
    $faq = $consultaFaq->fetch_assoc();

    // Si la FAQ no existe
    if (!$faq) {
        die("FAQ no encontrada.");
    }

} else {
    die("ID de FAQ no proporcionado.");
}

// Verificar si se envió el formulario para actualizar la FAQ
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener los datos del formulario
    $question = $_POST['question'];
    $answer = $_POST['answer'];
    $date = $_POST['date'];

    // Actualizar los datos de la FAQ en la base de datos
    $updateQuery = $conn->prepare("UPDATE FAQS SET question = ?, answer = ?, date = ? WHERE id = ?");
    $updateQuery->bind_param("sssi", $question, $answer, $date, $faqId);

    if ($updateQuery->execute()) {
        header("Location: ./panelAdmin.php");
        exit();
    } else {
        echo "Error al actualizar la FAQ: " . $conn->error;
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
    <title>Editar FAQ</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h2>Editar FAQ</h2>
        <form action="edit_faqs.php?id=<?php echo $faq['id']; ?>" method="POST">
            <div class="mb-3">
                <label for="question" class="form-label">Pregunta:</label>
                <input type="text" class="form-control" id="question" name="question" value="<?php echo htmlspecialchars($faq['question']); ?>" required>
            </div>
            <div class="mb-3">
                <label for="answer" class="form-label">Respuesta:</label>
                <textarea class="form-control" id="answer" name="answer" rows="4" required><?php echo htmlspecialchars($faq['answer']); ?></textarea>
            </div>
            <div class="mb-3">
                <label for="date" class="form-label">Fecha:</label>
                <input type="date" class="form-control" id="date" name="date" value="<?php echo htmlspecialchars($faq['date']); ?>" required>
            </div>
            <div class="d-flex justify-content-center">
                <button type="submit" class="btn btn-primary me-2">Guardar Cambios</button>
                <a href="./panelAdmin.php" class="btn btn-secondary">Cancelar</a>
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
