<?php
include("connect.php");

if(isset($_POST['delete']) ) {
	 $a=$_POST['id'];

	
	$sql = "DELETE FROM `examenes` WHERE `id`= $a";
	  $result = mysqli_query($db,$sql);

	 

    echo "<script>alert('Se ha borrado el examen.'); location.href='prof.php';</script>";

	}


if(isset($_POST['editar']) ) {
	 $a=$_POST['id'];

    echo "<script> location.href='edit_examen.php?examen=$a';</script>";

	}

if(isset($_POST['view']) ) {
 $a=$_POST['id'];

 echo "<script> location.href='ver_respuestas.php?examen=$a';</script>";

}



?>