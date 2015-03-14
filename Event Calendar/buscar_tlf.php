<?php
header('Content-type: text/html; charset=iso-8859-1');

// $tlf = $_POST['datoABuscar'];
$conexion = mysql_connect("localhost","root","")
			or die("Problema en la conexion");

		mysql_select_db("citas",$conexion)
			or die("Problema en la seleccion");

$tlf = $_GET['tlf'];
$query = "SELECT Nombre FROM clientes WHERE Nombre LIKE '".$_GET['tlf']."%' LIMIT 1";

$resultado = mysql_query($query);
// $rest = mysql_fetch_array($resultado);
$telefono = "No se encuentra a nadie con ese nombre";
while ($row = mysql_fetch_assoc($resultado)){
	if(!is_null($row['Nombre'])){	
		$telefono = $row['Nombre'];
	}else{
		$telefono = "No se encuentra a nadie con ese nombre";
	}
}
?>

<?php echo $telefono;
mysql_close($conexion); ?>

