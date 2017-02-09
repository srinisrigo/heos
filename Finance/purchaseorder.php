<?php session_start(); ?>
<?php include "../AJAX/finance.php"; include "../DataBase/dbconnection.php"; ?>
<html>
<head> <title>Purchase Order</title>
<?php $xajax->printJavascript(); ?>
<script type="text/javascript" src="../Scripts/datetimepicker.js"></script>
<script type="text/javascript" src="../Scripts/finance.js"></script>
<link rel="stylesheet" href="../Style/heoscss.css">
<script language="javascript">
function btover(obj,cname){ obj.className=cname; }
function createRow(){
tobj=document.getElementById('dtable'); crobj=tobj.rows;
var row=crobj.length; robj=tobj.insertRow(row);  sno=row;
c1=robj.insertCell(0); c2=robj.insertCell(1); c3=robj.insertCell(2); c4=robj.insertCell(3); c5=robj.insertCell(4);
arindex=crobj.length-2;
c1.innerHTML=sno;
c2.innerHTML="<input type=\"text\" name=\"productcode["+arindex+"]\" id=\"productcode["+arindex+"]\" size=7 onChange=\"xajax_setNominal(this.value,document.getElementById('productname["+arindex+"]').name,1);\">";
c3.innerHTML="<input type=\"text\" name=\"productname["+arindex+"]\" id=\"productname["+arindex+"]\" onChange=\"xajax_setNominal(this.value,document.getElementById('productname["+arindex+"]').name,1);\">";
c4.innerHTML="<input type=\"text\" name=\"quantity["+arindex+"]\" id=\"quantity["+arindex+"]\" size=4 value=0 onChange=\"setNetamount("+arindex+");\">";
c5.innerHTML="<a href=\"javascript:createRow();\">Add</a>&nbsp;&nbsp;<a href=\"javascript:deleteRow();\">Delete</a>";
robj=document.getElementById('dtable').rows; prerow=row-1;
cobj=document.getElementById('dtable').rows[prerow].cells; cobj[4].innerHTML='';
}
function deleteRow(){ dtobj=document.getElementById('dtable').rows; drow=dtobj.length-1;
if(dtobj.length > 2){ document.getElementById('dtable').deleteRow(drow);
robj=document.getElementById('dtable').rows; prerow=drow-1;
cobj=document.getElementById('dtable').rows[prerow].cells;
cobj[4].innerHTML='<a href=\"javascript:createRow();\">Add</a>&nbsp;&nbsp;<a href=\"javascript:deleteRow();\">Delete</a>';
}
if(dtobj.length==2){
cobj=document.getElementById('dtable').rows[1].cells;
cobj[4].innerHTML='<a href=\"javascript:createRow();\">Add</a>';
}
}
</script>
</head>

<body>
<?php

print "<form method=POST>
<table id=\"purchase\" cellspacing=1 cellpadding=0 border=0>
<tr><td>Purchase Order Number</td><td><input type=\"text\" name=\"purchasenumber\" id=\"purchasenumber\" onKeyPress=\"return keyRestrict(event,'1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZ')\"></td>
<td>Purchase order Date</td><td><input type=\"text\" name=\"orderdate\" id=\"orderdate\" readonly size=13>
<a href=\"javascript:NewCal('orderdate','ddmmmyyyy')\">
<img src=\"../Images/cal.gif\" alt=\"Pick a date\" width=\"16\" height=\"16\" border=\"0\"></a></td></tr>
<tr><td>Supplier ID</td><td><input type=text name=\"supplierid\" id=\"supplierid\" onChange=\"xajax_setcustomer(this.value,1);\"></td>
<td>Supplier Name</td><td><input type=\"text\" name=\"suppliername\" id=\"suppliername\" onChange=\"xajax_setcustomer(this.value,2);\"></td></tr>
</table>
<br><table id=\"dtable\" border=0 cellpadding=0 cellspacing=1>
<tr><th>S.no</th><th>Nominal Code</th><th>Nominal Name</th><th>Quantity</th><th></th></tr>
<tr><td>1</td>
<td><input type=\"text\" name=\"productcode[0]\" id=\"productcode[0]\" size=7 onChange=\"xajax_setNominal(this.value,document.getElementById('productname[0]').name,1);\"></td>
<td><input type=\"text\" name=\"productname[0]\" id=\"productname[0]\" onChange=\"xajax_setNominal(this.value,document.getElementById('productcode[0]').name,2);\"></td>
<td><input type=\"text\" name=\"quantity[0]\" id=\"quantity[0]\" size=4 value=0 onKeyPress=\"return keyRestrict(event,'0123456789'+String.fromCharCode(241))\"></td>
<td><a href=\"javascript:createRow();\">Add</a></td></tr>
</table><br><br>
<table cellspacing=0 cellpadding=0 border=0><tr><td><input type=\"submit\" id=\"invoice\" name=\"invoice\" value=\"Submit\" class=\"buttonstatic\" ></td></tr></table></form>\n";
?>
</body>
</html>
<?php
if(isset($_POST['invoice'])){
$login='admin';
$purchasenumber=$_POST['purchasenumber'];
$orderdate=date('Y-m-d',strtotime($_POST['orderdate']));
$supplierid=$_POST['supplierid'];
$suppliername=$_POST['suppliername'];

$productcode=$_POST['productcode'];
$productname=$_POST['productname'];
$quantity=$_POST['quantity'];

$con=mysql_connect('192.168.15.24','root','admin'); $db=mysql_select_db('heos');
$insert=mysql_query("insert into purchaseorder values('0','$purchasenumber','$supplierid','$suppliername','$orderdate','$login')");
$selectrcid=mysql_query("select * from purchaseorder"); while($arr=mysql_fetch_array($selectrcid)) $recordid=$arr['recordid'];
foreach($productcode as $k=>$code){ $name=$productname[$k]; $qty=$quantity[$k];
$insert=mysql_query("insert into orderdescription values('0','$recordid','$code','$name','$qty')");
}
if($insert) echo "<script language=\"javscript\">alert('Insertion Success...');</script>";
}
?>
