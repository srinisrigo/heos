<?php
require_once(dirname(__FILE__) . '/xajax.inc.php');
function setTotalweeks($Vfromdate,$Vtodate){
$objResponse =& new xajaxResponse();
if($Vfromdate=='') return $objResponse->getXML();
$week=ceil(((strtotime($Vtodate)-strtotime($Vfromdate)+86400)/86400)/7);
$objResponse->addScript("document.getElementById('numberofweeks').value='$week';");
$objResponse->addScript("setTeachingWeeks($week);");
return $objResponse->getXML();
}
function setTodate($Vfromdate,$Vweek){
$objResponse =& new xajaxResponse();
$Stodate=strtotime($Vfromdate)+(86400*7*$Vweek)-86400;  $todate=date('d-M-Y',$Stodate);
$objResponse->addScript("document.getElementById('todate').value='$todate';");
$objResponse->addScript("setTeachingWeeks('$Vweek');");
return $objResponse->getXML();
}
$xajax =& new xajax();
$xajax->registerFunction("setTotalweeks");
$xajax->registerFunction("setTodate");
$xajax->processRequests();
?>
<html>
<head><title>Tme Table Settings</title><?php $xajax->printJavascript();?>
<script type="text/javascript" src="./Images/datetimepicker.js"></script>
<script type="text/javascript" src="./Images/transactionscript.js"></script>
<link rel="stylesheet" href="./Images/heoscss.css">
<script language="javascript">

function moveForward(){
var left=document.getElementById('coursecodelist1');
var right=document.getElementById('coursecodelist2');
var list=document.getElementById('list'); var bind='';
for(i=0;i<left.options.length;i++) if(left.options[i].selected==true){ f=1;
for(j=0;j<right.options.length;j++)
if(left.options[i].text==right.options[j].text) f=0;
if(f) { var objOption = new Option(left.options[i].text,left.options[i].value);
document.getElementById('coursecodelist2').options.add(objOption); }  }
list.value=''; for(k=0;k<right.options.length;k++) bind=bind+right.options[k].text+'.';
list.value=bind;
}

function moveBackward()
{
var right=document.getElementById('coursecodelist2');  var bind='';
for(j=0;j<right.options.length;j++) if(right.options[j].selected==true) right.remove(right.selectedIndex);
list.value=''; for(k=0;k<right.options.length;k++) bind=bind+right.options[k].text+'.';
list.value=bind;
}

function showSlots(index){
document.getElementById('slotdiv').innerHTML='';
document.getElementById('create').disabled=0;
var pre='';
for(vi=0;vi<=23;vi++) for(vj=0;vj<60;vj+=5){
if(vi<10 && vj<10) vt=vi+':0'+vj;
else if(vi>9 && vj<10) vt=vi+':0'+vj;
else if(vi<10 && vj>9) vt=vi+':'+vj;
else vt=vi+':'+vj;
pre=pre+"<option value=\""+vt+"\">"+vt+"</option>"; }

if(index!=0){
st="<table align=center cellspacing=1 cellpadding=0><tr><th>Session Name</th><th>From Time</th><th>To Time</th></tr>";
for(z=1;z<=index;z++){
st=st+"<tr><td><input type=\"text\" name=\"slotname["+z+"]\" id=\"slotname["+z+"]\" value=\"Session "+z+"\"></td><td>";
st=st+"<select name=\"fromtime["+z+"]\" id=\"fromtime["+z+"]\" onchange=\"setNextTime(this,'totime["+z+"]')\"><option value=\"Time\">select</option>"+pre+"</select></td><td>";
if(z==index) st=st+"<select name=\"totime["+z+"]\" id=\"totime["+z+"]\"><option value=\"Time\">select</option>"+pre+"</select></td></tr>";
else st=st+"<select name=\"totime["+z+"]\" id=\"totime["+z+"]\" onchange=\"setNextTime(this,'fromtime["+(z+1)+"]')\"><option value=\"Time\">select</option>"+pre+"</select></td></tr>";
}
st=st+"</table>";
document.getElementById('slotdiv').innerHTML=st;
} }

function btover(obj,cname){ obj.className=cname; }
function objname(obj){ alert(obj.name); }

function setTeachingWeeks(weeks){
var string="";
for(i=1;i<=weeks;i++)
if(i<10) string=string+"<input type=\"checkbox\" name=\"Tweek["+i+"]\" id=\"Tweek["+i+"]\" value="+i+" checked>W0"+i;
else if((i%10)==0) string=string+"<input type=\"checkbox\" name=\"Tweek["+i+"]\" id=\"Tweek["+i+"]\" value="+i+" checked>W"+i+"<br>";
else string=string+"<input type=\"checkbox\" name=\"Tweek["+i+"]\" id=\"Tweek["+i+"]\" value="+i+" checked>W"+i;
document.getElementById('weekarea').innerHTML=string;
}

function checkedAll(obj,wch){
if (obj.checked && wch==7){ for(i=1;i<=7;i++){ st='Check['+i+']'; document.getElementById(st).checked=1; } return false; }
if (obj.checked==0 && wch==7){ for(i=1;i<=7;i++){ st='Check['+i+']'; document.getElementById(st).checked=0; } return false; }
if(obj.checked && wch<7){ var ck=0;
for(i=1;i<=7;i++){ st='Check['+i+']'; if(document.getElementById(st).checked) ck=1; else { ck=0; break; } }
if(ck) document.getElementById('Check[0]').checked=1; }
if(obj.checked==0 && wch<7) document.getElementById('Check[0]').checked=0;
}

function setNoOfSession(chk){
document.getElementById('slotdiv').innerHTML='';
document.getElementById('create').disabled=1;
if(chk) document.getElementById('noofrow').disabled=0;
if(chk) document.getElementById('noofrow').focus(); }

function setSlotPeriod(chk){
document.getElementById('noofrow').disabled=1;
document.getElementById('slotdiv').innerHTML='';
document.getElementById('create').disabled=0;
var pre='';
for(vi=0;vi<=23;vi++) for(vj=0;vj<60;vj+=5){
if(vi<10 && vj<10) vt=vi+':0'+vj;
else if(vi>9 && vj<10) vt=vi+':0'+vj;
else if(vi<10 && vj>9) vt=vi+':'+vj;
else vt=vi+':'+vj;
if(vt=='7:00') pre=pre+"<option value=\""+vt+"\" selected>"+vt+"</option>"; else pre=pre+"<option value=\""+vt+"\">"+vt+"</option>"; }

st="<table align=center cellspacing=1 cellpadding=0><tr>";
st=st+"<td>From Time</td><td><select name=\"fromtime\" id=\"fromtime\" onchange=\"setNextTime(this,'totime')\"><option value=\"Time\">select</option>"+pre+"</select></td>";
st=st+"<td>End Time</td><td><select name=\"totime\" id=\"totime\"><option value=\"Time\">select</option>"+pre+"</select></td>";
st=st+"<td>Slot Period</td><td><input type=\"text\" name=\"slotperiod\" id=\"slotperiod\" value=0 size=1 maxlength=2 onchange=\"setRound(this.value)\"></td>";
st=st+"</tr></table>";
document.getElementById('slotdiv').innerHTML=st;
}
function setNextTime(curobj,nextobj){ document.getElementById(nextobj).selectedIndex=curobj.selectedIndex; }

function setRound(val){ if((val%5)>0) document.getElementById('slotperiod').value=parseInt(document.getElementById('slotperiod').value)+5-(val%5); }
</script>
</head>

<body>
<?php
$con=mysql_connect('192.168.15.26','root','admin'); $db=mysql_select_db('heos');

print "<form method=\"POST\" name=\"form\">
<table align=center cellspacing=1 cellpadding=0>
<tr><th colspan=2>Time Table Settings</th></tr>
<tr><td>Time Table Name</td><td><input class=\"input\" type=\"text\" name=\"TimeTableName\" id=\"TimeTableName\"></td></tr>
<tr><td>Programme Intake</td><td><table align=center cellspacing=0 cellpadding=0><tr>
<td><select class=\"select\" multiple name=\"coursecodelist1\" id=\"coursecodelist1\" size=5>";
$selectintake=("select distinct(Intake) from cohortdetails");
$result=mysql_query($selectintake,$con);
while($re=mysql_fetch_array($result)){ $intake=$re["Intake"]; print"<option value=\"$intake\">$intake</option>"; }
print "</select></td><td><input class=\"buttonstatic\" type=\"button\" value=\"---->\" onClick=\"moveForward();\" onmouseover=\"btover(this,'buttonover');\" onmouseout=\"btover(this,'buttonstatic');\"><br>
<br><input class=\"buttonstatic\" type=\"button\" value=\"<----\" onClick=\"moveBackward();\" onmouseover=\"btover(this,'buttonover');\" onmouseout=\"btover(this,'buttonstatic');\"></td>
<td><select class=\"select\" multiple name=\"coursecodelist2\" id=\"coursecodelist2\" size=5></select></td>
</tr></table></td></tr>
<tr><td>Intake Starting Date</td>
<td><input class=\"date\" type=\"text\" name=\"fromdate\" readonly id=\"fromdate\" size=13>
<a href=\"javascript:NewCal('fromdate','ddmmmyyyy')\">
<img src=\"./Images/cal.gif\" alt=\"Pick a date\" width=\"20\" height=\"20\" border=\"0\"></a>&nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;&nbsp;
<input class=\"date\" type=\"text\" name=\"todate\" readonly id=\"todate\" size=13 onchange=\"return xajax_setTotalweeks(document.getElementById('fromdate').value,this.value)\">
<a href=\"javascript:NewCal('todate','ddmmmyyyy')\">
<img src=\"./Images/cal.gif\" alt=\"Pick a date\" width=\"20\" height=\"20\" border=\"0\"></a></td></tr>
<tr><td>Number of Weeks</td><td><input type=\"text\" name=\"numberofweeks\" id=\"numberofweeks\" value=0 size=2 onkeyup=\"return xajax_setTodate(document.getElementById('fromdate').value,this.value)\"></td></tr>
<tr><td>Teaching Weeks</td><td colspan=3 id=\"weekarea\">---------------------------</td></tr>
<tr><td>Teaching Hours/Week</td><td><input type=\"text\" name=\"numberofhours\" id=\"numberofhours\" value=0 size=2 maxlength=2></td></tr>
<tr><td>Days</td><td colspan=3>
<input type=\"checkbox\" name=\"Check[0]\" id=\"Check[0]\" value=7 onClick=\"checkedAll(this,7);\">All&nbsp;&nbsp;
<input type=\"checkbox\" name=\"Check[1]\" id=\"Check[1]\" value=1 onClick=\"checkedAll(this,1);\" checked>Mon
<input type=\"checkbox\" name=\"Check[2]\" id=\"Check[2]\" value=2 onClick=\"checkedAll(this,2);\" checked>Tue
<input type=\"checkbox\" name=\"Check[3]\" id=\"Check[3]\" value=3 onClick=\"checkedAll(this,3);\" checked>Wed
<input type=\"checkbox\" name=\"Check[4]\" id=\"Check[4]\" value=4 onClick=\"checkedAll(this,4);\" checked>Thu
<input type=\"checkbox\" name=\"Check[5]\" id=\"Check[5]\" value=5 onClick=\"checkedAll(this,5);\" checked>Fri
<input type=\"checkbox\" name=\"Check[6]\" id=\"Check[6]\" value=6 onClick=\"checkedAll(this,6);\">Sat
<input type=\"checkbox\" name=\"Check[7]\" id=\"Check[7]\" value=0 onClick=\"checkedAll(this,0);\">Sun</td></tr>
<tr><td colspan=2>Number of <input type=\"radio\" name=\"timetable\" value=\"Slot\" onclick=\"setSlotPeriod(this.checked)\">Slots
<input type=\"radio\" name=\"timetable\" value=\"Session\" onclick=\"setNoOfSession(this.checked)\">Session&nbsp;
<input type=\"text\" name=\"noofrow\" id=\"noofrow\" onkeyup=\"showSlots(this.value);\" size=2 maxlength=3 disabled></td></tr></table><br>
<div id=\"slotdiv\"></div><br>
<table align=center cellspacing=0 cellpadding=0><tr><td colspan=4 align=\"center\">
<input type=\"submit\" value=\"Submit\" name=\"create\" id=\"create\" disabled class=\"buttonstatic\" onmouseover=\"btover(this,'buttonover');\" onmouseout=\"btover(this,'buttonstatic');\">
<input type=\"hidden\" name=\"list\" id=\"list\"></td></tr>
</table></form>";

if(isset($_POST['create'])){
$TTName=$_POST['TimeTableName'];
$postedlist=$_POST['list']; $alist=explode('.',$postedlist); $listarray=array();
$fromdate=$_POST['fromdate'];  $fromdate=date('Y-m-d',strtotime($fromdate));
$todate=$_POST['todate'];  $todate=date('Y-m-d',strtotime($todate));
$numberofweeks=$_POST['numberofweeks'];
$teachinghours=$_POST['numberofhours'];
$Ateachingweeks=$_POST['Tweek']; $teachingweeks=implode('.',$Ateachingweeks);
$Ateachingdays=$_POST['Check'];  $teachingdays=implode('.',$Ateachingdays);
if(!empty($_POST['noofrow'])) $slots=$_POST['noofrow']; $slots=0;
$timetable=$_POST['timetable'];

$con=mysql_connect('192.168.15.26','root','admin'); $db=mysql_select_db('heos');
foreach($alist as $k=>$iv){ if(!empty($iv)) $listarray[]=$iv; }
$batchlist=implode('.',$listarray);
$insert=mysql_query("insert into timetablenamech values('0','$TTName','$batchlist','$fromdate','$todate','$numberofweeks','$teachinghours','$teachingweeks','$teachingdays','$slots','$timetable')");
if($insert){ echo "<script language=\"javascript\">alert('insertion Success');</script>";
$selid=mysql_query("select recordid from timetablenamech"); while($arr=mysql_fetch_array($selid)){ $timetableid=$arr['recordid']; }
if($timetable=='Session'){
if(!empty($_POST['fromtime'])){ $slotnameA=$_POST['slotname']; $fromtimeA=$_POST['fromtime']; $totimeA=$_POST['totime'];  $s=1;
foreach($fromtimeA as $k=>$fromtime){ $slotname=$slotnameA[$k]; $totime=$totimeA[$k]; $insert=mysql_query("insert into slottimings values('0','$timetableid',,'$s''$slotname','$fromtime','$totime')"); $s++; }
$update=mysql_query("update timetablenamech set numberofslots='".($s-1)."' where recordid='$timetableid'");
} }

if($timetable=='Slot'){
$slottime=$_POST['slotperiod']; $fromtime=$_POST['fromtime']; $totime=$_POST['totime'];
$ATime=array(); $period=($slottime/5);
for($vi=0;$vi<=23;$vi++) for($vj=0;$vj<60;$vj+=5){
if($vi<10 && $vj<10) $vt=$vi.':0'.$vj;
else if($vi>9 && $vj<10) $vt=$vi.':0'.$vj;
else if($vi<10 && $vj>9) $vt=$vi.':'.$vj;
else $vt=$vi.':'.$vj; $ATime[]=$vt; }
$s=1; $f=0; $c=0; $count=0;
foreach($ATime as $k=>$tvalue){
if($fromtime==$tvalue){ $sfromtime=$tvalue; $f=1; $c=1; }
if($count==$period){ $count=0;  $slotname='Slot '.$s;  $stotime=$tvalue;
$insert=mysql_query("insert into slottimings values('0','$timetableid','$s','$slotname','$sfromtime','$stotime')");
$s++; $sfromtime=$tvalue; }
if($c) $count++;
if($tvalue==$totime) break; }
$update=mysql_query("update timetablenamech set numberofslots='".($s-1)."' where recordid='$timetableid'");
}
}
}

?>
</body>

</html>
