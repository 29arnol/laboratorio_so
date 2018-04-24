<?php 
  include ('includes/conexion.php'); 
 
  $code = base64_decode($_REQUEST['cod']);
  if ($code==255) {
    include('bar/navbar_administracion.php'); 
  }else if ($code==522){
    include('bar/navbar_recepcion.php'); 
  }else{
    include('bar/navbar_enfermeria.php'); 
  }
  //
  include('bar/style_bar/estilo.css');
  $ruta_destino =   "fotografias/"; //ruta de las fotos de los paciente


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
    WHERE  db.id_historia = '$historia' OR dc.numero_documento = '$historia' AND db.fecha = '$fecharegistro' ";
    $query = mysqli_query($conexion,$consult);
        if (mysqli_num_rows($query) > 0){ 

    while ($datos=mysqli_fetch_array($query)) {
      //datos personales
      $historia=$datos['id_historia'];
      $numero_documento=$datos['numero_documento'];
    //--------
    $cont = "SELECT datos_basicos.motivo_evaluacion, COUNT(motivo_evaluacion) AS Total FROM datos_basicos 
      JOIN datos_complementarios ON datos_basicos.fk_d_complementario = datos_complementarios.id
      JOIN historia_laboral ON  historia_laboral.paciente_enfermeria = datos_basicos.id_historia
      WHERE datos_basicos.motivo_evaluacion = 'Ingreso' AND datos_complementarios.numero_documento=".$numero_documento." ";
      $qcont = mysqli_query($conexion,$cont);
        while ($re = mysqli_fetch_array($qcont)){
      $ingreso = $re{'Total'};      
    }
    $cont = "SELECT datos_basicos.motivo_evaluacion, COUNT(motivo_evaluacion) AS Total FROM datos_basicos 
    JOIN datos_complementarios ON datos_basicos.fk_d_complementario = datos_complementarios.id
    JOIN historia_laboral ON  historia_laboral.paciente_enfermeria = datos_basicos.id_historia
        WHERE datos_basicos.motivo_evaluacion = 'Periodico' AND datos_complementarios.numero_documento=".$numero_documento." ";
      $qcont = mysqli_query($conexion,$cont);
        while ($re = mysqli_fetch_array($qcont)){
      $periodico = $re{'Total'};     
    }
    $cont = "SELECT datos_basicos.motivo_evaluacion, COUNT(motivo_evaluacion) AS Total FROM datos_basicos
    JOIN datos_complementarios ON datos_basicos.fk_d_complementario = datos_complementarios.id
    JOIN historia_laboral ON  historia_laboral.paciente_enfermeria = datos_basicos.id_historia 
        WHERE datos_basicos.motivo_evaluacion = 'Retiro' AND datos_complementarios.numero_documento=".$numero_documento." ";
      $qcont = mysqli_query($conexion,$cont);
        while ($re = mysqli_fetch_array($qcont)){
      $retiro = $re{'Total'};     
    }
    $cont = "SELECT datos_basicos.motivo_evaluacion, COUNT(motivo_evaluacion) AS Total FROM datos_basicos 
    JOIN datos_complementarios ON datos_basicos.fk_d_complementario = datos_complementarios.id
    JOIN historia_laboral ON  historia_laboral.paciente_enfermeria = datos_basicos.id_historia
        WHERE datos_basicos.motivo_evaluacion = 'Post incapacidad' AND datos_complementarios.numero_documento=".$numero_documento." ";
    $qcont = mysqli_query($conexion,$cont);
        while ($re = mysqli_fetch_array($qcont)){
      $postincapacidad = $re{'Total'};     
    }
    $cont = "SELECT datos_basicos.motivo_evaluacion, COUNT(motivo_evaluacion) AS Total FROM datos_basicos
    JOIN datos_complementarios ON datos_basicos.fk_d_complementario = datos_complementarios.id
    JOIN historia_laboral ON  historia_laboral.paciente_enfermeria = datos_basicos.id_historia  
        WHERE datos_basicos.motivo_evaluacion = 'Reubicacion' AND datos_complementarios.numero_documento=".$numero_documento." ";
    $qcont = mysqli_query($conexion,$cont);
        while ($re = mysqli_fetch_array($qcont)){
     $reubicacion = $re{'Total'};      
    }
    $cont = "SELECT datos_basicos.motivo_evaluacion, COUNT(motivo_evaluacion) AS Total FROM datos_basicos 
    JOIN datos_complementarios ON datos_basicos.fk_d_complementario = datos_complementarios.id
    JOIN historia_laboral ON  historia_laboral.paciente_enfermeria = datos_basicos.id_historia 
        WHERE datos_basicos.motivo_evaluacion = 'Reingreso' AND datos_complementarios.numero_documento=".$numero_documento." ";
    $qcont = mysqli_query($conexion,$cont);
        while ($re = mysqli_fetch_array($qcont)){
      $reingreso = $re{'Total'};      
    }
    $cont = "SELECT datos_basicos.motivo_evaluacion, COUNT(motivo_evaluacion) AS Total FROM datos_basicos
    JOIN datos_complementarios ON datos_basicos.fk_d_complementario = datos_complementarios.id
    JOIN historia_laboral ON  historia_laboral.paciente_enfermeria = datos_basicos.id_historia 
        WHERE datos_basicos.motivo_evaluacion = 'Otros' AND datos_complementarios.numero_documento=".$numero_documento." ";
    $qcont = mysqli_query($conexion,$cont);
        while ($re = mysqli_fetch_array($qcont)){
      $otros = $re{'Total'};     
    }
    //obtener fecha del ultimo registro del historial
    $consultaregistro = "SELECT * FROM datos_basicos
    JOIN datos_complementarios ON datos_basicos.fk_d_complementario = datos_complementarios.id
    JOIN historia_laboral ON historia_laboral.paciente_enfermeria = datos_basicos.id_historia
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

?>
<body>
<div class="container">
<!---->
<input class="form-control" type="text" name="historia" value='<?php echo $historia; ?>' readonly="readonly" style  ="display: none;">

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
                <td><?php echo $datos['nombres_apellidos'];?></td>
                <td><?php echo $datos['tipo_documento'];?></td>
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
              <td><?php echo $datos['numero_nit'];?></td>
              <td><?php echo $datos['telefono_empresa']; ?></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
  <!---->
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
        <?php 
          $consult="SELECT * FROM datos_basicos AS db 
          JOIN historia_laboral AS hl ON db.id_historia = hl.paciente_enfermeria 
          JOIN exposicion_riesgos_enf AS ere ON hl.id = ere.id_paciente
          WHERE  db.id_historia = '$historia' ";
          $query = mysqli_query($conexion,$consult);
          if (mysqli_num_rows($query) > 0){ 

          while ($riesgos=mysqli_fetch_array($query)){
           ?>
            <tr>
              <td><textarea class="form-control" rows="2"><?php echo $riesgos['empresa1']; ?></textarea></td>
              <td class="text-center P"> <?php echo $riesgos['fisico1']; ?></td>
              <td class="text-center P"> <?php echo $riesgos['quimico1']; ?></td>
              <td class="text-center P"> <?php echo $riesgos['biologico1']; ?></td>
              <td class="text-center P"> <?php echo $riesgos['ergonomico1']; ?></td>
              <td class="text-center P"> <?php echo $riesgos['mecanico1']; ?></td>
              <td class="text-center P"> <?php echo $riesgos['psicosocial1']; ?></td>
              <td class="text-center P"> <?php echo $riesgos['electrico1']; ?></td>
              <td class="text-center"><textarea class="form-control" rows="2"><?php echo $riesgos['otros1']; ?></textarea></td>
              <td><textarea class="form-control" rows="2"><?php echo $riesgos['cargo1']; ?></textarea></td>
              <td><div class="P"><?php echo $riesgos['tiempo1']; ?></div></td>
              <td><textarea class="form-control" rows="2"><?php echo $riesgos['proteccion_personal1']; ?></textarea></td>
            </tr>
          <?php 
          }
            } 
          ?>
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
            <td><?php echo $datos['peso']; ?></td>
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

  <div class="text-center" style="font-size: 11px;">
    <a href="#" onClick="parent.print()">
      <span class="glyphicon glyphicon-print"> Print</span>
    </a><br>
  </div>

</div>
<?php 
}//fin array
//}//fin if

}else{
    //echo "<script>alert('Error, Numero de identificacion incorrecto o no registrado')</script>";
    //echo "<script>window.location = 'medico.php'</script>";
  echo '<script>
   $(document).ready(function(){
    $("#mostrarmodal").modal("show");
   });</script>';  
  } 

?>

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
<div class="modal fade" id="mostrarmodal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true" onClick="window.location.href='enfermeria_con.php';">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button onClick="window.location.href='enfermeria_con.php';" type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="text-danger"><span class="glyphicon glyphicon-warning-sign"></span> ERROR.</h4>
      </div>
      <div class="modal-body">
        <h5 class="text-primary text-justify"><label>El Paciente con Indentificacion Nº <i class="text-danger"><?php echo $historia; ?></i> y fecha de atencion <i class="text-danger"><?php echo $fecharegistro; ?></i> Incorrecto o no presenta Registro historico en esta area del sistema, Verifique que el numero de documento y la fecha de atencion ingresada coincidan con los registros historicos del paciente.</label></h4>      
      </div>
      <div class="modal-footer">
        <a onClick="window.location.href='enfermeria_con.php';" data-dismiss="modal" class="btn btn-danger">Cerrar</a>
      </div>
    </div>
  </div>
</div>
<?php } ?>


<!--ALerta historial del paciente-->
 <div class="modal fade" id="historial" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true" >
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="text-danger"><span class="glyphicon glyphicon-warning-sign"></span> Alerta.</h4>
      </div>
      <div class="modal-body">
        <h4 class="text-primary">Historial de Atencion de Paciente con Indentificacion Nº <label class="text-danger"><?php echo $numero_documento; ?></label></h4>
        <p><label>Motivo de Evaluaciones <strong style="color: red;">Ingreso: </strong></label> <?php echo $ingreso ?></p> 
        <p><label>Motivo de Evaluaciones <strong style="color: red;">Periodicas: </strong></label> <?php echo $periodico ?></p> 
        <p><label>Motivo de Evaluaciones <strong style="color: red;">Retiro: </strong></label> <?php echo $retiro ?></p>
        <p><label>Motivo de Evaluaciones <strong style="color: red;">Post Incapacidad: </strong></label> <?php echo $postincapacidad ?></p>
        <p><label>Motivo de Evaluaciones <strong style="color: red;">Reubicacion: </strong></label> <?php echo $reubicacion ?></p>
        <p><label>Motivo de Evaluaciones <strong style="color: red;">Reingreso: </strong></label> <?php echo $reingreso ?></p> 
        <p><label>Motivo de Evaluaciones <strong style="color: red;">Otros: </strong></label> <?php echo $otros ?></p>   
        <p><label>El Ultimo Registro de Evaluacion Clinica Se Realizo el dia: <strong style="color: red;"> <?php echo $ultimo ?> </strong></label> </p>
        <p><span class="glyphicon glyphicon-list-alt"></span><a target="_blank" href="psicologia_consult.php" style="color: red;"  class=""> Ir a Consultas</a></p> 
      </div>
      <div class="modal-footer">
        <a  data-dismiss="modal" class="btn btn-danger">Cerrar</a>
      </div>
    </div>
  </div>
</div>

  </body>
  </html>
