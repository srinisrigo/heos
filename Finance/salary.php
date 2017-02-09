<?php include "../AJAX/finance.php"; include "../DataBase/dbconnection.php"; ?>
<html>
<head>
<script type="text/javascript" src="../Scripts/datetimepicker.js"></script>
<script type="text/javascript" src="../Scripts/finance.js"></script>
<link rel="stylesheet" href="../Style/heoscss.css">
<?php $xajax->printJavascript(); ?>
<title>Salary</title>
<script language="javascript">
function modeofpay() {
var coll=document.getElementById('salary').rows;
var sel=document.getElementById('mode');
if(sel.selectedIndex==0) {
coll[6].style.display="none"; coll[7].style.display="none";
coll[9].style.display="none"; coll[10].style.display="none";
document.getElementById('cnumber').value='';
document.getElementById('dnumber').value=''; }
if(sel.selectedIndex==1) { coll[9].style.display="none"; coll[6].style.display="";
coll[10].style.display="none"; coll[7].style.display="none"; document.getElementById('cnumber').value=''; }
if(sel.selectedIndex==2) { coll[6].style.display="none"; coll[7].style.display="";
coll[9].style.display=""; coll[10].style.display=""; document.getElementById('dnumber').value='';}
}

function loadFun() {
var coll=document.getElementById('salary').rows;
var sel=document.getElementById('mode');
if(sel.selectedIndex==0) {
coll[6].style.display="none"; coll[7].style.display="none";
coll[9].style.display="none"; coll[10].style.display="none"; }
}
function addOption(selectId, txt, val)
{
var objOption = new Option(txt,val);
document.getElementById(selectId).options.add(objOption);
}
function setTo(month){ document.getElementById('to').value=month; }
function btover(obj,cname){ obj.className=cname; }
</script>
</head>

<body onload="loadFun();">
<?php
print "<form action=\"salary.php\" method=\"POST\">
<table id=\"salary\" cellspacing=1 cellpadding=0 border=0>
<tr class=\"label\"><td>Salary Month</td><td><input class=\"input\" type=\"text\" name=\"month\" id=\"month\" onKeyPress=\"return keyRestrict(event,'abcdefghijklmnopqrstuvwxyz 1234567890-')\" onChange=\"setTo(this.value);\"></td></tr>
<tr class=\"label\"><td>Salary Total</td><td><input class=\"input\" type=\"text\" name=\"amount\" id=\"amount\" onchange=\"xajax_setaccountnumbers(this.value);\" onKeyPress=\"return keyRestrict(event,'.1234567890')\"></td></tr>
<tr class=\"label\"><td>Account Number</td><td><select class=\"select\" size=\"1\" name=\"accountnumbercombo\" id=\"accountnumbercombo\" onchange=\"xajax_setbankdetails(document.getElementById('accountnumbercombo').value);\"><option value=\"Select\">Select</option>";
print "</select></td></tr>
<tr class=\"label\"><td>Bank Name</td><td><input class=\"input\" type=\"text\" name=\"bankname\" readonly id=\"bankname\"></td></tr>
<tr class=\"label\"><td>Branch</td><td><input class=\"input\" type=\"text\" name=\"branch\" readonly id=\"branch\"></td></tr>
<tr class=\"label\"><td>Mode of Pay</td><td><select class=\"select\" name=\"mode\" id=\"mode\" onChange=\"modeofpay()\"><option selected value=\"Cash\">Cash</option><option value=\"Cheque\">Cheque</option><option value=\"DD\">Demand Draft</option></select></td></tr>
<tr class=\"label\"><td>Cheque Number</td><td><input class=\"input\" type=\"text\" name=\"cnumber\" id=\"cnumber\" onKeyPress=\"return keyRestrict(event,'.1234567890')\"></td></tr>
<tr class=\"label\"><td>DD Number</td><td><input class=\"input\" type=\"text\" name=\"dnumber\" id=\"dnumber\" onKeyPress=\"return keyRestrict(event,'.1234567890')\"></td></tr>
<tr class=\"label\"><td>Date</td>
<td><input class=\"date\" type=\"text\" name=\"date\" readonly id=\"date\" size=9>
<a href=\"javascript:NewCal('date','yyyymmdd')\"><img src=\"../Images/cal.gif\" alt=\"Pick a date\" width=\"16\" height=\"16\" border=\"0\"></a></td></tr>
<tr class=\"label\"><td>Bank Name</td><td><input class=\"input\" type=\"text\" name=\"dbankname\" id=\"dbankname\"></td></tr>
<tr class=\"label\"><td>Branch</td><td><input class=\"input\" type=\"text\" name=\"dbranch\" id=\"dbranch\"></td></tr>
<tr class=\"label\"><td>To whom/Reference</td><td><input class=\"input\" type=\"text\" name=\"to\" id=\"to\"></td></tr>
<tr class=\"label\"><td colspan=2 align=\"center\">
<input class=\"buttonstatic\" type=\"reset\" value=\"Reset\" >
<input class=\"buttonstatic\" type=\"submit\" name=\"Salary\" id=\"Salary\" value=\"Salary\" onClick=\"return salaryValidation();\" ></td></tr></table></form>\n";
?>
</body>
</html>
<?php

if(isset($_POST['Salary'])){
$f2=trim($_POST['month']);
$f3=trim($_POST['accountnumbercombo']);
$f4=trim($_POST['amount']);
$f5=trim($_POST['mode']);
if($f5=="cheque") $f6=trim($_POST['cnumber']);
else if($f5=="DD") $f6=trim($_POST['dnumber']);
else $f6="0";
$f7=trim($_POST['dbankname']);
$f8=trim($_POST['dbranch']);
$f9=trim($_POST['date']);
$f10=trim($_POST['to']);

$exec1=mysql_query("select * from balance where accountnumber='$f3'",$con);
while($a=mysql_fetch_array($exec1)){
$balance=$a["balance"];
$date=$a["curdate"];
$tablename=$a["tablename"];
$total=$a["total"];
}
if($balance>=$f4){
if($f5=="Cash") {
$exsalary=mysql_query("insert into salary values('0','$f2','$f3','$f4','$f5','$f6','$f7','$f8','$f9','$f10')",$con);
$prebalance=$balance; $predate=$date;
$curbalance=$balance-$f4;
$curtotal=$total-$f4;
$exbalance=mysql_query("update balance set balance='$curbalance',curdate='$f9',lastbalance='$prebalance',lastdate='$predate',total='$curtotal' where accountnumber='$f3'",$con);
$rquery="insert into ".$tablename." values('0','Dr','$f2','$f9',$f4,$curbalance)";
$rtable=mysql_query($rquery,$con);
if($exsalary&&$exbalance&&$rtable) echo "<script type=\"text/javascript\">alert(\"Successive done...\");</script>";
else echo "<script type=\"text/javascript\">alert(\"Failed\");</script>";
}
else {
$exsalary=mysql_query($con,"insert into salary values('0','$f2','$f3','$f4','$f5','$f6','$f7','$f8','$f9','$f10')");
$prebalance=$balance; $predate=$date;
$curbalance=$balance-$f4;
$exbalance=mysql_query("update balance set balance='$curbalance',curdate='$f9',lastbalance='$prebalance',lastdate='$predate' where accountnumber='$f3'",$con);
$pay=mysql_query("insert into paymentdetails values('0','$f4','$f3','Salary','$f5','$f6','$f7','$f8','$f9','$f10','no')",$con);
if($exsalary&&$exbalance&&$pay) echo "<script type=\"text/javascript\">alert(\"Successive done...\");</script>";
else echo "<script type=\"text/javascript\">alert(\"Failed\");</script>";
}
}
else echo "<script type=\"text/javascript\">alert(\"Low balance...\nAvailable in this account $f4\");</script>";
}
?>
