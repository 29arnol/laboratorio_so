<!DOCTYPE HTML>
<html>
<head>
  <script type="text/javascript" src="jvalidation/lib/jquery.js"></script>
  <script type="text/javascript" src="jvalidation/dist/jquery.validate.js"></script>

  <style type="text/css">
    input.error {
      border:1px solid red;
      color: :#FB6565;
    }
    label.error {
      color:#CF0202;
      font-size: 13px;  
    }
  </style>
</head>

<?php 
 include ('includes/conexion.php'); 
 include ('bar/navbar_administracion.php');
 include ('secure.php'); 
?>

<script>
  $(function(){
    /* Incluimos un método para validar el campo nombre */
    jQuery.validator.addMethod("nombre", function(value, element) {
      return this.optional(element) || /^[a-záéóóúàèìòùäëïöüñ\s]+$/i.test(value);
    }); 

    /* Capturar el click del botón */
    $("#btn").on("click", function(){
      /* Validar el formulario */
      $("#formulario").validate({
       rules: /* Accedemos a los campos a través de su nombre: email, nombre, edad */
       {
         email: {required: true, email: true, minlength: 5, maxlength: 80},
         nombre: {required: true, nombre: true, minlength: 2, maxlength: 50},
         edad: {required: true, digits: true, minlength: 1, maxlength: 3, min: 18, max:99},
         numero_documento: {required: true, digits: true},
         tipodocumento: {required: true},
         fechana: {required: true},
         sexo: {required: true},
         direccion: {required: true, minlength: 3, maxlength: 80},
         usuario: {required: true, minlength: 4, maxlength: 20},
         contrasena1: {required: true, minlength: 8, maxlength: 15, equalTo: "#contrasena2"},
         contrasena2: {required: true, minlength: 8, maxlength: 15,  equalTo: "#contrasena1" },
         tiporol: {required: true}
       },
       messages: /* Accedemos a los campos a través de su nombre: email, nombre, edad */
       {
         email: {required: 'Este campo es requerido', email: 'El formato de email es incorrecto', minlength: 'El mínimo permitido son 5 caracteres', maxlength: 'El máximo permitido son 80 caracteres'},
         nombre: {required: 'Este campo es requerido', nombre: 'Sólo letras', minlength: 'El mínimo permitido son 2 caracteres', maxlength: 'El máximo permitido son 50 caracteres'},
         edad: {required: 'El campo es requerido', digits: 'Sólo dígitos', minlength: 'El mínimo permitido son 1 caracteres', maxlength: 'El máximo permitido son 3 caracteres', min: 'Digite una edad mayor o igual a 18', max:'Digite una edad menor o igual a 99'},
         numero_documento: {required: 'Este campo es Requerido', digits: 'Sólo dígitos'},
         tipodocumento: {required: 'Seleccione un tipo de documento'},
         fechana: {required: 'Elige una fecha', minlength: 'El mínimo permitido son 3 caracteres', maxlength: 'El máximo permitido son 80 caracteres'},
         sexo: {required: 'Selecionar un genero'},
         direccion: {required: 'Este campo es requerido'},
         usuario: {required: 'Este campo es requerido', minlength: 'El mínimo permitido son 4 caracteres', maxlength: 'El máximo permitido son 20 caracteres'},
         contrasena1: {required:'Este campo es requerido', minlength: 'El mínimo permitido son 8 caracteres', maxlength: 'El máximo permitido son 15 caracteres', equalTo: 'Las contraseñas no coinciden'},
         contrasena2: {required:'Este campo es requerido' , minlength: 'El mínimo permitido son 8 caracteres', maxlength: 'El máximo permitido son 15 caracteres', equalTo: 'Las contraseñas no coinciden'},
         tiporol: {required: 'Seleccione un rol'}

       },
      });
    });
  });
</script>
<?php 
  if (isset($_POST['Registrar'])) {

    $nombres = $_POST['nombre'];
    $tipo_documento = $_POST['tipodocumento'];
    $numero_documento = $_POST['numero_documento'];
    $fecha_nac = $_POST['fechana'];
    $genero = $_POST['sexo'];
    $edad = $_POST['edad'];
    $direccion = $_POST['direccion'];
    $celular = $_POST['celular'];
    $email = $_POST['email'];
    $usuario = $_POST['usuario'];
    $pass = $_POST['contrasena1'];
    $tiporol = $_POST['tiporol'];

    $consult = "SELECT * FROM usuarios";
    $query2 = mysqli_query($conexion,$consult);

    if (mysqli_num_rows($query2) > 0){ 
      while ($datos=mysqli_fetch_array($query2)){
        $usuario_bd = $datos['usuario'];
      }
    }

    if ($usuario_bd == $_POST['usuario']){
      echo "<script>alert('Error, El nombre de usuario ya existe en el sistema')</script>";
      echo "<script>window.location = 'admin_users.php'</script>"; 
    }else{ 

      $insert = "INSERT INTO `usuarios` (`idusuario`, `tipo_identificacion`, `ndocumento`, `nombre_completo`, `fecha_nacimiento`,`genero`,`edad`,`email`,`telefono`,`direccion`,`usuario`,`contrasena`,`rol`) 
      VALUES (NULL, '$tipo_documento','$numero_documento','$nombres','$fecha_nac','$genero','$edad','$email','$celular','$direccion','$usuario','$pass', '$tiporol')";
      $query = mysqli_query($conexion,$insert);

    
      if ($query) {
        echo "<script>alert('Datos Registrados Exitosamente')</script>";
        echo "<script>window.location = 'administracion.php'</script>";
      }else{
        echo "<script>alert('Error query, Intente Nuevamente')</script>";
        echo "<script>window.location = 'administracion.php'</script>"; 
      }
    }
  }
?>
<body>
  <form method="POST"  id="formulario" name="form" >
    <div class="container">
      <!-- <div class="panel-heading text-center"><label>Registro de Usuario:</label></div> -->
      <h3 class="text-center text-info">REGISTRO DE USUARIO:</h3>
      <div class="col-sm-6">
        <label>Nombres y Apellidos:</label>
        <label for="nombre" generated="true" class="error"></label>
        <input type="text" name="nombre" class="form-control" id="nombre">
      </div>

      <div class="col-sm-6">
        <div>
          <label>Seleccione Tipo Documento:</label>
          <label for="tipodocumento" generated="true" class="error"></label>
          <select class="form-control" name="tipodocumento" id="tipodocumento" >
          <option value="">Seleccionar</option>
            <?php
            $tipo_doc ="SELECT * FROM `datos_basicos_tipo_documento` ";
            $querydoc = mysqli_query($conexion,$tipo_doc);
            while ($row2 = mysqli_fetch_array($querydoc)) {
            echo "<option value='".$row2['id']."'>".$row2['tipo_documento']."</option>";
            }
            ?>
          </select>
          <br/>
        </div>
      </div>

      <div class="col-sm-6">
        <br>
        <label>Numero de Documento:</label>
        <label for="numero_documento" generated="true" class="error"></label>
        <input class="form-control" type="int" name="numero_documento" onkeypress="return esInteger(event)"  id="numero_documento">
      </div> 

      <div class="col-sm-6">
        <br>
        <label>Fecha de Nacimiento:</label>
        <label for="fechana" generated="true" class="error"></label>
        <input class="form-control" type="date" name="fechana" id="fechana">
      </div>

      <div class="col-sm-6">
      <br> 
        <label>Genero:</label> 
          <label for="sexo" generated="true" class="error"></label>
          <div class="">Masculino <input type="radio" name="sexo" value="masculino" id="sexo">
          Femenino <input type="radio" name="sexo" value="femenino" id="sexo"></div>
      </div>

      <div class="col-sm-6">
        <br>
        <div class="form-inline"><label>Edad:</label>
        <label for="edad" generated="true" class="error"></label></div>
        <input class="form-control" type="int" name="edad" onkeypress="return esInteger(event)" id="edad">
      </div>

      <div class="col-sm-6">
        <br>
        <label>Direccion:</label>
        <label for="direccion" generated="true" class="error"></label>
        <input class="form-control" type="text" name="direccion" id="direccion"> 
      </div> 

      <div class="col-sm-6">
        <br>
        <label>Celular:</label>
        <label for="celular" generated="true" class="error"></label>
        <input class="form-control" type="int" name="celular" onkeypress="return esInteger(event)" id="celular">
      </div> 

      <div class="col-sm-6">
        <br>
        <label>Email:</label>
        <label for="email" generated="true" class="error"></label>
        <input class="form-control" type="int" name="email" id="email">
      </div>  
 
      <div class="col-sm-6">
        <br>
        <label>Usuario:</label>
        <label for="usuario" generated="true" class="error"></label>
        <input class="form-control" type="text" name="usuario" id="usuario"> 
      </div> 

      <div class="col-sm-6">
        <br>
        <label>Contraseña: </label>
        <label for="contrasena1" generated="true" class="error"></label>
        <input class="form-control" type="password" name="contrasena1" id="contrasena1"> 
      </div> 

      <div class="col-sm-6">
        <br>
        <label>Repetir Contraseña:</label>
        <label for="contrasena2" generated="true" class="error"></label>
        <input class="form-control" type="password" name="contrasena2" id="contrasena2"> 
        <br>
      </div>

      <div class="col-sm-12">
        <label>Ver Contraseña</label>
        <input type="checkbox" id="mostrar_contrasena" title="clic para mostrar contraseña"/>
      </div>

      <div class="col-sm-12">
        <br>
        <div>
          <label>Seleccione Un Rol:</label>
          <label for="tiporol" generated="true" class="error"></label>
          <select class="form-control" name="tiporol">
            <option value="">Seleccionar</option>
            <?php
              $tipo_rol ="SELECT * FROM `usuarios_roles` ";
              $queryrol = mysqli_query($conexion,$tipo_rol);
              while ($row2 = mysqli_fetch_array($queryrol)){
                echo "<option value='".$row2['id']."'>".$row2['area']."</option>";
              }
            ?>
          </select>
          <br/>
        </div>
      </div>

      <div class="row">
        <div class="text-center">
          <div class="col-sm-12">
            <br> 
            <input type="submit" id="btn" name="Registrar" value="Registrar" class="btn btn-success">
          </div>
        </div>
      </div> 


    </div>
  </form>
</body>
<script>
  $(document).ready(function () {
    $('#mostrar_contrasena').click(function () {
      if ($('#mostrar_contrasena').is(':checked')) {
        $('#contrasena1').attr('type', 'text');
        $('#contrasena2').attr('type', 'text');
      }else{
        $('#contrasena1').attr('type', 'password');
        $('#contrasena2').attr('type', 'password');
      }
    });
  });
</script>

<!-- <script type="text/javascript">
  $('input#usuario').keydown(function(e) { if (e.keyCode == 32) { return false; } });//usuario
  $('input#numero_documento').keydown(function(e) { if (e.keyCode == 32) { return false; } });//numero documento
  $('input#celular').keydown(function(e) { if (e.keyCode == 32) { return false; } });//celular
  $('input#edad').keydown(function(e) { if (e.keyCode == 32) { return false; } });//celular
  $('input#contrasena1').keydown(function(e) { if (e.keyCode == 32) { return false; } });//contra1
  $('input#contrasena2').keydown(function(e) { if (e.keyCode == 32) { return false; } });//contra2
</script> -->

</html>

