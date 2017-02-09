<?php include "../AJAX/finance.php"; include "../DataBase/dbconnection.php"; ?>
<html>
<head><title></title>
<script type="text/javascript" src="../Scripts/datetimepicker.js"></script>
<script type="text/javascript" src="../Scripts/finance.js"></script>
<?php $xajax->printJavascript(); ?>
<link rel="stylesheet" href="../Style/heoscss.css">
<script language="javascript">
function resetFun(){ window.location="purchase.php"; }
function btover(obj,cname){ obj.className=cname; }
function createRow(){
tobj=document.getElementById('dtable'); crobj=tobj.rows;
var row=crobj.length-3; robj=tobj.insertRow(row);  sno=row;
c1=robj.insertCell(0); c2=robj.insertCell(1); c3=robj.insertCell(2); c4=robj.insertCell(3);
c5=robj.insertCell(4); c6=robj.insertCell(5); c7=robj.insertCell(6);
arindex=crobj.length-5;
c1.innerHTML=sno;
c2.innerHTML="<input type=\"text\" name=\"productcode["+arindex+"]\" id=\"productcode["+arindex+"]\" size=7 onChange=\"xajax_setNominal(this.value,document.getElementById('productname["+arindex+"]').name,1);\">";
c3.innerHTML="<input type=\"text\" name=\"productname["+arindex+"]\" id=\"productname["+arindex+"]\" onChange=\"xajax_setNominal(this.value,document.getElementById('productname["+arindex+"]').name,1);\">";
c4.innerHTML="<input type=\"text\" name=\"quantity["+arindex+"]\" id=\"quantity["+arindex+"]\" size=4 value=0 onChange=\"setNetamount("+arindex+");\">";
c5.innerHTML="<input type=\"text\" name=\"unitprice["+arindex+"]\" id=\"unitprice["+arindex+"]\" size=7 value=0.00 onChange=\"setNetamount("+arindex+");\">";
c6.innerHTML="<input type=\"text\" name=\"netamount["+arindex+"]\" id=\"netamount["+arindex+"]\" size=9 readonly value=0.00>";
c7.innerHTML="<a href=\"javascript:createRow();\">Add</a>&nbsp;&nbsp;<a href=\"javascript:deleteRow();\">Delete</a>";
robj=document.getElementById('dtable').rows; prerow=row-1;
cobj=document.getElementById('dtable').rows[prerow].cells; cobj[6].innerHTML='';
}
function deleteRow(){ dtobj=document.getElementById('dtable').rows; drow=dtobj.length-4;
if(dtobj.length > 5){ document.getElementById('dtable').deleteRow(drow);
robj=document.getElementById('dtable').rows; prerow=drow-1;
cobj=document.getElementById('dtable').rows[prerow].cells;
cobj[6].innerHTML='<a href=\"javascript:createRow();\">Add</a>&nbsp;&nbsp;<a href=\"javascript:deleteRow();\">Delete</a>';
}
if(dtobj.length==5){
cobj=document.getElementById('dtable').rows[1].cells;
cobj[6].innerHTML='<a href=\"javascript:createRow();\">Add</a>';
}
}
function setNetamount(index){
st1="unitprice["+index+"]"; st2="quantity["+index+"]"; st3="netamount["+index+"]";
uobj=document.getElementById(st1); qobj=document.getElementById(st2); nobj=document.getElementById(st3);
document.getElementById(st3).value=(parseInt(qobj.value)*parseInt(uobj.value)).toFixed(2);
uobj.value=(parseInt(uobj.value)).toFixed(2);
setNettotal();
}
function setNettotal(){
tot=0;
tobj=document.getElementById('dtable').rows; le=tobj.length-5;
for(i=0;i<=le;i++){ st="netamount["+i+"]"; cobj=document.getElementById(st);
tot=parseFloat(tot)+parseFloat(cobj.value); }
vatobj=document.getElementById('vat');
transportobj=document.getElementById('transport');
vatobj.value=parseFloat(vatobj.value).toFixed(2);
transportobj.value=parseFloat(transportobj.value).toFixed(2);
tot=parseFloat(tot)+parseFloat(vatobj.value)+parseFloat(transportobj.value);
document.getElementById('totalamount').value=tot.toFixed(2);
}
function CrDrValid(){
if(document.getElementById('invoicenumber').value=="") return false;
if(document.getElementById('crdrnotecomb').selectedIndex==0) return false;
return true;
}

</script>
</head>

<body>

<?php
print "<form method=post>
<table border=0 cellspacing=1 cellpadding=0>
<tr><td>Invoice Number</td><td><input type=text name=\"invoicenumber\" id=\"invoicenumber\"></td>
<td>Invoice Notice</td><td><select name=\"crdrnotecomb\" id=\"crdrnotecomb\"><option value=\"none\">Select</option><option value=\"Cr\">Credit Note</option><option value=\"Dr\">Debit Note</option></select></td>
<td><input type=\"submit\" id=\"crdrnote\" name=\"crdrnote\" value=\"Submit\" class=\"buttonstatic\"  onclick=\"return CrDrValid();\"></td></tr></table>
<br><br><div name=\"invoicedetails\" id=\"invoicedetails\"></div></form>";

if(isset($_POST['crdrnote'])){
$invoice=$_POST['invoicenumber'];
$crdrnote=$_POST['crdrnotecomb'];

$con=mysql_connect('192.168.15.24','root','admin'); $db=mysql_select_db('heos');
$select=mysql_query("select * from invoicedetails where invoicenumber='$invoice'");
if(mysql_result($select,0)>0){
$select=mysql_query("select * from invoicedetails where invoicenumber='$invoice'");
while($ar=mysql_fetch_array($select)){  $recordid=$ar['recordid'];
$purchaseordernumber=$ar['purchaseordernumber']; $supplierid=$ar['supplierid'];
$suppliername=$ar['suppliername']; $billdate=$ar['billdate'];
$billamount=$ar['billamount']; $paydate=$ar['paydate'];
$netamount=$ar['netamount']; $VAT=$ar['VAT'];
$transport=$ar['transport']; $grandtotal=$ar['grandtotal'];
}
$billdate=date('d-M-Y',strtotime($billdate)); $paydate=date('d-M-Y',strtotime($paydate));
if($crdrnote=='Cr') $crdrnote='Credit Note'; if($crdrnote=='Dr') $crdrnote='Debit Note';
print "<form method=POST><input type=\"hidden\" name=\"recordid\" id=\"recordid\" value=\"$recordid\">
<table id=\"purchase\" cellspacing=1 cellpadding=0 border=0>
<tr><td>Invoice Number</td><td><input type=\"hidden\" name=\"invoicenumber\" id=\"invoicenumber\" value=\"$invoice\">$invoice</td>
<td>Purchase Order Number</td><td><input type=\"hidden\" name=\"purchasenumber\" id=\"purchasenumber\" value=\"$purchaseordernumber\">$purchaseordernumber</td></tr>
<tr><td>Supplier ID</td><td><input type=\"hidden\" name=\"supplierid\" id=\"supplierid\" value=\"$supplierid\">$supplierid</td>
<td>Supplier Name</td><td><input type=\"hidden\" name=\"suppliername\" id=\"suppliername\" value=\"$suppliername\">$suppliername</td></tr>
<tr><td>Bill Date</td><td><input type=\"hidden\" name=\"billdate\" readonly id=\"billdate\" value=\"$billdate\">$billdate</td>
<td>Bill Amount</td><td><input type=\"text\" name=\"billamount\" id=\"billamount\" value=\"$billamount\" onKeyPress=\"return keyRestrict(event,'1234567890.')\"></td></tr>
<tr><td>Pay Date</td><td><input type=\"hidden\" name=\"paydate\" readonly id=\"paydate\" value=\"$paydate\">$paydate</td><th colspan=2>$crdrnote</th></tr>
</table>
<br><table id=\"dtable\" border=0 cellpadding=0 cellspacing=1>
<tr><th>S.no</th><th>Nominal Code</th><th>Nominal Name</th><th>Quantity</th><th>Unit Price</th><th>Net Amount</th><th></th></tr>";
$cntselect=mysql_query("select count(*) from billdescription where tableid='$recordid'"); $total=mysql_result($cntselect,0);
$subselect=mysql_query("select * from billdescription where tableid='$recordid'"); $sno=1; $index=0;
while($arr=mysql_fetch_array($subselect)){  $nominalcode=$arr['nominalcode'];
$nominalname=$arr['nominalname']; $quantity=$arr['quantity'];
$unitprice=$arr['unitprice']; $netamount=$arr['netamount'];
if($sno<$total)
print "<tr><td>$sno</td>
<td><input type=\"text\" name=\"productcode[$index]\" id=\"productcode[$index]\" size=7 value=\"$nominalcode\" onChange=\"xajax_setNominal(this.value,document.getElementById('productname[$index]').name,1);\"></td>
<td><input type=\"text\" name=\"productname[$index]\" id=\"productname[$index]\" value=\"$nominalname\" onChange=\"xajax_setNominal(this.value,document.getElementById('productcode[$index]').name,2);\"></td>
<td><input type=\"text\" name=\"quantity[$index]\" id=\"quantity[$index]\" size=4 value=\"$quantity\" onchange=\"setNetamount($index);\" onKeyPress=\"return keyRestrict(event,'0123456789'+String.fromCharCode(241))\"></td>
<td><input type=\"text\" name=\"unitprice[$index]\" id=\"unitprice[$index]\" size=7 value=\"$unitprice\" onChange=\"setNetamount($index);\" onKeyPress=\"return keyRestrict(event,'0123456789.'+String.fromCharCode(241))\"></td>
<td><input type=\"text\" name=\"netamount[$index]\" id=\"netamount[$index]\" size=9 readonly value=\"$netamount\"></td>
<td></td></tr>";
else break;
$sno++; $index++; }
print "<tr><td>$sno</td>
<td><input type=\"text\" name=\"productcode[$index]\" id=\"productcode[$index]\" size=7 value=\"$nominalcode\" onChange=\"xajax_setNominal(this.value,document.getElementById('productname[$index]').name,1);\"></td>
<td><input type=\"text\" name=\"productname[$index]\" id=\"productname[$index]\" value=\"$nominalname\" onChange=\"xajax_setNominal(this.value,document.getElementById('productcode[$index]').name,2);\"></td>
<td><input type=\"text\" name=\"quantity[$index]\" id=\"quantity[$index]\" size=4 value=\"$quantity\" onchange=\"setNetamount($index);\" onKeyPress=\"return keyRestrict(event,'0123456789'+String.fromCharCode(241))\"></td>
<td><input type=\"text\" name=\"unitprice[$index]\" id=\"unitprice[$index]\" size=7 value=\"$unitprice\" onChange=\"setNetamount($index);\" onKeyPress=\"return keyRestrict(event,'0123456789.'+String.fromCharCode(241))\"></td>
<td><input type=\"text\" name=\"netamount[$index]\" id=\"netamount[$index]\" size=9 readonly value=\"$netamount\"></td>
<td><a href=\"javascript:createRow();\">Add</a>&nbsp;&nbsp;<a href=\"javascript:deleteRow();\">Delete</a></td></tr>";

print "<tr><td colspan=5 align=right>VAT ( 17.5% )</td><td><input type=\"text\" name=\"vat\" id=\"vat\" size=9 value=\"$VAT\" onChange=\"setNettotal();\" onKeyPress=\"return keyRestrict(event,'0123456789.'+String.fromCharCode(241))\"></td><td rowspan=3></td></tr>
<tr><td colspan=5 align=right>Transport</td><td><input type=\"text\" name=\"transport\" id=\"transport\" size=9 value=\"$transport\" onChange=\"setNettotal();\" onKeyPress=\"return keyRestrict(event,'0123456789.'+String.fromCharCode(241))\"></td></tr>
<tr><td colspan=5 align=right>Total Amount</td><td><input type=\"text\" name=\"totalamount\" id=\"totalamount\" size=9 value=\"$grandtotal\" readonly></td></tr>
</table>";
}

//$baselect=mysql_query("select count(*) from purchase where invoicenumber='$invoice' and billamount = paidamount"); if(mysql_result($baselect,0)>0){
print "<br><table border=0 cellspacing=1 cellpadding=0>
<tr><td>Account Number</td>
<td><select name=\"accountnumbercombo\" id=\"accountnumbercombo\" onchange=\"xajax_setbankdetails(document.getElementById('accountnumbercombo').value);\">
<option value=\"Select\">Select</option>";
$result=mysql_query("select distinct(accountnumber) from bankdetails order by accountnumber",$con);
while($a=mysql_fetch_array($result)){ $accountnumber=$a["accountnumber"]; print"<option value=\"$accountnumber\">$accountnumber</option>"; }
print "</select></td></tr>
<tr><td>Bank Name</td><td><input type=\"text\" name=\"bankname\" readonly id=\"bankname\"></td></tr>
<tr><td>Branch</td><td><input type=\"text\" name=\"branch\" readonly id=\"branch\"></td></tr>
</table>"; // }
print "<br><br><table cellspacing=0 cellpadding=0 border=0><tr><td><input type=\"submit\" id=\"invoice\" name=\"invoice\" value=\"$crdrnote\" class=\"buttonstatic\" ></td></tr></table></form>\n";
}

if(isset($_POST['invoice'])){

$con=mysql_connect('192.168.15.24','root','admin'); $db=mysql_select_db('heos');

$recordid=$_POST['recordid'];
$invoicenumber=$_POST['invoicenumber'];
$suppliername=$_POST['suppliername'];
$billamount=$_POST['billamount'];

$productcode=$_POST['productcode'];
$productname=$_POST['productname'];
$quantity=$_POST['quantity'];
$unitprice=$_POST['unitprice'];
$netamount=$_POST['netamount'];

$vat=$_POST['vat'];
$transport=$_POST['transport'];
$totalamount=$_POST['totalamount'];
$accountnumber=$_POST['accountnumbercombo'];
$nettot=0; foreach($netamount as $k=>$net) $nettot=$nettot+$net;

$prepaid=mysql_query("select count(*) from purchase where invoicenumber='$invoicenumber' and billamount=paidamount"); $prepaidF=mysql_result($prepaid,0);

$preselect=mysql_query("select billamount from invoicedetails where invoicenumber='$invoicenumber'"); $prebillamount=mysql_result($preselect,0);
$update=mysql_query("update invoicedetails set billamount='$billamount',netamount='$nettot',VAT='$vat',transport='$transport',grandtotal='$totalamount' where invoicenumber='$invoicenumber'");
$update=mysql_query("update purchase set billamount='$billamount' where invoicenumber='$invoicenumber'");
$delete=mysql_query("delete from billdescription where tableid='$recordid'");

foreach($productcode as $k=>$code){
$name=$productname[$k]; $qty=$quantity[$k]; $price=$unitprice[$k]; $net=$netamount[$k];
$insert=mysql_query("insert into billdescription values('0','$recordid','$code','$name','$qty','$price','$net')");
}
$findtable=mysql_query("select * from balance where accountnumber='$accountnumber'");
while($arr=mysql_fetch_array($findtable)){ $total=$arr['total']; $balance=$arr['balance']; $curdate=$arr['curdate']; $randomtable=$arr['tablename']; }

$prepaid=mysql_query("select billamount,paidamount from purchase where invoicenumber='$invoicenumber'");
while($arr=mysql_fetch_array($prepaid)){ $billamount=$arr['billamount']; $paidamount=$arr['paidamount']; }
if($prebillamount < $billamount){
if($prepaidF>0){
$cramount=$billamount-$prebillamount;  $curtotal=$total+$cramount; $curbalance=$balance+$cramount; $sysdate=date('Y-m-d');
$bupdate=mysql_query("update balance set total='$curtotal',balance='$curbalance',curdate='$sysdate',lastbalance='$balance',lastdate='$curdate' where accountnumber='$accountnumber'");
$insert=mysql_query("insert into $randomtable values('0','Cr','$suppliername','$sysdate','$cramount','$curbalance')"); }
}
if($prebillamount > $billamount){
if($prepaidF>0){
$cramount=$prebillamount-$billamount;  $curtotal=$total-$cramount; $curbalance=$balance-$cramount; $sysdate=date('Y-m-d');
$bupdate=mysql_query("update balance set total='$curtotal',balance='$curbalance',curdate='$sysdate',lastbalance='$balance',lastdate='$curdate' where accountnumber='$accountnumber'");
$insert=mysql_query("insert into $randomtable values('0','Dr','$suppliername','$sysdate','$cramount','$curbalance')"); }
}

}


?>

</body>

</html>
