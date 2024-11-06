<?php
session_start();

include_once("main.php");
// Verificamos si la sesión del usuario existe
if (isset($_SESSION['datos'])) {
    $nombre = $_SESSION['datos']['Nombre'];
    $apellido1 = $_SESSION['datos']['Apellido1'];
    $apellido2 = $_SESSION['datos']['Apellido2'];
    $dificultad = $_SESSION['datos']['Dificultad'];
    $foto_perfil = isset($_SESSION['datos']['FotoPerfil']) ? $_SESSION['datos']['FotoPerfil'] : 'https://png.pngtree.com/png-vector/20220709/ourmid/pngtree-businessman-user-avatar-wearing-suit-with-red-tie-png-image_5809521.png'; // Imagen por defecto
}
?>

<header class="bg-light p-3 mb-4">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center">
            <!-- Imagen de perfil -->
            <img src="<?= $foto_perfil; ?>" alt="Foto de perfil" class="rounded-circle" style="width: 50px; height: 50px; object-fit: cover;">
            
            <!-- Información del usuario -->
            <div class="ms-3">
                <h5 class="mb-0"><?= $nombre . ' ' . $apellido1 . ' ' . $apellido2; ?></h5>
                <p class="mb-0">Nivel: <?= ucfirst($dificultad); ?></p>
            </div>
        </div>
    </div>
</header>
