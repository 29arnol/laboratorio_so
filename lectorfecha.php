<?php 
	function cambioFecha($fecha){ //$fecha es de este formato --> ej: 20081229 
		$tieneCeroDiaMes = substr($fecha,6,1); 
		if($tieneCeroDiaMes == 0){ 
		    $diaMes = substr($fecha,7,1); 
		}else{ 
		    $diaMes = substr($fecha,6,2); 
		} 
		$change = date("w",strtotime($fecha)); 
		switch ($change){
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