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
  include('bar/css/estilo.css');
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
    WHERE  db.id_historia = '$historia' OR dc.numero_documento = '$historia' AND db.fecha = '$fecharegistro' ";
    $query = mysqli_query($conexion,$consult);
        if (mysqli_num_rows($query) > 0){ 

    while ($datos=mysqli_fetch_array($query)) {
      //datos personales
      $historia=$datos['id_historia'];
      $numero_documento=$datos['numero_documento'];
    //--------

?>
<body>
<div class="container">
<!---->
<input class="form-control" type="text" name="historia" value='<?php echo $historia; ?>' readonly="readonly" style  ="display: none;">

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
  <!---->
  <div class="panel panel-default">
    <div class="panel-heading text-center"><h6>Historia Laboral: (<?php echo $datos['historialaboral']; ?>)</h6></div>
    <div class="panel-body">
      <div class="container-fluid">     
        <table class="table table-bordered">
          <thead>
            <th class="text-center">Cargo:</th>
            <th class="text-center">Turno:</th>
            <th class="text-center">Años en la empresa:</th>
            <th class="text-center">Dependencia:</th>
          </thead>
          <tbody class="text-center">
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
              <td><textarea class="form-control size_font" rows="2"><?php echo $datos['acciones']; ?></textarea></td>
              <td colspan="3">
                <textarea class="form-control size_font" rows="2"><?php echo $datos['actividades']; ?></textarea>
              </td>
            </tr>
            <thead>
              <th colspan="4" class="text-center">Descripcion de cargo:</th>
            </thead>
            <tr>
              <td colspan="4">
                <textarea class="form-control size_font" rows="2"><?php echo $datos['descripcioncargo']; ?></textarea>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div><br>

  <div class="panel panel-default">
    <div class="panel-heading text-center"><h6>Exposicion a factores de riesgo: (<?php echo $datos['factoresriesgos']; ?>)</h6></div>
    <div class="panel-body">
      <div class="container-fluid">
          <table class="table table-bordered">
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
              JOIN enfermeria_riesgos AS ere ON hl.id = ere.id_paciente
              WHERE  db.id_historia = '$historia' ";
              $query = mysqli_query($conexion,$consult);
              if (mysqli_num_rows($query) > 0){ 

              while ($riesgos=mysqli_fetch_array($query)){
            ?>
              <tr>
                <td><textarea class="form-control size_font" rows="2"><?php echo $riesgos['empresariesgo']; ?></textarea></td>
                <td><textarea class="form-control size_font" rows="2"><?php echo $riesgos['riesgos']; ?></textarea></td>
                <td><textarea class="form-control size_font" rows="2"><?php echo $riesgos['cargoriesgo']; ?></textarea></td>
                <td><?php echo $riesgos['tiemporiesgo']; ?></td>
                <td>
                  <textarea class="form-control size_font" rows="2"><?php echo $riesgos['proteccionriesgo']; ?></textarea>
                </td>
              </tr>
            <?php 
              }
                } 
            ?>
            </tbody>
          </table>
          <div class="text-center"><label>F:</label> Fisico | <label>Q:</label> Quimico | <label>B:</label> Biologico | <label>ERG:</label> Ergonomico | <label>MEC:</label> Mecanico | <label>PSC:</label> Psicosocial | <label>ELEC:</label> Electrico</div>
        </div>
      </div>
    </div><br>

    <div class="panel panel-default">
      <div class="panel-heading text-center"><h6>Antecedentes Personales-Familiares:</h6></div>
      <div class="panel-body">
        <div class="container-fluid">
          <table class="table table-bordered table_sizefont">
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
          <label class="text-dark">Observaciones:</label>
          <textarea class="form-control" rows="2"><?php echo $datos['ant_observaciones']; ?></textarea><br>

          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <div class="input-group-text size_font">
                Familiar: <div class="separator"></div>(<?php echo $datos['familiar_ant']; ?>) 
              </div>
            </div>
            <textarea class="form-control"><?php echo $datos['desc_ant_familiar']; ?></textarea>
          </div>
          
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <div class="input-group-text size_font">
                Personal: <div class="separator"></div>(<?php echo $datos['personal_ant']; ?>) 
              </div>
            </div>
            <textarea class="form-control"><?php echo $datos['desc_ant_per']; ?></textarea>
          </div>
        </div>
      </div>
    </div><br>

    <div class="panel-group">
      <div class="panel panel-default">
        <div class="panel-heading">
          <div class="panel-title">
            <a data-toggle="collapse" href="#collapse1"><h6 class="text-center">Antecedentes Ginecologicos:</h6></a>
          </div>
        </div>
        <div id="collapse1" class="panel-collapse collapse">
          <div class="panel-body">
            <div class="container-fluid">
              <table class="table table-bordered">
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
                <textarea class="form-control"><?php echo $datos['metodo']; ?></textarea>
              </div>
              
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <div class="input-group-text size_font">
                    Obstetrica: <div class="separator"></div>
                  </div>
                </div>
                <textarea class="form-control"><?php echo $datos['fichaobstetrica']; ?></textarea>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div><br>

    <div class="panel panel-default">
      <div class="panel-heading">
        <div class="text-center"><h6>Uso de Elementos de Proteccion Personal: (<?php echo $datos['uso_epp']; ?>)</h6></div>
      </div>
      <div class="panel-body">
        <div class="container-fluid"> 
          <table class="table table-bordered">
            <thead class="table_sizefot">
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
            <textarea class="form-control"><?php echo $datos['otroepp']; ?></textarea>
          </div>

          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <div class="input-group-text size_font">
                Adecuados solo:
              </div>
            </div>
            <textarea class="form-control"><?php echo $datos['adecuadosolo']; ?></textarea>
          </div>
        </div>
      </div>
    </div><br>

    <div class="panel panel-default">
      <div class="panel-heading">
        <div class="text-center"><h6>Accidentes de Trabajo: (<?php echo $datos['accidentelaboral']; ?>)</h6></div>
      </div>
      <div class="panel-body">
        <div class="container-fluid">   
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
                <td><div class="P"><?php echo $datos['accfecha']; ?></div></td>
                <td><textarea class="form-control table_sizefont" rows="2"><?php echo $datos['accempresa']; ?></textarea></td>
                <td><textarea class="form-control table_sizefont" rows="2"><?php echo $datos['causa']; ?></textarea></td>
                <td><div class="P"><?php echo $datos['lesion']; ?></div></td>
                <td><textarea class="form-control table_sizefont" rows="2"><?php echo $datos['afectacion']; ?></textarea></td>
                <td><div class="P"><?php echo $datos['incapacidad']; ?></div></td>
                <td><div class="P"><?php echo $datos['secuela']; ?></div></td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div><br>

    <div class="panel panel-default">
      <div class="panel-heading text-center">
        <h6>Enfermedad Profesional: (<?php echo $datos['enfermedadlaboral']; ?>)</h6>
      </div>
      <div class="panel-body"> 
        <div class="container-fluid"> 
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
                <td><h6><?php echo $datos['fechaenf']; ?></h6></td>
                <td><textarea class="form-control table_sizefont" rows="2"><?php echo $datos['empresaenf']; ?></textarea></td>
                <td><textarea class="form-control table_sizefont" rows="2"><?php echo $datos['diagnosticoenf']; ?></textarea></td>
                <td><div class="P"><?php echo $datos['arlenf']; ?></div></td>
                <td><div class="P"><?php echo $datos['reubicacion']; ?></div></td>
                <td><div class="P"><?php echo $datos['pension']; ?></div></td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div><br>

    <div class="panel panel-default">
      <div class="panel-heading text-center"><h6>Habitos Saludables: </h6>
      </div>
      <div class="panel-body">
        <div class="container-fluid">
          <table class="table table-bordered">
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
          </table><br>

          <div class="input-group">
            <div class="input-group-prepend">
              <div class="input-group-text size_font">Deportes:<div class="separator"></div>(<?php echo $datos['practicadeporte']; ?>)
              </div>
            </div>
            <textarea class="form-control size_font" rows="2"><?php echo $datos['cualdeporte']; ?></textarea>
          </div><br>

          <div class="input-group">
            <div class="input-group-prepend">
              <div class="input-group-text size_font">Habitos saludables:</div>
            </div>
              <textarea class="form-control size_font" rows="2"><?php echo $datos['otroejercicio']; ?></textarea>
          </div>

          </div>
      </div>
    </div><br>

  <div class="panel panel-default">
    <div class="panel-heading text-center"><h6>Habitos Toxicos: </h6>
    </div>
    <div class="panel-body">
      <div class="container-fluid">
        <table class="table table-bordered">
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
          <textarea class="form-control table_sizefont" rows="1"><?php echo $datos['cualbebidaproblema']; ?></textarea>
        </div>

        <div class="input-group mb-3">
          <div class="input-group-prepend">
            <span class="input-group-text table_sizefont" id="inputGroup-sizing-default">Tipo licor:
              <div class="separator"></div></span>
          </div>
          <textarea class="form-control table_sizefont" rows="1"><?php echo $datos['tipolicor']; ?></textarea>
        </div>

        <div class="input-group mb-3">
          <div class="input-group-prepend">
            <span class="input-group-text table_sizefont" id="inputGroup-sizing-default">Habitos toxicos:
              <div class="separator"></div>(<?php echo $datos['otrohabitotoxico']; ?>)</span>
          </div>
          <textarea class="form-control table_sizefont" rows="1"><?php echo $datos['cualhabitotoxico']; ?></textarea>
        </div>

        <div class="input-group mb-3">
          <div class="input-group-prepend">
            <span class="input-group-text table_sizefont" id="inputGroup-sizing-default">Medicamento regular:
              <div class="separator"></div>(<?php echo $datos['medicamentoregular']; ?>)</span>
          </div>
          <textarea class="form-control table_sizefont" rows="1"><?php echo $datos['cualmedicamento']; ?></textarea>
        </div>
        
        <label for="" class="text-dark">Pendiente cirugias en EPS: (<?php echo $datos['cirugiaeps']; ?>)</label>
        <div class="input-group mb-3">
          <div class="input-group-prepend">
            <span class="input-group-text table_sizefont" id="inputGroup-sizing-default">Cuales:
              <div class="separator"></div></span>
          </div>
          <textarea class="form-control table_sizefont" rows="1"><?php echo $datos['cualcirugia']; ?></textarea>
        </div>

        <label for="" class="text-dark">Pendiente tratamientos: (<?php echo $datos['tratamientopendiente']; ?>)</label>
        <div class="input-group mb-3">
          <div class="input-group-prepend">
            <span class="input-group-text table_sizefont" id="inputGroup-sizing-default">Cuales:
              <div class="separator"></div></span>
          </div>
          <textarea class="form-control table_sizefont" rows="1"><?php echo $datos['cualtratamiento']; ?></textarea>
        </div>

        <label for="" class="text-dark">Incapacidad ultimos 6 meses: (<?php echo $datos['ultimaincapacidad']; ?>)</label>
        <div class="input-group mb-3">
          <div class="input-group-prepend">
            <span class="input-group-text table_sizefont" id="inputGroup-sizing-default">Motivo:
              <div class="separator"></div></span>
          </div>
          <textarea class="form-control table_sizefont" rows="1"><?php echo $datos['motivoincapacidad']; ?></textarea>
        </div>
      </div>
    </div>
  </div><br>

  <div class="panel panel-default">
    <div class="panel-heading text-center"><h6>Signos Vitales: </h6></div>
    <div class="panel-body">
      <div class="container-fluid">
        <table class="table table-bordered">
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
      </div>
    </div>
  </div><br>

  <div class="panel panel-default">
    <div class="panel-heading text-center">
      <h6>Exposicion a factores de riesgo suministrados por la Empresa: (<?php echo $datos['riesgosuministrado']; ?>)</h6>
    </div>
    <div class="panel-body">
      <div class="container-fluid">
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
        
        <div class="input-group mb-3">
          <div class="input-group-prepend">
            <span class="input-group-text table_sizefont" id="inputGroup-sizing-default">Otros:
              <div class="separator"></div></span>
          </div>
          <textarea class="form-control table_sizefont" rows="1"><?php echo $datos['otrosriesgo']; ?></textarea>
        </div>

      </div><br>
    </div>
  </div>

  <div class="text-center" style="font-size: 11px;">
    <a href="#" onClick="parent.print()">
      <span class="glyphicon glyphicon-print"> Print</span>
    </a><br>
  </div>

</div><br>  
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


  </body>
  </html>
