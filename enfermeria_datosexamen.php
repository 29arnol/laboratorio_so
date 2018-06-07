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
if (isset($consultaBusqueda)) {
	$query = "SELECT * FROM datos_basicos  AS db
	JOIN datos_complementarios AS dc ON db.fk_d_complementario = dc.id
	JOIN enfermeria_historialaboral AS hl ON hl.paciente_enfermeria = db.id_historia 
	WHERE dc.nombres_apellidos LIKE '%$consultaBusqueda%'
	OR dc.numero_documento LIKE '%$consultaBusqueda%'
	OR db.fecha LIKE '%$consultaBusqueda%'
	OR db.motivo_evaluacion LIKE '%$consultaBusqueda%'
	OR db.nombre_empresa LIKE '%$consultaBusqueda%'";
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
			$code = base64_encode(999);
			$t_code = base64_encode(2);
			$h_code= base64_encode($historia);
			$f_code= base64_encode($fecha);
			//Output
			$mensaje = '
			<p>
			<div class="container col-sm-12">           
			  <table class="table table-bordered">
			    <thead>
			      <tr>
			        <th class="text-center">Nº documento</th>
			        <th class="text-center">Nombres y apellidos</th>
			        <th class="text-center">Motivo evaluacion</th>
			        <th class="text-center">Fecha</th>
			        <th class="text-center">Empresa</th>
			        <th class="text-center" style="color: #FF0033;">Historia Enfermeria</th>
			        <th class="text-center">Download</th>
			      </tr>
			    </thead>
			    <tbody>
			      <tr class="text-center">
			        <td>'.$numerodocumento.'</td>
			        <td>'.$nombrescompleto.'</td>
			        <td>'.$motivoevaluacion.'</td>
			        <td>'.$fecha.'</td>
			        <td>'.$nombreempresa.'</td>
			 		<td class="text-center"><a target="_blank" href="enfermeria_listarexamen.php?paciente='.$h_code.'&&registro='.$f_code.' &&tipoconsulta='.$t_code.'&&cod='.$code.'"><strong>Consultar</strong></a></td>
			 		<td><a target="_blank" href="enf_hist.php?paciente='.$h_code.'"><strong><span class="glyphicon glyphicon-download-alt"></span> Download</strong></a></td>		 		
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