<!-- Inicio de la estructura de la pagina -->
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">

	<!-- evitar que se deforme en dispositivos moviles -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

	<!-- aplicando el estilo -->
	<link rel="stylesheet" href="css/estilo.css">
	
	<title>Registra tu Usuario</title>
</head>
<body>
	<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" class="formulario" >

		<!-- Title -->
		<h1 class="titulo">Ingresa Tus Datos</h1>  

		<!-- nombre -->
		<label for="usuario" class="formulario_label">
			Ingresa tu usuario 
			<input type="text" name="usuario" id="usuario" class="formulario_input" placeholder="Usuario">
		</label>

		<!-- contraseña -->
	    <label for="contraseña" class="formulario_label">
	    	Ingresa tu Contraseña
			<input type="password" id="contraseña" name="contraseña" class="formulario_input" placeholder="Contraseña">
		</label>
        
		<!-- Boton -->
		<input type="submit" class="formulario_submit" name="enviar" id="enviar" value="Registrar">

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
        	$name = $_POST['usuario'];
        	$pass = $_POST['contraseña'];


          
               //incluimos la lineas del codigo de envio.php
		      include("envio.php");
		  
        }
        echo "</div>";
		?>

	</form>

</body>
</html>