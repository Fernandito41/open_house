<?php

//Si el usario presiona el boton registrar
 if (isset($_POST['enviar']) == true) {

/*Verificamo que los campos no esten vacios*/
if ($name==null && $pass==null) {
    
    //si dejo los campos vacios se le notifica 
	echo "<p >Upps!! Has dejado los campos Vacios Intenta de Nuevo </p> ";

} else {

/*Si no estan vacios pasamos a  evaluar si por lo menos uno esta vacio*/
if (strlen($name)>=1  &&  strlen($pass)>=1 ) {

/*Establecemos una variable para que dentro de ella pondremos las instrucciones   Mysql para insertar los datos*/
$query = "INSERT INTO login VALUES ('$name', '$pass')";

/*Denominamos una variable para que realice la consulta,en este caso
 se insertaran atributos*/
$insertar = mysqli_query($conexion, $query);

/*Evaluamos el valor que devuelve la funcion mysql_query}
 para saber si se agrego con exito*/
if ($insertar == true ) {
    
    //si funcion le mostrara un mensaje de confirmado
	echo "<p >Has registardo un Nuevo usario</p> ";

}else{

	//sino se ha registrado se notificara un error
	echo "<p >Upps!! Ha Ocurrido un error intenta de Nuevo </p>";
}//fin de sino se registran los datos 

} else {
	
	//mensaje si el usuario ha dejado por lo menos un campo vacio
	echo "<p >Upps!! Has dejado Por lo menos un Campo Vacio </p> ";

}//fin los campos contienen mas de un caracter

}//fin de si no los campos esta vacios

 //fin si el usuario uso el boton enviar
}

?> 