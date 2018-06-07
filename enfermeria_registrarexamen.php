<?php 
	include('includes/conexion.php'); 
	include('bar/navbar_enfermeria.php');
	include('lectorfecha.php');
	include('bar/css/estilo.css');
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Enfermeria Examen</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		
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

	$hist_laboral = "INSERT INTO `enfermeria_historialaboral`(`id`, `historialaboral`, `aniosempresa`,`dependencia`,`cargo`, `descripcioncargo`,`turno`,`actividades`,`acciones`,`paciente_enfermeria`) 
		VALUES ('NULL','$histlaboral','$anosenempresa','$dependencia','$cargohist','$descripcioncargo','$turno','$actividad','$cadena','$historia')"; 
		$query1 = mysqli_query($conexion,$hist_laboral);

		//-----------------
		if ($query1){   
			//Obtenemos El Ultimo ID Insertado
			$ver = "SELECT * FROM enfermeria_historialaboral ORDER BY `id` DESC limit 0,1";
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

		$fact_riesgos = "INSERT INTO `enfermeria_riesgos`(`id`, `factoresriesgos`, `empresariesgo`, `riesgos`, `cargoriesgo`, `tiemporiesgo`, `proteccionriesgo`,`id_paciente`) 
		VALUES ('NULL','$exposicion_riesgos','$empresa1','$factores','$cargo1','$tiempo1','$proteccion_personal1','$idfk_histlaboral')"; 
		$query2 = mysqli_query($conexion,$fact_riesgos);

	}

		//-----------------HEREEEEEEEEEEEEEE
		if ($query2){   
			//Obtenemos El Ultimo ID Insertado
			$ver2 = "SELECT * FROM enfermeria_riesgos ORDER BY `id` DESC limit 0,1";
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


		$ant_per_fam = "INSERT INTO `enfermeria_antecedentes`(`id`,`infancia`,`hipertension_arterial`,`alergias`,`cirugias`,`hospitalizaciones`,`enf_cardiaca`,`enf_piel_anexos`,`hernias`,`tunel_carpo`,`enf_quervein`,`trauma`,`enf_vias_renal`,`enf_oido_nariz_laringe`,`enf_vascular`,`lumbalgias`,`enf_transmision_sexual`,`enf_pulmonar`,`enf_visual`,`varicocele`,`cancer`,`vacunas_dosis`,`enf_acido_peptica`,`diabetes`,`enf_hepatica`,`fracturas`,`toxicos`,`enf_mental`,`enf_hematicos`,`osteomuscular`,`dislipidemias`,`ant_observaciones`,`familiar_ant`,`desc_ant_familiar`,`personal_ant`,`desc_ant_per`,`id_paciente_riesgos`) 
		VALUES ('NULL','$infancia','$hipertension','$alergias','$cirugias','$hospitalizaciones','$enf_cardiaca','$enf_piel','$hernias','$tunel_carpo','$quervein','$trauma','$enf_renal','$oido_nariz_laringe','$enf_vascular','$lumbalgias','$transmision_sexual','$enf_pulmonar','$enf_visuales','$varicocele','$cancer','$vacunas','$enf_peptica','$diabetes','$enf_hepatica','$fracturas','$toxicos','$enf_mental','$enf_hematicos','$osteomuscular','$dislipidemias','$ant_observaciones','$ant_familiar','$ant_familiar_descripcion','$ant_personal','$ant_personal_descripcion','$idfk_riesgos_lab')";//--HERE
		$query3 = mysqli_query($conexion,$ant_per_fam);

		//----------------
		if ($query3){   
			//Obtenemos El Ultimo ID Insertado
			$ver2 = "SELECT * FROM enfermeria_antecedentes ORDER BY `id` DESC limit 0,1";
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

		$ginecologia = "INSERT INTO `enfermeria_ginecologia`(`id`,`menarquia`,`ciclos`,`fichaobstetrica`,`planifica`,`metodo`,`ultimamestruacion`,`ultimacitologia`,`resultado`,`flujovaginal`,`dolorpelvico`,`dolorsenos`,`id_ant_per_fam`) VALUES ('NULL','$menarquia','$ciclos','$obstetrica','$planifica','$metodo','$ultima_mestruacion','$ultima_citologia','$resultado_ginecologia','$flujo_vaginal','$dolor_pelvico','$dolor_senos','$idfk_per_fam')";
		$query4 = mysqli_query($conexion, $ginecologia);

		//Obtenemos El Ultimo ID Insertado
		if ($query3){    
			$ver2 = "SELECT * FROM enfermeria_ginecologia ORDER BY `id` DESC limit 0,1";
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
		$solo_ad = $_POST['solo_ad'];

		$proteccion_pers= "INSERT INTO `enfermeria_epp`(`id`,`uso_epp`,`cargo_empresa`,`actual`,`casco`,`guantes`,`botas`,`gafas`,`tapabocas`,`overol`,`protectorauditivo`,`protectorrespiratorio`,`otroepp`,`adecuados`,`adecuadosolo`,`id_ginecologia`)
		VALUES('NULL','$uso_proteccion','$proteccion_personal','$proteccion_actual','$casco','$guantes','$botas','$gafas','$tapabocas','$overol','$protectores_auditivos','$protectores_respiratorios','$otros','$adecuada','$solo_ad','$idfk_ginecologia')";
		$query5 = mysqli_query($conexion,$proteccion_pers);

		//Obtenemos El Ultimo ID Insertado
		if ($query5){   
			$ver2 = "SELECT * FROM enfermeria_epp ORDER BY `id` DESC limit 0,1";
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

		$accidente_trabajo = "INSERT INTO `enfermeria_accidentes`(`id`,`accidentelaboral`,`accfecha`,`accempresa`,`causa`,`lesion`,`afectacion`,`incapacidad`,`secuela`,`id_protec_personal`)
		VALUES('NULL','$accidentestrabajo','$fecha_accidente','$empresa_accidente','$causa_accidente','$lesion_accidente','$parte_afectada','$incapacidad_accidente','$secuelaaccidente','$idfk_protec_pers')";
		$query6 = mysqli_query($conexion,$accidente_trabajo);
	}
		//Obtenemos El Ultimo ID Insertado
		if ($query6){        
			$ver2 = "SELECT * FROM enfermeria_accidentes ORDER BY `id` DESC limit 0,1";
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

		$enfermedad_trabajo= "INSERT INTO `enfermeria_enfermedad`(`id`,`enfermedadlaboral`,`fechaenf`,`empresaenf`,`diagnosticoenf`,`arlenf`,`reubicacion`,`pension`,`id_accidente_trabajo`) 
		VALUES ('NULL','$enfermedad_profesional','$fechaenfermedad','$empresaenfermedad','$diagnosticoenfermedad','$arl1','$reubicacion1','$pension1','$idfk_accidente_trab')";
		$query7 = mysqli_query($conexion,$enfermedad_trabajo); 
	}

		//Obtenemos El Ultimo ID Insertado
		if ($query7){       
			$ver2 = "SELECT * FROM enfermeria_enfermedad ORDER BY `id` DESC limit 0,1";
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

		$habito_saludable = "INSERT INTO `enfermeria_habitosaludable`(`id`,`practicadeporte`,`cualdeporte`,`sedentario`,`ejerciciocardiopulmonar`,`otroejercicio`,`frecuenciaejercicio`,`id_enfermedad_prof`) VALUES ('NULL','$practica_deporte', '$deportepractica', '$sedentario', '$depor_cardiopulmonar','$otro_deporte','$depor_frecuencia','$idfk_enfermedad_prof')"; 
		$query8 = mysqli_query($conexion,$habito_saludable);

		//Obtenemos El Ultimo ID Insertado
		if ($query8){   
			$ver2 = "SELECT * FROM enfermeria_habitosaludable ORDER BY `id` DESC limit 0,1";
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

		$habitos_toxicos = "INSERT INTO enfermeria_habitotoxico (`id`,`fuma`,`fumador`,`fumadoranios`,`exfumador`,`exfumadoranios`,`cigarrillosdiarios`,`bebidahabitual`,`aniosbebedor`,`frecuenciabebida`,`tipolicor`,`problemadebebida`,`cualbebidaproblema`,`exbebedor`,`aniosexbebedor`,`otrohabitotoxico`,`cualhabitotoxico`,`medicamentoregular`,`cualmedicamento`,`cirugiaeps`,`cualcirugia`,`tratamientopendiente`,`cualtratamiento`,`ultimaincapacidad`,`motivoincapacidad`,`id_hab_saludables`)
		VALUES('NULL','$fuma','$fumador','$anos_fumador','$exfumador','$exfumador_anos','$cigarrillos_dia','$bebe_habitualmente','$anos_hab_beber','$frecuencia_beber','$tipo_licor','$problemas_bebidas','$cual_bebida_prob','$exbebedor','$exbebedor_anos','$otros_habitos_toxicos','$cuales_habitos','$medic_regularmente','$nombre_medicamento','$cirugiaseps','$cual_cirugia_eps','$pend_tratamiento','$cual_tratamiento','$incapacidad_ultimos_meses','$motivo_incapacidad','$idfk_hab_saludable')";
		$query9 = mysqli_query($conexion,$habitos_toxicos);

		//Obtenemos El Ultimo ID Insertado  
		if ($query9){       
			$ver2 = "SELECT * FROM enfermeria_habitotoxico ORDER BY `id` DESC limit 0,1";
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


		$signos_vitales = "INSERT INTO enfermeria_signovital (`id`,`extremidadhabil`,`cicatrices`,`tatuajes`,`perimetroabdominal`,`perimetrotoraxico`,`otrasmediciones`,`tensionarterial`,`frecuenciacardiaca`,`frecuenciarespiratoria`,`talla`,`peso`,`pesodiagnostico`,`id_habitos_toxicos`)
		VALUES ('NULL','$mano_habil','$cicatrices','$tatuajes','$perimetro_abdominal','$perimetro_toraxico','$otras_mediciones','$tension_arterial','$frecuencia_cardiaca','$frecuencia_respiratoria','$talla','$peso','$peso_diagnostico','$idfk_hab_toxicos')";
		$query10 = mysqli_query($conexion,$signos_vitales);

		//Obtenemos El Ultimo ID Insertado   
		if ($query10){     
			$ver2 = "SELECT * FROM enfermeria_signovital ORDER BY `id` DESC limit 0,1";
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

		$riesgos_suministrados = "INSERT INTO enfermeria_riesgosempresa (`id`,`riesgosuministrado`,`fisico`,`mecanico`,`quimico`,`psicosocial`,`biologico`,`electrico`,`ergonomico`,`otrosriesgo`,`id_signos_vitales`)
		VALUES ('NULL','$riesgos_suministrado','$suministrado_fisico','$suministrado_mecanico','$suministrado_quimico','$suministrado_psicosocial','$suministrado_biologico','$suministrado_electrico','$suministrado_ergonomico','$suministrado_otro','$idfk_signos_vitales')";
		$query11 = mysqli_query($conexion,$riesgos_suministrados);

		//Obtenemos El Ultimo ID Insertado
		/*if ($query11){    
			$ver2 = "SELECT * FROM signos_vitales_enf ORDER BY `id` DESC limit 0,1";
			$queryid2 = mysqli_query ($conexion,$ver2);
			$dataid2 = mysqli_fetch_array($queryid2);
			$idfk_signos_vitales = $dataid2['id'];
	}else{
		echo "<script>alert('Error 11, Intente Nuevamente')</script>";
	}*/

	//control atencion time
	$estado = "Atencion Finalizada";
	$horafinal = $_POST['hora'];

	$data = "UPDATE `db_estado_atencion` SET `enfermeria`= '$estado' WHERE paciente = '$historia'"; 
	$queryestado = mysqli_query($conexion,$data);

	$data1 = "UPDATE `datos_basicos_atencion` SET `final_timeenfermeria`= '$horafinal' WHERE id_datos_basicos = '$historia'"; 
	$querytime = mysqli_query($conexion,$data1);

	if ($query1 && $query2 && $query3 && $query4 && $query5 && $query6 && $query7 && $query8 && $query9 && $query10 && $query11 && $queryestado && $querytime) {
		echo "<script>alert('Datos Registrados Exitosamente')</script>";
		echo "<script>window.location = 'enfermeria_citas.php'</script>"; 
	} else {
		echo "<script>alert('Error query, Intente Nuevamente')</script>";
		echo "<script>window.location = 'enfermeria_citas.php'</script>"; 
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
			//$cargodesempenar= $datos['cargo_a_desempenar'];      

		//--------
		$cont = "SELECT datos_basicos.motivo_evaluacion, COUNT(motivo_evaluacion) AS Total FROM datos_basicos 
			JOIN enfermeria_historialaboral ON  enfermeria_historialaboral.paciente_enfermeria = datos_basicos.id_historia
			JOIN datos_complementarios ON datos_basicos.fk_d_complementario = datos_complementarios.id
			WHERE datos_basicos.motivo_evaluacion = 'Ingreso' AND datos_complementarios.numero_documento=".$id." ";
			$qcont = mysqli_query($conexion,$cont);
		while ($re = mysqli_fetch_array($qcont)){
			$ingreso = $re{'Total'};      
		}
		$cont = "SELECT datos_basicos.motivo_evaluacion, COUNT(motivo_evaluacion) AS Total FROM datos_basicos 
			JOIN enfermeria_historialaboral ON  enfermeria_historialaboral.paciente_enfermeria = datos_basicos.id_historia
			JOIN datos_complementarios ON datos_basicos.fk_d_complementario = datos_complementarios.id
			WHERE datos_basicos.motivo_evaluacion = 'Periodico' AND datos_complementarios.numero_documento=".$id." ";
			$qcont = mysqli_query($conexion,$cont);
		while ($re = mysqli_fetch_array($qcont)){
			$periodico = $re{'Total'};     
		}
		$cont = "SELECT datos_basicos.motivo_evaluacion, COUNT(motivo_evaluacion) AS Total FROM datos_basicos
			JOIN enfermeria_historialaboral ON  enfermeria_historialaboral.paciente_enfermeria = datos_basicos.id_historia 
			JOIN datos_complementarios ON datos_basicos.fk_d_complementario = datos_complementarios.id
			WHERE datos_basicos.motivo_evaluacion = 'Retiro' AND datos_complementarios.numero_documento=".$id." ";
			$qcont = mysqli_query($conexion,$cont);
		while ($re = mysqli_fetch_array($qcont)){
			$retiro = $re{'Total'};     
		}
		$cont = "SELECT datos_basicos.motivo_evaluacion, COUNT(motivo_evaluacion) AS Total FROM datos_basicos 
			JOIN enfermeria_historialaboral ON  enfermeria_historialaboral.paciente_enfermeria = datos_basicos.id_historia
			JOIN datos_complementarios ON datos_basicos.fk_d_complementario = datos_complementarios.id
			WHERE datos_basicos.motivo_evaluacion = 'Post incapacidad' AND datos_complementarios.numero_documento=".$id." ";
			$qcont = mysqli_query($conexion,$cont);
		while ($re = mysqli_fetch_array($qcont)){
			$postincapacidad = $re{'Total'};     
		}
		$cont = "SELECT datos_basicos.motivo_evaluacion, COUNT(motivo_evaluacion) AS Total FROM datos_basicos
			JOIN enfermeria_historialaboral ON  enfermeria_historialaboral.paciente_enfermeria = datos_basicos.id_historia
			JOIN datos_complementarios ON datos_basicos.fk_d_complementario = datos_complementarios.id  
			WHERE datos_basicos.motivo_evaluacion = 'Reubicacion' AND datos_complementarios.numero_documento=".$id." ";
			$qcont = mysqli_query($conexion,$cont);
		while ($re = mysqli_fetch_array($qcont)){
		 $reubicacion = $re{'Total'};      
		}
		$cont = "SELECT datos_basicos.motivo_evaluacion, COUNT(motivo_evaluacion) AS Total FROM datos_basicos 
			JOIN enfermeria_historialaboral ON  enfermeria_historialaboral.paciente_enfermeria = datos_basicos.id_historia
			JOIN datos_complementarios ON datos_basicos.fk_d_complementario = datos_complementarios.id 
			WHERE datos_basicos.motivo_evaluacion = 'Reingreso' AND datos_complementarios.numero_documento=".$id." ";
			$qcont = mysqli_query($conexion,$cont);
		while ($re = mysqli_fetch_array($qcont)){
			$reingreso = $re{'Total'};      
		}
		$cont = "SELECT datos_basicos.motivo_evaluacion, COUNT(motivo_evaluacion) AS Total FROM datos_basicos
			JOIN enfermeria_historialaboral ON  enfermeria_historialaboral.paciente_enfermeria = datos_basicos.id_historia
			JOIN datos_complementarios ON datos_basicos.fk_d_complementario = datos_complementarios.id 
			WHERE datos_basicos.motivo_evaluacion = 'Otros' AND datos_complementarios.numero_documento=".$id." ";
			$qcont = mysqli_query($conexion,$cont);
		while ($re = mysqli_fetch_array($qcont)){
			$otros = $re{'Total'};     
		}
		//obtener fecha del ultimo registro del historial
		$consultaregistro = "SELECT * FROM datos_basicos
			JOIN enfermeria_historialaboral ON enfermeria_historialaboral.paciente_enfermeria = datos_basicos.id_historia
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
<script type="text/javascript" src="jvalidation/dist/jquery.validate.js"></script> 
<body>

<form method="POST"  action="" id="formulario" name="formulario">

	<input class="form-control" type="text" name="historia" value='<?php echo $historia; ?>' readonly="readonly" style="display: none;">
	<div class="container">
		<input type="text" name="hora" style="display: none;">
		<div class="panel panel-default">
		  <div class="container-fluid">
		    <div class="panel-heading text-center">
		      <h6>Datos <a href="#" data-toggle="modal" data-target="#historial">Paciente</a> - Empresa</h6>
		    </div>
		    <div class="panel-body">  

		      <div class=" size_font">
		        <table class="table table-bordered">
		        <thead>
		          <th class="text-center">Nombres-Apellidos:</th>
		          <th class="text-center">Tipo Documento:</th>
		          <th class="text-center">Numero Documento:</th>
		          <th class="text-center">Fotografia</th>
		        </thead>
		          <tbody class="text-center">
		            <tr>
		              <td><?php echo $datos['nombres_apellidos']; ?></td>
		              <td><?php echo $datos['tipo_documento'];?></td>
		              <td><?php echo $datos['numero_documento']; ?></td>
		              <td rowspan="3" style="width: 180px;">
		                <img class="img-responsive img-thumbnail paciente_datos" alt="Foto del Paciente" src=<?php echo $ruta_destino."".$historia.'.png'; ?> >
		              </td> 
		            </tr>
		            <tr>
		              <td><strong>Edad:</strong></td>
		              <td><strong>Fecha Nacimiento:</strong></td>
		              <td><strong>Genero:</strong></td>
		            </tr>
		            <tr>   
		              <td><?php echo $datos['edad'];?></td>
		              <td><?php echo $datos['fecha_nacimiento']; ?></td>
		              <td><?php echo $datos['genero']; ?></td>
		            </tr>
		          </tbody>
		        </table>
		    
		        <table class="table table-bordered">
		          <thead>      
		            <th class="text-center">Estado Civil:</th>
		            <th class="text-center">Lugar Nacimiento:</th>
		            <th class="text-center">Numero Celular:</th>
		            <th class="text-center">Direccion</th>
		            <th class="text-center">Motivo de Evaluacion:</th>
		          </thead>
		          <tbody class="text-center">
		            <tr>   
		              <td><?php echo $datos['estado_civil']; ?></td>
		              <td><?php echo $datos['lugar_nacimiento']; ?></td>
		              <td><?php echo $datos['celular']; ?></td>
		              <td><?php echo $datos['direccion']; ?></td>  
		              <td><?php echo $datos['motivo_evaluacion']; ?></td>
		            </tr>
		          </tbody>
		        </table>

		        <table class="table table-bordered">
		          <thead>
		            <th class="text-center">Nombre de la Empresa:</th>
		            <th class="text-center">Actividad Economica:</th>
		            <th class="text-center">Ciudad:</th>
		            <th class="text-center">Direccion de la empresa</th>
		            <th class="text-center">Numero de Nit</th>
		            <th class="text-center">Telefono</th>
		          </thead>
		          <tbody class="text-center">
		            <tr>
		              <td><?php echo $datos['nombre_empresa']; ?></td>
		              <td><?php echo $datos['actividad_economica']; ?></td>
		              <td><?php echo $datos['ciudad']; ?></td>
		              <td><?php echo $datos['direccion_empresa']; ?></td>
		              <td><?php echo $datos['numero_nit'];?></td>
		              <td><?php echo $datos['telefono_empresa']; ?></td>
		            </tr>
		          </tbody>
		        </table>
		      </div>
		    </div>
		  </div>
		</div><br>

	<div class="panel panel-default">
		<div class="panel-heading">
			<div class="text-center">
				<label for="historia_laboral" generated="true" class="error"></label><br> 
				<h6>Historia Laboral: 
					<input type="radio" name="historia_laboral" value="Si"> Si 
					<input type="radio" name="historia_laboral" value="No"> No
				</h6>
			</div>
		</div>
		<div class="panel-body">
			<div class="container-fluid">
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
				</div><br>

				<div class="form-group">
					<label>Descripcion del cargo:</label>
					<textarea class="form-control" type="text" name="descripcioncargo" rows="1"></textarea>
				</div><br>

				<div class="row"> 
					<div class="col-sm-6">
						<table class="table table-bordered">    
							<thead>
								<tr>
									<th class="text-center">Actividades:</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td class="text-center table">
										<input type="checkbox" name="actividades[]" value="Pie"> Pie
										<input type="checkbox" name="actividades[]" value=" Sentado"> Sentado
										<input type="checkbox" name="actividades[]" value=" Inclinado"> Inclinado
										<input type="checkbox" name="actividades[]" value=" Arrodillado"> Arrodillado
										<input type="checkbox" name="actividades[]" value=" Acostado"> Acostado 
										<div class="input-group input-group-sm mb-3">
										  <div class="input-group-prepend">
										    <span class="input-group-text" id="inputGroup-sizing-sm">Otro</span>
										  </div>
										  <input type="text" name="actividades[]" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm">
										</div>
									</td>
								</tr>
							</tbody>
						</table>
					</div>

					<div class="col-sm-6">
						<table class="table table-bordered"> 
							<thead>
								<tr>
									<th>Acciones:</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td class="text-center table_sizefont text-dark">
										<input type="checkbox" name="acciones[]" value="Alcanzar"> Alcanzar 
										<input type="checkbox" name="acciones[]" value="Halar"> Halar
										<input type="checkbox" name="acciones[]" value="Empujar"> Empujar
										<input type="checkbox" name="acciones[]" value="Levantar"> Levantar
										<input type="checkbox" name="acciones[]" value="Arrastrar"> Arrastrar
										<input type="checkbox" name="acciones[]" value="Manuales"> Manuales
										<input type="checkbox" name="acciones[]" value="MMSS">
										<label data-toggle="tooltip" data-placement="top" title="Miembros superiores">MMSS</label>
										<input type="checkbox" name="acciones[]" value="MMII">
										<label data-toggle="tooltip" data-placement="top" title="Miembros inferiores">MMII</label>
										<div class="input-group input-group-sm mb-3">
										  <div class="input-group-prepend">
										    <span class="input-group-text" id="inputGroup-sizing-sm">Otro</span>
										  </div>
										  <input type="text" name="acciones[]" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm">
										</div> 
									</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div><br>	

	<div class="panel panel-default">
		<div class="panel-heading"> 
			<div class="text-center">
				<label for="exposicion_riesgo" generated="true" class="error"></label><br>
				<h6>Exposicion a factores de riesgo: 
					<input type="radio" name="exposicion_riesgo[]" value="Si"> Si
					<input type="radio" name="exposicion_riesgo[]" value="No"> No
				</h6> 
			</div>
		</div>
		<div class="panel-body">
			<div class="container-fluid">
				<table class="table table-bordered">    
					<thead>
						<tr>
							<th class="text">Empresa</th>
							<th class="text-center">Factores de riesgo</th>
							<th class="text-center">Cargo</th>
							<th class="text-center">Tiempo</th>
							<th class="text-center" data-toggle="tooltip" data-placement="top" title="Elemento de proteccion personal">EPP</th>
						</tr>
					</thead>
					<tbody id="tabla1">
						<tr class="text-center">
							<td>
								<textarea class="form-control input-sm" type="text" name="empresa1_riesgo[]"></textarea>
								<label for="empresa1_riesgo" generated="true" class="error"></label><br>
							</td>
							<td>
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
	</div><br>	      

	<div class="panel panel-default">
		<h6 class="panel-heading text-center">Antecedentes Personales-Familiares:</h6>
		<div class="panel-body">          
			<div class="container-fluid">
				<table class="table table-bordered">
					<thead class="active table_sizefont">
						<th class="text-center">Infancia</th>
						<th class="text-center">Enfermedad Cardiaca</th>
						<th class="text-center">Trauma</th>
						<th class="text-center">Enf. transmisión sexual</th>
						<th class="text-center">Vacunas Y Dosis</th>
						<th class="text-center">Toxicos</th>
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

						<thead class="active table_sizefont">
							<th class="text-center">Hipertensión Arterial</th>
							<th class="text-center">Enfermedad Piel y Anexos</th>
							<th class="text-center">Enfermedad Vias Renales</th>
							<th class="text-center">Enfermedad Pulmonar</th>
							<th class="text-center">Enfermedad Acido Pèptica</th>
							<th class="text-center">Enfermedad Mental</th>
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

						<thead class="active table_sizefont">
							<th class="text-center">Alergias</th>
							<th class="text-center">Hernias</th>
							<th class="text-center">Enf. oído–nariz–laringe</th>
							<th class="text-center">Enfermedades Visuales</th>
							<th class="text-center">Diabetes</th>
							<th class="text-center">Enfermedad Hemàticos</th>
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

						<thead class="active table_sizefont">
							<th class="text-center">Cirugias</th>
							<th class="text-center">Tunel del Carpo</th>
							<th class="text-center">Enfermedad Vascular</th>
							<th class="text-center">Varicocele</th>
							<th class="text-center">Enfermedad hepàtica</th>
							<th class="text-center">Osteomuscular</th>
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

						<thead class="active table_sizefont">
							<th class="text-center">Hospitalizaciones</th>
							<th class="text-center">Enfermedad Quervein</th>
							<th class="text-center">Lumbalgias</th>
							<th class="text-center">Cancer</th>
							<th class="text-center">Fracturas</th>
							<th class="text-center">Dislipidemias</th>
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
			
				<label class="text-center">Observaciones: </label> 
				<label for="ant_observacion" generated="true" class="error"></label>
				<textarea  class="form-control" type="text" name="ant_observacion" rows="2"></textarea>
				<br>
			
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
	</div><br>	

	<div class="panel-group">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h4 class="panel-title">
					<a data-toggle="collapse" href="#collapse1"><h6 class="text-center">Antecedentes Ginecologicos:</h6></a>
				</h4>
			</div>
			<div id="collapse1" class="panel-collapse collapse">
				<div class="container-fluid">
					<div class="panel-body">
						<table class="table table-bordered"> 
							<thead>
								<th class="text-center">Menarquia:</th>
								<th class="text-center">Ciclos</th>
								<th class="text-center">Ficha Obstetrica:</th>
							</thead>   
							<tbody>
								<tr class="text-center">
									<td>
										<div class="input-group input-group-sm mb">
										  <div class="input-group-prepend">
										    <span class="input-group-text" id="inputGroup-sizing-sm">Años</span>
										  </div>
										  	<label for="gin_menarquia" generated="true" class="error"></label>
											<input type="number" name="gin_menarquia" class="form-control input-sm" onkeypress="return esInteger(event)" style="width: 50px;" max="120">
										</div>
									</td>
									<td>
										<div class="input-group mb-">
										  <div class="input-group-prepend">
										    
										  </div>
										  <select  name="gin_ciclo" class="custom-select" id="inputGroupSelect01">
										    <option selected>Seleccionar</option>
										    <option value="Regular">Regular</option>
										    <option value="Irregular">Irregular</option>
										    <option value="Dias">Dias</option>
										  </select>
										</div>
									</td>

									<td class="text-center size_font">
										<div class="input-group mb-3">
										  <div class="input-group-prepend">
										    <div class="input-group-text">
										      Gestacion: <div class="separator"></div>
										      <input name="gin_obstetrica[]" value="Gestacion" type="checkbox" aria-label="Checkbox for following text input"><div class="separator"></div>-

										      Parto: <div class="separator"></div>
										      <input name="gin_obstetrica[]" value="Parto" type="checkbox" aria-label="Checkbox for following text input"><div class="separator"></div>-

										      Cesárea: <div class="separator"></div>
										      <input name="gin_obstetrica[]" value="Cesarea" type="checkbox" aria-label="Checkbox for following text input"><div class="separator"></div>-

										      Aborto: <div class="separator"></div>
										      <input name="gin_obstetrica[]" value="Aborto" type="checkbox" aria-label="Checkbox for following text input"><div class="separator"></div>-

										      Ectópico: <div class="separator"></div>
										      <input name="gin_obstetrica[]" value="Ectopico" type="checkbox" aria-label="Checkbox for following text input"><div class="separator"></div>-

										      Hijos Vivos: <div class="separator"></div>
										      <input name="gin_obstetrica[]" value="Hijos Vivos" type="checkbox" aria-label="Checkbox for following text input"><div class="separator"></div>-

										      Hijos Muertos: <div class="separator"></div>
										      <input name="gin_obstetrica[]" value="Hijos Muertos" type="checkbox" aria-label="Checkbox for following text input"><div class="separator"></div>
										    </div>
										  </div>
										</div>
									</td>
								</tr>
							</tbody>
						</table>
							
						<label class="text-center text-dark">Planificacion:
							Si <input type="radio" name="gin_planifica" value="Si"> 
							No <input type="radio" name="gin_planifica" value="No">
						</label>
				
						<div class="input-group mb-3">
						  <div class="input-group-prepend">
						    <div class="input-group-text">Metodo:</div>
						  </div>
						  <label for="gin_metodo" generated="true" class="error"></label><br>
						  <textarea type="text" class="form-control" aria-label="Text input with checkbox" name="gin_metodo" class="form-control input-sm" rows="1"></textarea>
						</div>

						<table class="table table-bordered"> 
							<thead>
								<th class="text-center">Ultima Mestruacion :</th>
								<th class="text-center">Ultima Citologia :</th>
								<th class="text-center size_font">Flujo Vaginal:</th>
								<th class="text-center">Dolor Pelvico:</th>
								<th colspan="2" class="text-center">Dolor Senos:</th>
								<th class="text-center">Resultado:</th>
							</thead>
							<tbody>
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
									<td colspan="2">
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
	</div><br>	

	<div class="panel panel-default">
		<div class="panel-heading text-center">
			<label for="usoproteccion_p" generated="true" class="error"></label><br>
			<h6>Uso de Elementos de Proteccion Personal: 
				<input type="radio" name="usoproteccion_p" value="Si"> Si 
				<input type="radio" name="usoproteccion_p" value="No"> No
			</h6> 
		</div>
		<div class="panel-body">
			<div class="container-fluid">
				<table class="table table-bordered"> 
					<thead class="table_sizefont">
						<th class="text-center">En cargo o empresa</th>
						<th class="text-center">Actual:</th>
						<th class="text-center">Casco:</th>
						<th class="text-center">Guantes:</th>
						<th class="text-center">Botas:</th>
						<th class="text-center">Gafas:</th>
						<th class="text-center">Overol:</th>
						<th class="text-center">Tapabocas</th>
						<th class="text-center">Auditivos</th>
						<th class="text-center">Respiratorios</th>
					</thead>   
					<tbody>
						<tr class="text-center table_sizefont">
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
							<td>
								<label for="tapabocas" generated="true" class="error"></label>
								Si <input type="radio" name="tapabocas" value="Si"> / 
								No <input type="radio" name="tapabocas" value="No" checked>
							</td>
							<td>
								<label for="p_auditivos" generated="true" class="error"></label>
								Si <input type="radio" name="p_auditivos" value="Si"> / 
								No <input type="radio" name="p_auditivos" value="No" checked>
							</td>
							<td>
								<label for="p_respiratorios" generated="true" class="error"></label>
								Si <input type="radio" name="p_respiratorios" value="Si"> / 
								No <input type="radio" name="p_respiratorios" value="No" checked>
							</td>
						</tr>
					</tbody>
				</table>
				
				<div class="input-group input-group-sm mb-3">
				  <div class="input-group-prepend">
				    <span class="input-group-text" id="inputGroup-sizing-sm">Otros:</span>
				  </div>
				  <textarea name="p_otros" class="form-control input-sm" rows="1"></textarea> 
					<label for="p_otros" generated="true" class="error"></label>
				</div>
				
				<label for="">Son adecuados todos los EPP: <!-- borrar de bd campo p_adecuada --> 
					<label for="todoadecuado" generated="true" class="error"></label>
					Si <input type="radio" name="todoadecuado" value="Si"> / 
					No <input type="radio" name="todoadecuado" value="No" checked>
				</label>
				<div class="input-group input-group-sm mb-3">
				  <div class="input-group-prepend">
				    <span class="input-group-text" id="inputGroup-sizing-sm">Solo:</span>
				  </div>
					<textarea class="form-control input-sm" name="solo_ad" rows="1"></textarea>						<label for="solo_ad" generated="true" class="error"></label>
				</div>
			</div>
		</div>
	</div><br>

	<div class="panel panel-default">
		<div class="panel-heading text-center">
			<label for="accidentestrabajo" generated="true" class="error"></label><br>
			<h6>Accidentes de Trabajo: 
				<input type="radio" name="accidentestrabajo" value="Si"> Si 
				<input type="radio" name="accidentestrabajo" value="No"> No
			</h6>
		</div>

		<div class="panel-body">
			<div class="container-fluid">    		      
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
		</div><br>
	</div>
	<br>

	<div class="panel panel-default">
		<div class="panel-heading text-center">
			<label for="enfermedad_p" generated="true" class="error"></label><br>
			<h6>Enfermedad Profesional:  
				<input type="radio" name="enfermedad_p" value="Si"> Si 
				<input type="radio" name="enfermedad_p" value="No"> No
			</h6>
		</div>
		<div class="panel-body">
			<div class="container-fluid">
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
	</div><br>

	<div class="panel panel-default">
		<div class="panel-heading text-center"><h6>Habitos Saludables: </h6></div>
		<div class="panel-body">
			<div class="container-fluid">
				<table class="table table-bordered">  
					<thead>
						<th class="text-center">Practica deportes:</th>
						<th class="text-center">¿Cuales Deportes?</th>
						<th class="text-center">Sedentario:</th>
						<th class="text-center">Ejercicio cardiopulmonar:</th>
						<th class="text-center">Frecuencia:</th>
					</thead>
					<tbody>
						<tr class="text-center">
							<td>
								<label for="deporte" generated="true" class="error"></label>
								Si <input type="radio" name="deporte" value="Si"> / 
								NO <input type="radio" name="deporte" value="No">
							</td>
							<td>
								<div class="input-group mb-3">
								  <div class="input-group-prepend">
								    <div class="input-group-text">
								      Caminar<div class="separator"></div><input type="checkbox" name="ejercicio[]" value="Caminar"><div class="separator"></div>

								      Trotar<div class="separator"></div><input type="checkbox" name="ejercicio[]" value="Trotar"><div class="separator"></div>

								      <label>Levantamiento de Pesas</label><div class="separator"></div>
									<input type="checkbox" name="ejercicio[]" value="Levantamiento de Pesas">
								    </div>
								  </div>
								</div>
							</td>
							<td>
								<label for="sedentario" generated="true" class="error"></label>
								Si <input type="radio" name="sedentario" value="Si"> / 
								NO <input type="radio" name="sedentario" value="No">
							</td> 
							<td>
								<label for="depor_cardiopulmonar" generated="true" class="error"></label>
								Si <input type="radio" name="depor_cardiopulmonar" value="Si"> / 
								NO <input type="radio" name="depor_cardiopulmonar" value="No" >
							</td>
							<td>
								Diario <input type="radio" name="depor_frecuencia" value="Diario"> / 
								Semanal <input type="radio" name="depor_frecuencia" value="Semanal" > 
							</td>
						</tr>
					</tbody>
				</table>
				<div class="input-group input-group-sm mb-3">
				  <div class="input-group-prepend">
				    <span class="input-group-text" id="inputGroup-sizing-sm">Otros deportes:</span>
				  </div>
				  <input type="text" name="cual_deporte" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm">
				  <label for="cual_deporte" generated="true" class="error"></label>
				</div>
			</div>
		</div>  
	</div><br>	

	<div class="panel panel-default">
		<div class="panel-heading text-center"><h6>Habitos Toxicos: </h6></div>
		<div class="panel-body">
			<div class="container-fluid">
				<table class="table table-bordered"> 
					<thead class="table_sizefon">
						<th class="text-center">Fuma</th>
						<th class="text-center">Fumador</th>
						<th class="text-center">Fumador</th>
						<th class="text-center">EXfumador</th>
						<th class="text-center">Exfumador</th>
						<th class="text-center">Cigarrillos/diarios</th>
						<th class="text-center">Toma Habitualmente</th>
						<th class="text-center">Habito</th>
					</thead> 
					<tbody>
						<tr class="text-center table_sizefon">
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
								<div class="input-group input-group-sm mb-3">
								  <div class="input-group-prepend">
								    <span class="input-group-text table_sizefont" id="inputGroup-sizing-sm">Años</span>
								  </div>
									<input type="number" name="anosfumador" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" style="width: 40px;">
									<label for="anosfumador" generated="true" class="error"></label>
								</div>
							</td>

							<td>
								<label for="exfumador" generated="true" class="error"></label>
								<input type="radio" name="exfumador" value="Si"> Si 
								<input type="radio" name="exfumador" value="No"> No
							</td>

							<td>
								<div class="input-group input-group-sm mb-3">
								  <div class="input-group-prepend">
								    <span class="input-group-text table_sizefont" id="inputGroup-sizing-sm">Años</span>
								  </div>
									<input type="number" name="anosexfumador" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" style="width: 40px;">
									<label for="anosexfumador" generated="true" class="error"></label>
								</div>
							</td>

							<td>
								<div class="input-group input-group-sm mb-3">
									<div class="input-group-prepend">
									    <span class="input-group-text table_sizefont" id="inputGroup-sizing-sm">Cantidad</span>
									</div>
									<input type="number" name="cantidad_cigarrillos_dia" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" style="width: 20px;">
									<label for="cantidad_cigarrillos_dia" generated="true" class="error"></label>
								</div>						
							</td>
							<td>
								<label for="tomahab" generated="true" class="error"></label>
								<input type="radio" name="tomahab" value="Si"> Si 
								<input type="radio" name="tomahab" value="No"> No
							</td>
							<td>
								<div class="input-group input-group-sm mb-3">
									<div class="input-group-prepend">
									    <span class="input-group-text table_sizefont" id="inputGroup-sizing-sm">Años</span>
									</div>
									<input type="number" name="anoshab_beber" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" style="width: 40px;">
									<label for="anoshab_beber" generated="true" class="error"></label>
								</div>	
								
							</td>
						</tr>
					</tbody>
				</table><br>

				<table class="table table-bordered"> 
					<thead>
						<th class="text-center">Frecuencia</th>
						<th class="text-center">Tipo Licor</th>
						<th class="text-center">Exbebedor</th>
						<th class="text-center">Exbebedor</th>
					</thead> 
					<tbody>
						<tr class="text-center">
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
							<td>
								<label for="exbebedor" generated="true" class="error"></label>
								<input type="radio" name="exbebedor" value="Si"> Si 
								<input type="radio" name="exbebedor" value="No"> No
							</td>
							<td>
								<div class="input-group input-group-sm mb-3">
									<div class="input-group-prepend">
									    <span class="input-group-text table_sizefont" id="inputGroup-sizing-sm">Años</span>
									</div>
									<input type="number" name="exbebedor_anos" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" style="width: 40px;">
									<label for="exbebedor_anos" generated="true" class="error"></label>
								</div>
							</td>	   
						</tr>
					</tbody>
				</table>
				
				<label for="">Problemas con bebidas: 
					<label for="problemasbebidas" generated="true" class="error"></label>
					<input type="radio" name="problemasbebidas" value="Si"> Si 
					<input type="radio" name="problemasbebidas" value="No"> No
				</label>
				<div class="input-group input-group-sm mb-3">
					<div class="input-group-prepend">
					    <span class="input-group-text table_sizefont" id="inputGroup-sizing-sm">Cuales:</span>
					</div>
					<textarea name="cuales_bebidas" class="form-control" rows="1"></textarea>
					<label for="cuales_bebidas" generated="true" class="error"></label>
				</div>

				<label for="">Otros habitos toxicos: 
					<label for="otroshabitos" generated="true" class="error"></label>
					<input type="radio" name="otroshabitos" value="Si"> Si 
					<input type="radio" name="otroshabitos" value="No"> No
				</label>
				<div class="input-group input-group-sm mb-3">
					<div class="input-group-prepend">
					    <span class="input-group-text table_sizefont" id="inputGroup-sizing-sm">Cuales:</span>
					</div>
					<textarea name="nombre_otrohabito" class="form-control" rows="1"></textarea>
					<label for="nombre_otrohabito" generated="true" class="error"></label> 
				</div>
				
				<label for="medic_regularmente" generated="true" class="error"></label>
				<label for="" class="text-dark">Medicamentos regularmente: 
					Si <input type="radio" name="medic_regularmente" value="Si">
					No <input type="radio" name="medic_regularmente" value="No">
				</label>
				<label for="nombre_medicamento" generated="true" class="error"></label>
				<div class="input-group">
				  <div class="input-group-prepend">
				    <span class="input-group-text">Cuales:</span>
				  </div>
				  <textarea name="nombre_medicamento" class="form-control" rows="1"></textarea>
				</div><br>

				
				<label for="cirugiaseps" generated="true" class="error"></label>
				<label for="" class="text-dark">Pendiente cirugias en su EPS: 
					Si <input type="radio" name="cirugiaseps" value="Si"> 
					No <input type="radio" name="cirugiaseps" value="No"> 
				</label>
				<label for="cuales_cirugias" generated="true" class="error"></label>
				<div class="input-group">
				  <div class="input-group-prepend">
				    <span class="input-group-text">Cuales:</span>
				  </div>
				  <textarea name="cuales_cirugias" class="form-control" rows="1"></textarea>
				</div><br>
				
				<label for="pend_tratamiento" generated="true" class="error"></label>
				<label for="" class="text-dark">Pendiente tratamientos: 
					Si <input type="radio" name="pend_tratamiento" value="Si">
					No <input type="radio" name="pend_tratamiento" value="No">
				</label>
				<label for="cuales_tratamientos" generated="true" class="error"></label>
				<div class="input-group">
				  <div class="input-group-prepend">
				    <span class="input-group-text">Cuales:</span>
				  </div>
				  <textarea name="cuales_tratamientos" class="form-control" rows="1"></textarea>
				</div><br>

				<label for="" class="text-dark">¿Incapacidad en estos 6 Meses?
					Si <input type="radio" name="incapacidadultimosmeses" value="Si">  
					No <input type="radio" name="incapacidadultimosmeses" value="No"> 
				</label>
				<div class="input-group mb-3">
				  <div class="input-group-prepend">
					<span class="input-group-text">Motivo:</span>
				  </div>
				  <textarea class="form-control input-sm" name="motivo_incapacidad" rows="1"></textarea>
				</div>
			</div>
		</div>    
	</div><br>	

	<div class="panel panel-default">
		<div class="panel-heading text-center"><h6>Signos Vitales: </h6></div>
		<div class="panel-body">
			<div class="container-fluid">
				
				<div class="text-center">
					<div class="row">
						<div class="col-sm-6">
							<label for="" class="text-dark">Cicatrices:</label>
							<label for="cicatrices" generated="true" class="error"></label>
							Si <input type="radio" name="cicatrices" value="Si">  
							No <input type="radio" name="cicatrices" value="No" checked> 
						</div>
						<div class="col-sm-6">
							<label for="" class="text-dark">Tatuajes</label>
							<label for="tatuajes" generated="true" class="error"></label>
							Si <input type="radio" name="tatuajes" value="Si">  
							No <input type="radio" name="tatuajes" value="No" checked> 
						</div>
					</div>
				</div><br>

				<table class="table table-bordered">
					<thead>
						<th class="text-center" data-toggle="tooltip" title="Perimetro Abdominal">P. Abdominal</th>
						<th class="text-center" data-toggle="tooltip" title="Perimetro Toraxico">P. Toraxico</th>
						<th class="text-center" data-toggle="tooltip" title="Perimetro Arterial">T. Arterial</th>
						<th class="text-center" data-toggle="tooltip" title="Frecuencia Cardiaca">F. Cardiaca</th>
						<th class="text-center" data-toggle="tooltip" title="Frecuencia Respiratoria">F. Respiratoria</th>
						<th class="text-center">Talla</th>
						<th>Peso</th>
					</thead>
					<tbody class="text-center">
						<tr class="table_sizefont">
							<td style="width: 130px;">								
								<div class="input-group input-group-sm mb-3">
									<label for="perimetro_abdominal" generated="true" class="error"></label>	
								  <input type="number" name="perimetro_abdominal" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" min="0">
								  <div class="input-group-prepend">
								    <span class="input-group-text" id="inputGroup-sizing-sm">CM</span>
								  </div>
								</div>
							</td>
							<td style="width: 130px;">
								<div class="input-group input-group-sm mb-3">
									<label for="perimetro_toraxico" generated="true" class="error"></label>	
								  <input type="number" name="perimetro_toraxico" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" min="0">
								  <div class="input-group-prepend">
								    <span class="input-group-text" id="inputGroup-sizing-sm">CM</span>
								  </div>
								</div>
							</td>
							<td style="width: 130px;">
								<div class="input-group input-group-sm mb-3">
									<label for="tensionarterial" generated="true" class="error"></label> 	
								  <input type="number" name="tensionarterial" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" min="0">
								  <div class="input-group-prepend">
								    <span class="input-group-text" id="inputGroup-sizing-sm">MM</span>
								  </div>
								</div>
							</td>
							<td style="width: 130px;">
								<div class="input-group input-group-sm mb-3">
									<label for="frecuenciacardiaca" generated="true" class="error"></label>	
								  <input type="number" name="frecuenciacardiaca" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" min="0">
								  <div class="input-group-prepend">
								    <span class="input-group-text" id="inputGroup-sizing-sm">PPS</span>
								  </div>
								</div>
							</td>
							<td style="width: 130px;">
								<div class="input-group input-group-sm mb-3">
									<label for="frecuenciarespiratoria" generated="true" class="error"></label>
								  <input type="number" name="frecuenciarespiratoria" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" min="0">
								  <div class="input-group-prepend">
								    <span class="input-group-text" id="inputGroup-sizing-sm">RPM</span>
								  </div>
								</div>
							</td>
							<td style="width: 130px;">
								<div class="input-group input-group-sm mb-3">
									<label for="talla" generated="true" class="error"></label>	
								  <input type="number" name="talla" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" min="0">
								  <div class="input-group-prepend">
								    <span class="input-group-text" id="inputGroup-sizing-sm">M</span>
								  </div>
								</div>
							</td>
							<td style="width: 130px;">
								<div class="input-group input-group-sm mb-3">
									<label for="peso" generated="true" class="error"></label> 	
								  <input type="number" name="peso" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" min="0">
								  <div class="input-group-prepend">
								    <span class="input-group-text" id="inputGroup-sizing-sm">KG</span>
								  </div>
								</div>
							</td>
						</tr> 
					</tbody>
				</table>
				<div class="row">
					<div class="col-sm-6">
					  <div class="form-group">
					  	<label for="exampleFormControlSelect1" class="text-dark">Extremidad Habil</label>
					  	<label for="mano_habil" generated="true" class="error"></label>
					    <select name="mano_habil" class="form-control" id="exampleFormControlSelect1">
					      <option>Seleccionar</option>
					      <option value="Diestro">Diestro</option>
					      <option value="Zurdo">Zurdo</option>
					      <option value="Ambidiestro">Ambidiestro</option>
					    </select>
					  </div>
					</div>

					<div class="col-sm-6">
					  <div class="form-group">
					  	<label for="pesodiagnostico" generated="true" class="error"></label>
					    <label for="exampleFormControlSelect1" class="text-dark">Diagnostico de peso</label>
					    <select name="pesodiagnostico" class="form-control" id="exampleFormControlSelect1">
					      <option>Seleccionar</option>
					      <option value="Adecuado">Peso adecuado</option>
					      <option value="Bajo">Peso bajo</option>
					      <option value="Sobrepeso">Sobrepeso</option>
					      <option value="Obesidad">Obesidad</option>
					    </select>
					  </div>
					</div>
				</div><br>
                
                <label for="" class="text-dark"> Otras mediciones:</label>
                <label for="otras_mediciones" generated="true" class="error"></label>
				<textarea type="text" name="otras_mediciones" rows="1" class="form-control"></textarea>
			</div>
		</div>
	</div><br>	 

	<div class="panel panel-default">
		<div class="panel-heading">
			<div class="text-center">
				<h6>Informacion Suministrada por la empresa, sobre riesgos laborales a exponerse</h6>
			</div>
		</div>
		<div class="panel-body">
			<div class="container-fluid">
				<label for="riesgos_suministrado" generated="true" class="error"></label>  
				<div class="text-center">
					<label>Suministrados:</label> Si <input type="radio" name="riesgos_suministrado" value="Si"> / No <input type="radio" name="riesgos_suministrado" value="No">
				</div>
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
<?php 
  //controlador funcion lectorfecha
  $fecha1 = explode("-",date($ultimo)); 
  $fecha2 = $fecha1[0].$fecha1[1].$fecha1[2]; 
  $fechaleida = cambioFecha($fecha2); 
?>
<!-- Modal -->
<div class="modal fade" id="historial" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="text-danger"><i class="fas fa-address-card"></i> Historial de Atenciones</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <h6 class="text-primary"><i class="fas fa-archive"></i> Historial de paciente con indentificacion numero: <label for="" class="text-danger"><?php echo $id; ?></label></h6>
        <h6><i class="fas fa-notes-medical"></i> Motivo de evaluaciones <strong class="text-danger">Ingreso: </strong> <span class="badge badge-secondary"><?php echo $ingreso ?></span></h6>
        <h6><i class="fas fa-notes-medical"></i> Motivo de evaluaciones <strong class="text-danger">Periodicas: </strong> <span class="badge badge-secondary"><?php echo $periodico ?></span></h6>
        <h6><i class="fas fa-notes-medical"></i> Motivo de evaluaciones <strong class="text-danger">Retiro: </strong> <span class="badge badge-secondary"><?php echo $retiro ?></span></h6>
        <h6><i class="fas fa-notes-medical"></i> Motivo de evaluaciones <strong class="text-danger">Post Incapacidad: </strong> <span class="badge badge-secondary"><?php echo $postincapacidad ?></span></h6>
        <h6><i class="fas fa-notes-medical"></i> Motivo de evaluaciones <strong class="text-danger">Reubicacion: </strong> <span class="badge badge-secondary"><?php echo $reubicacion ?></span></h6>
        <h6><i class="fas fa-notes-medical"></i> Motivo de evaluaciones <strong class="text-danger">Reingreso: </strong> <span class="badge badge-secondary"> <?php echo $reingreso ?></span></h6>
        <h6><i class="fas fa-notes-medical"></i> Motivo de evaluaciones <strong class="text-danger">Otros: </strong> <span class="badge badge-secondary"> <?php echo $otros ?></span></h6>

        <h6 class="size_font"><i class="fas fa-calendar-plus"></i> <label for="" class="text-dark">La ultima atencion en enfermeria se realizó el dia: </label><strong class="text-danger"> <?php echo $fechaleida ?></h6>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-info" ><a target="_blank" href="enfermeria_listarpacientes.php" class="fontcolor"><i class="fas fa-search"></i> Consultar</a></button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!---->
<script src="jvalidation/validaciones/enfermeria.js"></script>
<script src="hora.js"></script>
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
</script>
</html>
