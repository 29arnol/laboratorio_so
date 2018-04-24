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

  <script type="text/javascript" src="jvalidation/lib/jquery.js"></script>
  <!-- <script type="text/javascript" src="jvalidation/dist/jquery.validate.js"></script> -->

  <style type="text/css">
  .ccolor{
    color: #FFFFFF;
    margin-top: 15px;
  }
  nav{
    height: 70px;
  }
  .log{ 
    margin-left:10%;
  }

  .log_componentes{
    padding: 5px;  
  }

  #menu_gral li a:hover,
  #menu_gral li a:focus {
    background: #0892FC;
    color: #fff;
  }     
  </style>
</head>

        <!---->
 <script type="text/javascript" src="jvalidation/dist/jquery.validate.js"></script>

<script>
$(function(){

/* Incluimos un método para validar el campo nombre */
jQuery.validator.addMethod("nombre", function(value, element) {
return this.optional(element) || /^[a-záéóóúàèìòùäëïöüñ\s]+$/i.test(value);
}); 

/* Capturar el click del botón */
$("#btn").on("click", function()
   {
    /* Validar el formulario */
    $("#formulario").validate
         ({
             rules: /* Accedemos a los campos a través de su nombre: email, nombre, edad */
             {

              tipodocumento: {required: true},

               usuario: {required: true, minlength: 4, maxlength: 20},
               password: {required: true, minlength: 8, maxlength: 15 },//equalTo: "#contrasena2"

             },
             messages: /* Accedemos a los campos a través de su nombre: email, nombre, edad */
             {

               tiporol: {required: 'Seleccione un tipo de documento'},

               usuario: {required: 'Este campo es requerido', minlength: 'El mínimo permitido son 4 caracteres', maxlength: 'El máximo permitido son 20 caracteres'},

               password: {required:'Este campo es requerido', minlength: 'El mínimo permitido son 8 caracteres', maxlength: 'El máximo permitido son 15 caracteres', equalTo: 'Las contraseñas no coinciden'},


             },

         });
   });

});
</script>

  <!---->



<nav id="menu_gral" class="navbar navbar-inverse navbar-fixed-top" role="navigation" style= "background-color: #0685E5;">
  <div class="">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" 
              data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
       
        <a class="navbar-brand" href="index.php" style="margin-top: 14px; color: #fff;"><img src="images/ico.png" style="margin-top:-22px;"><!--<p style="color: ; font-size: 8px;  margin-top:-4px; left: -30px; ">Servicio en Seguridad y Salud en el Trabajo</p>--></a>
      </div>

      <!-- Collect the nav links, forms, and other content for toggling -->
      <div style="position: relative; z-index: 100;">
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1" >
        <ul class="nav navbar-nav" style= "background-color: #0685E5; ">
          <li><a href="index.php" style="color: #FFFFFF;" class="ccolor"><span class="glyphicon glyphicon-home"></span> Home</a></li>
            <li id="menu" class="dropdown">
              <a class="dropdown-toggle ccolor" style="color: #FFFFFF;" data-toggle="dropdown" href="#"> Nuestros Servicios
              <span class="caret"></a>
              <ul class="dropdown-menu">
                <li><a href="#"><span class="glyphicon glyphicon-info-sign"></span> servicio 1</a></li>
                <li><a href="#"><span class="glyphicon glyphicon-info-sign"></span> servicio 2</a></li>
              </ul>
            </li>   
          <li><a href="about.php" style="color: #FFFFFF;" class="ccolor">Acerca de Nosotros</a></li>         
        </ul>

        <ul class="nav navbar-nav navbar-right" style= "background-color: #0685E5; ">
          <li><a href="#" style="color: #FFFFFF;" class="ccolor " data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-user"></span> Usuario Sesion</a></li>
        </ul>
      </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
  </div>
</nav>

  <!---->

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog" style="top: 130px;">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header" style="background-color: #0685E5;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title" style="color: #FFFFFF;">Usuario Inicio de sesion</h4>
        </div>
        <div class="modal-body">
          <form action="login.php" method="POST" class="log" id="formulario" name="form">
            <br><br>
            <div class="row center-block">
              <label class="log col-sm-4"><span class=" glyphicon glyphicon-list"></span> Selecciona Rol:</label>
              <div class="row">
                <div class="form-group col-sm-4 log_componentes">        
                  <select name="tiporol" class="form-control ">
                    <option value="1">Recepcion</option>
                    <option value="2">Enfermeria</option>
                    <option value="3">Audiometria</option>
                    <option value="4">Espirometria</option>
                    <option value="5">Visiometria</option>
                    <option value="7">Psicologia</option>
                    <option value="6">Medico</option>
                    <option value="8">Gestion Higiene</option>
                    <option value="9">Administracion</option>
                  </select>
                </div>
              </div>
              <label class="log col-sm-4"><span class="glyphicon glyphicon-user"></span> Usuariooo:</label>
              <input class=" log_componentes " type="text" name="usuario" placeholder="ingrese Usuario" id="usuario" required>              
              <br><br>
              <label class="log col-sm-4"><span class="glyphicon glyphicon-lock"></span> Contraseña:</label>
              <input class="log_componentes" type="password" name="password" placeholder="ingrese contraseña" id="password" required>
              <br><br>
            </div>
            <input type="submit" name="btn" value="ingresar" class="btn btn-success center-block" id="btn"> 
          </form>

        </div>
                <!---->


        <!---->
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>

      </div>
    </div>
  </div> 

  <script>

    $(function(){//eventos de Mouse
      //evento colocar mouse sobre el elemento de id menu
      $('#menu').mouseover(function(){
        $('#menu').addClass('dropdown open').removeClass('dropdown');
      });
      $('#menu').mouseleave(function(){
        $('#menu').addClass('dropdown').removeClass('dropdown open');
      });
    });

    $(document).ready(function(){
      $("pp").hide();//default

        $(".btn1").click(function(){
            $("dl").slideUp();
        });
        $(".btn2").click(function(){
            $("dl").slideDown();
        });
    }); 
  </script>

