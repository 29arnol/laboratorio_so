<?php 
 include ("constante.php");

 $conexion = new mysqli(server,user,password,bd);

 $key = 'cu4n70_m4s_c0mpl3j0_m3j05';

 if (!$conexion){

die('error de conexion'.mysqli_error()); 

 }
 ?>