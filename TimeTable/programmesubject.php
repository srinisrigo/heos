<?php
require_once(dirname(__FILE__) . '/xajax.inc.php');
function setSubjectCredits($Sublist,$courseid){
$objResponse =& new xajaxResponse();
if($courseid=='none'|$Sublist==''){ $objResponse->addScript("document.getElementById('subjlistdiv').innerHTML='';"); return $objResponse->getXML(); }
$con=mysql_connect('192.168.15.26','root','admin'); $db=mysql_select_db('heos');
$create='';
$select=mysql_query("select TotalCredits from coursedetails where CourseId='$courseid'");
$totcr=mysql_result($select,'TotalCredits');
$sublist=explode('.',$Sublist);  $subcodes=array();
foreach($sublist as $k=>$v){if(!empty($v)){ $subcode=explode('--',$v); $subcodes[]=$subcode[1]; } }
$sno=1; $stflist='';  $index=0;
$create="<table id=\"subjlisttable\" align=center border=0 cellpadding=0 cellspacing=1><tr><th>S.no</th><th>Subject Name</th><th>ECTS</th><th>Default Staff</th></tr>";

foreach($subcodes as $kk=>$scode){
$select=mysql_query("select SubjectName from subjectcreditdetails where SubjectCode='$scode'"); $sname=mysql_result($select,'SubjectName');
$create=$create."<tr><td>$sno</td><td><input type=\"hidden\" name=\"subjectcode[$index]\" value=\"$scode\">$sname</td>";
$create=$create."<td><input type=\"text\" name=\"ects[$index]\" id=\"ects[$index]\" value=\"0\" size=2 onchange=\"settotECTS(this)\"></td>";
$create=$create."<td><select name=\"staffrid[$index]\" id=\"staffrid[$index]\"><option value=none>Select</option>";
$pikstaffs=mysql_query("select * from staffavailabilitytimetable where subjectcode='$scode'");
while($arpik=mysql_fetch_array($pikstaffs)){ $staffid=$arpik['staffid'];
$selstaff=mysql_query("select * from staffpersonalinformation where staffid='$staffid'");
while($starr=mysql_fetch_array($selstaff)){ $id=$starr['staffid']; $name=$starr['firstname'].' '.$starr['middlename'].' '.$starr['lastname'];
$create=$create."<option value=\"$id\">$name --$id</option>"; }
}
$create=$create."</select></td></tr>";
$piklabslot=mysql_query("select count(*) from subjectcreditdetails where SubjectCode='$scode'");
if(mysql_result($piklabslot,0)>0){
$sno++; $index++;
$create=$create."<tr><td>$sno</td><td><input type=\"hidden\" name=\"subjectcode[$index]\" value=\"$scode\">$sname - LAB</td>";
$create=$create."<td><input type=\"text\" name=\"ects[$index]\" id=\"ects[$index]\" value=\"0\" size=2 onchange=\"settotECTS(this)\"></td>";
$create=$create."<td><select name=\"staffrid[$index]\" id=\"staffrid[$index]\"><option value=none>Select</option>";
$pikstaffs=mysql_query("select * from staffavailabilitytimetable where subjectcode='$scode'");
while($arpik=mysql_fetch_array($pikstaffs)){ $staffid=$arpik['staffid'];
$selstaff=mysql_query("select * from staffpersonalinformation where staffid='$staffid'");
while($starr=mysql_fetch_array($selstaff)){ $id=$starr['staffid']; $name=$starr['firstname'].' '.$starr['middlename'].' '.$starr['lastname'];
$create=$create."<option value=\"$id\">$name --$id</option>"; }
}
$create=$create."</select></td></tr>";
}
$sno++; $index++;
}
$create=$create."<tr><td colspan=2 align=right>ECTS Credits</td><td colspan=2><input type=text id=\"remcr\" value=0 size=2 readonly> / <input type=text id=\"totcr\" value=\"$totcr\" size=2 readonly></td></tr></table>";
$objResponse->addScript("document.getElementById('subjlistdiv').innerHTML='$create';");
$objResponse->addScript("document.getElementById('AddButton').disabled=0;");

return $objResponse->getXML();
}

function setEditSubjectCredits($Sublist,$courseid,$awardingbodyid){
$objResponse =& new xajaxResponse();
if($courseid=='none'|$Sublist==''){ $objResponse->addScript("document.getElementById('subjlistdiv').innerHTML='';"); return $objResponse->getXML(); }
$con=mysql_connect('192.168.15.26','root','admin'); $db=mysql_select_db('heos');
$create='';
$select=mysql_query("select TotalCredits from coursedetails where CourseId='$courseid'"); $totcr=mysql_result($select,'TotalCredits');
$sublist=explode('.',$Sublist);  $subcodes=array();
foreach($sublist as $k=>$v){if(!empty($v)){ $subcode=explode('--',$v); $subcodes[]=$subcode[1]; } }
$sno=1; $index=0; $totcredits=0;
$create="<table id=\"subjlisttable\" align=center border=0 cellpadding=0 cellspacing=1><tr><th>S.no</th><th>Subject Name</th><th>ECTS</th><th>Default Staff</th></tr>";
foreach($subcodes as $kk=>$scode){  $ectscredit=0;
$snameselect=mysql_query("select SubjectName from subjectcreditdetails where SubjectCode='$scode'"); $sname=mysql_result($snameselect,'SubjectName');
$ectsstaff=mysql_query("select * from coursesubjects where universityid='$awardingbodyid' and courseid='$courseid' and subjectcode='$scode'");
while($awarr=mysql_fetch_array($ectsstaff)){  $ectscredit=$awarr['ectscredit']; $Estaffid=$awarr['staffid']; }
$create=$create."<tr><td>$sno</td><td><input type=\"hidden\" name=\"subjectcode[$index]\" value=\"$scode\">$sname</td>";
$create=$create."<td><input type=\"text\" name=\"ects[$index]\" id=\"ects[$index]\" value=\"$ectscredit\" size=2 onchange=\"settotECTS(this)\"></td>";
$create=$create."<td><select name=\"staffrid[$index]\" id=\"staffrid[$index]\"><option value=none>Select</option>";
$pikstaffs=mysql_query("select * from staffavailabilitytimetable where subjectcode='$scode'");
while($arpik=mysql_fetch_array($pikstaffs)){ $Fstaffid=$arpik['staffid'];
$selstaff=mysql_query("select * from staffpersonalinformation where staffid='$Fstaffid'");
while($starr=mysql_fetch_array($selstaff)){ $id=$starr['staffid']; $name=$starr['firstname'].' '.$starr['middlename'].' '.$starr['lastname'];
if($id==$Estaffid) $create=$create."<option value=\"$id\" selected>$name --$id</option>"; else $create=$create."<option value=\"$id\">$name --$id</option>"; }
}
$create=$create."</select></td></tr>";
$sno++; $index++;  $totcredits=$totcredits+$ectscredit;
}
$create=$create."<tr><td colspan=2 align=right>ECTS Credits</td><td colspan=2><input type=text id=\"remcr\" value=$totcredits size=2 readonly> / <input type=text id=\"totcr\" value=\"$totcr\" size=2 readonly></td></tr></table>";
$objResponse->addScript("document.getElementById('subjlistdiv').innerHTML='$create';");
$objResponse->addScript("document.getElementById('AddButton').disabled=0;");

return $objResponse->getXML();
}

function setCourses($awardingbodyid){
$objResponse =& new xajaxResponse();
$objResponse->addScript("document.getElementById('coursename').options.length=0;");
$objResponse->addScript("addOption('coursename','Select','none');");
if($awardingbodyid=='none') return $objResponse->getXML();
else{
$con=mysql_connect('192.168.15.26','root','admin'); $db=mysql_select_db('heos');
$select=mysql_query("select * from coursedetails where UniversityId='$awardingbodyid' order by CourseName");
while($arr=mysql_fetch_array($select)){ $courseid=$arr['CourseId']; $coursename=$arr['CourseName'];
$objResponse->addScript("addOption('coursename','" . $coursename . "','" . $courseid . "');");
}
return $objResponse->getXML(); }
}

function setTotsub($courseid,$awardingbodyid){
$objResponse =& new xajaxResponse();
$objResponse->addScript("document.getElementById('AddButton').disabled=1;");
$objResponse->addScript("document.getElementById('editbutton').disabled=1;");
$objResponse->addScript("document.getElementById('remsub').value=0;");
$objResponse->addScript("document.getElementById('totsub').value=0;");
$objResponse->addScript("document.getElementById('coursecodelist2').options.length=0;");
if($courseid=='none'){
$objResponse->addScript("document.getElementById('subjlistdiv').innerHTML='';");
return $objResponse->getXML(); }
else{  $create='';
$con=mysql_connect('192.168.15.26','root','admin'); $db=mysql_select_db('heos');
$select=mysql_query("select NoOfSubjects from coursedetails where CourseId='$courseid'");
$totcr=mysql_result($select,'NoOfSubjects'); $objResponse->addScript("document.getElementById('totsub').value=$totcr;");
$exist=mysql_query("select count(*) from coursesubjects where universityid='$awardingbodyid' and courseid='$courseid'");
if(mysql_result($exist,0)>0){ $listV='';  $existsubtot=mysql_result($exist,0);
$objResponse->addScript("document.getElementById('remsub').value='$existsubtot';");
$objResponse->addScript("document.getElementById('coursecodelist2').options.length=0;");
$eselect=mysql_query("select * from coursesubjects where universityid='$awardingbodyid' and courseid='$courseid'");
while($earr=mysql_fetch_array($eselect)){ $subjectcode=$earr['subjectcode'];
$subselect=mysql_query("select SubjectName from subjectcreditdetails where SubjectCode='$subjectcode'");
$SubjectName=mysql_result($subselect,'SubjectName');    $SubjectName=$SubjectName.' --'.$subjectcode;
$listV=$listV.'.'.$SubjectName;
$objResponse->addScript("addOption('coursecodelist2','" . $SubjectName . "','" . $subjectcode . "');");
}
$objResponse->addScript("document.getElementById('list').value='$listV';");
$sno=1; $index=0; $totcredits=0;

$create="<table id=\"subjlisttable\" align=center border=0 cellpadding=0 cellspacing=1><tr><th>S.no</th><th>Subject Name</th><th>ECTS</th><th>Default Staff</th></tr>";
$existdata=mysql_query("select * from coursesubjects where universityid='$awardingbodyid' and courseid='$courseid'");
while($edarr=mysql_fetch_array($existdata)){ $subjectcode=$edarr['subjectcode']; $ectscredit=$edarr['ectscredit']; $Estaffid=$edarr['staffid'];
$subselect=mysql_query("select SubjectName from subjectcreditdetails where SubjectCode='$subjectcode'");
$SubjectName=mysql_result($subselect,'SubjectName');

$create=$create."<tr><td>$sno</td><td><input type=\"hidden\" name=\"subjectcode[$index]\" value=\"$subjectcode\">$SubjectName</td>";
$create=$create."<td><input type=\"text\" name=\"ects[$index]\" id=\"ects[$index]\" value=\"$ectscredit\" size=2 onchange=\"settotECTS(this)\"></td>";
$create=$create."<td><select name=\"staffrid[$index]\" id=\"staffrid[$index]\"><option value=none>Select</option>";

$pikstaffs=mysql_query("select * from staffavailabilitytimetable where subjectcode='$subjectcode'");
while($arpik=mysql_fetch_array($pikstaffs)){ $Fstaffid=$arpik['staffid'];
$selstaff=mysql_query("select * from staffpersonalinformation where staffid='$Fstaffid'");
while($starr=mysql_fetch_array($selstaff)){ $id=$starr['staffid']; $name=$starr['firstname'].' '.$starr['middlename'].' '.$starr['lastname'];
if($id==$Estaffid) $create=$create."<option value=\"$id\" selected>$name --$id</option>"; else $create=$create."<option value=\"$id\">$name --$id</option>"; }
}
$create=$create."</select></td></tr>";
$sno++; $index++; $totcredits=$totcredits+$ectscredit;
}
$tcrselect=mysql_query("select TotalCredits from coursedetails where CourseId='$courseid'"); $totcr=mysql_result($tcrselect,'TotalCredits');
$create=$create."<tr><td colspan=2 align=right>ECTS Credits</td><td colspan=2><input type=text id=\"remcr\" value=\"$totcredits\" size=2 readonly> / <input type=text id=\"totcr\" value=\"$totcr\" size=2 readonly></td></tr></table>";
$objResponse->addScript("document.getElementById('AddButton').disabled=0;");
$objResponse->addScript("document.getElementById('editbutton').disabled=0;");
}
$objResponse->addScript("document.getElementById('subjlistdiv').innerHTML='$create';");
return $objResponse->getXML(); }
}
$xajax =& new xajax();
$xajax->registerFunction("setCourses");
$xajax->registerFunction("setSubjectCredits");
$xajax->registerFunction("setEditSubjectCredits");
$xajax->registerFunction("setTotsub");
$xajax->processRequests();
?>
<html>
<head>
<title></title>
<?php $xajax->printJavascript(); ?>
<link rel="stylesheet" href="./Images/heoscss.css">
<script language="javascript">
function moveForward(){
var left=document.getElementById('coursecodelist1');
var right=document.getElementById('coursecodelist2');
if(document.getElementById('coursename').selectedIndex==0) return false;
var list=document.getElementById('list'); var bind='';  perform=true;
if(parseInt(document.getElementById('totsub').value) == right.options.length){
alert("Exceeds the Number of Subjetcs for the Programme"); return false; }
for(i=0;i<left.options.length;i++) if(left.options[i].selected==true){ f=1;
for(j=0;j<right.options.length;j++)
if(left.options[i].text==right.options[j].text) f=0;
if(f) { var objOption = new Option(left.options[i].text,left.options[i].value);
document.getElementById('coursecodelist2').options.add(objOption); }  }
list.value=''; for(k=0;k<right.options.length;k++) bind=bind+right.options[k].text+'.';
list.value=bind;
document.getElementById('remsub').value=right.options.length;
}

function moveBackward()
{
var right=document.getElementById('coursecodelist2');
var list=document.getElementById('list'); var bind='';
for(j=0;j<right.options.length;j++) if(right.options[j].selected==true) right.remove(right.selectedIndex);
list.value=''; for(k=0;k<right.options.length;k++) bind=bind+right.options[k].text+'.';
list.value=bind;
document.getElementById('remsub').value=right.options.length;
}
function changeimage(obj,c) { obj.className=c; }

function addOption(selectId, txt, val){ var objOption = new Option(txt,val); document.getElementById(selectId).options.add(objOption); }

function settotECTS(obj){ name=obj.name;
var tobj=document.getElementById('subjlisttable').rows;
var tot=0; st="ects[";
for(i=0;i<(tobj.length-2);i++){ st="ects["+i+"]"; tot=parseInt(tot)+parseInt(document.getElementById(st).value); }
document.getElementById('remcr').value=tot;
if(parseInt(document.getElementById('remcr').value)>parseInt(document.getElementById('totcr').value)){
alert("Exceeds the Total Credits"); document.getElementById(name).focus(); }
}
</script></head>

<body>
<?php
$con=mysql_connect('192.168.15.26','root','admin'); $db=mysql_select_db('heos');
print "<form method=post>
<table align=center border=0 cellpadding=0 cellspacing=1>
<tr><th colspan=4>Programme Subjects</th></tr>
<tr><td>Awarding Body</td><td><select name=\"awardingbody\" id=\"awardingbody\" onchange=\"return xajax_setCourses(this.value)\"><option value=none>Select</option>";
$selectcoursecode=("select * from universitydetails order by UniversityName");
$result=mysql_query($selectcoursecode,$con);
while($re=mysql_fetch_array($result)){ $UniversityId=$re["UniversityId"]; $UniversityName=$re["UniversityName"];
print"<option value=\"$UniversityId\">$UniversityName</option><br>"; }
print "</select></td><td>Programme Name</td><td><select name=\"coursename\" id=\"coursename\" onchange=\"return xajax_setTotsub(this.value,document.getElementById('awardingbody').value)\"><option value=none>Select</option></select></td></tr>
<tr><td>Subject Code</td><td><select multiple name=\"coursecodelist1\" id=\"coursecodelist1\" size=5>";
$selectcoursecode=("select SubjectName,SubjectCode from subjectcreditdetails order by SubjectName");
$result=mysql_query($selectcoursecode,$con);
while($re=mysql_fetch_array($result)){ $SubjectCode=$re["SubjectCode"]; $SubjectName=$re["SubjectName"];
print"<option value=\"$SubjectName\">$SubjectName --$SubjectCode</option><br>"; }
print "</select></td><td align=center><input type=\"button\" value=\"---->\" onClick=\"moveForward();\" class=\"buttonstatic\" onmouseover=\"changeimage(this,'buttonover');\" onmouseout=\"changeimage(this,'buttonstatic');\"><br>
<br><input type=\"button\" value=\"<----\" onClick=\"moveBackward();\" class=\"buttonstatic\" onmouseover=\"changeimage(this,'buttonover');\" onmouseout=\"changeimage(this,'buttonstatic');\"></td>
<td><select name=\"coursecodelist2\" id=\"coursecodelist2\" size=5></select><input type=\"hidden\" name=\"list\" id=\"list\"></td>
</tr>
<tr><td align=center colspan=4><input type=\"button\" value=\"Set Subjetcs\" onclick=\"return xajax_setSubjectCredits(document.getElementById('list').value,document.getElementById('coursename').value)\" class=\"buttonstatic\" onmouseover=\"changeimage(this,'buttonover');\" onmouseout=\"changeimage(this,'buttonstatic');\">
&nbsp;&nbsp;&nbsp;<input type=\"button\" id=\"editbutton\" value=\"Edit Subjetcs\" onclick=\"return xajax_setEditSubjectCredits(document.getElementById('list').value,document.getElementById('coursename').value,document.getElementById('awardingbody').value)\" class=\"buttonstatic\" onmouseover=\"changeimage(this,'buttonover');\" onmouseout=\"changeimage(this,'buttonstatic');\" disabled>
&nbsp;&nbsp;&nbsp;Subjects &nbsp;<input type=text id=\"remsub\" value=0 size=2 readonly> / <input type=text id=\"totsub\" value=0 size=2 readonly>
</td></tr>
</table><br><div id=\"subjlistdiv\"></div><br>
<table align=center border=0 cellpadding=0 cellspacing=0><tr><td><input type=\"submit\" id=\"AddButton\" name=\"AddButton\" value=\"submit\" disabled class=\"buttonstatic\" onmouseover=\"changeimage(this,'buttonover');\" onmouseout=\"changeimage(this,'buttonstatic');\"></td></tr></table>
</form>";

if(isset($_POST['AddButton'])){
$con=mysql_connect('192.168.15.26','root','admin'); $db=mysql_select_db('heos');
$awardingbody=$_POST['awardingbody'];
$coursename=$_POST['coursename'];
$delete=mysql_query("delete from coursesubjects where universityid='$awardingbody' and courseid='$coursename'");

$subjectcode=$_POST['subjectcode'];
$Aects=$_POST['ects'];
$Astaffrid=$_POST['staffrid'];
foreach($subjectcode as $k=>$scode){ $ects=$Aects[$k]; $staffrid=$Astaffrid[$k];
$insert=mysql_query("insert into coursesubjects values('0','$awardingbody','$coursename','$scode','$ects','$staffrid')"); }
}

?>

</body>

</html>
