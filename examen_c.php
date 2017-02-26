<?php
header('Content-Type: text/html; charset=utf-8');
ini_set('display_startup_errors', 1);
ini_set('display_errors', 1);
error_reporting(-1);
function poner_salon($id){

	echo '<select name="sele">';
	echo '<option value="0">Todos</option> ';
 $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
   mysqli_query($db,"SET NAMES 'utf8'");
   		
     $ses_sql=mysqli_query($db,"select * from salon where id_profesor = ".$id." ");
			
	 $count = mysqli_num_rows($ses_sql);
	 if($count>0){
	 	
	 		while($row = mysqli_fetch_array($ses_sql)){   //Creates a loop to loop through results

	 			
                 echo "<option value=".$row['id'].">".$row['text']."</option> ";
                 
                
		
			}
			
	   	echo"</select><br><br>";

	 }




}

?>