<?php
include("connect.php");



if(isset($_POST['hacer']) ) {
	 $a=$_POST['id'];

    echo "<script> location.href='prueba.php?examen=$a';</script>";

	}



?>