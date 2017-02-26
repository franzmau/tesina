<?php
   session_start();
   //just destroy the variable session
   if(session_destroy()) {
      header("Location: ../index.php");
   }
?>