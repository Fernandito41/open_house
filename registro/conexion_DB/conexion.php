<?php
/*Declaramos las variables que contendran los
 atributos de la base de datos*/
$server="localhost";
$user="root";
$pass="";
$db="sistemaf";
// Creamos la conexion por medio de una variable
$conexion = mysqli_connect($server, $user, $pass, $db);
// verificamos si la conexion fue existosa
if (!$conexion) {//si la conexion fallo
	  /*mostraremos al usuario los errores*/
      die("Upss!! La conexion ha fallado: " . mysqli_connect_error());
} else {//si no hubiese un error le notificamos que la conexion fue existosa
      
}
 ?>