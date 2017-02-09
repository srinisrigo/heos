<?php session_start(); ?>
<?php require_once(dirname(__FILE__) . '/xajax.inc.php');

function setCourses($level){
$objResponse =& new xajaxResponse();
if($level!='select'){
$con=mysql_connect("192.168.15.26","root","admin"); $db=mysql_select_db("heos",$con);
$rs=mysql_query("select * from coursedetails where LevelOfTheCourse='$level' order by CourseName",$con);
$objResponse->addscript("document.getElementById('course1').options.length=0;");
$objResponse->addScript("addOption('course1','select','none');");
while($re=mysql_fetch_array($rs)){ $ccode=$re["CourseCode"]; $cname=$re["CourseName"];
$objResponse->addScript("addOption('course1','" . $cname . "','" . $ccode . "');");     }
mysql_close($con); }
return $objResponse->getXML();
}

function setSection($date,$intake,$course){
$objResponse =& new xajaxResponse();
if($date==''){ $objResponse->addScript("document.getElementById('date1').focus();");
$objResponse->addScript("document.getElementById('course1').selectedIndex=0;"); return $objResponse->getXML(); }
if($intake=='select'){ $objResponse->addScript("document.getElementById('intake').focus();");
$objResponse->addScript("document.getElementById('course1').selectedIndex=0;"); return $objResponse->getXML(); }
$con=mysql_connect("192.168.15.26","root","admin"); $db=mysql_select_db("heos",$con);
$rs=mysql_query("select distinct(Section) from sectionmaster where CourseCode='$course' and Intake='$intake' order by Section",$con);
$objResponse->addscript("document.getElementById('section1').options.length=0;");
$objResponse->addScript("addOption('section1','select','select');");
while($re=mysql_fetch_array($rs)){ $Section=$re["Section"];
$objResponse->addScript("addOption('section1','" . $Section . "','" . $Section . "');"); }
$objResponse->addscript("document.getElementById('terms1').options.length=0;");
$objResponse->addScript("addOption('terms1','select','select');");
$rs=mysql_query("SELECT NoOfTerms FROM coursedetails  WHERE CourseCode='$course'",$con);
$noofterms=mysql_result($rs,"NoOfTerms");
for($j=1;$j<=$noofterms;$j++) $objResponse->addScript("addOption('terms1','" . $j . "','" . $j . "');");
$rs=mysql_query("select * from timetablesettings where CourseCode='$course'and Intake='$intake'",$con);
while($re=mysql_fetch_array($rs)){ $ttname=$re["TimeTableName"]; $noofslots=$re["NumberOfSlots"]; }
$objResponse->addscript("document.getElementById('slot1').options.length=0;");
$objResponse->addScript("addOption('slot1','select','select');");
for($i=1;$i<=$noofslots;$i++) $objResponse->addScript("addOption('slot1','" . $i . "','" . $i . "');");
return $objResponse->getXML();
}

function setSubject($date,$intake,$course,$section,$term,$slot){
$objResponse =& new xajaxResponse();
if($slot=='select'){ $objResponse->addScript("document.getElementById('slot1').focus();");
return $objResponse->getXML(); }
$con=mysql_connect("192.168.15.26","root","admin"); $db=mysql_select_db("heos",$con);
$rs=mysql_query("select TimeTableName from timetablesettings where CourseCode='$course'and Intake='$intake'",$con);
$ttname=mysql_result($rs,"TimeTableName");
$selecttables = mysql_list_tables("heos");
$tablename=strtolower($ttname.'_'.$course.'_'. $intake .'_'.$section); $exist=0;
while($rs1=mysql_fetch_array($selecttables)) if($tablename==$rs1[0]) $exist=1;
if($exist){
$rs2=mysql_query("SELECT count(*) FROM $tablename WHERE slot='$slot' and todaydate='$date'",$con);
if(mysql_result($rs2,0)>0){
$rs2=mysql_query("SELECT subject FROM $tablename WHERE slot='$slot' and todaydate='$date'",$con);
$subcode=mysql_result($rs2,"subject");
$objResponse->addscript("document.getElementById('subcode').value='$subcode';");
$sql=mysql_query("SELECT SubjectName from subjectcreditdetails where SubjectCode='$subcode'",$con);
$subname=mysql_result($sql,"SubjectName");
$objResponse->addscript("document.getElementById('subject').value='$subname';");
} else { $objResponse->addscript("alert('There is no matches');");
$objResponse->addscript("document.getElementById('date1').value='';");
$objResponse->addscript("document.getElementById('date1').focus();");
$objResponse->addscript("document.getElementById('slot1').selectedIndex=0;");
$objResponse->addscript("document.getElementById('subject').value='';");
}
}
return $objResponse->getXML();
}
$xajax =& new xajax();
$xajax->registerFunction("setCourses");
$xajax->registerFunction("setSection");
$xajax->registerFunction("setSubject");
$xajax->processRequests();
?>
<html>
<head>
<title>Student Attendence</title>
<link href="./Images/heoscss.css" rel="stylesheet">
<script language="javascript" type="text/javascript" src="staffvalidation.js"></script>
<script type="text/javascript" src="./Images/datetimepicker.js"> </script>
<?php $xajax->printJavascript(); ?>
<script language="javascript">
function addOption(selectId,txt, val){ var objOption = new Option(txt,val);
document.getElementById(selectId).options.add(objOption); }

function setabsentdisable(absent,present,leave){
if(present.checked){ leave.selectedIndex=0; absent.checked=0; leave.disabled=1; }
else { absent.checked=1; leave.disabled=0; }
}
function setpresentdisable(absent,present,leave){
if(absent.checked){ present.checked=0; leave.disabled=0; }
else { present.checked=1; leave.disabled=1; leave.selectedIndex=0; }
}
function btover(obj,cname){ obj.className=cname; }
</script>
</head>
<body>
<?php
print "<form method=\"post\">
<table align=center cellspacing=1 cellpadding=0>
<tr class=\"balanceheaderrow\"><td align=center colspan=4>Student Attendence</td></tr>
<tr class=\"label\"><td>Attendance Date</td><td><input class=\"date\" type=\"text\" size=\"9\" readonly name=\"date\" id=\"date1\"><A href=\"javascript:NewCal('date1','yyyymmdd')\"><img src='./Images/Cal.gif' width='18' height='20' border='0'></A></td>
<td>Select Intake</td><td><select class=\"select\" name=\"intake\" id=\"intake\"><option value=\"select\">select</option>";
$con=mysql_connect("192.168.15.26","root","admin"); $db=mysql_select_db("heos",$con);
$rs=mysql_query("select distinct(Intake) from timetablesettings",$con);
while($re=mysql_fetch_array($rs)){ $intake=$re["Intake"]; echo"<option value=\"$intake\">$intake</option>"; }
print "</select></td></tr>
<tr class=\"label\"><td>Level of Course</td><td><select size=\"1\" name=\"levelcom\" id=\"level1\" onChange=\"return xajax_setCourses(this.value);\"><option value=\"select\">select</option>";
$rs=mysql_query("select distinct(LevelOfTheCourse) from coursedetails",$con);
while($re=mysql_fetch_array($rs)){ $level=$re["LevelOfTheCourse"]; echo"<option value=\"$level\">$level</option>"; }
mysql_close($con);
print "</select><td>Course Name</td>
<td><select name=\"course\" id=\"course1\" onChange=\"return xajax_setSection(document.getElementById('date1').value,document.getElementById('intake').value,this.value);\"><option value=\"select\">select</option></select></td></tr>
<tr class=\"label\"><td>Section</td><td><select name=\"section\" id=\"section1\">
<option value=\"select\">select</option></select></td>
<td>Term</td><td><select name=\"terms\"id=\"terms1\"><option value=\"select\">select</option></select></td></tr>
<tr class=\"label\"><td>Slot</td><td><select name=\"slot\" id=\"slot1\" onChange=\"return xajax_setSubject(document.getElementById('date1').value,document.getElementById('intake').value,document.getElementById('course1').value,document.getElementById('section1').value,document.getElementById('terms1').value,this.value);\"><option value=\"select\">select</option></select></td>
<td>Subject Name</td><td><input class=\"input\" type=\"text\" name=\"subject\" id=\"subject\" readonly><input type=\"hidden\" name=\"subcode\" id=\"subcode\"></td></tr>
<tr class=\"label\"><td align=center colspan=4><input class=\"buttonstatic\" type=\"submit\" name=\"btnsubmit\" value=\"Submit\" onmouseover=\"btover(this,'buttonover');\" onmouseout=\"btover(this,'buttonstatic');\"></td>
</tr></table></form>";
?>

<?php
if(isset($_POST['btnsubmit'])){
$date=$_POST['date'];
$intake=$_POST['intake'];
$course=$_POST['course'];
$section=$_POST['section'];
$terms=$_POST['terms'];
$slot=$_POST['slot'];
$subname=$_POST['subject'];
$subject=$_POST['subcode'];

$con=mysql_connect("192.168.15.26","root","admin"); $db=mysql_select_db("heos",$con);
$selexist=mysql_query("select count(*) from studattendencemark where date='$date' and intake='$intake' and coursecode='$course' and subjectcode='$subject' and section='$section'",$con);
if(mysql_result($selexist,0)==0){
print "<form method=\"post\">
<table align=center cellspacing=1 cellpadding=0><tr class=\"label\"><td colspan=6 align=center>Student Attendence<input type=\"hidden\" name=\"podate\" value=\"$date\"></td></tr>
<tr class=\"label\"><td>Intake</td><td class=\"balanceheaderrow\"><input type=\"hidden\" name=\"pointake\" value=\"$intake\">$intake</td>
<td>Course</td><td class=\"balanceheaderrow\"><input type=\"hidden\" name=\"pocourse\" value=\"$course\">$course</td>
<td>Section</td><td class=\"balanceheaderrow\"><input type=\"hidden\" name=\"posection\" value=\"$section\">$section</td></tr>
<tr class=\"label\"><td>Term</td><td class=\"balanceheaderrow\">$terms</td><td>Slot</td><td class=\"balanceheaderrow\">$slot</td>
<td>Subject Name</td><td class=\"balanceheaderrow\"><input type=\"hidden\" name=\"posubjet\" value=\"$subject\">$subname</td></tr>
<tr class=\"label\"><td colspan=6 align=center>Student List</td></tr>
<tr class=\"label\"><td>S.no</td><td>Student ID</td><td>Student Name</td><td>Absent</td><td>Present</td><td>Reason</td></tr>";
$stulist=mysql_query("select * from student where (studentid) NOT IN (select Studentid from studentsubject) and intake='$intake' and coursecode='$course' and section='$section'",$con);
$sno=1; $arinc=0;
while($stuarr=mysql_fetch_array($stulist)){
$recordid=$stuarr['recordid'];  $studentid=$stuarr['studentid'];  $studentname=$stuarr['studentname'];
echo "<tr class=\"label\"><td>".$sno."</td>
<td>$studentid</td><td>$studentname</td><td><input type=\"checkbox\" name=\"absent[".$arinc."]\" id=\"absent[".$arinc."]\" value=\"".$recordid."\" onClick=\"return setpresentdisable(this,document.getElementById('present[".$arinc."]'),document.getElementById('reason[".$arinc."]'));\"></td>
<td><input type=\"checkbox\" name=\"present[".$arinc."]\" id=\"present[".$arinc."]\" value=\"".$recordid."\" onClick=\"return setabsentdisable(document.getElementById('absent[".$arinc."]'),this,document.getElementById('reason[".$arinc."]'));\" checked></td>
<td><select name=\"reason[".$arinc."]\" id=\"reason[".$arinc."]\" disabled><option value=0>select</option><option value=1>Personal Work</option><option value=2>Not Feeling Well</option><option value=3>Industrial Visit</option><option value=4>Culturals</option></select></td></tr>";
$sno++; $arinc++; }
print "<tr class=\"label\"><td colspan=6 align=center><input type=\"hidden\" name=\"presentcount\" value=\"$arinc\"><input class=\"buttonstatic\" type=\"submit\" name=\"btnsave\" value=\"Save\" onmouseover=\"btover(this,'buttonover');\" onmouseout=\"btover(this,'buttonstatic');\"></td></tr></table></form>";
}
if(mysql_result($selexist,0)==1){
echo "<script langauge=\"javascript\">if(confirm('Attendence Already Marked')){if(confirm('Do you want to Edit')){}else{self.location='StudentAttendence.php';}}else{self.location='StudentAttendence.php';}</script>";
$selatt=mysql_query("select * from studattendencemark where date='$date' and intake='$intake' and coursecode='$course' and subjectcode='$subject' and section='$section'",$con);
while($attarr=mysql_fetch_array($selatt)){ $attid=$attarr['attendenceid']; $attpresent=$attarr['present']; $attabsent=$attarr['absent']; $attleavereason=$attarr['leavereason']; }
$prearr=explode('*',$attpresent); $absarr=explode('*',$attabsent); $resarr=explode('*',$attleavereason);
print "<form method=\"post\">
<table align=center cellspacing=1 cellpadding=0><tr class=\"label\"><td colspan=6 align=center>Student Attendence<input type=\"hidden\" name=\"podate\" value=\"$date\"></td></tr>
<tr class=\"label\"><td>Intake</td><td class=\"balanceheaderrow\"><input type=\"hidden\" name=\"pointake\" value=\"$intake\">$intake</td>
<td>Course</td><td class=\"balanceheaderrow\"><input type=\"hidden\" name=\"pocourse\" value=\"$course\">$course</td>
<td>Section</td><td class=\"balanceheaderrow\"><input type=\"hidden\" name=\"posection\" value=\"$section\">$section</td></tr>
<tr class=\"label\"><td>Term</td><td class=\"balanceheaderrow\">$terms</td><td>Slot</td><td class=\"balanceheaderrow\">$slot</td>
<td>Subject Name</td><td class=\"balanceheaderrow\"><input type=\"hidden\" name=\"posubjet\" value=\"$subject\">$subname</td></tr>
<tr class=\"label\"><td colspan=6 align=center>Student List</td></tr>
<tr class=\"label\"><td>S.no</td><td>Student ID</td><td>Student Name</td><td>Absent</td><td>Present</td><td>Reason</td></tr>";
$stulist=mysql_query("select * from student where (studentid) NOT IN (select Studentid from studentsubject) and intake='$intake' and coursecode='$course' and section='$section'",$con);
$sno=1; $arinc=0;
while($stuarr=mysql_fetch_array($stulist)){
$recordid=$stuarr['recordid'];  $studentid=$stuarr['studentid'];  $studentname=$stuarr['studentname'];
echo "<tr class=\"label\"><td>".$sno."</td><td>$studentid</td><td>$studentname</td>";
$absentmark=0; $presentmark=0;
foreach($absarr as $k=>$absentv) if($absentv==$recordid){ $absentmark=1; $resnkey=$k; }
if($absentmark){ print "<td><input type=\"checkbox\" name=\"absent[".$arinc."]\" id=\"absent[".$arinc."]\" value=\"".$recordid."\" onClick=\"return setpresentdisable(this,document.getElementById('present[".$arinc."]'),document.getElementById('reason[".$arinc."]'));\" checked></td>";
print "<td><input type=\"checkbox\" name=\"present[".$arinc."]\" id=\"present[".$arinc."]\" value=\"".$recordid."\" onClick=\"return setabsentdisable(document.getElementById('absent[".$arinc."]'),this,document.getElementById('reason[".$arinc."]'));\"></td>";
foreach($resarr as $k=>$reasonv);
print "<td><select name=\"reason[".$arinc."]\" id=\"reason[".$arinc."]\">";
if($resarr[$resnkey]==0) echo "<option value=0 selected>select</option>"; else  echo "<option value=0>select</option>";
if($resarr[$resnkey]==1) echo "<option value=1 selected>Personal Work</option>"; else  echo "<option value=1>Personal Work</option>";
if($resarr[$resnkey]==2) echo "<option value=2 selected>Not Feeling Well</option>"; else  echo "<option value=2>Not Feeling Well</option>";
if($resarr[$resnkey]==3) echo "<option value=3 selected>Industrial Visit</option>"; else  echo "<option value=3>Industrial Visit</option>";
if($resarr[$resnkey]==4) echo "<option value=4 selected>Culturals</option>"; else  echo "<option value=4>Culturals</option>";
}
else {
print "<td><input type=\"checkbox\" name=\"absent[".$arinc."]\" id=\"absent[".$arinc."]\" value=\"".$recordid."\" onClick=\"return setpresentdisable(this,document.getElementById('present[".$arinc."]'),document.getElementById('reason[".$arinc."]'));\"></td>";
print "<td><input type=\"checkbox\" name=\"present[".$arinc."]\" id=\"present[".$arinc."]\" value=\"".$recordid."\" onClick=\"return setabsentdisable(document.getElementById('absent[".$arinc."]'),this,document.getElementById('reason[".$arinc."]'));\" checked></td>";
print "<td><select name=\"reason[".$arinc."]\" id=\"reason[".$arinc."]\" disabled><option value=0>select</option><option value=1>Personal Work</option><option value=2>Not Feeling Well</option><option value=3>Industrial Visit</option><option value=4>Culturals</option></select></td></tr>";
}
$sno++; $arinc++; }
print "<tr class=\"label\"><td colspan=6 align=center><input class=\"buttonstatic\" type=\"submit\" name=\"btnupdate\" value=\"Update\" onmouseover=\"btover(this,'buttonover');\" onmouseout=\"btover(this,'buttonstatic');\"></td></tr></table></form>";
}
}
?>
<?php

if(isset($_POST['btnsave'])){
$date=$_POST['podate'];
$intake=$_POST['pointake'];
$course=$_POST['pocourse'];
$section=$_POST['posection'];
$subject=$_POST['posubjet'];
$arobj=array();
$con=mysql_connect("192.168.15.26","root","admin"); $db=mysql_select_db("heos",$con);
$arobj=$_POST['present']; $present=implode('*',$arobj);
if(!empty($_POST['absent'])){ $arobj=$_POST['absent']; $absent=implode('*',$arobj);
$arobj=$_POST['reason']; $reason=implode('*',$arobj); }
else { $reason='*';  $absent='*'; }
$insert=mysql_query("insert into studattendencemark values('0','$intake','$course','$present','$absent','$reason','$date','$subject','$section')",$con);
if($insert) echo "<script language=\"javascript\">alert('Successive Done');</script>"; else echo "<script language=\"javascript\">alert('Failed, try again');</script>";
}
?>
<?php
if(isset($_POST['btnupdate']))
{
$date=$_POST['podate'];
$intake=$_POST['pointake'];
$course=$_POST['pocourse'];
$section=$_POST['posection'];
$subject=$_POST['posubjet'];
$arobj=array();
$con=mysql_connect("192.168.15.26","root","admin"); $db=mysql_select_db("heos",$con);
$arobj=$_POST['present']; $present=implode('*',$arobj);
if(!empty($_POST['absent'])){ $arobj=$_POST['absent']; $absent=implode('*',$arobj);
$arobj=$_POST['reason']; $reason=implode('*',$arobj); }
else { $reason='*';  $absent='*'; }
$update=mysql_query("update studattendencemark set present='$present',absent='$absent',leavereason='$reason' where date='$date' and intake='$intake' and coursecode='$course' and subjectcode='$subject' and section='$section'",$con);
if($update) echo "<script language=\"javascript\">alert('Successive Done');</script>"; else echo "<script language=\"javascript\">alert('Failed, try again');</script>";
}
?>
</body>
</html>
