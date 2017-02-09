<?php
require_once(dirname(__FILE__) . '/xajax.inc.php');
function setCourses($degree)
{
$objResponse =& new xajaxResponse();

if($degree=='none'){
$objResponse->addScript("document.getElementById('courseappliedcom').options.length = 0;");
$objResponse->addScript("addOption('courseappliedcom','" . 'select' . "','" . 'none' . "');");
} else {
$objResponse->addScript("document.getElementById('courseappliedcom').options.length = 0;");
$objResponse->addScript("addOption('courseappliedcom','" . 'select' . "','" . 'none' . "');");
$sql="select distinct(CourseName) from coursedetails where LevelOfTheCourse='$degree'";
$rs=mysql_query($sql,$con);
while($a=mysql_fetch_array($rs)){
$course=$a["CourseName"];
$objResponse->addScript("addOption('courseappliedcom','" . $course . "','" . $course . "');"); }
}
return $objResponse->getXML();
}

function setFee($CourseName)
{
$objResponse =& new xajaxResponse();

$objResponse->addscript("alert('".$CourseName."');");
if($CourseName=="none") $objResponse->addScript("document.getElementById('coursefee').value ='';");
else {
$queryselect="select DefaultFees from coursedetails where CourseName='$CourseName'";
$rs=mysql_query($queryselect,$con);
while($a=mysql_fetch_array($rs)){
$DefaultFees=$a["DefaultFees"];
$objResponse->addScript("document.getElementById('coursefee').value ='".$DefaultFees."';"); }
}
return $objResponse->getXML();
}


function setdetails($appid)
{

$select=mysql_query("select * from applicantentry where applicantid='$appid'",$con);

while($a=mysql_fetch_array($select)){
$titleresult=$a["title"];
$password=$a['password'];
$firstnameresult=$a["firstname"];
$middlenameresult=$a["middlename"];
$lastnameresult=$a["lastname"];
$levelofeducationresult=$a["levelofeducation"];
$courseresult=$a["course"];
$intakeresult=$a["intake"];
$mailidresult=$a["mailid"];
$passportnoresult=$a["passportno"];
$countryresult=$a["countryresidence"];
}
$select1=mysql_query("select DefaultFees from coursedetails where CourseName='$courseresult'",$con);
while($aa=mysql_fetch_array($select1)) $DefaultFeesresult=$aa["DefaultFees"];

$objResponse =& new xajaxResponse();
$name=$titleresult.'.'.$firstnameresult.' '.$middlenameresult.' '.$lastnameresult;
$objResponse->addScript("document.getElementById('applicantname').value ='".$name."';");
$objResponse->addScript("document.getElementById('levelofeducationtext').value ='".$levelofeducationresult."';");
$objResponse->addScript("document.getElementById('coursenametext').value ='".$courseresult."';");
$objResponse->addScript("document.getElementById('intaketext').value ='".$intakeresult."';");
$objResponse->addScript("document.getElementById('mailidtext').value ='".$mailidresult."';");
$objResponse->addScript("document.getElementById('passportnotext').value ='".$passportnoresult."';");
$objResponse->addScript("document.getElementById('countrytext').value ='".$countryresult."';");
$objResponse->addScript("document.getElementById('password').value ='".$password."';");

return $objResponse->getXML();
}

function setExCourses($exp,$level)
{
$objResponse =& new xajaxResponse();

//$objResponse->addscript("alert('".$exp."');");
if($exp=='true' && $level!='none'){
$objResponse->addScript("document.getElementById('courseappliedcom').options.length = 0;");
$objResponse->addScript("addOption('courseappliedcom','" . 'select' . "','" . 'none' . "');");
$sql="select * from coursedetails where LevelOfTheCourse='$level' and experience=1";
$rs=mysql_query($sql,$con);
while($a=mysql_fetch_array($rs)){
$coursename=$a["CourseName"]; $coursecode=$a["CourseCode"];
$objResponse->addScript("addOption('courseappliedcom','" . $coursename . "','" . $coursecode . "');"); }
} else {
$objResponse->addScript("document.getElementById('courseappliedcom').options.length = 0;");
$objResponse->addScript("addOption('courseappliedcom','" . 'select' . "','" . 'none' . "');");
$sql="select * from coursedetails where LevelOfTheCourse='$level' and experience=0";
$rs=mysql_query($sql,$con);
while($a=mysql_fetch_array($rs)){
$coursename=$a["CourseName"]; $coursecode=$a["CourseCode"];
$objResponse->addScript("addOption('courseappliedcom','" . $coursename . "','" . $coursecode . "');"); }
}
return $objResponse->getXML();
}

// slot repaet functions

function getCourse($Settings)
{
$objResponse =& new xajaxResponse();

if($Settings!="none")
{
$sql="SELECT distinct(CourseCode) FROM timetablesettings WHERE TimeTableName='$Settings'";
$rs=mysql_query($sql,$con);
$objResponse->addScript("document.getElementById('ccode').disabled = false;");
$objResponse->addScript("document.getElementById('ccode').options.length = 0;");
$objResponse->addScript("addOption('ccode','select','none');");
while($res=mysql_fetch_array($rs))
{
$name=$res["CourseCode"];
$objResponse->addScript("addOption('ccode','" . $name . "','" . $name . "');");
}

$exec=mysql_query("select Intake from timetablesettings where TimeTableName='$Settings'",$con);
$intake=mysql_result($exec,"Intake");
$objResponse->addScript("document.getElementById('intake').value = '$intake';");
}
else
{
$objResponse->addScript("alert('Select the timetablename');");
$objResponse->addScript("document.getElementById('intake').value = '';");
$objResponse->addScript("document.getElementById('ccode').disabled = false;");
$objResponse->addScript("document.getElementById('ccode').options.length = 0;");
$objResponse->addScript("addOption('ccode','select','none');");
$objResponse->addScript("document.getElementById('section').disabled = false;");
$objResponse->addScript("document.getElementById('section').options.length = 0;");
$objResponse->addScript("addOption('section','select','none');");
}
return $objResponse->getXML();
}

function getSection($course,$intake)
{
$objResponse =& new xajaxResponse();

if($course!="none")
{
$exec1=mysql_query("select Section from sectionmaster where coursecode='$course' and Intake='$intake' order by Section",$con);
$objResponse->addScript("document.getElementById('section').disabled = false;");
$objResponse->addScript("document.getElementById('section').options.length = 0;");
$objResponse->addScript("addOption('section','select','none');");
while($res1=mysql_fetch_array($exec1))
{
$name=$res1["Section"];
$objResponse->addScript("addOption('section','" . $name . "','" . $name . "');");
}
}
else
{
$objResponse->addScript("alert('Select the Course code');");
$objResponse->addScript("document.getElementById('section').disabled = false;");
$objResponse->addScript("document.getElementById('section').options.length = 0;");
$objResponse->addScript("addOption('section','select','none');");
}
return $objResponse->getXML();
}

function setWeektable($ttname,$ccode,$intake,$section)
{
$objResponse =& new xajaxResponse();
if($ttname=='none'){ $objResponse->addScript("alert('select the Time table name');");
$objResponse->addScript("document.getElementById('ttname').focus();");
return $objResponse->getXML(); }
if($ccode=='none'){ $objResponse->addScript("alert('Missing course code');");
$objResponse->addScript("document.getElementById('ccode').focus();");
return $objResponse->getXML(); }
if($section=='none'){ $objResponse->addScript("alert('Missing section');");
$objResponse->addScript("document.getElementById('section').focus();");
return $objResponse->getXML(); }
$objResponse->addScript("document.getElementById('create').disabled=1;");

$_SESSION['w']=1;
$_SESSION['ccode']=$ccode;
$_SESSION['ttname']=$ttname;
$_SESSION['intake']=$intake;
$_SESSION['section']=$section;
$selectinatakeid = "select CohortID from cohortdetails where Intake='$intake'";
$execselectinatakeid =mysql_query($selectinatakeid,$con);
$intaketid = mysql_result($execselectinatakeid,"CohortID");
$query = "SELECT SettingsId from timetablesettings WHERE CourseCode='$ccode' and TimeTableName='$ttname' and Intake='$intake'";
$execquery = mysql_query($query,$con);
$settingsid=mysql_result($execquery,"SettingsId");
$execselectquery = mysql_query("select * from timetablesettings where SettingsId='$settingsid'",$con);
while($re=mysql_fetch_array($execselectquery))
{
$timetablename=$re["TimeTableName"];
$_SESSION['timetablename']=$timetablename;
$courseid=$re["CourseCode"];
$fromdate=$re["FromDate"];
$_SESSION['fromdate']=$fromdate;
$weekday = date('l', strtotime($fromdate));
$todate=$re["ToDate"];
$_SESSION['todate']=$todate;
$weekendday = date('l', strtotime($todate));
$term=$fromdate."To".$todate;
$fromday=$re["FromDay"];
$today=$re["ToDay"];
$noofslots=$re["NumberOfSlots"];   $coloumn=$noofslots++;
$fromtime1=$re["FromTime1"];$totime1=$re["ToTime1"];
$fromtime2=$re["FromTime2"];$totime2=$re["ToTime2"];
$fromtime3=$re["FromTime3"];$totime3=$re["ToTime3"];
$fromtime4=$re["FromTime4"];$totime4=$re["ToTime4"];
$fromtime5=$re["FromTime5"];$totime5=$re["ToTime5"];
$fromtime6=$re["FromTime6"];$totime6=$re["ToTime6"];
$fromtime7=$re["FromTime7"];$totime7=$re["ToTime7"];
$fromtime8=$re["FromTime8"];$totime8=$re["ToTime8"];
$fromtime9=$re["FromTime9"];$totime9=$re["ToTime9"];
$fromtime10=$re["FromTime10"];$totime10=$re["ToTime10"];
}

if(     ($fromday=="Monday" && $today=="Monday") || ($fromday=="Monday" && $today=="Sunday")
|| ($fromday=="Tuesday" && $today=="Tuesday") || ($fromday=="Tuesday" && $today=="Monday")
|| ($fromday=="Wednesday" && $today=="Wednesday") || ($fromday=="Wednesday" && $today=="Tuesday")
|| ($fromday=="Thursday" && $today=="Thursday") || ($fromday=="Thursday" && $today=="Wednesday")
|| ($fromday=="Friday" && $today=="Friday") || ($fromday=="Friday" && $today=="Thursday")
|| ($fromday=="Saturday" && $today=="Saturday") || ($fromday=="Saturday" && $today=="Friday")
|| ($fromday=="Sunday" && $today=="Sunday") || ($fromday=="Sunday" && $today=="Saturday")
) $day = 7;

if(     ($fromday=="Monday" && $today=="Saturday") || ($fromday=="Tuesday" && $today=="Sunday")
|| ($fromday=="Wednesday" && $today=="Monday") || ($fromday=="Thursday" && $today=="Tuesday")
|| ($fromday=="Friday" && $today=="Wednesday") || ($fromday=="Saturday" && $today=="Thursday")
|| ($fromday=="Sunday" && $today=="Friday")
) $day = 6;

if(     ($fromday=="Monday" && $today=="Friday") || ($fromday=="Tuesday" && $today=="Saturday")
|| ($fromday=="Wednesday" && $today=="Sunday") || ($fromday=="Thursday" && $today=="Monday")
|| ($fromday=="Friday" && $today=="Tuesday") || ($fromday=="Saturday" && $today=="Wednesday")
|| ($fromday=="Sunday" && $today=="Thursday")
) $day = 5;

if(     ($fromday=="Monday" && $today=="Thursday") || ($fromday=="Tuesday" && $today=="Friday")
|| ($fromday=="Wednesday" && $today=="Saturday") || ($fromday=="Thursday" && $today=="Sunday")
|| ($fromday=="Friday" && $today=="Monday") || ($fromday=="Saturday" && $today=="Tuesday")
|| ($fromday=="Sunday" && $today=="Wednesday")
) $day = 4;

if(     ($fromday=="Monday" && $today=="Wednesday") || ($fromday=="Tuesday" && $today=="Thursday")
|| ($fromday=="Wednesday" && $today=="Friday") || ($fromday=="Thursday" && $today=="Saturday")
|| ($fromday=="Friday" && $today=="Sunday") || ($fromday=="Saturday" && $today=="Monday")
|| ($fromday=="Sunday" && $today=="Tuesday")
) $day = 3;

if(     ($fromday=="Monday" && $today=="Tuesday") || ($fromday=="Tuesday" && $today=="Wednesday")
|| ($fromday=="Wednesday" && $today=="Thursday") || ($fromday=="Thursday" && $today=="Friday")
|| ($fromday=="Friday" && $today=="Saturday") || ($fromday=="Saturday" && $today=="Sunday")
|| ($fromday=="Sunday" && $today=="Monday")
) $day = 2;

$days=mysql_query("select to_days('$todate')-to_days('$fromdate') as day",$con); $tdays=mysql_result($days,'day');//echo $tdays;
$week=ceil($tdays/7);
$w=1;
$_SESSION['totalweeks']=$week+1;

$c=mysql_query("DROP TABLE IF EXISTS heos.slotrepeat;",$con);
$c=mysql_query("CREATE TABLE `slotrepeat` (`week` int(2) NOT NULL default '0',`boolean` tinyint(2) NOT NULL default '0',PRIMARY KEY  (`week`)) ENGINE=InnoDB DEFAULT CHARSET=latin1;",$con);

for($i=1;$i<=$week+1;$i++) $c=mysql_query("insert into slotrepeat values('$i','0')",$con);

$newtablename = strtoupper($ttname).'_'.$ccode.'_'.$intake.'_'.$section;
$_SESSION['tablename']=$newtablename;

$result = mysql_list_tables("heos",$con); $showtt="true"; $tablename=$newtablename;
while ($r=mysql_fetch_array($result))
{
$dbtablenames=strtoupper($r[0]);
if($newtablename==$dbtablenames) $showtt="false";
}
if($showtt=="true")
{
//$deletetable = "DROP TABLE IF EXISTS heos.$newtablename;"; $execdeletetable  =mysql_query($deletetable,$con);
$createtable = "CREATE TABLE `$newtablename` (`timetableid` bigint(20) NOT NULL auto_increment,`timetablename` varchar(50) default NULL,`coursecode` varchar(50) default NULL,`term` varchar(50) default NULL,`todaydate` date default NULL,`day` varchar(50) default NULL,`week` varchar(50) default NULL,`slot` varchar(50) default NULL,`subject` varchar(50) default NULL,`staff` varchar(50) default NULL,`roomno` varchar(50) default NULL,PRIMARY KEY  (`timetableid`)) ENGINE=MyISAM DEFAULT CHARSET=latin1;";
$execcreatetable  = mysql_query($createtable,$con);
}
$_SESSION['day']=$day;

if($_SESSION['w']<=$week)
{
$row="<table align=\"center\" class=\"table\" cellspacing=2><tr class=\"headerrow\"><td colspan=10 align=\"center\">Week - $w</td></tr><tr class=\"balanceheaderrow\"><td></td>";
for($t=1;$t<$noofslots;$t++)
{
switch($t)
{
case 1: $row=$row."<td align=\"center\">".$fromtime1." to ".$totime1."</td>"; break;
case 2: $row=$row."<td align=\"center\">".$fromtime2." to ".$totime2."</td>"; break;
case 3: $row=$row."<td align=\"center\">".$fromtime3." to ".$totime3."</td>"; break;
case 4: $row=$row."<td align=\"center\">".$fromtime4." to ".$totime4."</td>"; break;
case 5: $row=$row."<td align=\"center\">".$fromtime5." to ".$totime5."</td>"; break;
case 6: $row=$row."<td align=\"center\">".$fromtime6." to ".$totime6."</td>"; break;
case 7: $row=$row."<td align=\"center\">".$fromtime7." to ".$totime7."</td>"; break;
case 8: $row=$row."<td align=\"center\">".$fromtime8." to ".$totime8."</td>"; break;
case 9: $row=$row."<td align=\"center\">".$fromtime9." to ".$totime9."</td>"; break;
case 10: $row=$row."<td align=\"center\">".$fromtime10." to ".$totime10."</td>"; break;
}
}
$row=$row."</tr>";

$enddate=date("Y-m-d", strtotime($fromdate)-86400);

for($i=1;$i<=$day;$i++){
$fday = showfromday($fromday,$i);
$row=$row."<tr class=\"label\">"; $row=$row."<td>$fday</td>";
$fromday=$fday;

$celldata=0;

for($t=1;$t<$noofslots;$t++){

$data=$fday;
$data.="_";
$data.=$w;
$data.="_";
$data.=$t;
$cellindex='day-'.$i.'-slot-'.$t;

$fdayno=getnumberforday($fromday);
$tdayno=getnumberforday($today);
$wdayno=getnumberforday($weekday);
$wedayno=getnumberforday($weekendday);
$flag=showtable($w,$fdayno,$tdayno,$wdayno,$week,$wedayno);

$final=0;

$hslot=mysql_query("select count(*) FROM leavemaster WHERE Intake='$intake' AND Course='$ccode' AND Date1='$fromdate' AND Section='$section' AND Slot='0'",$con);
$eday=mysql_query("select count(*) FROM leavemaster WHERE Intake='$intake' AND Course='$ccode' AND Date1='$fromdate' AND Section='$section'",$con);
if((mysql_result($eday,0) > 0)&&(mysql_result($hslot,0) > 0)){
$eday=mysql_query("select * FROM leavemaster WHERE Intake='$intake' AND Course='$ccode' AND Date1='$fromdate' AND Section='$section'",$con);
while($a=mysql_fetch_array($eday)){ $date1=$a['Date1']; $date2=$a['Date2']; }

$edayck=mysql_query("select to_days('$date2')-to_days('$date1')",$con); $edayckf=mysql_result($edayck,0);
if($edayckf==0) $celldata=1; else $enddate=$date2;
}

$eday=mysql_query("select to_days('$fromdate')-to_days('$enddate')",$con); $edayf=mysql_result($eday,0);
if($edayf <=0) $celldata=1;

$hslot=mysql_query("select Slot FROM leavemaster WHERE Intake='$intake' AND Course='$ccode' AND Date1='$fromdate' AND Section='$section' AND Slot='$t'",$con);
while($a=mysql_fetch_array($hslot)){ $sf=$a['Slot']; if($sf==$t) $celldata=1; }

if($flag){
switch($celldata){
case 1:$final=2; break;
case 0:$final=1; break;
}
}
else $final=0;
$count=0;
$exec=mysql_query("select count(*) from ".$newtablename." where day='$i' and week='1' and slot='$t' and todaydate='$fromdate'",$con);
$count=mysql_result($exec,0);
$weekdays=date('w',$fromdate);
//if($count!=1) $insertna=mysql_query("insert into ".$newtablename." values('0','$ttname','$ccode','$intake','$fromdate','$i','1','$t','NA','NA','NA');",$con);
switch($final){
case 0:{ $row=$row."<td align=\"center\">Not Applicable</td>";  break;}
case 1:{ if($count) $row=$row."<td align=\"center\"><input class=\"slotassigned\" type=\"button\" value=\"$cellindex-$fromdate\" onclick=\"return xajax_setAssign(this.value);\"></td>";
else $row=$row."<td align=\"center\"><input class=\"slotunassigned\" type=\"button\" value=\"$cellindex-$fromdate\" onclick=\"return xajax_setAssign(this.value);\"></td>"; break; }
case 2:{ $row=$row."<td align=\"center\">Holiday</td>"; if($count!=1) $inserthl=mysql_query("insert into ".$newtablename." values('0','$ttname','$ccode','$intake','$fromdate','$weekdays','1','$t','Holiday','Holiday','Holiday');",$con); $cellindex='day-'.$i.'-slot-'.$t; } break;
}
$celldata=0;
}

if($flag) $fromdate=date("Y-m-d", 86400+strtotime($fromdate));
$_SESSION['fdate']=$fromdate;
$row=$row."</tr>";
}
$row=$row."<tr class=\"label\"><td colspan=10 align=\"center\"><input class=\"buttonstatic\" type=\"button\" name=\"btncancel\" value=\"Cancel\" onClick=\"weekCancel();\">&nbsp;&nbsp;&nbsp;<input type=\"hidden\" value=\"$w\" name=\"w\"><input class=\"buttonstatic\" type=\"button\" name=\"btnsave\" value=\"Next Week\" onclick=\"return xajax_setNextweek();\"></td></tr></table>";
$objResponse->addScript("document.getElementById('weeks').innerHTML='$row';");
}
else $objResponse->addScript("alert('Week ends');");
$_SESSION['enddate']=$enddate;
return $objResponse->getXML();
}


function showfromday($fromday,$i)
{
switch($i)
{
case 1: return $fromday; break;
case 2: { $day=shownextday($fromday); return $day; } break;
case 3: { $day=shownextday($fromday); return $day; } break;
case 4: { $day=shownextday($fromday); return $day; } break;
case 5: { $day=shownextday($fromday); return $day; } break;
case 6: { $day=shownextday($fromday); return $day; } break;
case 7: { $day=shownextday($fromday); return $day; } break;
}
}

function shownextday($fromday)
{
if($fromday=="Monday") return "Tuesday";
if($fromday=="Tuesday") return "Wednesday";
if($fromday=="Wednesday") return "Thursday";
if($fromday=="Thursday") return "Friday";
if($fromday=="Friday") return "Saturday";
if($fromday=="Saturday") return "Sunday";
if($fromday=="Sunday") return "Monday";
}

function getnumberforday($day)
{
if($day=="Monday") return 1;
if($day=="Tuesday") return 2;
if($day=="Wednesday") return 3;
if($day=="Thursday") return 4;
if($day=="Friday") return 5;
if($day=="Saturday") return 6;
if($day=="Sunday") return 7;
}

function showtable($w,$fdayno,$tdayno,$wdayno,$week,$wedayno)
{
switch($wdayno)
{
case 1: if($w==1&&$wdayno>$fdayno) return false; else if($w==$week&&$fdayno>$wedayno) return false; else return true; break;
case 2: if($w==1&&$wdayno>$fdayno) return false;else if($w==$week&&$fdayno>$wedayno)return false;else return true; break;
case 3: if($w==1&&$wdayno>$fdayno) return false;else if($w==$week&&$fdayno>$wedayno)return false;else return true; break;
case 4: if($w==1&&$wdayno>$fdayno) return false;else if($w==$week&&$fdayno>$wedayno)return false;else return true; break;
case 5: if($w==1&&$wdayno>$fdayno) return false;else if($w==$week&&$fdayno>$wedayno)return false;else return true; break;
case 6: if($w==1&&$wdayno>$fdayno) return false;else if($w==$week&&$fdayno>$wedayno)return false;else return true; break;
case 7: if($w==1&&$wdayno>$fdayno) return false;else if($w==$week&&$fdayno>$wedayno)return false;else return true; break;
}
}

function setAssign($cellindex)
{
$objResponse =& new xajaxResponse();

$_SESSION['dayslot']=$cellindex;
$tablename=$_SESSION["tablename"];
$ccode=$_SESSION["ccode"];
$ttname=$_SESSION["ttname"];
$intake=$_SESSION["intake"];
$data=$_SESSION['dayslot'];
$arraydayslot=spliti("-",$data);
$day=$arraydayslot[1];
$slot=$arraydayslot[3];
$week=$_SESSION['w'];
$tw=$_SESSION['totalweeks'];
$c=mysql_query("update slotrepeat set boolean='0'",$con);
$countexec=mysql_query("select count(*) from $tablename where timetablename='$ttname' and coursecode='$ccode' and term='$intake' and day='$day' and week='$week' and slot='$slot'",$con);
$count=mysql_result($countexec,0);
if($count>0)
{
$execselectcell=mysql_query("select * from $tablename where timetablename='$ttname' and coursecode='$ccode' and term='$intake' and day='$day' and week='$week' and slot='$slot'",$con);
while($res=mysql_fetch_array($execselectcell))
{
$timetableid=$res["timetableid"];
$timetablename=$res["timetablename"];
$coursecode=$res["coursecode"];
$term=$res["term"];
$day=$res["day"];
$week=$res["week"];
$slot=$res["slot"];
$subject=$res["subject"];
$staff=$res["staff"];
$roomno=$res["roomno"];
}
$_SESSION['tid']=$timetableid; $_SESSION['tsubject']=$subject; $_SESSION['tstaff']=$staff; $_SESSION['troom']=$roomno;
$ds=split('-',$cellindex); $head=$ds[0].'-'.$ds[1].'-'.$ds[2].'-'.$ds[3];
$create="<table align=\"center\" class=\"table\" cellspacing=2><tr class=\"label\"><td colspan=2 align=\"center\">".$head."</td></tr>";
$create=$create."<tr class=\"label\"><td>The Subject Name</td><td>".$subject."</td></tr><tr class=\"label\"><td>The Staff Name</td><td>".$staff."</td></tr><tr class=\"label\"><td>The Room Number</td><td>".$roomno."</td></tr><tr><td colspan=2 align=\"center\">";
$create=$create."<input class=\"buttonstatic\" type=\"button\" name=\"btncancel\" value=\"Cancel\" onClick=\"assignCancel();\">&nbsp;&nbsp;&nbsp;<input class=\"buttonstatic\" type=\"button\" value=\"Edit\" onClick=\"return xajax_setEditdayslot();\"></td></tr></table>";
$objResponse->addScript("document.getElementById('assign').innerHTML='$create';");
}
else
{
$ds=split('-',$cellindex); $head=$ds[0].'-'.$ds[1].'-'.$ds[2].'-'.$ds[3];
$create="<table align=\"center\" class=\"table\" cellspacing=2><tr class=\"label\"><td colspan=2 align=\"center\">$head</td></tr><tr class=\"label\"><td>Subject</td><td><select class=\"select\" name=\"subjectcombo\" id=\"subjectcombo\" onChange=\"xajax_setStaffCombo(this.value);\"><option value=\"none\">select</option>";
$execstaffname=mysql_query("select distinct(SubjectCode),SubjectName from subjectcreditdetails where CourseCode='$ccode'",$con);
while($r=mysql_fetch_array($execstaffname))
{
$name=$r["SubjectName"];   $code=$r["SubjectCode"];
$create=$create."<option value=\"$code\">$name</option>";
}
$create=$create."</select></select></td></tr><tr class=\"label\"><td>Staff Name</td><td><select class=\"select\" name=\"staffnamecombo\" id=\"staffnamecombo\" onChange=\"return xajax_setStaffname(this.value);\"><option value=\"none\">select</option></td></tr><tr class=\"label\"><td>Hall</td><td><select class=\"select\" name=\"hallcombo\" id=\"hallcombo\" onClick=\"return xajax_setHall(this.value);\"><option value=\"none\">select</option>";
$stucount=mysql_query("select count(*) from student where coursecode='$ccode' and intake='$intake'",$con);
$noofstu=mysql_result($stucount,0);   $noofstuex=$noofstu+2;
$selectinfra=("SELECT * FROM infrastructuredetails where HallCapacity >= '$noofstu' and HallCapacity <= '$noofstuex'");
$execselectinfra=mysql_query($selectinfra,$con);
while($re=mysql_fetch_array($execselectinfra))
{
$hallname=$re["HallName"];
$hallcapacity=$re["HallCapacity"];
$hallnamewithcapacity=$hallname." - ".$hallcapacity;
$hckdate=$ds[4].'-'.$ds[5].'-'.$ds[6];
$hallavail=mysql_query("select count(*) from $tablename where todaydate='$hckdate' and roomno='$hallname'",$con);
if(mysql_result($hallavail,0)==0) $create=$create."<option value=$hallname>$hallnamewithcapacity</option>";
}

$create=$create."</select></td></tr><tr class=\"label\"><tr class=\"label\"><td align=\"center\" colspan=2><input class=\"buttonstatic\" type=\"button\" name=\"btncancel\" value=\"Cancel\" onClick=\"assignCancel();\">&nbsp;&nbsp;&nbsp;<input class=\"buttonstatic\" type=\"button\" name=\"btnsubmit\" value=\" Save \" onClick=\"return xajax_setSavings();\"></td></tr></table>";
$objResponse->addScript("document.getElementById('assign').innerHTML='$create';");
$allweeks="<table align=\"center\"><tr class=\"label\"><td><input type=\"checkbox\" id=\"all\" onClick=\"return xajax_setSlotrepeat(this.checked,0);\">All weeks</td>";
for($i=1;$i<=$tw;$i++) if($i!=$week) $allweeks=$allweeks."<td><input type=\"checkbox\" id=\"ck$i\" onClick=\"return xajax_setSlotrepeat(this.checked,$i);\">$i</td>";
$allweeks=$allweeks."</tr></table>";               //echo $allweeks;  onClick=\"return xajax_setSlotrepeat(this.checked,'0');\"
$objResponse->addScript("document.getElementById('nextWeeks').innerHTML='$allweeks';");
}
mysql_close($con);
return $objResponse->getXML();
}

function setEditdayslot()
{
$objResponse =& new xajaxResponse();

$ccode=$_SESSION['ccode'];
$tablename=$_SESSION["tablename"];
$ccode=$_SESSION["ccode"];
$ttname=$_SESSION["ttname"];
$intake=$_SESSION["intake"];
$week=$_SESSION['w'];
$tw=$_SESSION['totalweeks'];
$subject=$_SESSION['tsubject'];
$timetableid=$_SESSION['tid'];
$cellindex=$_SESSION['dayslot'];
$ds=split('-',$cellindex); $head=$ds[0].'-'.$ds[1].'-'.$ds[2].'-'.$ds[3];

$ts=mysql_query("select * from $tablename where timetableid='$timetableid'",$con);
while($rsar=mysql_fetch_array($ts)){ $rno=$rsar['roomno']; $sname=$rsar['staff']; $subject=$rsar['subject']; $aday=$rsar['day']; }

$objResponse->addScript("document.getElementById('assign').innerHTML='';");
$objResponse->addScript("document.getElementById('nextWeeks').innerHTML='';");
$create="<table align=\"center\" class=\"table\" cellspacing=2><tr class=\"label\"><td colspan=2 align=\"center\">$head</td></tr><tr class=\"label\"><td>Subject</td><td><select class=\"select\" name=\"subjectcombo\" id=\"subjectcombo\" onChange=\"xajax_setStaffCombo(this.value);\"><option value=\"none\" selectd>select</option>";
$execstaffname=mysql_query("select distinct(SubjectCode),SubjectName from subjectcreditdetails where CourseCode='$ccode'",$con);
while($r=mysql_fetch_array($execstaffname))
{
$name=$r["SubjectName"];   $code=$r["SubjectCode"];
if($subject==$code) $create=$create."<option value=\"$code\" selected>$name</option>";  else $create=$create."<option value=\"$code\">$name</option>";
}
$create=$create."</select></select></td></tr><tr class=\"label\"><td>Staff Name</td><td><select class=\"select\" name=\"staffnamecombo\" id=\"staffnamecombo\" onChange=\"return xajax_setStaffname(this.value);\"><option value=\"none\" selectd>select</option>";

if($subject!="none"){
$select=mysql_query("select * from staffavailabilitytimetable where subjectcode='$subject'",$con);
while($rsa=mysql_fetch_array($select)){ $availdays=$rsa['availability']; $staffid=$rsa['staffid']; $addstaff=0;
$availdaysar=explode('.',$availdays);  foreach($availdaysar as $k=>$v) if($aday==$v) $addstaff=1;
if($addstaff){
$sselect=mysql_query("select name from staffpersonalinformation where staffid='$staffid'",$con);
$staffname=mysql_result($sselect,'name');
if($staffname==$sname) $create=$create."<option value=$staffname selected>$staffname</option>";
else $create=$create."<option value=$staffname>$staffname</option>";
}
}
}
$create=$create."</select></td></tr><tr class=\"label\"><td>Hall</td><td><select class=\"select\" name=\"hallcombo\" id=\"hallcombo\" onChange=\"return xajax_setHall(this.value);\"><option value=\"none\" selectd>select</option>";
$stucount=mysql_query("select count(*) from student where coursecode='$ccode' and intake='$intake'",$con);
$noofstu=mysql_result($stucount,0);   $noofstuex=$noofstu+2;
$selectinfra=("SELECT * FROM infrastructuredetails where HallCapacity >= '$noofstu' and HallCapacity <= '$noofstuex'");
$execselectinfra=mysql_query($selectinfra,$con);
while($re=mysql_fetch_array($execselectinfra))
{
$hallname=$re["HallName"];
$hallcapacity=$re["HallCapacity"];
$hallnamewithcapacity=$hallname." - ".$hallcapacity;
$hckdate=$ds[4].'-'.$ds[5].'-'.$ds[6];
$hallavail=mysql_query("select count(*) from $tablename where todaydate='$hckdate' and roomno='$hallname'",$con);
if($rno==$hallname) $create=$create."<option value=$hallname selected>$hallnamewithcapacity</option>";
if($rno!=$hallname && mysql_result($hallavail,0)==0) $create=$create."<option value=$hallname>$hallnamewithcapacity</option>";
}
$create=$create."</select></td></tr><tr class=\"label\"><tr class=\"label\"><td align=\"center\" colspan=2><input class=\"buttonstatic\" type=\"button\" name=\"btncancel\" value=\"Cancel\" onClick=\"assignCancel();\">&nbsp;&nbsp;&nbsp;<input class=\"buttonstatic\" type=\"button\" name=\"btnsubmit\" value=\"update\" onClick=\"return xajax_setUpdate();\"></td></tr></table>";
$objResponse->addScript("document.getElementById('assign').innerHTML='$create';");
return $objResponse->getXML();
}

function setStaffCombo($subjectcode)
{
$_SESSION['tsubject']=$subjectcode;
$objResponse =& new xajaxResponse();
$data=$_SESSION['dayslot'];
$arraydayslot=spliti("-",$data);
$day=$arraydayslot[1];
$slot=$arraydayslot[3];
$daydate=$arraydayslot[4].'-'.$arraydayslot[5].'-'.$arraydayslot[6]; $wdn=date('D',strtotime($daydate));
if($wdn=='Mon') $aday=1; if($wdn=='Tue') $aday=2; if($wdn=='Wed') $aday=3; if($wdn=='Thu') $aday=4;
if($wdn=='Fri') $aday=5; if($wdn=='Sat') $aday=6; if($wdn=='Sun') $aday=7;

if($subjectcode!="none"){
$objResponse->addScript("document.getElementById('staffnamecombo').options.length = 0;");
$objResponse->addScript("addOption('staffnamecombo','select','" . 'none' ."');");
$select=mysql_query("select * from staffavailabilitytimetable where subjectcode='$subjectcode'",$con);
while($rsa=mysql_fetch_array($select)){ $availdays=$rsa['availability']; $staffid=$rsa['staffid']; $addstaff=0;
$availdaysar=explode('.',$availdays);  foreach($availdaysar as $k=>$v) if($aday==$v) $addstaff=1;
if($addstaff){
$sselect=mysql_query("select name from staffpersonalinformation where staffid='$staffid'",$con);
$staffname=mysql_result($sselect,'name');
$objResponse->addScript("addOption('staffnamecombo','" . $staffname . "','" . $staffname . "');");
}
}
}else{
$_SESSION['tstaff']='none';
$objResponse->addScript("document.getElementById('staffnamecombo').options.length = 0;");
$objResponse->addScript("addOption('staffnamecombo','select','" . 'none' ."');");
$objResponse->addScript("document.getElementById('staffnamecombo').disabled =true;");
$objResponse->addScript("alert('Select the Subject Name')"); }
return $objResponse->getXML();
}

function setStaffname($staffname)
{
$objResponse =& new xajaxResponse();
$_SESSION['tstaff']=$staffname;
return $objResponse->getXML();
}

function setHall($hallname)
{
$objResponse =& new xajaxResponse();
$_SESSION['troom']=$hallname;
return $objResponse->getXML();
}

function setSavings()
{
$objResponse =& new xajaxResponse();
$staffname=$_SESSION['tstaff']; $subject=$_SESSION['tsubject']; $hall=$_SESSION['troom'];
$staffname=$_SESSION['tstaff']; $subject=$_SESSION['tsubject']; $hall=$_SESSION['troom'];
if($staffname=='none'){$objResponse->addScript("alert('Staff name not selected')"); $objResponse->addScript("document.getElementById('staffnamecombo').focus();"); return $objResponse->getXML(); }
if($subject=='none'){$objResponse->addScript("alert('Subject not selected')"); $objResponse->addScript("document.getElementById('subjectcombo').focus();"); return $objResponse->getXML(); }
if($hall=='none'){$objResponse->addScript("alert('Hall number not selected')"); $objResponse->addScript("document.getElementById('hallcombo').focus();"); return $objResponse->getXML(); }

$data=$_SESSION['dayslot'];
$arraydayslot=spliti("-",$data);
$day=$arraydayslot[1];
$slot=$arraydayslot[3];
$todaydate=$arraydayslot[4].'-'.$arraydayslot[5].'-'.$arraydayslot[6];
$week=$_SESSION['w'];
$tablename=$_SESSION["tablename"];// echo $subject.$staffname.$hall;
$ccode=$_SESSION["ccode"];
$ttname=$_SESSION["ttname"];
$intake=$_SESSION["intake"];
$query="insert into ".$tablename." values('0','$ttname','$ccode','$intake','$todaydate','$day','$week','$slot','$subject','$staffname','$hall');";
$exec=mysql_query($query,$con);
if($exec)$objResponse->addScript("alert('Sucessive done')"); $objResponse->addScript("assignCancel();");
$select=mysql_query("select * from slotrepeat where boolean='1'",$con);
while($a=mysql_fetch_array($select)){
$wk=$a["week"]; $nextweekdate=date("Y-m-d", (($wk-$week)*7*86400)+strtotime($todaydate));
$insertexec=mysql_query("insert into ".$tablename." values('0','$ttname','$ccode','$intake','$nextweekdate','$day','$wk','$slot','$subject','$staffname','$hall');",$con);
}
//if($week==1) setWeektable($ttname,$ccode,$intake,$section);
return $objResponse->getXML();
}

function setUpdate()
{
$objResponse =& new xajaxResponse();

$data=$_SESSION['dayslot'];
$arraydayslot=spliti("-",$data);
$day=$arraydayslot[1];
$slot=$arraydayslot[3];
$week=$_SESSION['w'];
$timetableid=$_SESSION['tid'];
$tablename=$_SESSION["tablename"]; //echo $timetableid;
$ccode=$_SESSION['ccode']; $ttname=$_SESSION['ttname']; $intake=$_SESSION['intake'];
$staffname=$_SESSION['tstaff']; $subject=$_SESSION['tsubject']; $hall=$_SESSION['troom'];

$query="update ".$tablename." set subject='$subject',staff='$staffname',roomno='$hall' where timetableid='$timetableid'";
$exec=mysql_query($query,$con);
if($exec){ $objResponse->addScript("alert('Sucessive done')"); $objResponse->addScript("assignCancel();"); }
return $objResponse->getXML();
}


function setSlotrepeat($ckecked,$weekno)
{
$objResponse =& new xajaxResponse();

$tw=$_SESSION['totalweeks'];
$w=$_SESSION['w'];
if($ckecked=='true' && $weekno==0) for($i=1;$i<=$tw;$i++) {
$name="ck".$i;
$c=mysql_query("update slotrepeat set boolean='1' where week='$i'",$con);
if($w!=$i)$objResponse->addScript("document.getElementById('$name').checked='true';");
}
if($ckecked=='false' && $weekno==0) for($i=1;$i<=$tw;$i++){
$name="ck".$i;
$c=mysql_query("update slotrepeat set boolean='0' where week='$i'",$con);
if($w!=$i)$objResponse->addScript("document.getElementById('$name').checked='';");
}

if($weekno!=0 && $ckecked=='true'){ $c=mysql_query("update slotrepeat set boolean='1' where week='$weekno'",$con);
$sc=mysql_query("select count(*) from slotrepeat where boolean='0'",$con);  $allck=mysql_result($sc,0);
if($allck==1) $objResponse->addScript("document.getElementById('all').checked='true';");
}else $c=mysql_query("update slotrepeat set boolean='0' where week='$weekno'",$con);

if($weekno!=0 && $ckecked=='false'){ $c=mysql_query("update slotrepeat set boolean='0' where week='0'",$con);
$objResponse->addScript("document.getElementById('all').checked='';"); }
return $objResponse->getXML();
}

function setNextweek()
{
$objResponse =& new xajaxResponse();

$objResponse->addScript("document.getElementById('assign').innerHTML='';");
$objResponse->addScript("document.getElementById('setassign').innerHTML='';");
$objResponse->addScript("document.getElementById('weeks').innerHTML='';");
$objResponse->addScript("document.getElementById('nextWeeks').innerHTML='';");
$w=$_SESSION['w']; $w++;
$_SESSION['w']=$w;
$tablename=$_SESSION["tablename"];
$ccode=$_SESSION["ccode"];
$ttname=$_SESSION["ttname"];
$intake=$_SESSION["intake"];
$week=$_SESSION['totalweeks'];
$fdate=$_SESSION['fdate'];
$day=$_SESSION['day'];
$enddate=$_SESSION['enddate'];
$section=$_SESSION['section'];
$remainday=7-$day;
$newfDate=date("Y-m-d", (86400*$remainday)+strtotime($fdate));
$selectinatakeid = "select CohortID from cohortdetails where Intake='$intake'";
$execselectinatakeid =mysql_query($selectinatakeid,$con);
$intaketid = mysql_result($execselectinatakeid,"CohortID");

$query = "SELECT SettingsId from timetablesettings WHERE CourseCode='$ccode' and TimeTableName='$ttname' and Intake='$intake'";
$execquery = mysql_query($query,$con);
$settingsid=mysql_result($execquery,"SettingsId");

$execselectquery = mysql_query("select * from timetablesettings where SettingsId='$settingsid'",$con);
while($res=mysql_fetch_array($execselectquery))
{
$timetablename=$res["TimeTableName"];
$courseid=$res["CourseCode"];
$fromdate=$res["FromDate"];
$weekday = date('l', strtotime($fromdate));
$todate=$res["ToDate"];
$weekendday = date('l', strtotime($todate));
$term=$fromdate."To".$todate;
$fromday=$res["FromDay"];
$today=$res["ToDay"];
$noofslots=$res["NumberOfSlots"];   $coloumn=$noofslots++;
$fromtime1=$res["FromTime1"];$totime1=$res["ToTime1"];
$fromtime2=$res["FromTime2"];$totime2=$res["ToTime2"];
$fromtime3=$res["FromTime3"];$totime3=$res["ToTime3"];
$fromtime4=$res["FromTime4"];$totime4=$res["ToTime4"];
$fromtime5=$res["FromTime5"];$totime5=$res["ToTime5"];
$fromtime6=$res["FromTime6"];$totime6=$res["ToTime6"];
$fromtime7=$res["FromTime7"];$totime7=$res["ToTime7"];
$fromtime8=$res["FromTime8"];$totime8=$res["ToTime8"];
$fromtime9=$res["FromTime9"];$totime9=$res["ToTime9"];
$fromtime10=$res["FromTime10"];$totime10=$res["ToTime10"];
}
if(     ($fromday=="Monday" && $today=="Monday") || ($fromday=="Monday" && $today=="Sunday")
|| ($fromday=="Tuesday" && $today=="Tuesday") || ($fromday=="Tuesday" && $today=="Monday")
|| ($fromday=="Wednesday" && $today=="Wednesday") || ($fromday=="Wednesday" && $today=="Tuesday")
|| ($fromday=="Thursday" && $today=="Thursday") || ($fromday=="Thursday" && $today=="Wednesday")
|| ($fromday=="Friday" && $today=="Friday") || ($fromday=="Friday" && $today=="Thursday")
|| ($fromday=="Saturday" && $today=="Saturday") || ($fromday=="Saturday" && $today=="Friday")
|| ($fromday=="Sunday" && $today=="Sunday") || ($fromday=="Sunday" && $today=="Saturday")
) $day = 7;

if(     ($fromday=="Monday" && $today=="Saturday") || ($fromday=="Tuesday" && $today=="Sunday")
|| ($fromday=="Wednesday" && $today=="Monday") || ($fromday=="Thursday" && $today=="Tuesday")
|| ($fromday=="Friday" && $today=="Wednesday") || ($fromday=="Saturday" && $today=="Thursday")
|| ($fromday=="Sunday" && $today=="Friday")
) $day = 6;

if(     ($fromday=="Monday" && $today=="Friday") || ($fromday=="Tuesday" && $today=="Saturday")
|| ($fromday=="Wednesday" && $today=="Sunday") || ($fromday=="Thursday" && $today=="Monday")
|| ($fromday=="Friday" && $today=="Tuesday") || ($fromday=="Saturday" && $today=="Wednesday")
|| ($fromday=="Sunday" && $today=="Thursday")
) $day = 5;

if(     ($fromday=="Monday" && $today=="Thursday") || ($fromday=="Tuesday" && $today=="Friday")
|| ($fromday=="Wednesday" && $today=="Saturday") || ($fromday=="Thursday" && $today=="Sunday")
|| ($fromday=="Friday" && $today=="Monday") || ($fromday=="Saturday" && $today=="Tuesday")
|| ($fromday=="Sunday" && $today=="Wednesday")
) $day = 4;

if(     ($fromday=="Monday" && $today=="Wednesday") || ($fromday=="Tuesday" && $today=="Thursday")
|| ($fromday=="Wednesday" && $today=="Friday") || ($fromday=="Thursday" && $today=="Saturday")
|| ($fromday=="Friday" && $today=="Sunday") || ($fromday=="Saturday" && $today=="Monday")
|| ($fromday=="Sunday" && $today=="Tuesday")
) $day = 3;

if(     ($fromday=="Monday" && $today=="Tuesday") || ($fromday=="Tuesday" && $today=="Wednesday")
|| ($fromday=="Wednesday" && $today=="Thursday") || ($fromday=="Thursday" && $today=="Friday")
|| ($fromday=="Friday" && $today=="Saturday") || ($fromday=="Saturday" && $today=="Sunday")
|| ($fromday=="Sunday" && $today=="Monday")
) $day = 2;
if($_SESSION['w']<=$_SESSION['totalweeks'])
{
$row="<table align=\"center\" class=\"table\" cellspacing=2><tr class=\"headerrow\"><td colspan=10 align=\"center\">Week - $w</td></tr><tr class=\"balanceheaderrow\"><td></td>";
for($t=1;$t<$noofslots;$t++)
{
switch($t)
{
case 1: $row=$row."<td align=\"center\">".$fromtime1." to ".$totime1."</td>"; break;
case 2: $row=$row."<td align=\"center\">".$fromtime2." to ".$totime2."</td>"; break;
case 3: $row=$row."<td align=\"center\">".$fromtime3." to ".$totime3."</td>"; break;
case 4: $row=$row."<td align=\"center\">".$fromtime4." to ".$totime4."</td>"; break;
case 5: $row=$row."<td align=\"center\">".$fromtime5." to ".$totime5."</td>"; break;
case 6: $row=$row."<td align=\"center\">".$fromtime6." to ".$totime6."</td>"; break;
case 7: $row=$row."<td align=\"center\">".$fromtime7." to ".$totime7."</td>"; break;
case 8: $row=$row."<td align=\"center\">".$fromtime8." to ".$totime8."</td>"; break;
case 9: $row=$row."<td align=\"center\">".$fromtime9." to ".$totime9."</td>"; break;
case 10: $row=$row."<td align=\"center\">".$fromtime10." to ".$totime10."</td>"; break;
}
}
$row=$row."</tr>";

$nadate=date("Y-m-d", 86400+strtotime($newfDate));

for($i=1;$i<=$day;$i++)
{
$fday = showfromday($fromday,$i);
$row=$row."<tr class=\"label\">"; $row=$row."<td>$fday</td>";
$fromday=$fday;
$celldata=0;
$nadate=date("Y-m-d", 86400+strtotime($nadate));


for($t=1;$t<$noofslots;$t++)
{
$data=$fday;
$data.="_";
$data.=$w;
$data.="_";
$data.=$t;

$fdayno=getnumberforday($fromday);
$tdayno=getnumberforday($today);
$wdayno=getnumberforday($weekday);
$wedayno=getnumberforday($weekendday);
$flag=showtable($w,$fdayno,$tdayno,$wdayno,$week,$wedayno);
$cellindex='day-'.$i.'-slot-'.$t;
$final=0;

$hslot=mysql_query("select count(*) FROM leavemaster WHERE Intake='$intake' AND Course='$ccode' AND Date1='$newfDate' AND Section='$section' AND Slot='0'",$con);
$eday=mysql_query("select count(*) FROM leavemaster WHERE Intake='$intake' AND Course='$ccode' AND Date1='$newfDate' AND Section='$section'",$con);
if((mysql_result($eday,0) > 0)&&(mysql_result($hslot,0) > 0)){

$eday=mysql_query("select * FROM leavemaster WHERE Intake='$intake' AND Course='$ccode' AND Date1='$newfDate' AND Section='$section'",$con);
while($a=mysql_fetch_array($eday)){ $date1=$a['Date1']; $date2=$a['Date2']; }

$edayck=mysql_query("select to_days('$date2')-to_days('$date1')",$con); $edayckf=mysql_result($edayck,0);
if($edayckf==0) $celldata=1; else $enddate=$date2;
}

$eday=mysql_query("select to_days('$newfDate')-to_days('$enddate')",$con); $edayf=mysql_result($eday,0);
if($edayf <=0) $celldata=1;

$hslot=mysql_query("select Slot FROM leavemaster WHERE Intake='$intake' AND Course='$ccode' AND Date1='$newfDate' AND Section='$section' AND Slot='$t'",$con);
while($a=mysql_fetch_array($hslot)){ $sf=$a['Slot']; if($sf==$t) $celldata=1; }


if($flag){
switch($celldata){
case 1:$final=2; break;
case 0:$final=1; break;
}
}
else $final=0;

$qw=$_SESSION['w']; $count=0;
$exec=mysql_query("select count(*) from ".$tablename." where day='$i' and week='$qw' and slot='$t'",$con);
$count=mysql_result($exec,0);

switch($final){
case 0:{ $row=$row."<td align=\"center\">Not Applicable</td>"; if($count!=1) $insertna=mysql_query("insert into ".$tablename." values('0','$ttname','$ccode','$intake','$nadate','$i','$qw','$t','NA','NA','NA');",$con); break; }
case 1:{ if($count) $row=$row."<td align=\"center\"><input class=\"slotassigned\" type=\"button\" value=\"$cellindex-$fromdate\" onclick=\"return xajax_setAssign(this.value);\"></td>";
else $row=$row."<td align=\"center\"><input class=\"slotunassigned\" type=\"button\" value=\"$cellindex-$fromdate\" onclick=\"return xajax_setAssign(this.value);\"></td>"; break; }
case 2:{ $row=$row."<td align=\"center\">Holiday</td>"; if($count!=1) $inserthl=mysql_query("insert into ".$tablename." values('0','$ttname','$ccode','$intake','$nadate','$i','$qw','$t','Holiday','Holiday','Holiday');",$con); $cellindex='day-'.$i.'-slot-'.$t; } break;
}
$_SESSION['enddate']=$enddate; $celldata=0;
}
$row=$row."</tr>";
if($flag==1) { $newfDate=date("Y-m-d", 86400+strtotime($newfDate)); $_SESSION['fdate']=$newfDate; }
}
$row=$row."<tr class=\"label\"><td colspan=10 align=\"center\"><input class=\"buttonstatic\" type=\"button\" name=\"btncancel\" value=\"Cancel\"/ onClick=\"weekCancel();\">&nbsp;&nbsp;&nbsp;<input type=\"hidden\" value=\"$w\" name=\"w\"><input class=\"buttonstatic\" type=\"button\" name=\"btnsave\" value=\"Next Week\" onclick=\"return xajax_setNextweek();\"></td></tr></table>";
$objResponse->addScript("document.getElementById('weeks').innerHTML='$row';");
}else {$objResponse->addScript("alert('Week ends');");}
return $objResponse->getXML();

}

// student register functions

function setstuCourses($degree){
$objResponse =& new xajaxResponse();

if($degree=='none'){
$objResponse->addScript("document.getElementById('coursename').options.length = 0;");
$objResponse->addScript("addOption('coursename','" . 'select' . "','" . 'none' . "');");
} else {
$objResponse->addScript("document.getElementById('coursename').options.length = 0;");
$objResponse->addScript("addOption('coursename','" . 'select' . "','" . 'none' . "');");
$sql="select distinct(CourseName),CourseCode from coursedetails where LevelOfTheCourse='$degree' order by CourseName";
$rs=mysql_query($sql,$con);
while($a=mysql_fetch_array($rs)){
$course=$a["CourseName"];
$CourseCode=$a["CourseCode"];
$objResponse->addScript("addOption('coursename','" . $course . "','" . $CourseCode . "');"); }
}
return $objResponse->getXML(); }

function setCourseamount($code,$intake,$appid){
$objResponse =& new xajaxResponse();

if($code!='none'){
if($appid==''){
$select=mysql_query("select student from countdetails where intake='$intake'",$con); $count=mysql_result($select,0);
$chars = "234567890abcdefghijkmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"; $i=0; $password="";
while($i<6){ $password=$password.$chars{mt_rand(0,strlen($chars))}; $i++; }
$studentid=$intake.$code.$count;
$objResponse->addScript("document.getElementById('studentid').value = '$studentid';");
$objResponse->addScript("document.getElementById('studentpwd').value = '$password';");
}
$querySelectFeesExec=mysql_query("select DefaultFees from coursedetails where CourseCode='$code'",$con);
$CourseAmount=mysql_result($querySelectFeesExec,0);
$objResponse->addScript("document.getElementById('courseamount').value = $CourseAmount;");
$sel=mysql_query("select * from sectionmaster where CourseCode='$code' and Intake='$intake' order by Section",$con);
$objResponse->addScript("document.getElementById('section').options.length = 0;");
$objResponse->addScript("addOption('section','" . '--' . "','" . 'none' . "');");
while($rsarr=mysql_fetch_array($sel)){ $section=$rsarr['Section']; $objResponse->addScript("addOption('section','" . $section . "','" . $section . "');"); }
} else {
$objResponse->addScript("document.getElementById('section').options.length = 0;");
$objResponse->addScript("addOption('section','" . '--' . "','" . 'none' . "');");
$objResponse->addScript("document.getElementById('courseamount').value = '';"); }
return $objResponse->getXML(); }

function setStuidpwd($appid){
$objResponse =& new xajaxResponse();
$objResponse->addScript("document.getElementById('studentid').value = '';");
$objResponse->addScript("document.getElementById('studentpwd').value = '';");
$objResponse->addScript("document.getElementById('studentname').value = '';");
if($appid!=''){

$idcount=mysql_query("select count(*) from applicantdetails where applicantid='$appid'",$con);  $exist=mysql_result($idcount,0);
if($exist>0){
$select=mysql_query("select * from applicantdetails where applicantid='$appid'",$con);
while($rs=mysql_fetch_array($select)){ $intake=$rs['intake']; $course=$rs['course'];
$title=$rs['title']; $firstname=$rs['firstname']; $middlename=$rs['middlename'];  $lastname=$rs['lastname'];
$level=$rs['levelofeducation']; $mailid=$rs['mailid']; $country=$rs['countryresidence'];  $address=$rs['address'];
$postcode=$rs['postcode']; $phonenumber=$rs['phonenumber']; $mobilenumber=$rs['mobilenumber'];
$faxnumber=$rs['faxnumber']; $dateofbirth=$rs['dateofbirth']; $passportnumber=$rs['passportnumber'];
$course1=$rs['course1'];  $institute1=$rs['institute1']; $duration1=$rs['duration1']; $grade1=$rs['grade1'];
$course2=$rs['course2'];  $institute2=$rs['institute2']; $duration2=$rs['duration2']; $grade2=$rs['grade2'];
$employer1=$rs['employer1'];  $designation1=$rs['designation1']; $startdate1=$rs['startdate1'];
$enddate1=$rs['enddate1']; $employer2=$rs['employer2'];  $designation2=$rs['designation2'];
$startdate2=$rs['startdate2']; $enddate2=$rs['enddate2']; $refname1=$rs['refname1'];
$refoccupation1=$rs['refoccupation1']; $refinstitution1=$rs['refinstitution1'];
$refrelationship1=$rs['refrelationship1']; $refphonenumber1=$rs['refphonenumber1'];  $refemail1=$rs['refemail1'];
$refname2=$rs['refname2']; $refoccupation2=$rs['refoccupation2']; $refinstitution2=$rs['refinstitution2'];
$refrelationship2=$rs['refrelationship2']; $refphonenumber2=$rs['refphonenumber2'];
$refemail2=$rs['refemail2'];

$sel=mysql_query("select * from sectionmaster where CourseCode='$course' and Intake='$intake' order by Section",$con);
$objResponse->addScript("document.getElementById('section').options.length = 0;");
$objResponse->addScript("addOption('section','" . '--' . "','" . 'none' . "');");
while($rsarr=mysql_fetch_array($sel)){ $section=$rsarr['Section']; $objResponse->addScript("addOption('section','" . $section . "','" . $section . "');"); }
if($level=='Level1') $objResponse->addScript("document.getElementById('levelofeducation').selectedIndex=1;");
if($level=='Level2') $objResponse->addScript("document.getElementById('levelofeducation').selectedIndex=2;");
if($level=='Level3') $objResponse->addScript("document.getElementById('levelofeducation').selectedIndex=3;");
if($level=='Level4') $objResponse->addScript("document.getElementById('levelofeducation').selectedIndex=4;");
if($level=='Level5') $objResponse->addScript("document.getElementById('levelofeducation').selectedIndex=5;");
$selcourse=mysql_query("select * from coursedetails where LevelOfTheCourse='$level'",$con);
$selval=0;
$objResponse->addScript("document.getElementById('coursename').options.length = 0;");
$objResponse->addScript("addOption('coursename','" . 'select' . "','" . 'none' . "');");
while($crs=mysql_fetch_array($selcourse)){
$ccode=$crs['CourseCode']; $cname=$crs['CourseName']; $fees=$crs['DefaultFees']; $selval++;
if($course==$ccode) $selcourseindex=$selval;
$objResponse->addScript("addOption('coursename','" . $cname . "','" . $ccode . "');");
}
}
$objResponse->addScript("document.getElementById('coursename').selectedIndex=$selcourseindex;");
$querySelectFeesExec=mysql_query("select DefaultFees from coursedetails where CourseCode='$course'",$con);
$CourseAmount=mysql_result($querySelectFeesExec,0);
$objResponse->addScript("document.getElementById('courseamount').value = $CourseAmount;");

$select=mysql_query("select student from countdetails where intake='$intake'",$con); $count=mysql_result($select,0);
$chars = "234567890abcdefghijkmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"; $i=0; $password="";
while($i < 6){ $password=$password.$chars{mt_rand(0,strlen($chars))}; $i++; }
$studentid=$intake.$course.$count; $studentname=$title;
if($firstname!='')$studentname.='.'.$firstname; if($middlename!='')$studentname.=' '.$middlename; if($lastname!='')$studentname.=' '.$lastname;
$objResponse->addScript("document.getElementById('studentid').value = '$studentid';");
$objResponse->addScript("document.getElementById('studentpwd').value = '$password';");
$objResponse->addScript("document.getElementById('studentname').value = '$studentname';");
$objResponse->addScript("document.getElementById('emailid').value = '$mailid';");
$objResponse->addScript("document.getElementById('addressline1').value = '$address';");
$objResponse->addScript("document.getElementById('postcode').value = '$postcode';");
$objResponse->addScript("document.getElementById('dateofbirth').value = '$dateofbirth';");
$objResponse->addScript("document.getElementById('passportnumber').value = '$passportnumber';");
$objResponse->addScript("document.getElementById('phonenumber').value = '$phonenumber';");
$objResponse->addScript("document.getElementById('mobilenumber').value = '$mobilenumber';");
$objResponse->addScript("document.getElementById('faxnumber').value = '$faxnumber';");
$objResponse->addScript("document.getElementById('course1').value = '$course1';");
$objResponse->addScript("document.getElementById('institute1').value = '$institute1';");
$objResponse->addScript("document.getElementById('duration1').value = '$duration1';");
$objResponse->addScript("document.getElementById('garde1').value = '$grade1';");
$objResponse->addScript("document.getElementById('course2').value = '$course2';");
$objResponse->addScript("document.getElementById('institute2').value = '$institute2';");
$objResponse->addScript("document.getElementById('duration2').value = '$duration2';");
$objResponse->addScript("document.getElementById('garde2').value = '$grade2';");
$objResponse->addScript("document.getElementById('employer1').value = '$employer1';");
$objResponse->addScript("document.getElementById('designation1').value = '$designation1';");
if($startdate1!='0000-00-00')$objResponse->addScript("document.getElementById('startdate1').value = '$startdate1';");
if($enddate1!='0000-00-00')$objResponse->addScript("document.getElementById('enddate1').value = '$enddate1';");
$objResponse->addScript("document.getElementById('employer2').value = '$employer2';");
$objResponse->addScript("document.getElementById('designation2').value = '$designation2';");
if($startdate2!='0000-00-00')$objResponse->addScript("document.getElementById('startdate2').value = '$startdate2';");
if($enddate2!='0000-00-00')$objResponse->addScript("document.getElementById('enddate2').value = '$enddate2';");
$objResponse->addScript("document.getElementById('refname1').value = '$refname1';");
$objResponse->addScript("document.getElementById('refoccupation1').value = '$refoccupation1';");
$objResponse->addScript("document.getElementById('refinstitution1').value = '$refinstitution1';");
$objResponse->addScript("document.getElementById('refrealtionship1').value = '$refrelationship1';");
$objResponse->addScript("document.getElementById('refphonenumber1').value = '$refphonenumber1';");
$objResponse->addScript("document.getElementById('refemailid1').value = '$refemail1';");
$objResponse->addScript("document.getElementById('refname2').value = '$refname2';");
$objResponse->addScript("document.getElementById('refoccupation2').value = '$refoccupation2';");
$objResponse->addScript("document.getElementById('refinstitution2').value = '$refinstitution2';");
$objResponse->addScript("document.getElementById('refrealtionship2').value = '$refrelationship2';");
$objResponse->addScript("document.getElementById('refphonenumber2').value = '$refphonenumber2';");
$objResponse->addScript("document.getElementById('refemailid2').value = '$refemail2';");
}}
else $objResponse->addScript("window.location='student.php';");
return $objResponse->getXML(); }

// student master functions

function appstudetails($id)
{
$objResponse =& new xajaxResponse();

$count=mysql_query("select count(*) from student where sudentid='$id'",$con);
if(mysql_result($count,0)==0) {
$objResponse->addScript("document.getElementById('idavailable').innerHTML='<blink><font color=#660099>Not available</blink>';");
$objResponse->addScript("document.getElementById('payfine').disabled=1;");
$objResponse->addScript("document.getElementById('fineamount').disabled=1;");
$objResponse->addScript("document.getElementById('payexam').disabled=1;");
$objResponse->addScript("document.getElementById('examamount').disabled=1;");
$objResponse->addScript("document.getElementById('transferbranch').disabled=1;");
$objResponse->addScript("document.getElementById('englishclass').disabled=1;");
$objResponse->addScript("document.getElementById('active').disabled=1;");
$objResponse->addScript("document.getElementById('newstudentid').disabled=1;");
$objResponse->addScript("document.getElementById('visaclear').disabled=1;");
$objResponse->addScript("tabobj=document.getElementById('activateme').rows[2].cells;");
$objResponse->addScript("tabobj[1].innerHTML='None';");
$objResponse->addScript("tabobj=document.getElementById('activateme').rows[3].cells;");
$objResponse->addScript("tabobj[1].innerHTML='None';");
$objResponse->addScript("tabobj=document.getElementById('activateme').rows[4].cells;");
$objResponse->addScript("tabobj[1].innerHTML='None';");
$objResponse->addScript("tabobj[2].innerHTML='Paid Amount : None';");
$objResponse->addScript("tabobj=document.getElementById('activateme').rows[5].cells;");
$objResponse->addScript("tabobj[1].innerHTML='None';");
}else {
$objResponse->addScript("document.getElementById('idavailable').innerHTML='';");
$select=mysql_query("select * from student where sudentid='$id'",$con);
while($a=mysql_fetch_array($select)){ $coursename=$a['coursename'];
$fine=$a['fine']; $examfee=$a['examfee']; $courseamount=$a['courseamount'];
$englishclass=$a['englishclass']; $active=$a['discontinued']; $visa=$a['visa']; $feepaid=$a['feepaid']; }

if($fine>0) { $objResponse->addScript("document.getElementById('payfine').disabled='';");
$objResponse->addScript("document.getElementById('fineamount').disabled='';");
$objResponse->addScript("document.getElementById('fineamount').value='$fine';");
$objResponse->addScript("tabobj=document.getElementById('activateme').rows[2].cells;");
$objResponse->addScript("tabobj[1].innerHTML='$fine';"); }

if($examfee>0) { $objResponse->addScript("document.getElementById('payexam').disabled='';");
$objResponse->addScript("document.getElementById('examamount').disabled='';");
$objResponse->addScript("document.getElementById('examamount').value='$examfee';");
$objResponse->addScript("tabobj=document.getElementById('activateme').rows[3].cells;");
$objResponse->addScript("tabobj[1].innerHTML='$examfee';"); }

if($fine==0) { $objResponse->addScript("document.getElementById('payfine').disabled='';");
$objResponse->addScript("document.getElementById('fineamount').disabled='';");
$objResponse->addScript("document.getElementById('fineamount').value='0';");
$objResponse->addScript("tabobj=document.getElementById('activateme').rows[2].cells;");
$objResponse->addScript("tabobj[1].innerHTML='0';"); }

if($examfee==0) { $objResponse->addScript("document.getElementById('payexam').disabled='';");
$objResponse->addScript("document.getElementById('examamount').disabled='';");
$objResponse->addScript("document.getElementById('examamount').value='0';");
$objResponse->addScript("tabobj=document.getElementById('activateme').rows[3].cells;");
$objResponse->addScript("tabobj[1].innerHTML='0';"); }

$objResponse->addScript("tabobj=document.getElementById('activateme').rows[4].cells;");
$objResponse->addScript("tabobj[1].innerHTML='$courseamount';");
$objResponse->addScript("tabobj[2].innerHTML='Paid Amount : $feepaid';");
$objResponse->addScript("document.getElementById('transferbranch').disabled='';");
$objResponse->addScript("tabobj=document.getElementById('activateme').rows[5].cells;");
$objResponse->addScript("tabobj[1].innerHTML='$coursename';");

$objResponse->addScript("document.getElementById('englishclass').disabled='';");
if($englishclass==1) $objResponse->addScript("document.getElementById('englishclass').selectedIndex=0;");
else $objResponse->addScript("document.getElementById('englishclass').selectedIndex=1;");

$objResponse->addScript("document.getElementById('active').disabled='';");
if($active==1){ $objResponse->addScript("document.getElementById('active').selectedIndex=0;");
$objResponse->addScript("document.getElementById('idavailable').innerHTML='<blink><font color=red>Discontinued</blink>';");
}else $objResponse->addScript("document.getElementById('active').selectedIndex=1;");

$objResponse->addScript("document.getElementById('visaclear').disabled='';");
if($visa==1) $objResponse->addScript("document.getElementById('visaclear').selectedIndex=0;");
else $objResponse->addScript("document.getElementById('visaclear').selectedIndex=1;");
}
return $objResponse->getXML();
}
function setTranfer($value)
{
$objResponse =& new xajaxResponse();

if($value!='none'){ $objResponse->addScript("document.getElementById('discontinue').disabled=0;");
$objResponse->addScript("document.getElementById('newstudentid').disabled=0;");
$objResponse->addScript("document.getElementById('active').selectedIndex=0;");
$objResponse->addScript("document.getElementById('newstudentid').focus();"); }
if($value=='none') { $objResponse->addScript("document.getElementById('newstudentid').disabled=1;");
$objResponse->addScript("document.getElementById('active').selectedIndex=1;"); }
return $objResponse->getXML();
}

// subject List functions

function setSubjectlist($stuid)
{
$objResponse =& new xajaxResponse();
$_SESSION['studentid']=$stuid;
$objResponse->addScript("window.location='subjectList.php';");
return $objResponse->getXML();
}

function setLeavemaster($level)
{
$objResponse =& new xajaxResponse();

if($level=='none'){
$objResponse->addScript("document.getElementById('CourseCombo').options.length = 0;");
$objResponse->addScript("addOption('CourseCombo','" . 'select' . "','" . 'none' . "');");
} else {
$objResponse->addScript("document.getElementById('CourseCombo').options.length = 0;");
$objResponse->addScript("addOption('CourseCombo','" . 'select' . "','" . 'none' . "');");
$sql="select distinct(CourseCode),CourseName from coursedetails where LevelOfTheCourse='$level' order by CourseName";
$rs=mysql_query($sql,$con);
while($a=mysql_fetch_array($rs)){ $ccode=$a['CourseCode']; $course=$a["CourseName"];
$objResponse->addScript("addOption('CourseCombo','" . $course . "','" . $ccode . "');"); }
}
return $objResponse->getXML();
}

function setSectionslot($ccode,$intake)
{
$objResponse =& new xajaxResponse();

if($intake=='none'){ $objResponse->addScript("alert('Intake not selected');");
$objResponse->addScript("document.getElementById('CourseCombo').selectedIndex=0;");
$objResponse->addScript("document.getElementById('IntakeCombo').focus();");  return $objResponse->getXML(); }
if($ccode=='none'){
$objResponse->addScript("document.getElementById('SectionCombo').options.length = 0;");
$objResponse->addScript("addOption('SectionCombo','" . 'select' . "','" . 'none' . "');");
$objResponse->addScript("document.getElementById('SlotCombo').options.length = 0;");
$objResponse->addScript("addOption('SlotCombo','" . 'select' . "','" . 'none' . "');");
} else {
$objResponse->addScript("document.getElementById('SectionCombo').options.length = 0;");
$objResponse->addScript("addOption('SectionCombo','" . 'select' . "','" . 'none' . "');");
$objResponse->addScript("document.getElementById('SlotCombo').options.length = 0;");
$objResponse->addScript("addOption('SlotCombo','" . 'select' . "','" . 'none' . "');");
$rs=mysql_query("select distinct(Section) from sectionmaster where Intake='$intake' and CourseCode='$ccode' order by Section",$con);
while($a=mysql_fetch_array($rs)){ $Section=$a['Section'];
$objResponse->addScript("addOption('SectionCombo','" . $Section . "','" . $Section . "');"); }
$rs1=mysql_query("select NumberOfSlots from timetablesettings where Intake='$intake' and CourseCode='$ccode'",$con);
for($i=1;$i<=mysql_result($rs1,'NumberOfSlots');$i++) $objResponse->addScript("addOption('SlotCombo','" . $i . "','" . $i . "');");
}
return $objResponse->getXML();
}

function setMarkcourses($level)
{
$objResponse =& new xajaxResponse();

if($level=='none'){
$objResponse->addScript("document.getElementById('course').options.length = 0;");
$objResponse->addScript("addOption('course','" . 'select' . "','" . 'none' . "');");
} else {
$objResponse->addScript("document.getElementById('course').options.length = 0;");
$objResponse->addScript("addOption('course','" . 'select' . "','" . 'none' . "');");
$sql="select distinct(CourseName),CourseCode from coursedetails where LevelOfTheCourse='$level' order by CourseName";
$rs=mysql_query($sql,$con);
while($a=mysql_fetch_array($rs)){ $name=$a["CourseName"];  $code=$a["CourseCode"];
$objResponse->addScript("addOption('course','" . $name . "','" . $code . "');"); }
}
return $objResponse->getXML();
}

function setMarkterms($code,$intakeid)
{
$objResponse =& new xajaxResponse();
if($intakeid=='none'){ $objResponse->addScript("alert('intake is missing');");
$objResponse->addScript("document.getElementById('course').selectedIndex=0;");
$objResponse->addScript("document.getElementById('intake').focus();"); return $objResponse->getXML(); }

if($code=='none'){
$objResponse->addScript("document.getElementById('term').options.length = 0;");
$objResponse->addScript("addOption('term','" . 'select' . "','" . 'none' . "');");
$objResponse->addScript("document.getElementById('msection').options.length = 0;");
$objResponse->addScript("addOption('msection','" . 'select' . "','" . 'none' . "');");
} else {
$objResponse->addScript("document.getElementById('term').options.length = 0;");
$objResponse->addScript("addOption('term','" . 'select' . "','" . 'none' . "');");
$objResponse->addScript("document.getElementById('msection').options.length = 0;");
$objResponse->addScript("addOption('msection','" . 'select' . "','" . 'none' . "');");
$sql=mysql_query("select NoOfTerms from coursedetails where CourseCode='$code'",$con);
$noofterm=mysql_result($sql,"NoOfTerms");
for($i=1;$i<=$noofterm;$i++) $objResponse->addScript("addOption('term','" . $i . "','" . $i . "');");
$sele=mysql_query("select Intake from cohortdetails where CohortID='$intakeid'",$con); $intake=mysql_result($sele,'Intake');
$sel=mysql_query("select * from sectionmaster where Intake='$intake' and CourseCode='$code' order by Section",$con);
while($rsar=mysql_fetch_array($sel)){ $section=$rsar['Section']; $SectionId=$rsar['SectionId'];
$objResponse->addScript("addOption('msection','" . $section . "','" . $SectionId . "');"); }
}
return $objResponse->getXML();
}

function setMarksubjetcts($term,$code)
{
$objResponse =& new xajaxResponse();

if($term=='none'){
$objResponse->addScript("document.getElementById('subject').options.length = 0;");
$objResponse->addScript("addOption('subject','" . 'select' . "','" . 'none' . "');");
} else {
$objResponse->addScript("document.getElementById('subject').options.length = 0;");
$objResponse->addScript("addOption('subject','" . 'select' . "','" . 'none' . "');");
$sql=mysql_query("select * from subjectcreditdetails where CourseCode='$code' and TermNumber='$term' order by SubjectName",$con);
while($rsarr=mysql_fetch_array($sql)){ $scode=$rsarr['SubjectCreditId']; $sname=$rsarr['SubjectName'];
$objResponse->addScript("addOption('subject','" . $sname . "','" . $scode . "');"); }
}
return $objResponse->getXML();
}

function setMarkcreate($unameid,$intakeid,$course,$term,$subjectid,$assesment,$section)
{
$objResponse =& new xajaxResponse();
$rantable=$unameid.$intakeid.$course.$term.$subjectid.$assesment.$section;
$rantblename=strtolower($rantable);
//$objResponse->addScript("alert('$rantblename');");
$tcreated=0; $sno=1; $sid=0;

$tables=mysql_list_tables('heos',$con);
while($lar=mysql_fetch_array($tables)) if($lar[0]==$rantblename) { $tcreated=1; break; }

if($tcreated){
$Mjstotal=0;  $noofass=0;
$sele=mysql_query("select SubjectCode from subjectcreditdetails where SubjectCreditId='$subjectid'",$con); $subcode=mysql_result($sele,'SubjectCode');
$sele=mysql_query("select Intake from cohortdetails where CohortID='$intakeid'",$con); $intake=mysql_result($sele,'Intake');

$asstype=mysql_query("select AssestmentType from assestmentdetails where Criteria='$assesment'",$con);
$script="<table class=\"table\" align=\"center\" cellspacing=2 cellpadding=5><tr class=\"label\"><td>S.no</td><td>Student ID</td><td>Student Name</td>";
while($asstypear=mysql_fetch_array($asstype)){ $asstpe=$asstypear['AssestmentType']; $script=$script."<td>".$asstpe."</td>"; $noofass++;
$sele=mysql_query("select Marks from assestmentdetails where Criteria='$assesment' and AssestmentType='$asstpe'",$con); $mark=mysql_result($sele,'Marks');
$Mjstotal=$Mjstotal+$mark; }
$script=$script."<td>Total</td><td>Status</td></tr>";
$selstu=mysql_query("select * from $rantblename",$con);
while($rsar=mysql_fetch_array($selstu)){ $studentid=$rsar['studentid']; $studentname=$rsar['studentname'];
$subcount=mysql_query("select count(*) from studentsubject where studentid='$studentid' and subjectcode='$subcode'",$con); $studont=mysql_result($subcount,0);
if($studont>0){  $Mtotal=0; $Mdtotal=0; $assinc=0;
$script=$script."<tr class=\"label\"><td>".$sno."</td><td><input type=\"hidden\" name=\"stuid[".$sid."]\" value=\"".$studentid."\">".$studentid."</td>";
$script=$script."<td><input class=\"input\" type=\"text\" name=\"stuname[".$sid."]\" value=\"".$studentname."\"></td>";
$asstype=mysql_query("select AssestmentType from assestmentdetails where Criteria='$assesment'",$con);
while($asstypear=mysql_fetch_array($asstype)){ $assname=$asstypear['AssestmentType']; $assinc++;
$assmntv=$rsar[$assname];
$sele=mysql_query("select DefaultMark from assestmentdetails where Criteria='$assesment' and AssestmentType='$assname'",$con); $dmark=mysql_result($sele,'DefaultMark');
$sele=mysql_query("select Marks from assestmentdetails where Criteria='$assesment' and AssestmentType='$assname'",$con); $mark=mysql_result($sele,'Marks');
$script=$script."<td><input class=\"marks\" type=\"text\" name=\"assesmenttype".$assinc."[".$sid."]\" id=\"assesmenttype".$assinc."[".$sid."]\" maxlength=3 value=\"".$assmntv."\" readonly>/".$mark."</td>";
$Mtotal=$Mtotal+$mark; $Mdtotal=$Mdtotal+$dmark; }
$script=$script."<td><input class=\"marks\" type=\"text\" name=\"total[".$sid."]\" id=\"total[".$sid."]\" maxlength=3 value=\"".$Mdtotal."\" readonly>/".$Mtotal."</td>";
$script=$script."<td><input class=\"quantity\" type=\"text\" name=\"status[".$sid."]\" id=\"status[".$sid."]\" value=\"Pass\" readonly></td></tr>";
} else {   $Mtotal=0; $assinc=0;
$script=$script."<tr class=\"label\"><td>".$sno."</td><td><input type=\"hidden\" name=\"stuid[".$sid."]\" value=\"".$studentid."\">".$studentid."</td>";
$script=$script."<td><input class=\"input\" type=\"text\" name=\"stuname[".$sid."]\" value=\"".$studentname."\"></td>";
$asstype=mysql_query("select AssestmentType from assestmentdetails where Criteria='$assesment'",$con);
while($asstypear=mysql_fetch_array($asstype)){ $assname=$asstypear['AssestmentType']; $assinc++;
$assmntv=$rsar[$assname];
$sele=mysql_query("select Marks from assestmentdetails where Criteria='$assesment' and AssestmentType='$assname'",$con); $mark=mysql_result($sele,'Marks');
$script=$script."<td><input class=\"marks\" type=\"text\" name=\"assesmenttype".$assinc."[".$sid."]\" id=\"assesmenttype".$assinc."[".$sid."]\" maxlength=3 value=\"".$assmntv."\" onChange=\"setMarktotal(this,".$sid.",".$noofass.",".$mark.",".$Mjstotal.");\">/".$mark."</td>";
$Mtotal=$Mtotal+$mark; }
$totalv=$rsar['total']; $statusv=$rsar['status'];
$script=$script."<td><input class=\"marks\" type=\"text\" name=\"total[".$sid."]\" id=\"total[".$sid."]\" maxlength=3 value=\"".$totalv."\" readonly>/".$Mtotal."</td>";
$script=$script."<td><input class=\"quantity\" type=\"text\" name=\"status[".$sid."]\" id=\"status[".$sid."]\" value=\"".$statusv."\" readonly></td></tr>";
}
$sno++; $sid++;
}
$colspan=$noofass+5;
$script=$script."<tr class=\"label\"><td colspan=$colspan align=\"center\"><input class=\"buttonstatic\" type=\"button\" value=\"Cancel\" onClick=\"setMrklistcancel();\">&nbsp;&nbsp;<input class=\"buttonstatic\" type=\"submit\" name=\"updatelist\" value=\"Update\"></td></tr></table>";
$objResponse->addScript("document.getElementById('stulist').innerHTML='$script';");

} else {
$Mjstotal=0;  $noofass=0;
$sele=mysql_query("select SubjectCode from subjectcreditdetails where SubjectCreditId='$subjectid'",$con); $subcode=mysql_result($sele,'SubjectCode');
$sele=mysql_query("select Intake from cohortdetails where CohortID='$intakeid'",$con); $intake=mysql_result($sele,'Intake');
$sele=mysql_query("select Section from sectionmaster where SectionId='$section'",$con); $section=mysql_result($sele,'Section');

$asstype=mysql_query("select AssestmentType from assestmentdetails where Criteria='$assesment'",$con);
$script="<table class=\"table\" align=\"center\" cellspacing=2 cellpadding=5><tr class=\"label\"><td>S.no</td><td>Student ID</td><td>Student Name</td>";
while($asstypear=mysql_fetch_array($asstype)){ $asstpe=$asstypear['AssestmentType']; $script=$script."<td>".$asstpe."</td>"; $noofass++;
$sele=mysql_query("select Marks from assestmentdetails where Criteria='$assesment' and AssestmentType='$asstpe'",$con); $mark=mysql_result($sele,'Marks');
$Mjstotal=$Mjstotal+$mark; }
$script=$script."<td>Total</td><td>Status</td></tr>";
$selstu=mysql_query("select * from student where intake='$intake' and coursecode='$course' and section='$section' order by studentname",$con);
while($rsar=mysql_fetch_array($selstu)){ $studentid=$rsar['studentid']; $studentname=$rsar['studentname'];
$subcount=mysql_query("select count(*) from studentsubject where studentid='$studentid' and subjectcode='$subcode'",$con); $studont=mysql_result($subcount,0);
if($studont>0){  $Mtotal=0; $Mdtotal=0; $assinc=0;
$script=$script."<tr class=\"label\"><td>".$sno."</td><td><input type=\"hidden\" name=\"stuid[".$sid."]\" value=\"".$studentid."\">".$studentid."</td>";
$script=$script."<td><input type=\"hidden\" name=\"stuname[".$sid."]\" value=\"".$studentname."\">".$studentname."</td>";
$asstype=mysql_query("select AssestmentType from assestmentdetails where Criteria='$assesment'",$con);
while($asstypear=mysql_fetch_array($asstype)){ $assname=$asstypear['AssestmentType']; $assinc++;
$sele=mysql_query("select DefaultMark from assestmentdetails where Criteria='$assesment' and AssestmentType='$assname'",$con); $dmark=mysql_result($sele,'DefaultMark');
$sele=mysql_query("select Marks from assestmentdetails where Criteria='$assesment' and AssestmentType='$assname'",$con); $mark=mysql_result($sele,'Marks');
$script=$script."<td><input class=\"marks\" type=\"text\" name=\"assesmenttype".$assinc."[".$sid."]\" id=\"assesmenttype".$assinc."[".$sid."]\" maxlength=3 value=\"".$dmark."\" readonly>/".$mark."</td>";
$Mtotal=$Mtotal+$mark; $Mdtotal=$Mdtotal+$dmark; }
$script=$script."<td><input class=\"marks\" type=\"text\" name=\"total[".$sid."]\" id=\"total[".$sid."]\" maxlength=3 value=\"".$Mdtotal."\" readonly>/".$Mtotal."</td>";
$script=$script."<td><input class=\"quantity\" type=\"text\" name=\"status[".$sid."]\" id=\"status[".$sid."]\" value=\"Pass\" readonly></td></tr>";
} else {   $Mtotal=0; $assinc=0;
$script=$script."<tr class=\"label\"><td>".$sno."</td><td><input type=\"hidden\" name=\"stuid[".$sid."]\" value=\"".$studentid."\">".$studentid."</td>";
$script=$script."<td><input type=\"hidden\" name=\"stuname[".$sid."]\" value=\"".$studentname."\">".$studentname."</td>";
$asstype=mysql_query("select AssestmentType from assestmentdetails where Criteria='$assesment'",$con);
while($asstypear=mysql_fetch_array($asstype)){ $assname=$asstypear['AssestmentType']; $assinc++;
$sele=mysql_query("select Marks from assestmentdetails where Criteria='$assesment' and AssestmentType='$assname'",$con); $mark=mysql_result($sele,'Marks');
$script=$script."<td><input class=\"marks\" type=\"text\" name=\"assesmenttype".$assinc."[".$sid."]\" id=\"assesmenttype".$assinc."[".$sid."]\" maxlength=3 onChange=\"setMarktotal(this,".$sid.",".$noofass.",".$mark.",".$Mjstotal.");\">/".$mark."</td>";
$Mtotal=$Mtotal+$mark; }
$script=$script."<td><input class=\"marks\" type=\"text\" name=\"total[".$sid."]\" id=\"total[".$sid."]\" maxlength=3 readonly>/".$Mtotal."</td>";
$script=$script."<td><input class=\"quantity\" type=\"text\" name=\"status[".$sid."]\" id=\"status[".$sid."]\" readonly></td></tr>";
}
$sno++; $sid++;
}
$colspan=$assinc+5;
$script=$script."<tr class=\"label\"><td colspan=$colspan align=\"center\"><input class=\"buttonstatic\" type=\"button\" value=\"Cancel\" onClick=\"setMrklistcancel();\">&nbsp;&nbsp;<input class=\"buttonstatic\" type=\"submit\" name=\"savelist\" value=\"Save\"></td></tr></table>";
$objResponse->addScript("document.getElementById('stulist').innerHTML='$script';");
}
return $objResponse->getXML();
}


$xajax =& new xajax();
$xajax->registerFunction("setCourses");
$xajax->registerFunction("setFee");
$xajax->registerFunction("setdetails");
$xajax->registerFunction("setExCourses");
$xajax->registerFunction("getCourse");
$xajax->registerFunction("setWeektable");
$xajax->registerFunction("setAssign");
$xajax->registerFunction("setStaffCombo");
$xajax->registerFunction("setSavings");
$xajax->registerFunction("setStaffname");
$xajax->registerFunction("setHall");
$xajax->registerFunction("setEditdayslot");
$xajax->registerFunction("setNextweek");
$xajax->registerFunction("getSection");
$xajax->registerFunction("setUpdate");
$xajax->registerFunction("setSlotrepeat");
$xajax->registerFunction("setCourseamount");
$xajax->registerFunction("setStuidpwd");
$xajax->registerFunction("setstuCourses");
$xajax->registerFunction("appstudetails");
$xajax->registerFunction("setTranfer");
$xajax->registerFunction("setSubjectlist");
$xajax->registerFunction("setLeavemaster");
$xajax->registerFunction("setSectionslot");
$xajax->registerFunction("setMarkcourses");
$xajax->registerFunction("setMarkterms");
$xajax->registerFunction("setMarksubjetcts");
$xajax->registerFunction("setMarkcreate");

$xajax->processRequests();
?>

