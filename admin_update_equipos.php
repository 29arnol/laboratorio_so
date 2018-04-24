<?php 
  include ('includes/conexion.php');
  include ('bar/navbar_administracion.php'); 
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Laboratorio Salud Ocupacional</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  </head>
<?php
  $id = $_GET['ref'];

  if (isset($_POST['Actualizar'])) {

    $referencia = $_POST['referencia_equipo'];
    $nombre = $_POST['nombre_equipo'];
    $descripcion = $_POST['descripcion_equipo'];
    $estado = $_POST['estado'];
    
    $datos = "UPDATE `equipos_laboratorio` SET `referencia`='$referencia', `nombre_equipo`='$nombre', `descripcion`='$descripcion',`estado_disp`= '$estado' WHERE id = ".$id.""; 
    $query = mysqli_query($conexion,$datos);

    if($query){
      echo '<script>
      $(document).ready(function(){
        $("#datossucces").modal("show");
      });</script>';
      //echo "<script>alert('Datos Registrados Exitosamente')</script>";
    }else{
      //echo "<script>alert('Error, Intente Nuevamente')</script>";
      echo '<script>
       $(document).ready(function(){
        $("#datoserror").modal("show");
      });</script>'; 
    }
  }   

  $data = "SELECT * FROM equipos_laboratorio 
  JOIN equipo_disponible ON equipo_disponible.id_estado = equipos_laboratorio.estado_disp
  WHERE id = ".$id." ";
  $query2 = mysqli_query($conexion, $data);

  while($dato = mysqli_fetch_array($query2)) {
    $referencia = $dato['referencia'];
    $nombre_equipo = $dato['nombre_equipo'];
    $estado = $dato['estado_disp'];
    $descripcion = $dato['descripcion'];
  }
?>
<body>
	<div class="container">
    <br>
  	<div class="text-center">
  	    <label for="" class="text-primary">Registro de Equipos:</label>
  	</div>

  	<form class="" method="POST" action="">
  		<div class="container">
    		<div class="col-sm-4">
    	    <label class="">Disponibilidad:</label>      
  	      <select name="estado" class="form-control ">
    	      <?php 
            $disponible = "SELECT * FROM equipo_disponible WHERE id_estado = ".$estado." "; 
              $quer = mysqli_query($conexion,$disponible);
            while ($dat = mysqli_fetch_array($quer)) {
              echo '<option value="'.$dat['id_estado'].'">'.$dat['estado_eq'].'</option>';
            }

            $disponible = "SELECT * FROM equipo_disponible WHERE id_estado != ".$estado." "; 
          		$quer = mysqli_query($conexion,$disponible);
          		while ($dat = mysqli_fetch_array($quer)) {
          			echo '<option value="'.$dat['id_estado'].'">'.$dat['estado_eq'].'</option>';
          		}
            ?>
  	      </select>
  	    </div>

    	  <div class="col-sm-4"> 
    	    <label>Referencia:</label>
    	    <input class="form-control" type="text" name="referencia_equipo" value="<?php echo $referencia ?>" required>
    	  </div>
        
        <div class="col-sm-4">                
          <label>Nombre del Equipo:</label>
          <input class="form-control" type="text" name="nombre_equipo" value="<?php echo $nombre_equipo ?>" required>
        </div>

        
        <div class="col-sm-12">
          <br><br>
    		  <label>Descripcion:</label>
    		  <textarea  class="form-control col-sm-12" type="text" name="descripcion_equipo" row="4"><?php echo $descripcion ?></textarea>
    	  </div> 

        <div class="text-center">
          <div class="col-sm-12">
            <br><br>
            <input type="submit" name="Actualizar" value="Actualizar" class="btn btn-success">
          </div>
        </div>
      </div>
  	</form>

  <!--datos guardados-->
  <div class="modal fade" id="datossucces" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true" onClick="window.location.href='administracion_equipos.php';">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button onClick="window.location.href='administracion_equipos.php';" type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h3>Alerta</h3>
        </div>
        <div class="modal-body">
          <h4>Equipo Actualizado Exitosamente.</h4>       
        </div>
        <div class="modal-footer">
          <a onClick="window.location.href='administracion_equipos.php';" data-dismiss="modal" class="btn btn-danger">Cerrar</a>
        </div>
      </div>
    </div>
  </div>

  <!--datos Error-->
  <div class="modal fade" id="datoserror" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true" onClick="window.location.href='administracion_equipos.php';">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button onClick="window.location.href='administracion_equipos.php';" type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h3>Alerta</h3>
        </div>
        <div class="modal-body">
          <h4>Error, Intente Nuevamente.</h4>       
        </div>
        <div class="modal-footer">
          <a onClick="window.location.href='administracion_equipos.php';" data-dismiss="modal" class="btn btn-danger">Cerrar</a>
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
