<?php
   include('connect.php');
   session_start();
   //check that a user is logged in. Therefore send it to another place. 
   $user_check = $_SESSION['login_user'];
   if(!isset($_SESSION['login_user'])  || $_SESSION['role']==2){
      header("location: index.html");
   }

   
?>