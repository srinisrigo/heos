<?php include "xajaxtransaction.php"; ?>
<html>
<head>
<?php $xajax->printJavascript(); ?>
<title>Marks Entry</title>
<link href="./Images/heoscss.css" rel="stylesheet">
<script language="javascript">
function addOption(selectId, txt, val){ var objOption = new Option(txt,val);
document.getElementById(selectId).options.add(objOption); }
function btover(obj,cname){ obj.className=cname; }

function setMarktotal(curobj,count,assmntcnt,maxmark,alltotal){
if(curobj.value > maxmark){ alert('Entered mark is Exceeded the Assigned Mark'); curobj.value=""; return false; }
var st=''; var tcount=0; var tid="total["+count+"]";  var tobj=document.getElementById(tid);
var sid="status["+count+"]";  var sobj=document.getElementById(sid);
for(i=1;i<=assmntcnt;i++){
var id="assesmenttype"+i+"["+count+"]"; var obj=document.getElementById(id);
if(parseInt(obj.value)) tcount=tcount+parseInt(obj.value);
}
if(tcount!=0){ tobj.value=tcount; if(((tcount/alltotal)*100)>=60) sobj.value="Pass"; else sobj.value="Fail"; }
}

function setMarkstatus(count){
var tot="total["+count+"]"; sta="status["+count+"]";
var totobj=document.getElementById(tot); staobj=document.getElementById(sta);
if(parseInt(totobj.value)>=60) staobj.value="Pass"; else staobj.value="Fail";
}
function setMrklistcancel(){ document.getElementById('stulist').innerHTML=""; }
</script>
</head>
<body>
<?php
$con=mysql_connect("192.168.15.26","root","admin"); $db=mysql_select_db('heos');
print "<form method=\"post\">
<table align=center cellspacing=1 cellpadding=0>
<tr class=\"label\"><td>Exam Name</td><td><select class=\"select\" name=\"exname\" id=\"exname\" onChange=\"\"><option value=\"none\">select</option>";
$se=mysql_query("select distinct(ExamNameId) from examttslot",$con);
while($rar=mysql_fetch_array($se)){ $code=$rar['ExamNameId'];
$seExamName=mysql_query("select ExamName from examnames where ExamNameId='$code'",$con); $name=mysql_result($seExamName,0);;
echo "<option value=\"$code\">$name</option>"; }
print "</select></td>
<td>Intake</td><td><select class=\"select\" name=\"intake\" id=\"intake\" onChange=\"\"><option value=\"none\">select</option>";
$se=mysql_query("select * from cohortdetails",$con);
while($rar=mysql_fetch_array($se)){ $intake=$rar['Intake']; $cid=$rar['CohortID']; echo "<option value=\"$cid\">$intake</option>"; }
print "</select></td>
<td>Level of Course</td><td><select class=\"select\" name=\"level\" id=\"level\" onChange=\"return xajax_setMarkcourses(this.value);\"><option value=\"none\">select</option>";
$se=mysql_query("select distinct(LevelOfTheCourse) from coursedetails order by LevelOfTheCourse",$con);
while($rar=mysql_fetch_array($se)){ $level=$rar['LevelOfTheCourse']; echo "<option value=\"$level\">$level</option>"; }
print "</select></td>
<td>Course Name</td><td><select class=\"citizen\" name=\"course\" id=\"course\" onChange=\"return xajax_setMarkterms(this.value,document.getElementById('intake').value);\"><option value=\"none\">select</option></select></td></tr>
<tr class=\"label\"><td>section</td><td><select class=\"select\" name=\"msection\" id=\"msection\"><option value=\"none\">select</option></select></td>
<td>Term</td><td><select class=\"select\" name=\"term\" id=\"term\" onChange=\"return xajax_setMarksubjetcts(this.value,document.getElementById('course').value);\"><option value=\"none\">select</option></select></td>
<td>Subject Name</td><td><select class=\"citizen\" name=\"subject\" id=\"subject\" onChange=\"\"><option value=\"none\">select</option></select></td>
<td>Assestment Type</td><td><select class=\"select\" name=\"assesment\" id=\"assesment\" onChange=\"\"><option value=\"none\">select</option>";
$se=mysql_query("select distinct(Criteria) from assestmentdetails order by Criteria",$con);
while($rar=mysql_fetch_array($se)){ $criteria=$rar['Criteria']; echo "<option value=\"$criteria\">$criteria</option>"; }
print "</select></td></tr>
<tr class=\"label\"><td colspan=8 align=\"center\"><input class=\"buttonstatic\" type=\"button\" value=\"Create\" onmouseover=\"btover(this,'buttonover');\" onmouseout=\"btover(this,'buttonstatic');\" onclick=\"return xajax_setMarkcreate(
document.getElementById('exname').value,document.getElementById('intake').value,document.getElementById('course').value,
document.getElementById('term').value,document.getElementById('subject').value,document.getElementById('assesment').value,document.getElementById('msection').value);\"></td></tr>
</table><br><br><div id=\"stulist\"></div></form>";
?>
<?php
if(isset($_POST['savelist'])){

$examid=$_POST['exname'];
$intakeid=$_POST['intake'];
$ccode=$_POST['course'];
$termno=$_POST['term'];
$subcode=$_POST['subject'];
$assmntname=$_POST['assesment'];
$section=$_POST['msection'];

$arr=array();

$stuid=$_POST['stuid'];
$stuname=$_POST['stuname'];
$total=$_POST['total'];
$status=$_POST['status'];
$noofass=0;
$tablename=strtolower($examid.$intakeid.$ccode.$termno.$subcode.$assmntname.$section);
$con=mysql_connect('192.168.15.26','root','admin'); $db=mysql_select_db('heos');
$cquery="CREATE TABLE `$tablename` (`recordId` bigint(3) NOT NULL auto_increment,`studentid` varchar(20) default NULL,`studentname` varchar(75) default NULL,";

$asstype=mysql_query("select AssestmentType from assestmentdetails where Criteria='$assmntname'",$con);
while($asstypear=mysql_fetch_array($asstype)){ $asstpe=$asstypear['AssestmentType']; $noofass++;
$cquery=$cquery.$asstpe." int(3) default NULL,"; }
$cquery=$cquery."`total` int(4) default NULL,`status` varchar(6) default NULL,PRIMARY KEY  (`RecordId`)) ENGINE=MyISAM DEFAULT CHARSET=latin1;";
$ctable=mysql_query($cquery,$con);

$arr=$stuid; $arercount=0;
foreach($arr as $k=>$v){ $stuidv=$v; $stunamev=$stuname[$k];
$iquery="insert into $tablename values ('0','$stuidv','$stunamev',";
for($ii=1;$ii<=$noofass;$ii++){ $namess="assesmenttype".$ii; $ass=$_POST[$namess]; $iquery=$iquery."'".$ass[$k]."',"; }
$totalv=$total[$k]; $statusv=$status[$k];  $iquery=$iquery."'".$totalv."','".$statusv."')";
if($statusv=="Fail") $arercount++;
$insert=mysql_query($iquery,$con);
}
if($arercount>0){
$sele=mysql_query("select Intake from cohortdetails where CohortID='$intakeid'",$con); $intake=mysql_result($sele,'Intake');
$sele=mysql_query("select SubjectCode from subjectcreditdetails where SubjectCreditId='$subcode'",$con); $subcode=mysql_result($sele,'SubjectCode');
$setexist=mysql_query("select count(*) from arreardetails where Intake='$intake' and CourseCode='$ccode' and Term='$termno' and SubjectCode='$subcode' and Criteria='$assmntname' and ExamNameId='$examid' and SectionId='$section'",$con); $exist=mysql_result($setexist,0);
if($exist==0)$insert=mysql_query("insert into arreardetails values ('0', '$intake', '$ccode', '$termno', '$subcode', '$arercount','$assmntname','$examid','$section')",$con);
}
}

if(isset($_POST['updatelist'])){

$examid=$_POST['exname'];
$intakeid=$_POST['intake'];
$ccode=$_POST['course'];
$termno=$_POST['term'];
$subcode=$_POST['subject'];
$assmntname=$_POST['assesment'];
$section=$_POST['msection'];

$arr=array();

$stuid=$_POST['stuid'];
$stuname=$_POST['stuname'];
$total=$_POST['total'];
$status=$_POST['status'];

$noofass=0;
$tablename=strtolower($examid.$intakeid.$ccode.$termno.$subcode.$assmntname.$section);
$con=mysql_connect('192.168.15.26','root','admin'); $db=mysql_select_db('heos');
$arr=$stuid; $arercount=0;
foreach($arr as $k=>$v){ $stuidv=$v; $stunamev=$stuname[$k];  $assescount=1;
$iquery="update `$tablename` set studentname='".$stunamev."',";
$asstype=mysql_query("select AssestmentType from assestmentdetails where Criteria='$assmntname'",$con);
while($asstypear=mysql_fetch_array($asstype)){ $asstpe=$asstypear['AssestmentType'];
$namess="assesmenttype".$assescount; $ass=$_POST[$namess];
$iquery=$iquery.$asstpe."='".$ass[$k]."',"; $assescount++; }
$totalv=$total[$k]; $statusv=$status[$k];
$iquery=$iquery."total='".$totalv."',status='".$statusv."' where studentid='".$stuidv."'";
if($statusv=="Fail") $arercount++;
$insert=mysql_query($iquery,$con);
}

if($arercount>0){
$sele=mysql_query("select Intake from cohortdetails where CohortID='$intakeid'",$con); $intake=mysql_result($sele,'Intake');
$sele=mysql_query("select SubjectCode from subjectcreditdetails where SubjectCreditId='$subcode'",$con); $subcode=mysql_result($sele,'SubjectCode');
$setexist=mysql_query("select count(*) from arreardetails where Intake='$intake' and CourseCode='$ccode' and Term='$termno' and SubjectCode='$subcode' and Criteria='$assmntname' and ExamNameId='$examid' and SectionId='$section'",$con); $exist=mysql_result($setexist,0);
if($exist==0)$insert=mysql_query("insert into arreardetails values ('0', '$intake', '$ccode', '$termno', '$subcode', '$arercount','$assmntname','$examid','$section')",$con);
else $insert=mysql_query("update arreardetails set NoOfStudents='$arercount' where Intake='$intake' and CourseCode='$ccode' and Term='$termno' and SubjectCode='$subcode' and Criteria='$assmntname' and ExamNameId='$examid' and SectionId='$section'",$con);
}
if($arercount==0){
$sele=mysql_query("select Intake from cohortdetails where CohortID='$intakeid'",$con); $intake=mysql_result($sele,'Intake');
$sele=mysql_query("select SubjectCode from subjectcreditdetails where SubjectCreditId='$subcode'",$con); $subcode=mysql_result($sele,'SubjectCode');
$setexist=mysql_query("select count(*) from arreardetails where Intake='$intake' and CourseCode='$ccode' and Term='$termno' and SubjectCode='$subcode' and Criteria='$assmntname' and ExamNameId='$examid' and SectionId='$section'",$con); $exist=mysql_result($setexist,0);
if($exist>0)$insert=mysql_query("delete from arreardetails where Intake='$intake' and CourseCode='$ccode' and Term='$termno' and SubjectCode='$subcode' and Criteria='$assmntname' and ExamNameId='$examid' and SectionId='$section'",$con);
}


}
?>
</body>

</html>
