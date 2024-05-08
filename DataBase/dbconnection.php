<?php
$_HostAddress="172.29.0.2";
$_UserName="root";
$_Password="tcfPm)y_Io7nLt9c";
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