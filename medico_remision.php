<?php 
  include ('includes/conexion.php'); 
  include ('bar/navbar_medico.php'); 
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

  </style>

  </head>

  <?php 
    $historia = base64_decode($_REQUEST['paciente']);
    //$fecharegistro = $_GET['fecha_registro'];

    $data_remision = "SELECT * FROM datos_basicos AS db
    JOIN datos_complementarios AS dc ON db.fk_d_complementario = dc.id
    JOIN datos_basicos_tipo_documento AS dbtd ON dc.fk_tipo_documento = dbtd.idtd
    JOIN medico_examen_fisico AS mef ON mef.paciente_medico = db.id_historia
    JOIN medico_paraclinicos AS mp ON mef.id = mp.id_examen_fisico
    /*LEFT JOIN medico_remision as mr ON (mp.id = mr.id_paraclinico)*/
    JOIN medico_remision AS mr ON mp.id = mr.id_paraclinico
    /*JOIN medico_concepto_aptitud_laboral AS mcal ON mr.id = mcal.id_remision*/
    WHERE db.id_historia = '$historia'";
    $query = mysqli_query($conexion,$data_remision);

  if (mysqli_num_rows($query) > 0){ 

    while ($datos=mysqli_fetch_array($query)) {
         
            //$nombrempresa= $datos['nombre_empresa'];
            //$actividadeconomica=$datos['actividad_economica'];
 
            //$ciudad=$datos['ciudad'];

            //$direccion=$datos['direccion'];
            //$fechana=$datos['fecha_nacimiento'];
            //$lugarna = $datos['lugar_nacimiento'];
            //$edad = $datos['edad'];
          
            //$hijos = $datos['hijos'];
            //$estcivil = $datos['estado_civil'];
            //$celular = $datos['celular'];
            //$escolaridad = $datos['escolaridad'];
            //$eps = $datos['eps'];
            //$arl = $datos['arl'];
            //$afp = $datos['afp'];

            //REMISION DATA:
   			$result = $datos['motivo'];

            $idfk_remision = $datos['id_paraclinico'];

            $idfk_remi = $datos['id'];
   

   ?>

<body>

<br><br>
  <div class="container">       
    <table class="table table-bordered">
      <tbody>
        <tr>
          <td><label>Nombres y Apellidos:</label> <?php echo $datos['nombres_apellidos']; ?></td>
          <td><label>Cedula:</label> <?php echo $datos['numero_documento']; ?></td>
          <td><label>Fecha:</label> <?php echo $datos['fecha']; ?></td>
        </tr>
        <tr>
          <td><label>Cargo a desempeñar:</label> <?php echo $datos['cargo_a_desempenar']; ?></td>
          <td><label>Sexo:</label> <?php echo $datos['genero']; ?></td>
          <td><label>Motivo Evaluacion:</label> <?php echo $datos['motivo_evaluacion']; ?></td>
        </tr>
      </tbody>
    </table>
    <!---->
    <table class="table table-bordered">
      <thead>
        <tr>
          <th class="text-center">Desde</th>
          <th class="text-center">Hacia</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td style="width: 580px;"><?php echo $datos['desde']; ?></td>
          <td><?php echo $datos['hacia']; ?></td>
        </tr>
       </tbody>
       <thead>
       	<tr>
       		<th colspan="2" class="text-center">Motivo</th>
       	</tr>
       </thead>
       <tbody>
       	<tr>
          <td colspan="2"><textarea  class="form-control" type="text" name="motivo" rows="3"><?php echo $datos['motivo']; ?></textarea></td>
        </tr>
        </tbody>
        <tr>
        	<td colspan="3" class="text-center">
       			<a href="parte.php?id='<?php echo $datos['id']; ?>'">Contraremision <?php echo $datos['id']; ?></a>
       		</td>
        </tr>
      </tbody>
    </table>
    </div>
<?php     
}
  }  
?>
    <?php 
      if (isset($_POST['Registrar'])) {

        $remision_pendiente = $_POST['remision_pendiente'];
        $resultado_remision = $_POST['resultado_remision'];
        $recomendaciones_remision = $_POST['recomendaciones_remision'];
        $fecha_contraremision = $_POST['fecha_contraremision'];

        $reg_remision = "UPDATE `medico_remision` SET `remision_pendiente`='$remision_pendiente', `resultado_remision`='$resultado_remision', `recomendaciones_remision`='$recomendaciones_remision', `fecha_contraremision`='$fecha_contraremision'
        WHERE id_paraclinico='$idfk_remision'  ";
        $query2 = mysqli_query($conexion,$reg_remision);

        $trabajo_nivel = $_POST['trabajo_nivel'];
        $trabajo_altura = $_POST['trabajo_altura'];
        $trabajo_restricciones_no_interviene = $_POST['trabajo_restricciones_no_interviene'];
        $aplazado= $_POST['aplazado'];
        $nueva_valoracion = $_POST['nueva_valoracion'];
        $trabajo_limitaciones_si_interviene = $_POST['trabajo_limitaciones_si_interviene'];
        $apto = $_POST['apto'];
        $egreso_diagnostico = $_POST['egreso_diagnostico'];
        $periodico_diagnostico = $_POST['periodico_diagnostico'];
        $observaciones_aptitud_laboral = $_POST['observaciones_aptitud_laboral'];

        $update_act_laboral = "UPDATE `medico_concepto_aptitud_laboral` SET `apto_trabajo_nivel`='$trabajo_nivel', `apto_trabajo_altura`='$trabajo_altura', `apto_con_restricciones_no_intervienen`='$trabajo_restricciones_no_interviene', `aplazado`='$aplazado', `nueva_valoracion`='$nueva_valoracion', `apto_con_limitaciones_si_intervienen`='$trabajo_limitaciones_si_interviene', `apto`='$apto', `examen_egreso_diagnostico`='$egreso_diagnostico', `examen_periodico_diagnostico`='$periodico_diagnostico', `observaciones_aptitud_laboral`='$observaciones_aptitud_laboral'
        WHERE id_remision='$idfk_remi'  ";
        $query3 = mysqli_query($conexion,$update_act_laboral);

        if ($query2 && $query3) {
          echo "<script>alert('Datos Registrados Exitosamente')</script>";
          echo "<script>window.location = 'medico_consult.php'</script>";
        }else{
          echo "<script>alert('Error query, Intente Nuevamente')</script>";
          echo "<script>window.location = 'medico_consult.php'</script>"; 
        }

      }
    ?>

 
  <div class="text-center"><a href="#" type="" data-toggle="collapse" data-target="#demo">Contraremision</a></div>
  <div id="demo" class="collapse">
    <form method="POST" action="">
    <div>
        <br>
        <div class="form-inline">
          <label>Fecha Contra-Remision:</label>
          <input class="form-control" type="date" name="fecha_contraremision" required><br><br>
        </div>    
        <br>
   
        <label>Resultado:</label>
        <textarea class="form-control" type="text" name="resultado_remision" rows="4"></textarea>
        <br> 
        <label>Recomendaciones:</label>
        <textarea class="form-control" type="text" name="recomendaciones_remision" rows="4"></textarea>
        <br>
        <div class="text-center"><label class="text-danger">Resultado de Remision Pendiente</label> Si <input type="radio" name="remision_pendiente" value="Si" disabled=""> / NO <input type="radio" name="remision_pendiente" value="No" checked></div>
        <br>

         <div class="panel panel-default">
          <div class="panel-heading"><div class="text-center text-info"><label>Concepto Aptitud Laboral: </label></div> </div>
          <div class="panel-body">
          <br>          
          <table class="table table-bordered">
            <tbody>
              <tr>
                <td><label style="font-size: 13px;">Apto Trabajo A Nivel: </label> SI <input type="radio" name="trabajo_nivel" value="Si"> / NO <input type="radio" name="trabajo_nivel" value="No"></td>
                <td><label style="font-size: 13px;">Apto Trabajo En Altura: </label> SI <input type="radio" name="trabajo_altura" value="Si"> / NO <input type="radio" name="trabajo_altura" value="No"></td>
                <td><label style="font-size: 13px;">Apto Para El Cargo Con Restricciones Que No Intervienen En Su Trabajo: </label> SI <input type="radio" name="trabajo_restricciones_no_interviene" value="Si"> / NO <input type="radio" name="trabajo_restricciones_no_interviene" value="No"</td>
                             
              </tr>
              <tr>
                <td><label style="font-size: 13px;">Aplazado: </label> SI <input type="radio" name="aplazado" value="Si"> / NO <input type="radio" name="aplazado" value="No"></td>
                <td><label style="font-size: 13px;">Nueva Valoracion: </label> SI <input type="radio" name="nueva_valoracion" value="Si"> / NO <input type="radio" name="nueva_valoracion" value="No"></td>
                <td><label style="font-size: 13px;">Apto Para El Cargo Con Limitaciones Que Intervienen Con Su Trabajo: </label> </label> SI <input type="radio" name="trabajo_limitaciones_si_interviene" value="Si"> / NO <input type="radio" name="trabajo_limitaciones_si_interviene" value="No">
                </td>
              </tr>
              <tr>
              <td><label>Apto:</label> SI <input type="radio" name="apto" value="Si"> / NO <input type="radio" name="apto" value="No"></td>
                <td><div class="text-center"><label style="font-size: 13px;">Examen De Egreso: </label> Normal <input type="radio" name="egreso_diagnostico" value="Normal"> / Anormal <input type="radio" name="egreso_diagnostico" value="Anormal"></td>
                <td><label style="font-size: 13px;">Examen Periodico: </label> Normal <input type="radio" name="periodico_diagnostico" value="Normal"> / Anormal <input type="radio" name="periodico_diagnostico" value="Anormal"></div></td>
              </tr>
            </tbody>
          </table>

            <div>
              <th class="text-center">Observaciones:</th>
              <td><textarea class="form-control col-sm-12" type="text" name="observaciones_aptitud_laboral" rows="2"></textarea></td>
            </div>
            <br><br>  
        </div>
          </div>

      </div>
      <div class="text-center">
        <input type="submit" class="btn btn-info" name="Registrar" value="Registrar">
      </div>    
    </form>

    
  </div>



    

  </div><!--container-->                 
</form>
<br><br>
 

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
