<?php

session_start();
if(!isset($_COOKIE['sesion'])){
	header("Location:main_login.php");
}
?>


<!DOCTYPE html>
<html>
<head>
	<title>Calendario</title>
	<link rel="stylesheet" type="text/css" href="calendar.css">
	<!-- <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css"> -->
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.1/cosmo/bootstrap.min.css">
	<!-- <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"> -->
	<!--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script> -->
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>	 
	<!--<script src="http://code.jquery.com/jquery-1.11.2.min.js"></script> -->
</head>
<body class="container">
<!-- <div class="main"> -->
	<div class="navbar">
		<a href="logout.php" style="float:right;" class="btn btn-danger">Cerrar Sesion</a>
	</div>

	<?php 
	include 'calendar.php';

	$calendar = new Calendar();

	echo $calendar->show();
	?>

	<table id="tabla" class="table table-striped table-hover">
		<tr class="info">
			<td><strong>Titulo</strong></td>
			<td><strong>Fecha</strong></td>
			<td><strong>Hora</strong></td>
			<td><strong>Cliente</strong></td>
			<td><strong>Servicio</strong></td>
			<td><strong>Borrar</strong></td>
		</tr>
		<?php
		include 'evento.php';

		$conexion = mysql_connect("host","username","password")
			or die("Problema en la conexion");

		mysql_select_db("database",$conexion)
			or die("Problema en la seleccion");			

		$registros = mysql_query("select ...")
			or die("Problema en el select: ").mysql_error();
		
		$citas;
		while ($reg=mysql_fetch_array($registros)){
			$serv = mysql_query("select ... from table where x ='$y';")
				or die("Problema en el select: ".mysql_error());
			$clien = mysql_query("select ... from table where x ='$y';")
				or die("Problema en el select: ".mysql_error());
			$aux = mysql_fetch_assoc($serv);
			$aux1 = mysql_fetch_assoc($clien);
			for($i = 0; $i<1;$i++){				
				$citas[$i] = new Evento(
				$reg['ID'],$reg['Titulo'],$reg['Dia'],$reg['Hora'],$aux1['Nombre'],$aux['Nombre_Servicio']);
				echo $citas[$i]->show();
			}
		}		

		//Hacer un popup para cada cliente que muestre mas informacion
		

		  ?>
	</table>

	<div id="tabla">
		<p style="float:right;"><button type="button" class="btn btn-default" data-toggle="modal" href="#nuevaCita">Agregar nueva cita</button></p>
		<p style="float:left;"><a class="btn btn-default" data-toggle="modal" data-target="#nuevoCliente">Agregar nuevo cliente</a></p>				
	</div>
	
<!-- Modal Nueva Cita -->
<div class="modal fade" id="nuevaCita" tabindex="-1" role="dialog" aria-labelledby="nuevaCitaLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"><strong>Nueva Cita</strong></h4>
      </div>
      <div class="modal-body">
        <form action="nuevo.php" method="post">
			<fieldset>				
				<p><strong>Titulo de la cita : </strong><input class="right" type="text" name="titulo"></p>
				<p><strong>Fecha de la cita (aaaa-mm-dd) : </strong><input class="right" type="text" name="fecha"></p>
				<p><strong>Hora de la cita : </strong><input class="right" type="text" name="hora"></p>
				<p><strong>Cliente (numero de tlf) : </strong><input class="right" type="text" name="telefono"></p>
				<p><strong>Servicio </strong>
					<select class="right" name="servicio">
						<option value="1">Corte</option>
						<option value="2">Lavado</option>
						<option value="3">Tinte</option>
					</select>
				</p>
				<!-- <input type="submit" class="btn btn-primary right" value="OK"> -->
			</fieldset>
			<!-- </form> -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
        <input type="submit" class="btn btn-primary right" value="OK">
        </form>
        <!-- <button type="button" class="btn btn-primary">Enviar</button> -->
      </div>
    </div>
  </div>
</div>

<!-- Modal Nuevo Cliente-->
<div class="modal fade" id="nuevoCliente" tabindex="-1" role="dialog" aria-labelledby="nuevoClienteLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Nuevo cliente: </h4>
      </div>
      <div class="modal-body">
		<form action="nuevoCli.php" method="post">
			<fieldset>				
				<p><strong>Telefono : </strong><input class="right" type="text" name="telf"></p>
				<p><strong>Nombre y Apellido:  </strong><input class="right" type="text" name="nombre"></p>
				<!-- <input type="submit" class="btn btn-primary right" value="OK"> -->
			</fieldset>
		<!-- </form> -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
        <input type="submit" class="btn btn-primary right" value="OK">
        <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
      </div>
    </div>
  </div>
</div>

<script>
	$('#nuevaCita').on('shown.bs.modal', function () {
    	$('#myInput').focus()
  	});
</script>

<script>
	$('#nuevoCliente').on('shown.bs.modal', function () {
    	$('#myInput').focus()
  	});
</script>

</div>
</body>
</html>



