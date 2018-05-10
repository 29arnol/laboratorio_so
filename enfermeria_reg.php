<?php 
	include('includes/conexion.php'); 
	include('bar/navbar_enfermeria.php');
	include('bar/css/estilo.css');
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Enfermeria Examen</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<script type="text/javascript" src="jvalidation/dist/jquery.validate.js"></script>
	</head>

<?php 

	$ruta_destino =   "fotografias/"; //ruta de las fotos de los paciente

	 error_reporting(E_ERROR | E_WARNING | E_PARSE);

	 if (isset($_POST['Registrar'])) {

		$historia = $_POST['historia'];

		$histlaboral = $_POST['historia_laboral'];
		$anosenempresa = $_POST['anosenempresa'];
		$dependencia = $_POST['dependencia'];
		$cargohist = $_POST['cargo_historia'];
		$descripcioncargo = $_POST['descripcioncargo'];
		$turno = $_POST['turno'];

		//-------conjunto de checkbox actvidades-----------HERE------------------
		$actividad = '';
		foreach ($_POST['actividades'] as $actividades){
			$s1 = ' | ';
			if($actividad == ''){
				$actividad =$actividades;
			}else{
				$actividad .= $s1.$actividades;
			}
		}

		//----Guardar conjunto de valores en un solo campo----------HERE------------------
	 $cadena = '';
		foreach ($_POST['acciones'] as $idd){
			$s = ' | ';
			if($cadena == ''){
				$cadena =$idd;
			}else{
				$cadena .= $s.$idd;
			}
		}
	//echo $cadena;

	$hist_laboral = "INSERT INTO `historia_laboral`(`id`, `historia_laboral`, `anos_en_empresa`,`dependencia`,`cargo`, `descripcion_cargo`,`turno`,`actividades`,`acciones`,`paciente_enfermeria`) 
		VALUES ('NULL','$histlaboral','$anosenempresa','$dependencia','$cargohist','$descripcioncargo','$turno','$actividad','$cadena','$historia')"; 
		$query1 = mysqli_query($conexion,$hist_laboral);

		//-----------------
		if ($query1){   
			//Obtenemos El Ultimo ID Insertado
			$ver = "SELECT * FROM historia_laboral ORDER BY `id` DESC limit 0,1";
			$queryid = mysqli_query ($conexion,$ver);
			$dataid = mysqli_fetch_array($queryid);
			$idfk_histlaboral = $dataid['id'];
		}else{
			echo "<script>alert('Error 1, Intente Nuevamente')</script>";
		}
		//----------------- 

		for($i=0; $i < count($_POST['empresa1_riesgo']); $i++){

		$exposicion_riesgos = $_POST['exposicion_riesgo'];

		$empresa1 = $_POST['empresa1_riesgo'][$i];
		$factores = $_POST['factoresriesgo'][$i];
		$cargo1 = $_POST['riesgo_cargo1'][$i];
		$tiempo1 = $_POST['riesgo_tiempo1'][$i];
		$proteccion_personal1 = $_POST['riesgo_epp1'][$i];

		$fact_riesgos = "INSERT INTO `exposicion_riesgos_enf`(`id`, `factores_riesgos`, `empresa1`, `riesgos`, `cargo1`, `tiempo1`, `proteccion_personal1`,`id_paciente`) 
		VALUES ('NULL','$exposicion_riesgos','$empresa1','$factores','$cargo1','$tiempo1','$proteccion_personal1','$idfk_histlaboral')"; 
		$query2 = mysqli_query($conexion,$fact_riesgos);

	}

		//-----------------HEREEEEEEEEEEEEEE
		if ($query2){   
			//Obtenemos El Ultimo ID Insertado
			$ver2 = "SELECT * FROM exposicion_riesgos_enf ORDER BY `id` DESC limit 0,1";
			$queryid2 = mysqli_query ($conexion,$ver2);
			$dataid2 = mysqli_fetch_array($queryid2);
			$idfk_riesgos_lab = $dataid2['id'];
		}else{
			echo "<script>alert('Error 2, Intente Nuevamente')</script>";
		}
		//-----------------

		$infancia = $_POST['ant_infancia'];//---------
		$enf_cardiaca = $_POST['ant_cardiaca'];
		$trauma = $_POST['ant_trauma'];
		$transmision_sexual = $_POST['ant_transmision_sexual'];
		$vacunas = $_POST['ant_vacunas'];
		$toxicos = $_POST['ant_toxicos'];
		$hipertension = $_POST['ant_hipertension'];
		$enf_piel = $_POST['ant_piel'];
		$enf_renal = $_POST['ant_renal'];
		$enf_pulmonar = $_POST['ant_pulmonar'];
		$enf_peptica = $_POST['ant_peptica'];
		$enf_mental = $_POST['ant_mental'];

		$alergias = $_POST['ant_alergias'];
		$hernias = $_POST['ant_hernias'];
		$oido_nariz_laringe = $_POST['ant_oido_nariz_laringe'];
		$enf_visuales = $_POST['ant_visuales'];
		$diabetes = $_POST['ant_diabetes'];
		$enf_hematicos = $_POST['ant_hematicos'];
		$cirugias = $_POST['ant_cirugias'];
		$tunel_carpo = $_POST['ant_carpo'];
		$enf_vascular = $_POST['ant_vascular'];
		$varicocele = $_POST['ant_varicocele'];
		$enf_hepatica = $_POST['ant_hepatica'];
		$osteomuscular = $_POST['ant_osteomuscular'];
		
		$hospitalizaciones = $_POST['ant_hospital'];
		$quervein = $_POST['ant_quervein'];
		$lumbalgias = $_POST['ant_lumbalgias'];
		$cancer = $_POST['ant_cancer'];
		$fracturas = $_POST['ant_fracturas'];
		$dislipidemias = $_POST['ant_dislipidemias'];

		$ant_observaciones = $_POST['ant_observacion'];
		$ant_familiar = $_POST['ant_familiar'];
		$ant_familiar_descripcion = $_POST['ant_familiar_descripcion'];
		$ant_personal = $_POST['ant_personal'];
		$ant_personal_descripcion = $_POST['ant_personal_descripcion'];


		$ant_per_fam = "INSERT INTO `antecedentes_per_fam_enf`(`id`,`infancia`,`hipertension_arterial`,`alergias`,`cirugias`,`hospitalizaciones`,`enf_cardiaca`,`enf_piel_anexos`,`hernias`,`tunel_carpo`,`enf_quervein`,`trauma`,`enf_vias_renal`,`enf_oido_nariz_laringe`,`enf_vascular`,`lumbalgias`,`enf_transmision_sexual`,`enf_pulmonar`,`enf_visual`,`varicocele`,`cancer`,`vacunas_dosis`,`enf_acido_peptica`,`diabetes`,`enf_hepatica`,`fracturas`,`toxicos`,`enf_mental`,`enf_hematicos`,`osteomuscular`,`dislipidemias`,`ant_observaciones`,`familiar_ant`,`desc_ant_familiar`,`personal_ant`,`desc_ant_per`,`id_paciente_riesgos`) 
		VALUES ('NULL','$infancia','$hipertension','$alergias','$cirugias','$hospitalizaciones','$enf_cardiaca','$enf_piel','$hernias','$tunel_carpo','$quervein','$trauma','$enf_renal','$oido_nariz_laringe','$enf_vascular','$lumbalgias','$transmision_sexual','$enf_pulmonar','$enf_visuales','$varicocele','$cancer','$vacunas','$enf_peptica','$diabetes','$enf_hepatica','$fracturas','$toxicos','$enf_mental','$enf_hematicos','$osteomuscular','$dislipidemias','$ant_observaciones','$ant_familiar','$ant_familiar_descripcion','$ant_personal','$ant_personal_descripcion','$idfk_riesgos_lab')";//--HERE
		$query3 = mysqli_query($conexion,$ant_per_fam);

		//----------------
		if ($query3){   
			//Obtenemos El Ultimo ID Insertado
			$ver2 = "SELECT * FROM antecedentes_per_fam_enf ORDER BY `id` DESC limit 0,1";
			$queryid2 = mysqli_query ($conexion,$ver2);
			$dataid2 = mysqli_fetch_array($queryid2);
			$idfk_per_fam = $dataid2['id'];
		}else{
			echo "<script>alert('Error 3, Intente Nuevamente')</script>";
		}
		//-----------------

		$menarquia = $_POST['gin_menarquia'];
		$ciclos = $_POST['gin_ciclo'];
		//$ficha_obstetrica = $_POST['ficha_obstetrica'];
		$planifica = $_POST['gin_planifica'];
		$metodo = $_POST['gin_metodo'];
		$ultima_mestruacion = $_POST['gin_ult_mestruacion'];
		$ultima_citologia = $_POST['gin_ult_citologia'];
		$resultado_ginecologia = $_POST['resultado_ginecologia'];
		$flujo_vaginal = $_POST['gin_flujo'];
		$dolor_pelvico = $_POST['gin_dolor_pelvico'];
		$dolor_senos = $_POST['gin_dolor_senos'];

		$obstetrica = '';
		foreach ($_POST['gin_obstetrica'] as $obs){
			$m = ' | ';
			if($obstetrica == ''){
				$obstetrica =$obs;
			}else{
				$obstetrica .= $m.$obs;
			}
		}
		//echo $obstetrica;

		$ginecologia = "INSERT INTO `antecedentes_ginecologia_enf`(`id`,`menarquia`,`ciclos`,`ficha_obstetrica`,`planifica`,`metodo`,`ultima_mestruacion`,`ultima_citologia`,`resultado`,`flujo_vaginal`,`dolor_pelvico`,`dolor_senos`,`id_ant_per_fam`) VALUES ('NULL','$menarquia','$ciclos','$obstetrica','$planifica','$metodo','$ultima_mestruacion','$ultima_citologia','$resultado_ginecologia','$flujo_vaginal','$dolor_pelvico','$dolor_senos','$idfk_per_fam')";
		$query4 = mysqli_query($conexion, $ginecologia);

		//Obtenemos El Ultimo ID Insertado
		if ($query3){    
			$ver2 = "SELECT * FROM antecedentes_ginecologia_enf ORDER BY `id` DESC limit 0,1";
			$queryid2 = mysqli_query ($conexion,$ver2);
			$dataid2 = mysqli_fetch_array($queryid2);
			$idfk_ginecologia = $dataid2['id'];
		}else{
			echo "<script>alert('Error 4, Intente Nuevamente')</script>";
		}
		//-----------------

		$uso_proteccion = $_POST['usoproteccion_p'];//---------
		$proteccion_personal = $_POST['ele_proteccion_cargo'];
		$proteccion_actual = $_POST['proteccion_actual'];
		$casco = $_POST['casco'];
		$guantes = $_POST['guantes'];
		$botas = $_POST['botas'];
		$gafas = $_POST['gafas'];
		$tapabocas = $_POST['tapabocas'];
		$overol = $_POST['overol'];
		$protectores_auditivos = $_POST['p_auditivos'];
		$protectores_respiratorios = $_POST['p_respiratorios'];
		$otros = $_POST['p_otros'];
		$adecuada = $_POST['p_adecuada'];
		$todoadecuado = $_POST['todoadecuado'];
		$solo_ad = $_POST['solo_ad'];

		$proteccion_pers= "INSERT INTO `proteccion_personal_enf`(`id`,`uso_proteccion`,`cargo_o_empresa`,`actual`,`casco`,`guantes`,`botas`,`gafas`,`tapabocas`,`overol`,`protectores_auditivos`,`protectores_respiratorios`,`otros`,`adecuados`,`todas`,`solo`,`id_ginecologia`)
		VALUES('NULL','$uso_proteccion','$proteccion_personal','$proteccion_actual','$casco','$guantes','$botas','$gafas','$tapabocas','$overol','$protectores_auditivos','$protectores_respiratorios','$otros','$adecuada','$todoadecuado','$solo_ad','$idfk_ginecologia')";
		$query5 = mysqli_query($conexion,$proteccion_pers);

		//Obtenemos El Ultimo ID Insertado
		if ($query5){   
			$ver2 = "SELECT * FROM proteccion_personal_enf ORDER BY `id` DESC limit 0,1";
			$queryid2 = mysqli_query ($conexion,$ver2);
			$dataid2 = mysqli_fetch_array($queryid2);
			$idfk_protec_pers = $dataid2['id'];
		}else{
			echo "<script>alert('Error 5, Intente Nuevamente')</script>";
		}
		//-----------------
		
		for($i=0; $i < count($_POST['empresaaccidente']); $i++){

		$accidentestrabajo = $_POST['accidentestrabajo'];

		$fecha_accidente = $_POST['fechaaccidente'];
		$empresa_accidente = $_POST['empresaaccidente'];
		$causa_accidente = $_POST['causaaccidente'];
		$lesion_accidente = $_POST['lesionaccidente'];
		$parte_afectada = $_POST['parteafectadaaccidente'];
		$incapacidad_accidente = $_POST['incapacidadaccidente'];
		$secuelaaccidente = $_POST['secuelaaccidente'];

		$accidente_trabajo = "INSERT INTO `accidentes_trabajo_enf`(`id`,`accidentes_trabajo`,`fecha1`,`ac_empresa1`,`causa1`,`lesion1`,`parte_afectada1`,`incapacidad1`,`secuela1`,`id_protec_personal`)
		VALUES('NULL','$accidentestrabajo','$fecha_accidente','$empresa_accidente','$causa_accidente','$lesion_accidente','$parte_afectada','$incapacidad_accidente','$secuelaaccidente','$idfk_protec_pers')";
		$query6 = mysqli_query($conexion,$accidente_trabajo);
	}
		//Obtenemos El Ultimo ID Insertado
		if ($query6){        
			$ver2 = "SELECT * FROM accidentes_trabajo_enf ORDER BY `id` DESC limit 0,1";
			$queryid2 = mysqli_query ($conexion,$ver2);
			$dataid2 = mysqli_fetch_array($queryid2);
			$idfk_accidente_trab = $dataid2['id'];
		}else{
			echo "<script>alert('Error 6, Intente Nuevamente')</script>";
		}
		//-----------------

		for($i=0; $i < count($_POST['empresaenfermedad']); $i++){
		$enfermedad_profesional = $_POST['enfermedad_p']; 

		$fechaenfermedad = $_POST['fechaenfermedad'];
		$empresaenfermedad = $_POST['empresaenfermedad'];
		$diagnosticoenfermedad = $_POST['diagnosticoenfermedad'];
		$arl1 = $_POST['arl'];
		$reubicacion1 = $_POST['reubicacion'];
		$pension1 = $_POST['pension'];

		$enfermedad_trabajo= "INSERT INTO `enfermedad_profesional_enf`(`id`,`enfermedad_profesional`,`en_fecha1`,`en_empresa1`,`diagnostico1`,`arl1`,`reubicacion1`,`pension1`,`id_accidente_trabajo`) 
		VALUES ('NULL','$enfermedad_profesional','$fechaenfermedad','$empresaenfermedad','$diagnosticoenfermedad','$arl1','$reubicacion1','$pension1','$idfk_accidente_trab')";
		$query7 = mysqli_query($conexion,$enfermedad_trabajo); 
	}

		//Obtenemos El Ultimo ID Insertado
		if ($query7){       
			$ver2 = "SELECT * FROM enfermedad_profesional_enf ORDER BY `id` DESC limit 0,1";
			$queryid2 = mysqli_query ($conexion,$ver2);
			$dataid2 = mysqli_fetch_array($queryid2);
			$idfk_enfermedad_prof = $dataid2['id'];
		}else{
			echo "<script>alert('Error 7, Intente Nuevamente')</script>";
		}

		$practica_deporte = $_POST['deporte'];
		//$cuales_deportes = $_POST['ejercicio'];
		$otro_deporte = $_POST['cual_deporte'];
		$sedentario = $_POST['sedentario'];
		$depor_cardiopulmonar = $_POST['depor_cardiopulmonar'];
		$depor_frecuencia = $_POST['depor_frecuencia'];

		$deportepractica = '';
		foreach ($_POST['ejercicio'] as $depor){
			$m = ' | ';
			if($deportepractica == ''){
				$deportepractica =$depor;
			}else{
				$deportepractica .= $m.$depor;
			}
		}
	//echo $deportepractica;

		$habito_saludable = "INSERT INTO `habitos_saludables_enf`(`id`,`practica_deporte`,`cuales`,`sedentario`,`ejercicio_cardiopulmonar`,`ejercicio_otro`,`frecuencia_ejercicio`,`id_enfermedad_prof`) VALUES ('NULL','$practica_deporte', '$deportepractica', '$sedentario', '$depor_cardiopulmonar','$otro_deporte','$depor_frecuencia','$idfk_enfermedad_prof')"; 
		$query8 = mysqli_query($conexion,$habito_saludable);

		//Obtenemos El Ultimo ID Insertado
		if ($query8){   
			$ver2 = "SELECT * FROM habitos_saludables_enf ORDER BY `id` DESC limit 0,1";
			$queryid2 = mysqli_query ($conexion,$ver2);
			$dataid2 = mysqli_fetch_array($queryid2);
			$idfk_hab_saludable = $dataid2['id'];
		}else{
			echo "<script>alert('Error 8, Intente Nuevamente')</script>";
		}    

		$fuma = $_POST['fuma'];
		$fumador = $_POST['fumador'];
		$anos_fumador = $_POST['anosfumador'];
		$exfumador = $_POST['exfumador'];
		$exfumador_anos = $_POST['anosexfumador'];
		$cigarrillos_dia = $_POST['cantidad_cigarrillos_dia'];
		$bebe_habitualmente = $_POST['tomahab'];
		$anos_hab_beber = $_POST['anoshab_beber'];
		$frecuencia_beber = $_POST['frec_beber'];
		//$tipo_licor = $_POST['tipolicor'];
		$problemas_bebidas = $_POST['problemasbebidas'];  
		$cual_bebida_prob = $_POST['cuales_bebidas'];
		$exbebedor = $_POST['exbebedor'];
		$exbebedor_anos = $_POST['exbebedor_anos'];
		$otros_habitos_toxicos = $_POST['otroshabitos'];
		$cuales_habitos = $_POST['nombre_otrohabito'];//-----here
		$medic_regularmente = $_POST['medic_regularmente'];
		$nombre_medicamento = $_POST['nombre_medicamento'];
		$cirugiaseps = $_POST['cirugiaseps'];
		$cual_cirugia_eps = $_POST['cuales_cirugias'];
		$pend_tratamiento = $_POST['pend_tratamiento'];
		$cual_tratamiento = $_POST['cuales_tratamientos'];
		$incapacidad_ultimos_meses = $_POST['incapacidadultimosmeses'];
		$motivo_incapacidad = $_POST['motivo_incapacidad'];

		$tipo_licor = '';
		foreach ($_POST['tipolicor'] as $licores){
			$m = ' | ';
			if($tipo_licor == ''){
				$tipo_licor =$licores;
			}else{
				$tipo_licor .= $m.$licores;
			}
		}
		//echo $tipo_licor;

		$habitos_toxicos = "INSERT INTO habitos_toxicos_enf (`id`,`fuma`,`fumador`,`fumador_anos`,`exfumador`,`exfumador_anos`,`cant_cigarrillos_dia`,`beber_habitualmente`,`anos_habito_beber`,`frecuencia_beber`,`tipo_licor`,`problemas_con_bebidas`,`cuales_bebidas_problemas`,`exbebedor`,`anos_exbebedor`,`otros_habitos_toxicos`,`cuales_habitos_tox`,`medicamento_regularmente`,`cuales_medicamentos`,`cirugias_en_eps`,`cuales_cirugias`,`tratamiento_pendiente`,`cuales_tratamientos`,`incapacidad_ultimos_meses`,`motivo_incapacidad`,`id_hab_saludables`)
		VALUES('NULL','$fuma','$fumador','$anos_fumador','$exfumador','$exfumador_anos','$cigarrillos_dia','$bebe_habitualmente','$anos_hab_beber','$frecuencia_beber','$tipo_licor','$problemas_bebidas','$cual_bebida_prob','$exbebedor','$exbebedor_anos','$otros_habitos_toxicos','$cuales_habitos','$medic_regularmente','$nombre_medicamento','$cirugiaseps','$cual_cirugia_eps','$pend_tratamiento','$cual_tratamiento','$incapacidad_ultimos_meses','$motivo_incapacidad','$idfk_hab_saludable')";
		$query9 = mysqli_query($conexion,$habitos_toxicos);

		//Obtenemos El Ultimo ID Insertado  
		if ($query9){       
			$ver2 = "SELECT * FROM habitos_toxicos_enf ORDER BY `id` DESC limit 0,1";
			$queryid2 = mysqli_query ($conexion,$ver2);
			$dataid2 = mysqli_fetch_array($queryid2);
			$idfk_hab_toxicos = $dataid2['id'];
		}else{
			echo "<script>alert('Error 9, Intente Nuevamente')</script>";
		}

		$mano_habil = $_POST['mano_habil'];
		$cicatrices = $_POST['cicatrices'];
		$tatuajes = $_POST['tatuajes'];
		$perimetro_abdominal = $_POST['perimetro_abdominal'];
		$perimetro_toraxico = $_POST['perimetro_toraxico'];
		$otras_mediciones = $_POST['otras_mediciones'];

		$tension_arterial = $_POST['tensionarterial'];
		$frecuencia_cardiaca = $_POST['frecuenciacardiaca'];
		$frecuencia_respiratoria = $_POST['frecuenciarespiratoria'];
		$talla = $_POST['talla'];
		$peso = $_POST['peso'];
		$peso_diagnostico = $_POST['pesodiagnostico'];


		$signos_vitales = "INSERT INTO signos_vitales_enf (`id`,`mano_habil`,`cicatrices`,`tatuajes`,`perimetro_abdominal`,`perimetro_toraxico`,`otras_mediciones`,`tension_arterial`,`frecuencia_cardiaca`,`frecuencia_respiratoria`,`talla`,`peso`,`peso_diagnostico`,`id_habitos_toxicos`)
		VALUES ('NULL','$mano_habil','$cicatrices','$tatuajes','$perimetro_abdominal','$perimetro_toraxico','$otras_mediciones','$tension_arterial','$frecuencia_cardiaca','$frecuencia_respiratoria','$talla','$peso','$peso_diagnostico','$idfk_hab_toxicos')";
		$query10 = mysqli_query($conexion,$signos_vitales);

		//Obtenemos El Ultimo ID Insertado   
		if ($query10){     
			$ver2 = "SELECT * FROM signos_vitales_enf ORDER BY `id` DESC limit 0,1";
			$queryid2 = mysqli_query ($conexion,$ver2);
			$dataid2 = mysqli_fetch_array($queryid2);
			$idfk_signos_vitales = $dataid2['id'];
		}else{
			echo "<script>alert('Error 10, Intente Nuevamente')</script>";
		}

		$riesgos_suministrado  = $_POST['riesgos_suministrado'];
		$suministrado_fisico = $_POST['suministrado_fisico'];
		$suministrado_mecanico = $_POST['suministrado_mecanico'];
		$suministrado_quimico = $_POST['suministrado_quimico'];
		$suministrado_psicosocial = $_POST['suministrado_psicosocial'];
		$suministrado_biologico = $_POST['suministrado_biologico'];
		$suministrado_electrico = $_POST['suministrado_electrico'];
		$suministrado_ergonomico = $_POST['suministrado_ergonomico'];
		$suministrado_otro = $_POST['suministrado_otro'];

		$riesgos_suministrados = "INSERT INTO enfermeria_riesgos_suministrados (`id`,`riesgos_suministrados`,`suministrado_fisico`,`suministrado_mecanico`,`suministrado_quimico`,`suministrado_psicosocial`,`suministrado_biologico`,`suministrado_electrico`,`suministrado_ergonomico`,`suministrado_otro`,`id_signos_vitales`)
		VALUES ('NULL','$riesgos_suministrado','$suministrado_fisico','$suministrado_mecanico','$suministrado_quimico','$suministrado_psicosocial','$suministrado_biologico','$suministrado_electrico','$suministrado_ergonomico','$suministrado_otro','$idfk_signos_vitales')";
		$query11 = mysqli_query($conexion,$riesgos_suministrados);

		//Obtenemos El Ultimo ID Insertado
		if ($query11){    
			$ver2 = "SELECT * FROM signos_vitales_enf ORDER BY `id` DESC limit 0,1";
			$queryid2 = mysqli_query ($conexion,$ver2);
			$dataid2 = mysqli_fetch_array($queryid2);
			$idfk_signos_vitales = $dataid2['id'];
	}else{
		echo "<script>alert('Error 11, Intente Nuevamente')</script>";
	}

	//control atencion time
	$estado = "Atencion Finalizada";
	$horafinal = $_POST['horafinal'];

	$data = "UPDATE `db_estado_atencion` SET `enfermeria`= '$estado' WHERE paciente = '$historia'"; 
	$queryestado = mysqli_query($conexion,$data);

	$data1 = "UPDATE `datos_basicos_atencion` SET `final_timeenfermeria`= '$horafinal' WHERE id_datos_basicos = '$historia'"; 
	$querytime = mysqli_query($conexion,$data1);

	if ($query1 && $query2 && $query3 && $query4 && $query5 && $query6 && $query7 && $query8 && $query9 && $query10 && $query11 && $queryestado && $querytime) {
		echo "<script>alert('Datos Registrados Exitosamente')</script>";
		echo "<script>window.location = 'enfermeria.php'</script>"; 
	} else {
		echo "<script>alert('Error query, Intente Nuevamente')</script>";
		echo "<script>window.location = 'enfermeria.php'</script>"; 
	} 
}  

		$id = $_POST['cedula'];
		$fecha = $_POST['fecha_registro'];

		$consult="SELECT * FROM datos_basicos AS db
		JOIN datos_complementarios AS dc ON db.fk_d_complementario = dc.id
		JOIN datos_basicos_tipo_documento AS dbtd ON dc.fk_tipo_documento = dbtd.idtd 
		WHERE db.fecha='$fecha' AND dc.numero_documento=".$id."";
		$query = mysqli_query($conexion,$consult);

	if (mysqli_num_rows($query) > 0){
		//cuenta el numero de filas de la consulta
		while ($datos=mysqli_fetch_array($query)) {

			$historia=$datos['id_historia'];
			$cargodesempenar= $datos['cargo_a_desempenar'];      

		//--------
		$cont = "SELECT datos_basicos.motivo_evaluacion, COUNT(motivo_evaluacion) AS Total FROM datos_basicos 
			JOIN historia_laboral ON  historia_laboral.paciente_enfermeria = datos_basicos.id_historia
			JOIN datos_complementarios ON datos_basicos.fk_d_complementario = datos_complementarios.id
			WHERE datos_basicos.motivo_evaluacion = 'Ingreso' AND datos_complementarios.numero_documento=".$id." ";
			$qcont = mysqli_query($conexion,$cont);
		while ($re = mysqli_fetch_array($qcont)){
			$ingreso = $re{'Total'};      
		}
		$cont = "SELECT datos_basicos.motivo_evaluacion, COUNT(motivo_evaluacion) AS Total FROM datos_basicos 
			JOIN historia_laboral ON  historia_laboral.paciente_enfermeria = datos_basicos.id_historia
			JOIN datos_complementarios ON datos_basicos.fk_d_complementario = datos_complementarios.id
			WHERE datos_basicos.motivo_evaluacion = 'Periodico' AND datos_complementarios.numero_documento=".$id." ";
			$qcont = mysqli_query($conexion,$cont);
		while ($re = mysqli_fetch_array($qcont)){
			$periodico = $re{'Total'};     
		}
		$cont = "SELECT datos_basicos.motivo_evaluacion, COUNT(motivo_evaluacion) AS Total FROM datos_basicos
			JOIN historia_laboral ON  historia_laboral.paciente_enfermeria = datos_basicos.id_historia 
			JOIN datos_complementarios ON datos_basicos.fk_d_complementario = datos_complementarios.id
			WHERE datos_basicos.motivo_evaluacion = 'Retiro' AND datos_complementarios.numero_documento=".$id." ";
			$qcont = mysqli_query($conexion,$cont);
		while ($re = mysqli_fetch_array($qcont)){
			$retiro = $re{'Total'};     
		}
		$cont = "SELECT datos_basicos.motivo_evaluacion, COUNT(motivo_evaluacion) AS Total FROM datos_basicos 
			JOIN historia_laboral ON  historia_laboral.paciente_enfermeria = datos_basicos.id_historia
			JOIN datos_complementarios ON datos_basicos.fk_d_complementario = datos_complementarios.id
			WHERE datos_basicos.motivo_evaluacion = 'Post incapacidad' AND datos_complementarios.numero_documento=".$id." ";
			$qcont = mysqli_query($conexion,$cont);
		while ($re = mysqli_fetch_array($qcont)){
			$postincapacidad = $re{'Total'};     
		}
		$cont = "SELECT datos_basicos.motivo_evaluacion, COUNT(motivo_evaluacion) AS Total FROM datos_basicos
			JOIN historia_laboral ON  historia_laboral.paciente_enfermeria = datos_basicos.id_historia
			JOIN datos_complementarios ON datos_basicos.fk_d_complementario = datos_complementarios.id  
			WHERE datos_basicos.motivo_evaluacion = 'Reubicacion' AND datos_complementarios.numero_documento=".$id." ";
			$qcont = mysqli_query($conexion,$cont);
		while ($re = mysqli_fetch_array($qcont)){
		 $reubicacion = $re{'Total'};      
		}
		$cont = "SELECT datos_basicos.motivo_evaluacion, COUNT(motivo_evaluacion) AS Total FROM datos_basicos 
			JOIN historia_laboral ON  historia_laboral.paciente_enfermeria = datos_basicos.id_historia
			JOIN datos_complementarios ON datos_basicos.fk_d_complementario = datos_complementarios.id 
			WHERE datos_basicos.motivo_evaluacion = 'Reingreso' AND datos_complementarios.numero_documento=".$id." ";
			$qcont = mysqli_query($conexion,$cont);
		while ($re = mysqli_fetch_array($qcont)){
			$reingreso = $re{'Total'};      
		}
		$cont = "SELECT datos_basicos.motivo_evaluacion, COUNT(motivo_evaluacion) AS Total FROM datos_basicos
			JOIN historia_laboral ON  historia_laboral.paciente_enfermeria = datos_basicos.id_historia
			JOIN datos_complementarios ON datos_basicos.fk_d_complementario = datos_complementarios.id 
			WHERE datos_basicos.motivo_evaluacion = 'Otros' AND datos_complementarios.numero_documento=".$id." ";
			$qcont = mysqli_query($conexion,$cont);
		while ($re = mysqli_fetch_array($qcont)){
			$otros = $re{'Total'};     
		}
		//obtener fecha del ultimo registro del historial
		$consultaregistro = "SELECT * FROM datos_basicos
			JOIN historia_laboral ON historia_laboral.paciente_enfermeria = datos_basicos.id_historia
			JOIN datos_complementarios ON datos_basicos.fk_d_complementario = datos_complementarios.id
			WHERE datos_complementarios.numero_documento = ".$id." order by datos_basicos.fecha desc limit 1  ";
			$queryreg = mysqli_query($conexion,$consultaregistro);
		if (mysqli_num_rows($queryreg) > 0){  
			while ($reg = mysqli_fetch_array($queryreg)){
				$ultimo = $reg{'fecha'}; 
			}
		}else{
			$ultimo = "No hay registros de fecha";
		}  
		//alerta historial clinico
		echo '<script>
	 $(document).ready(function(){
		$("#historial").modal("show");
	 });</script>';

?>
<body>

<script>
	$(function(){
		/* Incluimos un método para validar el campo nombre */
		jQuery.validator.addMethod("texto", function(value, element) {
			return this.optional(element) || /^[a-záéóóúàèìòùäëïöüñ\s]+$/i.test(value);
		}); 
	/* Capturar el click del botón */
	$("#btn").on("click", function(){
		/* Validar el formulario */
		$("#formulario").validate({
		 rules: /* Accedemos a los campos a través de su nombre: email, nombre, edad */
		 {
			 //email: {required: true, email: true, minlength: 5, maxlength: 80},
			 historia_laboral: {required: true},
			 anosenempresa: {digits: true, minlength: 1, min: 1, max:99},
			 dependencia: {maxlength: 50},
			 cargo_historia: {maxlength: 50},
			 descripcioncargo: {maxlength: 100},
			 
			 actividades: {maxlength: 50},
			 acciones: {maxlength: 50},

			 exposicion_riesgo: {required: true},
			 empresa1_riesgo: {maxlength: 20, texto: true},
			 riesgo_cargo1:{maxlength: 30, texto: true},
			 riesgo_epp1: {maxlength: 30},
				empresa2_riesgo: {maxlength: 20, texto: true},
			 riesgo_cargo2:{maxlength: 30, texto: true},
			 riesgo_epp2: {maxlength: 30},
				empresa3_riesgo: {maxlength: 20, texto: true},
			 riesgo_cargo3:{maxlength: 30, texto: true},
			 riesgo_epp3: {maxlength: 30},
			 empresa4_riesgo: {maxlength: 20, texto: true},
			 riesgo_cargo4:{maxlength: 30, texto: true},
			 riesgo_epp4: {maxlength: 30},
			 empresa5_riesgo: {maxlength: 20, texto: true},
			 riesgo_cargo5:{maxlength: 30, texto: true},
			 riesgo_epp5: {maxlength: 30},               
			 //nombreempresa: {required: true, minlength: 2, maxlength: 50},

			 ant_infancia: {required: true},
			 ant_cardiaca: {required: true},
			 ant_trauma: {required: true},
			 ant_transmision_sexual: {required: true},
			 ant_vacunas: {required: true},
			 ant_toxicos: {required: true},

			 ant_hipertension: {required: true},
			 ant_piel: {required: true},
			 ant_renal: {required: true},
			 ant_peptica: {required: true},
			 ant_mental: {required: true},

			 ant_alergias: {required: true},
			 ant_hernias: {required: true},
			 ant_oido_nariz_laringe: {required: true},
			 ant_visuales: {required: true},
			 ant_hematicos: {required: true},

			 ant_cirugias: {required: true},
			 ant_carpo: {required: true},
			 ant_vascular: {required: true},
			 ant_varicocele: {required: true},
			 ant_hepatica: {required: true},
				ant_osteomuscular: {required: true},

			 ant_hospital: {required: true},
			 ant_quervein: {required: true},
			 ant_lumbalgias: {required: true},
			 ant_cancer: {required: true},
			 ant_fracturas: {required: true},
			 ant_dislipidemias: {required: true},

			 ant_observacion: {required: true, maxlength: 200},

			 ant_familiar_descripcion: {maxlength: 150},
			 ant_personal_descripcion: {maxlength: 150},

			 gin_menarquia: {digits: true, minlength: 1, min: 1, max:99},
			 gin_metodo: {maxlength: 50},


			 usoproteccion_p: {required: true},

			 ele_proteccion_cargo: {required: true},
			 proteccion_actual: {required: true},
			 casco: {required: true},
			 guantes: {required: true},
			 botas: {required: true},
			 gafas: {required: true},
			 tapabocas: {required: true},
			 overol: {required: true},
			 p_auditivos: {required: true},
			 p_respiratorios: {required: true},
			 p_otros: {maxlength: 60},
			 solo_ad: {maxlength: 60},
			 p_adecuada: {required: true},
			 todoadecuado: {required: true},

			 accidentestrabajo: {required: true},
			 empresaaccidente: {maxlength: 20, texto: true},
			 causaaccidente: {maxlength: 30},
			 parteafectadaaccidente: {maxlength: 30},
			 empresaaccidente2: {maxlength: 20, texto: true},
			 causaaccidente2: {maxlength: 30},
			 parteafectadaaccidente2: {maxlength: 30},
			 empresaaccidente3: {maxlength: 20, texto: true},
			 causaaccidente3: {maxlength: 30},
			 parteafectadaaccidente3: {maxlength: 30},
				empresaaccidente4: {maxlength: 20, texto: true},
			 causaaccidente4: {maxlength: 30},
			 parteafectadaaccidente4: {maxlength: 30},
			 empresaaccidente5: {maxlength: 20, texto: true},
			 causaaccidente5: {maxlength: 30},
			 parteafectadaaccidente5: {maxlength: 30},

			 enfermedad_p:{required: true},
			 enfermedad:{maxlength: 60},
			 empresaenfermedad:{maxlength:30, texto: true},
			 diagnosticoenfermedad: {maxlength: 150},

			 enfermedad2:{maxlength: 60},
			 empresaenfermedad2:{maxlength:30, texto: true},
			 diagnosticoenfermedad2: {maxlength: 150},

			 enfermedad3:{maxlength: 60},
			 empresaenfermedad3:{maxlength:30, texto: true},
			 diagnosticoenfermedad3: {maxlength: 150},

			 enfermedad4:{maxlength: 60},
			 empresaenfermedad4:{maxlength:30, texto: true},
			 diagnosticoenfermedad4: {maxlength: 150},  

			 enfermedad5:{maxlength: 60},
			 empresaenfermedad5:{maxlength:30, texto: true},
			 diagnosticoenfermedad5: {maxlength: 150},

			 deporte: {required: true},
			 sedentario: {required: true},
			 depor_cardiopulmonar: {required: true},
			 cual_deporte: {maxlength: 60},

			 fuma: {required: true}, 
			 fumador: {required: true}, 
			 anosfumador: {digits: true, minlength: 1, min: 1, max:99},
			 exfumador: {required: true},  
			 anosexfumador: {digits: true, minlength: 1, min: 1, max:99}, 
			 cantidad_cigarrillos_dia: {digits: true, minlength: 1, min: 1, max:70}, 
			 tomahab: {required: true},
			 anoshab_beber: {digits: true, minlength: 1, min: 1, max:99},
			 frec_beber: {required: true}, 
			 problemasbebidas: {required: true},
			 cuales_bebidas: {maxlength: 50},
			 exbebedor: {required: true},
			 exbebedor_anos: {digits: true, minlength: 1, min: 1, max:99}, 
			 otroshabitos: {required: true},
			 nombre_otrohabito: {maxlength: 50},
			 medic_regularmente: {required: true},
				nombre_medicamento: {maxlength: 50},

				cirugiaseps: {required: true},
				cuales_cirugias: {maxlength: 60},
				pend_tratamiento: {required: true},
				cuales_tratamientos: {maxlength: 60},
				incapacidadultimosmeses: {required: true},
				motivo_incapacidad: {maxlength: 80}, 
				mano_habil: {required: true},
				cicatrices: {required: true},
				tatuajes: {required: true},
				perimetro_abdominal: {required: true},
				perimetro_toraxico: {required: true},
				otras_mediciones: {maxlength: 120},
				tensionarterial: {required: true},
				frecuenciacardiaca: {required: true},
				frecuenciarespiratoria: {required: true},
				talla: {required: true},
				peso: {required: true},
				pesodiagnostico: {required: true},
				riesgos_suministrado: {required: true},
				suministrado_otro: {maxlength: 50},
			 //botas: {required: true},
		 },

		 messages: /* Accedemos a los campos a través de su nombre: email, nombre, edad */
		 {
			 historia_laboral: {required: 'Selecionar una opcion'},
				anosenempresa: {digits: 'Sólo dígitos', minlength: 'El mínimo permitido son 1 caracteres', maxlength: 'El máximo permitido son 2 caracteres', min: 'Digite un año mayor o igual a 1', max:'Digite un año menor o igual a 99'},
				dependencia: {maxlength: 'El máximo permitido son 50 caracteres'},
			 cargo_historia: {maxlength: 'El máximo permitido son 50 caracteres'},
			 descripcioncargo: {maxlength: 'El máximo permitido son 100 caracteres'},
			 
			 actividades: {maxlength: 'El máximo permitido son 50 caracteres'},
			 acciones: {maxlength: 'El máximo permitido son 50 caracteres'},

			 exposicion_riesgo: {required: 'Selecionar una opcion'},
				empresa1_riesgo: {maxlength: 'El máximo permitido son 20 caracteres', texto: 'Ingrese solo texto'},
			 riesgo_cargo1:{maxlength: 'El máximo permitido son 30 caracteres', texto: 'Ingrese solo texto'},
			 riesgo_epp1: {maxlength: 'El máximo permitido son 30 caracteres'},
				empresa2_riesgo: {maxlength: 'El máximo permitido son 20 caracteres', texto: 'Ingrese solo texto'},
			 riesgo_cargo2:{maxlength: 'El máximo permitido son 30 caracteres', texto: 'Ingrese solo texto'},
			 riesgo_epp2: {maxlength: 'El máximo permitido son 30 caracteres'},
				empresa3_riesgo: {maxlength: 'El máximo permitido son 20 caracteres', texto: 'Ingrese solo texto'},
			 riesgo_cargo3:{maxlength: 'El máximo permitido son 30 caracteres', texto: 'Ingrese solo texto'},
			 riesgo_epp3: {maxlength: 'El máximo permitido son 30 caracteres'},
			 empresa4_riesgo: {maxlength: 'El máximo permitido son 20 caracteres', texto: 'Ingrese solo texto'},
			 riesgo_cargo4:{maxlength: 'El máximo permitido son 30 caracteres', texto: 'Ingrese solo texto'},
			 riesgo_epp4: {maxlength: 'El máximo permitido son 30 caracteres'},
			 empresa5_riesgo: {maxlength: 'El máximo permitido son 20 caracteres', texto: 'Ingrese solo texto'},
			 riesgo_cargo5:{maxlength: 'El máximo permitido son 30 caracteres', texto: 'Ingrese solo texto'},
			 riesgo_epp5: {maxlength: 'El máximo permitido son 30 caracteres'},

			 ant_infancia: {required: 'Seleccione'},
			 ant_cardiaca: {required: 'Seleccione'},
			 ant_trauma: {required: 'Seleccione'},
			 ant_transmision_sexual: {required: 'Seleccione'},
			 ant_vacunas: {required: 'Seleccione'},
			 ant_toxicos: {required: 'Seleccione'},

			 ant_hipertension: {required: 'Seleccione'},
			 ant_piel: {required: 'Seleccione'},
			 ant_renal: {required: 'Seleccione'},
			 ant_peptica: {required: 'Seleccione'},
			 ant_mental: {required: 'Seleccione'},

			 ant_alergias: {required: 'Seleccione'},
			 ant_hernias: {required: 'Seleccione'},
			 ant_oido_nariz_laringe: {required: 'Seleccione'},
			 ant_visuales: {required: 'Seleccione'},
			 ant_hematicos: {required: 'Seleccione'},

			 ant_cirugias: {required: 'Seleccione'},
			 ant_carpo: {required: 'Seleccione'},
			 ant_vascular: {required: 'Seleccione'},
			 ant_varicocele: {required: 'Seleccione'},
			 ant_hepatica: {required: 'Seleccione'},
				ant_osteomuscular: {required: 'Seleccione'},

			 ant_hospital: {required: 'Seleccione'},
			 ant_quervein: {required: 'Seleccione'},
			 ant_lumbalgias: {required: 'Seleccione'},
			 ant_cancer: {required: 'Seleccione'},
			 ant_fracturas: {required: 'Seleccione'},
			 ant_dislipidemias: {required: 'Seleccione'},

			 ant_observacion: {required: 'Este campo es requerido', maxlength: 'El máximo permitido son 200 caracteres'},

			 ant_familiar_descripcion: { maxlength: 'El máximo permitido son 150 caracteres'},
			 ant_personal_descripcion: {maxlength: 'El máximo permitido son 150 caracteres'},

			 gin_menarquia: {digits: 'Sólo dígitos', minlength: 'El mínimo permitido son 1 caracteres', maxlength: 'El máximo permitido son 2 caracteres', min: 'Digite un año mayor o igual a 1', max:'Digite un año menor o igual a 99'},

			 gin_metodo: {maxlength: 'El máximo permitido son 50 caracteres'},

			 usoproteccion_p: {required: 'Selecionar una opcion'},
			 ele_proteccion_cargo: {required: 'Seleccione'},
			 proteccion_actual: {required: 'Seleccione'},
			 casco: {required: 'Seleccione'},
			 guantes: {required: 'Seleccione'},
			 botas: {required: 'Seleccione'},
			 gafas: {required: 'Seleccione'},
			 tapabocas: {required: 'Seleccione'},
			 overol: {required: 'Seleccione'},
			 p_auditivos: {required: 'Seleccione'},
			 p_respiratorios: {required: 'Seleccione'},
			 p_otros: {maxlength: 'El máximo permitido son 60 caracteres'},
			 solo_ad: {maxlength: 'El máximo permitido son 60 caracteres'},
			 p_adecuada: {required: 'Seleccione'},
			 todoadecuado: {required: 'Seleccione'},

			 accidentestrabajo: {required: 'Selecionar una opcion'},
			 empresaaccidente: {maxlength: 'El máximo permitido son 20 caracteres', texto: 'Ingrese solo texto'},
			 causaaccidente: {maxlength: 'El máximo permitido son 30 caracteres'},
			 parteafectadaaccidente: {maxlength: 'El máximo permitido son 30 caracteres'},
			 empresaaccidente2: {maxlength: 'El máximo permitido son 20 caracteres', texto: 'Ingrese solo texto'},
			 causaaccidente2: {maxlength: 'El máximo permitido son 30 caracteres'},
			 parteafectadaaccidente2: {maxlength: 'El máximo permitido son 30 caracteres'},
			 empresaaccidente3: {maxlength: 'El máximo permitido son 20 caracteres', texto: 'Ingrese solo texto'},
			 causaaccidente3: {maxlength: 'El máximo permitido son 30 caracteres'},
			 parteafectadaaccidente3: {maxlength: 'El máximo permitido son 30 caracteres'},
			 empresaaccidente4: {maxlength: 'El máximo permitido son 20 caracteres', texto: 'Ingrese solo texto'},
			 causaaccidente4: {maxlength: 'El máximo permitido son 30 caracteres'},
			 parteafectadaaccidente4: {maxlength: 'El máximo permitido son 30 caracteres'}, 
			 empresaaccidente5: {maxlength: 'El máximo permitido son 20 caracteres', texto: 'Ingrese solo texto'},
			 causaaccidente5: {maxlength: 'El máximo permitido son 30 caracteres'},
			 parteafectadaaccidente5: {maxlength: 'El máximo permitido son 30 caracteres'}, 

			 enfermedad_p: {required: 'Selecionar una opcion'},  
			 enfermedad:{maxlength: 'El máximo permitido son 60 caracteres'}, 
			 empresaenfermedad:{maxlength: 'El máximo permitido son 30 caracteres', texto: 'Ingrese solo texto'},
			 diagnosticoenfermedad: {maxlength: 'El máximo permitido son 150 caracteres'}, 

			 enfermedad2:{maxlength: 'El máximo permitido son 60 caracteres'}, 
			 empresaenfermedad2:{maxlength: 'El máximo permitido son 30 caracteres', texto: 'Ingrese solo texto'},
			 diagnosticoenfermedad2: {maxlength: 'El máximo permitido son 150 caracteres'},

			 enfermedad3:{maxlength: 'El máximo permitido son 60 caracteres'}, 
			 empresaenfermedad3:{maxlength: 'El máximo permitido son 30 caracteres', texto: 'Ingrese solo texto'},
			 diagnosticoenfermedad3: {maxlength: 'El máximo permitido son 150 caracteres'},

			 enfermedad4:{maxlength: 'El máximo permitido son 60 caracteres'}, 
			 empresaenfermedad4:{maxlength: 'El máximo permitido son 30 caracteres', texto: 'Ingrese solo texto'},
			 diagnosticoenfermedad4: {maxlength: 'El máximo permitido son 150 caracteres'},  

			 enfermedad5:{maxlength: 'El máximo permitido son 60 caracteres'}, 
			 empresaenfermedad5:{maxlength: 'El máximo permitido son 30 caracteres', texto: 'Ingrese solo texto'},
			 diagnosticoenfermedad5: {maxlength: 'El máximo permitido son 150 caracteres'},

			 deporte: {required: 'Selecionar una opcion'},
			 sedentario: {required: 'Selecionar una opcion'},
			 depor_cardiopulmonar: {required: 'Selecionar una opcion'},
			 cual_deporte: {maxlength: 'El máximo permitido son 60 caracteres'},

			 fuma: {required: 'Selecionar una opcion'},
			 fumador: {required: 'Selecionar una opcion'},
			 anosfumador: {digits: 'Sólo dígitos', minlength: 'El mínimo permitido son 1 caracteres', maxlength: 'El máximo permitido son 2 caracteres', min: 'Digite un año mayor o igual a 1', max:'Digite un año menor o igual a 99'},
			 exfumador: {required: 'Selecionar una opcion'},
			 anosexfumador: {digits: 'Sólo dígitos', minlength: 'El mínimo permitido son 1 caracteres', maxlength: 'El máximo permitido son 2 caracteres', min: 'Digite un año mayor o igual a 1', max:'Digite un año menor o igual a 99'},
			 cantidad_cigarrillos_dia: {digits: 'Sólo dígitos', minlength: 'El mínimo permitido son 1 caracteres', maxlength: 'El máximo permitido son 2 caracteres', min: 'Digite un año mayor o igual a 1', max:'Digite un  menor o igual a 70'},
			 tomahab: {required: 'Selecionar una opcion'},
			 anoshab_beber: {digits: 'Sólo dígitos', minlength: 'El mínimo permitido son 1 caracteres', maxlength: 'El máximo permitido son 2 caracteres', min: 'Digite un año mayor o igual a 1', max:'Digite un año menor o igual a 99'},
			 frec_beber: {required: 'Selecionar una opcion'},
			 problemasbebidas: {required: 'Selecionar una opcion'}, 
			 cuales_bebidas: {maxlength: 'El máximo permitido son 50 caracteres'},
			 exbebedor: {required: 'Selecionar una opcion'},
			 exbebedor_anos: {digits: 'Sólo dígitos', minlength: 'El mínimo permitido son 1 caracteres', maxlength: 'El máximo permitido son 2 caracteres', min: 'Digite un año mayor o igual a 1', max:'Digite un año menor o igual a 99'},
			 otroshabitos: {required: 'Selecionar una opcion'},
			 nombre_otrohabito: {maxlength: 'El máximo permitido son 50 caracteres'},
			 medic_regularmente: {required: 'Selecionar una opcion'},
			 nombre_medicamento: {maxlength: 'El máximo permitido son 50 caracteres'},
			 cirugiaseps: {required: 'Selecionar una opcion'},
			 cuales_cirugias: {maxlength: 'El máximo permitido son 50 caracteres'},
			 pend_tratamiento: {required: 'Selecionar una opcion'},
			 cuales_tratamientos: {maxlength: 'El máximo permitido son 50 caracteres'},
			 incapacidadultimosmeses: {required: 'Selecionar una opcion'},
			 motivo_incapacidad: {maxlength: 'El máximo permitido son 80 caracteres'}, 
			 mano_habil: {required: 'Selecionar una opcion'},
			 cicatrices: {required: 'Selecionar una opcion'},
			 tatuajes: {required: 'Selecionar una opcion'},
			 perimetro_abdominal: {required: 'Selecionar una opcion'},
			 perimetro_toraxico: {required: 'Selecionar una opcion'},
			 otras_mediciones: {maxlength: 'El máximo permitido son 120 caracteres'},
			 tensionarterial: {required: 'Este campo es requerido'},
			 frecuenciacardiaca: {required: 'Este campo es requerido'},
			 frecuenciarespiratoria: {required: 'Este campo es requerido'},
				talla: {required: 'Este campo es requerido'},
				peso: {required: 'Este campo es requerido'},
				pesodiagnostico: {required: 'Selecionar una opcion'},
				riesgos_suministrado: {required: 'Selecionar una opcion'},
				suministrado_otro: {maxlength: 'El máximo permitido son 50 caracteres'}
		 }

			});
		});
	});
</script>

<form method="POST"  action="" id="formulario" name="form">

<input class="form-control" type="text" name="historia" value='<?php echo $historia; ?>' readonly="readonly" style="display: none;">

<div class="container">

	<input type="text" name="horafinal" /*style="display: none;*/">

	<div class="panel panel-default">
		<div class="panel-heading text-center"><label>Datos  <a href="#" data-toggle="modal" data-target="#historial">Paciente</a> - Empresa</label></div>
			<div class="panel-body">    
				<img class="img-responsive img-thumbnail paciente_datos" alt="Foto del Paciente" src=<?php echo $ruta_destino."".$historia.'.png'; ?> >
				<div class="col-sm-6">
					<div class="tabla_paciente">
						<table class="table table-bordered">
						<thead>
							<th>Nombres-Apellidos:</th>
							<th>Tipo Documento:</th>
							<th>Numero Documento:</th>
						</thead>
							<tbody style="font-size: 13px;">
								<tr>
									<td><?php echo $datos['nombres_apellidos']; ?></td>
									<td><?php echo $datos['tipo_documento']; ?></td>
									<td><?php echo $datos['numero_documento']; ?></td> 
								</tr>
								<thead>
									<th>Edad:</th>
									<th>Fecha Nacimiento:</th>
									<th>Genero:</th>
								</thead>
								<tr>   
									<td><?php echo $datos['edad']; ?></td>
									<td><?php echo $datos['fecha_nacimiento']; ?></td>
									<td><?php echo $datos['genero']; ?></td>
								</tr>
								<thead>      
									<th>Estado Civil:</th>
									<th>Lugar Nacimiento:</th>
									<th>Numero Celular:</th>
								</thead>
								<tr>   
									<td><?php echo $datos['estado_civil']; ?></td>
									<td><?php echo $datos['lugar_nacimiento']; ?></td>
									<td><?php echo $datos['celular']; ?></td>
								</tr>
								<thead> 
									<th>Direccion</th>
									<th colspan="3">Motivo de Evaluacion:</th>
								</thead>
								<tr>               
									<td><?php echo $datos['direccion']; ?></td>  
									<td colspan="3"><?php echo $datos['motivo_evaluacion']; ?></td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>

				<div class="col-sm-12"> 
					<table class="table table-bordered">
						<tbody style="font-size: 13px;">
						<thead>
							<th>Nombre de la Empresa:</th>
							<th>Actividad Economica:</th>
							<th>Ciudad:</th>
							<th>Direccion de la empresa</th>
							<th>Numero de Nit</th>
							<th>Telefono</th>
						</thead>
							<tr>
								<td><?php echo $datos['nombre_empresa']; ?></td>
								<td><?php echo $datos['actividad_economica']; ?></td>
								<td><?php echo $datos['ciudad']; ?></td>
								<td><?php echo $datos['direccion_empresa']; ?></td>
								<td><?php echo $datos['numero_nit']; ?></td>
								<td><?php echo $datos['telefono_empresa']; ?></td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>

		<div class="panel panel-default">
			<div class="panel-heading">
				<div class="text-center">
					<label for="historia_laboral" generated="true" class="error"></label><br> 
					<label>Historia Laboral: </label> 
					<input type="radio" name="historia_laboral" value="Si"> Si 
					<input type="radio" name="historia_laboral" value="No"> No
				</div>
			</div>
			<div class="panel-body">
				<div class="row">
					<div class=" col-sm-6">
						<label>Años en la empresa:</label>
						<input class="form-control" type="text" name="anosenempresa" onkeypress="return esInteger(event)">
					</div>

					<div class=" col-sm-6">
						<label>Cargo:</label>
						<input class="form-control" type="text" name="cargo_historia" id="cargo_historia">
						<br>
					</div>
				</div>

				<div class="row">
					<div class=" col-sm-6">
						<label for="dependencia" generated="true" class="error"></label>
						<label>Dependencia:</label>
						<input class="form-control" type="text" name="dependencia">
					</div>
					
					<div class="col-sm-6">
						<label for="">Turno:</label> <label for="turno" generated="true" class="error"></label>
						<fieldset>
							
							<input type="radio" name="turno" value="Diurno"> Diurno
							<input type="radio" name="turno" value="Nocturno"> Nocturno
							<input type="radio" name="turno" value="Rotativo"> Rotativo
						</fieldset>
					</div>
				</div>
				<br>

				<div class="row">
					<div class="col-sm-12">
						<label>Descripcion del cargo:</label>
						<textarea class="form-control" type="text" name="descripcioncargo" rows="1"></textarea>
					</div>

<!-- 						<div class="text-center">
							<table class="table table-bordered">    
								<thead>
									<tr>
										<th class="text-center">Turno: <label for="turno" generated="true" class="error"></label> </th>
									</tr>
								</thead>
								<tbody>
								<tr>
									<td>
									<div class="text-center"><input type="radio" name="turno" value="Diurno"> Diurno
									<input type="radio" name="turno" value="Nocturno"> Nocturno
									<input type="radio" name="turno" value="Rotativo"> Rotativo</div></td>
								</tr>
								</tbody>
							</table>
						</div> -->
					</div><!--finsm-->
					<br>
				<!-- </div> -->
					<div class="row"> 
						<div class="col-sm-6">
							<div class="text-center">
								<table class="table table-bordered">    
									<thead>
										<tr>
											<th><label>Actividades:</label></th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>
												<div class="text-center">
													<input type="checkbox" name="actividades[]" value="Pie"> Pie
													<input type="checkbox" name="actividades[]" value=" Sentado"> Sentado
													<input type="checkbox" name="actividades[]" value=" Inclinado"> Inclinado
													<input type="checkbox" name="actividades[]" value=" Arrodillado"> Arrodillado
													<input type="checkbox" name="actividades[]" value=" Acostado"> Acostado 
													<input type="text" name="actividades[]" class="form-control input-sm">
												</div>
											</td>
										</tr>
									</tbody>
								</table>
							</div>
						</div><!--finsm--> 
			
				<div class="col-sm-6">
					<div class="text-center">
						<table class="table table-bordered"> 
							<thead>
								<tr>
									<th>Acciones:</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td class="text-center">
										<input type="checkbox" name="acciones[]" value="Alcanzar" checked> Alcanzar
										<input type="checkbox" name="acciones[]" value="Halar"> Halar
										<input type="checkbox" name="acciones[]" value="Empujar"> Empujar
										<input type="checkbox" name="acciones[]" value="Levantar"> Levantar
										<input type="checkbox" name="acciones[]" value="Arrastrar"> Arrastrar
										<input type="checkbox" name="acciones[]" value="Manuales"> Manuales
										<input type="checkbox" name="acciones[]" value="MMSS"> MMSS
										<input type="checkbox" name="acciones[]" value="MMII"> MMII <br>
										<input type="text" name="acciones[]" class="form-control input-sm">  
									</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div><!--finsm-->
			</div>
		</div>
	</div><br>	

<div class="container">
	<div class="panel panel-default">
		<div class="panel-heading"> 
			<div class="text-center">
				<label for="exposicion_riesgo" generated="true" class="error"></label><br>
				<label>Exposicion a factores de riesgo: </label> 
				<input type="radio" name="exposicion_riesgo[]" value="Si"> Si
				<input type="radio" name="exposicion_riesgo[]" value="No"> No
			</div>
		</div>
		<div class="panel-body">
				<label class="text-center"> </label>
				<table class="table table-bordered" id="tablsa">    
					<thead>
						<tr>
							<th class="text">Empresa</th>
							<th class="text-center" colspan="8">Factores-Riesgo</th>
							<th class="text-center">CARGO</th>
							<th class="text-center">TIEMPO</th>
							<th class="text-center">Elemento Proteccion Personal</th>
						</tr>
					</thead>
					<tbody id="tabla1">
						<tr class="text-center">
							<td>
								<textarea class="form-control input-sm" type="text" name="empresa1_riesgo[]"></textarea>
								<label for="empresa1_riesgo" generated="true" class="error"></label><br>
							</td>
							<td colspan="8">
								<textarea class="form-control input-sm" type="text" name="factoresriesgo[]"></textarea>
							</td>
							<td>
								<textarea class="form-control input-sm" type="text" name="riesgo_cargo1[]"></textarea>
							</td>
							<td>
								<textarea class="form-control input-sm" type="text" name="riesgo_tiempo1[]"></textarea>
							</td>
							<td>
								<textarea class="form-control input-sm" type="text" name="riesgo_epp1[]"></textarea>
							</td> 
						</tr>
					</tbody>
				</table>
					<input type="button" value="Agregar fila" id="agregarFila1" class="btn-info">
					<input type="button" value="Eliminar fila" class="eliminarFila" >
					<div class="text-center">
						<label>F:</label> Fisico | <label>Q:</label> Quimico | <label>B:</label> Biologico | <label>ERG:</label> Ergonomico | <label>MEC:</label> Mecanico | <label>PSC:</label> Psicosocial | <label>ELEC:</label> Electrico
					</div>
		</div>
	</div>      
</div><!--container-->

<!-- testing -->     
		<div class="panel panel-default">
			<div class="panel-heading text-center"><label>Antecedentes Personales-Familiares: </label></div>
			<div class="panel-body">          
				<div class="col-sm-12">
					<table class="table table-bordered">
						<thead class="active size_font">
							<th class="text-center">Infancia:</th>
							<th class="text-center">Enfermedad Cardiaca:</th>
							<th class="text-center">Trauma:</th>
							<th class="text-center">Enf. de Transmisión Sexual:</th>
							<th class="text-center">Vacunas Y Dosis:</th>
							<th class="text-center">Toxicos:</th>
						</thead>    
						<tbody>
							<tr class="text-center">
								<td>
									<label for="ant_infancia" generated="true" class="error"></label><br>
									Si <input type="radio" name="ant_infancia" value="Si"> /
									No <input type="radio" name="ant_infancia" value="No" > 
								</td>
								<td>
									<label for="ant_cardiaca" generated="true" class="error"></label><br>
									Si <input type="radio" name="ant_cardiaca" value="Si"> /
									No <input type="radio" name="ant_cardiaca" value="No" checked> 
								</td>
								<td>
									<label for="ant_trauma" generated="true" class="error"></label><br>
									Si <input type="radio" name="ant_trauma" value="Si"> /
									No <input type="radio" name="ant_trauma" value="No" checked>
								</td>
								<td>
									<label for="ant_transmision_sexual" generated="true" class="error"></label><br>
									Si <input type="radio" name="ant_transmision_sexual" value="Si"> /
									No <input type="radio" name="ant_transmision_sexual" value="No" checked>
								</td>
								<td>
									<label for="ant_vacunas" generated="true" class="error"></label><br>
									Si <input type="radio" name="ant_vacunas" value="Si">
									No <input type="radio" name="ant_vacunas" value="No" checked>
								</td>

								<td>
									<label for="ant_toxicos" generated="true" class="error"></label><br>
									Si <input type="radio" name="ant_toxicos" value="Si">
									No<input type="radio" name="ant_toxicos" value="No" checked>
								</td>
							</tr>

							<thead class="active size_font">
								<th class="text-center">Hipertensión Arterial:</th>
								<th class="text-center">Enfermedad Piel y Anexos:</th>
								<th class="text-center">Enfermedad Vias Renales:</th>
								<th class="text-center">Enfermedad Pulmonar:</th>
								<th class="text-center">Enfermedad Acido Pèptica:</th>
								<th class="text-center">Enfermedad Mental:</th>
							</thead>
							<tr class="text-center">
								<td>
									<label for="ant_hipertension" generated="true" class="error"></label><br>
									Si <input type="radio" name="ant_hipertension" value="Si">
									No<input type="radio" name="ant_hipertension" value="No" checked>
								</td>
								<td>
									<label for="ant_piel" generated="true" class="error"></label><br>
									Si <input type="radio" name="ant_piel" value="Si">
									No<input type="radio" name="ant_piel" value="No" checked>
								</td>
								<td>
									<label for="ant_renal" generated="true" class="error"></label><br>
									Si <input type="radio" name="ant_renal" value="Si">
									No <input type="radio" name="ant_renal" value="No" checked>
								</td>
								<td>
									<label for="ant_pulmonar" generated="true" class="error"></label><br>
									Si <input type="radio" name="ant_pulmonar" value="Si">
									No <input type="radio" name="ant_pulmonar" value="No" checked>
								</td>
								<td>
								<label for="ant_peptica" generated="true" class="error"></label><br>
									Si <input type="radio" name="ant_peptica" value="Si">
									No <input type="radio" name="ant_peptica" value="No" checked>
								</td>
								<td>
								<label for="ant_mental" generated="true" class="error"></label><br>
									Si <input type="radio" name="ant_mental" value="Si">
									No <input type="radio" name="ant_mental" value="No" checked>
								</td>
							</tr>

							<thead class="active size_font">
								<th class="text-center">Alergias:</th>
								<th class="text-center">Hernias:</th>
								<th class="text-center">Enf. Oído–Nariz–Laringe:</th>
								<th class="text-center">Enfermedades Visuales:</th>
								<th class="text-center">Diabetes:</th>
								<th class="text-center">Enfermedad Hemàticos:</th>
							</thead>
							<tr class="text-center">
								<td>
									<label for="ant_alergias" generated="true" class="error"></label><br>
									Si <input type="radio" name="ant_alergias" value="Si">
									No<input type="radio" name="ant_alergias" value="No" checked>
								</td>
								<td>
									<label for="ant_hernias" generated="true" class="error"></label><br>
									Si <input type="radio" name="ant_hernias" value="Si">
									No<input type="radio" name="ant_hernias" value="No" checked>
								</td>
								<td>
									<label for="ant_oido_nariz_laringe" generated="true" class="error"></label><br>
									Si <input type="radio" name="ant_oido_nariz_laringe" value="Si">
									No<input type="radio" name="ant_oido_nariz_laringe" value="No" checked>
								</td>

								<td>
									<label for="ant_visuales" generated="true" class="error"></label><br>
									Si <input type="radio" name="ant_visuales" value="Si">
									No<input type="radio" name="ant_visuales" value="No" checked>
								</td>
				
								<td>
									<label for="ant_diabetes" generated="true" class="error"></label><br>
									Si <input type="radio" name="ant_diabetes" value="Si">
									No<input type="radio" name="ant_diabetes" value="No" checked>
								</td>

								<td>
									<label for="ant_hematicos" generated="true" class="error"></label><br>
									Si <input type="radio" name="ant_hematicos" value="Si">
									No<input type="radio" name="ant_hematicos" value="No" checked>
								</td>
							</tr>

							<thead class="active size_font">
								<th class="text-center">Cirugias:</th>
								<th class="text-center">Tunel del Carpo:</th>
								<th class="text-center">Enfermedad Vascular:</th>
								<th class="text-center">Varicocele:</th>
								<th class="text-center">Enfermedad hepàtica:</th>
								<th class="text-center">Osteomuscular:</th>
							</thead>
							<tr class="text-center">
								<td>
									<label for="ant_cirugias" generated="true" class="error"></label><br>
									Si <input type="radio" name="ant_cirugias" value="Si">
									No<input type="radio" name="ant_cirugias" value="No" checked>
								</td>

								<td>
									<label for="ant_carpo" generated="true" class="error"></label><br>
									Si <input type="radio" name="ant_carpo" value="Si">
									No<input type="radio" name="ant_carpo" value="No" checked>
								</td>

								<td>
									<label for="ant_vascular" generated="true" class="error"></label><br>
									Si <input type="radio" name="ant_vascular" value="Si">
									No<input type="radio" name="ant_vascular" value="No" checked>
								</td>

								<td>
									<label for="ant_varicocele" generated="true" class="error"></label><br>
									Si <input type="radio" name="ant_varicocele" value="Si">
									No<input type="radio" name="ant_varicocele" value="No" checked>
								</td>

								<td>
									<label for="ant_hepatica" generated="true" class="error"></label><br>
									Si <input type="radio" name="ant_hepatica" value="Si">
									No<input type="radio" name="ant_hepatica" value="No" checked>
								</td>

								<td>
									<label for="ant_osteomuscular" generated="true" class="error"></label><br>
									Si <input type="radio" name="ant_osteomuscular" value="Si">
									No<input type="radio" name="ant_osteomuscular" value="No" checked>
								</td>
							</tr>

							<thead class="active size_font">
								<th class="text-center">Hospitalizaciones:</th>
								<th class="text-center">Enfermedad Quervein:</th>
								<th class="text-center">Lumbalgias:</th>
								<th class="text-center">Cancer:</th>
								<th class="text-center">Fracturas:</th>
								<th class="text-center">Dislipidemias:</th>
							</thead>
							<tr class="text-center">
								<td>
									<label for="ant_hospital" generated="true" class="error"></label><br>
									Si <input type="radio" name="ant_hospital" value="Si">
									No<input type="radio" name="ant_hospital" value="No" checked>
								</td>
								<td>
									<label for="ant_quervein" generated="true" class="error"></label><br>
									Si <input type="radio" name="ant_quervein" value="Si">
									No<input type="radio" name="ant_quervein" value="No" checked>
								</td>
								<td>
									<label for="ant_lumbalgias" generated="true" class="error"></label><br>
									Si <input type="radio" name="ant_lumbalgias" value="Si">
									No<input type="radio" name="ant_lumbalgias" value="No" checked>
								</td>
								<td>
									<label for="ant_cancer" generated="true" class="error"></label><br>
									Si <input type="radio" name="ant_cancer" value="Si">
									No<input type="radio" name="ant_cancer" value="No" checked>
								</td>
								<td>
									<label for="ant_fracturas" generated="true" class="error"></label><br>
									Si <input type="radio" name="ant_fracturas" value="Si">
									No<input type="radio" name="ant_fracturas" value="No" checked>
								</td>
								<td>
									<label for="ant_dislipidemias" generated="true" class="error"></label><br>
									Si <input type="radio" name="ant_dislipidemias" value="Si">
									No<input type="radio" name="ant_dislipidemias" value="No" checked>
								</td>
							</tr>
						</tbody>
					</table>
				</div><!--finsm-->

				<div class="">
					<th class="text-center">Observaciones: </th> 
					<td>
						<label for="ant_observacion" generated="true" class="error"></label>
						<textarea  class="form-control" type="text" name="ant_observacion" rows="3"></textarea>
					</td>
					<br>
				</div>
				
				<label for="">Familiar</label>
				<div class="input-group mb-3">
				  <div class="input-group-prepend">
				    <div class="input-group-text">
				      No Refiere: <div class="separator"></div> <input type="checkbox" aria-label="Checkbox for following text input"  name="ant_familiar" value="Si">
				    </div>
				  </div>
				  <textarea type="text" class="form-control" aria-label="Text input with checkbox"  name="ant_familiar_descripcion" rows="1"></textarea>
				</div>

				<label for="">Personal</label>
				<div class="input-group mb-3">
				  <div class="input-group-prepend">
				    <div class="input-group-text">
				      No Refiere: <div class="separator"></div> <input type="checkbox" aria-label="Checkbox for following text input"  name="ant_personal" value="Si">
				    </div>
				  </div>
				  <textarea type="text" class="form-control" aria-label="Text input with checkbox"  name="ant_personal_descripcion" rows="1"></textarea>
				</div>
			 </div> 
		</div>

		<div class="panel-group">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h4 class="panel-title">
						<a data-toggle="collapse" href="#collapse1"><div class="text-center">Antecedentes Ginecologicos:</div></a>
					</h4>
				</div>
				<div id="collapse1" class="panel-collapse collapse">
					<div class="panel-body">
						<table class="table table-bordered"> 
							<thead>
								<th class="text-center" style="width:4px !important;">Menarquia:</th>
								<!-- <th class="text-center">Ciclos:</th> -->
								<th class="text-center" colspan="4">Ficha Obstetrica:</th>
								<th>planificacion y metodo</th>
							</thead>   
							<tbody>
								<tr class="text-center">
									<td>
										<div class="input-group input-group-sm mb">
										  <div class="input-group-prepend">
										    <span class="input-group-text" id="inputGroup-sizing-sm">Años</span>
										  </div>
										  	<label for="gin_menarquia" generated="true" class="error"></label>
											<input type="number" name="gin_menarquia" class="form-control input-sm" onkeypress="return esInteger(event)">
										</div><br>

										<div class="input-group mb-3">
										  <div class="input-group-prepend">
										    <label class="input-group-text" for="inputGroupSelect01">Ciclos</label>
										  </div>
										  <select  name="gin_ciclo" class="custom-select" id="inputGroupSelect01">
										    <option selected>Seleccionar</option>
										    <option value="Regular">Regular</option>
										    <option value="Irregular">Irregular</option>
										    <option value="Dias">Dias</option>
										  </select>
										</div>
									</td>
<!-- 									<td>
										<div class="form-inline">Regular 
											<input type="radio" name="gin_ciclo" value="Regular">
											| Irregular <input type="radio" name="gin_ciclo" value="Irregular">
											| Dias <input type="radio" name="gin_ciclo" value="Dias">
										</div>
									</td> -->
									<td colspan="4" class="size_font">
										Gestacion <input type="checkbox" name="gin_obstetrica[]" value="Gestacion">
										| Parto <input type="checkbox" name="gin_obstetrica[]" value="Parto">
										| Cesárea <input type="checkbox" name="gin_obstetrica[]" value="Cesarea">
										| Aborto <input type="checkbox" name="gin_obstetrica[]" value="Aborto">
										| Ectópico <input type="checkbox" name="gin_obstetrica[]" value="Ectopico">
										| Hijos Vivos <input type="checkbox" name="gin_obstetrica[]" value="Hijos Vivos">
										| Hijos Muertos <input type="checkbox" name="gin_obstetrica[]" value="Hijos Muertos">
										<!--  -->
<!-- 										<label for="gin_metodo" generated="true" class="error"></label>
										<label for="">Planificacion y Metodo:</label>
										<div class="input-group mb-3">
										  <div class="input-group-prepend">
										    <div class="input-group-text">
											Si <input type="radio" name="gin_planifica" value="Si"> <div class="separator">/</div>
											No <input type="radio" name="gin_planifica" value="No">
										    </div>
										  </div>
										  <textarea type="text" class="form-control" aria-label="Text input with checkbox"  name="gin_metodo" class="form-control input-sm" rows="1"></textarea>
										</div> -->

										<!--  -->
<!-- 										<div class="form-inline"><label>Planifica:</label> 
											Si <input type="radio" name="gin_planifica" value="Si"> 
											No <input type="radio" name="gin_planifica" value="No">

											<label>Metodo:</label>
											<label for="gin_metodo" generated="true" class="error"></label> 
											<input type="text" name="gin_metodo" class="form-control input-sm">
										</div> -->
									</td>
									<td>
										<div class="input-group mb-3">
										  <div class="input-group-prepend">
										    <div class="input-group-text">
											Si <input type="radio" name="gin_planifica" value="Si"> <div class="separator">/</div>
											No <input type="radio" name="gin_planifica" value="No">
										    </div>
										  </div>
										  <label for="gin_metodo" generated="true" class="error"></label><br>
										  <textarea type="text" class="form-control" aria-label="Text input with checkbox"  name="gin_metodo" class="form-control input-sm" rows="3"></textarea>
										</div>
									</td>
								</tr>
									<thead>
										<th class="text-center">Ultima Mestruacion :</th>
										<th class="text-center">Ultima Citologia :</th>
										<th class="text-center size_font">Flujo Vaginal:</th>
										<th class="text-center">Dolor Pelvico:</th>
										<th class="text-center">Dolor Senos:</th>
										<th class="text-center">Resultado:</th>
									</thead>
								<tr class="text-center">
									<td>
										<input class="form-control input-sm" type="date" name="gin_ult_mestruacion" >
									</td>
									<td>
										<input class="form-control input-sm" type="date" name="gin_ult_citologia" >
									</td>
									<td>  
										 Si <input type="radio" name="gin_flujo" value="Si"> / 
										 No <input type="radio" name="gin_flujo" value="No">
									</td>
									<td>   
										Si <input type="radio" name="gin_dolor_pelvico" value="Si"> / 
										No <input type="radio" name="gin_dolor_pelvico" value="No">
									</td>
									<td>
										Si <input type="radio" name="gin_dolor_senos" value="Si"> / 
										No <input type="radio" name="gin_dolor_senos" value="No">
									</td>
									<td>
										Normal: <input type="radio" name="resultado_ginecologia" value="Normal"> / Anormal: <input type="radio" name="resultado_ginecologia" value="Anormal">
									</td> 
								</tr>
							</tbody>
						</table>
					</div>
				</div>  
			</div>
		</div>

		<div class="panel panel-default">
			<div class="panel-heading text-center">
				<label for="usoproteccion_p" generated="true" class="error"></label><br>
				<label>Uso de Elementos de Proteccion Personal: </label> 
				<input type="radio" name="usoproteccion_p" value="Si"> Si 
				<input type="radio" name="usoproteccion_p" value="No"> No
			</div>

			<div class="panel-body">
				<table class="table table-bordered"> 
					<thead class="size_font">
						<th class="text-center">En el Cargo o Empresa:</th>
						<th class="text-center">Actual:</th>
						<th class="text-center">Casco:</th>
						<th class="text-center">Guantes:</th>
						<th class="text-center">Botas:</th>
						<th class="text-center">Gafas:</th>
						
						<th class="text-center">Overol:</th>
					</thead>   
					<tbody>
						<tr class="text-center">
							<td>
								<label for="ele_proteccion_cargo" generated="true" class="error"></label>
								Si <input type="radio" name="ele_proteccion_cargo" value="Si"> / 
								No <input type="radio" name="ele_proteccion_cargo" value="No" checked>
							</td>

							<td>
								<label for="proteccion_actual" generated="true" class="error"></label>
								Si <input type="radio" name="proteccion_actual" value="Si"> / 
								No <input type="radio" name="proteccion_actual" value="No" checked>
							</td>

							<td>
								<label for="casco" generated="true" class="error"></label>
								Si <input type="radio" name="casco" value="Si"> / 
								No <input type="radio" name="casco" value="No" checked>
							</td>

							<td>
								<label for="guantes" generated="true" class="error"></label>
								Si <input type="radio" name="guantes" value="Si"> / 
								No <input type="radio" name="guantes" value="No" checked>
							</td>

							<td>
								<label for="botas" generated="true" class="error"></label>
								Si <input type="radio" name="botas" value="Si"> / 
								No <input type="radio" name="botas" value="No" checked>
							</td>

							<td>
								<label for="gafas" generated="true" class="error"></label>
								Si <input type="radio" name="gafas" value="Si"> / 
								No <input type="radio" name="gafas" value="No" checked>
							</td>

							<td>
								<label for="overol" generated="true" class="error"></label> 
								Si <input type="radio" name="overol" value="Si"> / 
								No <input type="radio" name="overol" value="No" checked>
							</td>
						</tr>
						<thead>
							<th class="text-center">Tapabocas:</th>
							<th class="text-center">P. Auditivos:</th>
							<th class="text-center">P. Respiratorios:</th>
							<th class="text-center">Otros:</th>
							<th class="text-center">¿Adecuados?</th>
							<th class="text-center">Todas:</th>
							<th class="text-center">Solo:</th>
						</thead>
						<tr class="text-center">
							<td>
								<div class="radiobtn">
									<label for="tapabocas" generated="true" class="error"></label>
									Si <input type="radio" name="tapabocas" value="Si"> / 
									No <input type="radio" name="tapabocas" value="No" checked>
								</div>
							</td>
							<td>
								<div class="radiobtn">
									<label for="p_auditivos" generated="true" class="error"></label>
									Si <input type="radio" name="p_auditivos" value="Si"> / 
									No <input type="radio" name="p_auditivos" value="No" checked>
								</div>  
							</td>

							<td>
								<div class="radiobtn">
									<label for="p_respiratorios" generated="true" class="error"></label>
									Si <input type="radio" name="p_respiratorios" value="Si"> / 
									No <input type="radio" name="p_respiratorios" value="No" checked>
								</div>  
							</td>

							<td>		
								<textarea type="text" name="p_otros" class="form-control input-sm" rows="1"></textarea> 
								<label for="p_otros" generated="true" class="error"></label>
							</td>  

							<td>
								<div class="radiobtn">
									<label for="p_adecuada" generated="true" class="error"></label>
									Si <input type="radio" name="p_adecuada" value="Si"> / 
									No <input type="radio" name="p_adecuada" value="No" checked>
								</div>
							</td>

							<td> 
								<div class="radiobtn">
									<label for="todoadecuado" generated="true" class="error"></label>
									Si <input type="radio" name="todoadecuado" value="Si"> / 
									No <input type="radio" name="todoadecuado" value="No" checked>
								</div>
							</td>

							<td>
								<textarea class="form-control input-sm" type="text" name="solo_ad" rows="1"></textarea>
								<label for="solo_ad" generated="true" class="error"></label>
							</td> 
						</tr>
					</tbody>
				</table>
			</div>
		</div>


<div class="container">
	<br>
	<div class="panel panel-default">
		<div class="panel-heading text-center">
			<label for="accidentestrabajo" generated="true" class="error"></label><br>
			<label>Accidentes de Trabajo: </label> 
			<input type="radio" name="accidentestrabajo" value="Si"> Si 
			<input type="radio" name="accidentestrabajo" value="No"> No
		</div>

		<div class="panel-body">    		      
				<label class="text-center"> </label>
				<table class="table table-bordered">  
					<thead>
						<th class="text-center"><label>Fecha</label></th>
						<th class="text-center"><label>Empresa</label></th>
						<th class="text-center"><label>Causa</label></th>
						<th class="text-center"><label>Lesion</label></th>
						<th class="text-center"><label>Parte Afectada</label></th>
						<th class="text-center"><label>Incapacidad</label></th>
						<th class="text-center"><label>Secuela</label></th>
					</thead>  
					<tbody id="tabla2">
						<tr class="text-center">	            	
						<td>
							<input class="form-control input-sm" style="width: 160px;" type="date" name="fechaaccidente" > 
						</td>
						<td>
							<textarea class="form-control input-sm" type="text" name="empresaaccidente" rows="1"></textarea>
							<label for="empresaaccidente" generated="true" class="error"></label>
						</td>
						<td>                  
							<textarea class="form-control input-sm" type="text" name="causaaccidente" rows="1"></textarea>
							<label for="causaaccidente" generated="true" class="error"></label>
						</td>
						<td>
							<textarea name="lesionaccidente" class="form-control input-sm" rows="1"></textarea>
						</td>
						<td>
							<textarea class="form-control input-sm" type="text" name="parteafectadaaccidente" rows="1"></textarea>
							<label for="parteafectadaaccidente" generated="true" class="error"></label>
						</td>
						<td>
							<textarea name="incapacidadaccidente" class="form-control input-sm" rows="1"></textarea>          
						</td>
						<td>
							<textarea name="secuelaaccidente" class="form-control input-sm" rows="1"></textarea>
						</td>
						</tr>
					</tbody>
				</table>
				<input type="button" value="Agregar Otro" id="agregarFila2" class="btn-info">
		</div>
	</div>
</div>

<div class="container">

<div class="panel panel-default">
	<div class="panel-heading text-center">
		<label for="enfermedad_p" generated="true" class="error"></label><br>
		<label>Enfermedad Profesional: </label> 
		<input type="radio" name="enfermedad_p" value="Si"> Si 
		<input type="radio" name="enfermedad_p" value="No"> No
	</div>
	<div class="panel-body">
		<label class="text-center"> </label>
		<table class="table table-bordered">  
			<thead>	
				<th><label>Fecha</label></th>
				<th><label>Empresa</label></th>
				<th><label>Diagnostico</label></th>
				<th><label>ARL</label></th>
				<th><label>Reubicacion</label></th>
				<th><label>Pension</label></th>
			</thead>  
			<tbody id="tabla3">
				<tr class="text-center">
					<td>
						<input class="form-control input-sm" type="date" name="fechaenfermedad">
					</td>
					<td>
						<textarea class="form-control input-sm" name="empresaenfermedad" rows="1"></textarea>
						<label for="empresaenfermedad" generated="true" class="error"></label>
					</td>
					<td>
						<textarea class="form-control input-sm"  type="text" name="diagnosticoenfermedad" rows="1"></textarea>
						<label for="diagnosticoenfermedad" generated="true" class="error"></label>
					</td>
					<td>
						<textarea class="form-control input-sm" name="arl" rows="1"></textarea>
					</td>
					<td>
						<textarea class="form-control input-sm" name="reubicacion" rows="1"></textarea>
					</td>
					<td>
						<textarea class="form-control input-sm" name="pension" rows="1"></textarea>
					</td>
				</tr>
			</tbody>
		</table>
		<input type="button" value="Agregar Otro" id="agregarFila3" class="btn-info">
		<!-- <input type="button" value="Eliminar" class="delete3">  -->
		</div>
	</div>
</div>

<div class="panel panel-default">
	<div class="panel-heading text-center">
		<label>Habitos Saludables: </label>
	</div>
	<div class="panel-body">
		<table class="table table-bordered">  
			<thead>
				<th class="text-center">Realiza algun deporte:</th>
				<th class="text-center">¿Cual Deporte?</th>
				<th class="text-center">Sedentario:</th>
			</thead>
			<tbody>
				<tr class="text-center">
					<td>
						<label for="deporte" generated="true" class="error"></label>
						Si <input type="radio" name="deporte" value="Si"> / 
						NO <input type="radio" name="deporte" value="No">
					</td>

					<td>
						<label>Caminar</label> <input type="checkbox" name="ejercicio[]" value="Caminar">

						| <label>Trotar</label> <input type="checkbox" name="ejercicio[]" value="Trotar">
					
						| <label>Levantamiento de Pesas</label> 
							<input type="checkbox" name="ejercicio[]" value="Levantamiento de Pesas">
					</td>

					<td>
						<label for="sedentario" generated="true" class="error"></label>
						Si <input type="radio" name="sedentario" value="Si"> / 
						NO <input type="radio" name="sedentario" value="No">
					</td> 
				</tr>
			</tbody>
			<thead>
				<th class="text-center">Ejercicio CardioPulmonar:</th>
				<th class="text-center">Otro Deporte?:</th>
				<th class="text-center">Frecuencia:</th>
			</thead>             
			<tbody>   
				<tr class="text-center">
					<td>
						<label for="depor_cardiopulmonar" generated="true" class="error"></label>
						Si <input type="radio" name="depor_cardiopulmonar" value="Si"> / 
						NO <input type="radio" name="depor_cardiopulmonar" value="No" >
					</td>

					<td>
						<input class="form-control input-sm" type="text" name="cual_deporte">
						<label for="cual_deporte" generated="true" class="error"></label>
					</td>

					<td>
						Diario <input type="radio" name="depor_frecuencia" value="Diario"> / 
						Semanal <input type="radio" name="depor_frecuencia" value="Semanal" > 
					</td> 
				</tr>
			</tbody>
		</table>
	</div>  
</div>

	<div class="panel panel-default">
		<div class="panel-heading text-center">
			<label>Habitos Toxicos: </label>
		</div>
		<div class="panel-body">
			<table class="table table-bordered"> 
				<thead>
					<th class="text-center">Fuma:</th>
					<th class="text-center">Fumador:</th>
					<th class="text-center">Fumador-Años:</th>
					<th class="text-center">EX-Fumador:</th>
					<th class="text-center">Exfumador-Años:</th>
					<th class="text-center">Nª Cigarrillos/Dia:</th>
				</thead> 
				<tbody>
					<tr class="text-center">
						<td>
							<label for="fuma" generated="true" class="error"></label>
							<input type="radio" name="fuma" value="Si"> Si 
							<input type="radio" name="fuma" value="No"> No
						</td>

						<td>
							<label for="fumador" generated="true" class="error"></label>
							<input type="radio" name="fumador" value="Si"> Si 
							<input type="radio" name="fumador" value="No"> No
						</td>

						<td>
							<input style="width: 100px;" class="form-control input-sm center" type="number" name="anosfumador">
							<label for="anosfumador" generated="true" class="error"></label>
						</td>

						<td>
							<label for="exfumador" generated="true" class="error"></label>
							<input type="radio" name="exfumador" value="Si"> Si 
							<input type="radio" name="exfumador" value="No"> No
						</td>

						<td>
							<input style="width: 100px;" class="form-control input-sm center" type="number" name="anosexfumador" onkeypress="return esInteger(event)" >
							<label for="anosexfumador" generated="true" class="error"></label>
						</td>

						<td>
							<input style="width: 100px;" type="number" name="cantidad_cigarrillos_dia" class="form-control input-sm center">
							<label for="cantidad_cigarrillos_dia" generated="true" class="error"></label>
						</td>
					</tr>
				</tbody>
			</table>

			<table class="table table-bordered"> 
				<thead>
					<th class="text-center">Toma Habitualmente:</th>
					<th class="text-center">Años de Habito:</th>
					<th class="text-center">Frecuencia:</th>
					<th class="text-center">Tipo Licor:</th>
				</thead> 
				<tbody>
					<tr class="text-center">
						<td>
							<label for="tomahab" generated="true" class="error"></label>
							<input type="radio" name="tomahab" value="Si"> Si 
							<input type="radio" name="tomahab" value="No"> No
						</td>

						<td>
							<input style="width:100px;" class="form-control input-sm center" type="number" name="anoshab_beber" onkeypress="return esInteger(event)">
							<label for="anoshab_beber" generated="true" class="error"></label>
						</td>

						<td>
							<label>Dia:</label> <input type="radio" name="frec_beber" value="Dia"> | 
							<label>Sem:</label> <input type="radio" name="frec_beber" value="Semana"> |
							<label>15:</label> <input type="radio" name="frec_beber" value="Quincenalmente"> | 
							<label>30:</label> <input type="radio" name="frec_beber" value="Mensualmente"> | 
							<label>Ocac:</label> <input type="radio" name="frec_beber" value="Ocacionalmente">
							<label for="frec_beber" generated="true" class="error"></label>
						</td>

						<td>
							<label>Cerveza:</label> <input type="checkbox" name="tipolicor[]" value="Cerveza"> | 
							<label>Ron:</label> <input type="checkbox" name="tipolicor[]" value="Ron"> | 
							<label>Vino:</label> <input type="checkbox" name="tipolicor[]" value=" Vino">
						</td> 	   
					</tr>
					<thead>
						<th class="text-center">Problemas con Bebidas:</th>
						<th class="text-center">Cuales Bebidas?</th>
						<th class="text-center">Exbebedor:</th>
						<th class="text-center">Exbebedor-Años:</th>
					</thead>
					<tr class="text-center">
						<td>
							<div class="N">
								<label for="problemasbebidas" generated="true" class="error"></label>
								<input type="radio" name="problemasbebidas" value="Si"> Si 
								<input type="radio" name="problemasbebidas" value="No"> No
							</div>
						</td>
						<td>
							<textarea class="form-control input-sm" type="text" name="cuales_bebidas" rows="1"></textarea>
							<label for="cuales_bebidas" generated="true" class="error"></label>
						</td>

						<td>
							<div class="N">
								<label for="exbebedor" generated="true" class="error"></label>
								<input type="radio" name="exbebedor" value="Si"> Si 
								<input type="radio" name="exbebedor" value="No"> No
							</div>
						</td>

						<td> 
							<input style="width: 100px;" class="form-control input-sm center" type="number" name="exbebedor_anos">
							<label for="exbebedor_anos" generated="true" class="error"></label>
						</td>
					</tr>
					<thead>
						<th class="text-center">Otros Habitos Toxicos:</th>
					<th class="text-center">¿Cuales Habitos Toxicos?</th>
						<th class="text-center">¿Medicamentos Regularmente?</th>
						<th class="text-center">¿Cuales Medicamentos?</th>
					</thead>
					<tr class="text-center">
						<td>
							<label for="otroshabitos" generated="true" class="error"></label>
							<input type="radio" name="otroshabitos" value="Si"> Si 
							<input type="radio" name="otroshabitos" value="No"> No
						</td>

						<td>
							<textarea class="form-control input-sm" name="nombre_otrohabito" rows="1"></textarea>
							<label for="nombre_otrohabito" generated="true" class="error"></label> 		
						</td>

						<td>
							<label for="medic_regularmente" generated="true" class="error"></label>							<input type="radio" name="medic_regularmente" value="Si"> Si 
							<input type="radio" name="medic_regularmente" value="No"> No
						</td>  

						<td>
							<textarea class="form-control input-sm" name="nombre_medicamento" rows="1"></textarea>
							<label for="nombre_medicamento" generated="true" class="error"></label>
						</td>	          		
					</tr>
				</tbody>
			</table>

			<table class="table table-bordered"> 
				<thead>
					<th class="text-center">Pendiente Cirugias en su EPS:</th>
					<th class="text-center">¿Cual Cirugia?</th>
					<th class="text-center">Pendiente Algun Tratamiento:</th>
					<th class="text-center">Cual Tratamiento?:</th>
				</thead> 
				<tbody>
					<tr class="text-center">
						<td>
							<input type="radio" name="cirugiaseps" value="Si"> Si 
							<input type="radio" name="cirugiaseps" value="No"> No
						</td>
						
						<td>
							<textarea class="form-control input-sm" name="cuales_cirugias" rows="1"></textarea>
							<label for="cuales_cirugias" generated="true" class="error"></label>
						</td>

						<td>
							<label for="pend_tratamiento" generated="true" class="error"></label>
							<input type="radio" name="pend_tratamiento" value="Si"> Si 
							<input type="radio" name="pend_tratamiento" value="No"> No
						</td>

						<td>
							<textarea class="form-control input-sm" name="cuales_tratamientos" rows="1"></textarea>
							<label for="cuales_tratamientos" generated="true" class="error"></label>
						</td>
					</tr>
					<thead>
						<th colspan="4" class="text-center">¿Incapacidad en estos 6 Meses?</th>
					</thead>
						<td colspan="4">
							<!--  -->
							<div class="input-group mb-3">
							  <div class="input-group-prepend">
							    <div class="input-group-text">
							      	<input type="radio" name="incapacidadultimosmeses" value="Si"> Si 
							      	<div class="separator"></div>
									<input type="radio" name="incapacidadultimosmeses" value="No"> No
							    </div>
							  </div>
							  <textarea class="form-control input-sm" name="motivo_incapacidad" rows="1" placeholder="Motivo"></textarea>
							</div>
							<!--  -->
						</td>
					</tr>
				</tbody>
			</table>
		</div>    
	</div>  

		<div class="panel panel-default">
			<div class="panel-heading text-center">
				<label>Signos Vitales: </label>
			</div>
			<div class="panel-body">
				<table class="table table-bordered">
					<thead>
						<th>Extremidad habil</th>
						<th>Cicatrices</th>
						<th>Tatuajes</th>
						<th data-toggle="tooltip" title="Perimetro Abdominal">P. Abdominal</th>
						<th data-toggle="tooltip" title="Perimetro Toraxico">P. Toraxico</th>
						<th data-toggle="tooltip" title="Perimetro Arterial">T. Arterial</th>
						<th class="text-center" data-toggle="tooltip" title="Frecuencia Cardiaca">F. Cardiaca</th>
						<th class="text-center" data-toggle="tooltip" title="Frecuencia Respiratoria">F. Respiratoria</th>
					</thead>
					<tbody class="text-center">
						<tr>
							<td>
								<label for="mano_habil" generated="true" class="error"></label>
								<label>Diestro: </label>
								<input type="radio" name="mano_habil" value="Diestro"> /

								<label> Zurdo: </label>
								<input type="radio" name="mano_habil" value="Zurdo"> /

								<label> Ambidiestro: </label>
								<input type="radio" name="mano_habil" value="Ambidiestro">
							</td>

							<td>
								<label for="cicatrices" generated="true" class="error"></label>
								<input type="radio" name="cicatrices" value="Si"> Si /
								<input type="radio" name="cicatrices" value="No" checked> No
							</td>

							<td>
								<label for="tatuajes" generated="true" class="error"></label>
								<input type="radio" name="tatuajes" value="Si"> Si /
								<input type="radio" name="tatuajes" value="No" checked> No
							</td>
							<td class="size_number">
								<input type="number" name="perimetro_abdominal" class="form-control input-sm">
								<label for="perimetro_abdominal" generated="true" class="error"></label>
							</td>
							<td class="size_number">
								<input type="number" name="perimetro_toraxico" class="form-control input-sm">
								<label for="perimetro_toraxico" generated="true" class="error"></label>
							</td>
							<td class="size_number">
							 	<input class="form-control input-sm" type="number" name="tensionarterial">
							 	<label for="tensionarterial" generated="true" class="error"></label> 
							</td>
							<td class="size_number">							   
							 	<input class="form-control input-sm" type="number" name="frecuenciacardiaca">
							 	<label for="frecuenciacardiaca" generated="true" class="error"></label>
							</td>
							<td class="size_number">	    
							 	<input class="form-control input-sm" type="text" name="frecuenciarespiratoria">
							 	<label for="frecuenciarespiratoria" generated="true" class="error"></label>
							</td>
						</tr> 
					</tbody>
				</table>

				<table class="table table-bordered">
					<thead>
						<th class="text-center"><label style="font-size: 12px;">Otras Mediciones:</label>  </th>
					</thead>
					<tbody class="form-inline">
						<tr>




							<td>
								<label for="otras_mediciones" generated="true" class="error"></label><br>                  
								<textarea  style="width: 815px;" type="text" name="otras_mediciones" rows="2" class="form-control"></textarea>
							</td>         
						</tr> 
					</tbody>
				</table>

				<table class="table table-bordered">
					<thead>

						
						
						<th class="text-center">Talla:</th>
						<th class="text-center">Peso:</th>
					</thead>  
					<tbody class="form-inline">    
						<tr>
 

 



							<td class="text-center">
								<label for="talla" generated="true" class="error"></label><br>    
							 <input class="form-control input-sm" type="text" style="width: 70px;" name="talla" onkeypress="return esInteger(event)" >
							</td> 

							<td class="text-center">
								<label for="peso" generated="true" class="error"></label><br>    
								<input class="form-control input-sm" type="text" style="width: 70px;" name="peso" onkeypress="return esInteger(event)">
							</td>
						</tr>
						<tr class="text-center">
							<td>
							 <label for="pesodiagnostico" generated="true" class="error"></label><br>   
								<label>Peso Adecuado: </label>
							 <input type="radio" name="pesodiagnostico" value="Peso Adecuado"> Si
							</td> 

							<td>
								<label for="pesodiagnostico" generated="true" class="error"></label><br>  
								<label> Peso Bajo: </label>
								<input type="radio" name="pesodiagnostico" value="Peso Bajo"> Si
							</td> 

							<td>
								<label for="pesodiagnostico" generated="true" class="error"></label><br>  
								<label>Sobrepeso: </label>
								<input type="radio" name="pesodiagnostico" value="Sobrepeso"> Si 
							</td>

							<td colspan="2">
								<label for="pesodiagnostico" generated="true" class="error"></label><br>  
								<label>Obesidad: </label>
								<input type="radio" name="pesodiagnostico" value="Obesidad"> Si 
							</td> 
						</tr>
					</tbody>
				</table>
			</div>
		</div> 

		<div class="panel panel-default">
			<div class="panel-heading">
				<div class="text-center">
					<label>Informacion Suministrada por la empresa, sobre riesgos laborales a exponerse</label>
				</div>
			</div>
			<div class="panel-body">
				<label for="riesgos_suministrado" generated="true" class="error"></label><br>  
				<div class="text-center">
					<label>Suministrados:</label> Si <input type="radio" name="riesgos_suministrado" value="Si"> / No <input type="radio" name="riesgos_suministrado" value="No">
				</div><br>
				<table class="table table-bordered">
					<thead>
						<tr>
							<th class="text-center">Fisico</th>
							<th class="text-center">Mecanico</th>
							<th class="text-center">Quimico</th>
							<th class="text-center">Psicosocial</th>
							<th class="text-center">Biologico</th>
							<th class="text-center">Electrico</th>
							<th class="text-center">Ergonomico</th>
							<th class="text-center">Otro</th>
						</tr>
					</thead>
					<tbody>
						<tr class="text-center">
							<td><input type="checkbox" name="suministrado_fisico" value="Si"></td>
							<td><input type="checkbox" name="suministrado_mecanico" value="Si"></td>
							<td><input type="checkbox" name="suministrado_quimico" value="Si"></td>
							<td><input type="checkbox" name="suministrado_psicosocial" value="Si"></td>
							<td><input type="checkbox" name="suministrado_biologico" value="Si"></td>
							<td><input type="checkbox" name="suministrado_electrico" value="Si"></td>
							<td><input type="checkbox" name="suministrado_ergonomico" value="Si"></td>
							<td><input type="text" name="suministrado_otro" class="form-control input-sm"></td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>

		<div class="text-center">
			<br>
			<input type="submit" id="btn" name="Registrar" value="Registrar" class="btn btn-success">
			<br><br>
		</div>

		
<?php 
}//fin while 

}//fin mysql_rows 
?>
<?php //include 'bar/footer.php'; ?>
	</form>
</body>

<!--ALerta historial del paciente-->
<div class="modal fade" id="historial" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true" >
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="text-danger"><span class="glyphicon glyphicon-warning-sign"></span> Alerta.</h4>
			</div>
			<div class="modal-body">
				<h4 class="text-primary">Historial de Atencion de Paciente con Indentificacion Nº <label class="text-danger"><?php echo $id; ?></label></h4>
				<p><label>Motivo de Evaluaciones <strong style="color: red;">Ingreso: </strong></label> <?php echo $ingreso ?></p> 
				<p><label>Motivo de Evaluaciones <strong style="color: red;">Periodicas: </strong></label> <?php echo $periodico ?></p> 
				<p><label>Motivo de Evaluaciones <strong style="color: red;">Retiro: </strong></label> <?php echo $retiro ?></p>
				<p><label>Motivo de Evaluaciones <strong style="color: red;">Post Incapacidad: </strong></label> <?php echo $postincapacidad ?></p>
				<p><label>Motivo de Evaluaciones <strong style="color: red;">Reubicacion: </strong></label> <?php echo $reubicacion ?></p>
				<p><label>Motivo de Evaluaciones <strong style="color: red;">Reingreso: </strong></label> <?php echo $reingreso ?></p> 
				<p><label>Motivo de Evaluaciones <strong style="color: red;">Otros: </strong></label> <?php echo $otros ?></p>   
				<p><label>El Ultimo Registro de Evaluacion Clinica Se Realizo el dia: <strong style="color: red;"> <?php echo $ultimo ?> </strong></label> </p>
				<p><span class="glyphicon glyphicon-list-alt"></span><a target="_blank" href="psicologia_consult.php" style="color: red;"  class=""> Ir a Consultas</a></p> 
			</div>
			<div class="modal-footer">
				<a  data-dismiss="modal" class="btn btn-danger">Cerrar</a>
			</div>
		</div>
	</div>
</div>
<!---->

<script type="text/javascript">
//clonar filas en tabla exposicion a dactores de riesgo
$(function(){

	tabla1 = $('#tabla1');
	tr = $('tr:first', tabla1);
	$('#agregarFila1').on('click', function(){
		tr.clone().appendTo(tabla1).find(':text').val('');
	});
 
	$(".eliminarFila").on('click', function(){
			$(this).closest('tr').remove();
	});
 
});

//Clonar filas tabla de accidentes de trabajo
$(function(){
 
		tabla2 = $('#tabla2');
		tr2 = $('tr:first', tabla2);
		$('#agregarFila2').on('click', function(){
				tr2.clone().appendTo(tabla2).find(':text').val('');
		});
 
		$(".eliminarFila2").on('click', function(){
				$(this).closest('tr').remove();
		});
 
});

//clonar filas tabla enfermadad profesional
$(function(){
 
		tabla3 = $('#tabla3');
		tr3 = $('tr:first', tabla3);
		
		$('#agregarFila3').on('click', function(){
				tr3.clone().appendTo(tabla3).find(':text').val('');
		});
 
		$(".delete3").on('click', function(){
				$(this).closest('tr').remove();
		});
 
});
//tooltip
$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})

 //time*/
	function show(){
		var Digital=new Date()
		var hours=Digital.getHours()
		var minutes=Digital.getMinutes()
		var seconds=Digital.getSeconds()
		var dn="AM" 
		if (hours>12){
			dn="PM"
			hours=hours-12
		}
		if (hours==0)
		hours=12
		if (minutes<=9)
		minutes="0"+minutes
		if (seconds<=9)
		seconds="0"+seconds
		document.form.horafinal.value=hours+":"+minutes+":"
		+seconds+" "+dn
		setTimeout("show()",1000)
	}
	show()

	//toglee
	$(document).ready(function(){
		$('[data-toggle="tooltip"]').tooltip();   
	});

	//solo numeros
	function esInteger(e) {
		var charCode 
		charCode = e.keyCode 
		status = charCode 
		if (charCode > 31 && (charCode < 48 || charCode > 57 ) && charCode!=46) {
			return false
		}
		return true
	}
</script>
</html>
