<?php
header('Content-Type: text/html; charset=utf-8');
ini_set('display_startup_errors', 1);
ini_set('display_errors', 1);
error_reporting(-1);
function llenar($id){
	//create a table and a row for each report the user has. 

	 $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
      mysqli_query($db,"SET NAMES 'utf8'");
   		$query="select * from calificacion where id_examen = ".$id." ";
     $ses_sql=mysqli_query($db,$query);
			
	 $count = mysqli_num_rows($ses_sql);
	 if($count>0){
	 	
	 	echo"<tbody>";
	 		while($row = mysqli_fetch_array($ses_sql)){   //Creates a loop to loop through results

	 			 $sess_sql=mysqli_query($db,"select * from alumno where id= ".$row['id_alumno']." ");
                 
                 
                 $r=mysqli_fetch_array($sess_sql);
                 if($r["tipo"]==1){
                 	$ti="numérico";

                 }else if($r["tipo"]==2){
					$ti="colores";
                 }else{
					$ti="carrera";
                 }
                 $dif=($row["fin"]-$row["inicio"])/60.0;



                echo" <form action='table_controller.php' method='post'><tr><td hidden><input type='hidden' name='id' value=". $row['id']." /></td> <td> ".$r['nombre']."</td><td> ".
                $row["calificacion"]." </td><td>".$ti."</td><td class='last'>".$dif."</td><tr></form>";

                 
			}

			echo"</tbody>";
			
	   	

	 }


}


function poner_examen($id){
$db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
      mysqli_query($db,"SET NAMES 'utf8'");
       $sess_sql=mysqli_query($db,"select * from examenes where id= ".$id." ");
       $r=mysqli_fetch_array($sess_sql);

       echo $r["nombre"];

}
?>