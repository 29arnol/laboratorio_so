<link rel="stylesheet" type="text/css" href="bar/style_bar/estilo.css">
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

	//Selecciona todo de la tabla mmv001 
	//donde el nombre sea igual a $consultaBusqueda, 
	//o el apellido sea igual a $consultaBusqueda, 
	//o $consultaBusqueda sea igual a nombre + (espacio) + apellido
	/*$consulta = mysqli_query($conexion, "SELECT * FROM mmv001
	WHERE nombre COLLATE UTF8_SPANISH_CI LIKE '%$consultaBusqueda%' 
	OR apellido COLLATE UTF8_SPANISH_CI LIKE '%$consultaBusqueda%'
	OR CONCAT(nombre,' ',apellido) COLLATE UTF8_SPANISH_CI LIKE '%$consultaBusqueda%'
	");*/
	$query = "SELECT * FROM equipos_laboratorio
	WHERE equipos_laboratorio.nombre_equipo LIKE '%$consultaBusqueda%'
	OR equipos_laboratorio.referencia LIKE '%$consultaBusqueda%' 
	";
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
			$referencia = $resultados['referencia'];
			$nombre_equipo = $resultados['nombre_equipo'];
			$estado = $resultados['estado_disp'];
			$descripcion = $resultados['descripcion'];
			$id = $resultados{'id'};


			if ($estado == 1) {
				$est = '<td style="color: #33ACED;"><a href="recepcion_prestar_equipos.php?id='. $id .'"><strong>Disponible Para Prestar</strong></a></td>';
			}else if ($estado == 2){
				$est = '<td style="color: #AB2508;" >Prestado</td>';
			}else if ($estado == 3){
				$est = '<td style="color: #FE2E02;" >No Disponible</td>';
			}else{
				$est = NULL;
			}
	
			//Output
			$mensaje .= '
			<p>

			<div class="container col-sm-12">           
			  <table class="table table-bordered">
			    <thead>
			      <tr>
			        <th>Referencia</th>
			        <th>Nombre del Equipo</th>
			        <th>Disponibilidad</th>
			        <th>Descripcion</th>
			        <th>Accion</th>
			      </tr>
			    </thead>
			    <tbody>
			      <tr>
			        <td>'. $referencia .'</td>
			        <td>'. $nombre_equipo .'</td>
			        	'. $est .'
			        <td>'. $descripcion .'</td>
			        
			        <td>'.$estado.'</td>
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