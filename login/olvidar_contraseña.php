<?php
session_start();
include(__DIR__ . "/conexion_DB/conexion.php");

$error = "";
$mensaje = "";

// Paso 1: Usuario envía su correo para recibir enlace de cambio
if(isset($_POST['enviar'])){
    $correo = mysqli_real_escape_string($conexion, $_POST['correo']);

    $sql = "SELECT * FROM registro WHERE correo='$correo'";
    $resultado = mysqli_query($conexion, $sql);

    if(mysqli_num_rows($resultado) > 0){
        $row = mysqli_fetch_assoc($resultado);
        // Generamos un token temporal
        $token = bin2hex(random_bytes(16));
        // Guardamos token en BD (puedes agregar columna 'token_reset')
        mysqli_query($conexion, "UPDATE registro SET token_reset='$token' WHERE correo='$correo'");
        // Enviar enlace por correo (en pruebas puedes mostrar el link)
        $enlace = "http://localhost/tienda_hood&high/login/restablecer_contraseña.php?token=$token";
        $mensaje = "Para restablecer tu contraseña, visita este enlace: <a href='$enlace'>Restablecer contraseña</a>";
    } else {
        $error = "Correo no encontrado.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Olvidé mi contraseña</title>
<link rel="stylesheet" href="../css/perfil.css">
</head>
<body>
<div class="login-container">
    <h1>Olvidé mi contraseña</h1>
    <?php if(!empty($error)) echo "<p class='error'>$error</p>"; ?>
    <?php if(!empty($mensaje)) echo "<p class='success'>$mensaje</p>"; ?>
    <form action="" method="post">
        <input type="email" name="correo" placeholder="Ingresa tu correo" required>
        <button type="submit" name="enviar">Enviar</button>
    </form>
    <a href="./iniciar sesion.php">Volver a iniciar sesión</a>
</div>
</body>
</html>
