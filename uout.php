<?php
   session_start();  
   if(session_destroy()) {
      header("Location:ulogin.php?msg=successfully logged out");
   }
?>