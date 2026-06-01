<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar sesion</title> 
    <link rel="stylesheet" href="../css/sesion.css">
</head>
<body id="login">
	<form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
		<h1>INICIAR SESION</h1>
		<fieldset id="logindatos">

			<input type="image" src="../img/user.png" class="img">

			<input type="text" id="nombre" value="" pattern="^[a-z-Z\s]+$" title="Solo se aceptan letras" class="control" placeholder="Usuario/Correo electronico" required/><br>
            <!--Insetar nombre-->
			<input type="image" src="../img/pass.png" class="img">

			<input type="password" id="password" value="" pattern="((?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,15})" title=" su contraseña debe tener ser de 6 a 15 caracteres y debe de incluir una letra mayuscula, minuscula y un numero" class="control" placeholder="Contraseña" required/><br>
			<!--Ingresar contraseña-->
			<input type="checkbox" checked name="acepto" class="terminos">
			<!--Acepto los terminos-->
			<p class="terminos">Acepto terminos, condiciones y politicas de provacidad</p>
			<!--Acepto los terminos de condiciones y politicas deprivacidad-->

	        <p class="terminos">Olvide mi contraseña</p> <!--Recuperar contraseña-->
            <button id="boton" type="submit" value="CrearCuenta">Iniciar sesion
				<!--Boton de iniciar sesion-->
			</button>
            </fieldset>
	<!-- Incluimos la conexió en la base de datos -->
        <?php

        // lo hacemos dentro de un contenedor para aplicar estilo
        echo "<div class='title_conexion'>"; 

	 	// <!-- Incluimos la conexió en la base de datos -->
        include("conexion_DB/conexion.php");

        echo "</div>";
        
        ?> 
		<?php

          echo "<div class='result'>";
          /*Si el usuario presiona le boton 'enviar'*/
        if (isset($_POST['enviar']) == true) {

        	// recojemos los datos dentro de las variables
        	$name = $_POST['usuario/Correo electronico'];
        	$pass = $_POST['contraseña'];


          
               //incluimos la lineas del codigo de envio.php
		      include("envio.php");
		  
        }
        echo "</div>";
		?>

	</form>


</body>
</html>