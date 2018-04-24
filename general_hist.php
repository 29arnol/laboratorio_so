<?php
	include ('general_modelpdf.php');
	include ('includes/conexion.php');

	$ruta_destino = "fotografias/";
	$historia = base64_decode($_REQUEST['paciente']);

	$query = "SELECT * FROM datos_basicos AS db
	JOIN datos_complementarios AS dc ON db.fk_d_complementario = dc.id
	JOIN datos_basicos_tipo_documento AS dbtd ON dbtd.idtd = dc.fk_tipo_documento
    JOIN historia_laboral AS hl ON db.id_historia = hl.paciente_enfermeria 
    JOIN exposicion_riesgos_enf AS ere ON hl.id = ere.id_paciente
    JOIN antecedentes_per_fam_enf AS apfe ON apfe.id_paciente_riesgos = ere.id
    JOIN antecedentes_ginecologia_enf AS age ON age.id_ant_per_fam = apfe.id
    JOIN proteccion_personal_enf AS ppe ON age.id = ppe.id_ginecologia
    JOIN accidentes_trabajo_enf AS ate ON ppe.id = ate.id_protec_personal
    JOIN enfermedad_profesional_enf AS epe ON ate.id = epe.id_accidente_trabajo
    JOIN habitos_saludables_enf AS hse ON epe.id = hse.id_enfermedad_prof
    JOIN habitos_toxicos_enf AS hte ON hse.id = hte.id_hab_saludables
    JOIN signos_vitales_enf AS sve ON hte.id = sve.id_habitos_toxicos
    JOIN enfermeria_riesgos_suministrados AS ers ON sve.id = ers.id_signos_vitales

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

	$pdf->Cell(622,12,'DATOS DE LA EMPRESA',1,0,'C',1);

	$pdf->Cell(128,12,'Foto del trabajador',1,1,'C',1);
	//$pdf->Cell(1,1,'.',1,1,'C',1);

	$pdf->SetFont('Arial','',9);//
	$pdf->Cell(150,12,'Nombre Empresa',1,0,'C',1);
	$pdf->Cell(130,12,'Ciudad',1,0,'C',1);
	$pdf->Cell(152,12,'Actividad Economica',1,0,'C',1);
	$pdf->Cell(190,12,utf8_decode('Cargo a desempeñar'),1,0,'C',1);
	$pdf->Cell(128,99, $pdf->Image($ruta_destino."".$historia.'.png', 654,79,121),1,0,'C');
	$pdf->Cell(1,12,utf8_decode(''),1,1,'C');

	$pdf->SetFont('Arial','B',7);//
	$pdf->Cell(150,12,utf8_decode($row['nombre_empresa']),1,0,'C');
	$pdf->Cell(130,12,utf8_decode($row['ciudad']),1,0,'C');
	$pdf->Cell(152,12,utf8_decode($row['actividad_economica']),1,0,'C');
	$pdf->Cell(190,12,utf8_decode($row['cargo_a_desempenar']),1,1,'C');

	$pdf->Ln(1);

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

	$pdf->Ln(1);

	$pdf->SetFont('Arial','B',9);//
	$pdf->Cell(622,12,'TIPO DE EXAMEN MEDICO - OCUPACIONAL:',1,1,'C',1);

	$pdf->SetFont('Arial','',9);//
	$pdf->Cell(622,12,utf8_decode($row['motivo_evaluacion']),1,1,'C');
	$pdf->Ln(1);

	$pdf->SetFont('Arial','B',9);//
	$pdf->Cell(622,12,'HISTORIA LABORAL ( '.utf8_decode($row['historia_laboral']).' )',1,1,'C',1);

	$pdf->Cell(270,12,'Cargo',1,0,'C',1);
	$pdf->Cell(100,12,'Turno',1,0,'C',1);
	$pdf->Cell(100,12,utf8_decode('Años en la empresa'),1,0,'C',1);
	$pdf->Cell(280,12,'Dependencia',1,1,'C',1);

	$pdf->SetFont('Arial','',8);//
	$pdf->Cell(270,12,utf8_decode($row['cargo']),1,0,'C');
	$pdf->Cell(100,12,utf8_decode($row['turno']),1,0,'C');
	$pdf->Cell(100,12,utf8_decode($row['anos_en_empresa']),1,0,'C');
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
	$pdf->MultiCell(750,12,utf8_decode($row['descripcion_cargo']),1,1,'C',1);
	$pdf->Ln(1);

	$pdf->SetFont('Arial','B',9);//
	$pdf->SetFillColor(232,232,232);
	$pdf->Cell(750,12,'EXPOSICION A FACTORES DE RIESGO ( '.utf8_decode($row['factores_riesgos']).' )',1,1,'C',1);

	$pdf->SetFont('Arial','',8);//
	$pdf->SetFillColor(232,232,232);
	$pdf->Cell(100,12,'Empresa',1,0,'C',1);
	$pdf->Cell(24,12,'Fisico',1,0,'C',1);
	$pdf->Cell(32,12,'Quimico',1,0,'C',1);
	$pdf->Cell(35,12,'Biologico',1,0,'C',1);
	$pdf->Cell(45,12,'Ergonomico',1,0,'C',1);
	$pdf->Cell(37,12,'Mecanico',1,0,'C',1);
	$pdf->Cell(43,12,'Psicosocial',1,0,'C',1);
	$pdf->Cell(33,12,'Electrico',1,0,'C',1);
	$pdf->Cell(120,12,'Otros',1,0,'C',1);
	$pdf->Cell(120,12,'Cargo',1,0,'C',1);
	$pdf->Cell(40,12,'Tiempo',1,0,'C',1);
	$pdf->Cell(121,12,'Proteccion personal',1,1,'C',1);

	$pdf->SetFont('Arial','',7);//
	$pdf->SetFillColor(255,255,255);
	$pdf->Cell(100,12,utf8_decode($row['empresa1']),1,0,'C');
	$pdf->Cell(24,12,utf8_decode($row['fisico1']),1,0,'C');
	$pdf->Cell(32,12,utf8_decode($row['quimico1']),1,0,'C');
	$pdf->Cell(35,12,utf8_decode($row['biologico1']),1,0,'C');
	$pdf->Cell(45,12,utf8_decode($row['ergonomico1']),1,0,'C');
	$pdf->Cell(37,12,utf8_decode($row['mecanico1']),1,0,'C');
	$pdf->Cell(43,12,utf8_decode($row['psicosocial1']),1,0,'C');
	$pdf->Cell(33,12,utf8_decode($row['electrico1']),1,0,'C');
	$pdf->Cell(120,12,utf8_decode($row['otros1']),1,0,'C');
	$pdf->Cell(120,12,utf8_decode($row['cargo1']),1,0,'C');
	$pdf->Cell(40,12,utf8_decode($row['tiempo1']),1,0,'C');
	$pdf->Cell(121,12,utf8_decode($row['proteccion_personal1']),1,1,'C');

	$pdf->Cell(100,12,utf8_decode($row['empresa2']),1,0,'C');
	$pdf->Cell(24,12,utf8_decode($row['fisico2']),1,0,'C');
	$pdf->Cell(32,12,utf8_decode($row['quimico2']),1,0,'C');
	$pdf->Cell(35,12,utf8_decode($row['biologico2']),1,0,'C');
	$pdf->Cell(45,12,utf8_decode($row['ergonomico2']),1,0,'C');
	$pdf->Cell(37,12,utf8_decode($row['mecanico2']),1,0,'C');
	$pdf->Cell(43,12,utf8_decode($row['psicosocial2']),1,0,'C');
	$pdf->Cell(33,12,utf8_decode($row['electrico2']),1,0,'C');
	$pdf->Cell(120,12,utf8_decode($row['otros2']),1,0,'C');
	$pdf->Cell(120,12,utf8_decode($row['cargo2']),1,0,'C');
	$pdf->Cell(40,12,utf8_decode($row['tiempo2']),1,0,'C');
	$pdf->Cell(121,12,utf8_decode($row['proteccion_personal2']),1,1,'C');

	$pdf->Cell(100,12,utf8_decode($row['empresa3']),1,0,'C');
	$pdf->Cell(24,12,utf8_decode($row['fisico3']),1,0,'C');
	$pdf->Cell(32,12,utf8_decode($row['quimico3']),1,0,'C');
	$pdf->Cell(35,12,utf8_decode($row['biologico3']),1,0,'C');
	$pdf->Cell(45,12,utf8_decode($row['ergonomico3']),1,0,'C');
	$pdf->Cell(37,12,utf8_decode($row['mecanico3']),1,0,'C');
	$pdf->Cell(43,12,utf8_decode($row['psicosocial3']),1,0,'C');
	$pdf->Cell(33,12,utf8_decode($row['electrico3']),1,0,'C');
	$pdf->Cell(120,12,utf8_decode($row['otros3']),1,0,'C');
	$pdf->Cell(120,12,utf8_decode($row['cargo3']),1,0,'C');
	$pdf->Cell(40,12,utf8_decode($row['tiempo3']),1,0,'C');
	$pdf->Cell(121,12,utf8_decode($row['proteccion_personal3']),1,1,'C');

	$pdf->Cell(100,12,utf8_decode($row['empresa4']),1,0,'C');
	$pdf->Cell(24,12,utf8_decode($row['fisico4']),1,0,'C');
	$pdf->Cell(32,12,utf8_decode($row['quimico4']),1,0,'C');
	$pdf->Cell(35,12,utf8_decode($row['biologico4']),1,0,'C');
	$pdf->Cell(45,12,utf8_decode($row['ergonomico4']),1,0,'C');
	$pdf->Cell(37,12,utf8_decode($row['mecanico4']),1,0,'C');
	$pdf->Cell(43,12,utf8_decode($row['psicosocial4']),1,0,'C');
	$pdf->Cell(33,12,utf8_decode($row['electrico4']),1,0,'C');
	$pdf->Cell(120,12,utf8_decode($row['otros4']),1,0,'C');
	$pdf->Cell(120,12,utf8_decode($row['cargo4']),1,0,'C');
	$pdf->Cell(40,12,utf8_decode($row['tiempo4']),1,0,'C');
	$pdf->Cell(121,12,utf8_decode($row['proteccion_personal4']),1,1,'C');

	$pdf->Cell(100,12,utf8_decode($row['empresa5']),1,0,'C');
	$pdf->Cell(24,12,utf8_decode($row['fisico5']),1,0,'C');
	$pdf->Cell(32,12,utf8_decode($row['quimico5']),1,0,'C');
	$pdf->Cell(35,12,utf8_decode($row['biologico5']),1,0,'C');
	$pdf->Cell(45,12,utf8_decode($row['ergonomico5']),1,0,'C');
	$pdf->Cell(37,12,utf8_decode($row['mecanico5']),1,0,'C');
	$pdf->Cell(43,12,utf8_decode($row['psicosocial5']),1,0,'C');
	$pdf->Cell(33,12,utf8_decode($row['electrico5']),1,0,'C');
	$pdf->Cell(120,12,utf8_decode($row['otros5']),1,0,'C');
	$pdf->Cell(120,12,utf8_decode($row['cargo5']),1,0,'C');
	$pdf->Cell(40,12,utf8_decode($row['tiempo5']),1,0,'C');
	$pdf->Cell(121,12,utf8_decode($row['proteccion_personal5']),1,1,'C');
	$pdf->Ln(1);

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
	$pdf->Ln(1);

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
		$pdf->Cell(425,12,utf8_decode($row['ficha_obstetrica']),1,1,'C');


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
		$pdf->Cell(120,12,utf8_decode($row['ultima_mestruacion']),1,0,'C');
		$pdf->Cell(120,12,utf8_decode($row['ultima_citologia']),1,0,'C');
		$pdf->Cell(100,12,utf8_decode($row['resultado']),1,0,'C');
		$pdf->Cell(85,12,utf8_decode($row['flujo_vaginal']),1,0,'C');
		$pdf->Cell(100,12,utf8_decode($row['dolor_pelvico']),1,0,'C');
		$pdf->Cell(120,12,utf8_decode($row['dolor_senos']),1,1,'C');
		$pdf->Ln(1);

	}

	$pdf->SetFont('Arial','B',9);//
	$pdf->SetFillColor(232,232,232);
	$pdf->Cell(750,12,'USO DE ELEMNTOS DE PROTECCION PERSONAL ( '.utf8_decode($row['uso_proteccion']).' )',1,1,'C',1);

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
	$pdf->Cell(95,12,utf8_decode($row['cargo_o_empresa']),1,0,'C');
	$pdf->Cell(28,12,utf8_decode($row['actual']),1,0,'C');
	$pdf->Cell(28,12,utf8_decode($row['casco']),1,0,'C');
	$pdf->Cell(28,12,utf8_decode($row['botas']),1,0,'C');
	$pdf->Cell(28,12,utf8_decode($row['gafas']),1,0,'C');
	$pdf->Cell(43,12,utf8_decode($row['tapabocas']),1,0,'C');
	$pdf->Cell(30,12,utf8_decode($row['overol']),1,0,'C');
	$pdf->Cell(80,12,utf8_decode($row['protectores_auditivos']),1,0,'C');
	$pdf->Cell(98,12,utf8_decode($row['protectores_respiratorios']),1,0,'C');
	$pdf->Cell(292,12,utf8_decode($row['otros']),1,1,'C');

	$pdf->SetFont('Arial','',8);//
	$pdf->Cell(95,12,'Son adecuados',1,0,'C',1);
	$pdf->Cell(50,12,'Todas',1,0,'C',1);
	$pdf->Cell(605,12,'Solo:',1,1,'C',1);

	$pdf->SetFont('Arial','',7);//
	$pdf->Cell(95,12,utf8_decode($row['adecuados']),1,0,'C');
	$pdf->Cell(50,12,utf8_decode($row['todas']),1,0,'C');
	$pdf->Cell(605,12,utf8_decode($row['solo']),1,1,'C');
	$pdf->Ln(1);

	$pdf->SetFont('Arial','B',9);//
	$pdf->SetFillColor(232,232,232);
	$pdf->Cell(750,12,'ACCIDENTES DE TRABAJO ( '.utf8_decode($row['accidentes_trabajo']).' )',1,1,'C',1);

	$pdf->SetFont('Arial','',8);//
	$pdf->Cell(80,12,'Fecha',1,0,'C',1);
	$pdf->Cell(150,12,'Empresa',1,0,'C',1);
	$pdf->Cell(210,12,'Causa',1,0,'C',1);
	$pdf->Cell(35,12,'Lesion',1,0,'C',1);
	$pdf->Cell(182,12,'Parte Afectada',1,0,'C',1);
	$pdf->Cell(55,12,'Incapacidad',1,0,'C',1);
	$pdf->Cell(38,12,'Secuela',1,1,'C',1);

	$pdf->SetFont('Arial','',7);//
	$pdf->Cell(80,12,utf8_decode($row['fecha1']),1,0,'C');
	$pdf->Cell(150,12,utf8_decode($row['ac_empresa1']),1,0,'C');
	$pdf->Cell(210,12,utf8_decode($row['causa1']),1,0,'C');
	$pdf->Cell(35,12,utf8_decode($row['lesion1']),1,0,'C');
	$pdf->Cell(182,12,utf8_decode($row['parte_afectada1']),1,0,'C');
	$pdf->Cell(55,12,utf8_decode($row['incapacidad1']),1,0,'C');
	$pdf->Cell(38,12,utf8_decode($row['secuela1']),1,1,'C');

	$pdf->Cell(80,12,utf8_decode($row['fecha2']),1,0,'C');
	$pdf->Cell(150,12,utf8_decode($row['ac_empresa2']),1,0,'C');
	$pdf->Cell(210,12,utf8_decode($row['causa2']),1,0,'C');
	$pdf->Cell(35,12,utf8_decode($row['lesion1']),1,0,'C');
	$pdf->Cell(182,12,utf8_decode($row['parte_afectada2']),1,0,'C');
	$pdf->Cell(55,12,utf8_decode($row['incapacidad2']),1,0,'C');
	$pdf->Cell(38,12,utf8_decode($row['secuela2']),1,1,'C');

	$pdf->Cell(80,12,utf8_decode($row['fecha3']),1,0,'C');
	$pdf->Cell(150,12,utf8_decode($row['ac_empresa3']),1,0,'C');
	$pdf->Cell(210,12,utf8_decode($row['causa3']),1,0,'C');
	$pdf->Cell(35,12,utf8_decode($row['lesion3']),1,0,'C');
	$pdf->Cell(182,12,utf8_decode($row['parte_afectada3']),1,0,'C');
	$pdf->Cell(55,12,utf8_decode($row['incapacidad3']),1,0,'C');
	$pdf->Cell(38,12,utf8_decode($row['secuela3']),1,1,'C');

	$pdf->Cell(80,12,utf8_decode($row['fecha4']),1,0,'C');
	$pdf->Cell(150,12,utf8_decode($row['ac_empresa4']),1,0,'C');
	$pdf->Cell(210,12,utf8_decode($row['causa4']),1,0,'C');
	$pdf->Cell(35,12,utf8_decode($row['lesion4']),1,0,'C');
	$pdf->Cell(182,12,utf8_decode($row['parte_afectada4']),1,0,'C');
	$pdf->Cell(55,12,utf8_decode($row['incapacidad4']),1,0,'C');
	$pdf->Cell(38,12,utf8_decode($row['secuela4']),1,1,'C');

	$pdf->Cell(80,12,utf8_decode($row['fecha5']),1,0,'C');
	$pdf->Cell(150,12,utf8_decode($row['ac_empresa5']),1,0,'C');
	$pdf->Cell(210,12,utf8_decode($row['causa5']),1,0,'C');
	$pdf->Cell(35,12,utf8_decode($row['lesion5']),1,0,'C');
	$pdf->Cell(182,12,utf8_decode($row['parte_afectada5']),1,0,'C');
	$pdf->Cell(55,12,utf8_decode($row['incapacidad5']),1,0,'C');
	$pdf->Cell(38,12,utf8_decode($row['secuela5']),1,1,'C');
	$pdf->Ln(1);

	$pdf->SetFont('Arial','B',9);//
	$pdf->SetFillColor(232,232,232);
	$pdf->Cell(750,12,'ENFERMEDAD PROFESIONAL ( '.utf8_decode($row['enfermedad_profesional']).' )',1,1,'C',1);

	$pdf->SetFont('Arial','',8);//
	$pdf->Cell(80,12,'Fecha',1,0,'C',1);
	$pdf->Cell(150,12,'Empresa',1,0,'C',1);
	$pdf->Cell(409,12,'Diagnostico',1,0,'C',1);
	$pdf->Cell(25,12,'ARL',1,0,'C',1);
	$pdf->Cell(48,12,'Reubicacion',1,0,'C',1);
	$pdf->Cell(38,12,'Pension',1,1,'C',1);

	$pdf->SetFont('Arial','',7);//
	$pdf->Cell(80,12,utf8_decode($row['en_fecha1']),1,0,'C');
	$pdf->Cell(150,12,utf8_decode($row['en_empresa1']),1,0,'C');
	$pdf->Cell(409,12,utf8_decode($row['diagnostico1']),1,0,'C');
	$pdf->Cell(25,12,utf8_decode($row['arl1']),1,0,'C');
	$pdf->Cell(48,12,utf8_decode($row['reubicacion1']),1,0,'C');
	$pdf->Cell(38,12,utf8_decode($row['pension1']),1,1,'C');

	$pdf->Cell(80,12,utf8_decode($row['en_fecha2']),1,0,'C');
	$pdf->Cell(150,12,utf8_decode($row['en_empresa2']),1,0,'C');
	$pdf->Cell(409,12,utf8_decode($row['diagnostico2']),1,0,'C');
	$pdf->Cell(25,12,utf8_decode($row['arl2']),1,0,'C');
	$pdf->Cell(48,12,utf8_decode($row['reubicacion2']),1,0,'C');
	$pdf->Cell(38,12,utf8_decode($row['pension2']),1,1,'C');

	$pdf->Cell(80,12,utf8_decode($row['en_fecha3']),1,0,'C');
	$pdf->Cell(150,12,utf8_decode($row['en_empresa3']),1,0,'C');
	$pdf->Cell(409,12,utf8_decode($row['diagnostico3']),1,0,'C');
	$pdf->Cell(25,12,utf8_decode($row['arl3']),1,0,'C');
	$pdf->Cell(48,12,utf8_decode($row['reubicacion3']),1,0,'C');
	$pdf->Cell(38,12,utf8_decode($row['pension3']),1,1,'C');

	$pdf->Cell(80,12,utf8_decode($row['en_fecha4']),1,0,'C');
	$pdf->Cell(150,12,utf8_decode($row['en_empresa4']),1,0,'C');
	$pdf->Cell(409,12,utf8_decode($row['diagnostico4']),1,0,'C');
	$pdf->Cell(25,12,utf8_decode($row['arl4']),1,0,'C');
	$pdf->Cell(48,12,utf8_decode($row['reubicacion4']),1,0,'C');
	$pdf->Cell(38,12,utf8_decode($row['pension4']),1,1,'C');

	$pdf->Cell(80,12,utf8_decode($row['en_fecha5']),1,0,'C');
	$pdf->Cell(150,12,utf8_decode($row['en_empresa5']),1,0,'C');
	$pdf->Cell(409,12,utf8_decode($row['diagnostico5']),1,0,'C');
	$pdf->Cell(25,12,utf8_decode($row['arl5']),1,0,'C');
	$pdf->Cell(48,12,utf8_decode($row['reubicacion5']),1,0,'C');
	$pdf->Cell(38,12,utf8_decode($row['pension5']),1,1,'C');
	$pdf->Ln(1);

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
	$pdf->Cell(80,12,utf8_decode($row['practica_deporte']),1,0,'C');
	$pdf->Cell(245,12,utf8_decode($row['cuales']),1,0,'C');
	$pdf->Cell(42,12,utf8_decode($row['sedentario']),1,0,'C');
	$pdf->Cell(95,12,utf8_decode($row['ejercicio_cardiopulmonar']),1,0,'C');
	$pdf->Cell(245,12,utf8_decode($row['ejercicio_otro']),1,0,'C');
	$pdf->Cell(43,12,utf8_decode($row['frecuencia_ejercicio']),1,1,'C');
	$pdf->Ln(1);

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
	$pdf->Cell(58,12,utf8_decode($row['fumador_anos']),1,0,'C');
	$pdf->Cell(48,12,utf8_decode($row['exfumador']),1,0,'C');
	$pdf->Cell(70,12,utf8_decode($row['exfumador_anos']),1,0,'C');
	$pdf->Cell(65,12,utf8_decode($row['cant_cigarrillos_dia']),1,0,'C');
	$pdf->Cell(75,12,utf8_decode($row['beber_habitualmente']),1,0,'C');
	$pdf->Cell(58,12,utf8_decode($row['anos_habito_beber']),1,0,'C');
	$pdf->Cell(60,12,utf8_decode($row['frecuencia_beber']),1,0,'C');
	$pdf->Cell(160,12,utf8_decode($row['tipo_licor']),1,0,'C');
	$pdf->Cell(90,12,utf8_decode($row['problemas_con_bebidas']),1,1,'C');

	$pdf->SetFont('Arial','',8);//
	$pdf->Cell(330,12,'Cuales Bebidas?',1,0,'C',1);
	$pdf->Cell(45,12,'Exbebedor',1,0,'C',1);
	$pdf->Cell(40,12,utf8_decode('N° Años'),1,0,'C',1);
	$pdf->Cell(335,12,'Otros habitos toxicos',1,1,'C',1);

	$pdf->SetFont('Arial','',7);//
	$pdf->Cell(330,12,utf8_decode($row['cuales_bebidas_problemas']),1,0,'C');
	$pdf->Cell(45,12,utf8_decode($row['exbebedor']),1,0,'C');
	$pdf->Cell(40,12,utf8_decode($row['anos_exbebedor']),1,0,'C');
	$pdf->Cell(335,12,utf8_decode($row['cuales_habitos_tox']),1,1,'C');

	$pdf->SetFont('Arial','',8);//
	$pdf->Cell(100,12,'Medicamento regularmente',1,0,'C',1);
	$pdf->Cell(277,12,'Cuales medicamentos:',1,0,'C',1);
	$pdf->Cell(97,12,'Pendiente cirugia en EPS',1,0,'C',1);
	$pdf->Cell(276,12,'Cuales cirugias',1,1,'C',1);


	$pdf->SetFont('Arial','',7);//
	$pdf->Cell(100,12,utf8_decode($row['medicamento_regularmente']),1,0,'C');
	$pdf->Cell(277,12,utf8_decode($row['cuales_medicamentos']),1,0,'C');
	$pdf->Cell(97,12,utf8_decode($row['cirugias_en_eps']),1,0,'C');
	$pdf->Cell(276,12,utf8_decode($row['cuales_cirugias']),1,1,'C');

	$pdf->SetFont('Arial','',8);//
	$pdf->Cell(85,12,'Tratamiento pendiente',1,0,'C',1);
	$pdf->Cell(276,12,'Cuales Tratamientos',1,0,'C',1);
	$pdf->Cell(105,12,'Incapacidad ultimos 6 meses',1,0,'C',1);
	$pdf->Cell(284,12,'Motivo de incapacidad',1,1,'C',1);

	$pdf->SetFont('Arial','',7);//
	$pdf->Cell(85,12,utf8_decode($row['tratamiento_pendiente']),1,0,'C');
	$pdf->Cell(276,12,utf8_decode($row['cuales_tratamientos']),1,0,'C');
	$pdf->Cell(105,12,utf8_decode($row['incapacidad_ultimos_meses']),1,0,'C');
	$pdf->Cell(284,12,utf8_decode($row['motivo_incapacidad']),1,1,'C');
	$pdf->Ln(1);

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
	$pdf->Cell(130,12,utf8_decode($row['mano_habil']),1,0,'C');
	$pdf->Cell(50,12,utf8_decode($row['cicatrices']),1,0,'C');
	$pdf->Cell(50,12,utf8_decode($row['tatuajes']),1,0,'C');
	$pdf->Cell(62,12,utf8_decode($row['tension_arterial']),1,0,'C');
	$pdf->Cell(85,12,utf8_decode($row['frecuencia_cardiaca']),1,0,'C');
	$pdf->Cell(100,12,utf8_decode($row['frecuencia_respiratoria']),1,0,'C');
	$pdf->Cell(60,12,utf8_decode($row['talla']),1,0,'C');
	$pdf->Cell(60,12,utf8_decode($row['peso']),1,0,'C');
	$pdf->Cell(153,12,utf8_decode($row['peso_diagnostico']),1,1,'C');
	$pdf->Ln(20);

	$pdf->SetFont('Arial','B',9);//
	$pdf->Cell(750,12,'EXPOSICION A FACTORES DE RIESGO SUMINISTRADOS POR LA EMPRESA ( '.utf8_decode($row['riesgos_suministrados']).' )',1,1,'C',1);

	$pdf->SetFont('Arial','',8);//
	$pdf->Cell(35,12,'Fisico',1,0,'C',1);
	$pdf->Cell(38,12,'Quimico',1,0,'C',1);
	$pdf->Cell(45,12,'Biologico',1,0,'C',1);
	$pdf->Cell(52,12,'Ergonomico',1,0,'C',1);
	$pdf->Cell(45,12,'Mecanico',1,0,'C',1);
	$pdf->Cell(50,12,'Psicosocial',1,0,'C',1);
	$pdf->Cell(42,12,'Electrico',1,0,'C',1);
	$pdf->Cell(443,12,'Otros',1,1,'C',1);

	//$pdf->SetFont('Arial','',7);//
	$pdf->Cell(35,12,utf8_decode($row['suministrado_fisico']),1,0,'C');
	$pdf->Cell(38,12,utf8_decode($row['suministrado_mecanico']),1,0,'C');
	$pdf->Cell(45,12,utf8_decode($row['suministrado_quimico']),1,0,'C');
	$pdf->Cell(52,12,utf8_decode($row['suministrado_psicosocial']),1,0,'C');
	$pdf->Cell(45,12,utf8_decode($row['suministrado_biologico']),1,0,'C');
	$pdf->Cell(50,12,utf8_decode($row['suministrado_electrico']),1,0,'C');
	$pdf->Cell(42,12,utf8_decode($row['suministrado_ergonomico']),1,0,'C');
	$pdf->SetFont('Arial','',7);//
	$pdf->Cell(443,12,utf8_decode($row['suministrado_otro']),1,1,'C');
}

	$query3 = "SELECT * FROM datos_basicos AS db
		JOIN audiometria_resultado_der  ON db.id_historia = audiometria_resultado_der.paciente_audiometria
    	JOIN audiometria_resultado_izq ON audiometria_resultado_izq.id_audiometria_paciente = audiometria_resultado_der.id 
	WHERE db.id_historia = '$historia'";
	$resultado3 = mysqli_query($conexion,$query3);
	while($row3 = $resultado3->fetch_assoc()){

	//Audiometria 
	$pdf->Ln(5);
	$pdf->SetFont('Arial','B',9);//
	$pdf->SetFillColor(232,232,232);
	$pdf->Cell(750,12,'AUDIOMETRIA:',1,1,'C',1);
	$pdf->Ln(1);

	$pdf->SetFont('Arial','B',9);//
	$pdf->SetFillColor(232,232,232);
	$pdf->Cell(750,12,'Otoscopia:',1,1,'C',1);

	$pdf->SetFont('Arial','',8);//
	$pdf->SetFillColor(232,232,232);
	$pdf->Cell(42,12,'OD Pasa:',1,0,'C',1);
	$pdf->Cell(708,12,'Hallazgos:',1,1,'C',1);

	$pdf->SetFont('Arial','',7);//
	$pdf->SetFillColor(255,255,255);
	$pdf->Cell(42,12,utf8_decode($row3['pasa_otoscopia']),1,0,'C');
	$pdf->MultiCell(708,12,utf8_decode($row3['hallazgo_der']),1,1,'C');

	$pdf->SetFont('Arial','',8);//
	$pdf->SetFillColor(232,232,232);
	$pdf->Cell(42,12,'OI Pasa:',1,0,'C',1);
	$pdf->Cell(708,12,'Hallazgos:',1,1,'C',1);

	$pdf->SetFont('Arial','',7);//
	$pdf->SetFillColor(255,255,255);
	$pdf->Cell(42,12,utf8_decode($row3['pasa_otoscopia_izq']),1,0,'C');
	$pdf->MultiCell(708,12,utf8_decode($row3['hallazgo_izq']),1,1,'C');

	$pdf->SetFont('Arial','B',9);//
	$pdf->SetFillColor(232,232,232);
	$pdf->Cell(750,12,'Audiometria Tamiz:',1,1,'C',1);

	$pdf->Cell(375,12,'Oido Derecho:',1,0,'C',1);
	$pdf->Cell(375,12,'Oido Izquierdo:',1,1,'C',1);

	$pdf->Cell(40,12,'250:',1,0,'C',1);
	$pdf->Cell(40,12,'500:',1,0,'C',1);
	$pdf->Cell(40,12,'1000:',1,0,'C',1);
	$pdf->Cell(40,12,'2000:',1,0,'C',1);
	$pdf->Cell(40,12,'4000:',1,0,'C',1);
	$pdf->Cell(40,12,'8000:',1,0,'C',1);
	$pdf->Cell(135,12,'Promedio:',1,0,'C',1);

	$pdf->Cell(40,12,'250:',1,0,'C',1);
	$pdf->Cell(40,12,'500:',1,0,'C',1);
	$pdf->Cell(40,12,'1000:',1,0,'C',1);
	$pdf->Cell(40,12,'2000:',1,0,'C',1);
	$pdf->Cell(40,12,'4000:',1,0,'C',1);
	$pdf->Cell(40,12,'8000:',1,0,'C',1);
	$pdf->Cell(135,12,'Promedio:',1,1,'C',1);

	$pdf->SetFont('Arial','',8);//

	$pdf->Cell(40,12,utf8_decode($row3['250']),1,0,'C');
	$pdf->Cell(40,12,utf8_decode($row3['500']),1,0,'C');
	$pdf->Cell(40,12,utf8_decode($row3['1000']),1,0,'C');
	$pdf->Cell(40,12,utf8_decode($row3['2000']),1,0,'C');
	$pdf->Cell(40,12,utf8_decode($row3['4000']),1,0,'C');
	$pdf->Cell(40,12,utf8_decode($row3['8000']),1,0,'C');
	$pdf->Cell(135,12,utf8_decode($row3['resultado_promedio']),1,0,'C');

	$pdf->Cell(40,12,utf8_decode($row3['250_izq']),1,0,'C');
	$pdf->Cell(40,12,utf8_decode($row3['500_izq']),1,0,'C');
	$pdf->Cell(40,12,utf8_decode($row3['1000_izq']),1,0,'C');
	$pdf->Cell(40,12,utf8_decode($row3['2000_izq']),1,0,'C');
	$pdf->Cell(40,12,utf8_decode($row3['4000_izq']),1,0,'C');
	$pdf->Cell(40,12,utf8_decode($row3['8000_izq']),1,0,'C');
	$pdf->Cell(135,12,utf8_decode($row3['resultado_promedio_izq']),1,1,'C');

	$pdf->SetFont('Arial','B',9);//
	$pdf->SetFillColor(232,232,232);
	$pdf->Cell(750,12,'OBSERVACIONES:',1,1,'C',1);

	$pdf->SetFont('Arial','',8);//
	$pdf->SetFillColor(255,255,255);
	$pdf->MultiCell(750,12,utf8_decode($row3['observaciones']),1,1,'C');

	$pdf->SetFont('Arial','B',9);//
	$pdf->SetFillColor(232,232,232);
	$pdf->Cell(750,12,'EVALUACIONES DIAGNOSTICA:',1,1,'C',1);

	$pdf->SetFont('Arial','',8);//
	$pdf->SetFillColor(255,255,255);
	$pdf->MultiCell(750,12,utf8_decode($row3['evaluacion_diagnostica']),1,1,'C');

	$pdf->Ln(10);

}
	//Visiometria
	$query4 = "SELECT * FROM datos_basicos AS db
    JOIN visiometria_campo_visual AS vcv ON db.id_historia = vcv.paciente_visiometria 
    JOIN visiometria_vision_lejana AS vvl ON vcv.id = vvl.id_campo_visual
    JOIN visiometria_vision_proxima AS vvp ON vvl.id = vvp.id_vision_lejana
    JOIN visiometria_percepciones_y_forias AS vpf ON vvp.id = vpf.id_vision_proxima
	WHERE db.id_historia = '$historia'";
	$resultado4 = mysqli_query($conexion,$query4);
	while($row4 = $resultado4->fetch_assoc()){

	$pdf->SetFillColor(232,232,232);
	$pdf->SetFont('Arial','B',9);//
	$pdf->Cell(750,12,'VISIOMETRIA',1,1,'C',1);
	$pdf->Ln(1);
	$pdf->SetFont('Arial','B',8);//
	$pdf->Cell(750,12,'CAMPO VISUAL',1,1,'C',1);

	$pdf->SetFont('Arial','',8);//
	$pdf->Cell(750,12,'UTILIZA PRESCRIPCION OPTICA: ( '.utf8_decode($row['prescripcion_optica']).' )',1,1,'C',1);

	$pdf->SetFont('Arial','',8);//
	$pdf->Cell(150,12, 'Ojos',1,0,'C',1);
	$pdf->Cell(150,12, utf8_decode('35° NASAL') ,1,0,'C',1);
	$pdf->Cell(150,12, utf8_decode('55° TEMPORAL') ,1,0,'C',1);
	$pdf->Cell(150,12, utf8_decode('70° TEMPORAL') ,1,0,'C',1);
	$pdf->Cell(150,12, utf8_decode('85° TEMPORAL') ,1,1,'C',1);

	$pdf->Cell(150,12, 'Ojo derecho',1,0,'C');
	$pdf->Cell(150,12,utf8_decode($row['35_nasal_derecho']),1,0,'C');
	$pdf->Cell(150,12,utf8_decode($row['55_temporal_derecho']),1,0,'C');
	$pdf->Cell(150,12,utf8_decode($row['70_temporal_derecho']),1,0,'C');
	$pdf->Cell(150,12,utf8_decode($row['85_temporal_derecho']),1,1,'C');

	$pdf->Cell(150,12, 'Ojo izquierdo',1,0,'C');
	$pdf->Cell(150,12,utf8_decode($row['35_nasal_izquierdo']),1,0,'C');
	$pdf->Cell(150,12,utf8_decode($row['55_temporal_izquierdo']),1,0,'C');
	$pdf->Cell(150,12,utf8_decode($row['70_temporal_izquierdo']),1,0,'C');
	$pdf->Cell(150,12,utf8_decode($row['85_temporal_izquierdo']),1,1,'C');

	$pdf->SetFont('Arial','B',9);//
	$pdf->Cell(750,12,'ALTERACION VISUAL:',1,1,'C',1);

	$pdf->SetFont('Arial','',8);//
	$pdf->Cell(750,12,utf8_decode($row['alteracion_visual']),1,1,'C');

	$pdf->SetFont('Arial','B',9);//
	$pdf->Cell(750,12,'RESULTADO:',1,1,'C',1);

	$pdf->SetFont('Arial','',8);//
	$pdf->SetFillColor(255,255,255);
	$pdf->MultiCell(750,12,utf8_decode($row['resultado_visiometria']),1,1,'C');

	$pdf->Ln(10);
}
	$query5 = "SELECT * FROM datos_basicos AS db
	JOIN psicologia_examen_estado_mental ON psicologia_examen_estado_mental.paciente_psicologia = db.id_historia
	WHERE db.id_historia = '$historia'";
	$resultado5 = mysqli_query($conexion,$query5);
	while($row5 = $resultado5->fetch_assoc()){


	$pdf->SetFillColor(232,232,232);
	$pdf->SetFont('Arial','B',9);//
	$pdf->Cell(750,12,'ESPIROMETRIA:',1,1,'C',1);

	$pdf->SetFont('Arial','',8);//
	$pdf->Cell(750,12,'Diagnostico:',1,1,'C',1);

	$pdf->SetFont('Arial','',8);//
	$pdf->SetFillColor(255,255,255);
	$pdf->MultiCell(750,12,utf8_decode(''/*$row5['concepto']*/),1,1,'C');
	$pdf->Ln(10);

}
	$query6 = "SELECT * FROM datos_basicos AS db
	JOIN psicologia_examen_estado_mental ON psicologia_examen_estado_mental.paciente_psicologia = db.id_historia
	WHERE db.id_historia = '$historia'";
	$resultado6 = mysqli_query($conexion,$query6);
	while($row6 = $resultado6->fetch_assoc()){

	$pdf->SetFillColor(232,232,232);
	$pdf->SetFont('Arial','B',9);//
	$pdf->Cell(750,12,'PSICOLOGIA:',1,1,'C',1);

	$pdf->SetFont('Arial','',8);//
	$pdf->Cell(750,12,'Concepto:',1,1,'C',1);

	$pdf->SetFont('Arial','',8);//
	$pdf->SetFillColor(255,255,255);
	$pdf->MultiCell(750,12,utf8_decode($row6['concepto']),1,1,'C');
	$pdf->Ln(10);

}
//test
    $data_remision = "SELECT * FROM datos_basicos AS db

    JOIN medico_examen_fisico AS mef ON mef.paciente_medico = db.id_historia
    JOIN medico_paraclinicos AS mp ON mef.id = mp.id_examen_fisico
    /*LEFT JOIN medico_remision as mr ON (mp.id = mr.id_paraclinico)*/
    JOIN medico_remision AS mr ON mp.id = mr.id_paraclinico
    /*JOIN medico_concepto_aptitud_laboral AS mcal ON mr.id = mcal.id_remision*/
    WHERE db.id_historia = '$historia'";
    $query = mysqli_query($conexion,$data_remision);

  if (mysqli_num_rows($query) > 0){ 

    while ($dat=mysqli_fetch_array($query)){

    $pdf->SetFont('Arial','B',9);//
	$pdf->SetFillColor(232,232,232);
	$pdf->Cell(750,12,'REMISION: ( '.utf8_decode($dat['remision']).' )' ,1,1,'C',1);

	$pdf->SetFont('Arial','',8);//
	$pdf->Cell(330,12,'Desde',1,0,'C',1);
	$pdf->Cell(330,12,'Hacia',1,0,'C',1);
	$pdf->Cell(90,12,'Remision pendiente',1,1,'C',1);

	$pdf->Cell(330,12,utf8_decode($dat['desde']),1,0,'C');
	$pdf->Cell(330,12,utf8_decode($dat['hacia']),1,0,'C');
	$pdf->Cell(90,12,utf8_decode($dat['remision_pendiente']),1,1,'C');

	$pdf->Cell(750,12,'Motivo de remision',1,1,'C',1);

	$pdf->SetFillColor(255,255,255);
	$pdf->SetFont('Arial','B',9);//
	$pdf->MultiCell(750,12,utf8_decode($dat['motivo']),1,1,'C');
    }
}
$pdf->Ln(10);
//test
	//Medico
	$query2 = "SELECT * FROM datos_basicos AS db
    JOIN historia_laboral AS hl ON db.id_historia = hl.paciente_enfermeria 
    JOIN medico_examen_fisico AS mef ON db.id_historia = mef.paciente_medico
    JOIN medico_paraclinicos AS mp ON mef.id = mp.id_examen_fisico
    JOIN medico_remision AS mr ON mp.id = mr.id_paraclinico
    JOIN medico_concepto_aptitud_laboral AS mcal ON mr.id = mcal.id_remision
    JOIN medico_recomendaciones_y_restricciones AS mrr ON mcal.id = mrr.id_aptitud_laboral
    JOIN medico_pve AS pve ON mrr.id = pve.fk_recomendaciones

	WHERE db.id_historia = '$historia'";
	$resultado2 = mysqli_query($conexion,$query2);
	while($row2 = $resultado2->fetch_assoc()){


	//$pdf->Ln(10);
	$pdf->SetFillColor(232,232,232);
	$pdf->SetFont('Arial','B',9);//
	$pdf->Cell(750,12,'EXAMEN FISICO:',1,1,'C',1);

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

	$pdf->Cell(85,12,utf8_decode($row2['cabeza']),1,0,'C');
	$pdf->Cell(85,12,utf8_decode($row2['amigdalas']),1,0,'C');
	$pdf->Cell(85,12,utf8_decode($row2['abdomen']),1,0,'C');
	$pdf->Cell(80,12,utf8_decode($row2['piel_anexos']),1,0,'C');
	$pdf->Cell(80,12,utf8_decode($row2['ojos']),1,0,'C');
	$pdf->Cell(80,12,utf8_decode($row2['cuello']),1,0,'C');
	$pdf->Cell(85,12,utf8_decode($row2['genitales']),1,0,'C');
	$pdf->Cell(85,12,utf8_decode($row2['neurologico']),1,0,'C');
	$pdf->Cell(85,12,utf8_decode($row2['oidos']),1,1,'C');


	
	$pdf->Cell(85,12,'Torax',1,0,'C',1);
	$pdf->Cell(85,12,'Miembros Superiores',1,0,'C',1);
	$pdf->Cell(85,12,'Muscular',1,0,'C',1);
	$pdf->Cell(80,12,'Nariz',1,0,'C',1);
	$pdf->Cell(80,12,'Pulmones',1,0,'C',1);
	$pdf->Cell(80,12,'Vascular',1,0,'C',1);
	$pdf->Cell(85,12,'Dentadura',1,0,'C',1);
	$pdf->Cell(85,12,'Miembros Inferiores',1,0,'C',1);
	$pdf->Cell(85,12,'Corazon',1,1,'C',1);

	$pdf->Cell(85,12,utf8_decode($row2['corazon']),1,0,'C');
	$pdf->Cell(85,12,utf8_decode($row2['miembros_superiores']),1,0,'C');
	$pdf->Cell(85,12,utf8_decode($row2['muscular']),1,0,'C');
	$pdf->Cell(80,12,utf8_decode($row2['nariz']),1,0,'C');
	$pdf->Cell(80,12,utf8_decode($row2['pulmones']),1,0,'C');
	$pdf->Cell(80,12,utf8_decode($row2['vascular']),1,0,'C');
	$pdf->Cell(85,12,utf8_decode($row2['dentadura']),1,0,'C');
	$pdf->Cell(85,12,utf8_decode($row2['miembros_inferiores']),1,0,'C');
	$pdf->Cell(85,12,utf8_decode($row2['corazon']),1,1,'C');

	$pdf->Cell(85,12,'Columna',1,0,'C',1);
	$pdf->Cell(85,12,'Oseo',1,0,'C',1);
	$pdf->Cell(85,12,'Lengua',1,0,'C',1);
	$pdf->Cell(80,12,'Hernias',1,0,'C',1);
	$pdf->Cell(80,12,'Viceras',1,0,'C',1);
	$pdf->Cell(335,12,'Otros',1,1,'C',1);

	$pdf->Cell(85,12,utf8_decode($row2['columna']),1,0,'C');
	$pdf->Cell(85,12,utf8_decode($row2['oseo']),1,0,'C');
	$pdf->Cell(85,12,utf8_decode($row2['lengua']),1,0,'C');
	$pdf->Cell(80,12,utf8_decode($row2['hernia']),1,0,'C');
	$pdf->Cell(80,12,utf8_decode($row2['viceras']),1,0,'C');
	$pdf->Cell(335,12,utf8_decode($row2['otro_examen_fisico']),1,1,'C');


	$pdf->Cell(750,12,'OBSERVACIONES:',1,1,'C',1);
	$pdf->SetFillColor(255,255,255);
	$pdf->MultiCell(750,12,utf8_decode($row['observaciones_ex_fisico']),1,1,'C');
	$pdf->Ln(1);

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
	
	$pdf->Cell(85,12,utf8_decode($row2['marcha']),1,0,'C');
	$pdf->Cell(85,12,utf8_decode($row2['columna_funcional']),1,0,'C');
	$pdf->Cell(85,12,utf8_decode($row2['miembros_superiores_funcionales']),1,0,'C');
	$pdf->Cell(85,12,utf8_decode($row2['miembros_inferiores_funcionales']),1,0,'C');
	$pdf->Cell(80,12,utf8_decode($row2['coordinacion_funcionales']),1,0,'C');
	$pdf->Cell(80,12,utf8_decode($row2['reflejos_funcionales']),1,0,'C');
	$pdf->Cell(80,12,utf8_decode($row2['phalen']),1,0,'C');
	$pdf->Cell(85,12,utf8_decode($row2['finkelstein']),1,0,'C');
	$pdf->Cell(85,12,utf8_decode($row2['braggard']),1,1,'C');

	$pdf->Cell(85,12,'Shober',1,0,'C',1);
	$pdf->Cell(85,12,'Babinski-Weil',1,0,'C',1);
	$pdf->Cell(85,12,'Romber-Sensibilidad',1,0,'C',1);
	$pdf->Cell(85,12,'Romber',1,0,'C',1);
	$pdf->Cell(80,12,'Tinel',1,0,'C',1);
	$pdf->Cell(80,12,'Lasegue',1,0,'C',1);
	$pdf->Cell(80,12,'Adams',1,0,'C',1);
	$pdf->Cell(85,12,'Unterberger',1,0,'C',1);
	$pdf->Cell(85,12,'Nariz-dedo',1,1,'C',1);

	$pdf->Cell(85,12,utf8_decode($row2['shober']),1,0,'C');
	$pdf->Cell(85,12,utf8_decode($row2['babinski_weil']),1,0,'C');
	$pdf->Cell(85,12,utf8_decode($row2['romber_sensibilidad']),1,0,'C');
	$pdf->Cell(85,12,utf8_decode($row2['romber']),1,0,'C');
	$pdf->Cell(80,12,utf8_decode($row2['tinel']),1,0,'C');
	$pdf->Cell(80,12,utf8_decode($row2['lasegue']),1,0,'C');
	$pdf->Cell(80,12,utf8_decode($row2['adams']),1,0,'C');
	$pdf->Cell(85,12,utf8_decode($row2['unterberger']),1,0,'C');
	$pdf->Cell(85,12,utf8_decode($row2['nariz_dedo']),1,1,'C');

	$pdf->Cell(97,12,'Miembros Superior-Tono',1,0,'C',1);
	$pdf->Cell(110,12,'Miembros Superior-Fuerza',1,0,'C',1);
	$pdf->Cell(128,12,'Miembros Superior-Sensibilidad',1,0,'C',1);
	$pdf->Cell(102,12,'Miembros Superior-Arcos',1,0,'C',1);
	$pdf->Cell(94,12,'Miembros Inferior-Tono',1,0,'C',1);
	$pdf->Cell(99,12,'Miembros Inferior-Fuerza',1,0,'C',1);
	$pdf->Cell(120,12,'Miembros Inferior-Sensibilidad',1,1,'C',1);

	$pdf->Cell(97,12,utf8_decode($row2['miembro_superior_tono']),1,0,'C');
	$pdf->Cell(110,12,utf8_decode($row2['miembro_superior_fuerza']),1,0,'C');
	$pdf->Cell(128,12,utf8_decode($row2['miembro_superior_sensibilidad']),1,0,'C');
	$pdf->Cell(102,12,utf8_decode($row2['miembro_superior_arco_movimiento']),1,0,'C');
	$pdf->Cell(94,12,utf8_decode($row2['miembro_inferior_tono']),1,0,'C');
	$pdf->Cell(99,12,utf8_decode($row2['miembro_inferior_fuerza']),1,0,'C');
	$pdf->Cell(120,12,utf8_decode($row2['miembro_inferior_sensibilidad']),1,1,'C');

	$pdf->Cell(750,12,'Miembros Inferior-Arcos-Movimiento',1,1,'C',1);
	$pdf->Cell(750,12,utf8_decode($row2['miembro_inferior_arco_movimiento']),1,1,'C');

	$pdf->Cell(750,12,'Hallazgos:',1,1,'C',1);
	$pdf->SetFillColor(255,255,255);
	$pdf->MultiCell(750,12,utf8_decode($row2['hallazgos_funcionales']),1,1,'C');
	$pdf->Ln(1);

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
	$pdf->Cell(90,12,utf8_decode($row2['colesterol']),1,0,'C');
	$pdf->Cell(90,12,utf8_decode($row2['glicemia']),1,0,'C');
	$pdf->Cell(90,12,utf8_decode($row2['trigliceridos']),1,0,'C');
	$pdf->Cell(97,12,utf8_decode($row2['frotis_faringeo']),1,0,'C');
	$pdf->Cell(97,12,utf8_decode($row2['frotis_de_una']),1,0,'C');
	$pdf->Cell(92,12,utf8_decode($row2['hemograma']),1,0,'C');
	$pdf->Cell(97,12,utf8_decode($row2['coprologico']),1,0,'C');
	$pdf->Cell(97,12,utf8_decode($row2['electrocardiograma']),1,1,'C');

	$pdf->SetFont('Arial','B',9);//
	$pdf->SetFillColor(232,232,232);
	$pdf->Cell(750,12,'RAYOS X:',1,1,'C',1);

	$pdf->Cell(135,12,'Columna',1,0,'C',1);
	$pdf->Cell(135,12,'Torax',1,0,'C',1);
	$pdf->Cell(135,12,'Abdomen',1,0,'C',1);
	$pdf->Cell(172,12,'Miembros Superiores',1,0,'C',1);
	$pdf->Cell(173,12,'Miembros Inferiores',1,1,'C',1);

	$pdf->SetFont('Arial','',8);//
	$pdf->Cell(135,12,utf8_decode($row2['columna_paraclinico']),1,0,'C');
	$pdf->Cell(135,12,utf8_decode($row2['torax_paraclinico']),1,0,'C');
	$pdf->Cell(135,12,utf8_decode($row2['abdomen_paraclinico']),1,0,'C');
	$pdf->Cell(172,12,utf8_decode($row2['miembros_superiores_paraclinico']),1,0,'C');
	$pdf->Cell(173,12,utf8_decode($row2['miembros_inferiores_paraclinico']),1,1,'C');

	/*$pdf->SetFont('Arial','B',9);//
	$pdf->SetFillColor(232,232,232);
	$pdf->Cell(750,12,'REMISION: ( '.utf8_decode($row2['remision']).' )' ,1,1,'C',1);

	$pdf->SetFont('Arial','',8);//
	$pdf->Cell(330,12,'Desde',1,0,'C',1);
	$pdf->Cell(330,12,'Hacia',1,0,'C',1);
	$pdf->Cell(90,12,'Remision pendiente',1,1,'C',1);

	$pdf->Cell(330,12,utf8_decode($row2['desde']),1,0,'C');
	$pdf->Cell(330,12,utf8_decode($row2['hacia']),1,0,'C');
	$pdf->Cell(90,12,utf8_decode($row2['remision_pendiente']),1,1,'C');

	$pdf->Cell(750,12,'Motivo de remision',1,1,'C',1);

	$pdf->SetFillColor(255,255,255);
	$pdf->SetFont('Arial','B',9);//
	$pdf->MultiCell(750,12,utf8_decode($row2['motivo']),1,1,'C');

	$pdf->SetFillColor(232,232,232);
	$pdf->Cell(750,12,'Contraremision: / Fecha: '.utf8_decode($row2['fecha_contraremision']) ,1,1,'C',1);

	$pdf->SetFont('Arial','',9);//
	$pdf->Cell(750,12,'Resultado de remision',1,1,'C',1);

	$pdf->SetFillColor(255,255,255);
	$pdf->MultiCell(750,12,utf8_decode($row2['resultado_remision']),1,1,'C');
	//$pdf->Ln(1);

	$pdf->SetFont('Arial','',9);//
	$pdf->SetFillColor(232,232,232);
	$pdf->Cell(750,12,'Recomendaciones:',1,1,'C',1);

	$pdf->SetFillColor(255,255,255);
	$pdf->MultiCell(750,12,utf8_decode($row2['recomendaciones_remision']),1,1,'C');
	$pdf->Ln(1);*/

	$pdf->SetFont('Arial','B',9);//
	$pdf->SetFillColor(232,232,232);
	$pdf->Cell(750,12,'CONCEPTO DE APTITUD LABORAL:' ,1,1,'C',1);

	$pdf->SetFont('Arial','',9);//
	$pdf->Cell(180,12,'Apto para trabajo a nivel:',1,0,'C',1);
	$pdf->Cell(180,12,'Apto para trabajo en altura:',1,0,'C',1);
	$pdf->Cell(390,12,'Apto para el cargo con restricciones que no intervienen en su trabajo:',1,1,'C',1);

	$pdf->SetFont('Arial','',8);//
	$pdf->Cell(180,12,utf8_decode($row2['apto_trabajo_nivel']),1,0,'C');
	$pdf->Cell(180,12,utf8_decode($row2['apto_trabajo_altura']),1,0,'C');
	$pdf->Cell(390,12,utf8_decode($row2['apto_con_restricciones_no_intervienen']),1,1,'C');

	$pdf->SetFont('Arial','',7);//
	$pdf->Cell(85,12,'Aplazado:',1,0,'C',1);
	$pdf->Cell(85,12,'Nueva valoracion:',1,0,'C',1);
	$pdf->Cell(90,12,'Apto para el cargo:',1,0,'C',1);
	$pdf->Cell(100,12,'Examen de '.utf8_decode($row2['motivo_evaluacion']),1,0,'C',1);
	$pdf->Cell(390,12,'Apto para el cargo con Limitaciones que intervienen en su trabajo:',1,1,'C',1);

	$pdf->SetFont('Arial','',8);//
	$pdf->Cell(85,12,utf8_decode($row2['aplazado']),1,0,'C');
	$pdf->Cell(85,12,utf8_decode($row2['nueva_valoracion']),1,0,'C');
	$pdf->Cell(90,12,utf8_decode($row2['apto']),1,0,'C');
	$pdf->Cell(100,12,utf8_decode($row2['examen_diagnostico']),1,0,'C');
	$pdf->Cell(390,12,utf8_decode($row2['apto_con_limitaciones_si_intervienen']),1,1,'C');

	$pdf->SetFont('Arial','',9);//
	$pdf->Cell(750,12,'Observaciones:',1,1,'C',1);
	$pdf->Ln(1);

	$pdf->SetFillColor(232,232,232);
	$pdf->SetFont('Arial','B',9);//
	$pdf->Cell(750,12,'INGRESO AL PROGRAMA DE VIGILANCIA EPIDEMIOLOGICA: ( '.utf8_decode($row2['pve']).' )',1,1,'C',1);

	$pdf->SetFont('Arial','',8);//
	$pdf->Cell(30,12,'Visual:',1,0,'C',1);
	$pdf->Cell(35,12,'Auditivo:',1,0,'C',1);
	$pdf->Cell(60,12,'Cardiovascular:',1,0,'C',1);
	$pdf->Cell(51,12,'Respiratorio:',1,0,'C',1);
	$pdf->Cell(20,12,'Piel:',1,0,'C',1);	
	$pdf->Cell(50,12,'Psicologico:',1,0,'C',1);
	$pdf->Cell(63,12,'Osteomuscular:',1,0,'C',1);
	$pdf->Cell(441,12,'Otro:',1,1,'C',1);

	$pdf->Cell(30,12,utf8_decode($row2['pve_visual']),1,0,'C');
	$pdf->Cell(35,12,utf8_decode($row2['pve_auditivo']),1,0,'C');
	$pdf->Cell(60,12,utf8_decode($row2['pve_cardiovascular']),1,0,'C');
	$pdf->Cell(51,12,utf8_decode($row2['pve_respiratorio']),1,0,'C');
	$pdf->Cell(20,12,utf8_decode($row2['pve_piel']),1,0,'C');
	$pdf->Cell(50,12,utf8_decode($row2['pve_psicologico']),1,0,'C');
	$pdf->Cell(63,12,utf8_decode($row2['pve_osteomuscular']),1,0,'C');
	$pdf->Cell(441,12,utf8_decode($row2['pve_otro']),1,1,'C');

	$pdf->SetFillColor(232,232,232);
	$pdf->Ln(1);
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
	$pdf->Cell(750,12,'RESTRICCIONES',1,1,'C',1);

	$pdf->SetFont('Arial','',9);//
	$pdf->Cell(750,12,'TRABAJADOR:',1,1,'C',1);

	$pdf->SetFillColor(255,255,255);
	$pdf->SetFont('Arial','',8);//
	$pdf->MultiCell(750,12,utf8_decode($row2['rest_trabajador']),1,1,'J');

	$pdf->SetFillColor(232,232,232);
	$pdf->SetFont('Arial','',9);//
	$pdf->Cell(750,12,'EMPRESA:',1,1,'C',1);

	$pdf->SetFillColor(255,255,255);
	$pdf->SetFont('Arial','',8);//
	$pdf->MultiCell(750,12,utf8_decode($row2['rest_empleador']),1,1,'J');



	$pdf->Ln(480);

	$pdf->SetFont('Arial','B',9);//
	$pdf->Cell(1,0, $pdf->Image("images/firmas/medicfirma".'.png', 88,733,100),1,0,'C');
	$pdf->Cell(200,12, 'Nombre, Firma y LSO',0,0,'C');

	$pdf->Cell(300,12, '',0,0,'C');

	$pdf->Cell(200,12, 'Nombre o Firma del Trabajador',0,1,'C');
	$pdf->Ln();

	$pdf->SetFillColor(255,255,255);	
	$pdf->MultiCell(750,9, utf8_decode('La presente certificación se expide con base en la información manifestada por el trabajador, por la empresa, por el resultado del examen físico médico ocupacional y los resultados de los exámenes paraclínicos realizados, si aplican, dicho certificado tiene carácter confidencial, según la normatividad vigente.'),0,1,'J');



	}
	$modo="I"; 
    $nombre ="Historia_Medica_Ocupacional_LSST_".$fechaexamen.'_'.trim($documento).'_'.$nombres.".pdf"; 
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
