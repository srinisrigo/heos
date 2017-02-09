<?php session_start(); require_once(dirname(__FILE__) . '/xajax.inc.php');  ?>
<html>
<head>
<title></title>
<link href="./Images/heoscss.css" rel="stylesheet"></head>
<body>
<?php
        print "<form action=\"lecturerfeedback.php\" method=\"post\" name=\"lecturerfeedback\" enctype=\"multipart/form-data\">
        <table align=\"center\" border=0 cellspacing=1 cellpadding=0><tr><td align=\"center\" colspan=\"6\">
        <b>Lecturer Feedback</b></td></tr>
        <tr><td><input type=\"text\" name=\"feedback\" id=\"feedback\"></td>
        <td><input type=\"submit\" value=\"Add\" name=\"add\" id=\"add\"></td>
        <td><input type=\"submit\" value=\"Delete\" name=\"delete\" id=\"delete\"></td></tr></table></form>\n";
?>
<?php

      if(isset($_POST['add']))
      {
         $feedback=$_POST['feedback'];
         $con=mysql_connect("192.168.15.24","root","admin");
         $db=mysql_select_db("heos",$con);
         if($feedback=="")
           echo "Please Enter data";
         else
         { $inserfeedback=mysql_query("insert into lecturerfeedback values('0','$feedback')",$con); }
      }
?>
<?php
 if(isset($_POST['delete']))
        {
                $feedback=$_POST['feedback'];
                $con=mysql_connect("192.168.15.24","root","admin");
                $db=mysql_select_db("heos",$con);
              //  echo "<script langauge=\"javascript\">var result=confirm('Are You Sure Want to Delete');if(result){val='delete';self.location='lecturerfeedback.php?cat=' + val;}else{val='dontdelete';self.location='lecturerfeedback.php?cat=' + val;}</script>";
                $querydelete=mysql_query("delete from lecturerfeedback where feedbackname='$feedback'",$con);
               // echo "<script type=\"text/javascript\">alert(\"Successfully Deleted\")</script>";

         }
?>
</body>
</html>
