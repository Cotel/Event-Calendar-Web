<?php 
$conexion = mysql_connect("localhost","root","")
			or die("Problema en la conexion");

		mysql_select_db("citas",$conexion)
			or die("Problema en la seleccion");

		$registro = mysql_query("select ID from agenda where ID = '$_REQUEST[ID]'")
			or die("Problema en el select");

		if($reg=mysql_fetch_assoc($registro)){
			mysql_query("delete from agenda where ID='$_REQUEST[ID]'")
				or die("Problema en la operacion");
			echo "Exito al borrar!";
		}
		mysql_close($conexion);

		header('Location: index.php');
?>