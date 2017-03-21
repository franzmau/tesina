<?php

function checar($id_e, $id_a ){
 $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
      mysqli_query($db,"SET NAMES 'utf8'");
	$sql="select * from calificacion where id_alumno = ".$id_a." and id_examen= ".$id_e;

	$result = mysqli_query($db,$sql);
	
	 $count = mysqli_num_rows($result);

	 if($count==0){
	 	 echo "<script> location.href='alumno.php';</script>";

	 	}
}

function num($id_alumno,$id_examen){

$db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
 mysqli_query($db,"SET NAMES 'utf8'");
   $sa="select * from calificacion where id_alumno = ".$id_alumno." and id_examen = ".$id_examen;

   $ses_sql=mysqli_query($db,$sa);
  $row1 = mysqli_fetch_array($ses_sql);
  $cal=$row1["calificacion"];

	echo "<br><br><br><br><br><label style=font-size:300px; line-height:50px; color:#fff; font-weight:bold; font-family: 'Cabin Sketch', cursive; letter-spacing:-1px; > <center> ". $cal. " </center></label><br><br><br>" ;

}

function print_f($id_alumno,$a,$id_examen){
$db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
 mysqli_query($db,"SET NAMES 'utf8'");
$sql="Select id from preguntas where id_examen =".$id_examen." and id_area=".$a;
 
  $ses_sql=mysqli_query($db,$sql);
  $count= mysqli_num_rows($ses_sql);
  $malas=0;
  $buenas=0;

  
  while($row1 = mysqli_fetch_array($ses_sql)){ 
  	$sql="Select id from equivocacion where id_alumno =".$id_alumno." and id_pregunta=".$row1["id"];
  	
  	 $ses_sql1=mysqli_query($db,$sql);
  	 $coun=mysqli_num_rows($ses_sql1);
  	 if($coun==0){
  	 	$buenas=$buenas+1;
  	 }else{
  	 	$malas=$malas+1;
  	 }
  }
 

  $sa="select area from area where id = ".$a;
 $ses_sql=mysqli_query($db,$sa);
 $row1 = mysqli_fetch_array($ses_sql);
 


 echo '<label style="text-align:center;  padding-top:3px; width:82px; color:#000; line-height:20px; font-size:22px;">'.$row1["area"].'</label>';

$val;
 if($malas==0){
    $val="054c80";
 }else if($buenas==0){
 	$val="d02114";
 }else if($buenas>$malas){
	$val="137ccf";
 }else if($malas>$buenas){
$val="8bd9fe";
 }else if($malas==$buenas){
 $val="1eb3fd";
 }

	echo '<br><br>
       <div class="input-color" style="text-align:center;">
            <div style="  width: 20px;
    height: 20px;
    display: inline-block;
    background-color: #ccc;
    
    left: 5px;
    top: 5px; background-color: #'.$val.';"> </div> <br></div>
   ';




}

function khan($id_alumno,$id_examen){
 $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
 mysqli_query($db,"SET NAMES 'utf8'");
 $sa="select DISTINCT id_area from preguntas where id_examen = ".$id_examen;

 $ses_sql=mysqli_query($db,$sa);
 $i=0;
  while($row1 = mysqli_fetch_array($ses_sql)){ 
  	if($i==0){
  		$a=$row1["id_area"];
  	}if($i==1){
  		$b=$row1["id_area"];
  	}if($i==2){
  		$c=$row1["id_area"];
  	}
  	$i=$i+1;
  }
echo "<div style='text-align:center;'>";

  print_f($id_alumno,$a,$id_examen);
  
  print_f($id_alumno,$b,$id_examen);
  print_f($id_alumno,$c,$id_examen);


echo "</div><br>";
echo '<div class="input-color" >
            <div style="  width: 20px;
    height: 20px;
    display: inline-block;
    background-color: #ccc;
    
    left: 5px;
    top: 5px; background-color: #054c80;"> </div> <strong> Área domindada </strong><br></div>
   ';

echo "<br>";
echo '<div class="input-color" >
            <div style="  width: 20px;
    height: 20px;
    display: inline-block;
    background-color: #ccc;
    
    left: 5px;
    top: 5px; background-color: #137ccf;"> </div> <strong> Área con conocimiento avanzado  </strong><br></div>
   ';


echo "<br>";
echo '<div class="input-color" >
            <div style="  width: 20px;
    height: 20px;
    display: inline-block;
    background-color: #ccc;
    
    left: 5px;
    top: 5px; background-color: #1eb3fd;"> </div> <strong> Área con conocimiento intermedio  </strong><br></div>
   ';
   echo "<br>";
echo '<div class="input-color" >
            <div style="  width: 20px;
    height: 20px;
    display: inline-block;
    background-color: #ccc;
    
    left: 5px;
    top: 5px; background-color: #8bd9fe;"> </div> <strong> Área con conocimiento básico </strong><br></div>
   ';
   echo "<br>";
echo '<div class="input-color" >
            <div style="  width: 20px;
    height: 20px;
    display: inline-block;
    background-color: #ccc;
    
    left: 5px;
    top: 5px; background-color: #d02114;"> </div> <strong> Área con problema</strong></div>
   ';





}

function mio($id_alumno,$id_examen){
$db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
 mysqli_query($db,"SET NAMES 'utf8'");
   $sa="select * from calificacion where id_alumno = ".$id_alumno." and id_examen = ".$id_examen;

   $ses_sql=mysqli_query($db,$sa);
  $row1 = mysqli_fetch_array($ses_sql);
  $cal=$row1["calificacion"];


  if($cal>=9){
  	
  	echo "<img height='42' width='200' src='./images/animal44.gif'id='player' >";

  	
  }elseif ($cal>7) {
  	
  	echo "<img height='42' width='200' src='./images/caballo.gif'id='player' >";
  	
  }elseif($cal>=6){
  		echo "<img height='42' width='42' src='./images/tortuga.gif'id='player' >";
  		

  }else{
  echo "<img height='42' width='200' src='./images/caracol.gif'id='player' >";
  		
  
  }


	
    echo  "<img src='./images/correr-imagen-animada-0057.gif' style=' position: absolute;
    right: 45px;
    padding: 5px;'>";

	echo'<br><br><br><br><br><br>	<br> <button class="link-2" id="correr" onclick="mandar('.$cal.')">Comenzar animación</button>  <button class="link-2" id="pausar" onclick="parar()" style="display:none;">Pausar animación</button> <button class="link-2" id="seguir" onclick="proseguir()" style="display: none;">Continuar animación </button>    <br><br><label style="font-size:20px;"> Entre más respuestas correctas tengas tu personaje correrá más rápido. Asegurate que tu personaje si haya llegado a la meta. </label> ';

}


function poner_resultado($id_alumno,$id_examen){
$db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
 mysqli_query($db,"SET NAMES 'utf8'");
   $sa="select * from alumno where id = ".$id_alumno." ";

  $ses_sql=mysqli_query($db,$sa);
  $row1 = mysqli_fetch_array($ses_sql);
  $tipo=$row1["tipo"];

  if($tipo==1){
  	num($id_alumno,$id_examen);
  }else if($tipo==2){
  	khan($id_alumno,$id_examen);
  }else{
  	mio($id_alumno,$id_examen);
  }
 

  echo"<br><br>";


/// hasta aqui está bien 

  $sa="select * from equivocacion where id_alumno = ".$id_alumno."  and id_examen =".$id_examen;
 
  $ses_sql=mysqli_query($db,$sa);

   $count = mysqli_num_rows($ses_sql);
	 if($count>0){
	 	echo "<h2 class='clr-6 p6'>Recomendaciones:</h2> ";
	 	
	 	
	 		while($row = mysqli_fetch_array($ses_sql)){ 

	 			 $sa1="select * from preguntas where id = ".$row["id_pregunta"];
	 			 
				  $ses_sql1=mysqli_query($db,$sa1);
				  $row1=mysqli_fetch_array($ses_sql1);
				  echo "<p class='clr-6'>".$row1["hint"].". </p><br>";



				   

	 		}
	}




}




?>
