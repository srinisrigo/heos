<?php session_start(); ?>
<html>
<head>
<title>Staff Attendence</title>
<link href="./Images/heoscss.css" rel="stylesheet">
<script type="text/javascript" src="./Images/datetimepicker.js"> </script>

<script language="javascript">

function staffabsentdisable(present,absent,leave){
if(present.checked){ leave.selectedIndex=0; absent.checked=0; leave.disabled=1; }
else { absent.checked=1; leave.disabled=0; } }

function btover(obj,cname){ obj.className=cname; }

function staffpresentdisable(absent,present,leave){
if(absent.checked){ present.checked=0; leave.disabled=0; }
else { present.checked=1; leave.disabled=1; leave.selectedIndex=0; } }

function setSubmit(){
var result=confirm('Do want to edit click OK,otherwise click cancel');
if(result) return true; else return false;
}
</script>
</head>
<body>
<?php
print "<form  name=\"Form1\" method=\"post\" enctype=\"multipart/form-data\">
<table align=center cellspacing=1 cellpadding=0>
<tr class=\"balanceheaderrow\"><td align=center colspan=5>STAFF ATTENDANCE</td></tr>
<tr class=\"label\"><td>Department</td><td><select class=\"select\" name=\"course\" id=\"course1\"><option value=\"none\">select</option>";
$con=mysql_connect("192.168.15.26","root","admin"); $db=mysql_select_db("heos",$con);
$rs=mysql_query("select distinct(department) from staffpersonalinformation",$con);
while($re=mysql_fetch_array($rs)){ $ccode=$re["department"];
$selcname=mysql_query("select CourseName from coursedetails where CourseCode='$ccode'",$con); $cname=mysql_result($selcname,0);
echo "<option value=\"$ccode\">$cname</option>"; }
print "</select></td><td>Attendance Date</td>
<td><input class=\"date\" type=\"text\" readonly name=\"date\" id=\"date1\">
<A href=\"javascript:NewCal('date1','yyyymmdd')\"><img src='./Images/Cal.gif' width='18' height='20' border='0'></A></td>
<td><input type=\"submit\" class=\"buttonstatic\" name=\"btnsubmit\" value=\"Submit\" onmouseover=\"btover(this,'buttonover');\" onmouseout=\"btover(this,'buttonstatic');\"></td></tr>
</table></form>";

?>
<?php

if(isset($_POST['btnsubmit'])){

$course=$_POST['course'];
$date=$_POST['date'];
$con=mysql_connect("192.168.15.26","root","admin"); $db=mysql_select_db("heos",$con);
$atexist=mysql_query("select count(*) from staffattendencemark where date='$date' and coursecode='$course'",$con);;
if(mysql_result($atexist,0)==0){
$listcount=mysql_query("select count(*) from staffpersonalinformation where department='$course'",$con);
if(mysql_result($listcount,0)==0) echo "<script langauge=\"javascript\">alert('No Staffs');</script>";
else {
$stafflist=mysql_query("select * from staffpersonalinformation where department='$course' order by name",$con);
$sno=1; $a=0;
print "<form method=\"post\">
<table align=center cellspacing=1 cellpadding=0>
<tr class=\"label\"><td colspan=2>Department</td><td class=\"balanceheaderrow\">$course</td><td colspan=2>Attendance Date</td><td class=\"balanceheaderrow\">".date('d-m-Y',strtotime($date))."</td></tr>
<tr class=\"balanceheaderrow\"><td>S.No</td><td>Staff Id</td><td>Name</td><td>Absent</td><td>Present</td><td>Leave Reason</td></tr>";
while($r=mysql_fetch_array($stafflist)){
$RecordId=$r["staffinformationid"];  $RegistrationId=$r["staffid"]; $FirstName=$r["name"];
print "<tr class=\"label\"><td>$sno</td><td>$RegistrationId</td><td>$FirstName</td>";
print "<td><input type=\"checkbox\" name=absent[".$a."] id=absent[".$a."] onClick=\"return staffpresentdisable(this,document.getElementById('present[".$a."]'),document.getElementById('leave[".$a."]'));\" value=\"$RecordId\"></td>
<td><input type=\"checkbox\" name=present[".$a."] id=present[".$a."] checked onClick=\"return staffabsentdisable(this,document.getElementById('absent[".$a."]'),document.getElementById('leave[".$a."]'));\" value=\"$RecordId\"></td>
<td><select class=\"select\" name=leave[".$a."] id=leave[".$a."] disabled><option value='0' selected>Select</option><option value='1'>Personal Work</option><option value='2'>Not Feeling Well</option><option value='3'>Ind Visit</option><option value='4'>Culturals</option></select></td></tr>";
$sno=$sno+1; $a++;
}
print "<tr class=\"label\"><td colspan=6 align=\"center\"><input type=\"hidden\" name=\"pocourse\" value=\"$course\"><input type=\"hidden\" name=\"podate\" value=\"$date\">
<input type=\"submit\" class=\"buttonstatic\" name=\"btncancel\" value=\"Cancel\" onmouseover=\"btover(this,'buttonover');\" onmouseout=\"btover(this,'buttonstatic');\">
<input type=\"submit\" class=\"buttonstatic\" name=\"btnsave\" id=\"btnsave\" value=\"Save\" onmouseover=\"btover(this,'buttonover');\" onmouseout=\"btover(this,'buttonstatic');\">
</td></tr></table></form>";
}
}

if(mysql_result($atexist,0)>0){
echo "<script langauge=\"javascript\">if(confirm('Attendence Already Marked')){if(confirm('Do you want to Edit')){}else{self.location='staffattendence.php';}}else{self.location='staffattendence.php';}</script>";
print "<form method=\"post\">
<table align=center cellspacing=1 cellpadding=0>
<tr class=\"label\"><td colspan=2>Department</td><td class=\"balanceheaderrow\">$course</td><td colspan=2>Attendance Date</td><td class=\"balanceheaderrow\">".date('d-m-Y',strtotime($date))."</td></tr>
<tr class=\"balanceheaderrow\"><td>S.No</td><td>Staff Id</td><td>Name</td><td>Absent</td><td>Present</td><td>Leave Reason</td></tr>";
$sno=1; $a=0;
$stafflist=mysql_query("select * from staffpersonalinformation where department='$course' order by name",$con);
while($r=mysql_fetch_array($stafflist)){
$RecordId=$r["staffinformationid"]; $RegistrationId=$r["staffid"]; $FirstName=$r["name"]; $attened=1;
$existlist=mysql_query("select * from staffattendencemark where coursecode='$course' and date='$date'",$con);
while($r1=mysql_fetch_array($existlist)){
$attendenceid=$r1["attendenceid"]; $pset=$r1["present"]; $aset=$r1["absent"]; $rset=$r1["leavereason"];
$parr=explode('*',$pset); $aarr=explode('*',$aset); $reason=explode('*',$rset); }

print "<tr class=\"label\"><td>$sno</td><td>$RegistrationId</td><td>$FirstName</td>";
foreach($parr as $k1=>$v1) if($v1==$RecordId) $attened=1;
foreach($aarr as $k2=>$v2) if($v2==$RecordId) { $attened=0;  $keyvalue=$k2; }
$st=''; foreach($reason as $key=>$value) $st=$st.$value;
if($attened) print "<td><input type=\"checkbox\" name=absent[".$a."] id=absent[".$a."] onClick=\"return staffpresentdisable(this,document.getElementById('present[".$a."]'),document.getElementById('leave[".$a."]'));\" value=\"$RecordId\"></td>
<td><input type=\"checkbox\" name=present[".$a."] id=present[".$a."] checked onClick=\"return staffabsentdisable(this,document.getElementById('absent[".$a."]'),document.getElementById('leave[".$a."]'));\" value=\"$RecordId\"></td>
<td><select class=\"select\" name=leave[".$a."] id=leave[".$a."] disabled><option value='0' selected>Select</option><option value='1'>Personal Work</option><option value='2'>Not Feeling Well</option><option value='3'>Ind Visit</option><option value='4'>Culturals</option></select></td>";
else
{
print "<td><input type=\"checkbox\" name=absent[".$a."] id=absent[".$a."] checked onClick=\"return staffpresentdisable(this,document.getElementById('present[".$a."]'),document.getElementById('leave[".$a."]'));\" value=\"$RecordId\"></td>
<td><input type=\"checkbox\" name=present[".$a."] id=present[".$a."] onClick=\"return staffabsentdisable(this,document.getElementById('absent[".$a."]'),document.getElementById('leave[".$a."]'));\" value=\"$RecordId\"></td>";
print "<td><select class=\"select\" name=leave[".$a."] id=leave[".$a."]>";
if($reason[$keyvalue]==0) echo "<option value=\"0\" selected>Select</option>"; else echo "<option value=\"0\">Select</option>";
if($reason[$keyvalue]==1) echo "<option value='1' selected>Personal Work</option>"; else echo "<option value='1'>Personal Work</option>";
if($reason[$keyvalue]==2) echo "<option value='2' selected>Not Feeling Well</option>"; else echo "<option value='2'>Not Feeling Well</option>";
if($reason[$keyvalue]==3) echo "<option value='3' selected>Ind Visit</option>"; else echo "<option value='3'>Ind Visit</option>";
if($reason[$keyvalue]==4) echo "<option value='4' selected>Culturals</option>"; else echo "<option value='4'>Culturals</option>";
}
print "</select></td></tr>";
$sno=$sno++; $a++;
}
print "<tr class=\"label\"><td colspan=6 align=\"center\"><input type=\"hidden\" name=\"attid\" value=\"$attendenceid\">
<input type=\"hidden\" name=\"pocourse\" value=\"$course\"><input type=\"hidden\" name=\"podate\" value=\"$date\">
<input type=\"submit\" class=\"buttonstatic\" name=\"btncancel\" value=\"Cancel\" onmouseover=\"btover(this,'buttonover');\" onmouseout=\"btover(this,'buttonstatic');\">
<input type=\"submit\" class=\"buttonstatic\" name=\"btnupdate\" id=\"btnupdate\" value=\"Update\" onmouseover=\"btover(this,'buttonover');\" onmouseout=\"btover(this,'buttonstatic');\">
</td></tr></table></form>";
}
}
?>

<?php
if(isset($_POST['btnsave']))
{
$course=$_POST['pocourse'];
$date=$_POST['podate'];
$con=mysql_connect("192.168.15.26","root","admin"); $db=mysql_select_db("heos",$con);
$present =implode('*',$_POST['present']);
if(!empty($_POST['absent'])){ $absent =implode('*',$_POST['absent']); $leave=implode('*',$_POST['leave']); }
else { $absent='*'; $leave='*'; }
$insert=mysql_query("insert into staffattendencemark values('0','0','$course','$present','$absent','$leave','$date')",$con);
if($insert) echo "<script langauge=\"javascript\">alert('Successive Done');</script>";
else echo "<script langauge=\"javascript\">alert('Failed');</script>";
}
?>
<?php
if(isset($_POST['btnupdate'])){
$attid=$_POST['attid'];
$course=$_POST['pocourse'];
$date=$_POST['podate'];

$con=mysql_connect("192.168.15.26","root","admin"); $db=mysql_select_db("heos",$con);
$present =implode('*',$_POST['present']);
if(!empty($_POST['absent'])){ $absent =implode('*',$_POST['absent']); $leave=implode('*',$_POST['leave']); }
else { $absent='*'; $leave='*'; }
$update=mysql_query("update staffattendencemark set present='$present',absent='$absent',leavereason='$leave' where attendenceid='$attid'",$con);
if($update) echo "<script langauge=\"javascript\">alert('Successive Done');</script>";
else echo "<script langauge=\"javascript\">alert('Failed');</script>";
}
?>
</body>
</html>
