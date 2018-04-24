<?php include ('includes/conexion.php'); ?>

<!DOCTYPE html>
<html>
  <head>
  	<title>Laboratorio Salud Ocupacional</title>

    <style type="text/css">

      
    </style>

  </head>
    <?php include ('bar/navbar_administracion.php'); ?>

  <body>
      <br><br>
    <?php 
    $consult = "SELECT * FROM usuarios 
    JOIN datos_basicos_tipo_documento ON usuarios.tipo_identificacion = datos_basicos_tipo_documento.id
    JOIN usuarios_roles ON usuarios_roles.id = usuarios.rol";
    $query = mysqli_query($conexion,$consult);


    echo '
        <div class="container">
      <h2>Usuarios en el Sistema</h2>
      <p>The .table-bordered class adds borders to a table:</p>            
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>Nombres y Apellidos</th>
            <th>Tipo Documento</th>
            <th>N° Documento</th>
            <th>Edad</th>
            <th>Fecha Nacimiento</th>
            <th>Email</th>
            <th>Telefono</th>
            <th>Direccion</th>
            <th>Area</th>
          </tr>
        </thead>
        <tbody>';
          while($dato = mysqli_fetch_array($query)) {
          $nombres = $dato['nombre_completo'];
          $tipo_doc = $dato['tipo_documento'];
          $ndocumento = $dato['ndocumento'];
          $edad = $dato['edad'];
          $fecha_na = $dato['fecha_nacimiento'];
          $email = $dato['email'];
          $telefono = $dato['telefono'];
          $direccion = $dato['direccion'];
          $area = $dato['area'];
    echo  '
          <tr>
            <td>'.$nombres.'</td>
            <td>'.$tipo_doc.'</td>
            <td>'.$ndocumento.'</td>
            <td>'.$edad.'</td>
            <td>'.$fecha_na.'</td>
            <td>'.$email.'</td>
            <td>'.$telefono.'</td>
            <td>'.$direccion.'</td>
            <td>'.$area.'</td>
          </tr>';
          }
    echo '</tbody>
      </table>
    </div>';

    
    
 ?>
    <?php //include 'bar/footer.php'; ?>
  </body>

</html>
