<?php include ('includes/conexion.php'); ?>

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

    <script src="jquery/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
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
  </head>

<body>
  <?php include ('bar/navbar_recepcion.php'); ?>


<div class="container">  
  <div class="panel panel-default">
    <div class="panel-body">          
        <form method="POST" action="recepcion_reg.php"> 
          <!--//-->
  
  
          <!--//--> 
        <div class="col-sm-12">
	          <label>Numero de Cedula:</label>
	          <input class="form-control" type="int" name="cedula" onkeypress="return esInteger(event)">
          </div> 

 <!--          <div class="col-sm-5">
          	<div id="textboxs"></div><a id="remove">X</a>
          </div>  --> 

          <div class="col-sm-12">
          	<div class="text-center">
          		<br>
          		<input type="submit" class="btn btn-info" name="Consultar" value="Consultar">
          	</div>
          </div>


          

        </form>           
      </div>
    </div>
  </div>

  <?php //include 'bar/footer.php'; ?>
</body>
<!-- 	<script type="text/javascript">

$('#tipodoc').change(function(){
   $('#textboxs').append('<label>Numero de Cedula:</label><input class="form-control" name="cedula" id="cedula'+$('#tipodoc option:selected').val()+'" type="text" value=""/>');
});

	$('#remove').click(function(){//eliminar elementoa
				$('#textboxs').remove();//va eliminando el ultimo elemento de la lista	
			});

	</script> -->

<!--   <script type="text/javascript">
    function esInteger(e) {
      var charCode 
      charCode = e.keyCode 
      status = charCode 
      if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false
      }
      return true
    }
  </script> -->

</html>
