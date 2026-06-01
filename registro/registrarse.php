<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrarse</title>
    <link rel="stylesheet" href="../css/sesion.css">
</head>
<body id="login">
    <form action="#" method="post">
        <h1>Registrarse</h1>
        <fieldset id="logindatos">

            <input type="text" id="nombre" name="nombre" pattern="^[a-zA-Z\s]+$" title="Solo se aceptan letras" class="control" placeholder="Nombre" required/><br>

            <input type="text" id="usuario" name="usuario" class="control" placeholder="Usuario" required/><br>

            <input type="tel" id="tel" name="tel" pattern="^[0-9]{4}-?[0-9]{4}$" title="Solo se acepta formato: 2222-2222" class="control" placeholder="Número de teléfono" required/><br>

            <input type="email" id="correo" name="correo" class="control" placeholder="Correo electrónico" required/><br>

            <input type="password" id="password" name="password" class="control" placeholder="Contraseña" required/><br>

            <input type="password" id="password2" name="password2" class="control" placeholder="Confirmar contraseña" required/><br>

            <input type="checkbox" checked name="acepto" class="terminos">
            <p class="terminos">Acepto términos, condiciones y políticas de privacidad</p>

            <button id="boton" type="submit" name="crear" value="CrearCuenta">Crear Cuenta</button>
        </fieldset>

        <?php
        include("./conexion_DB/conexion.php");

        echo "<div class='result'>";

        if (isset($_POST['crear'])) {
            $nombre = mysqli_real_escape_string($conexion, $_POST['nombre']);
            $usuario = mysqli_real_escape_string($conexion, $_POST['usuario']);
            $tel = mysqli_real_escape_string($conexion, $_POST['tel']);
            $correo = mysqli_real_escape_string($conexion, $_POST['correo']);
            $password = $_POST['password'];
            $password2 = $_POST['password2'];

            if ($password !== $password2) {
                echo "Las contraseñas no coinciden.";
            } else {
                $check = mysqli_query($conexion, "SELECT * FROM registro WHERE correo='$correo' OR usuario='$usuario'");
                if (mysqli_num_rows($check) > 0) {
                    echo " El usuario o correo ya está registrado.";
                } else {
                    $password_hash = $password;
                    header("Location: ../login/iniciar sesion.php");
                    $sql = "INSERT INTO registro (nombre, usuario, telefono, correo, password) 
                            VALUES ('$nombre', '$usuario', '$tel', '$correo', '$password_hash')";
                    if (mysqli_query($conexion, $sql)) {
                        echo " Registro exitoso!";
                    } else {
                        echo " Error al registrar: " . mysqli_error($conexion);
                    }
                }
            }
        }

        echo "</div>";
        ?>
    </form>
</body>
</html>
