<?php
$_HostAddress="localhost";
$_UserName="root";
$_Password="admin";
$con = @mysql_connect($_HostAddress,$_UserName,$_Password);
if (!$con){
   echo( "<p>Unable to connect to database manager.</p>");
   die('Could not connect: ' . mysql_error());
   exit();
} //else echo("<p>Successfully Connected to MySQL Database Manager!</p>");
$_DatabaseName="heos";
if (! @mysql_select_db($_DatabaseName ) ){
   echo( "<p>Unable to  connect database...</p>");
   exit();
} //else echo("<p>Successfully Connected to Database 'MYSQL'!</p>");
?>
