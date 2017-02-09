<?php include "../AJAX/finance.php"; include "../DataBase/dbconnection.php"; ?>
<html>
<head>
<title>Refund</title>
<?php $xajax->printJavascript(); ?>
<script type="text/javascript" src="../Scripts/datetimepicker.js"></script>
<script type="text/javascript" src="../Scripts/finance.js"></script>
<link rel="stylesheet" href="../Style/heoscss.css">
<script language="javascript">

function addOption(selectId, txt, val)
{
var objOption = new Option(txt,val);
document.getElementById(selectId).options.add(objOption);
}

function loadFun() {
var coll=document.getElementById('refundtable').rows;
var sel=document.getElementById('refundmode');
if(sel.selectedIndex==0){ for(i=10;i<=14;i++) coll[i].style.display="none"; coll[12].style.display=""; }
}
function resetFun(){ window.location="refund.php"; }

function refundModeofpay() {
var coll=document.getElementById('refundtable').rows;
var sel=document.getElementById('refundmode'); var i;
if(sel.selectedIndex==0){ for(i=10;i<=14;i++) coll[i].style.display="none"; coll[12].style.display=""; }
if(sel.selectedIndex==1)  { for(i=10;i<=14;i++) coll[i].style.display="none"; coll[10].style.display=""; coll[12].style.display="";
document.getElementById('dnumber').value=''; }
if(sel.selectedIndex==2) { for(i=11;i<=14;i++) coll[i].style.display=""; coll[10].style.display="none";
document.getElementById('cnumber').value=''; }
}

function refundCheck(){
var refund=parseInt(document.getElementById('refundamount').value);
var paid=parseInt(document.getElementById('paidamount').value);
if(refund>paid)
{
document.getElementById('refundamount').value='';
alert('Refund amount is higher than paid amount');
}
}

function btover(obj,cname){ obj.className=cname; }

</script>
</head>

<body onLoad="loadFun();">
<?php
print "<form action=\"refund.php\" method=\"POST\" name=\"Refund\">
<table id=\"refundtable\" cellspacing=1 cellpadding=0 border=0>
<tr class=\"label\"><td>Intake</td><td><select class=\"select\" size=\"1\" name=\"batchcombo\" id=\"batchcombo\" onchange=\"return xajax_setcourse(this.value);\"><option value=\"Select\">Select</option>";
$result=mysql_query("select distinct(intake) from student",$con);
while($a=mysql_fetch_array($result)) { $batchname=$a["intake"]; print"<option value=\"$batchname\">$batchname</option>"; }
print "</select></td></tr>
<tr class=\"label\"><td>Course</td><td><select class=\"select\" size=\"1\" name=\"coursecombo\" id=\"coursecombo\" onChange=\"return xajax_setstudentid(document.getElementById('batchcombo').value,this.value);\"><option value=\"Select\">Select</option></select></td></tr>
<tr class=\"label\"><td>Student Id</td><td><select class=\"select\" size=\"1\" name=\"studentcombo\" id=\"studentcombo\" onchange=\"xajax_setagentid(document.getElementById('batchcombo').value,document.getElementById('coursecombo').value,this.value);\"><option value=\"Select\">Select</option></select></td></tr>
<tr class=\"label\"><td>Agent Id</td><td><input class=\"input\" type=\"text\" name=\"agent\" id=\"agent\" readonly></td></tr>
<tr class=\"label\"><td>Student paid Amount</td><td><input class=\"input\" type=\"text\" name=\"paidamount\" id=\"paidamount\" readonly></td></tr>
<tr class=\"label\"><td>Amount to be Refund</td><td><input class=\"input\" type=\"text\" name=\"refundamount\" id=\"refundamount\" onchange=\"xajax_setaccountnumbersinrefund(this.value,document.getElementById('paidamount').value);\" onKeyPress=\"return keyRestrict(event,'.1234567890')\"></td></tr>
<tr class=\"label\"><td>Account Number</td><td><select class=\"select\" size=\"1\" name=\"accountnumbercombo\" id=\"accountnumbercombo\" onchange=\"xajax_setbankdetails(document.getElementById('accountnumbercombo').value);\"><option value=\"Select\">Select</option>
</select></td></tr>
<tr class=\"label\"><td>Bank Name</td><td><input class=\"input\" type=\"text\" name=\"bankname\" readonly id=\"bankname\"></td></tr>
<tr class=\"label\"><td>Branch</td><td><input class=\"input\" type=\"text\" name=\"branch\" readonly id=\"branch\"></td></tr>
<tr class=\"label\"><td>Mode of Pay</td><td><select class=\"select\" name=\"refundmode\" id=\"refundmode\" onChange=\"return refundModeofpay();\"><option selected value=\"Cash\">Cash</option><option value=\"Cheque\">Cheque</option><option value=\"DD\">Demand Draft</option></select></td></tr>
<tr class=\"label\"><td>Cheque Number</td><td><input class=\"input\" type=\"text\" name=\"cnumber\" id=\"cnumber\" value=\"\" onKeyPress=\"return keyRestrict(event,'1234567890')\"></td></tr>
<tr class=\"label\"><td>DD Number</td><td><input class=\"input\" type=\"text\" name=\"dnumber\" id=\"dnumber\" value=\"\" onKeyPress=\"return keyRestrict(event,'1234567890')\"></td></tr>
<tr class=\"label\"><td>Date</td><td><input class=\"date\" type=\"text\" name=\"dddate\" readonly id=\"dddate\" size=9>
<a href=\"javascript:NewCal('dddate','yyyymmdd')\"><img src=\"../Images/cal.gif\" alt=\"Pick a date\" width=\"16\" height=\"16\" border=\"0\"></a></td></tr>
<tr class=\"label\"><td>Bank Name</td><td><input class=\"input\" type=\"text\" name=\"dbankname\" id=\"dbankname\"></td></tr>
<tr class=\"label\"><td>Branch</td><td><input class=\"input\" type=\"text\" name=\"dbranch\" id=\"dbranch\"></td></tr>
<tr class=\"label\"><td>To</td><td><input class=\"input\" type=\"text\" name=\"to\" id=\"to\"></td></tr>
<tr class=\"label\"><td colspan=2 align=\"center\"><input class=\"buttonstatic\" type=\"reset\" value=\"Reset\" name=\"resetbutton\" onCLick=\"resetFun();\" >&nbsp;&nbsp;&nbsp;
<input class=\"buttonstatic\" type=\"submit\" value=\"Refund\" name=\"refundbutton\" onClick=\"return refundValidation();\" ></td></tr></table></form>\n";
?>
</body>

</html>


<?php

if(isset($_POST['resetbutton']))
{

}
if(isset($_POST['refundbutton']))
{
$f2=$_POST['studentcombo'];
$f3=$_POST['paidamount'];
$f4=$_POST['refundamount'];
$f5=$_POST['accountnumbercombo'];
$f6=$_POST['refundmode'];
if($f6=="Cash") $f7=0; if($f6=="Cheque") $f7=$_POST['cnumber']; if($f6=="DD") $f7=$_POST['dnumber'];
$f8=$_POST['dddate'];
$f9=$_POST['dbankname'];
$f10=$_POST['dbranch'];
$f11=$_POST['to'];

$query2="select * from balance where accountnumber='$f5'"; $exec2=mysql_query($query2,$con);
while($a=mysql_fetch_array($exec2)){
$balance=$a["balance"];
$curdate=$a["curdate"];
$tablename=$a["tablename"];
$total=$a["total"]; }

if($balance>=$f4){

$exec1=mysql_query("insert into refund values('0','$f2','$f3','$f4','$f5','$f6','$f7','$f8','$f9','$f10','$f11')",$con);
if($f6=="Cash"){
$prebalance=$balance; $curamount=$balance-$f4;  $rtotal=$total-$f4;
$exec3=mysql_query("update balance set balance='$curamount',curdate='$f8',lastbalance='$prebalance',lastdate='$curdate',total='$rtotal' where accountnumber='$f5'",$con);
$q="insert into ".$tablename." values('0','Dr','Refund','$f8','$f4','$curamount')";
$randomrecord=mysql_query($q,$con);
if($exec1&&$exec3) echo "<script langauge=\"javascript\">alert('Successfully Refunded')</script>";
}
else {
$prebalance=$balance; $curamount=$balance-$f4;
$query3="update balance set balance='$curamount',curdate='$f8',lastbalance='$prebalance',lastdate='$curdate' where accountnumber='$f5'";
$exec3=mysql_query($query3,$con);
$exq="insert into paymentdetails values('0','$f4','$f5','Refund','$f6','$f7','$f8','$f9','$f10','$f11','no')";
$exec4=mysql_query($exq,$con);
if($exec1&&$exec3&&$exec4) echo "<script langauge=\"javascript\">alert('Successfully Refunded')</script>";
}
}
else echo "<script langauge=\"javascript\">alert('low balance,\n Available in account $balance')</script>";
//if($f6=="Cash") echo "<script langauge=\"javascript\">window.location='payment.php';</script>";
}
?>
