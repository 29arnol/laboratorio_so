<!DOCTYPE html>
<html>
  <head>
    <title>Psicologia </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

  </head>
  <?php 
    include ('includes/conexion.php'); 
    include ('bar/navbar_psicologia.php');
    include ('timedata.php');
  ?>
<body>          
  <form method="POST" action="psicologia_registrarexamen.php"> 
    <div class="container">
      <div class="panel panel-default">
        <div class="panel-heading text-center"></div>
        <div class="panel-body">
          <div class="container-fluid">
            <div class="row"> 
              <div class="col-sm-6"> 
                <label>Fecha Apertura De Registro:</label>
                <input class="form-control" type="date" name="fecha_registro" value="<?php echo $fecha; ?>" ><br>
              </div>
              <div class="col-sm-6"> 
                <label>Numero Documento De Identidad:</label>
                <input class="form-control" type="int" name="cedula" onkeypress="return esInteger(event)">
              </div>
            </div>
            <div class="text-center">  
              <input type="submit" class="btn btn-info" name="consulta_U" value="Aceptar">
            </div> 
          </div>
        </div>
      </div>
    </div>               
  </form>
</body>
</html>
