<?php
  session_start();
  session_unset(); // Unset all session variables
  session_destroy(); // Destroy the session

  // Redirect to the login page
  echo "<script>window.open('admin_login.php', '_self');</script>";
?>
