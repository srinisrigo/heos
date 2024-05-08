<?php
session_start();
include "../AJAX/MasterAjax.php";
include "../DataBase/dbconnection.php";
?>

<html><head><?php $xajax->printJavascript();?> </head>
<script language="javascript">
function prerequestcheck()
{
prerequestchk=document.getElementById('prerequestchk');
prerequestcombo=document.getElementById('prerequestcombo');
if(prerequestchk.checked){
prerequestcombo.disabled=false;
}
else {prerequestcombo.disabled=true; }
changerequest();
}
function disable()
{
precomb=document.getElementById('prerequestcombo');
precomb.disabled=true;
prerequsitchk=document.getElementById('prerequestchk');
if(precomb.selectedIndex!=0){prerequsitchk.checked=true; precomb.disabled=false;}
}

function resetmarks()
{
marks=document.getElementById('MarksTxt');
divideby=document.getElementById('divideby');
reset=document.getElementById('DefaultMarksTxt');

if(marks.value==""){divideby.value=0;}
else{divideby.value=marks.value; }
}


function resetmarks1()
{
divideby=document.getElementById('divideby');
reset=document.getElementById('DefaultMarksTxt');
if(parseInt(reset.value)>parseInt(divideby.value))
{alert("resit marks is greater than marks ");
reset.value=0;
reset.focus();
}
}

function changerequest()
{
precomb=document.getElementById('prerequestcombo');
prerequsitchk=document.getElementById('prerequestchk');
if(prerequsitchk.checked==false) {
precomb.options[0].selected=true; precomb.disabled=true; }
}

function changerequestchk()
{
precomb=document.getElementById('prerequestcombo');
prerequsitchk=document.getElementById('prerequestchk');
if(precomb.selectedIndex==0){prerequsitchk.checked=false; precomb.disabled=true;}
}

</script>

<title>Subject Details</title>
<meta http-equiv="Page-Exit" content="revealTrans(Duration=0.5,Transition=22)">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="../Style/heoscss.css" rel="stylesheet" type="text/css">
<script language="javascript" type="text/javascript" src="./Images/MasterScript.js"></script>

<body onload=disable();>
<?php
print"<body onload='self.focus();document.SubjectDetails.subjectCodeTextBox.focus();'>
<form method='post' name='SubjectDetails'>
<table border=0 cellspacing=1 cellpadding=0>
<tr class='headerrow'><th colspan=4>Subject Details</th></tr>
<tr class='label'><td>Subject Code</td><td><input type='text' value='' name='subjectCodeTextBox'  class='SixDigitTxt' maxlength='5' size='5' id='subjectCodeTextBox'></td>
<td>Subject Name</td><td><input type='text' value='' name='subjectNameTextBox' id='subjectNameTextBox' size='30'></td></tr>
<tr><td>Subject Area</td><td><select name='subjectarea' id='subjectarea'><option value='select'>Select</option>";

$sql ="select id,subjectarea from subjectarea";
$rs=mysql_query($sql);
while($Combo=mysql_fetch_array($rs))
{
$Subjectareacode=$Combo["id"];
$Subjectarea=$Combo["subjectarea"];
echo"<option value=$Subjectareacode>$Subjectarea</option>";
}

echo"</select></td>
<td>Pre Request Subject</td><td><input type='checkbox' name='prerequestchk' id='prerequestchk' onclick='return prerequestcheck();'>
<select name='prerequestcombo' id='prerequestcombo' onchange='return changerequestchk();'><option value='-Nil-'>Select</option>";


$sql ="select SubjectCode,SubjectName from subjectcreditdetails";
$rs=mysql_query($sql);
while($Combo=mysql_fetch_array($rs))
{
$Subjectcode=$Combo["SubjectCode"];
$Subjectname=$Combo["SubjectName"];
echo"<option value=$Subjectcode>$Subjectname</option>";
}
echo"</select></td></tr>
<tr><td>Theory Slots</td><td><input type='text' name='theoryslots' id='theoryslots' size=2 value=0 maxlength=3></td>
<td>Practical Slots</td><td><input type='text' name='practicalslots' id='practicalslots' size=2 value=0 maxlength=3></td></tr>
<tr><td align=center colspan=4><input type='submit' value='Add' id='addButton' name='addButton'></td></tr></table></form>\n";

if(!isset($_POST['editButton']) && !isset($_POST['cancelButton']) && !isset($_POST['deleteButton']) && !isset($_POST['updateButton']) && !isset($_POST['AddButton']))
{
$_SESSION['editreference']="";
$_SESSION['updatereference']="";
MainForm();
subjectcreditFill();
}

function subjectcreditFill()
{
if(!isset($_GET['page']))
{
@$cat=$_GET['cat'];
if(strlen($cat)==0)
{
$page=1;
$_SESSION['pagevalueforsubjectcredit']=$page;
fillPage($page);
}
else if(strlen($cat)==6 || strlen($cat)==10 )
{
if(!isset($_SESSION['pagevalueforsubjectcredit']))
{
$page=1;
$_SESSION['pagevalueforsubjectcredit']=$page;
fillPage($page);
}
else
{
$page=$_SESSION['pagevalueforsubjectcredit'];
$_SESSION['pagevalueforsubjectcredit']=$page;
}
}
else
{
$page=$_SESSION['pagevalueforsubjectcredit'];
fillPage($page);
}
}
else
{
$page = $_GET['page'];
$_SESSION['pagevalueforsubjectcredit']=$page;
fillPage($page);
}
}

if(isset($_POST['addButton']))
{
$subjectcode=$_POST['subjectCodeTextBox']; $subjectcode=strtoupper($subjectcode);
$subjectname=$_POST['subjectNameTextBox']; $subjectname=ucfirst($subjectname);
$subjectarea=$_POST['subjectarea'];
if(!empty($_POST['prerequestcombo'])){ $prerequestcombo=$_POST['prerequestcombo']; } else $prerequestcombo='none';
$theoryslots=$_POST['theoryslots'];
$practicalslots=$_POST['practicalslots'];

$querysubjectcount=mysql_query("select count(*) from subjectcreditdetails where SubjectCode='$subjectcode'");
$subjectcount=mysql_result($querysubjectcount,0);
if($subjectcount==0){
$querysubjectcreditinsert=mysql_query("insert into subjectcreditdetails values('0','$subjectcode','$subjectname','$subjectarea','$prerequestcombo','$theoryslots','$practicalslots')");
if($querysubjectcreditinsert) echo "<script type='text/javascript'>alert('Successfully Inserted')</script>";
}
else echo"<script type='text/javascript'>alert('Subject Already exists')</script>";
}

function fillPage($page)
{
@$cat=$_GET['cat'];
$_SESSION['pagevalueforsubjectcredit']=$page;
$page  = (int) $page;
$limit = 5;


$result =mysql_query("select count(*) from subjectcreditdetails");
$total = mysql_result($result, 0);
$pager  = getPagerData($total, $limit, $page);
if($total==0){$offset=0;}
else{$offset = $pager->offset;}
$limit  = $pager->limit;
$page   = $pager->page;
$queryselectsubject="select * from subjectcreditdetails limit $offset,$limit";
$queryselectsubjectexec=mysql_query($queryselectsubject);
if(mysql_num_rows($queryselectsubjectexec)){
print "<form method='post'>
<table border=0 cellspacing=1 cellpadding=0>
<tr><th>S.No</th><th>Subject Code</th><th>Subject Name</th><th>Subject Area</th><th>Prerequest Subject</th><th>Theory</th><th>Practical</th><th></th></tr>";
$sno=1;
while($Fetch=mysql_fetch_array($queryselectsubjectexec))
{
$subjectcreditid=$Fetch["SubjectCreditId"];
$subjectcode=$Fetch["SubjectCode"];
$subjectname=$Fetch["SubjectName"];
$subjecyarea=$Fetch["subjectarea"];
$subj=mysql_query("select subjectarea from subjectarea where id='$subjecyarea'");
$subjectresult=mysql_result($subj,0);
$prerequestsubject=$Fetch["prerequestsubject"];
if($prerequestsubject!='none'){
$subj=mysql_query("select SubjectName from subjectcreditdetails where SubjectCode='$prerequestsubject'");
$prerequestsubject=mysql_result($subj,0); }
$theoryslots=$Fetch["theoryslots"];
$practicalslots=$Fetch["practicalslots"];


print "<tr  class='label'><td name=d[] value='$sno'>$sno</td>
<td>$subjectcode</td><td>$subjectname</td><td>$subjectresult</td><td>$prerequestsubject</td><td>$theoryslots</td><td>$practicalslots</td>
<td><input type='hidden' name='subjectcreditid[]' value='$subjectcreditid'>
<input type='submit' id='editButton' name='editButton[$subjectcode]' value='Edit'>
&nbsp;&nbsp;<input type='submit' id='deleteButton' name='deleteButton[$subjectcode]'  value='Delete'></td></tr>\n";
$sno=$sno+1;
}
print "<tr><td align='center' colspan='9' class='label'>\n";
if ($page == 1) // this is the first page - there is no previous page
echo "Previous";
else            // not the first page, link to the previous page
echo "<a href='SubjectDetails.php?page=" . ($page - 1) . "'>Previous</a>";
print " ||  \n";
if ($page == $pager->numPages) // this is the last page - there is no next page
echo "Next";
else            // not the last page, link to the next page
echo "<a href='SubjectDetails.php?page=" . ($page + 1) . "'>Next</a>";
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
deleteFill();
$deptfordelete=$_POST['deleteButton'];
$_SESSION['deptfordelete']=$deptfordelete;
echo "<script langauge='javascript'>var result=confirm('Are You Sure Want to Delete');
if(result){val='delete';self.location='SubjectDetails.php?cat=' + val;}else{val='dontdelete';
self.location='SubjectDetails.php?cat=' + val;}</script>";
}
/*****************************Deleet Button Code Ends***********************/

function deleteFill()
{
$page=$_SESSION['pagevalueforsubjectcredit'];
}

@$cat=$_GET['cat'];
if(isset($cat) and strlen($cat) == 6)
{
$deptdelete=$_SESSION['deptfordelete'];
$deptarray=array_keys($deptdelete);


$sql =mysql_query("select SubjectCode from subjectcreditdetails where SubjectCode='$deptarray[0]'");
$SubjectCode = mysql_result($sql, 0);

$queryArrear=mysql_query("select count(SubjectCode) from arreardetails where SubjectCode='$SubjectCode'");
$ArrearTab=mysql_result($queryArrear,0);

$queryStaff=mysql_query("select count(subjectcode) from staffavailabilitytimetable where subjectcode='$SubjectCode'");
$StaffAvailTab=mysql_result($queryStaff,0);

if($ArrearTab==0 && $StaffAvailTab==0)
{
$querydeptdelete=mysql_query("delete from subjectcreditdetails where SubjectCreditId='$deptarray[0]'");
echo "<script type='text/javascript'>alert('Successfully Deleted')</script>";
$page=$_SESSION['pagevalueforsubjectcredit'];
fillPage($page);
}
else
{
$tab='';
if($ArrearTab > 0){$tab="Arrear,";}
if($StaffAvailTab > 0){$tab=$tab." Staff Availability.";}
echo "<script type='text/javascript'>alert('This Data is in Use in the following forms : $tab')</script>";
$page=$_SESSION['pagevalueforsubjectcredit'];
fillPage($page);
}
}
else if(isset($cat) and strlen($cat) == 10)
{
$page=$_SESSION['pagevalueforsubjectcredit'];
fillPage($page);
}
////////////////////////////////
if(isset($_POST['editButton']))
{
$presentcount=$_POST['editButton'];
$_SESSION['SubjectCreditafteredit']=$presentcount;
editFill();
}
//////////////////////////////////////////////////////////
if(isset($_POST['cancelButton']))
{
$page=$_SESSION['pagevalueforsubjectcredit'];
MainForm();
fillPage($page);
}

if(isset($_POST['updateButton'])){
$SubjectCode=$_POST['SubjectCode'];
$subjectname=$_POST['subjectNameTextBox']; $subjectname=ucfirst($subjectname);
$subjectarea=$_POST['subjectarea'];
if(!empty($_POST['prerequestcombo'])) $prerequestcombo=$_POST['prerequestcombo']; else $prerequestcombo='none';
$theoryslots=$_POST['theoryslots'];
$practicalslots=$_POST['practicalslots'];



$querycountryupdate=mysql_query("update subjectcreditdetails set SubjectName='$subjectname',subjectarea='$subjectarea',prerequestsubject='$prerequestcombo',theoryslots='$theoryslots',practicalslots='$practicalslots' where SubjectCode='$SubjectCode'");
if($querycountryupdate) echo "<script type='text/javascript'>alert('Updated Successfully')</script>";
$page=$_SESSION['pagevalueforsubjectcredit'];
MainForm();
fillPage($page);
}

function editFill(){
$page=$_SESSION['pagevalueforsubjectcredit'];
$limit = 5;

$result =mysql_query("select count(*) from subjectcreditdetails");
$total = mysql_result($result, 0);
$pager  = getPagerData($total, $limit, $page);
$offset = $pager->offset;
$limit  = $pager->limit;
$page   = $pager->page;
$arraydept=$_SESSION['SubjectCreditafteredit'];
$queryselectsubject="select * from subjectcreditdetails limit $offset,$limit";
$queryselectsubjectexec=mysql_query($queryselectsubject);

print "<form method='post'>
<table border=0 cellspacing=1 cellpadding=0>
<tr><th>S.No</th><th>Subject Code</th><th>Subject Name</th><th>Subject Area</th><th>Prerequest Subject</th><th>Theory</th><th>Practical</th><th></th></tr>";
$sno=1;
while($Fetch=mysql_fetch_array($queryselectsubjectexec)){
$subjectcreditid=$Fetch["SubjectCreditId"];
$subjectcode=$Fetch["SubjectCode"];
$subjectname=$Fetch["SubjectName"];
$subjectarea=$Fetch["subjectarea"];
$subj=mysql_query("select subjectarea from subjectarea where id='$subjectarea'"); $subjectresult=mysql_result($subj,0);
$prerequestsubject=$Fetch["prerequestsubject"];
if($prerequestsubject!='none'){
$subj=mysql_query("select SubjectName from subjectcreditdetails where SubjectCode='$prerequestsubject'");
$prerequestsubject1=mysql_result($subj,0); }
$theoryslots=$Fetch["theoryslots"];
$practicalslots=$Fetch["practicalslots"];
if(array_key_exists($subjectcode,$arraydept)){
print "<tr  class='label'><td name=d[] value='$sno'>$sno</td>
<td>$subjectcode<input type='hidden' value='$subjectcode' name='SubjectCode' id='SubjectCode'></td>
<td><input type='text' value='$subjectname' name='subjectNameTextBox' id='subjectNameTextBox'></td>
<td><select name='subjectarea' id='subjectarea'><option value='none'>Select</option>";
$rs=mysql_query("select id,subjectarea from subjectarea");
while($Combo=mysql_fetch_array($rs)){ $Subjectareacode=$Combo["id"]; $Subjectarea=$Combo["subjectarea"];
if($Subjectareacode==$subjectarea) echo "<option value=$Subjectareacode selected>$Subjectarea</option>";
else echo "<option value=$Subjectareacode>$Subjectarea</option>"; }
echo "</select></td><td>
<select name='prerequestcombo' id='prerequestcombo'><option value='none'>Select</option>";
$rs=mysql_query("select SubjectCode,SubjectName from subjectcreditdetails");
while($Combo=mysql_fetch_array($rs)){ $Subjectcode=$Combo["SubjectCode"]; $Subjectname=$Combo["SubjectName"];
if($Subjectcode==$prerequestsubject) echo "<option value=$Subjectcode selected>$Subjectname</option>";
else echo "<option value=$Subjectcode>$Subjectname</option>"; }
echo"</select></td>
<td><input type='text' name='theoryslots' id='theoryslots' size=2 value='$theoryslots' maxlength=3></td>
<td><input type='text' name='practicalslots' id='practicalslots' size=2 value='$practicalslots' maxlength=3></td>
<td><input type='hidden' name='subjectcreditid[]' value='$subjectcreditid'>
<input type='submit' id='updateButton' name='updateButton' value='Update'>
&nbsp;&nbsp;<input type='submit' id='cancelButton' name='cancelButton'  value='Cancel'></td></tr>\n"; }
else {
print "<tr  class='label'><td name=d[] value='$sno'>$sno</td>
<td>$subjectcode</td><td>$subjectname</td><td>$subjectresult</td><td>$prerequestsubject1</td><td>$theoryslots</td><td>$practicalslots</td>
<td><input type='hidden' name='subjectcreditid[]' value='$subjectcreditid'>
<input type='submit' id='updateButton' name='updateButton' value='Update' disabled>
&nbsp;&nbsp;<input type='submit' id='cancelButton' name='cancelButton' disabled  value='Cancel'></td></tr>\n"; }
$sno=$sno+1; }
print "<tr><td align='center' colspan='9' class='label'>\n";
if ($page == 1) // this is the first page - there is no previous page
echo "Previous";
else            // not the first page, link to the previous page
echo "<a href='SubjectDetails.php?page=" . ($page - 1) . "'>Previous</a>";
print " ||  \n";
if ($page == $pager->numPages) // this is the last page - there is no next page
echo "Next";
else            // not the last page, link to the next page
echo "<a href='SubjectDetails.php?page=" . ($page + 1) . "'>Next</a>";
print "<br>$page of $pager->numPages</td></tr></table></form>\n";
}


function MainForm()
{
}
?>









