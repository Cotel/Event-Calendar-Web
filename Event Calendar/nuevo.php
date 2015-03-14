<?php 
$conexion = mysql_connect("localhost","root","")
			or die ("Problema al conectar");

			mysql_select_db("citas",$conexion)
			or die("Problema al seleccionar una base de datos");

			$cliente=mysql_query("SELECT Telefono FROM clientes WHERE Nombre='$_GET[telefono]';");
			echo "SELECT Telefono FROM clientes WHERE Nombre='$_GET[telefono]';";
			$aux = mysql_fetch_row($cliente);
			//echo $aux[0];

			$registro=mysql_query("INSERT INTO agenda (Titulo,Dia,Hora,Cliente,Servicio) VALUES ('$_GET[titulo]','$_GET[fecha]','$_GET[hora]',".$aux[0].",$_GET[servicio])");

			echo "INSERT INTO agenda (Titulo,Dia,Hora,Cliente,Servicio) VALUES ('$_GET[titulo]','$_GET[fecha]','$_GET[hora]',".$aux[0].",$_GET[servicio])";

			echo "Exito!";

			header('Location: index.php');

 ?>