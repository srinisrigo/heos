<?php session_start(); ?>
<?php include "../AJAX/finance.php"; include "../DataBase/dbconnection.php"; ?>
<html>
<head>
<title>Cheque/DD Pendings</title>
<script type="text/javascript" src="../Scripts/datetimepicker.js"></script>
<script type="text/javascript" src="../Scripts/finance.js"></script>
<link rel="stylesheet" href="../Style/heoscss.css">
<?php $xajax->printJavascript(); ?>
<script language="javascript">
function btover(obj,cname){ obj.className=cname; }
</script>
</head>
<body>
<?php

print "<form align=\"center\" method=\"POST\" action=\"pendings.php\">
<table cellspacing=1 cellpadding=0 border=0>
<tr class=\"balanceheaderrow\"><th>S.no</th><th align=\"left\">Reference</th><th align=\"right\">Cheque/DD Number</th><th>Date</th><th align=\"right\">Account Number</th><th align=\"left\">Paymode</th><th align=\"left\">Description</th><th align=\"right\">Amount</th><th>Pay</th></tr>";
$drop=mysql_query('DROP TABLE IF EXISTS heos.paythis',$con);
$create=mysql_query('CREATE TABLE `paythis` (`recordid` bigint(20) default NULL,`onoff` varchar(10) default NULL) ENGINE=MyISAM DEFAULT CHARSET=latin1',$con);
$payment=mysql_query("select * from paymentdetails where done='no'",$con); $sno=1;
while($a=mysql_fetch_array($payment)){
$recordid=$a['recordid'];
$amount=$a['amount'];
$accountnumber=$a['accountnumber'];
$description=$a['description'];
$paymode=$a['paymode'];
$cdnumber=$a['cdnumber'];
$cddate=$a['cddate'];
$bankname=$a['bankname'];
$branch=$a['branch'];
$towhom=$a['towhom'];
echo "<tr class=\"label\"><td>$sno</td><td align=\"left\">$towhom</td><td>$cdnumber</td><td>$cddate</td><td>$accountnumber</td><td align=\"left\">$paymode</td><td align=\"left\">$description</td><td align=\"right\">$amount</td>
<td><input type=\"checkbox\" name=\"checkbox[$recordid]\" onClick=\"xajax_ddchequeonoff(this.checked,$recordid);\"></td></tr>";
$insert=mysql_query("insert into paythis values('$recordid','off')",$con);
$sno++;
}
print "<tr class=\"label\"><td colspan=9 align=\"center\"><input class=\"buttonstatic\" type=\"reset\" value=\"Cancel\" >&nbsp;&nbsp;&nbsp;<input class=\"buttonstatic\" type=\"button\" name=\"paythis\" value=\"Pay This\" onClick=\"xajax_ddchequeclearance();\" ></td></tr></table>
</form>\n";
?>

</body>

</html>
