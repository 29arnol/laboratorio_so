<?php 
require_once 'medico_reporte_CAL.php';
//require_once 'alumno.model.php';

// Logica
$model = new PHPExcel();

$tipo = isset($_REQUEST['t']) ? $_REQUEST['t'] : 'excel';
$extension = $tipo == 'excel' ? '.xls' : '.doc';

header("Content-type: application/vnd.ms-$tipo"); /* Indica que tipo de archivo es que va a descargar */
header("Content-Disposition: attachment;filename=mi_archivo.pdf"); /* El nombre del archivo y la extensiòn */
header("Pragma: no-cache");
header("Expires: 0");

 ?>