<?php 
include ('includes/conexion.php');

//error_reporting(E_ERROR);
/*$code = base64_decode($_REQUEST['cod']);
  if ($code==255) {
    include ('bar/navbar_administracion.php'); 
  }else if ($code==522){
    include ('bar/navbar_recepcion.php');
  }else{*/
    include ('bar/navbar_medico.php');
 // }

date_default_timezone_set('America/Bogota');
$hora = date('h:i:s A');
$fecha = date('Y-m-d');
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

    .border { border-style: solid; border-width: 4px; height: 275px; }

  </style>

  </head>

   <?php 

  if ($_POST == true) {
    $tipocon = $_POST['tipoconsulta'];
    $historia = $_POST['documento'];
    $fecharegistro = $_POST['fecha_registro'];
  }else{
    $tipocon = base64_decode($_REQUEST['tipoconsulta']);
    $historia = base64_decode($_REQUEST['paciente']);
    $fecharegistro = base64_decode($_REQUEST['registro']);
  }

    $consult="SELECT * FROM datos_basicos AS db
    JOIN datos_complementarios AS dc ON db.fk_d_complementario = dc.id
    JOIN datos_basicos_tipo_documento AS dbtd ON dc.fk_tipo_documento = dbtd.idtd
    JOIN medico_examenfisico AS mef ON db.id_historia = mef.paciente_medico
    JOIN medico_paraclinicos AS mp ON mef.id = mp.id_examen_fisico
    JOIN medico_remision AS mr ON mp.id = mr.id_paraclinico
    JOIN medico_cal AS mcal ON mr.id = mcal.id_remision
    JOIN medico_recomendacion AS mre ON mcal.id = mre.id_aptitud_laboral
    JOIN medico_pve AS mpve ON mre.id = mpve.fk_recomendaciones
    WHERE db.fecha = '$fecharegistro' AND db.id_historia = '$historia' OR dc.numero_documento = '$historia' AND db.fecha = '$fecharegistro' ";
    $query = mysqli_query($conexion,$consult);

    if (mysqli_num_rows($query) > 0){ 

    while ($data=mysqli_fetch_array($query)) {

      //datos personales
      $historia=$data['id_historia'];

      $ruta_destino =   "fotografias/"; //ruta de las fotos de los paciente



    //}
    ?>

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
              <td><?php echo $data['nombres_apellidos']; ?></td>
              <td><?php echo $data['tipo_documento'];?></td>
              <td><?php echo $data['numero_documento']; ?></td>
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
              <td><?php echo $data['edad'];?></td>
              <td><?php echo $data['fecha_nacimiento']; ?></td>
              <td><?php echo $data['genero']; ?></td>
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
              <td><?php echo $data['estado_civil']; ?></td>
              <td><?php echo $data['lugar_nacimiento']; ?></td>
              <td><?php echo $data['celular']; ?></td>
              <td><?php echo $data['direccion']; ?></td>  
              <td><?php echo $data['motivo_evaluacion']; ?></td>
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
              <td><?php echo $data['nombre_empresa']; ?></td>
              <td><?php echo $data['actividad_economica']; ?></td>
              <td><?php echo $data['ciudad']; ?></td>
              <td><?php echo $data['direccion_empresa']; ?></td>
              <td><?php echo $data['numero_nit'];?></td>
              <td><?php echo $data['telefono_empresa']; ?></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div><br>
<?php  if ($tipocon == 1) { ?>   
  <!--ENFERMERAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA-->


<!--FIN RESULTADOS ENFERMERAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA-->
<?php 
  $data_remision = "SELECT * FROM datos_basicos AS db
  JOIN datos_complementarios AS dc ON db.fk_d_complementario = dc.id
  JOIN datos_basicos_tipo_documento AS dbtd ON dc.fk_tipo_documento = dbtd.idtd
  JOIN medico_examenfisico AS mef ON mef.paciente_medico = db.id_historia
  JOIN medico_paraclinicos AS mp ON mef.id = mp.id_examen_fisico
  JOIN medico_remision AS mr ON mp.id = mr.id_paraclinico
  WHERE db.id_historia = ".$historia."";
  $query = mysqli_query($conexion,$data_remision);

  if (mysqli_num_rows($query) > 0){ 

    while ($data=mysqli_fetch_array($query)) { 
  ?>    
  <div class="row">
    <div >
    <div class="panel panel-default">
      <div class="panel-heading text-center">
        <h6 class="text-info">Remision (<?php echo $data['remision']; ?>)</h6>
      </div>
      <div class="panel-body">
        <table class="table table-bordered">
          <thead>
            <th class="text-center">Desde:</th>
            <th class="text-center">Hacia:</th>
            <th class="text-center">Remision Pendiente:</th>
          </thead>
          <tbody class="text-center">
            <tr>
              <td><?php echo $data['desde']; ?></td>
              <td><?php echo $data['hacia']; ?></td>
              <td><?php echo $data['remision_pendiente']; ?></td>
            </tr>
          </tbody>
        </table>
        </div>
      </div>

        <label>Motivo:</label>
        <textarea class="form-control col-sm-12" type="text" name="motivo_remision" rows="3"><?php echo $data['motivo']; ?></textarea>
        <br><br>  

        <br>
        <div class="comtainer-fluid"> 
          <div class="text-center"><a type="" data-toggle="collapse" data-target="#demo2">Contraremision</a></div>
          <div id="demo2" class="collapse">
            <div>
              <br>
              <table class="table table-bordered">
                <tbody>
                  <tr>
                    <td class="text-center"><label>Fecha Contra-Remision: </label> <?php echo $data['fecha_contraremision']; ?></td>
                  </tr>
                </tbody>
              </table>  

              <label>Resultado:</label>
              <textarea class="form-control" type="text" name="resultado_remision" rows="4" disabled><?php echo $data['resultado_remision']; ?></textarea>
              <br>
              <label>Recomendaciones:</label>
              <textarea class="form-control" type="text" name="recomendaciones_remision" rows="4" disabled><?php echo $data['recomendaciones_remision']; ?></textarea>
              <br>
            </div>
          </div>
        </div>
      </div>  
    </div>
<?php
    } 
  }
 ?>



  <br><br>
    <div class="panel panel-default">
      <div class="panel-heading text-center"><label class="text-info">Examen Fisico:</label></div>
      <div class="panel-body">
        <table class="table table-bordered">
          <thead>
            <th class="text-center">Cabeza:</th>
            <th class="text-center">Amigdalas:</th>
            <th class="text-center">Abdomen:</th>
            <th class="text-center">Piel/Anexos:</th>
            <th class="text-center">Ojos:</th>
            <th class="text-center">Cuello:</th>
            <th class="text-center">Genitales:</th>
            <th class="text-center">Neurologico:</th>
            <th class="text-center">Oidos:</th>
            <th class="text-center">Torax:</th>
            <th class="text-center">Nariz:</th>           
          </thead>
          <tbody class="text-center">
            <tr>
              <td><?php echo $data['cabeza']; ?></td>
              <td><?php echo $data['amigdalas']; ?></td>
              <td><?php echo $data['abdomen']; ?></td>
              <td><?php echo $data['piel_anexos']; ?></td>
              <td><?php echo $data['ojos']; ?></td>
              <td><?php echo $data['cuello']; ?></td>
              <td><?php echo $data['genitales']; ?></td>
              <td><?php echo $data['neurologico']; ?></td>
              <td><?php echo $data['oidos']; ?></td>
              <td><?php echo $data['torax']; ?></td>
              <td><?php echo $data['nariz']; ?></td>
                      
            </tr>
          </tbody>
          <thead>
            <th class="text-center">Muscular:</th>
            <th class="text-center">Pulmones:</th>    
            <th class="text-center">Vascular:</th>
            <th class="text-center">Dentadura:</th>
            <th colspan="2" class="text-center">Miembros Superiores:</th>
            <th colspan="2" class="text-center">Miembros Inferiores:</th>
            <th class="text-center">Corazon:</th>
            <th class="text-center">Columna:</th>
            <th class="text-center">Oseo:</th>

          </thead>
          <tbody class="text-center">
            <tr>
            <td><?php echo $data['muscular']; ?></td>
            <td><?php echo $data['pulmones']; ?></td>    
            <td><?php echo $data['vascular']; ?></td>
            <td><?php echo $data['dentadura']; ?></td> 
            <td colspan="2"><?php echo $data['miembros_superiores']; ?></td>
            <td colspan="2"><?php echo $data['miembros_inferiores']; ?></td> 
            <td><?php echo $data['corazon']; ?></td>
            <td><?php echo $data['columna']; ?></td>
            <td><?php echo $data['oseo']; ?></td>
            </tr>
          <thead>

            <th class="text-center">Lengua:</th>
            <th class="text-center">Hernias:</th>
            <th class="text-center">Viceras:</th>
            <th colspan="8" class="text-center">Otros:</th>
          </thead>
          <tbody class="text-center">
            <tr>
              <td><?php echo $data['lengua']; ?></td>
              <td><?php echo $data['hernia']; ?></td>
              <td><?php echo $data['viceras']; ?></td>
              <td colspan="8"><?php echo $data['otro_examen_fisico']; ?></td>
            </tr>
          </tbody>
        </table>
      
        <label>Observaciones:</label>
        <textarea class="form-control col-sm-12" type="text" name="observaciones_ex_fisico" rows="3"><?php echo $data['observaciones_ex_fisico']; ?></textarea>
      </div>
    </div> 

    <div class="panel panel-default">
      <div class="panel-heading text-center"><label class="text-info">Pruebas Funcionales:</label></div>
      <div class="panel-body">
        <table class="table table-bordered">
          <thead>
            <th class="text-center">Marcha:</th>
            <th class="text-center">Coordinacion:</th>
            <th class="text-center">Columna:</th>
            <th class="text-center">Miembros Superiores:</th>
            <th class="text-center">Miembros Inferiores:</th>
            <th class="text-center">Reflejos:</th>
          </thead>
          <tbody class="text-center">
            <tr>
              <td><?php echo $data['marcha']; ?></td>              
              <td><?php echo $data['coordinacion_funcionales']; ?></td>
              <td><?php echo $data['columna_funcional']; ?></td>
              <td><?php echo $data['miembros_superiores_funcionales']; ?></td>
              <td><?php echo $data['miembros_inferiores_funcionales']; ?></td>
              <td><?php echo $data['reflejos_funcionales']; ?></td>
            </tr>
          </tbody>
        </table>

        <table class="table table-bordered">
          <br>
            <thead>
              <th class="text-center">Phalen:</th>
              <th class="text-center">Finkelstein:</th>
              <th class="text-center">Braggard:</th>
              <th class="text-center">Shober:</th>
              <th class="text-center">Babinski Weil:</th>
              <th class="text-center">Romber Sensibilidad:</th>
              <th class="text-center">Romber:</th>
              <th class="text-center">Tinel:</th>
              <th class="text-center">Lasegue:</th>
              <th class="text-center">Adams:</th>
              <th class="text-center">Unterberger:</th>
              <th class="text-center">Nariz-Dedo:</th>
            </thead>
            <tbody class="text-center">
              <tr>
                <td><?php echo $data['phalen']; ?></td>
                <td><?php echo $data['finkelstein']; ?></td>
                <td><?php echo $data['braggard']; ?></td>
                <td><?php echo $data['shober']; ?></td>
                <td><?php echo $data['babinski_weil']; ?></td>
                <td><?php echo $data['romber_sensibilidad']; ?></td>
                <td><?php echo $data['romber']; ?></td>
                <td><?php echo $data['tinel']; ?></td>
                <td><?php echo $data['lasegue']; ?></td>
                <td><?php echo $data['adams']; ?></td>
                <td><?php echo $data['unterberger']; ?></td>
                <td><?php echo $data['nariz_dedo']; ?></td>
              </tr>
            </tbody>
          </table>

          <table class="table table-bordered">
            <thead>
              <th class="text-center">Miembro Superior-Tono:</th>
              <th class="text-center">Miembro Superior-Fuerza:</th>
              <th class="text-center">Miembro Superior-Sensibilidad:</th>
              <th class="text-center">Miembro Superior-Arcos-Movimiento:</th>
            </thead>
            <tbody>
              <tr class="text-center">
                <td><?php echo $data['miembro_superior_tono']; ?></td>
                <td><?php echo $data['miembro_superior_fuerza']; ?></td>
                <td><?php echo $data['miembro_superior_sensibilidad']; ?></td>
                <td><?php echo $data['miembro_superior_arco_movimiento']; ?></td>
              </tr>
            </tbody>
              <thead>
                <th class="text-center">Miembro Inferior-Tono:</th>
                <th class="text-center">Miembro Inferior-Fuerza:</th>
                <th class="text-center">Miembro Inferior-Sensibilidad:</th>
                <th class="text-center">Miembro Inferior-Arcos-Movimiento:</th>
              </thead>
            <tbody>
              <tr class="text-center">
                <td><?php echo $data['miembro_inferior_tono']; ?></td>
                <td><?php echo $data['miembro_inferior_fuerza']; ?></td>
                <td><?php echo $data['miembro_inferior_sensibilidad']; ?></td>
                <td><?php echo $data['miembro_inferior_arco_movimiento']; ?></td>
              </tr>
            </tbody>
          </table>
     
          <label>Hallazgos:</label>
          <textarea class="form-control col-sm-12" type="text" name="hallazgos_funcionales" rows="3"><?php echo $data['hallazgos_funcionales']; ?></textarea>
          <br><br>  
   
        </div>  
      </div>

    <div class="panel panel-default">
      <div class="panel-heading text-center"><label class="text-info">Paraclinicos:</label></div>
      <div class="panel-body">
        <table class="table table-bordered">
          <thead>
            <th class="text-center">Colesterol:</th>
            <th class="text-center">Glicemia:</th>
            <th class="text-center">Trigliceridos:</th>
            <th class="text-center">Frotis Faringeo:</th>
            <th class="text-center">Frotis de Uña:</th>
            <th class="text-center">Hemograma:</th>
            <th class="text-center">Coprologico:</th>
            <th class="text-center">Electrocardiograma</th>
          </thead>
          <tbody>
            <tr class="text-center">
              <td><?php echo $data['colesterol']; ?></td>
              <td><?php echo $data['glicemia']; ?></td>
              <td><?php echo $data['trigliceridos']; ?></td>
              <td><?php echo $data['frotis_faringeo']; ?></td>
              <td><?php echo $data['frotis_de_una']; ?></td>
              <td><?php echo $data['hemograma'];?></td>
              <td><?php echo $data['coprologico']; ?></td>
              <td><?php echo $data['electrocardiograma']; ?></td>
            </tr>
          </tbody>
          <tbody>
          <thead>
            <th colspan="8" class="text-center"><label>(Rayos X):</label> </th>
          </thead>
          <thead>
            <th class="text-center">Columna:</th>
            <th class="text-center">Torax:</th>
            <th class="text-center" colspan="2">Abdomen:</th>
            <th class="text-center" colspan="2">Miembros Superiores:</th>
            <th class="text-center" colspan="2">Miembros Inferiores:</th>
          </thead>
          <tbody>
            <tr class="text-center">
              <td><?php echo $data['columna_paraclinico']; ?></td>
              <td><?php echo $data['torax_paraclinico']; ?></td>
              <td colspan="2"><?php echo $data['abdomen_paraclinico']; ?></td>
              <td colspan="2"><?php echo $data['miembros_superiores_paraclinico']; ?></td>
              <td colspan="2"><?php echo $data['miembros_inferiores_paraclinico']; ?></td>        
            </tr>
          </tbody>
        </table>
      </div>
    </div> 

    


    <div class="panel panel-default">
      <div class="panel-heading text-center" style="height: 30px;"><b class="text-info">APTITUD OCUPACIONAL:</b> <?php echo ($motivo_evaluacion) ?></div>
      <div class="panel-body">
        <table class="table table-bordered">
          <thead>
            <th class="text-center">Examenes:</th>
            <th class="text-center">Resultado:</th>
          </thead>
          <tbody>
            <tr>
              <td><label>EL EXAMEN FISICO NO PRESENTA DEFECTOS NI PATOLOGÍAS:</label></td>
              <td style="width: 230px;" class="text-center"><?php echo $data['ef_no_defectos']; ?></td>
            </tr>
            <tr>
              <td><label>EL EXAMEN MÉDICO PRESENTA CONDICIONES DE SALUD QUE NO DISMINUYEN SU CAPACIDAD LABORAL:</label></td>
              <td class="text-center"><?php echo $data['ef_disminuye_capacidad']; ?></td>
            </tr>
            <tr>
              <td><label>AL EXAMEN MÉDICO PRESENTA CONDICIONES DE SALUD QUE PUEDEN AGRAVARSE CON EL TRABAJO: </label></td>
              <td class="text-center"><?php echo $data['ef_condiciones_agravarse']; ?></td>
            </tr>
            <tr>
              <td><label style="font-size: 13px;">AL EXAMEN MÉDICO PRESENTA CONDICIONES DE SALUD QUE DEBEN SER TRATADAS POR EPS O ARL, ANTES DE INGRESAR: </label></td>
              <td class="text-center"><?php echo $data['ef_condiciones_atendidas_por_eps']; ?></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div> 

    <div class="panel panel-default">
      <div class="panel-heading text-center"><label class="text-info">Concepto Aptitud Laboral</label></div>
      <div class="panel-body">
          <table class="table table-bordered">
            <thead>
              <th class="text-center">Apto Trabajo A Nivel:</th>
              <th class="text-center">Apto Trabajo En Altura:</th>
              <th class="text-center">Apto Para El Cargo Con Restricciones Que No Intervienen En Su Trabajo:</th>
            </thead>
            <tbody>
              <tr class="text-center">
                <td><?php echo $data['apto_trabajo_nivel']; ?></td>
                <td><?php echo $data['apto_trabajo_altura']; ?></td>
                <td><?php echo $data['apto_con_restricciones_no_intervienen']; ?></td>
              </tr>
            </tbody>
            <thead>
              <th class="text-center">Aplazado:</th>
              <th class="text-center">Nueva Valoracion:</th>
              <th class="text-center">Apto Para El Cargo Con Limitaciones Que Intervienen Con Su Trabajo:</th>
            </thead>
            <tbody>
              <tr class="text-center">
                <td><?php echo $data['aplazado']; ?></td>
                <td><?php echo $data['nueva_valoracion']; ?></td>
                <td><?php echo $data['apto_con_limitaciones_si_intervienen']; ?></td>
              </tr>
            </tbody>
            <thead>
              <th class="text-center">Apto para el Cargo</th>
              <th class="text-center" colspan="2">Examen De <?php echo $data['motivo_evaluacion']; ?>:</th>
            </thead>
            <tbody>
              <tr class="text-center">
                <td><?php echo $apto ?></td>
                <td colspan="2"><?php echo $data['examen_diagnostico']; ?></td>
              </tr>
            </tbody>
        </table>

        <label>Observaciones:</label>
        <textarea class="form-control col-sm-12" type="text" name="observaciones_aptitud_laboral" rows="3"><?php echo $data['observaciones_aptitud_laboral']; ?></textarea>
      </div>
    </div> 

    <div class="panel panel-default">
      <div class="panel-heading text-center"><label class="text-info">Recomendaciones:</label></div>
      <div class="panel-body">
        <div >
          <label>Trabajador:</label>
          <textarea class="form-control col-sm-12" type="text" name="recomedaciones_trabajador" rows="3"><?php echo $data['reco_trabajador']; ?></textarea>  
        </div>  

        <label>Empleador:</label>
        <textarea class="form-control col-sm-12" type="text" name="recomedaciones_trabajador" rows="3"><?php echo $data['reco_empleador']; ?></textarea>
 
        <div class="container-fluid"><br></div>

        <table class="table table-bordered">
          <thead>
          <th colspan="8" class="text-center">Ingreso al Programa de Vigilancia Epidemiologica: (<?php echo $data['pve']; ?>) </th>
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
              <td><?php echo $data['pve_visual']; ?></td>
              <td><?php echo $data['pve_auditivo']; ?></td>
              <td><?php echo $data['pve_cardiovascular']; ?></td>
              <td><?php echo $data['pve_respiratorio']; ?></td>
              <td><?php echo $data['pve_piel']; ?></td>
              <td><?php echo $data['pve_psicologico']; ?></td>
              <td><?php echo $data['pve_osteomuscular']; ?></td>
              <td>
                <textarea name="pve_otro" class="form-control"><?php echo $data['pve_otro']; ?></textarea>              
                <label for="pve_otro" generated="true" class="error"></label>
              </td>
            </tr>
          </tbody>
        </table>  
      </div>
    </div>

    <div class="panel panel-default">
      <div class="panel-heading text-center"><label class="text-info">Restricciones:</label></div>
      <div class="panel-body">
        
        <label>Trabajador:</label>
        <textarea class="form-control col-sm-12" type="text" name="restricciones_trabajador" rows="3"><?php echo $data['rest_trabajador']; ?></textarea>
        <br><br>  
        
        <label>Empleador:</label>
        <textarea class="form-control col-sm-12" type="text" name="restricciones_trabajador" rows="3"><?php echo $data['rest_empleador']; ?></textarea>
      </div>
    </div>

    <label>Nota:</label> Declaro que la información suministrada por mi persona, son verídica y completa y autorizo para que esta información sea consultada por el área de salud ocupacional o la oficina de talento humano y los de ley: <?php echo $data['autorizacion_manejo_informacion']; ?>
<?php 

}else if ($tipocon == 2){

 ?>

  <table class="table table-bordered">
    <thead>
    <th colspan="5" class="text-center text-info">Examen Medico Con Enfasis En:</th>
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
        <td><?php echo $data['enfasis_osteomuscular']; ?></td>

        <td> 
          <?php echo $data['enfasis_cardiovascular']; ?>
        </td>

        <td> 
          <?php echo $data['enfasis_pulmonar']; ?>
        </td>

        <td> 
          <?php echo $data['enfasis_manipulacion_alimentos']; ?>
        </td>

        <td>
          <?php echo $data['enfasis_otros']; ?>
        </td>
      </tr>
    </tbody>
  </table>
      <div class="panel panel-default">
      <div class="panel-heading text-center"><label class="text-info">Examenes Realizados:</label></div>
      <div class="panel-body">
        <table class="table table-bordered">
          <thead>
            <th class="text-center">Colesterol:</th>
            <th class="text-center">Glicemia:</th>
            <th class="text-center">Trigliceridos:</th>
            <th class="text-center">Frotis Faringeo:</th>
            <th class="text-center">Frotis de Uña:</th>
            <th class="text-center">Hemograma:</th>
            <th class="text-center">Coprologico:</th>
            <th class="text-center">Electrocardiograma</th>
          </thead>
          <tbody>
            <tr class="text-center">
              <td><?php echo $data['colesterol']; ?></td>
              <td><?php echo $data['glicemia']; ?></td>
              <td><?php echo $data['trigliceridos']; ?></td>
              <td><?php echo $data['frotis_faringeo']; ?></td>
              <td><?php echo $data['frotis_de_una']; ?></td>
              <td><?php echo $data['hemograma'];?></td>
              <td><?php echo $data['coprologico']; ?></td>
              <td><?php echo $data['electrocardiograma']; ?></td>
            </tr>
          </tbody>
          <tbody>
          <thead>
            <th colspan="8" class="text-center"><label>(Rayos X):</label> </th>
          </thead>
          <thead>
            <th class="text-center">Columna:</th>
            <th class="text-center">Torax:</th>
            <th class="text-center" colspan="2">Abdomen:</th>
            <th class="text-center" colspan="2">Miembros Superiores:</th>
            <th class="text-center" colspan="2">Miembros Inferiores:</th>
          </thead>
          <tbody>
            <tr class="text-center">
              <td><?php echo $data['columna_paraclinico']; ?></td>
              <td><?php echo $data['torax_paraclinico']; ?></td>
              <td colspan="2"><?php echo $data['abdomen_paraclinico']; ?></td>
              <td colspan="2"><?php echo $data['miembros_superiores_paraclinico']; ?></td>
              <td colspan="2"><?php echo $data['miembros_inferiores_paraclinico']; ?></td>        
            </tr>
          </tbody>
        </table>
      </div>
    </div> 


   <?php 
  $data_remision = "SELECT * FROM datos_basicos AS db
  JOIN datos_complementarios AS dc ON db.fk_d_complementario = dc.id
  JOIN datos_basicos_tipo_documento AS dbtd ON dc.fk_tipo_documento = dbtd.idtd
  JOIN medico_examen_fisico AS mef ON mef.paciente_medico = db.id_historia
  JOIN medico_paraclinicos AS mp ON mef.id = mp.id_examen_fisico
  /*LEFT JOIN medico_remision as mr ON (mp.id = mr.id_paraclinico)*/
  JOIN medico_remision AS mr ON mp.id = mr.id_paraclinico
  /*JOIN medico_concepto_aptitud_laboral AS mcal ON mr.id = mcal.id_remision*/
  WHERE db.id_historia = ".$historia."";
  $query = mysqli_query($conexion,$data_remision);

  if (mysqli_num_rows($query) > 0){ 

    while ($data=mysqli_fetch_array($query)) { 
  ?>    

      <div class="panel panel-default">
      <div class="panel-heading text-center"><label class="text-info">Remision (<?php echo $data['remision']; ?>)</label></div>
      <div class="panel-body">
        <table class="table table-bordered">
          <thead>
            <th class="text-center">Desde:</th>
            <th class="text-center">Hacia:</th>
            <th class="text-center">Remision Pendiente:</th>
          </thead>
          <tbody class="text-center">
            <tr>
              <td><?php echo $data['desde']; ?></td>
              <td><?php echo $data['hacia']; ?></td>
              <td><?php echo $data['remision_pendiente']; ?></td>
            </tr>
          </tbody>
        </table>

        <label>Motivo:</label>
        <textarea class="form-control col-sm-12" type="text" name="motivo_remision" rows="3"><?php echo $data['motivo']; ?></textarea>
        <br><br>  

        <br>
        <div class="comtainer-fluid"> 
          <div class="text-center"><a type="" data-toggle="collapse" data-target="#demo2">Contraremision</a></div>
          <div id="demo2" class="collapse">
            <div>
              <br>
              <table class="table table-bordered">
                <tbody>
                  <tr>
                    <td class="text-center"><label>Fecha Contra-Remision: </label> <?php echo $data['fecha_contraremision']; ?></td>
                  </tr>
                </tbody>
              </table>  

              <label>Resultado:</label>
              <textarea class="form-control" type="text" name="resultado_remision" rows="4" disabled><?php echo $data['resultado_remision']; ?></textarea>
              <br>
              <label>Recomendaciones:</label>
              <textarea class="form-control" type="text" name="recomendaciones_remision" rows="4" disabled><?php echo $data['recomendaciones_remision']; ?></textarea>
              <br>
            </div>
          </div>
        </div>
      </div>  
    </div>
<?php
    } 
  }
 ?>
    <div class="panel panel-default">
      <div class="panel-heading text-center"><label class="text-info">Recomendaciones:</label></div>
      <div class="panel-body">
        <div >
          <label>Trabajador:</label>
          <textarea class="form-control col-sm-12" type="text" name="recomedaciones_trabajador" rows="3"><?php echo $data['reco_trabajador']; ?></textarea>  
        </div>  

        <label>Empleador:</label>
        <textarea class="form-control col-sm-12" type="text" name="recomedaciones_trabajador" rows="3"><?php echo $data['reco_empleador']; ?></textarea>
 
        <div class="container-fluid"><br></div>

        <table class="table table-bordered">
          <thead>
          <th colspan="8" class="text-center">Ingreso al Programa de Vigilancia Epidemiologica: (<?php echo $data['pve']; ?>) </th>
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
              <td><?php echo $data['pve_visual']; ?></td>
              <td><?php echo $data['pve_auditivo']; ?></td>
              <td><?php echo $data['pve_cardiovascular']; ?></td>
              <td><?php echo $data['pve_respiratorio']; ?></td>
              <td><?php echo $data['pve_piel']; ?></td>
              <td><?php echo $data['pve_psicologico']; ?></td>
              <td><?php echo $data['pve_osteomuscular']; ?></td>
              <td>
                <textarea name="pve_otro" class="form-control"><?php echo $data['pve_otro']; ?></textarea>              
                <label for="pve_otro" generated="true" class="error"></label>
              </td>
            </tr>
          </tbody>
        </table>  
      </div>
    </div>
<!--uu-->
 
    <div class="panel panel-default">
      <div class="panel-heading text-center"><label class="text-info">Restricciones:</label></div>
      <div class="panel-body">
        
        <label>Trabajador:</label>
        <textarea class="form-control col-sm-12" type="text" name="restricciones_trabajador" rows="3"><?php echo $data['rest_trabajador']; ?></textarea>
        <br><br>  
        
        <label>Empleador:</label>
        <textarea class="form-control col-sm-12" type="text" name="restricciones_trabajador" rows="3"><?php echo $data['rest_empleador']; ?></textarea>
      </div>
    </div>

    <div class="panel panel-default">
      <div class="panel-heading text-center"><label class="text-info">Concepto Aptitud Laboral</label></div>
      <div class="panel-body">
          <table class="table table-bordered">
            <thead>
              <th class="text-center">Apto Trabajo A Nivel:</th>
              <th class="text-center">Apto Trabajo En Altura:</th>
              <th class="text-center">Apto Para El Cargo Con Restricciones Que No Intervienen En Su Trabajo:</th>
            </thead>
            <tbody>
              <tr class="text-center">
                <td><?php echo $data['apto_trabajo_nivel']; ?></td>
                <td><?php echo $data['apto_trabajo_altura']; ?></td>
                <td><?php echo $data['apto_con_restricciones_no_intervienen']; ?></td>
              </tr>
            </tbody>
            <thead>
              <th class="text-center">Aplazado:</th>
              <th class="text-center">Nueva Valoracion:</th>
              <th class="text-center">Apto Para El Cargo Con Limitaciones Que Intervienen Con Su Trabajo:</th>
            </thead>
            <tbody>
              <tr class="text-center">
                <td><?php echo $data['aplazado']; ?></td>
                <td><?php echo $data['nueva_valoracion']; ?></td>
                <td><?php echo $data['apto_con_limitaciones_si_intervienen']; ?></td>
              </tr>
            </tbody>
            <thead>
              <th class="text-center">Apto para el Cargo</th>
              <th class="text-center" colspan="2">Examen De <?php echo $data['motivo_evaluacion']; ?>:</th>
            </thead>
            <tbody>
              <tr class="text-center">
                <td><?php echo $apto ?></td>
                <td colspan="2"><?php echo $data['examen_diagnostico']; ?></td>
              </tr>
            </tbody>
        </table>

        <label>Observaciones:</label>
        <textarea class="form-control col-sm-12" type="text" name="observaciones_aptitud_laboral" rows="3"><?php echo $data['observaciones_aptitud_laboral']; ?></textarea>
      </div>
    </div>

  <div class="panel panel-default">
    <div class="panel-body">
      <div class="container-fluid">
        <div class="col-sm-6">
          <label>Firma Medico:</label>
        </div> 
        <div class="col-sm-6">
          <label>Firma Paciente:</label>
        </div>
      </div>     
    </div>
  </div>  
  <p>La presente certificación se expide con base en la información manifestada por el trabajador, por la empresa, por el resultado del examen físico médico ocupacional y los resultados de los exámenes paraclínicos realizados, si aplican, dicho certificado tiene carácter confidencial, según la normatividad vigente.</p>

</div><!--fin container-->
</div>
<br>
<?php
}//fin if 
}//array
}else{
  echo '<script>
  $(document).ready(function(){
    $("#mostrarmodal").modal("show");
  });</script>';  
}
?>


</body>
<?php if ($code==255) { ?>
 <!--Error de usuario no registrado o incorrecto Interfaz Admin-->
<div class="modal fade" id="mostrarmodal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true" onClick="window.location.href='admin_resultados_paciente.php';">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button onClick="window.location.href='admin_resultados_paciente.php';" type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="text-danger"><span class="glyphicon glyphicon-warning-sign"></span> ERROR.</h4>
      </div>
      <div class="modal-body">
        <h5 class="text-primary text-justify"><label>El Paciente con Indentificacion Nº <i class="text-danger"><?php echo $historia; ?></i> y fecha de atencion <i class="text-danger"><?php echo $fecharegistro; ?></i>  Incorrecto o no presenta Registro historico en esta area del sistema, Verifique que el numero de documento y la fecha de atencion ingresada coincidan con los registros historicos del paciente.</label></h4>      
      </div>
      <div class="modal-footer">
        <a onClick="window.location.href='admin_resultados_paciente.php';" data-dismiss="modal" class="btn btn-danger">Cerrar</a>
      </div>
    </div>
  </div>
</div>
<?php }else if ($code == 522){ ?>
 <!--Error de usuario no registrado o incorrecto Interfaz Admin-->
<div class="modal fade" id="mostrarmodal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true" onClick="window.location.href='recepcion_resultados_paciente.php';">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button onClick="window.location.href='recepcion_resultados_paciente.php';" type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="text-danger"><span class="glyphicon glyphicon-warning-sign"></span> ERROR.</h4>
      </div>
      <div class="modal-body">
        <h5 class="text-primary text-justify"><label>El Paciente con Indentificacion Nº <i class="text-danger"><?php echo $historia; ?></i> y fecha de atencion <i class="text-danger"><?php echo $fecharegistro; ?></i>  Incorrecto o no presenta Registro historico en esta area del sistema, Verifique que el numero de documento y la fecha de atencion ingresada coincidan con los registros historicos del paciente.</label></h4>      
      </div>
      <div class="modal-footer">
        <a onClick="window.location.href='recepcion_resultados_paciente.php';" data-dismiss="modal" class="btn btn-danger">Cerrar</a>
      </div>
    </div>
  </div>
</div> 
<?php }else{ ?>
<!--Error de usuario no registrado o incorrecto-->
<div class="modal fade" id="mostrarmodal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true" onClick="window.location.href='medico_consult.php';">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button onClick="window.location.href='medico_consult.php';" type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="text-danger"><span class="glyphicon glyphicon-warning-sign"></span> ERROR.</h4>
      </div>
      <div class="modal-body">
        <h5 class="text-primary text-justify"><label>El Paciente con Indentificacion Nº <i class="text-danger"><?php echo $historia; ?></i> y fecha de atencion <i class="text-danger"><?php echo $fecharegistro; ?></i>  Incorrecto o no presenta Registro historico en esta area del sistema, Verifique que el numero de documento y la fecha de atencion ingresada coincidan con los registros historicos del paciente.</label></h4>      
      </div>
      <div class="modal-footer">
        <a onClick="window.location.href='medico_consult.php';" data-dismiss="modal" class="btn btn-danger">Cerrar</a>
      </div>
    </div>
  </div>
</div>
<?php } ?>


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
