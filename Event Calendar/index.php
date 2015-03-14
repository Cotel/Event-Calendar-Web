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
	<link rel="stylesheet" type="text/css" href="css/tipsy.css">
	<!-- <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"> -->
	<!--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script> -->
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/tipsy.js"></script>
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

		$conexion = mysql_connect("localhost","root","")
			or die("Problema en la conexion");

		mysql_select_db("citas",$conexion)
			or die("Problema en la seleccion");

		// $auto = mysql_query("delete from agenda where Dia < DATE(NOW())")

		$fech = date('Y-m-d');
		$registros = mysql_query("select ID,Titulo,DATE_FORMAT(Dia,'%d-%m-%Y'),TIME_FORMAT(Hora,'%H:%i'),Cliente,Servicio from agenda where Dia >='".$fech."'")
			or die("Problema en el select: ").mysql_error();

		$citas;
		// echo json_encode(mysql_fetch_array($registros));
		while ($reg=mysql_fetch_array($registros)){
			$serv = mysql_query("select Nombre_Servicio from servicios where Servicio =".$reg['Servicio'].";")
				or die("Problema en el select: ".mysql_error());
			$clien = mysql_query("select Nombre from clientes where Telefono =".$reg['Cliente'].";")
				or die("Problema en el select: ".mysql_error());
			$aux = mysql_fetch_assoc($serv);
			$aux1 = mysql_fetch_assoc($clien);
			for($i = 0; $i<1;$i++){
				$citas[$i] = new Evento(
				$reg['ID'],$reg['Titulo'],$reg["DATE_FORMAT(Dia,'%d-%m-%Y')"],$reg["TIME_FORMAT(Hora,'%H:%i')"],$aux1['Nombre'],$aux['Nombre_Servicio']);
				echo $citas[$i]->show();
			}
		}

		//Hacer un popup para cada cliente que muestre mas informacion


		  ?>
	</table>

	<div id="tabla">
		<p style="float:right;"><button type="button" class="btn btn-default" onclick="cerrarPop()" data-toggle="modal" href="#nuevaCita">Agregar nueva cita</button></p>
		<p style="float:left;"><a class="btn btn-default" data-toggle="modal" onclick="cerrarPop()" data-target="#nuevoCliente">Agregar nuevo cliente</a></p>
	</div>
	<script type="text/javascript" src="autocompletar.js"></script>

<!-- Modal Nueva Cita -->
<div class="modal fade" id="nuevaCita" tabindex="-1" role="dialog" aria-labelledby="nuevaCitaLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"><strong>Nueva Cita</strong></h4>
      </div>
      <div class="modal-body">
        <form action="nuevo.php" class="form-group" method="get">
			<fieldset>
				<div><label class="control-label" for="titulo"><strong>Titulo de la cita</strong></label><input class="right form-control input-sm" type="text" id="titulo" name="titulo"></div>
				<div><label class="control-label" for="fecha"><strong>Fecha de la cita (aaaa-mm-dd)</strong></label><input class="right form-control input-sm" type="text" id="fecha" name="fecha"></div>
				<div><label class="control-label" for="hora"><strong>Hora de la cita</strong></label><input class="right form-control input-sm" type="text" id="hora" name="hora"></div>
				<div><label class="control-label" for="telefono"><strong>Cliente</strong></label><input class="form-control input-sm" type="text" name="telefono" id="telefono" onkeyup="autocompletar(telefono.value)">
				<button type="button" class="btn btn-xs btn-success right" id="masCliente" data-toggle="popover" data-placement="right">+</button>
				<p id="datos" class="sugerencias" style="visibility: hidden;"></p></div>
				<div><label class="control-label" for="servicio"><strong>Servicio</strong></label>
					<select class="right form-control" id="servicio" name="servicio">
						<option value="1">Corte</option>
						<option value="2">Lavado</option>
						<option value="3">Tinte</option>
					</select>
				</div>
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

<!-- Popover Nuevo Cliente -->
<div id="popover-head" class="hide">Nuevo Cliente</div>
<div id="popover-content" class="hide">
	<form action="nuevoCli.php" method="post">
			<fieldset>
				<p><strong>Telefono</strong><input class="right" type="text" id="telf" name="telf"></p>
				<p><strong>Nombre y Apellido</strong><input class="right" type="text" id="nombre" name="nombre"></p>
				<input type="button" class="btn btn-primary btn-xs" data-toggle="popover" onclick="nuevoCliente()" id="apagado" value="OK">
			</fieldset>
	</form>
</div>

<!-- Popover Citas -->
<div id="popover2-arrow" class="hide"></div>
<div id="popover2-head" class="hide">Citas</div>
<div id="popover2-content" class="hide">
	<form action="mostrarCita.php" method="post" class="hide">
	</form>
	<div id="resultados">

	</div>
</div>

<!-- Modal Nuevo Cliente-->
<div class="modal fade" id="nuevoCliente" tabindex="-1" role="dialog" aria-labelledby="nuevoClienteLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"><strong>Nuevo cliente</strong></h4>
      </div>
      <div class="modal-body">
		<form action="nuevoCli.php" method="post">
			<fieldset>
				<p><strong>Telefono</strong><input class="right" type="text" name="telf"></p>
				<p><strong>Nombre y Apellido</strong><input class="right" type="text" name="nombre"></p>
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
	$(function (){
		$('[data-toggle="popover"]').popover({
			html : true,
			title : function(){
				return $("#popover-head").html();
			},
			content : function(){
				return $('#popover-content').html();
			}
		});
	});
</script>

<script>
	$(function (){
		$('[data-toggle="popover2"]').popover({
			// container : "body",
			trigger : "focus",
			html : true,
			arrow : function(){
				return $("#popover2-arrow").html();
			},
			title : function(){
				return $("#popover2-head").html();
			},
			content : function(){
				return $('#popover2-content').html();
			},
		});
	});
</script>

<script>
	$(function (){
		$('a[rel=tipsy]').tipsy({fade: true,gravity: 'n'});
	});
</script>

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
