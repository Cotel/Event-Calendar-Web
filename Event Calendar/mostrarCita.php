<?php
	include 'evento.php';

	$conexion = mysql_connect("localhost","root","")
		or die("Problema en la conexion");

	mysql_select_db("citas",$conexion)
		or die("Problema en la seleccion");

	// $auto = mysql_query("delete from agenda where Dia < DATE(NOW())")

	// $fech = '';
	$registros = mysql_query("select ID,Titulo,DATE_FORMAT(Dia,'%d-%m-%Y'),TIME_FORMAT(Hora,'%H:%i'),Cliente,Servicio from agenda where Dia = $_GET[fech]")
		or die("Problema en el select: ").mysql_error();
	if($registros == false){ echo -1;}
	echo "<table class='tablaPeq'>
	<tr>
	<th>Cliente</th>
	<th>Hora</th>
	<th>Servicio</th>
	</tr>";
	while($aux2 = mysql_fetch_assoc($registros)){
		$serv = mysql_query("select Nombre_Servicio from servicios where Servicio =".$aux2["Servicio"].";")
				or die("Problema en el select: ".mysql_error());
		$serv = mysql_fetch_assoc($serv);
		$clien = mysql_query("select Nombre from clientes where Telefono =".$aux2["Cliente"].";")
				or die("Problema en el select: ".mysql_error());
		$clien = mysql_fetch_assoc($clien);

		echo "<tr>";
		echo "<td>".$clien['Nombre']."</td>";
		echo "<td>".$aux2["TIME_FORMAT(Hora,'%H:%i')"]."</td>";
		echo "<td>".$serv["Nombre_Servicio"]."</td>";
		echo "</tr>";
	}
	echo "</table>";
	//$aux2 = json_encode($aux2);

	// $datos = array();
	// while($reg = mysql_fetch_assoc($registros)){
	// 	// $serv = mysql_query("select Nombre_Servicio from servicios where Servicio =".$reg['Servicio'].";")
	// 	// 		or die("Problema en el select: ".mysql_error());
	// 	// $clien = mysql_query("select Nombre from clientes where Telefono =".$reg['Cliente'].";")
	// 	// 		or die("Problema en el select: ".mysql_error());
	// 	// $aux = mysql_fetch_assoc($serv);
	// 	// $aux1 = mysql_fetch_assoc($clien);
	// 	$datos[] = $reg;
	// 	$aux2 = json_encode($datos);
	// }




	//$citas;
	// $aux2 = json_encode($datos);
	// $aux2 += json_encode($aux);
	// $aux2 += json_encode($aux1);
	//echo $aux2;
	// while ($reg=mysql_fetch_array($registros)){
	// 	$serv = mysql_query("select Nombre_Servicio from servicios where Servicio =".$reg['Servicio'].";")
	// 		or die("Problema en el select: ".mysql_error());
	// 	$clien = mysql_query("select Nombre from clientes where Telefono =".$reg['Cliente'].";")
	// 		or die("Problema en el select: ".mysql_error());
	// 	$aux = mysql_fetch_assoc($serv);
	// 	$aux1 = mysql_fetch_assoc($clien);
	// 	for($i = 0; $i<1;$i++){
	// 		$citas[$i] = new Evento(
	// 		$reg['ID'],$reg['Titulo'],$reg["DATE_FORMAT(Dia,'%d-%m-%Y')"],$reg["TIME_FORMAT(Hora,'%H:%i')"],$aux1['Nombre'],$aux['Nombre_Servicio']);
	// 		echo $citas[$i]->show();
	// 	}
	// }

	//Hacer un popup para cada cliente que muestre mas informacion


?>
