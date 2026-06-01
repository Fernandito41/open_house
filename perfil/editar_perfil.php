<?php
session_start();


include(__DIR__ . "/../registro/conexion_DB/conexion.php");


if(!$conexion){
    die("La conexión a la base de datos no se pudo establecer.");
}


if(!isset($_SESSION['usuario'])){
    header("Location: ../login/iniciar_sesion.php");
    exit;
}


$usuario = $_SESSION['usuario'];
$sql = "SELECT * FROM registro WHERE usuario='$usuario'";
$resultado = mysqli_query($conexion, $sql);
if(!$resultado){
    die("Error al obtener datos del usuario: " . mysqli_error($conexion));
}
$usuarioData = mysqli_fetch_assoc($resultado);


$error = "";
$mensaje = "";


if(isset($_POST['actualizar'])){
    $nombre = mysqli_real_escape_string($conexion, $_POST['nombre']);
    $correo = mysqli_real_escape_string($conexion, $_POST['correo']);
    $password = $_POST['password'];
    $password2 = $_POST['password2'];

    if($password !== $password2){
        $error = "Las contraseñas no coinciden.";
    } else {
        if(!empty($password)){
            $sqlActualizar = "UPDATE registro SET nombre='$nombre', correo='$correo', password='$password' WHERE usuario='$usuario'";
        } else {
            $sqlActualizar = "UPDATE registro SET nombre='$nombre', correo='$correo' WHERE usuario='$usuario'";
        }

        if(mysqli_query($conexion, $sqlActualizar)){
            $mensaje = "Perfil actualizado correctamente!";
            // Recargar datos actualizados
            $resultado = mysqli_query($conexion, $sql);
            $usuarioData = mysqli_fetch_assoc($resultado);
        } else {
            $error = "Error al actualizar: " . mysqli_error($conexion);
        }
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Editar Perfil</title>
<link rel="stylesheet" href="../css/perfil.css">
</head>
<body>

<div class="perfil-wrapper">
    <div class="perfil-card">
        <h1>Editar Perfil</h1>

        <?php if(!empty($error)) echo "<p class='error'>$error</p>"; ?>
        <?php if(!empty($mensaje)) echo "<p class='success'>$mensaje</p>"; ?>

        <form action="" method="post">
            <input type="text" name="nombre" placeholder="Nombre" value="<?php echo $usuarioData['nombre']; ?>" required><br><br>
            <input type="email" name="correo" placeholder="Correo" value="<?php echo $usuarioData['correo']; ?>" required><br><br>
            <input type="password" name="password" placeholder="Nueva contraseña"><br><br>
            <input type="password" name="password2" placeholder="Confirmar nueva contraseña"><br><br>
            <button type="submit" name="actualizar" class="btn">Actualizar Perfil</button>
        </form>

        <a href="perfil.php" class="btn volver">Volver a Perfil</a>
    </div>
</div>

</body>
</html>
