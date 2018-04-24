<?php 
include ('includes/conexion.php');
  $code = base64_decode($_REQUEST['cod']);
  if ($code==255) {
    include ('bar/navbar_administracion.php'); 
  }else{
     include ('bar/navbar_recepcion.php');
 }

   if ($_POST == true) {
    //$tipocon = $_POST['tipocon'];
    $historia = $_POST['documento'];
    $fecharegistro = $_POST['fecha_registro'];

  }else{
    //$tipocon = base64_decode($_REQUEST['tipoconsulta']);
    //$historia1 = $_GET['historia'];
    $historia = base64_decode($_REQUEST['paciente']);
    $fecharegistro = base64_decode($_REQUEST['registro']);
  }

    $consultaregistro = "SELECT * FROM datos_basicos AS db 
    JOIN datos_complementarios AS dc ON db.fk_d_complementario = dc.id
    JOIN datos_basicos_tipo_documento AS dbtd ON dc.fk_tipo_documento = dbtd.idtd
    WHERE  db.id_historia = '$historia' OR dc.numero_documento = '$historia' AND db.fecha = '$fecharegistro'";
    $queryreg = mysqli_query($conexion,$consultaregistro);
    if (mysqli_num_rows($queryreg) > 0){  
        while ($datos = mysqli_fetch_array($queryreg)){
          $datos_complementario = $datos{'id'};
          $paciente = $datos{'id_historia'};
          $ultimo = $datos{'fecha'}; 
          //echo $ultimo;
          //datos cargados de el ultimo registro
          $motivoeva= $datos['motivo_evaluacion'];

          $nombreempresa= $datos['nombre_empresa'];
          $actividadeconomica= $datos['actividad_economica'];
          $cargoadesempenar= $datos['cargo_a_desempenar'];
          $nit= $datos['numero_nit'];
          $telefono_empresa= $datos['telefono_empresa'];
          $direccion_empresa= $datos['direccion_empresa'];

          $ciudad= $datos['ciudad'];
          $nombresapellidos= $datos['nombres_apellidos'];
          $tipodocumento = $datos['tipo_documento'];
          $numero_documento= $datos['numero_documento'];
          $direccion= $datos['direccion'];
          $fechanacimiento= $datos['fecha_nacimiento'];
          $lugarnacimiento= $datos['lugar_nacimiento'];
          $edad= $datos['edad'];
          $genero= $datos['genero'];
          $hijos= $datos['hijos'];
          $estadocivil= $datos['estado_civil'];
          $celular= $datos['celular'];
          $escolaridad= $datos['escolaridad'];
          $eps= $datos['eps'];
          $arl= $datos['arl'];
          $afp= $datos['afp']; 
          $fechaing= $datos['fecha'];
          $horaing= $datos['hora'];


          $ruta_destino =   "fotografias/"; //ruta de las fotos de los paciente

 ?>

<body>

<div class="container">
<div class="panel panel-default">
  <div class="panel-heading text-center"><label>Datos  <a href="#" data-toggle="modal" data-target="#historial">Paciente</a> - Empresa</label></div>
    <div class="panel-body">    
      <img class="img-responsive img-thumbnail paciente_datos" alt="Foto del Paciente" src=<?php echo $ruta_destino."".$paciente.'.png'; ?> >
      <div class="col-sm-12">
      <div class="tabla_paciente">
        <table class="table table-bordered">
        <thead>
          <th>Nombres-Apellidos:</th>
          <th>Tipo Documento:</th>
          <th>Numero Documento:</th>
        </thead>

          <tbody>
            <tr>
              <td><?php echo $nombresapellidos ?></td>
              <td><?php echo $tipodocumento ?></td>
              <td><?php echo $numero_documento ?></td> 
            </tr>
            </tbody>

            <thead>
              <th>Edad:</th>
              <th>Fecha Nacimiento:</th>
              <th>Genero:</th>
            </thead>
            <tr>   
              <td><?php echo $edad ?></td>
              <td><?php echo $fechanacimiento ?></td>
              <td><?php echo $genero ?></td>
            </tr>
            <thead>      
              <th>Estado Civil:</th>
              <th>Lugar Nacimiento:</th>
              <th>Hijos</th>
            </thead>
            <tr>   
              <td><?php echo $estadocivil ?></td>
              <td><?php echo $lugarnacimiento ?></td>
              <td><?php echo $hijos ?></td>
            </tr>
            <thead> 
            <th>Numero Celular:</th>
              <th>Direccion</th>
              <th>Escolaridad</th>
           </thead>
            <tr>
              <td><?php echo $celular ?></td>
              <td><?php echo $direccion ?></td>  
              <td><?php echo $escolaridad ?></td>              
            </tr>
          </tbody>
          <thead>
          	<th >Motivo de Evaluacion:</th>
          	<th>EPS</th>
          	<th>ARL</th>
          </thead>
          <tbody>
          	<tr>
	      		<td ><?php echo $motivoeva ?></td>
	      		<td><?php echo $eps ?></td>
	      		<td><?php echo $arl ?></td>
          	</tr>
          </tbody>
          <thead>
          	<th>AFP</th>
          	<th>Fecha Ingreso</th>
          	<th>Hora Ingreso</th>
          </thead>
          <tbody>
          	<td><?php echo $afp ?></td>
          	<td><?php echo $fechaing ?></td>
          	<td><?php echo $horaing ?></td>
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
            <th>Cargo ejercer</th>
          </thead>
            <tr>
              <td><?php echo $nombreempresa ?></td>
              <td><?php echo $actividadeconomica ?></td>
              <td><?php echo $ciudad ?></td>
              <td><?php echo $direccion_empresa ?></td>
              <td><?php echo $nit ?></td>
              <td><?php echo $telefono_empresa ?></td>
              <td><?php echo $cargoadesempenar ?></td>
            </tr>

          </tbody>
        </table>
      </div>
      <!--  -->
    </div>
  </div>
</div>



</body>


 <?php 
	}//array

}else{//rows

}

  ?>

