<?php 
  include ('includes/conexion.php'); 

  $code = base64_decode($_REQUEST['cod']);
  if ($code="255") {
    include ('bar/navbar_administracion.php'); 
  }else{
   include ('bar/navbar_visiometria.php'); 
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

  </style>

  </head>

  <?php 
    $tipocon = base64_decode($_REQUEST['tipoconsulta']);
    //$historia1 = $_GET['historia'];
    $historia = base64_decode($_REQUEST['paciente']);


    $data_remision = "SELECT * FROM datos_basicos AS db
    JOIN visiometria_campo_visual AS vcv ON db.id_historia = vcv.paciente_visiometria
    JOIN visiometria_vision_lejana AS vvl ON vcv.id = vvl.id_campo_visual
    JOIN visiometria_vision_proxima AS vvp ON vvl.id = vvp.id_vision_lejana
    JOIN visiometria_percepciones_y_forias AS vpf ON vvp.id = vpf.id_vision_proxima
    JOIN visiometria_remisiones AS vr ON vpf.id = vr.id_percepciones_forias

    WHERE datos_basicos.id_historia = ".$historia."";
    $query = mysqli_query($conexion,$data_remision);

  if (mysqli_num_rows($query) > 0){ 

    while ($datos=mysqli_fetch_array($query)) {
            $motivoevaluacion= $datos['motivo_evaluacion'];
            //$nombrempresa= $datos['nombre_empresa'];
            //$actividadeconomica=$datos['actividad_economica'];
            $cargodesempena=$datos['cargo_a_desempenar'];
            //$ciudad=$datos['ciudad'];
            $fecha=$datos['fecha'];

            $nombrec=$datos['nombres_apellidos'];
            $cedula_u=$datos['numero_documento'];
            //$direccion=$datos['direccion'];
            //$fechana=$datos['fecha_nacimiento'];
            //$lugarna = $datos['lugar_nacimiento'];
            $edad = $datos['edad'];
            $genero = $datos['genero'];
            //$hijos = $datos['hijos'];
            //$estcivil = $datos['estado_civil'];
            //$celular = $datos['celular'];
            //$escolaridad = $datos['escolaridad'];
            //$eps = $datos['eps'];
            //$arl = $datos['arl'];
            //$afp = $datos['afp'];

            //REMISION OPTOMETRIA:
            $desde_optometria = $datos['desde_optometria'];
            $hacia_optometria = $datos['hacia_optometria'];
            $motivo_optometria = $datos['motivo_optometria'];

            $idfk_remision = $datos['id_percepciones_forias'];

            $idfk_percepciones = $datos['id_vision_proxima'];

            $resultado_visiometria = $datos['resultado_visiometria'];
            $alteracion_visuale = $datos['alteracion_visual'];

            //REMISION OFTALMOLOGIA:
            $desde_oftalmologia = $datos['desde_oftalmologia'];
            $hacia_oftalmologia = $datos['hacia_oftalmologia'];
            $motivo_oftalmologia = $datos['motivo_oftalmologia'];

            $idfk_remision = $datos['id_percepciones_forias'];

            $idfk_percepciones = $datos['id_vision_proxima'];

            $resultado_visiometria = $datos['resultado_visiometria'];
            $alteracion_visuale = $datos['alteracion_visual'];
    }
  }    

   ?>

<body>
<?php if ($tipocon==1){ ?>
  

<h1 style="color: red;">welcome user medico</h1>

  <div class="container">       
    <table class="table table-bordered">
      <tbody>
        <tr>
          <td><label>Nombres y Apellidos:</label> <?php echo $nombrec ?></td>
          <td><label>Cedula:</label> <?php echo $cedula_u ?></td>
          <td><label>Fecha:</label> <?php echo $fecha ?></td>
        </tr>
        <tr>
          <td><label>Cargo a desempeñar:</label> <?php echo $cargodesempena ?></td>
          <td><label>Sexo:</label> <?php echo $genero ?></td>
          <td><label>Motivo Evaluacion:</label> <?php echo $motivoevaluacion ?></td>
        </tr>
      </tbody>
    </table>
    <!---->
    <table class="table table-bordered">
      <thead>
        <tr>
          <th>Desde</th>
          <th>Hacia</th>
          <th>Motivo</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td><?php echo $desde_optometria ?></td>
          <td><?php echo $hacia_optometria ?></td>
          <td class="text-center"><textarea style="width: 700px;" class="form-control" type="text" name="motivo" rows="3"><?php echo $motivo_optometria ?></textarea></td>
        </tr>
      </tbody>
    </table>

    <?php 
      if (isset($_POST['Registrar'])) {

        $remision_pendiente_optometria = $_POST['remision_pendiente_optometria'];
        $resultado_remision_optometria = $_POST['resultado_remision_optometria'];
        $recomendaciones_remision_optometria = $_POST['recomendaciones_remision_optometria'];
        $fecha_contraremision_optometria = $_POST['fecha_contraremision_optometria'];

        $reg_remision = "UPDATE `visiometria_remisiones` SET `resultado_remision_optometria_pendiente`='$remision_pendiente_optometria', `resultado_contra_optometria`='$resultado_remision_optometria', `recomendaciones_contra_optometria`='$recomendaciones_remision_optometria', `fecha_contra_optometria`='$fecha_contraremision_optometria'
        WHERE id_percepciones_forias='$idfk_remision'";
        $query2 = mysqli_query($conexion,$reg_remision);

        $resultado_optometria = $_POST['resultado_optometria'];
        $alteracion_visual = $_POST['alteracion_visual'];

        $update_resultado = "UPDATE `visiometria_percepciones_y_forias` SET `resultado_visiometria`='$resultado_optometria', `alteracion_visual`='$alteracion_visual'
        WHERE id_vision_proxima='$idfk_percepciones'  ";
        $query3 = mysqli_query($conexion,$update_resultado);

        if ($query2 && $query3) {
          echo "<script>alert('Datos Registrados Exitosamente')</script>";
          echo "<script>window.location = 'visiometria_consult.php'</script>";
        }else{
          echo "<script>alert('Error query, Intente Nuevamente')</script>";
          echo "<script>window.location = 'visiometria_consult.php'</script>"; 
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
          <input class="form-control" type="date" name="fecha_contraremision_optometria" required><br><br>
        </div>    
        <br>
   
        <label>Resultado:</label>
        <textarea class="form-control" type="text" name="resultado_remision_optometria" rows="4"></textarea>
        <br> 
        <label>Recomendaciones:</label>
        <textarea class="form-control" type="text" name="recomendaciones_remision_optometria" rows="4"></textarea>
        <br>
        <div class="text-center"><label class="text-danger">Resultado de Remision Pendiente</label> Si <input type="radio" name="remision_pendiente_optometria" value="Si" disabled=""> / NO <input type="radio" name="remision_pendiente_optometria" value="No" checked></div>

         <div class="panel panel-default">
          <div class="panel-heading"><div class="text-center text-info"><label>Resultado: </label></div> </div>
          <div class="panel-body">
          <br>        
          <div>
              <th class="text-center">Resultado:</th>
              <td><textarea class="form-control col-sm-12" type="text" name="resultado_optometria" rows="4"><?php echo $resultado_visiometria ?></textarea></td>
            </div>
            <br>
          <table class="table table-bordered">
            <tbody>
              <tr>
                <td><label>Presenta alteración visual:</label> 
                  <?php
                  if ($alteracion_visuale == "Si") {?>
                    <input type="radio" name="alteracion_visual" value="Si" checked> Si /
                    <input  type="radio" name="alteracion_visual" value="No" > No
                  <?php } else { ?>
                    <input  type="radio" name="alteracion_visual" value="Si"> Si /
                    <input  type="radio" name="alteracion_visual" value="No" checked> No
                  <?php } ?>
                </td>
              </tr>
            </tbody>
          </table> 
        </div>
          </div>

      </div>
      <div class="text-center">
        <input type="submit" class="btn btn-info" name="Registrar" value="Registrar">
      </div>    
    </form>

  </div>
  </div><!--container--> 
  <?php }else{ ?>
<h1 style="color: red;">welcome user Visiometria (Remision oftalmologia)</h1>

  <div class="container">       
    <table class="table table-bordered">
      <tbody>
        <tr>
          <td><label>Nombres y Apellidos:</label> <?php echo $nombrec ?></td>
          <td><label>Cedula:</label> <?php echo $cedula_u ?></td>
          <td><label>Fecha:</label> <?php echo $fecha ?></td>
        </tr>
        <tr>
          <td><label>Cargo a desempeñar:</label> <?php echo $cargodesempena ?></td>
          <td><label>Sexo:</label> <?php echo $genero ?></td>
          <td><label>Motivo Evaluacion:</label> <?php echo $motivoevaluacion ?></td>
        </tr>
      </tbody>
    </table>
    <!---->
    <table class="table table-bordered">
      <thead>
        <tr>
          <th>Desde</th>
          <th>Hacia</th>
          <th>Motivo</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td><?php echo $desde_oftalmologia ?></td>
          <td><?php echo $hacia_oftalmologia ?></td>
          <td class="text-center"><textarea style="width: 700px;" class="form-control" type="text" name="motivo" rows="3"><?php echo $motivo_oftalmologia ?></textarea></td>
        </tr>
      </tbody>
    </table>

    <?php 
      if (isset($_POST['Registrar'])) {

        $remision_pendiente_oftalmologia = $_POST['remision_pendiente_oftalmologia'];
        $resultado_remision_oftalmologia = $_POST['resultado_remision_oftalmologia'];
        $recomendaciones_remision_oftalmologia = $_POST['recomendaciones_remision_oftalmologia'];
        $fecha_contraremision_oftalmologia = $_POST['fecha_contraremision_oftalmologia'];

        $reg_remision = "UPDATE `visiometria_remisiones` SET `resultado_remision_oftalmologia_pendiente`='$remision_pendiente_oftalmologia', `resultado_contra_oftalmologia`='$resultado_remision_oftalmologia', `recomendaciones_contra_oftalmologia`='$recomendaciones_remision_oftalmologia', `fecha_contra_oftalmologia`='$fecha_contraremision_oftalmologia'
        WHERE id_percepciones_forias='$idfk_remision'";
        $query2 = mysqli_query($conexion,$reg_remision);

        $resultado_optometria = $_POST['resultado_optometria'];
        $alteracion_visual = $_POST['alteracion_visual'];

        $update_resultado = "UPDATE `visiometria_percepciones_y_forias` SET `resultado_visiometria`='$resultado_optometria', `alteracion_visual`='$alteracion_visual'
        WHERE id_vision_proxima='$idfk_percepciones'  ";
        $query3 = mysqli_query($conexion,$update_resultado);

        if ($query2 && $query3) {
          echo "<script>alert('Datos Registrados Exitosamente')</script>";
          echo "<script>window.location = 'visiometria_consult.php'</script>";
        }else{
          echo "<script>alert('Error query, Intente Nuevamente')</script>";
          echo "<script>window.location = 'visiometria_consult.php'</script>"; 
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
          <input class="form-control" type="date" name="fecha_contraremision_oftalmologia" required><br><br>
        </div>    
        <br>
   
        <label>Resultado:</label>
        <textarea class="form-control" type="text" name="resultado_remision_oftalmologia" rows="4"></textarea>
        <br> 
        <label>Recomendaciones:</label>
        <textarea class="form-control" type="text" name="recomendaciones_remision_oftalmologia" rows="4"></textarea>
        <br>
        <div class="text-center"><label class="text-danger">Resultado de Remision Pendiente</label> Si <input type="radio" name="remision_pendiente_oftalmologia" value="Si" disabled=""> / NO <input type="radio" name="remision_pendiente_oftalmologia" value="No" checked></div>

         <div class="panel panel-default">
          <div class="panel-heading"><div class="text-center text-info"><label>Resultado: </label></div> </div>
          <div class="panel-body">
          <br>        
          <div>
              <th class="text-center">Resultado:</th>
              <td><textarea class="form-control col-sm-12" type="text" name="resultado_optometria" rows="4"><?php echo $resultado_visiometria ?></textarea></td>
            </div>
            <br>
          <table class="table table-bordered">
            <tbody>
              <tr>
                <td><label>Presenta alteración visual:</label> 

                  <?php
                  if ($alteracion_visuale == "Si") {?>
                    <input type="radio" name="alteracion_visual" value="Si" checked> Si /
                    <input  type="radio" name="alteracion_visual" value="No" > No
                  <?php } else { ?>
                    <input  type="radio" name="alteracion_visual" value="Si"> Si /
                    <input  type="radio" name="alteracion_visual" value="No" checked> No
                  <?php } ?>

                </td>
              </tr>
            </tbody>
          </table> 
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
  <?php } ?>                

 

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
