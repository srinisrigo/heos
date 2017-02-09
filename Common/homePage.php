<?php session_start();
require_once(dirname(__FILE__) . '/xajax.inc.php');
function confirmlogin($user,$pwd,$role)
{
$objResponse =& new xajaxResponse();
if($user==''){ $objResponse->addScript("document.getElementById('username').focus();"); return $objResponse->getXML(); }
if($pwd==''){ $objResponse->addScript("document.getElementById('password').focus();"); return $objResponse->getXML(); }
if($role=='none'){ $objResponse->addScript("document.getElementById('userrole').focus();"); return $objResponse->getXML(); }
if($user!=''&$pwd!=''){

if($role==5){
$result=mysql_query("select count(*) from applicantdetails where applicantid='$user' and password='$pwd'",$con);
if(mysql_result($result,0)!=0) {
$_SESSION['username']=$user; $_SESSION['password']=$pwd; $_SESSION['role']=$role;
$ck=mysql_query("select appfill from applicantdetails where applicantid='$user' and password='$pwd'",$con);
$appfill=mysql_result($ck,"appfill");
if($role=6 & ($appfill==0) ) $objResponse->addScript("window.location='application.php'");
else $objResponse->addScript("alert('Application Filled'); window.location='homePage.php';"); } }
if($role==1){
$confirm=mysql_query("select count(*) from usercreation where UserName='$user' and Password='$pwd'",$con);
if(mysql_result($confirm,0)!=0) { $objResponse->addScript("window.location='student.php'"); $_SESSION['role']=$role; }
}
else $objResponse->addScript("document.getElementById('error').innerHTML='<font color=#ff0000><blink>* invalid user name or password.</blink>';");
$objResponse->addScript("document.getElementById('userrole').selectedIndex=0;");
$objResponse->addScript("document.getElementById('username').select();");
$objResponse->addScript("document.getElementById('password').value='';");
}return $objResponse->getXML();
}
$xajax =& new xajax();
$xajax->registerFunction("confirmlogin");
$xajax->processRequests();
?>
<html>
<head><title></title>
<link rel="stylesheet" href="../Style/heoscss.css">
<?php $xajax->printJavascript(); ?>
<script language="javascript">
function loginCancel(){ window.location="homePage.php";}
function btover(obj,cname){ obj.className=cname; }
</script>
</head>

<body>
<?php
print "<table cellspacing=1 cellpadding=0 id=\"login\">
<tr><td colspan=2 id=\"error\"></td></tr>
<tr class=\"label\"><td>User name</td>
<td><input class=\"input\" type=\"text\" size=15 name=\"username\" id=\"username\"></td></tr>
<tr class=\"label\"><td>Password</td>
<td><input class=\"input\" type=\"password\" size=15 name=\"password\" id=\"password\"></td></tr>
<tr class=\"label\"><td>Log on into</td><td><select class=\"select\" name=\"userrole\" id=\"userrole\"><option value=\"none\">select</option>";

$select=mysql_query("select * from usertypemaster order by UserType",$con);
while($rar=mysql_fetch_array($select)){ $UserId=$rar['UserId']; $UserType=$rar['UserType'];
echo "<option value=\"$UserId\">$UserType</option>"; }
print "</select></td></tr>
<tr><td colspan=2 align=\"center\"><br><br>
<input class=\"buttonstatic\" type=\"button\" value=\"cancel\" onClick=\"loginCancel();\" onmouseover=\"btover(this,'buttonover');\" onmouseout=\"btover(this,'buttonstatic');\">&nbsp;&nbsp;&nbsp;&nbsp;
<input class=\"buttonstatic\" type=\"button\" value=\"Login\" onClick=\"return xajax_confirmlogin(document.getElementById('username').value,document.getElementById('password').value,document.getElementById('userrole').value);\" onmouseover=\"btover(this,'buttonover');\" onmouseout=\"btover(this,'buttonstatic');\"></td></tr>
</table>";

?>
</body>

</html>
