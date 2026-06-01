<?php
$server = "localhost";
$user = "root";
$pass = "";
$db = "sistemaf";

$conexion = mysqli_connect($server, $user, $pass, $db);

if (!$conexion) {
    die("Upss!! La conexion ha fallado: " . mysqli_connect_error());
}
?>