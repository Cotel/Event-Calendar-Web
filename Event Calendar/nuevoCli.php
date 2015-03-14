<?php 
$conexion = mysql_connect("localhost","root","")
			or die ("Problema al conectar");

			mysql_select_db("citas",$conexion)
			or die("Problema al seleccionar una base de datos");

			$registro=mysql_query("INSERT INTO clientes (Telefono,Nombre) VALUES (
				$_GET[telf],'$_GET[nombre]')");


			// echo "INSERT INTO clientes (Telefono,Nombre) VALUES ($_REQUEST[telf],'$_REQUEST[nombre]')";
			// echo "Exito!";

			header('Location: index.php');

 ?>