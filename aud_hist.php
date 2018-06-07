<?php
	include ('aud_modelpdf.php');
	include ('includes/conexion.php');

	$ruta_destino =   "fotografias/";
	$historia = base64_decode($_REQUEST['paciente']);

	$query = "SELECT * FROM datos_basicos AS db
	JOIN datos_complementarios AS dc ON db.fk_d_complementario = dc.id
	JOIN datos_basicos_tipo_documento AS dbtd ON dbtd.idtd = dc.fk_tipo_documento
  	JOIN audiometria_oidoderecho AS aod ON db.id_historia = aod.paciente_audiometria
  	JOIN audiometria_oidoizquierdo AS aoi ON aoi.id_audiometria_paciente = aod.id 
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

	$pdf->SetFont('Arial','B',7);//
	$pdf->Cell(150,12,utf8_decode($row['nombre_empresa']),1,0,'C');
	$pdf->Cell(130,12,utf8_decode($row['ciudad']),1,0,'C');
	$pdf->Cell(152,12,utf8_decode($row['actividad_economica']),1,0,'C');
	$pdf->Cell(190,12,utf8_decode($row['cargo_a_desempenar']),1,0,'C');
	$pdf->Cell(128,99, $pdf->Image($ruta_destino."".$historia.'.png', 654,93,121),1,0,'C');
	$pdf->Cell(1,12,utf8_decode(''),1,1,'C');
	$pdf->Ln(1);

	//$pdf->Ln(2);
	$pdf->SetFont('Arial','B',9);//
	$pdf->Cell(622,12,'                                                   DATOS DEL TRABAJADOR',1,1,'C',1);

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
	$pdf->Cell(622,12,'                                              TIPO DE EXAMEN MEDICO - OCUPACIONAL:',1,1,'C',1);

	$pdf->SetFont('Arial','',9);//
	$pdf->Cell(622,12,utf8_decode($row['motivo_evaluacion']),1,1,'C');
	$pdf->Ln(1);

	$pdf->SetFont('Arial','B',9);//
	$pdf->Cell(622,12,'                                                ANTECEDENTES ( '.utf8_decode($row['antecedenteaudiometria']).' )' ,1,1,'C',1);
	$pdf->Cell(622,12,'                                                Antecedentes Personales:' ,1,1,'C',1);

	$pdf->SetFont('Arial','',8);//
	$pdf->Cell(45,12,'Quirurgico:',1,0,'C',1);
	$pdf->Cell(705,12,'Descripcion:',1,1,'C',1);

	$pdf->SetFont('Arial','',8);//
	$pdf->SetFillColor(255,255,255);
	$pdf->Cell(45,12,utf8_decode($row['ant_personalquirurgico']),1,0,'C');
	$pdf->MultiCell(705,12,utf8_decode($row['desc_personalquirurgico']),1,1,'C');

	$pdf->SetFont('Arial','',8);//
	$pdf->SetFillColor(232,232,232);
	$pdf->Cell(45,12,'General:',1,0,'C',1);
	$pdf->Cell(705,12,'Descripcion:',1,1,'C',1);

	$pdf->SetFont('Arial','',8);//
	$pdf->SetFillColor(255,255,255);
	$pdf->Cell(45,12,utf8_decode($row['ant_personalgeneral']),1,0,'C');
	$pdf->MultiCell(705,12,utf8_decode($row['desc_personalgeneral']),1,1,'C');

	$pdf->Ln(1);

	$pdf->SetFont('Arial','B',9);//
	$pdf->SetFillColor(232,232,232);
	$pdf->Cell(750,12,'Antecedentes Familiares:',1,1,'C',1);

	$pdf->SetFont('Arial','',8);//
	$pdf->SetFillColor(232,232,232);
	$pdf->Cell(45,12,'Quirurgico:',1,0,'C',1);
	$pdf->Cell(705,12,'Descripcion:',1,1,'C',1);

	$pdf->SetFont('Arial','',7);//
	$pdf->SetFillColor(255,255,255);
	$pdf->Cell(45,12,utf8_decode($row['ant_familiarquirurgico']),1,0,'C');
	$pdf->MultiCell(705,12,utf8_decode($row['desc_familiarquirurgico']),1,1,'C');

	$pdf->SetFont('Arial','',8);//
	$pdf->SetFillColor(232,232,232);
	$pdf->Cell(45,12,'Quirurgico:',1,0,'C',1);
	$pdf->Cell(705,12,'Descripcion:',1,1,'C',1);

	$pdf->SetFont('Arial','',7);//
	$pdf->SetFillColor(255,255,255);
	$pdf->Cell(45,12,utf8_decode($row['ant_familiargeneral']),1,0,'C');
	$pdf->MultiCell(705,12,utf8_decode($row['desc_familiargeneral']),1,1,'C');

	$pdf->Ln(1);

	$pdf->SetFont('Arial','B',9);//
	$pdf->SetFillColor(232,232,232);
	$pdf->Cell(750,12,'Antecedentes de Audiometria Anterior:',1,1,'C',1);

	$pdf->SetFont('Arial','',7);//
	$pdf->SetFillColor(255,255,255);
	$pdf->MultiCell(750,12,utf8_decode($row['ant_audiometriaanterior']),1,1,'C');
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
	$pdf->Cell(42,12,utf8_decode($row['otoscopia_od']),1,0,'C');
	$pdf->MultiCell(708,12,utf8_decode($row['hallazgo_od']),1,1,'C');

	$pdf->SetFont('Arial','',8);//
	$pdf->SetFillColor(232,232,232);
	$pdf->Cell(42,12,'OI Pasa:',1,0,'C',1);
	$pdf->Cell(708,12,'Hallazgos:',1,1,'C',1);

	$pdf->SetFont('Arial','',7);//
	$pdf->SetFillColor(255,255,255);
	$pdf->Cell(42,12,utf8_decode($row['otoscopia_oi']),1,0,'C');
	$pdf->MultiCell(708,12,utf8_decode($row['hallazgo_oi']),1,1,'C');
	$pdf->Ln(1);

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

	$pdf->Cell(40,12,utf8_decode($row['250']),1,0,'C');
	$pdf->Cell(40,12,utf8_decode($row['500']),1,0,'C');
	$pdf->Cell(40,12,utf8_decode($row['1000']),1,0,'C');
	$pdf->Cell(40,12,utf8_decode($row['2000']),1,0,'C');
	$pdf->Cell(40,12,utf8_decode($row['4000']),1,0,'C');
	$pdf->Cell(40,12,utf8_decode($row['8000']),1,0,'C');
	$pdf->Cell(135,12,utf8_decode($row['promedio_od']),1,0,'C');

	$pdf->Cell(40,12,utf8_decode($row['250_izq']),1,0,'C');
	$pdf->Cell(40,12,utf8_decode($row['500_izq']),1,0,'C');
	$pdf->Cell(40,12,utf8_decode($row['1000_izq']),1,0,'C');
	$pdf->Cell(40,12,utf8_decode($row['2000_izq']),1,0,'C');
	$pdf->Cell(40,12,utf8_decode($row['4000_izq']),1,0,'C');
	$pdf->Cell(40,12,utf8_decode($row['8000_izq']),1,0,'C');
	$pdf->Cell(135,12,utf8_decode($row['promedio_oi']),1,1,'C');
	$pdf->Ln(1);

	$pdf->SetFont('Arial','B',9);//
	$pdf->SetFillColor(232,232,232);
	$pdf->Cell(750,12,'OBSERVACIONES:',1,1,'C',1);

	$pdf->SetFont('Arial','',8);//
	$pdf->SetFillColor(255,255,255);
	$pdf->MultiCell(750,12,utf8_decode($row['observaciones']),1,1,'C');
	$pdf->Ln(1);

	$pdf->SetFont('Arial','B',9);//
	$pdf->SetFillColor(232,232,232);
	$pdf->Cell(750,12,'EVALUACIONES DIAGNOSTICA:',1,1,'C',1);

	$pdf->SetFont('Arial','',8);//
	$pdf->SetFillColor(255,255,255);
	$pdf->MultiCell(750,12,utf8_decode($row['evaluaciondiagnostica']),1,1,'C');
	$pdf->Ln(1);


	$pdf->SetFont('Arial','B',9);//
	$pdf->SetFillColor(232,232,232);
	$pdf->Cell(250,12,'RETAMIZAJE:',1,0,'C',1);
	$pdf->Cell(250,12,'INTERCONSULTA - OTORRINOLARINGOLOGIA:',1,0,'C',1);
	$pdf->Cell(250,12,utf8_decode('CONTROL 1 AÑO:'),1,1,'C',1);

	$pdf->SetFont('Arial','B',8);//
	$pdf->Cell(250,12,utf8_decode($row['retamizaje']),1,0,'C');
	$pdf->Cell(250,12,utf8_decode($row['interconsulta']),1,0,'C');
	$pdf->Cell(250,12,utf8_decode($row['controlanual']),1,1,'C');


	$pdf->Ln(300);

	$pdf->SetFont('Arial','B',9);//
	$pdf->Cell(200,12, 'Nombre, Firma y LSO',0,0,'C');

	$pdf->Cell(300,12, '',0,0,'C');

	$pdf->Cell(200,12, 'Nombre o Firma del Trabajador',0,1,'C');
	$pdf->Ln();

	$pdf->SetFillColor(255,255,255);	
	$pdf->MultiCell(750,9, utf8_decode('La presente certificación se expide con base en la información manifestada por el trabajador, por el resultado del examen de Audiometría, si aplican, dicho certificado tiene carácter confidencial, según la normatividad vigente.'),0,1,'J');

	}
	$modo="I"; 
    $nombre ="Examen_Audiometria_".$fechaexamen.'_'.trim($documento).'_'.$nombres.".pdf"; 
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
