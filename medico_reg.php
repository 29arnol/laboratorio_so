<!DOCTYPE html>
<html>
  <head>
    <title>Medico - Examen</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style type="text/css">
      .d{
        width:1100px;
        height:1175px;
      }
    </style>
  </head>
  <?php 
    include('includes/conexion.php'); 
    include('bar/navbar_medico.php');
    require('bar/style_bar/estilo.css');
    $ruta_destino = "fotografias/"; //ruta de las fotos de los paciente 
 
  if (isset($_POST['Registrar'])) {

  	error_reporting(E_ERROR | E_WARNING | E_PARSE);

    $historiaid = $_POST['historia'];

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

    $examen_fisico = "INSERT INTO `medico_examen_fisico` (`id`,`cabeza`,`ojos`,`oidos`,`nariz`,`dentadura`,`lengua`,`amigdalas`,`cuello`,`torax`,`pulmones`,`corazon`,`hernia`,`abdomen`,`genitales`,`miembros_superiores`,`miembros_inferiores`,`columna`,`viceras`,`piel_anexos`,`neurologico`,`muscular`,`vascular`,`oseo`,`otro_examen_fisico`,`observaciones_ex_fisico`,`phalen`,`babinski_weil`,`lasegue`,`finkelstein`,`romber_sensibilidad`,`adams`,`braggard`,`romber`,`unterberger`,`shober`,`tinel`,`nariz_dedo`,`miembro_superior_tono`,`miembro_inferior_tono`,`miembro_superior_fuerza`,`miembro_inferior_fuerza`,`miembro_superior_sensibilidad`,`miembro_inferior_sensibilidad`,`miembro_superior_arco_movimiento`,`miembro_inferior_arco_movimiento`,`marcha`,`miembros_superiores_funcionales`,`miembros_inferiores_funcionales`,`coordinacion_funcionales`,`columna_funcional`,`reflejos_funcionales`,`hallazgos_funcionales`,`paciente_medico`)
    VALUES ('NULL','$cabeza','$ojos','$oidos','$nariz','$dentadura','$lengua','$amigdalas','$cuello','$torax','$pulmones','$corazon','$hernias','$abdomen','$genitales','$miembros_superiores','$miembros_inferiores','$columna','$viceras','$piel_anexos','$neurologico','$muscular','$vascular','$oseo','$otro_examen_fisico','$observaciones_ex_fisico','$phalen','$babinski_weil','$lasegue','$finkelstein','$romber_sensibilidad','$adams','$braggard','$romber','$unterberger','$shober','$tinel','$nariz_dedo','$m_superior_tono','$m_inferior_tono','$m_superior_fuerza','$m_inferior_fuerza','$m_superior_sensibilidad','$m_inferior_sensibilidad','$m_superior_arcosmovimiento','$m_inferior_arcosmovimiento','$marcha','$miembros_superiores_funcionales','$miembros_inferiores_funcionales','$coordinacion','$columna_funcional','$reflejos','$hallazgos_funcionales','$historiaid')";
    $query1 = mysqli_query($conexion, $examen_fisico);

    if ($query1){   
      //Obtenemos El Ultimo ID Insertado
      $ver = "SELECT * FROM medico_examen_fisico ORDER BY `id` DESC limit 0,1";
      $queryid = mysqli_query ($conexion,$ver);
      $dataid = mysqli_fetch_array($queryid);
      $idfk_examen_medico = $dataid['id'];
    }else{
      echo "<script>alert('Error, Intente Nuevamente')</script>";
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
    $paradiagnostico = $_POST['paradiagnostico'];

    $medico_paraclinicos = "INSERT INTO `medico_paraclinicos` (`id`,`colesterol`,`glicemia`,`trigliceridos`,`frotis_faringeo`,`frotis_de_una`,`hemograma`,`coprologico`,`columna_paraclinico`,`torax_paraclinico`,`abdomen_paraclinico`,`miembros_superiores_paraclinico`,`miembros_inferiores_paraclinico`,`electrocardiograma`,`grupo_rh`,`ex_tamizaje_visual`,`ex_audiometria`,`ex_visiometria`,`ex_psicologico`,`ex_espirometria`,`ex_optometria`,`ex_otros`,`diagnosticos_paraclinicos`,`id_examen_fisico`)
    VALUES ('NULL','$colesterol','$glicemia','$trigliceridos','$frotis_faringeo','$frotis_una','$hemograma','$coprologico','$columna_paraclinico','$torax_paraclinico','$abdomen_paraclinico','$paraclinico_miembros_superiores','$paraclinico_miembros_inferiores','$electrocardiograma','$grupo_rh','$tamizaje_visual','$audiometria','$visiometria','$psicologico','$espirometria','$optometria','$otro_paraclinico','$paradiagnostico','$idfk_examen_medico')";
    $query2 = mysqli_query($conexion,$medico_paraclinicos);

    if ($query2){   
      //Obtenemos El Ultimo ID Insertado
      $ver = "SELECT * FROM medico_paraclinicos ORDER BY `id` DESC limit 0,1";
      $queryid = mysqli_query ($conexion,$ver);
      $dataid = mysqli_fetch_array($queryid);
      $idfk_paraclinico = $dataid['id'];
    }else{
      echo "<script>alert('Error, Intente Nuevamente')</script>";
    }

    /*$remision = $_POST['remision'];
    $remision_desde = $_POST['remision_desde'];
    $remision_hacia = $_POST['remision_hacia'];
    $especialidad = $_POST['especialidad'];
    $remision_motivo = $_POST['remision_motivo'];
    $remision_pendiente = $_POST['remision_pendiente'];*/

    for($i=0; $i < count($_POST['remision_hacia']); $i++){
 
    //$a = $_POST['campo'][$i];

    $remision = $_POST['remision'][$i];
    $remision_desde = $_POST['remision_desde'][$i];
    $remision_hacia = $_POST['remision_hacia'][$i];
    $especialidad = $_POST['especialidad'][$i];
    $remision_motivo = $_POST['remision_motivo'][$i];
    $remision_pendiente = $_POST['remision_pendiente'][$i];

    $remision_medico = "INSERT INTO `medico_remision` (`id`,`remision`,`desde`,`hacia`,`especialidad`,`motivo`,`remision_pendiente`,`id_paraclinico`) 
    VALUES ('NULL','$remision','$remision_desde','$remision_hacia','$especialidad','$remision_motivo','$remision_pendiente','$idfk_paraclinico')";
    $query3 =mysqli_query($conexion,$remision_medico);
    }



    if ($query3){   
      //Obtenemos El Ultimo ID Insertado
      $ver = "SELECT * FROM medico_remision ORDER BY `id` DESC limit 0,1";
      $queryid = mysqli_query ($conexion,$ver);
      $dataid = mysqli_fetch_array($queryid);
      $idfk_remision = $dataid['id'];
    }else{
      echo "<script>alert('Error, Intente Nuevamente')</script>";
    }
    
    $trabajo_nivel = $_POST['trabajo_nivel'];
    $trabajo_altura = $_POST['trabajo_altura'];
    $trabajo_restricciones_no_interviene = $_POST['trabajo_restricciones_no_interviene'];
    $aplazado = $_POST['aplazado'];
    $nueva_valoracion = $_POST['nueva_valoracion'];
    $trabajo_limitaciones_si_interviene = $_POST['trabajo_limitaciones_si_interviene'];
    $apto = $_POST['apto'];

    $examen_diagnostico= $_POST['examen_diagnostico'];
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
    $em_alteraciones_salud = $_POST['em_alteraciones_salud'];

    $aptitud_laboral = "INSERT INTO `medico_concepto_aptitud_laboral`(`id`,`apto_trabajo_nivel`,`apto_trabajo_altura`,`apto_con_restricciones_no_intervienen`,`aplazado`,`nueva_valoracion`,`apto_con_limitaciones_si_intervienen`,`apto`,`examen_diagnostico`,`observaciones_aptitud_laboral`,`enfasis_osteomuscular`,`enfasis_cardiovascular`,`enfasis_pulmonar`,`enfasis_manipulacion_alimentos`,`enfasis_otros`,`ef_no_defectos`,`ef_disminuye_capacidad`,`ef_condiciones_agravarse`,`ef_condiciones_atendidas_por_eps`, `atencion_en_eps_antesingresar`, `em_alteracion_salud`, `id_remision`)
    VALUES ('NULL','$trabajo_nivel','$trabajo_altura','$trabajo_restricciones_no_interviene','$aplazado','$nueva_valoracion','$trabajo_limitaciones_si_interviene','$apto','$examen_diagnostico','$observaciones_aptitud_laboral','$osteomuscular_enfasis','$cardiovascular_enfasis','$pulmonar_enfasis','$manipulacion_alimento_enfasis','$otro_enfasis','$ef_no_defectos','$ef_disminuye_capacidad','$ef_condiciones_agravarse','$ef_condiciones_atendidas_eps_arl','$em_atencion_eps_arl_antes','$em_alteraciones_salud','$idfk_remision')";
    $query4 = mysqli_query($conexion,$aptitud_laboral); 

    if ($query4){   
      //Obtenemos El Ultimo ID Insertado
      $ver = "SELECT * FROM medico_concepto_aptitud_laboral ORDER BY `id` DESC limit 0,1";
      $queryid = mysqli_query ($conexion,$ver);
      $dataid = mysqli_fetch_array($queryid);
      $idfk_aptitud_laboral = $dataid['id'];
    }else{
      echo "<script>alert('Error, Intente Nuevamente')</script>";
    }

    $recomendacion_trabajador = $_POST['recomendacion_trabajador'];
    $recomendacion_empleador = $_POST['recomendacion_empleador'];
    $restriccion_trabajador = $_POST['restriccion_trabajador'];
    $restriccion_empleador = $_POST['restriccion_empleador'];
    $autorizacion = $_POST['autorizacion'];

    $recomendaciones_restricciones = "INSERT INTO `medico_recomendaciones_y_restricciones` (`id`,`reco_trabajador`,`reco_empleador`,`rest_trabajador`,`rest_empleador`,`autorizacion_manejo_informacion`,`id_aptitud_laboral`)
    VALUES ('NULL','$recomendacion_trabajador','$recomendacion_empleador','$restriccion_trabajador','$restriccion_empleador','$autorizacion','$idfk_aptitud_laboral')";
    $query5 = mysqli_query($conexion,$recomendaciones_restricciones);

    if ($query5){   
      //Obtenemos El Ultimo ID Insertado
      $ver = "SELECT * FROM medico_recomendaciones_y_restricciones ORDER BY `id` DESC limit 0,1";
      $queryid = mysqli_query ($conexion,$ver);
      $dataid = mysqli_fetch_array($queryid);
      $idfk_recomendaciones = $dataid['id'];
    }else{
      echo "<script>alert('Error, Intente Nuevamente')</script>";
    }

    $pve = $_POST['pve'];
    $pve_visual = $_POST['pve_visual'];
    $pve_auditivo = $_POST['pve_auditivo'];
    $pve_cardiovascular = $_POST['pve_cardiovascular'];
    $pve_respiratorio = $_POST['pve_respiratorio'];
    $pve_piel = $_POST['pve_piel'];
    $pve_psicologico = $_POST['pve_psicologico'];
    $pve_osteomuscular = $_POST['osteomuscular'];
    $pve_otro = $_POST['pve_otro'];

    $Pve = "INSERT INTO `medico_pve` (`id`,`pve`,`pve_visual`,`pve_auditivo`,`pve_cardiovascular`,`pve_respiratorio`,`pve_piel`,`pve_psicologico`,`pve_osteomuscular`,`pve_otro`,`fk_recomendaciones`)
    VALUES ('NULL','$pve','$pve_visual','$pve_auditivo','$pve_cardiovascular','$pve_respiratorio','$pve_piel','$pve_psicologico','$pve_osteomuscular','$pve_otro','$idfk_recomendaciones')";
    $query6 = mysqli_query($conexion,$Pve);

    $estado = "Atencion Finalizada";
    $horafinal = $_POST['horafinal'];

    $data = "UPDATE `db_estado_atencion` SET `medico`= '$estado' WHERE paciente = '$historiaid'"; 
    $queryestado = mysqli_query($conexion,$data);

    $data1 = "UPDATE `datos_basicos_atencion` SET `final_timemedico`= '$horafinal' WHERE id_datos_basicos = '$historiaid'"; 
    $querytime = mysqli_query($conexion,$data1);

    //-----------------------------------HEREEEEEEEEE----------------------
    if ($query1 && $query2 && $query3 && $query4 && $query5 && $query6 && $queryestado && $querytime) {
      echo "<script>alert('Datos Registrados Exitosamente')</script>";
      echo "<script>window.location = 'medico.php'</script>";
    }else{
      echo "<script>alert('Error query, Intente Nuevamente')</script>";
      echo "<script>window.location = 'medico.php'</script>"; 
    }
  }  
  
  //datos personales paciente
  $id = $_POST['cedula'];
  $fecharegistro = $_POST['fecha_registro'];

  $consult="SELECT * FROM datos_basicos AS db
    JOIN datos_complementarios AS dc ON db.fk_d_complementario = dc.id
    JOIN datos_basicos_tipo_documento AS dbtd ON dc.fk_tipo_documento = dbtd.idtd
    WHERE db.fecha ='$fecharegistro' AND dc.numero_documento=".$id."";
  $query = mysqli_query($conexion,$consult);

  if (mysqli_num_rows($query) > 0){
    //cuenta el numero de filas de la consulta
    while ($datos=mysqli_fetch_array($query)) {
      //datos personales
      $historia=$datos['id_historia'];

      $numero_documento= $datos['numero_documento'];

      $cargodesempenar= $datos['cargo_a_desempenar'];

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
    
?>

<body>
<br>
<div class="text-center text-info"><label>Registro Historia de Medica:</label></div>
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
              <td colspan="3"><?php echo $examen = $datos['motivo_evaluacion']; ?></td>

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

  <!--AUDIOMETRIAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA-->
  <div class="panel-group">
    <div class="panel panel-default">
      <div class="panel-heading" style="background: #F4FDFF;">
        <h4 class="panel-title">
          <a data-toggle="collapse" href="#collapse5"><div class="text-center"><span class="glyphicon glyphicon-arrow-down"></span> Diagnostico de Audiometria:</div></a>
        </h4>
      </div>
      <div id="collapse5" class="panel-collapse collapse" style="background: #F4FDFF;">
        <div class="panel-body">
          <?php 
            $consult="SELECT * FROM datos_basicos 
            JOIN audiometria_resultado_der  ON datos_basicos.id_historia = audiometria_resultado_der.paciente_audiometria
            JOIN audiometria_resultado_izq ON audiometria_resultado_izq.id_audiometria_paciente = audiometria_resultado_der.id 
            WHERE datos_basicos.id_historia=".$historia."  ";
            $query = mysqli_query($conexion,$consult);

            if (mysqli_num_rows($query) > 0){

            while ($datos=mysqli_fetch_array($query)) {
             
            ?>
            <div class=" col-sm-12">
              <div class="form-group"> 
                <div class="text-center text-info"><label>Otoscopia: </label></div>  
              </div> <!--container-->
                      
              <table class="table table-bordered">
                <thead>   
                  <!--<th>Resultados Examen de Audiometria</th>-->   
                </thead>
                <tbody>
                  <tr>
                    <th>OTOSCOPIA</th>
                    <th class="text-center">Pasa</th>
                    <th class="text-center">Hallazgos</th> 
                  </tr>
                  <tr>
                    <td><label>Oido Derecho</label></td>
                    <td><?php echo $datos['pasa_otoscopia']; ?></td> 
                    <td><?php echo $datos['hallazgo_der']; ?></td>  
                  </tr>
                  <tr>
                    <td><label>Oido Izquierdo</label></td>  
                    <td><?php echo $datos['pasa_otoscopia_izq']; ?></td>
                    <td><?php echo $datos['hallazgo_izq']; ?></td>
                  </tr>        
                </tbody>
              </table>
            </div> <!--fin col-sm-6-->
            <!---->
            <div class=" col-sm-12">          
            <table class="table table-bordered">
              <thead>   
                  <th class="text-center">Oidos</th>
                  <th class="text-center">250</th> 
                  <th class="text-center">500</th>
                  <th class="text-center">1000</th>
                  <th class="text-center">2000</th>  
                  <th class="text-center">4000</th>  
                  <th class="text-center">8000</th>
                  <th class="text-center">Promedio</th>  
              </thead>
              <tbody>
                <tr>
                </tr>
                <tr class="text-center">
                  <td><label>Oido Derecho</label></td>
                  <td><?php echo $datos['250']; ?></td> 
                  <td><?php echo $datos['500']; ?></td>
                  <td><?php echo $datos['1000']; ?></td>
                  <td><?php echo $datos['2000']; ?></td> 
                  <td><?php echo $datos['4000']; ?></td>
                  <td><?php echo $datos['8000']; ?></td> 
                  <td><?php echo $datos['resultado_promedio']; ?></td>
                </tr>
                <tr class="text-center">
                  <td><label>Oido Izquierdo</label></td> 
                  <td><?php echo $datos['250_izq']; ?></td> 
                  <td><?php echo $datos['500_izq']; ?></td>
                  <td><?php echo $datos['1000_izq']; ?></td>
                  <td><?php echo $datos['2000_izq']; ?></td> 
                  <td><?php echo $datos['4000_izq']; ?></td>
                  <td><?php echo $datos['8000_izq']; ?></td>
                  <td><?php echo $datos['resultado_promedio_izq']; ?></td>
                </tr>        
              </tbody>
            </table>
            </div>

            <div class="panel panel-default">
          <div class="panel-heading text-center"><label>Observaciones:</label></div>
          <div class="panel-body">
            <textarea class="form-control" rows="2"><?php echo $datos['observaciones']; ?></textarea>
          </div>
        </div> 

        <div class="panel panel-default">
          <div class="panel-heading text-center"><label>Evaluacion audiologica diagnostica:</label></div>
          <div class="panel-body">
            <textarea class="form-control"><?php echo $datos['evaluacion_diagnostica']; ?></textarea>
          </div>
        </div> 

        <div class="panel panel-default">
          <div class="panel-heading text-center"></div>
          <div class="panel-body">         
            <table class="table table-bordered">
              <thead>   
                <th class="text-center">Retamizaje</th> 
                <th class="text-center">Iterconsulta - otorrinolaringología</th>  
                <th class="text-center">Control en 1 Año</th>
              </thead>
              <tbody>
                <tr class="text-center">
                  <td><?php echo $datos['retamizaje']; ?> </td>
                  <td><?php echo $datos['interconsulta']; ?></td>
                  <td><?php echo $datos['control_anual']; ?></td> 
                </tr>
              </tbody>
            </table>
          </div>
        </div>
        <?php 
          }
          }
        ?>
        </div>
        <div class="panel-footer" style="background: #F4FDFF;">
          <a data-toggle="collapse" href="#collapse5">
            <div class="text-center"><span class="glyphicon glyphicon-arrow-up"></span> Minimizar Diagnostico de Audiometria</div>
          </a>
        </div>
      </div>
    </div>
  </div>    
  <!--AUDIOMETRIA FIN-->
  <!--VISIOMETRIAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA-->
  <div class="panel-group">
    <div class="panel panel-default">
      <div class="panel-heading" style="background: #F4FDFF;">
        <h4 class="panel-title">
          <a data-toggle="collapse" href="#collapse4">
            <div class="text-center">
              <span class="glyphicon glyphicon-arrow-down"></span> Diagnostico de Visiometria:
            </div>
          </a>
        </h4>
      </div>
      <div id="collapse4" class="panel-collapse collapse" style="background: #F4FDFF;">
        <div class="panel-body">
          <?php 
          $consult = "SELECT * FROM datos_basicos
          JOIN visiometria_campo_visual ON datos_basicos.id_historia = visiometria_campo_visual.paciente_visiometria 
          JOIN visiometria_vision_lejana ON visiometria_campo_visual.id = visiometria_vision_lejana.id_campo_visual
          JOIN visiometria_vision_proxima ON visiometria_vision_lejana.id = visiometria_vision_proxima.id_vision_lejana
          JOIN visiometria_percepciones_y_forias ON visiometria_vision_proxima.id = visiometria_percepciones_y_forias.id_vision_proxima
          /*JOIN visiometria_remisiones ON visiometria_percepciones_y_forias.id = visiometria_remisiones.id_percepciones_forias*/
          WHERE datos_basicos.id_historia = ".$historia." ";
          $query = mysqli_query($conexion,$consult);

          if (mysqli_num_rows($query)) {
            while ($datos=mysqli_fetch_array($query)) {
              ?>
              <div class="text-center"><label>Utiliza Prescripción Óptica:</label> <?php echo $datos['prescripcion_optica']; ?></div>
              <div class="col-sm-12">
                <div class="panel panel-default">
                  <div class="panel-heading">CAMPO VISUAL</div>
                  <div class="panel-body">    
                    <table class="table table-bordered text-center">
                      <thead>
                        <tr>
                          <th class="text-center">Campo Visual</th>
                          <th class="text-center">Ojo Derecho</th>
                          <th class="text-center">Ojo Izquierdo</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td><label>35° Nasal</label></td>
                          <td><label><?php echo $datos['35_nasal_derecho']; ?></label></td>
                          <td><label><?php echo $datos['35_nasal_izquierdo']; ?></label></td>
                        </tr>
                        <tr>
                          <td><label>55° Temporal</label></td>
                          <td><label><?php echo $datos['55_temporal_derecho']; ?></label></td>
                          <td><label><?php echo $datos['55_temporal_izquierdo']; ?></label></td>
                        </tr>
                        <tr>
                          <td><label>70° Temporal</label></td>
                          <td><label><?php echo $datos['70_temporal_derecho']; ?></label></td>
                          <td><label><?php echo $datos['70_temporal_izquierdo']; ?></label></td>
                        </tr>
                        <tr>
                          <td><label>85° Temporal</label></td>
                          <td><label><?php echo $datos['85_temporal_derecho']; ?></label></td>
                          <td><label><?php echo $datos['85_temporal_izquierdo']; ?></label></td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
                <br>
              </div>
              <!---->
              <div class="col-sm-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Resultado</div>
                    <div class="panel-body text-center">
                      <textarea  style="width: 1020px;" type="text" name="resultado_visiometria" rows="4" readonly="readonly"><?php echo $datos['resultado_visiometria']; ?></textarea>
                      <br><br>
                      <label>Alteracion Visual: </label> <?php echo $datos['alteracion_visual']; ?>
                    </div>
                </div>
              </div>
              <?php    
            }
          }
          ?> 
        </div>
        <div class="panel-footer" style="background: #F4FDFF;">
          <a data-toggle="collapse" href="#collapse4">
            <div class="text-center"><span class="glyphicon glyphicon-arrow-up"></span> Minimizar Diagnostico de Visiometria</div>
          </a>
        </div>
      </div>
    </div>
  </div>
  <!--VISIOMETRIA FINAL-->
  <!--ESPIROMETRIAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA-->
  <div class="panel-group">
    <div class="panel panel-default">
      <div class="panel-heading" style="background: #F4FDFF;">
        <h4 class="panel-title">
          <a data-toggle="collapse" href="#collapse3">
            <div class="text-center"><span class="glyphicon glyphicon-arrow-down"></span> Diagnostico de Espirometria:</div>
          </a>
        </h4>
      </div>
      <div id="collapse3" class="panel-collapse collapse" style="background: #F4FDFF;">
        <div class="panel-body">
          <?php 
            $consult="SELECT * FROM datos_basicos AS db
            JOIN datos_complementarios AS dc ON db.fk_d_complementario = dc.id
            JOIN datos_basicos_tipo_documento AS dbtd ON dc.fk_tipo_documento = dbtd.idtd
            JOIN espirometria AS e ON e.espirometria_paciente = db.id_historia
            WHERE db.id_historia='$historia' OR dc.numero_documento = '$historia' AND db.fecha = '$fecharegistro'";
            $query = mysqli_query($conexion,$consult);

            if (mysqli_num_rows($query) > 0){

              while ($datos=mysqli_fetch_array($query)) {
                //Examen Espirometria
                $examen_ruta = $datos['examen_ruta'];
                $ruta = 'archivos/archivo_p/'.$examen_ruta; ?>

                <!--1135 style="width:1100px; height:1175px;" frameborder="4"-->
                <iframe src='<?php echo $ruta ?>' class='d' id='frame'></iframe> 
                <li class="list-group-item"><strong>Descargar Resultado: </strong>
                  <a download href="<?php echo '$ruta'.$examen_ruta; ?>">Download 
                    <span class="glyphicon glyphicon-cloud-download"></span>
                  </a>
                </li> 

                <?php 
              }
            }
            ?>  
        </div>
        <div class="panel-footer" style="background: #F4FDFF;">
          <a data-toggle="collapse" href="#collapse3">
            <div class="text-center"><span class="glyphicon glyphicon-arrow-up"></span> Minimizar Diagnostico de Espirometria</div>
          </a>
        </div>
      </div>
    </div>
  </div>
  <!--ESPIROMETRIA FINAL-->
  <!--PSICOLOGIAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA-->
  <div class="panel-group">
    <div class="panel panel-default">
      <div class="panel-heading" style="background: #F4FDFF;">
        <h4 class="panel-title">
          <a data-toggle="collapse" href="#collapse2"><div class="text-center"><span class="glyphicon glyphicon-arrow-down"></span> Diagnostico de Psicologia:</div></a>
        </h4>
      </div>
      <div id="collapse2" class="panel-collapse collapse" style="background: #F4FDFF;">
        <div class="panel-body">
          <?php 
          $consult="SELECT * FROM datos_basicos 
          JOIN psicologia_examen_estado_mental ON psicologia_examen_estado_mental.paciente_psicologia = datos_basicos.id_historia
          WHERE datos_basicos.id_historia=".$historia."";
          $query = mysqli_query($conexion,$consult);
          if (mysqli_num_rows($query) > 0){
            while ($datos=mysqli_fetch_array($query)) {
            ?>
              <div class="panel panel-default">
                <div class="panel-heading text-center"><div class="text-info"></div></div>
                <div class="panel-body">
                  <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th class="text-center">Procesos</th>
                        <th>Diagnostico</th>
                        <th class="text-center">Hallazgo</th>
                      </tr>
                    </thead>
                    <tbody class="text-center">
                      <tr>
                        <td style="width: 185px;"><label>Orientacion:</label></td>
                        <td><?php echo $datos['orientacion']; ?></td>
                        <td>
                          <textarea style="width: 780px;" class="form-control" type="text" name="orientacion_hallazgo"><?php echo $datos['orientacion_hallazgo']; ?></textarea>
                        </td>
                      </tr>
                      <tr>
                        <td><label>Atencion Concentracion:</label></td>
                        <td><?php echo $datos['atencion_concentracion']; ?></td>
                        <td><textarea style="width: 780px;" class="form-control" type="text" name="atencion_hallazgo"><?php echo $datos['atencion_concentracion_hallazgo']; ?></textarea></td>
                      </tr>
                      <tr>
                        <td><label>Sensopercepcion:</label></td>
                        <td><?php echo $datos['sensopercepcion']; ?></td>
                        <td><textarea style="width: 780px;" class="form-control" type="text" name="sensopercepcion_hallazgo"><?php echo $datos['sensopercepcion_hallazgo']; ?></textarea></td>
                      </tr>
                      <tr>
                        <td><label>Memoria:</label></td>
                        <td><?php echo $datos['memoria']; ?></td>
                        <td><textarea style="width: 780px;" class="form-control" type="text" name="memoria_hallazgo"><?php $datos['memoria_hallazgo']; ?></textarea></td>
                      </tr>
                      <tr>
                        <td><label>Pensamiento:</label></td>
                        <td><?php echo $datos['pensamiento']; ?></td>
                        <td><textarea style="width: 780px;" class="form-control" type="text" name="pensamiento_hallazgo"><?php echo $datos['pensamiento_hallazgo']; ?></textarea></td>
                      </tr>
                      <tr>
                        <td><label>Lenguaje:</label></td>
                        <td><?php echo $datos['lenguaje']; ?></td>
                        <td><textarea style="width: 780px;" class="form-control" type="text" name="lenguaje_hallazgo"><?php echo $datos['lenguaje_hallazgo']; ?></textarea></td>
                      </tr>
                      <tr>
                        <td><label>Concepto:</label></td>
                        <td colspan="3"><textarea style="width: 880px;" class="form-control"><?php echo $datos['concepto']; ?></textarea></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
              <?php 
            }
          }
          ?>
        </div>
        <div class="panel-footer" style="background: #F4FDFF;">
          <a data-toggle="collapse" href="#collapse2">
            <div class="text-center"><span class="glyphicon glyphicon-arrow-up"></span> Minimizar Diagnostico de Psicologia</div>
          </a>
        </div>
      </div>
    </div>
  </div>

<!--PSICOLOGIA FINAL-->
<!--ENFERMERAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA-->
  <div class="panel-group">
    <div class="panel panel-default">
      <div class="panel-heading" style="background: #F4FDFF;">
        <h4 class="panel-title">
          <a data-toggle="collapse" href="#collapse1"><div class="text-center"><span class="glyphicon glyphicon-arrow-down"></span> Historia de Enfermeria:</div></a>
        </h4>
      </div>
      <div id="collapse1" class="panel-collapse collapse" style="background: #F4FDFF;">
    <div class="panel-body">

  <?php 
    $consult="SELECT * FROM datos_basicos AS db 
    JOIN datos_complementarios AS dc ON db.fk_d_complementario = dc.id
    JOIN datos_basicos_tipo_documento AS dbtd ON dc.fk_tipo_documento = dbtd.idtd
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
    WHERE  db.id_historia = '$historia' ";
    $query = mysqli_query($conexion,$consult);
    if (mysqli_num_rows($query) > 0){ 
      while ($datos=mysqli_fetch_array($query)) {
  ?>
  <div class="panel panel-default">
    <div class="panel-heading"><div class="text-center"><label>Historia Laboral:</label> (<?php echo $datos['historia_laboral']; ?>)</div></div>
    <div class="panel-body">
             
      <table class="table table-bordered">
        <thead>
          <th class="text-center">Cargo:</th>
          <th class="text-center">Turno:</th>
          <th class="text-center">Años en la empresa:</th>
          <th class="text-center">Dependencia:</th>
        </thead>
        <tbody>
          <tr>
            <td><?php echo $datos['cargo']; ?></td> 
            <td><?php echo $datos['turno']; ?></td>
            <td><?php echo $datos['anos_en_empresa']; ?></td>
            <td><?php echo $datos['dependencia']; ?></td>
          </tr>
          <thead>
            <th class="text-center">Acciones:</th>
            <th colspan="4" class="text-center">Actividades:</th>
          </thead>
          <tr>
            <td><textarea class="form-control" rows="3"><?php echo $datos['acciones']; ?></textarea></td>
            <td colspan="3"><textarea class="form-control" rows="2"><?php echo $datos['actividades']; ?></textarea></td>
          </tr>
          <thead>
            <th colspan="4" class="text-center">Descripcion de cargo:</th>
          </thead>
          <tr>
            <td colspan="4"><textarea class="form-control" rows="2"><?php echo $datos['descripcion_cargo']; ?></textarea></td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>

  <div class="panel panel-default">
    <div class="panel-heading text-center"><label>Exposicion  a factores de riesgo: </label> (<?php echo $datos['factores_riesgos']; ?>)</div>
    <div class="panel-body">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>Empresa</th>
            <th class="text-center">F</th>
            <th class="text-center">Q</th>
            <th class="text-center">B</th>
            <th class="text-center">ERG</th>
            <th class="text-center">MEC</th>
            <th class="text-center">PSC</th>
            <th class="text-center">ELEC</th>
            <th>Otros</th>
            <th>Cargo</th>
            <th>Tiempo</th>
            <th>Proteccion Personal</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td><textarea class="form-control" rows="2"><?php echo $datos['empresa1']; ?></textarea></td>
            <td class="text-center P"> <?php echo $datos['fisico1']; ?></td>
            <td class="text-center P"> <?php echo $datos['quimico1']; ?></td>
            <td class="text-center P"> <?php echo $datos['biologico1']; ?></td>
            <td class="text-center P"> <?php echo $datos['ergonomico1']; ?></td>
            <td class="text-center P"> <?php echo $datos['mecanico1']; ?></td>
            <td class="text-center P"> <?php echo $datos['psicosocial1']; ?></td>
            <td class="text-center P"> <?php echo $datos['electrico1']; ?></td>
            <td class="text-center"><textarea class="form-control" rows="2"><?php echo $datos['otros1']; ?></textarea></td>
            <td><textarea class="form-control" rows="2"><?php echo $datos['cargo1']; ?></textarea></td>
            <td><div class="P"><?php echo $datos['tiempo1']; ?></div></td>
            <td><textarea class="form-control" rows="2"><?php echo $datos['proteccion_personal1']; ?></textarea></td>
          </tr>
          <tr>
            <td><textarea class="form-control" rows="2"><?php echo $datos['empresa2']; ?></textarea></td>
            <td class="text-center P"> <?php echo $datos['fisico2']; ?></td>
            <td class="text-center P"> <?php echo $datos['quimico2']; ?></td>
            <td class="text-center P"> <?php echo $datos['biologico2']; ?></td>
            <td class="text-center P"> <?php echo $datos['ergonomico2']; ?></td>
            <td class="text-center P"> <?php echo $datos['mecanico2'];?></td>
            <td class="text-center P"> <?php echo $datos['psicosocial2']; ?></td>
            <td class="text-center P"> <?php echo $datos['electrico2']; ?></td>
            <td class="text-center"><textarea class="form-control" rows="2"><?php echo $datos['otros2']; ?></textarea></td>
            <td><textarea class="form-control" rows="2"><?php echo $datos['cargo2']; ?></textarea></td>
            <td><div class="P"><?php echo $datos['tiempo2']; ?></div></td>
            <td><textarea class="form-control" rows="2"><?php echo $datos['proteccion_personal2']; ?></textarea></td>
          </tr>
          <tr>
            <td><textarea class="form-control" rows="2"><?php echo $datos['empresa3']; ?></textarea></td>
            <td class="text-center P"> <?php echo $datos['fisico3']; ?></td>
            <td class="text-center P"> <?php echo $datos['quimico3']; ?></td>
            <td class="text-center P"> <?php echo $datos['biologico3']; ?></td>
            <td class="text-center P"> <?php echo $datos['ergonomico3']; ?></td>
            <td class="text-center P"> <?php echo $datos['mecanico3']; ?></td>
            <td class="text-center P"> <?php echo $datos['psicosocial3']; ?></td>
            <td class="text-center P"> <?php echo $datos['electrico3']; ?></td>
            <td class="text-center"><textarea class="form-control" rows="2"><?php echo $datos['otros3']; ?></textarea></td>
            <td><textarea class="form-control" rows="2"><?php echo $datos['cargo3']; ?></textarea></td>
            <td><div class="P"><?php echo $datos['tiempo3']; ?></div></td>
            <td><textarea class="form-control" rows="2"><?php echo $datos['proteccion_personal3']; ?></textarea></td>
          </tr>
          <tr>
            <td><textarea class="form-control" rows="2"><?php echo $datos['empresa4']; ?></textarea></td>
            <td class="text-center P"> <?php echo $datos['fisico4']; ?></td>
            <td class="text-center P"> <?php echo $datos['quimico4']; ?></td>
            <td class="text-center P"> <?php echo $datos['biologico4']; ?></td>
            <td class="text-center P"> <?php echo $datos['ergonomico4']; ?></td>
            <td class="text-center P"> <?php echo $datos['mecanico4'];?></td>
            <td class="text-center P"> <?php echo $datos['psicosocial4']; ?></td>
            <td class="text-center P"> <?php echo $datos['electrico4']; ?></td>
            <td class="text-center"><textarea class="form-control" rows="2"><?php echo $datos['otros4']; ?></textarea></td>
            <td><textarea class="form-control" rows="2"><?php echo $datos['cargo4']; ?></textarea></td>
            <td> <div class="P"><?php echo $datos['tiempo4']; ?></div></td>
            <td><textarea class="form-control" rows="2"><?php echo $datos['proteccion_personal4']; ?></textarea></td>
          </tr>
          <tr>
            <td><textarea class="form-control" rows="2"><?php echo $datos['empresa5']; ?></textarea></td>
            <td class="text-center P"> <?php echo $datos['fisico5']; ?></td>
            <td class="text-center P"> <?php echo $datos['quimico5']; ?></td>
            <td class="text-center P"> <?php echo $datos['biologico5']; ?></td>
            <td class="text-center P"> <?php echo $datos['ergonomico5']; ?></td>
            <td class="text-center P"> <?php echo $datos['mecanico5']; ?></td>
            <td class="text-center P"> <?php echo $datos['psicosocial5']; ?></td>
            <td class="text-center P"> <?php echo $datos['electrico5']; ?></td>
            <td class="text-center"><textarea class="form-control" rows="2"><?php echo $datos['otros5']; ?></textarea></td>
            <td><textarea class="form-control" rows="2"><?php echo $datos['cargo5']; ?></textarea></td>
            <td> <div class="P"><?php echo $datos['tiempo5']; ?></div></td>
            <td><textarea class="form-control" rows="2"><?php echo $datos['proteccion_personal5']; ?></textarea></td>
          </tr>
        </tbody>
      </table>
      <div class="text-center"><label>F:</label> Fisico | <label>Q:</label> Quimico | <label>B:</label> Biologico | <label>ERG:</label> Ergonomico | <label>MEC:</label> Mecanico | <label>PSC:</label> Psicosocial | <label>ELEC:</label> Electrico</div>
      <br>
    </div>
  </div>

  <div class="panel panel-default">
    <div class="panel-heading text-center">
      <label>Antecedentes Personales-Familiares: </label>
    </div>
    <div class="panel-body">
      <table class="table table-bordered">
        <thead>
          <th class="text-center">Infancia: </th>
          <th class="text-center">Enfermedad Cardiaca: </th>
          <th class="text-center">Trauma:</th>
          <th class="text-center">Enfermedad Transmision Sexual:</th>
          <th class="text-center">Vacunas y Dosis:</th>
          <th class="text-center">Toxicos:</th>
        </thead>
        <tbody>
          <tr class="text-center">
            <td><?php echo $datos['infancia']; ?></td>
            <td><?php echo $datos['enf_cardiaca']; ?></td>
            <td><?php echo $datos['trauma']; ?></td>
            <td><?php echo $datos['enf_transmision_sexual']; ?></td>
            <td><?php echo $datos['vacunas_dosis']; ?></td>
            <td><?php echo $datos['toxicos']; ?></td>
          </tr>
          <thead>
            <th class="text-center">Hipertensión Arterial:</th>
            <th class="text-center">Enfermedad Piel y Anexos:</th>
            <th class="text-center">Enfermedad Vias Renales:</th>
            <th class="text-center">Enfermedad Pulmonar:</th>
            <th class="text-center">Enfermedad Acido Pèptica:</th>
            <th class="text-center">Enfermedad Mental:</th>
          </thead>
          <tr class="text-center">
            <td><?php echo $datos['hipertension_arterial']; ?></td>
            <td><?php echo $datos['enf_piel_anexos']; ?></td>
            <td><?php echo $datos['enf_vias_renal']; ?></td>
            <td><?php echo $datos['enf_pulmonar']; ?></td>
            <td><?php echo $datos['enf_acido_peptica']; ?></td>
            <td><?php echo $datos['enf_mental']; ?></td>
          </tr>
          <thead>
            <th class="text-center">Alergias:</th>
            <th class="text-center">Hernias:</th>
            <th class="text-center">Enf-Oido-Nariz-Laringe:</th>
            <th class="text-center">Enfermedades Visuales:</th>
            <th class="text-center">Diabetes:</th>
            <th class="text-center">Enf. Hematicos:</th>
          </thead>
          <tr class="text-center">
            <td><?php echo $datos['alergias'];?></td>
            <td><?php echo $datos['hernias']; ?></td>
            <td><?php echo $datos['enf_oido_nariz_laringe']; ?></td>
            <td><?php echo $datos['enf_visual']; ?></td>
            <td><?php echo $datos['diabetes']; ?></td>
            <td><?php echo $datos['enf_hematicos']; ?></td>
          </tr>
          <thead>
            <th class="text-center">Cirugias:</th>
            <th class="text-center">Tunel del Carpo:</th>
            <th class="text-center">Enfermedad Vascular:</th>
            <th class="text-center">Varicocele:</th>
            <th class="text-center">Enfermedad Hepatica:</th>
            <th class="text-center">Osteomuscular:</th>
          </thead>
          <tr class="text-center">
            <td><?php echo $datos['cirugias']; ?></td>
            <td><?php echo $datos['tunel_carpo']; ?></td>
            <td><?php echo $datos['enf_vascular']; ?></td>
            <td><?php echo $datos['varicocele']; ?></td>
            <td><?php echo $datos['enf_hepatica']; ?></td>
            <td><?php echo $datos['osteomuscular']; ?></td>             
          </tr>
          <thead>
            <th class="text-center">Hospitalizaciones:</th>
            <th class="text-center">Enfermedad Quervein:</th>
            <th class="text-center">Lumbalgias:</th>
            <th class="text-center">Cancer:</th>
            <th class="text-center">Fracturas:</th>
            <th class="text-center">Dislipidemias:</th>
          </thead>
          <tr class="text-center">
            <td><?php echo $datos['hospitalizaciones']; ?></td>
            <td><?php echo $datos['enf_quervein']; ?></td>
            <td><?php echo $datos['lumbalgias']; ?></td>
            <td><?php echo $datos['cancer']; ?></td>
            <td><?php echo $datos['fracturas']; ?></td>
            <td><?php echo $datos['dislipidemias']; ?></td>
          </tr>
        </tbody>
      </table>
      <table class="table table-bordered" class="container col-sm-12"> 
        <thead>
          <th class="text-center">Observaciones:</th>
        </thead>
        <tbody>
          <tr>    
            <td><textarea class="form-control" rows="3"><?php echo $datos['ant_observaciones']; ?></textarea>
            </td>
          </tr> 
        </tbody>            
      </table>
      <table class="table table-bordered">    
        <tbody>
          <tr>
            <td style="width: 160px;">
              <div style="padding-top: 10px;" class="form-inline"><label>Familiar:</label>
                <?php echo $datos['familiar_ant']; ?>
              </div>
            </td>
            <td>
              <textarea class="form-control" type="text" name="ant_familiar_descripcion" rows="2"><?php echo $datos['desc_ant_familiar']; ?></textarea>
            </td>
          </tr>
          <tr>
            <td>
              <div style="padding-top: 10px;" class="form-inline"><label>Personal:</label>
                <?php echo $datos['personal_ant']; ?>
              </div>
            </td>
            <td>
              <textarea class="form-control" type="text" name="ant_personal_descripcion" rows="2"><?php echo $datos['desc_ant_per']; ?></textarea>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>

  <div class="panel-group">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" href="#collapse1"><div class="text-center">Antecedentes Ginecologicos:</div></a>
        </h4>
      </div>
      <div id="collapse1" class="panel-collapse collapse">
        <div class="panel-body">
          <table class="table table-bordered">
            <thead>
              <th class="text-center">Menarquia:</th>
              <th class="text-center">Ciclos:</th>
              <th class="text-center">Planifica:</th>
              <th class="text-center">Metodo</th>
              <th colspan="2" class="text-center">Ficha Obstetrica:</th>
            </thead>
            <tbody>
              <tr class="text-center">
                <td><?php echo $datos['menarquia']; ?></td>
                <td><?php echo $datos['ciclos']; ?></td>
                <td><?php echo $datos['planifica']; ?></td>
                <td><textarea class="form-control" rows="2"><?php $datos['metodo']; ?></textarea></td>
                <td colspan="2"><textarea class="form-control" rows="2"><?php echo $datos['ficha_obstetrica']; ?></textarea></td> 
              </tr>
              <thead>
                <th class="text-center">Ultima Mestruacion:</th>
                <th class="text-center">Ultima Citologia:</th>
                <th class="text-center">Resultado:</th>
                <th class="text-center">Flujo Vagina:</th>
                <th class="text-center">Dolor Pelvico:</th>
                <th class="text-center">Dolor Senos:</th>
              </thead>
              <tr class="text-center">
                <td><?php echo $datos['ultima_mestruacion']; ?></td>
                <td><?php echo $datos['ultima_citologia']; ?></td>
                <td><?php echo $datos['resultado']; ?></td>
                <td><?php echo $datos['flujo_vaginal']; ?></td>
                <td><?php echo $datos['dolor_pelvico']; ?></td>
                <td><?php echo $datos['dolor_senos']; ?></td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

  <div class="panel panel-default">
    <div class="panel-heading">
      <div class="text-center"><label>Uso de Elementos de Proteccion Personal: </label> (<?php echo $datos['uso_proteccion']; ?>)</div>
    </div>
    <div class="panel-body">
      <table class="table table-bordered">
        <thead>
          <th class="text-center">En el Cargo o Empresa:</th>
          <th class="text-center">Actual:</th>
          <th class="text-center">Casco:</th>
          <th class="text-center">Botas:</th>
          <th class="text-center">Gafas:</th>
          <th class="text-center">Tapabocas:</th>
          <th class="text-center">Overol:</th>
        </thead>
        <tbody>
          <tr class="text-center">
            <td><?php echo $datos['cargo_o_empresa']; ?></td>
            <td><?php echo $datos['actual']; ?></td>
            <td><?php echo $datos['casco']; ?></td>
            <td><?php echo $datos['botas']; ?></td>
            <td><?php echo $datos['gafas']; ?></td>
            <td><?php echo $datos['tapabocas']; ?></td>
            <td><?php echo $datos['overol']; ?></td>
          </tr>
          <thead>
            <th class="text-center">Protectores Auditivos:</th>
            <th class="text-center">Protectores Respiratorios:</th>
            <th class="text-center">Otros:</th>
            <th colspan="2" class="text-center">Son Adecuados?:</th>
            <th class="text-center">Todas:</th>
            <th class="text-center">Solo:</th>
          </thead>
          <tr class="text-center">
            <td><div class="P"><?php echo $datos['protectores_auditivos']; ?></div></td>
            <td><div class="P"><?php echo $datos['protectores_respiratorios']; ?></div></td>
            <td><textarea class="form-control" rows="2"><?php echo $datos['otros']; ?></textarea></td>
            <td colspan="2"><div class="P"><?php echo $datos['adecuados']; ?></div></td>
            <td><div class="P"><?php echo $datos['todas']; ?></div></td>
            <td><textarea class="form-control" rows="2"><?php echo $datos['solo']; ?></textarea></td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>

  <div class="panel panel-default">
    <div class="panel-heading">
      <div class="text-center"><label>Accidentes de Trabajo: </label> (<?php echo $datos['accidentes_trabajo']; ?>)</div>
    </div>
    <div class="panel-body">   
      <table class="table table-bordered">
        <thead>
          <tr>
            <th class="text-center">Fecha</th>
            <th class="text-center">Empresa</th>
            <th class="text-center">Causa</th>
            <th class="text-center">Lesion</th>
            <th class="text-center">Parte Afectada</th>
            <th class="text-center">Incapacidad</th>
            <th class="text-center">Secuela</th>
          </tr>
        </thead>
        <tbody class="text-center">
          <tr>
            <td><div class="P"><?php echo $datos['fecha1']; ?></div></td>
            <td><textarea class="form-control" rows="2"><?php echo $datos['ac_empresa1']; ?></textarea></td>
            <td><textarea class="form-control" rows="2"><?php echo $datos['causa1']; ?></textarea></td>
            <td><div class="P"><?php echo $datos['lesion1']; ?></div></td>
            <td><textarea class="form-control" rows="2"><?php echo $datos['parte_afectada1']; ?></textarea></td>
            <td><div class="P"><?php echo $datos['incapacidad1']; ?></div></td>
            <td><div class="P"><?php echo $datos['secuela1']; ?></div></td>
          </tr>
          <tr>
            <td><div class="P"><?php echo $datos['fecha2']; ?></div></td>
            <td><textarea class="form-control" rows="2"><?php echo $datos['ac_empresa2']; ?></textarea></td>
            <td><textarea class="form-control" rows="2"><?php echo $datos['causa2']; ?></textarea></td>
            <td><div class="P"><?php echo $datos['lesion2']; ?></div></td>
            <td><textarea class="form-control" rows="2"><?php echo $datos['parte_afectada2']; ?></textarea></td>
            <td><div class="P"><?php echo $datos['incapacidad2']; ?></div></td>
            <td><div class="P"><?php echo $datos['secuela2']; ?></div></td>
          </tr>
          <tr>
            <td><div class="P"><?php echo $datos['fecha3']; ?></div></td>
            <td><textarea class="form-control" rows="2"><?php echo $datos['ac_empresa3']; ?></textarea></td>
            <td><textarea class="form-control" rows="2"><?php echo $datos['causa3']; ?></textarea></td>
            <td><div class="P"><?php echo $datos['lesion3']; ?></div></td>
            <td><textarea class="form-control" rows="2"><?php echo $datos['parte_afectada3']; ?></textarea></td>
            <td><div class="P"><?php echo $datos['incapacidad3']; ?></div></td>
            <td><div class="P"><?php echo $datos['secuela3']; ?></div></td>
          </tr>
          <tr>
            <td><div class="P"><?php echo $datos['fecha4']; ?></div></td>
            <td><textarea class="form-control" rows="2"><?php echo $datos['ac_empresa4'];?></textarea></td>
            <td><textarea class="form-control" rows="2"><?php echo $datos['causa4']; ?></textarea></td>
            <td><div class="P"><?php echo $datos['lesion4']; ?></div></td>
            <td><textarea class="form-control" rows="2"><?php echo $datos['parte_afectada4']; ?></textarea></td>
            <td><div class="P"><?php echo $datos['incapacidad4']; ?></div></td>
            <td><div class="P"><?php echo $datos['secuela4']; ?></div></td>
          </tr>
          <tr>
            <td><div class="P"><?php echo $datos['fecha5']; ?></div></td>
            <td><textarea class="form-control" rows="2"><?php echo $datos['ac_empresa5']; ?></textarea></td>
            <td><textarea class="form-control" rows="2"><?php echo $datos['causa5'];?></textarea></td>
            <td><div class="P"><?php echo $datos['lesion5']; ?></div></td>
            <td><textarea class="form-control" rows="2"><?php echo $datos['parte_afectada5']; ?></textarea></td>
            <td><div class="P"><?php echo $datos['incapacidad5']; ?></div></td>
            <td><div class="P"><?php echo $datos['secuela5']; ?></div></td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>

  <div class="panel panel-default">
    <div class="panel-heading">
      <div class="text-center"><label>Enfermedad Profesional: </label> (<?php echo $datos['enfermedad_profesional']; ?>)</div>
    </div>
    <div class="panel-body">  
      <table class="table table-bordered">
        <thead>
          <tr>
            <th class="text-center">Fecha</th>
            <th class="text-center">Empresa</th>
            <th class="text-center">Diagnostico</th>
            <th class="text-center">ARL</th>
            <th class="text-center">Reubicacion</th>
            <th class="text-center">Pension</th>
          </tr>
        </thead>
        <tbody class="text-center">
          <tr>
            <td><div class="P"><?php echo $datos['en_fecha1']; ?></div></td>
            <td><textarea class="form-control" rows="2"><?php echo $datos['en_empresa1']; ?></textarea></td>
            <td><textarea class="form-control" rows="2"><?php echo $datos['diagnostico1']; ?></textarea></td>
            <td><div class="P"><?php echo $datos['arl1']; ?></div></td>
            <td><div class="P"><?php echo $datos['reubicacion1']; ?></div></td>
            <td><div class="P"><?php echo $datos['pension1']; ?></div></td>
          </tr>
          <tr>
            <td><div class="P"><?php echo $datos['en_fecha2']; ?></div></td>
            <td><textarea class="form-control" rows="2"><?php echo $datos['en_empresa2']; ?></textarea></td>
            <td><textarea class="form-control" rows="2"><?php echo $datos['diagnostico2']; ?></textarea></td>
            <td><div class="P"><?php echo $datos['arl2']; ?></div></td>
            <td><div class="P"><?php echo $datos['reubicacion2']; ?></div></td>
            <td><div class="P"><?php echo $datos['pension2']; ?></div></td>
          </tr>
          <tr>
            <td><div class="P"><?php echo $datos['en_fecha3']; ?></div></td>
            <td><textarea class="form-control" rows="2"><?php echo $datos['en_empresa3']; ?></textarea></td>
            <td><textarea class="form-control" rows="2"><?php echo $datos['diagnostico3']; ?></textarea></td>
            <td><div class="P"><?php echo $datos['arl3']; ?></div></td>
            <td><div class="P"><?php echo $datos['reubicacion3']; ?></div></td>
            <td><div class="P"><?php echo $datos['pension3']; ?></div></td>
          </tr>
          <tr>
            <td><div class="P"><?php echo $datos['en_fecha4']; ?></div></td>
            <td><textarea class="form-control" rows="2"><?php echo $datos['en_empresa4'];?></textarea></td>
            <td><textarea class="form-control" rows="2"><?php echo $datos['diagnostico4']; ?></textarea></td>
            <td><div class="P"><?php echo $datos['arl4']; ?></div></td>
            <td><div class="P"><?php echo $datos['reubicacion4']; ?></div></td>
            <td><div class="P"><?php echo $datos['pension4']; ?></div></td>
          </tr>
          <tr>
            <td><div class="P"><?php echo $datos['en_fecha5']; ?></div></td>
            <td><textarea class="form-control" rows="2"><?php echo $datos['en_empresa5']; ?></textarea></td>
            <td><textarea class="form-control" rows="2"><?php echo $datos['diagnostico5']; ?></textarea></td>
            <td><div class="P"><?php echo $datos['arl5']; ?></div></td>
            <td><div class="P"><?php echo $datos['reubicacion5']; ?></div></td>
            <td><div class="P"><?php echo $datos['pension5']; ?></div></td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>

  <div class="panel panel-default">
    <div class="panel-heading">
      <div class="text-center">
        <label>Habitos Saludables: </label>
      </div>
    </div>
    <div class="panel-body">
      <table class="table table-bordered">
        <thead>
          <th class="text-center">Realiza algun deporte:</th>
          <th class="text-center">Cuales Deportes?:</th>
          <th class="text-center">Sedentario:</th>
        </thead>
        <tbody class="text-center">
          <tr>
            <td><div class="P"><?php echo $datos['practica_deporte']; ?></div></td>
            <td><textarea class="form-control" rows="2"><?php echo $datos['cuales']; ?></textarea></td>
            <td><div class="P"><?php echo $datos['sedentario']; ?></div></td>
          </tr>
          <thead>
            <th class="text-center">Ejercicio CardioPulmonar:</th>
            <th class="text-center">Otros Habitos Saludables:</th>
            <th class="text-center">Frecuencia:</th>
          </thead>
          <tr class="text-center">
            <td><div class="P"><?php echo $datos['ejercicio_cardiopulmonar']; ?></div></td>
            <td><textarea class="form-control" rows="2"><?php echo $datos['ejercicio_otro']; ?></textarea></td>
            <td><div class="P"><?php echo $datos['frecuencia_ejercicio']; ?></div></td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>

  <div class="panel panel-default">
    <div class="panel-heading">
      <div class="text-center">
        <label>Habitos Toxicos: </label>
      </div>
    </div>
    <div class="panel-body">
      <table class="table table-bordered">
        <thead>
          <th class="text-center">Fuma:</th>
          <th class="text-center">Fumador:</th>
          <th class="text-center">Años-Fumandor:</th>
          <th class="text-center">Ex-Fumador:</th>
          <th class="text-center">ExFumador Años:</th>
          <th class="text-center">Cantidad de Cigarrillos al Dia</th>
        </thead>
        <tbody class="text-center">
          <tr>
            <td><?php echo $datos['fuma']; ?></td>
            <td><?php echo $datos['fumador']; ?> </td>
            <td><?php echo $datos['fumador_anos']; ?></td>
            <td><?php echo $datos['exfumador']; ?> </td> 
            <td><?php echo $datos['exfumador_anos']; ?></td>
            <td><?php echo $datos['cant_cigarrillos_dia']; ?></td>
          </tr>
          <thead>
            <th class="text-center">Toma Habitualmente:</th>
            <th class="text-center">Años - Habito:</th>
            <th class="text-center">Frecuencia:</th>
            <th class="text-center" colspan="4">Tipo Licor:</th>
          </thead>
          <tr class="text-center">
            <td><?php echo $datos['beber_habitualmente']; ?></td><!--hereeeeeeeeeeee-->
            <td><?php echo $datos['anos_habito_beber']; ?></td>
            <td><?php echo $datos['frecuencia_beber']; ?></td>
            <td colspan="4"><?php echo $datos['tipo_licor']; ?></td>
          </tr>
          <thead>
            <th class="text-center">Problemas con Bebidas:</th>
            <th colspan="3" class="text-center">Cuales?:</th>
            <th class="text-center">Exbebedor:</th>
            <th class="text-center">Nº Años:</th>
          </thead>
            <tr class="text-center">
              <td class="text-center"><?php echo $datos['problemas_con_bebidas']; ?><br>
              <td colspan="3" class="text-center"><?php echo $datos['cuales_bebidas_problemas']; ?></td>
              <td class="text-center"><?php echo $datos['exbebedor']; ?></td>
              <td class="text-center"><?php echo $datos['anos_exbebedor']; ?></td>
            </tr>
          <thead>
            <th class="text-center">Otros Habitos Toxicos:</th>
            <th colspan="2" class="text-center">¿Cuales Habitos Toxicos?: </th>
            <th class="text-center">Medicamento Regularmente:</th>
            <th colspan="2" class="text-center">¿Cuales Medicamentos?:</th>
          </thead>
            <tr class="text-center">
              <td><?php echo $datos['otros_habitos_toxicos']; ?></td>
              <td colspan="2"><textarea class="form-control" rows="2"><?php echo $datos['cuales_habitos_tox']; ?></textarea></td>
              <td><?php echo $datos['medicamento_regularmente']; ?></td>
              <td colspan="2"><textarea class="form-control" rows="2"><?php echo $datos['cuales_medicamentos']; ?></textarea></td>
            </tr>
        </tbody>
      </table>

      <table class="table table-bordered">
        <thead>
          <th class="text-center">Pendiente Cirugias en su EPS:</th>
          <th class="text-center">Cual?:</th>
          <th class="text-center">Pendiente Algun Tratamiento:</th>
          <th class="text-center">Cual?:</th>
        </thead>
        <tbody class="text-center">
          <tr>
            <td><?php echo $datos['cirugias_en_eps']; ?></td>
            <td><textarea class="form-control" rows="3"><?php echo $datos['cuales_cirugias']; ?></textarea></td>
            <td><?php echo $datos['tratamiento_pendiente']; ?></td>
            <td><textarea class="form-control" rows="3"><?php echo $datos['cuales_tratamientos']; ?></textarea></td>
          </tr>
          <thead>
            <th class="text-center">Incapacidad en estos 6 Meses:</th>
            <th class="text-center" colspan="3">Motivo:</th>
          </thead>
          <tr class="text-center">
            <td><?php echo $datos['incapacidad_ultimos_meses']; ?></td>
            <td colspan="3"><textarea class="form-control"><?php echo $datos['motivo_incapacidad']; ?></textarea></td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>


  <div class="panel panel-default">
    <div class="panel-heading text-center">
      <label>Signos Vitales: </label>
    </div>
    <div class="panel-body">
      <table class="table table-bordered">
        <thead>
          <th class="text-center">Mano Habil:</th>
          <th class="text-center">Cicatrices:</th>
          <th class="text-center">Tatuajes:</th>
          <th class="text-center">Tension Arterial:</th>
          <th class="text-center">Frecuencia Cardiaca:</th>
          <th class="text-center">Frecuencia Respiratoria:</th>
          <th class="text-center">Talla:</th>
        </thead>
        <tbody>
          <tr class="text-center">
            <td><?php echo $datos['mano_habil']; ?></td>
            <td><?php echo $datos['cicatrices']; ?></td>
            <td><?php echo $datos['tatuajes']; ?></td>
            <td><?php echo $datos['tension_arterial']; ?></td>
            <td><?php echo $datos['frecuencia_cardiaca']; ?></td>
            <td><?php echo $datos['frecuencia_respiratoria']; ?></td>
            <td><?php echo $datos['talla']; ?></td>
          </tr>
          <thead>
            <th class="text-center">Peso:</th>
            <th class="text-center" colspan="6">Diagnostico de Peso:</th>
          </thead>
          <tr class="text-center">
            <td><?php echo $datos['talla']; ?></td>
            <td colspan="6"><?php echo $datos['peso_diagnostico']; ?></td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>

  <div class="panel panel-default">
    <div class="panel-heading text-center">
      <label>Exposicion  a factores de riesgo suministrados por la Empresa: </label> (<?php echo $datos['riesgos_suministrados']; ?>)
    </div>
    <div class="panel-body">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th class="text-center">Fisico</th>
            <th class="text-center">Quimico</th>
            <th class="text-center">Biologico</th>
            <th class="text-center">Ergonomico</th>
            <th class="text-center">Mecanico</th>
            <th class="text-center">Psicosocial</th>
            <th class="text-center">Electrico</th>
            <th class="text-center">Otros</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td class="text-center"> <?php echo $datos['suministrado_fisico']; ?></td>
            <td class="text-center"> <?php echo $datos['suministrado_mecanico']; ?></td>
            <td class="text-center"> <?php echo $datos['suministrado_quimico']; ?></td>
            <td class="text-center"> <?php echo $datos['suministrado_psicosocial']; ?></td>
            <td class="text-center"> <?php echo $datos['suministrado_biologico']; ?></td>
            <td class="text-center"> <?php echo $datos['suministrado_electrico']; ?></td>
            <td class="text-center"> <?php echo $datos['suministrado_ergonomico']; ?></td>
            <td class="text-center" style="width: 360px;">
              <textarea class="form-control"><?php echo $datos['suministrado_otro']; ?></textarea>
            </td>
          </tr>
        </tbody>
      </table>
      <br>
    </div>
  </div>


<?php 
}//fin array
//}//fin if

}
?>

</div>
<div class="panel-footer" style="background: #F4FDFF;"><a data-toggle="collapse" href="#collapse1"><div class="text-center"><span class="glyphicon glyphicon-arrow-up"></span> Minimizar Historia de Enfermeria</div></a></div>
</div>
</div>
</div>
<!--FIN RESULTADOS ENFERMERAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA-->

<style type="text/css">
  .fs{
    font-size: 14px !important;
  }
</style>

<!-- <script type="text/javascript" src="jvalidation/dist/jquery.validate.js"></script> -->
<script>
$(function(){

/* Incluimos un método para validar el campo nombre */
jQuery.validator.addMethod("nombres", function(value, element) {
return this.optional(element) || /^[a-záéóóúàèìòùäëïöüñ\s]+$/i.test(value);
}); 

/* Capturar el click del botón */
$("#btn").on("click", function()
   {
    /* Validar el formulario */
    $("#formulario").validate
         ({
             rules: /* Accedemos a los campos a través de su nombre: email, nombre, edad */
             {
               //email: {required: true, email: true, minlength: 5, maxlength: 80},
               cabeza: {required: true},
               amigdalas: {required: true},
               abdomen: {required: true},
               piel_anexos: {required: true},
               ojos: {required: true},
               cuello: {required: true},
               genitales: {required: true},
               neurologico: {required: true},
               oidos: {required: true},
               torax: {required: true},
               miembros_superiores: {required: true},
               muscular: {required: true},
               nariz: {required: true},
               pulmones: {required: true},
               miembros_inferiores: {required: true},
               vascular: {required: true},
               dentadura: {required: true},
               corazon: {required: true},
               columna: {required: true},
               oseo: {required: true},
               lengua: {required: true},
               hernias: {required: true},
               viceras: {required: true},
               otro_examen_fisico: {minlength: 3, maxlength: 120},
               observaciones_ex_fisico: {required: true, minlength: 3, maxlength: 1000},

               marcha: {required: true},
               miembros_superiores_funcionales: {required: true},
               coordinacion: {required: true},
               columna_funcional: {required: true},
               miembros_inferiores_funcionales: {required: true},
               reflejos: {required: true},
               phalen: {required: true},
               finkelstein: {required: true},
               braggard: {required: true},
               shober: {required: true},
               babinski_weil: {required: true},
               romber_sensibilidad: {required: true},
               romber: {required: true},
               tinel: {required: true},
               lasegue: {required: true},
               adams: {required: true},
               unterberger: {required: true},
               nariz_dedo: {required: true},

               m_superior_tono: {required: true},
               m_superior_fuerza: {required: true},
               m_superior_sensibilidad: {required: true},
               m_superior_arcosmovimiento: {required: true},
               m_inferior_tono: {required: true},
               m_inferior_fuerza: {required: true},
               m_inferior_sensibilidad: {required: true},
               m_inferior_arcosmovimiento: {required: true},
               hallazgos_funcionales: {required: true, minlength: 3, maxlength: 1000},
               otro_paraclinico: {minlength: 3, maxlength: 120},
               paradiagnostico: {minlength: 3, maxlength: 800},
               remision: {required: true},
               remision_desde: {minlength: 3, maxlength: 120},
               remision_hacia: {minlength: 3, maxlength: 120},
               especialidad: {minlength: 3, maxlength: 120},
               remision_motivo: {minlength: 3, maxlength: 1000},
               remision_pendiente: {required: true},
               observaciones_aptitud_laboral: {minlength: 3, maxlength: 1000},
               otro_enfasis: {minlength: 3, maxlength: 120},
               ef_no_defectos: {required: true},
               ef_disminuye_capacidad: {required: true},
               ef_condiciones_agravarse: {required: true},
               ef_condiciones_atendidas_eps_arl: {required: true},
               recomendacion_trabajador: {required: true, minlength: 3, maxlength: 1000},
               recomendacion_empleador: {required: true, minlength: 3, maxlength: 1000},
               restriccion_trabajador: {minlength: 3, maxlength: 1000},
               restriccion_empleador: {minlength: 3, maxlength: 1000},
               autorizacion: {required: true},
               //---

             },
             messages: /* Accedemos a los campos a través de su nombre: email, nombre, edad */
             {
                cabeza: {required: 'Seleccionar'},
                amigdalas: {required: 'Seleccionar'},
                abdomen: {required: 'Seleccionar'},
                piel_anexos: {required: 'Seleccionar'},
                ojos: {required: 'Seleccionar'},
                cuello: {required: 'Seleccionar'},
                genitales: {required: 'Seleccionar'},
                neurologico: {required: 'Seleccionar'},
                 oidos: {required: 'Seleccionar'},
                 torax: {required: 'Seleccionar'},
                 miembros_superiores: {required: 'Seleccionar'},
                 muscular: {required: 'Seleccionar'},
                 nariz: {required: 'Seleccionar'},
                 pulmones: {required: 'Seleccionar'},
                 miembros_inferiores: {required: 'Seleccionar'},
                 vascular: {required: 'Seleccionar'},
                 dentadura: {required: 'Seleccionar'},
                 corazon: {required: 'Seleccionar'},
                 columna: {required: 'Seleccionar'},
                 oseo: {required: 'Seleccionar'},
                 lengua: {required: 'Seleccionar'},
                 hernias: {required: 'Seleccionar'},
                 viceras: {required: 'Seleccionar'},
                 otro_examen_fisico: {minlength: 'El mínimo permitido son 3 caracteres', maxlength: 'El máximo permitido son 120 caracteres'},
                 observaciones_ex_fisico: {required: 'Este campo es requerido', minlength: 'El mínimo permitido son 3 caracteres', maxlength: 'El máximo permitido son 1000 caracteres'},


                 marcha: {required: 'Seleccionar'},
                 miembros_superiores_funcionales: {required: 'Seleccionar'},
                 coordinacion: {required: 'Seleccionar'},
                 columna_funcional: {required: 'Seleccionar'},
                 miembros_inferiores_funcionales: {required: 'Seleccionar'},
                 reflejos: {required: 'Seleccionar'},
                 phalen: {required: 'Seleccionar'},
                 finkelstein: {required: 'Seleccionar'},
                 braggard: {required: 'Seleccionar'},
                 shober: {required: 'Seleccionar'},
                 babinski_weil: {required: 'Seleccionar'},
                 romber_sensibilidad: {required: 'Seleccionar'},
                 romber: {required: 'Seleccionar'},
                 tinel: {required: 'Seleccionar'},
                 lasegue: {required: 'Seleccionar'},
                 adams: {required: 'Seleccionar'},
                 unterberger: {required: 'Seleccionar'},
                 nariz_dedo: {required: 'Seleccionar'},

                 m_superior_tono: {required: 'Seleccionar'},
                 m_superior_fuerza: {required: 'Seleccionar'},
                 m_superior_sensibilidad: {required: 'Seleccionar'},
                 m_superior_arcosmovimiento: {required: 'Seleccionar'},
                 m_inferior_tono: {required: 'Seleccionar'},
                 m_inferior_fuerza: {required: 'Seleccionar'},
                 m_inferior_sensibilidad: {required: 'Seleccionar'},
                 m_inferior_arcosmovimiento: {required: 'Seleccionar'}, 
                 hallazgos_funcionales: {required: 'Este campo es requerido', minlength: 'El mínimo permitido son 3 caracteres', maxlength: 'El máximo permitido son 1000 caracteres'},
                 otro_paraclinico: {minlength: 'El mínimo permitido son 3 caracteres', maxlength: 'El máximo permitido son 120 caracteres'},
                 paradiagnostico: {minlength: 'El mínimo permitido son 3 caracteres', maxlength: 'El máximo permitido son 800 caracteres'},
                 remision: {required: 'Seleccionar una opcion'},
                 remision_desde: {minlength: 'El mínimo permitido son 3 caracteres', maxlength: 'El máximo permitido son 120 caracteres'},
                 remision_hacia : {minlength: 'El mínimo permitido son 3 caracteres', maxlength: 'El máximo permitido son 120 caracteres'}, 
                 especialidad : {minlength: 'El mínimo permitido son 3 caracteres', maxlength: 'El máximo permitido son 120 caracteres'},
                 remision_motivo : {minlength: 'El mínimo permitido son 3 caracteres', maxlength: 'El máximo permitido son 1000 caracteres'}, 
                 remision_pendiente: {required: 'Seleccionar una opcion'},
                 observaciones_aptitud_laboral: {minlength: 'El mínimo permitido son 3 caracteres', maxlength: 'El máximo permitido son 1000 caracteres'},
                 otro_enfasis: {minlength: 'El mínimo permitido son 3 caracteres', maxlength: 'El máximo permitido son 120 caracteres'}, 
                 ef_no_defectos: {required: 'Seleccionar'},
                 ef_disminuye_capacidad: {required: 'Seleccionar'},
                 ef_condiciones_agravarse: {required: 'Seleccionar'},
                 ef_condiciones_atendidas_eps_arl: {required: 'Seleccionar'},
                 recomendacion_trabajador: {required: 'Este campo es requerido', minlength: 'El mínimo permitido son 3 caracteres', maxlength: 'El máximo permitido son 1000 caracteres'},
                 recomendacion_empleador: {required: 'Este campo es requerido', minlength: 'El mínimo permitido son 3 caracteres', maxlength: 'El máximo permitido son 1000 caracteres'},
                 restriccion_trabajador: {minlength: 'El mínimo permitido son 3 caracteres', maxlength: 'El máximo permitido son 1000 caracteres'},
                 restriccion_empleador: {minlength: 'El mínimo permitido son 3 caracteres', maxlength: 'El máximo permitido son 1000 caracteres'},
                 autorizacion: {required: '(Seleccionar una opcion)'},

             }

         });
   });

});
</script>

<form class="form" action="" method="POST" role="form" id="formulario" name="form"> 
<input class="form-control" type="text" name="historia" value='<?php echo $historia; ?>' readonly="readonly" style="display: none;">

  <div class="container">
    <br><br>
    <div class="col-sm-12">
      <div class="panel panel-default">
        <div class="panel-body">
          <!-- <div id='myWatch'></div> -->
          <input type="text" name="horafinal" id="myWatch" style="display: none;">
        </div>
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
            <tr class="text-center fs">
              
              <td>
                <label for="cabeza" generated="true" class="error"></label><br>
                Normal <input type="radio" name="cabeza" value="Normal" checked>/ 
                Anormal <input type="radio" name="cabeza" value="Anormal">/ 
                No Examinado <input type="radio" name="cabeza" value="No Examinado"> 
              </td>

              <td>
                <label for="amigdalas" generated="true" class="error"></label><br>
                Normal <input type="radio" name="amigdalas" value="Normal" checked> 
                Anormal <input type="radio" name="amigdalas" value="Anormal"> 
                No Examinado <input type="radio" name="amigdalas" value="No Examinado"> 
              </td>
 
              <td>
                <label for="abdomen" generated="true" class="error"></label><br>
                Normal <input type="radio" name="abdomen" value="Normal" checked>/ 
                Anormal <input type="radio" name="abdomen" value="Anormal">/ 
                No Examinado <input type="radio" name="abdomen" value="No Examinado"> 
              </td>

              <td>
                <label for="piel_anexos" generated="true" class="error"></label><br>
                Normal <input type="radio" name="piel_anexos" value="Normal" checked>/ 
                Anormal <input type="radio" name="piel_anexos" value="Anormal">/
                No Examinado <input type="radio" name="piel_anexos" value="No Examinado"> 
              </td>
            </tr>
            <thead>
              <tr class="active">
              <th class="text-center">Ojos:</th>
              <th class="text-center">Cuello:</th>
              <th class="text-center">Genitales:</th>
              <th class="text-center">Neurologico:</th>
              </tr>
            </thead>
            <tr class="text-center fs">
              
              <td>
                <label for="ojos" generated="true" class="error"></label><br>
                Normal <input type="radio" name="ojos" value="Normal" checked>/ 
                Anormal <input type="radio" name="ojos" value="Anormal">/ 
                No Examinado <input type="radio" name="ojos" value="No Examinado"> 
              </td>
              
              <td>
                <label for="cuello" generated="true" class="error"></label><br>
                Normal <input type="radio" name="cuello" value="Normal" checked>/ 
                Anormal <input type="radio" name="cuello" value="Anormal">/ 
                No Examinado <input type="radio" name="cuello" value="No Examinado"> 
              </td>
             
             <td>
                <label for="genitales" generated="true" class="error"></label><br>
                Normal <input type="radio" name="genitales" value="Normal" checked>/ 
                Anormal <input type="radio" name="genitales" value="Anormal">/ 
                No Examinado <input type="radio" name="genitales" value="No Examinado"> 
             </td>
             
              <td>
                <label for="neurologico" generated="true" class="error"></label><br>
                Normal <input type="radio" name="neurologico" value="Normal" checked>/ 
                Anormal <input type="radio" name="neurologico" value="Anormal">/
                No Examinado <input type="radio" name="neurologico" value="No Examinado"> 
              </td>
            </tr>
            <thead>
              <tr class="active">
              <th class="text-center">Oidos:</th>
              <th class="text-center">Torax:</th>
              <th class="text-center">Miembros Superiores:</th>
              <th class="text-center">Muscular:</th>
              </tr>
            </thead>
            <tr class="text-center fs">
              
              <td>
                <label for="oidos" generated="true" class="error"></label><br>
                Normal <input type="radio" name="oidos" value="No" checked>/ 
                Anormal <input type="radio" name="oidos" value="Anormal">/ 
                No Examinado <input type="radio" name="oidos" value="No Examinado"> 
              </td>
              
              <td>
                <label for="torax" generated="true" class="error"></label><br>
                Normal <input type="radio" name="torax" value="Normal" checked>/ 
                Anormal <input type="radio" name="torax" value="Anormal">/
                No Examinado <input type="radio" name="torax" value="No Examinado"> 
              </td>
              
              <td>
                <label for="miembros_superiores" generated="true" class="error"></label><br>
                Normal <input type="radio" name="miembros_superiores" value="Normal" checked>/
                Anormal <input type="radio" name="miembros_superiores" value="Anormal">/
                No Examinado <input type="radio" name="miembros_superiores" value="No Examinado"> 
              </td>
              
              <td>
                <label for="muscular" generated="true" class="error"></label><br>
                Normal <input type="radio" name="muscular" value="Normal" checked>/ 
                Anormal <input type="radio" name="muscular" value="Anormal">/
                No Examinado <input type="radio" name="muscular" value="No Examinado"> 
              </td>
            </tr>
            <thead>
              <tr class="active">
              <th class="text-center">Nariz:</th>
              <th class="text-center">Pulmones:</th>
              <th class="text-center">Miembros Inferiores:</th>
              <th class="text-center">Vascular:</th>
              </tr>
            </thead>
            <tr class="text-center fs">
              
              <td>
                <label for="nariz" generated="true" class="error"></label><br>
                Normal <input type="radio" name="nariz" value="Normal" checked>/ 
                Anormal <input type="radio" name="nariz" value="Anormal">/ 
                No Examinado <input type="radio" name="nariz" value="No Examinado"> 
              </td>
              
              <td>
                <label for="pulmones" generated="true" class="error"></label><br>
                Normal <input type="radio" name="pulmones" value="Normal" checked>/ 
                Anormal <input type="radio" name="pulmones" value="Anormal">/ 
                No Examinado <input type="radio" name="pulmones" value="No Examinado"> 
              </td>
             
              <td>
                <label for="miembros_inferiores" generated="true" class="error"></label><br>
                Normal <input type="radio" name="miembros_inferiores" value="Normal" checked>/
                Anormal <input type="radio" name="miembros_inferiores" value="Anormal">/ 
                No Examinado <input type="radio" name="miembros_inferiores" value="No Examinado"> 
              </td>
             
              <td>
                <label for="vascular" generated="true" class="error"></label><br>
                Normal <input type="radio" name="vascular" value="Normal" checked>/ 
                Anormal <input type="radio" name="vascular" value="Anormal">/ 
                No Examinado <input type="radio" name="vascular" value="No Examinado"> 
              </td>
            </tr>
            <thead>
              <tr class="active">
              <th class="text-center">Dentadura:</th>
              <th class="text-center">Corazon:</th>
              <th class="text-center">Columna:</th>
              <th class="text-center">Oseo:</th>
              </tr>
            </thead>
            <tr class="text-center fs">
              
              <td>
                <label for="dentadura" generated="true" class="error"></label><br>
                Normal <input type="radio" name="dentadura" value="Normal" checked>/ 
                Anormal <input type="radio" name="dentadura" value="Anormal">/ 
                No Examinado <input type="radio" name="dentadura" value="No Examinado"> 
              </td>
              
              <td>
                <label for="corazon" generated="true" class="error"></label><br>
                Normal <input type="radio" name="corazon" value="Normal" checked>/
                Anormal <input type="radio" name="corazon" value="Anormal">/ 
                No Examinado <input type="radio" name="corazon" value="No Examinado"> 
              </td>
             
              <td>
                <label for="columna" generated="true" class="error"></label><br>
                Normal <input type="radio" name="columna" value="Normal" checked>/ 
                Anormal <input type="radio" name="columna" value="Anormal">/ 
                No Examinado <input type="radio" name="columna" value="No Examinado"> 
              </td>
             
              <td>
                <label for="oseo" generated="true" class="error"></label><br>
                Normal <input type="radio" name="oseo" value="Normal" checked>/
                Anormal <input type="radio" name="oseo" value="Anormal">/ 
                No Examinado <input type="radio" name="oseo" value="No Examinado"> 
              </td>
            </tr>
            <thead>
              <tr class="active">
              <th class="text-center">Lengua:</th>
              <th class="text-center">Hernias:</th>
              <th class="text-center" colspan="2">Viceras:</th>
              </tr>
            </thead>
            <tr class="text-center fs">
              
              <td>
                <label for="lengua" generated="true" class="error"></label><br>
                Normal <input type="radio" name="lengua" value="Normal" checked>/ 
                Anormal <input type="radio" name="lengua" value="Anormal">/ 
                No Examinado <input type="radio" name="lengua" value="No Examinado"> 
              </td>
              
              <td>
                <label for="hernias" generated="true" class="error"></label><br>
                Normal <input type="radio" name="hernias" value="Normal" checked>/ 
                Anormal <input type="radio" name="hernias" value="Anormal">/ 
                No Examinado <input type="radio" name="hernias" value="No Examinado"> 
              </td>
              
              <td colspan="2">
                <label for="viceras" generated="true" class="error"></label><br>
                Normal <input type="radio" name="viceras" value="Normal" checked>/ 
                Anormal <input type="radio" name="viceras" value="Anormal">/
                No Examinado <input type="radio" name="viceras" value="No Examinado"> 
              </td>

            </tr>
          </tbody>
        </table>
      </div><!--finsm-->

      <label>Otros Examenes Fisicos:</label>
      <label for="otro_examen_fisico" generated="true" class="error"></label><br>
      <textarea class="form-control" name="otro_examen_fisico" rows="2"></textarea>
      <br>

      <label class="text-center">Observaciones:</label>
      <label for="observaciones_ex_fisico" generated="true" class="error"></label><br>
      <textarea class="form-control col-sm-12" type="text" name="observaciones_ex_fisico" rows="2"></textarea>
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
            <label for="marcha" generated="true" class="error"></label><br>
            <input type="radio" name="marcha" value="Normal"> Normal | 
            <input type="radio" name="marcha" value="Anormal" checked> Anormal 
          </td>

          <td>
            <label for="miembros_superiores_funcionales" generated="true" class="error"></label><br>
            <input type="radio" name="miembros_superiores_funcionales" value="Normal"> Normal | 
            <input type="radio" name="miembros_superiores_funcionales" value="Anormal" checked> Anormal
          </td>

          <td>
            <label for="coordinacion" generated="true" class="error"></label><br>
            <input type="radio" name="coordinacion" value="Normal"> Normal | 
            <input type="radio" name="coordinacion" value="Anormal" checked> Anormal
          </td>

          <td>
            <label for="columna_funcional" generated="true" class="error"></label><br>
            <input type="radio" name="columna_funcional" value="Normal"> Normal | 
            <input type="radio" name="columna_funcional" value="Anormal" checked> Anormal
          </td>

          <td>
            <label for="miembros_inferiores_funcionales" generated="true" class="error"></label><br>
            <input type="radio" name="miembros_inferiores_funcionales" value="Normal"> Normal | 
            <input type="radio" name="miembros_inferiores_funcionales" value="Anormal" checked> Anormal
          </td>

          <td>
            <label for="reflejos" generated="true" class="error"></label><br>
            <input type="radio" name="reflejos" value="Normal"> Normal | 
            <input type="radio" name="reflejos" value="Anormal" checked> Anormal
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
            <label for="phalen" generated="true" class="error"></label><br>
            <input type="radio" name="phalen" value="Normal"> Normal | 
            <input type="radio" name="phalen" value="Anormal" checked> Anormal 
          </td>

          <td>
            <label for="finkelstein" generated="true" class="error"></label><br>
            <input type="radio" name="finkelstein" value="Normal"> Normal | 
            <input type="radio" name="finkelstein" value="Anormal" checked> Anormal
          </td>

          <td>
            <label for="braggard" generated="true" class="error"></label><br>
            <input type="radio" name="braggard" value="Normal"> Normal | 
            <input type="radio" name="braggard" value="Anormal" checked> Anormal
          </td>

          <td>
            <label for="shober" generated="true" class="error"></label><br>
            <input type="radio" name="shober" value="Normal"> Normal | 
            <input type="radio" name="shober" value="Anormal" checked> Anormal
          </td>

          <td>
            <label for="babinski_weil" generated="true" class="error"></label><br>
            <input type="radio" name="babinski_weil" value="Normal"> Normal | 
            <input type="radio" name="babinski_weil" value="Anormal" checked> Anormal
          </td>

          <td>
            <label for="romber_sensibilidad" generated="true" class="error"></label><br>
            <input type="radio" name="romber_sensibilidad" value="Normal"> Normal | 
            <input type="radio" name="romber_sensibilidad" value="Anormal" checked> Anormal
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
            <label for="romber" generated="true" class="error"></label><br>
            <input type="radio" name="romber" value="Normal"> Normal | 
            <input type="radio" name="romber" value="Anormal" checked> Anormal
          </td>

          <td>
            <label for="tinel" generated="true" class="error"></label><br>
            <input type="radio" name="tinel" value="Normal"> Normal  | 
            <input type="radio" name="tinel" value="Anormal" checked> Anormal
          </td>

          <td>
            <label for="lasegue" generated="true" class="error"></label><br>
            <input type="radio" name="lasegue" value="Normal"> Normal | 
            <input type="radio" name="lasegue" value="Anormal" checked> Anormal
          </td>

          <td>
            <label for="adams" generated="true" class="error"></label><br>
            <input type="radio" name="adams" value="Normal"> Normal | 
            <input type="radio" name="adams" value="Anormal" checked> Anormal
          </td>

          <td>
            <label for="unterberger" generated="true" class="error"></label><br>
            <input type="radio" name="unterberger" value="Normal"> Normal | 
            <input type="radio" name="unterberger" value="Anormal" checked> Anormal
          </td>

          <td>
            <label for="nariz_dedo" generated="true" class="error"></label><br>
            <input type="radio" name="nariz_dedo" value="Normal"> Normal | 
            <input type="radio" name="nariz_dedo" value="Anormal" checked> Anormal
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
            <label for="m_superior_tono" generated="true" class="error"></label><br>
            <input type="radio" name="m_superior_tono" value="Normal"> Normal | 
            <input type="radio" name="m_superior_tono" value="Anormal" checked> Anormal
          </td>

          <td>
            <label for="m_superior_fuerza" generated="true" class="error"></label><br>
            <input type="radio" name="m_superior_fuerza" value="Normal"> Normal | 
            <input type="radio" name="m_superior_fuerza" value="Anormal" checked> Anormal
          </td>

          <td>
            <label for="m_superior_sensibilidad" generated="true" class="error"></label><br>
           <input type="radio" name="m_superior_sensibilidad" value="Normal"> Normal | 
           <input type="radio" name="m_superior_sensibilidad" value="Anormal" checked> Anormal
          </td>

          <td>
            <label for="m_superior_arcosmovimiento" generated="true" class="error"></label><br>
            <input type="radio" name="m_superior_arcosmovimiento" value="Normal"> Normal | 
            <input type="radio" name="m_superior_arcosmovimiento" value="Anormal" checked> Anormal
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
            <label for="m_inferior_tono" generated="true" class="error"></label><br>
            <input type="radio" name="m_inferior_tono" value="Normal"> Normal | 
            <input type="radio" name="m_inferior_tono" value="Anormal" checked> Anormal
          </td>

          <td>
            <label for="m_inferior_fuerza" generated="true" class="error"></label><br>
            <input type="radio" name="m_inferior_fuerza" value="Normal"> Normal | 
            <input type="radio" name="m_inferior_fuerza" value="Anormal" checked> Anormal
          </td>

          <td>
            <label for="m_inferior_sensibilidad" generated="true" class="error"></label><br>
            <input type="radio" name="m_inferior_sensibilidad" value="Normal"> Normal | 
            <input type="radio" name="m_inferior_sensibilidad" value="Anormal" checked> Anormal
          </td>

          <td>
            <label for="m_inferior_arcosmovimiento" generated="true" class="error"></label><br>
            <input type="radio" name="m_inferior_arcosmovimiento" value="Normal"> Normal | 
            <input type="radio" name="m_inferior_arcosmovimiento" value="Anormal" checked> Anormal
          </td>
        </tr>
      </tbody>
    </table>

      <label class="text-center">Hallazgos:</label>
      <label for="hallazgos_funcionales" generated="true" class="error"></label><br>
      <textarea class="form-control col-sm-12" type="text" name="hallazgos_funcionales" rows="3"></textarea>
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
          <input type="checkbox" name="colesterol" checked value="X">
        </td>
        <td>
          <input type="checkbox" name="glicemia" checked value="X">
        </td>
        <td>
          <input type="checkbox" name="trigliceridos" checked value="X">
        </td>
        <td>
          <input type="checkbox" name="frotis_faringeo" value="X">
        </td>
        <td>
          <input type="checkbox" name="frotis_una" value="X">
        </td>
        <td>
          <input type="checkbox" name="hemograma" checked value="X">
        </td>
        <td>
          <input type="checkbox" name="coprologico" value="X">
        </td>
        <td>
          <input type="checkbox" name="grupo_rh" value="X">
        </td>
        <td> 
          <input type="checkbox" name="electrocardiograma" value="X">
        </td>
        <td>
          <input type="checkbox" name="tamizaje_visual" value="X">
        </td>
      </tr>
    </tbody>
  </table>

  <br>          
  <table class="table table-bordered">
        <thead> 
            <th colspan="5" class="text-center">Rayos X:</th>
        </thead>
        <thead>
        <tr class="active">
          <th class="text-center">Columna:</th>
          <th class="text-center">Torax:</th>
          <th class="text-center">Abdomen:</th>
          <th class="text-center">Miembros Superiores:</th>
          <th class="text-center">Miembros Inferiores:</th>
        </tr>
      </thead>
      <tr class="text-center">
        <td>
          <input type="checkbox" name="columna_paraclinico" value="X">
        </td>
        <td>
          <input type="checkbox" name="torax_paraclinico" value="X">
        </td>
        <td>
          <input type="checkbox" name="abdomen_paraclinico" value="X">
        </td>
        <td>
          <input type="checkbox" name="paraclinico_miembros_superiores" value="X">
        </td>
        <td>
          <input type="checkbox" name="paraclinico_miembros_inferiores" value="X">
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
          <input type="checkbox" name="audiometria" value="X">
        </td>
        <td>
          <input type="checkbox" name="visiometria" value="X">
        </td>
        <td>
          <input type="checkbox" name="psicologico" value="X">
        </td>
        <td>
          <input type="checkbox" name="espirometria" value="X">
        </td>
        <td>
          <input type="checkbox" name="optometria" value="X">
        </td>
     </tr>
    </tbody>
  </table>

         
  <table class="table table-bordered">
    <tbody>
      <tr>
        <td>
          <div class="col-sm-12"><label>Otros:</label> 
              <label for="otro_paraclinico" generated="true" class="error"></label><br>
              <input type="text" name="otro_paraclinico" class="form-control input-sm">
          </div>
          <br><br>
        </td>
        </tr>
        <tr>
        <td>
          <div class="col-sm-12"><label>Diagnostico:</label> 
              <label for="paradiagnostico" generated="true" class="error"></label><br>
              <input type="text" name="paradiagnostico" class="form-control input-sm">
          </div>
        </td>
     </tr>
    </tbody>
  </table>


  </div>
</div>

<!--//////////////-->
    <!---->
  <div class="panel panel-default">
    <div class="panel-heading"> 

    </div>
    <div class="panel-body">
    <table class="table table-bordered">
      <tbody id="tabla">
        <tr>
          <td>
            <div class="text-center">
              <label for="remision" generated="true" class="error"></label><br>
              <label>Remision</label> 
              Si <input type="radio" name="remision[]" value="Si"> / 
              NO <input type="radio" name="remision[]" value="No" checked>
            </div>

            <div class="col-sm-4">
              <label>Desde:</label>
              <label for="remision_desde" generated="true" class="error"></label><br>
              <input class="form-control" type="text" name="remision_desde[]" value="Laboratorio de Seguridad y Salud en el Trabajo - SST">
            </div>

            <div class="col-sm-4">
              <label>Hacia:</label>
              <label for="remision_hacia" generated="true" class="error"></label><br>
              <input class="form-control" type="text" name="remision_hacia[]">
              <br>
            </div>

            <div class="col-sm-4">
              <label>Especialidad:</label>
              <label for="especialidad" generated="true" class="error"></label><br>
              <input class="form-control" type="text" name="especialidad[]">
              <br>
            </div>

            <label class="text-center">Motivo:</label>
            <label for="remision_motivo" generated="true" class="error"></label><br>
            <textarea class="form-control col-sm-12" type="text" name="remision_motivo[]" rows="3"></textarea>
     
            <br><br>

            <div class="text-center">
              <label for="remision_pendiente" generated="true" class="error"></label><br>
              <label class="text-danger">Resultado de Remision Pendiente</label> 
              Si <input type="radio" name="remision_pendiente[]" value="Si"> / 
              NO <input type="radio" name="remision_pendiente[]" value="No" checked>
            </div>
            <br><br>
          </td>
        </tr>
      </tbody> 
    </table>
  </div>
</div>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
  <script>
  $(function(){
 
    tabla = $('#tabla');
    tr = $('tr:first', tabla);
    $('#agregarFila').live('click', function (){
        tr.clone().appendTo(tabla).find(':text').val('');
    });
 
    $(".eliminarFila").live('click', function (){
        $(this).closest('tr').remove();
    });
 
  });
</script>

<input type="button" value="Agregar" id="agregarFila">

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
          SI <input type="radio" name="trabajo_nivel" value="Si"> / 
          NO <input type="radio" name="trabajo_nivel" value="No">
        </td>
        <td>
          SI <input type="radio" name="trabajo_altura" value="Si"> / 
          NO <input type="radio" name="trabajo_altura" value="No">
        </td>
        <td>
          SI <input type="radio" name="trabajo_restricciones_no_interviene" value="Si"> / 
          NO <input type="radio" name="trabajo_restricciones_no_interviene" value="No" checked>
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
         SI <input type="radio" name="aplazado" value="Si"> / 
         NO <input type="radio" name="aplazado" value="No" checked>
        </td>
        <td>
          SI <input type="radio" name="nueva_valoracion" value="Si"> / 
          NO <input type="radio" name="nueva_valoracion" value="No" checked>
        </td>
        <td>
          SI <input type="radio" name="trabajo_limitaciones_si_interviene" value="Si"> / 
          NO <input type="radio" name="trabajo_limitaciones_si_interviene" value="No" checked>
        </td>
      </tr>
      <thead>
        <tr class="active">
        <th class="text-center">Apto:</th>
        <th class="text-center" colspan="2">Examen De <?php echo $examen; ?>:</th>
        </tr>
      </thead>
      <tr class="text-center">
      <td>
        SI <input type="radio" name="apto" value="Si"> / 
        NO <input type="radio" name="apto" value="No" checked>
      </td>
      <td colspan="2">
       Normal <input type="radio" name="examen_diagnostico" value="Normal"> / 
       Anormal <input type="radio" name="examen_diagnostico" value="Anormal">
      </td>
      </tr>
    </tbody>
  </table>
  <!--</div>-->

    <label class="text-center">Observaciones:</label>
    <label for="observaciones_aptitud_laboral" generated="true" class="error"></label><br>
    <textarea class="form-control" type="text" name="observaciones_aptitud_laboral" rows="2"></textarea>
    <br>

<!-- AÑADIDOOOOOOOOOOOOOOOOOOOOOOOOOOOOOO -->
 

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
          Si <input type="radio" name="osteomuscular_enfasis" value="Si"> / 
          No <input type="radio" name="osteomuscular_enfasis" value="No">
        </td>

        <td> 
          Si <input type="radio" name="cardiovascular_enfasis" value="Si"> / 
          No <input type="radio" name="cardiovascular_enfasis" value="No">
        </td>

        <td> 
          Si <input type="radio" name="pulmonar_enfasis" value="Si"> / 
          No <input type="radio" name="pulmonar_enfasis" value="No">
        </td>

        <td> Si <input type="radio" name="manipulacion_alimento_enfasis" value="Si"> / 
            No <input type="radio" name="manipulacion_alimento_enfasis" value="No">
        </td>

        <td>
          <label for="otro_enfasis" generated="true" class="error"></label><br>
          <input type="text" name="otro_enfasis" class="form-control">
        </td>
      </tr>
    </tbody>
  </table>

  <table class="table table-bordered">
  <br>
    <tbody>
      <tr>
        <td>
          <label>EL EXAMEN FISICO NO PRESENTA ALTERACIONES  NI PATOLOGÍAS:</label>
        </td> 
        <td> 
          <label for="ef_no_defectos" generated="true" class="error"></label><br>
          SI <input type="radio" name="ef_no_defectos" value="Si"> / 
          NO <input type="radio" name="ef_no_defectos" value="No">
        </td>
      </tr>
      <tr>
        <td>
          <label>EL EXAMEN FISICO PRESENTA CONDICIONES DE SALUD QUE NO DISMINUYEN SU CAPACIDAD LABORAL:</label>
        </td> 
        <td>
          <label for="ef_disminuye_capacidad" generated="true" class="error"></label><br> 
          SI <input type="radio" name="ef_disminuye_capacidad" value="Si"> / 
          NO <input type="radio" name="ef_disminuye_capacidad" value="No">
        </td>
      </tr>
      <tr>
        <td>
          <label>EL EXAMEN FISICO PRESENTA CONDICIONES DE SALUD QUE PUEDEN AGRAVARSE CON EL TRABAJO: </label>
        </td> 
        <td>
          <label for="ef_condiciones_agravarse" generated="true" class="error"></label><br> 
          SI <input type="radio" name="ef_condiciones_agravarse" value="Si"> / 
          NO <input type="radio" name="ef_condiciones_agravarse" value="No">
        </td>
      </tr>
      <tr>
        <td>
          <label>EL EXAMEN FISICO PRESENTA CONDICIONES DE SALUD QUE DEBEN SER TRATADAS POR EPS, ARL:  </label>
        </td> 
        <td> 
          <label for="ef_condiciones_atendidas_eps_arl" generated="true" class="error"></label><br>
          SI <input type="radio" name="ef_condiciones_atendidas_eps_arl" value="Si"> / 
          NO <input type="radio" name="ef_condiciones_atendidas_eps_arl" value="No">
        </td>
      </tr>
      <tr>
        <td>
          <label>EL EXAMEN FISICO PRESENTA CONDICIONES DE SALUD QUE DEBEN SER TRATADAS POR EPS, ARL, ANTES DE INGRESAR:  </label>
        </td> 
        <td> 
          <label for="em_atencion_eps_arl_antes" generated="true" class="error"></label><br>
          SI <input type="radio" name="em_atencion_eps_arl_antes" value="Si"> / 
          NO <input type="radio" name="em_atencion_eps_arl_antes" value="No">
        </td>
      </tr>
      <tr>
        <td>
          <label>EL EXAMEN MEDICO PRESENTA ALTERACIONES DE SALUD INCOMPATIBLES CON EL CARGO ASIGNADO:</label>
        </td> 
        <td> 
          <label for="em_atencion_eps_arl_antes" generated="true" class="error"></label><br>
          SI <input type="radio" name="em_alteraciones_salud" value="Si"> / 
          NO <input type="radio" name="em_alteraciones_salud" value="No">
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
      <label for="recomendacion_trabajador" generated="true" class="error"></label><br>
      <textarea class="form-control" type="text" name="recomendacion_trabajador" rows="5">1- Cuidar su salud y proteccion, cumpliendo con las acciones del SGSST. 2-Hacer Pausas Activas Periodicas. 3-Usar los elementos proteccion personal adecuados. 4-Dieta balanceada, estilo de vida saludable y manejo del estres.</textarea> 
      <br>


      <label>Empleador:</label>
      <label for="recomendacion_empleador" generated="true" class="error"></label><br>
      <textarea class="form-control" type="text" name="recomendacion_empleador" rows="5">1-Realizar los examenes medicos ocupacionales anual o segun la normatividad vigente, segun el caso. 2-Seguimiento y control del Sistema de Gestion de Seguridad y Salud en el Trabajo. 3-Realizar pausas activas en sus trabajadores. 4-Se recomienda entrenamiento para trabajos seguro en alturas y verificar competencias y habilidades para desempeñar trabajos en alturas. 5-Seguir recomendaciones.</textarea>
      <br>

      <table class="table table-bordered">
        <thead>
        <th colspan="8" class="text-center">Ingreso al Programa de Vigilancia Epidemiologica:
          Si <input type="radio" name="pve" value="Si"> / 
          No <input type="radio" name="pve" value="No">
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
              Si <input type="radio" name="pve_visual" value="Si"> / 
              No <input type="radio" name="pve_visual" value="No">
            </td>

            <td> 
              Si <input type="radio" name="pve_auditivo" value="Si"> / 
              No <input type="radio" name="pve_auditivo" value="No">
            </td>

            <td> 
              Si <input type="radio" name="pve_cardiovascular" value="Si"> / 
              No <input type="radio" name="pve_cardiovascular" value="No">
            </td>

            <td> Si <input type="radio" name="pve_respiratorio" value="Si"> / 
                No <input type="radio" name="pve_respiratorio" value="No">
            </td>

            <td> Si <input type="radio" name="pve_piel" value="Si"> / 
                No <input type="radio" name="pve_piel" value="No">
            </td>

            <td> Si <input type="radio" name="pve_psicologico" value="Si"> / 
                No <input type="radio" name="pve_psicologico" value="No">
            </td>

            <td> Si <input type="radio" name="pve_osteomuscular" value="Si"> / 
                No <input type="radio" name="pve_osteomuscular" value="No">
            </td>

            <td>              
              <input type="text" name="pve_otro" class="form-control">
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
        <label for="restriccion_trabajador" generated="true" class="error"></label><br>
        <textarea class="form-control" type="text" name="restriccion_trabajador" rows="3"></textarea> 
        <br>
        <label>Empleador:</label>
        <label for="restriccion_empleador" generated="true" class="error"></label><br>
        <textarea class="form-control" type="text" name="restriccion_empleador" rows="3"></textarea>  
    </div>
  </div>

  <p><label>Nota: </label> Declaro que la información suministrada por mi persona, son verídica y completa y autorizo para que esta información sea consultada por el área de salud ocupacional o la oficina de talento humano y los de ley. <label for="autorizacion" generated="true" class="error"></label> SI <input type="radio" name="autorizacion" value="Si"> / NO <input type="radio" name="autorizacion" value="No"></p>
</div> 
  <br><br>



<?php }/*array_fin */?>
  <div class="text-center">
    <br>
    <input type="submit" name="Registrar" value="Registrar" class="btn btn-success" id="btn">
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
  <div class="modal fade" id="mostrarmodal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true" onClick="window.location.href='medico.php';">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button onClick="window.location.href='medico.php';" type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="text-danger"><span class="glyphicon glyphicon-warning-sign"></span> ERROR.</h4>
        </div>
        <div class="modal-body">
          <h4 class="text-primary">El Usuario con Indentificacion Nº <label class="text-danger"><?php echo $id; ?></label> Incorrecto O no Registrado en el Sistema.</h4>      
        </div>
        <div class="modal-footer">
          <a onClick="window.location.href='medico.php';" data-dismiss="modal" class="btn btn-danger">Cerrar</a>
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
    function getTimeAJAX() {
      //GUARDAMOS EN UNA VARIABLE EL RESULTADO DE LA CONSULTA AJAX    
      var time = $.ajax({
        url: 'hora.php', //indicamos la ruta donde se genera la hora
        dataType: 'text',//indicamos que es de tipo texto plano
        async: false     //ponemos el parámetro asyn a falso
      }).responseText;
      //actualizamos el div que nos mostrará la hora actual
      document.getElementById("myWatch").value = ""+time;
    }
    //con esta funcion llamamos a la función getTimeAJAX cada segundo para actualizar el div que mostrará la hora
    setInterval(getTimeAJAX,1000);
  </script>

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
