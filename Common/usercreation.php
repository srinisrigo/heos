<?php session_start();
include "../DataBase/dbconnection.php";
?>
<html>
<head>
<title>User Creation</title>
<link href="../Style/heoscss.css" rel="stylesheet" type="text/css">
<script language="javascript">
function changeimage(obj,c){ obj.className=c; }
function formValidation()
{
var username = document.getElementById('username');
var password = document.getElementById('password');
var usertype = document.getElementById('usertype');

if(isEmpty(username,"Kindly Enter User Name"))
{
if(isEmpty(password,"Kindly Enter Password"))
{
if(isMadeSelection(usertype,"Kindly Select User Type"))
{
return true;
}
}
}
return false;
}

function isEmpty(elem, helperMsg)
{
if(elem.value.length == 0)
{
alert(helperMsg);
elem.focus(); // set the focus to this input
return false;
}
else
{
return true;
}
}

function isMadeSelection(elem, helperMsg)
{
if(elem.value == "1" || elem.value == ""){
alert(helperMsg);
//   elem.focus();
return false;
}
else
{
return true;
}
}
</script>
</head>

<body>

<?php
if(isset($_SESSION['heosusermode']) && ($_SESSION['heosusermode']==1 || $_SESSION['heosusermode']=3 ) && $_SESSION['heosusermode']!='' && !empty($_SESSION['heosusermode'])){
print "<form action=\"usercreation.php\" method=\"post\" name=\"form\">
<table border=0 cellpadding=0 cellspacing=1>
<tr><th colspan=2>User Creation</th></tr>
<tr><td>User Name</td><td><input name=\"username\" type=\"text\"></td></tr>
<tr><td>Password</td><td><input name=\"password\" type=\"text\"></td></tr>
<tr><td>User Type</td><td><select name=\"usertype\"><option value=\"none\">select</option>\n";
$con=mysql_connect("192.168.15.24","root","admin");
$sql=mysql_query("SELECT * from usertypemaster");
while($ar=mysql_fetch_array($sql)){
$userid=$ar['UserId']; $usertype=$ar['UserType'];
echo"<option value=$userid >$usertype</option>"; }
print "</select></td></tr>
<tr><td align=center colspan=2><input type=\"submit\" name=\"submit\" value=\"Create\" onclick=\"return formValidation()\"></td></tr>
</table></form>";
}
else echo "<script language=\"javascript\">window.location='loginscreen.php';</script> ";
?>

<?php

if(isset($_POST['submit'])){

$username=$_POST['username'];
$password=$_POST['password'];
$usertype=$_POST['usertype'];
$result=mysql_query("select count(*) from usercreation where UserName='$username' and Password='$password' and UserType='$usertype'");
if(mysql_result($result,0)==0){
$result1=mysql_query("insert into usercreation values('0','$username','$password','$usertype')");
echo "<script language=\"javascript\">alert('User($username) created');</script>";
}
else echo "<script language=\"javascript\">alert('UserName Already Exists');</script>";
}

?>

</body>

</html>
