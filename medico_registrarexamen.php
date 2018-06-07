<!DOCTYPE html>
<html>
  <head>
    <title>Medico - Examen</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  </head>
  <?php 
  include('includes/conexion.php'); 
  include('bar/navbar_medico.php');
  include('lectorfecha.php');
  require('bar/css/estilo.css');
  $ruta_destino = "fotografias/"; //ruta de las fotos de los paciente 
 
  if(isset($_POST['Registrar'])){

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

    $examen_fisico = "INSERT INTO `medico_examenfisico` (`id`,`cabeza`,`ojos`,`oidos`,`nariz`,`dentadura`,`lengua`,`amigdalas`,`cuello`,`torax`,`pulmones`,`corazon`,`hernia`,`abdomen`,`genitales`,`miembros_superiores`,`miembros_inferiores`,`columna`,`viceras`,`piel_anexos`,`neurologico`,`muscular`,`vascular`,`oseo`,`otro_examen_fisico`,`observaciones_ex_fisico`,`phalen`,`babinski_weil`,`lasegue`,`finkelstein`,`romber_sensibilidad`,`adams`,`braggard`,`romber`,`unterberger`,`shober`,`tinel`,`nariz_dedo`,`miembro_superior_tono`,`miembro_inferior_tono`,`miembro_superior_fuerza`,`miembro_inferior_fuerza`,`miembro_superior_sensibilidad`,`miembro_inferior_sensibilidad`,`miembro_superior_arco_movimiento`,`miembro_inferior_arco_movimiento`,`marcha`,`miembros_superiores_funcionales`,`miembros_inferiores_funcionales`,`coordinacion_funcionales`,`columna_funcional`,`reflejos_funcionales`,`hallazgos_funcionales`,`paciente_medico`)
    VALUES ('NULL','$cabeza','$ojos','$oidos','$nariz','$dentadura','$lengua','$amigdalas','$cuello','$torax','$pulmones','$corazon','$hernias','$abdomen','$genitales','$miembros_superiores','$miembros_inferiores','$columna','$viceras','$piel_anexos','$neurologico','$muscular','$vascular','$oseo','$otro_examen_fisico','$observaciones_ex_fisico','$phalen','$babinski_weil','$lasegue','$finkelstein','$romber_sensibilidad','$adams','$braggard','$romber','$unterberger','$shober','$tinel','$nariz_dedo','$m_superior_tono','$m_inferior_tono','$m_superior_fuerza','$m_inferior_fuerza','$m_superior_sensibilidad','$m_inferior_sensibilidad','$m_superior_arcosmovimiento','$m_inferior_arcosmovimiento','$marcha','$miembros_superiores_funcionales','$miembros_inferiores_funcionales','$coordinacion','$columna_funcional','$reflejos','$hallazgos_funcionales','$historiaid')";
    $query1 = mysqli_query($conexion, $examen_fisico);

    if($query1){   
      //Obtenemos El Ultimo ID Insertado
      $ver = "SELECT * FROM medico_examenfisico ORDER BY `id` DESC limit 0,1";
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
    //$apto = $_POST['apto'];

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

    $aptitud_laboral = "INSERT INTO `medico_cal`(`id`,`apto_trabajo_nivel`,`apto_trabajo_altura`,`apto_con_restricciones_no_intervienen`,`aplazado`,`nueva_valoracion`,`apto_con_limitaciones_si_intervienen`,`examen_diagnostico`,`observaciones_aptitud_laboral`,`enfasis_osteomuscular`,`enfasis_cardiovascular`,`enfasis_pulmonar`,`enfasis_manipulacion_alimentos`,`enfasis_otros`,`ef_no_defectos`,`ef_disminuye_capacidad`,`ef_condiciones_agravarse`,`ef_condiciones_atendidas_por_eps`, `atencion_en_eps_antesingresar`, `em_alteracion_salud`, `id_remision`)
    VALUES ('NULL','$trabajo_nivel','$trabajo_altura','$trabajo_restricciones_no_interviene','$aplazado','$nueva_valoracion','$trabajo_limitaciones_si_interviene','$examen_diagnostico','$observaciones_aptitud_laboral','$osteomuscular_enfasis','$cardiovascular_enfasis','$pulmonar_enfasis','$manipulacion_alimento_enfasis','$otro_enfasis','$ef_no_defectos','$ef_disminuye_capacidad','$ef_condiciones_agravarse','$ef_condiciones_atendidas_eps_arl','$em_atencion_eps_arl_antes','$em_alteraciones_salud','$idfk_remision')";
    $query4 = mysqli_query($conexion,$aptitud_laboral); 

    if ($query4){   
      //Obtenemos El Ultimo ID Insertado
      $ver = "SELECT * FROM medico_cal ORDER BY `id` DESC limit 0,1";
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

    $recomendaciones_restricciones = "INSERT INTO `medico_recomendacion` (`id`,`reco_trabajador`,`reco_empleador`,`rest_trabajador`,`rest_empleador`,`autorizacion_manejo_informacion`,`id_aptitud_laboral`)
    VALUES ('NULL','$recomendacion_trabajador','$recomendacion_empleador','$restriccion_trabajador','$restriccion_empleador','$autorizacion','$idfk_aptitud_laboral')";
    $query5 = mysqli_query($conexion,$recomendaciones_restricciones);

    if ($query5){   
      //Obtenemos El Ultimo ID Insertado
      $ver = "SELECT * FROM medico_recomendacion ORDER BY `id` DESC limit 0,1";
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
    $horafinal = $_POST['hora'];

    $data = "UPDATE `db_estado_atencion` SET `medico`= '$estado' WHERE paciente = '$historiaid'"; 
    $queryestado = mysqli_query($conexion,$data);

    $data1 = "UPDATE `datos_basicos_atencion` SET `final_timemedico`= '$horafinal' WHERE id_datos_basicos = '$historiaid'"; 
    $querytime = mysqli_query($conexion,$data1);

    //-----------------------------------HEREEEEEEEEE----------------------
    if($query1 && $query2 && $query3 && $query4 && $query5 && $query6 && $queryestado && $querytime){
      echo "<script>alert('Datos Registrados Exitosamente')</script>";
      echo "<script>window.location = 'medico_citas.php'</script>";
    }else{
      echo "<script>alert('Error query, Intente Nuevamente')</script>";
      echo "<script>window.location = 'medico_citas.php'</script>"; 
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
      JOIN medico_examenfisico ON  medico_examenfisico.paciente_medico = datos_basicos.id_historia
      WHERE datos_basicos.motivo_evaluacion = 'Ingreso' AND datos_complementarios.numero_documento=".$id." ";
    $qcont = mysqli_query($conexion,$cont);
    while ($re = mysqli_fetch_array($qcont)){
      $ingreso = $re{'Total'};      
    }
    $cont = "SELECT *, COUNT(motivo_evaluacion) AS Total FROM datos_basicos 
      JOIN datos_complementarios ON datos_basicos.fk_d_complementario = datos_complementarios.id
      JOIN medico_examenfisico ON  medico_examenfisico.paciente_medico = datos_basicos.id_historia
      WHERE datos_basicos.motivo_evaluacion = 'Periodico' AND datos_complementarios.numero_documento=".$id." ";
    $qcont = mysqli_query($conexion,$cont);
    while ($re = mysqli_fetch_array($qcont)){
      $periodico = $re{'Total'};     
    }
    $cont = "SELECT datos_basicos.motivo_evaluacion, COUNT(motivo_evaluacion) AS Total FROM datos_basicos
      JOIN datos_complementarios ON datos_basicos.fk_d_complementario = datos_complementarios.id
      JOIN medico_examenfisico ON  medico_examenfisico.paciente_medico = datos_basicos.id_historia
      WHERE datos_basicos.motivo_evaluacion = 'Retiro' AND datos_complementarios.numero_documento=".$id." ";
    $qcont = mysqli_query($conexion,$cont);
    while ($re = mysqli_fetch_array($qcont)){
      $retiro = $re{'Total'};     
    }
    $cont = "SELECT datos_basicos.motivo_evaluacion, COUNT(motivo_evaluacion) AS Total FROM datos_basicos 
      JOIN datos_complementarios ON datos_basicos.fk_d_complementario = datos_complementarios.id
      JOIN medico_examenfisico ON  medico_examenfisico.paciente_medico = datos_basicos.id_historia
      WHERE datos_basicos.motivo_evaluacion = 'Post incapacidad' AND datos_complementarios.numero_documento=".$id." ";
    $qcont = mysqli_query($conexion,$cont);
    while ($re = mysqli_fetch_array($qcont)){
      $postincapacidad = $re{'Total'};     
    }
    $cont = "SELECT datos_basicos.motivo_evaluacion, COUNT(motivo_evaluacion) AS Total FROM datos_basicos
      JOIN datos_complementarios ON datos_basicos.fk_d_complementario = datos_complementarios.id
      JOIN medico_examenfisico ON  medico_examenfisico.paciente_medico = datos_basicos.id_historia
      WHERE datos_basicos.motivo_evaluacion = 'Reubicacion' AND datos_complementarios.numero_documento=".$id." ";
    $qcont = mysqli_query($conexion,$cont);
    while ($re = mysqli_fetch_array($qcont)){
      $reubicacion = $re{'Total'};      
    }
    $cont = "SELECT datos_basicos.motivo_evaluacion, COUNT(motivo_evaluacion) AS Total FROM datos_basicos 
      JOIN datos_complementarios ON datos_basicos.fk_d_complementario = datos_complementarios.id
      JOIN medico_examenfisico ON  medico_examenfisico.paciente_medico = datos_basicos.id_historia
      WHERE datos_basicos.motivo_evaluacion = 'Reingreso' AND datos_complementarios.numero_documento=".$id." ";
    $qcont = mysqli_query($conexion,$cont);
    while ($re = mysqli_fetch_array($qcont)){
      $reingreso = $re{'Total'};      
    }
    $cont = "SELECT datos_basicos.motivo_evaluacion, COUNT(motivo_evaluacion) AS Total FROM datos_basicos
      JOIN datos_complementarios ON datos_basicos.fk_d_complementario = datos_complementarios.id
      JOIN medico_examenfisico ON  medico_examenfisico.paciente_medico = datos_basicos.id_historia
      WHERE datos_basicos.motivo_evaluacion = 'Otros' AND datos_complementarios.numero_documento=".$id." ";
    $qcont = mysqli_query($conexion,$cont);
    while ($re = mysqli_fetch_array($qcont)){
      $otros = $re{'Total'};     
    }
    //obtener fecha del ultimo registro del historial
    $consultaregistro = "SELECT * FROM datos_basicos
      JOIN datos_complementarios ON datos_basicos.fk_d_complementario = datos_complementarios.id
      JOIN medico_examenfisico ON medico_examenfisico.paciente_medico = datos_basicos.id_historia
      WHERE datos_complementarios.numero_documento = ".$numero_documento." order by datos_basicos.fecha desc limit 1  ";
    $queryreg = mysqli_query($conexion,$consultaregistro);
    if (mysqli_num_rows($queryreg) > 0){  
      while ($reg = mysqli_fetch_array($queryreg)){
        $ultimo = $reg{'fecha'};    
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
<script type="text/javascript" src="jvalidation/dist/jquery.validate.js"></script>
<body>
<div class="container">
<div class="panel panel-default">
  <div class="container-fluid">
    <div class="panel-heading text-center">
      <h6>Datos <a href="#" data-toggle="modal" data-target="#historial">Paciente</a> - Empresa</h6>
    </div>
    <div class="panel-body">  

      <div class=" size_font">
        <table class="table table-bordered">
        <thead>
          <th class="text-center">Nombres-Apellidos:</th>
          <th class="text-center">Tipo Documento:</th>
          <th class="text-center">Numero Documento:</th>
          <th class="text-center">Fotografia</th>
        </thead>
          <tbody class="text-center">
            <tr>
              <td><?php echo $datos['nombres_apellidos']; ?></td>
              <td><?php echo $datos['tipo_documento'];?></td>
              <td><?php echo $datos['numero_documento']; ?></td>
              <td rowspan="3" style="width: 180px;">
                <img class="img-responsive img-thumbnail paciente_datos" alt="Foto del Paciente" src=<?php echo $ruta_destino."".$historia.'.png'; ?> >
              </td> 
            </tr>
            <tr>
              <td><strong>Edad:</strong></td>
              <td><strong>Fecha Nacimiento:</strong></td>
              <td><strong>Genero:</strong></td>
            </tr>
            <tr>   
              <td><?php echo $datos['edad'];?></td>
              <td><?php echo $datos['fecha_nacimiento']; ?></td>
              <td><?php echo $datos['genero']; ?></td>
            </tr>
          </tbody>
        </table>
    
        <table class="table table-bordered">
          <thead>      
            <th class="text-center">Estado Civil:</th>
            <th class="text-center">Lugar Nacimiento:</th>
            <th class="text-center">Numero Celular:</th>
            <th class="text-center">Direccion</th>
            <th class="text-center">Motivo de Evaluacion:</th>
          </thead>
          <tbody class="text-center">
            <tr>   
              <td><?php echo $datos['estado_civil']; ?></td>
              <td><?php echo $datos['lugar_nacimiento']; ?></td>
              <td><?php echo $datos['celular']; ?></td>
              <td><?php echo $datos['direccion']; ?></td>  
              <td><?php echo $datos['motivo_evaluacion']; ?></td>
            </tr>
          </tbody>
        </table>

        <table class="table table-bordered">
          <thead>
            <th class="text-center">Nombre de la Empresa:</th>
            <th class="text-center">Actividad Economica:</th>
            <th class="text-center">Ciudad:</th>
            <th class="text-center">Direccion de la empresa</th>
            <th class="text-center">Numero de Nit</th>
            <th class="text-center">Telefono</th>
          </thead>
          <tbody class="text-center">
            <tr>
              <td><?php echo $datos['nombre_empresa']; ?></td>
              <td><?php echo $datos['actividad_economica']; ?></td>
              <td><?php echo $datos['ciudad']; ?></td>
              <td><?php echo $datos['direccion_empresa']; ?></td>
              <td><?php echo $datos['numero_nit'];?></td>
              <td><?php echo $datos['telefono_empresa']; ?></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div><br>

<!--AUDIOMETRIAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA-->
<div class="panel-group">
  <div class="panel panel-default">
    <div class="panel-heading" style="background: #F4FDFF;">
      <h4 class="panel-title">
        <a data-toggle="collapse" href="#collapse5"><div class="text-center"><i class="fas fa-arrow-down"></i> Diagnostico de Audiometria:</div></a>
      </h4>
    </div>
    <div id="collapse5" class="panel-collapse collapse">
      <div class="panel-body">
        <?php 
        $consult="SELECT * FROM datos_basicos AS db
        JOIN audiometria_oidoderecho AS aod ON db.id_historia = aod.paciente_audiometria
        JOIN audiometria_oidoizquierdo AS aoi ON aoi.id_audiometria_paciente = aod.id 
        WHERE db.id_historia=".$historia."";
        $query = mysqli_query($conexion,$consult);

        if (mysqli_num_rows($query) > 0){

          while ($datos=mysqli_fetch_array($query)) {  
        ?>
        <div class="container-fluid">
          <div class="size_font">
            <div class="form-group"> 
              <div class="text-center text-info">Otoscopia:</div>  
            </div> <!--container-->            
            <table class="table table-bordered groundcolor">
              <thead>
                <tr>
                  <th class="text-center">Otoscopia</th>
                  <th class="text-center">Pasa</th>
                  <th class="text-center">Hallazgos</th> 
                </tr>
              </thead>
              <tbody class="text-center">
                <tr>
                  <td><strong>Oido Derecho</strong></td>
                  <td><?php echo $datos['otoscopia_od']; ?></td> 
                  <td><?php echo $datos['hallazgo_od']; ?></td>  
                </tr>
                <tr>
                  <td><strong>Oido Izquierdo</strong></td>  
                  <td><?php echo $datos['otoscopia_oi']; ?></td>
                  <td><?php echo $datos['hallazgo_oi']; ?></td>
                </tr>        
              </tbody>
            </table>
    
            <table class="table table-bordered groundcolor">
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
                <tr class="text-center">
                  <td><strong>Oido Derecho</strong></td>
                  <td><?php echo $datos['250']; ?></td> 
                  <td><?php echo $datos['500']; ?></td>
                  <td><?php echo $datos['1000']; ?></td>
                  <td><?php echo $datos['2000']; ?></td> 
                  <td><?php echo $datos['4000']; ?></td>
                  <td><?php echo $datos['8000']; ?></td> 
                  <td><?php echo $datos['promedio_od']; ?></td>
                </tr>
                <tr class="text-center">
                  <td><strong>Oido Izquierdo</strong></td> 
                  <td><?php echo $datos['250_izq']; ?></td> 
                  <td><?php echo $datos['500_izq']; ?></td>
                  <td><?php echo $datos['1000_izq']; ?></td>
                  <td><?php echo $datos['2000_izq']; ?></td> 
                  <td><?php echo $datos['4000_izq']; ?></td>
                  <td><?php echo $datos['8000_izq']; ?></td>
                  <td><?php echo $datos['promedio_oi']; ?></td>
                </tr>        
              </tbody>
            </table>

            <strong>Observaciones:</strong>
            <textarea class="form-control groundcolor size_font" rows="2"><?php echo $datos['observaciones']; ?></textarea><br>

            <strong>Evaluacion audiologica diagnostica:</strong>
            <textarea class="form-control groundcolor size_font"><?php echo $datos['evaluaciondiagnostica']; ?></textarea><br>
                 
            <table class="table table-bordered groundcolor">
              <thead>   
                <th class="text-center">Retamizaje</th> 
                <th class="text-center">Iterconsulta - otorrinolaringología</th>  
                <th class="text-center">Control en 1 Año</th>
              </thead>
              <tbody>
                <tr class="text-center">
                  <td><?php echo $datos['retamizaje']; ?> </td>
                  <td><?php echo $datos['interconsulta']; ?></td>
                  <td><?php echo $datos['controlanual']; ?></td> 
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
          <h6 class="panel-title text-center"><i class="fas fa-arrow-up"></i> Minimizar Diagnostico de Audiometria</h6>
        </a>
      </div>
    </div>
  </div>
</div><br>    
<!--VISIOMETRIAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA-->
  <div class="panel-group">
    <div class="panel panel-default">
      <div class="panel-heading" style="background: #F4FDFF;">
        <h4 class="panel-title">
          <a data-toggle="collapse" href="#collapse4">
            <div class="text-center"><i class="fas fa-arrow-down"></i> Diagnostico de Visiometria:</div>
          </a>
        </h4>
      </div>
      <div id="collapse4" class="panel-collapse collapse">
        <div class="panel-body">
          <?php 
          $consult = "SELECT * FROM datos_basicos AS db
          JOIN visiometria_campovisual AS vcv ON db.id_historia = vcv.paciente_visiometria 
          JOIN visiometria_visionlejana AS vvl ON vcv.id = vvl.id_campo_visual
          JOIN visiometria_visionproxima AS vvp ON vvl.id = vvp.id_vision_lejana
          JOIN visiometria_percepcionforia AS vpf ON vvp.id = vpf.id_vision_proxima
          WHERE db.id_historia = ".$historia." ";
          $query = mysqli_query($conexion,$consult);

          if (mysqli_num_rows($query)){
            while ($datos=mysqli_fetch_array($query)){
              ?>
          <div class="container">
            <div class="container-fluid">
              <div class="text-center text-info">CAMPO VISUAL</div>
              <div class="text-center">
                <strong>Utiliza prescripción óptica: (<?php echo $datos['prescripcionoptica']; ?>)</strong>
              </div>
              <table class="table table-bordered text-center groundcolor">
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
              </table><br>

              <strong>Resultado:</strong>
              <textarea type="text" name="resultado_visiometria" rows="2" class="form-control size_font groundcolor"><?php echo $datos['resultado_visiometria']; ?></textarea><br>
              
              <div class="text-center">
                <strong>Alteracion Visual: </strong> 
                (<?php echo $datos['alteracion_visual']; ?>)
              </div>
            </div>
              <?php    
              }
            }
            ?> 
          </div>
          <div class="panel-footer" style="background: #F4FDFF;">
            <a data-toggle="collapse" href="#collapse4">
              <h6 class="panel-title text-center"><i class="fas fa-arrow-up"></i> Minimizar Diagnostico de Visiometria</h6>
            </a>
          </div>
        </div>
      </div>
    </div>
  </div><br>
  <!--ESPIROMETRIAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA-->
  <div class="panel-group">
    <div class="panel panel-default">
      <div class="panel-heading" style="background: #F4FDFF;">
        <h4 class="panel-title">
          <a data-toggle="collapse" href="#collapse3">
            <div class="text-center"><i class="fas fa-arrow-down"></i> Diagnostico de Espirometria:</div>
          </a>
        </h4>
      </div>
      <div id="collapse3" class="panel-collapse collapse">
        <div class="panel-body">
          <div class="container-fluid"> 
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
                <div class="row">
                  <iframe src='<?php echo $ruta ?>' class="framepdf" id="frame"></iframe> 
                  <strong>Descargar Resultado: </strong>
                  <a download href="<?php echo $ruta; ?>">Download <i class="fas fa-cloud-download-alt"></i></a>
                </div> 
            <?php 
              }
            }
            ?> 
          </div> 
        </div>
        <div class="panel-footer" style="background: #F4FDFF;">
          <a data-toggle="collapse" href="#collapse3">
            <h6 class="panel-title text-center"><i class="fas fa-arrow-up"></i> Minimizar Diagnostico de Espirometria</h6>
          </a>
        </div>
      </div>
    </div>
  </div><br>
  <!--PSICOLOGIAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA-->
  <div class="panel-group">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" href="#collapse2">
            <div class="text-center"><i class="fas fa-arrow-down"></i> Diagnostico de Psicologia:</div>
          </a>
        </h4>
      </div>
      <div id="collapse2" class="panel-collapse collapse">
        <div class="panel-body">
          <?php 
          $consult="SELECT * FROM datos_basicos AS db 
          JOIN psicologia_estadomental AS pem ON pem.paciente_psicologia = db.id_historia
          WHERE db.id_historia=".$historia."";
          $query = mysqli_query($conexion,$consult);
          if (mysqli_num_rows($query) > 0){
            while ($datos=mysqli_fetch_array($query)){
          ?>
          <div class="container-fluid">
            <table class="table table-bordered size_font groundcolor">
              <thead>
                <tr>
                  <th class="text-center" style="width: 185px;">Procesos</th>
                  <th style="width: 100px;">Diagnostico</th>
                  <th class="text-center">Hallazgo</th>
                </tr>
              </thead>
              <tbody class="text-center">
                <tr>
                  <td><strong>Orientacion:</strong></td>
                  <td><?php echo $datos['orientacion']; ?></td>
                  <td><textarea class="form-control size_font groundcolor"><?php echo $datos['orientacionhallazgo']; ?></textarea></td>
                </tr>
                <tr>
                  <td><strong>Atencion concentracion:</strong></td>
                  <td><?php echo $datos['atencionconcentracion']; ?></td>
                  <td><textarea class="form-control size_font groundcolor"><?php echo $datos['concentracionhallazgo']; ?></textarea></td>
                </tr>
                <tr>
                  <td><strong>Sensopercepcion:</strong></td>
                  <td><?php echo $datos['sensopercepcion']; ?></td>
                  <td><textarea class="form-control size_font groundcolor"><?php echo $datos['sensopercepcionhallazgo']; ?></textarea></td>
                </tr>
                <tr>
                  <td><strong>Memoria:</strong></td>
                  <td><?php echo $datos['memoria']; ?></td>
                  <td><textarea class="form-control size_font groundcolor"><?php echo $datos['memoriahallazgo'];?></textarea></td>
                </tr>
                <tr>
                  <td><strong>Pensamiento:</strong></td>
                  <td><?php echo $datos['pensamiento']; ?></td>
                  <td><textarea class="form-control size_font groundcolor"><?php echo $datos['pensamientohallazgo']; ?></textarea></td>
                </tr>
                <tr>
                  <td><strong>Lenguaje:</strong></td>
                  <td><?php echo $datos['lenguaje']; ?></td>
                  <td><textarea class="form-control size_font groundcolor"><?php echo $datos['lenguajehallazgo']; ?></textarea></td>
                </tr>
                <tr>
                  <td><strong>Concepto:</strong></td>
                  <td><?php echo $datos['concepto']; ?></td>
                  <td><textarea class="form-control size_font groundcolor"><?php echo $datos['conceptohallazgo']; ?></textarea></td>
                </tr>
              </tbody>
            </table>
          </div>
          <?php 
              }
            }
          ?>
        </div>
        <div class="panel-footer" style="background: #F4FDFF;">
          <a data-toggle="collapse" href="#collapse2">
            <h6 class="panel-title text-center"><i class="fas fa-arrow-up"></i> Minimizar Diagnostico de Psicologia</h6>
          </a>
        </div>
      </div>
    </div>
  </div><br>
<!--ENFERMERAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA-->
  <div class="panel-group">
    <div class="panel panel-default">
      <div class="panel-heading" style="background: #F4FDFF;">
        <h4 class="panel-title">
          <a data-toggle="collapse" href="#collapse1"><div class="text-center"><i class="fas fa-arrow-down"></i> Historia de Enfermeria:</div></a>
        </h4>
      </div>
      <div id="collapse1" class="panel-collapse collapse">
        <div class="panel-body">
          <?php 
          $consult="SELECT * FROM datos_basicos AS db 
          JOIN enfermeria_historialaboral AS hl ON db.id_historia = hl.paciente_enfermeria 
          JOIN enfermeria_riesgos AS er ON hl.id = er.id_paciente
          JOIN enfermeria_antecedentes AS ea ON ea.id_paciente_riesgos = er.id
          JOIN enfermeria_ginecologia AS eg ON eg.id_ant_per_fam = ea.id
          JOIN enfermeria_epp AS epp ON eg.id = epp.id_ginecologia
          JOIN enfermeria_accidentes AS eac ON epp.id = eac.id_protec_personal
          JOIN enfermeria_enfermedad AS epe ON eac.id = epe.id_accidente_trabajo
          JOIN enfermeria_habitosaludable AS ehs ON epe.id = ehs.id_enfermedad_prof
          JOIN enfermeria_habitotoxico AS eht ON ehs.id = eht.id_hab_saludables
          JOIN enfermeria_signovital AS esv ON eht.id = esv.id_habitos_toxicos
          JOIN enfermeria_riesgosempresa AS ere ON esv.id = ere.id_signos_vitales
          WHERE  db.id_historia = '$historia' ";
          $query = mysqli_query($conexion,$consult);
          if (mysqli_num_rows($query) > 0){ 
            while ($datos=mysqli_fetch_array($query)) {
          ?>
          <div class="container-fluid">
            <div class="text-center">
              <strong>Historia Laboral: (<?php echo $datos['historialaboral']; ?>)</strong>
            </div>
            <table class="table table-bordered groundcolor">
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
                  <td><?php echo $datos['aniosempresa']; ?></td>
                  <td><?php echo $datos['dependencia']; ?></td>
                </tr>
                <thead>
                  <th class="text-center">Acciones:</th>
                  <th colspan="4" class="text-center">Actividades:</th>
                </thead>
                <tr>
                  <td><textarea class="form-control groundcolor size_font" rows="3"><?php echo $datos['acciones']; ?></textarea></td>
                  <td colspan="3"><textarea class="form-control groundcolor size_font" rows="2"><?php echo $datos['actividades']; ?></textarea></td>
                </tr>
                <thead>
                  <th colspan="4" class="text-center">Descripcion de cargo:</th>
                </thead>
                <tr>
                  <td colspan="4"><textarea class="form-control groundcolor size_font" rows="2"><?php echo $datos['descripcioncargo']; ?></textarea></td>
                </tr>
              </tbody>
            </table>

          <div class="text-center">
            <strong>Exposicion a factores de riesgo: (<?php echo $datos['factoresriesgos']; ?>)</strong>
          </div>
          <table class="table table-bordered groundcolor">
            <thead>
              <tr>
                <th class="text-center">Empresa</th>
                <th class="text-center">Riesgos</th>
                <th class="text-center">Cargo</th>
                <th class="text-center">Tiempo</th>
                <th class="text-center">Proteccion Personal</th>
              </tr>
            </thead>
            <tbody class="text-center">
            <?php 
            $consult="SELECT * FROM datos_basicos AS db 
            JOIN enfermeria_historialaboral AS hl ON db.id_historia = hl.paciente_enfermeria 
            JOIN enfermeria_riesgos AS er ON hl.id = er.id_paciente
            WHERE db.id_historia = '$historia' ";
            $query = mysqli_query($conexion,$consult);
            if (mysqli_num_rows($query) > 0){ 

              while ($riesgos=mysqli_fetch_array($query)){
            ?>
              <tr>
                <td>
                  <textarea class="form-control size_font groundcolor" rows="2"><?php echo $riesgos['empresariesgo']; ?></textarea>
                </td>
                <td>
                  <textarea class="form-control size_font groundcolor" rows="2"><?php echo $riesgos['riesgos']; ?></textarea>
                </td>
                <td>
                  <textarea class="form-control size_font groundcolor" rows="2"><?php echo $riesgos['cargoriesgo']; ?></textarea>
                </td>
                <td><?php echo $riesgos['tiemporiesgo']; ?></td>
                <td>
                  <textarea class="form-control size_font groundcolor" rows="2"><?php echo $riesgos['proteccionriesgo']; ?></textarea>
                </td>
              </tr>
            <?php 
              }
                } 
            ?>
            </tbody>
          </table><br>

          <div class="text-center">
            <strong>Antecedentes Personales-Familiares: </strong>
          </div>
          <table class="table table-bordered table_sizefont groundcolor">
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
      
          <strong class="text-center">Observaciones:</strong>
          <textarea class="form-control size_font groundcolor" rows="2"><?php echo $datos['ant_observaciones']; ?></textarea><br>

          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <div class="input-group-text size_font">
                Familiar: <div class="separator"></div>(<?php echo $datos['familiar_ant']; ?>) 
              </div>
            </div>
            <textarea class="form-control size_font groundcolor"><?php echo $datos['desc_ant_familiar']; ?></textarea>
          </div>
          
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <div class="input-group-text size_font">
                Personal: <div class="separator"></div>(<?php echo $datos['personal_ant']; ?>) 
              </div>
            </div>
            <textarea class="form-control size_font groundcolor"><?php echo $datos['desc_ant_per']; ?></textarea>
          </div>

          <p class="text-center">
            <a class="btn btn-link size_font" data-toggle="collapse" href="#multiCollapseExample1" role="button" aria-expanded="false" aria-controls="multiCollapseExample1">Antecedentes Ginecologicos</a>
          </p>
          <div class="collapse multi-collapse" id="multiCollapseExample1">
            <table class="table table-bordered groundcolor">
              <thead>
                <th class="text-center">Menarquia:</th>
                <th class="text-center">Ciclos:</th>
                <th class="text-center">Ultima Mestruacion:</th>
                <th class="text-center">Ultima Citologia:</th>
                <th class="text-center">Resultado:</th>
                <th class="text-center">Flujo Vagina:</th>
                <th class="text-center">Dolor Pelvico:</th>
                <th class="text-center">Dolor Senos:</th>
              </thead>
              <tbody>
                <tr class="text-center">
                  <td><?php echo $datos['menarquia']; ?></td>
                  <td><?php echo $datos['ciclos']; ?></td>
                  <td><?php echo $datos['ultimamestruacion']; ?></td>
                  <td><?php echo $datos['ultimacitologia']; ?></td>
                  <td><?php echo $datos['resultado']; ?></td>
                  <td><?php echo $datos['flujovaginal']; ?></td>
                  <td><?php echo $datos['dolorpelvico']; ?></td>
                  <td><?php echo $datos['dolorsenos']; ?></td>
                </tr>
              </tbody>
            </table>

            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <div class="input-group-text size_font">
                  Planifica: <div class="separator"></div>(<?php echo $datos['planifica']; ?>) 
                </div>
              </div>
              <textarea class="form-control groundcolor size_font"><?php echo $datos['metodo']; ?></textarea>
            </div>
            
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <div class="input-group-text size_font">
                  Obstetrica: <div class="separator"></div>
                </div>
              </div>
              <textarea class="form-control groundcolor size_font"><?php echo $datos['fichaobstetrica']; ?></textarea>
            </div>
          </div>

          <div class="text-center">
            <strong>Uso de Elementos de Proteccion Personal: (<?php echo $datos['uso_epp']; ?>)</strong>
          </div>
          <table class="table table-bordered table_sizefont groundcolor">
            <thead>
              <th class="text-center">En cargo o empresa:</th>
              <th class="text-center">Actual:</th>
              <th class="text-center">Casco:</th>
              <th class="text-center">Botas:</th>
              <th class="text-center">Gafas:</th>
              <th class="text-center">Tapabocas:</th>
              <th class="text-center">Overol:</th>
              <th class="text-center">Protectores Auditivos:</th>
              <th class="text-center">Protectores Respiratorios:</th>
              <th class="text-center">Adecuados:</th>
            </thead>
            <tbody>             
              <tr class="text-center">
                <td><?php echo $datos['cargo_empresa']; ?></td>
                <td><?php echo $datos['actual']; ?></td>
                <td><?php echo $datos['casco']; ?></td>
                <td><?php echo $datos['botas']; ?></td>
                <td><?php echo $datos['gafas']; ?></td>
                <td><?php echo $datos['tapabocas']; ?></td>
                <td><?php echo $datos['overol']; ?></td>
                <td><div class="P"><?php echo $datos['protectorauditivo']; ?></div></td>
                <td><div class="P"><?php echo $datos['protectorrespiratorio']; ?></div></td>
                <td><?php echo $datos['adecuados']; ?></td> <!-- borrar de bd campo todas -->
              </tr>
            </tbody>
          </table>
          
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <div class="input-group-text size_font">
                Otros EPP: <div class="separator"></div>
              </div>
            </div>
            <textarea class="form-control size_font groundcolor"><?php echo $datos['otroepp']; ?></textarea>
          </div>

          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <div class="input-group-text size_font">
                Adecuados solo:
              </div>
            </div>
            <textarea class="form-control size_font groundcolor"><?php echo $datos['adecuadosolo']; ?></textarea>
          </div><br>

          <div class="text-center">
            <strong>Accidentes de Trabajo:  (<?php echo $datos['accidentelaboral']; ?>)</strong>
          </div>
          
          <table class="table table-bordered groundcolor">
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
              <?php 
              $consult2="SELECT * FROM datos_basicos AS db
              JOIN enfermeria_historialaboral AS hl ON db.id_historia = hl.paciente_enfermeria 
              JOIN enfermeria_riesgos AS er ON hl.id = er.id_paciente
              JOIN enfermeria_antecedentes AS ea ON ea.id_paciente_riesgos = er.id
              JOIN enfermeria_ginecologia AS eg ON eg.id_ant_per_fam = ea.id
              JOIN enfermeria_epp AS epp ON eg.id = epp.id_ginecologia
              JOIN enfermeria_accidentes AS eac ON epp.id = eac.id_protec_personal
              WHERE db.id_historia = '$historia' ";
              $query2 = mysqli_query($conexion,$consult2);//revisar sql
              if (mysqli_num_rows($query2) > 0){ 
                while ($accidente=mysqli_fetch_array($query2)){  
              ?>
              <tr>
                <td><?php echo $accidente['accfecha']; ?></td>
                <td><textarea class="form-control table_sizefont groundcolor" rows="2"><?php echo $accidente['accempresa']; ?></textarea></td>
                <td><textarea class="form-control table_sizefont groundcolor" rows="2"><?php echo $accidente['causa']; ?></textarea></td>
                <td><?php echo $accidente['lesion']; ?></td>
                <td><textarea class="form-control table_sizefont groundcolor" rows="2"><?php echo $accidente['afectacion']; ?></textarea></td>
                <td><?php echo $accidente['incapacidad']; ?></td>
                <td><?php echo $accidente['secuela']; ?></td>
              </tr>
              <?php 
                }
              }
              ?>
            </tbody>
          </table>

          <div class="text-center">
            <strong>Enfermedad Profesional: (<?php echo $datos['enfermedadlaboral']; ?>)</strong>
          </div>
          <table class="table table-bordered size_font groundcolor">
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
            <?php 
            $consult3="SELECT * FROM datos_basicos AS db
            JOIN enfermeria_historialaboral AS hl ON db.id_historia = hl.paciente_enfermeria 
            JOIN enfermeria_riesgos AS er ON hl.id = er.id_paciente
            JOIN enfermeria_antecedentes AS ea ON ea.id_paciente_riesgos = er.id
            JOIN enfermeria_ginecologia AS eg ON eg.id_ant_per_fam = ea.id
            JOIN enfermeria_epp AS epp ON eg.id = epp.id_ginecologia
            JOIN enfermeria_accidentes AS eac ON epp.id = eac.id_protec_personal
            JOIN enfermeria_enfermedad AS epe ON eac.id = epe.id_accidente_trabajo
            WHERE db.id_historia = '$historia' ";
            $query3 = mysqli_query($conexion,$consult3);//revisar sql
            if (mysqli_num_rows($query3) > 0){ 
              while ($enfermedad=mysqli_fetch_array($query3)){  
            ?>
              <tr>
                <td><?php echo $enfermedad['fechaenf']; ?></td>
                <td><textarea class="form-control table_sizefont groundcolor" rows="2"><?php echo $enfermedad['empresaenf']; ?></textarea></td>
                <td><textarea class="form-control table_sizefont groundcolor" rows="2"><?php echo $enfermedad['diagnosticoenf']; ?></textarea></td>
                <td><div class="P"><?php echo $enfermedad['arlenf']; ?></div></td>
                <td><div class="P"><?php echo $enfermedad['reubicacion']; ?></div></td>
                <td><div class="P"><?php echo $enfermedad['pension']; ?></div></td>
              </tr>
              <?php 
              }
                }
              ?>
            </tbody>
          </table><br>

          <div class="text-center">
            <strong>Habitos Saludables: </strong>
          </div>
          <table class="table table-bordered groundcolor">
            <thead>
              <th class="text-center">Sedentario:</th>
              <th class="text-center">Ejercicio CardioPulmonar:</th>
              <th class="text-center">Frecuencia:</th>
            </thead>
            <tbody class="text-center">
              <tr>
                <td><?php echo $datos['sedentario']; ?></td>
                <td><?php echo $datos['ejerciciocardiopulmonar']; ?></td>
                <td><?php echo $datos['frecuenciaejercicio']; ?></td>   
              </tr>
            </tbody>
          </table>

          <div class="input-group">
            <div class="input-group-prepend">
              <div class="input-group-text size_font">Deportes:<div class="separator"></div>(<?php echo $datos['practicadeporte']; ?>)
              </div>
            </div>
            <textarea class="form-control size_font groundcolor" rows="2"><?php echo $datos['cualdeporte']; ?></textarea>
          </div><br>

          <div class="input-group">
            <div class="input-group-prepend">
              <div class="input-group-text size_font">Habitos saludables:</div>
            </div>
              <textarea class="form-control size_font groundcolor" rows="2"><?php echo $datos['otroejercicio']; ?></textarea>
          </div><br>

          <div class="text-center">
            <strong>Habitos Toxicos: </strong>
          </div>
          <table class="table table-bordered groundcolor">
            <thead style="font-size: 10px;">
              <th class="text-center">Fuma</th>
              <th class="text-center">Fumador</th>
              <th class="text-center">Años fumandor</th>
              <th class="text-center">Exfumador</th>
              <th class="text-center">Exfumador Años</th>
              <th class="text-center">Cant. cigarrillos diarios</th>
              <th class="text-center">Toma Habitualmente</th>
              <th class="text-center">Años habito</th>
              <th class="text-center">Frecuencia</th>
              <th class="text-center">Exbebedor</th>
              <th class="text-center">Nº Años:</th>
            </thead>
            <tbody class="text-center">
              <tr>
                <td><?php echo $datos['fuma']; ?></td>
                <td><?php echo $datos['fumador']; ?> </td>
                <td><?php echo $datos['fumadoranios']; ?></td>
                <td><?php echo $datos['exfumador']; ?> </td> 
                <td><?php echo $datos['exfumadoranios']; ?></td>
                <td><?php echo $datos['cigarrillosdiarios']; ?></td>
                <td><?php echo $datos['bebidahabitual']; ?></td><!--hereeeeeeeeeeee-->
                <td><?php echo $datos['aniosbebedor']; ?></td>
                <td><?php echo $datos['frecuenciabebida']; ?></td>
                <td><?php echo $datos['exbebedor']; ?></td>
                <td><?php echo $datos['aniosexbebedor']; ?></td>
              </tr>
            </tbody>
          </table> 

          <label for="" class="text-dark">Problemas con bebidas: (<?php echo $datos['problemadebebida']; ?>)</label>
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text table_sizefont" id="inputGroup-sizing-default">Cuales:</span>
            </div>
            <textarea class="form-control table_sizefont groundcolor" rows="1"><?php echo $datos['cualbebidaproblema']; ?></textarea>
          </div>

          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text table_sizefont" id="inputGroup-sizing-default">Tipo licor:
                <div class="separator"></div></span>
            </div>
            <textarea class="form-control table_sizefont groundcolor" rows="1"><?php echo $datos['tipolicor']; ?></textarea>
          </div>

          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text table_sizefont" id="inputGroup-sizing-default">Habitos toxicos:
                <div class="separator"></div>(<?php echo $datos['otrohabitotoxico']; ?>)</span>
            </div>
            <textarea class="form-control table_sizefont groundcolor" rows="1"><?php echo $datos['cualhabitotoxico']; ?></textarea>
          </div>

          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text table_sizefont" id="inputGroup-sizing-default">Medicamento regular:
                <div class="separator"></div>(<?php echo $datos['medicamentoregular']; ?>)</span>
            </div>
            <textarea class="form-control table_sizefont groundcolor" rows="1"><?php echo $datos['cualmedicamento']; ?></textarea>
          </div>
          
          <label for="" class="text-dark">Pendiente cirugias en EPS: (<?php echo $datos['cirugiaeps']; ?>)</label>
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text table_sizefont" id="inputGroup-sizing-default">Cuales:
                <div class="separator"></div></span>
            </div>
            <textarea class="form-control table_sizefont groundcolor" rows="1"><?php echo $datos['cualcirugia']; ?></textarea>
          </div>

          <label for="" class="text-dark">Pendiente tratamientos: (<?php echo $datos['tratamientopendiente']; ?>)</label>
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text table_sizefont" id="inputGroup-sizing-default">Cuales:
                <div class="separator"></div></span>
            </div>
            <textarea class="form-control table_sizefont groundcolor" rows="1"><?php echo $datos['cualtratamiento']; ?></textarea>
          </div>

          <label for="" class="text-dark">Incapacidad ultimos 6 meses: (<?php echo $datos['ultimaincapacidad']; ?>)</label>
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text table_sizefont" id="inputGroup-sizing-default">Motivo:
                <div class="separator"></div></span>
            </div>
            <textarea class="form-control table_sizefont groundcolor" rows="1"><?php echo $datos['motivoincapacidad']; ?></textarea>
          </div>

          <div class="text-center">
            <strong>Signos Vitales:</strong>
          </div>
          <table class="table table-bordered groundcolor">
            <thead>
              <th class="text-center">Mano Habil</th>
              <th class="text-center">Cicatrices</th>
              <th class="text-center">Tatuajes</th>
              <th class="text-center">Tension Arterial</th>
              <th class="text-center">Frecuencia Cardiaca</th>
              <th class="text-center">Frecuencia Respiratoria</th>
              <th class="text-center">Talla</th>
              <th class="text-center">Peso</th>
              <th class="text-center" >Diagnostico de Peso</th>
            </thead>
            <tbody>
              <tr class="text-center">
                <td><?php echo $datos['extremidadhabil']; ?></td>
                <td><?php echo $datos['cicatrices']; ?></td>
                <td><?php echo $datos['tatuajes']; ?></td>
                <td><?php echo $datos['tensionarterial']; ?></td>
                <td><?php echo $datos['frecuenciacardiaca']; ?></td>
                <td><?php echo $datos['frecuenciarespiratoria']; ?></td>
                <td><?php echo $datos['talla']; ?></td>
                <td><?php echo $datos['peso']; ?></td>
                <td><?php echo $datos['pesodiagnostico']; ?></td>
              </tr>
            </tbody>
          </table>

          <div class="text-center">
            <strong>Exposicion a factores de riesgo suministrados por la Empresa: (<?php echo $datos['riesgosuministrado']; ?>)</strong>
          </div>
          <table class="table table-bordered groundcolor">
            <thead>
              <tr>
                <th class="text-center">Fisico</th>
                <th class="text-center">Quimico</th>
                <th class="text-center">Biologico</th>
                <th class="text-center">Ergonomico</th>
                <th class="text-center">Mecanico</th>
                <th class="text-center">Psicosocial</th>
                <th class="text-center">Electrico</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td class="text-center"> <?php echo $datos['fisico']; ?></td>
                <td class="text-center"> <?php echo $datos['mecanico']; ?></td>
                <td class="text-center"> <?php echo $datos['quimico']; ?></td>
                <td class="text-center"> <?php echo $datos['psicosocial']; ?></td>
                <td class="text-center"> <?php echo $datos['biologico']; ?></td>
                <td class="text-center"> <?php echo $datos['electrico']; ?></td>
                <td class="text-center"> <?php echo $datos['ergonomico']; ?></td>
              </tr>
            </tbody>
          </table>
        </div>
        <?php 
          }//fin array
        }
        ?>
    </div>
    <div class="panel-footer" style="background: #F4FDFF;">
      <a data-toggle="collapse" href="#collapse1">
        <h6 class="panel-title text-center"><i class="fas fa-arrow-up"></i>Minimizar Historia de Enfermeria</h6>
      </a>
    </div>
  </div>
</div><br>

<script src="jvalidation/validaciones/medico.js"></script>



<form class="form" action="" method="POST" role="form" id="formulario" name="formulario"> 
  <input class="form-control" type="text" name="historia" value='<?php echo $historia; ?>' style="display: none;">
  <input type="text" name="hora" id="myWatch" style="display: none;">

<div class="panel panel-default">
  <div class="panel-heading"><div class="text-center"><h6>Examen Fisico: </h6></div></div>
  <div class="panel-body">
    <div class="container-fluid">
      <table class="table table-bordered table_sizefont"> 
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

      <label>Otro examen fisico:</label>
      <label for="otro_examen_fisico" generated="true" class="error"></label><br>
      <textarea class="form-control size_font" name="otro_examen_fisico" rows="2"></textarea><br>

      <label>Observaciones:</label>
      <label for="observaciones_ex_fisico" generated="true" class="error"></label><br>
      <textarea class="form-control size_font" type="text" name="observaciones_ex_fisico" rows="2"></textarea>
    </div>
  </div>
</div><br>
 
<div class="panel panel-default">
  <div class="panel-heading"><div class="text-center"><h6>Pruebas Funcionales: </h6></div></div>
  <div class="panel-body"> 
    <div class="container-fluid">
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
        <tbody>
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
      <textarea class="form-control size_font" type="text" name="hallazgos_funcionales" rows="2"></textarea><br>
    </div>  
  </div>
</div><br>

<!---->
<div class="panel panel-default">
  <div class="panel-heading text-center"><h6>Paraclinicos:</h6></div>
  <div class="panel-body"> 
    <div class="container-fluid">        
      <table class="table table-bordered table_sizefont">
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
            <td><input type="checkbox" name="colesterol" checked value="X"></td>
            <td><input type="checkbox" name="glicemia" checked value="X"></td>
            <td><input type="checkbox" name="trigliceridos" checked value="X"></td>
            <td><input type="checkbox" name="frotis_faringeo" value="X"></td>
            <td><input type="checkbox" name="frotis_una" value="X"></td>
            <td><input type="checkbox" name="hemograma" checked value="X"></td>
            <td><input type="checkbox" name="coprologico" value="X"></td>
            <td><input type="checkbox" name="grupo_rh" value="X"></td>
            <td><input type="checkbox" name="electrocardiograma" value="X"></td>
            <td><input type="checkbox" name="tamizaje_visual" value="X"></td>
          </tr>
        </tbody>
      </table><br>

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
        <tbody>
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
            <td><input type="checkbox" name="audiometria" value="X"></td>
            <td><input type="checkbox" name="visiometria" value="X"></td>
            <td><input type="checkbox" name="psicologico" value="X"></td>
            <td><input type="checkbox" name="espirometria" value="X"></td>
            <td><input type="checkbox" name="optometria" value="X"></td>
         </tr>
        </tbody>
      </table>
         
      <label>Otros:</label> 
      <label for="otro_paraclinico" generated="true" class="error"></label><br>
      <input type="text" name="otro_paraclinico" class="form-control input-sm"><br>
            
      <label>Diagnostico:</label> 
      <label for="paradiagnostico" generated="true" class="error"></label><br>
      <input type="text" name="paradiagnostico" class="form-control input-sm">
    </div>
  </div>
</div>

<div class="panel panel-default">
  <div class="panel-body">
    <table class="table table-borderless">
      <tbody id="tabla">
        <tr>
          <td>
            <div class="text-center panel-heading">
              <label for="remision" generated="true" class="error"></label>
              <h6>Remision 
                Si <input type="radio" name="remision[]" value="Si"> / 
                NO <input type="radio" name="remision[]" value="No" checked>
              </h6>
            </div>
            
            <div class="container-fluid">
              <div class="row">
                <div class="col-sm-6">
                  <label>Desde:</label>
                  <label for="remision_desde" generated="true" class="error"></label>
                  <input class="form-control" type="text" name="remision_desde[]" value="Laboratorio de Seguridad y Salud en el Trabajo - SST">
                </div>

                <div class="col-sm-6">
                  <label>Hacia:</label>
                  <label for="remision_hacia" generated="true" class="error"></label>
                  <input class="form-control" type="text" name="remision_hacia[]">
                </div>
              </div><br>

              <div class="row">
                <div class="col-sm-6">
                  <label>Especialidad:</label>
                  <label for="especialidad" generated="true" class="error"></label>
                  <input class="form-control" type="text" name="especialidad[]">
                </div>
                
                <div class="col-sm-6">
                  <label class="text-center">Motivo:</label>
                  <label for="remision_motivo" generated="true" class="error"></label>
                  <textarea class="form-control col-sm-12" type="text" name="remision_motivo[]" rows="1"></textarea>
                </div>
              </div>
            </div>

            <div class="text-center">
              <label for="remision_pendiente" generated="true" class="error"></label><br>
              <label class="text-danger">Resultado de Remision Pendiente</label> 
              Si <input type="radio" name="remision_pendiente[]" value="Si"> / 
              NO <input type="radio" name="remision_pendiente[]" value="No" checked>
            </div>
          </td>
        </tr>
      </tbody> 
    </table>
    <div class="text-center"><input class="btn btn-primary btn-sm" type="button" value="Agregar" id="agregarFila"></div><br>
  </div>
</div><br>

<!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script> -->
<script>
  $(function(){
    tabla = $('#tabla');
    tr = $('tr:first', tabla);
    $('#agregarFila').on('click', function (){
        tr.clone().appendTo(tabla).find(':text').val('');
    });
 
    $(".eliminarFila").on('click', function (){
        $(this).closest('tr').remove();
    });
 
  });
</script>
  <div class="panel panel-default">
    <div class="panel-heading"><div class="text-center"><label>Concepto Aptitud Laboral: </label></div> </div>
    <div class="panel-body"><br>
      <div class="container-fluid">          
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
        <!--<thead>
              <tr class="active">
              <th class="text-center">Apto:</th>
              <th class="text-center" colspan="2">Examen De <?php //echo $examen; ?>:</th>
              </tr>
            </thead> 
            <tr class="text-center">
            <td>
              SI <input type="radio" name="apto" value="Si"> / 
              NO <input type="radio" name="apto" value="No" checked>
            </td>-->
            </tr>
          </tbody>
        </table>

        <div class="form-group">
          <label for="" class="text-dark">Diagnostico Examen:</label>
          Normal <input type="radio" name="examen_diagnostico" value="Normal"> / 
          Anormal <input type="radio" name="examen_diagnostico" value="Anormal">
        </div>

        <label class="text-center">Observaciones:</label>
        <label for="observaciones_aptitud_laboral" generated="true" class="error"></label><br>
        <textarea class="form-control" type="text" name="observaciones_aptitud_laboral" rows="1"></textarea><br>
        
        <div class="text-center"><label for="" class="text-dark">Examen medico con enfasis en:</label></div>
        <table class="table table-bordered">
          <thead>
            <tr>
              <th class="text-center">OSTEOMUSCULAR</th>
              <th class="text-center">CARDIOVASCULAR</th>
              <th class="text-center">PULMONAR</th>
              <th class="text-center">MANIPULACION DE ALIMENTOS</th>
              <th class="text-center">OTRO</th>
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
                <textarea name="otro_enfasis" class="form-control" rows="1"></textarea>
              </td>
            </tr>
          </tbody>
        </table>
      
        <table class="table table-bordered">
          <tbody>
            <tr>
              <td>
                <strong>EL EXAMEN FISICO NO PRESENTA ALTERACIONES  NI PATOLOGÍAS:</strong>
              </td> 
              <td> 
                <label for="ef_no_defectos" generated="true" class="error"></label>
                SI <input type="radio" name="ef_no_defectos" value="Si"> / 
                NO <input type="radio" name="ef_no_defectos" value="No">
              </td>
            </tr>
            <tr>
              <td>
                <strong>EL EXAMEN FISICO PRESENTA CONDICIONES DE SALUD QUE NO DISMINUYEN SU CAPACIDAD LABORAL:</strong>
              </td> 
              <td>
                <label for="ef_disminuye_capacidad" generated="true" class="error"></label>
                SI <input type="radio" name="ef_disminuye_capacidad" value="Si"> / 
                NO <input type="radio" name="ef_disminuye_capacidad" value="No">
              </td>
            </tr>
            <tr>
              <td>
                <strong>EL EXAMEN FISICO PRESENTA CONDICIONES DE SALUD QUE PUEDEN AGRAVARSE CON EL TRABAJO:</strong>
              </td> 
              <td>
                <label for="ef_condiciones_agravarse" generated="true" class="error"></label>
                SI <input type="radio" name="ef_condiciones_agravarse" value="Si"> / 
                NO <input type="radio" name="ef_condiciones_agravarse" value="No">
              </td>
            </tr>
            <tr>
              <td>
                <strong>EL EXAMEN FISICO PRESENTA CONDICIONES DE SALUD QUE DEBEN SER TRATADAS POR EPS, ARL:</strong>
              </td> 
              <td> 
                <label for="ef_condiciones_atendidas_eps_arl" generated="true" class="error"></label>
                SI <input type="radio" name="ef_condiciones_atendidas_eps_arl" value="Si"> / 
                NO <input type="radio" name="ef_condiciones_atendidas_eps_arl" value="No">
              </td>
            </tr>
            <tr>
              <td>
                <strong>EL EXAMEN FISICO PRESENTA CONDICIONES DE SALUD QUE DEBEN SER TRATADAS POR EPS, ARL, ANTES DE INGRESAR:</strong>
              </td> 
              <td> 
                <label for="em_atencion_eps_arl_antes" generated="true" class="error"></label>
                SI <input type="radio" name="em_atencion_eps_arl_antes" value="Si"> / 
                NO <input type="radio" name="em_atencion_eps_arl_antes" value="No">
              </td>
            </tr>
            <tr>
              <td>
                <strong>EL EXAMEN MEDICO PRESENTA ALTERACIONES DE SALUD INCOMPATIBLES CON EL CARGO ASIGNADO:</strong>
              </td> 
              <td> 
                <label for="em_atencion_eps_arl_antes" generated="true" class="error"></label>
                SI <input type="radio" name="em_alteraciones_salud" value="Si"> / 
                NO <input type="radio" name="em_alteraciones_salud" value="No">
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div><br> 

  <div class="panel panel-default">
    <div class="panel-heading text-center"><h6>Recomendaciones:</h6></div>
    <div class="panel-body">
      <div class="container-fluid">
        <label class="text-dark">trabajador:</label>
        <label for="recomendacion_trabajador" generated="true" class="error"></label><br>
        <textarea class="form-control size_font" type="text" name="recomendacion_trabajador" rows="4">1- Cuidar su salud y proteccion, cumpliendo con las acciones del SGSST. 2-Hacer Pausas Activas Periodicas. 3-Usar los elementos proteccion personal adecuados. 4-Dieta balanceada, estilo de vida saludable y manejo del estres.</textarea><br>

        <label class="text-dark">Empleador:</label>
        <label for="recomendacion_empleador" generated="true" class="error"></label><br>
        <textarea class="form-control size_font" type="text" name="recomendacion_empleador" rows="4">1-Realizar los examenes medicos ocupacionales anual o segun la normatividad vigente, segun el caso. 2-Seguimiento y control del Sistema de Gestion de Seguridad y Salud en el Trabajo. 3-Realizar pausas activas en sus trabajadores. 4-Se recomienda entrenamiento para trabajos seguro en alturas y verificar competencias y habilidades para desempeñar trabajos en alturas. 5-Seguir recomendaciones.</textarea>
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
              <th class="text-center">Visual</th>
              <th class="text-center">Auditivo</th>
              <th class="text-center">Cardiovascular</th>
              <th class="text-center">Respiratorio</th>
              <th class="text-center">Piel</th>
              <th class="text-center">Psicologico</th>
              <th class="text-center">Osteomuscular</th>
              <th class="text-center">Otro</th>
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
  </div><br>      
  <!---->  
  <div class="panel panel-default">
    <div class="panel-heading text-center"><h6>Restricciones:</h6></div>
    <div class="panel-body">
      <div class="container-fluid">
        <label>trabajador:</label>
        <label for="restriccion_trabajador" generated="true" class="error"></label><br>
        <textarea class="form-control size_font" type="text" name="restriccion_trabajador" rows="3"></textarea> 
        <br>
        <label>Empleador:</label>
        <label for="restriccion_empleador" generated="true" class="error"></label><br>
        <textarea class="form-control size_font" type="text" name="restriccion_empleador" rows="3"></textarea> 
      </div> 
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
  /*echo '<script>
   $(document).ready(function(){
    $("#mostrarmodal").modal("show");
   });</script>';  */
  } 

  ?>

  <!--Error de usuario no registrado o incorrecto-->
<!--   <div class="modal fade" id="mostrarmodal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true" onClick="window.location.href='medico.php';">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button onClick="window.location.href='medico.php';" type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="text-danger"><span class="glyphicon glyphicon-warning-sign"></span> ERROR.</h4>
        </div>
        <div class="modal-body">
          <h4 class="text-primary">El Usuario con Indentificacion Nº <label class="text-danger"><?php //echo $id; ?></label> Incorrecto O no Registrado en el Sistema.</h4>      
        </div>
        <div class="modal-footer">
          <a onClick="window.location.href='medico.php';" data-dismiss="modal" class="btn btn-danger">Cerrar</a>
        </div>
      </div>
    </div>
  </div> -->

<?php 
  //controlador funcion lectorfecha
  $fecha1 = explode("-",date($ultimo)); 
  $fecha2 = $fecha1[0].$fecha1[1].$fecha1[2]; 
  $fechaleida = cambioFecha($fecha2); 
?>
<!-- Modal -->
<div class="modal fade" id="historial" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="text-danger"><i class="fas fa-address-card"></i> Historial de Atenciones</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <h6 class="text-primary"><i class="fas fa-archive"></i> Historial de paciente con indentificacion numero: <label for="" class="text-danger"><?php echo $id; ?></label></h6>
        <h6><i class="fas fa-notes-medical"></i> Motivo de evaluaciones <strong class="text-danger">Ingreso: </strong> <span class="badge badge-secondary"><?php echo $ingreso ?></span></h6>
        <h6><i class="fas fa-notes-medical"></i> Motivo de evaluaciones <strong class="text-danger">Periodicas: </strong> <span class="badge badge-secondary"><?php echo $periodico ?></span></h6>
        <h6><i class="fas fa-notes-medical"></i> Motivo de evaluaciones <strong class="text-danger">Retiro: </strong> <span class="badge badge-secondary"><?php echo $retiro ?></span></h6>
        <h6><i class="fas fa-notes-medical"></i> Motivo de evaluaciones <strong class="text-danger">Post Incapacidad: </strong> <span class="badge badge-secondary"><?php echo $postincapacidad ?></span></h6>
        <h6><i class="fas fa-notes-medical"></i> Motivo de evaluaciones <strong class="text-danger">Reubicacion: </strong> <span class="badge badge-secondary"><?php echo $reubicacion ?></span></h6>
        <h6><i class="fas fa-notes-medical"></i> Motivo de evaluaciones <strong class="text-danger">Reingreso: </strong> <span class="badge badge-secondary"> <?php echo $reingreso ?></span></h6>
        <h6><i class="fas fa-notes-medical"></i> Motivo de evaluaciones <strong class="text-danger">Otros: </strong> <span class="badge badge-secondary"> <?php echo $otros ?></span></h6>

        <h6 class="size_font"><i class="fas fa-calendar-plus"></i> <label for="" class="text-dark">La ultima atencion en enfermeria se realizó el dia: </label><strong class="text-danger"> <?php echo $fechaleida ?></h6>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-info" ><a target="_blank" href="enfermeria_listarpacientes.php" class="fontcolor"><i class="fas fa-search"></i> Consultar</a></button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!---->
</body>
  
  <script src="hora.js"></script>
</html>
