<?php
$ruta_destino =   "fotografias/";
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
$objPHPExcel = $objReader->load("archivos/AptitudLaboral.xlsx");

// Indicamos que se pare en la hoja uno del libro
$objPHPExcel->setActiveSheetIndex(0); 



//////////////////////////////////////////////////////////---------AREAS----------////////////////////////////////////////////////////////////////////

        $historia = base64_decode($_REQUEST['paciente']);
    //$fecharegistro = $_GET['fecha_registro'];

    $sql = "SELECT * FROM datos_basicos AS db
    JOIN datos_complementarios AS dc ON db.fk_d_complementario = dc.id
    JOIN datos_basicos_tipo_documento AS dbtd ON dbtd.idtd = dc.fk_tipo_documento
    JOIN medico_examen_fisico AS mef ON  mef.paciente_medico =  db.id_historia

    JOIN medico_paraclinicos AS mep ON mef.id = mep.id_examen_fisico
    JOIN medico_remision AS mer ON mep.id = mer.id_paraclinico
    JOIN medico_concepto_aptitud_laboral AS mcal ON mer.id = mcal.id_remision
    JOIN medico_recomendaciones_y_restricciones AS mrr ON mcal.id = mrr.id_aptitud_laboral
    JOIN signos_vitales_enf AS sve
    JOIN enfermeria_riesgos_suministrados AS ers on sve.id = ers.id_signos_vitales

     WHERE db.id_historia = '$historia'";
	$result = mysqli_query($conexion,$sql);



$cont = 13;
while($row = mysqli_fetch_array($result)){
	
/////////////////////////////////////////////////////---------IMPRESION DE VARIABLES----------///////////////////////////////////////////////////////////
 /*$objDrawing = new PHPExcel_Worksheet_Drawing(); $objDrawing->setName('Sima'); $objDrawing->setDescription('Logo'); $objDrawing->setPath('../img/logo.jpg'); $objDrawing->setOffsetX(300); $objDrawing->setCoordinates('A1'); $objDrawing->setHeight(80); */

$gdImage = imagecreatefrompng($ruta_destino.$historia.'.png');
$objDrawing = new PHPExcel_Worksheet_MemoryDrawing();
$objDrawing->setName('Sample image');$objDrawing->setDescription('Sample image');
$objDrawing->setImageResource($gdImage);
$objDrawing->setRenderingFunction(PHPExcel_Worksheet_MemoryDrawing::RENDERING_PNG);
$objDrawing->setMimeType(PHPExcel_Worksheet_MemoryDrawing::MIMETYPE_DEFAULT);
$objDrawing->setHeight(0.84);
$objDrawing->setwidth(186);
 $objDrawing->setOffsetX(30);
$objDrawing->setCoordinates('G2');
$objDrawing->setWorksheet($objPHPExcel->getActiveSheet());

///.-----    
$objPHPExcel->getActiveSheet()->setCellValue('B12', utf8_encode($row['nombre_empresa']));
$objPHPExcel->getActiveSheet()->setCellValue('C12', utf8_encode($row['ciudad']));
$objPHPExcel->getActiveSheet()->setCellValue('D12', utf8_encode($row['actividad_economica']));
$objPHPExcel->getActiveSheet()->setCellValue('G12', utf8_encode($row['fecha']));

$objPHPExcel->getActiveSheet()->setCellValue('B15', utf8_encode($row['nombres_apellidos']));
$objPHPExcel->getActiveSheet()->setCellValue('C15', utf8_encode($row['cargo_a_desempenar']));
$objPHPExcel->getActiveSheet()->setCellValue('E15', utf8_encode($row['numero_documento']));
$objPHPExcel->getActiveSheet()->setCellValue('F15', utf8_encode($row['edad']));
$objPHPExcel->getActiveSheet()->setCellValue('G15', utf8_encode($row['genero']));

$objPHPExcel->getActiveSheet()->setCellValue('C17', utf8_encode($row['motivo_evaluacion']));

$objPHPExcel->getActiveSheet()->setCellValue('B20', utf8_encode($row['enfasis_osteomuscular']));
$objPHPExcel->getActiveSheet()->setCellValue('C20', utf8_encode($row['enfasis_cardiovascular']));
$objPHPExcel->getActiveSheet()->setCellValue('D20', utf8_encode($row['enfasis_pulmonar']));
$objPHPExcel->getActiveSheet()->setCellValue('E20', utf8_encode($row['enfasis_manipulacion_alimentos']));
$objPHPExcel->getActiveSheet()->setCellValue('F20', utf8_encode($row['enfasis_otros']));

$objPHPExcel->getActiveSheet()->setCellValue('C22', utf8_encode($row['colesterol']));
$objPHPExcel->getActiveSheet()->setCellValue('E22', utf8_encode($row['glicemia']));
$objPHPExcel->getActiveSheet()->setCellValue('G22', utf8_encode($row['trigliceridos']));
$objPHPExcel->getActiveSheet()->setCellValue('G26', utf8_encode($row['grupo_rh']));
$objPHPExcel->getActiveSheet()->setCellValue('E23', utf8_encode($row['frotis_de_una']));
$objPHPExcel->getActiveSheet()->setCellValue('G23', utf8_encode($row['hemograma']));
$objPHPExcel->getActiveSheet()->setCellValue('C24', utf8_encode($row['columna_paraclinico']));
$objPHPExcel->getActiveSheet()->setCellValue('E24', utf8_encode($row['rayos_x']));
$objPHPExcel->getActiveSheet()->setCellValue('G24', utf8_encode($row['abdomen_paraclinico']));
$objPHPExcel->getActiveSheet()->setCellValue('C25', utf8_encode($row['torax_paraclinico']));
$objPHPExcel->getActiveSheet()->setCellValue('C25', utf8_encode($row['miembros_superiores_paraclinico']));
$objPHPExcel->getActiveSheet()->setCellValue('C26', utf8_encode($row['miembros_inferiores_paraclinico']));
$objPHPExcel->getActiveSheet()->setCellValue('E25', utf8_encode($row['coprologico']));
$objPHPExcel->getActiveSheet()->setCellValue('E26', utf8_encode($row['frotis_faringeo']));
$objPHPExcel->getActiveSheet()->setCellValue('C23', utf8_encode($row['electrocardiograma']));
$objPHPExcel->getActiveSheet()->setCellValue('C27', utf8_encode($row['ex_tamizaje_visual']));
$objPHPExcel->getActiveSheet()->setCellValue('E27', utf8_encode($row['ex_audiometria']));
$objPHPExcel->getActiveSheet()->setCellValue('G27', utf8_encode($row['ex_visiometria']));
$objPHPExcel->getActiveSheet()->setCellValue('C28', utf8_encode($row['ex_psicologico']));
$objPHPExcel->getActiveSheet()->setCellValue('E28', utf8_encode($row['ex_espirometria']));
$objPHPExcel->getActiveSheet()->setCellValue('G28', utf8_encode($row['ex_optometria']));
$objPHPExcel->getActiveSheet()->setCellValue('C29', utf8_encode($row['ex_otros']));

$objPHPExcel->getActiveSheet()->setCellValue('G31', utf8_encode($row['riesgos_suministrados']));
$objPHPExcel->getActiveSheet()->setCellValue('C32', utf8_encode($row['suministrado_fisico']));
$objPHPExcel->getActiveSheet()->setCellValue('E32', utf8_encode($row['suministrado_mecanico']));
$objPHPExcel->getActiveSheet()->setCellValue('G32', utf8_encode($row['suministrado_quimico']));
$objPHPExcel->getActiveSheet()->setCellValue('C33', utf8_encode($row['suministrado_psicosocial']));
$objPHPExcel->getActiveSheet()->setCellValue('E33', utf8_encode($row['suministrado_biologico']));
$objPHPExcel->getActiveSheet()->setCellValue('G33', utf8_encode($row['suministrado_electrico']));
$objPHPExcel->getActiveSheet()->setCellValue('C34', utf8_encode($row['suministrado_ergonomico']));
$objPHPExcel->getActiveSheet()->setCellValue('E34', utf8_encode($row['suministrado_otro']));


$objPHPExcel->getActiveSheet()->setCellValue('G36', utf8_encode($row['ef_no_defectos']));
$objPHPExcel->getActiveSheet()->setCellValue('G37', utf8_encode($row['ef_disminuye_capacidad']));
$objPHPExcel->getActiveSheet()->setCellValue('G38', utf8_encode($row['ef_condiciones_agravarse']));
$objPHPExcel->getActiveSheet()->setCellValue('G39', utf8_encode($row['ef_condiciones_atendidas_por_eps']));
//G40 "--" ANtes de ingresar

//remision
$objPHPExcel->getActiveSheet()->setCellValue('B42', utf8_encode($row['remision']));
//especialidad 
$objPHPExcel->getActiveSheet()->setCellValue('E42', utf8_encode($row['arl']));
$objPHPExcel->getActiveSheet()->setCellValue('G42', utf8_encode($row['eps']));

$objPHPExcel->getActiveSheet()->setCellValue('C44', utf8_encode($row['reco_trabajador']));
$objPHPExcel->getActiveSheet()->setCellValue('C45', utf8_encode($row['reco_empleador']));

$objPHPExcel->getActiveSheet()->setCellValue('C47', utf8_encode($row['reco_trabajador']));
$objPHPExcel->getActiveSheet()->setCellValue('C48', utf8_encode($row['reco_empleador']));

$objPHPExcel->getActiveSheet()->setCellValue('D50', utf8_encode($row['apto']));
$objPHPExcel->getActiveSheet()->setCellValue('D51', utf8_encode($row['aplazado']));
$objPHPExcel->getActiveSheet()->setCellValue('D52', utf8_encode($row['apto_trabajo_altura']));
$objPHPExcel->getActiveSheet()->setCellValue('D53', utf8_encode($row['apto_trabajo_nivel']));





$cont++;
}
//include('reporte.php');
////////// FIN DATOS DE LA BASE DE DATOS ///////////////////
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="Reporte Encuesta.xlsx"');
header('Cache-Control: max-age=0');

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$objWriter->save('php://output');

// Write PDF
//$objWriter = \PHPExcel_IOFactory::createWriter($objPHPExcel, 'PDF');
//$objWriter->save('testing.pdf');
?>