<?php 
include('session.php');
include('examen_c.php');
$id_examen=$_GET["examen"];
ini_set('display_startup_errors', 1);
ini_set('display_errors', 1);
error_reporting(-1);

?>

<head>
    <title>Examen</title>
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

    var max_fields      = 10; //maximum input boxes allowed
    var wrapper         = $(".input_fields_wrap"); //Fields wrapper
    var add_button      = $(".add_field_button"); //Add button ID
    
    var x = 1; //initlal text box count
    $(add_button).click(function(e){ //on add input button click
        e.preventDefault();
        if(x < max_fields){ //max input box allowed
            x++; //text box increment
            $(wrapper).append('<div> <br><br> <label> <strong>Pregunta:&nbsp;&nbsp;&nbsp;&nbsp; </strong> </label> <textarea style="border:#e0e0e1 1px solid; background:#fff; font-size:14px; font-family: Georgia, "Times New Roman", Times, serif; color:#000;padding:3px 10px 5px 10px;outline: medium none;width: 547px; height:17px; float:left; box-shadow: 0 0 3px #c1c1c1; margin: 7px 0 0px 0px; width:560px;" name="mytext[]" cols="40" rows="5"></textarea> <br> <label> <strong> Respuesta:&nbsp;&nbsp;</strong> </label><input style="border:#e0e0e1 1px solid; background:#fff; font-size:14px; font-family: Georgia, "Times New Roman", Times, serif; color:#000;padding:3px 10px 5px 10px;outline: medium none;width: 247px; height:17px; float:left; box-shadow: 0 0 3px #c1c1c1; margin: 7px 0 0px 0px; width:560px;" type="text" name="mytext1[]"> <br> <label> <strong>Ayuda :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </strong> </label> <textarea style="border:#e0e0e1 1px solid; background:#fff; font-size:14px; font-family: Georgia, "Times New Roman", Times, serif; color:#000;padding:3px 10px 5px 10px;outline: medium none;width: 547px; height:17px; float:left; box-shadow: 0 0 3px #c1c1c1; margin: 7px 0 0px 0px; width:560px;" name="mytext2[]" cols="40" rows="5" ></textarea> <a href="#" class="remove_field">Quitar</a> <br></div>')



            ; //add input box
        }
    });
    
    $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
        e.preventDefault(); $(this).parent('div').remove(); x--;
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
                        
                        <li><img src="images/slider-2.jpg" alt="" /></li>
                        <li><img src="images/slider-3.jpg" alt="" /></li>
                        <li><img src="images/slider-1.jpg" alt="" /></li>
                    </ul>
                </div>	
                <a href="#" class="prev"></a><a href="#" class="next"></a>
            </div>
             <ul class="menu">
                <li ><a href="prof.php" class="clr-1">Inicio</a></li>
                  <li><a href="evaluar.php" class="clr-3">  </a></li>
                <li class="current"><a href="examen.php" class="clr-2">Examen</a></li>
                  <li><a href="evaluar.php" class="clr-4">Rendimiento</a></li>
                <li><a href="logout.php" class="clr-5"> Salir</a></li> 
               
            </ul>
         </nav>
    </header>   

    <section id="content"><div class="ic"></div>
        <div class="container_12">	
          <div class="grid_4 bot-1">
            <h2 class="top-6 p2">Editar tu examen.</h2>
            <p class="text-1">
			 A tu derecha podrá editar un examen. Deberas tomar en cuenta:  </p>
			<ul class="list-1">
            	<li>Solo se puede actualizar un examen a la vez.</li>
                <li>Se borrarán todas las preguntas que se hayan realizado a este examen.  </li>
                <li>No se puede cambiar de grupo el examen.  </li>    
            </ul>





           
          </div>
          <div class="grid_8">
            <div class="block-1 top-5">
            	<div class="block-1-shadow">
                	<h2 class="clr-6 p4">Examen </h2>
                   <div class="pag">
                  <form method="post"  action="subir_examen.php">
                   <input type= 'hidden' name='id_ex' value= <?php echo $id_examen;?>> </input>
                   <label style="float:left; display:inline-block; padding-top:3px; width:82px; color:#000; line-height:20px;" ><strong>Nombre:</strong><br>
                   <input style="border:#e0e0e1 1px solid; background:#fff; font-size:14px; font-family: Georgia, 'Times New Roman', Times, serif; color:#000;padding:3px 10px 5px 10px;outline: medium none;width: 247px; height:17px; float:left; box-shadow: 0 0 3px #c1c1c1;" type="text"  name="nombre" value=
                   <?php poner_nombre($id_examen); ?>  > <strong class="clear"></strong></label><br><br>



                   <div class="input_fields_wrap">
                   
                   <br>
                     
                      <br><br>
                      <div>
                      <label> <strong>Pregunta:&nbsp;&nbsp;&nbsp;&nbsp; </strong> </label>

                      <?php 
                      poner_tabla($id_examen);

                      ?>

                      
                  </div><br>

                   <button  class="add_field_button link">Agregar pregunta</button>


                  <br>
                  <br>
                   <label> <strong> Salón: </strong> </label>
                    <label><strong>
                   <?php
                  poner_salo($id_examen);
                 
                   ?> </strong></label>
                  <br><br>

                   <input class="link-2" type="submit" name="ex" onclick='return confirm("¿Deseas subir el examen ahora? ")' value="Subir examen">



                  </form>
                      </div>
            <!--==============================footer=================================-->
           <br>
          </div>
          <div class="clear"></div>
        </div>
        <br><br><br>
    </section> 