<?php  session_start();
if(session_destroy()) echo "<script language=\"javascript\">window.location='loginscreen.php';</script> ";
?>
