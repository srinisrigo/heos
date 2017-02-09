<?php
session_start();
require_once(dirname(__FILE__) . '/xajax.inc.php');
function setCourses($intake,$con){
$objResponse =& new xajaxResponse();
$objResponse->addScript("document.getElementById('coursecodelist2').options.length=0;");
$objResponse->addScript("document.getElementById('AddButton').value='Submit';");
if($intake=='none') return $objResponse->getXML();
$con=mysql_connect('localhost','root','admin'); $db=mysql_select_db('heos');
$exstRec=mysql_query("select count(*) from intakecourseslist where intake='$intake'",$con);
if(mysql_result($exstRec,0)>0){
$exstRecF=mysql_query("select courses from intakecourseslist where intake='$intake'",$con);
$courseidlist=mysql_result($exstRecF,'courses');
$Acourseidlist=explode('.',$courseidlist);
foreach($Acourseidlist as $k=>$courseid){
if(!empty($courseid)){
$sname=mysql_query("select CourseName from coursedetails where CourseId='$courseid'",$con);
$coursename=mysql_result($sname,'CourseName'); $Acoursename[]=$coursename;
$objResponse->addScript("addOption('coursecodelist2','" . $coursename . "','" . $coursename . "');");
$objResponse->addScript("document.getElementById('AddButton').value='Update';");  }
}
$subjectname=implode('.',$Acoursename);
$objResponse->addScript("document.getElementById('list').value='$subjectname';");
}
return $objResponse->getXML();
}
$xajax =& new xajax();
$xajax->registerFunction("setCourses");
$xajax->processRequests();
include "./DataBase/dbconnection.php";
?>
<html><head>
<?php $xajax->printJavascript(); ?>
<link href="./Images/heoscss.css" rel="stylesheet" type="text/css">
<title>Programme Lists For Intake</title>
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
</script>
</head><body>
<?php
print"<form method='post'>
<table align='center' border=0 cellspacing=1 cellpadding=0>
<tr><th colspan=6>Programme Lists For Intake</th></tr>
<tr><td>Intake</td><td><select name='startedintake' id='startedintake' onchange=\"return xajax_setCourses(this.value,'$con')\"><option value='none'>Select</option>";
$chselect=mysql_query("select * from currentintakelist order by recordid desc");
while($arr=mysql_fetch_array($chselect)){ $Intake=$arr['intake']; print "<option value='$Intake'>$Intake</option>"; }
print"</select></td></tr>
<tr><td colspan='2'><table align='center' border=0 cellspacing=0 cellpadding=0>
<tr><td><select multiple name='coursecodelist1' id='coursecodelist1' size=10>";
$chselect=mysql_query("select CourseName from coursedetails");
while($arr=mysql_fetch_array($chselect)){ $Intake=$arr['CourseName']; print "<option value='$Intake'>$Intake</option>"; }
print "</select></td>
<td align='center' style='vertical-align:middle;'><input type='button' value='>>>>' onClick=\"moveForward(document.getElementById('coursecodelist1'),document.getElementById('coursecodelist2'),document.getElementById('list'));\"><br>
<br><input type='button' value='<<<<' onClick=\"moveBackward(document.getElementById('coursecodelist2'),document.getElementById('list'));\"></td>
<td><select name='coursecodelist2' id='coursecodelist2' size=10></select><input type='hidden' name='list' id='list'></td>
</tr></table>
</td></tr>
<tr><td colspan=6 align='center'><input type='submit' id='AddButton' name='AddButton' value='submit' ></td></tr>
</table></form>";

if(isset($_POST['AddButton'])){
$intake=$_POST['startedintake'];
if($intake!='none'){
$CNamelist=$_POST['list']; $ACNamelist=explode('.',$CNamelist);
foreach($ACNamelist as $k=>$cname){ if(!empty($cname)){
$chselect=mysql_query("select CourseId from coursedetails where CourseName='$cname'"); $Acourseid[]=mysql_result($chselect,'CourseId');
$codeselect=mysql_query("select CourseCode from coursedetails where CourseName='$cname'"); $Acoursecode[]=$intake.mysql_result($codeselect,'CourseCode');
} }
$courseid=implode('.',$Acourseid);
$coursecode=implode('.',$Acoursecode);
$insertcheck=mysql_query("select count(*) from intakecourseslist where intake='$intake'");
if(mysql_result($insertcheck,0)==0){
$insert=mysql_query("insert into intakecourseslist values('0','$intake','$courseid','$coursecode')");
if($insert) echo "<script type='text/javascript'>alert('Successfully Inserted')</script>";
}else {
$insert=mysql_query("update intakecourseslist set courses='$courseid',batches='$coursecode' where intake='$intake'");
if($insert) echo "<script type='text/javascript'>alert('Successfully Updated')</script>";
} } else echo "<p style='text-align:center;'>select intake to continue...</p>";
}
?>
</body></html>
