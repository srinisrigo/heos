<?php session_start(); require_once(dirname(__FILE__) . '/xajax.inc.php');  ?>
<html>
<head>
<title></title>
<link href="./Images/heoscss.css" rel="stylesheet"></head>
<body>
<?php
        print "<form action=\"lecturerassessment.php\" method=\"post\" name=\"lecturerassessment\" enctype=\"multipart/form-data\">
        <table align=\"center\" border=0 cellspacing=1 cellpadding=0><tr><td align=\"center\" colspan=\"6\">
        <b>Lecturer Assessment</b></td></tr>
        <tr><td><input type=\"text\" name=\"assessment\" id=\"assessment\"></td>
        <td><input type=\"submit\" value=\"Add\" name=\"add\" id=\"add\"></td></tr></table></form>\n";
?>
<?php

      if(isset($_POST['add']))
      {
         $assessment=$_POST['assessment'];
         $con=mysql_connect("192.168.15.24","root","admin");
         $db=mysql_select_db("heos",$con);
         $inserfeedback=mysql_query("insert into lecturerassessment values('0','$assessment')",$con);

      }

?>

</body>
</html>
