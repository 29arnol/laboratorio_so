<?php
  include ('includes/conexion.php');
  include ('bar/navbar_Audiometria.php'); 
  include ('timedata.php');  
?>
<!DOCTYPE html>
<html>
  <head>
    <title>LSST Registro Examen Audiometria</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  </head>
<body>  
  <form method="POST" action="audiometria_registrarexamen.php"><br>
    <div class="container">
      <div class="panel panel-default">
        <div class="panel-heading text-center">Buscar Datos Personales Del Paciente</div>
        <div class="panel-body">
          <div class="col-sm-12">
            <div class="row">
              <div class="col-sm-6"> 
                <label>Fecha Apertura De Registro:</label>
                <input class="form-control" type="date" name="fecha_registro" value="<?php echo $fecha; ?>" ><br>
              </div>
              <div class="col-sm-6"> 
                <label>Numero Documento De Identidad:</label>
                <input class="form-control" type="int" name="cedula" onkeypress="return esInteger(event)">
                <br><br>
              </div>
            </div>
            <div class="text-center">  
              <input type="submit" class="btn btn-info" name="consulta_U" value="Aceptar">
            </div>
          </div><br>
        </div>
      </div>
    </div>               
  </form>
</body>
</html>
