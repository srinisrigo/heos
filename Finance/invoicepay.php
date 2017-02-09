<?php session_start(); ?>
<?php include "../AJAX/finance.php"; include "../DataBase/dbconnection.php"; ?>
<html>

<head>
<title>Pendings</title>
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

function pendingMode(){
var obj=document.getElementById('paymode').rows;
var sel=document.getElementById('pendingmode'); var i;
if(sel.selectedIndex==0) for(i=4;i<8;i++) obj[i].style.display='none';
if(sel.selectedIndex==1){ for(i=5;i<8;i++) obj[i].style.display='none'; obj[4].style.display=''; }
if(sel.selectedIndex==2){ for(i=4;i<8;i++) obj[i].style.display=''; obj[4].style.display='none'; }
}

function pendingonLoad(){
var obj=document.getElementById('paymode').rows;
for(var i=0;i<obj.length;i++) obj[i].style.display='none';
}
function btover(obj,cname){ obj.className=cname; }
</script>
</head>
<body onLoad="return pendingonLoad();">
<?php
$con=mysql_connect('192.168.15.24','root','admin'); $db=mysql_select_db('heos');
print "<form action=\"invoicepay.php\" method=\"POST\">
<table cellspacing=1 cellpadding=0 border=0>
<tr><td>S.no</td><td>Invoice Number</td><td>Customer Name</td><td>Bill Amount</td>
<td>Bill Date</td><td>Paid Amount</td><td>Pay Date</td><td>Pay</td></tr>";
$selected=mysql_query("select * from purchase where paidamount<billamount",$con);
$sno=1;
while($a=mysql_fetch_array($selected))
{
$recordid=$a["recordid"];
$invoicenumber=$a["invoicenumber"];
$customerid=$a["customerid"];
$billamount=$a["billamount"];
$billdate=$a["billdate"];
$paidamount=$a["paidamount"];
$paydate=$a["paydate"];
$sysdate=date('Y-m-d');
$query=mysql_query("select to_days('$sysdate')-to_days('$paydate') as day",$con);
$days=mysql_result($query,0);
if($days>=0 && $paydate!='0000-00-00')
echo "<tr><td>$sno</td><td>$invoicenumber</td><td>$customerid</td>
<td>$billamount</td><td>$billdate</td><td>$paidamount</td><td>$paydate</td>
<td><input type=\"radio\" name=\"Check\" value=\"$recordid\" onClick=\"return xajax_checkFunc(this.value);\"></td></tr>";
$sno++;
}

print "</table><br>
<table id=\"paymode\" cellspacing=1 cellpadding=0 border=0>
<tr><td>Paying Amount</td><td><input type=\"text\" value=\"\" name=\"payingamount\" id=\"payingamount\" onKeyPress=\"return keyRestrict(event,'1234567890.')\" onChange=\"xajax_setinvoiceaccountnumbers(this.value);\"></td></tr>
<tr><td>Next Pay Date</td><td><input type=\"text\" name=\"nextpaydate\" readonly id=\"nextpaydate\" size=13>
<a href=\"javascript:NewCal('nextpaydate','ddmmmyyyy')\"><img src=\"../Images/cal.gif\" alt=\"Pick a date\" width=\"16\" height=\"16\" border=\"0\" id=\"cal\"></a></td></tr>
<tr><td>Account Number</td><td><select size=\"1\" name=\"accountnumbercombo\" id=\"accountnumbercombo\" ><option value=\"Select\">Select</option>
<tr><td>Mode of Pay</td><td><select name=\"pendingmode\" id=\"pendingmode\" onChange=\"pendingMode();\"><option selected value=\"Cash\">Cash</option><option value=\"Cheque\">Cheque</option><option value=\"DD\">Demand Draft</option></select></td></tr>
<tr><td>Cheque Number</td><td><input type=\"text\" name=\"cnumber\" id=\"cnumber\" value=\"\" onKeyPress=\"return keyRestrict(event,'1234567890')\"></td></tr>
<tr><td>DD Number</td><td><input type=\"text\" name=\"dnumber\" id=\"dnumber\" value=\"\" onKeyPress=\"return keyRestrict(event,'1234567890')\"></td></tr>
<tr><td>Bank Name</td><td><input type=\"text\" name=\"dbankname\" id=\"dbankname\"></td></tr>
<tr><td>Branch</td><td><input type=\"text\" name=\"dbranch\" id=\"dbranch\"></td></tr>
<tr><td>Date</td><td><input type=\"text\" name=\"date\" readonly id=\"date\" size=13>
<a href=\"javascript:NewCal('date','ddmmmyyyy')\"><img src=\"../Images/cal.gif\" alt=\"Pick a date\" width=\"16\" height=\"16\" border=\"0\" id=\"cal\"></a></td></tr>
<tr><td>To</td><td><input type=\"text\" name=\"ddto\" id=\"ddto\" value=\"\"></td></tr>
<tr><td colspan=2 align=\"center\"><input class=\"buttonstatic\" type=\"reset\" id=\"ddto\" value=\"Cancel\" onClick=\"pendingonLoad();\" >
<input class=\"buttonstatic\" type=\"submit\" id=\"pending\" name=\"pending\" value=\"Pay this\" onClick=\"return invoicepayValidation();\" ></td></tr>
</table></form>";
?>


</body>

</html>


<?php
if(isset($_POST['pending']))
{

$payingamount=$_POST['payingamount'];
$nextpaydate=date('Y-m-d',strtotime($_POST['nextpaydate']));
$accountnumbercombo=$_POST['accountnumbercombo'];
$pendingmode=$_POST['pendingmode'];
$cnumber=$_POST['cnumber'];
$dnumber=$_POST['dnumber'];
$dbankname=$_POST['dbankname'];
$dbranch=$_POST['dbranch'];
$date=date('Y-m-d',strtotime($_POST['date']));
$ddto=$_POST['ddto'];


$recordid=$_SESSION['recordid'];
$bank=mysql_query("select * from balance where accountnumber='$accountnumbercombo'",$con);
while($rset=mysql_fetch_array($bank)){
$balance=$rset['balance'];
$total=$rset['total'];
$curdate=$rset['curdate'];
$tablename=$rset['tablename'];
}
$pur=mysql_query("select * from purchase where recordid='$recordid'",$con);
while($rs=mysql_fetch_array($pur)){
$paidamount=$rs['paidamount'];
$billamount=$rs['billamount'];
$customername=$rs['customername'];
}
$curbalance=$balance-$payingamount;
$curtotal=$total-$payingamount;
$piadset=$paidamount+$payingamount;
if($pendingmode=="Cash"){
$balanceup=mysql_query("update balance set total='$curtotal',balance='$curbalance',lastbalance='$balance',lastdate='$curdate',curdate='$date' where accountnumber='$accountnumbercombo'",$con);
$ranquery="insert into ".$tablename." values('0','Dr','$customername','$date','$payingamount','$curbalance')";
$rndomup=mysql_query($ranquery,$con);
if($billamount>=$piadset) $purcahseup=mysql_query("update purchase set paidamount='$piadset',paydate='$nextpaydate' where recordid='$recordid'",$con);
if($balanceup&&$rndomup&&$purcahseup) echo"<script type=\"text/javascript\">alert('Success...');</script>";
}
else{
$balanceup=mysql_query("update balance set balance='$curbalance',lastbalance='$balance',lastdate='$curdate',curdate='$date' where accountnumber='$accountnumbercombo'",$con);
if($billamount>=$piadset) $purcahseup=mysql_query("update purchase set paidamount='$piadset',paydate='$nextpaydate' where recordid='$recordid'",$con);
if($pendingmode=="DD") $cdnumber=$dnumber; else $cdnumber=$cnumber;
$payment=mysql_query("insert into paymentdetails values('0','$payingamount','$accountnumbercombo','Pendings','$pendingmode','$cdnumber','$date','$dbankname','$dbranch','$ddto','no')",$con);
if($balanceup&&$purcahseup&&$payment) echo"<script type=\"text/javascript\">alert('Success...');</script>";
}

echo"<script type=\"text/javascript\">window.location='invoicepay.php';</script>";

}
?>

