
<?php
header('Content-Type: text/html; charset=utf-8');
ini_set('display_startup_errors', 1);
ini_set('display_errors', 1);
error_reporting(-1);
function llenar($id){
	//create a table and a row for each report the user has. 

	 $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
      mysqli_query($db,"SET NAMES 'utf8'");
   		
     $ses_sql=mysqli_query($db,"select * from examenes where id_profesor = ".$id." ");
			
	 $count = mysqli_num_rows($ses_sql);
	 if($count>0){
	 	
	 	echo"<tbody>";
	 		while($row = mysqli_fetch_array($ses_sql)){   //Creates a loop to loop through results

	 			 $sess_sql=mysqli_query($db,"select * from salon where id= ".$row['id_salon']." ");
                 
                 
                 $r=mysqli_fetch_array($sess_sql);



                echo" <form action='table_controller.php' method='post'><tr><td hidden><input type='hidden' name='id' value=". $row['id']." /></td> <td> ".$row['nombre']."</td><td> ".
                $r["text"]." </td><td class='last'><i><input  style='text-align: center;' type='submit' name='delete'  onclick='return confirm(\"Se borrará el examen y no se podrá recuperar \")' value='Borrar'/></i><i> <input name='view' type='submit' value='Respuestas'/>  </i> <i> <input name='editar' type='submit' value='Editar'/></span></i></td><tr></form>";

                 
			}

			echo"</tbody>";
			
	   	

	 }


}

?>