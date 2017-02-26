 <meta charset="utf-8">
<?php
   include("connect.php");
   session_start();
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form in post method
     
      $myusername = mysqli_real_escape_string($db,$_POST['user']);
      $mypassword = mysqli_real_escape_string($db,$_POST['password']); 
    

      $sql = "SELECT id FROM profesor WHERE username = '$myusername' and password = '$mypassword'";
      
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
     
      
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if($count == 1) {
			
        // session_register("myusername");
         	
         $_SESSION['login_user'] = $myusername;
         $_SESSION['pid']=$row['id'];

         
         	
         header("location: prof.php");
      }else {

         echo "<script>alert('Lo siento el usuario o la contraseña son incorrectos'); location.href='profesor.html';</script>";
	          //$error = "Your Login Name or Password is invalid";
      
      }
   }
?>