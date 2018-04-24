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
	JOIN higiene_medicion_iluminacion ON higiene_empresa.id = higiene_medicion_iluminacion.id_empresa
	WHERE higiene_medicion_iluminacion.fecha_medicion_iluminacion LIKE '%$consultaBusqueda%'
	OR higiene_empresa.nombre_empresa LIKE '%$consultaBusqueda%'
	OR higiene_empresa.numero_nit LIKE '%$consultaBusqueda%'

	ORDER BY higiene_medicion_iluminacion.fecha_medicion_iluminacion DESC 
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
			$fecha_medicion = $resultados['fecha_medicion_iluminacion'];
			$area_medicion_iluminacion = $resultados['area_medicion_iluminacion'];

			$nombre_empresa = $resultados['nombre_empresa'];
			$numero_nit = $resultados['numero_nit'];
			$direccion = $resultados['direccion'];
			$telefono = $resultados['telefono'];
			
			$actividad_economica = $resultados['actividad_economica'];
			$id = $resultados['id_iluminacion'];
			$id_empresa = $resultados['id'];

			//Output
			$mensaje .= '
			<p>

			<div class="container col-sm-12">           
			  <table class="table table-bordered">
			    <thead>
			      <tr>
			        <th class="size">Fecha</th>
			        <th class="size">Area</th>
			        <th class="size">Empresa</th>
			        <th class="size">Nit</th>
			        <th class="size">Direccion</th>
			        <th class="size">Telefono</th>
			        <th class="size">Activividad Economica</th>
			        <th class="size" style="color: #FF0033;">Descargar Reporte</th>
			        <th class="size" style="color: #808080;">Ver Informacion</th>
			      </tr>
			    </thead>
			    <tbody>
			      <tr>
			        <td>'. $fecha_medicion .'</td>
			        <td>'. $area_medicion_iluminacion.'</td>
			        <td>'. $nombre_empresa .'</td>
			        <td>'. $numero_nit .'</td>
			        <td>'. $direccion .'</td>
			        <td>'. $telefono .'</td>
			        <td>'. $actividad_economica .'</td>


			 		<td><a target="_blank" href="higiene_reporte_iluminacion.php?id_iluminacion='.$id.'&&id_empresa='.$id_empresa.'"><strong><span class="glyphicon glyphicon-floppy-save"></span> Descargar</strong></a></td>

			 		<td><a target="_blank" href="higiene_result_iluminacion.php?id_iluminacion='.$id.'&&id_empresa='.$id_empresa.'"><strong><span class="glyphicon glyphicon-eye-open"></span> Visualizar</strong></a></td>
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