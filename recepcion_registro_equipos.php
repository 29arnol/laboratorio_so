<?php include ('includes/conexion.php'); ?>

<!DOCTYPE html>
<html>
  <head>
    	<title>Laboratorio Salud Ocupacional</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <script src="jquery/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
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

  if (isset($_POST['Registrar'])) {

  	
    $referencia = $_POST['referencia_equipo'];
    $nombre = $_POST['nombre_equipo'];
    $descripcion = $_POST['descripcion_equipo'];
    $estado = $_POST['estado'];
    

    $datos = "INSERT INTO `equipos_laboratorio`(`id`, `referencia`, `nombre_equipo`, `descripcion`,`estado_disp`) 
    VALUES (NULL, '$referencia','$nombre','$descripcion','$estado')"; 
    $query = mysqli_query($conexion,$datos);

    if ($query) {
      echo '<script>
      $(document).ready(function(){
        $("#datossucces").modal("show");
      });</script>';
      //echo "<script>alert('Datos Registrados Exitosamente')</script>";
    } else {
      //echo "<script>alert('Error, Intente Nuevamente')</script>";
      echo '<script>
       $(document).ready(function(){
        $("#datoserror").modal("show");
      });</script>'; 
    }
  }   
  ?> 

<body>
  <?php include ('bar/navbar_recepcion.php'); ?>

	<br><br>
	<div class="container">
	<div class="text-center">
	    <label for="" class="text-primary">Registro de Equipos:</label>
	</div>

	<br><br>
	<form class="" method="POST" action="">
		<div class="container">
		<div class="form-inline">
		<div class="col-sm-4">

	  <label class="">Disponibilidad:</label>      
	      <select name="estado" class="form-control ">
	      <?php $disponible = "SELECT * FROM equipo_disponible"; 
	      		$quer = mysqli_query($conexion,$disponible);

	      		while ($dat = mysqli_fetch_array($quer)) {
	      			echo '<option value="'.$dat['id_estado'].'">'.$dat['estado_eq'].'</option>';
	      		}
	        ?>
	        <!--<option value="">Prestado</option>
	        <option value="">No Disponible</option>-->
	      </select>
	  </div>

	  <div class="col-sm-4"> 
	    <label>Referencia:</label>
	    <input class="form-control" type="text" name="referencia_equipo" required>
	  </div>
      
    <div class="col-sm-4">
        
      <label>Nombre del Equipo:</label>
      <input class="form-control" type="text" name="nombre_equipo" required>
    </div>

    </div>

    <br><br>
    <div class="col-sm-12">
		  <label>Descripcion:</label>
		  <td><textarea  class="form-control col-sm-12" type="text" name="descripcion_equipo" row="4"></textarea></td>
	 </div> 

    <div class="text-center">
      <div class="col-sm-12">
        <br><br>
        <input type="submit" name="Registrar" value="Registrar" class="btn btn-success">
      </div>
    </div>
    </div>

	</form>

  <!--datos guardados-->
  <div class="modal fade" id="datossucces" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true" onClick="window.location.href='recepcion_registro_equipos.php';">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button onClick="window.location.href='recepcion_registro_equipos.php';" type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h3>Alerta</h3>
        </div>
        <div class="modal-body">
          <h4>Equipo Registrado Exitosamente.</h4>       
        </div>
        <div class="modal-footer">
          <a onClick="window.location.href='recepcion_registro_equipos.php';" data-dismiss="modal" class="btn btn-danger">Cerrar</a>
        </div>
      </div>
    </div>
  </div>

  <!--datos Error-->
  <div class="modal fade" id="datoserror" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true" onClick="window.location.href='recepcion_registro_equipos.php';">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button onClick="window.location.href='recepcion_registro_equipos.php';" type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h3>Alerta</h3>
        </div>
        <div class="modal-body">
          <h4>Error, Intente Nuevamente.</h4>       
        </div>
        <div class="modal-footer">
          <a onClick="window.location.href='recepcion_registro_equipos.php';" data-dismiss="modal" class="btn btn-danger">Cerrar</a>
        </div>
      </div>
    </div>
  </div>

  <!--identificacion ya registrada-->
  <div class="modal fade" id="idexiste" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true" onClick="window.location.href='recepcion.php';">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button onClick="window.location.href='recepcion.php';" type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h3>Alerta</h3>
        </div>
        <div class="modal-body">
          <h4>Error, El numero de identificacion ya esta registrado en el sistema.</h4>       
        </div>
        <div class="modal-footer">
          <a onClick="window.location.href='recepcion.php';" data-dismiss="modal" class="btn btn-danger">Cerrar</a>
        </div>
      </div>
    </div>
  </div>
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
