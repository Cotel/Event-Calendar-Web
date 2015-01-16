<?php  ?>
<!DOCTYPE html>
<html>
<head>
	<title>Pagina Acceso</title>
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

<div>
	<form method="post" action="checklogin.php">
	<fieldset>
		<legend><strong>Accede a tu usuario</strong></legend>
 		<p><strong>Nombre de Usuario: </strong></p><input type="text" id="myusername" name="myusername">
		<p><strong>Contraseña: </strong></p><input type="password" id="mypassword" name="mypassword">
		<input type="submit" name="Submit" value="Entrar">
	</fieldset>		
	</form>
</div>

</body>
</html>