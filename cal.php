<?php
	include ('model_pdf.php');
	include ('includes/conexion.php');

	$ruta_destino =   "fotografias/";
	$historia = base64_decode($_REQUEST['paciente']);

	$query = "SELECT * FROM datos_basicos AS db
	JOIN datos_complementarios AS dc ON db.fk_d_complementario = dc.id
	JOIN datos_basicos_tipo_documento AS dbtd ON dbtd.idtd = dc.fk_tipo_documento
	JOIN medico_examen_fisico AS mef ON  mef.paciente_medico =  db.id_historia

	JOIN medico_paraclinicos AS mep ON mef.id = mep.id_examen_fisico
    JOIN medico_remision AS mer ON mep.id = mer.id_paraclinico
    JOIN medico_concepto_aptitud_laboral AS mcal ON mer.id = mcal.id_remision
    JOIN medico_recomendaciones_y_restricciones AS mrr ON mcal.id = mrr.id_aptitud_laboral
    JOIN medico_pve AS pve ON mrr.id = pve.fk_recomendaciones
    JOIN signos_vitales_enf AS sve
    JOIN enfermeria_riesgos_suministrados AS ers on sve.id = ers.id_signos_vitales

	 WHERE db.id_historia = '$historia'";
	$resultado = mysqli_query($conexion,$query);
	while($row = $resultado->fetch_assoc()){
		$fechaexamen = $row['fecha'];
		$documento = $row['numero_documento'];
		$nombres = $row['nombres_apellidos'];
	//mantenimiento pendiente
	$fecha1 = explode("-",date($fechaexamen)); 
	$fecha2 = $fecha1[0].$fecha1[1].$fecha1[2]; 
	$fechafinal = cambioFecha($fecha2); 

	$pdf = new PDF('P','pt',array(812,1008));
	$pdf->AliasNbPages();
	$pdf->AddPage();
	
	$pdf->SetFillColor(232,232,232);
	
	$pdf->hoja1();

	$pdf->SetFont('Arial','B',9);

	$pdf->Cell(750,12,'DATOS DE LA EMPRESA',1,1,'C',1);

	$pdf->SetFont('Arial','',9);//
	$pdf->Cell(150,12,'Nombre Empresa',1,0,'C',1);
	$pdf->Cell(130,12,'Ciudad',1,0,'C',1);
	$pdf->Cell(152,12,'Actividad Economica',1,0,'C',1);
	$pdf->Cell(190,12,utf8_decode('Cargo a desempeñar'),1,0,'C',1);
	$pdf->Cell(128,12,'Foto del trabajador',1,1,'C',1);
	$pdf->Cell(1,1,'.',1,1,'C',1);

	$pdf->SetFont('Arial','B',7);//
	$pdf->Cell(150,12,utf8_decode($row['nombre_empresa']),1,0,'C');
	$pdf->Cell(130,12,utf8_decode($row['ciudad']),1,0,'C');
	$pdf->Cell(152,12,utf8_decode($row['actividad_economica']),1,0,'C');
	$pdf->Cell(190,12,utf8_decode($row['cargo_a_desempenar']),1,0,'C');
	$pdf->Cell(128,97, $pdf->Image($ruta_destino."".$historia.'.png', 654,93,121),1,0,'C');
	$pdf->Cell(1,12,utf8_decode(''),1,1,'C');

	//$pdf->Ln(2);
	$pdf->SetFont('Arial','B',9);//
	$pdf->Cell(622,12,'DATOS DEL TRABAJADOR',1,1,'C',1);

	$pdf->SetFont('Arial','',9);//
	$pdf->Cell(210,12,'Nombres y Apellidos',1,0,'C',1);
	$pdf->Cell(100,12,'Tipo documento',1,0,'C',1);
	$pdf->Cell(90,12,'Numero documento',1,0,'C',1);
	$pdf->Cell(27,12,'Edad',1,0,'C',1);
	$pdf->Cell(55,12,'Genero',1,0,'C',1);
	$pdf->Cell(140,12,'Fecha de examen',1,1,'C',1);

	$pdf->SetFont('Arial','B',7);//
	$pdf->Cell(210,12,utf8_decode($row['nombres_apellidos']),1,0,'C');
	$pdf->CellFitSpace(100,12,utf8_decode($row['tipo_documento']),1,0,'C');
	$pdf->Cell(90,12,utf8_decode($row['numero_documento']),1,0,'C');
	$pdf->Cell(27,12,utf8_decode($row['edad']),1,0,'C');
	$pdf->Cell(55,12,utf8_decode($row['genero']),1,0,'C');
	$pdf->Cell(140,12,utf8_decode($fechafinal),1,1,'C');

	$pdf->SetFont('Arial','B',8);//

//
	//$pdf->Ln(2);

	$pdf->SetFont('Arial','B',9);//
	$pdf->Cell(622,12,'TIPO DE EXAMEN MEDICO - OCUPACIONAL:',1,1,'C',1);

	$pdf->SetFont('Arial','',9);//
	$pdf->Cell(622,12,utf8_decode($row['motivo_evaluacion']),1,1,'C');

	//$pdf->Ln(2);

	$pdf->SetFont('Arial','B',9);//
	$pdf->Cell(622,12,'EXAMEN MEDICO CON ENFASIS EN:',1,1,'C',1);
	//$pdf->Cell(1,12,'',1,0,'C',1);

	//$pdf->Cell(188,1,'',0,1,'C',0);

	$pdf->SetFont('Arial','',8);//
	$pdf->Cell(65,12,'Osteomuscular',1,0,'C',1);
	$pdf->Cell(65,12,'Cardiovascular',1,0,'C',1);
	$pdf->Cell(39,12,'Pulmonar',1,0,'C',1);
	$pdf->Cell(98,12,'Manipulacion Alimentos',1,0,'C',1);
	$pdf->Cell(355,12,'Otros:',1,1,'C',1); 

	//$pdf->Cell(1,12,'',1,1,'C',1);

	$pdf->SetFont('Arial','',8);//
	$pdf->Cell(65,12,utf8_decode($row['enfasis_osteomuscular']),1,0,'C');
	$pdf->Cell(65,12,utf8_decode($row['enfasis_cardiovascular']),1,0,'C');
	$pdf->Cell(39,12,utf8_decode($row['enfasis_pulmonar']),1,0,'C');
	$pdf->Cell(98,12,utf8_decode($row['enfasis_manipulacion_alimentos']),1,0,'C');
	$pdf->Cell(483,12,utf8_decode($row['enfasis_otros']),1,1,'C');

	
	$pdf->SetFont('Arial','B',8);//
	$pdf->Cell(750,13,'EXAMENES REALIZADOS:',1,1,'C',1);

	$pdf->SetFont('Arial','',8);//
	$pdf->Cell(42,12,'Colesterol',1,0,'C',1);
	$pdf->Cell(39,12,'Glicemia',1,0,'C',1);
	$pdf->Cell(50,12,'Trigliceridos',1,0,'C',1);
	$pdf->Cell(42,12,'Grupo RH',1,0,'C',1);
	$pdf->Cell(55,12,utf8_decode('Frotis de uña'),1,0,'C',1);
	$pdf->Cell(50,12,'Hemograma',1,0,'C',1);

	$pdf->Cell(50,12,'Coprologico',1,0,'C',1);
	$pdf->Cell(60,12,'Frotis Faringeo',1,0,'C',1);
	$pdf->Cell(76,12,utf8_decode('Electrocardiograma'),1,0,'C',1);
	$pdf->Cell(60,12,'Tamizaje Visual',1,0,'C',1);
	$pdf->Cell(46,12,'Audiometria',1,0,'C',1);
	$pdf->Cell(43,12,'Visiometria',1,0,'C',1);
	$pdf->Cell(43,12,utf8_decode('Optometria'),1,0,'C',1);
	$pdf->Cell(44,12,'Psicologico',1,0,'C',1);
	$pdf->Cell(50,12,'Espirometria',1,1,'C',1);
	
	$pdf->Cell(42,12,utf8_decode($row['colesterol']),1,0,'C');
	$pdf->Cell(39,12,utf8_decode($row['glicemia']),1,0,'C');
	$pdf->Cell(50,12,utf8_decode($row['trigliceridos']),1,0,'C');
	$pdf->Cell(42,12,utf8_decode($row['grupo_rh']),1,0,'C');
	$pdf->Cell(55,12,utf8_decode($row['frotis_de_una']),1,0,'C');
	$pdf->Cell(50,12,utf8_decode($row['hemograma']),1,0,'C');

	$pdf->Cell(50,12,utf8_decode($row['coprologico']),1,0,'C');
	$pdf->Cell(60,12,utf8_decode($row['frotis_faringeo']),1,0,'C');
	$pdf->Cell(76,12,utf8_decode($row['electrocardiograma']),1,0,'C');
	$pdf->Cell(60,12,utf8_decode($row['ex_tamizaje_visual']),1,0,'C');
	$pdf->Cell(46,12,utf8_decode($row['ex_audiometria']),1,0,'C');
	$pdf->Cell(43,12,utf8_decode($row['ex_visiometria']),1,0,'C');
	$pdf->Cell(43,12,utf8_decode($row['ex_optometria']),1,0,'C');
	$pdf->Cell(44,12,utf8_decode($row['ex_psicologico']),1,0,'C');
	$pdf->Cell(50,12,utf8_decode($row['ex_espirometria']),1,1,'C');

	$pdf->SetFont('Arial','B',8);
	$pdf->Cell(269,12,'Rayos X',1,0,'C',1);
	$pdf->Cell(481,12,'Otros examenes realizados',1,1,'C',1);

	$pdf->SetFont('Arial','',8);//
	$pdf->Cell(40,12,'Columna',1,0,'C',1);
	$pdf->Cell(25,12,'Torax',1,0,'C',1);
	$pdf->Cell(42,12,'Abdomen',1,0,'C',1);
	$pdf->Cell(82,12,'Miembros Superiores',1,0,'C',1);
	$pdf->Cell(80,12,'Miembros inferiores',1,0,'C',1);
	$pdf->Cell(481,24,utf8_decode($row['ex_otros']),1,0,'C');
	$pdf->Cell(1,12,'',1,1,'C',1);

	$pdf->Cell(40,12,utf8_decode($row['columna_paraclinico']),1,0,'C');
	$pdf->Cell(25,12,utf8_decode($row['torax_paraclinico']),1,0,'C');
	$pdf->Cell(42,12,utf8_decode($row['abdomen_paraclinico']),1,0,'C');
	$pdf->Cell(82,12,utf8_decode($row['miembros_superiores_paraclinico']),1,0,'C');
	$pdf->Cell(80,12,utf8_decode($row['miembros_inferiores_paraclinico']),1,1,'C');
	
	$pdf->SetFont('Arial','B',9);
	$pdf->Cell(750,12,'Observaciones:',1,1,'C',1);

	$pdf->SetFillColor(255,255,255);
	$pdf->SetFont('Arial','',8);
	$pdf->MultiCell(750,12,utf8_decode($row['observaciones_ex_fisico']),1,1,'C');
	//$pdf->Ln(2);

	$pdf->SetFont('Arial','B',9);//
	$pdf->Cell(750,12,'INFORMACION SUMINISTRADA POR LA EMPRESA SOBRE EXPOSICION A RIESGOS LABORALES: ( '.utf8_decode($row['riesgos_suministrados']).' )',1,1,'C',1);
	$pdf->Cell(188,1,'',0,1,'C',0);

	$pdf->SetFont('Arial','',8);//
	$pdf->Cell(55,12,'Ergonomico:',1,0,'C',1);
	$pdf->Cell(35,12,'Fisico:',1,0,'C',1);
	$pdf->Cell(35,12,'Quimico:',1,0,'C',1);
	$pdf->Cell(40,12,'Biologico:',1,0,'C',1);
	$pdf->Cell(50,12,'Psicosocial:',1,0,'C',1);
	$pdf->Cell(45,12,'Electrico:',1,0,'C',1);
	$pdf->Cell(45,12,'Mecanico:',1,0,'C',1);
	$pdf->Cell(445,12,'Otro:',1,1,'C',1);

	$pdf->Cell(55,12,utf8_decode($row['suministrado_ergonomico']),1,0,'C');
	$pdf->Cell(35,12,utf8_decode($row['suministrado_fisico']),1,0,'C');
	$pdf->Cell(35,12,utf8_decode($row['suministrado_quimico']),1,0,'C');
	$pdf->Cell(40,12,utf8_decode($row['suministrado_biologico']),1,0,'C');
	$pdf->Cell(50,12,utf8_decode($row['suministrado_psicosocial']),1,0,'C');
	$pdf->Cell(45,12,utf8_decode($row['suministrado_electrico']),1,0,'C');
	$pdf->Cell(45,12,utf8_decode($row['suministrado_mecanico']),1,0,'C');
	$pdf->Cell(445,12,utf8_decode($row['suministrado_otro']),1,1,'C');

	$pdf->SetFont('Arial','B',9);//
	$pdf->Cell(750,12,'APTITUD OCUPACIONAL ( '.utf8_decode($row['motivo_evaluacion']).' )',1,1,'C',1);
	$pdf->Cell(188,1,'',0,1,'C',0);

	$pdf->SetFont('Arial','',9);//
	$pdf->Cell(650,12, utf8_decode('EL EXAMEN FISICO NO PRESENTA ALTERACIONES NI PATOLOGÍAS: '),1,0,'J');

	$pdf->SetFont('Arial','B',8);//
	$pdf->Cell(100,12,utf8_decode($row['ef_no_defectos']),1,1,'C');

	$pdf->SetFont('Arial','',9);//
	$pdf->Cell(650,12,utf8_decode('EL EXAMEN MEDICO PRESENTA CONDICIONES DE SALUD QUE NO DISMINUYEN SU CAPACIDAD LABORAL:'),1,0,'J');

	$pdf->SetFont('Arial','B',8);//
	$pdf->Cell(100,12,utf8_decode($row['ef_disminuye_capacidad']),1,1,'C');

	$pdf->SetFont('Arial','',9);//
	$pdf->Cell(650,12,utf8_decode('EL EXAMEN MEDICO PRESENTA CONDICIONES DE SALUD QUE PUEDEN AGRAVARSE CON EL TRABAJO: '),1,0,'J');

	$pdf->SetFont('Arial','B',8);//
	$pdf->Cell(100,12,utf8_decode($row['ef_condiciones_agravarse']),1,1,'C');

	$pdf->SetFont('Arial','',9);//
	$pdf->CellFitSpace(650,12, utf8_decode('EL EXAMEN MEDICO PRESENTA CONDICIONES DE SALUD QUE DEBEN SER TRATADAS POR EPS, ARL:'),1,0,'J');

	$pdf->SetFont('Arial','B',8);//
	$pdf->Cell(100,12, utf8_decode($row['ef_condiciones_atendidas_por_eps']),1,1,'C');/*------here--------*/

	$pdf->SetFont('Arial','',9);//
	$pdf->CellFitSpace(650,12, utf8_decode('EL EXAMEN MEDICO PRESENTA CONDICIONES DE SALUD QUE DEBEN SER TRATADAS POR EPS, ARL, ANTES DE INGRESAR:'),1,0,'J');

	$pdf->SetFont('Arial','B',8);//
	$pdf->Cell(100,12, utf8_decode($row['atencion_en_eps_antesingresar']),1,1,'C');

	$pdf->SetFont('Arial','',9);//
	$pdf->CellFitSpace(650,12, utf8_decode('EL EXAMEN MEDICO PRESENTA ALTERACIONES DE SALUD INCOMPATIBLES CON EL CARGO ASIGNADO:'),1,0,'J');

	$pdf->SetFont('Arial','B',8);//
	$pdf->Cell(100,12, /*utf8_decode($row[''])*/'',1,1,'C');

	$pdf->SetFont('Arial','B',9);//
	$pdf->Cell(750,12,'REMISION: ( '.utf8_decode($row['remision']).' )',1,1,'C',1);

	$pdf->SetFont('Arial','',8);//
	$pdf->Cell(260,12,'Especialidad:',1,0,'C',1);
	$pdf->Cell(240,12,'ARL:',1,0,'C',1);
	$pdf->Cell(250,12,'EPS:',1,1,'C',1);

	//$pdf->Cell(70,12,/*utf8_decode($row[''])*/'',1,0,'C');
	$pdf->Cell(260,12,utf8_decode($row['especialidad']),1,0,'C');
	$pdf->Cell(240,12,utf8_decode($row['arl']),1,0,'C');
	$pdf->Cell(250,12,utf8_decode($row['eps']),1,1,'C');

	//$pdf->Ln(2);


	$pdf->SetFont('Arial','B',9);//
	$pdf->Cell(750,12,'RECOMENDACIONES',1,1,'C',1);

	$pdf->SetFont('Arial','',9);//
	$pdf->Cell(750,12,'TRABAJADOR:',1,1,'C',1);

	$pdf->SetFillColor(255,255,255);

	$pdf->SetFont('Arial','',8);//
	$pdf->MultiCell(750,12,utf8_decode($row['reco_trabajador']),1,1,'C');

	$pdf->SetFillColor(232,232,232);
	$pdf->SetFont('Arial','',9);//
	$pdf->Cell(750,12,'EMPRESA:',1,1,'C',1);

	$pdf->SetFillColor(255,255,255);
	$pdf->SetFont('Arial','',8);//
	$pdf->MultiCell(750,12,utf8_decode($row['reco_empleador']),1,1,'J');

	$pdf->SetFillColor(232,232,232);
	$pdf->SetFont('Arial','B',9);//
	$pdf->Cell(750,12,'INGRESO AL PROGRAMA DE VIGILANCIA EPIDEMIOLOGICA: ( '.utf8_decode($row['pve']).' )',1,1,'C',1);

	$pdf->SetFont('Arial','',8);//
	$pdf->Cell(30,12,'Visual:',1,0,'C',1);
	$pdf->Cell(35,12,'Auditivo:',1,0,'C',1);
	$pdf->Cell(60,12,'Cardiovascular:',1,0,'C',1);
	$pdf->Cell(51,12,'Respiratorio:',1,0,'C',1);
	$pdf->Cell(20,12,'Piel:',1,0,'C',1);	
	$pdf->Cell(50,12,'Psicologico:',1,0,'C',1);
	$pdf->Cell(63,12,'Osteomuscular:',1,0,'C',1);
	$pdf->Cell(441,12,'Otro:',1,1,'C',1);

	$pdf->Cell(30,12,utf8_decode($row['pve_visual']),1,0,'C');
	$pdf->Cell(35,12,utf8_decode($row['pve_auditivo']),1,0,'C');
	$pdf->Cell(60,12,utf8_decode($row['pve_cardiovascular']),1,0,'C');
	$pdf->Cell(51,12,utf8_decode($row['pve_respiratorio']),1,0,'C');
	$pdf->Cell(20,12,utf8_decode($row['pve_piel']),1,0,'C');
	$pdf->Cell(50,12,utf8_decode($row['pve_psicologico']),1,0,'C');
	$pdf->Cell(63,12,utf8_decode($row['pve_osteomuscular']),1,0,'C');
	$pdf->Cell(441,12,utf8_decode($row['pve_otro']),1,1,'C');

	$pdf->SetFillColor(232,232,232);
	//$pdf->Ln(2);

	$pdf->SetFont('Arial','B',9);//
	$pdf->Cell(750,12,'RESTRICCIONES',1,1,'C',1);

	$pdf->SetFont('Arial','',9);//
	$pdf->Cell(750,12,'TRABAJADOR:',1,1,'C',1);

	$pdf->SetFillColor(255,255,255);
	$pdf->SetFont('Arial','',8);//
	$pdf->MultiCell(750,12,utf8_decode($row['rest_trabajador']),1,1,'J');

	$pdf->SetFillColor(232,232,232);
	$pdf->SetFont('Arial','',9);//
	$pdf->Cell(750,12,'EMPRESA:',1,1,'C',1);

	$pdf->SetFillColor(255,255,255);
	$pdf->SetFont('Arial','',8);//
	$pdf->MultiCell(750,12,utf8_decode($row['rest_empleador']),1,1,'J');

	//$pdf->Ln(2);

	$pdf->SetFillColor(232,232,232);
	$pdf->SetFont('Arial','B',9);//
	$pdf->Cell(750,12,'CONCEPTO FINAL DE APTITUD OCUPACIONAL',1,1,'C',1);

	//$pdf->SetFont('Arial','B',9);//
	//$pdf->Cell(650,12, utf8_decode('APTO PARA EL CARGO ASIGNADO: '),1,0,'J');

	//$pdf->SetFont('Arial','',8);//
	//$pdf->Cell(100,12,utf8_decode($row['apto']),1,1,'C');

	$pdf->SetFont('Arial','B',9);//
	$pdf->Cell(650,12, utf8_decode('APTO PARA EL CARGO ASIGNADO SOLO A NIVEL:'),1,0,'J');

	$pdf->SetFont('Arial','',8);//
	$pdf->Cell(100,12,utf8_decode($row['apto_trabajo_nivel']),1,1,'C');//change this variable

	$pdf->SetFont('Arial','B',9);//
	$pdf->Cell(650,12, utf8_decode('APTO PARA EL CARGO ASIGNADO A NIVEL Y ALTURAS:'),1,0,'J');

	$pdf->SetFont('Arial','',8);//
	$pdf->Cell(100,12,utf8_decode($row['apto_trabajo_altura']),1,1,'C');

	$pdf->SetFont('Arial','B',9);//
	$pdf->Cell(650,12, utf8_decode('APLAZADO: '),1,0,'J');

	$pdf->SetFont('Arial','',8);//
	$pdf->Cell(100,12,utf8_decode($row['aplazado']),1,1,'C');




	$pdf->Ln(200);

	$pdf->SetFont('Arial','B',9);//
	$pdf->Cell(200,12, 'Nombre, Firma y LSO',0,0,'C');

	$pdf->Cell(300,12, '',0,0,'C');
	$pdf->Cell(1,0, $pdf->Image("images/firmas/medicfirma".'.png', 88,855,100),1,0,'C');
	$pdf->Cell(200,12, 'Nombre o Firma del Trabajador',0,1,'C');
	$pdf->Ln();

	$pdf->SetFillColor(255,255,255);	
	$pdf->MultiCell(750,9, utf8_decode('La presente certificación se expide con base en la información manifestada por el trabajador, por la empresa, por el resultado del examen físico médico ocupacional y los resultados de los exámenes paraclínicos realizados, si aplican, dicho certificado tiene carácter confidencial, según la normatividad vigente.'),0,1,'J');


	}
	$modo="I"; 
    $nombre ="Concepto_Aptitud_Laboral_LSST_".$fechaexamen.'_'.trim($documento).'_'.$nombres.".pdf"; 
	$pdf->Output($nombre,$modo);

	/*-----*/
	function cambioFecha($fecha){ //$fecha es de este formato --> ej: 20081229 

	$tieneCeroDiaMes = substr($fecha,6,1); 

	if ($tieneCeroDiaMes == 0) { 
	    $diaMes = substr($fecha,7,1); 
	} else { 
	    $diaMes = substr($fecha,6,2); 
	} 

	$dd = date("w",strtotime($fecha)); 
	switch ($dd) {
		case '0':
			$array_dias = "Domingo ";
			break;
		case '1':
			$array_dias = "Lunes ";
			break;

		case '2':
			$array_dias = "Martes ";
			break;

		case '3':
			$array_dias = "Miercoles ";
			break;

		case '4':
			$array_dias = "Jueves ";
			break;
		
		case '5':
			$array_dias = "Viernes ";
			break;

		case '6':
			$array_dias = "Sabado ";
			break;

		case '7':
			$array_dias = "Domingo ";
			break;

		default:
			$array_dias = " ";
			break;
		}

		$Mes = substr($fecha,4,2); 
		$Mes = str_replace("01","Enero",$Mes); 
		$Mes = str_replace("02","Febrero",$Mes); 
		$Mes = str_replace("03","Marzo",$Mes); 
		$Mes = str_replace("04","Abril",$Mes); 
		$Mes = str_replace("05","Mayo",$Mes); 
		$Mes = str_replace("06","Junio",$Mes); 
		$Mes = str_replace("07","Julio",$Mes); 
		$Mes = str_replace("08","Agosto",$Mes); 
		$Mes = str_replace("09","Septiembre",$Mes); 
		$Mes = str_replace("10","Octubre",$Mes); 
		$Mes = str_replace("11","Noviembre",$Mes); 
		$Mes = str_replace("12","Diciembre",$Mes); 

		$Anio = substr($fecha,0,4); 

		 
		return $array_dias . $diaMes." de ".$Mes." de ".$Anio.""; 
	} 
?>
