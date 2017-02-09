<?php
session_start();
include "../AJAX/MasterAjax.php";
include "../DataBase/dbconnection.php";
?>
<html><head><title>Grade Scheme</title></head>
<?php $xajax->printJavascript();?>
<meta http-equiv="Page-Exit" content="revealTrans(Duration=0.5,Transition=22)">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="../Style/heoscss.css" rel="stylesheet" type="text/css">
<script language="javascript" type="text/javascript" src="./Images/MasterScript.js"></script>
<script language="javascript" type="text/javascript" src="./Images/datetimepicker.js"></script>
<script language="javascript">
function createRow(){
tobj=document.getElementById('grade'); crobj=tobj.rows;
var row=crobj.length-1; robj=tobj.insertRow(row);  sno=row-1;
c1=robj.insertCell(0); c2=robj.insertCell(1); c3=robj.insertCell(2);
c4=robj.insertCell(3); c5=robj.insertCell(4);
arindex=crobj.length-5;
c1.innerHTML="<input type='text' name='lower["+arindex+"]' id='lower["+arindex+"]' size=3>";
c2.innerHTML="<select name='symbol["+arindex+"]' id='symbol["+arindex+"]'><option value='--Select--'>Select</option><option value='LessThan'>&lt;</option><option value='LessThanEqualto'>&le;</option><option value='Equalto'>=</option></select>";
c3.innerHTML="<input type='text' name='upper["+arindex+"]' id='upper["+arindex+"]' size=3>";
c4.innerHTML="<input type='text' name='grade["+arindex+"]' id='grade["+arindex+"]' size=3>";
c5.innerHTML="<a href='javascript:createRow();'>Add</a>&nbsp;&nbsp;<a href='javascript:deleteRow();'>Delete</a>";
robj=document.getElementById('grade').rows; prerow=row-1;
cobj=document.getElementById('grade').rows[prerow].cells; cobj[4].innerHTML='';
}
function deleteRow(){ dtobj=document.getElementById('grade').rows; drow=dtobj.length-2;
if(dtobj.length > 5){ document.getElementById('grade').deleteRow(drow);
robj=document.getElementById('grade').rows; prerow=drow-1;
cobj=document.getElementById('grade').rows[prerow].cells;
cobj[4].innerHTML="<a href='javascript:createRow();'>Add</a>&nbsp;&nbsp;<a href='javascript:deleteRow();'>Delete</a>";
}
if(dtobj.length == 5) {
cobj=document.getElementById('grade').rows[3].cells;
cobj[4].innerHTML="<a href='javascript:createRow();'>Add</a>";
}
}
function deleteSingleRow(drow){ alert(drow);
document.getElementById('contactdeatils').deleteRow(drow);
}
</script>

<?php
////////////////////////////////    Form to Display Onload     ////////////////////////////////////////////////////
print "<form method='post' name='CohortDetails'>
<table id='grade' border=0 cellspacing=1 cellpadding=0>
<tr class='headerrow'><th align='center' colspan=5>Grade Scheme Details</th></tr>
<tr><td colspan=2>Awarding Body</td><td colspan=3><select name='awardingbody' id='awardingbody'><option value='none'>Select</option>";

$select=mysql_query("select * from universitydetails");
while($ar=mysql_fetch_array($select)){ $id=$ar['UniversityCode']; $name=$ar['UniversityName']; echo "<option value=$id>$name</option>"; }
print "</select></td></tr>
<tr><td>Lower Limit</td><td>Symbol</td><td>Upper Limit</td><td>Grade</td><td></td></tr>
<tr><td><input type='text' name='lower[0]' id='lower[0]' size=3></td>
<td><select name='symbol[0]' id='symbol[0]'><option value='--Select--'>Select</option><option value='LessThan'>&lt;</option><option value='LessThanEqualto'>&le;</option><option value='Equalto'>=</option></select></td>
<td><input type='text' name='upper[0]' id='upper[0]' size=3></td>
<td><input type='text' name='grade[0]' id='grade[0]' size=3></td>
<td><a href='javascript:createRow();'>Add</a></td></tr>
<tr><td colspan=5 align=center>
<input type='submit' id='addButton' name='addButton' onclick='return cohort_details_validation()' value='Add'></td></tr></table></form>\n";

////////////////////////////////    End of Onload Form     ////////////////////////////////////////////////////
/////////////////////////////////Loop to Display forms For Onload//////////////////////////////////////////////
if(!isset($_POST['editButton']) && !isset($_POST['cancelbutton']) && !isset($_POST['deleteButton']) && !isset($_POST['updateButton']) && !isset($_POST['addButton']))
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

if(isset($_POST['addButton']))
{
$awardingbody=$_POST['awardingbody'];
$lower=$_POST['lower'];
$symbol=$_POST['symbol'];
$upper=$_POST['upper'];
$grade=$_POST['grade'];
if($awardingbody!='none'){
foreach($lower as $k=>$value){
if(!empty($value)){ $s=$symbol[$k]; $u=$upper[$k]; $g=$grade[$k];
$querycohortinsert=mysql_query("insert into gradeschemedetails values('0','$awardingbody','$value','$s','$u','$g')");
}
}
if($querycohortinsert)echo "<script type='text/javascript'>alert('Successfully Inserted')</script>";
}
cohortDetailsfill();
}
////////////////////////////////      End of Add Button Action     ////////////////////////////////////////////////////
/////////////////////////////////Function To Fill Datas in Table///////////////////////////////////////////////////////

function fillPage($page)
{
@$cat=$_GET['cat'];
$_SESSION['pagevalueForCohort']=$page;
$page  = (int) $page;
$limit = 10;


$result = mysql_query("select count(*) from gradeschemedetails");
$total = mysql_result($result, 0);
$pager  = getPagerData($total, $limit, $page);
if($total==0){$offset=0;}
else{$offset = $pager->offset;}

$limit  = $pager->limit;
$page   = $pager->page;
$queryselectCohort="select * from gradeschemedetails limit $offset,$limit";
$querySelectCohortExec=mysql_query($queryselectCohort);
if(mysql_num_rows($querySelectCohortExec)){
print "<form method='post' name='CohortDetails'><br><table border=0 cellspacing=1 cellpadding=0>
<tr><th>S.No</th><th>Awarding Body</th><th>Limit</th><th>Grade</th><th colspan=2></th></tr>\n";

$sno=1;

while($Fetch=mysql_fetch_array($querySelectCohortExec))
{
$gradeschemeid=$Fetch["gradeschemeid"];
$awardingbody=$Fetch["awardingbody"];
$ssselect=mysql_query("select UniversityName from universitydetails where UniversityCode='$awardingbody'");
$universityname=mysql_result($ssselect,'UniversityName');
$lowerlimit=$Fetch["lowerlimit"];
$symbol=$Fetch["symbol"];
if($symbol=='LessThan') $symbol='&lt;';
if($symbol=='LessThanEqualto') $symbol='&le;';
if($symbol=='Equalto') $symbol='=';
$upperlimit=$Fetch["upperlimit"];
$Glimit=$lowerlimit.' '.$symbol.' '.$upperlimit;
$grade=$Fetch["grade"];

print "<tr class='label'><td name=d[] value='$sno'>$sno</td>
<td>$universityname</td><td>$Glimit</td><td>$grade</td>
<input type='hidden' name='CohortID[]' value='$gradeschemeid'><td>
<input type='submit' id='editButton' name='editButton[$gradeschemeid]' value='Edit'>
&nbsp;<input type='submit' id='deleteButton' name='deleteButton[$gradeschemeid]' value='Delete'></td></tr>\n";
$sno=$sno+1;
}
print "<tr><td align='center' colspan='7' class='label'>\n";
if ($page == 1) // this is the first page - there is no previous page
echo "Previous";
else            // not the first page, link to the previous page
echo "<a href='GradeSchemeDetails.php?page=" . ($page - 1) . "'>Previous</a>";
print " ||  \n";
if ($page == $pager->numPages) // this is the last page - there is no next page
echo "Next";
else            // not the last page, link to the next page
echo "<a href='GradeSchemeDetails.php?page=" . ($page + 1) . "'>Next</a>";
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

if(isset($_POST['editButton']))
{
$presentcount=$_POST['editButton'];
$_SESSION['cohortafteredit']=$presentcount;
editFill();
}
//////////////////////////////////////////////////        End of Action     ////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////Function to fill datas in table when Edit Button is Clicked////////////////////////////////////////////////////////////////

function editFill()
{
$page=$_SESSION['pagevalueForCohort'];
$limit = 10;


$result =mysql_query("select count(*) from gradeschemedetails");
$total = mysql_result($result, 0);
$pager  = getPagerData($total, $limit, $page);
$offset = $pager->offset;
$limit  = $pager->limit;
$page   = $pager->page;

$arrayCohort=$_SESSION['cohortafteredit'];
$queryselectCohort ="select * from gradeschemedetails limit $offset,$limit";
$queryselectCohortexec=mysql_query($queryselectCohort);

print "<form method='post' name='CohortDetails'><br><table border=0 cellspacing=1 cellpadding=0>
<tr><th>S.No</th><th>Awarding Body</th><th>Lower Limit</th><th>Symbol</th><th>Upper Limit</th><th>Grade</th><th colspan=2></th></tr>\n";
$sno=1;

while($EFetch=mysql_fetch_array($queryselectCohortexec))
{
$gradeschemeid=$EFetch["gradeschemeid"];
$awardingbody=$EFetch["awardingbody"];
$ssselect=mysql_query("select UniversityName from universitydetails where UniversityCode='$awardingbody'");
$universityname=mysql_result($ssselect,'UniversityName');
$lowerlimit=$EFetch["lowerlimit"];
$symbol=$EFetch["symbol"];
$upperlimit=$EFetch["upperlimit"];
$grade=$EFetch["grade"];

if(array_key_exists($gradeschemeid,$arrayCohort))
{
print "<tr class='label'><td name=d[] value='$sno'>
<input type='hidden' name='gradeschemeid' value='$gradeschemeid'>$sno</td>
<td>$universityname</td>
<td><input type='text' name='lower' id='lower' size=3 value='$lowerlimit'></td>
<td><select name='symbol' id='symbol'><option value='--Select--'>Select</option>";
if($symbol=='LessThan') echo "<option value='LessThan' selected>&lt;</option>";  else echo "<option value='LessThan'>&lt;</option>";
if($symbol=='LessThanEqualto') echo "<option value='LessThanEqualto' selected>&le;</option>";  else echo "<option value='LessThanEqualto'>&le;</option>";
if($symbol=='Equalto') echo "<option value='Equalto' selected>=</option>";  else echo "<option value='Equalto'>=</option>";
print "</select></td>
<td><input type='text' name='upper' id='upper' size=3 value='$upperlimit'></td>
<td><input type='text' name='grade' id='grade' size=3 value='$grade'></td>
<td align='center'><input type='submit' id='updateButton' name='updateButton[$gradeschemeid]' value='Update' onclick='return cohort_edit_details_validation()'>
&nbsp;<input type='submit' id='cancelButton' name='cancelButton[]' value='Cancel'></td></tr>\n";
}
else
{
print "<tr class='label'><td name=d[] value='$sno'><input type='hidden' name='gradeschemeid1'>$sno</td>
<td>$universityname</td><td>$lowerlimit</td><td>$symbol</td><td>$upperlimit</td><td>$grade</td>
<td align='center'><input type='submit' id='btnupdate' disabled name='btnupdate[$gradeschemeid]' value='Edit'>
&nbsp;<input type='submit' id='cancelbutton' disabled name='cancelbutton[]' value='Delete'></td></tr>\n";
}
$sno=$sno+1;
}
print "<tr><td align='center' colspan='7' class='label'>\n";
if ($page == 1) // this is the first page - there is no previous page
echo "Previous";
else            // not the first page, link to the previous page
echo "<a href='GradeSchemeDetails.php?page=" . ($page - 1) . "'>Previous</a>";
print " ||  \n";
if ($page == $pager->numPages) // this is the last page - there is no next page
echo "Next";
else            // not the last page, link to the next page
echo "<a href='GradeSchemeDetails.php?page=" . ($page + 1) . "'>Next</a>";
print "<br>$page of $pager->numPages</td></tr></table></form>\n";
}
////////////////////////////////      End of Function     ///////////////////////////////////////////////////////////////
/////////////////////////////////Action For Cancel Button////////////////////////////////////////////////////////////////      d-M-Y

if(isset($_POST['cancelButton']))
{
$page=$_SESSION['pagevalueForCohort'];
}
////////////////////////////////      End of Action     /////////////////////////////////////////////////////////////////
/////////////////////////////////Action For Update Button////////////////////////////////////////////////////////////////

if(isset($_POST['updateButton']))
{
$flag=0;
$gradeschemeid=$_POST['gradeschemeid'];
$lower=$_POST['lower'];
$symbol=$_POST['symbol'];
$upper=$_POST['upper'];
$grade=$_POST['grade'];


$queryCohortupdate=mysql_query("update gradeschemedetails set lowerlimit='$lower',symbol='$symbol',upperlimit='$upper',grade='$grade' where gradeschemeid='$gradeschemeid'");
if($queryCohortupdate)echo "<script type='text/javascript'>alert('Updated Successfully')</script>";
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
echo "<script langauge='javascript'>var result=confirm('Are You Sure Want to Delete');if(result){val='delete';self.location='GradeSchemeDetails.php?cat=' + val;}else{val='dontdelete';self.location='GradeSchemeDetails.php?cat=' + val;}</script>";
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

$gradeschemeid=$Cohortarray[0];
$delete=mysql_query("delete from gradeschemedetails where gradeschemeid='$gradeschemeid'");
if($delete)echo "<script type='text/javascript'>alert('Successfully Deleted')</script>";
$page=$_SESSION['pagevalueForCohort'];
fillpage($page);

}
else if(isset($cat) and strlen($cat) == 10)
{
$page=$_SESSION['pagevalueForCohort'];
fillpage($page);
}
//////////////////////////////// End of Function /////////////////////////////////////////////////////////////////////////////////////
?>
</body></html>
