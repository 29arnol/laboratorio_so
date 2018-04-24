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
$objPHPExcel = $objReader->load("archivos/ReporteRuido.xlsx");

// Indicamos que se pare en la hoja uno del libro
$objPHPExcel->setActiveSheetIndex(0); 

//////////////////////////////////////////////////////////---------AREAS----------////////////////////////////////////////////////////////////////////



$id = $_GET['id_ruido'];
$id_empresa = $_GET['empresa'];//adddddddddd


$sql = "SELECT * FROM higiene_empresa 
JOIN higiene_medicion_ruido ON id_ruido = ".$id." 
WHERE id = '$id_empresa' ";
$result = mysqli_query($conexion,$sql);

$cont = 13;
while($row = mysqli_fetch_array($result)){
	
/////////////////////////////////////////////////////---------IMPRESION DE VARIABLES----------///////////////////////////////////////////////////////////
//$objPHPExcel->getActiveSheet()->setCellValue('A11', utf8_encode($row['fecha_medicion']));

$objPHPExcel->getActiveSheet()->setCellValue('A'.$cont, utf8_encode($row['numero_nit']));
$objPHPExcel->getActiveSheet()->setCellValue('B'.$cont, utf8_encode($row['nombre_empresa']));
$objPHPExcel->getActiveSheet()->setCellValue('C'.$cont, utf8_encode($row['direccion']));	
$objPHPExcel->getActiveSheet()->setCellValue('D'.$cont, utf8_encode($row['ciudad']));
$objPHPExcel->getActiveSheet()->setCellValue('E'.$cont, utf8_encode($row['telefono']));
$objPHPExcel->getActiveSheet()->setCellValue('F'.$cont, utf8_encode($row['actividad_economica']));

$objPHPExcel->getActiveSheet()->setCellValue('G'.$cont, utf8_encode($row['fecha_medicion']));
$objPHPExcel->getActiveSheet()->setCellValue('H'.$cont, utf8_encode($row['area_medicion']));
$objPHPExcel->getActiveSheet()->setCellValue('I'.$cont, utf8_encode($row['ubicacion']));

$objPHPExcel->getActiveSheet()->setCellValue('J'.$cont, utf8_encode($row['trabajadores_directos']));
$objPHPExcel->getActiveSheet()->setCellValue('K'.$cont, utf8_encode($row['trabajadores_indirectos']));
$objPHPExcel->getActiveSheet()->setCellValue('L'.$cont, utf8_encode($row['trabajadores_total']));
$objPHPExcel->getActiveSheet()->setCellValue('M'.$cont, utf8_encode($row['dias_laborales']));
$objPHPExcel->getActiveSheet()->setCellValue('N'.$cont, utf8_encode($row['horas_laborales']));
$objPHPExcel->getActiveSheet()->setCellValue('O'.$cont, utf8_encode($row['horas_exposicion']));
$objPHPExcel->getActiveSheet()->setCellValue('P'.$cont, utf8_encode($row['ruido_principal']));
$objPHPExcel->getActiveSheet()->setCellValue('Q'.$cont, utf8_encode($row['ruido_secundario']));
$objPHPExcel->getActiveSheet()->setCellValue('R'.$cont, utf8_encode($row['ruido_fuente_o_area']));
$objPHPExcel->getActiveSheet()->setCellValue('S'.$cont, utf8_encode($row['ruido_descripcion']));
$objPHPExcel->getActiveSheet()->setCellValue('T'.$cont, utf8_encode($row['tipo_ruido']));
$objPHPExcel->getActiveSheet()->setCellValue('U'.$cont, utf8_encode($row['proteccion_personal_tipo']));
$objPHPExcel->getActiveSheet()->setCellValue('V'.$cont, utf8_encode($row['proteccion_personal_marca']));
$objPHPExcel->getActiveSheet()->setCellValue('W'.$cont, utf8_encode($row['proteccion_personal_referencia']));
$objPHPExcel->getActiveSheet()->setCellValue('X'.$cont, utf8_encode($row['proteccion_personal_nivel_reduccion_ruido']));
$objPHPExcel->getActiveSheet()->setCellValue('Y'.$cont, utf8_encode($row['proteccion_personal_uso']));
$objPHPExcel->getActiveSheet()->setCellValue('Z'.$cont, utf8_encode($row['proteccion_personal_descripcion_tarea']));
$objPHPExcel->getActiveSheet()->setCellValue('AA'.$cont, utf8_encode($row['fast_db_maximo']));
$objPHPExcel->getActiveSheet()->setCellValue('AB'.$cont, utf8_encode($row['fast_db_minimo']));
$objPHPExcel->getActiveSheet()->setCellValue('AC'.$cont, utf8_encode($row['fast_db_promedio']));
$objPHPExcel->getActiveSheet()->setCellValue('AD'.$cont, utf8_encode($row['slow_db_maximo']));
$objPHPExcel->getActiveSheet()->setCellValue('AE'.$cont, utf8_encode($row['slow_db_minimo']));
$objPHPExcel->getActiveSheet()->setCellValue('AF'.$cont, utf8_encode($row['slow_db_promedio']));
$objPHPExcel->getActiveSheet()->setCellValue('AG'.$cont, utf8_encode($row['nota']));

$cont++;
}

////////// FIN DATOS DE LA BASE DE DATOS ///////////////////
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="Reporte Evaluacion de Ruido.xlsx"');
header('Cache-Control: max-age=0');

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$objWriter->save('php://output');
?>