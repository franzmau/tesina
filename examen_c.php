<?php
header('Content-Type: text/html; charset=utf-8');

function  poner_area($id){
	echo "<label style='font-size:20px;'> Area ".$id ."</label><br>";
	echo '<select style=" font-size:16px; margin: 8px 0;" name="'.$id.'">';
	
 	$db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
   mysqli_query($db,"SET NAMES 'utf8'");
   		
     $ses_sql=mysqli_query($db,"select * from area ");
			
	 $count = mysqli_num_rows($ses_sql);
	 if($count>0){
	 	
	 		while($row = mysqli_fetch_array($ses_sql)){   //Creates a loop to loop through results
                 echo "<option value=".$row['id'].">".$row['area']."</option> ";
			}
	   	echo"</select><br>";
	 }



}

function poner_salon($id){

	echo '<br><select style=" font-size:16px; margin: 8px 0;" name="sele">';
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

function poner_nombre($id){
	$db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
   mysqli_query($db,"SET NAMES 'utf8'");
 $ses_sql=mysqli_query($db,"select * from examenes where id = ".$id." ");
	$row = mysqli_fetch_array($ses_sql);

	echo $row["nombre"];
}

function poner_salo($id){
	$db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
   mysqli_query($db,"SET NAMES 'utf8'");
   		
     $ses_sql=mysqli_query($db,"select * from examenes where id = ".$id." ");
			$row = mysqli_fetch_array($ses_sql);

			

			 $sess_sql=mysqli_query($db,"select * from salon where id = ".$row["id_salon"]." ");
			$row1 = mysqli_fetch_array($sess_sql);
				
		//	var_dump($row1);
			echo  $row1["text"];

	}



function poner_tabla($id){
	$db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
    mysqli_query($db,"SET NAMES 'utf8'");
  	$ses_sql=mysqli_query($db,"select * from preguntas where id_examen = ".$id." ");
	
	$count = mysqli_num_rows($ses_sql);
	 if($count>0){
	 	$c=0;
	 		while($row = mysqli_fetch_array($ses_sql)){   //Creates a loop to loop through results
	 			if($c==0){

                 echo '<textarea style="border:#e0e0e1 1px solid; background:#fff; font-size:14px; font-family: Georgia, "Times New Roman", Times, serif; color:#000;padding:3px 10px 5px 10px;outline: medium none;width: 547px; height:17px; float:left; box-shadow: 0 0 3px #c1c1c1;" name="mytext[]" cols="40"  rows="5" >'.$row["pregunta"].'</textarea>         <br>
                      <label> <strong> Respuesta:&nbsp;&nbsp; </strong> </label>
                      <input style="border:#e0e0e1 1px solid; background:#fff; font-size:14px; font-family: Georgia, "Times New Roman", Times, serif; color:#000;padding:3px 10px 5px 10px;outline: medium none;width: 247px; height:17px; float:left; box-shadow: 0 0 3px #c1c1c1;" type="text" value= "'.$row["respuesta"].'" name="mytext1[]">
                      
                      <br>
                       <label> <strong> Ayuda:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </strong> </label>
                      <textarea style="border:#e0e0e1 1px solid; background:#fff; font-size:14px; font-family: Georgia, "Times New Roman", Times, serif; color:#000;padding:3px 10px 5px 10px;outline: medium none;width: 547px; height:17px; float:left; box-shadow: 0 0 3px #c1c1c1;" name="mytext2[]"  cols="40" rows="5"> '.$row["hint"].'</textarea>
                      </div> ';
                      $c=$c+1;
	 			}else{

	 				echo '<div> <br><br> <label> <strong>Pregunta:&nbsp;&nbsp;&nbsp;&nbsp; </strong> </label> <textarea style="border:#e0e0e1 1px solid; background:#fff; font-size:14px; font-family: Georgia, "Times New Roman", Times, serif; color:#000;padding:3px 10px 5px 10px;outline: medium none;width: 547px; height:17px; float:left; box-shadow: 0 0 3px #c1c1c1; margin: 7px 0 0px 0px; width:560px;" name="mytext[]" cols="40" rows="5">'.$row["pregunta"].'</textarea> <br> <label> <strong> Respuesta:&nbsp;&nbsp;</strong> </label><input style="border:#e0e0e1 1px solid; background:#fff; font-size:14px; font-family: Georgia, "Times New Roman", Times, serif; color:#000;padding:3px 10px 5px 10px;outline: medium none;width: 247px; height:17px; float:left; box-shadow: 0 0 3px #c1c1c1; margin: 7px 0 0px 0px; width:560px;" value="'.$row["respuesta"].'" type="text" name="mytext1[]"> <br> <label> <strong>Ayuda :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </strong> </label> <textarea style="border:#e0e0e1 1px solid; background:#fff; font-size:14px; font-family: Georgia, "Times New Roman", Times, serif; color:#000;padding:3px 10px 5px 10px;outline: medium none;width: 547px; height:17px; float:left; box-shadow: 0 0 3px #c1c1c1; margin: 7px 0 0px 0px; width:560px;" name="mytext2[]" cols="40" rows="5" >'.$row["hint"].'</textarea> <a href="#" class="remove_field">Quitar</a> <br></div>';



	 			}
			}
	   	
	 }

}

?>