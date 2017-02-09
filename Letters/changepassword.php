<?php session_start(); require_once(dirname(__FILE__) . '/xajax.inc.php');  ?>

<html>
<head>
<title></title>
<script language="javascript">
function indexAlert(obj)   { alert(obj.name);  }
function addOption(selectId,txt, val)
{
        var objOption = new Option(txt,val);
        document.getElementById(selectId).options.add(objOption);
}
</script>
<link href="./Images/heoscss.css" rel="stylesheet"></head>
<body>
<?php
        print "<form action=\"changepassword.php\" method=\"post\" name=\"changepassword\" enctype=\"multipart/form-data\">
        <table align=\"center\" border=0 cellspacing=1 cellpadding=0><tr><td align=\"center\" colspan=\"6\">
        <b>Change Password</b></td></tr>";
        $con=mysql_connect("192.168.15.24","root","admin");
        $db=mysql_select_db("heos",$con);
        $rs1=mysql_query("select studentidno from studentregistration;",$con);
        while($res1=mysql_fetch_array($rs1))
        {
                $studentidno=$res1["studentidno"];
        }
        print"<tr><td>Student IdNo :</td><td>$studentidno</tr>
        <tr><td>Current Password :</td><td><input type=\"text\" name=\"currentpassword\" id=\"currentpassword\"></td>
        <tr><td>New Password :</td><td><input type=\"text\" name=\"newpassword\" id=\"newpassword\"></td></tr>
        <tr><td>Confirm New Password :</td><td><input type=\"text\" name=\"cnewpassword\" id=\"cnewpassword\"></td></tr>
        <table align=\"center\"><tr><br><td><input type=\"submit\" value=\"Save\" name=\"save\" id=\"save\"></td>
        <td><input type=\"submit\" name=\"btncance\" value=\"Cance\"></td> </tr></table></form>\n";
?>
<?php

      if(isset($_POST['save']))
      {
        $studentidno;
        $currentpassword=$_POST['currentpassword'];
        $newpassword=$_POST['newpassword'];
        $cnewpassword=$_POST['cnewpassword'];
        $con=mysql_connect("192.168.15.24","root","admin");
        $db=mysql_select_db("heos",$con);
        $rs2=mysql_query("select password from studentregistration;",$con);
        while($res2=mysql_fetch_array($rs2))
        {
                $password=$res2["password"];
        }
        if($password==$currentpassword)
         {
          if($newpassword==$cnewpassword)
          {
            $queryupdate=mysql_query("update studentregistration set password='$newpassword' where studentidno='$studentidno'",$con);
          }
          else { echo "New Password doesnot match";    }

         }
        else { echo "Current Password doesnot match";   }  
      }

?>

</body>
</html>
