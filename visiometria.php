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

    <link rel="stylesheet" type="text/css" href="css/style.css"><!--css code-->


   <script src="jquery/jquery.min.js"></script>
   <script src="js/bootstrap.min.js"></script>
    <style type="text/css">

    </style>

  </head>
  <body>
    <?php include ('bar/navbar_visiometria.php'); ?>


      <form method="POST" action="visiometria_reg.php">
        <div class="container">
          <div class="panel panel-default" style="border-color: #0685E5;">
            <div class="panel-heading text-center" style="background-color: #0685E5; color: #FFFFFF;">Buscar Datos Personales Del Paciente</div>
            <div class="panel-body"> 
              <div class="col-sm-6"> 
                <label>Fecha Apertura De Registro:</label>
                <input class="form-control" type="date" name="fecha_registro" value="<?php echo $fecha; ?>" >
              </div>
              <div class="col-sm-6">  
                <label>Numero Documento De Identidad:</label>
                <input class="form-control" type="int" name="cedula" onkeypress="return esInteger(event)">
                <br><br>
              </div>
              <div class="text-center">
                <input type="submit" class="btn btn-info" name="consulta_U" value="Aceptar">
              </div> 
            </div>
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

    <?php //include 'bar/footer.php'; ?>
</html>
