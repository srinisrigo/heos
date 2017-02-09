<?php session_start(); ?>
<?php
require_once(dirname(__FILE__) . '/xajax.inc.php');
function getIntakes($recordid){
$objResponse =& new xajaxResponse();
$objResponse->addScript("document.getElementById('intake').options.length=1;");
$objResponse->addScript("document.getElementById('weeks').innerHTML='';");
$objResponse->addScript("document.getElementById('assign').innerHTML='';");
$objResponse->addScript("document.getElementById('nextWeeks').innerHTML='';");

$objResponse->addScript("document.getElementById('intake').options.length=0;");
$objResponse->addScript("addOption('intake','Select','none');");
if($recordid=='none') return $objResponse->getXML();
$con=mysql_connect('192.168.15.26','root','admin'); $db=mysql_select_db('heos');
$select=mysql_query("select batch from timetablenamech where recordid='$recordid'"); $batch=mysql_result($select,0);
$Abatch=explode('.',$batch);
foreach($Abatch as $k=>$intake){
$pikcourses=mysql_query("select batches from intakecourseslist where intake='$intake'"); $Rbatches=mysql_result($pikcourses,0);
$Abatches=explode('.',$Rbatches);
foreach($Abatches as $kk=>$batch) $objResponse->addScript("addOption('intake','" . $batch . "','" . $batch . "');");
}
return $objResponse->getXML();
}

function setCourses($intake){
$objResponse =& new xajaxResponse();
$objResponse->addScript("document.getElementById('weeks').innerHTML='';");
$objResponse->addScript("document.getElementById('assign').innerHTML='';");
$objResponse->addScript("document.getElementById('nextWeeks').innerHTML='';");

$objResponse->addScript("document.getElementById('ccode').options.length=0;");
$objResponse->addScript("addOption('ccode','Select','none');");
if($intake=='none') return $objResponse->getXML();
$con=mysql_connect('192.168.15.26','root','admin'); $db=mysql_select_db('heos');
$select=mysql_query("select courses from intakecourseslist where intake='$intake'"); $courseid=mysql_result($select,0);
$Acourseid=explode('.',$courseid);
foreach($Acourseid as $k=>$courseid){
$select=mysql_query("select CourseName from coursedetails where CourseId='$courseid'"); $cname=mysql_result($select,0);
$objResponse->addScript("addOption('ccode','" . $cname . "','" . $courseid . "');"); }
return $objResponse->getXML();
}

function getSection($intake,$courseid){
$objResponse =& new xajaxResponse();
$objResponse->addScript("document.getElementById('section').options.length=0;");
$objResponse->addScript("addOption('section','Select','none');");
if($intake=='none'|$courseid=='none') return $objResponse->getXML();
$con=mysql_connect('192.168.15.26','root','admin'); $db=mysql_select_db('heos');
$select=mysql_query("select * from sectionmaster where Intake='$intake' and Courseid='$courseid'");
while($arr=mysql_fetch_array($select)){  $sectionid=$arr['SectionId']; $sectionname=$arr['Section'];
$objResponse->addScript("addOption('section','" . $sectionname . "','" . $sectionid . "');"); }
return $objResponse->getXML();
}




function setTimetabletable($ttid,$intake,$week){
$objResponse =& new xajaxResponse();
$objResponse->addScript("document.getElementById('assign').innerHTML='';");
$objResponse->addScript("document.getElementById('nextWeeks').innerHTML='';");
if($ttid=='none') return $objResponse->getXML();
if($intake=='none') return $objResponse->getXML();
$con=mysql_connect('192.168.15.26','root','admin'); $db=mysql_select_db('heos');
$_SESSION['ttid']=$ttid; $_SESSION['intake']=$intake; $_SESSION['currentweek']=$week;
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
$ckexist=mysql_query("select count(*) from timetableassigned where timetableid='$ttid' and intake='$intake' and and todaydate='$curdate' and day='$daycount' and week='$week' and slot='$i'");
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
$passdata=$ttid.'_'.$intake.'_'.date('d-M-Y',$strfromdate).'_'.$daycount.'_'.$week.'_'.$i.'_'.$starttime.'-'.$endtime;
$str=$str."<td align=center><input class=\"buttonstatic\" type=\"button\" name=\"$passdata\" id=\"$passdata\" value=\"Assign\" onClick=\"return xajax_setSubStaffRoom(this.name);\"></td>";
$i++; }
$str=$str.'<td>'.date('d-M-Y',$strfromdate).'</td></tr>';
}
}
if($strfromdate==$enddate) $Holiday=0;
if($Holiday==7|$strfromdate==$enddate) $Holiday=0;
$strfromdate=$strfromdate+86400; }
$nxtweek=$week+1; $preweek=$week-1;
$str=$str."<tr><td align=center colspan=".($numberofslots+2)."><input class=\"buttonstatic\" type=\"button\" value=\"Cancel\" onClick=\"weekCancel()\">&nbsp;";
if($week!=1)$str=$str."<input class=\"buttonstatic\" type=\"button\" value=\"Previous\" onClick=\"return xajax_setNextweek($preweek);\">";
if($week<$totalnumberofweeks)$str=$str."&nbsp;&nbsp;<input class=\"buttonstatic\" type=\"button\" value=\"Next\" onClick=\"return xajax_setNextweek($nxtweek);\">";
$str=$str."</td></tr></table>";
$objResponse->addScript("document.getElementById('weeks').innerHTML='$str';");
return $objResponse->getXML();
}

function setNextweek($week){
$objResponse =& new xajaxResponse();
$objResponse->addScript("document.getElementById('assign').innerHTML='';");
$objResponse->addScript("document.getElementById('nextWeeks').innerHTML='';");

$con=mysql_connect('192.168.15.26','root','admin'); $db=mysql_select_db('heos');
$ttid=$_SESSION['ttid']; $intake=$_SESSION['intake']; $_SESSION['currentweek']=$week;
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
$passdata=$ttid.'_'.$intake.'_'.date('d-M-Y',$strfromdate).'_'.$daycount.'_'.$week.'_'.$i.'_'.$starttime.'-'.$endtime;
$str=$str."<td align=center><input class=\"buttonstatic\" type=\"button\" name=\"$passdata\" id=\"$passdata\" value=\"Assign\" onClick=\"return xajax_setSubStaffRoom(this.name);\"></td>";
$i++; }
$str=$str.'<td>'.date('d-M-Y',$strfromdate).'</td></tr>';
}
}
if($Holiday < 7 & $strfromdate==$enddate) $Holiday=0;
if($Holiday==7|$strfromdate==$enddate) $Holiday=0;
$strfromdate=$strfromdate+86400; }
$nxtweek=$week+1; $preweek=$week-1;
$str=$str."<tr><td align=center colspan=".($numberofslots+2)."><input class=\"buttonstatic\" type=\"button\" value=\"Cancel\" onClick=\"weekCancel()\">&nbsp;&nbsp;";
if($week!=1)$str=$str."<input class=\"buttonstatic\" type=\"button\" value=\"Previous\" onClick=\"return xajax_setNextweek($preweek);\">";
if($week<$totalnumberofweeks)$str=$str."&nbsp;&nbsp;<input class=\"buttonstatic\" type=\"button\" value=\"Next\" onClick=\"return xajax_setNextweek($nxtweek);\">";
$str=$str."</td></tr></table>";
$objResponse->addScript("document.getElementById('weeks').innerHTML='$str';");
return $objResponse->getXML();
}

function setSubStaffRoom($passvalue){
$objResponse =& new xajaxResponse();
$objResponse->addScript("document.getElementById('nextWeeks').innerHTML='';");
$_SESSION['passvalue']=$passvalue;
$con=mysql_connect('192.168.15.26','root','admin'); $db=mysql_select_db('heos');
$Apassvalue=explode('_',$passvalue);
$intake=$Apassvalue[1]; $day=$Apassvalue[3];
$todaydate=date('Y-m-d',strtotime($Apassvalue[2]));
$header='Date : '.$Apassvalue[2].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Slot : '.$Apassvalue[5].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Time : '.$Apassvalue[6];

$pikexist=mysql_query("select count(*) from timetableassigned where timetableid='$Apassvalue[0]' and intake='$intake' and todaydate='$todaydate' and day='$day' and week='$Apassvalue[4]' and slot='$Apassvalue[5]'");
if(mysql_result($pikexist,0)>0){
$str="<table align=center border=0 cellspacing=1 cellpadding=0><tr><th colspan=2>$header</th></tr>";
$pikrec=mysql_query("select * from timetableassigned where timetableid='$Apassvalue[0]' and intake='$intake' and todaydate='$todaydate' and day='$day' and week='$Apassvalue[4]' and slot='$Apassvalue[5]'");
while($ark=mysql_fetch_array($pikrec)){ $subjectid=$ark['subjectid']; $staffid=$ark['staffid']; $roomid=$ark['roomid']; }
$piksubject=mysql_query("select SubjectCode,SubjectName from subjectcreditdetails where SubjectCreditId='$subjectid'"); while($ak=mysql_fetch_array($piksubject)){ $subcode=$ak['SubjectCode']; $subname=$ak['SubjectName']; }
$pikstaff=mysql_query("select * from staffpersonalinformation where staffinformationid='$staffid'"); while($ak=mysql_fetch_array($pikstaff)){ $staffid=$ak['staffid']; $staffname=$ak['title'].'. '.$ak['firstname'].' '.$ak['lastname']; }
$pikroom=mysql_query("select HallNo,HallName from infrastructuredetails where HallIId='$roomid'"); while($ak=mysql_fetch_array($pikroom)){ $HallNo=$ak['HallNo']; $HallName=$ak['HallName']; }
$str=$str."<tr><td>Subject</td><td>$subname - $subcode</td></tr>";
$str=$str."<tr><td>Teaching Staff</td><td>$staffname - $staffid</td></tr>";
$str=$str."<tr><td>Hall Number</td><td>$HallName - $HallNo</td></tr>";
$str=$str."<tr><td align=center colspan=2><input class=\"buttonstatic\" type=\"button\" value=\"Cancel\" onClick=\"assignCancel()\">&nbsp;&nbsp;<input class=\"buttonstatic\" type=\"button\" name=\"$passvalue\" id=\"$passvalue\" value=\"Edit\" onClick=\"return xajax_editTimetable(this.name);\"></td></tr></table>";
}
else {
$str="<table align=center border=0 cellspacing=1 cellpadding=0><tr><th colspan=2>$header</th></tr>";
$str=$str."<tr><td>Subject</td><td><select name=\"subcode\" id=\"subcode\" onchange=\"return xajax_setStafflist(this.value,$day);\"><option value=\"none\">Select</option>";
$selectintakes=mysql_query("select subjectlist from batchstudyingsubjects where intake='$intake'"); $sublist=mysql_result($selectintakes,0);
$Asublist=explode('.',$sublist);
foreach($Asublist as $k=>$subcode){
$piksub=mysql_query("select SubjectName from subjectcreditdetails where SubjectCode='$subcode'"); $subname=mysql_result($piksub,0);
$str=$str."<option value=\"$subcode\">$subname</option>"; }
$str=$str."</select></td></tr>";
$str=$str."<tr><td>Teaching Staff</td><td><select name=\"staffid\" id=\"staffid\" onchange=\"return xajax_setSession(1,this.value);\"><option value=\"none\">Select</option></select></td></tr>";
$str=$str."<tr><td>Hall Number</td><td><select name=\"hallno\" id=\"hallno\" onchange=\"return xajax_setSession(2,this.value);\"><option value=\"none\">Select</option>";
$picstucount=mysql_query("select count(*) from studentregistration where intake='$intake'"); $stucount=mysql_result($picstucount,0);
$pichalls=mysql_query("select * from infrastructuredetails");
while($ark=mysql_fetch_array($pichalls)){  $HallIId=$ark['HallIId'];
$ckhallavail=mysql_query("select count(*) from timetableassigned where todaydate='$Apassvalue[2]' and roomid='$HallIId' and classtime='$Apassvalue[6]'");
if($ark['ClassCapacity']>=$stucount & mysql_result($ckhallavail,0)==0){ $HallNo=$ark['HallNo']; $str=$str."<option value=\"$HallIId\">$HallNo</option>"; } }
$str=$str."</select></td></tr>";
$str=$str."<tr><td align=center colspan=2><input class=\"buttonstatic\" type=\"button\" value=\"Cancel\" onClick=\"assignCancel()\">&nbsp;&nbsp;<input class=\"buttonstatic\" type=\"button\" value=\"Save\" onClick=\"return xajax_saveTimetable(this.value);\"></td></tr></table>";
$ttid=$Apassvalue[0];  $curweek=$Apassvalue[4];
$picslots=mysql_query("select numberofslots from timetablenamech where recordid='$ttid'"); $numberofslots=mysql_result($picslots,0);

$allweeks="<table align=center border=0 cellspacing=1 cellpadding=0><tr><th><input type=\"checkbox\" id=\"all\" onClick=\"return xajax_setSlotrepeat(this.checked,0);\">All Slots</th>";
$c=mysql_query("DROP TABLE IF EXISTS heos.slotrepeat;");
$c=mysql_query("CREATE TABLE `slotrepeat` (`slot` int(2) NOT NULL default '0',`boolean` tinyint(2) NOT NULL default '0',PRIMARY KEY  (`slot`)) ENGINE=InnoDB DEFAULT CHARSET=latin1;",$con);
$colcount=1;
for($week=1;$week<=$numberofslots;$week++) if($week!=$Apassvalue[5]){
$pikexist=mysql_query("select count(*) from timetableassigned where timetableid='$Apassvalue[0]' and intake='$intake' and todaydate='$todaydate' and day='$day' and week='$Apassvalue[4]' and slot='$week'");
if(mysql_result($pikexist,0)==0){
$c=mysql_query("insert into slotrepeat values('$week','0')");
if($colcount==10){ $allweeks=$allweeks."</tr><tr><td></td><td><input type=\"checkbox\" id=\"ck$week\" onClick=\"return xajax_setSlotrepeat(this.checked,$week);\">S$week</td>"; $colcount=1; }
else $allweeks=$allweeks."<td><input type=\"checkbox\" id=\"Sck$week\" onClick=\"return xajax_setSlotrepeat(this.checked,$week);\">S$week</td>";
}
$colcount++; }
$allweeks=$allweeks."</tr></table>";

$picweeks=mysql_query("select teachingweeks from timetablenamech where recordid='$ttid'"); $teachingweeks=mysql_result($picweeks,0);
$Ateachingweeks=explode('.',$teachingweeks);
$allweeks=$allweeks."<br><table align=center border=0 cellspacing=1 cellpadding=0><tr><th><input type=\"checkbox\" id=\"Wall\" onClick=\"return xajax_setWeekrepeat(this.checked,0);\">All Weeks</th>";
$c=mysql_query("DROP TABLE IF EXISTS heos.weekrepeat;");
$c=mysql_query("CREATE TABLE `weekrepeat` (`week` int(2) NOT NULL default '0',`boolean` tinyint(2) NOT NULL default '0',PRIMARY KEY  (`week`)) ENGINE=InnoDB DEFAULT CHARSET=latin1;",$con);
$colcount=1;
foreach($Ateachingweeks as $kk=>$week) if($week!=$curweek){
$pikexist=mysql_query("select count(*) from timetableassigned where timetableid='$Apassvalue[0]' and intake='$intake' and day='$day' and week='$week' and slot='$Apassvalue[5]'");
if(mysql_result($pikexist,0)==0){
$c=mysql_query("insert into weekrepeat values('$week','0')");
if($colcount==10){ $allweeks=$allweeks."</tr><tr><td></td><td><input type=\"checkbox\" id=\"Wck$week\" onClick=\"return xajax_setWeekrepeat(this.checked,$week);\">W$week</td>"; $colcount=1; }
else $allweeks=$allweeks."<td><input type=\"checkbox\" id=\"Wck$week\" onClick=\"return xajax_setWeekrepeat(this.checked,$week);\">W$week</td>";
}
$colcount++; }
$allweeks=$allweeks."</tr></table>";
$objResponse->addScript("document.getElementById('nextWeeks').innerHTML='$allweeks';");
}
$objResponse->addScript("document.getElementById('assign').innerHTML='$str';");
return $objResponse->getXML();
}

function setStafflist($subjectcode,$day){
$objResponse =& new xajaxResponse();
$_SESSION['subjectcode']=$subjectcode;
$objResponse->addScript("document.getElementById('staffid').options.length=0;");
$objResponse->addScript("addOption('staffid','Select','none');");
if($subjectcode=='none') return $objResponse->getXML();
$con=mysql_connect('192.168.15.26','root','admin'); $db=mysql_select_db('heos');
$selectintakes=mysql_query("select * from staffavailabilitytimetable where subjectcode='$subjectcode'");
while($ar=mysql_fetch_array($selectintakes)){ $addflag=0;
$staffid=$ar['staffid']; $availability=$ar['availability']; $Aavailability=explode('.',$availability);
$pikstname=mysql_query("select title,firstname,lastname from staffpersonalinformation where staffid='$staffid'");
while($ark=mysql_fetch_array($pikstname)) $staffname=$ark[0].'. '.$ark[1].' '.$ark[2];
foreach($Aavailability as $kk=>$Ad) if($Ad==$day){ $addflag=1; break; }
if($addflag) $objResponse->addScript("addOption('staffid','" . ($staffname.' - '.$staffid) . "','" . $staffid . "');"); }

$ttid=$_SESSION['ttid']; $intake=$_SESSION['intake']; $curweek=$_SESSION['currentweek'];
return $objResponse->getXML();
}

function setSlotrepeat($ckecked,$weekno){
$objResponse =& new xajaxResponse();
$con=mysql_connect('192.168.15.26','root','admin'); $db=mysql_select_db('heos');
$ttid=$_SESSION['ttid']; $intake=$_SESSION['intake']; $curweek=$_SESSION['currentweek'];
$picweeks=mysql_query("select numberofslots from timetablenamech where recordid='$ttid'");
$tw=mysql_result($picweeks,0); $w=$_SESSION['currentweek'];
if($ckecked=='true'&$weekno!=0) $c=mysql_query("update slotrepeat set boolean='1' where slot='$weekno'");
if($ckecked=='false'&$weekno!=0) $c=mysql_query("update slotrepeat set boolean='0' where slot='$weekno'");
if($weekno!=0){
$sc=mysql_query("select count(*) from slotrepeat where boolean='0'",$con);  $allck=mysql_result($sc,0);
if($allck>0) $objResponse->addScript("document.getElementById('all').checked='';");
else $objResponse->addScript("document.getElementById('all').checked='true';"); }

if($ckecked=='true' & $weekno==0){
for($i=1;$i<=$tw;$i++){ $name="Sck".$i; $objResponse->addScript("document.getElementById('$name').checked='true';"); }
$c=mysql_query("update slotrepeat set boolean='1'");
return $objResponse->getXML(); }
if($ckecked=='false' & $weekno==0){
for($i=1;$i<=$tw;$i++){ $name="Sck".$i; $objResponse->addScript("document.getElementById('$name').checked='';"); }
$c=mysql_query("update slotrepeat set boolean='0'");
return $objResponse->getXML(); }
return $objResponse->getXML();
}

function setWeekrepeat($ckecked,$weekno){
$objResponse =& new xajaxResponse();
$con=mysql_connect('192.168.15.26','root','admin'); $db=mysql_select_db('heos');
$ttid=$_SESSION['ttid']; $intake=$_SESSION['intake']; $curweek=$_SESSION['currentweek'];
$picweeks=mysql_query("select numberofweeks from timetablenamech where recordid='$ttid'");
$tw=mysql_result($picweeks,0); $w=$_SESSION['currentweek'];
if($ckecked=='true'&$weekno!=0) $c=mysql_query("update weekrepeat set boolean='1' where week='$weekno'");
if($ckecked=='false'&$weekno!=0) $c=mysql_query("update weekrepeat set boolean='0' where week='$weekno'");
if($weekno!=0){
$sc=mysql_query("select count(*) from weekrepeat where boolean='0'",$con);  $allck=mysql_result($sc,0);
if($allck>0) $objResponse->addScript("document.getElementById('Wall').checked='';");
else $objResponse->addScript("document.getElementById('Wall').checked='true';"); }

if($ckecked=='true' & $weekno==0){
for($i=1;$i<=$tw;$i++){ $name="Wck".$i; $objResponse->addScript("document.getElementById('$name').checked='true';"); }
$c=mysql_query("update weekrepeat set boolean='1'");
return $objResponse->getXML(); }
if($ckecked=='false' & $weekno==0){
for($i=1;$i<=$tw;$i++){ $name="Wck".$i; $objResponse->addScript("document.getElementById('$name').checked='';"); }
$c=mysql_query("update weekrepeat set boolean='0'");
return $objResponse->getXML(); }
return $objResponse->getXML();
}

function saveTimetable($btnvalue){
$objResponse =& new xajaxResponse();
$con=mysql_connect('192.168.15.26','root','admin'); $db=mysql_select_db('heos');
$passvalue=$_SESSION['passvalue'];
$Apassvalue=explode('_',$passvalue);

$ttid=$Apassvalue[0]; $intake=$Apassvalue[1]; $todaydate=$Apassvalue[2]; $day=$Apassvalue[3]; $week=$Apassvalue[4]; $slot=$Apassvalue[5]; $classtime=$Apassvalue[6];
$subjectcode=$_SESSION['subjectcode']; $staffid=$_SESSION['staffid']; $hallid=$_SESSION['hallid'];
$todaydate=date('Y-m-d',strtotime($todaydate));
$picstaffrec=mysql_query("select staffinformationid from staffpersonalinformation where staffid='$staffid'"); $staffrecid=mysql_result($picstaffrec,0);
$picsubrec=mysql_query("select SubjectCreditId from subjectcreditdetails where SubjectCode='$subjectcode'"); $subjectid=mysql_result($picsubrec,0);
if($btnvalue=='Save'){
$exec=mysql_query("insert into timetableassigned values('0','$ttid','$intake','$todaydate','$day','$week','$slot','$subjectid','$staffrecid','$hallid','$classtime');");
if($exec){ $objResponse->addScript("alert('Sucessive done')"); $objResponse->addScript("assignCancel();"); }
$select=mysql_query("select * from weekrepeat where boolean='1'");
while($a=mysql_fetch_array($select)){
$wk=$a["week"]; $nextweekdate=date("Y-m-d", (($wk-$week)*7*86400)+strtotime($todaydate));
$insertexec=mysql_query("insert into timetableassigned values('0','$ttid','$intake','$nextweekdate','$day','$wk','$slot','$subjectid','$staffrecid','$hallid','$classtime');");
}
$Sselect=mysql_query("select * from slotrepeat where boolean='1'");
while($arrk=mysql_fetch_array($Sselect)){ $slot=$arrk['slot'];
$pikclasstime=mysql_query("select * from slottimings where timetablenameid='$ttid' and slotnumber='$slot'"); while($arq=mysql_fetch_array($pikclasstime)){ $classtime=$arq['starttime'].'-'.$arq['endtime']; }
$exec=mysql_query("insert into timetableassigned values('0','$ttid','$intake','$todaydate','$day','$week','$slot','$subjectid','$staffrecid','$hallid','$classtime');");
$select=mysql_query("select * from weekrepeat where boolean='1'");
while($a=mysql_fetch_array($select)){
$wk=$a["week"]; $nextweekdate=date("Y-m-d", (($wk-$week)*7*86400)+strtotime($todaydate));
$insertexec=mysql_query("insert into timetableassigned values('0','$ttid','$intake','$nextweekdate','$day','$wk','$slot','$subjectid','$staffrecid','$hallid','$classtime');");
}
}

}
if($btnvalue=='Update'){
$qupdate=mysql_query("update timetableassigned set subjectid='$subjectid',staffid='$staffrecid',roomid='$hallid' where timetableid='$ttid' and intake='$intake' and todaydate='$todaydate' and day='$day' and week='$week' and slot='$slot' and classtime='$classtime'");
}
$objResponse->addScript("document.getElementById('assign').innerHTML='';");
$objResponse->addScript("document.getElementById('nextWeeks').innerHTML='';");
return $objResponse->getXML();
}

function setSession($set,$value){ $objResponse =& new xajaxResponse();
if($set==1) $_SESSION['staffid']=$value;
if($set==2) $_SESSION['hallid']=$value;
return $objResponse->getXML(); }

function editTimetable($passvalue){ $objResponse =& new xajaxResponse();
$_SESSION['passvalue']=$passvalue;
$objResponse->addScript("document.getElementById('nextWeeks').innerHTML='';");
$con=mysql_connect('192.168.15.26','root','admin'); $db=mysql_select_db('heos');
$Apassvalue=explode('_',$passvalue);
$intake=$Apassvalue[1]; $day=$Apassvalue[3];
$todaydate=date('Y-m-d',strtotime($Apassvalue[2]));
$header='Date : '.$Apassvalue[2].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Slot : '.$Apassvalue[5].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Time : '.$Apassvalue[6];

$pikrec=mysql_query("select * from timetableassigned where timetableid='$Apassvalue[0]' and intake='$intake' and todaydate='$todaydate' and day='$day' and week='$Apassvalue[4]' and slot='$Apassvalue[5]'");
while($ark=mysql_fetch_array($pikrec)){ $subjectid=$ark['subjectid']; $Estaffid=$ark['staffid']; $roomid=$ark['roomid']; }
$_SESSION['hallid']=$roomid;

$str="<table align=center border=0 cellspacing=1 cellpadding=0><tr><th colspan=2>$header</th></tr>";
$str=$str."<tr><td>Subject</td><td><select name=\"subcode\" id=\"subcode\" onchange=\"return xajax_setStafflist(this.value,$day);\"><option value=\"none\">Select</option>";
$selectintakes=mysql_query("select subjectlist from batchstudyingsubjects where intake='$intake'"); $sublist=mysql_result($selectintakes,0);
$Asublist=explode('.',$sublist);
foreach($Asublist as $k=>$subcode){
$piksub=mysql_query("select * from subjectcreditdetails where SubjectCode='$subcode'");
while($ak=mysql_fetch_array($piksub)){ $SubjectCreditId=$ak['SubjectCreditId']; $subname=$ak['SubjectName']; }
if($SubjectCreditId==$subjectid){$_SESSION['subjectcode']=$subcode;  $str=$str."<option value=\"$subcode\" selected>$subname</option>"; } else $str=$str."<option value=\"$subcode\">$subname</option>"; }

$str=$str."</select></td></tr>";
$str=$str."<tr><td>Teaching Staff</td><td><select name=\"staffid\" id=\"staffid\" onchange=\"return xajax_setSession(1,this.value);\"><option value=\"none\">Select</option>";
$piksubcode=mysql_query("select subjectcode from subjectcreditdetails where SubjectCreditId='$subjectid'");  $subjectcode=mysql_result($piksubcode,0);
$selectintakes=mysql_query("select * from staffavailabilitytimetable where subjectcode='$subjectcode'");
while($ar=mysql_fetch_array($selectintakes)){ $addflag=0;
$staffid=$ar['staffid']; $availability=$ar['availability']; $Aavailability=explode('.',$availability);
$pikstname=mysql_query("select * from staffpersonalinformation where staffid='$staffid'");
while($ark=mysql_fetch_array($pikstname)){ $staffname=$ark['title'].'. '.$ark['firstname'].' '.$ark['lastname']; $staffrecid=$ark['staffinformationid']; }
foreach($Aavailability as $kk=>$Ad) if($Ad==$day){ $addflag=1; break; }
if($addflag){ if($staffrecid==$Estaffid){$_SESSION['staffid']=$staffid;  $str=$str."<option value=\"$staffid\" selected>$staffname</option>"; } else $str=$str."<option value=\"$staffid\">$staffname</option>"; }
}

$str=$str."</select></td></tr><tr><td>Hall Number</td><td><select name=\"hallno\" id=\"hallno\" onchange=\"return xajax_setSession(2,this.value);\"><option value=\"none\">Select</option>";
$picstucount=mysql_query("select count(*) from studentregistration where intake='$intake'"); $stucount=mysql_result($picstucount,0);
$pichalls=mysql_query("select * from infrastructuredetails");
while($ark=mysql_fetch_array($pichalls)){  $HallIId=$ark['HallIId'];
$ckhallavail=mysql_query("select count(*) from timetableassigned where todaydate='$Apassvalue[2]' and roomid='$HallIId' and classtime='$Apassvalue[6]'");
if($ark['ClassCapacity']>=$stucount & mysql_result($ckhallavail,0)==0){ $HallNo=$ark['HallNo'];
if($HallIId==$roomid) $str=$str."<option value=\"$HallIId\" selected>$HallNo</option>"; else $str=$str."<option value=\"$HallIId\">$HallNo</option>"; } }
$str=$str."</select></td></tr>";
$str=$str."<tr><td align=center colspan=2><input class=\"buttonstatic\" type=\"button\" value=\"Cancel\" onClick=\"assignCancel()\">&nbsp;&nbsp;<input class=\"buttonstatic\" type=\"button\" value=\"Update\" onClick=\"return xajax_saveTimetable(this.value);\"></td></tr></table>";
$objResponse->addScript("document.getElementById('assign').innerHTML='$str';");

return $objResponse->getXML(); }

$xajax =& new xajax();
$xajax->registerFunction("getIntakes");
$xajax->registerFunction("setCourses");
$xajax->registerFunction("getSection");
$xajax->registerFunction("setTimetabletable");
$xajax->registerFunction("setNextweek");
$xajax->registerFunction("setSubStaffRoom");
$xajax->registerFunction("setStafflist");
$xajax->registerFunction("setSlotrepeat");
$xajax->registerFunction("setWeekrepeat");
$xajax->registerFunction("saveTimetable");
$xajax->registerFunction("editTimetable");
$xajax->registerFunction("setSession");
$xajax->processRequests();
?>
<html>
<head>
<title></title>
<script type="text/javascript" src="./Images/datetimepicker.js"></script>
<script type="text/javascript" src="./Images/transactionscript.js"></script>
<link rel="stylesheet" href="./Images/heoscss.css">
<?php $xajax->printJavascript(); ?>
<script language="javascript">
function addOption(selectId, txt, val){ var objOption = new Option(txt,val); document.getElementById(selectId).options.add(objOption); }
function weekCancel() { document.getElementById('assign').innerHTML=""; document.getElementById('weeks').innerHTML=""; document.getElementById('nextWeeks').innerHTML=""; }
function assignCancel() { document.getElementById('assign').innerHTML=""; document.getElementById('nextWeeks').innerHTML=""; }
function changeimage(obj,cname){ obj.className=cname; }
</script>
</head>
<body>
<?php
$con=mysql_connect('192.168.15.26','root','admin'); $db=mysql_select_db('heos');
print "<table align=center cellspacing=1 cellpadding=0><caption><h3>Time Table</caption>
<tr><td>Time Table Name</td>
<td><select class=\"select\" name=\"ttname\" id=\"ttname\" onChange=\"return xajax_getIntakes(this.value);\">
<option value=\"none\">select</option>";
$rs=mysql_query("SELECT * FROM timetablenamech order by timetablename",$con);
while($res=mysql_fetch_array($rs)){ $name=$res["timetablename"]; $settingsid=$res["recordid"];
echo"<option value=\"$settingsid\">$name</option>"; }
print "</select></td>
<td>Intake</td><td><select name=\"intake\" id=\"intake\"><option value=\"none\">select</option></select></td>
<td><input class=\"buttonstatic\" type=\"button\" value=\"Create\" id=\"create\"
onClick=\"return xajax_setTimetabletable(document.getElementById('ttname').value,document.getElementById('intake').value,1);\"
onmouseover=\"changeimage(this,'buttonover');\" onmouseout=\"changeimage(this,'buttonstatic');\"></td></tr>
</table><br><div id=\"weeks\"></div><br><div id=\"assign\"></div><br><div id=\"nextWeeks\"></div>";
?>
</body>
</html>
