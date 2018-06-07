<?php 
  include ('includes/conexion.php'); 
  include ('bar/navbar_visiometria.php'); 
  date_default_timezone_set('America/Bogota');
  $hora = date('h:i:s A');
  $fecha = date('Y-m-d');
?>

<!DOCTYPE html>
<html>
  <head>
  	<title>Vaidar paciente</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  </head>
  <body>
    <form method="POST" action="visiometria_registrarexamen.php">
      <div class="container">
        <div class="panel panel-default">
          <div class="text-info text-center">Validar Paciente</div>
          <div class="panel-body">
            <div class="container-fluid"> 
              <div class="row">
                <div class="col-sm-6"> 
                  <label>Fecha Apertura De Registro:</label>
                  <input class="form-control" type="date" name="fecha_registro" value="<?php echo $fecha; ?>" >
                </div>
                <div class="col-sm-6">  
                  <label>Numero Documento De Identidad:</label>
                  <input class="form-control" type="int" name="cedula" onkeypress="return esInteger(event)">
                </div>
              </div><br>
              <div class="text-center">
                <input type="submit" class="btn btn-info" name="consulta_U" value="Aceptar">
              </div>
            </div> 
          </div>
        </div>
      </div>               
    </form>
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

    <?php //include 'bar/footer.php'; ?>
</html>
