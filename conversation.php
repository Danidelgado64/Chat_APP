<?php
	include "conex_db.php";
	$query="SELECT usuario, mensaje FROM conversation ORDER BY idConversation ASC";
	$result=$base->prepare($query);
	$result->execute();

	while ($fila=$result->fetch(PDO::FETCH_ASSOC)) {
		
		echo "<p><b>".$fila['usuario']."</b> dice: ".$fila['mensaje']."</p>";	
	}
?>