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
  $ruta_destino =   "fotografias/"; //ruta de las fotos de los paciente
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
  JOIN audiometria_resultado_der AS ard ON db.id_historia = ard.paciente_audiometria
  JOIN audiometria_resultado_izq AS ari ON ari.id_audiometria_paciente = ard.id 
  WHERE db.fecha = '$fecharegistro' AND db.id_historia='$historia' OR dc.numero_documento = '$historia' AND db.fecha = '$fecharegistro' ";
  $query = mysqli_query($conexion,$consult);

  if (mysqli_num_rows($query) > 0){

  while ($datos=mysqli_fetch_array($query)) {
    //datos personales
    $historia=$datos['id_historia'];


    


    //------------------------------
?>

<body>
  
<form parent.print()>
<div class="container">
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
              <td><?php echo $datos['nombres_apellidos']; ?></td>
              <td><?php echo $datos['tipo_documento'];?></td>
              <td><?php echo $datos['numero_documento']; ?></td> 
            </tr>
            <thead>
              <th>Edad:</th>
              <th>Fecha Nacimiento:</th>
              <th>Genero:</th>
            </thead>
            <tr>   
              <td><?php echo $datos['edad'];?></td>
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
      <!--  -->
    </div>
  </div>

<?php if ($tipocon == 1) { ?>
  <div class="panel panel-default">
    <div class="panel-heading text-center">
      <label>Antecedentes: </label> <?php echo $datos['antecedentes_audiometria']; ?>
    </div>
    <div class="panel-body">
       
    <table class="table table-bordered">
      <thead> 
        <th class="text-center">Personal</th>
        <th class="text-center">Descripcion</th>    
      </thead>
      <tbody>
        <tr>
          <td style="width: 150px;"><label>Quirurgico: </label> <?php echo $datos['ant_personal_quir']; ?></td>
          <td><label><textarea class="form-control" style="width: 940px;"><?php echo $datos['descripcion_personal_quir']; ?></textarea></label></td> 
        </tr>
        <tr>
          <td><label>General: </label> <?php echo $datos['ant_personal_gen'];  ?></td>
          <td><label><textarea class="form-control" style="width: 940px;"><?php echo $datos['descripcion_personal_gen']; ?></textarea></label></td> 
        </tr>
      </tbody>  
      <thead> 
        <th class="text-center">Familiar</th>
        <th class="text-center">Descripcion</th>  
      </thead>
      <tbody>
        <tr>
          <td><label>Quirurgico: </label> <?php echo $datos['ant_familiar_quir']; ?></td>
          <td><label><textarea class="form-control" style="width: 940px;"><?php echo $datos['descripcion_familiar_quir']; ?></textarea></label></td>
        </tr>
        <tr>
          <td><label>General: </label> <?php echo $datos['ant_familiar_gen']; ?></td>

          <td><label><textarea class="form-control" style="width: 940px;"><?php echo $datos['descripcion_familiar_gen']; ?></textarea></label></td> 
        </tr>
      </tbody>      
    </table>


    <table class="table table-bordered">
      <thead>   
        <th class="text-center">Antecedentes de Audiometria Anterior:</th> 
      </thead>
      <tbody>
        <tr>
          <td><textarea class="form-control" style="width: 1090px;" rows="4"> <?php echo $datos['ant_audiometria_anterior']; ?></textarea></td> 
        </tr>
      </tbody>
    </table>
  </div>
</div>

<div class="panel panel-default">
    <div class="panel-heading text-center">Otoscopia: </div>
  <div class="panel-body">            
    <table class="table table-bordered">
      <thead>   
        <!--<th>Resultados Examen de Audiometria</th>-->   
      </thead>
      <tbody>
        <tr>
          <th>OTOSCOPIA</th>
          <th class="text-center">Pasa</th>
          <th class="text-center">Hallazgos</th> 
        </tr>
        <tr>
          <td><label>Oido Derecho</label></td>
          <td><?php echo $datos['pasa_otoscopia']; ?></td> 
          <td><textarea class="form-control" style="width: 940px;"><?php echo $datos['hallazgo_der']; ?></textarea></td>  
        </tr>
        <tr>
          <td><label>Oido Izquierdo</label></td>  
          <td><?php echo $datos['pasa_otoscopia_izq'];?></td>
          <td><textarea class="form-control" style="width: 940px;"><?php echo $datos['hallazgo_izq']; ?></textarea></td>
        </tr>        
      </tbody>
    </table>
  </div>
</div>

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
        <tr class="text-center">
          <td><label>Oido Derecho</label></td>
          <td><?php echo $datos['250']; ?></td> 
          <td><?php echo $datos['500']; ?></td>
          <td><?php echo $datos['1000']; ?></td>
          <td><?php echo $datos['2000']; ?></td> 
          <td><?php echo $datos['4000']; ?></td>
          <td><?php echo $datos['8000']; ?></td> 
          <td><?php echo $datos['resultado_promedio']; ?></td>
        </tr>
        <tr class="text-center">
          <td><label>Oido Izquierdo</label></td> 
          <td><?php echo $datos['250_izq']; ?></td> 
          <td><?php echo $datos['500_izq']; ?></td>
          <td><?php echo $datos['1000_izq']; ?></td>
          <td><?php echo $datos['2000_izq']; ?></td> 
          <td><?php echo $datos['4000_izq']; ?></td>
          <td><?php echo $datos['8000_izq']; ?></td>
          <td><?php echo $datos['resultado_promedio_izq']; ?></td>
        </tr>        
      </tbody>
    </table>
    </div>
  </div>
</div>

  <!--<div class="form-inline">-->
<div class="panel panel-default">
  <div class="panel-heading text-center"><label>Observaciones:</label></div>
  <div class="panel-body">
    <textarea class="form-control" rows="2"><?php echo $datos['observaciones']; ?></textarea>
  </div>
</div> 

<div class="panel panel-default">
  <div class="panel-heading text-center"><label>Evaluacion audiologica diagnostica:</label></div>
  <div class="panel-body">
    <textarea class="form-control"><?php echo $datos['evaluacion_diagnostica']; ?></textarea>
  </div>
</div> 



<div class="panel panel-default">
  <div class="panel-heading text-center"></div>
  <div class="panel-body">         
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
          <td><?php echo $datos['control_anual']; ?></td> 
        </tr>
      </tbody>
    </table>
  </div>
</div>

</form>

<!--<div class="text-center"><label>Firma Audiologo</label></div>-->

<div class="text-center"><input name="imprimir" type="button" id="imprimir" onClick="parent.print()" value="Imprimir" ></div>

<?php }elseif ($tipocon==2) { ?>


<body>

<div class="panel panel-default">
  <div class="panel-heading text-center"><label>Audiometria Tamiz: </label></div>
  <div class="panel-body">
    <div class=""> 
      <div id="container" style="width: 700px; height: 700px; margin: 0 auto"></div><!-- Grafico Linea --> 
    </div>
    <table class="table table-bordered">
      <tbody>
        <tr>
          <td><label>Promedio tonos puros Oido Derecho:</label> <?php echo $datos['resultado_promedio']; ?></td> 
          <td><label>Promedio tonos puros Oido Izquierdo:</label> <?php echo $datos['resultado_promedio_izq']; ?></td> 
        </tr>
      </tbody>
    </table>
  </div> 
</div>

<div class="panel panel-default">
  <div class="panel-heading text-center"><label>Observaciones:</label></div>
  <div class="panel-body">
    <table class="table table-bordered">
      <tbody>
        <tr>
          <td><textarea rows="4" class="form-control" style="width: 1090px;"><?php echo $datos['observaciones']; ?></textarea></td> 
        </tr>
      </tbody>
    </table>
  </div>
</div>

<div class="panel panel-default">
  <div class="panel-heading text-center"><label>Recomendaciones:</label></div>
  <div class="panel-body">    
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
          <td><?php echo $datos['control_anual']; ?></td>
        </tr>
        <tr>
          <th class="text-center" colspan="3">Evaluacion audiologica diagnostica:</th>
        </tr>
        <tr>
          <td colspan="3">
            <textarea rows="4" class="form-control" style="width: 1090px;"><?php echo $datos['evaluacion_diagnostica']; ?></textarea>
          </td>
        </tr>
      </tbody>
    </table>
  </div> <!--fin col-sm-6-->
</div> 

</div>
<br>

</div>
<div class="text-center"><input name="imprimir" type="button" id="imprimir" onClick="parent.print()" value="Imprimir" ></div>
<input type="button" name="ds" onClick="Chart.print()" value="imp">
<!--<div class="text-center"><label>Firma Audiologo</label></div>-->
  
<?php } //fin-else-tipocon ?>


  <?php //include 'bar/footer.php'; ?>
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