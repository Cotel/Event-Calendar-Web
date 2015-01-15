<!DOCTYPE html>
<html>
<head>
	<title>Nueva Cita</title>
	<link rel="stylesheet" type="text/css" href="calendar.css">
</head>
<body>

<form action="nuevo.php" method="post">
<fieldset>
	<legend><strong>Nueva Cita :</strong></legend>
	<p><strong>Titulo de la cita : </strong><input type="text" name="titulo"></p>
	<p><strong>Fecha de la cita (aaaa-mm-dd) : </strong><input type="text" name="fecha"></p>
	<p><strong>Hora de la cita : </strong><input type="text" name="hora"></p>
	<p><strong>Cliente (numero de tlf) : </strong><input type="text" name="telefono"></p>
	<p><strong>Servicio </strong>
		<select name="servicio">
			<option value="1">Corte</option>
			<option value="2">Lavado</option>
			<option value="3">Tinte</option>
		</select>
	</p>
	<input type="submit" value="OK">
</fieldset>
</form>

<form action="nuevoCli.php" method="post">
	<fieldset>
		<legend><strong>Nuevo Cliente :</strong></legend>
		<p><strong>Telefono : </strong><input type="text" name="telf"></p>
		<p><strong>Nombre y Apellido:  </strong><input type="text" name="nombre"></p>
		<input type="submit" value="OK">
	</fieldset>
</form>

<?php 

 ?>

</body>
</html>