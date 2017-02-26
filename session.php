<?php
   include('connect.php');
   session_start();
   //check that a user is logged in. Therefore send it to another place. 
   $user_check = $_SESSION['login_user'];
   if(!isset($_SESSION['login_user'])){
      header("location: index.html");
   }

   
?>