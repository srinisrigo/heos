<?php session_start();
include "../DataBase/dbconnection.php";
require_once(dirname(__FILE__) . '/xajax.inc.php');
function setSlots($intake,$slotdate){
$objResponse =& new xajaxResponse();
if($intake=='none') return $objResponse->getXML();
$objResponse->addScript("document.getElementById('SlotCombo').options.length = 0;");
$objResponse->addScript("addOption('SlotCombo','" . 'select' . "','" . 'none' . "');");
$slotdate=date('Y-m-d',strtotime($slotdate));
$pikslots=mysql_query("select slot from timetableassigned where intake='$intake' and todaydate='$slotdate' and subjectid!=0 and staffid!=0 and roomid!=0 order by slot");
while($ark=mysql_fetch_array($pikslots)){ $slot=$ark['slot']; $objResponse->addScript("addOption('SlotCombo','".$slot."','" . $slot . "');"); }
return $objResponse->getXML();
}
$xajax =& new xajax();
$xajax->registerFunction("setSlots");
$xajax->processRequests();
?>
<html>
<head>
<?php $xajax->printJavascript(); ?>
<script type="text/javascript" src="./Images/datetimepicker.js"></script>
<script type="text/javascript" src="./Images/transactionscript.js"></script>
<link rel="stylesheet" href="../Style/heoscss.css">
<script language="javascript">
function addOption(selectId, txt, val){
var objOption = new Option(txt,val);
document.getElementById(selectId).options.add(objOption);
}
function leaveMaster(){
var typeofleave=document.getElementById('typeofleave');
var tobj=document.getElementById('LeaveMasterTable').rows;
for(i=2;i<5;i++) tobj[i].style.display=""; document.getElementById('IntakeCombo').selectedIndex=0;
if(typeofleave.selectedIndex==0) for(i=2;i<5;i++) tobj[i].style.display="none";
if(typeofleave.selectedIndex==1){ tobj[4].style.display="none"; document.getElementById('IntakeCombo').disabled=1; }
if(typeofleave.selectedIndex==2){ tobj[4].style.display="none"; document.getElementById('IntakeCombo').disabled=0; }
if(typeofleave.selectedIndex==3){ tobj[3].style.display="none"; document.getElementById('IntakeCombo').disabled=0; }
}
function btover(obj,cname){ obj.className=cname; }

function initialize()
{
course=document.getElementById('CourseCombo');
course.options[0].selected=true;
}
</script>
<title>Leave Master</title>
</head>
<body>
<?php
print "<form method='post' name='LeaveMaster'>
<table id='LeaveMasterTable' cellspacing=1 cellpadding=0>
<tr><th colspan=4>Leave Master</th></tr>
<tr><td>Type of Leave</td><td colspan=3><select name='typeofleave' id='typeofleave' onChange='leaveMaster();'>
<option value='none' selected>select</option><option value='General'>General</option>
<option value='Partial'>Partial</option><option value='Slot'>Slot</option></select></td></tr>
<tr style='display:none;'><td>Intake</td><td><select name='IntakeCombo' id='IntakeCombo' onChange='return initialize();' disabled><option value='none'>select</option>";
$exec=mysql_query("select batches from intakecourseslist");
while($res=mysql_fetch_array($exec)){ $batches=$res["batches"]; $Abatches=explode('.',$batches);
foreach($Abatches as $kk=>$intake) print "<option value='$intake'>$intake</option>"; }
print "</select></td>
<td>Leave Reason</td>
<td><input class='input' type='text' name='leavereason' id='leavereason'></td></tr>
<tr style='display:none;'><td>From Date</td>
<td><input type='text' name='fromdate' readonly id='fromdate' size='12' maxlength='12'>
<a href=\"javascript:NewCal('fromdate','ddmmmyyyy')\">
<img src='../Images/cal.gif' alt='Pick a date' width=16 height=16 border='0'></a></td>
<td>To Date</td>
<td><input type='text' name='todate' readonly id='todate' size='12' maxlength='12'>
<a href=\"javascript:NewCal('todate','ddmmmyyyy')\">
<img src='../Images/cal.gif' alt='Pick a date' width=16 height=16 border='0'></a></td></tr>
<tr style='display:none;'><td>Slot/Session Date</td>
<td><input type='text' name='slotdate' readonly id='slotdate' size='12' maxlength='12' onchange=\"return xajax_setSlots(document.getElementById('IntakeCombo').value,this.value)\">
<a href=\"javascript:NewCal('slotdate','ddmmmyyyy')\">
<img src='../Images/cal.gif' alt='Pick a date' width=16 height=16 border='0'></a></td>
<td>Slot/Session Number</td><td><select name='SlotCombo' id='SlotCombo'>
<option value='none'>select</option></select></td></tr>
<tr><td colspan=4 align=center>
<input type='submit' name='AddButton' value='Add'></td></tr></table></form>";
?>
<?php
//
if(!isset($_POST['editButton']) && !isset($_POST['cancelButton']) && !isset($_POST['deleteButton']) && !isset($_POST['updateButton']) && !isset($_POST['AddButton']))
{
$_SESSION['editreference']="";
$_SESSION['updatereference']="";

LeaveMasterFill();
}
?>

<?php
function LeaveMasterFill(){
if(!isset($_GET['page'])){
@$cat=$_GET['cat'];
if(strlen($cat)==0){ $page=1; fillPage($page); }
else if(strlen($cat)==6 || strlen($cat)==10 )
{
if(!isset($_SESSION['pagevalueforLeaveMaster']))
{
$page=1;
$_SESSION['pagevalueforLeaveMaster']=$page;
fillPage($page);
}
else
{
$page=$_SESSION['pagevalueforLeaveMaster'];
$_SESSION['pagevalueforLeaveMaster']=$page;
}
}
else
{
$page=$_SESSION['pagevalueforLeaveMaster'];
fillPage($page);
}
}
else
{
$page = $_GET['page'];
$_SESSION['pagevalueforLeaveMaster']=$page;
fillPage($page);
}
}
?>

<?php
if(isset($_POST['AddButton'])){
if($_POST['typeofleave']!='none'){
$IntakeCombo=''; $fromdate=''; $todate=''; $leavereason='';
$typeofleave=$_POST['typeofleave'];
$leavereason=$_POST['leavereason'];
if($typeofleave!='General') $IntakeCombo=$_POST['IntakeCombo']; else $IntakeCombo='--';
if($typeofleave!='Slot'){
$fromdate=$_POST['fromdate']; $fromdate=date('Y-m-d',strtotime($fromdate));
$todate=$_POST['todate']; $todate=date('Y-m-d',strtotime($todate)); }
$SlotCombo=$_POST['SlotCombo'];
if($typeofleave=='Slot'){
$slotdate=$_POST['slotdate']; $slotdate=date('Y-m-d',strtotime($slotdate));
$fromdate=$slotdate; $todate=$slotdate; }
if($SlotCombo=='none')  $SlotCombo=0;
$execquery=mysql_query("insert into leavemaster values('0','$typeofleave','$IntakeCombo','$fromdate','$todate','$SlotCombo','$leavereason')");
if($execquery) echo "<script langauge='javascript'>alert('Successfully Inserted')</script>";
}
LeaveMasterFill();
}

function fillPage($page){
@$cat=$_GET['cat'];
$_SESSION['pagevalueforLeaveMaster']=$page;
$page  = (int) $page;
$limit = 5;


$result =mysql_query("select count(*) from leavemaster");
$total = mysql_result($result, 0);
$pager  = getPagerData($total, $limit, $page);
if($total==0) $offset=0; else $offset = $pager->offset;
$limit  = $pager->limit;
$page   = $pager->page;
$querySelectMarkScheme="select * from leavemaster limit $offset,$limit";
$querySelectMarkSchemeExec=mysql_query($querySelectMarkScheme);
if(mysql_num_rows($querySelectMarkSchemeExec)){
print "<form method='post'>
<table boder=0 cellspacing=1 cellpadding=0>
<tr><th>s.no</th><th>Type of Leave</th><th>Intake</th><th>From Date</th><th>To Date</th><th>Slot</th><th>Leave Reason</th><th>&nbsp;</th></tr>\n";
$sno=1;
while($re=mysql_fetch_array($querySelectMarkSchemeExec)){
$leaveid=$re["LeaveId"]; $TypeofLeave=$re["TypeofLeave"]; $Intake=$re["Intake"];
$Date1=$re["Date1"];$Date1=date('d-M-Y',strtotime($Date1));
$Date2=$re["Date2"];$Date2=date('d-M-Y',strtotime($Date2));
$Slot=$re["Slot"]; $LeaveReason=$re["LeaveReason"];
print "<tr><td name=d[] value=$sno>$sno</td><td>$TypeofLeave</td><td>$Intake</td><td>$Date1</td><td>$Date2</td><td>$Slot</td><td>$LeaveReason</td>
<input class='input' type='hidden' name='leaveid[]' value='$leaveid'>
<td><input type='submit' name='deleteButton[$leaveid]' value='Delete'></td></tr>";
$sno=$sno+1;
}
print "<tr><td align=center colspan=10>";
if($page == 1) echo "Previous";
else echo "<a href='leaveMaster.php?page=" . ($page - 1) . "'>Previous</a>";
print " ||  ";
if($page == $pager->numPages) // this is the last page - there is no next page
echo "Next";
else echo "<a href='leaveMaster.php?page=" . ($page + 1) . "'>Next</a>";
print "<br>$page of $pager->numPages</td></tr></table></form>";
}
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
?>


<?php
/***********************Delete Button Code******************************/
if(isset($_POST['deleteButton']))
{

deletefill();
$LeaveMasterfordelete=$_POST['deleteButton'];

$_SESSION['LeaveMasterFordelete']=$LeaveMasterfordelete;
echo "<script langauge='javascript'>var result=confirm('Are You Sure Want to Delete');if(result){val='delete';self.location='leaveMaster.php?cat=' + val;}else{val='dontdelete';self.location='leaveMaster.php?cat=' + val;}</script>";


}
/*****************************Deleet Button Code Ends***********************/
?>

<?php
function deletefill()
{
$page=$_SESSION['pagevalueforLeaveMaster'];
fillpage($page);
}
?>


<?php
@$cat=$_GET['cat'];
if(isset($cat) and strlen($cat) == 6)
{
$LeaveMasterfordelete=$_SESSION['LeaveMasterFordelete'];
$LeaveMasterarray=array_keys($LeaveMasterfordelete);


$queryMarkSchemeDelete="delete from leavemaster where LeaveId='$LeaveMasterarray[0]'";
$queryMarkSchemeDeleteexec=mysql_query($queryMarkSchemeDelete);
print "<body onLoad='alert('Successfully Deleted');'> \n";
$page=$_SESSION['pagevalueforLeaveMaster'];
fillpage($page);
}
else if(isset($cat) and strlen($cat) == 10)
{
$page=$_SESSION['pagevalueforLeaveMaster'];
fillpage($page);
}
?>
</body>

</html>
