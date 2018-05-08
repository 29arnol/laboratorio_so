<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Theme Made By www.w3schools.com - No Copyright -->
  <title>Laboratorio SST</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<!--   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css"> -->

<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"><!-- ya -->

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous"><!-- ya -->

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script><!-- ya -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script> <!-- ya -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>

 <!--  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> -->

 <!--  <link rel="stylesheet" href="css/bootstrap.min.css"> -->
  <!-- <script src="jquery/jquery.min.js"></script> -->
  <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
  <script src="jquery/jquery.expander.js"></script>
<!--   <script src="js/bootstrap.min.js"></script> -->

<style type="text/css">
  input.error{
    border:1px solid red;
    color: :#FB6565;
  }
  label.error{
    color:#CF0202;
    font-size: 13px;  
  }

  body {
      font: 400 15px Lato, sans-serif;
      line-height: 1.8;
      color: #818181;
  }
  h2{
    font-size: 15px;
    text-transform: uppercase;
    color: #303030;
    font-weight: 600;
  }
  h4{
      font-size: 15px;
      line-height: 1.375em;
      color: #303030;
      font-weight: 400;
      margin-bottom: 15px;
  }  
  .jumbotron {
    background-color: #0685E5;
    color: #fff;
    padding: 150px 10px;
    font-family: Montserrat, sans-serif;
    /*max-height: 330px ;*/
    /*min-height: 10px !important;*/
  }
  .container-fluid{
    padding: 60px 50px;
  }
  .bg-grey {
    background-color: #f6f6f6;
  }
  .logo-small {
    color: #5f5f5f;
    font-size: 50px;
  }
  .logo {
      color: #5f5f5f;
      font-size: 200px;
  }
  .thumbnail {
      padding: 0 0 15px 0;
      border: none;
      border-radius: 0;
  }
  .thumbnail img {
      width: 100%;
      height: 100%;
      margin-bottom: 10px;
  }
  .im{
    width: 230px !important;
    height: 210px !important;
  }
  .carousel-control.right, .carousel-control.left {
      background-image: none;
      color: #5f5f5f;
  }
  .carousel-indicators li {
      border-color: #5f5f5f;
  }
  .carousel-indicators li.active {
      background-color: #5f5f5f;
  }
  .item h4 {
      font-size: 19px;
      line-height: 1.375em;
      font-weight: 400;
      font-style: italic;
      margin: 70px 0;
  }
  .item span {
      font-style: normal;
  }
  .panel {
      border: 1px solid #f4511e; 
      border-radius:0 !important;
      transition: box-shadow 0.5s;
  }
  .panel:hover {
      box-shadow: 5px 0px 40px rgba(0,0,0, .2);
  }
  .panel-footer .btn:hover {
    border: 1px solid #f4511e;
    background-color: #fff !important;
    color: #f4511e;
  }
  .panel-heading {
    color: #fff !important;
    background-color: #f4511e !important;
    padding: 25px;
    border-bottom: 1px solid transparent;
    border-top-left-radius: 0px;
    border-top-right-radius: 0px;
    border-bottom-left-radius: 0px;
    border-bottom-right-radius: 0px;
  }
  .panel-footer {
      background-color: white !important;
  }
  .panel-footer h3 {
      font-size: 32px;
  }
  .panel-footer h4 {
      color: #aaa;
      font-size: 14px;
  }
  .panel-footer .btn {
      margin: 15px 0;
      background-color: #f4511e;
      color: #fff;
  }
  .navbar {
      margin-bottom: 0;
      background-color: #0685e5; 
      z-index: 9999;
      border: 0;
      font-size: 12px !important;
      line-height: 1.42857143 !important;
      letter-spacing: 4px;
      border-radius: 0;
      font-family: Montserrat, sans-serif;
  }
  .navbar li a, .navbar .navbar-brand {
      color: #fff !important;
  }
  .navbar-nav li a:hover, .navbar-nav li.active a {
      color: #f4511e !important;
      background-color: #fff !important;
  }
  .navbar-default .navbar-toggle {
      border-color: transparent;
      color: #fff !important;
  }

  button.navbar-toggle{
    background-color: #fff !important;
  }

  footer .glyphicon {
      font-size: 20px;
      margin-bottom: 20px;
      color: #f4511e;
  }
  .slideanim {visibility:hidden;}

  .slide {
      animation-name: slide;
      -webkit-animation-name: slide;
      animation-duration: 1s;
      -webkit-animation-duration: 1s;
      visibility: visible;
  }
  @keyframes slide {
    0% {
      opacity: 0;
      transform: translateY(70%);
    } 
    100% {
      opacity: 1;
      transform: translateY(0%);
    }
  }
  @-webkit-keyframes slide {
    0% {
      opacity: 0;
      -webkit-transform: translateY(70%);
    } 
    100% {
      opacity: 1;
      -webkit-transform: translateY(0%);
    }
  }
  @media screen and (max-width: 768px) {
    .col-sm-4 {
      text-align: center;
      margin: 25px 0;
    }
    .btn-lg {
        width: 100%;
        margin-bottom: 35px;
    }
  }
  @media screen and (max-width: 480px) {
    .logo {
        font-size: 150px;
    }
  }
  .li{
    font-size: 11px;
  }
  .jumb{
    margin: 0 auto;
  }
  .portafoliotext{
    font-size: 13px;
  }
  .pad{
    padding: 4px;
  }
  li{
    font-size: 12px;
    padding: 5px;
  }
  .white{
   color: #FFFFFF;
  }
</style>
</head>
<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60" >

<!-- <div class="container">
<nav class="navbar navbar-default navbar-fixed-top">
  
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="index.php">Laboratorio SST</a>

    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
      
        <li><a href="#about">ABOUT</a></li>
        <li><a href="#services">SERVICES</a></li>
        <li><a href="#portfolio">PORTFOLIO</a></li>
        <li><a href="#pricing">PRICING</a></li>
        <li><a href="#contact">CONTACT</a></li>
        <li><a href="#" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-user"></span> Login</a>
        </li>
      </ul>

    </div>
  </nav>
</div> -->

<nav class="navbar navbar-expand-lg navbar-dark bg-primary">

  <a class="navbar-brand" href="#">LABORATORIO SST</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>


    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right"> 
        <li><a href="#about">ABOUT</a></li>
        <li><a href="#services">SERVICES</a></li>
        <li><a href="#portfolio">PORTFOLIO</a></li>
        <li><a href="#pricing">PRICING</a></li>
        <li><a href="#contact">CONTACT</a></li>
        <li>

        </li>
      </ul>
    </div>

    <span class="navbar-text">
      <a href="#" data-toggle="modal" data-target="#exampleModalCenter"><span class="fa fa-user"  aria-hidden="true"></span> Login</a>
    </span>
</nav>


<div class="jumbotron jumbotron-fluid" >

  <div id= "carouselExampleFade" class= "carousel slide carousel-fade" data-ride= "carousel" > 
    <div class= "carousel-inner" > 
      <div class= "carousel-item active" > 
        <!-- <img class= "d-block w-100" src= ".../800x400?auto=yes&bg=777&fg=555&text=First slide" alt= "First slide" >  -->
        <h3 class="text-center">Examenes Medico Ocupacional</h3>
      </div> 
      <div class= "carousel-item"> 
        <h3 class="text-center">Examenes de Audiometria</h3>
      </div>
      <div class= "carousel-item"> 
        <h3 class="text-center">Examenes de Visiometria</h3>
      </div> 
      <div class= "carousel-item"> 
        <h3 class="text-center">Examenes de Espirometria</h3>
      </div> 
      <div class= "carousel-item"> 
        <h3 class="text-center">Examenes de Psicologia</h3>
      </div>
      <div class= "carousel-item"> 
        <h3 class="text-center">Mediciones de Higiene Ambiental</h3>
      </div>
    </div> 
      <a class= "carousel-control-prev" href= "#carouselExampleFade" role= "button" data-slide= "prev" > 
        <span class= "carousel-control-prev-icon" aria-hidden= "true" ></span> 
        <span class= "sr-only"> Previous </span> 
      </a> 
      <a class= "carousel-control-next" href= "#carouselExampleFade" role= "button" data-slide= "next" > 
        <span class= "carousel-control-next-icon" aria-hidden= "true" ></span> 
        <span class= "sr-only"> Next </span> 
      </a> 
  </div> 
</div>

<!-- Container (About Section) -->
<div id="about" class="container-fluid">
  <div class="row">
    <div class="col-sm-7 col-xs-7">
      <h2>Acerca del Laboratorio</h2><br>
      <h4 class="text-justify ">
        El Centro Industrial y de Aviación – SENA Regional Atlántico, Considerando la política del plan Estratégico Institucional de promover procesos de innovación dentro del marco del servicio de la formación profesional integral, planteo un proyecto por Sennova, que responde a la necesidad de Laboratorio y un ambiente para practicas enfocadas en la prestación de servicios en medicina preventiva, higiene y seguridad industrial, que eleven los niveles tecnológicos de la formación de los aprendices en Salud Ocupacional.<br>
        La apropiación de modelos pedagógicos que desarrollen competencias profesionales referentes a conocimientos, habilidades y aptitudes por medio de la relación formación – servicio en el Laboratorio, bajo lineamientos de la formación en salud ocupacional, evaluara de forma permanente el desempeño de los aprendices con los usuarios del servicio.<br>
        En esencia, el Laboratorio de Seguridad y Salud en el Trabajo del Centro Industrial y de Aviación, es ser un referente a nivel nacional por desarrollar en los aprendices competencias y habilidades propias de una profesión en la medida que estudian con casos reales. Paralelamente a esto, acreditado mediante un proceso de mejora continua para agregar valor a las operaciones de la institución, lo cual permite tener un juicio objetivo de su desempeño, incrementando la percepción positiva de los entes empresariales y gubernamentales con respecto al SENA.
      </h4>
     <!--  <br><button class="btn btn-default btn-lg">Get in Touch</button> -->
    </div>
    <div class="col-sm-5">
      <br>
      <img src="images/LSST.jpg" class="img-responsive"> 
    </div>
  </div>
</div>

<div class="container-fluid bg-grey">
  <div class="row">
<!--<div class="col-sm-4">
      <span class="glyphicon glyphicon-globe logo slideanim"></span>
    </div> -->
    <div class="col-sm-12">
      <h2>Nuestros Valores</h2>
      <h4 class="text-justify"><strong>MISSION:</strong> Our mission lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</h4>

      <h4 class="text-justify"><strong>VISION:</strong> Our vision Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</h4>
        <h4 class="text-justify"><strong>FORMACION:</strong> El Laboratorio de Seguridad y Salud en el Trabajo del SENA – Centro Industrial y de Aviación es un ambiente de apoyo tecnológico enfocado en la prestación de servicios, que fortalece aspectos cognitivos a través del aprendizaje por observación directa de forma experiencial y la investigación, para elevar los niveles tecnológicos de la formación de los aprendices del Programa de Salud Ocupacional.<br> 
        Complementar los Conocimientos de Prevención  y monitoreo del riesgo, proporciona en los aprendices técnicas y herramientas confiables para desarrollar Sistemas de Gestión en Seguridad y Salud en el Trabajo en las empresas, con soluciones inmediatas en la prevención de accidentes y enfermedades laborales reflejando un equilibrio entre la productividad y calidad de vida de los trabajadores.<br>
        Así entonces, los servicios tecnológicos del laboratorio empleados como una estrategia didáctica permiten establecer una relación directa entre los conceptos teóricos y la práctica, además de lograr que el aprendiz desarrolle habilidades y destrezas que contribuirán en su proceso de formación. Las prácticas de laboratorio se convierten en esa herramienta que potencializa el aprendizaje en Medicina Preventiva, Higiene y Seguridad Industrial de los Tecnólogos del programa de Salud Ocupacional.
      </h4><br>
    </div>
  </div>
</div>

<!-- Container (Services Section) -->
<div id="services" class="container-fluid">
  <h2 class="text-center">SERVICIOS TECNOLOGICOS</h2>
  <h4 class="text-center">Lo que ofrecemos</h4>
  <br>
  <div class="row slideanim">
    <div class="col-sm-3">
      <div class="panel panel-default thumb">
        <div class="panel-body expandable">
          <div class="text-center"><span class="fa fa-heart logo-small"></span></div>
          <h4 class="text-center">Medicina Preventiva Y Del Trabajo</h4>
          <p class="portafoliotext">
            • Examen Medico Laboral: Ingreso y Egreso<br>
            • Audiometria Laboral<br>
            • Espirometria Laboral<br>
            • Visiometria Laboral<br>
            <!-- • Optometria Laboral<br> -->
            • Programas de Vigilancia Epidemiologica:
            Diseño, Implementacion y Seguimiento.
          </p>
        </div>
      </div>
    </div>

    <div class="col-sm-3">
      <div class="panel panel-default thumb">
        <div class="panel-body expandable">
          <div class="text-center"><span class="fa fa-lock logo-small"></span></div>
          <h4 class="text-center">Seguridad Industrial</h4>
          <P class="portafoliotext">
            • Matriz de identificacion de los peligros y valoraciones de riesgos.<br>
            • Investigacion de accidentes de trabajo<br>
            • Inspecciones Planeadas<br>
            • Programas de Orden y aseo en la empresa<br>
            • Matriz de Elementos de Proteccion Personal:<br>
              Uso y Seleccion<br>
            • Diseño y analisis de los puestos de trabajo<br>
            • Diseño e implementacion de planes de emergencia<br>
            • Elaboracion de procedimientos de trabajo seguro.<br>
            • Asesorias en tareas de alto riesgo.
          </P>
        </div> 
      </div>
    </div> 

    <div class="col-sm-3">
      <div class="panel panel-default thumb">
        <div class="panel-body">
          <div class="text-center"><span class="fa fa-leaf logo-small"></span></div>
          <h4 class="text-center">Higiene Industrial</h4>
          <p class="portafoliotext">
            • Sonometria<br>
            • Dosimetria de ruido<br>
            • Mediciones de iluminacion<br>
            • Mediciones de temperatura-Stress termico<br>
            • Estudio del nivel de vibraciones: control de procesos, vigilancia de la salud de trabajadores expuestos.
          </p>
        </div>  
      </div>
    </div>

    <div class="col-sm-3">
      <div class="panel panel-default thumb">
        <div class="panel-body" style="margin-bottom: 63px;">
          <div class="text-center"><span class="fa fa-wrench logo-small"></span></div>
          <h4 class="text-center">Asesoria y Asistencia Tecnica para el Desarrollo e Implementacion del SG-SST</h4>
          <h2 class="text-center">PSICOLOGIA LABORAL</h2>
          <p class="portafoliotext">
            • Sistema de vigilancia epidemiologico en riesgo psicosocial
          <p>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Container (Portfolio Section) -->
<div class="col-sm-12 text-center bg-grey"><br>
  <h2>Portfolio</h2>
  <h4>Lo que hemos creado</h4>
  <div class="row text-center slideanim pad">

    <div class="col-sm-4">
      <div class="panel panel-default">
        <div class="panel-body">
          <div class="thumbnail expandable" >
            <p><strong>Medicina Preventiva y del Trabajo</strong></p>
            <img src="images/mpreventiva.jpg" alt="Medicina Preventiva" class="img-thumbnail im img-responsive">    
              <p class="text-justify portafoliotext">
                A través de esta área se busca asesorar en la prevención y promoción de la salud de los trabajadores fomentando sus condiciones y estilos de vida saludable.<br>
                <strong>Evaluaciones Medico Laborales:</strong> Ingreso, Periódicos, Egreso, Post-Incapacidad, Valoraciones y Conceptos Medico Laborales. <br>
                • Valoraciones Paraclínicos de: Audiometría, Espirometria, Visiometria, Optometría, Electrocardiograma, Imágenes Diagnosticas, entre otras.  <br>
                • Diseño y monitoreo a los sistemas de Vigilancia Epidemiológica de acuerdo a los riesgos a los cuales se encuentren expuestos los trabajadores. <br>
                • Asesoría en el registro estadísticos de morbi-mortalidad general (Enfermedad común) y especifica por riesgos (Enfermedad Laboral).<br>
                • Elaboración y diseño de los Profesiogramas (Protocolos de evaluación médica ocupacional de acuerdo al cargo y complementados con la Matriz de Peligro de la empresa).<br>
                • Diseño y ejecución de campañas educativas.<br>
                • Elaboración de Diagnósticos de Salud.
              </p>
          </div>
        </div>
      </div>
    </div>

    <div class="col-sm-4">
      <div class="panel panel-default">
        <div class="panel-body">
          <div class="thumbnail thumb1" >
            <p><strong>Examen Médico Laboral</strong></p>
            <img src="images/medico.jpg" alt="Medicina Preventiva" class="img-thumbnail im">        
            <div class="portafoliotext text-justify">
             Su objetivo es determinar el estado de salud de un individuo en correlación directa con su actividad laboral, con el  fin de establecer medidas de prevención, manejo, seguimiento y control.<br><br><br>  
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-sm-4">
      <div class="panel panel-default">
        <div class="panel-body" style="margin-bottom:  7px;">    
          <div class="thumbnail expandable">
            <p><strong>Audiometría Laboral</strong></p>
            <img src="images/audiometria.jpg" alt="Medicina Preventiva" class="img-thumbnail im">        
            <p class="text-justify portafoliotext ">
              Tamizaje auditivo que evaluá la capacidad de una persona para escuchar sonidos, definiendo el umbral mínimo de percepción en decibeles (db) en distintas tonalidades. Los sonidos varían de acuerdo con la intensidad (volumen o fuerza) y con el  tono (la velocidad de vibración de las ondas sonoras), de ahí la importancia de la evaluación tamiz en todas las características del sonido.<br>
              • Vía aérea. Se evalúa la capacidad para oír sonidos transmitidos a través del aire. Se usan auriculares especiales para presentar los sonidos.<br>
              • Vía ósea. Evaluá la capacidad para oír el sonido que se transmite a través de los huesos detrás de cada oído, usando un aditamento especial que transmite Vibraciones.<br>
            </p> 
          </div>
        </div>
      </div>
    </div>
</div><br>

<div class="row text-center slideanim">

  <div class="col-sm-4">
    <div class="panel panel-default">
      <div class="panel-body"  style="margin-bottom:  2px;">
        <div class="thumbnail expandable">
          <p><strong>Visiometria Laboral</strong></p>
          <img src="images/visiometria.jpg" alt="Medicina Preventiva" class="img-thumbnail im">        
          <p class="text-justify portafoliotext">
            La Visiometria es una prueba utilizada para valorar la capacidad visual del individuo, que incluye tanto la visión a distancia como de cerca, percepción de los colores, profundidad y balance muscular básico; permitiendo clasificar la severidad de los defectos ópticos e identificando a quienes requieren exámenes complementarios con mayor prontitud.  
          </p>
        </div>
      </div>
    </div>
  </div>

  <div class="col-sm-4">
    <div class="panel panel-default">
      <div class="panel-body">
        <div class="thumbnail expandable">
          <p><strong>Espirometria Laboral</strong></p>
          <img src="images/espirometria.jpg" alt="Medicina Preventiva" class="img-thumbnail im">        
          <p class="text-justify portafoliotext">
            Es un examen paraclínico que determina alteraciones en vías aéreas superiores e inferiores, de gran importancia para el diagnóstico temprano de enfermedades de este sistema, así como para su seguimiento y control.<br> 
            El objetivo es evaluar la función pulmonar para detectar precozmente alteraciones a este nivel, con el fin de tomar las medidas necesarias en la prevención y control de las enfermedades bronco pulmonares laborales o evitar el agravamiento de las mismas.
          </p>
        </div>
      </div>
    </div>
  </div>

<!--     <div class="col-sm-4">
      <div class="panel panel-default">
        <div class="panel-body">
          <div class="thumbnail thumb2">
            <p><strong>Optometría Laboral </strong></p>
            <img src="images/optometria.jpg" alt="Medicina Preventiva" class="img-thumbnail im">        
            <p class="text-justify">
              El examen optométrico es la evaluación visual refractiva y del estado ocular del individuo como trabajador, teniendo en cuenta los requerimientos  visuales exigidos por la tarea que desempeñe y los riesgos ocupacionales a los que está expuesto.<br>
              El objetivo principal es determinar si el estado visual refractivo del trabajador es óptimo y está acorde con los requerimientos visuales del puesto de trabajo para dar un diagnóstico preciso y oportuno de la condición visual del trabajador e indicar una conducta apropiada a seguir en cada caso.
            </p>
          </div>
        </div>
      </div>
    </div> -->

    <div class="col-sm-4">
      <div class="panel panel-default">
        <div class="panel-body">
          <div class="thumbnail expandable">
            <p><strong>Seguridad Industrial</strong></p>
            <img src="images/seguridad_industrial.jpg" alt="Medicina Preventiva" class="img-thumbnail im">
            <p class="text-justify portafoliotext">
              Seguridad Industrial busca prevenir, identificar, evaluar y controlar los factores de riesgo ocupacional mediante la aplicación de normas nacionales como internacionales, que contribuyan al mejoramiento del medio ambiente de trabajo e impacten en el indicador de accidentalidad laboral.<br>
              • Matriz de identificación de los peligros y valoración de riesgos.<br>
              • Investigación de accidentes de trabajo.<br> 
              • Inspecciones planeadas.<br>
              • Matriz de Elementos de Protección Personal – Uso y selección.<br> 
              • Programas de orden y aseo en la empresa.<br>
              • Diseño y análisis de los puestos de trabajo.<br>
              • Diseño e implementación de planes de emergencia.<br>
              • Elaboración procedimientos de trabajo seguros.<br>
              • Asesorías en tareas de alto riesgo. 
            </p>
          </div>
        </div>
      </div>
    </div>
</div><br>

<div class="row text-center slideanim">
  
  <div class="col-sm-4">
    <div class="panel panel-default">
      <div class="panel-body" style="margin-bottom: 75px;">
        <div class="thumbnail expandable">
          <p><strong>Higiene Industrial</strong></p>
          <img src="images/higiene_industrial.jpg" alt="Medicina Preventiva" class="img-thumbnail im">
          <p class="text-justify portafoliotext">
            Tiene su fundamento en la previsión, reconocimiento, evaluación y control de los riesgos que se dan en el lugar de trabajo y que puedan afectar desfavorablemente la salud, el bienestar y la eficiencia de los trabajadores.<br>
            En desarrollo de esta área, realizamos los siguientes estudios: <br>
            <strong class="text-center">FISICOS:</strong><br>
            • Sonometrías<br>
            • Dosimetrías de Ruido<br>
            • Mediciones de Iluminación<br>
            • Mediciones de Temperatura – Stress Térmico<br>
            • Estudio del nivel de vibraciones: control de procesos, vigilancia de la salud de los trabajadores expuestos.<br>
            <strong class="text-center">QUIMICOS:</strong><br>
            • Evaluación de Contaminantes químicos: gases, vapores.<br>
            • Monitores de gases.
          </p>
        </div>
      </div>
    </div>
  </div>

  <div class="col-sm-4">
    <div class="panel panel-default">
      <div class="panel-body" >
        <div class="thumbnail expandable">
          <p><strong>Asesoría y Asistencia Técnica para la Implementación y Desarrollo del SG-SST (Sistema de Gestión en Seguridad y Salud en el Trabajo)</strong></p>
          <img src="images/sgsst.jpg" alt="Medicina Preventiva" class="img-thumbnail im">
          <p class="text-justify portafoliotext">
            • Gestión Empresarial de Seguridad y Salud en el Trabajo.<br>
            • Actualización y Matriz Legal en  Seguridad y Salud en el Trabajo.<br>
            • Identificación de Peligros y Evaluación de Riesgos – Matriz de Riesgos.<br>
            • Asesoría COPASST.<br>
            • Capacitaciones en Seguridad y Salud en el Trabajo.<br>
            • Asesoría para la implementación del Sistema de Gestión en Salud y Seguridad (Decreto 1072 de 2015 y OHSAS 18001:2007).<br>
            • Diseño, conformación y elaboración de planes de Emergencia.<br>
            • Diseño Análisis de Puestos de Trabajo.<br>
            • Investigación, análisis de accidentes de trabajo y medidas de control.<br>
            • Diagnóstico de Riesgo Psicosocial.
          </p>
        </div>
      </div>
    </div>
  </div>

  <div class="col-sm-4">
    <div class="panel panel-default">
      <div class="panel-body" style="margin-bottom: 10px;">
        <div class="thumbnail expandable">
          <p><strong>Psicología Laboral</strong></p>
          <img src="images/psicologia.jpg" alt="Medicina Preventiva" class="img-thumbnail im">
          <p class="text-justify text-center">
            Generar acciones que controlen los factores de riesgos psicosocial para mantener un ambiente laboral adecuado y un trabajador sano. <br>
            • Examen de ingreso.<br>
            • Identificación, evaluación, prevención, intervención y monitoreo de los factores de riesgo psicosociales, como los factores protectores presentes en los trabajadores.<br>
            • Sistemas de vigilancia epidemiológica en riesgo psicosocial.<br>
            • Programas de promoción y prevención en salud mental para empresas.<br>
            • Talleres de promoción y prevención en salud mental para empresas.<br>
            • Talleres de promoción y prevención.<br>
            • Programa de capacitación para comités de convivencia y lideres.<br>
            • Análisis psicosocial de puestos de trabajo.   
            </p>
        </div>
      </div>
    </div>
  </div>
</div>
  
</div>
<!-- Container (Contact Section) -->
<div id="contact" class="container-fluid bg-grey">
  <h2 class="text-center">CONTACT</h2>
  <div class="row">
    <div class="col-sm-5 portafoliotext">
      Póngase en contacto con nosotros y nos pondremos en contacto con usted dentro de las 24 horas.<br>
      Servicio Nacional de Aprendizaje - Sena<br>
      Regional Atlantico<br>
      Centro Industrial y de Aviación<br>
      <span class="glyphicon glyphicon-map-marker"></span>Calle 30 No. 3E - 164, Barranquilla<br>
      <span class="glyphicon glyphicon-phone"></span> +57 (5) 3344863 EXT. 52223<br>
      <span class="glyphicon glyphicon-envelope"></span> ejemplo@something.com<br>
      • Linea gratuita de atención al ciudadano:<br>
      <span class="glyphicon glyphicon-phone"></span>Bogotá D.C. 592 5555<br>
      <span class="glyphicon glyphicon-phone"></span>Resto del país: 018000 910 270<br>
    </div>
    <div class="col-sm-7 slideanim">
      <div class="row">
        <div class="col-sm-6 form-group">
          <input class="form-control" id="name" name="name" placeholder="Name" type="text" required>
        </div>
        <div class="col-sm-6 form-group">
          <input class="form-control" id="email" name="email" placeholder="Email" type="email" required>
        </div>
      </div>
      <textarea class="form-control" id="comments" name="comments" placeholder="Comment" rows="5"></textarea><br>
      <div class="row">
        <div class="col-sm-12 form-group">
          <button class="btn btn-default pull-right" type="submit">Send</button>
        </div>
      </div>
    </div>
  </div>
</div>

<footer class="text-center">
  <div class="form-horizontal"><br>
    <div class="col-sm-4 ">
      <img src="images/LSST.jpg" style="height: 130px; width: 250px;" class="img-responsive">
    </div>
    <div class="col-sm-4 ">
      <a href="#myPage" title="To Top">
        <span class="glyphicon glyphicon-chevron-up"></span>
      </a>
      <p>LSST <a href="index.php" >ARL</a></p>
    </div>  
    <div class="col-sm-4 ">
      <img src="images/gisennova.png" style="height: 110px;" class="img-responsive"> 
    </div>
  </div><br>
</footer>


<script type="text/javascript" src="jvalidation/dist/jquery.validate.js"></script>

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Usuario Inicio de sesion</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" action="login.php" method="POST" id="formulario" name="form">
          <div class="form-group">
            <label class="control-label" for="email">
              <span class="fa fa-list"> Area:</span>
            </label>
            <div class="col-sm-12">
              <select name="tiporol" id="tiporol" class="form-control ">
                <option value="">Seleccionar</option>
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
          <div class="form-group">
            <label class="control-label" for="user">
              <span class="fa fa-user"> Usuario:</span>
            </label>
            <div class="col-sm-12">
              <input type="text" class="form-control" id="user" placeholder="Enter user" name="user">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label" for="password">
              <span class="fa fa-lock"> Password:</span>
            </label>
            <div class="col-sm-12"> 
              <div class="input-group">
                <input type="password" class="form-control" id="password" placeholder="Enter password" name="password">        
                <span class="input-group-addon">
                  <i class="fa fa-eye-open" id="mostrar_contrasena" title="clic para mostrar contraseña" href="#"></i>
                </span>
              </div>
              <label for="password" generated="true" class="error"></label> 
            </div>
          </div>
          <div class="text-center">
            <button type="submit" class="btn btn-success btn-sm" id="btn">Ingresar</button>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<script>
  $(document).ready(function(){
    // Add smooth scrolling to all links in navbar + footer link
    $(".navbar a, footer a[href='#myPage']").on('click', function(event) {
      // Make sure this.hash has a value before overriding default behavior
      if (this.hash !== "") {
        // Prevent default anchor click behavior
        event.preventDefault();
        // Store hash
        var hash = this.hash;
        // Using jQuery's animate() method to add smooth page scroll
        // The optional number (900) specifies the number of milliseconds it takes to scroll to the specified area
        $('html, body').animate({
          scrollTop: $(hash).offset().top
        }, 900, function(){
          // Add hash (#) to URL when done scrolling (default click behavior)
          window.location.hash = hash;
        });
      } // End if
    });
    
    $(window).scroll(function() {
      $(".slideanim").each(function(){
        var pos = $(this).offset().top;

        var winTop = $(window).scrollTop();
          if (pos < winTop + 600) {
            $(this).addClass("slide");
          }
      });
    });
  })

  $('input#user').keydown(function(e) { if (e.keyCode == 32) { return false; } });//usuario

  $(document).ready(function(){
    $('#mostrar_contrasena').mousedown(function(){
      $('#password').attr("type","text");

    }).mouseup(function(){
      $('#password').attr("type","password");            
    });

    $('div.expandable p').expander({
      slicePoint: 157,
      expandText: '<br>leer mas...',
      collapseTimer: 5000,
      userCollapseText: 'leer menos...'
    });
  });

  $(function(){
    /* Capturar el click del botón */
    $("#btn").on("click", function(){
      /* Validar el formulario */
      $("#formulario").validate({
        rules:{ /* Accedemos a los campos a través de su nombre: email, nombre, edad */
          tiporol: {required: true},
          user: {required: true, minlength: 4, maxlength: 20},
          password: {required: true, minlength: 8, maxlength: 15}//equalTo: "#contrasena2"
        },
        messages:{ /* Accedemos a los campos a través de su nombre: email, nombre, edad */
          tiporol: {required: 'Seleccione su rol'},
          user: {required: 'Ingrese su usuario', minlength: 'El mínimo permitido son 4 caracteres', maxlength: 'El máximo permitido son 20 caracteres'},
          password: {required:'Ingrese su contraseña', minlength: 'El mínimo permitido son 8 caracteres', maxlength: 'El máximo permitido son 15 caracteres'},
        },
      });
    });
  });
</script>


</body>

</html>