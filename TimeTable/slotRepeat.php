<?php session_start(); ?>
<?php include "xajaxtransaction.php"; include "./Images/dbconnection.php"; ?>
<html>
<head>
<title></title>
<script type="text/javascript" src="./Images/datetimepicker.js"></script>
<script type="text/javascript" src="./Images/transactionscript.js"></script>
<link rel="stylesheet" href="./Images/heoscss.css">
<?php $xajax->printJavascript(); ?>
<script language="javascript">
function addOption(selectId, txt, val){ var objOption = new Option(txt,val); document.getElementById(selectId).options.add(objOption); }
function weekCancel() { document.getElementById('assign').innerHTML="";
document.getElementById('create').disabled=0;
document.getElementById('weeks').innerHTML=""; document.getElementById('nextWeeks').innerHTML="";}
function assignCancel() { document.getElementById('assign').innerHTML=""; document.getElementById('nextWeeks').innerHTML="";}
function btover(obj,cname){ obj.className=cname; }
</script>
</head>
<body>
<?php
print "<table align=center cellspacing=1 cellpadding=0><caption><h3>Time Table</caption>
<tr class=\"label\"><td>Time Table Name</td>
<td><select class=\"select\" name=\"ttname\" id=\"ttname\" onChange=\"return xajax_getCourse(this.value);\">
<option value=\"none\">select</option>";
$rs=mysql_query("SELECT distinct(TimeTableName) FROM timetablesettings order by TimeTableName",$con);
while($res=mysql_fetch_array($rs)){
$name=$res["TimeTableName"];
$settingsid=$res["SettingsId"];
$CourseId=$res["CourseId"];
echo"<option value=\"$name\">$name</option>"; }
print "</select></td>
<td>Course Code</td><td><select class=\"select\" name=\"ccode\" id=\"ccode\" onChange=\"return xajax_getSection(this.value,document.getElementById('intake').value);\">
<option value=\"none\">select</option></select></td>
<td>Intake</td><td><input class=\"input\" type=\"text\" value=\"\" readonly name=\"intake\" id=\"intake\"></td>
<td>Section</td><td><select class=\"select\" name=\"section\" id=\"section\">
<option value=\"none\">select</option></select></td>
<td width=130px align=center><input class=\"buttonstatic\" type=\"button\" value=\"Create\" id=\"create\"
onClick=\"return xajax_setWeektable(document.getElementById('ttname').value,document.getElementById('ccode').value,
document.getElementById('intake').value,document.getElementById('section').value);\"
onmouseover=\"btover(this,'buttonover');\" onmouseout=\"btover(this,'buttonstatic');\"></td></tr>
</table><br><div id=\"weeks\"></div><br><div id=\"assign\"></div><br><div id=\"nextWeeks\"></div>";
?>
</body>
</html>
