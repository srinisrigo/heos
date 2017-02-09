<?php include "../AJAX/finance.php"; include "../DataBase/dbconnection.php"; ?>
<html>
<head>
<?php $xajax->printJavascript(); ?>
<title>Deposit</title>
<script type="text/javascript" src="../Scripts/datetimepicker.js"></script>
<script type="text/javascript" src="../Scripts/finance.js"></script>
<link rel="stylesheet" href="../Style/heoscss.css">
<script language="javascript">
function depositdepositmode(){
var i=0;
var sel=document.getElementById('depositmode');
var tobj=document.getElementById('deposit').rows;
if(sel.selectedIndex==0){
for(i=7;i<tobj.length-1;i++) tobj[i].style.display="none";
tobj[9].style.display="";
tobj[12].style.display="";
document.getElementById('cknumber').value='';
document.getElementById('ddnumber').value=''; }
if(sel.selectedIndex==1) {
for(i=7;i<tobj.length-1;i++) tobj[i].style.display="none";
tobj[7].style.display="";
tobj[9].style.display="";
tobj[12].style.display="";
document.getElementById('ddnumber').value=''; }
if(sel.selectedIndex==2) { for(i=8;i<tobj.length-1;i++) tobj[i].style.display="";
tobj[7].style.display="none";
document.getElementById('cknumber').value=''; }
}
function resetFun() {
window.location="deposit.php";
}
function btover(obj,cname){ obj.className=cname; }
</script>
</head>

<body onload="depositdepositmode();">
<?php
print "<form action=\"deposit.php\" method=post>
<table id=\"deposit\" cellspacing=1 cellpadding=0 border=0>
<tr><td>Deposit Amount</td><td><input name=\"damount\" id=\"damount\" value=\"\" size=\"15\" maxlength=\"13\" onKeyPress=\"return keyRestrict(event,'1234567890.')\" text-align:left></td></tr>
<tr><td>Account Number</td>
<td><select name=\"accountnumbercombo\" id=\"accountnumbercombo\" onchange=\"xajax_setbankdetails(document.getElementById('accountnumbercombo').value);\">
<option value=\"Select\">Select</option>";
$result=mysql_query("select distinct(accountnumber) from bankdetails order by accountnumber",$con);
while($a=mysql_fetch_array($result)){ $accountnumber=$a["accountnumber"]; print"<option value=\"$accountnumber\">$accountnumber</option>"; }
print "</select></td></tr>
<tr><td>Bank Name</td><td><input type=\"text\" name=\"bankname\" readonly id=\"bankname\"></td></tr>
<tr><td>Branch</td><td><input type=\"text\" name=\"branch\" readonly id=\"branch\"></td></tr>
<tr><td>Deposited By</td><td><textarea name=\"by\" id=\"by\"></textarea></td></tr>
<tr><td>Reference</td><td><textarea name=\"ref\" id=\"ref\" maxlength=\"120\" onKeypress=\"return depositTextArea();\"></textarea></td></tr>
<tr><td>Deposit Mode</td><td><select name=\"depositmode\" id=\"depositmode\" onChange=\"depositdepositmode();\"><option seleted value=\"Cash\">Cash</option>
<option value=\"Cheque\">Cheque</option><option value=\"DD\">DemandDraft</option></select></td></tr>
<tr><td>Cheque Number</td><td><input type=\"text\" name=\"cknumber\" id=\"cknumber\" value=\"\" onKeyPress=\"return keyRestrict(event,'1234567890')\"></td></tr>
<tr><td>DD Number</td><td><input type=\"text\" name=\"ddnumber\" id=\"ddnumber\" value=\"\" onKeyPress=\"return keyRestrict(event,'1234567890')\"></td></tr>
<tr><td>Date</td><td><input class=\"date\" type=\"text\" name=\"dddate\" readonly id=\"dddate\" size=13>
<a href=\"javascript:NewCal('dddate','ddmmmyyyy')\"><img src=\"../Images/cal.gif\" alt=\"Pick a date\" width=\"16\" height=\"16\" border=\"0\"></a></td></tr>
<tr><td>Bank Name</td><td><input type=\"text\" name=\"ddbankname\" id=\"ddbankname\" onKeyPress=\"return keyRestrict(event,'abcdefghijklmnopqrstuvwxyz 1234567890.')\"></td></tr>
<tr><td>DD Branch</td><td><input type=\"text\" name=\"ddbranch\" id=\"ddbranch\" onKeyPress=\"return keyRestrict(event,'abcdefghijklmnopqrstuvwxyz 1234567890.')\"></td></tr>
<tr><td>From</td><td><input type=\"text\" name=\"to\" id=\"to\"></td></tr>
<tr><td colspan=2 align=\"center\"><input class=\"buttonstatic\" type=\"reset\" value=\"Cancel\" onClick=\"resetFun();\" >&nbsp;&nbsp;&nbsp;<input class=\"buttonstatic\" type=\"submit\" name=\"add\" value=\"Deposit\" onClick=\"return depositValidation();\" ></td></tr>
</table></form>\n";
?>
<?php
if(isset($_POST['add'])){

$f2=trim($_POST['damount']);
$f3=trim($_POST['accountnumbercombo']);
$f4=trim($_POST['by']);
$f5=trim($_POST['ref']);
$f6=trim($_POST['depositmode']);
if(trim($_POST['depositmode'])=="Cheque") $f7=trim($_POST['cknumber']);
else $f7=trim($_POST['ddnumber']);
$f8=date('Y-m-d',strtotime($_POST['dddate']));
$f9=trim($_POST['ddbankname']);
$f10=trim($_POST['ddbranch']);
$f11=trim($_POST['to']);

$exec1=mysql_query("insert into deposit values('0','$f2','$f3','$f4','$f5','$f6','$f7','$f8','$f9','$f10','$f11')",$con);
if($f6=='Cash'){
$exec2=mysql_query("select * from balance where accountnumber='$f3'",$con);
if($exec2){
while($a=mysql_fetch_array($exec2)){
$curamount=$a["balance"];
$fromdate=$a["curdate"];
$tablename=$a["tablename"];
$total=$a["total"]; }
$preamount=$curamount; $curamount=$curamount+$f2;
$curtotal=$total+$f2;
$update1="update balance set balance=$curamount,lastbalance=$preamount,curdate='$f8',lastdate='$fromdate',total='$curtotal' where accountnumber='$f3'";
$exec3=mysql_query($update1,$con);
$q="insert into ".$tablename." values('0','Cr','Deposit','$f8','$f2','$curamount')";
$randomrecord=mysql_query($q,$con);
}
if($exec1&&$exec3&&$randomrecord) echo "<script type=\"text/javascript\">alert(\"Deposited successively...\");</script>";
else {
echo "<script type=\"text/javascript\">alert(\"Deposit Failed\");</script>";
$spoint=mysql_query("rollback",$con);
}
}
else {
$exec=mysql_query("insert into paymentdetails values('0','$f2','$f3','Deposit','$f6','$f7','$f8','$f9','$f10','$f11','no')",$con);
if($exec==0) $spoint=mysql_query("rollback",$con); }
}
/*
$curamount=mysql_result($exec2,"balance"); $preamount=$curamount;
$fromdate=mysql_result($exec2,"curdate");
$tablename=mysql_result($exec2,"tablename");
$total=mysql_result($exec2,"total");
*/
?>
</body>
</html>

