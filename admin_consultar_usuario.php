<?php
//Archivo de conexión a la base de datos
include ('includes/conexion.php');
include ('bar/style_bar/estilo.css');

//Variable de búsqueda
$consultaBusqueda = $_POST['valorBusqueda'];

//Filtro anti-XSS
$caracteres_malos = array("<", ">", "'", "/", "<", ">", "'", "/");
$caracteres_buenos = array("& lt;", "& gt;", "& quot;", "& #x27;", "& #x2F;", "& #060;", "& #062;", "& #039;", "& #047;");
$consultaBusqueda = str_replace($caracteres_malos, $caracteres_buenos, $consultaBusqueda);

//Variable vacía (para evitar los E_NOTICE)
$mensaje = "";
//Comprueba si $consultaBusqueda está seteado
if (isset($consultaBusqueda)) {

	$query = "SELECT * FROM usuarios
	JOIN usuarios_roles ON usuarios.rol = usuarios_roles.id 
	WHERE usuarios.ndocumento LIKE '%$consultaBusqueda%'
	OR usuarios.nombre_completo LIKE '%$consultaBusqueda%'
	OR usuarios.usuario LIKE '%$consultaBusqueda%' 
	OR usuarios_roles.area LIKE '%$consultaBusqueda%'";
	//
	$consulta = mysqli_query($conexion,$query);
	//Obtiene la cantidad de filas que hay en la consulta
	$filas = mysqli_num_rows($consulta);

	//Si no existe ninguna fila que sea igual a $consultaBusqueda, entonces mostramos el siguiente mensaje
	if ($filas === 0 or $consultaBusqueda == "") {
		$mensaje = "<p>No hay ningún equipo registrado con esa carateristica</p>";
	} else {
		//Si existe alguna fila que sea igual a $consultaBusqueda, entonces mostramos el siguiente mensaje
		echo 'Resultados para <strong>'.$consultaBusqueda.'</strong>';

		//La variable $resultado contiene el array que se genera en la consulta, así que obtenemos los datos y los mostramos en un bucle
		while($resultados = mysqli_fetch_array($consulta)) {
			$ndocumento = $resultados['ndocumento'];
			$nombres = $resultados['nombre_completo'];
			$edad = $resultados['edad'];
			$genero = $resultados['genero'];
			$usuario = $resultados['usuario'];
			$area = $resultados{'area'};
			$id = $resultados{'idusuario'};	
			//Output
			$mensaje .= '
			<p>

			<div class="container col-sm-12">           
			  <table class="table table-bordered">
			    <thead>
			      <tr>
			        <th># Documento</th>
			        <th>Nombres</th>
			        <th>Edad</th>
			        <th>Genero</th>
			        <th>Usuario</th>
			        <th>Area</th>
			        <th>Editar</th>
			      </tr>
			    </thead>
			    <tbody>
			      <tr>
			        <td>'.$ndocumento.'</td>
			        <td>'.$nombres.'</td>
			        <td>'.$edad.'</td>
			        <td>'.$genero .'</td>
			        <td>'.$usuario.'</td>
			        <td>'.$area.'</td>

			        <td><button type="button" class="btn btn-default btn-sm"><a target="_blank" href="admin_users_update.php?user='.$id.'"><strong><span class="glyphicon glyphicon-edit"></span> Editar</strong></a></button></td>
			      </tr>
			    </tbody>
			  </table>
			</div>

			</p>';

		};//Fin while $resultados


	}; //Fin else $filas

};//Fin isset $consultaBusqueda

//Devolvemos el mensaje que tomará jQuery
echo $mensaje;
?>