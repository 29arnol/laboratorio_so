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
      .font{
        font-size: 18px;
      }
    </style>
  </head>
    <?php include ('bar/navbar_higiene.php'); ?>
  
  <body>
          

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
