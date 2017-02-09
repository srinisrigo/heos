<?php session_start(); ?>
<html>
<head><title>Staff Availability</title>
<link href="./Images/heoscss.css" rel="stylesheet">
<script language="javascript">
function checkedAll(obj,wch){
if (obj.checked && wch==7){ for(i=0;i<=6;i++){ st='Check['+i+']'; document.getElementById(st).checked=1; } return false; }
if (obj.checked==0 && wch==7){ for(i=0;i<=6;i++){ st='Check['+i+']'; document.getElementById(st).checked=0; } return false; }
if(obj.checked && wch<7){ var ck=0;
for(i=0;i<=6;i++){ st='Check['+i+']'; if(document.getElementById(st).checked) ck=1; else { ck=0; break; } }
if(ck) document.getElementById('CheckA').checked=1; }
if(obj.checked==0 && wch<7) document.getElementById('CheckA').checked=0;
}

function EcheckedAll(obj,wch){
if (obj.checked && wch==7){ for(i=0;i<=6;i++){ st='ECheck['+i+']'; document.getElementById(st).checked=1; } return false; }
if (obj.checked==0 && wch==7){ for(i=0;i<=6;i++){ st='ECheck['+i+']'; document.getElementById(st).checked=0; } return false; }
if(obj.checked && wch<7){ var ck=0;
for(i=0;i<=6;i++){ st='ECheck['+i+']'; if(document.getElementById(st).checked) ck=1; else { ck=0; break; } }
if(ck) document.getElementById('ECheckA').checked=1; }
if(obj.checked==0 && wch<7) document.getElementById('ECheckA').checked=0;
}

function changeimage(obj,c) { obj.className=c; }

function moveForward()
{
var left=document.getElementById('left');
var right=document.getElementById('right');
var list=document.getElementById('list');
var bind='';
for(i=0;i<left.options.length;i++) if(left.options[i].selected==true){ f=1;
for(j=0;j<right.options.length;j++)
if(left.options[i].text==right.options[j].text) f=0;
if(f) { var objOption = new Option(left.options[i].text,left.options[i].text);
document.getElementById('right').options.add(objOption); }  }
list.value=''; for(k=0;k<right.options.length;k++) bind=bind+right.options[k].text+'.';
list.value=bind;
}
function moveBackward(){
var right=document.getElementById('right'); var j;
for(j=0;j<right.options.length;j++) if(right.options[j].selected==true){ right.remove(right.selectedIndex); }
list.value=''; for(k=0;k<right.options.length;k++) bind=bind+right.options[k].text+'.';
list.value=bind;
}
</script>
</head>
<body>
<?php
print "<form method=post>
<table align=center cellspacing=1 cellpadding=0>
<tr><th colspan=2>Staff Availability</th></tr>
<tr><td>Staff Name</td><td><select name=\"staffnamedrop\" id=\"staffnamedrop\"><option value=\"none\">--Select--</option>";
$con=mysql_connect("192.168.15.26","root","admin"); $db=mysql_select_db("heos",$con);
$rs=mysql_query("select * from staffpersonalinformation");
while($rr=mysql_fetch_array($rs)){ $staffname=$rr["firstname"].' '.$rr["lastname"];; $staffid=$rr["staffid"]; echo"<option value=$staffid>$staffname --$staffid</option>"; }
print"</td></select></tr>
<tr><td colspan=2><table align=center border=0 cellspacing=0 cellpadding=0>
<td><select id=\"left\" name=\"left\" size=10 multiple>";
$rs=mysql_query("select * from subjectcreditdetails");
while($rr=mysql_fetch_array($rs)){ $staffname=$rr["SubjectName"]; $staffid=$rr["SubjectCode"]; echo"<option value=$staffid>$staffname --$staffid</option>"; }
print "</select></td>";
print "<td><input type=\"button\" value=\"---->\" onClick=\"moveForward();\" class=\"buttonstatic\" onmouseover=\"changeimage(this,'buttonover');\" onmouseout=\"changeimage(this,'buttonstatic');\">
<br><br><input type=\"button\" value=\"<----\" onClick=\"moveBackward();\" class=\"buttonstatic\" onmouseover=\"changeimage(this,'buttonover');\" onmouseout=\"changeimage(this,'buttonstatic');\"></td>
<td><select id=\"right\" size=10 multiple name=\"right\"></select><input type=\"hidden\" name=\"list\" id=\"list\"></td></tr></table></td></tr>";
print "</tr>
<tr><td colspan=2>
<input type=\"checkbox\" name=\"Check[0]\" id=\"CheckA\" value=7 onClick=\"checkedAll(this,7);\" checked>All
<input type=\"checkbox\" name=\"Check[1]\" id=\"Check[0]\" value=1 onClick=\"checkedAll(this,1);\" checked>Monday
<input type=\"checkbox\" name=\"Check[2]\" id=\"Check[1]\" value=2 onClick=\"checkedAll(this,2);\" checked>Tuesday
<input type=\"checkbox\" name=\"Check[3]\" id=\"Check[2]\" value=3 onClick=\"checkedAll(this,3);\" checked>Wednesday
<input type=\"checkbox\" name=\"Check[4]\" id=\"Check[3]\" value=4 onClick=\"checkedAll(this,4);\" checked>Thursday
<input type=\"checkbox\" name=\"Check[5]\" id=\"Check[4]\" value=5 onClick=\"checkedAll(this,5);\" checked>Friday
<input type=\"checkbox\" name=\"Check[6]\" id=\"Check[5]\" value=6 onClick=\"checkedAll(this,6);\" checked>Saturday
<input type=\"checkbox\" name=\"Check[7]\" id=\"Check[6]\" value=0 onClick=\"checkedAll(this,0);\" checked>Sunday</td></tr>
<tr><td align=center colspan=2>
<input type=\"submit\" value=\"Submit\" name=\"submit\" onClick=\"return setlist();\" class=\"buttonstatic\" onmouseover=\"changeimage(this,'buttonover');\" onmouseout=\"changeimage(this,'buttonstatic');\">
<input type=\"submit\" name=\"btncancel[]\" value=\"Cancel\" class=\"buttonstatic\" onmouseover=\"changeimage(this,'buttonover');\" onmouseout=\"changeimage(this,'buttonstatic');\"></td></tr>
</table></form>";

if(isset($_POST['submit'])){
$staffid=$_POST['staffnamedrop'];
$Alist=$_POST['list']; $Elist=explode('.',$Alist); $subA=array();
foreach($Elist as $kk=>$ElistV){if(!empty($ElistV)){ $listV=explode('--',$ElistV); $subA[]=$listV[1]; } }
$ACheck=$_POST['Check']; $availabilty=implode('.',$ACheck);
$con=mysql_connect("192.168.15.26","root","admin"); $db=mysql_select_db("heos",$con);
foreach($subA as $k=>$scode){
$exist=mysql_query("select count(*) from staffavailabilitytimetable where staffid='$staffid' and subjectcode='$scode'");
if(mysql_result($exist,0)==0) $insert=mysql_query("insert into staffavailabilitytimetable values('0','$staffid','$scode','$availabilty')");
else echo $scode.' -- already Exist<br>';  }
CollegeDetailsfill();
}

?>
<?php
if(!isset($_POST['editButton']) && !isset($_POST['cancelbutton']) && !isset($_POST['deleteButton']) && !isset($_POST['btnupdate']) && !isset($_POST['submit']))
{
$_SESSION['editreference']="";
$_SESSION['updatereference']="";
CollegeDetailsfill();
}
?>
<?php
function CollegeDetailsfill()
{
if(!isset($_GET['page']))
{
@$cat=$_GET['cat'];
if(strlen($cat)==0) { $page=1; fillPage($page);
}
else if(strlen($cat)==6 || strlen($cat)==10 )
{
if(!isset($_SESSION['pagevalueForCohort']))
{
$page=1;
$_SESSION['pagevalueForCohort']=$page;
fillPage($page); }
else { $page=$_SESSION['pagevalueForCohort']; $_SESSION['pagevalueForCohort']=$page; }
}
else { $page=$_SESSION['pagevalueForCohort'];  fillPage($page); }
}
else {
$page = $_GET['page'];
$_SESSION['pagevalueForCohort']=$page;
fillPage($page);
}
}
?>
<?php
function fillPage($page)
{
@$cat=$_GET['cat'];
$_SESSION['pagevalueForCohort']=$page;
$page  = (int) $page;
$limit = 5;
$con=mysql_connect("192.168.15.26","root","admin");
$db=mysql_select_db("heos",$con);
$result1 =("select count(*) from staffavailabilitytimetable");
$result=mysql_query($result1,$con);
$total = mysql_result($result,0);
$pager  = getPagerData($total, $limit, $page);
if($total==0){ $offset=0; } else {  $offset = $pager->offset; }
$limit  = $pager->limit;
$page   = $pager->page;
$queryselectcourse="SELECT * from staffavailabilitytimetable limit $offset,$limit";
$queryselectcourseexec=mysql_query($queryselectcourse,$con);
print "<br><form method=post>
<table border=0 align=center cellspacing=1 cellpadding=0>
<tr><th>S.NO</th><th>Staff Name</th><th>Subject Name</th><th>Availability</th><th></th></tr>";
$sno=1;
while($rs10=mysql_fetch_array($queryselectcourseexec)){
$staffavailabilityid=$rs10["staffavailabilityid"];
$StaffId=$rs10["staffid"];
$rt=mysql_query("select * from staffpersonalinformation where staffid='$StaffId'");
while($arr=mysql_fetch_array($rt)){ $StaffName1=$arr["firstname"].' '.$arr["lastname"]; }
$subjectcode=$rs10["subjectcode"];
$rt=mysql_query("select SubjectName from subjectcreditdetails where SubjectCode='$subjectcode'"); $SubjectName=mysql_result($rt,"SubjectName");
$Availability=$rs10["availability"];
$EAvailability=explode('.',$Availability); $daysE=array();
foreach($EAvailability as $k=>$value){
switch($value){
case 1:$daysE[]='Mon'; break;
case 2:$daysE[]='Tue'; break;
case 3:$daysE[]='Wed'; break;
case 4:$daysE[]='Thu'; break;
case 5:$daysE[]='Fri'; break;
case 6:$daysE[]='Sat'; break;
case 0:$daysE[]='Sun'; break;
}
}
$RAvailability=implode('.',$daysE);
print "<tr><td name=d[] value=$sno>$sno</td><td>$StaffName1 -- $StaffId</td><td>$SubjectName -- $subjectcode</td><td>$RAvailability</td>
<td><input type=\"hidden\" name=\"Collegename[]\" value=\"$staffavailabilityid\">
<input type=\"submit\" name=\"editButton[$staffavailabilityid]\" value=\"Edit\" class=\"buttonstatic\" onmouseover=\"changeimage(this,'buttonover');\" onmouseout=\"changeimage(this,'buttonstatic');\">
&nbsp;<input type=\"submit\" name=\"deleteButton[$staffavailabilityid]\" value=\"Delete\" class=\"buttonstatic\" onmouseover=\"changeimage(this,'buttonover');\" onmouseout=\"changeimage(this,'buttonstatic');\"></td></tr>";
$sno=$sno+1;
}
print "<tr><td align=center colspan=6>";
if($page == 1) echo "Previous"; else echo "<a href=\"staffavailability.php?page=" . ($page - 1) . "\">Previous</a>";
print " ||  \n";
if ($page == $pager->numPages) echo "Next";  else  echo "<a href=\"staffavailability.php?page=" . ($page + 1) . "\">Next</a>";
print "<br>$page of $pager->numPages</td></tr></table></form>";
}
?>
<?php
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

if(isset($_POST['deleteButton']))
{
deleteFill();
$coursefordelete=$_POST['deleteButton'];

$_SESSION['coursefordelete']=$coursefordelete;
echo "<script langauge=\"javascript\">var result=confirm('Are You Sure Want to Delete');
if(result){val='delete';self.location='staffavailability.php?cat=' + val;}
else{val='dontdelete';self.location='staffavailability.php?cat=' + val;}</script>";
}
/*****************************Deleet Button Code Ends***********************/
@$cat=$_GET['cat'];
if(isset($cat) and strlen($cat) == 6)
{
$coursedelete=$_SESSION['coursefordelete'];
$coursearray=array_keys($coursedelete);
echo $coursearray[0];
$con=mysql_connect("192.168.15.26","root","admin");
$db=mysql_select_db("heos",$con);
$querycoursedelete="delete from staffavailabilitytimetable where staffavailabilityid='$coursearray[0]'";
$querycoursedeleteexec=mysql_query($querycoursedelete,$con);
if($querycoursedeleteexec) print "<script langauge=\"javascript\">alert('Successfully Deleted');</script>";
$page=$_SESSION['pagevalueForCohort'];
fillpage($page);
}
else if(isset($cat) and strlen($cat) == 10){
$page=$_SESSION['pagevalueForCohort'];
fillpage($page);
}
function deleteFill()
{
$page=$_SESSION['pagevalueForCohort'];
fillPage($page);
}
if(isset($_POST['editButton']))
{
$presentcount=$_POST['editButton'];
$_SESSION['cohortafteredit']=$presentcount;
editFill();
}
if(isset($_POST['cancelButton']))
{
$page=$_SESSION['pagevalueForCohort'];
}


if(isset($_POST['btnupdate'])){
$staffid=$_POST['staffid'];
$subcode=$_POST['subcode'];
$ECheck=$_POST['ECheck']; $availability=implode('.',$ECheck);
$con=mysql_connect("192.168.15.26","root","admin"); $db=mysql_select_db("heos",$con);
$update=mysql_query("update staffavailabilitytimetable set availability='$availability' where staffid='$staffid' and subjectcode='$subcode'");
if($update) print "<script langauge=\"javascript\">alert('Successfully Updated');</script>";
CollegeDetailsfill();
}

function editFill(){
$page=$_SESSION['pagevalueForCohort'];
$limit = 5;
$con=mysql_connect("192.168.15.26","root","admin"); $db=mysql_select_db("heos",$con);
$result =mysql_query("select count(*) from staffavailabilitytimetable",$con);
$total = mysql_result($result, 0);
$pager  = getPagerData($total, $limit, $page);
$offset = $pager->offset;
$limit  = $pager->limit;
$page   = $pager->page;
$arrayCohort=$_SESSION['cohortafteredit'];
$queryselectCohortexec=mysql_query("SELECT * from staffavailabilitytimetable limit $offset,$limit");
print "<br><form method=post>
<table border=0 align=center cellspacing=1 cellpadding=0>
<tr><th>S.NO</th><th>Staff Name</th><th>Subject Name</th><th>Availability</th><th></th></tr>";
$sno=1;
while($rs14=mysql_fetch_array($queryselectCohortexec)){
$staffavailabilityid=$rs14[0];
$StaffId=$rs14[1];
$rt=mysql_query("select * from staffpersonalinformation where staffid='$StaffId'");
while($arr=mysql_fetch_array($rt)){ $StaffName1=$arr["firstname"].' '.$arr["lastname"]; }
$subjectcode=$rs14[2];
$rt=mysql_query("select SubjectName from subjectcreditdetails where SubjectCode='$subjectcode'"); $SubjectName=mysql_result($rt,"SubjectName");
$Availability=$rs14[3];
$EAvailability=explode('.',$Availability); $daysE=array();
foreach($EAvailability as $k=>$value){ if(!empty($value))
switch($value){
case 1:$daysE[]='Mon'; break;
case 2:$daysE[]='Tue'; break;
case 3:$daysE[]='Wed'; break;
case 4:$daysE[]='Thu'; break;
case 5:$daysE[]='Fri'; break;
case 6:$daysE[]='Sat'; break;
case 0:$daysE[]='Sun'; break;
}
}
$RAvailability=implode('.',$daysE);
if(array_key_exists($staffavailabilityid,$arrayCohort)){  $daysE='';
$ck=0; foreach($EAvailability as $k=>$value) if($value==7){ $ck=1; break; }
if($ck) $daysE=$daysE."<input type=\"checkbox\" name=\"ECheckA\" id=\"ECheckA\" value=\"7\" onClick=\"EcheckedAll(this,7);\" checked>All";
else $daysE=$daysE."<input type=\"checkbox\" name=\"ECheckA\" id=\"ECheckA\" value=\"7\" onClick=\"EcheckedAll(this,7);\">All";
$ck=0; foreach($EAvailability as $k=>$value) if($value==1){ $ck=1; break; }
if($ck) $daysE=$daysE."<input type=\"checkbox\" name=\"ECheck[0]\" id=\"ECheck[0]\" value=\"1\" onClick=\"EcheckedAll(this,1);\" checked>Mon";
else $daysE=$daysE."<input type=\"checkbox\" name=\"ECheck[0]\" id=\"ECheck[0]\" value=\"1\" onClick=\"EcheckedAll(this,1);\">Mon";
$ck=0; foreach($EAvailability as $k=>$value) if($value==2){ $ck=1; break; }
if($ck) $daysE=$daysE."<input type=\"checkbox\" name=\"ECheck[1]\" id=\"ECheck[1]\" value=\"2\" onClick=\"EcheckedAll(this,2);\" checked>Tue";
else $daysE=$daysE."<input type=\"checkbox\" name=\"ECheck[1]\" id=\"ECheck[1]\" value=\"2\" onClick=\"EcheckedAll(this,3);\">Tue";
$ck=0; foreach($EAvailability as $k=>$value) if($value==3){ $ck=1; break; }
if($ck) $daysE=$daysE."<input type=\"checkbox\" name=\"ECheck[2]\" id=\"ECheck[2]\" value=\"3\" onClick=\"EcheckedAll(this,3);\" checked>Wed";
else $daysE=$daysE."<input type=\"checkbox\" name=\"ECheck[2]\" id=\"ECheck[2]\" value=\"3\" onClick=\"EcheckedAll(this,3);\">Wed";
$ck=0; foreach($EAvailability as $k=>$value) if($value==4){ $ck=1; break; }
if($ck) $daysE=$daysE."<input type=\"checkbox\" name=\"ECheck[3]\" id=\"ECheck[3]\" value=\"4\" onClick=\"EcheckedAll(this,4);\" checked>Thu";
else $daysE=$daysE."<input type=\"checkbox\" name=\"ECheck[3]\" id=\"ECheck[3]\" value=\"4\" onClick=\"EcheckedAll(this,4);\">Thu";
$ck=0; foreach($EAvailability as $k=>$value) if($value==5){ $ck=1; break; }
if($ck) $daysE=$daysE."<input type=\"checkbox\" name=\"ECheck[4]\" id=\"ECheck[4]\" value=\"5\" onClick=\"EcheckedAll(this,5);\" checked>Fri";
else $daysE=$daysE."<input type=\"checkbox\" name=\"ECheck[4]\" id=\"ECheck[4]\" value=\"5\" onClick=\"EcheckedAll(this,5);\">Fri";
$ck=0; foreach($EAvailability as $k=>$value) if($value==6){ $ck=1; break; }
if($ck) $daysE=$daysE."<input type=\"checkbox\" name=\"ECheck[5]\" id=\"ECheck[5]\" value=\"6\" onClick=\"EcheckedAll(this,6);\" checked>Sat";
else $daysE=$daysE."<input type=\"checkbox\" name=\"ECheck[5]\" id=\"ECheck[5]\" value=\"6\" onClick=\"EcheckedAll(this,6);\">Sat";
$ck=0; foreach($EAvailability as $k=>$value) if($value==0){ $ck=1; break; }
if($ck) $daysE=$daysE."<input type=\"checkbox\" name=\"ECheck[6]\" id=\"ECheck[6]\" value=\"0\" onClick=\"EcheckedAll(this,0);\" checked>Sun";
else $daysE=$daysE."<input type=\"checkbox\" name=\"ECheck[6]\" id=\"ECheck[6]\" value=\"0\" onClick=\"EcheckedAll(this,0);\">Sun";


print "<tr><td name=d[] value=$sno>$sno</td><td>$StaffName1 -- $StaffId</td><td>$SubjectName -- $subjectcode</td>
<td>$daysE</td>
<td><input type=\"hidden\" name=\"staffid\" value=\"$StaffId\"><input type=\"hidden\" name=\"subcode\" value=\"$subjectcode\">
<input type=\"submit\" id=\"btnupdate\" name=\"btnupdate\" value=\"Update\" class=\"buttonstatic\" onmouseover=\"changeimage(this,'buttonover');\" onmouseout=\"changeimage(this,'buttonstatic');\">
&nbsp;&nbsp;<input type=\"submit\" id=\"cancelButton\" name=\"cancelButton\"  value=\"Cancel\" class=\"buttonstatic\" onmouseover=\"changeimage(this,'buttonover');\" onmouseout=\"changeimage(this,'buttonstatic');\"></td></tr>";
}
else print "<tr><td name=d[] value=$sno>$sno</td><td>$StaffName1 -- $StaffId</td><td>$SubjectName -- $subjectcode</td><td>$RAvailability</td>
<td><input type=\"hidden\" name=\"Collegename[]\" value=\"$staffavailabilityid\">
<input type=\"submit\" name=\"editButton[$staffavailabilityid]\" value=\"Edit\" disabled class=\"buttonstatic\" onmouseover=\"changeimage(this,'buttonover');\" onmouseout=\"changeimage(this,'buttonstatic');\">
&nbsp;<input type=\"submit\" name=\"deleteButton[$staffavailabilityid]\" value=\"Delete\" disabled class=\"buttonstatic\" onmouseover=\"changeimage(this,'buttonover');\" onmouseout=\"changeimage(this,'buttonstatic');\"></td></tr>";

$sno=$sno+1;
}
print "<tr><td align=center colspan=6>";
if($page == 1) echo "Previous"; else echo "<a href=\"staffavailability.php?page=" . ($page - 1) . "\">Previous</a>";
print " ||  \n";
if ($page == $pager->numPages) echo "Next";  else  echo "<a href=\"staffavailability.php?page=" . ($page + 1) . "\">Next</a>";
print "<br>$page of $pager->numPages</td></tr></table></form>";

}
?>

</body>

</html>
