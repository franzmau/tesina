<?php
header('Content-Type: text/html; charset=utf-8');
ini_set('display_startup_errors', 1);
ini_set('display_errors', 1);
error_reporting(-1);



function llenar($id,$id_alumno){
	//create a table and a row for each report the user has. 
	 $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
      mysqli_query($db,"SET NAMES 'utf8'");
      $query=mysqli_query($db,"select * from calificacion where id_alumno =".$id_alumno." ");
     $count1 = mysqli_num_rows($query);
     $val= "";
     if($count1>0){
     	while($row1 = mysqli_fetch_array($query)){

     		$val = $val." and id <> ".$row1['id_examen'];


     	}

     }

     $sql="select * from examenes where id_salon = ".$id." ".$val;


     $ses_sql=mysqli_query($db,$sql);
	
	 $count = mysqli_num_rows($ses_sql);
	 if($count>0){
	 	
	 	echo"<tbody>";
	 		while($row = mysqli_fetch_array($ses_sql)){   //Creates a loop to loop through results
                echo" <form action='control_al.php' method='post'><tr><td hidden><input type='hidden' name='id' value=". $row['id']." /></td> <td> ".$row['nombre']."</td><td class='last'> <i> <input name='hacer' type='submit' value='Realizar ya'/></span></i></td><tr></form>";    
			}
			echo"</tbody>";
	 }
}

function poner_nombre($id){
	$db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
   mysqli_query($db,"SET NAMES 'utf8'");
 $ses_sql=mysqli_query($db,"select * from examenes where id = ".$id." ");
	$row = mysqli_fetch_array($ses_sql);

	echo $row["nombre"];
}


?>