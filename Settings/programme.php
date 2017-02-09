<?php
session_start();
include "../AJAX/MasterAjax.php";
include "../DataBase/dbconnection.php";
?>

<html><?php $xajax->printJavascript();?><title>PROGRAMME DETAILS</title><head>
<meta http-equiv="Page-Exit" content="revealTrans(Duration=0.5,Transition=22)">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="../Style/heoscss.css" rel="stylesheet" type="text/css">
<script language="javascript" type="text/javascript" src="./Images/MasterScript.js"></script>
<script language="javascript">
function Fects(obj)
{
if(obj==true) document.getElementById('nofcredit').disabled=false;
else { document.getElementById('nofcredit').disabled=true; document.getElementById('nofcredit').value=0; }
}
function sAmount(obj)
{
if(obj=='yes') document.getElementById('amount').disabled=false;
else { document.getElementById('amount').disabled=true; document.getElementById('amount').value=0; }
}
function Exp(obj)
{
if(obj==true){
document.getElementById('nofexp').disabled=false;
document.getElementById('txtminage').disabled=false;  }
else
{
document.getElementById('nofexp').disabled=true;
document.getElementById('txtminage').disabled=true;
document.getElementById('nofexp').value=0;
document.getElementById('txtminage').value=0; } }
</script>
</head>
<?php
if(!isset($_POST['editButton']) && !isset($_POST['cancelButton']) && !isset($_POST['deleteButton']) && !isset($_POST['btnupdate']) && !isset($_POST['AddButton']))
{
$_SESSION['editreference']="";
$_SESSION['updatereference']="";
MainForm();
CourseDetailsFill();
}


function CourseDetailsFill()
{
if(!isset($_GET['page']))
{
@$cat=$_GET['cat'];
if(strlen($cat)==0)
{
$page=1;
fillPage($page);
}
else if(strlen($cat)==6 || strlen($cat)==10 )
{
if(!isset($_SESSION['pagevalueforCourse']))
{
$page=1;
$_SESSION['pagevalueforCourse']=$page;
fillPage($page);
}
else
{
$page=$_SESSION['pagevalueforCourse'];
$_SESSION['pagevalueforCourse']=$page;
}
}
else
{
$page=$_SESSION['pagevalueforCourse'];
fillPage($page);
}
}
else
{
$page = $_GET['page'];
$_SESSION['pagevalueforCourse']=$page;
fillPage($page);
}
}
if(isset($_POST['AddButton']))
{
$CourseCodeTxt=$_POST['CourseCodeTxt']; $CourseCodeTxt=strtoupper($CourseCodeTxt);
$CourseNameTxt=$_POST['CourseNameTxt']; $CourseNameTxt = ucfirst($CourseNameTxt);
$CourseDurationTxt=$_POST['CourseDurationTxt'];
$DurationIn=$_POST['DurationIn']; $DurationImp = array($CourseDurationTxt, $DurationIn);
$CourseDurationTxt= implode(" ", $DurationImp);
$ModeOfCourse=$_POST['ModeOfCourse'];
$Levelofcourse=$_POST['Levelofcourse'];
$UniversityId=$_POST['UniversityName'];
$Scholorship=$_POST['Scholarship'];
if(!empty($_POST['amount'])) $ScholorshipAmount=$_POST['amount']; else $ScholorshipAmount=0;
if(!empty($_POST['ects'])) $EctsScheme=$_POST['ects']; else $EctsScheme='off';
if(!empty($_POST['nofcredit'])) $TotalCredits=$_POST['nofcredit']; else $TotalCredits=0;
$NumOfSubjectTxt=$_POST['NumOfSubjectTxt'];
$noofterms=$_POST['NoOfTermsTxt'];
if(!empty($_POST['Experience'])) $ExpApplicant=$_POST['Experience']; else $ExpApplicant='off';
if(!empty($_POST['nofexp'])) $NoYears=$_POST['nofexp']; else $NoYears=0;
if(!empty($_POST['txtminage'])) $MinAge=$_POST['txtminage']; else $MinAge=0;
$query=mysql_query("select count(CourseCode) from coursedetails where CourseCode='$CourseCodeTxt'");
$CourseCount=mysql_result($query,0);

if($CourseCount==0)
{
$queryCourseInsert=mysql_query("insert into coursedetails values('0','$CourseCodeTxt','$CourseNameTxt','$CourseDurationTxt','$ModeOfCourse','$UniversityId','$Scholorship','$ScholorshipAmount','$EctsScheme','$TotalCredits','$ExpApplicant','$NoYears','$MinAge','$NumOfSubjectTxt','$Levelofcourse','$noofterms')");
echo "<script type='text/javascript'>alert('Successfully Inserted')</script>";
MainForm();
CourseDetailsFill();
}
else
{
echo "<script type='text/javascript'>alert('Course Code Already exists')</script>";
MainForm();
CourseDetailsFill();
}
}


function fillPage($page)
{
@$cat=$_GET['cat'];
$_SESSION['pagevalueforCourse']=$page;

$page  = (int) $page;
$limit = 5;


$db=mysql_select_db("heos");
$result =mysql_query("select count(*) from coursedetails");
$total = mysql_result($result, 0);
$pager  = getPagerData($total, $limit, $page);

if($total==0){$offset=0;}
else{$offset = $pager->offset;}

$limit  = $pager->limit;
$page   = $pager->page;

$querySelectCourse="select * from coursedetails limit $offset,$limit";
$querySelectCourseExec=mysql_query($querySelectCourse);
if(mysql_num_rows($querySelectCourseExec)){
print "<form method='post'>
<table border=0 cellpadding=0 cellspacing=1>
<tr><th>S.No</th><th>Course Code</th><th>Course Name</th><th>Level</th><th>Duration</th><th>Subjects</th><th>Terms</th><th>&nbsp;</th></tr>\n";

$sno=1;
while($Fetch=mysql_fetch_array($querySelectCourseExec))
{
$CourseId=$Fetch["CourseId"];
$CourseCode=$Fetch["CourseCode"];
$CourseName=$Fetch["CourseName"];
$CourseDuration=$Fetch["CourseDuration"];
$NoOfTerms=$Fetch["NoOfTerms"];
$LevelOfTheCourse=$Fetch["CourseLevel"];
$select=mysql_query("select levelname from levelmaster where recordid='$LevelOfTheCourse'"); $LevelOfTheCourse=mysql_result($select,0);
$NoOFSubjects=$Fetch["NoOfSubjects"];

print "<tr><td name=d[] value=$sno>$sno</td>
<td>$CourseCode</td><td>$CourseName</td><td>$LevelOfTheCourse</td><td>$CourseDuration</td><td>$NoOFSubjects</td><td>$NoOfTerms</td>
<input type='hidden' name='Courseid[]' value='$CourseId'>

<td><input type='submit' id='editButton' name='editButton[$CourseCode]' value='Edit'>
&nbsp;<input type='submit' id='deleteButton' name='deleteButton[$CourseCode]'  value='Delete'></td></tr>\n";
$sno=$sno+1;
}
print "<tr><td align='center' colspan='9'>\n";
if ($page == 1) // this is the first page - there is no previous page
echo "Previous";
else            // not the first page, link to the previous page
echo "<a href='CourseDetails.php?page=" . ($page - 1) . "'>Previous</a>";
print " ||  \n";
if ($page == $pager->numPages) // this is the last page - there is no next page
echo "Next";
else            // not the last page, link to the next page
echo "<a href='CourseDetails.php?page=" . ($page + 1) . "'>Next</a>";
print "<br>$page of $pager->numPages</td></tr></table></form>\n";
}
}


function getPagerData($numHits, $limit, $page)
{
$numHits  = (int) $numHits;
$limit    = max((int) $limit, 1);
$page     = (int) $page;
$numPages = ceil($numHits / $limit);

$page = max($page, 1);
$page = min($page, $numPages);

$offset = ($page - 1) * $limit;

$ret = new stdClass;

$ret->offset   = $offset;
$ret->limit    = $limit;
$ret->numPages = $numPages;
$ret->page     = $page;

return $ret;
}

/***********************Delete Button Code******************************/
if(isset($_POST['deleteButton']))
{
MainForm();
deletefill();
$Coursefordelete=$_POST['deleteButton'];

$_SESSION['Coursefordelete']=$Coursefordelete;
echo "<script langauge='javascript'>var result=confirm('Are You Sure Want to Delete');
if(result){val='delete';self.location='CourseDetails.php?cat=' + val;}else{val='dontdelete';
self.location='CourseDetails.php?cat=' + val;}</script>";
}
/*****************************Deleet Button Code Ends***********************/

function deletefill()
{
$page=$_SESSION['pagevalueforCourse'];
fillpage($page);
}

@$cat=$_GET['cat'];
if(isset($cat) and strlen($cat) == 6)
{
$Coursefordelete=$_SESSION['Coursefordelete'];
$Coursearray=array_keys($Coursefordelete);


$db=mysql_select_db("heos");

$querySelectCourseDel="select CourseId,CourseName from coursedetails where CourseCode='$Coursearray[0]'";
$querySelectCourseDelExec=mysql_query($querySelectCourseDel);

while($ExecDel=mysql_fetch_array($querySelectCourseDelExec))
{
$CourseId=$ExecDel["CourseId"];
$CourseName=$ExecDel["CourseName"];
}

$queryArrear=mysql_query("select count(CourseCode) from arreardetails where CourseCode='$Coursearray[0]'");
$ArrearTab=mysql_result($queryArrear,0);

$queryCountryDepo=mysql_query("select count(CourseId) from countrydepositdetails where CourseId='$CourseId'");
$CountyDepoTab=mysql_result($queryCountryDepo,0);

$querySection=mysql_query("select count(CourseCode) from sectionmaster where CourseCode='$Coursearray[0]'");
$SectionTab=mysql_result($querySection,0);

$queryStaffAvail=mysql_query("select count(coursecode) from staffavailabilitytimetable where coursecode='$Coursearray[0]'");
$StaffAvailTab=mysql_result($queryStaffAvail,0);

$queryTTSettings=mysql_query("select count(CourseCode) from timetablesettings where CourseCode='$Coursearray[0]'");
$TimTabSettingsTab = mysql_result($queryTTSettings,0);

$querySubjectCredit=mysql_query("select count(CourseCode) from subjectcreditdetails where CourseCode='$Coursearray[0]'");
$SubjectCreditTab=mysql_result($querySubjectCredit,0);

$queryStudent=mysql_query("select count(coursecode) from student where coursecode='$Coursearray[0]'");
$StudentTab=mysql_result($queryStudent,0);

if($ArrearTab==0 && $CountyDepoTab==0 && $SectionTab==0 && $StaffAvailTab==0 && $TimTabSettingsTab==0 && $SubjectCreditTab==0 && $StudentTab==0)
{

$queryCourseDelete=mysql_query("delete from coursedetails where CourseCode='$Coursearray[0]'");
echo "<script type='text/javascript'>alert('Deleted Successfully')</script>";
$page=$_SESSION['pagevalueforCourse'];
fillpage($page);
}
else
{
$tab='';
if($ArrearTab > 0){$tab="Arrear,";}
if($CountyDepoTab > 0){$tab=$tab." Country Deposit,";}
if($SectionTab > 0){$tab=$tab." Section,";}
if($StaffAvailTab > 0){$tab=$tab." Staff Availability,";}
if($TimTabSettingsTab > 0){$tab=$tab." Time Table Settings,";}
if($SubjectCreditTab > 0){$tab=$tab." Subject Credit,";}
if($StudentTab > 0){$tab=$tab." Student";}

echo "<script type='text/javascript'>alert('This Data is in Use in the following forms  $tab')</script>";
$page=$_SESSION['pagevalueforCourse'];
fillpage($page);
}
}
else if(isset($cat) and strlen($cat) == 10)
{
$page=$_SESSION['pagevalueforCourse'];
fillpage($page);
}


if(isset($_POST['editButton']))
{
$presentcount=$_POST['editButton'];
$_SESSION['Courseafteredit']=$presentcount;
editFill();
}

if(isset($_POST['btncancel']))
{
$page=$_SESSION['pagevalueforCourse'];
}

if(isset($_POST['btnupdate']))
{
$flag=0;
$CourseCodeTxt=$_POST['CourseCodeTxt']; $CourseCodeTxt=strtoupper($CourseCodeTxt);
$CourseNameTxt=$_POST['CourseNameTxt']; $CourseNameTxt = ucfirst($CourseNameTxt);
$CourseDurationTxt=$_POST['CourseDurationTxt'];
$DurationIn=$_POST['DurationIn']; $DurationImp = array($CourseDurationTxt, $DurationIn);
$CourseDurationTxt= implode(" ", $DurationImp);
$ModeOfCourse=$_POST['ModeOfCourse'];
$Levelofcourse=$_POST['Levelofcourse'];
$UniversityId=$_POST['UniversityName'];
$Scholorship=$_POST['Scholarship'];
if(!empty($_POST['amount'])) $ScholorshipAmount=$_POST['amount']; else $ScholorshipAmount=0;
if(!empty($_POST['ects'])) $EctsScheme=$_POST['ects']; else $EctsScheme='off';
if(!empty($_POST['nofcredit'])) $TotalCredits=$_POST['nofcredit']; else $TotalCredits=0;
$NumOfSubjectTxt=$_POST['NumOfSubjectTxt'];
$noofterms=$_POST['NoOfTermsTxt'];
if(!empty($_POST['Experience'])) $ExpApplicant=$_POST['Experience']; else $ExpApplicant='off';
if(!empty($_POST['nofexp'])) $NoYears=$_POST['nofexp']; else $NoYears=0;
if(!empty($_POST['txtminage'])) $MinAge=$_POST['txtminage']; else $MinAge=0;


$queryAgentUpdate=mysql_query("update coursedetails set CourseName='$CourseNameTxt',CourseDuration='$CourseDurationTxt',ModeOfCourse='$ModeOfCourse',CourseLevel='$Levelofcourse',UniversityId='$UniversityId',Scholorship='$Scholorship',ScholorshipAmount='$ScholorshipAmount',EctsScheme='$EctsScheme',TotalCredits='$TotalCredits',ExpApplicant='$ExpApplicant',NoYears='$NoYears',MinAge='$MinAge',NoOfSubjects='$NumOfSubjectTxt',CourseLevel='$Levelofcourse',NoOfTerms='$noofterms' where CourseCode='$CourseCodeTxt'");
if($queryAgentUpdate)echo "<script type='text/javascript'>alert('Updated Successfully')</script>"; else echo 'Error';
MainForm();
CourseDetailsFill();

}


function editFill()
{
$page=$_SESSION['pagevalueforCourse'];
$limit = 5;

$db=mysql_select_db("heos");
$result =mysql_query("select count(*) from coursedetails");
$total = mysql_result($result, 0);
$pager  = getPagerData($total, $limit, $page);
$offset = $pager->offset;
$limit  = $pager->limit;
$page   = $pager->page;
$arrayagent=$_SESSION['Courseafteredit'];

$querySelectCourse1="select * from coursedetails limit $offset,$limit";
$querySelectCourse1Exec=mysql_query($querySelectCourse1);

while($ExecEdit=mysql_fetch_array($querySelectCourse1Exec))
{
$CourseId=$ExecEdit["CourseId"];
$CourseCode=$ExecEdit["CourseCode"];
$CourseName=$ExecEdit["CourseName"];
$CourseDuration=$ExecEdit["CourseDuration"];
$ModeOfCourse=$ExecEdit["ModeOfCourse"];
$LevelOfTheCourse=$ExecEdit["CourseLevel"];
$NoOFSubjects=$ExecEdit["NoOfSubjects"];
$UniversityId=$ExecEdit["UniversityId"];
$Scholorship=$ExecEdit["Scholorship"];
$ScholorshipAmount=$ExecEdit['ScholorshipAmount'];
$EctsScheme=$ExecEdit['EctsScheme'];
$TotalCredits=$ExecEdit['TotalCredits'];
$ExpApplicant=$ExecEdit['ExpApplicant'];
$NoYears=$ExecEdit['NoYears'];
$MinAge=$ExecEdit['MinAge'];
$NoOfSubjects=$ExecEdit['NoOfSubjects'];
$LevelOfTheCourse=$ExecEdit['CourseLevel'];
$NoOfTerms=$ExecEdit["NoOfTerms"];
//$experience=$ExecEdit["experience"];


if(array_key_exists($CourseCode,$arrayagent))
{
$sql="select UniversityName from universitydetails where UniversityId='$UniversityId'";
$rs=mysql_query($sql);
$UniversityName = mysql_result($rs,"UniversityName");

// $sql1="select MarkSchemeName from markschemedetails where MarkSchemeId='$MarkSchemeId'";
//$rs1=mysql_query($sql1);
// $MarkScheme = mysql_result($rs1,"MarkSchemeName");

$queryselectCourse1="select CourseId from coursedetails where CourseCode='$CourseCode'";
$queryselectCourseexec1=mysql_query($queryselectCourse1);
$CourseId1 = mysql_result($queryselectCourseexec1,"CourseCode");

EditForm($CourseId,$CourseCode,$CourseName,$CourseDuration,$ModeOfCourse,$UniversityId,$Scholorship,$ScholorshipAmount,$EctsScheme,$TotalCredits,$ExpApplicant,$NoYears,$MinAge,$NoOfSubjects,$LevelOfTheCourse,$NoOfTerms);
}
}
}
function MainForm()
{
print "<body onload='self.focus();document.CourseDetails.CourseCodeTxt.focus();'>\n";
print"<form method='post' name='CourseDetails'>
<table border=0 cellpadding=0 cellspacing=1>
<tr><th colspan=4>Programme Details</th></tr>
<tr><td>Course Code </td><td><input type='text' name='CourseCodeTxt' maxlength='5' id='CourseCodeTxt' size=5></td>
<td>Course Name </td><td><input type='text' name='CourseNameTxt' id='CourseNameTxt' size=30></td></tr>
<tr><td>Course Duration </td><td><input type='text' name='CourseDurationTxt' maxlength='2' size='2' id='CourseDurationTxt'>
<select name='DurationIn' id='DurationIn'>
<option value='Years'>Years</option>
<option value='Months'>Months</option></select></td>
<td>Mode of Course </td><td><select name='ModeOfCourse' id='ModeOfCourse' class='select'>
<option value='--Select--'>--Select--</option>
<option value='Part Time'>Part Time</option>
<option value='Full Time'>Full Time</option></select></td></tr>
<tr><td>Level of Course </td><td><select name='Levelofcourse' id='Levelofcourse' class='comboclassSEARCH'>
<option value='--Select--'>--Select--</option>";

$sql="select * from levelmaster";
$rs1=mysql_query($sql);
while($rsl=mysql_fetch_array($rs1))
{
$recordid=$rsl["recordid"];
$levelname=$rsl["levelname"];

echo"<option value=$recordid>$levelname</option>";
}
print"</select></td>

<td>Awarding Body</td><td><select name='UniversityName' id='UniversityName' class='citizen'>
<option value='--Select--'>--Select--</option>";

$db=mysql_select_db("heos");
$sql="select UniversityId,UniversityName from universitydetails";
$rs=mysql_query($sql);
while($ExecUniv=mysql_fetch_array($rs))
{
$UniversityId=$ExecUniv["UniversityId"];
$UniversityName=$ExecUniv["UniversityName"];
echo"<option value=$UniversityId>$UniversityName</option>";
}
echo" </select>&nbsp;&nbsp;&nbsp;&nbsp;<a href='UniversityDetails.php'>New</a></td></tr>
<tr><td>Scholarship</td><td><input type='radio' id='radio1' name='Scholarship' value='yes' onclick='sAmount(this.value)'>Yes<input type='radio' id='radio1' value='no' checked name='Scholarship' onclick='sAmount(this.value)'>No
&nbsp;&nbsp;&nbsp;<input type='text' name='amount' id='amount' disabled='true' value='0' size=3>%</td>
<td>ECTS</td><td><input type='checkbox' name='ects' id='ects' onClick='Fects(this.checked);'>&nbsp;&nbsp;Total Credits&nbsp;<input type='text' name='nofcredit'  id='nofcredit' disabled='true' value='0' size=3>
<tr><td>Number of Subjects</td><td><input type='text' name='NumOfSubjectTxt' id='NumOfSubjectTxt' size=3 value='0'> </td>
<td>Number of Terms</td><td><input type='text' name='NoOfTermsTxt' id='NoOfTermsTxt' size=3 value='0'></td></tr>
<tr><td>Experienced Applicant</td><td colspan=3><input class='checkbox' type='checkbox' name='Experience' id='Experience' onClick=' Exp(this.checked);'>
&nbsp;&nbsp;Experience&nbsp;<input type='text' name='nofexp' disabled id='nofexp' size=3 value='0'>Years&nbsp;&nbsp;&nbsp;Minimum Age&nbsp;<input type='text' name='txtminage' id='txtminage' disabled size=3 value='0'>Years</td></tr>
<tr><td align='center' colspan='4'><input type='submit' id='AddButton' value='Add' name='AddButton' onclick='return course_details_validation();'></td></tr></table></form>\n";
}

function EditForm($CourseId,$CourseCode,$CourseName,$CourseDuration,$ModeOfCourse,$UniversityId,$Scholorship,$ScholorshipAmount,$EctsScheme,$TotalCredits,$ExpApplicant,$NoYears,$MinAge,$NoOfSubjects,$LevelOfTheCourse,$NoOfTerms)
{

$Duration = explode(" ", $CourseDuration);
print"<form method='post' name='CourseDetails'>
<table border=0 cellpadding=0 cellspacing=1>
<tr><th colspan=4>Programme Details Edit</th></tr>
<tr><td>Course Code </td><td><input type='hidden' name='CourseCodeTxt' id='CourseCodeTxt' value='$CourseCode'>$CourseCode</td>
<td>Course Name </td><td><input type='text' name='CourseNameTxt' id='CourseNameTxt' size=30 value='$CourseName'></td></tr>
<tr><td>Course Duration </td><td><input type='text' name='CourseDurationTxt' size=2 id='CourseDurationTxt' maxlength=2 value='$Duration[0]'>
<select name='DurationIn' id='DurationIn'><option value=select>Select</option>";
if($Duration[1]=='Years') print "<option value='Years' selected>Years</option>"; else print "<option value='Years'>Years</option>";
if($Duration[1]=='Months') print "<option value='Months' selected>Months</option>"; else print "<option value='Months'>Months</option>";
print "</select></td>
<td>Mode of Course </td><td><select name='ModeOfCourse' id='ModeOfCourse' class='select'>
<option value='--Select--'>--Select--</option>";
if($ModeOfCourse=='Part Time') print "<option value='Part Time' selected>Part Time</option>"; else print "<option value='Part Time'>Part Time</option>";
if($ModeOfCourse=='Full Time') print "<option value='Full Time' selected>Full Time</option>"; else print "<option value='Full Time'>Full Time</option>";
print "</select></td></tr>
<tr><td>Level of Course </td><td><select name='Levelofcourse' id='Levelofcourse' class='comboclassSEARCH'>
<option value='--Select--'>--Select--</option>";

$sql="select * from levelmaster";
$rs1=mysql_query($sql);
while($rsl=mysql_fetch_array($rs1))
{
$recordid=$rsl["recordid"];
$levelname=$rsl["levelname"];
if($LevelOfTheCourse==$recordid) echo"<option value=$recordid selected>$levelname</option>"; else echo"<option value=$recordid>$levelname</option>";
}
print"</select></td>
<td>Awarding Body</td><td><select name='UniversityName' id='UniversityName' class='citizen'>
<option value='--Select--'>--Select--</option>";

$db=mysql_select_db("heos");
$sql="select UniversityId,UniversityName from universitydetails";
$rs=mysql_query($sql);
while($ExecUniv=mysql_fetch_array($rs))
{
$EUniversityId=$ExecUniv["UniversityId"];
$UniversityName=$ExecUniv["UniversityName"];
if($UniversityId==$EUniversityId) echo"<option value=$EUniversityId selected>$UniversityName</option>"; else echo"<option value=$EUniversityId>$UniversityName</option>";
}
echo" </select>&nbsp;&nbsp;&nbsp;&nbsp;<a href='UniversityDetails.php'>New</a></td></tr>
<tr><td>Scholarship</td><td>";

if($Scholorship=='yes') print "<input type='radio' id='radio1' name='Scholarship' value='yes' onclick='sAmount(this.value)' checked>Yes";
else print "<input type='radio' id='radio1' name='Scholarship' value='yes' onclick='sAmount(this.value)'>Yes";
if($Scholorship=='no') print "<input type='radio' id='radio2' name='Scholarship' value='no' onclick='sAmount(this.value)' checked>No";
else print "<input type='radio' id='radio2' name='Scholarship' value='no' onclick='sAmount(this.value)'>No";
if($Scholorship=='yes') print "&nbsp;&nbsp;&nbsp;<input type='text' name='amount' id='amount' value='$ScholorshipAmount' size=3>%";
else print "&nbsp;&nbsp;&nbsp;<input type='text' name='amount' id='amount' disabled value='0' size=3>%";

print "</td><td>ECTS</td><td>";
if($EctsScheme=='on') print "<input type='checkbox' name='ects' id='ects' onClick='Fects(this.checked);' checked>&nbsp;&nbsp;Total Credits&nbsp;<input type='text' name='nofcredit' id='nofcredit' value='$TotalCredits' size=3>";
else print "<input type='checkbox' name='ects' id='ects' onClick='Fects(this.checked);'>&nbsp;&nbsp;Total Credits&nbsp;<input type='text' name='nofcredit' id='nofcredit' value='$TotalCredits' size=3 disabled>";
print "<tr><td>Number of Subjects</td><td><input type='text' name='NumOfSubjectTxt' id='NumOfSubjectTxt' size=3 value='$NoOfSubjects'> </td>
<td>Number of Terms</td><td><input type='text' name='NoOfTermsTxt' id='NoOfTermsTxt' size=3 value='$NoOfTerms'></td></tr>
<tr><td>Experienced Applicant</td><td colspan=3>";
if($ExpApplicant=='on')
print "<input class='checkbox' type='checkbox' name='Experience' id='Experience' onClick='Exp(this.checked);' checked>
&nbsp;&nbsp;Experience&nbsp;<input type='text' name='nofexp' id='nofexp' size=3 value='$NoYears'>Years&nbsp;&nbsp;&nbsp;Minimum Age&nbsp;<input type='text' name='txtminage' id='txtminage' value='$MinAge' size=3>Years";
else print "<input class='checkbox' type='checkbox' name='Experience' id='Experience' onClick='Exp(this.checked);'>
&nbsp;&nbsp;Experience&nbsp;<input type='text' name='nofexp' disabled id='nofexp' size=3 value='0'>Years&nbsp;&nbsp;&nbsp;Minimum Age&nbsp;<input type='text' name='txtminage' id='txtminage' value='0' disabled size=3>Years";
print "</td></tr>
<tr><td colspan=4 align=center><input type='submit' id='btncancel' name='btncancel[]' value='Cancel'>
&nbsp;&nbsp;<input type='submit' id='btnupdate' name='btnupdate[$CourseCode]' value='Update' onclick='return course_edit_details_validation();'></tr></table>\n";
}


?>
</body></html>
