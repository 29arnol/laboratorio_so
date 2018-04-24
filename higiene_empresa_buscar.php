<style type="text/css">

  .size {
	font-size: 12px;
  } 

</style>
<?php
//Archivo de conexión a la base de datos
include ('includes/conexion.php');

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

	$query = "SELECT * FROM higiene_empresa
	WHERE higiene_empresa.nombre_empresa LIKE '%$consultaBusqueda%'
	OR higiene_empresa.numero_nit LIKE '%$consultaBusqueda%'
	OR higiene_empresa.telefono LIKE '%$consultaBusqueda%'

	
	";
	//	OR datos_basicos.motivo_evaluacion LIKE '%$consultaBusqueda%'
	// OR datos_basicos.nombre_empresa LIKE '%$consultaBusqueda%'
	$consulta = mysqli_query($conexion,$query);

	//Obtiene la cantidad de filas que hay en la consulta
	$filas = mysqli_num_rows($consulta);

	//Si no existe ninguna fila que sea igual a $consultaBusqueda, entonces mostramos el siguiente mensaje
	if ($filas === 0 or $consultaBusqueda == "") {
		$mensaje = "<p>No hay ningún registro con esa carateristica</p>";
	} else {
		//Si existe alguna fila que sea igual a $consultaBusqueda, entonces mostramos el siguiente mensaje
		echo 'Resultados para <strong>'.$consultaBusqueda.'</strong>';

		//La variable $resultado contiene el array que se genera en la consulta, así que obtenemos los datos y los mostramos en un bucle
		while($resultados = mysqli_fetch_array($consulta)) {
			$id = $resultados['id'];

			$nombre_empresa = $resultados['nombre_empresa'];
			$numero_nit = $resultados['numero_nit'];
			$direccion = $resultados['direccion'];
			$ciudad = $resultados['ciudad'];
			$telefono = $resultados{'telefono'};
			$actividad_economica = $resultados{'actividad_economica'};

			//Output
			$mensaje .= '
			<p>

			<div class="container col-sm-12">           
			  <table class="table table-bordered">
			    <thead>
			      <tr>
			        <th class="size">Empresa</th>
			        <th class="size">Numero Nit</th>
			        <th class="size">Direccion</th>
			        <th class="size">Ciudad</th>
			        <th class="size">Telefono</th>
			        <th class="size">Actividad Economica</th>
			        <th class="size" style="color: #FF0033;">Iluminacion</th>
			        <th class="size" style="color: #808080;">Ruido</th>
			      </tr>
			    </thead>
			    <tbody>
			      <tr>
			        <td>'. $nombre_empresa .'</td>
			        <td>'. $numero_nit.'</td>
			        <td>'. $direccion.'</td>
			        <td>'. $ciudad .'</td>
			        <td>'. $telefono .'</td>
			        <td>'. $actividad_economica .'</td>


			 		<td><a target="_blank" href="higiene_iluminacion.php?id='.$id.'&&tipoconsulta=1"><strong><span class="glyphicon glyphicon-edit"></span> Registrar</strong></a></td>

			 		<td><a target="_blank" href="higiene_ruido.php?id='.$id.'&&tipoconsulta=2"><strong><span class="glyphicon glyphicon-edit"></span> Registrar</strong></a></td>
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