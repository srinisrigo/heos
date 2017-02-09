<?php include "../DataBase/dbconnection.php"; ?>
<html>
<head><title>Balance</title>
<link rel="stylesheet" href="../Style/heoscss.css">
<script language="javascript">
function btover(obj,cname){ obj.className=cname; }
</script>
</head>
<body>
<?php
print "<table cellspacing=1 cellpadding=0 border=0>
<tr><th>S.No</th>
<th>Account Number</th>
<th>Account Name</th>
<th>Bank & Branch Name</th>
<th>Avaliable Balance</th>
<th>Total in account</th></tr>";

$result=mysql_query("select * from balance order by accountname",$con);
$sno=1;
while($a=mysql_fetch_array($result)){
$accountnumber=$a["accountnumber"];
$accountname=$a["accountname"];
$bb=mysql_query("select bankname,branchname from bankdetails where accountnumber='$accountnumber'",$con);
while($aa=mysql_fetch_array($bb)){ $bankname=$aa['bankname']; $branch=$aa['branchname']; }
$avoilablebalance=$a["balance"];
$totalbalance=$a["total"];
$curdate=$a["curdate"];
$lastdate=$a["lastdate"];
echo "<tr class=\"label\"><td>$sno</td><td>$accountnumber</td><td>$accountname</td><td>$bankname-$branch</td>
<td>$avoilablebalance</td><td>$totalbalance</td></tr>";
$sno++;
}
print "<tr class=\"label\"><td colspan=8 align=right><a href=\"bankdetails.php\">New Account</a></td></tr></table></form>";
?>
</body>

</html>
