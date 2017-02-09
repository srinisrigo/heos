<?php session_start(); require_once(dirname(__FILE__) . '/xajax.inc.php');  ?>
<html>
<head>
<title></title>
<link href="./Images/heoscss.css" rel="stylesheet"></head>
<body>
<?php
        print "<form action=\"lettertype.php\" method=\"post\" name=\"lettertype\" enctype=\"multipart/form-data\">
        <table align=\"center\" border=0 cellspacing=1 cellpadding=0><tr><td align=\"center\" colspan=\"6\"><b>Letter Type</b></td></tr>
        <tr><td><input type=\"text\" name=\"lettertype\" id=\"lettertype\"></td>
        <td><input type=\"submit\" value=\"Add\" name=\"add\" id=\"add\"></td></tr></table></form>\n";
?>
<?php

      if(isset($_POST['add']))
      {
         $letter=$_POST['lettertype'];
         $con=mysql_connect("192.168.15.24","root","admin");
         $db=mysql_select_db("heos",$con);
         if($letter=="")
          echo "Please Enter Data ";
         else
          {    $inserfeedback=mysql_query("insert into lettertype values('0','$letter')",$con);  }

      }

?>

</body>
</html>
