<?php
require("includes/conexion.php");

ini_set( 'max_execution_time' ,  0 );
 
set_include_path(get_include_path() . PATH_SEPARATOR . '../Classes/');
// PHPExcel
require_once 'lib/PHPExcel/PHPExcel.php';
// PHPExcel_IOFactory
include 'lib/PHPExcel/PHPExcel/IOFactory.php';
$cacheMethod = PHPExcel_CachedObjectStorageFactory:: cache_to_phpTemp;
$cacheSettings = array( 'memoryCacheSize'  => '15MB');
PHPExcel_Settings::setCacheStorageMethod($cacheMethod, $cacheSettings);
// Creamos un objeto PHPExcel
$objPHPExcel = new PHPExcel();
// Leemos un archivo Excel 2007
$objReader = PHPExcel_IOFactory::createReader('Excel2007');
$objPHPExcel = $objReader->load("archivos/ReporteIluminacion.xlsx");

// Indicamos que se pare en la hoja uno del libro
$objPHPExcel->setActiveSheetIndex(0); 

//////////////////////////////////////////////////////////---------AREAS----------////////////////////////////////////////////////////////////////////

$id = $_GET['id_iluminacion'];
$id_empresa = $_GET['id_empresa'];

$sql = "SELECT * FROM higiene_empresa 
JOIN higiene_medicion_iluminacion ON id_iluminacion = ".$id." 
WHERE id = '$id_empresa' ";
$result = mysqli_query($conexion,$sql);

$cont = 12;
while($row = mysqli_fetch_array($result)){
	
/////////////////////////////////////////////////////---------IMPRESION DE VARIABLES----------///////////////////////////////////////////////////////////
//$objPHPExcel->getActiveSheet()->setCellValue('A11', utf8_encode($row['fecha_medicion_iluminacion']));

$objPHPExcel->getActiveSheet()->setCellValue('A'.$cont, utf8_encode($row['numero_nit']));
$objPHPExcel->getActiveSheet()->setCellValue('B'.$cont, utf8_encode($row['nombre_empresa']));
$objPHPExcel->getActiveSheet()->setCellValue('C'.$cont, utf8_encode($row['direccion']));	
$objPHPExcel->getActiveSheet()->setCellValue('D'.$cont, utf8_encode($row['ciudad']));
$objPHPExcel->getActiveSheet()->setCellValue('E'.$cont, utf8_encode($row['telefono']));
$objPHPExcel->getActiveSheet()->setCellValue('F'.$cont, utf8_encode($row['actividad_economica']));	

$objPHPExcel->getActiveSheet()->setCellValue('G'.$cont, utf8_encode($row['fecha_medicion_iluminacion']));
$objPHPExcel->getActiveSheet()->setCellValue('H'.$cont, utf8_encode($row['area_medicion_iluminacion']));
$objPHPExcel->getActiveSheet()->setCellValue('I'.$cont, utf8_encode($row['ubicacion_iluminacion']));

$objPHPExcel->getActiveSheet()->setCellValue('J'.$cont, utf8_encode($row['lugar_principal']));
$objPHPExcel->getActiveSheet()->setCellValue('K'.$cont, utf8_encode($row['area_procesos']));
$objPHPExcel->getActiveSheet()->setCellValue('L'.$cont, utf8_encode($row['puesto_trabajo']));	
$objPHPExcel->getActiveSheet()->setCellValue('M'.$cont, utf8_encode($row['actividad_desarrollada']));
$objPHPExcel->getActiveSheet()->setCellValue('N'.$cont, utf8_encode($row['nivel_recomendado_lux']));
$objPHPExcel->getActiveSheet()->setCellValue('O'.$cont, utf8_encode($row['trab_directos']));
$objPHPExcel->getActiveSheet()->setCellValue('P'.$cont, utf8_encode($row['trab_indirectos']));
$objPHPExcel->getActiveSheet()->setCellValue('Q'.$cont, utf8_encode($row['trab_total']));
$objPHPExcel->getActiveSheet()->setCellValue('R'.$cont, utf8_encode($row['tipo_iluminacion']));
$objPHPExcel->getActiveSheet()->setCellValue('S'.$cont, utf8_encode($row['ventanas']));
$objPHPExcel->getActiveSheet()->setCellValue('T'.$cont, utf8_encode($row['techo_color']));
$objPHPExcel->getActiveSheet()->setCellValue('U'.$cont, utf8_encode($row['techo_material']));
$objPHPExcel->getActiveSheet()->setCellValue('V'.$cont, utf8_encode($row['techo_altura']));
$objPHPExcel->getActiveSheet()->setCellValue('W'.$cont, utf8_encode($row['pared_color']));
$objPHPExcel->getActiveSheet()->setCellValue('X'.$cont, utf8_encode($row['pared_material']));
$objPHPExcel->getActiveSheet()->setCellValue('Y'.$cont, utf8_encode($row['piso_color']));
$objPHPExcel->getActiveSheet()->setCellValue('Z'.$cont, utf8_encode($row['piso_material']));
$objPHPExcel->getActiveSheet()->setCellValue('AA'.$cont, utf8_encode($row['aseo']));
$objPHPExcel->getActiveSheet()->setCellValue('AB'.$cont, utf8_encode($row['superficie_trabajo_color']));
$objPHPExcel->getActiveSheet()->setCellValue('AC'.$cont, utf8_encode($row['superficie_trabajo_material']));
$objPHPExcel->getActiveSheet()->setCellValue('AD'.$cont, utf8_encode($row['superficie_trabajo_altura']));
$objPHPExcel->getActiveSheet()->setCellValue('AE'.$cont, utf8_encode($row['iluminacion_localizada']));
$objPHPExcel->getActiveSheet()->setCellValue('AF'.$cont, utf8_encode($row['numero_luminarias']));
$objPHPExcel->getActiveSheet()->setCellValue('AG'.$cont, utf8_encode($row['marca_luminaria']));
$objPHPExcel->getActiveSheet()->setCellValue('AH'.$cont, utf8_encode($row['bombilla_tipo']));
$objPHPExcel->getActiveSheet()->setCellValue('AI'.$cont, utf8_encode($row['numero_lamparas_luminarias']));
$objPHPExcel->getActiveSheet()->setCellValue('AJ'.$cont, utf8_encode($row['bombilla_marca']));
$objPHPExcel->getActiveSheet()->setCellValue('AK'.$cont, utf8_encode($row['informacion_adicional']));
$objPHPExcel->getActiveSheet()->setCellValue('AL'.$cont, utf8_encode($row['mantenimiento']));
$objPHPExcel->getActiveSheet()->setCellValue('AM'.$cont, utf8_encode($row['nivel_encontrado_lux']));
$objPHPExcel->getActiveSheet()->setCellValue('AN'.$cont, utf8_encode($row['observaciones_generales']));

$cont++;
}

////////// FIN DATOS DE LA BASE DE DATOS ///////////////////
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="Reporte de ILuminacion.xlsx"');
header('Cache-Control: max-age=0');

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$objWriter->save('php://output');
?>