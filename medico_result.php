<?php include ('includes/conexion.php');
error_reporting(E_ERROR);
$code = base64_decode($_REQUEST['cod']);
  if ($code==255) {
    include ('bar/navbar_administracion.php'); 
  }else if ($code==522){
    include ('bar/navbar_recepcion.php');
  }else{
    include ('bar/navbar_medico.php');
  }

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
    JOIN medico_examen_fisico AS mef ON db.id_historia = mef.paciente_medico
    JOIN datos_basicos_tipo_documento AS dbtd ON dc.fk_tipo_documento = dbtd.idtd
    JOIN medico_paraclinicos AS mp ON mef.id = mp.id_examen_fisico
    JOIN medico_remision AS mr ON mp.id = mr.id_paraclinico
    JOIN medico_concepto_aptitud_laboral AS mcal ON mr.id = mcal.id_remision
    JOIN medico_recomendaciones_y_restricciones AS mrr ON mcal.id = mrr.id_aptitud_laboral
    JOIN medico_pve AS mpve ON mrr.id = mpve.fk_recomendaciones

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
<br><br>
<div class="panel panel-default">
  <div class="panel-heading text-center"><label>Datos  <a href="#" data-toggle="modal" data-target="#historial">Paciente</a> - Empresa</label></div>
    <div class="panel-body">    
      <img class="img-responsive img-thumbnail paciente_datos" alt="Foto del Paciente" src=<?php echo $ruta_destino."".$historia.'.png'; ?> >
      <div class="col-sm-6">
      <div class="tabla_paciente">
        <table class="table table-bordered">
        <thead>
          <th>Nombres-Apellidos:</th>
          <th>Tipo Documento:</th>
          <th>Numero Documento:</th>
        </thead>

          <tbody style="font-size: 13px;">
            <tr>
              <td><?php echo $data['nombres_apellidos']; ?></td>
              <td><?php echo $data['tipo_documento']; ?></td>
              <td><?php echo $data['numero_documento']; ?></td> 
            </tr>
            <thead>
              <th>Edad:</th>
              <th>Fecha Nacimiento:</th>
              <th>Genero:</th>
            </thead>
            <tr>   
              <td><?php echo $data['edad']; ?></td>
              <td><?php echo $data['fecha_nacimiento']; ?></td>
              <td><?php echo $data['genero']; ?></td>
            </tr>
            <thead>      
              <th>Estado Civil:</th>
              <th>Lugar Nacimiento:</th>
              <th>Numero Celular:</th>
            </thead>
            <tr>   
              <td><?php echo $data['estado_civil']; ?></td>
              <td><?php echo $data['lugar_nacimiento']; ?></td>
              <td><?php echo $data['celular']; ?></td>
            </tr>
            <thead> 
              <th>Direccion</th>
              <th colspan="">Motivo de Evaluacion:</th>
              <th>Cargo a desempeñar:</th>
            </thead>
            <tr>              
              <td><?php echo $data['direccion']; ?></td>  
              <td colspan=""><?php echo $data['motivo_evaluacion']; ?></td>
              <td><?php echo $data['cargo_a_desempenar']; ?></td>
            </tr>
          </tbody>
        </table>
        </div>
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
              <td><?php echo $data['nombre_empresa']; ?></td>
              <td><?php echo $data['actividad_economica']; ?></td>
              <td><?php echo $data['ciudad']; ?></td>
              <td><?php echo $data['direccion_empresa']; ?></td>
              <td><?php echo $data['numero_nit']; ?></td>
              <td><?php echo $data['telefono_empresa']; ?></td>
            </tr>
          </tbody>
        </table>
      </div>
      <!--  -->
    </div>
  </div>
   <?php  if ($tipocon == 1) { ?>   
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
      //riegos suministrados por la empresa
      $riesgos_suministrados= $datos['riesgos_suministrados'];
      $suministrado_fisico= $datos['suministrado_fisico'];
      $suministrado_mecanico= $datos['suministrado_mecanico'];
      $suministrado_quimico= $datos['suministrado_quimico'];
      $suministrado_psicosocial= $datos['suministrado_psicosocial'];
      $suministrado_biologico= $datos['suministrado_biologico'];
      $suministrado_electrico= $datos['suministrado_electrico'];
      $suministrado_ergonomico= $datos['suministrado_ergonomico'];
      $suministrado_otro= $datos['suministrado_otro'];
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
