 <?php
session_start();
if(isset($_SESSION['usuario']) and $_SESSION['rol']==8){
$nombres = $_SESSION['nombre_completo'];
$nick = $nombres;    
}else{
session_destroy();
header('Location: index.php'); 
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>GESTION HIGIENE</title>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">

   <link rel="stylesheet" href="css/bootstrap.min.css">

   <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <!-- <link rel="stylesheet" type="text/css" href="bar/style_bar/style.css"> --><!--css code-->

   <script src="jquery/jquery.min.js"></script>
   <script src="js/bootstrap.min.js"></script>


   <link rel="stylesheet" type="text/css" href="bar/style_bar/estilo.css">
    <style type="text/css">


  </style>

  </head>


<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60">

<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="higiene.php">Laboratorio SST</a>
    <!--   <a class="navbar-brand" href="index.php" style="margin-top: 14px; color: #fff;"><img src="images/ico.png" style="margin-top:-22px;">
 -->    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-left">
        <li><a href="higiene_empresa.php">REGISTRAR EMPRESA</a></li>
        <li><a href="higiene_empresa_consultar.php">REGISTRAR MEDICION</a></li>

          <li id="menu" class="dropdown ground">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">CONSULTAR
            <span class="caret"></span></a>
            <ul class="dropdown-menu ground">
              <li><a href="higiene_consultar_iluminacion.php"><span class="glyphicon glyphicon-plus-sign"></span> Consultar Registros de Medicion de Iluminacion</a></li>
              <li><a href="higiene_consultar_ruido.php"><span class="glyphicon glyphicon-plus-sign"></span> Consultar Registros de Medicion de Ruido</a></li>
            </ul>
          </li> 
      </ul>


      <ul class="nav navbar-nav navbar-right" >
        <li><a><span class="glyphicon glyphicon-user"></span> <?php echo strtoupper($nick); ?></a></li>
          <li><a href="logout.php"><span class="glyphicon glyphicon-off"></span> CERRAR SESION</a></li>
      </ul>

    </div>
  </div>
</nav>


<br><br><br>
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
</html>




