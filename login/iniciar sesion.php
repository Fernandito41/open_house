<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

include(__DIR__ . '/conexion_DB/conexion.php'); // Conexión segura

$error = '';

if (isset($_POST['login'])) {
    if (empty($_POST['usuario']) || empty($_POST['password'])) {
        $error = "Por favor ingresa tu usuario y contraseña.";
    } else {
        $usuario = mysqli_real_escape_string($conexion, $_POST['usuario']);
        $password = $_POST['password'];

        $sql = "SELECT * FROM registro WHERE usuario='$usuario' OR correo='$usuario'";
        $resultado = mysqli_query($conexion, $sql);

        if ($resultado && mysqli_num_rows($resultado) > 0) {
            $row = mysqli_fetch_assoc($resultado);
            if ($password === $row['password']) { 
                session_unset();
                $_SESSION['id_registro'] = $row['id_registro'];  
                $_SESSION['usuario'] = $row['usuario'];         
                $_SESSION['correo'] = $row['correo'];      
                header("Location: ../base.php");
                exit;
            } else {
                $error = "Contraseña incorrecta.";
            }
        } else {
            $error = "Usuario o correo no encontrado.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Iniciar Sesión - Hood&High</title>
<link rel="stylesheet" href="./css/sesion.css">
</head>
<body>
<div class="login-wrapper">
    <div class="login-card">
        <h1>Bienvenido de nuevo</h1>
        <p class="subtitle">Ingresa con tu cuenta para continuar</p>

        <?php if (!empty($error)): ?>
            <div class="error-message"><?php echo $error; ?></div>
        <?php endif; ?>

        <form method="post" action="">
            <div class="input-group">
                <input type="text" name="usuario" required value="<?php echo isset($_POST['usuario']) ? htmlspecialchars($_POST['usuario']) : ''; ?>">
                <label>Correo o usuario</label>
            </div>

            <div class="input-group">
                <input type="password" name="password" required>
                <label>Contraseña</label>
            </div>

            <button type="submit" name="login" class="btn">Iniciar sesión</button>

            <div class="links">
                <a href="./olvidar_contraseña.php">¿Olvidaste tu contraseña?</a>
            </div>

            <div class="divider"><span>o continúa con</span></div>

            <a href="./google_login.php" class="btn-google">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" width="22px" height="22px">
                    <path fill="#EA4335" d="M24 9.5c3.5 0 6.6 1.2 9.1 3.6l6.7-6.7C35.8 2.4 30.3 0 24 0 14.6 0 6.4 5.4 2.5 13.3l7.9 6.1C12.1 13.4 17.5 9.5 24 9.5z"/>
                    <path fill="#34A853" d="M46.1 24.6c0-1.6-.1-3.2-.4-4.6H24v9h12.5c-.5 2.9-2.1 5.4-4.5 7.1l7.2 5.6C43.9 37.7 46.1 31.6 46.1 24.6z"/>
                    <path fill="#FBBC05" d="M10.4 28.5c-.8-2.4-1.2-5-.1-7.5l-7.9-6.1C.9 18.5 0 21.2 0 24c0 2.8.9 5.5 2.4 8l8-6.1z"/>
                    <path fill="#4285F4" d="M24 48c6.5 0 12-2.1 16-5.8l-7.2-5.6c-2 1.4-4.6 2.2-8.8 2.2-6.5 0-11.9-3.9-14-9.5l-8 6.1C6.4 42.6 14.6 48 24 48z"/>
                </svg>
                <span>Continuar con Google</span>
            </a>

            <p class="register-text">
                ¿No tienes una cuenta? <a href="../registro/registrarse.php">Regístrate</a>
            </p>
        </form>
    </div>
</div>
</body>
</html>

