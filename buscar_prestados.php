<?php
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
	$query = "SELECT * FROM equipos_prestados
	WHERE ficha_formativa LIKE '%$consultaBusqueda%'
	OR nombres_instructor LIKE '%$consultaBusqueda%'
	OR fecha LIKE '%$consultaBusqueda%'
	OR equipo LIKE '%$consultaBusqueda%'
	OR nombres_estudiante LIKE '%$consultaBusqueda%'";
	$consulta = mysqli_query($conexion,$query);
	//Obtiene la cantidad de filas que hay en la consulta
	$filas = mysqli_num_rows($consulta);
	//Si no existe ninguna fila que sea igual a $consultaBusqueda, entonces mostramos el siguiente mensaje
	if ($filas === 0 or $consultaBusqueda == "") {
		$mensaje = "<p>No hay ningún equipo registrado con esa carateristica</p>";
	}else{
		//Si existe alguna fila que sea igual a $consultaBusqueda, entonces mostramos el siguiente mensaje
		echo 'Resultados para <strong>'.$consultaBusqueda.'</strong>';

		//La variable $resultado contiene el array que se genera en la consulta, así que obtenemos los datos y los mostramos en un bucle
		while($resultados = mysqli_fetch_array($consulta)) {
			$equipo = $resultados['equipo'];
			$fecha = $resultados['fecha'];
			$estado = $resultados['estado'];
			$devuelto = $resultados['devuelto'];
			$ficha = $resultados['ficha_formativa'];
			$hora_salida = $resultados['hora_salida'];
			$hora_entrada = $resultados{'hora_entrada'};
			$nombres_estudiante = $resultados{'nombres_estudiante'};
			$nombres_instructor = $resultados{'nombres_instructor'};
			$nombres_persona_entrega = $resultados{'nombres_persona_entrega'};
			$observaciones = $resultados{'observaciones'};

			$id = $resultados{'id'}; 
        
			if ($devuelto == "No") {
				
				 $dev = '<td class="text-center"><a style="color: red;" href="recepcion_actualizar_prestados.php?id='. $id .'"><b>No</b></a></td>';
			}else if ($devuelto == "Si"){
				 $dev = '<td style="color: blue;" class="text-center">'. $devuelto .'</td>';
			}else{
				$dev = NULL;
			}
			//Output
			$mensaje .= '
			<p>

			<div class="container col-sm-12">           
			  <table class="table table-bordered">
			    <thead>
			      <tr>
			      	<th class="text-center">Equipo</th>
			        <th class="text-center">Fecha</th>
			        <th class="text-center">Estado</th>
			        <th class="text-center">Devuelto</th>
			        <th class="text-center">Ficha</th>
			        <th class="text-center">Salida</th>
			        <th class="text-center">Entrada</th>
			        <th class="text-center">Aprendiz</th>
			        <th class="text-center">Instructor</th>
			        <th class="text-center">Entregado por</th>
			        <th class="text-center">Observaciones</th>
			      </tr>
			    </thead>
			    <tbody>
			      <tr class="text-center">
			      	<td>'. $equipo .'</td>
			        <td>'. $fecha .'</td>
			        <td>'. $estado .'</td>
			       '. $dev .'

			        
			        <td>'. $ficha .'</td>
			        <td>'. $hora_salida .'</td>
			        <td>'. $hora_entrada .'</td>
			        <td>'. $nombres_estudiante .'</td>
			        <td>'. $nombres_instructor .'</td>
			        <td>'. $nombres_persona_entrega .'</td>
			        <td>'. $observaciones .'</td>
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