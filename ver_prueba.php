<?php 
include('session_a.php');
$id_c=$_GET["id"];
checar($id_c,$user_check);
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <title>Prueba</title>
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
        <h1><img src="images/logo.png" alt=""></h1>
     
    </header>   
 <br>
     <section id="content"><div class="ic"></div>
        <div class="container_12">  
           <div class="grid_2 bot-1"> </div>
          <div class="grid_8">
            <div  style="align-self: center;"class="block-1 top-5">
              <div class="block-1-shadow">
                  <h2 class="clr-6 p4"> Pruebas contestadas</h2>
                    <div class="pag">
                    <form class="form" method="post"  action="calificar.php">
                     
                      <?php
                      //llenar($_SESSION['id_salon'],$_SESSION['pid'],$id_examen);
                      ?>

                    
 <br><br>
                <div class="clear"></div>
                      <div class="pad-2">
                        <input class="link-2" name="ex" type="submit" value="Terminar Prueba">
                     </form>
                      </div>
                    </div>
                </div>
            </div>
            <!--==============================footer=================================-->
           
          </div>
          <div class="grid_2 bot-1"> </div>
         
          <div class="clear"></div>
        </div>
    </section>  <br><br> <br><br> <br><br> <br><br> <br><br>
    </div></body></html>