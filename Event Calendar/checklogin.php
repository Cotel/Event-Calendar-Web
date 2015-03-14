<?php

// ob_start();
$conn = mysql_connect("localhost","root","") or die("Fallo al conectar");
		mysql_select_db("citas") or die("Fallo al seleccionar base de datos");

$myusername=$_POST['myusername'];
// echo $myusername;
$mypassword=$_POST['mypassword'];
$mypassword=md5($mypassword);

$myusername = stripslashes($myusername);
$mypassword = stripslashes($mypassword);
$myusername = mysql_real_escape_string($myusername);
$mypassword = mysql_real_escape_string($mypassword);

// echo var_dump($myusername);

$sql = "SELECT * FROM members WHERE username=('$myusername') and password=('$mypassword')";
 echo $sql;
$result = mysql_query($sql);


$count = mysql_num_rows($result);
// echo $count;

if($count==1){
	// $_SESSION["myusername"]=$myusername;
	// $_SESSION["mypassword"]=$mypassword;
	setcookie("sesion",md5($myusername . $mypassword),0);
	header("Location: index.php");
}else{
	echo "Fallo en la contraseña o el nombre de usuario.";
}
// ob_end_flush();


 ?>