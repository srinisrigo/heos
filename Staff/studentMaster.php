<?php session_start(); ?>
<?php include "xajaxtransaction.php"; include "./Images/dbconnection.php"; ?>
<html>
<?php $xajax->printJavascript(); ?>
<head><title>Student Master</title>
<script type="text/javascript" src="./Images/datetimepicker.js"></script>
<script type="text/javascript" src="./Images/transactionscript.js"></script>
<link rel="stylesheet" href="./Images/heoscss.css">
<script language="javascript"> function changeimage(obj,c) { obj.className=c; }
function btover(obj,cname){ obj.className=cname; }
</script>
</head>
<body>
<?php
// button bgcolor #F9F9F9
print "<form action=\"studentMaster.php\" method=POST>
<table align=center cellspacing=1 cellpadding=0>
<tr class=\"label\"><td align=\"center\" colspan=3><font size=3px>Student Master</font></td></tr>
<tr class=\"label\"><td>Student/Applicant ID</td><td colspan=2><table cellspacing=1 cellpadding=0><tr class=\"label\"><td><input class=\"input\" type=\"text\" name=\"studentid\" id=\"studentid\" onChange=\"return xajax_appstudetails(this.value);\"></td><td><div id=\"idavailable\"></div></td></tr></table></td></tr>
<tr class=\"label\"><td>Fine Amount</td><td>None</td><td><div id=\"payfinediv\"><input class=\"input\" type=\"text\" size=6 dir=\"rtl\" name=\"fineamount\" id=\"fineamount\" value=\"0\" disabled>&nbsp;&nbsp;Paid&nbsp;<select class=\"select\" name=\"payfine\" id=\"payfine\" disabled><option value=\"yes\">Yes</option><option value=\"no\">No</option></select></div></td></tr>
<tr class=\"label\"><td>Exam Amount</td><td>None</td><td><div id=\"payexamdiv\"><input class=\"input\" type=\"text\" size=6 dir=\"rtl\" name=\"examamount\" id=\"examamount\" value=\"0\" disabled>&nbsp;&nbsp;Paid&nbsp;<select class=\"select\" name=\"payexam\" id=\"payexam\" disabled><option value=\"yes\">Yes</option><option value=\"no\">No</option></select></div></td></tr>
<tr class=\"label\"><td>Course Fee</td><td>None</td><td>Paid Amount :&nbsp;None</td></tr>
<tr class=\"label\"><td>Transfer to Course</td><td>None</td><td><select class=\"select\" name=\"transferbranch\" id=\"transferbranch\" disabled onChange=\"return xajax_setTranfer(this.value);\"><option value=\"none\">- - Select the course - -</option>";

$select=mysql_query("select * from coursedetails",$con);
while($a=mysql_fetch_array($select)){ $code=$a['CourseCode']; $name=$a['CourseName']; echo "<option value=\"$code\">$name</option>"; }
print "</select></td></tr>
<tr class=\"label\"><td>English class</td><td colspan=2><select class=\"select\" name=\"englishclass\" id=\"englishclass\" disabled><option value=\"yes\">Yes</option><option value=\"no\">No</option></select></td></tr>
<tr class=\"label\"><td>Discontinued</td><td colspan=2><div id=\"discontinuediv\"><select class=\"select\" name=\"active\" id=\"active\" disabled><option value=\"yes\">Yes</option><option value=\"no\">No</option></select>&nbsp;&nbsp;New Student ID:&nbsp;<input class=\"input\" type=\"text\" name=\"newstudentid\" id=\"newstudentid\" disabled></div></td></tr>
<tr class=\"label\"><td>VISA cleared</td><td colspan=2><select class=\"select\" name=\"visaclear\" id=\"visaclear\" disabled><option value=\"yes\">Yes</option><option value=\"no\">No</option></select></td></tr>
<tr class=\"label\"><td align=\"center\" colspan=3><input class=\"buttonstatic\" type=\"button\" value=\"Cancel\" class=\"buttonmouseover\" onmouseover=\"btover(this,'buttonover');\" onmouseout=\"btover(this,'buttonstatic');\">&nbsp;&nbsp;&nbsp;<input class=\"buttonstatic\" type=\"submit\" value=\"Update\" name=\"update\" class=\"buttonmouseover\" onmouseover=\"btover(this,'buttonover');\" onmouseout=\"btover(this,'buttonstatic');\"></td></tr>
</table></form>\n";
?>
</body>

</html>
<?php
if(isset($_POST['update'])){

$id=trim($_POST['studentid']);                  $payfine=trim($_POST['payfine']);
$fineamount=trim($_POST['fineamount']);         $payexam=trim($_POST['payexam']);
$examamount=trim($_POST['examamount']);         $transferbranch=trim($_POST['transferbranch']);
$englishclass=trim($_POST['englishclass']);     $active=trim($_POST['active']);
$visa=trim($_POST['visaclear']);

if($payfine=='yes') $up=mysql_query("update student set fine='$fineamount'where sudentid='$id'",$con);
if($payexam=='yes') $up=mysql_query("update student set examfee='$examamount'where sudentid='$id'",$con);
if($englishclass=='yes') $up=mysql_query("update student set englishclass='1'where sudentid='$id'",$con);
if($active=='yes') $up=mysql_query("update student set discontinued='0'where sudentid='$id'",$con);
if($visa=='yes') $up=mysql_query("update student set visa='1'where sudentid='$id'",$con);

if($payfine=='no') $up=mysql_query("update student set fine='0'where sudentid='$id'",$con);
if($payexam=='no') $up=mysql_query("update student set examfee='0'where sudentid='$id'",$con);
if($englishclass=='no') $up=mysql_query("update student set englishclass='0'where sudentid='$id'",$con);
if($active=='no') $up=mysql_query("update student set discontinued='1'where sudentid='$id'",$con);
if($visa=='no') $up=mysql_query("update student set visa='0'where sudentid='$id'",$con);

if($transferbranch!='none') {
$newstudentid=trim($_POST['newstudentid']);
$up=mysql_query("update student set discontinued='0'where sudentid='$id'",$con);
$select=mysql_query("select * from student where sudentid='$id'",$con);
while($a=mysql_fetch_array($select)){
$studentpwd=$a['studentpwd'];                   $studentname=$a['studentname'];
$intake=$a['intake'];                           $nextintake=$a['nextintake'];
$levelofeducation=$a['levelofeducation'];       $mailid=$a['mailid'];
$coursename=$a['coursename'];                   $countryresidence=$a['countryresidence'];
$addreassline1=$a['addreassline1'];             $addressline2=$a['addressline2'];
$addressline3=$a['addressline3'];               $postcode=$a['postcode'];
$citizenof=$a['citizenof'];                     $phonenumber=$a['phonenumber'];
$mobilenumber=$a['mobilenumber'];               $faxnumber=$a['faxnumber'];
$dateofbirth=$a['dateofbirth'];                 $passportnumber=$a['passportnumber'];
$course1=$a['course1'];                         $institute1=$a['institute1'];
$duration1=$a['duration1'];                     $grade1=$a['grade1'];
$course2=$a['course2'];                         $institute2=$a['institute2'];
$duration2=$a['duration2'];                     $grade2=$a['grade2'];
$employer1=$a['employer1'];                     $designation1=$a['designation1'];
$startdate1=$a['startdate1'];                   $enddate1=$a['enddate1'];
$employer2=$a['employer2'];                     $designation2=$a['designation2'];
$startdate2=$a['startdate2'];                   $enddate2=$a['enddate2'];
$refname1=$a['refname1'];                       $refoccupation1=$a['refoccupation1'];
$refinstitution1=$a['refinstitution1'];         $refrelationship1=$a['refrelationship1'];
$refphonenumber1=$a['refphonenumber1'];         $refemail1=$a['refemail1'];
$refname2=$a['refname2'];                       $refoccupation2=$a['refoccupation2'];
$refinstitution2=$a['refinstitution2'];         $refrelationship2=$a['refrelationship2'];
$refphonenumber2=$a['refphonenumber2'];         $refemail2=$a['refemail2'];
$transferbranch=$a['transferbranch'];           $scourseamount=$a['courseamount'];
$sfeepaid=$a['feepaid'];                        $sfine=$a['fine'];
$sexamfee=$a['examfee'];                        $svisa=$a['visa'];
$senglishclass=$a['englishclass'];              $sdiscontinued=$a['discontinued'];
$agentid=$a['agentid'];
}
$find=mysql_query("select DefaultFees from coursedetails where CourseCode='$transferbranch'",$con);
$ffee=mysql_result($find,0);
$insert=mysql_query("insert into student values('0','$newstudentid','$studentpwd','$studentname','$intake',
'$nextintake','$levelofeducation','$mailid','$transferbranch','$countryresidence','$addreassline1','$addressline2',
'$addressline3','$postcode','$citizenof','$phonenumber','$mobilenumber','$faxnumber','$dateofbirth',
'$passportnumber','$course1','$institute1','$duration1','$grade1','$course2','$institute2','$duration2','$grade2',
'$employer1','$designation1','$startdate1','$enddate1','$employer2','$designation2','$startdate2','$enddate2',
'$refname1','$refoccupation1','$refinstitution1','$refrelationship1','$refphonenumber1','$refemail1','$refname2',
'$refoccupation2','$refinstitution2','$refrelationship2','$refphonenumber2','$refemail2','$transferbranch',
'$ffee','0','0','0','1','0','1','$agentid')",$con);
}
}
?>
