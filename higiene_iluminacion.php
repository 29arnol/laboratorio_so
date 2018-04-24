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
      $id = $_GET['id']; 
    if (isset($_POST['registrar'])) {
      $idd=$_POST['idd'];
      $fecha_medicion = $_POST['fecha_medicion'];
      $area_medicion = $_POST['area_medicion'];
      $ubicacion_medicion = $_POST['ubicacion_medicion'];
      $lugar_principal = $_POST['lugar_principal'];
      $area_procesos = $_POST['area_procesos'];
      $puesto_trabajo = $_POST['puesto_trabajo'];
      $tipo_actividad = $_POST['tipo_actividad'];
      $lux_nivel_recomendado = $_POST['lux_nivel_recomendado'];
      $trabajadores_directo = $_POST['trabajadores_directo'];
      $trabajadores_indirecto = $_POST['trabajadores_indirecto'];
      $trabajadores_total = $_POST['trabajadores_total'];
      $tipo_iluminacion = $_POST['tipo_iluminacion'];
      $ventanas = $_POST['ventanas'];
      $techo_color = $_POST['techo_color'];
      $techo_material = $_POST['techo_material'];
      $techo_altura = $_POST['techo_altura'];
      $pared_color = $_POST['pared_color'];
      $pared_material = $_POST['pared_material'];
      $piso_color = $_POST['piso_color'];
      $piso_material = $_POST['piso_material'];
      $aseo = $_POST['aseo'];
      $superficie_trabajo_color = $_POST['superficie_trabajo_color'];
      $superficie_trabajo_material = $_POST['superficie_trabajo_material'];
      $superficie_trabajo_altura = $_POST['superficie_trabajo_altura'];

      $superficie_trabajo_iluminacion = $_POST['superficie_trabajo_iluminacion'];
      $numero_luminarias = $_POST['numero_luminarias'];
      $marca_luminarias = $_POST['marca_luminarias'];
      $tipo_bombilla = $_POST['tipo_bombilla'];
      $numero_lamparas_luminarias = $_POST['numero_lamparas_luminarias'];
      $bombilla_marca = $_POST['bombilla_marca'];
      $informacion_adicional = $_POST['informacion_adicional'];
      $mantenimiento = $_POST['mantenimiento'];
      $nivel_encotrado_lux = $_POST['nivel_encotrado_lux'];
      $observaciones_generales = $_POST['observaciones_generales'];

      $insert = "INSERT INTO `higiene_medicion_iluminacion` (`id_iluminacion`,`fecha_medicion_iluminacion`,`area_medicion_iluminacion`,`ubicacion_iluminacion`,`lugar_principal`,`area_procesos`,`puesto_trabajo`,`actividad_desarrollada`,`nivel_recomendado_lux`,`trab_directos`,`trab_indirectos`,`trab_total`,`tipo_iluminacion`,`ventanas`,`techo_color`,`techo_material`,`techo_altura`,`pared_color`,`pared_material`,`piso_color`,`piso_material`,`aseo`,`superficie_trabajo_color`,`superficie_trabajo_material`,`superficie_trabajo_altura`,`iluminacion_localizada`,`numero_luminarias`,`marca_luminaria`,`bombilla_tipo`,`numero_lamparas_luminarias`,`bombilla_marca`,`informacion_adicional`,`mantenimiento`,`nivel_encontrado_lux`,`observaciones_generales`,`id_empresa`)
      VALUES(NULL,'$fecha_medicion','$area_medicion','$ubicacion_medicion','$lugar_principal','$area_procesos','$puesto_trabajo','$tipo_actividad','$lux_nivel_recomendado','$trabajadores_directo','$trabajadores_indirecto','$trabajadores_total','$tipo_iluminacion','$ventanas','$techo_color','$techo_material','$techo_altura','$pared_color','$pared_material','$piso_color','$piso_material','$aseo','$superficie_trabajo_color','$superficie_trabajo_material','$superficie_trabajo_altura','$superficie_trabajo_iluminacion','$numero_luminarias','$marca_luminarias','$tipo_bombilla','$numero_lamparas_luminarias','$bombilla_marca','$informacion_adicional','$mantenimiento','$nivel_encotrado_lux','$observaciones_generales','$idd')";
        $query = mysqli_query($conexion,$insert);

        if ($query) {
          echo "<script>alert('Datos Registrados Exitosamente')</script>";
          echo "<script>window.location = 'higiene.php'</script>";
        }else{
          echo "<script>alert('Error de query')</script>";
          echo "<script>window.location = 'higiene.php'</script>";
        }
    } 

  $data = "SELECT * FROM higiene_empresa WHERE id = ".$id." ";
  $query = mysqli_query($conexion,$data);

  if (mysqli_num_rows($query) > 0){ 

  while ($datos=mysqli_fetch_array($query)) {
  $empresa = $datos['nombre_empresa'];
  $nit = $datos['numero_nit'];
  $direccion = $datos['direccion'];
  $ciudad = $datos['ciudad'];
  $telefono = $datos['telefono'];
  $actividad_economica = $datos['actividad_economica'];
  ?>

<body>
      <?php include ('bar/navbar_higiene.php'); ?>
  <div class="container">

    <h2 class="text-center text-success "><u>Registro De Mediciones Ambientales De Iluminacion</u></h2>

    <form class="form" action="" method="POST" role="form" name="calculadora">

      <div class="container-fluid">
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
      </div>

    <input class="form-control" type="text" name="idd" value="<?php echo $id ?>" style="display: none;">

      <div class="text-center" style="color: red;"><label>Toma de Informacion:</label></div>

      <div class="container-fluid" >
        <div class=" col-sm-4">
          <label>Fecha de medicion:</label>
          <input class="form-control" type="date" name="fecha_medicion" >
          <br>
        </div>

        <div class=" col-sm-4">
          <label>Area de medicion:</label>
          <input class="form-control" type="text" name="area_medicion" >
          <br>
        </div>

        <div class=" col-sm-4">
          <label>Ubicacion:</label>
          <input class="form-control" type="text" name="ubicacion_medicion" >
          <br>
        </div>

        <div class="col-sm-12"><hr></div>

        <div class=" col-sm-6">
          <label>Lugar Principal:</label>
          <input class="form-control" type="text" name="lugar_principal" >
          <br>
        </div>
        
        <div class=" col-sm-6">
          <label>Area Procesos:</label>
          <input class="form-control" type="text" name="area_procesos" >
          <br>
        </div>

        <div class=" col-sm-6">
          <label>Puesto de Trabajo:</label>
          <input class="form-control" type="text" name="puesto_trabajo" >
          <br>
        </div>

        <div class=" col-sm-6">
          <label>Tipo de Actividad Desarrollada:</label>
          <input class="form-control" type="text" name="tipo_actividad" >
          <br>
        </div>

        <div class=" col-sm-12">
          <label>Nivel Recomendado (Luxometria):</label>
          <input class="form-control" type="text" name="lux_nivel_recomendado" >
          <br>
        </div>

        <div class="col-sm-12"><hr></div>

        <div class="text-center text-info"><label>Numero de Trabajadores:</label></div>

        <div class=" col-sm-4">
          <label>Directos:</label>
          <input class="form-control" type="text" name="trabajadores_directo" id="item1" onKeyUp="Suma()">
          <br>
        </div>

        <div class=" col-sm-4">
          <label>Indirectos:</label>
          <input class="form-control" type="text" name="trabajadores_indirecto" id="item2" onKeyUp="Suma()">
          <br>
        </div>

        <div class=" col-sm-4">
          <label>Total:</label>
          <input class="form-control" type="text" name="trabajadores_total" readonly="readonly">
          <br>
        </div>

        <div class="col-sm-12"><hr></div>

        <div class="text-center" style="color: red;"><label>Diseño Interior:</label></div>

        <div class=" col-sm-6 text-center">
          <label>Tipo de Iluminacion:</label>
          <input class="" type="radio" name="tipo_iluminacion" value="Natural"> Natural /
          <input class="" type="radio" name="tipo_iluminacion" value="Artificial"> Artificial
          <br>
        </div>

        <div class=" col-sm-6 text-center">
          <label>Ventanas:</label>
          <input class="" type="radio" name="ventanas" value="Si"> Si /
          <input class="" type="radio" name="ventanas" value="No"> No
          <br>
        </div>

        <div class="col-sm-12"><hr></div>

        <div class="text-center text-info"><label>Techo:</label></div>

        <div class=" col-sm-4">
          <label>color:</label>
          <input class="form-control" type="text" name="techo_color" >
          <br>
        </div>

        <div class=" col-sm-4">
          <label>Material:</label>
          <input class="form-control" type="text" name="techo_material" >
          <br>
        </div>

        <div class=" col-sm-4">
          <label>Altura:</label>
          <input class="form-control" type="text" name="techo_altura" >
          <br>
        </div>
        <div class="col-sm-12"><hr></div>

        <div class="text-center text-info"><label>Paredes:</label></div>

        <div class=" col-sm-6">
          <label>color:</label>
          <input class="form-control" type="text" name="pared_color" >
          <br>
        </div>

        <div class=" col-sm-6">
          <label>Material:</label>
          <input class="form-control" type="text" name="pared_material" >
          <br>
        </div>

        <div class="col-sm-12"><hr></div>

        <div class="text-center text-info"><label>Piso:</label></div>

        <div class=" col-sm-6">
          <label>color:</label>
          <input class="form-control" type="text" name="piso_color" >
          <br>
        </div>

        <div class=" col-sm-6">
          <label>Material:</label>
          <input class="form-control" type="text" name="piso_material" >
          <br>
        </div>

        <div class="col-sm-12"><hr></div>

        <div class=" col-sm-12">
          <label>Aseo:</label>
          <input class="form-control" type="text" name="aseo" >
          <br>
        </div>

        <div class="col-sm-12"><hr></div>

        <div class="text-center" style="color: red;"><label>Area de Trabajo:</label></div><br>

        <div class="text-center text-info"><label>Superficie de Trabajo:</label></div>

        <div class=" col-sm-3">
          <label>Color:</label>
          <input class="form-control" type="text" name="superficie_trabajo_color" >
          <br>
        </div>

        <div class=" col-sm-3">
          <label>Material:</label>
          <input class="form-control" type="text" name="superficie_trabajo_material" >
          <br>
        </div>

        <div class=" col-sm-3">
          <label>Altura:</label>
          <input class="form-control" type="text" name="superficie_trabajo_altura" >
          <br>
        </div>

        <div class=" col-sm-3">
        <br>
          <label>Iluminacion Localizada:</label>
          <input type="radio" name="superficie_trabajo_iluminacion" value="Si"> Si /
          <input type="radio" name="superficie_trabajo_iluminacion" value="No"> No
          <br>
        </div>

        <div class="col-sm-12"><hr> <br></div>

        <div class="col-sm-12 text-center text-info"><label>Luminarias:</label></div>

        <div class=" col-sm-6">
          <label>Numero Luminarias:</label>
          <input class="form-control" type="text" name="numero_luminarias" >
          <br>
        </div>

        <div class=" col-sm-6">
          <label>Marca:</label>
          <input class="form-control" type="text" name="marca_luminarias" >
          <br>
        </div>

        <div class="col-sm-12"><hr> <br></div>

        <div class="col-sm-12 text-center text-info"><label>Bombillas:</label></div>

        <div class=" col-sm-4">
          <label>Tipo:</label>
          <input class="form-control" type="text" name="tipo_bombilla" >
          <br>
        </div>

        <div class=" col-sm-4">
          <label>Numero de Lamparas por Luminarias:</label>
          <input class="form-control" type="text" name="numero_lamparas_luminarias" >
          <br>
        </div>

        <div class=" col-sm-4">
          <label>Marca:</label>
          <input class="form-control" type="text" name="bombilla_marca" >
          <br>
        </div>

        <div class=" col-sm-12">
          <label>Informacion Adicional de Luminarias y Lamparas:</label>
          <textarea class="form-control" name="informacion_adicional"></textarea>
          <br>
        </div>

        <div class=" col-sm-6">
          <label>Mantenimeto:</label>
          <input class="form-control" type="text" name="mantenimiento" >
          <br>
        </div>

        <div class=" col-sm-6">
          <label>Nivel Encontrado (Lux):</label>
          <input class="form-control" type="text" name="nivel_encotrado_lux" >
          <br>
        </div>

        <div class=" col-sm-12">
          <label>Observaciones Generales o Recomendaciones:</label>
          <textarea class="form-control" name="observaciones_generales"></textarea>
          <br>
        </div>

        <div class=" col-sm-12 text-center">
          <input class="btn btn-success" type="submit" name="registrar" value="Registrar"><br><br>
        </div>

      </div>
    </form>  
  </div>
</body>
<?php 
}//while
}//rows
 ?>
  <!---->
  <script>
  //Función que realiza la suma
  function Suma() {
    var item1 = document.calculadora.item1.value;
    var item2 = document.calculadora.item2.value;

    //var fast_maximo = document.calculadora.fast_maximo.value;
    //var fast_minimo = document.calculadora.fast_minimo.value;     
    try{
      //Calculamos el número escrito:
     item1 = (isNaN(parseInt(item1)))? 0 : parseInt(item1);
     item2 = (isNaN(parseInt(item2)))? 0 : parseInt(item2);

      document.calculadora.trabajadores_total.value = (item1+item2);

      /*fast_maximo = (isNaN(parseInt(fast_maximo)))? 0 : parseInt(fast_maximo);
      fast_minimo = (isNaN(parseInt(fast_minimo)))? 0 : parseInt(fast_minimo);

      document.calculadora.medicion_promedio_fast.value = (fast_maximo+fast_minimo);*/   
    }
    //Si se produce un error no hacemos nada
    catch(e) {}
  }
  </script>
</html>