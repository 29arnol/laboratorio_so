<?php 
  include ('includes/conexion.php'); 
  $code = base64_decode($_REQUEST['cod']);
  if ($code==255) {
    include ('bar/navbar_administracion.php'); 
  }else if ($code==522){
     include ('bar/navbar_recepcion.php');
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
    <style type="text/css">
      .d{
        width:1100px;
        height:1175px;
      }
    </style>
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
    $cont = "SELECT *, COUNT(motivo_evaluacion) AS Total FROM datos_basicos
      JOIN datos_complementarios ON datos_basicos.fk_d_complementario = datos_complementarios.id 
      JOIN espirometria ON  espirometria.espirometria_paciente = datos_basicos.id_historia
        WHERE datos_basicos.motivo_evaluacion = 'Ingreso' AND datos_complementarios.numero_documento=".$numero_documento." ";
      $qcont = mysqli_query($conexion,$cont);
        while ($re = mysqli_fetch_array($qcont)){
      $ingreso = $re{'Total'};      
    }
    $cont = "SELECT *, COUNT(motivo_evaluacion) AS Total FROM datos_basicos
      JOIN datos_complementarios ON datos_basicos.fk_d_complementario = datos_complementarios.id 
      JOIN espirometria ON  espirometria.espirometria_paciente = datos_basicos.id_historia
        WHERE datos_basicos.motivo_evaluacion = 'Periodico' AND datos_complementarios.numero_documento=".$numero_documento." ";
      $qcont = mysqli_query($conexion,$cont);
        while ($re = mysqli_fetch_array($qcont)){
      $periodico = $re{'Total'};     
    }
    $cont = "SELECT datos_basicos.motivo_evaluacion, COUNT(motivo_evaluacion) AS Total FROM datos_basicos
      JOIN datos_complementarios ON datos_basicos.fk_d_complementario = datos_complementarios.id
      JOIN espirometria ON  espirometria.espirometria_paciente = datos_basicos.id_historia
        WHERE datos_basicos.motivo_evaluacion = 'Retiro' AND datos_complementarios.numero_documento=".$numero_documento." ";
      $qcont = mysqli_query($conexion,$cont);
        while ($re = mysqli_fetch_array($qcont)){
      $retiro = $re{'Total'};     
    }
    $cont = "SELECT datos_basicos.motivo_evaluacion, COUNT(motivo_evaluacion) AS Total FROM datos_basicos
      JOIN datos_complementarios ON datos_basicos.fk_d_complementario = datos_complementarios.id 
      JOIN espirometria ON  espirometria.espirometria_paciente = datos_basicos.id_historia
        WHERE datos_basicos.motivo_evaluacion = 'Post incapacidad' AND datos_complementarios.numero_documento=".$numero_documento." ";
    $qcont = mysqli_query($conexion,$cont);
        while ($re = mysqli_fetch_array($qcont)){
      $postincapacidad = $re{'Total'};     
    }
    $cont = "SELECT datos_basicos.motivo_evaluacion, COUNT(motivo_evaluacion) AS Total FROM datos_basicos
      JOIN datos_complementarios ON datos_basicos.fk_d_complementario = datos_complementarios.id
      JOIN espirometria ON  espirometria.espirometria_paciente = datos_basicos.id_historia 
        WHERE datos_basicos.motivo_evaluacion = 'Reubicacion' AND datos_complementarios.numero_documento=".$numero_documento." ";
    $qcont = mysqli_query($conexion,$cont);
        while ($re = mysqli_fetch_array($qcont)){
     $reubicacion = $re{'Total'};      
    }
    $cont = "SELECT datos_basicos.motivo_evaluacion, COUNT(motivo_evaluacion) AS Total FROM datos_basicos
      JOIN datos_complementarios ON datos_basicos.fk_d_complementario = datos_complementarios.id 
      JOIN espirometria ON  espirometria.espirometria_paciente = datos_basicos.id_historia
        WHERE datos_basicos.motivo_evaluacion = 'Reingreso' AND datos_complementarios.numero_documento=".$numero_documento." ";
    $qcont = mysqli_query($conexion,$cont);
        while ($re = mysqli_fetch_array($qcont)){
      $reingreso = $re{'Total'};      
    }
    $cont = "SELECT datos_basicos.motivo_evaluacion, COUNT(motivo_evaluacion) AS Total FROM datos_basicos
      JOIN datos_complementarios ON datos_basicos.fk_d_complementario = datos_complementarios.id
      JOIN espirometria ON  espirometria.espirometria_paciente = datos_basicos.id_historia
        WHERE datos_basicos.motivo_evaluacion = 'Otros' AND datos_complementarios.numero_documento=".$numero_documento." ";
    $qcont = mysqli_query($conexion,$cont);
        while ($re = mysqli_fetch_array($qcont)){
      $otros = $re{'Total'};     
    }
    //obtener fecha del ultimo registro del historial
    $consultaregistro = "SELECT * FROM datos_basicos
      JOIN datos_complementarios ON datos_basicos.fk_d_complementario = datos_complementarios.id
      JOIN espirometria ON  espirometria.espirometria_paciente = datos_basicos.id_historia
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
  

    //}//fin if
    ?>

<body>
  <br>
  <div class="container">
    <form method="POST"  action="">
      <input type="text" name="numero_documento" value="<?php echo $numero_documento ?>" style="display: none;">
      <input type="text" name="fecha" value="<?php echo $fecha ?>" style="display: none;">

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
                    <td><?php echo $nombres_apellidos ?></td>
                    <td><?php echo $tipo_documento ?></td>
                    <td><?php echo $numero_documento ?></td> 
                  </tr>
                  <thead>
                    <th>Edad:</th>
                    <th>Fecha Nacimiento:</th>
                    <th>Genero:</th>
                  </thead>
                  <tr>   
                    <td><?php echo $edad ?></td>
                    <td><?php echo $fecha_nacimiento ?></td>
                    <td><?php echo $genero ?></td>
                  </tr>
                  <thead>      
                    <th>Estado Civil:</th>
                    <th>Lugar Nacimiento:</th>
                    <th>Numero Celular:</th>
                  </thead>
                  <tr>   
                    <td><?php echo $estado_civil ?></td>
                    <td><?php echo $lugar_nacimiento ?></td>
                    <td><?php echo $celular ?></td>
                  </tr>
                  <thead> 
                    <th>Direccion</th>
                    <th colspan="3">Motivo de Evaluacion:</th>
                  </thead>
                  <tr>
                    
                    <td><?php echo $direccion ?></td>  
                    <td colspan="3"><?php echo $motivo_evaluacion ?></td>
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
                    <td><?php echo $nombre_empresa ?></td>
                    <td><?php echo $actividad_economica ?></td>
                    <td><?php echo $ciudad ?></td>
                    <td><?php echo $direccion_empresa ?></td>
                    <td><?php echo $numero_nit ?></td>
                    <td><?php echo $telefono_empresa ?></td>
                  </tr>
                </tbody>
              </table>
            </div>
            <!--  -->
          </div>
        </div>

      <?php $ruta = 'archivos/archivo_p/'.$examen_ruta; ?>
      <div class="panel panel-default">
        <div class="panel-heading text-center"><label>Examen Espirometria</label></div>
        <div class="panel-body">
          <iframe src='<?php echo $ruta ?>' class='d' id='frame' > </iframe> 

          <li class="list-group-item text-center"><strong>Descargar Resultado: </strong>
            <a download href="<?php echo 'archivos/archivo_p/'.$examen_ruta; ?>">Download <span class="glyphicon glyphicon-cloud-download"> </span></a>
          </li> 

        </div>
      </div>
    </form>
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

