<?php session_start();
include "../AJAX/MasterAjax.php";
include "../DataBase/dbconnection.php";
?>
<html><title>User Rights Creation</title>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="../Style/heoscss.css" rel="stylesheet" type="text/css">
<?php $xajax->printJavascript();?>
<script language="javascript">
function changeimage(obj,c){ obj.className=c; }
function moveForward()
{
var left=document.getElementById('left');
var right=document.getElementById('right');
var list=document.getElementById('list');
var bind='';
for(i=0;i<left.options.length;i++) if(left.options[i].selected==true){ f=1;
for(j=0;j<right.options.length;j++)
if(left.options[i].text==right.options[j].text) f=0;
if(f) { var objOption = new Option(left.options[i].text,left.options[i].text);
document.getElementById('right').options.add(objOption); }  }
list.value=''; for(k=0;k<right.options.length;k++) bind=bind+right.options[k].text+'.';
list.value=bind;
}
function moveBackward()
{
var right=document.getElementById('right');
var list=document.getElementById('list');
var bind='';
var j;
for(j=0;j<right.options.length;j++)
if(right.options[j].selected==true)
{
right.remove(right.selectedIndex);
}
list.value=''; for(k=0;k<right.options.length;k++) bind=bind+right.options[k].text+'.';
list.value=bind;
}
</script>
</head>
<body></body>
</html>
<?php
if(isset($_SESSION['heosusermode']) && ($_SESSION['heosusermode']==1 || $_SESSION['heosusermode']=3 ) && $_SESSION['heosusermode']!='' && !empty($_SESSION['heosusermode'])){
echo "<form method=post action='screenrights.php'>
<table border=0 cellspacing=1 cellpadding=0>
<tr><th colspan=3>Screen Rights</th></tr>
<tr><td>User Type</td><td><select name=\"usertype\" onchange=\"return xajax_setScreenlist(this.value,'$con')\"><option value=\"none\">Select</option>";
$exquer=mysql_query("select * from usertypemaster order by UserType");
while($ar=mysql_fetch_array($exquer)){ $userid=$ar['UserId']; $usertype=$ar['UserType'];
echo "<option value=$userid >$usertype</option>"; }
print "</select></td></tr>
<tr><td colspan=3><div align=center id=\"divarea\"></div></td></tr>
<tr><td align=center colspan=3><input type=\"submit\" name=\"btnsubmit\" id=\"btnsubmit\" value=\"Allow\" disabled></td></tr>
</table><input type=\"hidden\" name=\"list\" id=\"list\"></form>";
}
else echo "<script language=\"javascript\">window.location='loginscreen.php';</script> ";

if(isset($_POST['btnsubmit'])){
$userid=$_SESSION['heosusermode']; $usertype=$_POST['usertype'];
$delete=mysql_query("delete from screenrights where UserType='$usertype'");
$arr=explode('.',$_POST['list']);
foreach($arr as $k=>$value){
if(!empty($value)){
$select=mysql_query("select ScreenId from screenmaster where ScreenName='$value'"); $scrid=mysql_result($select,'ScreenId');
$insert=mysql_query("insert into screenrights values('$usertype','$scrid')"); }
}
}

?>
