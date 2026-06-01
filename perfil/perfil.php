<?php
session_start();

// Verificar si el usuario está logueado
if(!isset($_SESSION['usuario'])){
    header("Location: ./login/iniciar sesion.php");
    exit;
}

// Tomar datos de sesión de manera segura
$usuario = $_SESSION['usuario'] ?? 'Usuario';
$correo  = $_SESSION['correo'] ?? 'Correo no disponible';
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Mi Perfil</title>

<!-- CSS externo -->
<link rel="stylesheet" href="../css/perfil.css">

<!-- FontAwesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>

<div class="perfil-wrapper">
    <div class="perfil-card">
        <!-- Foto de perfil -->
        <img src="img/default_user.png" alt="Foto de perfil">

        <!-- Nombre de usuario -->
        <h1><?php echo htmlspecialchars($usuario); ?></h1>

        <!-- Correo -->
        <p><strong>Correo:</strong> <?php echo htmlspecialchars($correo); ?></p>

        <!-- Botones -->
        <div class="btn-group">
            <a href="editar_perfil.php" class="btn"><i class="fa-solid fa-pen"></i> Editar Perfil</a>
            <a href="historial.php" class="btn"><i class="fa-solid fa-clock-rotate-left"></i> Historial</a>
            <a href="cerrar_sesion.php" class="btn"><i class="fa-solid fa-right-from-bracket"></i> Cerrar Sesión</a>
        </div>
    </div>
</div>

</body>
</html>
