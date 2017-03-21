<?php
 include('session.php');
header('Content-Type: text/html; charset=utf-8');


if (isset($_POST['ex'])) {


$nom=$_POST['nombre'];

$sql = "Update examenes SET `nombre`='".$nom."' where id = ".$_POST["id_ex"]." "; 
$c=mysqli_query($db,$sql);

$sql ="Delete FROM `preguntas` WHERE id_examen=".$_POST["id_ex"];
$d=mysqli_query($db,$sql);
$sql="Delete FROM `calificacion` WHERE id_examen=".$_POST["id_ex"];
$d=mysqli_query($db,$sql);

$sql="Delete FROM `equivocacion` WHERE id_examen=".$_POST["id_ex"];
$d=mysqli_query($db,$sql);


foreach($_POST["mytext"] as $key => $text_field){

					$sql1 = "INSERT INTO preguntas (`id_examen`, `pregunta`, `respuesta`, `hint`) VALUES (". $_POST["id_ex"] . ",'".$text_field  ."', '".$_POST["mytext1"][$key]."','".$_POST["mytext2"][$key]."')"; 
						echo  $sql1. "\n";
					if(mysqli_query($db,$sql1)){

					}else{
						
					}					
   				 }



echo "<script>alert('Se ha actualizado el examen exitósamente'); location.href='prof.php';</script>";

}


else if($_SERVER["REQUEST_METHOD"] == "POST") {
	$nombre=$_POST['nombre'];
if($_POST["sele"]==0){
	
	
    $ses_sql=mysqli_query($db,"select * from salon where id_profesor = ".$_SESSION['pid']." ");
    		
	$count = mysqli_num_rows($ses_sql);
	if($count>0){

	 	
	 		while($row = mysqli_fetch_array($ses_sql)){   //Creates a loop to loop through results
 
	 		$sql = "INSERT INTO examenes (`id_profesor`, `id_salon`, `nombre`) VALUES (".$_SESSION['pid'] . ", ".  $row['id'].", '".$nombre."')";   
		
			if(mysqli_query($db,$sql)){
				$a=mysqli_insert_id($db);
				$c=count($_POST["mytext"]);
				
				$p=ceil($c/3.0);


				$as=1;
				echo "c vale ".$c." p vale ".$p;
				foreach($_POST["mytext"] as $key => $text_field){


					$sql1 = "INSERT INTO preguntas (`id_examen`, `pregunta`, `respuesta`, `hint`, `id_area`) VALUES (". $a . ", '".$text_field  ."', '".$_POST["mytext1"][$key]."','".$_POST["mytext2"][$key]."',".$_POST[$as].")"; 
					echo $sql1."<br><br>";
					$p=$p-1;
					if($p==0){
					
						$p=ceil($c/3.0);
						$as=$as+1;
					}

					if(mysqli_query($db,$sql1)){

					}else{
						//echo "hubo error en la pregunta ".$key;
					}					
   				 }

			}else{
				//echo "hubo un error";
			}

			}

	 }
}
else{
$sql = "INSERT INTO examenes (`id_profesor`, `id_salon`, `nombre`) VALUES (".$_SESSION['pid'] . ", ". $_POST["sele"].", '".$nombre."' )";
//echo $sql;  
	if(mysqli_query($db,$sql)){
			$a=mysqli_insert_id($db);
			$c=count($_POST["mytext"]);
			echo "c vale".$c;
			$p=ceil($c/3.0);
			
			$as=1;
			foreach($_POST["mytext"] as $key => $text_field){

					$sql1="INSERT INTO preguntas (`id_examen`, `pregunta`, `respuesta`, `hint`, `id_area`) VALUES (". $a . ", '".$text_field  ."', '".$_POST["mytext1"][$key]."','".$_POST["mytext2"][$key]."',".$_POST[$as].")"; 
						echo $sql1."<br>";
					if(mysqli_query($db,$sql1)){

					}else{
						echo "hubo error en la pregunta ".$key;
					}
					$p=$p-1;
					if($p==0){
						
						$p=ceil($c/3.0);
						$as=$as+1;
						
						
					}


   				 }





			}else{
				//echo "hubo un error";
			}

}
 echo "<script>alert('Se ha creado el examen exitósamente'); location.href='prof.php';</script>";

}



?>

