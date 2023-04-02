<?php 
  include('server.php');
  session_unset(); // unset all var data
  session_destroy(); // destroying current session
  header( "Location: login.php");
?>
