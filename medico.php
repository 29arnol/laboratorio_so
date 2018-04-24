<!DOCTYPE html>
<html>
  <head>
    <title>Medico - Buscar</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  </head>

  <?php 
    include ('includes/conexion.php'); 
    include ('bar/navbar_medico.php'); 
    include ('timedata.php'); 
  ?>
  <body>
    <form method="POST" action="medico_reg.php">
      <div class="container">
        <br><br>
        <div class="panel panel-default" style="border-color: #0685E5;">
          <div class="panel-heading text-center" style="background-color: #0685E5; color: #FFFFFF;">Buscar Datos Personales Del Paciente</div>
          <br>
          <div class="col-sm-6"> 
            <label>Fecha Apertura De Registro:</label>
            <input class="form-control" type="date" name="fecha_registro" value="<?php echo $fecha; ?>" ><br>
          </div>
          <div class="col-sm-6">  
            <label>Numero Documento De Identidad:</label>
            <input class="form-control" type="int" name="cedula" onkeypress="return esInteger(event)">
            <br>
          </div>  
          <div class="text-center">
            <input type="submit" class="btn btn-info" name="consulta_U" value="Aceptar">
          </div>
          <br>
        </div>  
      </div>                     
    </form>
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
