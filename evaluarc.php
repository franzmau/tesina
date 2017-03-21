
<?php
header('Content-Type: text/html; charset=utf-8');
ini_set('display_startup_errors', 1);
ini_set('display_errors', 1);
error_reporting(-1);


function poner($query, $tipo ){

	$db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
    mysqli_query($db,"SET NAMES 'utf8'");
	$ses_sql=mysqli_query($db,$query);

	echo'<label style="float:left; display:inline-block; padding-top:3px; width:82px; color:#000; line-height:20px; font-size:22px;" ><strong> '.$tipo.' </strong></label><br><br><table class="table">

                     <thead>
                     <tr>
                        	<th hidden>id</th>
                            <th>Alumno</th>
                           
                            <th>Calificacón 1</th>
                            <th class="last">Calificacion 2</th>

                            
                        </tr>
                        </thead><tbody>';

	while($row = mysqli_fetch_array($ses_sql)){ 
		$id_alumno=$row["id"];
		$query1="Select * from calificacion where id_alumno =".$id_alumno;
		$ses_sql1=mysqli_query($db,$query1);
		$count = mysqli_num_rows($ses_sql1);

		if($count>0){
			if($count==1){
				$r=mysqli_fetch_array($ses_sql1);
				echo"<tr><td hidden><input type='hidden' name='id' value=". $row['id']." /></td>" ;
				echo"  <td> ".$row['nombre']."</td><td> ".
                $r["calificacion"]." </td><td class='last'>No hay dato </td> <tr>";
			}else{
				$r=mysqli_fetch_array($ses_sql1);
				$r1=mysqli_fetch_array($ses_sql1);
				echo"<tr><td hidden><input type='hidden' name='id' value=". $row['id']." /></td>" ;
				echo"  <td> ".$row['nombre']."</td><td> ".
                $r["calificacion"]." </td><td class='last'>".$r1["calificacion"]." </td> <tr>";

			}

	    }

	    echo "<tbody>";
	    echo "</table><br><br>";





	}




}

function llenar($id_prof){
	//create a table and a row for each report the user has. 

	 $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
      mysqli_query($db,"SET NAMES 'utf8'");
   		
     $ses_sql=mysqli_query($db,"select * from salon where id_profesor = ".$id_prof." ");
			
	 $where=" and (";
	 	while($row = mysqli_fetch_array($ses_sql)){  
	 		$where= $where ." id_salon =".$row["id"]." or";

	 	}

	 	$where=substr($where, 0, -2);
	 	$where=$where." )";
	 	$query1="Select * from alumno where tipo = 1 ".$where;
	 	
	 	$query2="Select * from alumno where tipo = 2 ".$where;
	 	$query3="Select * from alumno where tipo = 3 ".$where;

	 	poner($query1,"Numérico");
	 	poner($query2,"Colores");
	 	poner($query3,"Carrera");




	 	







	 
	 	
	 	
	 		 //Creates a loop to loop through results

	 			

/*

	 			 $sess_sql=mysqli_query($db,"select * from alumnos where id_salon= ".$row['id']." ");
                 
                $count = mysqli_num_rows($ses_sql);
				 if($count>0){
                 
                 $r=mysqli_fetch_array($sess_sql);



                echo" <form action='table_controller.php' method='post'><tr><td hidden><input type='hidden' name='id' value=". $row['id']." /></td> <td> ".$row['nombre']."</td><td> ".
                $r["text"]." </td><td class='last'><i><input  style='text-align: center;' type='submit' name='delete'  onclick='return confirm(\"Se borrará el examen y no se podrá recuperar \")' value='Borrar'/></i><i> <input name='view' type='submit' value='Respuestas'/>  </i> <i> <input name='editar' type='submit' value='Editar'/></span></i></td><tr></form>";

                 
			}

			echo"</tbody>";
			
	   	
*/
		

	 

}

?>