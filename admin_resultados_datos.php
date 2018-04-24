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

	$query = "SELECT * FROM datos_basicos AS db
	JOIN datos_complementarios AS dc ON db.fk_d_complementario = dc.id
	WHERE dc.nombres_apellidos LIKE '%$consultaBusqueda%'
	OR dc.numero_documento LIKE '%$consultaBusqueda%'
	OR db.id_historia LIKE '%$consultaBusqueda%'
	OR db.fecha LIKE '%$consultaBusqueda%'
	OR db.motivo_evaluacion LIKE '%$consultaBusqueda%'
	OR db.nombre_empresa LIKE '%$consultaBusqueda%'
	ORDER BY db.fecha DESC";
	//
	$consulta = mysqli_query($conexion,$query);
	//Obtiene la cantidad de filas que hay en la consulta
	$filas = mysqli_num_rows($consulta);
	//Si no existe ninguna fila que sea igual a $consultaBusqueda, entonces mostramos el siguiente mensaje
	if ($filas === 0 or $consultaBusqueda == "") {
		$mensaje = "<p>No hay ningún registro con esa carateristica</p>";
	}else{
		//Si existe alguna fila que sea igual a $consultaBusqueda, entonces mostramos el siguiente mensaje
		echo 'Resultados para <strong>'.$consultaBusqueda.'</strong>';
		//La variable $resultado contiene el array que se genera en la consulta, así que obtenemos los datos y los mostramos en un bucle
		while($resultados = mysqli_fetch_array($consulta)) {
			$numerodocumento = $resultados['numero_documento'];
			$nombrescompleto = $resultados['nombres_apellidos'];
			$motivoevaluacion = $resultados['motivo_evaluacion'];
			$fecha = $resultados['fecha'];
			$nombreempresa = $resultados{'nombre_empresa'};

			$historia = $resultados['id_historia'];

			$code = base64_encode(255);
			$t_code = base64_encode(1);
			$h_code= base64_encode($historia);
			$f_code= base64_encode($fecha);

			//Output
			$mensaje .= '
			<p>

			<div class="container col-sm-12">           
			  <table class="table table-bordered">
			    <thead>
			      <tr>
			      	<th>Historia</th>
			        <th>Nºdocumento</th>
			        <th>Nombres</th>
			        <th>Evaluacion</th>
			        <th>Fecha</th>
			        <th>Datos</th>
			        <th style="color: #FF0033;">Audiometria</th>
			        <th style="color: #808080;">Visiometria</th>
			        <th style="color: #808080;">Espirometria</th>
			        <th style="color: #808080;">Psicologia</th>
			        <th style="color: #808080;">Enfermeria</th>
			        <th style="color: #808080;">Medico</th>
			      </tr>
			    </thead>
			    <tbody>
			      <tr>
			        <td>'. $historia .'</td>
			        <td>'. $numerodocumento .'</td>
			        <td>'. $nombrescompleto .'</td>
			        <td>'. $motivoevaluacion .'</td>
			        <td>'. $fecha .'</td>
			        <td>
			        	<button type="button" class="btn btn-default btn-sm"><a target="_blank" href="recepcion_paciente.php?paciente='.$h_code.'&&registro='.$f_code.'&&cod='.$code.'"><strong><span class="glyphicon glyphicon-eye-open"></span> Ver</strong></a>
			        	</button>
			        </td>

			 		<td>
			 			<button type="button" class="btn btn-default btn-sm"><a target="_blank" href="audiometria_result.php?paciente='.$h_code.'&&registro='.$f_code.'&&cod='.$code.'&&tipoconsulta='.$t_code.'"><strong><span class="glyphicon glyphicon-eye-open"></span> Ver</strong></a>
			 			</button>
			 		</td>

			 		<td>
			 			<button type="button" class="btn btn-default btn-sm"><a target="_blank" href="visiometria_result.php?paciente='.$h_code.'&&registro='.$f_code.'&&cod='.$code.'&&tipoconsulta='.$t_code.'"><strong><span class="glyphicon glyphicon-eye-open"></span> Ver</strong></a>
			 			</button>
			 		</td>

			 		<td>
			 			<button type="button" class="btn btn-default btn-sm"><a target="_blank" href="espirometria_result.php?paciente='.$h_code.'&&registro='.$f_code.'&&cod='.$code.'&&tipoconsulta='.$t_code.'"><strong><span class="glyphicon glyphicon-eye-open"></span> Ver</strong></a>
			 			</button>
			 		</td>

			 		<td>
			 			<button type="button" class="btn btn-default btn-sm"><a target="_blank" href="psicologia_result.php?paciente='.$h_code.'&&registro='.$f_code.'&&cod='.$code.'&&tipoconsulta='.$t_code.'"><strong><span class="glyphicon glyphicon-eye-open"></span> Ver</strong></a>
			 			</button>
			 		</td>

			 		<td>
			 			<button type="button" class="btn btn-default btn-sm"><a target="_blank" href="enfermeria_result.php?paciente='.$h_code.'&&registro='.$f_code.'&&cod='.$code.'&&tipoconsulta='.$t_code.'"><strong><span class="glyphicon glyphicon-eye-open"></span> Ver</strong></a>
			 			</button>
			 		</td>

			 		<td>
			 			<button type="button" class="btn btn-default btn-sm"><a target="_blank" href="medico_result.php?paciente='.$h_code.'&&registro='.$f_code.'&&cod='.$code.'&&tipoconsulta='.$t_code.'"><strong><span class="glyphicon glyphicon-eye-open"></span> Ver</strong></a>
			 			</button>
			 		</td>
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