<?php 
$conexion = mysql_connect("localhost","root","")
			or die ("Problema al conectar");

			mysql_select_db("citas",$conexion)
			or die("Problema al seleccionar una base de datos");

			$registro=mysql_query("INSERT INTO agenda (Titulo,Dia,Hora,Cliente,Servicio) VALUES ('$_REQUEST[titulo]','$_REQUEST[fecha]','$_REQUEST[hora]',$_REQUEST[telefono],$_REQUEST[servicio])");

			echo "INSERT INTO agenda (Titulo,Dia,Hora,Cliente,Servicio) VALUES ('$_REQUEST[titulo]','$_REQUEST[fecha]','$_REQUEST[hora]',$_REQUEST[telefono],$_REQUEST[servicio])";

			echo "Exito!";

			header('Location: index.php');

 ?>