<?php




function poner_nombre($id){
	$db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
   mysqli_query($db,"SET NAMES 'utf8'");
 $ses_sql=mysqli_query($db,"select * from examenes where id = ".$id." ");
	
	$row = mysqli_fetch_array($ses_sql);

	echo $row["nombre"];



}


function llenar($id_salon,$id,$id_ex){
$db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
    mysqli_query($db,"SET NAMES 'utf8'");


    $ses_sql=mysqli_query($db,"select * from calificacion where id_examen = ".$id_ex."  and id_alumno =".$id);
  
    $row = mysqli_fetch_array($ses_sql);
    if($row>=1){
      echo "<script>location.href='alumno.php';</script>";
    }







  	$ses_sql=mysqli_query($db,"select * from preguntas where id_examen = ".$id_ex." ");



  	
	$count = mysqli_num_rows($ses_sql);
    
	while($row = mysqli_fetch_array($ses_sql)){   //Creates a loop to loop through results
	 			

                 echo '<textarea disabled style="border:#e0e0e1 1px solid; background:#fff; font-size:14px; font-family: Georgia, "Times New Roman", Times, serif; color:#000;padding:3px 10px 5px 10px;outline: medium none;width: 547px; height:17px; float:left; box-shadow: 0 0 3px #c1c1c1; overflow:auto;resize:none" name="mytext[]" cols="65"  rows="5" >'.$row["pregunta"].'</textarea>  
                     <input hidden  name ="idp[]" value='.$row["id"].'>      
                      <label> <strong> Respuesta:&nbsp;&nbsp; </strong> </label>
                      <input style="border:#e0e0e1 1px solid; background:#fff; font-size:14px; font-family: Georgia, "Times New Roman", Times, serif; color:#000;padding:3px 10px 5px 10px;outline: medium none;width: 247px; height:17px; float:left; box-shadow: 0 0 3px #c1c1c1;" type="text" value= "" name="mytext1[]">
                      
                      <br><br>
                       
                      
                      ';
                     
	 			}
}

?>