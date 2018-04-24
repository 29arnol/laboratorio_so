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

  <?php
  if (isset($_POST['registrar'])) {

  $nombre_empresa = $_POST['nombre_empresa'];
  $numero_nit = $_POST['numero_nit'];
  $direccion_empresa = $_POST['direccion_empresa'];
  $ciudad_empresa = $_POST['ciudad_empresa'];
  $telefono = $_POST['telefono'];
  $actividad_economica = $_POST['actividad_economica'];

  $consult="SELECT * FROM higiene_empresa WHERE numero_nit ='$numero_nit'";
  $query = mysqli_query($conexion,$consult);



if (mysqli_num_rows($query) > 0){
    echo "<script>alert('Error el Nit de la empresa ya existe')</script>";
    echo "<script>window.location = 'higiene.php'</script>";
}else{

  $insert = "INSERT INTO `higiene_empresa` (`id`,`nombre_empresa`,`numero_nit`,`direccion`,`ciudad`,`telefono`,`actividad_economica`)
    VALUES ('null','$nombre_empresa','$numero_nit','$direccion_empresa','$ciudad_empresa','$telefono','$actividad_economica')";
    $query_insert = mysqli_query($conexion,$insert);

  if ($query_insert) {
    echo "<script>alert('Datos Registrados Exitosamente')</script>";
    echo "<script>window.location = 'higiene.php'</script>";
  }else{
    echo "<script>alert('Error Insert, Intente Nuevamente')</script>";
    echo "<script>window.location = 'higiene.php'</script>"; 
  }


}

}
  ?>
   <?php include ('bar/navbar_higiene.php'); ?>
<body>
<form class="form" action="" method="POST" role="form" name="calculadora">

  <div class="container" >
    <div class="text-center text-success font"><label>Registrar Datos de Empresa:</label></div>
  
    <div class=" col-sm-6">
      <label>Nombre de la Empresa:</label>
      <input class="form-control" type="text" name="nombre_empresa" >
      <br>
    </div>

    <div class=" col-sm-6">
      <label>Numero de Nit:</label>
      <input class="form-control" type="text" name="numero_nit" >
      <br>
    </div>

    <div class=" col-sm-6">
      <label>Direccion de la Empresa:</label>
      <input class="form-control" type="text" name="direccion_empresa" >
      <br>
    </div>

    <div class=" col-sm-6">
      <label>Ciudad:</label>
      <input class="form-control" type="text" name="ciudad_empresa" >
      <br>
    </div>

    <div class=" col-sm-6">
      <label>Telefono:</label>
      <input class="form-control" type="text" name="telefono" >
      <br>
    </div>

    <div class=" col-sm-6">
      <label>Actividad Economica:</label>
      <input class="form-control" type="text" name="actividad_economica" >
      <br>
    </div>

    <div class=" col-sm-12 text-center">
      <input class="btn btn-success" type="submit" name="registrar" value="Registrar"><br><br>
    </div>

  </div> 
</form>
</body>
</html>
