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

   <style type="text/css">
    .esp{
      width: 120%;
    }

    .centrar {
      display:block;
      margin-left: auto;
      margin-right: auto;
      width: 50%;
    } 

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
              $.post("visiometria_buscar.php", {valorBusqueda: textoBusqueda}, function(mensaje) {
                  $("#resultadoBusqueda").html(mensaje);
              }); 
          }else{ 
              $("#resultadoBusqueda").html('');
        };
      };
    </script>

  </head>

<body>
  <?php include ('bar/navbar_visiometria.php'); ?>

    <br><br>
  <!---->
  <form method="POST" target="_blank" action="visiometria_result.php"> 
    <div class="container">  
      <div class="panel panel-default col-sm-12">
        <div class="panel-body">          
                
          <div class="form-inline">                           
            <div class="col-sm-4">
            <label class="">Tipo Consulta:</label>   
              <div class="form-group">        
                <select name="tipoconsulta" class="form-control" >
                  <option value="2">Resultado</option>
                  <option value="1">Historia</option>
                </select>
              </div>
            </div> 
                     
            <div class="col-sm-4">
              <label>Fecha Apertura:</label>
              <input class="form-control" type="text" name="fecha_registro" value="<?php echo $fecha; ?>" required><br><br>
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


  <br><br><br>
 

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
