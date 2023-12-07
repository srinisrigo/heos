<?php
$_HostAddress="172.26.0.2";
$_UserName="admin";
$_Password="Szigony123$";
$_DatabaseName="heos";
$con = new mysqli($_HostAddress,$_UserName,$_Password,$_DatabaseName);
if ($con->connect_error){
   echo( "<p>Unable to connect to database manager.</p>");
   die('Could not connect: ' . $con->connect_error);
   exit();
} //else echo("<p>Successfully Connected to MySQL Database Manager!</p>");
?>
