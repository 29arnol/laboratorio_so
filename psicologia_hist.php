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
    <!--<label class=""><span class=" glyphicon glyphicon-list"></span> Seleccionar Motivo de Evaluacion:</label>   
      <div class="form-group">        
        <select name="tipoconsulta" class="form-control">
          <option value="Ingreso">Ingreso</option>
          <option value="#">Diferente</option>
        </select>
      </div>
    </div> 
  </div>-->           
  <!--//-->            
  <form method="POST" action="psicologia_reg.php"> 
    <br><br>
    <div class="container">
      <div class="panel panel-default" style="border-color: #0685E5;">
        <div class="panel-heading text-center" style="background-color: #0685E5; color: #FFFFFF;">Buscar Datos Personales Del Paciente</div>
        <div class="panel-body">
          <div class="col-sm-6"> 
            <label>Fecha Apertura De Registro:</label>
            <input class="form-control" type="date" name="fecha_registro" value="<?php echo $fecha; ?>" ><br>
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

      var duracion = setTimeout(function(){
        $('#alerta').modal();
      }, 500);

      $('.carousel').carousel({
        interval: 3000 //changes the speed
      })
    </script>
</html>
