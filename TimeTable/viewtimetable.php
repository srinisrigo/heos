<?php session_start();
require_once(dirname(__FILE__) . '/xajax.inc.php');
function setTimetable($intake,$slotdate){
$objResponse =& new xajaxResponse();
$objResponse->addScript("document.getElementById('viewtimetable').innerHTML='';");
$objResponse->addScript("document.getElementById('explanation').innerHTML='';");
$con=mysql_connect('192.168.15.26','root','admin'); $db=mysql_select_db('heos');
$slotdate1=$slotdate; $slotdate=date('Y-m-d',strtotime($slotdate));
$pikexist=mysql_query("select count(*) from timetableassigned where intake='$intake' and todaydate='$slotdate'");
$day=date('l',strtotime($slotdate));
if(mysql_result($pikexist,0)>0){ $create="<table align=center border=0 cellspacing=1 cellpaddig=0><tr><th colspan=3>$day &nbsp;&nbsp;$slotdate1</th></tr>";
$pikall=mysql_query("select * from timetableassigned where intake='$intake' and todaydate='$slotdate' and subjectid!=0 and staffid!=0 and roomid!=0 order by slot");
while($ark=mysql_fetch_array($pikall)){
$subjectid=$ark['subjectid']; $staffid=$ark['staffid']; $roomid=$ark['roomid']; $classtime=$ark['classtime']; $timetableid=$ark['timetableid']; $slot=$ark['slot'];
$picsub=mysql_query("select * from subjectcreditdetails where SubjectCreditId='$subjectid'");
while($ark=mysql_fetch_array($picsub)){ $SubjectCode=$ark['SubjectCode']; $SubjectName=$ark['SubjectName']; }
$picstaff=mysql_query("select * from staffpersonalinformation where staffinformationid='$staffid'");
while($ark=mysql_fetch_array($picstaff)){ $staffid=$ark['staffid']; $StaffName=$ark['title'].'. '.$ark['firstname'].' '.$ark['lastname']; }
$picroom=mysql_query("select * from infrastructuredetails where HallIId='$roomid'");
while($ark=mysql_fetch_array($picroom)){ $HallNo=$ark['HallNo']; $HallName=$ark['HallName']; }
$pikslotname=mysql_query("select slotname from slottimings where timetablenameid='$timetableid' and slotnumber='$slot'"); $slotname=mysql_result($pikslotname,0);
$create=$create."<tr><td>$slotname</td><td><font color=#800000>Suject :</font> $SubjectName - $SubjectCode<br><br><font color=#800000>Staff :</font> $StaffName - $staffid<br><br><font color=#800000>Hall :</font> $HallName - $HallNo</td><td>$classtime</td></tr>";
}
$create=$create."</table>";
$objResponse->addScript("document.getElementById('viewtimetable').innerHTML='$create'");
}
else $objResponse->addScript("document.getElementById('viewtimetable').innerHTML='<table align=center border=0 cellspacing=0 cellpaddig=0><tr><td>Not Applicable</td></tr></table>'");
return $objResponse->getXML();
}

function setDayORWeek($intake,$dayweek){
$objResponse =& new xajaxResponse();
$objResponse->addScript("document.getElementById('viewtimetable').innerHTML='';");
$objResponse->addScript("document.getElementById('explanation').innerHTML='';");
$con=mysql_connect('192.168.15.26','root','admin'); $db=mysql_select_db('heos');
$objResponse->addScript("var tobj=document.getElementById('viewformat').rows[1].cells;");
if($dayweek=='days'){ $objResponse->addScript("tobj[0].style.display='';"); $objResponse->addScript("tobj[1].style.display='none';"); }
if($dayweek=='Weeks'){ $objResponse->addScript("tobj[1].style.display='';"); $objResponse->addScript("tobj[0].style.display='none';");
$pikttid=mysql_query("select timetableid from timetableassigned where intake='$intake'"); $ttid=mysql_result($pikttid,0);
$pikteachweek=mysql_query("select teachingweeks from timetablenamech where recordid='$ttid'"); $teachingweeks=mysql_result($pikteachweek,0);
$Ateachingweeks=explode('.',$teachingweeks); $create=''; $wcnt=1;
foreach($Ateachingweeks as $key=>$week){  $Strvalue=$week.'_'.$intake.'_'.$ttid;
if($wcnt==10){ $wcnt=1; $create=$create."<input type=\"radio\" name=\"week\" id=\"week\" value=\"$Strvalue\" onclick=\"return xajax_setWeekView(this.value)\">week $week<br>"; } else $create=$create."<input type=\"radio\" name=\"week\" id=\"week\" value=\"$Strvalue\" onclick=\"return xajax_setWeekView(this.value)\">week $week";
$wcnt++; }
$objResponse->addScript("tobj[1].innerHTML='$create';");
}
return $objResponse->getXML();
}

function setWeekView($passstring){
$objResponse =& new xajaxResponse();
$con=mysql_connect('192.168.15.26','root','admin'); $db=mysql_select_db('heos');
$Apassstring=explode('_',$passstring); $week=$Apassstring[0]; $intake=$Apassstring[1]; $ttid=$Apassstring[2];
$objResponse->addScript("document.getElementById('viewtimetable').innerHTML='';");
$objResponse->addScript("document.getElementById('explanation').innerHTML='';");

$subarray=array(); $staffarray=array(); $Subarindex=0; $Stafarindex=0;
$select=mysql_query("select * from timetablenamech where recordid='$ttid'");
while($ar=mysql_fetch_array($select)){ $totalnumberofweeks=$ar['numberofweeks'];
$fromdate=$ar['fromdate']; $todate=$ar['fromdate']; $teachingweeks=$ar['teachingweeks'];
$teachingdays=$ar['teachingdays']; $numberofslots=$ar['numberofslots']; $timetable=$ar['timetable'];
}
$Ateachingdays=explode('.',$teachingdays);
$str="<table align=center border=0 cellspacing=1 cellpadding=0><tr><th colspan=".($numberofslots+2).">Week ".$week."</th></tr><tr><td></td>";
$Slotselect=mysql_query("select * from slottimings where timetablenameid='$ttid' order by recordid");
while($arr=mysql_fetch_array($Slotselect)){ $slotname=$arr['slotname']; $starttime=$arr['starttime']; $endtime=$arr['endtime'];
$str=$str.'<td align=center>'.$slotname.'<br>('.$starttime.'-'.$endtime.')</td>';
}
$str=$str.'<td align=center>Date</td></tr>';
$Ateachingdays=explode('.',$teachingdays);

$strfromdate=strtotime($fromdate);
if($week!=1)$strfromdate=$strfromdate+(86400*7*($week-1));
$strtodate=$strfromdate+(86400*7);
$enddate=$strfromdate;
$Holiday=0;
while($strfromdate < $strtodate){
$chkday=0; $daycount=date('w',$strfromdate);
foreach($Ateachingdays as $k=>$v) if($v==$daycount){ $chkday=1; break; }
switch(date('w',$strfromdate)){
case 1:$day='Monday'; break;
case 2:$day='Tuesday'; break;
case 3:$day='Wednesday'; break;
case 4:$day='Thursday'; break;
case 5:$day='Friday'; break;
case 6:$day='Saturday'; break;
case 0:$day='Sunday'; break;
}
$curdate=date('Y-m-d',$strfromdate);

if($chkday){

$Fulldayselect=mysql_query("select count(*) from leavemaster where Date1='$curdate' and TypeofLeave='General'");
if(mysql_result($Fulldayselect,0)>0){
$Fulldayselect1=mysql_query("select Date2 from leavemaster where Date1='$curdate' and TypeofLeave='General'"); $Edate=mysql_result($Fulldayselect1,0);
if($strfromdate==strtotime($Edate)) $Holiday=1; else { $Holiday=2; $enddate=strtotime($Edate); }
}
if($Holiday==1){
$Slotselect=mysql_query("select * from slottimings where timetablenameid='$ttid' order by recordid"); $i=1;
while($arr=mysql_fetch_array($Slotselect)){ $starttime=$arr['starttime']; $endtime=$arr['endtime']; $slottime=$starttime.'-'.$endtime;
$ckexist=mysql_query("select count(*) from timetableassigned where timetableid='$ttid' and intake='$intake' and todaydate='$curdate' and day='$daycount' and week='$week' and slot='$i'");
if(mysql_result($ckexist,0)==0) $insertna=mysql_query("insert into timetableassigned values('0','$ttid','$intake','$curdate','$daycount','$week','$i','0','0','0','$slottime');"); $i++; }
$str=$str."<tr><td>".$day."</td><td align=center colspan=".$numberofslots.">Holiday</td><td>".date('d-M-Y',$strfromdate).'</td></tr>'; $Holiday=7; }
if($Holiday==2){ if($strfromdate<=$enddate){
$Slotselect=mysql_query("select * from slottimings where timetablenameid='$ttid' order by recordid"); $i=1;
while($arr=mysql_fetch_array($Slotselect)){ $starttime=$arr['starttime']; $endtime=$arr['endtime']; $slottime=$starttime.'-'.$endtime;
$ckexist=mysql_query("select count(*) from timetableassigned where timetableid='$ttid' and intake='$intake' and todaydate='$curdate' and day='$daycount' and week='$week' and slot='$i'");
if(mysql_result($ckexist,0)==0) $insertna=mysql_query("insert into timetableassigned values('0','$ttid','$intake','$curdate','$daycount','$week','$i','0','0','0','$slottime');"); $i++; }
$str=$str."<tr><td>".$day."</td><td align=center colspan=".$numberofslots.">Holiday</td><td>".date('d-M-Y',$strfromdate).'</td></tr>'; } else $Holiday=7; }

$partialselect=mysql_query("select count(*) from leavemaster where Intake='$intake' and Date1='$curdate' and TypeofLeave='Partial'");
if(mysql_result($partialselect,0)>0){
$partialselect1=mysql_query("select Date2 from leavemaster where Intake='$intake' and Date1='$curdate' and TypeofLeave='Partial'");  $Edate=mysql_result($partialselect1,0);
if($strfromdate==strtotime($Edate)) $Holiday=3; else { $Holiday=4; $enddate=strtotime($Edate); }
}
if($Holiday==3){
$Slotselect=mysql_query("select * from slottimings where timetablenameid='$ttid' order by recordid"); $i=1;
while($arr=mysql_fetch_array($Slotselect)){ $starttime=$arr['starttime']; $endtime=$arr['endtime']; $slottime=$starttime.'-'.$endtime;
$ckexist=mysql_query("select count(*) from timetableassigned where timetableid='$ttid' and intake='$intake' and todaydate='$curdate' and day='$daycount' and week='$week' and slot='$i'");
if(mysql_result($ckexist,0)==0) $insertna=mysql_query("insert into timetableassigned values('0','$ttid','$intake','$curdate','$daycount','$week','$i','0','0','0','$slottime');"); $i++; }
$str=$str."<tr><td>".$day."</td><td align=center colspan=".$numberofslots.">Holiday</td><td>".date('d-M-Y',$strfromdate).'</td></tr>'; $Holiday=7; }
if($Holiday==4){ if($strfromdate<=$enddate){
$Slotselect=mysql_query("select * from slottimings where timetablenameid='$ttid' order by recordid"); $i=1;
while($arr=mysql_fetch_array($Slotselect)){ $starttime=$arr['starttime']; $endtime=$arr['endtime']; $slottime=$starttime.'-'.$endtime;
$ckexist=mysql_query("select count(*) from timetableassigned where timetableid='$ttid' and intake='$intake' and todaydate='$curdate' and day='$daycount' and week='$week' and slot='$i'");
if(mysql_result($ckexist,0)==0) $insertna=mysql_query("insert into timetableassigned values('0','$ttid','$intake','$curdate','$daycount','$week','$i','0','0','0','$slottime');"); $i++; }
$str=$str."<tr><td>".$day."</td><td align=center colspan=".$numberofslots.">Holiday</td><td>".date('d-M-Y',$strfromdate).'</td></tr>'; } else $Holiday=7; }

$slotselect=mysql_query("select count(*) from leavemaster where Intake='$intake' and Date1='$curdate' and TypeofLeave='Slot'");
if(mysql_result($slotselect,0)>0){
$slotselect1=mysql_query("select Date2 from leavemaster where Intake='$intake' and Date1='$curdate' and TypeofLeave='Slot'");  $Edate=mysql_result($slotselect1,0);
if($strfromdate==strtotime($Edate)) $Holiday=5; else { $Holiday=6; $enddate=strtotime($Edate); }
$whichslotselect=mysql_query("select Slot from leavemaster where Intake='$intake' and Date1='$curdate' and TypeofLeave='Slot'");
$slot=mysql_result($whichslotselect,'Slot');
}
if($Holiday==5){
$str=$str.'<tr><td>'.$day.'</td>';  $i=1;
$Slotselect=mysql_query("select * from slottimings where timetablenameid='$ttid' order by recordid");
while($arr=mysql_fetch_array($Slotselect)){ $starttime=$arr['starttime']; $endtime=$arr['endtime']; $slottime=$starttime.'-'.$endtime;
$passdata=$ttid.'_'.$intake.'_'.date('d-M-Y',$strfromdate).'_'.$daycount.'_'.$week.'_'.$i.'_'.$starttime.'-'.$endtime;
if($i==$slot){  $str=$str."<td>Not Applicable</td>";
$ckexist=mysql_query("select count(*) from timetableassigned where timetableid='$ttid' and intake='$intake' and todaydate='$curdate' and day='$daycount' and week='$week' and slot='$i'");
if(mysql_result($ckexist,0)==0) $insertna=mysql_query("insert into timetableassigned values('0','$ttid','$intake','$curdate','$daycount','$week','$i','0','0','0','$slottime');");
}
else $str=$str."<td align=center><input class=\"buttonstatic\" type=\"button\" name=\"$passdata\" id=\"$passdata\" value=\"Assign\" onClick=\"return xajax_setSubStaffRoom(this.name);\"></td>";
$i++; }
$str=$str.'<td>'.date('d-M-Y',$strfromdate).'</td></tr>'; $Holiday=7;
}
if($Holiday==6){ if($strfromdate<=$enddate){
$slotselect2=mysql_query("select Slot from leavemaster where Intake='$intake' and Date1='$curdate' and TypeofLeave='Slot'");  $slot=mysql_result($slotselect2,0);
$str=$str.'<tr><td>'.$day.'</td>';  $i=1;
$Slotselect=mysql_query("select * from slottimings where timetablenameid='$ttid' order by recordid");
while($arr=mysql_fetch_array($Slotselect)){ $starttime=$arr['starttime']; $endtime=$arr['endtime']; $slottime=$starttime.'-'.$endtime;
$passdata=$ttid.'_'.$intake.'_'.date('d-M-Y',$strfromdate).'_'.$daycount.'_'.$week.'_'.$i.'_'.$starttime.'-'.$endtime;
if($i==$slot){  $str=$str."<td>Not Applicable</td>";
$ckexist=mysql_query("select count(*) from timetableassigned where timetableid='$ttid' and intake='$intake' and todaydate='$curdate' and day='$daycount' and week='$week' and slot='$i'");
if(mysql_result($ckexist,0)==0) $insertna=mysql_query("insert into timetableassigned values('0','$ttid','$intake','$curdate','$daycount','$week','$i','0','0','0','$slottime');");
}
else $str=$str."<td align=center><input class=\"buttonstatic\" type=\"button\" name=\"$passdata\" id=\"$passdata\" value=\"Assign\" onClick=\"return xajax_setSubStaffRoom(this.name);\"></td>";
$i++; }
$str=$str.'<td>'.date('d-M-Y',$strfromdate).'</td></tr>';
}
else $Holiday=7;
}
if($Holiday==0){
$str=$str.'<tr><td>'.$day.'</td>';  $i=1;
$Slotselect=mysql_query("select * from slottimings where timetablenameid='$ttid' order by recordid");
while($arr=mysql_fetch_array($Slotselect)){ $starttime=$arr['starttime']; $endtime=$arr['endtime'];
$ckexist=mysql_query("select count(*) from timetableassigned where timetableid='$ttid' and intake='$intake' and todaydate='$curdate' and day='$daycount' and week='$week' and slot='$i'");
if(mysql_result($ckexist,0)!=0){
$ckexist=mysql_query("select * from timetableassigned where timetableid='$ttid' and intake='$intake' and todaydate='$curdate' and day='$daycount' and week='$week' and slot='$i'");
while($arw=mysql_fetch_array($ckexist)){ $subjectid=$arw['subjectid']; $staffid=$arw['staffid']; $roomid=$arw['roomid']; }
if($Subarindex==0){ $subarray[$Subarindex++]=$subjectid; $staffarray[$Stafarindex++]=$staffid; }
else { $sbexst=1; $stexst=1;
foreach($subarray as $ky=>$sub) if($sub==$subjectid){ $sbexst=0; break; } if($sbexst) $subarray[$Subarindex++]=$subjectid;
foreach($staffarray as $ky=>$staff) if($staff==$staffid){ $stexst=0; break; }  if($stexst) $staffarray[$Stafarindex++]=$staffid;
}
$selsub=mysql_query("select SubjectCode from subjectcreditdetails where SubjectCreditId='$subjectid'"); $subname=mysql_result($selsub,'SubjectCode');
$pikstname=mysql_query("select staffid from staffpersonalinformation where staffinformationid='$staffid'");
$staffname=mysql_result($pikstname,'staffid');
//while($ark=mysql_fetch_array($pikstname)){ $staffname=$ark['title'].'. '.$ark['firstname'].' '.$ark['lastname']; }
$selroom=mysql_query("select HallNo from infrastructuredetails where HallIId='$roomid'"); $hallno=mysql_result($selroom,'HallNo');
$str=$str."<td><font color=#000000>Subject : $subname</font><br><font color=#FF0000>Staff : $staffname</font><br><font color=#800080>Hall Number : $hallno</font></td>"; }
else $str=$str."<td><font color=#000000>Subject :</font><br><font color=#FF0000>Staff :</font><br><font color=#800080>Hall Number :</font></td>";
$i++; }
$str=$str.'<td>'.date('d-M-Y',$strfromdate).'</td></tr>';
}
}
if($Holiday < 7 & $strfromdate==$enddate) $Holiday=0;
if($Holiday==7|$strfromdate==$enddate) $Holiday=0;
$strfromdate=$strfromdate+86400; }
$str=$str."</table>";
$sstr="<table border=0 cellspacing=0 cellpadding=0>";
foreach($subarray as $ky=>$sub){
$selsub=mysql_query("select * from subjectcreditdetails where SubjectCreditId='$sub'"); while($arr=mysql_fetch_array($selsub)){ $subcode=$arr['SubjectCode']; $subname=$arr['SubjectName']; }
$sstr=$sstr."<tr><td>$subcode</td><td>: &nbsp;&nbsp;$subname</td></tr>";
}
foreach($staffarray as $ky=>$staff){
$pikstname=mysql_query("select * from staffpersonalinformation where staffinformationid='$staff'");
while($ark=mysql_fetch_array($pikstname)){ $staffname=$ark['title'].'. '.$ark['firstname'].' '.$ark['lastname']; $staffid=$ark['staffid']; }
$sstr=$sstr."<tr><td>$staffid</td><td>: &nbsp;&nbsp;$staffname</td></tr>";
}
$sstr=$sstr."</table>";
$objResponse->addScript("document.getElementById('viewtimetable').innerHTML='$str';");
$objResponse->addScript("document.getElementById('explanation').innerHTML='$sstr';");
//echo $week.$intake.$ttid;
return $objResponse->getXML();
}


$xajax =& new xajax();
$xajax->registerFunction("setTimetable");
$xajax->registerFunction("setDayORWeek");
$xajax->registerFunction("setWeekView");
$xajax->processRequests();
?>
<html>
<head>  <title></title>
<?php $xajax->printJavascript(); ?>
<link href="./Images/heoscss.css" rel="stylesheet">
<script type="text/javascript" src="./Images/datetimepicker.js"></script>
</head>

<body>

<?php
$intake="Jun2008MCA";
print "<form method=post>
<table id=\"viewformat\" align=center border=0 cellspacing=1 cellpaddig=0>
<tr><td colspan=2><input type=\"radio\" name=\"days\" id=\"days\" onclick=\"return xajax_setDayORWeek('$intake',this.value)\" value=\"days\" checked> Day <input type=\"radio\" name=\"days\" id=\"days\" onclick=\"return xajax_setDayORWeek('$intake',this.value)\" value=\"Weeks\"> Week</td></tr>
<tr><td><input type=\"text\" name=\"fromdate\" readonly id=\"fromdate\" size=13 onchange=\"return xajax_setTimetable('$intake',this.value)\">
<a href=\"javascript:NewCal('fromdate','ddmmmyyyy')\"><img src=\"./Images/cal.gif\" alt=\"Pick a date\" width=20 height=20 border=0></a></td>
<td></td></tr>
</table><br>
<div id=\"viewtimetable\"></div><br><br>
<div id=\"explanation\"></div>
</form>";

?>

</body>

</html>
