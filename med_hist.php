<?php
	include ('med_modelpdf.php');
	include ('includes/conexion.php');

	$ruta_destino =   "fotografias/";
	$historia = base64_decode($_REQUEST['paciente']);

	$query = "SELECT * FROM datos_basicos AS db
	JOIN datos_complementarios AS dc ON db.fk_d_complementario = dc.id
	JOIN datos_basicos_tipo_documento AS dbtd ON dbtd.idtd = dc.fk_tipo_documento
    JOIN medico_examenfisico AS mef ON db.id_historia = mef.paciente_medico
    JOIN medico_paraclinicos AS mp ON mef.id = mp.id_examen_fisico
    JOIN medico_remision AS mr ON mp.id = mr.id_paraclinico
    JOIN medico_cal AS mcal ON mr.id = mcal.id_remision
    JOIN medico_recomendacion AS mre ON mcal.id = mre.id_aptitud_laboral
    JOIN medico_pve AS mpve ON mre.id = mpve.fk_recomendaciones
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

	$pdf->Cell(622,12,'                                        DATOS DE LA EMPRESA',1,0,'C',1);

	$pdf->Cell(128,12,'Foto del trabajador',1,1,'C',1);
	$pdf->Cell(1,1,'.',1,1,'C',1);

	$pdf->SetFont('Arial','',9);//
	$pdf->Cell(150,12,'Nombre Empresa',1,0,'C',1);
	$pdf->Cell(130,12,'Ciudad',1,0,'C',1);
	$pdf->Cell(152,12,'Actividad Economica',1,0,'C',1);
	$pdf->Cell(190,12,utf8_decode('Cargo a desempeñar'),1,0,'C',1);
	$pdf->Cell(128,97, $pdf->Image($ruta_destino."".$historia.'.png', 654,75,121),1,0,'C');
	$pdf->Cell(1,12,utf8_decode(''),1,1,'C');


	$pdf->SetFont('Arial','B',7);//
	$pdf->Cell(150,12,utf8_decode($row['nombre_empresa']),1,0,'C');
	$pdf->Cell(130,12,utf8_decode($row['ciudad']),1,0,'C');
	$pdf->Cell(152,12,utf8_decode($row['actividad_economica']),1,0,'C');
	$pdf->Cell(190,12,utf8_decode($row['cargo_a_desempenar']),1,1,'C');


	//$pdf->Ln(2);
	$pdf->SetFont('Arial','B',9);//
	$pdf->Cell(622,12,'                                          DATOS DEL TRABAJADOR',1,1,'C',1);

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

	//$pdf->Ln(2);

	$pdf->SetFont('Arial','B',9);//
	$pdf->Cell(622,12,'                                       TIPO DE EXAMEN MEDICO - OCUPACIONAL:',1,1,'C',1);

	$pdf->SetFont('Arial','',9);//
	$pdf->Cell(622,12,utf8_decode($row['motivo_evaluacion']),1,1,'C');
	//$pdf->Ln(2);

	//$pdf->Ln(13);
	$pdf->SetFont('Arial','B',9);//
	$pdf->Cell(622,12,'                                                  EXAMEN FISICO:',1,1,'C',1);

	$pdf->SetFont('Arial','',8);//
	$pdf->Cell(85,12,'Cabeza',1,0,'C',1);
	$pdf->Cell(85,12,'Amigdalas',1,0,'C',1);
	$pdf->Cell(85,12,'Abdomen',1,0,'C',1);
	$pdf->Cell(80,12,'Piel-Anexos',1,0,'C',1);
	$pdf->Cell(80,12,'Ojos',1,0,'C',1);
	$pdf->Cell(80,12,'Cuello',1,0,'C',1);
	$pdf->Cell(85,12,'Genitales',1,0,'C',1);
	$pdf->Cell(85,12,'Neurologico',1,0,'C',1);
	$pdf->Cell(85,12,'Oidos',1,1,'C',1);

	$pdf->Cell(85,12,utf8_decode($row['cabeza']),1,0,'C');
	$pdf->Cell(85,12,utf8_decode($row['amigdalas']),1,0,'C');
	$pdf->Cell(85,12,utf8_decode($row['abdomen']),1,0,'C');
	$pdf->Cell(80,12,utf8_decode($row['piel_anexos']),1,0,'C');
	$pdf->Cell(80,12,utf8_decode($row['ojos']),1,0,'C');
	$pdf->Cell(80,12,utf8_decode($row['cuello']),1,0,'C');
	$pdf->Cell(85,12,utf8_decode($row['genitales']),1,0,'C');
	$pdf->Cell(85,12,utf8_decode($row['neurologico']),1,0,'C');
	$pdf->Cell(85,12,utf8_decode($row['oidos']),1,1,'C');


	
	$pdf->Cell(85,12,'Torax',1,0,'C',1);
	$pdf->Cell(85,12,'Miembros Superiores',1,0,'C',1);
	$pdf->Cell(85,12,'Muscular',1,0,'C',1);
	$pdf->Cell(80,12,'Nariz',1,0,'C',1);
	$pdf->Cell(80,12,'Pulmones',1,0,'C',1);
	$pdf->Cell(80,12,'Vascular',1,0,'C',1);
	$pdf->Cell(85,12,'Dentadura',1,0,'C',1);
	$pdf->Cell(85,12,'Miembros Inferiores',1,0,'C',1);
	$pdf->Cell(85,12,'Corazon',1,1,'C',1);

	$pdf->Cell(85,12,utf8_decode($row['corazon']),1,0,'C');
	$pdf->Cell(85,12,utf8_decode($row['miembros_superiores']),1,0,'C');
	$pdf->Cell(85,12,utf8_decode($row['muscular']),1,0,'C');
	$pdf->Cell(80,12,utf8_decode($row['nariz']),1,0,'C');
	$pdf->Cell(80,12,utf8_decode($row['pulmones']),1,0,'C');
	$pdf->Cell(80,12,utf8_decode($row['vascular']),1,0,'C');
	$pdf->Cell(85,12,utf8_decode($row['dentadura']),1,0,'C');
	$pdf->Cell(85,12,utf8_decode($row['miembros_inferiores']),1,0,'C');
	$pdf->Cell(85,12,utf8_decode($row['corazon']),1,1,'C');

	$pdf->Cell(85,12,'Columna',1,0,'C',1);
	$pdf->Cell(85,12,'Oseo',1,0,'C',1);
	$pdf->Cell(85,12,'Lengua',1,0,'C',1);
	$pdf->Cell(80,12,'Hernias',1,0,'C',1);
	$pdf->Cell(80,12,'Viceras',1,0,'C',1);
	$pdf->Cell(335,12,'Otros',1,1,'C',1);

	$pdf->Cell(85,12,utf8_decode($row['columna']),1,0,'C');
	$pdf->Cell(85,12,utf8_decode($row['oseo']),1,0,'C');
	$pdf->Cell(85,12,utf8_decode($row['lengua']),1,0,'C');
	$pdf->Cell(80,12,utf8_decode($row['hernia']),1,0,'C');
	$pdf->Cell(80,12,utf8_decode($row['viceras']),1,0,'C');
	$pdf->Cell(335,12,utf8_decode($row['otro_examen_fisico']),1,1,'C');


	$pdf->Cell(750,12,'OBSERVACIONES:',1,1,'C',1);
	$pdf->SetFillColor(255,255,255);
	$pdf->MultiCell(750,12,utf8_decode($row['observaciones_ex_fisico']),1,1,'C');

	$pdf->SetFillColor(232,232,232);
	$pdf->SetFont('Arial','B',9);//
	$pdf->Cell(750,12,'PRUEBAS FUNCIONALES:',1,1,'C',1);

	$pdf->SetFont('Arial','',8);//
	$pdf->Cell(85,12,'Marcha',1,0,'C',1);
	$pdf->Cell(85,12,'Columna',1,0,'C',1);
	$pdf->Cell(85,12,'Miembros superiores',1,0,'C',1);
	$pdf->Cell(85,12,'Miembros inferiores',1,0,'C',1);
	$pdf->Cell(80,12,'Coordinacion',1,0,'C',1);
	$pdf->Cell(80,12,'Reflejos',1,0,'C',1);
	$pdf->Cell(80,12,'Phalen',1,0,'C',1);
	$pdf->Cell(85,12,'Finkelstein',1,0,'C',1);
	$pdf->Cell(85,12,'Braggard',1,1,'C',1);
	
	$pdf->Cell(85,12,utf8_decode($row['marcha']),1,0,'C');
	$pdf->Cell(85,12,utf8_decode($row['columna_funcional']),1,0,'C');
	$pdf->Cell(85,12,utf8_decode($row['miembros_superiores_funcionales']),1,0,'C');
	$pdf->Cell(85,12,utf8_decode($row['miembros_inferiores_funcionales']),1,0,'C');
	$pdf->Cell(80,12,utf8_decode($row['coordinacion_funcionales']),1,0,'C');
	$pdf->Cell(80,12,utf8_decode($row['reflejos_funcionales']),1,0,'C');
	$pdf->Cell(80,12,utf8_decode($row['phalen']),1,0,'C');
	$pdf->Cell(85,12,utf8_decode($row['finkelstein']),1,0,'C');
	$pdf->Cell(85,12,utf8_decode($row['braggard']),1,1,'C');

	$pdf->Cell(85,12,'Shober',1,0,'C',1);
	$pdf->Cell(85,12,'Babinski-Weil',1,0,'C',1);
	$pdf->Cell(85,12,'Romber-Sensibilidad',1,0,'C',1);
	$pdf->Cell(85,12,'Romber',1,0,'C',1);
	$pdf->Cell(80,12,'Tinel',1,0,'C',1);
	$pdf->Cell(80,12,'Lasegue',1,0,'C',1);
	$pdf->Cell(80,12,'Adams',1,0,'C',1);
	$pdf->Cell(85,12,'Unterberger',1,0,'C',1);
	$pdf->Cell(85,12,'Nariz-dedo',1,1,'C',1);

	$pdf->Cell(85,12,utf8_decode($row['shober']),1,0,'C');
	$pdf->Cell(85,12,utf8_decode($row['babinski_weil']),1,0,'C');
	$pdf->Cell(85,12,utf8_decode($row['romber_sensibilidad']),1,0,'C');
	$pdf->Cell(85,12,utf8_decode($row['romber']),1,0,'C');
	$pdf->Cell(80,12,utf8_decode($row['tinel']),1,0,'C');
	$pdf->Cell(80,12,utf8_decode($row['lasegue']),1,0,'C');
	$pdf->Cell(80,12,utf8_decode($row['adams']),1,0,'C');
	$pdf->Cell(85,12,utf8_decode($row['unterberger']),1,0,'C');
	$pdf->Cell(85,12,utf8_decode($row['nariz_dedo']),1,1,'C');

	$pdf->Cell(97,12,'Miembros Superior-Tono',1,0,'C',1);
	$pdf->Cell(110,12,'Miembros Superior-Fuerza',1,0,'C',1);
	$pdf->Cell(128,12,'Miembros Superior-Sensibilidad',1,0,'C',1);
	$pdf->Cell(102,12,'Miembros Superior-Arcos',1,0,'C',1);
	$pdf->Cell(94,12,'Miembros Inferior-Tono',1,0,'C',1);
	$pdf->Cell(99,12,'Miembros Inferior-Fuerza',1,0,'C',1);
	$pdf->Cell(120,12,'Miembros Inferior-Sensibilidad',1,1,'C',1);

	$pdf->Cell(97,12,utf8_decode($row['miembro_superior_tono']),1,0,'C');
	$pdf->Cell(110,12,utf8_decode($row['miembro_superior_fuerza']),1,0,'C');
	$pdf->Cell(128,12,utf8_decode($row['miembro_superior_sensibilidad']),1,0,'C');
	$pdf->Cell(102,12,utf8_decode($row['miembro_superior_arco_movimiento']),1,0,'C');
	$pdf->Cell(94,12,utf8_decode($row['miembro_inferior_tono']),1,0,'C');
	$pdf->Cell(99,12,utf8_decode($row['miembro_inferior_fuerza']),1,0,'C');
	$pdf->Cell(120,12,utf8_decode($row['miembro_inferior_sensibilidad']),1,1,'C');

	$pdf->Cell(750,12,'Miembros Inferior-Arcos-Movimiento',1,1,'C',1);
	$pdf->Cell(750,12,utf8_decode($row['miembro_inferior_arco_movimiento']),1,1,'C');

	$pdf->Cell(750,12,'Hallazgos:',1,1,'C',1);
	$pdf->SetFillColor(255,255,255);
	$pdf->MultiCell(750,12,utf8_decode($row['hallazgos_funcionales']),1,1,'C');

	$pdf->SetFont('Arial','B',9);//
	$pdf->SetFillColor(232,232,232);
	$pdf->Cell(750,12,'PARACLINICOS:',1,1,'C',1);

	$pdf->Cell(90,12,'Colesterol',1,0,'C',1);
	$pdf->Cell(90,12,'Glicemia',1,0,'C',1);
	$pdf->Cell(90,12,'Trigliceridos',1,0,'C',1);
	$pdf->Cell(97,12,'Frotis Faringeo',1,0,'C',1);
	$pdf->Cell(97,12,utf8_decode('Frotis de uña'),1,0,'C',1);
	$pdf->Cell(92,12,'Hemograma',1,0,'C',1);
	$pdf->Cell(97,12,'Coprologico',1,0,'C',1);
	$pdf->Cell(97,12,'Electrocardiograma',1,1,'C',1);

	$pdf->SetFont('Arial','',8);//
	$pdf->Cell(90,12,utf8_decode($row['colesterol']),1,0,'C');
	$pdf->Cell(90,12,utf8_decode($row['glicemia']),1,0,'C');
	$pdf->Cell(90,12,utf8_decode($row['trigliceridos']),1,0,'C');
	$pdf->Cell(97,12,utf8_decode($row['frotis_faringeo']),1,0,'C');
	$pdf->Cell(97,12,utf8_decode($row['frotis_de_una']),1,0,'C');
	$pdf->Cell(92,12,utf8_decode($row['hemograma']),1,0,'C');
	$pdf->Cell(97,12,utf8_decode($row['coprologico']),1,0,'C');
	$pdf->Cell(97,12,utf8_decode($row['electrocardiograma']),1,1,'C');

	$pdf->SetFont('Arial','B',9);//
	$pdf->SetFillColor(232,232,232);
	$pdf->Cell(750,12,'RAYOS X:',1,1,'C',1);

	$pdf->Cell(135,12,'Columna',1,0,'C',1);
	$pdf->Cell(135,12,'Torax',1,0,'C',1);
	$pdf->Cell(135,12,'Abdomen',1,0,'C',1);
	$pdf->Cell(172,12,'Miembros Superiores',1,0,'C',1);
	$pdf->Cell(173,12,'Miembros Inferiores',1,1,'C',1);

	$pdf->SetFont('Arial','',8);//
	$pdf->Cell(135,12,utf8_decode($row['columna_paraclinico']),1,0,'C');
	$pdf->Cell(135,12,utf8_decode($row['torax_paraclinico']),1,0,'C');
	$pdf->Cell(135,12,utf8_decode($row['abdomen_paraclinico']),1,0,'C');
	$pdf->Cell(172,12,utf8_decode($row['miembros_superiores_paraclinico']),1,0,'C');
	$pdf->Cell(173,12,utf8_decode($row['miembros_inferiores_paraclinico']),1,1,'C');

	$pdf->SetFont('Arial','B',9);//
	$pdf->SetFillColor(232,232,232);
	$pdf->Cell(750,12,'REMISION: ( '.utf8_decode($row['remision']).' )' ,1,1,'C',1);

	$pdf->SetFont('Arial','',8);//
	$pdf->Cell(330,12,'Desde',1,0,'C',1);
	$pdf->Cell(330,12,'Hacia',1,0,'C',1);
	$pdf->Cell(90,12,'Remision pendiente',1,1,'C',1);

	$pdf->Cell(330,12,utf8_decode($row['desde']),1,0,'C');
	$pdf->Cell(330,12,utf8_decode($row['hacia']),1,0,'C');
	$pdf->Cell(90,12,utf8_decode($row['remision_pendiente']),1,1,'C');

	$pdf->Cell(750,12,'Motivo de remision',1,1,'C',1);

	$pdf->SetFillColor(255,255,255);
	$pdf->SetFont('Arial','B',9);//
	$pdf->MultiCell(750,12,utf8_decode($row['motivo']),1,1,'C');

	$pdf->SetFillColor(232,232,232);
	$pdf->Cell(750,12,'Contraremision: / Fecha: '.utf8_decode($row['fecha_contraremision']) ,1,1,'C',1);

	$pdf->SetFont('Arial','',9);//
	$pdf->Cell(750,12,'Resultado de remision',1,1,'C',1);

	$pdf->SetFillColor(255,255,255);
	$pdf->MultiCell(750,12,utf8_decode($row['resultado_remision']),1,1,'C');

	$pdf->SetFont('Arial','',9);//
	$pdf->SetFillColor(232,232,232);
	$pdf->Cell(750,12,'Recomendaciones:',1,1,'C',1);

	$pdf->SetFillColor(255,255,255);
	$pdf->MultiCell(750,12,utf8_decode($row['recomendaciones_remision']),1,1,'C');

	$pdf->SetFont('Arial','B',9);//
	$pdf->SetFillColor(232,232,232);
	$pdf->Cell(750,12,'CONCEPTO DE APTITUD LABORAL:' ,1,1,'C',1);

	$pdf->SetFont('Arial','',9);//
	$pdf->Cell(180,12,'Apto para trabajo a nivel:',1,0,'C',1);
	$pdf->Cell(180,12,'Apto para trabajo en altura:',1,0,'C',1);
	$pdf->Cell(390,12,'Apto para el cargo con restricciones que no intervienen en su trabajo:',1,1,'C',1);

	$pdf->SetFont('Arial','',8);//
	$pdf->Cell(180,12,utf8_decode($row['apto_trabajo_nivel']),1,0,'C');
	$pdf->Cell(180,12,utf8_decode($row['apto_trabajo_altura']),1,0,'C');
	$pdf->Cell(390,12,utf8_decode($row['apto_con_restricciones_no_intervienen']),1,1,'C');

	$pdf->SetFont('Arial','',7);//
	$pdf->Cell(85,12,'Aplazado:',1,0,'C',1);
	$pdf->Cell(85,12,'Nueva valoracion:',1,0,'C',1);
	$pdf->Cell(90,12,'Apto para el cargo:',1,0,'C',1);
	$pdf->Cell(100,12,'Examen de '.utf8_decode($row['motivo_evaluacion']),1,0,'C',1);
	$pdf->Cell(390,12,'Apto para el cargo con Limitaciones que intervienen en su trabajo:',1,1,'C',1);

	$pdf->SetFont('Arial','',8);//
	$pdf->Cell(85,12,utf8_decode($row['aplazado']),1,0,'C');
	$pdf->Cell(85,12,utf8_decode($row['nueva_valoracion']),1,0,'C');
	$pdf->Cell(90,12,utf8_decode($row['apto']),1,0,'C');
	$pdf->Cell(100,12,utf8_decode($row['examen_diagnostico']),1,0,'C');
	$pdf->Cell(390,12,utf8_decode($row['apto_con_limitaciones_si_intervienen']),1,1,'C');

	$pdf->SetFont('Arial','',9);//
	$pdf->Cell(750,12,'Observaciones:',1,1,'C',1);

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

	$pdf->Ln(42);

	$pdf->SetFont('Arial','B',9);//
	$pdf->Cell(1,0, $pdf->Image("images/firmas/medicfirma".'.png', 88,855,100),1,0,'C');
	$pdf->Cell(200,12, 'Nombre, Firma y LSO',0,0,'C');

	$pdf->Cell(300,12, '',0,0,'C');

	$pdf->Cell(200,12, 'Nombre o Firma del Trabajador',0,1,'C');
	$pdf->Ln();

	$pdf->SetFillColor(255,255,255);
	$pdf->SetFont('Arial','B',8);	
	$pdf->MultiCell(750,9, utf8_decode('La presente certificación se expide con base en la información manifestada por el trabajador, por la empresa, por el resultado del examen físico médico ocupacional y los resultados de los exámenes paraclínicos realizados, si aplican, dicho certificado tiene carácter confidencial, según la normatividad vigente.'),0,1,'J');

	}
	$modo="I"; 
    $nombre ="Examen_Medico_LABSST_".$fechaexamen.'_'.trim($documento).'_'.$nombres.".pdf"; 
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
