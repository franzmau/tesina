<?php
 include('session.php');

if($_SERVER["REQUEST_METHOD"] == "POST") {
	$nombre=$_POST['nombre'];
if($_POST["sele"]==0){
	
	
    $ses_sql=mysqli_query($db,"select * from salon where id_profesor = ".$_SESSION['pid']." ");
    		
	$count = mysqli_num_rows($ses_sql);
	if($count>0){
	 	
	 		while($row = mysqli_fetch_array($ses_sql)){   //Creates a loop to loop through results
 
	 		$sql = "INSERT INTO examenes (`id_profesor`, `id_salon`, `nombre`) VALUES (".$_SESSION['pid'] . ", ".  $row['id'].", '".$nombre."')";   
		
			if(mysqli_query($db,$sql)){
				$a=mysqli_insert_id($db);
				


			}else{
				echo "hubo un error";
			}

			}

	 }
}
else{
$sql = "INSERT INTO examenes (`id_profesor`, `id_salon`, `nombre`) VALUES (".$_SESSION['pid'] . ", ". $_POST["sele"].", '".$nombre."' )";
echo $sql;  
	if(mysqli_query($db,$sql)){
			$a=mysqli_insert_id($db);

			}else{
				echo "hubo un error";
			}

}

}



 foreach($_POST["mytext"] as $key => $text_field){

 						echo "d  ".$key. " res". $_POST["mytext1"][$key];
       				 $capture_field_vals .= $text_field .", ";
   				 }

echo $capture_field_vals ;
?>

