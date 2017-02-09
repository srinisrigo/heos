<?php
session_start();
include "../AJAX/MasterAjax.php";
?>

<html><head><?php $xajax->printJavascript();?>
<link href="../Style/heoscss.css" rel="stylesheet" type="text/css">
<script language="javascript" type="text/javascript" src="../ScriptsMasterScript.js"></script>
<title>Supplier Details</title>
<meta http-equiv="Page-Exit" content="revealTrans(Duration=0.5,Transition=22)">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<script language="javascript">
function hideAgentpayments(ComboObj){
var Tobj=document.getElementById('maintable').rows;
for(i=4;i<Tobj.length;i++) Tobj[i].style.display="none";
if(ComboObj.selectedIndex==1 || ComboObj.selectedIndex==2) Tobj[4].style.display="";
if(ComboObj.selectedIndex==3) { Tobj[5].style.display=""; Tobj[6].style.display=""; Tobj[7].style.display=""; }
if(ComboObj.selectedIndex==4) {
Tobj[5].style.display=""; Tobj[6].style.display=""; Tobj[8].style.display=""; Tobj[9].style.display=""; }
}

function createRow(){
tobj=document.getElementById('contactdeatils'); crobj=tobj.rows;
var row=crobj.length-1; robj=tobj.insertRow(row);  sno=row-1;
c1=robj.insertCell(0); c2=robj.insertCell(1); c3=robj.insertCell(2);
c4=robj.insertCell(3); c5=robj.insertCell(4); c6=robj.insertCell(5); c7=robj.insertCell(6);
arindex=crobj.length-3;
c1.innerHTML="<input type=\"text\" name=\"contactperson["+arindex+"]\" id=\"contactperson["+arindex+"]\">";
c2.innerHTML="<input type=\"text\" name=\"designation["+arindex+"]\" id=\"designation["+arindex+"]\">";
c3.innerHTML="<input type=\"text\" name=\"email["+arindex+"]\" id=\"email["+arindex+"]\">";
c4.innerHTML="<input type=\"text\" name=\"mobile["+arindex+"]\" id=\"mobile["+arindex+"]\" size=12>";
c5.innerHTML="<input type=\"text\" name=\"phone["+arindex+"]\" id=\"phone["+arindex+"]\" size=17>";
c6.innerHTML="<input type=\"text\" name=\"fax["+arindex+"]\" id=\"fax["+arindex+"]\" size=17>";
c7.innerHTML="<a href=\"javascript:createRow();\">Add</a>&nbsp;&nbsp;<a href=\"javascript:deleteRow();\">Delete</a>";
robj=document.getElementById('contactdeatils').rows; prerow=row-1;
cobj=document.getElementById('contactdeatils').rows[prerow].cells; cobj[6].innerHTML='';
}
function deleteRow(){ dtobj=document.getElementById('contactdeatils').rows; drow=dtobj.length-2;
if(dtobj.length > 3){ document.getElementById('contactdeatils').deleteRow(drow);
robj=document.getElementById('contactdeatils').rows; prerow=drow-1;
cobj=document.getElementById('contactdeatils').rows[prerow].cells;
cobj[6].innerHTML='<a href=\"javascript:createRow();\">Add</a>&nbsp;&nbsp;<a href=\"javascript:deleteRow();\">Delete</a>';
}
if(dtobj.length == 3) {
cobj=document.getElementById('contactdeatils').rows[1].cells;
cobj[6].innerHTML='<a href=\"javascript:createRow();\">Add</a>';
}
}
function moveForward(){
var left=document.getElementById('coursecodelist1');
var right=document.getElementById('coursecodelist2');
var list=document.getElementById('list'); var bind='';
for(i=0;i<left.options.length;i++) if(left.options[i].selected==true){ f=1;
for(j=0;j<right.options.length;j++) if(left.options[i].text==right.options[j].text) f=0;
if(f) { var objOption = new Option(left.options[i].text,left.options[i].value);
document.getElementById('coursecodelist2').options.add(objOption); }  }
list.value=''; for(k=0;k<right.options.length;k++) bind=bind+right.options[k].text+'.';
list.value=bind;
}

function moveBackward()
{
var right=document.getElementById('coursecodelist2');
var list=document.getElementById('list'); var bind='';
for(j=0;j<right.options.length;j++) if(right.options[j].selected==true) right.remove(right.selectedIndex);
list.value=''; for(k=0;k<right.options.length;k++) bind=bind+right.options[k].text+'.';
list.value=bind;
}
</script>
</head>
<body>

<?php

if(!isset($_POST['editButton']) && !isset($_POST['cancelButton']) && !isset($_POST['deleteButton']) && !isset($_POST['btnupdate']) && !isset($_POST['AddButton']))
{
$_SESSION['editreference']="";
$_SESSION['updatereference']="";
MainForm();
SupplierDetailsFill();
}

function SupplierDetailsFill()
{
if(!isset($_GET['page']))
{
@$cat=$_GET['cat'];
if(strlen($cat)==0)
{
$page=1;
fillPage($page);
}
else if(strlen($cat)==6 || strlen($cat)==10 )
{
if(!isset($_SESSION['pagevalueforcsupplier']))
{
$page=1;
$_SESSION['pagevalueforcsupplier']=$page;
fillPage($page);
}
else
{
$page=$_SESSION['pagevalueforcsupplier'];
$_SESSION['pagevalueforcsupplier']=$page;
}
}
else
{
$page=$_SESSION['pagevalueforcsupplier'];
fillPage($page);
}
}
else
{
$page = $_GET['page'];
$_SESSION['pagevalueforcsupplier']=$page;
fillPage($page);
}
}

if(isset($_POST['AddButton']))
{
$supplierid=(trim($_POST['supplierid']));
$suppliername=trim($_POST['suppliername']);
$supplieraddress=trim($_POST['supplieraddress']);
$NClist=trim($_POST['list']); $Na=explode('.',$NClist); $codeA=array();
foreach($Na as $k=>$nA){ if(!empty($nA)){ $ex=explode('--',$nA); $codeA[]=$ex[1]; } }
$nominalcode=implode('.',$codeA);
$paytotxt=trim($_POST['paytotxt']);
$payattxt=trim($_POST['payattxt']);
$paynametxt=trim($_POST['paynametxt']);
$paybanknametxt=trim($_POST['paybanknametxt']);
$payholdbanktxt=trim($_POST['payholdbanktxt']);
$paybankaddress=trim($_POST['paybankaddresstxt']);
$paysortcodetxt=trim($_POST['paysortcodetxt']);
$payaccountnumtxt=trim($_POST['payaccountnumtxt']);
$branchcodetxt=trim($_POST['branchcodetxt']);
$payibntxt=trim($_POST['payibntxt']);
$payaccountnumtxt1=trim($_POST['payaccountnumtxt1']);
$supplierModeOfPayComb=trim($_POST['supplierModeOfPayComb']);
$payswiftcodetxt=trim($_POST['payswiftcodetxt']);

$con=mysql_connect("192.168.15.24","root","admin"); $db=mysql_select_db("heos",$con);
$query=mysql_query("select count(supplierid) from supplierdetails where supplierid='$supplierid'",$con);
$CustomerCount=mysql_result($query,0);

if($CustomerCount==0)
{
$queryCustomerInsert=mysql_query("insert into supplierdetails values('0','$supplierid','$suppliername','$supplieraddress','$nominalcode','$supplierModeOfPayComb','$paytotxt','$payattxt','$paynametxt','$paybanknametxt','$payholdbanktxt','$paybankaddress','$paysortcodetxt','$payaccountnumtxt1','$payswiftcodetxt','$branchcodetxt','$payibntxt')",$con);
echo "<script type=\"text/javascript\">alert(\"Successfully Inserted\")</script>";
$f11=$_POST['contactperson'];
$f12=$_POST['designation'];
$f13=$_POST['email'];
$f14=$_POST['mobile'];
$f15=$_POST['phone'];
$f16=$_POST['fax'];
$sel=mysql_query("select recordid from supplierdetails"); while($ar=mysql_fetch_array($sel)){ $recordid=$ar['recordid']; }
foreach($f11 as $k=>$value){
if(!empty($value)){ $designation=$f12[$k]; $email=$f13[$k]; $mobile=$f14[$k]; $phone=$f15[$k]; $fax=$f16[$k];
$contact=mysql_query("insert into contactdetails values('0','$recordid','supplierdetails','$value','$designation','$email','$mobile','$phone','$fax')");
}
}
MainForm();
SupplierDetailsFill();
}
else
{
echo "<script type=\"text/javascript\">alert(\"Supplier Already exists\")</script>";
MainForm();
SupplierDetailsFill();
}

}

function fillPage($page)
{
@$cat=$_GET['cat'];
$_SESSION['pagevalueforcsupplier']=$page;
$page  = (int) $page;
$limit = 5;
$con=mysql_connect("192.168.15.24","root","admin"); $db=mysql_select_db("heos",$con);
$result = mysql_query("select count(*) from supplierdetails",$con);
$total = mysql_result($result, 0);
$pager  = getPagerData($total, $limit, $page);
if($total==0){$offset=0;}
else{$offset = $pager->offset;}
$limit  = $pager->limit;
$page   = $pager->page;
$querySelectCustomer="select * from supplierdetails limit $offset,$limit";
$querySelectCustomerExec=mysql_query($querySelectCustomer,$con);

print "<form action=\"supplierdetails.php\" method=\"post\">
<table border=0 cellspacing=1 cellpadding=0>
<tr><th>S.No</th><th>Supplier Id</th><th>Supplier Name</th><th>Supplier Address</th><th>Nominal codes</th><th></th></tr>\n";
$sno=1;
while($Fetch=mysql_fetch_array($querySelectCustomerExec))
{
$RecordId=$Fetch["recordid"];
$CustomerId=$Fetch["supplierid"];
$CustomerName=$Fetch["suppliername"];
$ContactPerson=$Fetch["supplieraddress"];
$PhoneNumber=$Fetch["nominalcodes"];

print "<tr><td name=d[] value=\"$sno\">$sno</td>
<td>$CustomerId</td><td>$CustomerName</td><td>$ContactPerson</td><td>$PhoneNumber<input type=\"hidden\" name=\"recordid[]\" value=\"$RecordId\"></td>
<td><input type=\"submit\" id=\"editButton\" name=\"editButton[$CustomerId]\" value=\"Edit\" class=\"buttonstatic\" >
&nbsp;<input type=\"submit\" id=\"deleteButton\" name=\"deleteButton[$CustomerId]\"  value=\"Delete\" class=\"buttonstatic\" ></td></tr>\n";
$sno=$sno+1;
}
print "<tr><td align=\"center\" colspan=\"8\">\n";
if ($page == 1) // this is the first page - there is no previous page
echo "Previous";
else            // not the first page, link to the previous page
echo "<a href=\"supplierdetails.php?page=" . ($page - 1) . "\">Previous</a>";
print " ||  \n";
if ($page == $pager->numPages) // this is the last page - there is no next page
echo "Next";
else            // not the last page, link to the next page
echo "<a href=\"supplierdetails.php?page=" . ($page + 1) . "\">Next</a>";
print "<br>$page of $pager->numPages</td></tr></table></form>\n";
}

function getPagerData($numHits, $limit, $page)
{
$numHits  = (int) $numHits;
$limit    = max((int) $limit, 1);
$page     = (int) $page;
$numPages = ceil($numHits / $limit);
$page = max($page, 1);
$page = min($page, $numPages);
$offset = ($page - 1) * $limit;
$ret = new stdClass;
$ret->offset   = $offset;
$ret->limit    = $limit;
$ret->numPages = $numPages;
$ret->page     = $page;
return $ret;
}

/***********************Delete Button Code******************************/
if(isset($_POST['deleteButton']))
{
MainForm();
deletefill();
$Customerfordelete=$_POST['deleteButton'];
$_SESSION['Customerfordelete']=$Customerfordelete;
echo "<script langauge=\"javascript\">var result=confirm('Are You Sure Want to Delete');
if(result){val='delete';self.location='supplierdetails.php?cat=' + val;}else{val='dontdelete';self.location='supplierdetails.php?cat=' + val;}</script>";
}
/*****************************Deleet Button Code Ends***********************/

function deletefill()
{
$page=$_SESSION['pagevalueforcsupplier'];
fillpage($page);
}

@$cat=$_GET['cat'];
if(isset($cat) and strlen($cat) == 6)
{
$Customerfordelete=$_SESSION['Customerfordelete'];
$Customerarray=array_keys($Customerfordelete);
$con=mysql_connect("192.168.15.24","root","admin");
$db=mysql_select_db("heos",$con);

$queryforCustIDcount1exec=mysql_query("select count(*) from purchase where customerid='$Customerarray[0]'",$con);
$purchaseTable=mysql_result($queryforCustIDcount1exec,0);

if($purchaseTable==0)
{
$queryCustomerDelete=mysql_query("delete from customerdetails where customerid='$Customerarray[0]'",$con);
echo "<script type=\"text/javascript\">alert(\"Successfully Deleted\")</script>";
$page=$_SESSION['pagevalueforcsupplier'];
fillpage($page);

}
else
{
echo "<script type=\"text/javascript\">alert(\"Failed to Delete,This Data is in Use\")</script>";
$page=$_SESSION['pagevalueforcsupplier'];
fillpage($page);
}
}
else if(isset($cat) and strlen($cat) == 10)
{
$page=$_SESSION['pagevalueforcsupplier'];
fillpage($page);
}

if(isset($_POST['editButton']))
{
$presentcount=$_POST['editButton'];
$_SESSION['customerafteredit']=$presentcount;
editFill();
}

if(isset($_POST['btncancel']))
{
$page=$_SESSION['pagevalueforcsupplier'];
}


if(isset($_POST['btnupdate']))
{
$con=mysql_connect("192.168.15.24","root","admin"); $db=mysql_select_db("heos",$con);

$supplierid=(trim($_POST['supplierid']));
$suppliername=trim($_POST['suppliername']);
$supplieraddress=trim($_POST['supplieraddress']);
$NClist=trim($_POST['list']); $Na=explode('.',$NClist); $codeA=array();
foreach($Na as $k=>$nA){ if(!empty($nA)){ $ex=explode('--',$nA); $codeA[]=$ex[1]; } }
$nominalcode=implode('.',$codeA);
$paytotxt=trim($_POST['paytotxt']);
$payattxt=trim($_POST['payattxt']);
$paynametxt=trim($_POST['paynametxt']);
$paybanknametxt=trim($_POST['paybanknametxt']);
$payholdbanktxt=trim($_POST['payholdbanktxt']);
$paybankaddress=trim($_POST['paybankaddresstxt']);
$paysortcodetxt=trim($_POST['paysortcodetxt']);
$payaccountnumtxt=trim($_POST['payaccountnumtxt']);
$branchcodetxt=trim($_POST['branchcodetxt']);
$payibntxt=trim($_POST['payibntxt']);
$payaccountnumtxt1=trim($_POST['payaccountnumtxt1']);
$supplierModeOfPayComb=trim($_POST['supplierModeOfPayComb']);
$payswiftcodetxt=trim($_POST['payswiftcodetxt']);

$queryCustomerUpdate=mysql_query("update supplierdetails set suppliername='$suppliername',supplieraddress='$supplieraddress',nominalcodes='$nominalcode',supplierpaymode='$supplierModeOfPayComb',payableto='$paytotxt',payableat='$payattxt',payeename='$paynametxt',payablebankname='$paybanknametxt',payeeholdingbankbranch='$payholdbanktxt',payeebankaddress='$paybankaddress',payeesortcode='$paysortcodetxt',payeeaccountno='$payaccountnumtxt1',payeeswiftbiccode='$payswiftcodetxt',branchcode='$branchcodetxt',payeeibancode='$payibntxt' where supplierid='$supplierid'",$con);
$f11=$_POST['contactperson'];
$f12=$_POST['designation'];
$f13=$_POST['email'];
$f14=$_POST['mobile'];
$f15=$_POST['phone'];
$f16=$_POST['fax'];
$sel=mysql_query("select recordid from supplierdetails where supplierid='$supplierid'"); $recordid=mysql_result($sel,'recordid');
$del=mysql_query("delete from contactdetails where recordid='$recordid' and tablename='supplierdetails'");
foreach($f11 as $k=>$value){
if(!empty($value)){ $designation=$f12[$k]; $email=$f13[$k]; $mobile=$f14[$k]; $phone=$f15[$k]; $fax=$f16[$k];
$contact=mysql_query("insert into contactdetails values('0','$recordid','supplierdetails','$value','$designation','$email','$mobile','$phone','$fax')"); } }

echo "<script type=\"text/javascript\">alert(\"Updated Successfully\")</script>";
MainForm();
SupplierDetailsFill();

}


function editFill()
{
$page=$_SESSION['pagevalueforcsupplier'];
$limit = 5;
$con=mysql_connect("192.168.15.24","root","admin"); $db=mysql_select_db("heos",$con);
$result = mysql_query("select count(*) from supplierdetails",$con);
$total = mysql_result($result, 0);
$pager  = getPagerData($total, $limit, $page);
$offset = $pager->offset;
$limit  = $pager->limit;
$page   = $pager->page;
$arraycustomer=$_SESSION['customerafteredit'];
$querySelectCustomer="select * from supplierdetails limit $offset,$limit";
$querySelectCustomerExec=mysql_query($querySelectCustomer,$con);
while($EFetch=mysql_fetch_array($querySelectCustomerExec))
{
$RecordId=$EFetch["recordid"];
$supplierid=$EFetch["supplierid"];
$suppliername=$EFetch["suppliername"];
$supplieraddress=$EFetch["supplieraddress"];
$nominalcodes=$EFetch["nominalcodes"];
$supplierpaymode=$EFetch["supplierpaymode"];
$payableto=$EFetch["payableto"];
$payableat=$EFetch["payableat"];
$payeename=$EFetch["payeename"];
$payablebankname=$EFetch["payablebankname"];
$payeeholdingbankbranch=$EFetch["payeeholdingbankbranch"];
$payeebankaddress=$EFetch["payeebankaddress"];
$payeesortcode=$EFetch["payeesortcode"];
$payeeaccountno=$EFetch["payeeaccountno"];
$payeeswiftbiccode=$EFetch["payeeswiftbiccode"];
$branchcode=$EFetch["branchcode"];
$payeeibancode=$EFetch["payeeibancode"];

if(array_key_exists($supplierid,$arraycustomer))
{
print"<form action=\"supplierdetails.php\" method=\"post\" name=\"SupplierDetails\">
<table id=\"maintable\" border=0 cellspacing=1 cellpadding=0>
<tr><th colspan=4>Supplier Details Edit</th></tr><tr>
<td>Supplier Name</td><td><input type=\"text\" name=\"suppliername\" id=\"suppliername\" value=\"$suppliername\" onKeyPress=\"return keyRestrict(event,'abcdefghijklmnopqrstuvwxyz. '+String.fromCharCode(241))\"/> </td>
<td>Supplier Id</td><td><input type=\"hidden\" name=\"supplierid\" id=\"supplierid\" value=\"$supplierid\" onChange=\"return xajax_SuppId(document.getElementById('customerid').value);\" onKeyPress=\"return keyRestrict(event,'abcdefghijklmnopqrstuvwxyz1234567890'+String.fromCharCode(241))\">$supplierid</td>
</tr>
<tr><td>Supplier Address</td><td><textarea name=\"supplieraddress\" id=\"supplieraddress\">$supplieraddress</textarea></td>
<td>Nominal Codes</td><td><table border=0 cellspacing=0 cellpadding=0><tr><td>
<select multiple name=\"coursecodelist1\" id=\"coursecodelist1\" size=5>";
$selectcoursecode=("select * from nominalcodes order by nominalcode");
$result=mysql_query($selectcoursecode,$con);
while($re=mysql_fetch_array($result)){ $SubjectCode=$re["nominalcode"]; $SubjectName=$re["nominalname"];
print"<option value=\"$SubjectName\">$SubjectName --$SubjectCode</option>"; }
print "</select></td><td><input type=\"button\" value=\"---->\" onClick=\"moveForward();\" class=\"buttonstatic\" ><br>
<br><input type=\"button\" value=\"<----\" onClick=\"moveBackward();\" class=\"buttonstatic\" >
</td><td><select name=\"coursecodelist2\" id=\"coursecodelist2\" size=5>";
$Anominalcodes=explode('.',$nominalcodes);
$selectcoursecode=("select * from nominalcodes order by nominalcode");  $NAlist=array();
$result=mysql_query($selectcoursecode,$con);
while($re=mysql_fetch_array($result)){ $SubjectCode=$re["nominalcode"]; $SubjectName=$re["nominalname"]; $f=0;
foreach($Anominalcodes as $k=>$value) if($value==$SubjectCode){ $f=1; break; }
if($f){ print"<option value=\"$SubjectName\">$SubjectName --$SubjectCode</option>"; $NAlist[]=$SubjectName.' --'.$SubjectCode; } }
$codeimp=implode('.',$NAlist);
print "</select><input type=\"hidden\" name=\"list\" id=\"list\" value=\"$codeimp\"></td></tr></table></td></tr>
<tr class=\"label\"><td>Supplier Mode of Payment</td><td colspan=3><select name=\"supplierModeOfPayComb\" id=\"AgentModeOfPayComb\" onchange=\"hideAgentpayments(this);\">
<option value=none>Select</option>";
if($supplierpaymode=="Cheque") print "<option value=\"Cheque\" selected>Cheque</option>"; else print"<option value=\"Cheque\">Cheque</option>";
if($supplierpaymode=="Demand Draft") print "<option value=\"Demand Draft\" selected>Demand Draft</option>"; else print "<option value=\"Demand Draft\">Demand Draft</option>";
if($supplierpaymode=="UK Bank Transfer") print "<option value=\"UK Bank Transfer\" selected>UK Bank Transfer</option>"; else print "<option value=\"UK Bank Transfer\">UK Bank Transfer</option>";
if($supplierpaymode=="International Bank Transfer") print "<option value=\"International Bank Transfer\" selected>International Bank Transfer</option>"; else print "<option value=\"International Bank Transfer\">International Bank Transfer</option>";
print "</select></td></tr>";

if($supplierpaymode=="Cheque" || $supplierpaymode=="Demand Draft")
print "<tr><td>Payable to</td><td><input type=\"text\" name=\"paytotxt\" id=\"paytotxt\" value=\"$payableto\"></td><td>Payable at</td><td><input type=\"text\" name=\"payattxt\" id=\"payattxt\" value=\"$payableat\"></td></tr>";
else print "<tr style=\"display:none\"><td>Payable to</td><td><input type=\"text\" name=\"paytotxt\" id=\"paytotxt\" value=\"\"></td><td>Payable at</td><td><input type=\"text\" name=\"payattxt\" id=\"payattxt\" value=\"\"></td></tr>";

if($supplierpaymode=="UK Bank Transfer"){
print "<tr><td>Payee Name</td><td><input type=\"text\" name=\"paynametxt\" id=\"paynametxt\" value=\"$payeename\"></td><td>Payee Bank Name</td><td><input type=\"text\" name=\"paybanknametxt\" id=\"paybanknametxt\" value=\"$payablebankname\"></td></tr>";
print "<tr><td>Payee Holding Bank Branch</td><td><input type=\"text\" name=\"payholdbanktxt\" id=\"payholdbanktxt\" value=\"$payeeholdingbankbranch\"></td><td>Payee Bank Address</td><td><textarea class=\"textarea\"  name=\"paybankaddresstxt\" id=\"paybankaddresstxt\">$payeebankaddress</textarea></td></tr>";
}
else {
print "<tr style=\"display:none\"><td>Payee Name</td><td><input type=\"text\" name=\"paynametxt\" id=\"paynametxt\" value=\"\"></td><td>Payee Bank Name</td><td><input type=\"text\" name=\"paybanknametxt\" id=\"paybanknametxt\" value=\"\"></td></tr>";
print "<tr style=\"display:none\"><td>Payee Holding Bank Branch</td><td><input type=\"text\" name=\"payholdbanktxt\" id=\"payholdbanktxt\" value=\"\"></td><td>Payee Bank Address</td><td><textarea class=\"textarea\"  name=\"paybankaddresstxt\" id=\"paybankaddresstxt\">$payeebankaddress</textarea></td></tr>";
}

if($supplierpaymode=="International Bank Transfer"){
print "<tr><td>Payee Sort Code</td><td><input type=\"text\" name=\"paysortcodetxt\" id=\"paysortcodetxt\" value=\"$payeesortcode\"></td><td>Payee Account Number</td><td><input type=\"text\" name=\"payaccountnumtxt\" id=\"payaccountnumtxt\" value=\"$payeeaccountno\" onKeyPress=\"return keyRestrict(event,'1234567890+-'+String.fromCharCode(241))\"></td>";
print "<tr><td>Payee SWIFT-BIC Code</td><td><input type=\"text\" name=\"payswiftcodetxt\" id=\"payswiftcodetxt\" value=\"$payeeswiftbiccode\" onKeyPress=\"return keyRestrict(event,'1234567890+-'+String.fromCharCode(241))\"></td><td>Branch Code</td><td><input type=\"text\"  name=\"branchcodetxt\" id=\"branchcodetxt\" value=\"$branchcode\" onKeyPress=\"return keyRestrict(event,'1234567890+-'+String.fromCharCode(241))\"> </td></tr>";
print "<tr><td>Payee IBAN Code</td><td><input type=\"text\" name=\"payibntxt\" id=\"payibntxt\" value=\"$payeeibancode\" onKeyPress=\"return keyRestrict(event,'1234567890+-'+String.fromCharCode(241))\"></td><td>Payee Account Number:</td><td><input type=\"text\" name=\"payaccountnumtxt1\" id=\"payaccountnumtxt\" value=\"$payeeaccountno\" onKeyPress=\"return keyRestrict(event,'1234567890+-'+String.fromCharCode(241))\"></td></tr>";
}
else {
print "<tr style=\"display:none\"><td>Payee Sort Code</td><td><input type=\"text\" name=\"paysortcodetxt\" id=\"paysortcodetxt\" value=\"\"></td><td>Payee Account Number</td><td><input type=\"text\" name=\"payaccountnumtxt\" id=\"payaccountnumtxt\" value=\"\" onKeyPress=\"return keyRestrict(event,'1234567890+-'+String.fromCharCode(241))\"></td>";
print "<tr style=\"display:none\"><td>Payee SWIFT-BIC Code</td><td><input type=\"text\" name=\"payswiftcodetxt\" id=\"payswiftcodetxt\" value=\"\" onKeyPress=\"return keyRestrict(event,'1234567890+-'+String.fromCharCode(241))\"></td><td>Branch Code</td><td><input type=\"text\"  name=\"branchcodetxt\" id=\"branchcodetxt\" value=\"\" onKeyPress=\"return keyRestrict(event,'1234567890+-'+String.fromCharCode(241))\"> </td></tr>";
print "<tr style=\"display:none\"><td>Payee IBAN Code</td><td><input type=\"text\" name=\"payibntxt\" id=\"payibntxt\" value=\"\"v onKeyPress=\"return keyRestrict(event,'1234567890+-'+String.fromCharCode(241))\"></td><td>Payee Account Number:</td><td><input type=\"text\" name=\"payaccountnumtxt1\" id=\"payaccountnumtxt\" value=\"\" onKeyPress=\"return keyRestrict(event,'1234567890+-'+String.fromCharCode(241))\"></td></tr>";
}

print "</table><br><br><table id=\"contactdeatils\" border=0 cellspacing=1 cellpadding=0>
<tr><th>Contact Person</th><th>Designation</th><th>E-mail</th><th>Mobile</th><th>Phone</th><th>Fax</th><th></th></tr>";
$seltot=mysql_query("select count(*) from contactdetails where recordid='$RecordId' and tablename='supplierdetails'");
$total=mysql_result($seltot,0);
if($total>0){ $index=0; $count=1;
$sel=mysql_query("select * from contactdetails where recordid='$RecordId' and tablename='supplierdetails'");
while($ar=mysql_fetch_array($sel)){
$contactperson=$ar['contactperson']; $designation=$ar['designation']; $email=$ar['email']; $mobileno=$ar['mobileno']; $phoneno=$ar['phoneno']; $faxno=$ar['faxno'];
if($count!=$total)
print "<tr>
<td><input type=\"text\" name=\"contactperson[$index]\" id=\"contactperson[$index]\" value=\"$contactperson\" onKeyPress=\"return keyRestrict(event,'abcdefghijklmnopqrstuvwxyz. '+String.fromCharCode(241))\"></td>
<td><input type=\"text\" name=\"designation[$index]\" id=\"designation[$index]\" value=\"$designation\" onKeyPress=\"return keyRestrict(event,'abcdefghijklmnopqrstuvwxyz. '+String.fromCharCode(241))\"></td>
<td><input type=\"text\" name=\"email[$index]\" id=\"email[$index]\" value=\"$email\" onKeyPress=\"return keyRestrict(event,'1234567890abcdefghijklmnopqrstuvwxyz-._@*'+String.fromCharCode(241))\"></td>
<td><input type=\"text\" name=\"mobile[$index]\" id=\"mobile[$index]\" value=\"$mobileno\" size=12 onKeyPress=\"return keyRestrict(event,'1234567890+-'+String.fromCharCode(241))\"></td>
<td><input type=\"text\" name=\"phone[$index]\" id=\"phone[$index]\" value=\"$phoneno\" size=17 onKeyPress=\"return keyRestrict(event,'1234567890+-'+String.fromCharCode(241))\"></td>
<td><input type=\"text\" name=\"fax[$index]\" id=\"fax[$index]\" value=\"$faxno\" size=17 onKeyPress=\"return keyRestrict(event,'1234567890+-'+String.fromCharCode(241))\"></td>
<td></td></tr>";
else  print "<tr>
<td><input type=\"text\" name=\"contactperson[$index]\" id=\"contactperson[$index]\" value=\"$contactperson\" onKeyPress=\"return keyRestrict(event,'abcdefghijklmnopqrstuvwxyz. '+String.fromCharCode(241))\"></td>
<td><input type=\"text\" name=\"designation[$index]\" id=\"designation[$index]\" value=\"$designation\" onKeyPress=\"return keyRestrict(event,'abcdefghijklmnopqrstuvwxyz. '+String.fromCharCode(241))\"></td>
<td><input type=\"text\" name=\"email[$index]\" id=\"email[$index]\" value=\"$email\" onKeyPress=\"return keyRestrict(event,'1234567890abcdefghijklmnopqrstuvwxyz-._@*'+String.fromCharCode(241))\"></td>
<td><input type=\"text\" name=\"mobile[$index]\" id=\"mobile[$index]\" value=\"$mobileno\" size=12 onKeyPress=\"return keyRestrict(event,'1234567890+-'+String.fromCharCode(241))\"></td>
<td><input type=\"text\" name=\"phone[$index]\" id=\"phone[$index]\" value=\"$phoneno\" size=17 onKeyPress=\"return keyRestrict(event,'1234567890+-'+String.fromCharCode(241))\"></td>
<td><input type=\"text\" name=\"fax[$index]\" id=\"fax[$index]\" value=\"$faxno\" size=17 onKeyPress=\"return keyRestrict(event,'1234567890+-'+String.fromCharCode(241))\"></td>
<td><a href=\"javascript:createRow();\">Add</a>&nbsp;&nbsp;<a href=\"javascript:deleteRow();\">Delete</a></td></tr>
<tr><td colspan=7 align=center><input type=\"submit\" id=\"btnupdate\" name=\"btnupdate\" onclick=\"return Bank_details_validation()\" value=\"Update\" class=\"buttonstatic\" >
&nbsp;&nbsp;&nbsp;<input type=\"submit\" id=\"btncancel\" name=\"btncancel\" value=\"Cancel\" class=\"buttonstatic\" ></td></tr></table><br>\n";
$index++; $count++; }  }
else
print "<tr>
<td><input type=\"text\" name=\"contactperson[0]\" value=\"\" id=\"contactperson[0]\" onKeyPress=\"return keyRestrict(event,'abcdefghijklmnopqrstuvwxyz. '+String.fromCharCode(241))\"></td>
<td><input type=\"text\" name=\"designation[0]\" value=\"\" id=\"designation[0]\" onKeyPress=\"return keyRestrict(event,'abcdefghijklmnopqrstuvwxyz. '+String.fromCharCode(241))\"></td>
<td><input type=\"text\" name=\"email[0]\" id=\"email[0]\" onKeyPress=\"return keyRestrict(event,'1234567890abcdefghijklmnopqrstuvwxyz-._@*'+String.fromCharCode(241))\"></td>
<td><input type=\"text\" name=\"mobile[0]\" id=\"mobile[0]\" size=12 onKeyPress=\"return keyRestrict(event,'1234567890+-'+String.fromCharCode(241))\"></td>
<td><input type=\"text\" name=\"phone[0]\" id=\"phone[0]\" size=17 onKeyPress=\"return keyRestrict(event,'1234567890+-'+String.fromCharCode(241))\"></td>
<td><input type=\"text\" name=\"fax[0]\" id=\"fax[0]\" size=17 onKeyPress=\"return keyRestrict(event,'1234567890+-'+String.fromCharCode(241))\"></td>
<td><a href=\"javascript:createRow();\">Add</a></td></tr>
<tr><td colspan=7 align=center><input type=\"submit\" id=\"btnupdate\" name=\"btnupdate\" onclick=\"return Bank_details_validation()\" value=\"Update\" class=\"buttonstatic\" >
&nbsp;&nbsp;&nbsp;<input type=\"submit\" id=\"btncancel\" name=\"btncancel\" value=\"Cancel\" class=\"buttonstatic\" ></td></tr>";
}
}
}

function MainForm()
{
$con=mysql_connect("192.168.15.24","root","admin"); $db=mysql_select_db("heos",$con);
print"<form action=\"supplierdetails.php\" method=\"post\" name=\"SupplierDetails\">
<table id=\"maintable\" border=0 cellspacing=1 cellpadding=0>
<tr><th colspan=4>Supplier Details</th></tr><tr>
<td>Supplier Name</td><td><input type=\"text\" name=\"suppliername\" id=\"suppliername\" onKeyPress=\"return keyRestrict(event,'abcdefghijklmnopqrstuvwxyz. '+String.fromCharCode(241))\"/> </td>
<td>Supplier Id</td><td><input type=\"text\" name=\"supplierid\" id=\"supplierid\" onChange=\"return xajax_SuppId(document.getElementById('customerid').value);\" onKeyPress=\"return keyRestrict(event,'abcdefghijklmnopqrstuvwxyz1234567890'+String.fromCharCode(241))\"></td>
</tr>
<tr><td>Supplier Address</td><td><textarea name=\"supplieraddress\" id=\"supplieraddress\"></textarea></td>
<td>Nominal Codes</td><td><table border=0 cellspacing=0 cellpadding=0><tr><td>
<select multiple name=\"coursecodelist1\" id=\"coursecodelist1\" size=5>";
$selectcoursecode=("select * from nominalcodes order by nominalcode");
$result=mysql_query($selectcoursecode,$con);
while($re=mysql_fetch_array($result)){ $SubjectCode=$re["nominalcode"]; $SubjectName=$re["nominalname"];
print"<option value=\"$SubjectName\">$SubjectName --$SubjectCode</option><br>"; }
print "</select></td><td><input type=\"button\" value=\"---->\" onClick=\"moveForward();\" class=\"buttonstatic\" ><br>
<br><input type=\"button\" value=\"<----\" onClick=\"moveBackward();\" class=\"buttonstatic\" >
</td><td><select name=\"coursecodelist2\" id=\"coursecodelist2\" size=5></select><input type=\"hidden\" name=\"list\" id=\"list\"></td></tr></table></td></tr>
<tr class=\"label\"><td>Supplier Mode of Payment</td><td colspan=3><select name=\"supplierModeOfPayComb\" id=\"AgentModeOfPayComb\" onchange=\"hideAgentpayments(this);\">
<option value=\"--Select--\">--Select--</option><option value=\"Cheque\">Cheque</option><option value=\"Demand Draft\">Demand Draft</option><option value=\"UK Bank Transfer\">UK Bank Transfer</option><option value=\"International Bank Transfer\">International Bank Transfer</option>
</select></td></tr>
<tr style=\"display:none\"><td>Payable to</td><td><input type=\"text\" name=\"paytotxt\" id=\"paytotxt\" value=\"\"></td><td>Payable at</td><td><input type=\"text\" name=\"payattxt\" id=\"payattxt\" value=\"\"></td></tr>
<tr style=\"display:none\"><td>Payee Name</td><td><input type=\"text\" name=\"paynametxt\" id=\"paynametxt\" value=\"\"></td><td>Payee Bank Name</td><td><input type=\"text\" name=\"paybanknametxt\" id=\"paybanknametxt\" value=\"\"></td></tr>
<tr style=\"display:none\"><td>Payee Holding Bank Branch</td><td><input type=\"text\" name=\"payholdbanktxt\" id=\"payholdbanktxt\" value=\"\"></td><td>Payee Bank Address</td><td><textarea class=\"textarea\"  name=\"paybankaddresstxt\" id=\"paybankaddresstxt\"></textarea></td></tr>
<tr style=\"display:none\"><td>Payee Sort Code</td><td><input type=\"text\" name=\"paysortcodetxt\" id=\"paysortcodetxt\" value=\"\"></td><td>Payee Account Number</td><td><input type=\"text\" name=\"payaccountnumtxt\" id=\"payaccountnumtxt\" value=\"\" onKeyPress=\"return keyRestrict(event,'1234567890+-'+String.fromCharCode(241))\"></td>
<tr style=\"display:none\"><td>Payee SWIFT-BIC Code</td><td><input type=\"text\" name=\"payswiftcodetxt\" id=\"payswiftcodetxt\" value=\"\" onKeyPress=\"return keyRestrict(event,'1234567890+-'+String.fromCharCode(241))\"></td><td>Branch Code</td><td><input type=\"text\"  name=\"branchcodetxt\" id=\"branchcodetxt\" value=\"\" onKeyPress=\"return keyRestrict(event,'1234567890+-'+String.fromCharCode(241))\"> </td></tr>
<tr style=\"display:none\"><td>Payee IBAN Code</td><td><input type=\"text\" name=\"payibntxt\" id=\"payibntxt\" value=\"\"v onKeyPress=\"return keyRestrict(event,'1234567890+-'+String.fromCharCode(241))\"></td><td>Payee Account Number:</td><td><input type=\"text\" name=\"payaccountnumtxt1\" id=\"payaccountnumtxt\" value=\"\" onKeyPress=\"return keyRestrict(event,'1234567890+-'+String.fromCharCode(241))\"></td></tr>
</table><br><br><table id=\"contactdeatils\" border=0 cellspacing=1 cellpadding=0>
<tr><th>Contact Person</th><th>Designation</th><th>E-mail</th><th>Mobile</th><th>Phone</th><th>Fax</th><th></th></tr>
<tr>
<td><input type=\"text\" name=\"contactperson[0]\" value=\"\" id=\"contactperson[0]\" onKeyPress=\"return keyRestrict(event,'abcdefghijklmnopqrstuvwxyz. '+String.fromCharCode(241))\"></td>
<td><input type=\"text\" name=\"designation[0]\" value=\"\" id=\"designation[0]\" onKeyPress=\"return keyRestrict(event,'abcdefghijklmnopqrstuvwxyz. '+String.fromCharCode(241))\"></td>
<td><input type=\"text\" name=\"email[0]\" id=\"email[0]\" onKeyPress=\"return keyRestrict(event,'1234567890abcdefghijklmnopqrstuvwxyz-._@*'+String.fromCharCode(241))\"></td>
<td><input type=\"text\" name=\"mobile[0]\" id=\"mobile[0]\" size=12 onKeyPress=\"return keyRestrict(event,'1234567890+-'+String.fromCharCode(241))\"></td>
<td><input type=\"text\" name=\"phone[0]\" id=\"phone[0]\" size=17 onKeyPress=\"return keyRestrict(event,'1234567890+-'+String.fromCharCode(241))\"></td>
<td><input type=\"text\" name=\"fax[0]\" id=\"fax[0]\" size=17 onKeyPress=\"return keyRestrict(event,'1234567890+-'+String.fromCharCode(241))\"></td>
<td><a href=\"javascript:createRow();\">Add</a></td></tr>
<tr><td align=\"center\" colspan=7>
<input type=\"submit\" name=\"AddButton\" id=\"AddButton\" onclick=\"return agent_details_validation();\" class=\"buttonstatic\" value=\"Add\" ></td></tr></table></form>";
}
function EditForm($RecordId,$CustomerId,$CustomerName,$CustomerAddress,$ContactPerson,$CustomerPhoneNumber,$CustomerFaxNumber,$CustomerEmailId,$AccountNumber,$BankName,$BranchName,$ProductDetails)
{
//$AddressLine = explode("+", $CustomerAddress);
}

?>
</body></html>
