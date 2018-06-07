<?php 
  include ('includes/conexion.php'); 
  include ('bar/navbar_visiometria.php');

date_default_timezone_set('America/Bogota');
$fecha = date('Y-m-d');
?>
<!DOCTYPE html>
<html>
  <head>
  	<title>Laboratorio Salud Ocupacional</title>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
  </head>
<body>
  <form method="POST" target="_blank" action="visiometria_listarexamen.php"> 
    <div class="container">  
      <div class="panel panel-default">
        <div class="panel-body">
          <p class="text-center">
            <a class="text-info fontlistar" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
            Consultar <i class="fas fa-caret-down"></i>
            </a>
          </p>
          <div class="collapse" id="collapseExample">
            <div class="card-body">
              <div class="container-fluid"> 
                <div class="row">                          
                  <div class="col-sm-4">
                    <label>Tipo Consulta:</label>   
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
                </div>

                <div class="col-sm-12 text-center">
                  <input type="submit" class="btn btn-info" name="Consultar" value="Consultar">
                </div>                      
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </form> 


  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <label><i class="fas fa-search"></i> Buscar:</label>
        <input class="form-control" type="text" name="busqueda" id="busqueda" value="" placeholder="" maxlength="30" autocomplete="off" onKeyUp="buscar();"/>
        <div id="resultadoBusqueda"></div>
      </div>
    </div>
  </div>

</body>
  <script type="text/javascript">
    $(document).ready(function() { 
      $("#resultadoBusqueda").html('<p>NO HA REALIZADO NINGUNA BUSQUEDA.</p>');
    });
    function buscar(){
      var textoBusqueda = $("input#busqueda").val();
      if (textoBusqueda != " "){
        $.post("visiometria_datosexamen.php", {valorBusqueda: textoBusqueda}, function(mensaje) {
          $("#resultadoBusqueda").html(mensaje);
        }); 
      }else{ 
        $("#resultadoBusqueda").html('');
      };
    };
  </script>
</html>
