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

      
    </style>

  </head>
  <?php 
    $id = $_GET['id_iluminacion'];
    $id_empresa = $_GET['id_empresa'];

    $consulta = "SELECT * FROM higiene_empresa 
   JOIN higiene_medicion_iluminacion ON id_iluminacion = ".$id." 
   WHERE id = '$id_empresa' ";
    $query = mysqli_query($conexion,$consulta);

    if (mysqli_num_rows($query)) {
      while ($datos=mysqli_fetch_array($query)) {
        $empresa = $datos['nombre_empresa'];
        $nit = $datos['numero_nit'];
        $direccion = $datos['direccion'];
        $ciudad = $datos['ciudad'];
        $telefono = $datos['telefono'];
        $actividad_economica = $datos['actividad_economica'];

        $fecha_medicion= $datos['fecha_medicion_iluminacion'];
        $area_medicion= $datos['area_medicion_iluminacion'];
        $ubicacion_iluminacion= $datos['ubicacion_iluminacion'];
        $lugar_principal= $datos['lugar_principal'];
        $area_procesos= $datos['area_procesos'];
        $puesto_trabajo= $datos['puesto_trabajo'];
        $actividad_desarrollada= $datos['actividad_desarrollada'];
        $nivel_recomendado_lux= $datos['nivel_recomendado_lux'];
        $trab_directos= $datos['trab_directos'];
        $trab_indirectos= $datos['trab_indirectos'];
        $trab_total= $datos['trab_total'];
        $tipo_iluminacion= $datos['tipo_iluminacion'];
        $ventanas= $datos['ventanas'];
        $techo_color= $datos['techo_color'];
        $techo_material= $datos['techo_material'];
        $techo_altura= $datos['techo_altura'];
        $pared_color= $datos['pared_color'];
        $pared_material= $datos['pared_material'];
        $piso_color= $datos['piso_color'];
        $piso_material= $datos['piso_material'];
        $aseo= $datos['aseo'];
        $superficie_trabajo_color= $datos['superficie_trabajo_color'];
        $superficie_trabajo_material= $datos['superficie_trabajo_material'];
        $superficie_trabajo_altura= $datos['superficie_trabajo_altura'];
        $iluminacion_localizada= $datos['iluminacion_localizada'];
        $numero_luminarias= $datos['numero_luminarias'];
        $marca_luminaria= $datos['marca_luminaria'];
        $bombilla_tipo= $datos['bombilla_tipo'];
        $numero_lamparas_luminarias= $datos['numero_lamparas_luminarias'];
        $bombilla_marca= $datos['bombilla_marca'];
        $informacion_adicional= $datos['informacion_adicional'];
        $mantenimiento= $datos['mantenimiento'];
        $nivel_encontrado_lux= $datos['nivel_encontrado_lux'];
        $observaciones_generales= $datos['observaciones_generales'];


   ?>

<body>
  <?php //include ('bar/navbar_higiene.php'); ?>
  <div class="container">

      <table class="table table-bordered">
        <tbody>
          <tr>
            <td colspan="4" class="text-center text-info"><label>DATOS DE LA EMPRESA</label></td>
          </tr>
          <tr>
            <td><label>Empresa:</label></td>
            <td><?php echo $empresa ?></td>
            <td><label>Nit:</label></td>
            <td><?php echo $nit ?></td>
          </tr>
          <tr>
            <td><label>Direccion:</label></td>
            <td><?php echo $direccion ?></td>
            <td><label>Ciudad:</label></td>
            <td><?php echo $ciudad ?></td>
          </tr>
          <tr>
            <td><label>Telefono:</label></td>
            <td><?php echo $telefono ?></td>
            <td><label>Actividad Economica</label></td>
            <td><?php echo $actividad_economica ?></td>
          </tr>
        </tbody>
      </table>

      <table class="table table-bordered">
        <thead>
          <tr>
            <th class="text-center">Fecha de Medicion</th>
            <th class="text-center">Area de Medicion</th>
            <th class="text-center">Ubicacion</th>
          </tr>
        </thead>
        <tbody>
          <tr class="text-center">
            <td><?php echo $fecha_medicion ?></td>
            <td><?php echo $area_medicion ?></td>
            <td><?php echo $ubicacion_iluminacion ?></td>
          </tr>
        </tbody>
      </table>
    
    <table class="table table-bordered">
      <thead>
        <tr>
          <th class="text-center">Lugar Principal</th>
          <th class="text-center">Area de Procesos</th>
        </tr>
      </thead>
      <tbody class="text-center">
        <tr>
          <td><?php echo $lugar_principal ?></td>
          <td><?php echo $area_procesos ?></td>
        </tr>
        <tr>
          <td colspan="2"></td>
        </tr>
        <tr>
          <th class="text-center">Puesto de Trabajo</th>
          <th class="text-center">Tipo de Actividad Desarrollada</th>
        </tr>
        <tr>
          <td><?php echo $puesto_trabajo ?></td>
          <td><?php echo $actividad_desarrollada ?></td>
        </tr>
        <tr>
          <td colspan="2"></td>
        </tr>
        <tr>
          <th colspan="2" class="text-center"><label>Nivel Recomendado (Luxometria):</label></th>
        </tr>
        <tr>
          <td colspan="2" class="text-left"><?php echo $nivel_recomendado_lux ?></td>
        </tr>
      </tbody>
    </table>

    <table class="table table-bordered">
      <thead>
        <tr>
          <th colspan="3" class="text-center text-info"><label>Numero de Trabajadores</label></th>
        </tr>
        <tr>
          <th class="text-center">Directos</th>
          <th class="text">Indirectos</th>
          <th class="text-center">Total</th>
        </tr>
      </thead>
      <tbody>
        <tr class="text-center">
          <td><?php echo $trab_directos ?></td>
          <td><?php echo $trab_indirectos ?></td>
          <td><?php echo $trab_total ?></td>
        </tr>
      </tbody>
    </table>

    <table class="table table-bordered">
      <thead>
        <tr>
          <th colspan="2" class="text-center text-info"><label>Diseño Interior</label></th>
        </tr>
        <tr>
          <th class="text-center">Tipo de Iluminacion</th>
          <th class="text-center">Ventanas</th>
        </tr>
      </thead>
      <tbody>
        <tr class="text-center">
          <td><?php echo $tipo_iluminacion ?></td>
          <td><?php echo $ventanas ?></td>
        </tr>
      </tbody>
    </table>

    <table class="table table-bordered">
      <thead>
        <tr>
          <th colspan="3" class="text-center text-info"><label>Techo</label></th>
        </tr>
        <tr>
          <th class="text-center">Color</th>
          <th class="text-center">Material</th>
          <th class="text-center">Altura</th>
        </tr>
      </thead>
      <tbody>
        <tr class="text-center">
          <td><?php echo $techo_color ?></td>
          <td><?php echo $techo_material ?></td>
          <td><?php echo $techo_altura ?></td>
        </tr>
      </tbody>
    </table>

    <table class="table table-bordered">
      <thead>
        <tr>
          <th colspan="2" class="text-center text-info"><label>Paredes</label></th>
        </tr>
        <tr>
          <th class="text-center">Color</th>
          <th class="text-center">Material</th>
        </tr>
      </thead>
      <tbody>
        <tr class="text-center">
          <td><?php echo $pared_color ?></td>
          <td><?php echo $pared_material ?></td>
        </tr>
      </tbody>
    </table>

    <table class="table table-bordered">
      <thead>
        <tr>
          <th colspan="2" class="text-center text-info"><label>Piso</label></th>
        </tr>
        <tr>
          <th class="text-center">Color</th>
          <th class="text-center">Material</th>
        </tr>
      </thead>
      <tbody>
        <tr class="text-center">
          <td><?php echo $piso_color ?></td>
          <td><?php echo $piso_material ?></td>
        </tr>
      </tbody>
    </table>

    <table class="table table-bordered">
      <thead>
        <tr>
          <th colspan="2" class="text-center text-info"><label>Aseo</label></th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td><?php echo $aseo ?></td>
        </tr>
      </tbody>
    </table>

    <div class="text-center text-info"><label>Area de Trabajo:</label></div>

    <table class="table table-bordered">
      <thead>
        <tr>
          <th colspan="4" class="text-center text-info"><label>Superficie de Trabajo:</label></th>
        </tr>
        <tr>
          <th class="text-center">Color</th>
          <th class="text-center">Material</th>
          <th class="text-center">Altura</th>
          <th class="text-center">Iluminacion Localizada</th>
        </tr>
      </thead>
      <tbody>
        <tr class="text-center">
          <td><?php echo $superficie_trabajo_color ?></td>
          <td><?php echo $superficie_trabajo_material ?></td>
          <td><?php echo $superficie_trabajo_altura ?></td>
          <td><?php echo $iluminacion_localizada ?></td>
        </tr>
      </tbody>
    </table>

    <table class="table table-bordered">
      <thead>
        <tr>
          <th colspan="2" class="text-center text-info"><label>Luminarias</label></th>
        </tr>
        <tr>
          <th class="text-center">Numero de Luminarias</th>
          <th class="text-center">Marca</th>
        </tr>
      </thead>
      <tbody>
        <tr class="text-center">
          <td><?php echo $numero_luminarias ?></td>
          <td><?php echo $marca_luminaria ?></td>
        </tr>
      </tbody>
    </table>

    <table class="table table-bordered">
      <thead>
        <tr>
          <th colspan="3" class="text-center text-info"><label>Bombillas</label></th>
        </tr>
        <tr>
          <th class="text-center">Tipo</th>
          <th class="text-center">Numero de Lamparas por Luminarias</th>
          <th class="text-center">Marca</th>
        </tr>
      </thead>
      <tbody>
        <tr class="text-center">
          <td><?php echo $bombilla_tipo ?></td>
          <td><?php echo $numero_lamparas_luminarias ?></td>
          <td><?php echo $bombilla_marca ?></td>
        </tr>
      </tbody>
    </table>

    <table class="table table-bordered">
      <thead>
        <tr>
          <th colspan="3" class="text-center text-info"><label>Informacion Adicional de Luminarias y Lamparas:</label></th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td><?php echo $informacion_adicional ?></td>
        </tr>
      </tbody>
    </table>

    <table class="table table-bordered">
      <thead>
        <tr>
          <th class="text-center">Mantenimeto</th>
          <th class="text-center">Nivel Encontrado (Lux)</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td><?php echo $mantenimiento ?></td>
          <td><?php echo $nivel_encontrado_lux ?></td>
        </tr>
        <tr>
          <th colspan="2" class="text-center">Observaciones Generales o Recomendaciones:</th>
        </tr>
        <tr>
          <td colspan="2"><?php echo $observaciones_generales ?></td>
        </tr>
      </tbody>
    </table>

  </div><!--Container-->

<?php 
    }//while 
  }//rows
 ?>
    <?php //include 'bar/footer.php'; ?>
</body>


</html>
