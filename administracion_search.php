<?php 
include ('includes/conexion.php'); 
include ('bar/navbar_administracion.php');
?>

<!DOCTYPE html>
<html>
  <head>
  	<title>Laboratorio Salud Ocupacional</title>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">

    <style type="text/css">

      
    </style>
    <script type="text/javascript">
      <!---->
        $(document).ready(function() { 
          $("#resultadoBusqueda").html('<p>NO HA REALIZADO NINGUNA BUSQUEDA.</p>');
        });
      <!---->
      function buscar() {
          var textoBusqueda = $("input#busqueda").val();
        
          if (textoBusqueda != " ") {
              $.post("administracion_search_p.php", {valorBusqueda: textoBusqueda}, function(mensaje) {
                  $("#resultadoBusqueda").html(mensaje);
              }); 
          }else{ 
              $("#resultadoBusqueda").html('');
        };
      };
    </script> 

  </head>
    
  
  <body>
      <br><br>
  <!---->
  <form method="POST" target="_blank" action="admin_result.php"> 
    <div class="container">  
      <div class="panel panel-default col-sm-12">
        <div class="panel-body">          
                
          <div class="form-inline">                           
            <div class="col-sm-4">
            <label class="">Area:</label>   
              <div class="form-group">        
                <select name="tipoconsulta" class="form-control" >
                  <option >Seleccionar</option>
                  <option value="1">Datos Paciente</option>
                  <option value="2">Audiometria</option>
                  <option value="3">Visiometria</option>
                  <option value="4">Optometria</option>
                  <option value="5">Espirometria</option>
                  <option value="6">Psicologia</option>
                  <option value="7">Enfermeria</option>
                  <option value="8">Medico</option>
                </select>
              </div>
            </div> 
                     
            <div class="col-sm-4">
              <label>Fecha:</label>
              <input class="form-control" type="date" name="fecha_registro" required><br><br>
            </div>
            <div class="col-sm-4">  
              <label>N° Documento:</label>
              <input class="form-control" type="int" name="documento" onkeypress="return esInteger(event)" required>
            </div>

            <div class="col-sm-12 text-center">
              <br>
              <input type="submit" class="btn btn-info" name="Consultar" value="Consultar">
            </div>             
                    
          </div>
        </div>
      </div>
    </div>
  </form>  
  <!--</div>-->
  <!--</div>-->  
  <!---->
  <form accept-charset="utf-8" method="POST">
  <div class="container">
  <div class="col-sm-12">
    <label><span class="glyphicon glyphicon-search"></span> Busqueda Avanzada:</label>
    <input class="form-control" type="text" name="busqueda" id="busqueda" value="" placeholder="" maxlength="30" autocomplete="off" onKeyUp="buscar();" />
  
  <!--<div class="container">-->
    <!--<h2>Equipos Registrados</h2>
    <p>The .table-bordered class adds borders to a table:</p>--> 
    <div id="resultadoBusqueda"></div>
  <!--</div>-->
</div>
</div>
</form>

    <?php //include 'bar/footer.php'; ?>
  </body>

</html>
