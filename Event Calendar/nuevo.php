<?php 
$conexion = mysql_connect("host","username","password")
			or die ("Problema al conectar");

			mysql_select_db("database",$conexion)
			or die("Problema al seleccionar una base de datos");

			$registro=mysql_query("INSERT INTO x (...) VALUES (...)");

			echo "INSERT INTO x (...) VALUES (...)";

			echo "Exito!";

			header('Location: index.php');

 ?>