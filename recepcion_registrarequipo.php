<?php 
  include ('includes/conexion.php');
  include ('bar/navbar_recepcion.php'); 
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Laboratorio Salud Ocupacional</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
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

    if ($query){
      echo "<script>alert('Datos Registrados Exitosamente')</script>";
      echo "<script>window.location = 'recepcion_pacientes.php'</script>";
    }else{
      echo "<script>alert('Error, Intente Nuevamente')</script>";
      echo "<script>window.location = 'recepcion_pacientes.php'</script>";
    }
  }   
?> 

<body>
	<br>
	<div class="container">
  	<div class="text-center">
  	    <label for="" class="text-primary">Registro de Equipos:</label>
  	</div>
  	<br>
  	<form class="" method="POST" action="">
  		<div class="col-sm-4">
  	    <label class="">Disponibilidad:</label>      
	      <select name="estado" class="form-control ">
	        <?php 
            $disponible = "SELECT * FROM equipo_disponible"; 
	      		$quer = mysqli_query($conexion,$disponible);

	      		while ($dat = mysqli_fetch_array($quer)){
	      			echo '<option value="'.$dat['id_estado'].'">'.$dat['estado_eq'].'</option>';
	      		}
	        ?>
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

      <div class="col-sm-12"><br>
  		  <label>Descripcion:</label>
  		  <textarea  class="form-control col-sm-12" type="text" name="descripcion_equipo" row="4"></textarea>
  	  </div> 

      <div class="col-sm-12">
        <div class="text-center"><br>
          <input type="submit" name="Registrar" value="Registrar" class="btn btn-success">
        </div>
      </div>
	  </form>
  </div>
  
</body>
  <script type="text/javascript">
    function esInteger(e) {
      var charCode 
      charCode = e.keyCode 
      status = charCode 
      if(charCode > 31 && (charCode < 48 || charCode > 57)){
        return false
      }
      return true
    }
  </script>
</html>
