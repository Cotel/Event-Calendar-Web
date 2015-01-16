<?php 
$conexion = mysql_connect("host","username","password")
			or die("Problema en la conexion");

		mysql_select_db("database",$conexion)
			or die("Problema en la seleccion");

		$registro = mysql_query("query")
			or die("Problema en el select");

		if($reg=mysql_fetch_assoc($registro)){
			mysql_query("query")
				or die("Problema en la operacion");
			echo "Exito al borrar!";
		}
		mysql_close($conexion);

		header('Location: index.php');
?>