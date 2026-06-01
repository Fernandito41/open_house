<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="../css/email.css">
</head>
<body id="login">
	<form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
		<h1>Contactanos</h1>
		<fieldset id="logindatos">
            
			<input type="text" name="nombre" value="" pattern="^[a-z-Z\s]+$" title="Solo se aceptan letras" class="control" placeholder="Nombre" required/><br>
			<!--ingresar nombre del usario-->
            <input type="text" name="apellido" value="" pattern="^[a-z-Z\s]+$" title="Solo se aceptan letras" class="control" placeholder="Apellido" required/><br>
			<!--Ingresar apellidos-->
			<input type="tel" name="telefono" value="" pattern="^[0-9/]{4}-?[0-9]{4}+$" title="Solo se acepta formato: 2222-2222" class="control" placeholder="Numero de telefono" required/><br>
			<!--Ingresar numero de telefono-->
			<input type="correo" name="email" value="" pattern="^[0-9/]{4}-?[0-9]{4}+$" title="NombreCorreo" class="control" placeholder="E-mail" required/><br>
			<!--Ingresar nombre de correo-->
            <input type="text" name="asunto" value="" pattern="^[a-z-Z\s]+$" title="Solo se aceptan letras" class="control" placeholder="Asunto" required/><br>
			<!--Enviar el ausunto del usario-->
			<input type="checkbox" checked name="acepto" class="terminos">
			<!--Aceptar todo-->
			<p class="terminos">Acepto terminos, condiciones y politicas de provacidad</p>
			<!--Acept terminos,condiciones y politicas de privacidad-->

			<button id="boton" type="submit" name="CrearCuenta">Enviar e-mail
				<!--Crear cuenta-->
			</button>
		</fieldset>
		<!-- Incluimos la conexió en la base de datos -->
		<?php
		// lo hacemos dentro de un contenedor para aplicar estilo
		echo "<div class='title_conexion'>"; 

	 	// <!-- Incluimos la conexió en la base de datos -->
		include("conexion_DB/conexion.php");

		echo "</div>"; // cerramos el contenedor>";

		if (isset($_POST['CrearCuenta'])) {

			if (empty($_POST['nombre']) || empty($_POST['apellido']) || empty($_POST['telefono']) || empty($_POST['email']) || empty($_POST['asunto'])) {
				echo " Por favor ingrese todos los datos.";
			} else {
				$nombre = mysqli_real_escape_string($conexion, $_POST['nombre']);
				$apellido = mysqli_real_escape_string($conexion, $_POST['apellido']);
				$telefono = mysqli_real_escape_string($conexion, $_POST['telefono']);
				$email = mysqli_real_escape_string($conexion, $_POST['email']);
				$asunto = mysqli_real_escape_string($conexion, $_POST['asunto']);

				$sql = "INSERT INTO consultas (nombre, apellido, telefono, email, asunto) VALUES ('$nombre', '$apellido', '$telefono', '$email', '$asunto')";
				$resultado = mysqli_query($conexion, $sql);

				if ($resultado) {
					echo " E-mail enviado correctamente.";
				} else {
					echo " Error al enviar el e-mail.";
				}
			}
		}
		echo "</div>";
		?>

	</form>
	
</body>
</html>