<?php 
unset($_COOKIE["sesion"]); 
$res = setcookie("sesion", '', time() - 3600);
header( 'Location: main_login.php');
 ?>