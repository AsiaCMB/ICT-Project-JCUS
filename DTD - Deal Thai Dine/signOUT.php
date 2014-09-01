<?php
 session_start();
  echo "Logout Successfully ";
  // function that Destroys Session 
  session_destroy();   
  //Redirect users to index page
  header("Location: index.php");
?>