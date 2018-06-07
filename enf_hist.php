<?php
	include ('enf_modelpdf.php');
	include ('includes/conexion.php');

	$ruta_destino =   "fotografias/";
	$historia = base64_decode($_REQUEST['paciente']);

	$query = "SELECT * FROM datos_basicos AS db
	JOIN datos_complementarios AS dc ON db.fk_d_complementario = dc.id
	JOIN datos_basicos_tipo_documento AS dbtd ON dbtd.idtd = dc.fk_tipo_documento
    JOIN enfermeria_historialaboral AS hl ON db.id_historia = hl.paciente_enfermeria 
    JOIN enfermeria_riesgos AS er ON hl.id = er.id_paciente
    JOIN enfermeria_antecedentes AS ea ON ea.id_paciente_riesgos = er.id
    JOIN enfermeria_ginecologia AS eg ON eg.id_ant_per_fam = ea.id
    JOIN enfermeria_epp AS epp ON eg.id = epp.id_ginecologia
    JOIN enfermeria_accidentes AS eac ON epp.id = eac.id_protec_personal
    JOIN enfermeria_enfermedad AS epe ON eac.id = epe.id_accidente_trabajo
    JOIN enfermeria_habitosaludable AS ehs ON epe.id = ehs.id_enfermedad_prof
    JOIN enfermeria_habitotoxico AS eht ON ehs.id = eht.id_hab_saludables
    JOIN enfermeria_signovital AS esv ON eht.id = esv.id_habitos_toxicos
    JOIN enfermeria_riesgosempresa AS ere ON esv.id = ere.id_signos_vitales
	WHERE db.id_historia = '$historia'";
	$resultado = mysqli_query($conexion,$query);
	while($row = $resultado->fetch_assoc()){
	$fechaexamen = $row['fecha'];
	$documento = $row['numero_documento'];
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
	$pdf->Cell(128,97, $pdf->Image($ruta_destino."".$historia.'.png', 654,89,121),1,0,'C');
	$pdf->Cell(1,12,utf8_decode(''),1,1,'C');

	//$pdf->Ln(2);
	$pdf->SetFont('Arial','B',9);//
	$pdf->Cell(622,12,'DATOS DEL TRABAJADOR',1,1,'C',1);

	$pdf->SetFont('Arial','',9);//
	$pdf->Cell(195,12,'Nombres y Apellidos',1,0,'C',1);
	$pdf->Cell(100,12,'Tipo documento',1,0,'C',1);
	$pdf->Cell(90,12,'Numero documento',1,0,'C',1);
	$pdf->Cell(27,12,'Edad',1,0,'C',1);
	$pdf->Cell(55,12,'Genero',1,0,'C',1);
	$pdf->Cell(155,12,'Fecha de examen',1,1,'C',1);

	$pdf->SetFont('Arial','B',7);//
	$pdf->Cell(195,12,utf8_decode($row['nombres_apellidos']),1,0,'C');
	$pdf->CellFitSpace(100,12,utf8_decode($row['tipo_documento']),1,0,'C');
	$pdf->Cell(90,12,utf8_decode($row['numero_documento']),1,0,'C');
	$pdf->Cell(27,12,utf8_decode($row['edad']),1,0,'C');
	$pdf->Cell(55,12,utf8_decode($row['genero']),1,0,'C');
	$pdf->Cell(155,12,utf8_decode($fechafinal),1,1,'C');

	//$pdf->Ln(2);

	$pdf->SetFont('Arial','B',9);//
	$pdf->Cell(622,12,'TIPO DE EXAMEN MEDICO - OCUPACIONAL:',1,1,'C',1);

	$pdf->SetFont('Arial','',9);//
	$pdf->Cell(622,12,utf8_decode($row['motivo_evaluacion']),1,1,'C');
	//$pdf->Ln(2);

	$pdf->SetFont('Arial','B',9);//
	$pdf->Cell(622,12,'HISTORIA LABORAL ( '.utf8_decode($row['historialaboral']).' )',1,1,'C',1);

	$pdf->Cell(270,12,'Cargo',1,0,'C',1);
	$pdf->Cell(100,12,'Turno',1,0,'C',1);
	$pdf->Cell(100,12,utf8_decode('Años en la empresa'),1,0,'C',1);
	$pdf->Cell(152,12,'Dependencia',1,1,'C',1);

	$pdf->SetFont('Arial','',8);//
	$pdf->Cell(270,12,utf8_decode($row['cargo']),1,0,'C');
	$pdf->Cell(100,12,utf8_decode($row['turno']),1,0,'C');
	$pdf->Cell(100,12,utf8_decode($row['aniosempresa']),1,0,'C');
	$pdf->Cell(280,12,utf8_decode($row['dependencia']),1,1,'C');

	$pdf->Cell(750,12,'Acciones',1,1,'C',1);
	
	$pdf->SetFont('Arial','',7);//
	$pdf->SetFillColor(255,255,255);
	$pdf->MultiCell(750,12,utf8_decode($row['acciones']),1,1,'C',1);

	$pdf->SetFont('Arial','',8);//
	$pdf->SetFillColor(232,232,232);
	$pdf->Cell(750,12,'Actividades',1,1,'C',1);

	$pdf->SetFont('Arial','',7);//
	$pdf->SetFillColor(255,255,255);
	$pdf->MultiCell(750,12,utf8_decode($row['actividades']),1,1,'C',1);

	$pdf->SetFont('Arial','',8);//
	$pdf->SetFillColor(232,232,232);
	$pdf->Cell(750,12,'Descripcion del cargo:',1,1,'C',1);

	$pdf->SetFont('Arial','',7);//
	$pdf->SetFillColor(255,255,255);
	$pdf->MultiCell(750,12,utf8_decode($row['descripcioncargo']),1,1,'C',1);
	//CUT

	$pdf->SetFont('Arial','B',9);//
	$pdf->SetFillColor(232,232,232);
	$pdf->Cell(750,12,'EXPOSICION A FACTORES DE RIESGO ( '.utf8_decode($row['factoresriesgos']).' )',1,1,'C',1);

	$pdf->SetFont('Arial','',8);//
	$pdf->SetFillColor(232,232,232);
	$pdf->Cell(135,12,'Empresa',1,0,'C',1);
	$pdf->Cell(250,12,'Riesgo',1,0,'C',1);
	$pdf->Cell(150,12,'Cargo',1,0,'C',1);
	$pdf->Cell(40,12,'Tiempo',1,0,'C',1);
	$pdf->Cell(175,12,'Proteccion personal',1,1,'C',1);

	$queryriesgo = "SELECT * FROM datos_basicos AS db
    JOIN enfermeria_historialaboral AS ehl ON db.id_historia = ehl.paciente_enfermeria 
    JOIN enfermeria_riesgos AS er ON ehl.id = er.id_paciente
	WHERE db.id_historia = '$historia'";
	$conriesgo = mysqli_query($conexion,$queryriesgo);
	while($riesgo = $conriesgo->fetch_assoc()){

	$pdf->SetFont('Arial','',6,3);//
	$pdf->SetFillColor(255,255,255);
	$pdf->Cell(135,12,utf8_decode($riesgo['empresariesgo']),1,0,'C');
	$pdf->Cell(250,12,utf8_decode($riesgo['riesgos']),1,0,'C');
	$pdf->Cell(150,12,utf8_decode($riesgo['cargoriesgo']),1,0,'C');
	$pdf->Cell(40,12,utf8_decode($riesgo['tiemporiesgo']),1,0,'C');
	$pdf->Cell(175,12,utf8_decode($riesgo['proteccionriesgo']),1,1,'C');

}
	$pdf->SetFont('Arial','B',9);//
	$pdf->SetFillColor(232,232,232);
	$pdf->Cell(750,12,'ANTECEDENTES PERSONALES Y FAMILIARES',1,1,'C',1);

	$pdf->SetFont('Arial','',8);//
	$pdf->SetFillColor(232,232,232);
	$pdf->Cell(32,12,'Infancia',1,0,'C',1);
	$pdf->Cell(80,12,'Enfermedad cardiaca',1,0,'C',1);
	$pdf->Cell(30,12,'Trauma',1,0,'C',1);
	$pdf->Cell(120,12,'Enfermedad-Transmision-Sexual',1,0,'C',1);
	$pdf->Cell(58,12,'Vacunas-Dosis',1,0,'C',1);
	$pdf->Cell(32,12,'Toxicos',1,0,'C',1);
	$pdf->Cell(75,12,'Hipertension Arterial',1,0,'C',1);
	$pdf->Cell(93,12,'Enfermedad Piel-Anexos',1,0,'C',1);
	$pdf->Cell(96,12,'Enfermedad Vias-Renales',1,0,'C',1);
	$pdf->Cell(83,12,'Enfermedad Pulmonar',1,0,'C',1);
	$pdf->Cell(51,12,'Alergias',1,1,'C',1);

	$pdf->Cell(32,12,utf8_decode($row['infancia']),1,0,'C');
	$pdf->Cell(80,12,utf8_decode($row['enf_cardiaca']),1,0,'C');
	$pdf->Cell(30,12,utf8_decode($row['trauma']),1,0,'C');
	$pdf->Cell(120,12,utf8_decode($row['enf_transmision_sexual']),1,0,'C');
	$pdf->Cell(58,12,utf8_decode($row['vacunas_dosis']),1,0,'C');
	$pdf->Cell(32,12,utf8_decode($row['toxicos']),1,0,'C');
	$pdf->Cell(75,12,utf8_decode($row['hipertension_arterial']),1,0,'C');
	$pdf->Cell(93,12,utf8_decode($row['enf_piel_anexos']),1,0,'C');
	$pdf->Cell(96,12,utf8_decode($row['enf_vias_renal']),1,0,'C');
	$pdf->Cell(83,12,utf8_decode($row['enf_pulmonar']),1,0,'C');
	$pdf->Cell(51,12,utf8_decode($row['alergias']),1,1,'C');

	$pdf->SetFont('Arial','',8);//
	//$pdf->SetFillColor(232,232,232);
	$pdf->Cell(98,12,'Enfermedad Acido Peptica',1,0,'C',1);
	$pdf->Cell(73,12,'Enfermedad Mental',1,0,'C',1);
	$pdf->Cell(33,12,'Hernias',1,0,'C',1);
	$pdf->Cell(118,12,'Enfermedad Oido-Nariz-Laringe',1,0,'C',1);
	$pdf->Cell(89,12,'Enfermedades Visuales',1,0,'C',1);
	$pdf->Cell(35,12,'Diabetes',1,0,'C',1);
	$pdf->Cell(86,12,'Enfermedad Hematicos',1,0,'C',1);
	$pdf->Cell(33,12,'Cirugias',1,0,'C',1);
	$pdf->Cell(58,12,'Tunel del carpo',1,0,'C',1);
	$pdf->Cell(82,12,'Enfermedad Vascular',1,0,'C',1);
	$pdf->Cell(45,12,'Varicocele',1,1,'C',1);

	$pdf->Cell(98,12,utf8_decode($row['enf_acido_peptica']),1,0,'C');
	$pdf->Cell(73,12,utf8_decode($row['enf_mental']),1,0,'C');
	$pdf->Cell(33,12,utf8_decode($row['hernias']),1,0,'C');
	$pdf->Cell(118,12,utf8_decode($row['enf_oido_nariz_laringe']),1,0,'C');
	$pdf->Cell(89,12,utf8_decode($row['enf_visual']),1,0,'C');
	$pdf->Cell(35,12,utf8_decode($row['diabetes']),1,0,'C');
	$pdf->Cell(86,12,utf8_decode($row['enf_hematicos']),1,0,'C');
	$pdf->Cell(33,12,utf8_decode($row['cirugias']),1,0,'C');
	$pdf->Cell(58,12,utf8_decode($row['tunel_carpo']),1,0,'C');
	$pdf->Cell(82,12,utf8_decode($row['enf_vascular']),1,0,'C');
	$pdf->Cell(45,12,utf8_decode($row['varicocele']),1,1,'C');

	$pdf->SetFont('Arial','',8);//
	//$pdf->SetFillColor(232,232,232);
	$pdf->Cell(100,12,'Enfermedad Hepatica',1,0,'C',1);
	$pdf->Cell(100,12,'Osteomuscular',1,0,'C',1);
	$pdf->Cell(100,12,'Hospitalizaciones',1,0,'C',1);
	$pdf->Cell(130,12,'Enfermedad de Quervein',1,0,'C',1);
	$pdf->Cell(85,12,'Lumbalgias',1,0,'C',1);
	$pdf->Cell(75,12,'Cancer',1,0,'C',1);
	$pdf->Cell(80,12,'Fracturas',1,0,'C',1);
	$pdf->Cell(80,12,'Displidemias',1,1,'C',1);

	$pdf->Cell(100,12,utf8_decode($row['enf_hepatica']),1,0,'C');
	$pdf->Cell(100,12,utf8_decode($row['osteomuscular']),1,0,'C');
	$pdf->Cell(100,12,utf8_decode($row['hospitalizaciones']),1,0,'C');
	$pdf->Cell(130,12,utf8_decode($row['enf_quervein']),1,0,'C');
	$pdf->Cell(85,12,utf8_decode($row['lumbalgias']),1,0,'C');
	$pdf->Cell(75,12,utf8_decode($row['cancer']),1,0,'C');
	$pdf->Cell(80,12,utf8_decode($row['fracturas']),1,0,'C');
	$pdf->Cell(80,12,utf8_decode($row['dislipidemias']),1,1,'C');

	$pdf->SetFont('Arial','B',9);//
	$pdf->SetFillColor(232,232,232);
	$pdf->Cell(750,12,'Observaciones',1,1,'C',1);

	$pdf->SetFont('Arial','',7);//
	$pdf->SetFillColor(255,255,255);
	$pdf->MultiCell(750,12,utf8_decode($row['ant_observaciones']),1,1,'C',1);

	$pdf->SetFont('Arial','B',9);//
	$pdf->SetFillColor(232,232,232);
	$pdf->Cell(750,12,'Antecedentes Familiares ( '.utf8_decode($row['familiar_ant']).' )',1,1,'C',1);

	$pdf->SetFont('Arial','',7);//
	$pdf->SetFillColor(255,255,255);
	$pdf->MultiCell(750,12,utf8_decode($row['desc_ant_familiar']),1,1,'C',1);

	$pdf->SetFont('Arial','B',9);//
	$pdf->SetFillColor(232,232,232);
	$pdf->Cell(750,12,'Antecedentes Personales ( '.utf8_decode($row['personal_ant']).' )',1,1,'C',1);

	$pdf->SetFont('Arial','',7);//
	$pdf->SetFillColor(255,255,255);
	$pdf->MultiCell(750,12,utf8_decode($row['desc_ant_per']),1,1,'C',1);

	if ($row['genero'] == 'femenino') {

		$pdf->SetFont('Arial','B',9);//
		$pdf->SetFillColor(232,232,232);
		$pdf->Cell(750,12,'ANTECEDENTES GINECOLOGICOS',1,1,'C',1);

		$pdf->SetFont('Arial','',8);//
		$pdf->Cell(60,12,'Menarquia',1,0,'C',1);
		
		$pdf->Cell(45,12,'Planifica',1,0,'C',1);
		$pdf->Cell(220,12,'Metodo',1,0,'C',1);
		$pdf->Cell(425,12,'Ficha Obstetrica',1,1,'C',1);

		$pdf->SetFont('Arial','',7);//
		$pdf->Cell(60,12,utf8_decode($row['menarquia']),1,0,'C');
		$pdf->Cell(45,12,utf8_decode($row['planifica']),1,0,'C');
		$pdf->Cell(220,12,utf8_decode($row['metodo']),1,0,'C');
		$pdf->Cell(425,12,utf8_decode($row['fichaobstetrica']),1,1,'C');


		$pdf->SetFont('Arial','',8);//
		$pdf->Cell(105,12,'Ciclos',1,0,'C',1);
		$pdf->Cell(120,12,'Ultima Mestruacion',1,0,'C',1);
		$pdf->Cell(120,12,'Ultima Citologia',1,0,'C',1);
		$pdf->Cell(100,12,'Resultado',1,0,'C',1);
		$pdf->Cell(85,12,'Flujo vaginal',1,0,'C',1);
		$pdf->Cell(100,12,'Dolor pelvico',1,0,'C',1);
		$pdf->Cell(120,12,'Dolor en los senos',1,1,'C',1);

		$pdf->SetFont('Arial','',7);//
		$pdf->Cell(105,12,utf8_decode($row['ciclos']),1,0,'C');
		$pdf->Cell(120,12,utf8_decode($row['ultimamestruacion']),1,0,'C');
		$pdf->Cell(120,12,utf8_decode($row['ultimacitologia']),1,0,'C');
		$pdf->Cell(100,12,utf8_decode($row['resultado']),1,0,'C');
		$pdf->Cell(85,12,utf8_decode($row['flujovaginal']),1,0,'C');
		$pdf->Cell(100,12,utf8_decode($row['dolorpelvico']),1,0,'C');
		$pdf->Cell(120,12,utf8_decode($row['dolorsenos']),1,1,'C');

	}

	$pdf->SetFont('Arial','B',9);//
	$pdf->SetFillColor(232,232,232);
	$pdf->Cell(750,12,'USO DE ELEMNTOS DE PROTECCION PERSONAL ( '.utf8_decode($row['uso_epp']).' )',1,1,'C',1);

	$pdf->SetFont('Arial','',8);//
	$pdf->Cell(95,12,'En el cargo o Empresa',1,0,'C',1);
	$pdf->Cell(28,12,'Actual',1,0,'C',1);
	$pdf->Cell(28,12,'Casco',1,0,'C',1);
	$pdf->Cell(28,12,'Botas',1,0,'C',1);
	$pdf->Cell(28,12,'Gafas',1,0,'C',1);
	$pdf->Cell(43,12,'Tapabocas',1,0,'C',1);
	$pdf->Cell(30,12,'Overol',1,0,'C',1);
	$pdf->Cell(80,12,'Protectores Auditivos',1,0,'C',1);
	$pdf->Cell(98,12,'Protectores Respiratorios',1,0,'C',1);
	$pdf->Cell(292,12,'Otros',1,1,'C',1);

	$pdf->SetFont('Arial','',7);//
	$pdf->Cell(95,12,utf8_decode($row['cargo_empresa']),1,0,'C');
	$pdf->Cell(28,12,utf8_decode($row['actual']),1,0,'C');
	$pdf->Cell(28,12,utf8_decode($row['casco']),1,0,'C');
	$pdf->Cell(28,12,utf8_decode($row['botas']),1,0,'C');
	$pdf->Cell(28,12,utf8_decode($row['gafas']),1,0,'C');
	$pdf->Cell(43,12,utf8_decode($row['tapabocas']),1,0,'C');
	$pdf->Cell(30,12,utf8_decode($row['overol']),1,0,'C');
	$pdf->Cell(80,12,utf8_decode($row['protectorauditivo']),1,0,'C');
	$pdf->Cell(98,12,utf8_decode($row['protectorrespiratorio']),1,0,'C');
	$pdf->Cell(292,12,utf8_decode($row['otroepp']),1,1,'C');

	$pdf->SetFont('Arial','',8);//
	$pdf->Cell(95,12,'Son adecuados',1,0,'C',1);
	$pdf->Cell(50,12,'Todas',1,0,'C',1);
	$pdf->Cell(605,12,'Solo:',1,1,'C',1);

	$pdf->SetFont('Arial','',7);//
	$pdf->Cell(95,12,utf8_decode($row['adecuados']),1,0,'C');
	$pdf->Cell(50,12,utf8_decode('todas quit'),1,0,'C');
	$pdf->Cell(605,12,utf8_decode($row['adecuadosolo']),1,1,'C');

	$pdf->SetFont('Arial','B',9);//
	$pdf->SetFillColor(232,232,232);
	$pdf->Cell(750,12,'ACCIDENTES DE TRABAJO ( '.utf8_decode($row['accidentelaboral']).' )',1,1,'C',1);

	$pdf->SetFont('Arial','',8);//
	$pdf->Cell(80,12,'Fecha',1,0,'C',1);
	$pdf->Cell(150,12,'Empresa',1,0,'C',1);
	$pdf->Cell(210,12,'Causa',1,0,'C',1);
	$pdf->Cell(35,12,'Lesion',1,0,'C',1);
	$pdf->Cell(182,12,'Parte Afectada',1,0,'C',1);
	$pdf->Cell(55,12,'Incapacidad',1,0,'C',1);
	$pdf->Cell(38,12,'Secuela',1,1,'C',1);

	$queryacc = "SELECT * FROM datos_basicos AS db
    JOIN enfermeria_historialaboral AS ehl ON db.id_historia = ehl.paciente_enfermeria 
    JOIN enfermeria_riesgos AS er ON ehl.id = er.id_paciente
    JOIN enfermeria_antecedentes AS ea ON ea.id_paciente_riesgos = er.id
    JOIN enfermeria_ginecologia AS eg ON eg.id_ant_per_fam = ea.id
    JOIN enfermeria_epp AS epp ON eg.id = epp.id_ginecologia
    JOIN enfermeria_accidentes AS eac ON epp.id = eac.id_protec_personal
	WHERE db.id_historia = '$historia'";
	$accidente = mysqli_query($conexion,$queryacc);
	while($acc = $accidente->fetch_assoc()){

		$pdf->SetFont('Arial','',7);//
		$pdf->Cell(80,12,utf8_decode($acc['accfecha']),1,0,'C');
		$pdf->Cell(150,12,utf8_decode($acc['accempresa']),1,0,'C');
		$pdf->Cell(210,12,utf8_decode($acc['causa']),1,0,'C');
		$pdf->Cell(35,12,utf8_decode($acc['lesion']),1,0,'C');
		$pdf->Cell(182,12,utf8_decode($acc['afectacion']),1,0,'C');
		$pdf->Cell(55,12,utf8_decode($acc['incapacidad']),1,0,'C');
		$pdf->Cell(38,12,utf8_decode($acc['secuela']),1,1,'C');
	}


	$pdf->SetFont('Arial','B',9);//
	$pdf->SetFillColor(232,232,232);
	$pdf->Cell(750,12,'ENFERMEDAD PROFESIONAL ( '.utf8_decode($row['enfermedadlaboral']).' )',1,1,'C',1);

	$pdf->SetFont('Arial','',8);//
	$pdf->Cell(80,12,'Fecha',1,0,'C',1);
	$pdf->Cell(150,12,'Empresa',1,0,'C',1);
	$pdf->Cell(409,12,'Diagnostico',1,0,'C',1);
	$pdf->Cell(25,12,'ARL',1,0,'C',1);
	$pdf->Cell(48,12,'Reubicacion',1,0,'C',1);
	$pdf->Cell(38,12,'Pension',1,1,'C',1);

	$queryenf = "SELECT * FROM datos_basicos AS db
    JOIN enfermeria_historialaboral AS hl ON db.id_historia = hl.paciente_enfermeria 
    JOIN enfermeria_riesgos AS er ON hl.id = er.id_paciente
    JOIN enfermeria_antecedentes AS ea ON ea.id_paciente_riesgos = er.id
    JOIN enfermeria_ginecologia AS eg ON eg.id_ant_per_fam = ea.id
    JOIN enfermeria_epp AS epp ON eg.id = epp.id_ginecologia
    JOIN enfermeria_accidentes AS eac ON epp.id = eac.id_protec_personal
    JOIN enfermeria_enfermedad AS epe ON eac.id = epe.id_accidente_trabajo
	WHERE db.id_historia = '$historia'";
	$enfermedad = mysqli_query($conexion,$queryenf);
	while($enf = $enfermedad->fetch_assoc()){

	$pdf->SetFont('Arial','',7);//
	$pdf->Cell(80,12,utf8_decode($enf['fechaenf']),1,0,'C');
	$pdf->Cell(150,12,utf8_decode($enf['empresaenf']),1,0,'C');
	$pdf->Cell(409,12,utf8_decode($enf['diagnosticoenf']),1,0,'C');
	$pdf->Cell(25,12,utf8_decode($enf['arlenf']),1,0,'C');
	$pdf->Cell(48,12,utf8_decode($enf['reubicacion']),1,0,'C');
	$pdf->Cell(38,12,utf8_decode($enf['pension']),1,1,'C');
}

	$pdf->SetFont('Arial','B',9);//
	//$pdf->SetFillColor(232,232,232);
	$pdf->Cell(750,12,'HABITOS SALUDABLES',1,1,'C',1);

	$pdf->SetFont('Arial','',8);//
	$pdf->Cell(80,12,'Realiza deportes',1,0,'C',1);
	$pdf->Cell(245,12,'Cuales deportes',1,0,'C',1);
	$pdf->Cell(42,12,'Sedentario',1,0,'C',1);
	$pdf->Cell(95,12,'Ejercicio Cardiopulmonar',1,0,'C',1);
	$pdf->Cell(245,12,'Otros habitos saludables',1,0,'C',1);
	$pdf->Cell(43,12,'Frecuencia',1,1,'C',1);

	$pdf->SetFont('Arial','',7);//
	$pdf->Cell(80,12,utf8_decode($row['practicadeporte']),1,0,'C');
	$pdf->Cell(245,12,utf8_decode($row['cualdeporte']),1,0,'C');
	$pdf->Cell(42,12,utf8_decode($row['sedentario']),1,0,'C');
	$pdf->Cell(95,12,utf8_decode($row['ejerciciocardiopulmonar']),1,0,'C');
	$pdf->Cell(245,12,utf8_decode($row['otroejercicio']),1,0,'C');
	$pdf->Cell(43,12,utf8_decode($row['frecuenciaejercicio']),1,1,'C');

	$pdf->SetFont('Arial','B',9);//
	//$pdf->SetFillColor(232,232,232);
	$pdf->Cell(750,12,'HABITOS TOXICOS',1,1,'C',1);
	$pdf->SetFont('Arial','',8);//
	$pdf->Cell(28,12,'Fuma',1,0,'C',1);
	$pdf->Cell(38,12,'Fumador',1,0,'C',1);
	$pdf->Cell(58,12,utf8_decode('Años-Fumador'),1,0,'C',1);
	$pdf->Cell(48,12,'Ex-Fumador',1,0,'C',1);
	$pdf->Cell(70,12,utf8_decode('Ex-Fumador-Años'),1,0,'C',1);
	$pdf->Cell(65,12,utf8_decode('N° cigarrillos/dia'),1,0,'C',1);
	$pdf->Cell(75,12,'Toma habitualmente',1,0,'C',1);
	$pdf->Cell(58,12,utf8_decode('Años de habito'),1,0,'C',1);
	$pdf->Cell(60,12,'Frecuencia',1,0,'C',1);
	$pdf->Cell(160,12,'Tipo licor',1,0,'C',1);
	$pdf->Cell(90,12,'Problemas con bebidas',1,1,'C',1);

	$pdf->SetFont('Arial','',7);//
	$pdf->Cell(28,12,utf8_decode($row['fuma']),1,0,'C');
	$pdf->Cell(38,12,utf8_decode($row['fumador']),1,0,'C');
	$pdf->Cell(58,12,utf8_decode($row['fumadoranios']),1,0,'C');
	$pdf->Cell(48,12,utf8_decode($row['exfumador']),1,0,'C');
	$pdf->Cell(70,12,utf8_decode($row['exfumadoranios']),1,0,'C');
	$pdf->Cell(65,12,utf8_decode($row['cigarrillosdiarios']),1,0,'C');
	$pdf->Cell(75,12,utf8_decode($row['bebidahabitual']),1,0,'C');
	$pdf->Cell(58,12,utf8_decode($row['aniosbebedor']),1,0,'C');
	$pdf->Cell(60,12,utf8_decode($row['frecuenciabebida']),1,0,'C');
	$pdf->Cell(160,12,utf8_decode($row['tipolicor']),1,0,'C');
	$pdf->Cell(90,12,utf8_decode($row['problemadebebida']),1,1,'C');

	$pdf->SetFont('Arial','',8);//
	$pdf->Cell(330,12,'Cuales Bebidas?',1,0,'C',1);
	$pdf->Cell(45,12,'Exbebedor',1,0,'C',1);
	$pdf->Cell(40,12,utf8_decode('N° Años'),1,0,'C',1);
	$pdf->Cell(335,12,'Otros habitos toxicos',1,1,'C',1);

	$pdf->SetFont('Arial','',7);//
	$pdf->Cell(330,12,utf8_decode($row['cualbebidaproblema']),1,0,'C');
	$pdf->Cell(45,12,utf8_decode($row['exbebedor']),1,0,'C');
	$pdf->Cell(40,12,utf8_decode($row['aniosexbebedor']),1,0,'C');
	$pdf->Cell(335,12,utf8_decode($row['cualhabitotoxico']),1,1,'C');

	$pdf->SetFont('Arial','',8);//
	$pdf->Cell(100,12,'Medicamento regularmente',1,0,'C',1);
	$pdf->Cell(277,12,'Cuales medicamentos:',1,0,'C',1);
	$pdf->Cell(97,12,'Pendiente cirugia en EPS',1,0,'C',1);
	$pdf->Cell(276,12,'Cuales cirugias',1,1,'C',1);


	$pdf->SetFont('Arial','',7);//
	$pdf->Cell(100,12,utf8_decode($row['medicamentoregular']),1,0,'C');
	$pdf->Cell(277,12,utf8_decode($row['cualmedicamento']),1,0,'C');
	$pdf->Cell(97,12,utf8_decode($row['cirugiaeps']),1,0,'C');
	$pdf->Cell(276,12,utf8_decode($row['cualcirugia']),1,1,'C');

	$pdf->SetFont('Arial','',8);//
	$pdf->Cell(85,12,'Tratamiento pendiente',1,0,'C',1);
	$pdf->Cell(276,12,'Cuales Tratamientos',1,0,'C',1);
	$pdf->Cell(105,12,'Incapacidad ultimos 6 meses',1,0,'C',1);
	$pdf->Cell(284,12,'Motivo de incapacidad',1,1,'C',1);

	$pdf->SetFont('Arial','',7);//
	$pdf->Cell(85,12,utf8_decode($row['tratamientopendiente']),1,0,'C');
	$pdf->Cell(276,12,utf8_decode($row['cualtratamiento']),1,0,'C');
	$pdf->Cell(105,12,utf8_decode($row['ultimaincapacidad']),1,0,'C');
	$pdf->Cell(284,12,utf8_decode($row['motivoincapacidad']),1,1,'C');

	$pdf->SetFont('Arial','B',9);//
	$pdf->Cell(750,12,'SIGNOS VITALES',1,1,'C',1);

	$pdf->SetFont('Arial','',8);//
	$pdf->Cell(130,12,'Mano habil',1,0,'C',1);
	$pdf->Cell(50,12,'Cicatrices',1,0,'C',1);
	$pdf->Cell(50,12,'Tatuajes',1,0,'C',1);
	$pdf->Cell(62,12,'Tension arterial',1,0,'C',1);
	$pdf->Cell(85,12,'Frecuencia cardiaca',1,0,'C',1);
	$pdf->Cell(100,12,'Frecuencia Respiratoria',1,0,'C',1);
	$pdf->Cell(60,12,'Talla',1,0,'C',1);
	$pdf->Cell(60,12,'Peso',1,0,'C',1);
	$pdf->Cell(153,12,'Diagnostico de peso',1,1,'C',1);

	$pdf->SetFont('Arial','',7);//
	$pdf->Cell(130,12,utf8_decode($row['extremidadhabil']),1,0,'C');
	$pdf->Cell(50,12,utf8_decode($row['cicatrices']),1,0,'C');
	$pdf->Cell(50,12,utf8_decode($row['tatuajes']),1,0,'C');
	$pdf->Cell(62,12,utf8_decode($row['tensionarterial']),1,0,'C');
	$pdf->Cell(85,12,utf8_decode($row['frecuenciacardiaca']),1,0,'C');
	$pdf->Cell(100,12,utf8_decode($row['frecuenciarespiratoria']),1,0,'C');
	$pdf->Cell(60,12,utf8_decode($row['talla']),1,0,'C');
	$pdf->Cell(60,12,utf8_decode($row['peso']),1,0,'C');
	$pdf->Cell(153,12,utf8_decode($row['pesodiagnostico']),1,1,'C');

	$pdf->SetFont('Arial','B',9);//
	$pdf->Cell(750,12,'EXPOSICION A FACTORES DE RIESGO SUMINISTRADOS POR LA EMPRESA ( '.utf8_decode($row['riesgosuministrado']).' )',1,1,'C',1);

	$pdf->SetFont('Arial','',8);//
	$pdf->Cell(35,12,'Fisico',1,0,'C',1);
	$pdf->Cell(38,12,'Quimico',1,0,'C',1);
	$pdf->Cell(45,12,'Biologico',1,0,'C',1);
	$pdf->Cell(52,12,'Ergonomico',1,0,'C',1);
	$pdf->Cell(45,12,'Mecanico',1,0,'C',1);
	$pdf->Cell(50,12,'Psicosocial',1,0,'C',1);
	$pdf->Cell(42,12,'Electrico',1,0,'C',1);
	$pdf->Cell(443,12,'Otros',1,1,'C',1);

	$pdf->SetFont('Arial','',7);//
	$pdf->Cell(35,12,utf8_decode($row['fisico']),1,0,'C');
	$pdf->Cell(38,12,utf8_decode($row['mecanico']),1,0,'C');
	$pdf->Cell(45,12,utf8_decode($row['quimico']),1,0,'C');
	$pdf->Cell(52,12,utf8_decode($row['psicosocial']),1,0,'C');
	$pdf->Cell(45,12,utf8_decode($row['biologico']),1,0,'C');
	$pdf->Cell(50,12,utf8_decode($row['electrico']),1,0,'C');
	$pdf->Cell(42,12,utf8_decode($row['ergonomico']),1,0,'C');
	$pdf->Cell(443,12,utf8_decode($row['otrosriesgo']),1,1,'C');


	$pdf->Ln(30);

	$pdf->SetFont('Arial','B',9);//
	$pdf->Cell(200,12, 'Nombre, Firma y LSO',0,0,'C');

	$pdf->Cell(300,12, '',0,0,'C');

	$pdf->Cell(200,12, 'Nombre o Firma del Trabajador',0,1,'C');
	$pdf->Ln();

	$pdf->SetFillColor(255,255,255);	
	$pdf->MultiCell(750,9, utf8_decode('La presente certificación se expide con base en la información manifestada por el trabajador, por la empresa, por el resultado del examen físico médico ocupacional y los resultados de los exámenes paraclínicos realizados, si aplican, dicho certificado tiene carácter confidencial, según la normatividad vigente.'),0,1,'J');


	}
	$modo="I"; 
    $nombre ="CA_LSST_".$fechaexamen.'_'.trim($documento).".pdf"; 
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
