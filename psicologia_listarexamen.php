<!DOCTYPE html>
<html>
  <head>
    <title>LSST - RESULTADOS</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  </head>

<?php 
  include('includes/conexion.php'); 
  //include('bar/css/estilo.css');
  if(isset($_REQUEST['cod'])){
    $code = base64_decode($_REQUEST['cod']);
    switch($code){
      case '255':
        include('bar/navbar_administracion.php'); 
      break;
      case '522':
        include('bar/navbar_recepcion.php');
      break;
      default:
        include('bar/navbar_psicologia.php'); 
      break;
    }
  }else{
    include('bar/navbar_psicologia.php'); 
  }

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
  JOIN psicologia_estadomental AS pem ON pem.paciente_psicologia = db.id_historia
  WHERE db.id_historia='$historia' OR dc.numero_documento = '$historia' AND db.fecha='$fecharegistro'";
  $query = mysqli_query($conexion,$consult);

  if (mysqli_num_rows($query) > 0){

    while ($datos=mysqli_fetch_array($query)) {
      $historia=$datos['id_historia'];
      $ruta_destino =   "fotografias/"; //ruta de las fotos de los paciente

?>
<body>
<div class="container">
<form method="POST" action="">

<input type="text" name="numero_documento" value="<?php echo $numero_documento ?>" style="display: none;">
<input type="text" name="fecha" value="<?php echo $fecha ?>" style="display: none;">

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

<div class="panel panel-default">
  <div class="panel-heading text-center"><h6>Examen Psicologico</h6></div>
  <div class="panel-body">
    <div class="container-fluid">
      <div class="row">
        <table class="table table-bordered size_font">
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
              <td><textarea class="form-control size_font" type="text"><?php echo $datos['orientacionhallazgo']; ?></textarea></td>
            </tr>
            <tr>
              <td><strong>Atencion concentracion:</strong></td>
              <td><?php echo $datos['atencionconcentracion']; ?></td>
              <td><textarea class="form-control size_font" type="text"><?php echo $datos['concentracionhallazgo']; ?></textarea></td>
            </tr>
            <tr>
              <td><strong>Sensopercepcion:</strong></td>
              <td><?php echo $datos['sensopercepcion']; ?></td>
              <td><textarea class="form-control size_font" type="text"><?php echo $datos['sensopercepcionhallazgo']; ?></textarea></td>
            </tr>
            <tr>
              <td><strong>Memoria:</strong></td>
              <td><?php echo $datos['memoria']; ?></td>
              <td><textarea class="form-control size_font"><?php echo $datos['memoriahallazgo'];?></textarea></td>
            </tr>
            <tr>
              <td><strong>Pensamiento:</strong></td>
              <td><?php echo $datos['pensamiento']; ?></td>
              <td><textarea class="form-control size_font"><?php echo $datos['pensamientohallazgo']; ?></textarea></td>
            </tr>
            <tr>
              <td><strong>Lenguaje:</strong></td>
              <td><?php echo $datos['lenguaje']; ?></td>
              <td><textarea class="form-control size_font"><?php echo $datos['lenguajehallazgo']; ?></textarea></td>
            </tr>
            <tr>
              <td><strong>Concepto:</strong></td>
              <td><?php echo $datos['concepto']; ?></td>
              <td><textarea class="form-control size_font"><?php echo $datos['conceptohallazgo']; ?></textarea></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
  
<div class="text-center table_sizefont">
  <a href="#" onClick="parent.print()"><span class="glyphicon glyphicon-print"> Print</span></a>
</div><br>

</form>
</div>

<?php } 

 }else{ ?>
  <script>$(document).ready(function(){$("#mostrarmodal").modal("show");});</script>
<?php } ?>
  
</body>

<?php if($code==255){ ?>
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
<?php }else if($code == 522){ ?>
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
<div class="modal fade" id="mostrarmodal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true" onClick="window.location.href='psicologia_consult.php';">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button onClick="window.location.href='psicologia_consult.php';" type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="text-danger"><span class="glyphicon glyphicon-warning-sign"></span> ERROR.</h4>
      </div>
      <div class="modal-body">
        <h5 class="text-primary text-justify"><label>El Paciente con Indentificacion Nº <i class="text-danger"><?php echo $historia; ?></i> y fecha de atencion <i class="text-danger"><?php echo $fecharegistro; ?></i>  Incorrecto o no presenta Registro historico en esta area del sistema, Verifique que el numero de documento y la fecha de atencion ingresada coincidan con los registros historicos del paciente.</label></h4>      
      </div>
      <div class="modal-footer">
        <a onClick="window.location.href='psicologia_consult.php';" data-dismiss="modal" class="btn btn-danger">Cerrar</a>
      </div>
    </div>
  </div>
</div>
<?php } ?> 
</html>

