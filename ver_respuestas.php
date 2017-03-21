<?php 
include('session.php');
include("ver_respuestasc.php");
$id_e=$_GET["examen"];

?>

<head>
    <title>Ver Respuestas</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" media="screen" href="css/reset.css">
    <link rel="stylesheet" type="text/css" media="screen" href="css/style.css">
    <link rel="stylesheet" type="text/css" media="screen" href="css/grid_12.css">
    <link rel="stylesheet" type="text/css" media="screen" href="css/slider.css">
    <link href='http://fonts.googleapis.com/css?family=Cabin+Sketch:400,700' rel='stylesheet' type='text/css'>
    <script src="js/jquery-1.7.min.js"></script>
    <script src="js/jquery.easing.1.3.js"></script>
    <script src="js/tms-0.4.1.js"></script>
    <script>
		$(document).ready(function(){				   	
			$('.slider')._TMS({
				show:0,
				pauseOnHover:true,
				prevBu:'.prev',
				nextBu:'.next',
				playBu:false,
				duration:800,
				preset:'fade',
				pagination:true,
				pagNums:false,
				slideshow:7000,
				numStatus:false,
				banners:false,
				waitBannerAnimation:false,
				progressBar:false
			});





		






		});




		








	</script>
	<!--[if lt IE 8]>
       <div style=' clear: both; text-align:center; position: relative;'>
         <a href="http://windows.microsoft.com/en-US/internet-explorer/products/ie/home?ocid=ie6_countdown_bannercode">
           <img src="http://storage.ie6countdown.com/assets/100/images/banners/warning_bar_0000_us.jpg" border="0" height="42" width="820" alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today." />
        </a>
      </div>
    <![endif]-->
    <!--[if lt IE 9]>
   		<script type="text/javascript" src="js/html5.js"></script>
    	<link rel="stylesheet" type="text/css" media="screen" href="css/ie.css">
	<![endif]-->
</head>
<body>
  <div class="main">
  <!--==============================header=================================-->
    <header>
        <h1><a href="index.html"><img src="images/logo.png" alt=""></a></h1>
        <nav>  
            <div id="slide">		
                <div class="slider">
                    <ul class="items">
                         <li><img src="images/slider-1.jpg" alt="" /></li>
                       <li><img src="images/slider-3.jpg" alt="" /></li>
                        <li><img src="images/slider-2.jpg" alt="" /></li>
                        
                       
                    </ul>
                </div>	
                <a href="#" class="prev"></a><a href="#" class="next"></a>
            </div>
             <ul class="menu">
                <li class="current"><a href="prof.php" class="clr-1">Inicio</a></li>
                  
                <li><a href="examen.php" class="clr-2"> Examen</a></li>
                  <li><a href="evaluar.php" class="clr-4">Rendimiento</a></li>
                <li><a href="logout.php" class="clr-5"> Salir</a></li> 
               
            </ul>
         </nav>
    </header>   

    <section id="content"><div class="ic"></div>
        <div class="container_12">	
          <div class="grid_4 bot-1">
            <h2 class="top-6 p2"> Utilizar el sistema.</h2>
            <p class="text-1">
			 A tu derecha tienes los exámenes que tienes activados. Para cada uno puedes: </p>
			<ul class="list-1">
            	<li>Modificar las preguntas.</li>
                <li>Observar las respuestas de tus alumnos.  </li>
                <li>Borrar el examen. </li>
                
            </ul>





            <p class="text-1">
				En la barra superior puedes crear un nuevo examen y  observar el rendimiento de cada alumno y muestra el tipo de retroalimentación que recibió. </p>
          </div>
          <div class="grid_8">
            <div class="block-1 top-5">
            	<div class="block-1-shadow">
                	<h2 class="clr-6 p4">Alumnos <?php poner_examen($id_e);?></h2>
                    <div class="pag">
                     <table class="table">

                     <thead>
                     <tr>
                        	<th hidden>id</th>
                            <th>Alumno</th>
                            <th>Calificación</th>
                            <th >Tipo de evaluación</th>
                             <th class="last">Tiempo en responder</th>
                            
                        </tr>
                        </thead>
                        <?php 
                        llenar($id_e);

                        ?>
                     </table>
            </div>
            <!--==============================footer=================================-->
           
          </div>
          <div class="clear"></div>
        </div>
    </section> 