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

			$historia = $resultados['id_historia'];

			$area_datos = base64_encode(1);
			$area_aud = base64_encode(2);
			$area_vis = base64_encode(3);
			$area_opt = base64_encode(4);
			$area_esp = base64_encode(5);
			$area_psi = base64_encode(6);
			$area_enf = base64_encode(7);
			$area_med = base64_encode(8);

			$h_code= base64_encode($historia);
			$f_code= base64_encode($fecha);
			//Output
			$mensaje .= '
			<p>

			<div class="container col-sm-12">           
			  <table class="table table-bordered">
			    <thead>
			      <tr>
			      	<th>historia</th>
			        <th>N°documento</th>
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
			        <td><button type="button" class="btn btn-default btn-sm"><a target="_blank" href="administracion_recepcion_p.php?paciente='.$h_code.'&&area='.$area_datos.'&&registro='.$f_code.'"><strong><span class="glyphicon glyphicon-edit"></span> Editar</strong></a></button></td>

			 		<td><button type="button" class="btn btn-default btn-sm"><a target="_blank" href="administracion_audiometria.php?paciente='.$h_code.'&&area='.$area_aud.'&&registro='.$f_code.'"><strong><span class="glyphicon glyphicon-edit"></span> Editar</strong></a></button></td>

			 		<td><button type="button" class="btn btn-default btn-sm"><a target="_blank" href="administracion_visiometria.php?paciente='.$h_code.'&&area='.$area_vis.'&&registro='.$f_code.'"><strong><span class="glyphicon glyphicon-edit"></span> Editar</strong></a></button></td>

			 		<td><button type="button" class="btn btn-default btn-sm"><a target="_blank" href="administracion_espirometria.php?paciente='.$h_code.'&&area='.$area_esp.'&&registro='.$f_code.'"><strong><span class="glyphicon glyphicon-edit"></span> Editar</strong></a></button></td>

			 		<td><button type="button" class="btn btn-default btn-sm"><a target="_blank" href="administracion_psicologia.php?paciente='.$h_code.'&&area='.$area_psi.'&&registro='.$f_code.'"><strong><span class="glyphicon glyphicon-edit"></span> Editar</strong></a></button></td>

			 		<td><button type="button" class="btn btn-default btn-sm"><a target="_blank" href="administracion_enfermeria.php?paciente='.$h_code.'&&area='.$area_enf.'&&registro='.$f_code.'"><strong><span class="glyphicon glyphicon-edit"></span> Editar</strong></a></button></td>

			 		<td><button type="button" class="btn btn-default btn-sm"><a target="_blank" href="administracion_medico.php?paciente='.$h_code.'&&area='.$area_med.'&&registro='.$f_code.'"><strong><span class="glyphicon glyphicon-edit"></span> Editar</strong></a></button></td>
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