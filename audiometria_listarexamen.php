<?php 
  include ('includes/conexion.php'); 

  $code = base64_decode($_REQUEST['cod']);
  if ($code==255) {
    include ('bar/navbar_administracion.php');  
  }else if($code==522){
    include ('bar/navbar_recepcion.php');
  }else{
   include ('bar/navbar_Audiometria.php'); 
  }
  $ruta_destino = "fotografias/"; //ruta de las fotos de los paciente
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Audiometria Resultados</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <script src="code/highcharts.js"></script>
    <script src="code/modules/broken-axis.js"></script>
    <script src="code/modules/exporting.js"></script>

  </head>

<?php

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

  //$variable = base64_decode($_REQUEST['historia']);

  $consult="SELECT * FROM datos_basicos AS db
  JOIN datos_complementarios AS dc ON db.fk_d_complementario = dc.id
  JOIN datos_basicos_tipo_documento AS dbtd ON dc.fk_tipo_documento = dbtd.idtd
  JOIN audiometria_oidoderecho AS aod ON db.id_historia = aod.paciente_audiometria
  JOIN audiometria_oidoizquierdo AS aoi ON aoi.id_audiometria_paciente = aod.id 
  WHERE db.fecha = '$fecharegistro' AND db.id_historia='$historia' OR dc.numero_documento = '$historia' AND db.fecha = '$fecharegistro' ";
  $query = mysqli_query($conexion,$consult);

  if (mysqli_num_rows($query) > 0){

  while ($datos=mysqli_fetch_array($query)) {
    //datos personales
    $historia=$datos['id_historia'];

?>

<body>
  
<form parent.print()>
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

<?php if ($tipocon == 1) { ?>
  <div class="panel panel-default">
    <div class="panel-heading text-center">
      <h6>Antecedentes: (<?php echo $datos['antecedenteaudiometria']; ?>) </h6>
    </div>
    <div class="panel-body">
    <div class="col-sm-12">
      <label for="">Personales:</label>
      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <div class="input-group-text size_font">
            Quirurgico: <div class="separator"></div>(<?php echo $datos['ant_personalquirurgico']; ?>) 
          </div>
        </div>
        <textarea class="form-control"><?php echo $datos['desc_personalquirurgico']; ?></textarea>
      </div>
      
      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <div class="input-group-text size_font">
            Generales: <div class="separator"></div>(<?php echo $datos['ant_personalgeneral'];  ?>) 
          </div>
        </div>
        <textarea class="form-control"><?php echo $datos['desc_personalgeneral']; ?></textarea>
      </div>

      <label for="">Familiares:</label>
      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <div class="input-group-text size_font">
            Quirurgico: <div class="separator"></div>(<?php echo $datos['ant_familiarquirurgico']; ?>) 
          </div>
        </div>
        <textarea class="form-control"><?php echo $datos['desc_familiarquirurgico']; ?></textarea>
      </div>
      
      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <div class="input-group-text size_font">
            Generales: <div class="separator"></div>(<?php echo $datos['ant_familiargeneral']; ?>) 
          </div>
        </div>
        <textarea class="form-control"><?php echo $datos['desc_familiargeneral']; ?></textarea>
      </div>

      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <div class="input-group-text size_font">
            Audiometria anterior:
          </div>
        </div>
        <textarea class="form-control"><?php echo $datos['ant_audiometriaanterior']; ?></textarea>
      </div>
      <br>
    </div>
  </div>
</div><br>

<div class="panel panel-default">
  <div class="panel-heading text-center">Otoscopia: </div>
  <div class="panel-body"> 
    <div class="col-sm-12">
      <label for="">Oido derecho:</label>
      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <div class="input-group-text size_font">
            Pasa: (<?php echo $datos['otoscopia_od']; ?>)
          </div>
        </div>
        <textarea class="form-control"><?php echo $datos['hallazgo_od']; ?></textarea>
      </div>

      <label for="">Oido izquierdo:</label>
      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <div class="input-group-text size_font">
            Pasa: (<?php echo $datos['otoscopia_oi'];?>)
          </div>
        </div>
        <textarea class="form-control"><?php echo $datos['hallazgo_oi']; ?></textarea>
      </div>
    </div>
  </div>
</div><br>

<div class="panel panel-default">
  <div class="panel-heading">
    <div class="text-center"><label>Audiometria Tamiz: </label> 
  </div>
  </div>
  <div class="panel-body">

    <div class=" col-sm-12">
      <div class="form-group"> 
        
      </div>  
    </div> <!--container-->


    <div class=" col-sm-12">  

     <div id="container" style="width: 700px; height: 700px; margin: 0 auto"></div><!-- Grafico Linea --> 
     <br>
    <table class="table table-bordered">
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
        <tr>
        </tr>
        <tr class="text-center table-danger">
          <td><strong>Oido Derecho</strong></td>
          <td><?php echo $datos['250']; ?></td> 
          <td><?php echo $datos['500']; ?></td>
          <td><?php echo $datos['1000']; ?></td>
          <td><?php echo $datos['2000']; ?></td> 
          <td><?php echo $datos['4000']; ?></td>
          <td><?php echo $datos['8000']; ?></td> 
          <td><?php echo $datos['promedio_od']; ?></td>
        </tr>
        <tr class="text-center table-info">
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
    </div>
  </div>
</div><br>

<div class="panel panel-default">
  <div class="panel-heading text-center"><label>Observaciones:</label></div>
  <div class="panel-body">
    <div class="col-sm-12">
      <textarea class="form-control" rows="2"><?php echo $datos['observaciones']; ?></textarea><br>
    </div>
  </div>
</div><br> 

<div class="panel panel-default">
  <div class="col-sm-12">
    <div class="panel-heading text-center"><h6>Evaluacion audiologica diagnostica:</h6></div>
    <textarea class="form-control"><?php echo $datos['evaluaciondiagnostica']; ?></textarea><br>
  </div>
</div><br>

<div class="panel panel-default">
  <div class="panel-heading text-center"></div>
  <div class="panel-body">
    <div class="col-sm-12">         
      <table class="table table-bordered">
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
</div>
</form>
<br>
<div class="text-center">
  <input name="imprimir" type="button" id="imprimir" onClick="parent.print()" value="Imprimir">
</div>
<br>

<?php }elseif ($tipocon==2) { ?>


<body>

<div class="panel panel-default">
  <div class="panel-heading">
    <div class="text-center"><label>Audiometria Tamiz: </label> 
  </div>
  </div>
  <div class="panel-body">
    <div class="col-sm-12">  

      <div id="container" style=" height: 700px; "></div><!-- Grafico Linea --> 

      <div class="row">
        <div class="col-sm-6">
        <div class="text-center">
          <span class="input-group-text text-info" id="basic-addon1">
            <i class="fas fa-deaf"></i><div class="separator"></div>El Promedio de tonos puros en el oido derecho es de: (<?php echo $datos['promedio_od']; ?>)
          </span>
        </div>
        </div>
        
        <div class="col-sm-6">
          <div class="text-center">
            <span class="input-group-text text-danger" id="basic-addon1">
              <i class="fas fa-deaf"></i><div class="separator"></div>El Promedio de tonos puros en el oido Izquierdo es de: (<?php echo $datos['promedio_oi']; ?>)</span>
          </div>
        </div>
      </div>
      <br>
    </div>
  </div>
</div><br>

<div class="panel panel-default">
  <div class="panel-heading text-center"><label>Observaciones:</label></div>
  <div class="panel-body">
    <div class="col-sm-12">
      <textarea rows="2" class="form-control"><?php echo $datos['observaciones']; ?></textarea><br>
    </div>
  </div>
</div><br>

<div class="panel panel-default">
  <div class="panel-heading text-center"><label>Recomendaciones:</label></div>
  <div class="panel-body">
    <div class="col-sm-12">    
      <table class="table table-bordered">
        <thead>   
          <th class="text-center">Retamizaje:</th>
          <th class="text-center">Interconsulta con Otorrinolaringología:</th>
          <th class="text-center">control en 1 año:</th> 
        </thead>
        <tbody class="text-center">
          <tr>
            <td><?php echo $datos['retamizaje']; ?></td>
            <td><?php echo $datos['interconsulta']; ?></td>
            <td><?php echo $datos['controlanual']; ?></td>
          </tr>
        </tbody>
      </table>
      <div class="panel-heading text-center"><label>Evaluacion audiologica diagnostica:</label></div>
      <textarea rows="2" class="form-control" ><?php echo $datos['evaluaciondiagnostica']; ?></textarea><br>
    </div>
  </div> <!--fin col-sm-6-->
</div> 

</div>

</div><br>
<div class="text-center">
  <input name="imprimir" type="button" id="imprimir" onClick="parent.print()" value="Imprimir" >
</div><br>
  
<?php } //fin-else-tipocon ?>

</body>

<script type="text/javascript">   
       
  Highcharts.chart('container', {
    chart: {
      type: 'line'
    },
      animation:  Highcharts.svg, // don't animate in old IE
    title: {
      text: ''
    },
    subtitle: {
      text: 'Grafica'
    },
    xAxis: {
      categories: ['250', '500','1000','2000', '4000', '8000']
    },

    yAxis: {
      //------

      min:0,
      max: 120,
      reversed: true,

      labels: {
      style: {
        color: 'green'
      }
  
      },

      //------
      title: {
        text: 'Intervalos'
      }
    },
    plotOptions: {
      line: {
        dataLabels: {
          enabled: true
        },
        enableMouseTracking: false
      }
    },
    series: [{
      name: 'Oido Derecho',
      //data: [120, 20, 20, 10, 40, 21.5]
      data: [<?php echo $datos["250"] ?>,<?php echo $datos["500"] ?>,<?php echo $datos["1000"] ?>,<?php echo $datos["2000"] ?>,
      <?php echo $datos["4000"] ?>,<?php echo $datos["8000"] ?>] 
    },{
      color: '#FF0000',
      name: 'Oido Izquierdo',
      data: [<?php echo $datos["250_izq"] ?>,<?php echo $datos["500_izq"] ?>,<?php echo $datos["1000_izq"] ?>,<?php echo $datos["2000_izq"] ?>,
      <?php echo $datos["4000_izq"] ?>,<?php echo $datos["8000_izq"] ?>]
    }]
  });

<?php 
  }//fin while
?>



</script>

<?php //fin rows
  }else{

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
<div class="modal fade" id="mostrarmodal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true" onClick="window.location.href='audiometria_con.php';">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button onClick="window.location.href='audiometria_con.php';" type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="text-danger"><span class="glyphicon glyphicon-warning-sign"></span> ERROR.</h4>
      </div>
      <div class="modal-body">
        <h5 class="text-primary text-justify"><label>El Paciente con Indentificacion Nº <i class="text-danger"><?php echo $historia; ?></i> y fecha de atencion <i class="text-danger"><?php echo $fecharegistro; ?></i>  Incorrecto o no presenta Registro historico en esta area del sistema, Verifique que el numero de documento y la fecha de atencion ingresada coincidan con los registros historicos del paciente.</label></h4>      
      </div>
      <div class="modal-footer">
        <a onClick="window.location.href='audiometria_con.php';" data-dismiss="modal" class="btn btn-danger">Cerrar</a>
      </div>
    </div>
  </div>
</div>

<?php } ?>


</html>