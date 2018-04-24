<?php 
include ('includes/conexion.php'); 
include ('bar/navbar_administracion.php'); 
?>


<!DOCTYPE html>
<html>
  <head>
  	<title>Laboratorio Salud Ocupacional</title>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">

   
   <style type="text/css">
    .esp{
      width: 120%;
    }

    .centrar {
      display:block;
      margin-left: auto;
      margin-right: auto;
      width: 50%;
    } 

  </style>

  </head>

  <?php 

  if (isset($_POST['Actualizar'])) {
    
    //$identificacion = $_POST['cedula_id'];
    //$fecha = $_POST['fecha'];
    $historia = $_POST['historia'];


    $cabeza = $_POST['cabeza'];
    $amigdalas = $_POST['amigdalas'];
    $abdomen = $_POST['abdomen'];
    $piel_anexos = $_POST['piel_anexos'];
    $ojos = $_POST['ojos'];
    $cuello = $_POST['cuello'];
    $genitales = $_POST['genitales'];
    $neurologico = $_POST['neurologico'];
    $oidos = $_POST['oidos'];
    $torax = $_POST['torax'];
    $miembros_superiores = $_POST['miembros_superiores'];
    $muscular = $_POST['muscular'];
    $nariz = $_POST['nariz'];
    $pulmones = $_POST['pulmones'];
    $miembros_inferiores = $_POST['miembros_inferiores'];
    $vascular = $_POST['vascular'];
    $dentadura = $_POST['dentadura'];
    $corazon = $_POST['corazon'];
    $columna = $_POST['columna'];
    $oseo = $_POST['oseo'];
    $lengua = $_POST['lengua'];
    $hernias = $_POST['hernias'];
    $viceras = $_POST['viceras'];
    $otro_examen_fisico = $_POST['otro_examen_fisico'];
    $observaciones_ex_fisico = $_POST['observaciones_ex_fisico'];

    //Pruebas Funcionales
    $marcha = $_POST['marcha'];
    $miembros_superiores_funcionales = $_POST['miembros_superiores_funcionales'];
    $coordinacion = $_POST['coordinacion'];
    $columna_funcional = $_POST['columna_funcional'];
    $miembros_inferiores_funcionales = $_POST['miembros_inferiores_funcionales'];
    $reflejos = $_POST['reflejos'];
    $hallazgos_funcionales = $_POST['hallazgos_funcionales'];


    $phalen = $_POST['phalen'];
    $finkelstein = $_POST['finkelstein'];
    $braggard = $_POST['braggard'];
    $shober = $_POST['shober'];
    $babinski_weil = $_POST['babinski_weil'];
    $romber_sensibilidad = $_POST['romber_sensibilidad'];
    $romber = $_POST['romber'];
    $tinel = $_POST['tinel'];
    $lasegue = $_POST['lasegue'];
    $adams = $_POST['adams'];
    $unterberger = $_POST['unterberger'];
    $nariz_dedo = $_POST['nariz_dedo'];

    $m_superior_tono = $_POST['m_superior_tono'];
    $m_superior_fuerza = $_POST['m_superior_fuerza'];
    $m_superior_sensibilidad = $_POST['m_superior_sensibilidad'];
    $m_superior_arcosmovimiento = $_POST['m_superior_arcosmovimiento'];
    $m_inferior_tono = $_POST['m_inferior_tono'];
    $m_inferior_fuerza = $_POST['m_inferior_fuerza'];
    $m_inferior_sensibilidad = $_POST['m_inferior_sensibilidad'];
    $m_inferior_arcosmovimiento = $_POST['m_inferior_arcosmovimiento'];


    $examen_fisico = "UPDATE `medico_examen_fisico` SET `cabeza`='$cabeza',`ojos`='$ojos',`oidos`='$oidos',`nariz`='$nariz',`dentadura`='$dentadura',`lengua`='$lengua',`amigdalas`='$amigdalas',`cuello`='$cuello',`torax`='$torax',`pulmones`='$pulmones',`corazon`='$corazon',`hernia`='$hernias',`abdomen`='$abdomen',`genitales`='$genitales',`miembros_superiores`='$miembros_superiores',`miembros_inferiores`='$miembros_inferiores',`columna`='$columna',`viceras`='$viceras',`piel_anexos`='$piel_anexos',`neurologico`='$neurologico',`muscular`='$muscular',`vascular`='$vascular',`oseo`='$oseo',`otro_examen_fisico`='$otro_examen_fisico',`observaciones_ex_fisico`='$observaciones_ex_fisico',`phalen`='$phalen',`babinski_weil`='$babinski_weil',`lasegue`='$lasegue',`finkelstein`='$finkelstein',`romber_sensibilidad`='$romber_sensibilidad',`adams`='$adams',`braggard`='$braggard',`romber`='$romber',`unterberger`='$unterberger',`shober`='$shober',`tinel`='$tinel',`nariz_dedo`='$nariz_dedo',`miembro_superior_tono`='$m_superior_tono',`miembro_inferior_tono`='$m_inferior_tono',`miembro_superior_fuerza`='$m_superior_fuerza',`miembro_inferior_fuerza`='m_inferior_fuerza',`miembro_superior_sensibilidad`='$m_superior_sensibilidad',`miembro_inferior_sensibilidad`='$m_inferior_sensibilidad',`miembro_superior_arco_movimiento`='$m_superior_arcosmovimiento',`miembro_inferior_arco_movimiento`='$m_inferior_arcosmovimiento',`marcha`='$marcha',`miembros_superiores_funcionales`='$miembros_superiores_funcionales',`miembros_inferiores_funcionales`='$miembros_inferiores_funcionales',`coordinacion_funcionales`='$coordinacion',`columna_funcional`='$columna_funcional',`reflejos_funcionales`='$reflejos',`hallazgos_funcionales`='$hallazgos_funcionales' WHERE paciente_medico = ".$historia."";
    $query1 = mysqli_query($conexion,$examen_fisico);

    if ($query1){   
      //Obtenemos El Ultimo ID Insertado
      $ver = "SELECT * FROM medico_examen_fisico WHERE `paciente_medico` = ".$historia."";
      $queryid = mysqli_query ($conexion,$ver);
      $dataid = mysqli_fetch_array($queryid);
      $idfk_examen_medico = $dataid['id'];
    }else{
      echo "<script>alert('Error 1, Intente Nuevamente')</script>";
    }

    $colesterol = $_POST['colesterol'];
    $glicemia = $_POST['glicemia'];
    $trigliceridos = $_POST['trigliceridos'];
    $frotis_faringeo = $_POST['frotis_faringeo'];
    $frotis_una = $_POST['frotis_una'];
    $hemograma = $_POST['hemograma'];
    $coprologico = $_POST['coprologico'];
    $columna_paraclinico = $_POST['columna_paraclinico'];
    $torax_paraclinico = $_POST['torax_paraclinico'];
    $abdomen_paraclinico = $_POST['abdomen_paraclinico'];
    $paraclinico_miembros_superiores = $_POST['paraclinico_miembros_superiores'];
    $paraclinico_miembros_inferiores = $_POST['paraclinico_miembros_inferiores'];
    $electrocardiograma = $_POST['electrocardiograma'];

    $grupo_rh = $_POST['grupo_rh'];
    $tamizaje_visual = $_POST['tamizaje_visual'];
    $audiometria = $_POST['audiometria'];
    $visiometria = $_POST['visiometria'];
    $psicologico = $_POST['psicologico'];
    $espirometria = $_POST['espirometria'];
    $optometria = $_POST['optometria'];
    $otro_paraclinico = $_POST['otro_paraclinico'];

    $medico_paraclinicos = "UPDATE `medico_paraclinicos` SET `colesterol`='$colesterol',`glicemia`='$glicemia',`trigliceridos`='$trigliceridos',`frotis_faringeo`='$frotis_faringeo',`frotis_de_una`='$frotis_una',`hemograma`='$hemograma',`coprologico`='$coprologico',`columna_paraclinico`='$columna_paraclinico',`torax_paraclinico`='$torax_paraclinico',`abdomen_paraclinico`='$abdomen_paraclinico',`miembros_superiores_paraclinico`='$paraclinico_miembros_superiores',`miembros_inferiores_paraclinico`='$paraclinico_miembros_inferiores',`electrocardiograma`='$electrocardiograma',`grupo_rh`='$grupo_rh',`ex_tamizaje_visual`='$tamizaje_visual',`ex_audiometria`='$audiometria',`ex_visiometria`='$visiometria',`ex_psicologico`='$psicologico',`ex_espirometria`='$espirometria',`ex_optometria`='$optometria',`ex_otros`='$otro_paraclinico' WHERE id_examen_fisico = ".$idfk_examen_medico."";
    $query2 = mysqli_query($conexion,$medico_paraclinicos);

    if ($query2){   
      //Obtenemos El Ultimo ID Insertado
      $ver = "SELECT * FROM medico_paraclinicos ORDER BY `id` DESC limit 0,1";
      $queryid = mysqli_query ($conexion,$ver);
      $dataid = mysqli_fetch_array($queryid);
      $idfk_paraclinico = $dataid['id'];
    }else{
      echo "<script>alert('Error 2, Intente Nuevamente')</script>";
    }

    $remision = $_POST['remision'];
    $remision_desde = $_POST['remision_desde'];
    $remision_hacia = $_POST['remision_hacia'];
    $remision_motivo = $_POST['remision_motivo'];
    $remision_pendiente = $_POST['remision_pendiente'];


    $remision_medico = "UPDATE `medico_remision` SET `remision`='$remision',`desde`='$remision_desde',`hacia`='$remision_hacia',`motivo`='$remision_motivo',`remision_pendiente`='$remision_pendiente' WHERE id_paraclinico = ".$idfk_paraclinico."";
    $query3 =mysqli_query($conexion,$remision_medico);

    if ($query3){   
      //Obtenemos El Ultimo ID Insertado
      $ver = "SELECT * FROM medico_remision ORDER BY `id` DESC limit 0,1";
      $queryid = mysqli_query ($conexion,$ver);
      $dataid = mysqli_fetch_array($queryid);
      $idfk_remision = $dataid['id'];
    }else{
      echo "<script>alert('Error 3, Intente Nuevamente')</script>";
    }
    
    $trabajo_nivel = $_POST['trabajo_nivel'];
    $trabajo_altura = $_POST['trabajo_altura'];
    $trabajo_restricciones_no_interviene = $_POST['trabajo_restricciones_no_interviene'];
    $aplazado = $_POST['aplazado'];
    $nueva_valoracion = $_POST['nueva_valoracion'];
    $trabajo_limitaciones_si_interviene = $_POST['trabajo_limitaciones_si_interviene'];
    $apto = $_POST['apto'];

    $examen_diagnostico = $_POST['examen_diagnostico'];
    $observaciones_aptitud_laboral = $_POST['observaciones_aptitud_laboral'];

    $osteomuscular_enfasis = $_POST['osteomuscular_enfasis'];
    $cardiovascular_enfasis = $_POST['cardiovascular_enfasis'];
    $pulmonar_enfasis = $_POST['pulmonar_enfasis'];
    $manipulacion_alimento_enfasis = $_POST['manipulacion_alimento_enfasis'];
    $otro_enfasis = $_POST['otro_enfasis'];

    $ef_no_defectos = $_POST['ef_no_defectos'];
    $ef_disminuye_capacidad = $_POST['ef_disminuye_capacidad'];
    $ef_condiciones_agravarse = $_POST['ef_condiciones_agravarse'];
    $ef_condiciones_atendidas_eps_arl = $_POST['ef_condiciones_atendidas_eps_arl'];
    $em_atencion_eps_arl_antes = $_POST['em_atencion_eps_arl_antes'];

    $aptitud_laboral = "UPDATE `medico_concepto_aptitud_laboral` SET `apto_trabajo_nivel`='$trabajo_nivel',`apto_trabajo_altura`='$trabajo_altura',`apto_con_restricciones_no_intervienen`='$trabajo_restricciones_no_interviene',`aplazado`='$aplazado',`nueva_valoracion`='$nueva_valoracion',`apto_con_limitaciones_si_intervienen`='$trabajo_limitaciones_si_interviene',`apto`='$apto',`examen_diagnostico`='$examen_diagnostico',`observaciones_aptitud_laboral`='$observaciones_aptitud_laboral',`enfasis_osteomuscular`='$osteomuscular_enfasis',`enfasis_cardiovascular`='$cardiovascular_enfasis',`enfasis_pulmonar`='$pulmonar_enfasis',`enfasis_manipulacion_alimentos`='$manipulacion_alimento_enfasis',`enfasis_otros`='$otro_enfasis',`ef_no_defectos`='$ef_no_defectos',`ef_disminuye_capacidad`='$ef_disminuye_capacidad',`ef_condiciones_agravarse`='$ef_condiciones_agravarse',`ef_condiciones_atendidas_por_eps`='$ef_condiciones_atendidas_eps_arl', `atencion_en_eps_antesingresar` = '$em_atencion_eps_arl_antes' WHERE id_remision = ".$idfk_remision."";
    $query4 = mysqli_query($conexion,$aptitud_laboral); 

    if ($query4){   
      //Obtenemos El Ultimo ID Insertado
      $ver = "SELECT * FROM medico_concepto_aptitud_laboral WHERE id_remision = ".$idfk_remision."";
      $queryid = mysqli_query ($conexion,$ver);
      $dataid = mysqli_fetch_array($queryid);
      $idfk_aptitud_laboral = $dataid['id'];
    }else{
      echo "<script>alert('Error 4, Intente Nuevamente')</script>";
    }

    $recomendacion_trabajador = $_POST['recomendacion_trabajador'];
    $recomendacion_empleador = $_POST['recomendacion_empleador'];
    $restriccion_trabajador = $_POST['restriccion_trabajador'];
    $restriccion_empleador = $_POST['restriccion_empleador'];
    $autorizacion = $_POST['autorizacion'];

    $recomendaciones_restricciones = "UPDATE `medico_recomendaciones_y_restricciones` SET `reco_trabajador`='$recomendacion_trabajador',`reco_empleador`='$recomendacion_empleador',`rest_trabajador`='$restriccion_trabajador',`rest_empleador`='$restriccion_empleador',`autorizacion_manejo_informacion`='$autorizacion' WHERE id_aptitud_laboral = ".$idfk_aptitud_laboral."";
    $query5 = mysqli_query($conexion,$recomendaciones_restricciones);

    if($query5){   
      //Obtenemos El Ultimo ID Insertado
      $ver = "SELECT * FROM medico_recomendaciones_y_restricciones ORDER BY `id` DESC limit 0,1";
      $queryid = mysqli_query ($conexion,$ver);
      $dataid = mysqli_fetch_array($queryid);
      $idfk_recomendaciones = $dataid['id'];
    }else{
      echo "<script>alert('Error 5, Intente Nuevamente')</script>";
    }

    $pve = $_POST['pve'];
    $pve_visual = $_POST['pve_visual'];
    $pve_auditivo = $_POST['pve_auditivo'];
    $pve_cardiovascular = $_POST['pve_cardiovascular'];
    $pve_respiratorio = $_POST['pve_respiratorio'];
    $pve_piel = $_POST['pve_piel'];
    $pve_psicologico = $_POST['pve_psicologico'];
    $pve_osteomuscular = $_POST['pve_osteomuscular'];
    $pve_otro = $_POST['pve_otro'];

    $Pve = "UPDATE `medico_pve` SET `pve`='$pve', `pve_visual`='$pve_visual',`pve_auditivo`='$pve_cardiovascular',`pve_cardiovascular`='$pve_cardiovascular',`pve_respiratorio`='$pve_respiratorio',`pve_piel`='$pve_piel',`pve_psicologico`='$pve_psicologico',`pve_osteomuscular`='$pve_osteomuscular',`pve_otro`='$pve_otro' WHERE fk_recomendaciones = ".$idfk_recomendaciones."";
    $query6 = mysqli_query($conexion,$Pve);

//-----------------------------------HEREEEEEEEEE----------------------
    if ($query1 && $query2 && $query3 && $query4 && $query5 && $query6) {
      echo "<script>alert('Datos Actualizados Exitosamente')</script>";
      echo "<script>window.location = 'administracion_search.php'</script>";
    }else{
      echo "<script>alert('Error query, Intente Nuevamente')</script>";
      echo "<script>window.location = 'administracion_search.php'</script>"; 
    }
    
  }  
?>

<body>

  <br>
  <?php 
    
    $area = base64_decode($_REQUEST['area']);
    if ($area==17) {
      $id = base64_decode($_REQUEST['documento']);
      $fecha_reg = base64_decode($_REQUEST['fecha_registro']);
    }else{
      $id = base64_decode($_REQUEST['paciente']);
      $fecha_reg = $_GET['registro'];
    }

    $consult="SELECT * FROM datos_basicos AS db 
    JOIN datos_complementarios AS dc ON db.fk_d_complementario = dc.id
    JOIN datos_basicos_tipo_documento AS dbtd ON dc.fk_tipo_documento = dbtd.idtd
    JOIN medico_examen_fisico AS mef ON mef.paciente_medico = db.id_historia
    JOIN medico_paraclinicos AS mp ON mp.id_examen_fisico = mef.id
    JOIN medico_remision AS mr ON mr.id_paraclinico = mp.id
    JOIN medico_concepto_aptitud_laboral AS mcal ON mcal.id_remision = mr.id
    JOIN medico_recomendaciones_y_restricciones AS mrr ON mrr.id_aptitud_laboral = mcal.id
    JOIN medico_pve AS mpve ON mrr.id = mpve.fk_recomendaciones
    WHERE db.id_historia='$id' OR dc.numero_documento = '$id' AND db.fecha = '$fecha_reg'";
    $query = mysqli_query($conexion,$consult);

    if (mysqli_num_rows($query) > 0){
    //cuenta el numero de filas de la consulta
    while ($datos=mysqli_fetch_array($query)) {

      //datos personales
      $historia=$datos['id_historia'];
      $ruta_destino =   "fotografias/"; //ruta de las fotos de los paciente
      $numero_documento= $datos['numero_documento'];

      //EXAMEN FISICO:
      $cabeza= $datos['cabeza'];
      $ojos= $datos['ojos'];
      $oidos= $datos['oidos'];
      $nariz= $datos['nariz'];
      $dentadura= $datos['dentadura'];
      $lengua= $datos['lengua'];
      $amigdalas= $datos['amigdalas'];
      $cuello= $datos['cuello'];
      $torax= $datos['torax'];
      $pulmones= $datos['pulmones'];
      $corazon= $datos['corazon'];
      $hernia= $datos['hernia'];
      $abdomen= $datos['abdomen'];
      $genitales= $datos['genitales'];
      $miembros_superiores= $datos['miembros_superiores'];
      $miembros_inferiores= $datos['miembros_inferiores'];
      $columna= $datos['columna'];
      $viceras= $datos['viceras'];
      $piel_anexos= $datos['piel_anexos'];
      $neurologico= $datos['neurologico'];
      $muscular= $datos['muscular'];
      $vascular= $datos['vascular'];
      $oseo= $datos['oseo'];
      $otro_examen_fisico= $datos['otro_examen_fisico'];
      $observaciones_ex_fisico= $datos['observaciones_ex_fisico'];
      //PRUEBAS FUNCIONALES
      $marcha= $datos['marcha'];
      $miembros_superiores_funcionales= $datos['miembros_superiores_funcionales'];
      $miembros_inferiores_funcionales= $datos['miembros_inferiores_funcionales'];
      $coordinacion_funcionales= $datos['coordinacion_funcionales'];
      $columna_funcional= $datos['columna_funcional'];
      $reflejos_funcionales= $datos['reflejos_funcionales'];
      $hallazgos_funcionales= $datos['hallazgos_funcionales'];
      $phalen= $datos['phalen'];
      $babinski_weil= $datos['babinski_weil'];
      $lasegue= $datos['lasegue'];
      $finkelstein= $datos['finkelstein'];
      $romber_sensibilidad= $datos['romber_sensibilidad'];
      $adams= $datos['adams'];
      $braggard= $datos['braggard'];
      $romber= $datos['romber'];
      $unterberger= $datos['unterberger'];
      $shober= $datos['shober'];
      $tinel= $datos['tinel'];
      $nariz_dedo= $datos['nariz_dedo'];
      $miembro_superior_tono= $datos['miembro_superior_tono'];
      $miembro_inferior_tono= $datos['miembro_inferior_tono'];
      $miembro_inferior_fuerza= $datos['miembro_inferior_fuerza'];
      $miembro_superior_fuerza= $datos['miembro_superior_fuerza'];
      $miembro_superior_sensibilidad= $datos['miembro_superior_sensibilidad'];
      $miembro_inferior_sensibilidad= $datos['miembro_inferior_sensibilidad'];
      $miembro_superior_arco_movimiento= $datos['miembro_superior_arco_movimiento'];
      $miembro_inferior_arco_movimiento= $datos['miembro_inferior_arco_movimiento'];
      //PARACLINICOS
      $colesterol= $datos['colesterol'];
      $glicemia= $datos['glicemia'];
      $trigliceridos= $datos['trigliceridos'];
      $frotis_faringeo= $datos['frotis_faringeo'];
      $frotis_de_una= $datos['frotis_de_una'];
      $hemograma= $datos['hemograma'];
      $coprologico= $datos['coprologico'];
  
      $columna_paraclinico= $datos['columna_paraclinico'];
      $torax_paraclinico= $datos['torax_paraclinico'];
      $abdomen_paraclinico= $datos['abdomen_paraclinico'];
      $miembros_superiores_paraclinico= $datos['miembros_superiores_paraclinico'];
      $miembros_inferiores_paraclinico= $datos['miembros_inferiores_paraclinico'];
      $electrocardiograma= $datos['electrocardiograma'];
      $grupo_rh= $datos['grupo_rh'];
      $ex_tamizaje_visual= $datos['ex_tamizaje_visual'];
      $ex_audiometria= $datos['ex_audiometria'];
      $ex_visiometria= $datos['ex_visiometria'];
      $ex_psicologico= $datos['ex_psicologico'];
      $ex_espirometria= $datos['ex_espirometria'];
      $ex_optometria= $datos['ex_optometria'];
      $ex_otros= $datos['ex_otros'];

      //REMISION
      $remision= $datos['remision'];
      $desde= $datos['desde'];
      $hacia= $datos['hacia'];
      $motivo_remision= $datos['motivo'];
      $remision_pendiente= $datos['remision_pendiente'];
      $resultado_remision= $datos['resultado_remision'];
      $recomendaciones_remision= $datos['recomendaciones_remision'];
      $fecha_contraremision= $datos['fecha_contraremision'];

      //Concepto Aptitud Laboral:
      $apto_trabajo_nivel= $datos['apto_trabajo_nivel'];
      $apto_trabajo_altura= $datos['apto_trabajo_altura'];
      $apto_con_restricciones_no_intervienen= $datos['apto_con_restricciones_no_intervienen'];
      $aplazado= $datos['aplazado'];
      $nueva_valoracion= $datos['nueva_valoracion'];
      $apto_con_limitaciones_si_intervienen= $datos['apto_con_limitaciones_si_intervienen'];
      $apto= $datos['apto'];
      $examen_diagnostico= $datos['examen_diagnostico'];
      $observaciones_aptitud_laboral= $datos['observaciones_aptitud_laboral'];
      //enfasis examen
      $enf_osteomuscular= $datos['enfasis_osteomuscular'];
      $enf_cardiovascular= $datos['enfasis_cardiovascular'];
      $enf_pulmonar= $datos['enfasis_pulmonar'];
      $enf_manipulacion= $datos['enfasis_manipulacion_alimentos'];
      $enf_otros= $datos['enfasis_otros'];

      //RECOMENDACIONES Y RESTRICCIONES
      $reco_trabajador= $datos['reco_trabajador'];
      $reco_empleador= $datos['reco_empleador'];
      $rest_trabajador= $datos['rest_trabajador'];
      $rest_empleador= $datos['rest_empleador'];
      $autorizacion_manejo_informacion= $datos['autorizacion_manejo_informacion'];
      //Aptitud Ocupacional
      $ef_no_defectos = $datos['ef_no_defectos'];
      $ef_disminuye_capacidad = $datos['ef_disminuye_capacidad'];
      $ef_condiciones_agravarse = $datos['ef_condiciones_agravarse'];
      $ef_condiciones_atendidas_por_eps = $datos['ef_condiciones_atendidas_por_eps'];
      $em_atencion_eps_arl_antes = $datos['atencion_en_eps_antesingresar'];
      //PVE
      $pve = $datos['pve'];
      $pvevisual = $datos['pve_visual'];
      $pveauditivo = $datos['pve_auditivo'];
      $pvecardiovascular = $datos['pve_cardiovascular'];
      $pverespiratorio = $datos['pve_respiratorio'];
      $pvepiel = $datos['pve_piel'];
      $pvepsicologico = $datos['pve_psicologico'];
      $pveosteomuscular = $datos['pve_osteomuscular'];
      $pveotro = $datos['pve_otro'];
    //}
   $cont = "SELECT *, COUNT(motivo_evaluacion) AS Total FROM datos_basicos 
      JOIN datos_complementarios ON datos_basicos.fk_d_complementario = datos_complementarios.id
       JOIN medico_examen_fisico ON  medico_examen_fisico.paciente_medico = datos_basicos.id_historia
        WHERE datos_basicos.motivo_evaluacion = 'Ingreso' AND datos_complementarios.numero_documento=".$id." ";
      $qcont = mysqli_query($conexion,$cont);
        while ($re = mysqli_fetch_array($qcont)){
      $ingreso = $re{'Total'};      
    }
    $cont = "SELECT *, COUNT(motivo_evaluacion) AS Total FROM datos_basicos 
    JOIN datos_complementarios ON datos_basicos.fk_d_complementario = datos_complementarios.id
      JOIN medico_examen_fisico ON  medico_examen_fisico.paciente_medico = datos_basicos.id_historia
        WHERE datos_basicos.motivo_evaluacion = 'Periodico' AND datos_complementarios.numero_documento=".$id." ";
      $qcont = mysqli_query($conexion,$cont);
        while ($re = mysqli_fetch_array($qcont)){
      $periodico = $re{'Total'};     
    }
    $cont = "SELECT datos_basicos.motivo_evaluacion, COUNT(motivo_evaluacion) AS Total FROM datos_basicos
      JOIN datos_complementarios ON datos_basicos.fk_d_complementario = datos_complementarios.id
      JOIN medico_examen_fisico ON  medico_examen_fisico.paciente_medico = datos_basicos.id_historia
        WHERE datos_basicos.motivo_evaluacion = 'Retiro' AND datos_complementarios.numero_documento=".$id." ";
      $qcont = mysqli_query($conexion,$cont);
        while ($re = mysqli_fetch_array($qcont)){
      $retiro = $re{'Total'};     
    }
    $cont = "SELECT datos_basicos.motivo_evaluacion, COUNT(motivo_evaluacion) AS Total FROM datos_basicos 
    JOIN datos_complementarios ON datos_basicos.fk_d_complementario = datos_complementarios.id
    JOIN medico_examen_fisico ON  medico_examen_fisico.paciente_medico = datos_basicos.id_historia
        WHERE datos_basicos.motivo_evaluacion = 'Post incapacidad' AND datos_complementarios.numero_documento=".$id." ";
    $qcont = mysqli_query($conexion,$cont);
        while ($re = mysqli_fetch_array($qcont)){
      $postincapacidad = $re{'Total'};     
    }
    $cont = "SELECT datos_basicos.motivo_evaluacion, COUNT(motivo_evaluacion) AS Total FROM datos_basicos
    JOIN datos_complementarios ON datos_basicos.fk_d_complementario = datos_complementarios.id
    JOIN medico_examen_fisico ON  medico_examen_fisico.paciente_medico = datos_basicos.id_historia
        WHERE datos_basicos.motivo_evaluacion = 'Reubicacion' AND datos_complementarios.numero_documento=".$id." ";
    $qcont = mysqli_query($conexion,$cont);
        while ($re = mysqli_fetch_array($qcont)){
     $reubicacion = $re{'Total'};      
    }
    $cont = "SELECT datos_basicos.motivo_evaluacion, COUNT(motivo_evaluacion) AS Total FROM datos_basicos 
    JOIN datos_complementarios ON datos_basicos.fk_d_complementario = datos_complementarios.id
    JOIN medico_examen_fisico ON  medico_examen_fisico.paciente_medico = datos_basicos.id_historia
        WHERE datos_basicos.motivo_evaluacion = 'Reingreso' AND datos_complementarios.numero_documento=".$id." ";
    $qcont = mysqli_query($conexion,$cont);
        while ($re = mysqli_fetch_array($qcont)){
      $reingreso = $re{'Total'};      
    }
    $cont = "SELECT datos_basicos.motivo_evaluacion, COUNT(motivo_evaluacion) AS Total FROM datos_basicos
    JOIN datos_complementarios ON datos_basicos.fk_d_complementario = datos_complementarios.id
    JOIN medico_examen_fisico ON  medico_examen_fisico.paciente_medico = datos_basicos.id_historia
        WHERE datos_basicos.motivo_evaluacion = 'Otros' AND datos_complementarios.numero_documento=".$id." ";
    $qcont = mysqli_query($conexion,$cont);
        while ($re = mysqli_fetch_array($qcont)){
      $otros = $re{'Total'};     
    }
    //obtener fecha del ultimo registro del historial
    $consultaregistro = "SELECT * FROM datos_basicos
      JOIN datos_complementarios ON datos_basicos.fk_d_complementario = datos_complementarios.id
     JOIN medico_examen_fisico ON medico_examen_fisico.paciente_medico = datos_basicos.id_historia
     WHERE datos_complementarios.numero_documento = ".$numero_documento." order by datos_basicos.fecha desc limit 1  ";
    $queryreg = mysqli_query($conexion,$consultaregistro);
    if (mysqli_num_rows($queryreg) > 0){  
        while ($reg = mysqli_fetch_array($queryreg)){
        $ultimo = $reg{'fecha'}; 
        //echo $ultimo;    
      }
    }else{
      $ultimo = "No hay registros de fecha";
    }  
    //alerta historial clinico
      echo '<script>
   $(document).ready(function(){
    $("#historial").modal("show");
   });</script>';
  

    //}//fin if
    
    ?>
<form class="form" action="" method="POST" role="form">

<div class="text-center text-info"><label>Registro Historia de Medica:</label></div>

  <input class="form-control" type="text" name="historia" value='<?php echo $historia; ?>' readonly="readonly" style  ="display: none;">

<div class="container">

 <div class="panel panel-default">
    <div class="panel-heading text-center"><label>Datos  <a href="#" data-toggle="modal" data-target="#historial">Paciente</a>-Empresa</label></div>
    <div class="panel-body">    
      <img class="img-responsive img-thumbnail paciente_datos" alt="Foto del Paciente" src=<?php echo $ruta_destino."".$historia.'.png'; ?> >
      <div class="tabla_paciente col-sm-6">
        <table class="table table-bordered">
          <thead>
            <th>Nombres-Apellidos:</th>
            <th>Tipo Documento:</th>
            <th>Numero Documento:</th>
          </thead>

          <tbody style="font-size: 13px;">
            <tr>
              <td><?php echo $datos['nombres_apellidos']; ?></td>
              <td><?php echo $datos['tipo_documento']; ?></td>
              <td><?php echo $datos['numero_documento']; ?></td> 
            </tr>
            <thead>
              <th>Edad:</th>
              <th>Fecha Nacimiento:</th>
              <th>Genero:</th>
            </thead>
            <tr>   
              <td><?php echo $datos['edad']; ?></td>
              <td><?php echo $datos['fecha_nacimiento']; ?></td>
              <td><?php echo $datos['genero']; ?></td>
            </tr>
            <thead>      
              <th>Estado Civil:</th>
              <th>Lugar Nacimiento:</th>
              <th>Numero Celular:</th>
            </thead>
            <tr>   
              <td><?php echo $datos['estado_civil']; ?></td>
              <td><?php echo $datos['lugar_nacimiento']; ?></td>
              <td><?php echo $datos['celular']; ?></td>
            </tr>
            <thead> 
              <th>Direccion</th>
              <th colspan="3">Motivo de Evaluacion:</th>
            </thead>
            <tr>
              <td><?php echo $datos['direccion']; ?></td>  
              <td colspan="3"><?php echo $datos['motivo_evaluacion']; ?></td>
            </tr>
          </tbody>
        </table>
      </div>

      <div class="col-sm-12"> 
        <table class="table table-bordered">
          <tbody style="font-size: 13px;">
          <thead>
            <th>Nombre de la Empresa:</th>
            <th>Actividad Economica:</th>
            <th>Ciudad:</th>
            <th>Direccion de la empresa</th>
            <th>Numero de Nit</th>
            <th>Telefono</th>
          </thead>
            <tr>
              <td><?php echo $datos['nombre_empresa']; ?></td>
              <td><?php echo $datos['actividad_economica']; ?></td>
              <td><?php echo $datos['ciudad']; ?></td>
              <td><?php echo $datos['direccion_empresa']; ?></td>
              <td><?php echo $datos['numero_nit']; ?></td>
              <td><?php echo $datos['telefono_empresa']; ?></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>

<div class="panel panel-default">
  <div class="panel-heading"><div class="text-center"><label>Examen Fisico: </label></div></div>
  <div class="panel-body">

    <div class="col-sm-">
        <table class="table table-bordered"> 
        <thead>
          <tr class="active">
          <th class="text-center">Cabeza:</th>
          <th class="text-center">Amigdalas:</th>
          <th class="text-center">Abdomen:</th>
          <th class="text-center">Piel/Anexos:</th>
          </tr>
        </thead>   
          <tbody>
            <tr class="text-center">
              
              <?php if ($cabeza == "Normal") { ?>
                <td>Normal <input type="radio" name="cabeza" value="Normal" checked>/
                Anormal <input type="radio" name="cabeza" value="Anormal">/
                No Examinado <input type="radio" name="cabeza" value="No Examinado"> </td>
              <?php }else if($cabeza == "Anormal"){ ?>
                <td>Normal <input type="radio" name="cabeza" value="Normal">/
                Anormal <input type="radio" name="cabeza" value="Anormal" checked>/
                No Examinado <input type="radio" name="cabeza" value="No Examinado"> </td>
              <?php }else if ($cabeza=="No Examinado") { ?>
                <td>Normal <input type="radio" name="cabeza" value="Normal">/
                Anormal <input type="radio" name="cabeza" value="Anormal">/
                No Examinado <input type="radio" name="cabeza" value="No Examinado" checked> </td>
              <?php }else{ ?>
                <td>Normal <input type="radio" name="cabeza" value="Normal">/
                Anormal <input type="radio" name="cabeza" value="Anormal">/ 
                No Examinado <input type="radio" name="cabeza" value="No Examinado"> </td>
              <?php } ?>

              
              <?php if ($amigdalas == "Normal") { ?>
                <td>Normal <input type="radio" name="amigdalas" value="Normal" checked>/
                Anormal <input type="radio" name="amigdalas" value="Anormal">/
                No Examinado <input type="radio" name="amigdalas" value="No Examinado"> </td>
              <?php }else if ($amigdalas == "Anormal"){ ?>
                <td>Normal <input type="radio" name="amigdalas" value="Normal">/
                Anormal <input type="radio" name="amigdalas" value="Anormal" checked>/
                No Examinado <input type="radio" name="amigdalas" value="No Examinado"> </td>
              <?php }else if ($amigdalas == "No Examinado"){ ?>
                <td>Normal <input type="radio" name="amigdalas" value="Normal">/
                Anormal <input type="radio" name="amigdalas" value="Anormal">/
                No Examinado <input type="radio" name="amigdalas" value="No Examinado" checked> </td>
              <?php }else{ ?>
                <td>Normal <input type="radio" name="amigdalas" value="Normal">/
                Anormal <input type="radio" name="amigdalas" value="Anormal">/
                No Examinado <input type="radio" name="amigdalas" value="No Examinado"> </td>
              <?php } ?>

              
              <?php if ($abdomen=="Normal") { ?>
                <td>Normal <input type="radio" name="abdomen" value="Normal" checked>/
                Anormal <input type="radio" name="abdomen" value="Anormal">/
                No Examinado <input type="radio" name="abdomen" value="No Examinado"> </td>
              <?php }else if ($abdomen=="Anormal"){ ?>
                <td>Normal <input type="radio" name="abdomen" value="Normal">/ 
                Anormal <input type="radio" name="abdomen" value="Anormal" checked>/
                No Examinado <input type="radio" name="abdomen" value="No Examinado"> </td>
              <?php }else if($abdomen=="No Examinado"){ ?>
                <td>Normal <input type="radio" name="abdomen" value="Normal">/
                Anormal <input type="radio" name="abdomen" value="Anormal">/ 
                No Examinado <input type="radio" name="abdomen" value="No Examinado" checked> </td>
              <?php }else{ ?>
                <td>Normal <input type="radio" name="abdomen" value="Normal">/
                Anormal <input type="radio" name="abdomen" value="Anormal">/ 
                No Examinado <input type="radio" name="abdomen" value="No Examinado"> </td>
              <?php } ?>

              
              <?php if ($piel_anexos=="Normal") { ?>
                <td>Normal <input type="radio" name="piel_anexos" value="Normal" checked>/
                Anormal <input type="radio" name="piel_anexos" value="Anormal">/
                No Examinado <input type="radio" name="piel_anexos" value="No Examinado"> </td>
              <?php }else if($piel_anexos=="Anormal"){ ?>
                <td>Normal <input type="radio" name="piel_anexos" value="Normal">/ 
                Anormal <input type="radio" name="piel_anexos" value="Anormal" checked>/ 
                No Examinado <input type="radio" name="piel_anexos" value="No Examinado"> </td>
              <?php }else if($piel_anexos=="No Examinado"){ ?>
                <td>Normal <input type="radio" name="piel_anexos" value="Normal">/ 
                Anormal <input type="radio" name="piel_anexos" value="Anormal">/ 
                No Examinado <input type="radio" name="piel_anexos" value="No Examinado" checked></td>
              <?php }else{ ?>
                <td>Normal <input type="radio" name="piel_anexos" value="Normal">/ 
                Anormal <input type="radio" name="piel_anexos" value="Anormal">/ 
                No Examinado <input type="radio" name="piel_anexos" value="No Examinado"></td>
              <?php } ?>
            </tr>
            <thead>
              <tr class="active">
              <th class="text-center">Ojos:</th>
              <th class="text-center">Cuello:</th>
              <th class="text-center">Genitales:</th>
              <th class="text-center">Neurologico:</th>
              </tr>
            </thead>
            <tr class="text-center">
              
              <?php if ($ojos == "Normal") { ?>
                <td>Normal <input type="radio" name="ojos" value="Normal" checked>/ 
                Anormal <input type="radio" name="ojos" value="Anormal">/
                No Examinado <input type="radio" name="ojos" value="No Examinado"> </td>
              <?php }else if($ojos=="Anormal"){ ?>
                <td>Normal <input type="radio" name="ojos" value="Normal">/
                Anormal <input type="radio" name="ojos" value="Anormal" checked>/ 
                No Examinado <input type="radio" name="ojos" value="No Examinado"> </td>
              <?php }else if($ojos=="No Examinado") { ?>
                <td>Normal <input type="radio" name="ojos" value="Normal">/ 
                Anormal <input type="radio" name="ojos" value="Anormal">/ 
                No Examinado <input type="radio" name="ojos" value="No Examinado" checked> </td>
              <?php }else{ ?>
                <td>Normal <input type="radio" name="ojos" value="Normal">/ 
                Anormal <input type="radio" name="ojos" value="Anormal">/ 
                No Examinado <input type="radio" name="ojos" value="No Examinado"> </td>
              <?php } ?>

              
              <?php if ($cuello == "Normal") { ?>
                <td>Normal <input type="radio" name="cuello" value="Normal" checked>/ 
                Anormal <input type="radio" name="cuello" value="Anormal">/ 
                No Examinado <input type="radio" name="cuello" value="No Examinado"> </td>
              <?php }else if($cuello == "Anormal"){ ?>
                <td>Normal <input type="radio" name="cuello" value="Normal" >/ 
                Anormal <input type="radio" name="cuello" value="Anormal" checked>/ 
                No Examinado <input type="radio" name="cuello" value="No Examinado"> </td>
              <?php }else if ($cuello == "No Examinado") { ?>
                <td>Normal <input type="radio" name="cuello" value="Normal">/ 
                Anormal <input type="radio" name="cuello" value="Anormal">/ 
                No Examinado <input type="radio" name="cuello" value="No Examinado" checked> </td>
              <?php }else{ ?>
                <td>Normal <input type="radio" name="cuello" value="Normal">/ 
                Anormal <input type="radio" name="cuello" value="Anormal">/ 
                No Examinado <input type="radio" name="cuello" value="No Examinado"> </td>
              <?php } ?>

              
              <?php if ($genitales=="Normal") { ?>
                <td>Normal <input type="radio" name="genitales" value="Normal" checked>/ 
                Anormal <input type="radio" name="genitales" value="Anormal">/ 
                No Examinado <input type="radio" name="genitales" value="No Examinado"> </td>
              <?php }else if($genitales =="Anormal"){ ?>
                <td>Normal <input type="radio" name="genitales" value="Normal">/ 
                Anormal <input type="radio" name="genitales" value="Anormal" checked>/ 
                No Examinado <input type="radio" name="genitales" value="No Examinado"> </td>
              <?php }else if($genitales =="No Examinado"){ ?>
                <td>Normal <input type="radio" name="genitales" value="Normal">/ 
                Anormal <input type="radio" name="genitales" value="Anormal">/ 
                No Examinado <input type="radio" name="genitales" value="No Examinado" checked> </td>
              <?php }else{ ?>
                <td>Normal <input type="radio" name="genitales" value="Normal">/ 
                Anormal <input type="radio" name="genitales" value="Anormal">/ 
                No Examinado <input type="radio" name="genitales" value="No Examinado"> </td>
              <?php } ?>                

              
              <?php if ($neurologico=="Normal") { ?>
                <td>Normal <input type="radio" name="neurologico" value="Normal" checked>/ 
                Anormal <input type="radio" name="neurologico" value="Anormal">/ 
                No Examinado <input type="radio" name="neurologico" value="No Examinado"> </td>
              <?php }else if($neurologico =="Anormal"){ ?>
                <td>Normal <input type="radio" name="neurologico" value="Normal">/ 
                Anormal <input type="radio" name="neurologico" value="Anormal" checked>/ 
                No Examinado <input type="radio" name="neurologico" value="No Examinado"> </td>
              <?php }else if ($neurologico =="No Examinado"){ ?>
                <td>Normal <input type="radio" name="neurologico" value="Normal">/ 
                Anormal <input type="radio" name="neurologico" value="Anormal">/ 
                No Examinado <input type="radio" name="neurologico" value="No Examinado" checked> </td>
              <?php }else{ ?>
                <td>Normal <input type="radio" name="neurologico" value="Normal">/ 
                Anormal <input type="radio" name="neurologico" value="Anormal">/ 
                No Examinado <input type="radio" name="neurologico" value="No Examinado"> </td>
              <?php } ?>
            </tr>
            <thead>
              <tr class="active">
              <th class="text-center">Oidos:</th>
              <th class="text-center">Torax:</th>
              <th class="text-center">Miembros Superiores:</th>
              <th class="text-center">Muscular:</th>
              </tr>
            </thead>
            <tr class="text-center">
              
              <?php if ($oidos == "Normal") { ?>
                <td>Normal <input type="radio" name="oidos" value="Normal" checked>/ 
                Anormal <input type="radio" name="oidos" value="Anormal">/ 
                No Examinado <input type="radio" name="oidos" value="No Examinado"> </td>
              <?php }else if($oidos == "Anormal"){ ?>
                <td>Normal <input type="radio" name="oidos" value="Normal">/ 
                Anormal <input type="radio" name="oidos" value="Anormal" checked>/ 
                No Examinado <input type="radio" name="oidos" value="No Examinado"> </td>
              <?php }else if ($oidos == "No Examinado"){ ?>
                <td>Normal <input type="radio" name="oidos" value="Normal">/ 
                Anormal <input type="radio" name="oidos" value="Anormal">/ 
                No Examinado <input type="radio" name="oidos" value="No Examinado" checked> </td>
              <?php }else{ ?>
                <td>Normal <input type="radio" name="oidos" value="Normal">/ 
                Anormal <input type="radio" name="oidos" value="Anormal">/ 
                No Examinado <input type="radio" name="oidos" value="No Examinado"> </td>
              <?php } ?>

              
              <?php if ($torax=="Normal") { ?>
                <td>Normal <input type="radio" name="torax" value="Normal" checked>/ 
                Anormal <input type="radio" name="torax" value="Anormal">/ 
                No Examinado <input type="radio" name="torax" value="No Examinado"> </td>
              <?php }else if($torax=="Anormal"){ ?>
                <td>Normal <input type="radio" name="torax" value="Normal">/ 
                Anormal <input type="radio" name="torax" value="Anormal" checked>/ 
                No Examinado <input type="radio" name="torax" value="No Examinado"> </td>
              <?php }else if($torax == "No Examinado"){ ?>
                <td>Normal <input type="radio" name="torax" value="Normal">/ 
                Anormal <input type="radio" name="torax" value="Anormal">/ 
                No Examinado <input type="radio" name="torax" value="No Examinado" checked> </td>
              <?php }else{ ?>
                <td>Normal <input type="radio" name="torax" value="Normal">/ 
                Anormal <input type="radio" name="torax" value="Anormal">/ 
                No Examinado <input type="radio" name="torax" value="No Examinado"> </td>
              <?php } ?>

              
              <?php if ($miembros_superiores=="Normal") { ?>
                <td>Normal <input type="radio" name="miembros_superiores" value="Normal" checked>/ 
                Anormal <input type="radio" name="miembros_superiores" value="Anormal">/ 
                No Examinado <input type="radio" name="miembros_superiores" value="No Examinado"> </td>
              <?php }else if($miembros_superiores=="Anormal"){ ?>
                <td>Normal <input type="radio" name="miembros_superiores" value="Normal">/ 
                Anormal <input type="radio" name="miembros_superiores" value="Anormal" checked>/ 
                No Examinado <input type="radio" name="miembros_superiores" value="No Examinado"> </td>
              <?php }else if($miembros_superiores=="No Examinado"){ ?>
                <td>Normal <input type="radio" name="miembros_superiores" value="Normal">/ 
                Anormal <input type="radio" name="miembros_superiores" value="Anormal">/ 
                No Examinado <input type="radio" name="miembros_superiores" value="No Examinado" checked> </td>
              <?php }else{ ?>
                <td>Normal <input type="radio" name="miembros_superiores" value="Normal">/ 
                Anormal <input type="radio" name="miembros_superiores" value="Anormal">/ 
                No Examinado <input type="radio" name="miembros_superiores" value="No Examinado"> </td>
              <?php } ?>

              
              <?php if ($muscular=="Normal") { ?>
                <td>Normal <input type="radio" name="muscular" value="Normal" checked>/ 
                Anormal <input type="radio" name="muscular" value="Anormal">/ 
                No Examinado <input type="radio" name="muscular" value="No Examinado"> </td>
              <?php }else if($muscular=="Anormal"){ ?>
                <td>Normal <input type="radio" name="muscular" value="Normal">/ 
                Anormal <input type="radio" name="muscular" value="Anormal" checked>/ 
                No Examinado <input type="radio" name="muscular" value="No Examinado"> </td>
              <?php }else if($muscular=="No Examinado"){?>
                <td>Normal <input type="radio" name="muscular" value="Normal">/ 
                Anormal <input type="radio" name="muscular" value="Anormal">/ 
                No Examinado <input type="radio" name="muscular" value="No Examinado" checked> </td>
              <?php }else{ ?>
                <td>Normal <input type="radio" name="muscular" value="Normal">/ 
                Anormal <input type="radio" name="muscular" value="Anormal">/ 
                No Examinado <input type="radio" name="muscular" value="No Examinado"> </td>
              <?php } ?>
            </tr>
            <thead>
              <tr class="active">
              <th class="text-center">Nariz:</th>
              <th class="text-center">Pulmones:</th>
              <th class="text-center">Miembros Inferiores:</th>
              <th class="text-center">Vascular:</th>
              </tr>
            </thead>
            <tr class="text-center">
              
              <?php if ($nariz == "Normal") { ?>
                <td>Normal <input type="radio" name="nariz" value="Normal" checked>/ 
                Anormal <input type="radio" name="nariz" value="Anormal">/ 
                No Examinado <input type="radio" name="nariz" value="No Examinado"> </td>
              <?php }else if($nariz == "Anormal"){ ?>
                <td>Normal <input type="radio" name="nariz" value="Normal">/ 
                Anormal <input type="radio" name="nariz" value="Anormal" checked>/ 
                No Examinado <input type="radio" name="nariz" value="No Examinado"> </td>
              <?php }else if($nariz=="No Examinado"){ ?>
                <td>Normal <input type="radio" name="nariz" value="Normal">/ 
                Anormal <input type="radio" name="nariz" value="Anormal">/ 
                No Examinado <input type="radio" name="nariz" value="No Examinado" checked> </td>
              <?php }else{ ?>
                <td>Normal <input type="radio" name="nariz" value="Normal">/ 
                Anormal <input type="radio" name="nariz" value="Anormal">/ 
                No Examinado <input type="radio" name="nariz" value="No Examinado"> </td>
              <?php } ?>

              
              <?php if ($pulmones=="Normal") { ?>
                <td>Normal <input type="radio" name="pulmones" value="Normal" checked>/ 
                Anormal <input type="radio" name="pulmones" value="Anormal">/ 
                No Examinado <input type="radio" name="pulmones" value="No Examinado"> </td>
              <?php }else if ($pulmones=="Anormal"){ ?>
                <td>Normal <input type="radio" name="pulmones" value="Normal">/ 
                Anormal <input type="radio" name="pulmones" value="Anormal" checked>/ 
                No Examinado <input type="radio" name="pulmones" value="No Examinado"> </td>
              <?php }else if ($pulmones == "No Examinado"){ ?>
                <td>Normal <input type="radio" name="pulmones" value="Normal">/ 
                Anormal <input type="radio" name="pulmones" value="Anormal">/ 
                No Examinado <input type="radio" name="pulmones" value="No Examinado" checked> </td>
              <?php }else{ ?>
                <td>Normal <input type="radio" name="pulmones" value="Normal">/ 
                Anormal <input type="radio" name="pulmones" value="Anormal">/
                No Examinado <input type="radio" name="pulmones" value="No Examinado"> </td>
              <?php } ?>

              
              <?php if ($miembros_inferiores == "Normal"){ ?>
                <td>Normal <input type="radio" name="miembros_inferiores" value="Normal" checked>/ 
                Anormal <input type="radio" name="miembros_inferiores" value="Anormal">/ 
                No Examinado <input type="radio" name="miembros_inferiores" value="No Examinado"> </td>                
              <?php }else if ($miembros_inferiores=="Anormal"){ ?>
                <td>Normal <input type="radio" name="miembros_inferiores" value="Normal">/ 
                Anormal <input type="radio" name="miembros_inferiores" value="Anormal" checked>/ 
                No Examinado <input type="radio" name="miembros_inferiores" value="No Examinado"> </td>
              <?php }else if ($miembros_inferiores =="No Examinado") { ?>
                <td>Normal <input type="radio" name="miembros_inferiores" value="Normal">/ 
                Anormal <input type="radio" name="miembros_inferiores" value="Anormal">/ 
                No Examinado <input type="radio" name="miembros_inferiores" value="No Examinado" checked> </td>
              <?php }else{ ?>
                <td>Normal <input type="radio" name="miembros_inferiores" value="Normal">/ 
                Anormal <input type="radio" name="miembros_inferiores" value="Anormal">/ 
                No Examinado <input type="radio" name="miembros_inferiores" value="No Examinado"> </td>
              <?php } ?>

              
              <?php if ($vascular == "Normal") { ?>
                <td>Normal <input type="radio" name="vascular" value="Normal" checked>/ 
                Anormal <input type="radio" name="vascular" value="Anormal">/ 
                No Examinado <input type="radio" name="vascular" value="No Examinado"> </td>
              <?php }else if($vascular == "Anormal"){ ?>
                <td>Normal <input type="radio" name="vascular" value="Normal">/ 
                Anormal <input type="radio" name="vascular" value="Anormal" checked>/ 
                No Examinado <input type="radio" name="vascular" value="No Examinado"> </td>
              <?php }else if($vascular=="No Examinado"){ ?>
                <td>Normal <input type="radio" name="vascular" value="Normal">/ 
                Anormal <input type="radio" name="vascular" value="Anormal">/ 
                No Examinado <input type="radio" name="vascular" value="No Examinado" checked> </td>
              <?php }else{ ?> 
                <td>Normal <input type="radio" name="vascular" value="Normal">/ 
                Anormal <input type="radio" name="vascular" value="Anormal">/
                No Examinado <input type="radio" name="vascular" value="No Examinado"> </td> 
              <?php } ?>            
            </tr>
            <thead>
              <tr class="active">
              <th class="text-center">Dentadura:</th>
              <th class="text-center">Corazon:</th>
              <th class="text-center">Columna:</th>
              <th class="text-center">Oseo:</th>
              </tr>
            </thead>
            <tr class="text-center">
              
              <?php if ($dentadura=="Normal") { ?>
                <td>Normal <input type="radio" name="dentadura" value="Normal" checked>/ 
                Anormal <input type="radio" name="dentadura" value="Anormal">/ 
                No Examinado <input type="radio" name="dentadura" value="No Examinado"> </td>
              <?php }else if($dentadura=="Anormal"){ ?>
                <td>Normal <input type="radio" name="dentadura" value="Normal">/ 
                Anormal <input type="radio" name="dentadura" value="Anormal" checked>/ 
                No Examinado <input type="radio" name="dentadura" value="No Examinado"> </td>
              <?php }else if($dentadura=="No Examinado"){ ?>
                <td>Normal <input type="radio" name="dentadura" value="Normal">/ 
                Anormal <input type="radio" name="dentadura" value="Anormal">/ 
                No Examinado <input type="radio" name="dentadura" value="No Examinado" checked> </td>
              <?php }else{ ?>
                <td>Normal <input type="radio" name="dentadura" value="Normal">/ 
                Anormal <input type="radio" name="dentadura" value="Anormal">/ 
                No Examinado <input type="radio" name="dentadura" value="No Examinado"> </td>
              <?php } ?>

              
              <?php if ($corazon=="Normal") { ?>
                <td>Normal <input type="radio" name="corazon" value="Normal" checked>/ 
                Anormal <input type="radio" name="corazon" value="Anormal">/ 
                No Examinado <input type="radio" name="corazon" value="No Examinado"> </td>
              <?php }else if ($corazon=="Anormal") { ?>
                <td>Normal <input type="radio" name="corazon" value="Normal">/ 
                Anormal <input type="radio" name="corazon" value="Anormal" checked>/ 
                No Examinado <input type="radio" name="corazon" value="No Examinado"> </td>
              <?php }else if($corazon=="No Examinado"){ ?>
                <td>Normal <input type="radio" name="corazon" value="Normal">/ 
                Anormal <input type="radio" name="corazon" value="Anormal">/ 
                No Examinado <input type="radio" name="corazon" value="No Examinado" checked> </td>
              <?php }else{ ?>
                <td>Normal <input type="radio" name="corazon" value="Normal">/ 
                Anormal <input type="radio" name="corazon" value="Anormal">/ 
               No Examinado <input type="radio" name="corazon" value="No Examinado"> </td>
              <?php } ?>

              
              <?php if ($columna=="Normal") { ?>
                <td>Normal <input type="radio" name="columna" value="Normal" checked>/ 
                Anormal <input type="radio" name="columna" value="Anormal">/
                No Examinado <input type="radio" name="columna" value="No Examinado"> </td>
              <?php }else if($columna=="Anormal"){ ?>
                <td>Normal <input type="radio" name="columna" value="Normal">/ 
                Anormal <input type="radio" name="columna" value="Anormal" checked>/ 
                No Examinado <input type="radio" name="columna" value="No Examinado"> </td>
              <?php }else if ($columna=="No Examinado"){ ?>
                <td>Normal <input type="radio" name="columna" value="Normal">/ 
                Anormal <input type="radio" name="columna" value="Anormal">/ 
                No Examinado <input type="radio" name="columna" value="No Examinado" checked> </td>
              <?php }else{ ?>
                <td>Normal <input type="radio" name="columna" value="Normal">/ 
                Anormal <input type="radio" name="columna" value="Anormal">/ 
                No Examinado <input type="radio" name="columna" value="No Examinado"> </td>
              <?php } ?>
              
              <?php if ($oseo=="Normal") { ?>
                <td>Normal <input type="radio" name="oseo" value="Normal" checked>/
                Anormal <input type="radio" name="oseo" value="Anormal">/
                No Examinado <input type="radio" name="oseo" value="No Examinado"> </td>
              <?php }else if($oseo=="Anormal"){ ?>
                <td>Normal <input type="radio" name="oseo" value="Normal">/ 
                Anormal <input type="radio" name="oseo" value="Anormal" checked>/ 
                No Examinado <input type="radio" name="oseo" value="No Examinado"> </td>
              <?php }else if ($oseo=="No Examinado"){ ?>
                <td>Normal <input type="radio" name="oseo" value="Normal">/ 
                Anormal <input type="radio" name="oseo" value="Anormal">/ 
                No Examinado <input type="radio" name="oseo" value="No Examinado" checked> </td>
              <?php }else{ ?>
                <td>Normal <input type="radio" name="oseo" value="Normal">/ 
                Anormal <input type="radio" name="oseo" value="Anormal">/ 
                No Examinado <input type="radio" name="oseo" value="No Examinado"> </td>
              <?php } ?>
            </tr>
            <thead>
              <tr class="active">
              <th class="text-center">Lengua:</th>
              <th class="text-center">Hernias:</th>
              <th class="text-center" colspan="5">Viceras:</th>
              </tr>
            </thead>
            <tr class="text-center">
              
              <?php if ($lengua=="Normal") { ?>
                <td>Normal <input type="radio" name="lengua" value="Normal" checked>/
                Anormal <input type="radio" name="lengua" value="Anormal">/ 
                No Examinado <input type="radio" name="lengua" value="No Examinado"> </td>
              <?php }else if($lengua=="Anormal"){ ?>
                <td>Normal <input type="radio" name="lengua" value="Normal">/ 
                Anormal <input type="radio" name="lengua" value="Anormal" checked>/ 
                No Examinado <input type="radio" name="lengua" value="No Examinado"> </td>
              <?php }else if ($lengua =="No Examinado") { ?>
                <td>Normal <input type="radio" name="lengua" value="Normal">/ 
                Anormal <input type="radio" name="lengua" value="Anormal">/ 
                No Examinado <input type="radio" name="lengua" value="No Examinado" checked> </td>
              <?php }else{ ?>
                <td>Normal <input type="radio" name="lengua" value="Normal">/ 
                Anormal <input type="radio" name="lengua" value="Anormal">/ 
                No Examinado <input type="radio" name="lengua" value="No Examinado"> </td>
              <?php } ?> 

              
              <?php if ($hernia=="Normal") { ?>
                <td>Normal <input type="radio" name="hernias" value="Normal" checked>/ 
                Anormal <input type="radio" name="hernias" value="Anormal">/ 
                No Examinado <input type="radio" name="hernias" value="No Examinado"> </td>
              <?php }else if($hernia=="Anormal"){ ?>
                <td>Normal <input type="radio" name="hernias" value="Normal">/ 
                Anormal <input type="radio" name="hernias" value="Anormal" checked>/ 
                No Examinado <input type="radio" name="hernias" value="No Examinado"> </td>
              <?php }else if($hernia == "No Examinado"){ ?>
                <td>Normal <input type="radio" name="hernias" value="Normal">/ 
                Anormal <input type="radio" name="hernias" value="Anormal">/ 
                No Examinado <input type="radio" name="hernias" value="No Examinado" checked> </td>
              <?php }else{ ?>  
                <td>Normal <input type="radio" name="hernias" value="Normal">/ 
                Anormal <input type="radio" name="hernias" value="Anormal">/ 
                No Examinado <input type="radio" name="hernias" value="No Examinado"> </td>
              <?php } ?>

              
              <?php if ($viceras=="Normal") { ?>
                <td colspan="5">Normal <input type="radio" name="viceras" value="Normal" checked>/ 
                Anormal <input type="radio" name="viceras" value="Anormal">/ 
                No Examinado <input type="radio" name="viceras" value="No Examinado"> </td>
              <?php }else if($viceras=="Anormal"){ ?>
                <td colspan="5">Normal <input type="radio" name="viceras" value="Normal">/ 
                Anormal <input type="radio" name="viceras" value="Anormal" checked>/ 
                No Examinado <input type="radio" name="viceras" value="No Examinado"> </td>
              <?php }else if ($viceras=="No Examinado") { ?>
                <td colspan="5">Normal <input type="radio" name="viceras" value="Normal">/ 
                Anormal <input type="radio" name="viceras" value="Anormal">/ 
                No Examinado <input type="radio" name="viceras" value="No Examinado" checked> </td>
              <?php }else{ ?>
                <td colspan="5">Normal <input type="radio" name="viceras" value="Normal">/ 
                Anormal <input type="radio" name="viceras" value="Anormal">/ 
                No Examinado <input type="radio" name="viceras" value="No Examinado"> </td>
              <?php } ?>

              <!--<th class="text-center">Otros:</th>
              <td>NO <input type="radio" name="otro_examen_fisico" value="No" checked> </td>
              <td>AN <input type="radio" name="otro_examen_fisico" value="Anormal"> </td>
              <td>NE <input type="radio" name="otro_examen_fisico" value="No Examinado"> </td>-->
            </tr>
          </tbody>
        </table>
      </div><!--finsm-->
      
      <label>Otros Examenes Fisicos</label>
      <textarea class="form-control" name="otro_examen_fisico" rows="2"><?php echo $otro_examen_fisico; ?></textarea>
      <br>

      <label class="text-center">Observaciones:</label>
      <textarea class="form-control col-sm-12" type="text" name="observaciones_ex_fisico" rows="2"><?php echo $observaciones_ex_fisico ?></textarea>
      <br><br>  

      <br>
  </div>
</div> 
 
<div class="panel panel-default">
  <div class="panel-heading"><div class="text-center"><label>Pruebas Funcionales: </label></div></div>
  <div class="panel-body">
  <br> 
    <table class="table table-bordered">
      <thead>
        <tr class="active">
        <th class="text-center">Marcha:</th>
        <th class="text-center">Miembros Superiores:</th>
        <th class="text-center">Coordinacion:</th>
        <th class="text-center">Columna:</th>
        <th class="text-center">Miembros Inferiores:</th>
        <th class="text-center">Reflejos:</th>
        </tr>
      </thead>
      <tbody>
        <tr class="text-center">
          <td>
            <?php if ($marcha=="Normal") { ?>
              <input type="radio" name="marcha" value="Normal" checked> Normal | 
              <input type="radio" name="marcha" value="Anormal"> Anormal 
            <?php }else if($marcha=="Anormal"){ ?>
              <input type="radio" name="marcha" value="Normal"> Normal | 
              <input type="radio" name="marcha" value="Anormal" checked> Anormal
            <?php }else{ ?> 
              <input type="radio" name="marcha" value="Normal"> Normal | 
              <input type="radio" name="marcha" value="Anormal"> Anormal 
            <?php } ?>
          </td>

          <td>
            <?php if ($miembros_superiores_funcionales == "Normal") { ?>
              <input type="radio" name="miembros_superiores_funcionales" value="Normal" checked> Normal | 
              <input type="radio" name="miembros_superiores_funcionales" value="Anormal"> Anormal
            <?php }else if($miembros_superiores_funcionales == "Anormal"){ ?>
              <input type="radio" name="miembros_superiores_funcionales" value="Normal"> Normal | 
              <input type="radio" name="miembros_superiores_funcionales" value="Anormal" checked> Anormal
            <?php }else{ ?>
              <input type="radio" name="miembros_superiores_funcionales" value="Normal"> Normal | 
              <input type="radio" name="miembros_superiores_funcionales" value="Anormal"> Anormal
            <?php } ?>
          </td>

          <td>
            <?php if ($coordinacion_funcionales == "Normal") { ?>
              <input type="radio" name="coordinacion" value="Normal" checked> Normal | 
              <input type="radio" name="coordinacion" value="Anormal"> Anormal
            <?php }else if($coordinacion_funcionales == "Anormal"){ ?>
              <input type="radio" name="coordinacion" value="Normal"> Normal | 
              <input type="radio" name="coordinacion" value="Anormal" checked> Anormal
            <?php }else{ ?>
              <input type="radio" name="coordinacion" value="Normal"> Normal | 
              <input type="radio" name="coordinacion" value="Anormal"> Anormal
            <?php } ?>
          </td>

          <td>
            <?php if ($columna_funcional=="Normal") { ?>
              <input type="radio" name="columna_funcional" value="Normal" checked> Normal | 
              <input type="radio" name="columna_funcional" value="Anormal"> Anormal
            <?php }else if($columna_funcional=="Anormal"){ ?>
              <input type="radio" name="columna_funcional" value="Normal"> Normal | 
              <input type="radio" name="columna_funcional" value="Anormal" checked> Anormal
            <?php }else{ ?>
              <input type="radio" name="columna_funcional" value="Normal"> Normal | 
              <input type="radio" name="columna_funcional" value="Anormal"> Anormal
            <?php } ?>
          </td>

          <td>
            <?php if ($miembros_inferiores_funcionales=="Normal") { ?>
              <input type="radio" name="miembros_inferiores_funcionales" value="Normal" checked> Normal | 
              <input type="radio" name="miembros_inferiores_funcionales" value="Anormal"> Anormal
            <?php }else if ($miembros_inferiores_funcionales=="Anormal") { ?>
              <input type="radio" name="miembros_inferiores_funcionales" value="Normal"> Normal | 
              <input type="radio" name="miembros_inferiores_funcionales" value="Anormal" checked> Anormal
            <?php }else{ ?>
              <input type="radio" name="miembros_inferiores_funcionales" value="Normal"> Normal | 
              <input type="radio" name="miembros_inferiores_funcionales" value="Anormal"> Anormal
            <?php } ?>
          </td>

          <td>
            <?php if ($reflejos_funcionales=="Normal") { ?>
              <input type="radio" name="reflejos" value="Normal" checked> Normal | 
              <input type="radio" name="reflejos" value="Anormal"> Anormal
            <?php }else if ($reflejos_funcionales=="Anormal") { ?>
              <input type="radio" name="reflejos" value="Normal"> Normal | 
              <input type="radio" name="reflejos" value="Anormal" checked> Anormal
            <?php }else{ ?>
              <input type="radio" name="reflejos" value="Normal"> Normal | 
              <input type="radio" name="reflejos" value="Anormal"> Anormal
            <?php } ?>
          </td>
        </tr>
      <thead>
        <tr class="active">
        <th class="text-center">Phalen:</th>
        <th class="text-center">Finkelstein:</th>
        <th class="text-center">Braggard:</th>
        <th class="text-center">Shober:</th>
        <th class="text-center">Babinski Weil:</th>
        <th class="text-center">Romber Sensibilidad:</th>
        </tr>
      </thead>
        <tr class="text-center">
          <td>
            <?php if ($phalen=="Normal") { ?>
              <input type="radio" name="phalen" value="Normal" checked> Normal | 
              <input type="radio" name="phalen" value="Anormal"> Anormal 
            <?php }else if ($phalen=="Anormal") { ?>
              <input type="radio" name="phalen" value="Normal"> Normal | 
              <input type="radio" name="phalen" value="Anormal" checked> Anormal 
            <?php }else{ ?>
              <input type="radio" name="phalen" value="Normal"> Normal | 
              <input type="radio" name="phalen" value="Anormal"> Anormal
            <?php } ?> 
          </td>

          <td>
            <?php if ($finkelstein=="Normal") { ?>
              <input type="radio" name="finkelstein" value="Normal" checked> Normal | 
              <input type="radio" name="finkelstein" value="Anormal"> Anormal 
            <?php }else if($finkelstein=="Anormal"){ ?>
              <input type="radio" name="finkelstein" value="Normal"> Normal | 
              <input type="radio" name="finkelstein" value="Anormal" checked> Anormal
            <?php }else{ ?>
              <input type="radio" name="finkelstein" value="Normal"> Normal | 
              <input type="radio" name="finkelstein" value="Anormal"> Anormal
            <?php } ?>  
          </td>

          <td>
            <?php if ($braggard=="Normal") { ?>
              <input type="radio" name="braggard" value="Normal" checked> Normal | 
              <input type="radio" name="braggard" value="Anormal"> Anormal
            <?php }else if($braggard=="Anormal"){ ?>
              <input type="radio" name="braggard" value="Normal"> Normal | 
              <input type="radio" name="braggard" value="Anormal" checked> Anormal
            <?php }else{ ?>
              <input type="radio" name="braggard" value="Normal"> Normal | 
              <input type="radio" name="braggard" value="Anormal"> Anormal
            <?php } ?>
          </td>

          <td>
            <?php if ($shober=="Normal") { ?>
              <input type="radio" name="shober" value="Normal" checked> Normal | 
              <input type="radio" name="shober" value="Anormal"> Anormal
            <?php }else if ($shober=="Anormal") { ?>
              <input type="radio" name="shober" value="Normal"> Normal | 
              <input type="radio" name="shober" value="Anormal" checked> Anormal
            <?php }else{ ?>
              <input type="radio" name="shober" value="Normal"> Normal | 
              <input type="radio" name="shober" value="Anormal"> Anormal
            <?php } ?>
          </td>

          <td>
            <?php if ($babinski_weil=="Normal") { ?>
              <input type="radio" name="babinski_weil" value="Normal" checked> Normal | 
              <input type="radio" name="babinski_weil" value="Anormal"> Anormal
            <?php }else if($babinski_weil=="Anormal"){ ?>
              <input type="radio" name="babinski_weil" value="Normal"> Normal | 
              <input type="radio" name="babinski_weil" value="Anormal" checked> Anormal
            <?php }else{ ?>
              <input type="radio" name="babinski_weil" value="Normal"> Normal | 
              <input type="radio" name="babinski_weil" value="Anormal"> Anormal
            <?php } ?>
          </td>

          <td>
            <?php if ($romber_sensibilidad=="Normal") { ?>
              <input type="radio" name="romber_sensibilidad" value="Normal" checked> Normal | 
              <input type="radio" name="romber_sensibilidad" value="Anormal"> Anormal
            <?php }else if ($romber_sensibilidad=="Anormal") { ?>
              <input type="radio" name="romber_sensibilidad" value="Normal"> Normal | 
              <input type="radio" name="romber_sensibilidad" value="Anormal" checked> Anormal
            <?php }else{ ?>
              <input type="radio" name="romber_sensibilidad" value="Normal"> Normal | 
              <input type="radio" name="romber_sensibilidad" value="Anormal"> Anormal
            <?php } ?>
          </td>

        </tr>
        <thead>
            <tr class="active">
            <th class="text-center">Romber:</th>
            <th class="text-center">Tinel:</th>
            <th class="text-center">Lasegue:</th>
            <th class="text-center">Adams:</th>
            <th class="text-center">Unterberger:</th>
            <th class="text-center">Nariz-dedo:</th>
            </tr>
        </thead>
        <tr class="text-center">
          
          <td>
            <?php if ($romber=="Normal") { ?>
              <input type="radio" name="romber" value="Normal" checked> Normal | 
              <input type="radio" name="romber" value="Anormal"> Anormal
            <?php }else if ($romber=="Anormal") { ?>
              <input type="radio" name="romber" value="Normal"> Normal | 
              <input type="radio" name="romber" value="Anormal" checked> Anormal
            <?php }else{ ?>
              <input type="radio" name="romber" value="Normal"> Normal | 
              <input type="radio" name="romber" value="Anormal"> Anormal
            <?php } ?>
          </td>

          <td>
            <?php if ($tinel=="Normal") { ?>
              <input type="radio" name="tinel" value="Normal" checked> Normal  | 
              <input type="radio" name="tinel" value="Anormal"> Anormal
            <?php }else if($tinel=="Anormal"){ ?>
              <input type="radio" name="tinel" value="Normal"> Normal  | 
              <input type="radio" name="tinel" value="Anormal" checked> Anormal
            <?php }else{ ?>
              <input type="radio" name="tinel" value="Normal"> Normal  | 
              <input type="radio" name="tinel" value="Anormal"> Anormal
            <?php } ?>
          </td>

          <td>
            <?php if ($lasegue=="Normal") { ?>
              <input type="radio" name="lasegue" value="Normal" checked> Normal | 
              <input type="radio" name="lasegue" value="Anormal"> Anormal
            <?php }else if($lasegue=="Anormal"){ ?>
              <input type="radio" name="lasegue" value="Normal"> Normal | 
              <input type="radio" name="lasegue" value="Anormal" checked> Anormal
            <?php }else{ ?>
              <input type="radio" name="lasegue" value="Normal"> Normal | 
              <input type="radio" name="lasegue" value="Anormal"> Anormal
            <?php } ?>
          </td>

          <td>
            <?php if ($adams == "Normal") { ?>
              <input type="radio" name="adams" value="Normal" checked> Normal | 
              <input type="radio" name="adams" value="Anormal"> Anormal
            <?php }else if($adams =="Anormal"){ ?>
              <input type="radio" name="adams" value="Normal"> Normal | 
              <input type="radio" name="adams" value="Anormal" checked> Anormal
            <?php }else{ ?>
              <input type="radio" name="adams" value="Normal"> Normal | 
              <input type="radio" name="adams" value="Anormal"> Anormal
            <?php } ?>
          </td>

          <td>
            <?php if ($unterberger=="Normal") { ?>
              <input type="radio" name="unterberger" value="Normal" checked> Normal | 
              <input type="radio" name="unterberger" value="Anormal"> Anormal
            <?php }else if($unterberger=="Anormal"){ ?>
              <input type="radio" name="unterberger" value="Normal"> Normal | 
              <input type="radio" name="unterberger" value="Anormal" checked> Anormal
            <?php }else{ ?>
              <input type="radio" name="unterberger" value="Normal"> Normal | 
              <input type="radio" name="unterberger" value="Anormal"> Anormal
            <?php } ?>
          </td>

          <td>
            <?php if ($nariz_dedo == "Normal") { ?>
              <input type="radio" name="nariz_dedo" value="Normal" checked> Normal | 
              <input type="radio" name="nariz_dedo" value="Anormal"> Anormal
            <?php }else if($nariz_dedo=="Anormal"){ ?>
              <input type="radio" name="nariz_dedo" value="Normal"> Normal | 
              <input type="radio" name="nariz_dedo" value="Anormal" checked> Anormal
            <?php }else{ ?>
              <input type="radio" name="nariz_dedo" value="Normal"> Normal | 
              <input type="radio" name="nariz_dedo" value="Anormal"> Anormal
            <?php } ?>
          </td>
        </tr>
        </tbody>
        </table>

        <table class="table table-bordered">
        <thead>
          <tr class="active">
          <th class="text-center">Miembro Superior-Tono:</th>
          <th class="text-center">Miembro Superior-Fuerza:</th>
          <th class="text-center">Miembro Superior-Sensibilidad:</th>
          <th class="text-center">Miembro Superior-Arcos-Movimiento:</th>
          </tr>
        </thead>
        <tr class="text-center">
          <td>
            <?php if ($miembro_superior_tono=="Normal") { ?>
              <input type="radio" name="m_superior_tono" value="Normal" checked> Normal | 
              <input type="radio" name="m_superior_tono" value="Anormal"> Anormal
            <?php }else if($miembro_superior_tono=="Anormal"){ ?>
              <input type="radio" name="m_superior_tono" value="Normal"> Normal | 
              <input type="radio" name="m_superior_tono" value="Anormal" checked> Anormal
            <?php }else{ ?>
              <input type="radio" name="m_superior_tono" value="Normal"> Normal | 
              <input type="radio" name="m_superior_tono" value="Anormal"> Anormal
            <?php } ?>
          </td>

          <td>
            <?php if ($miembro_superior_fuerza=="Normal") { ?>
              <input type="radio" name="m_superior_fuerza" value="Normal" checked> Normal | 
              <input type="radio" name="m_superior_fuerza" value="Anormal"> Anormal
            <?php }else if($miembro_superior_fuerza=="Anormal"){ ?>
              <input type="radio" name="m_superior_fuerza" value="Normal"> Normal | 
              <input type="radio" name="m_superior_fuerza" value="Anormal" checked> Anormal
            <?php }else{ ?>
              <input type="radio" name="m_superior_fuerza" value="Normal"> Normal | 
              <input type="radio" name="m_superior_fuerza" value="Anormal"> Anormal
            <?php } ?>
          </td>

          <td>
            <?php if ($miembro_superior_sensibilidad=="Normal") { ?>
             <input type="radio" name="m_superior_sensibilidad" value="Normal" checked> Normal | 
             <input type="radio" name="m_superior_sensibilidad" value="Anormal"> Anormal
            <?php }else if($miembro_superior_sensibilidad=="Anormal"){ ?>
             <input type="radio" name="m_superior_sensibilidad" value="Normal"> Normal | 
             <input type="radio" name="m_superior_sensibilidad" value="Anormal" checked> Anormal
            <?php }else{ ?>
              <input type="radio" name="m_superior_sensibilidad" value="Normal"> Normal | 
             <input type="radio" name="m_superior_sensibilidad" value="Anormal"> Anormal
            <?php } ?>
          </td>

          <td>
            <?php if ($miembro_superior_arco_movimiento=="Normal") { ?>
              <input type="radio" name="m_superior_arcosmovimiento" value="Normal" checked> Normal | 
              <input type="radio" name="m_superior_arcosmovimiento" value="Anormal"> Anormal
            <?php }else if($miembro_superior_arco_movimiento=="Anormal"){ ?>
              <input type="radio" name="m_superior_arcosmovimiento" value="Normal"> Normal | 
              <input type="radio" name="m_superior_arcosmovimiento" value="Anormal" checked> Anormal
            <?php }else{ ?>
              <input type="radio" name="m_superior_arcosmovimiento" value="Normal"> Normal | 
              <input type="radio" name="m_superior_arcosmovimiento" value="Anormal"> Anormal
            <?php } ?>
          </td>
        </tr>
        <thead>
          <tr class="active">
          <th class="text-center">Miembro Inferior-Tono: </th>
          <th class="text-center">Miembro Inferior-Fuerza:</th>
          <th class="text-center">Miembro Inferior-Sensibilidad:</th>
          <th class="text-center">Miembro Inferior-Arcos-Movimiento:</th>
          </tr>
        </thead>
        <tr class="text-center">
          <td>
            <?php if ($miembro_inferior_tono=="Normal") { ?>
              <input type="radio" name="m_inferior_tono" value="Normal" checked> Normal | 
              <input type="radio" name="m_inferior_tono" value="Anormal"> Anormal
            <?php }else if($miembro_inferior_tono=="Anormal"){ ?>
              <input type="radio" name="m_inferior_tono" value="Normal"> Normal | 
              <input type="radio" name="m_inferior_tono" value="Anormal" checked> Anormal
            <?php }else{ ?>
              <input type="radio" name="m_inferior_tono" value="Normal"> Normal | 
              <input type="radio" name="m_inferior_tono" value="Anormal"> Anormal
            <?php } ?>
          </td>

          <td>
            <?php if ($miembro_inferior_fuerza=="Normal") { ?>
              <input type="radio" name="m_inferior_fuerza" value="Normal" checked> Normal | 
              <input type="radio" name="m_inferior_fuerza" value="Anormal"> Anormal
            <?php }else if ($miembro_inferior_fuerza="Anormal") { ?>
              <input type="radio" name="m_inferior_fuerza" value="Normal"> Normal | 
              <input type="radio" name="m_inferior_fuerza" value="Anormal" checked> Anormal
            <?php }else{ ?>
              <input type="radio" name="m_inferior_fuerza" value="Normal"> Normal | 
              <input type="radio" name="m_inferior_fuerza" value="Anormal"> Anormal
            <?php } ?>
          </td>

          <td>
            <?php if ($miembro_inferior_sensibilidad=="Normal") { ?>
              <input type="radio" name="m_inferior_sensibilidad" value="Normal" checked> Normal | 
              <input type="radio" name="m_inferior_sensibilidad" value="Anormal"> Anormal
            <?php }else if($miembro_inferior_sensibilidad=="Anormal"){ ?>
              <input type="radio" name="m_inferior_sensibilidad" value="Normal"> Normal | 
              <input type="radio" name="m_inferior_sensibilidad" value="Anormal" checked> Anormal
            <?php }else{ ?>
              <input type="radio" name="m_inferior_sensibilidad" value="Normal"> Normal | 
              <input type="radio" name="m_inferior_sensibilidad" value="Anormal"> Anormal
            <?php } ?>
          </td>

          <td>
            <?php if ($miembro_inferior_arco_movimiento=="Normal") { ?>
              <input type="radio" name="m_inferior_arcosmovimiento" value="Normal" checked> Normal | 
              <input type="radio" name="m_inferior_arcosmovimiento" value="Anormal"> Anormal
            <?php }else if ($miembro_inferior_arco_movimiento =="Anormal") { ?>
              <input type="radio" name="m_inferior_arcosmovimiento" value="Normal"> Normal | 
              <input type="radio" name="m_inferior_arcosmovimiento" value="Anormal" checked> Anormal
            <?php }else{ ?>
              <input type="radio" name="m_inferior_arcosmovimiento" value="Normal"> Normal | 
              <input type="radio" name="m_inferior_arcosmovimiento" value="Anormal"> Anormal
            <?php } ?>
          </td>
        </tr>
      </tbody>
    </table>

      <label class="text-center">Hallazgos:</label>
      <textarea class="form-control col-sm-12" type="text" name="hallazgos_funcionales" rows="3"><?php echo $hallazgos_funcionales ?></textarea>
      <br>  
  </div>
</div> 

<!---->
  <div class="panel panel-default">
  <div class="panel-heading"><div class="text-center"><label>Paraclinicos: </label></div> </div>
  <div class="panel-body">
       
  <br>          
  <table class="table table-bordered">
    <thead>
      <tr class="active">
        <th class="text-center">Colesterol:</th>
        <th class="text-center">Glicemia:</th>
        <th class="text-center">Trigliceridos:</th>
        <th class="text-center">Frotis Faringeo:</th>
        <th class="text-center">Frotis de Uña:</th>
        <th class="text-center">Hemograma:</th>
        <th class="text-center">Coprologico:</th>
        <th class="text-center">Grupo RH:</th>
        <th class="text-center">Electrocardiograma:</th>
        <th class="text-center">Tamizaje Visual:</th>
      </tr>
    </thead>
    <tbody>
      <tr class="text-center">
        <td>
          <?php if ($colesterol=="X") { ?>
            <input type="checkbox" name="colesterol" value="X" checked>
          <?php }else{ ?>
            <input type="checkbox" name="colesterol" value="X">
          <?php } ?>

        </td>
        <td>
          <?php if ($glicemia=="X") { ?>
            <input type="checkbox" name="glicemia" checked value="X">
          <?php }else{ ?>
            <input type="checkbox" name="glicemia" value="X">
          <?php } ?>
        </td>
        <td>
          <?php if ($trigliceridos=="X") { ?>
            <input type="checkbox" name="trigliceridos" checked value="X">
          <?php }else{ ?>
            <input type="checkbox" name="trigliceridos" value="X">
          <?php } ?>
        </td>
        <td>
          <?php if ($frotis_faringeo=="X") { ?>
            <input type="checkbox" name="frotis_faringeo" value="X" checked>
          <?php }else{ ?>
            <input type="checkbox" name="frotis_faringeo" value="X">
          <?php } ?>
        </td>
        <td>
        <?php if ($frotis_de_una=="X") { ?>
          <input type="checkbox" name="frotis_una" value="X" checked>
        <?php }else{ ?>
          <input type="checkbox" name="frotis_una" value="X">
        <?php } ?>
        </td>
        <td>
          <?php if ($hemograma=="X") { ?>
            <input type="checkbox" name="hemograma" checked value="X">
          <?php }else{ ?>
            <input type="checkbox" name="hemograma" value="X">
          <?php } ?>
        </td>
        <td>
        <?php if ($coprologico=="X") { ?>
          <input type="checkbox" name="coprologico" value="X" checked>
        <?php }else{ ?>
          <input type="checkbox" name="coprologico" value="X">
        <?php } ?>
        </td>
        <td>
          <?php if ($grupo_rh=="X") { ?>
            <input type="checkbox" name="grupo_rh" value="X" checked>
          <?php }else{ ?>
            <input type="checkbox" name="grupo_rh" value="X">
          <?php } ?>
        </td>
        <td> 
          <?php if ($electrocardiograma=="X") { ?>
            <input type="checkbox" name="electrocardiograma" value="X" checked>
          <?php }else{ ?>
            <input type="checkbox" name="electrocardiograma" value="X">
          <?php } ?>  
        </td>
        <td>
          <?php if ($ex_tamizaje_visual=="X") { ?>
            <input type="checkbox" name="tamizaje_visual" value="X" checked>
          <?php }else{ ?>
            <input type="checkbox" name="tamizaje_visual" value="X">
          <?php } ?>
        </td>
      </tr>
      <thead> 
        <th colspan="10" class="text-center">Rayos X:</th>
      </thead>
      <thead>
        <tr class="active">
        <th class="text-center" colspan="1">Columna:</th>
        <th class="text-center" colspan="1">Torax:</th>
        <th class="text-center" colspan="2">Abdomen:</th>
        <th class="text-center" colspan="3">Miembros Superiores:</th>
        <th class="text-center" colspan="3">Miembros Inferiores:</th>
        </tr>
      </thead>
      <tr class="text-center">
        <td colspan="1">
          <?php if ($columna_paraclinico=="X") { ?>
            <input type="checkbox" name="columna_paraclinico" value="X" checked>
          <?php }else{ ?>
            <input type="checkbox" name="columna_paraclinico" value="X">
          <?php } ?>
        </td>
        <td colspan="1">
          <?php if ($torax_paraclinico=="X") { ?>
            <input type="checkbox" name="torax_paraclinico" value="X" checked>
          <?php }else{ ?>
            <input type="checkbox" name="torax_paraclinico" value="X">
          <?php } ?>
        </td>
        <td colspan="2">
          <?php if ($abdomen_paraclinico=="X") { ?>
            <input type="checkbox" name="abdomen_paraclinico" value="X" checked>
          <?php }else{ ?>
            <input type="checkbox" name="abdomen_paraclinico" value="X">
          <?php } ?>
        </td>
        <td colspan="3">
          <?php if ($miembros_superiores_paraclinico=="X") { ?>
            <input type="checkbox" name="paraclinico_miembros_superiores" value="X" checked>
          <?php }else{ ?>
            <input type="checkbox" name="paraclinico_miembros_superiores" value="X">
          <?php } ?>
        </td>
        <td colspan="3">
          <?php if ($miembros_inferiores_paraclinico=="X") { ?>
            <input type="checkbox" name="paraclinico_miembros_inferiores" value="X" checked>
          <?php }else{ ?>
            <input type="checkbox" name="paraclinico_miembros_inferiores" value="X">
          <?php } ?>
        </td>

      </tr>
    </tbody>
  </table>
<!-- AÑADIDOOOOOOOOOOOOOOOOOOOOOO -->
         
  <table class="table table-bordered">
    <thead>
      <tr class="active">
      <th class="text-center">Audiometria:</th>
      <th class="text-center">Visiometria:</th>
      <th class="text-center">Psicologico:</th>
      <th class="text-center">Espirometria:</th>
      <th class="text-center">Optometria:</th>
      </tr>
    </thead>
    <tbody>
      <tr class="text-center">
        <td>
          <?php if ($ex_audiometria=="X") { ?>
            <input type="checkbox" name="audiometria" value="X" checked>
          <?php }else{ ?>
            <input type="checkbox" name="audiometria" value="X">
          <?php } ?>
        </td>
        <td>
          <?php if ($ex_visiometria=="X") { ?>
            <input type="checkbox" name="visiometria" value="X" checked>
          <?php }else{ ?>
            <input type="checkbox" name="visiometria" value="X">
          <?php } ?>
        </td>
        <td>
          <?php if ($ex_psicologico=="X") { ?>
            <input type="checkbox" name="psicologico" value="X" checked>
          <?php }else{ ?>
            <input type="checkbox" name="psicologico" value="X">
          <?php } ?>
        </td>
        <td>
          <?php if ($ex_espirometria=="X") { ?>
            <input type="checkbox" name="espirometria" value="X" checked>
          <?php }else{ ?>
            <input type="checkbox" name="espirometria" value="X">
          <?php } ?>
        </td>
        <td>
          <?php if ($ex_optometria=="X") { ?>
            <input type="checkbox" name="optometria" value="X" checked>
          <?php }else{ ?>
            <input type="checkbox" name="optometria" value="X">
          <?php } ?>
        </td>
     </tr>
    </tbody>
  </table>

         
  <table class="table table-bordered">
    <tbody>
      <tr>
        <td><div><label>Otros:</label> <input type="text" name="otro_paraclinico" class="form-control input-sm" value="<?php echo $ex_otros ?>"></div></td>
     </tr>
    </tbody>
  </table>
  </div>
</div>

<!--//////////////-->
    <!---->
  <div class="panel panel-default">
    <div class="panel-heading">  
      <div class="text-center"><label>Remision</label> 
      <?php if ($remision=="Si") { ?>
        Si <input type="radio" name="remision" value="Si" checked> / 
        NO <input type="radio" name="remision" value="No">
      <?php }else if ($remision=="No") { ?>
        Si <input type="radio" name="remision" value="Si"> / 
        NO <input type="radio" name="remision" value="No" checked>
      <?php }else{ ?> 
        Si <input type="radio" name="remision" value="Si"> / 
        NO <input type="radio" name="remision" value="No">
      <?php } ?> 
      </div>
    </div>
    <div class="panel-body">

      <div class="col-sm-6">
        <label>Desde:</label>
        <input class="form-control" type="text" name="remision_desde" value="<?php echo $desde ?>">
      </div>

      <div class="col-sm-6">
        <label>Hacia:</label>
        <input class="form-control" type="text" name="remision_hacia" value="<?php echo $hacia ?>">
        <br>
      </div>

      <th class="text-center">Motivo:</th>
        <td>
          <textarea class="form-control col-sm-12" type="text" name="remision_motivo" rows="3"><?php echo $motivo_remision ?></textarea>
        </td>
        <br><br>
        <div class="text-center"><label class="text-danger">Resultado de Remision Pendiente</label> 
        <?php if ($remision_pendiente=="Si") { ?>
          Si <input type="radio" name="remision_pendiente" value="Si" checked> / 
          NO <input type="radio" name="remision_pendiente" value="No">
        <?php }else if($remision_pendiente=="No"){ ?>
          Si <input type="radio" name="remision_pendiente" value="Si"> / 
          NO <input type="radio" name="remision_pendiente" value="No" checked>
        <?php }else{ ?>
          Si <input type="radio" name="remision_pendiente" value="Si"> / 
          NO <input type="radio" name="remision_pendiente" value="No">
        <?php } ?>
        </div>
    </div>
  </div>

  <div class="panel panel-default">
  <div class="panel-heading"><div class="text-center"><label>Concepto Aptitud Laboral: </label></div> </div>
  <div class="panel-body">
  <br>          
  <table class="table table-bordered">
    <thead>
      <tr class="active">
      <th class="text-center">Apto Trabajo A Nivel:</th>
      <th class="text-center">Apto Trabajo En Altura:</th>
      <th class="text-center">Apto Para El Cargo Con Restricciones Que No Intervienen En Su Trabajo:</th>
      </tr>
    </thead>
    <tbody>
      <tr class="text-center">
        <td>
          <?php if ($apto_trabajo_nivel=="Si") { ?>
            SI <input type="radio" name="trabajo_nivel" value="Si" checked> / 
            NO <input type="radio" name="trabajo_nivel" value="No">
          <?php }else if($apto_trabajo_nivel=="No"){ ?>
            SI <input type="radio" name="trabajo_nivel" value="Si"> / 
            NO <input type="radio" name="trabajo_nivel" value="No" checked>
          <?php }else{ ?>
            SI <input type="radio" name="trabajo_nivel" value="Si"> / 
            NO <input type="radio" name="trabajo_nivel" value="No">
          <?php } ?>
        </td>
        <td>
          <?php if ($apto_trabajo_altura =="Si") { ?>
            SI <input type="radio" name="trabajo_altura" value="Si" checked> / 
            NO <input type="radio" name="trabajo_altura" value="No">
          <?php }else if($apto_trabajo_altura=="No"){ ?>
            SI <input type="radio" name="trabajo_altura" value="Si"> / 
            NO <input type="radio" name="trabajo_altura" value="No" checked>
          <?php }else{ ?>
            SI <input type="radio" name="trabajo_altura" value="Si"> / 
            NO <input type="radio" name="trabajo_altura" value="No">
          <?php } ?>
        </td>
        <td>
          <?php if ($apto_con_restricciones_no_intervienen=="Si") { ?>
            SI <input type="radio" name="trabajo_restricciones_no_interviene" value="Si" checked> / 
            NO <input type="radio" name="trabajo_restricciones_no_interviene" value="No">
          <?php }else if($apto_con_restricciones_no_intervienen=="No"){ ?>
            SI <input type="radio" name="trabajo_restricciones_no_interviene" value="Si"> / 
            NO <input type="radio" name="trabajo_restricciones_no_interviene" value="No" checked>
          <?php }else{ ?>
            SI <input type="radio" name="trabajo_restricciones_no_interviene" value="Si"> / 
            NO <input type="radio" name="trabajo_restricciones_no_interviene" value="No">
          <?php } ?>
        </td>              
      </tr>
      <thead>
        <tr class="active">
        <th class="text-center">Aplazado:</th>
        <th class="text-center">Nueva Valoracion:</th>
        <th class="text-center">Apto Para El Cargo Con Limitaciones Que Intervienen Con Su Trabajo:</th>
        </tr>
      </thead>
      <tr class="text-center">
        <td>
          <?php if ($aplazado=="Si") { ?>
            SI <input type="radio" name="aplazado" value="Si" checked> / 
            NO <input type="radio" name="aplazado" value="No">
          <?php }else if($aplazado=="No"){ ?>
            SI <input type="radio" name="aplazado" value="Si"> / 
            NO <input type="radio" name="aplazado" value="No" checked>
          <?php }else{ ?>
            SI <input type="radio" name="aplazado" value="Si"> / 
            NO <input type="radio" name="aplazado" value="No">
          <?php } ?>
        </td>
        <td>
          <?php if ($nueva_valoracion=="Si") { ?>
            SI <input type="radio" name="nueva_valoracion" value="Si" checked> / 
            NO <input type="radio" name="nueva_valoracion" value="No">
          <?php }else if ($nueva_valoracion=="No") { ?>
            SI <input type="radio" name="nueva_valoracion" value="Si"> / 
            NO <input type="radio" name="nueva_valoracion" value="No" checked>
          <?php }else{ ?>
            SI <input type="radio" name="nueva_valoracion" value="Si"> / 
            NO <input type="radio" name="nueva_valoracion" value="No" checked>
          <?php } ?>
        </td>
        <td>
          <?php if ($apto_con_limitaciones_si_intervienen == "Si") { ?>
            SI <input type="radio" name="trabajo_limitaciones_si_interviene" value="Si" checked> / 
            NO <input type="radio" name="trabajo_limitaciones_si_interviene" value="No">
          <?php }else if($apto_con_limitaciones_si_intervienen =="No"){ ?>
            SI <input type="radio" name="trabajo_limitaciones_si_interviene" value="Si"> / 
            NO <input type="radio" name="trabajo_limitaciones_si_interviene" value="No" checked>
          <?php }else{ ?>
            SI <input type="radio" name="trabajo_limitaciones_si_interviene" value="Si"> / 
            NO <input type="radio" name="trabajo_limitaciones_si_interviene" value="No">
          <?php } ?>
        </td>
      </tr>
      <thead>
        <tr class="active">
        <th class="text-center">Apto:</th>
        <th class="text-center" colspan="2">Examen De <?php echo $datos['motivo_evaluacion']; ?>:</th>
        </tr>
      </thead>
      <tr class="text-center">
      <td>
        <?php if ($apto=="Si") { ?>
          SI <input type="radio" name="apto" value="Si" checked> / 
          NO <input type="radio" name="apto" value="No">
        <?php }else if($apto=="No"){ ?>
          SI <input type="radio" name="apto" value="Si"> / 
          NO <input type="radio" name="apto" value="No" checked>
        <?php }else{ ?>
          SI <input type="radio" name="apto" value="Si"> / 
          NO <input type="radio" name="apto" value="No">
        <?php } ?>
      </td>
      <td colspan="2">
        <?php if ($examen_diagnostico == "Normal") { ?>
          Normal <input type="radio" name="examen_diagnostico" value="Normal" checked> / 
          Anormal <input type="radio" name="examen_diagnostico" value="Anormal">
        <?php }else if ($examen_diagnostico == "Anormal") { ?>
          Normal <input type="radio" name="examen_diagnostico" value="Normal"> / 
          Anormal <input type="radio" name="examen_diagnostico" value="Anormal" checked>
        <?php }else{ ?>
          Normal <input type="radio" name="examen_diagnostico" value="Normal"> / 
          Anormal <input type="radio" name="examen_diagnostico" value="Anormal">
        <?php } ?>
      </td>
      </tr>
    </tbody>
  </table>
  <!--</div>-->

    <label class="text-center">Observaciones:</label>
    <textarea class="form-control" type="text" name="observaciones_aptitud_laboral" rows="2"><?php echo $observaciones_aptitud_laboral ?></textarea>
    <br>

  <table class="table table-bordered">
    <thead>
    <th colspan="5" class="text-center">Examen Medico Con Enfasis En:</th>
    </thead>
    <thead>
      <tr>
        <th>OSTEOMUSCULAR</th>
        <th>CARDIOVASCULAR</th>
        <th>PULMONAR</th>
        <th>MANIPULACION DE ALIMENTOS</th>
        <th>OTRO</th>
      </tr>
    </thead>
    <tbody>
      <tr class="text-center">
        <td> 
          <?php if ($enf_osteomuscular == "Si") { ?>
            Si <input type="radio" name="osteomuscular_enfasis" value="Si" checked> / 
            No <input type="radio" name="osteomuscular_enfasis" value="No">
          <?php }else if($enf_osteomuscular == "No" ){ ?>
            Si <input type="radio" name="osteomuscular_enfasis" value="Si"> / 
            No <input type="radio" name="osteomuscular_enfasis" value="No" checked>
          <?php }else{ ?>
            Si <input type="radio" name="osteomuscular_enfasis" value="Si"> / 
            No <input type="radio" name="osteomuscular_enfasis" value="No">
          <?php } ?>
        </td>

        <td> 
          <?php if ($enf_cardiovascular == "Si") { ?>
            Si <input type="radio" name="cardiovascular_enfasis" value="Si" checked> / 
            No <input type="radio" name="cardiovascular_enfasis" value="No">
          <?php }else if($enf_cardiovascular == "No"){ ?>
            Si <input type="radio" name="cardiovascular_enfasis" value="Si"> / 
            No <input type="radio" name="cardiovascular_enfasis" value="No" checked>
          <?php }else{ ?>
            Si <input type="radio" name="cardiovascular_enfasis" value="Si"> / 
            No <input type="radio" name="cardiovascular_enfasis" value="No">
          <?php } ?>
        </td>

        <td> 
          <?php if ($enf_pulmonar == "Si") { ?>
            Si <input type="radio" name="pulmonar_enfasis" value="Si" checked> / 
            No <input type="radio" name="pulmonar_enfasis" value="No">
          <?php }else if ($enf_pulmonar == "No") { ?>
            Si <input type="radio" name="pulmonar_enfasis" value="Si"> / 
            No <input type="radio" name="pulmonar_enfasis" value="No" checked>
          <?php }else{ ?>
            Si <input type="radio" name="pulmonar_enfasis" value="Si"> / 
            No <input type="radio" name="pulmonar_enfasis" value="No">
          <?php } ?>
        </td>

        <td>
          <?php if ($enf_manipulacion == "Si") { ?> 
            Si <input type="radio" name="manipulacion_alimento_enfasis" value="Si" checked> / 
            No <input type="radio" name="manipulacion_alimento_enfasis" value="No">
          <?php }else if ($enf_manipulacion == "No") { ?>
            Si <input type="radio" name="manipulacion_alimento_enfasis" value="Si"> / 
            No <input type="radio" name="manipulacion_alimento_enfasis" value="No" checked>
          <?php }else{ ?>
            Si <input type="radio" name="manipulacion_alimento_enfasis" value="Si"> / 
            No <input type="radio" name="manipulacion_alimento_enfasis" value="No">
          <?php } ?>
        </td>

        <td><input type="text" name="otro_enfasis" class="form-control" value="<?php echo $enf_otros ?>"></td>
      </tr>
    </tbody>
  </table>

  <table class="table table-bordered">
  <br>
    <tbody>
      <tr>
        <td>
          <label>EL EXAMEN FISICO NO PRESENTA DEFECTOS  NI PATOLOGÍAS:</label>
        </td> 
        <td> 
          <?php if ($ef_no_defectos=="Si") { ?>
            SI <input type="radio" name="ef_no_defectos" value="Si" checked> / 
            NO <input type="radio" name="ef_no_defectos" value="No">
          <?php }else if($ef_no_defectos=="No"){ ?>
            SI <input type="radio" name="ef_no_defectos" value="Si"> / 
            NO <input type="radio" name="ef_no_defectos" value="No" checked>
          <?php }else{ ?>
            SI <input type="radio" name="ef_no_defectos" value="Si"> / 
            NO <input type="radio" name="ef_no_defectos" value="No">
          <?php } ?>
        </td>
      </tr>
      <tr>
        <td>
          <label>EL EXAMEN FISICO PRESENTA CONDICIONES DE SALUD QUE NO DISMINUYEN SU CAPACIDAD LABORAL:</label>
        </td> 
        <td> 
          <?php if ($ef_disminuye_capacidad=="Si") { ?>
            SI <input type="radio" name="ef_disminuye_capacidad" value="Si" checked> / 
            NO <input type="radio" name="ef_disminuye_capacidad" value="No">
          <?php }else if($ef_disminuye_capacidad=="No"){ ?>
            SI <input type="radio" name="ef_disminuye_capacidad" value="Si"> / 
            NO <input type="radio" name="ef_disminuye_capacidad" value="No" checked>
          <?php }else{ ?>
            SI <input type="radio" name="ef_disminuye_capacidad" value="Si"> / 
            NO <input type="radio" name="ef_disminuye_capacidad" value="No">
          <?php } ?>
        </td>
      </tr>
      <tr>
        <td>
          <label>EL EXAMEN FISICO PRESENTA CONDICIONES DE SALUD QUE PUEDEN AGRAVARSE CON EL TRABAJO:</label>
        </td> 
        <td> 
          <?php if ($ef_condiciones_agravarse=="Si") { ?>
            SI <input type="radio" name="ef_condiciones_agravarse" value="Si" checked> / 
            NO <input type="radio" name="ef_condiciones_agravarse" value="No">
          <?php }else if($ef_condiciones_agravarse=="No"){ ?>
            SI <input type="radio" name="ef_condiciones_agravarse" value="Si"> / 
            NO <input type="radio" name="ef_condiciones_agravarse" value="No" checked>
          <?php }else{ ?>
            SI <input type="radio" name="ef_condiciones_agravarse" value="Si"> / 
            NO <input type="radio" name="ef_condiciones_agravarse" value="No">
          <?php } ?>
        </td>
      </tr>
      <tr>
        <td>
          <label>EL EXAMEN FISICO PRESENTA CONDICIONES DE SALUD QUE DEBEN SER TRATADAS POR EPS, ARL: </label>
        </td> 
        <td> 
          <?php if ($ef_condiciones_atendidas_por_eps=="Si") { ?>
            SI <input type="radio" name="ef_condiciones_atendidas_eps_arl" value="Si" checked> / 
            NO <input type="radio" name="ef_condiciones_atendidas_eps_arl" value="No">
          <?php }else if($ef_condiciones_atendidas_por_eps=="No"){ ?>
            SI <input type="radio" name="ef_condiciones_atendidas_eps_arl" value="Si"> / 
            NO <input type="radio" name="ef_condiciones_atendidas_eps_arl" value="No" checked>
          <?php }else{ ?>
            SI <input type="radio" name="ef_condiciones_atendidas_eps_arl" value="Si"> / 
            NO <input type="radio" name="ef_condiciones_atendidas_eps_arl" value="No">
          <?php } ?>
        </td>
      </tr>
      <tr>
        <td>
          <label>EL EXAMEN FISICO PRESENTA CONDICIONES DE SALUD QUE DEBEN SER TRATADAS POR EPS, ARL, ANTES DE INGRESAR:  </label>
        </td> 
        <td> 
          <?php if ($em_atencion_eps_arl_antes=="Si") { ?>
            SI <input type="radio" name="em_atencion_eps_arl_antes" value="Si" checked> / 
            NO <input type="radio" name="em_atencion_eps_arl_antes" value="No">
          <?php }else if($em_atencion_eps_arl_antes=="No"){ ?>
            SI <input type="radio" name="em_atencion_eps_arl_antes" value="Si"> / 
            NO <input type="radio" name="em_atencion_eps_arl_antes" value="No" checked>
          <?php }else{ ?>
            SI <input type="radio" name="em_atencion_eps_arl_antes" value="Si"> / 
            NO <input type="radio" name="em_atencion_eps_arl_antes" value="No">
          <?php } ?>
        </td>
      </tr>
    </tbody>
  </table>
    <br><br>  
</div>
  </div>

<!---->  

  <div class="panel panel-default">
    <div class="panel-heading"><div class="text-center">Recomendaciones:</div></div>
    <div class="panel-body">
      <label>trabajador:</label>
      <textarea class="form-control" type="text" name="recomendacion_trabajador" rows="5"><?php echo $reco_trabajador ?></textarea> 
      <br>

      <label>Empleador:</label>
      <textarea class="form-control" type="text" name="recomendacion_empleador" rows="5"><?php echo $reco_empleador ?></textarea>

      <table class="table table-bordered">
        <thead>
        <th colspan="8" class="text-center">Ingreso al Programa de Vigilancia Epidemiologica: 
        <?php if ($pve == "Si") { ?>
          Si <input type="radio" name="pve" value="Si" checked> / 
          No <input type="radio" name="pve" value="No">
        <?php }else if($pve == "No"){ ?>
          Si <input type="radio" name="pve" value="Si"> / 
          No <input type="radio" name="pve" value="No" checked>
        <?php }else{ ?>
          Si <input type="radio" name="pve" value="Si"> / 
          No <input type="radio" name="pve" value="No">
        <?php } ?>
          
        </th>
        </thead>
        <thead>
          <tr>
            <th>Visual</th>
            <th>Auditivo</th>
            <th>Cardiovascular</th>
            <th>Respiratorio</th>
            <th>Piel</th>
            <th>Psicologico</th>
            <th>Osteomuscular</th>
            <th>Otro</th>
          </tr>
        </thead>
        <tbody>
          <tr class="text-center">
            <td> 
            <?php if ($pvevisual == "Si"){ ?>
              Si <input type="radio" name="pve_visual" value="Si" checked> / 
              No <input type="radio" name="pve_visual" value="No">
            <?php }else if($pvevisual == "No"){ ?>
              Si <input type="radio" name="pve_visual" value="Si"> / 
              No <input type="radio" name="pve_visual" value="No" checked>
            <?php }else{ ?>
              Si <input type="radio" name="pve_visual" value="Si"> / 
              No <input type="radio" name="pve_visual" value="No">
            <?php } ?>
            </td>

            <td> 
              <?php if ($pveauditivo == "Si") { ?>
                Si <input type="radio" name="pve_auditivo" value="Si" checked> / 
                No <input type="radio" name="pve_auditivo" value="No">
              <?php }else if($pveauditivo =="No"){ ?>
                Si <input type="radio" name="pve_auditivo" value="Si"> / 
                No <input type="radio" name="pve_auditivo" value="No" checked>
              <?php }else{ ?>
                Si <input type="radio" name="pve_auditivo" value="Si"> / 
                No <input type="radio" name="pve_auditivo" value="No">
              <?php } ?>
            </td>

            <td>
              <?php if ($pvecardiovascular == "Si") { ?>
                Si <input type="radio" name="pve_cardiovascular" value="Si" checked> / 
                No <input type="radio" name="pve_cardiovascular" value="No">
              <?php }else if($pvecardiovascular=="No"){ ?> 
                Si <input type="radio" name="pve_cardiovascular" value="Si"> / 
                No <input type="radio" name="pve_cardiovascular" value="No" checked>
              <?php }else{ ?>
                Si <input type="radio" name="pve_cardiovascular" value="Si"> / 
                No <input type="radio" name="pve_cardiovascular" value="No">
              <?php } ?>
            </td>

            <td> 
              <?php if ($pverespiratorio == "Si") { ?>
                Si <input type="radio" name="pve_respiratorio" value="Si" checked> / 
                No <input type="radio" name="pve_respiratorio" value="No">
              <?php }else if($pverespiratorio == "No"){ ?>
                Si <input type="radio" name="pve_respiratorio" value="Si"> / 
                No <input type="radio" name="pve_respiratorio" value="No" checked>
              <?php }else{ ?>
                Si <input type="radio" name="pve_respiratorio" value="Si"> / 
                No <input type="radio" name="pve_respiratorio" value="No">
              <?php } ?>
            </td>

            <td> 
              <?php if ($pvepiel == "Si") { ?>
                Si <input type="radio" name="pve_piel" value="Si" checked> / 
                No <input type="radio" name="pve_piel" value="No">
              <?php }else if($pvepiel=="No"){ ?>
                Si <input type="radio" name="pve_piel" value="Si"> / 
                No <input type="radio" name="pve_piel" value="No" checked>
              <?php }else{ ?>
                Si <input type="radio" name="pve_piel" value="Si"> / 
                No <input type="radio" name="pve_piel" value="No">
              <?php } ?>
            </td>

            <td>
              <?php if ($pvepsicologico == "Si"){ ?> 
                Si <input type="radio" name="pve_psicologico" value="Si" checked> / 
                No <input type="radio" name="pve_psicologico" value="No">
              <?php }else if ($pvepsicologico == "No"){ ?>
                Si <input type="radio" name="pve_psicologico" value="Si"> / 
                No <input type="radio" name="pve_psicologico" value="No" checked>
              <?php }else{ ?>
                Si <input type="radio" name="pve_psicologico" value="Si"> / 
                No <input type="radio" name="pve_psicologico" value="No">
              <?php } ?>
            </td>

            <td>
              <?php if ($pveosteomuscular == "Si"){ ?>  
                Si <input type="radio" name="pve_osteomuscular" value="Si" checked> / 
                No <input type="radio" name="pve_osteomuscular" value="No">
              <?php }else if($pveosteomuscular == "No"){ ?>
                Si <input type="radio" name="pve_osteomuscular" value="Si"> / 
                No <input type="radio" name="pve_osteomuscular" value="No" checked>
              <?php }else{ ?>
                Si <input type="radio" name="pve_osteomuscular" value="Si"> / 
                No <input type="radio" name="pve_osteomuscular" value="No">
              <?php } ?> 
            </td>

            <td>              
              <input type="text" name="pve_otro" class="form-control" value="<?php echo $pveotro ?>">
              <label for="pve_otro" generated="true" class="error"></label>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>       


  <!---->  

  <div class="panel panel-default">
    <div class="panel-heading"><div class="text-center">Restricciones:</div></div>
    <div class="panel-body">
        <label>trabajador:</label>
        <textarea class="form-control" type="text" name="restriccion_trabajador" rows="3"><?php echo $rest_trabajador ?></textarea> 
        <br>
        <label>Empleador:</label>
        <textarea class="form-control" type="text" name="restriccion_empleador" rows="3"><?php echo $rest_empleador ?></textarea>  
    </div>
  </div>

  <p><label>Nota: </label> Declaro que la información suministrada por mi persona, son verídica y completa y autorizo para que esta información sea consultada por el área de salud ocupacional o la oficina de talento humano y los de ley. 
  <?php if($autorizacion_manejo_informacion=="Si") { ?>
    SI <input type="radio" name="autorizacion" value="Si" checked> / 
    NO <input type="radio" name="autorizacion" value="No">
  <?php }else if($autorizacion_manejo_informacion=="No"){ ?>
    SI <input type="radio" name="autorizacion" value="Si"> / 
    NO <input type="radio" name="autorizacion" value="No" checked>
  <?php }else{ ?>
    SI <input type="radio" name="autorizacion" value="Si"> / 
    NO <input type="radio" name="autorizacion" value="No">
  <?php } ?>
  </p>
</div> 
  <br><br>

    <!--por añadir -->  

<!--   <div class="panel panel-default">
    <div class="panel-heading"><div class="text-center text-info">Restricciones:</div></div>
    <div class="panel-body">
      <div class="container-fluid">
        <label>trabajador:</label>
        <textarea class="form-control col-sm-12" type="text" name="restriccion_trabajador" rows="3"></textarea> 
      </div>
      <div class="container-fluid">
        <label>Empleador:</label>
        <textarea class="form-control col-sm-12" type="text" name="restriccion_empleador" rows="3"></textarea>
      </div>  
    </div>
  </div> -->


<?php }/*array_fin */?>
  <div class="text-center">
    <br>
    <input type="submit" name="Actualizar" value="Actualizar" class="btn btn-success">
    <br><br>
  </div>
</form> 
<?php 
}else{
    //echo "<script>alert('Error, Numero de identificacion incorrecto o no registrado')</script>";
    //echo "<script>window.location = 'medico.php'</script>";
  echo '<script>
   $(document).ready(function(){
    $("#mostrarmodal").modal("show");
   });</script>';  
  } 

  ?>

<!--Error de usuario no registrado o incorrecto-->
<div class="modal fade" id="mostrarmodal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true" onClick="window.location.href='administracion_search.php';">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button onClick="window.location.href='administracion_search.php';" type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="text-danger"><span class="glyphicon glyphicon-warning-sign"></span> ERROR.</h4>
      </div>
      <div class="modal-body">
        <h4 class="text-primary">El Usuario con Indentificacion Nº <label class="text-danger"><?php echo $id; ?></label> No presenta Examen Registrado en el Sistema Concerniente al Area Medica.</h4> <p>Cerciorarse de que el Paciente fue atendido en dicha fecha por el Area.</p>    
      </div>
      <div class="modal-footer">
        <a onClick="window.location.href='administracion_search.php';" data-dismiss="modal" class="btn btn-danger">Cerrar</a>
      </div>
    </div>
  </div>
</div>

<!--ALerta historial del paciente-->
<div class="modal fade" id="historial" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true" >
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="text-danger"><span class="glyphicon glyphicon-warning-sign"></span> Alerta.</h4>
      </div>
      <div class="modal-body">
        <h4 class="text-primary">Historial de Usuario con Indentificacion Nº <label class="text-danger"><?php echo $numero_documento; ?></label></h4>
        <p><label>Motivo de Evaluaciones <strong style="color: red;">Ingreso: </strong></label> <?php echo $ingreso ?></p> 
        <p><label>Motivo de Evaluaciones <strong style="color: red;">Periodicas: </strong></label> <?php echo $periodico ?></p> 
        <p><label>Motivo de Evaluaciones <strong style="color: red;">Retiro: </strong></label> <?php echo $retiro ?></p>
        <p><label>Motivo de Evaluaciones <strong style="color: red;">Post Incapacidad: </strong></label> <?php echo $postincapacidad ?></p>
        <p><label>Motivo de Evaluaciones <strong style="color: red;">Reubicacion: </strong></label> <?php echo $reubicacion ?></p>
        <p><label>Motivo de Evaluaciones <strong style="color: red;">Reingreso: </strong></label> <?php echo $reingreso ?></p> 
        <p><label>Motivo de Evaluaciones <strong style="color: red;">Otros: </strong></label> <?php echo $otros ?></p>   
        <p><label>El Ultimo Registro de Evaluacion Clinica Se Realizo el dia: <strong style="color: red;"> <?php echo $ultimo ?> </strong></label> </p>
        <p><span class="glyphicon glyphicon-list-alt"></span><a target="_blank" href= "medico_consult.php?valorBusqueda=<?php echo $numero_documento ?>"  style="color: red;"  class=""> Ir a Consultas</a></p> 
      </div>
      <div class="modal-footer">
        <a  data-dismiss="modal" class="btn btn-danger">Cerrar</a>
      </div>
    </div>
  </div>
</div>

  <?php //include 'bar/footer.php'; ?>
  </body>
  <script type="text/javascript">
    function esInteger(e) {
      var charCode 
      charCode = e.keyCode 
      status = charCode 
      if (charCode > 31 && (charCode < 48 || charCode > 57)) {
          return false
      }
      return true
    }
  </script>
</html>
