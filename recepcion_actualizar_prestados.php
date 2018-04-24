<?php include ('includes/conexion.php'); ?>
<?php 
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
  
  $id = $_GET['id'];
    $consult="SELECT * FROM equipos_prestados WHERE id = ".$id."";
    $quer = mysqli_query($conexion,$consult);

      while ($datos=mysqli_fetch_array($quer)) {
        $observaciones= $datos['observaciones'];
        $ficha = $datos['ficha_formativa'];
        $equipo = $datos['equipo'];
        $id_equipo = $datos['id_equipo'];  
      }

    $estado_dis = "SELECT * FROM equipos_laboratorio WHERE id = ".$id_equipo."";
    $query_est = mysqli_query($conexion, $estado_dis);
    while ($dat =mysqli_fetch_array($query_est)) {
        $est= $dat['estado_disp'];
      
      }  
 

  if (isset($_POST['Registrar'])) {
  	
    $devuelto = $_POST['devuelto'];
    $hora_entrada = $_POST['hora_entrada'];
    $nombres_persona_entrega = $_POST['nombres_persona_entrega'];
    $observacion = $_POST['observaciones'];

    $datos = "UPDATE `equipos_prestados` SET `devuelto`='$devuelto',`hora_entrada`='$hora_entrada',`nombres_persona_entrega`='$nombres_persona_entrega',`observaciones`='$observacion' WHERE id='$id'"; 
    $query = mysqli_query($conexion,$datos);

    $estad_disp = $_POST['est'];

    $estadodisp = "UPDATE `equipos_laboratorio` SET `estado_disp`='$estad_disp'";
    $query_disp = mysqli_query($conexion, $estadodisp);

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
  <hr>
  <div class="container">
    <div style="margin-top:-1%; padding-bottom: 2%;" class="row">
      <div class="col-sm-12">
        <div class="centrar" style="width: 100%; ">
          <ol class="breadcrumb">
            <li style="font-family: verdana; font-size: 15px;"><a href="recepcion_consulta_prestados.php">Consultar Equipos Prestados</a>
            </li>
            <li style="font-family: verdana; font-size: 15px;" class="active">Actualizar Registro Equipos Prestados</li>
          </ol>
        </div>  
      </div>
    </div>          
  </div>
  <br>

	<br><br>
	<div class="container">
	<div class="text-center">
	    <label for="" class="text-primary">Registrar retorno de Equipo: <strong style="color: red;"><?php echo $equipo; ?></strong> Prestado por la <strong style="color: red;">Ficha Nº: <?php echo $ficha; ?></strong>:</label>
	</div>
	</div>
	<br><br>
	<form class="" method="POST" action="">
		<div class="container">
		<div class="form-inline">


		<div class="col-sm-4"> 
		
		    <label>Hora de Entrada:</label>
		    <input class="form-control" type="text" name="hora_entrada" value="<?php echo $hora; ?>" required>
		</div>
	      
      <div class="col-sm-5">
        
        <label>Nombre Persona Entrega:</label>
        <input class="form-control" type="text" name="nombres_persona_entrega" required>
      </div>

      <div class="col-sm-3">
        <fieldset>
         <label>Retorno:</label>
          <label><input type="radio" name="devuelto" value="Si"> Si 
          <input type="radio" name="devuelto" value="No" checked> No 
          </label>
        </fieldset>
      </div>

<div class="row">
      <div class="col-sm-12">
      <br> 
        <label class="">Selecciona un estado de devolucion:</label>    
            <select name="est" class="form-control ">
            <?php $disponible = "SELECT * FROM equipo_disponible Where id_estado = $est"; 
                $quer = mysqli_query($conexion,$disponible);
                while ($dat = mysqli_fetch_array($quer)) {
                  echo '<option value="'.$dat['id_estado'].'">'.$dat['estado_eq'].'</option>';
                }
                $disp = "SELECT * FROM equipo_disponible Where id_estado != $est"; 
                $qry = mysqli_query($conexion,$disp);
                while ($data = mysqli_fetch_array($qry)) {
                  echo '<option value="'.$data['id_estado'].'">'.$data['estado_eq'].'</option>';
                }
              ?>
              <!--<option value="">Prestado</option>
              <option value="">No Disponible</option>-->
            </select>
          </div>
      <br><br>
</div>




	   <div class="" >
	   <br><br>
	    <div class="col-sm-12">
			<label>Observacion:</label>
			<td><textarea  class="col-sm-12" type="text" name="observaciones" rows="4"><?php echo $observaciones; ?></textarea></td>
		</div> 
		</div> 

        </div><!--fin container-->
 
	      <div class="container">
	        <div class="text-center">
	          <div class="col-sm-12">
	            <br><br>
	            <input type="submit" name="Registrar" value="Registrar" class="btn btn-success">
	          </div>
	        </div>
	      </div>
	      <br><br>
	    </div><!--fin centro-->
  	</form>

  <!--datos guardados-->
  <div class="modal fade" id="datossucces" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true" onClick="window.location.href='recepcion_consulta_prestados.php';">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button onClick="window.location.href='recepcion_consulta_prestados.php';" type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h3>Alerta</h3>
        </div>
        <div class="modal-body">
          <h4>Informe de Prestamo Registrado Exitosamente.</h4>       
        </div>
        <div class="modal-footer">
          <a onClick="window.location.href='recepcion_consulta_prestados.php';" data-dismiss="modal" class="btn btn-danger">Cerrar</a>
        </div>
      </div>
    </div>
  </div>

  <!--datos Error-->
  <div class="modal fade" id="datoserror" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true" onClick="window.location.href='recepcion_consulta_prestados.php';">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button onClick="window.location.href='recepcion_consulta_prestados.php';" type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h3>Alerta</h3>
        </div>
        <div class="modal-body">
          <h4>Error, Intente Nuevamente.</h4>       
        </div>
        <div class="modal-footer">
          <a onClick="window.location.href='recepcion_consulta_prestados.php';" data-dismiss="modal" class="btn btn-danger">Cerrar</a>
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
