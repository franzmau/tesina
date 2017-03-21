<?php
 include('session_a.php');
header('Content-Type: text/html; charset=utf-8');

ini_set('display_startup_errors', 1);
ini_set('display_errors', 1);
error_reporting(-1);

if (isset($_POST['ex'])) {
	$fecha = new DateTime();
    $fin= $fecha->getTimestamp();
    $inicio=$_POST['inicio'];
	$id_examen=$_POST['ide'];
	$malas=0;
	$count=0;
	foreach($_POST["idp"] as $key => $text_field){
		$count=$count+1;

		$sql= "select respuesta from preguntas where id = ".$text_field." ";
		
		$ses_sql=mysqli_query($db,$sql);

		
		$row = mysqli_fetch_array($ses_sql);
		$answer=strtolower($row['respuesta']);
		$answer=trim($answer);
		$answer=trim($answer," \t.");
		$a=strtolower($_POST["mytext1"][$key]);
		$a=trim($a);
		$a=trim($a," \t.");

		if(strcmp($answer,$a)!=0){
			
			$malas=$malas+1;
			$sql1="INSERT INTO equivocacion (`id_alumno`, `id_examen`, `id_pregunta`,`txt`) VALUES (".$user_check." ,".$id_examen." , ".$text_field." , '".$a ."' )";
			mysqli_query($db,$sql1);


		}else{
			
		}	

	}
	$buenas=$count-$malas;
	$prom=round($buenas/$count *10);
	if($prom<5){
		$prom =5;
	}

	

	$sql1= "select tipo from alumno where id = ".$user_check." ";

	$ses_sql1=mysqli_query($db,$sql1);

	$row1= mysqli_fetch_array($ses_sql1);


	if($row1['tipo']==0){
		
		$sql1= "select valor from seleccionador where tipo = ".$prom." ";
		
		$ses_sql1=mysqli_query($db,$sql1);
		$row1= mysqli_fetch_array($ses_sql1);
		$val=$row1["valor"];

		$sql="Update alumno set tipo =".$val." where id=".$user_check;
		
		mysqli_query($db,$sql);

		$val=($val%3)+1;

		$sql="Update seleccionador set valor =".$val." where tipo=".$prom." ";
		mysqli_query($db,$sql);

	}


	$sql1="INSERT INTO calificacion (`id_alumno`, `id_examen`, `calificacion`,`inicio`,`fin` ) VALUES (".$user_check." ,".$id_examen." , ".$prom.", ". $inicio. " ,".$fin . " )";
		mysqli_query($db,$sql1);

		$a=mysqli_insert_id($db);



   echo "<script>alert('Has contestado el examen'); location.href='ver_prueba.php?id=".$a."';</script>";


}
?>