<!DOCTYPE html>
<html>
<head>
	<title>Calendario</title>
	<link rel="stylesheet" type="text/css" href="calendar.css">
</head>
<body>
<?php 
include 'calendar.php';

$calendar = new Calendar();

echo $calendar->show();
?>

<table class="">
	<tr>
		<td><strong>Titulo</strong></td>
		<td><strong>Fecha</strong></td>
		<td><strong>Cliente</strong></td>
		<td><strong>Servicio</strong></td>
	</tr>
	<?php
	include 'evento.php';
	$evento_prueba = new Evento('Prueba','25-12-2014',6565656,1);
	echo $evento_prueba->show();

	//Conectar a la base de datos para leer las citas de los 5 siguientes dias.
	//Hacer un apartado para crear nuevas citas.
	//

	  ?>
</table>

</body>
</html>

