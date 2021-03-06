<?php
//Archivo de conexión a la base de datos
include ('includes/conexion.php');
include('bar/css/estilo.css');
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
	JOIN espirometria AS esp ON esp.espirometria_paciente = db.id_historia 
	WHERE dc.nombres_apellidos LIKE '%$consultaBusqueda%'
	OR dc.numero_documento LIKE '%$consultaBusqueda%'
	OR db.id_historia LIKE '%$consultaBusqueda%'
	OR db.fecha LIKE '%$consultaBusqueda%'
	OR db.motivo_evaluacion LIKE '%$consultaBusqueda%'
	OR db.nombre_empresa LIKE '%$consultaBusqueda%'";
	//
	$consulta = mysqli_query($conexion,$query);
	//Obtiene la cantidad de filas que hay en la consulta
	$filas = mysqli_num_rows($consulta);
	//Si no existe ninguna fila que sea igual a $consultaBusqueda, entonces mostramos el siguiente mensaje
	if($filas === 0 || $consultaBusqueda == ""){
		$mensaje = '<p><span class="fa fa-exclamation-triangle"></span> No hay ningún registro relacionado con dicho criterio</p>';
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
			$t_code = base64_encode(1);
			$h_code = base64_encode($historia);
			$f_code = base64_encode($fecha);
			//Output
			$mensaje .='
			<p>
				<div class="container">           
				  <table class="table table-bordered fontlistar">
				    <thead>
				      <tr>
				        <th class="text-center">Nº Historia</th>
				        <th class="text-center">Nº documento</th>
				        <th class="text-center">Nombres y apellidos</th>
				        <th class="text-center">Motivo evaluacion</th>
				        <th class="text-center">Fecha</th>
				        <th class="text-center">Nombre empresa</th>
				        <th class="text-danger text-center">Listar consulta</th>
				      </tr>
				    </thead>
				    <tbody class="text-center text-dark">
				      <tr>
				        <td>'.$historia.'</td>
				        <td>'.$numerodocumento.'</td>
				        <td>'.$nombrescompleto.'</td>
				        <td>'.$motivoevaluacion.'</td>
				        <td>'.$fecha.'</td>
				        <td>'.$nombreempresa.'</td>
				 		<td><a target="_blank" href="espirometria_listarexamen.php?paciente='.$h_code.'&&registro='.$f_code.'&&cod='.$code.'&&tipoconsulta='.$t_code.'"><strong><i class="far fa-eye"></i> Ver</strong></a></td>		 		
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