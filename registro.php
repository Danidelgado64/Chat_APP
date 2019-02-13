<?php
	include "conex_db.php";
	$usuario=$_POST["user"];
	$mensaje=$_POST["message"];
	$sql="INSERT INTO conversation (usuario, mensaje) VALUES('$usuario','$mensaje')";
	$result=$base->prepare($sql);
	$result->execute();

	if ($result==true) {
		echo "Mensaje registrado.";
	}else{
		echo "No se registro el mensaje";
	}
?>