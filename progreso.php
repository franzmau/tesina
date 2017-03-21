<?php 
include('session_a.php');
include('progresoc.php');

$id_a=$_GET["id"];

	 if($id_a!=$user_check){
	 	 header("location: alumno.php");
	 	}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <title>Mi progreso</title>
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
			})		
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
                       <li><img src="images/gallery-big-1.jpg" alt=""></li>
                        <li><img src="images/gallery-big-2.jpg" alt=""></li>
                        <li><img src="images/gallery-big-3.jpg" alt=""></li>
                        <li><img src="images/gallery-big-4.jpg" alt=""></li>
                        <li><img src="images/gallery-big-5.jpg" alt=""></li>
                        <li><img src="images/gallery-big-6.jpg" alt=""></li>
                        <li><img src="images/gallery-big-7.jpg" alt=""></li>
                        <li><img src="images/gallery-big-8.jpg" alt=""></li>
                    </ul>
                </div>	
                <a href="#" class="prev"></a><a href="#" class="next"></a>
            </div>
             <ul class="menu">
                <li ><a href="alumno.php" class="clr-1">Inicio</a></li>
                  <li><a href="" class="clr-3">   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a></li>
                <li class="current"><a href=<?php echo "progreso.php?id=".$user_check ;?> class="clr-2">Mi progreso </a></li>
                  
                <li><a href="progreso.php" class="clr-4"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </a></li> 
                <li><a href="logout.php" class="clr-5">Salir</a></li>
            </ul>
         </nav>
    </header>   

     <section id="content"><div class="ic"></div>
        <div class="container_12">  
          <div class="grid_4 bot-1">
            <h2 class="top-6 p2">Tus pruebas realizadas.</h2>
      <p class="text-1">
      Aquí encontrarás todas las pruebas que has realizado en mi sistemas.   </p>
      
            <p class="text-1">
     Las podrás ver cuantas veces quieras. </p>
          </div>
          <div class="grid_8">
            <div class="block-1 top-5">
              <div class="block-1-shadow">
                  <h2 class="clr-6 p4">Pruebas Contestadas</h2>
                    <div class="pag">

                    <table class="table">

                     <thead>
                     <tr>
                        	<th hidden>id</th>
                            <th>Nombre</th>
                            
                            <th class="last">Ver Respuestas</th>
                            
                        </tr>
                        </thead>
                      <?php
                      llenarlo($_SESSION['id_salon'],$_SESSION['pid']);
                      ?> 
                      </table>
                    </div>
                </div>
            </div>
            <!--==============================footer=================================-->
           
          </div>
          <div class="clear"></div>
        </div>
    </section> </div></body></html>