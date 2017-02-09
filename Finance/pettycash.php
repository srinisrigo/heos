<?php include "../AJAX/finance.php"; include "../DataBase/dbconnection.php"; ?>
<html>
<head>
  <title>Petty Cash</title>
<script type="text/javascript" src="../Scripts/datetimepicker.js"></script>
<script type="text/javascript" src="../Scripts/finance.js"></script>
<link rel="stylesheet" href="../Style/heoscss.css">
<script language="javascript">
function addOption(selectId, txt, val){ var objOption = new Option(txt,val);
document.getElementById(selectId).options.add(objOption); }
function resetFun() { window.location="pettycash.php"; }
function btover(obj,cname){ obj.className=cname; }
</script>
<?php $xajax->printJavascript(); ?>
</head>

<body>

<?php
print "<form action=\"pettycash.php\" method=\"POST\">
<table id=\"petty\" cellspacing=1 cellpadding=0 border=0>
<tr><td>Person ID</td><td><select class=\"select\" size=\"1\" name=\"pcid\" id=\"pcid\" onchange=\"xajax_setpersionname(document.getElementById('pcid').value);\"><option value=\"Select\">Select</option>";
$selectaccnumber=("select distinct(personid) from persondetails order by personid");
$result=mysql_query($selectaccnumber,$con);
while($a=mysql_fetch_array($result))
{
        $persionid=$a["personid"];
        print"<option value=\"$persionid\">$persionid</option>";
}
print "</select><tr><td>Person Name</td><td><input type=\"text\" name=\"pcname\" id=\"pcname\" readonly></td></tr>
<tr><td>Amount</td><td><input type=\"text\" name=\"pcamount\" id=\"pcamount\" value=0 onchange=\"xajax_pettycashDropAmount(this.value);\" onKeyPress=\"return keyRestrict(event,'.1234567890')\"></td></tr>
<tr><td>Date</td><td><input class=\"date\" type=\"text\" name=\"date\" readonly id=\"date\" size=13>
<a href=\"javascript:NewCal('date','ddmmmyyyy')\"><img src=\"../Images/cal.gif\" alt=\"Pick a date\" width=\"16\" height=\"16\" border=\"0\"></a></td></tr>
<tr><td>Previous Balance</td><td><input type=\"text\" name=\"pcprebalance\" id=\"pcprebalance\" value=0 onchange=\"pettycashDropAmount();\" onKeyPress=\"return keyRestrict(event,'.1234567890')\"></td></tr>
<tr><td>Drop Amount</td><td><input type=\"text\" name=\"pcdraw\" id=\"pcdraw\" value=0 readonly></td></tr>
<tr><td>Account Number</td><td><select class=\"select\" size=\"1\" name=\"accountnumbercombo\" id=\"accountnumbercombo\" onchange=\"xajax_setbankdetails(document.getElementById('accountnumbercombo').value);\"><option value=\"Select\">Select</option>";
print "</select></td></tr>
<tr><td>Bank Name</td><td><input type=\"text\" name=\"bankname\" readonly id=\"bankname\"></td></tr>
<tr><td>Branch</td><td><input type=\"text\" name=\"branch\" readonly id=\"branch\"></td></tr>
<tr><td colspan=2 align=\"center\"><input class=\"buttonstatic\" type=\"reset\" value=\"Cancel\" onClick=\"resetFun();\" >&nbsp;&nbsp;&nbsp;<input class=\"buttonstatic\" type=\"submit\" name=\"petty\" id=\"petty\" value=\"Drop\" onClick=\"return pettycashValidation();\" ></td></tr></table></form>\n";
?>

</body>

</html>

<?php
if(isset($_POST['petty']))
{
$f2=$_POST['pcid'];
$f3=$_POST['pcname'];
$f4=$_POST['accountnumbercombo'];
$f5=$_POST['pcdraw'];
$f6=date('Y-m-d',strtotime($_POST['date']));
$f7=$_POST['pcprebalance'];

$exec=mysql_query("select * from balance where accountnumber='$f4'",$con);
while($a=mysql_fetch_array($exec)){
$balance=$a["balance"]; $date=$a["curdate"];
$total=$a["total"]; $tablename=$a["tablename"]; }

if($f5<$balance)
{
$expetty=mysql_query("insert into pettycash values('0','$f2','$f3','$f4','$f5','$f6','$f7')",$con);
$prebalance=$balance;
$curbalance=$balance-$f5;
$curtotal=$total-$f5;
$exbalance=mysql_query("update balance set balance='$curbalance',curdate='$f6',lastbalance='$prebalance',lastdate='$date',total='$curtotal' where accountnumber='$f4'",$con);
$query="insert into ".$tablename." values('0','Dr','Pettycash','$f6','$f5','$curbalance')";
$exrandom=mysql_query($query,$con);
}
else echo "<script langauge=\"javascript\">alert('Low balance,choose another account...')</script>";
if($expetty&&$exbalance&&$exrandom) echo "<script langauge=\"javascript\">alert('Successfully Done...')</script>";
else { $roll=mysql_query("rollback to pettycash",$conn); echo "<script langauge=\"javascript\">alert('Successfully Done...')</script>"; }
}

?>
