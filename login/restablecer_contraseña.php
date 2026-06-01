<?php
session_start();
include(__DIR__ . "/conexion_DB/conexion.php");

$error = "";
$mensaje = "";

if(!isset($_GET['token'])){
    die("Token no válido.");
}

$token = mysqli_real_escape_string($conexion, $_GET['token']);
$sql = "SELECT * FROM registro WHERE token_reset='$token'";
$resultado = mysqli_query($conexion, $sql);

if(mysqli_num_rows($resultado) == 0){
    die("Token no válido o expirado.");
}

if(isset($_POST['restablecer'])){
    $password = $_POST['password'];
    $password2 = $_POST['password2'];

    if($password !== $password2){
        $error = "Las contraseñas no coinciden.";
    } else {
        // Actualizar contraseña y limpiar token
        $sqlActualizar = "UPDATE registro SET password='$password', token_reset=NULL WHERE token_reset='$token'";
        if(mysqli_query($conexion, $sqlActualizar)){
            $mensaje = "Contraseña restablecida correctamente!";
        } else {
            $error = "Error al actualizar la contraseña.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Restablecer Contraseña</title>
<link rel="stylesheet" href="../css/perfil.css">
</head>
<body>
<div class="login-container">
    <h1>Restablecer Contraseña</h1>
    <?php if(!empty($error)) echo "<p class='error'>$error</p>"; ?>
    <?php if(!empty($mensaje)) echo "<p class='success'>$mensaje</p>"; ?>

    <form action="" method="post">
        <input type="password" name="password" placeholder="Nueva contraseña" required>
        <input type="password" name="password2" placeholder="Confirmar nueva contraseña" required>
        <button type="submit" name="restablecer">Restablecer contraseña</button>
    </form>

    <a href="iniciar_sesion.php">Volver a iniciar sesión</a>
</div>
</body>
</html>
