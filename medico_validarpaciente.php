<!DOCTYPE html>
<html>
  <head>
    <title>Medico - Consultar</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  </head>
  <?php 
    include ('includes/conexion.php'); 
    include ('bar/navbar_medico.php'); 
    include ('timedata.php'); 
  ?>
  <body>
    <form method="POST" action="medico_registrarexamen.php">
      <div class="container">
        <div class="panel panel-default">
          <div class="panel-heading text-center"></div>
            <div class="container-fluid">
              <div class="row">
                <div class="col-sm-6"> 
                  <label>Fecha apertura de registro:</label>
                  <input class="form-control" type="date" name="fecha_registro" value="<?php echo $fecha; ?>" >
                </div>
                <div class="col-sm-6">  
                  <label>Numero documento:</label>
                  <input class="form-control" type="int" name="cedula" onkeypress="return esInteger(event)">
                </div>
              </div><br>  
              <div class="text-center">
                <input type="submit" class="btn btn-info" name="consulta_U" value="Aceptar">
              </div>
            </div>
          <br>
        </div>  
      </div>                     
    </form>
  </body>
</html>
