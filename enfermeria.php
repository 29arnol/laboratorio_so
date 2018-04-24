<?php 
	include ('includes/conexion.php'); 
	include ('bar/navbar_enfermeria.php');
	include('timedata.php');
?>

<!DOCTYPE html>
<html>
  <head>
  	<title>Enfermeria Paciente</title>
   	<meta charset="utf-8">
   	<meta name="viewport" content="width=device-width, initial-scale=1">
  </head>

  <body>
    <br><br>
    <div class="container">
      <form method="POST" action="enfermeria_reg.php">
        <div class="panel panel-default" style="border-color: #0685E5;">
          <div class="panel-heading text-center" style="background-color: #0685E5; color: #FFFFFF;">Buscar Datos Personales Del Paciente</div>
          <div class="panel-body">
            <div class="col-sm-6">
              <label>Fecha Apertura De Registro:</label>
              <input class="form-control" type="date" name="fecha_registro" value="<?php echo $fecha; ?>" >  
            </div>
            <div class="col-sm-6">
              <label>Numero Documento de Identidad:</label>
              <input class="form-control" type="int" name="cedula">
              <br><br> 
            </div> 
            <div class="text-center">
              <input type="submit" class="btn btn-info" name="consulta_U" value="Aceptar"> 
            </div>
          </div>
        </div>  
      </form>           
    </div> 
  </body>
  <?php //include 'bar/footer.php'; ?>
</html>
