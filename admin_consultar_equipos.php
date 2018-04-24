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
				$est = '<td style="color: #33ACED;"><a href="#.php?id='. $id .'"><strong>Disponible Para Prestar</strong></a></td>';
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
			        <th>Nombre Equipo</th>
			        <th>Disponibilidad</th>
			        <th>Descripcion</th>
			        <th>Accion</th>
			        <th>Editar</th>
			      </tr>
			    </thead>
			    <tbody>
			      <tr>
			        <td>'. $referencia .'</td>
			        <td>'. $nombre_equipo .'</td>
			        	'. $est .'
			        <td><textarea class="form-control">'. $descripcion .'</textarea></td>
			        
			        <td>'.$estado.'</td>

			        <td><button type="button" class="btn btn-default btn-sm"><a target="_blank" href="admin_update_equipos.php?ref='.$id.'"><strong><span class="glyphicon glyphicon-edit"></span> Editar</strong></a></button></td>
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