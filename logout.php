<?php
   session_start();  
   if(session_destroy()) {
      header("Location:log.php?msg=successfully logged out");
   }
?>
