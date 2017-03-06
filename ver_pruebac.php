<?php

function checar($id_c, $id_a ){

	$sql="select * from calificacion where id_alumno =".$id_a." and id=".$id;

	$result = mysqli_query($db,$sql);

	 $count = mysqli_num_rows($result);

	 if($count==0){
	 	 header("location: alumno.php");
	 	}
}




?>
