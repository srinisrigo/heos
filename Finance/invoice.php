<?php session_start(); ?>
<?php include "../AJAX/finance.php"; include "../DataBase/dbconnection.php"; ?>
<html>
<head> <title>Invoice</title>
<?php
$xajax->printJavascript();
?>
<script type="text/javascript" src="../Scripts/datetimepicker.js"></script>
<script type="text/javascript" src="../Scripts/finance.js"></script>
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
</script>
</head>

<body>
<?php

print "<form method=POST>
<table id=\"purchase\" cellspacing=1 cellpadding=0 border=0>
<tr><td>Invoice Number</td><td><input type=\"text\" name=\"invoicenumber\" id=\"invoicenumber\" onKeyPress=\"return keyRestrict(event,'1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZ')\"></td>
<td>Purchase Order Number</td><td><input type=\"text\" name=\"purchasenumber\" id=\"purchasenumber\" onKeyPress=\"return keyRestrict(event,'1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZ')\"></td></tr>
<tr><td>Supplier ID</td><td><input type=text name=\"supplierid\" id=\"supplierid\" onChange=\"xajax_setcustomer(this.value,1);\"></td>
<td>Supplier Name</td><td><input type=\"text\" name=\"suppliername\" id=\"suppliername\" onChange=\"xajax_setcustomer(this.value,2);\"></td></tr>
<tr><td>Bill Date</td><td><input type=\"text\" name=\"billdate\" readonly id=\"billdate\" size=13>
<a href=\"javascript:NewCal('billdate','ddmmmyyyy')\">
<img src=\"../Images/cal.gif\" alt=\"Pick a date\" width=\"16\" height=\"16\" border=\"0\"></a></td>
<td>Bill Amount</td><td><input type=\"text\" name=\"billamount\" id=\"billamount\" value=0.00 onKeyPress=\"return keyRestrict(event,'1234567890.')\"></td></tr>
<tr><td>Pay Date</td><td colspan=3><input type=\"text\" name=\"paydate\" readonly id=\"paydate\" size=13>
<a href=\"javascript:NewCal('paydate','ddmmmyyyy')\">
<img src=\"../Images/cal.gif\" alt=\"Pick a date\" width=\"16\" height=\"16\" border=\"0\"></a></td></tr>
</table>
<br><table id=\"dtable\" border=0 cellpadding=0 cellspacing=1>
<tr><th>S.no</th><th>Nominal Code</th><th>Nominal Name</th><th>Quantity</th><th>Unit Price</th><th>Net Amount</th><th></th></tr>
<tr><td>1</td>
<td><input type=\"text\" name=\"productcode[0]\" id=\"productcode[0]\" size=7 onChange=\"xajax_setNominal(this.value,document.getElementById('productname[0]').name,1);\"></td>
<td><input type=\"text\" name=\"productname[0]\" id=\"productname[0]\" onChange=\"xajax_setNominal(this.value,document.getElementById('productcode[0]').name,2);\"></td>
<td><input type=\"text\" name=\"quantity[0]\" id=\"quantity[0]\" size=4 value=0 onchange=\"setNetamount(0);\" onKeyPress=\"return keyRestrict(event,'0123456789'+String.fromCharCode(241))\"></td>
<td><input type=\"text\" name=\"unitprice[0]\" id=\"unitprice[0]\" size=7 value=0.00 onChange=\"setNetamount(0);\" onKeyPress=\"return keyRestrict(event,'0123456789.'+String.fromCharCode(241))\"></td>
<td><input type=\"text\" name=\"netamount[0]\" id=\"netamount[0]\" size=9 readonly value=0.00></td>
<td><a href=\"javascript:createRow();\">Add</a></td></tr>
<tr><td colspan=5 align=right>VAT ( 17.5% )</td><td><input type=\"text\" name=\"vat\" id=\"vat\" size=9 value=0.00 onChange=\"setNettotal();\" onKeyPress=\"return keyRestrict(event,'0123456789.'+String.fromCharCode(241))\"></td><td rowspan=3></td></tr>
<tr><td colspan=5 align=right>Transport</td><td><input type=\"text\" name=\"transport\" id=\"transport\" size=9 value=0.00 onChange=\"setNettotal();\" onKeyPress=\"return keyRestrict(event,'0123456789.'+String.fromCharCode(241))\"></td></tr>
<tr><td colspan=5 align=right>Total Amount</td><td><input type=\"text\" name=\"totalamount\" id=\"totalamount\" size=9 value=0.00 readonly></td></tr>
</table><br><br>
<table cellspacing=0 cellpadding=0 border=0><tr><td><input type=\"submit\" id=\"invoice\" name=\"invoice\" value=\"Submit\" class=\"buttonstatic\" ></td></tr></table></form>\n";
?>
</body>
</html>
<?php
if(isset($_POST['invoice'])){
$invoicenumber=$_POST['invoicenumber'];
$purchasenumber=$_POST['purchasenumber'];
$supplierid=$_POST['supplierid'];
$suppliername=$_POST['suppliername'];
$billdate=date('Y-m-d',strtotime($_POST['billdate']));
$billamount=$_POST['billamount'];
$paydate=date('Y-m-d',strtotime($_POST['paydate']));
$vat=$_POST['vat'];
$transport=$_POST['transport'];
$totalamount=$_POST['totalamount'];

$productcode=$_POST['productcode'];
$productname=$_POST['productname'];
$quantity=$_POST['quantity'];
$unitprice=$_POST['unitprice'];
$netamount=$_POST['netamount'];
$nettot=0; foreach($netamount as $k=>$net) $nettot=$nettot+$net;
$con=mysql_connect('192.168.15.24','root','admin'); $db=mysql_select_db('heos');
$insert=mysql_query("insert into invoicedetails values('0','$invoicenumber','$purchasenumber','$supplierid','$suppliername','$billdate','$billamount','$paydate','$nettot','$vat','$transport','$totalamount')");
$selectrcid=mysql_query("select * from invoicedetails"); while($arr=mysql_fetch_array($selectrcid)) $recordid=$arr['recordid'];
foreach($productcode as $k=>$code){
$name=$productname[$k]; $qty=$quantity[$k]; $price=$unitprice[$k]; $net=$netamount[$k];
$insert=mysql_query("insert into billdescription values('0','$recordid','$code','$name','$qty','$price','$net')");
}
$Insert=mysql_query("insert into purchase values('0','$invoicenumber','$supplierid','$suppliername','$billamount','$billdate','0','$paydate')");
if($insert) echo "<script language=\"javscript\">alert('Insertion Success...');</script>";
}
?>
