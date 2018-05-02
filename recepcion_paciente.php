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


          $ruta_destino =   "fotografias/"; //ruta de las fotos de los paciente

 ?>

<body>

<div class="container">
	<div class="panel panel-default">
	  <div class="panel-heading text-center"><label>Datos  <a href="#" data-toggle="modal" data-target="#historial">Paciente</a> - Empresa</label></div>
	    <div class="panel-body">    
	      <img class="img-responsive img-thumbnail paciente_datos" alt="Foto del Paciente" src=<?php echo $ruta_destino."".$paciente.'.png'; ?> >
	      	<div class="tabla_paciente">
		        <table class="table table-bordered">
			        <thead>
			          <th class="text-center">Nombres-Apellidos:</th>
			          <th class="text-center">Tipo Documento:</th>
			          <th class="text-center">Numero Documento:</th>
			        </thead>

			          <tbody>
			            <tr class="text-center">
			              <td><?php echo $datos['nombres_apellidos']; ?></td>
			              <td><?php echo $datos['tipo_documento']; ?></td>
			              <td><?php echo $datos['numero_documento']; ?></td> 
			            </tr>

			            <thead>
			              <th class="text-center">Edad:</th>
			              <th class="text-center">Fecha Nacimiento:</th>
			              <th class="text-center">Genero:</th>
			            </thead>
			            <tr class="text-center">   
			              <td><?php echo $datos['edad']; ?></td>
			              <td><?php echo $datos['fecha_nacimiento']; ?></td>
			              <td><?php echo $datos['genero']; ?></td>
			            </tr>
			            <thead>      
			              <th class="text-center">Estado Civil:</th>
			              <th class="text-center">Lugar Nacimiento:</th>
			              <th class="text-center">Hijos</th>
			            </thead>
			            <tr class="text-center">   
			              <td><?php echo $datos['estado_civil']; ?></td>
			              <td><?php echo $datos['lugar_nacimiento']; ?></td>
			              <td><?php echo $datos['hijos']; ?></td>
			            </tr>
			            </tbody>
			    </table>
		    </div>
			   
	        <table class="table table-bordered">
	            <tbody>
	           <thead> 
		            <th class="text-center">Numero Celular:</th>
		            <th class="text-center">Direccion</th>
		            <th class="text-center">Escolaridad</th>
	       			<th class="text-center">Motivo de Evaluacion:</th>
	        		<th class="text-center">EPS</th>
		          	<th class="text-center">ARL</th>
		          	<th class="text-center">AFP</th>
	          		<th class="text-center">Fecha Ingreso</th>
	          		<th class="text-center">Hora Ingreso</th>
	           </thead>
	            <tr class="text-center">
		            <td><?php echo $datos['celular']; ?></td>
		            <td><?php echo $datos['direccion']; ?></td>  
		            <td><?php echo $datos['escolaridad']; ?></td> 
		            <td><?php echo $datos['motivo_evaluacion']; ?></td>
		            <td><?php echo $datos['eps']; ?></td>
		      		<td><?php echo $datos['arl']; ?></td>
		      		<td><?php echo $datos['afp']; ?></td>
		          	<td><?php echo $datos['fecha']; ?></td>
		          	<td><?php echo $datos['hora']; ?></td>             
	            </tr>
	        </table>

  	 
	        <table class="table table-bordered"> 
	          <thead>
	            <th class="text-center">Nombre de la Empresa:</th>
	            <th class="text-center">Actividad Economica:</th>
	            <th class="text-center">Ciudad:</th>
	            <th class="text-center">Direccion de la empresa</th>
	            <th class="text-center">Numero de Nit</th>
	            <th class="text-center">Telefono</th>
	            <th class="text-center">Cargo a ejercer</th>
	          </thead>
	          <tbody>
	            <tr class="text-center">
	              <td><?php echo $datos['nombre_empresa']; ?></td>
	              <td><?php echo $datos['actividad_economica']; ?></td>
	              <td><?php echo $datos['ciudad']; ?></td>
	              <td><?php echo $datos['direccion_empresa']; ?></td>
	              <td><?php echo $datos['numero_nit']; ?></td>
	              <td><?php echo $datos['telefono_empresa']; ?></td>
	              <td><?php echo $datos['cargo_a_desempenar']; ?></td>
	            </tr>
	          </tbody>
	        </table>
	    </div>
  	</div>
</div>
</body>

<?php 
}//array

}else{//rows

}

  ?>

