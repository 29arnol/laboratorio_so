<?php
	include ('psi_modelpdf.php');
	include ('includes/conexion.php');

	$ruta_destino =   "fotografias/";
	$historia = base64_decode($_REQUEST['paciente']);

	$query = "SELECT * FROM datos_basicos AS db
	JOIN datos_complementarios AS dc ON db.fk_d_complementario = dc.id
	JOIN datos_basicos_tipo_documento AS dbtd ON dbtd.idtd = dc.fk_tipo_documento
	JOIN psicologia_examen_estado_mental AS peem ON peem.paciente_psicologia = db.id_historia
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

	$pdf->Cell(622,12,'                                              DATOS DE LA EMPRESA',1,0,'C',1);

	$pdf->Cell(128,12,'Foto del trabajador',1,1,'C',1);
	//$pdf->Cell(1,1,'.',1,1,'C',1);

	$pdf->SetFont('Arial','',9);//
	$pdf->Cell(150,12,'Nombre Empresa',1,0,'C',1);
	$pdf->Cell(130,12,'Ciudad',1,0,'C',1);
	$pdf->Cell(152,12,'Actividad Economica',1,0,'C',1);
	$pdf->Cell(190,12,utf8_decode('Cargo a desempeñar'),1,0,'C',1);
	$pdf->Cell(128,99, $pdf->Image($ruta_destino."".$historia.'.png', 654,81,121),1,0,'C');
	$pdf->Cell(1,12,utf8_decode(''),1,1,'C');

	$pdf->SetFont('Arial','B',7);//
	$pdf->Cell(150,12,utf8_decode($row['nombre_empresa']),1,0,'C');
	$pdf->Cell(130,12,utf8_decode($row['ciudad']),1,0,'C');
	$pdf->Cell(152,12,utf8_decode($row['actividad_economica']),1,0,'C');
	$pdf->Cell(190,12,utf8_decode($row['cargo_a_desempenar']),1,1,'C');

	$pdf->Ln(1);

	//$pdf->Ln(2);
	$pdf->SetFont('Arial','B',9);//
	$pdf->Cell(622,12,'                                               DATOS DEL TRABAJADOR',1,1,'C',1);

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
//
	//$pdf->Ln(2);

	$pdf->SetFont('Arial','B',9);//
	$pdf->Cell(622,12,'                                             TIPO DE EXAMEN MEDICO - OCUPACIONAL:',1,1,'C',1);

	$pdf->SetFont('Arial','',9);//
	$pdf->Cell(622,26,utf8_decode($row['motivo_evaluacion']),1,1,'C');
	//$pdf->Ln(2);

	$pdf->SetFont('Arial','B',9);//
	$pdf->Cell(750,12,'EXAMEN PSICOLOGICO',1,1,'C',1);
	$pdf->Ln(1);

	$pdf->SetFont('Arial','B',8);//
	//$pdf->SetFillColor(232,232,232);
	$pdf->Cell(750,12,'ORIENTACION ( '.utf8_decode($row['orientacion']).' )',1,1,'C',1);
	//$pdf->Cell(62,12,,1,0,'C');
	//$pdf->Cell(750,12,'HALLAZGOS',1,1,'C',1);
	$pdf->SetFillColor(255,255,255);
	$pdf->MultiCell(750,12,utf8_decode($row['orientacion_hallazgo']),1,1,'C');
	$pdf->Ln(1);

	$pdf->SetFillColor(232,232,232);
	$pdf->Cell(750,12,'ATENCION - CONCENTRACION ( '.utf8_decode($row['atencion_concentracion']).' )',1,1,'C',1);
	//$pdf->Cell(62,12,,1,0,'C');
	//$pdf->Cell(750,12,'HALLAZGOS',1,1,'C',1);
	$pdf->SetFillColor(255,255,255);
	$pdf->MultiCell(750,12,utf8_decode($row['atencion_concentracion_hallazgo']),1,1,'C');
	$pdf->Ln(1);

	$pdf->SetFillColor(232,232,232);
	$pdf->Cell(750,12,'SENSOPERCEPCION ( '.utf8_decode($row['sensopercepcion']).' )',1,1,'C',1);
	//$pdf->Cell(62,12,,1,0,'C');
	//$pdf->Cell(750,12,'HALLAZGOS',1,1,'C',1);
	$pdf->SetFillColor(255,255,255);
	$pdf->MultiCell(750,12,utf8_decode($row['sensopercepcion_hallazgo']),1,1,'C');
	$pdf->Ln(1);

	$pdf->SetFillColor(232,232,232);
	$pdf->Cell(750,12,'MEMORIA ( '.utf8_decode($row['memoria']).' )',1,1,'C',1);
	//$pdf->Cell(62,12,,1,0,'C');
	//$pdf->Cell(750,12,'HALLAZGOS',1,1,'C',1);
	$pdf->SetFillColor(255,255,255);
	$pdf->MultiCell(750,12,utf8_decode($row['memoria_hallazgo']),1,1,'C');
	$pdf->Ln(1);

	$pdf->SetFillColor(232,232,232);
	$pdf->Cell(750,12,'PENSAMIENTO ( '.utf8_decode($row['pensamiento']).' )',1,1,'C',1);
	//$pdf->Cell(62,12,,1,0,'C');
	//$pdf->Cell(750,12,'HALLAZGOS',1,1,'C',1);
	$pdf->SetFillColor(255,255,255);
	$pdf->MultiCell(750,12,utf8_decode($row['pensamiento_hallazgo']),1,1,'C');
	$pdf->Ln(1);

	$pdf->SetFillColor(232,232,232);
	$pdf->Cell(750,12,'LENGUAJE ( '.utf8_decode($row['lenguaje']).' )',1,1,'C',1);
	//$pdf->Cell(62,12,,1,0,'C');
	//$pdf->Cell(750,12,'HALLAZGOS',1,1,'C',1);
	$pdf->SetFillColor(255,255,255);
	$pdf->MultiCell(750,12,utf8_decode($row['lenguaje_hallazgo']),1,1,'C');
	$pdf->Ln(1);

	$pdf->SetFillColor(232,232,232);
	$pdf->Cell(750,12,'CONCEPTO',1,1,'C',1);
	$pdf->SetFillColor(255,255,255);
	$pdf->MultiCell(750,12,utf8_decode($row['concepto']),1,1,'C');




	$pdf->Ln(400);

	$pdf->SetFont('Arial','B',9);//
	$pdf->Cell(200,12, 'Nombre, Firma y LSO',0,0,'C');

	$pdf->Cell(300,12, '',0,0,'C');

	$pdf->Cell(200,12, 'Nombre o Firma del Trabajador',0,1,'C');
	$pdf->Ln();

	$pdf->SetFillColor(255,255,255);	
	$pdf->MultiCell(750,9, utf8_decode('La presente certificación se expide con base en la información manifestada por el trabajador, por la empresa, por el resultado del examen Psicologico, dicho certificado tiene carácter confidencial, según la normatividad vigente.'),0,1,'J');

	}

	$modo="I"; 
    $nombre ="Examen_Psicologico_SST_".$fechaexamen.'_'.trim($documento).'_'.$nombres.".pdf"; 
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
