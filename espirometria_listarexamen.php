<?php 
  include ('includes/conexion.php');
  if (isset($_REQUEST['cod'])){
    $code = base64_decode($_REQUEST['cod']);
    switch ($code){
      case '255':
        include('bar/navbar_administracion.php'); 
      break;
      case '522':
        include('bar/navbar_recepcion.php');
      break;
      default:
        include ('bar/navbar_espirometria.php');
      break;
    }
  }else{
    include ('bar/navbar_espirometria.php');
  }
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Laboratorio Salud Ocupacional</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  </head>
<?php 
  //---------------------
  if ($_POST == true) {
    $tipocon = $_POST['tipoconsulta'];
    $historia = $_POST['documento'];
    $fecharegistro = $_POST['fecha_registro'];
  }else{
    $tipocon = base64_decode($_REQUEST['tipoconsulta']);
    //$historia1 = $_GET['historia'];
    $historia = base64_decode($_REQUEST['paciente']);
    $fecharegistro = base64_decode($_REQUEST['registro']);
  }

    $consult="SELECT * FROM datos_basicos AS db
    JOIN datos_complementarios AS dc ON db.fk_d_complementario = dc.id
    JOIN datos_basicos_tipo_documento AS dbtd ON dc.fk_tipo_documento = dbtd.idtd
    JOIN espirometria AS e ON e.espirometria_paciente = db.id_historia
    WHERE db.id_historia='$historia' OR dc.numero_documento = '$historia' AND db.fecha = '$fecharegistro'";
    $query = mysqli_query($conexion,$consult);

    if (mysqli_num_rows($query) > 0){

      while ($datos=mysqli_fetch_array($query)) {
      //datos personales
      $historia=$datos['id_historia'];

      $nombres_apellidos= $datos['nombres_apellidos'];
      $tipo_documento= $datos['tipo_documento'];
      $numero_documento= $datos['numero_documento'];
      $fecha_nacimiento= $datos['fecha_nacimiento'];
      $edad= $datos['edad'];
      $celular= $datos['celular'];
      $genero= $datos['genero'];
      $motivo_evaluacion= $datos['motivo_evaluacion'];
      $direccion = $datos['direccion'];
      $cargodesempenar= $datos['cargo_a_desempenar'];
      $actividad_economica= $datos['actividad_economica'];
      $nombre_empresa= $datos['nombre_empresa'];
      $ciudad= $datos['ciudad'];
      $direccion_empresa= $datos['direccion_empresa'];
      $numero_nit= $datos['numero_nit'];
      $telefono_empresa= $datos['telefono_empresa'];

      $lugar_nacimiento= $datos['lugar_nacimiento'];
      $estado_civil= $datos['estado_civil'];
      $ruta_destino =   "fotografias/"; //ruta de las fotos de los paciente
      //Examen Espirometria
      $examen_ruta = $datos['examen_ruta'];
      //--------
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

    <?php $ruta = 'archivos/archivo_p/'.$examen_ruta; ?>
    <div class="panel panel-default">
      <div class="panel-heading text-center"><label>Examen Espirometria</label></div>
      <div class="panel-body">
        <div class="container">
        <iframe src='<?php echo $ruta ?>' class='framepdf' id='frame'></iframe> 
        <div class="text-center">
          <a download href="<?php echo 'archivos/archivo_p/'.$examen_ruta; ?>"><i class="fas fa-download"></i> Download</a>
        </div><br>
        </div>
      </div>
    </div><br>
  </div>
</body>
<?php }//while
  
}else{

echo '<script>
 $(document).ready(function(){
  $("#mostrarmodal").modal("show");
 });</script>';  
} 

if ($code==255) {
?>
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
<div class="modal fade" id="mostrarmodal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true" onClick="window.location.href='espirometria_con.php';">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button onClick="window.location.href='espirometria_con.php';" type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="text-danger"><span class="glyphicon glyphicon-warning-sign"></span> ERROR.</h4>
      </div>
      <div class="modal-body">
        <h5 class="text-primary text-justify"><label>El Paciente con Indentificacion Nº <i class="text-danger"><?php echo $historia; ?></i> y fecha de atencion <i class="text-danger"><?php echo $fecharegistro; ?></i>  Incorrecto o no presenta Registro historico en esta area del sistema, Verifique que el numero de documento y la fecha de atencion ingresada coincidan con los registros historicos del paciente.</label></h4>      
      </div>
      <div class="modal-footer">
        <a onClick="window.location.href='espirometria_con.php';" data-dismiss="modal" class="btn btn-danger">Cerrar</a>
      </div>
    </div>
  </div>
</div>
<?php } ?>

  <script>
    $(document).ready(function(){
      //detectamos el click en el boton de imprimir
      $('#btnImprimir').click(function(){
        //Hacemos foco en el iframe
        $('#fram').get(0).contentWindow.focus(); 
        //$('#frame').get(0).contentWindow.focus(); 
        //Ejecutamos la impresion sobre ese control
        $("#fram").get(0).contentWindow.print(); 
        $("#frame").get(0).contentWindow.print();
      });
    });
  </script> 
</html>

