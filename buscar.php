<?php
//Archivo de conexión a la base de datos
include ('includes/conexion.php');
include ('bar/css/estilo.css');
//Variable de búsqueda
$consultaBusqueda = $_POST['valorBusqueda'];
//Filtro anti-XSS
$caracteres_malos = array("<", ">", "'", "/", "<", ">", "'", "/");
$caracteres_buenos = array("& lt;", "& gt;", "& quot;", "& #x27;", "& #x2F;", "& #060;", "& #062;", "& #039;", "& #047;");
$consultaBusqueda = str_replace($caracteres_malos, $caracteres_buenos, $consultaBusqueda);
//Variable vacía (para evitar los E_NOTICE)
$mensaje = "";

//Comprueba si $consultaBusqueda está seteado
if (isset($consultaBusqueda)){

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
		$mensaje = '<p><span class="fa fa-exclamation-triangle"></span> No hay ningún equipo registrado con esa carateristica</p>';
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
			        <th class="text-center">Referencia</th>
			        <th class="text-center">Nombre del Equipo</th>
			        <th class="text-center">Disponibilidad</th>
			        <th class="text-center">Descripcion</th>
			      </tr>
			    </thead>
			    <tbody>
			      <tr class="text-center">
			        <td>'.$referencia.'</td>
			        <td>'.$nombre_equipo.'</td>
			        '.$est.'
			        <td>'.$descripcion.'</td>
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