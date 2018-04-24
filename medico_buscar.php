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
	JOIN medico_examen_fisico AS mef ON mef.paciente_medico = db.id_historia
	JOIN medico_paraclinicos AS mp ON mef.id = mp.id_examen_fisico
	JOIN medico_remision AS mr ON mp.id = mr.id_paraclinico
	WHERE dc.nombres_apellidos LIKE '%$consultaBusqueda%'
	OR dc.numero_documento LIKE '%$consultaBusqueda%'
	OR db.fecha LIKE '%$consultaBusqueda%'
	OR db.motivo_evaluacion LIKE '%$consultaBusqueda%'
	OR db.nombre_empresa LIKE '%$consultaBusqueda%'
	ORDER BY db.fecha DESC 
	";
	//
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
			$numerodocumento = $resultados['numero_documento'];
			$nombrescompleto = $resultados['nombres_apellidos'];
			$motivoevaluacion = $resultados['motivo_evaluacion'];
			$fecha = $resultados['fecha'];
			$nombreempresa = $resultados{'nombre_empresa'};
			$remision_pendiente = $resultados{'remision_pendiente'};

			$historia = $resultados['id_historia'];

			$code = base64_encode(999);
			$th_code = base64_encode(1);
			$tr_code = base64_encode(2);
			$h_code= base64_encode($historia);
			$f_code= base64_encode($fecha);

			if ($remision_pendiente == 'Si') {
				$remi = '<td><a target="_blank" href="medico_remision.php?paciente='.$h_code.'"><strong style="color: #FF2E00;"><span class="glyphicon glyphicon-warning-sign"></span> SI</strong></a></td>';
			}else if ($remision_pendiente == 'No'){
				$remi = '<td><strong>No</strong></td>';
			}else{
				$remi = NULL;
			}
			//Output
			$mensaje .= '
			<p>

			<div class="container col-sm-12">           
			  <table class="table table-bordered">
			    <thead>
			      <tr>
			        <th>Nº documento</th>
			        <th>Nombres-apellidos</th>
			        <th>Motivo evaluacion</th>
			        <th>Fecha</th>
			        <th>Empresa</th>
			        <th>Remision</th>
			        <th style="color: #FF0033;">Resultado</th>
			        <th style="color: #808080;">Historia</th>
			        <th >Donwload</th>
			        <th >General</th>
			        <th >CAL</th>
			      </tr>
			    </thead>
			    <tbody>
			      <tr>
			        <td>'. $numerodocumento .'</td>
			        <td>'. $nombrescompleto .'</td>
			        <td>'. $motivoevaluacion .'</td>
			        <td>'. $fecha .'</td>
			        <td>'. $nombreempresa .'</td>
			        '. $remi .'
			        <td><a target="_blank" href="medico_result.php?paciente='.$h_code.'&&tipoconsulta='.$tr_code.'&&registro='.$f_code.'&&cod='.$code.'"><strong><span class="glyphicon glyphicon-eye-open"></span> Ver</strong></a></td>
			        
			 		<td><a target="_blank" href="medico_result.php?paciente='.$h_code.'&&tipoconsulta='.$th_code.'&&registro='.$f_code.'&&cod='.$code.'"><strong><span class="glyphicon glyphicon-eye-open"></span> Ver</strong></a></td>

			 		<td><a target="_blank" href="med_hist.php?paciente='.$h_code.'"><strong><span class="glyphicon glyphicon-download-alt"></span> PDF</strong></a></td>

			 		<td><a target="_blank" href="general_hist.php?paciente='.$h_code.'"><strong><span class="glyphicon glyphicon-download-alt"></span> PDF</strong></a></td>
			 		
			 		<td><a target="_blank" href="cal.php?paciente='.$h_code.'&&tipoconsulta='.$th_code.'"><strong><span class="glyphicon glyphicon-download-alt"></span> PDF</strong></a></td>
			      </tr>
			    </tbody>
			  </table>
			</div>

			</p>';
//medico_reporte_CAL.php
		};//Fin while $resultados


	}; //Fin else $filas

};//Fin isset $consultaBusqueda

//Devolvemos el mensaje que tomará jQuery
echo $mensaje;
?>