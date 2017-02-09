<?php
session_start();
include "../AJAX/MasterAjax.php";
include "../DataBase/dbconnection.php";
?>
<html><head><title>Intake Details</title></head>
<?php $xajax->printJavascript();?>
<link href="../Style/heoscss.css" rel="stylesheet" type="text/css">
<script language="javascript" type="text/javascript" src="./Images/MasterScript.js"></script>
<script language="javascript" type="text/javascript" src="./Images/datetimepicker.js"></script>

<?php
////////////////////////////////    Form to Display Onload     ////////////////////////////////////////////////////
print "<form method=post name=Intakedetails>
<table border=0 cellspacing=1 cellpadding=0><tr><th align=center colspan=4>INTAKE DETAILS</th></tr>
<tr><td>Intake</td><td><select name=Month id=Month>";
$year=date('Y'); $month=date('n');
$a=array('January','February','March','April','May','June','July','August','September','October','November','December');
$a1=array('Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec');
foreach($a as $key=>$value) if($month-1 == $key) echo "<option value=$a1[$key] selected>$value</option>"; else echo "<option value=$a1[$key]>$value</option>";
echo "</select>
<select name=Intake id=Intake onChange=\"return xajax_IntakeMast(document.getElementById('Month').value,document.getElementById('Intake').value);\">"; for($i=$year-5;$i<$year+5;$i++) if($year==$i) echo "<option value=$i selected>$i</option>"; else echo "<option value=$i>$i</option>"; echo "</select></td>
<td>Start Date</td><td><input type=text name=StartDate id=StartDate size=12 readonly>&nbsp;<a href=javascript:NewCal('StartDate','ddmmmyyyy')><img src=../Images/cal.gif alt=Pick a date width=16 height=16 border=0></a></td></tr>
<tr><td>Extension Date1</td><td><input type=text name=ExtensionDate1 id=ExtensionDate1 size=12 readonly>&nbsp;<a href=javascript:NewCal('ExtensionDate1','ddmmmyyyy')><img src=../Images/cal.gif alt=Pick a date width=16 height=16 border=0></a></td>
<td>Extension Date2</td><td><input type=text name=ExtensionDate2 id=ExtensionDate2 size=12 readonly>&nbsp;<a href=javascript:NewCal('ExtensionDate2','ddmmmyyyy')><img src=../Images/cal.gif alt=Pick a date width=16 height=16 border=0></a></td> </tr>
<tr><td>Number of Expecting Students</td><td colspan=3><input type=text name=studentstrength id=studentstrength size=2 maxlength=3></td></tr>
<tr><td colspan=4 align=center>
<input type=submit id=submitForm name=submit  value=Add></td></tr></table></form>\n";
////onclick=return cohort_details_validation()
////////////////////////////////    End of Onload Form     ////////////////////////////////////////////////////
/////////////////////////////////Loop to Display forms For Onload//////////////////////////////////////////////
if(!isset($_POST['edit']) && !isset($_POST['cancelbutton']) && !isset($_POST['deleteButton']) && !isset($_POST['updateButton']) && !isset($_POST['submit']))
{
$_SESSION['editreference']="";
$_SESSION['updatereference']="";
CohortDetailsfill();
}
////////////////////////////////    End of Loop     /////////////////////////////////////////////////////////
/////////////////////////////////Function For Paging fill Table//////////////////////////////////////////////

function CohortDetailsfill()
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
if(!isset($_SESSION['pagevalueForCohort']))
{
$page=1;
$_SESSION['pagevalueForCohort']=$page;
fillPage($page);
}
else
{
$page=$_SESSION['pagevalueForCohort'];
$_SESSION['pagevalueForCohort']=$page;
}
}
else
{
$page=$_SESSION['pagevalueForCohort'];
fillPage($page);
}
}
else
{
$page = $_GET['page'];
$_SESSION['pagevalueForCohort']=$page;
fillPage($page);
}
}
////////////////////////////////    End of Function     ////////////////////////////////////////////
/////////////////////////////////Action For Add Button//////////////////////////////////////////////

if(isset($_POST['submit']))
{

$Month=trim($_POST['Month']);
$Intake=trim($_POST['Intake']);
$IntakeImp = array($Month, $Intake);
$Intake =  implode("", $IntakeImp);
$StartDate=trim($_POST['StartDate']);   $StartDate=date('Y-m-d',strtotime($StartDate));
$ExtensionDate1=trim($_POST['ExtensionDate1']);  $ExtensionDate1=date('Y-m-d',strtotime($ExtensionDate1));
$ExtensionDate2=trim($_POST['ExtensionDate2']);  $ExtensionDate2=date('Y-m-d',strtotime($ExtensionDate2));
$studentstrength=trim($_POST['studentstrength']);

$queryforcohortcount=mysql_query("select count(Intake) from cohortdetails where Intake='$Intake'");
$cohortcount=mysql_result($queryforcohortcount,0);

if($cohortcount==0)
{
$querycohortinsert=mysql_query("insert into cohortdetails values('0','$Intake','$StartDate','$ExtensionDate1','$ExtensionDate2','$studentstrength')");
$queryCountInsert=mysql_query("insert into countdetails values('$Intake','1','1')");
echo "<script type=text/javascript>alert('Successfully Inserted')</script>";
cohortDetailsfill();
}
else
{
echo "<script type=text/javascript>alert('Intake Already exists')</script>";
cohortDetailsfill();
}
}
////////////////////////////////      End of Add Button Action     ////////////////////////////////////////////////////
/////////////////////////////////Function To Fill Datas in Table///////////////////////////////////////////////////////

function fillPage($page)
{
@$cat=$_GET['cat'];
$_SESSION['pagevalueForCohort']=$page;
$page  = (int) $page;
$limit = 10;
$result = mysql_query("select count(*) from cohortdetails");
$total = mysql_result($result, 0);
$pager  = getPagerData($total, $limit, $page);
if($total==0){$offset=0;}
else{$offset = $pager->offset;}

$limit  = $pager->limit;
$page   = $pager->page;
$query="select * from cohortdetails order by Intake limit $offset,$limit";
$queryExec=mysql_query($query);
if(mysql_num_rows($queryExec)>0){
print "<form method=post><table border=0 cellspacing=1 cellpadding=0>
<tr><th>S.No</th><th>Intake</th><th>Start Date</th><th>Extension Date1</th>
<th>Extension Date2</th><th>Student Strength</th><th colspan=2></th></tr>";
$sno=1;
while($Fetch=mysql_fetch_array($queryExec))
{
$CohortID=$Fetch["CohortID"];
$Intake=$Fetch["Intake"];
$StartDate=$Fetch["StartDate"]; $startdate=date('d-M-Y',strtotime($StartDate));
$ExtensionDate1=$Fetch["ExtensionDate1"];$ExtensionDate1=date('d-M-Y',strtotime($ExtensionDate1));
$ExtensionDate2=$Fetch["ExtensionDate2"]; $ExtensionDate2=date('d-M-Y',strtotime($ExtensionDate2));
$studentstrength=$Fetch["studentstrength"];

print "<tr><td name=d[] value=$sno class=balanceheaderrow>$sno</td>
<td>$Intake</td><td>$startdate</td><td>$ExtensionDate1</td><td>$ExtensionDate2</td><td>$studentstrength</td>
<input type=hidden name=CohortID[] value=$CohortID><td>
<input type=submit id=edit name=edit[$Intake] value=Edit></td>
<td><input type=submit id=deleteButton name=deleteButton[$Intake]  value=Delete></td></tr>\n";
$sno=$sno+1;
}
print "<tr><td align=center colspan=8>\n";
if ($page == 1) // this is the first page - there is no previous page
echo "Previous";
else            // not the first page, link to the previous page
echo "<a href=Intakedetails.php?page=" . ($page - 1) . ">Previous</a>";
print " ||  \n";
if ($page == $pager->numPages) // this is the last page - there is no next page
echo "Next";
else            // not the last page, link to the next page
echo "<a href=Intakedetails.php?page=" . ($page + 1) . ">Next</a>";
print "<br>$page of $pager->numPages</td></tr></table></form>\n";
}
}
////////////////////////////////      End of Function     /////////////////////////////////////////////////////////////
/////////////////////////////////Function To Set Page Limit////////////////////////////////////////////////////////////

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
////////////////////////////////      End of Function     /////////////////////////////////////////////////////////////
/////////////////////////////////Action For Edit Button////////////////////////////////////////////////////////////////

if(isset($_POST['edit']))
{
$presentcount=$_POST['edit'];
$_SESSION['cohortafteredit']=$presentcount;
editFill();
}
//////////////////////////////////////////////////        End of Action     ////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////Function to fill datas in table when Edit Button is Clicked////////////////////////////////////////////////////////////////

function editFill()
{
$page=$_SESSION['pagevalueForCohort'];
$limit = 10;
$result =mysql_query("select count(*) from cohortdetails");
$total = mysql_result($result, 0);
$pager  = getPagerData($total, $limit, $page);
$offset = $pager->offset;
$limit  = $pager->limit;
$page   = $pager->page;

$arrayCohort=$_SESSION['cohortafteredit'];
$query ="select * from cohortdetails order by Intake limit $offset,$limit";
$queryexec=mysql_query($query);

print "<form method=post><table border=0 cellspacing=1 cellpadding=0>
<tr><th>S.No</th><th>Intake</th><th>Start Date</th><th>Extension Date1</th><th>Extension Date2</th><th>Student Strength</th><th colspan=2></th></tr>\n";
$sno=1;

while($EFetch=mysql_fetch_array($queryexec))
{
$CohortID=$EFetch["CohortID"];
$Intake=$EFetch["Intake"];
$StartDate=$EFetch["StartDate"]; $StartDate=date('d-M-Y',strtotime($StartDate));
$ExtensionDate1=$EFetch["ExtensionDate1"]; $ExtensionDate1=date('d-M-Y',strtotime($ExtensionDate1));
$ExtensionDate2=$EFetch["ExtensionDate2"]; $ExtensionDate2=date('d-M-Y',strtotime($ExtensionDate2));
$studentstrength=$EFetch["studentstrength"];

if(array_key_exists($Intake,$arrayCohort))
{
$query1 =mysql_query("select CohortID from cohortdetails where Intake='$Intake'");
$CohortID1 = mysql_result($query1, 0);

print "<tr><td name=d[] value=$sno>
<input type=hidden name=CohortId value=$CohortID1>$sno</td>
<td><input type=hidden name=EIntake value=$Intake>$Intake</td>
<td><input type=text name=EStartDate id=EStartDate value=$StartDate size=12 readonly>
&nbsp;<a href=javascript:NewCal('EStartDate','ddmmmyyyy')><img src=../Images/cal.gif alt=Pick a date width=16 height=16 border=0></a></td>
<td><input type=text name=EExtensionDate1 id=EExtensionDate1 value=$ExtensionDate1 size=12 readonly>
&nbsp;<a href=javascript:NewCal('EExtensionDate1','ddmmmyyyy')><img src=../Images/cal.gif alt=Pick a date width=16 height=16 border=0></a></td>
<td><input type=text name=EExtensionDate2 id=EExtensionDate2 value=$ExtensionDate2 size=12 readonly>
&nbsp;<a href=javascript:NewCal('EExtensionDate2','ddmmmyyyy')><img src=../Images/cal.gif alt=Pick a date width=16 height=16 border=0></a></td>
<td><input type=text name=Estudentstrength id=Estudentstrength value=$studentstrength size=2 maxlength=3></td>
<td align=center><input type=submit id=updateButton name=updateButton[$Intake] value=Update></td>
<td align=center><input type=submit id=cancelButton name=cancelButton[] value=Cancel></td></tr>\n";
}   //onclick=return cohort_edit_details_validation()
else
{
print "<tr><td name=d[] value=$sno><input type=hidden name=courseid1 >$sno</td>
<td>$Intake</td><td>$StartDate</td><td>$ExtensionDate1</td><td>$ExtensionDate2</td><td>$studentstrength</td>
<td align=center><input type=submit id=btnupdate disabled name=btnupdate[$Intake] value=Edit></td>
<td align=center><input type=submit id=cancelbutton disabled name=cancelbutton[] value=Delete></td></tr>\n";
}
$sno=$sno+1;
}
print "<tr><td align=center colspan=8>\n";
if ($page == 1) // this is the first page - there is no previous page
echo "Previous";
else            // not the first page, link to the previous page
echo "<a href=Intakedetails.php?page=" . ($page - 1) . ">Previous</a>";
print " ||  \n";
if ($page == $pager->numPages) // this is the last page - there is no next page
echo "Next";
else            // not the last page, link to the next page
echo "<a href=Intakedetails.php?page=" . ($page + 1) . ">Next</a>";
print "<br>$page of $pager->numPages</td></tr></table></form>\n";
}
////////////////////////////////      End of Function     ///////////////////////////////////////////////////////////////
/////////////////////////////////Action For Cancel Button////////////////////////////////////////////////////////////////

if(isset($_POST['cancelButton']))
{
$page=$_SESSION['pagevalueForCohort'];
}
////////////////////////////////      End of Action     /////////////////////////////////////////////////////////////////
/////////////////////////////////Action For Update Button////////////////////////////////////////////////////////////////

if(isset($_POST['updateButton']))
{
$flag=0;
$CohortId=trim($_POST['CohortId']);
$EIntake=trim($_POST['EIntake']);
$EStartDate=trim($_POST['EStartDate']); $EStartDate=date('Y-m-d',strtotime($EStartDate));
$EExtensionDate1=trim($_POST['EExtensionDate1']);   $EExtensionDate1=date('Y-m-d',strtotime($EExtensionDate1));
$EExtensionDate2=trim($_POST['EExtensionDate2']);   $EExtensionDate2=date('Y-m-d',strtotime($EExtensionDate2));
$Estudentstrength=trim($_POST['Estudentstrength']);
$queryCohortupdate=mysql_query("update cohortdetails set Intake='$EIntake',StartDate='$EStartDate',ExtensionDate1='$EExtensionDate1',ExtensionDate2='$EExtensionDate2',studentstrength='$Estudentstrength' where CohortID='$CohortId'");
if(mysql_affected_rows())echo "<script type=text/javascript>alert('Updated Successfully')</script>";
$page=$_SESSION['pagevalueForCohort'];
fillPage($page);
}
////////////////////////////////      End of Action     /////////////////////////////////////////////////////////////////
/////////////////////////////////Action For Delete Button////////////////////////////////////////////////////////////////
if(isset($_POST['deleteButton']))
{
deleteFill();
$Cohortfordelete=$_POST['deleteButton'];
$_SESSION['Cohortfordelete']=$Cohortfordelete;
echo "<script langauge=javascript>var result=confirm('Are You Sure Want to Delete');if(result){val='delete';self.location='Intakedetails.php?cat=' + val;}else{val='dontdelete';self.location='Intakedetails.php?cat=' + val;}</script>";
}
////////////////////////////////           End of Action     /////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////Function to fill table when Delete Button clicked////////////////////////////////////////////////////////////////

function deleteFill()
{
$page=$_SESSION['pagevalueForCohort'];
fillPage($page);
}
////////////////////////////////           End of Function   /////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////    Delete Action Performed Here/////////////////////////////////////////////////////////////////////////////////

@$cat=$_GET['cat'];
if(isset($cat) and strlen($cat) == 6)
{
$CohortDelete=$_SESSION['Cohortfordelete'];
$Cohortarray=array_keys($CohortDelete);
$queryArrearDetails=mysql_query("select count(Intake) from arreardetails where Intake='$Cohortarray[0]'");
$ArrearDetails=mysql_result($queryArrearDetails,0);
$querySection=mysql_query("select count(Intake) from sectionmaster where Intake='$Cohortarray[0]'");
$SectionMast=mysql_result($querySection,0);
$queryStudent1=mysql_query("select count(intake) from student where intake='$Cohortarray[0]'");
$Student1=mysql_result($queryStudent1,0);
$queryStudent2=mysql_query("select count(nextintake) from student where nextintake='$Cohortarray[0]'");
$Student2=mysql_result($queryStudent2,0);
$queryttSettings=mysql_query("select count(*) from timetablesettings where Intake='$Cohortarray[0]'");
$TimTabSettings=mysql_result($queryttSettings,0);

if($ArrearDetails==0 && $SectionMast==0 && $Student1==0 && $Student2==0 && $TimTabSettings==0)
{
$querycoursedelete=mysql_query("delete from cohortdetails where Intake='$Cohortarray[0]'");
echo "<script type=text/javascript>alert('Successfully Deleted')</script>";
$page=$_SESSION['pagevalueForCohort'];
fillpage($page);
}
else
{
$tab='';
if($ArrearDetails>0){$tab="Arrear,";}
if($SectionMast>0){$tab=$tab." Section Master,";}
if($Student1>0 || $Student2>0){$tab=$tab." Student Details,";}
if($TimTabSettings>0){$tab=$tab." Time Table Settings";}

echo"<script type=text/javascript>alert('This Data is in Use in the following forms $tab')</script>";
$page=$_SESSION['pagevalueForCohort'];
fillpage($page);
}


}
else if(isset($cat) and strlen($cat) == 10)
{
$page=$_SESSION['pagevalueForCohort'];
fillpage($page);
}
//////////////////////////////// End of Function /////////////////////////////////////////////////////////////////////////////////////
?>
</body></html>
