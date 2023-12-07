<?php session_start();
include "../DataBase/dbconnection.php";
?>
<html>
<head><title>HEOS</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel="stylesheet" type="text/css" href="../Style/heoscss.css">
<script language="javascript">
if(window.history.forward(1) != null) window.history.forward(1);
function changeimage(obj,c){ obj.className=c; }
function formvalidator()
{
if(document.getElementById('username').value=='')
{
 alert("Enter UserName");
 document.getElementById('username').focus();
 return false;
}

if(document.getElementById('password').value=='')
{
 alert("Enter Password");
 document.getElementById('password').focus();
 return false;
}
return true;
}
</script>
</head>
<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<form method='post' style="padding-top:23%;">
<table align='center' border=0 cellpadding=0 cellspacing=1>
<tr><th colspan='2'>HEOS</th></tr>
<tr><td>User Name</td><td><input type="text" name="username" id="username"></td></tr>
<tr><td>Password</td><td><input type="password" name="password" id="password"></td></tr>
<tr><td align=center colspan=2><input type="submit" name="loginme" value="Login Me" onclick="return formvalidator()" style='padding:0px;!important'></td></tr>
</table></form>
</body>
</html>
<?php
if(isset($_POST['loginme'])){
$uname=$_POST['username']; $pwd=$_POST['password'];
$_SESSION['username']=$uname; $_SESSION['password']=$pwd;

$check=$con->query("select count(*) from usercreation where UserName='$uname' and Password='$pwd'");
$rows = $check->fetch_array(MYSQLI_BOTH);
if(count($rows)) {
$result=$con->query("select UserType from usercreation where UserName='$uname' and Password='$pwd'");
$rows = $result->fetch_array(MYSQLI_BOTH);
$user=$rows["UserType"]; $_SESSION['heosusermode']=$user;
echo "<script language=\"javascript\">window.location='heos.php';</script> ";
}
else echo "<script language=\"javascript\">alert('incorrect User Name Or Password');</script> ";
}

?>
