<?php
   include('connect.php');
   session_start();
   //check that a user is logged in. Therefore send it to another place. 
   $user_check = $_SESSION['pid'];
   if(!isset($_SESSION['pid'])  ){
      header("location: index.html");
   }

   
?>