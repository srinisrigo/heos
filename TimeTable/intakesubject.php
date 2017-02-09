<?php
require_once(dirname(__FILE__) . '/xajax.inc.php');
function setCourses($intake,$con){
$objResponse =& new xajaxResponse();  echo $con;
$objResponse->addScript("document.getElementById('programme').options.length=0;");
$objResponse->addScript("addOption('programme','Select','none');");
if($intake!='none'){
$selCount=mysql_query("select courses from intakecourseslist",$con);
if(mysql_num_rows($selCount)){
$select=mysql_query("select courses from intakecourseslist where intake='$intake'",$con);
$courselist=mysql_result($select,0);
$Acourselist=explode('.',$courselist);
foreach($Acourselist as $k=>$cid){
if(!empty($cid)){
$cselect=mysql_query("select CourseName from coursedetails where CourseId='$cid'",$con); $coursename=mysql_result($cselect,0);
$objResponse->addScript("addOption('programme','" . $coursename . "','" . $cid . "');"); }
} }
}
return $objResponse->getXML();
}

function setSubjects($startintake,$programmeid,$con){
$objResponse =& new xajaxResponse();
$objResponse->addScript("document.getElementById('coursecodelist1').options.length=0;");
$objResponse->addScript("document.getElementById('coursecodelist2').options.length=0;");
if($startintake=='none'){ $objResponse->addScript("document.getElementById('startedintake').focus();"); return $objResponse->getXML(); }
if($programmeid=='none') return $objResponse->getXML();
else{

$csubarray=array();  $printscode=1;

$select=mysql_query("select subjectcode from coursesubjects where courseid='$programmeid'",$con);
while($arr=mysql_fetch_array($select)){ $subjectcode=$arr['subjectcode']; $printscode=1;
$sname=mysql_query("select SubjectName from subjectcreditdetails where SubjectCode='$subjectcode'",$con);
$subjectname=mysql_result($sname,'SubjectName'); $subjectname=$subjectname.'--'.$subjectcode;
$objResponse->addScript("addOption('coursecodelist1','" . $subjectname . "','" . $subjectcode . "');");
}
$pikcoursecode=mysql_query("select CourseCode from coursedetails where CourseId='$programmeid'",$con); $programcode=mysql_result($pikcoursecode,0);
$intake=$startintake.$programcode;
$exstRec=mysql_query("select count(*) from batchstudyingsubjects where intake='$intake'",$con);
if(mysql_result($exstRec,0)>0){
$exstRecF=mysql_query("select subjectlist from batchstudyingsubjects where intake='$intake'",$con);
$subjectlist=mysql_result($exstRecF,'subjectlist');
$Asubjectlist=explode('.',$subjectlist);
foreach($Asubjectlist as $k=>$subjectcode){
$sname=mysql_query("select SubjectName from subjectcreditdetails where SubjectCode='$subjectcode'",$con);
$subjectname=mysql_result($sname,'SubjectName'); $subjectname=$subjectname.'--'.$subjectcode;  $Asubjectname[]=$subjectname;
$objResponse->addScript("addOption('coursecodelist2','" . $subjectname . "','" . $subjectcode . "');");
}
$subjectname=implode('.',$Asubjectname);
$objResponse->addScript("document.getElementById('list').value='$subjectname';"); }
return $objResponse->getXML(); }
}

$xajax =& new xajax();
$xajax->registerFunction("setCourses");
$xajax->registerFunction("setSubjects");
$xajax->processRequests();
include "./DataBase/dbconnection.php";
?>
<html><head><?php $xajax->printJavascript();?>
<link href="./Images/heoscss.css" rel="stylesheet" type="text/css">
<title>Batch Studying Subjetcs</title>
<script language="javascript">
function addOption(selectId, txt, val){ var objOption = new Option(txt,val); document.getElementById(selectId).options.add(objOption); }

function moveForward(left,right,list){
var bind='';
for(i=0;i<left.options.length;i++) if(left.options[i].selected==true){ f=1;
for(j=0;j<right.options.length;j++)
if(left.options[i].text==right.options[j].text) f=0;
if(f) { var objOption = new Option(left.options[i].text,left.options[i].value);
right.options.add(objOption); }  }
list.value=''; for(k=0;k<right.options.length;k++) bind=bind+right.options[k].text+'.';
list.value=bind;
}

function moveBackward(right,list){
var bind='';
for(j=0;j<right.options.length;j++) if(right.options[j].selected==true) right.remove(right.selectedIndex);
list.value=''; for(k=0;k<right.options.length;k++) bind=bind+right.options[k].text+'.';
list.value=bind;
}
function changeimage(obj,c) { obj.className=c; }
function setProgrammeinitial(obj){ obj.selectedIndex=0; }
</script>
</head><body>
<?php
$selCount=mysql_query("select courses from intakecourseslist");
if(mysql_num_rows($selCount)){
print"<form method='post'>
<table align=center border=0 cellspacing=1 cellpadding=0>
<tr><th colspan=6>Programme Studying Subjects</th></tr>
<tr><td>Intake</td><td><select name='startedintake' id='startedintake' onchange=\"return xajax_setCourses(this.value,'$con')\"><option value='none'>Select</option>";
$chselect=mysql_query("select intake from currentintakelist");
while($arr=mysql_fetch_array($chselect)){ $Intake=$arr['intake']; print "<option value='$Intake'>$Intake</option>"; }
print"</select></td><td>Programme</td><td><select name='programme' id='programme' onchange=\"return xajax_setSubjects(document.getElementById('startedintake').value,this.value,'$con')\"><option value='none'>Select</option></select></td></tr>
<tr><td colspan=6><table align=center border=0 cellspacing=0 cellpadding=0>
<tr><td><select multiple name='coursecodelist1' id='coursecodelist1' size=5></select></td>
<td align='center' style='vertical-align:middle;'><input type='button' value='>>>>' onClick=\"moveForward(document.getElementById('coursecodelist1'),document.getElementById('coursecodelist2'),document.getElementById('list'));\" ><br>
<br><input type='button' value='<<<<' onClick=\"moveBackward(document.getElementById('coursecodelist2'),document.getElementById('list'));\" ></td>
<td><select name='coursecodelist2' id='coursecodelist2' size=5></select><input type='hidden' name='list' id='list'></td>
</tr></table>
</td></tr>
<tr><td colspan=6 align=center><input type='submit' id='AddButton' name='AddButton' value='submit' ></td></tr>
</table></form>"; }
else echo "<p style='text-align:center;'>Insert some Subjects to Subject Details....</p>";

if(isset($_POST['AddButton']))
{
$programme=$_POST['programme'];
$startedintake=$_POST['startedintake'];
$pikcoursecode=mysql_query("select CourseCode from coursedetails where CourseId='$programme'"); $programcode=mysql_result($pikcoursecode,0);
$intake=$startedintake.$programcode;

$SNamelist=$_POST['list']; $SNlist=explode('.',$SNamelist);
foreach($SNlist as $k=>$sname){ if(!empty($sname)){ $Asubcode=explode('--',$sname); $scode[]=$Asubcode[1]; } }
$scodelist=implode('.',$scode);

$insertcheck=mysql_query("select count(*) from batchstudyingsubjects where intake='$intake'");
if(mysql_result($insertcheck,0)==0){
$insert=mysql_query("insert into batchstudyingsubjects values('0','$intake','$scodelist')");
if($insert) echo "<script type='text/javascript'>alert('Successfully Inserted')</script>";
}else {
$insert=mysql_query("update batchstudyingsubjects set subjectlist='$scodelist' where intake='$intake'");
if($insert) echo "<script type='text/javascript'>alert('Successfully Updated')</script>";
}
}

?>
</body></html>
