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

  <body>
    <div class="container">  
      <div class="panel panel-default">
        <div class="panel-body">          
          <form method="POST" action="recepcion_registrarpaciente.php"> 
            <div class="col-sm-12"><br>
              <label>Numero de Cedula:</label>
              <input class="form-control" type="int" name="cedula">
            </div> 
            <div class="col-sm-12">
            	<div class="text-center">
            		<br>
            		<input type="submit" class="btn btn-info" name="Consultar" value="Consultar">
            	</div>
            </div>
          </form>           
        </div>
      </div>
    </div>
  </body>
</html>
