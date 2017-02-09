<?php
session_start();
?>
<html><head>
<script language="javascript" type="text/javascript" src="../ScriptsMasterScript.js"></script>
<script language="javascript" type="text/javascript" src="../Scripts/datetimepicker.js"></script>
<link href="../Style/heoscss.css" rel="stylesheet" type="text/css">
<title>Bank Details</title>
<meta http-equiv="Page-Exit" content="revealTrans(Duration=0.5,Transition=22)">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<script language="javascript">
function setOpnbalance(obj){
document.getElementById('opnbalance').value=parseFloat(obj).toFixed(2);
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
c4.innerHTML="<input type=\"text\" name=\"mobile["+arindex+"]\" id=\"mobile["+arindex+"]\">";
c5.innerHTML="<input type=\"text\" name=\"phone["+arindex+"]\" id=\"phone["+arindex+"]\">";
c6.innerHTML="<input type=\"text\" name=\"fax["+arindex+"]\" id=\"fax["+arindex+"]\">";
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
if(dtobj.length==3){
cobj=document.getElementById('contactdeatils').rows[prerow].cells;
cobj[6].innerHTML='<a href=\"javascript:createRow();\">Add</a>';
}
}
function deleteSingleRow(drow){ document.getElementById('contactdeatils').deleteRow(drow); }
function alertme(obj){ alert(obj.name); }
</script>
</head><body onload="self.focus();">

<?php
/////////////////////////////////Loop to Display forms For Onload//////////////////////////////////////////////
//include "MasterAjax.php"; php $xajax->printJavascript();

if(!isset($_POST['editButton']) && !isset($_POST['cancelButton']) && !isset($_POST['deleteButton']) && !isset($_POST['updateButton']) && !isset($_POST['AddButton']))
{
$_SESSION['editreference']="";
$_SESSION['updatereference']="";
MainForm();
BankDetailsFill();
}
////////////////////////////////    End of Loop     /////////////////////////////////////////////////////////
/////////////////////////////////Function For Paging fill Table//////////////////////////////////////////////

function BankDetailsFill()
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
if(!isset($_SESSION['pagevalueforBankDetails']))
{
$page=1;
$_SESSION['pagevalueforBankDetails']=$page;
fillPage($page);
}
else
{
$page=$_SESSION['pagevalueforBankDetails'];
$_SESSION['pagevalueforBankDetails']=$page;
}
}
else
{
$page=$_SESSION['pagevalueforBankDetails'];
fillPage($page);
}
}
else
{
$page = $_GET['page'];
$_SESSION['pagevalueforBankDetails']=$page;
fillPage($page);
}
}
////////////////////////////////    End of Function     ////////////////////////////////////////////
/////////////////////////////////Action For Add Button//////////////////////////////////////////////

if(isset($_POST['AddButton']))
{
$f2=trim($_POST['accountnumber']);
$f3=trim($_POST['accountname']);
$f4=trim($_POST['opnbalance']);
$f5=trim($_POST['bankname']);
$f6=trim($_POST['branchname']);
$f7=trim($_POST['sortcode']);
$f8=trim($_POST['bankaddress']);
$f9=trim($_POST['opendate']);  $f9=date('Y-m-d',strtotime($f9));
$f10=trim($_POST['balancedate']);  $f10=date('Y-m-d',strtotime($f10));

$f11=$_POST['contactperson'];
$f12=$_POST['designation'];
$f13=$_POST['email'];
$f14=$_POST['mobile'];
$f15=$_POST['phone'];
$f16=$_POST['fax'];

$f5 = ucfirst($f5);
$f6 = ucfirst($f6);
$f3 = ucfirst($f3);

$con=mysql_connect("192.168.15.24","root","admin"); $db=mysql_select_db("heos",$con);

$query=mysql_query("select count(accountnumber) from bankdetails where accountnumber='$f2' and bankname='$f5'",$con);
$AccountCount=mysql_result($query,0);

if($AccountCount==0)
{
$query=mysql_query("insert into bankdetails values('0','$f2','$f3','$f4','$f5','$f6','$f7','$f8','$f9','$f10')",$con);
$sel=mysql_query("select recordid from bankdetails"); while($ar=mysql_fetch_array($sel)){ $recordid=$ar['recordid']; }
foreach($f11 as $k=>$value){
if(!empty($value)){ $designation=$f12[$k]; $email=$f13[$k]; $mobile=$f14[$k]; $phone=$f15[$k]; $fax=$f16[$k];
$contact=mysql_query("insert into contactdetails values('0','$recordid','bankdetails','$value','$designation','$email','$mobile','$phone','$fax')");
} }
$tname=$f5.$f2; $tname=str_replace(' ','_',$tname);
$querybalance=mysql_query("insert into balance values('0','$f2','$f3','$f5','$f6','$f4','$f4','$f9','$f4','$f9','$tname')",$con);
$querynew=mysql_query("DROP TABLE IF EXISTS `$tname`",$con);
$querynew1=mysql_query("CREATE TABLE $tname (`recordid` BIGINT( 100 ) UNSIGNED NOT NULL AUTO_INCREMENT,`crdr` VARCHAR( 50 ) DEFAULT NULL,`remarks` VARCHAR( 200 ) DEFAULT NULL,`currentdate` DATE DEFAULT NULL,`amount` DOUBLE DEFAULT NULL,`balance` DOUBLE DEFAULT NULL,PRIMARY KEY ( `recordid` ))",$con);
if($query) echo "<script type=\"text/javascript\">alert(\"Successive Done\")</script>"; else echo "<script type=\"text/javascript\">alert(\"Error\")</script>";
if($querybalance) echo "<script type=\"text/javascript\">alert(\"Successive Done\")</script>"; else echo "<script type=\"text/javascript\">alert(\"Error\")</script>";
if($querynew1) echo "<script type=\"text/javascript\">alert(\"Successive Done\")</script>"; else echo "<script type=\"text/javascript\">alert(\"Error\")</script>";
MainForm();
BankDetailsFill();
}
else
{
echo "<script type=\"text/javascript\">alert(\"Bank Name And Account Number Already Exist\")</script>";
MainForm();
BankDetailsFill();
}
}
////////////////////////////////      End of Add Button Action     ////////////////////////////////////////////////////
/////////////////////////////////Function To Fill Datas in Table///////////////////////////////////////////////////////

function fillPage($page)
{
@$cat=$_GET['cat'];
$_SESSION['pagevalueforBankDetails']=$page;
$page  = (int) $page;
$limit = 5;
$con=mysql_connect("192.168.15.24","root","admin");
$db=mysql_select_db("heos",$con);
$result = mysql_query("select count(*) from bankdetails",$con);
$total = mysql_result($result, 0);
$pager  = getPagerData($total, $limit, $page);
if($total==0) { $offset=0; } else { $offset = $pager->offset; }
$limit  = $pager->limit;
$page   = $pager->page;

$querySelectBankDetails="select * from bankdetails order by accountname limit $offset,$limit";
$querySelectBankDetailsExec=mysql_query($querySelectBankDetails,$con);
print "<form method=\"post\"><table border=0 cellspacing=1 cellpadding=0>
<tr><th>S.No</th><th>Account Number</th><th>Account Name</th><th>Balance</th><th>Bank Name</th><th>Branch Name</th><th>Sort Code</th><th>&nbsp;</th></tr>\n";
$sno=1;

while($Fetch=mysql_fetch_array($querySelectBankDetailsExec))
{
$RecordId=$Fetch["recordid"];
$AccountNumber=$Fetch["accountnumber"];
$AccountName=$Fetch["accountname"];
$Balance=$Fetch["openingbalance"];
$BankName=$Fetch["bankname"];
$branchname=$Fetch["branchname"];
$SortCode=$Fetch["sortcode"];

$ToEdit = array($AccountNumber, $BankName, $branchname);
$ToEditFinal=  implode("", $ToEdit);
$ToDeleteFinal = implode("_", $ToEdit);
print "<tr><td name=d[] value=\"$sno\">$sno</td>
<td>$AccountNumber</td><td>$AccountName</td><td>$Balance</td><td>$BankName</td><td>$branchname</td><td>$SortCode</td>
<input type=\"hidden\" name=\"RecordId[]\" value=\"$RecordId\">
<td><input type=\"submit\" id=\"editButton\" name=\"editButton[$ToEditFinal]\" value=\"Edit\" class=\"buttonstatic\" onmouseover=\"changeimage(this,'buttonover');\" onmouseout=\"changeimage(this,'buttonstatic');\">
&nbsp;<input type=\"submit\" id=\"deleteButton\" name=\"deleteButton[$ToDeleteFinal]\"  value=\"Delete\" class=\"buttonstatic\" onmouseover=\"changeimage(this,'buttonover');\" onmouseout=\"changeimage(this,'buttonstatic');\">
</td></tr>\n";
$sno=$sno+1;
}
print "<tr><td align=\"center\" colspan=\"9\">\n";
if ($page == 1) echo "Previous"; else echo "<a href=\"BankDetails.php?page=" . ($page - 1) . "\">Previous</a>";
print " ||  \n";
if ($page == $pager->numPages) // this is the last page - there is no next page
echo "Next";
else            // not the last page, link to the next page
echo "<a href=\"BankDetails.php?page=" . ($page + 1) . "\">Next</a>";
print "<br>$page page of $pager->numPages pages</td></tr></table></form>\n";
}
////////////////////////////////      End of Function     /////////////////////////////////////////////////////////////
/////////////////////////////////Function To Set Page Limit////////////////////////////////////////////////////////////

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
////////////////////////////////      End of Function     /////////////////////////////////////////////////////////////
/////////////////////////////////Action For Delete Button////////////////////////////////////////////////////////////////

if(isset($_POST['deleteButton']))
{
MainForm();
deletefill();
$BankDetailsfordelete=$_POST['deleteButton'];
$_SESSION['BankDetailsfordelete']=$BankDetailsfordelete;
echo "<script langauge=\"javascript\">var result=confirm('Are You Sure Want to Delete');if(result){val='delete';self.location='BankDetails.php?cat=' + val;}else{val='dontdelete';self.location='BankDetails.php?cat=' + val;}</script>";
}
////////////////////////////////           End of Action     /////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////Function to fill table when Delete Button clicked////////////////////////////////////////////////////////////////

function deletefill()
{
$page=$_SESSION['pagevalueforBankDetails'];
fillpage($page);
}
////////////////////////////////           End of Function   /////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////    Delete Action Performed Here/////////////////////////////////////////////////////////////////////////////////

@$cat=$_GET['cat'];
if(isset($cat) and strlen($cat) == 6)
{
$BankDetailsfordelete=$_SESSION['BankDetailsfordelete'];
$BankDetailsarray=array_keys($BankDetailsfordelete);
$DeleteVariables = explode("_", $BankDetailsarray[0]);
$AccountNumber=$DeleteVariables[0];
$BankName=$DeleteVariables[1];
$BranchName=$DeleteVariables[2];
$total=0;$balance=1;

$con=mysql_connect("192.168.15.24","root","admin"); $db=mysql_select_db("heos",$con);
$queryforAccountNo=mysql_query("select count(accountnumber) from balance where accountnumber='$AccountNumber'",$con);
$BalanceTable=mysql_result($queryforAccountNo,0);

$querySelectTotBal="select total,balance from balance where accountnumber='$AccountNumber' and bankname='$BankName' and branchname='$BranchName'";
$querySelectTotBalExec=mysql_query($querySelectTotBal,$con);

while($ExecEdit=mysql_fetch_array($querySelectTotBalExec))
{
$balance=$ExecEdit["balance"];
$total=$ExecEdit["total"];
}

if($balance==$total || $BalanceTable == 0)
{
$queryBankDetailsDelete1=mysql_query("delete from balance where accountnumber='$BankDetailsarray[0]' and bankname='$BankName' and branchname='$BranchName'",$con);
$queryCourseDelete=mysql_query("delete from bankdetails where accountnumber='$BankDetailsarray[0]' and bankname='$BankName'",$con);
echo "<script type=\"text/javascript\">alert(\"Successfully Deleted\")</script>";
$page=$_SESSION['pagevalueforBankDetails'];
fillpage($page);
}
else
{
echo "<script type=\"text/javascript\">alert(\"Failed to Delete,Amount in Use\")</script>";
$page=$_SESSION['pagevalueforBankDetails'];
fillpage($page);
}
}
else if(isset($cat) and strlen($cat) == 10)
{
$page=$_SESSION['pagevalueforBankDetails'];
fillpage($page);
}
////////////////////////////////      End of Loop     /////////////////////////////////////////////////////////////////
/////////////////////////////////Action For Edit Button////////////////////////////////////////////////////////////////

if(isset($_POST['editButton']))
{
$presentcount=$_POST['editButton'];
$_SESSION['BankDetailsafteredit']=$presentcount;
editFill();
}
////////////////////////////////      End of Action     /////////////////////////////////////////////////////////////////
/////////////////////////////////Action For Cancel Button////////////////////////////////////////////////////////////////

if(isset($_POST['btncancel']))
{
$page=$_SESSION['pagevalueforBankDetails'];
}

////////////////////////////////      End of Action     /////////////////////////////////////////////////////////////////
/////////////////////////////////Action For Update Button////////////////////////////////////////////////////////////////

if(isset($_POST['btnupdate']))
{
$flag=0;
$RecordId=(trim($_POST['RecordId']));

$f2=trim($_POST['accountnumber']);
$f3=trim($_POST['accountname']);
$f4=trim($_POST['opnbalance']);
$f5=trim($_POST['bankname']);
$f6=trim($_POST['branchname']);
$f7=trim($_POST['sortcode']);
$f8=trim($_POST['bankaddress']);
$f9=trim($_POST['opendate']);  $f9=date('Y-m-d',strtotime($f9));
$f10=trim($_POST['balancedate']);  $f10=date('Y-m-d',strtotime($f10));

$f11=$_POST['contactperson'];
$f12=$_POST['designation'];
$f13=$_POST['email'];
$f14=$_POST['mobile'];
$f15=$_POST['phone'];
$f16=$_POST['fax'];

$f5 = ucfirst($f5);
$f6 = ucfirst($f6);
$f3 = ucfirst($f3);

$con=mysql_connect("192.168.15.24","root","admin"); $db=mysql_select_db("heos",$con);

$queryBankDetailsUpdate=mysql_query("update bankdetails set accountname='$f3',openingbalance='$f4',branchname='$f6',sortcode='$f7',branchaddress='$f8' where accountnumber='$f2' and bankname='$f5'",$con);
$querySelectBalance1="select * from balance where accountnumber='$f2' and bankname='$f5'";
$querySelectBalance1Exec=mysql_query($querySelectBalance1,$con);

while($ExecEdit=mysql_fetch_array($querySelectBalance1Exec))
{
$recordid=$ExecEdit["recordid"];
$balance=$ExecEdit["balance"];
$curdate=$ExecEdit["curdate"];
}
$queryupdatebalance=mysql_query("update balance set balance='$f4',curdate='$f9',lastbalance='$balance',lastdate='$curdate' where recordid='$recordid'",$con);
$delcon=mysql_query("delete from contactdetails where recordid='$RecordId' and tablename='bankdetails'");

foreach($f11 as $k=>$value){
if(!empty($value)){ $designation=$f12[$k]; $email=$f13[$k]; $mobile=$f14[$k]; $phone=$f15[$k]; $fax=$f16[$k];
$contact=mysql_query("insert into contactdetails values('0','$RecordId','bankdetails','$value','$designation','$email','$mobile','$phone','$fax')");
} }
echo "<script type=\"text/javascript\">alert(\"Updated Successfully\")</script>";
}

//////////////////////////////////////////////////        End of Action     ////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////Function to fill datas in table when Edit Button is Clicked////////////////////////////////////////////////////////////////

function editFill()
{
$page=$_SESSION['pagevalueforBankDetails'];
$limit = 5;
$con=mysql_connect("192.168.15.24","root","admin");
$db=mysql_select_db("heos",$con);
$result =mysql_query("select count(*) from bankdetails",$con);
$total = mysql_result($result, 0);
$pager  = getPagerData($total, $limit, $page);
$offset = $pager->offset;
$limit  = $pager->limit;
$page   = $pager->page;

$arrayBankDetails=$_SESSION['BankDetailsafteredit'];
$querySelectBankDetails1 ="select * from bankdetails order by accountname limit $offset,$limit";
$querySelectBankDetails1Exec=mysql_query($querySelectBankDetails1,$con);

print "<form method=\"post\">
<table border=0 cellspacing=1 cellpadding=0>\n";

while($ExecEdit=mysql_fetch_array($querySelectBankDetails1Exec))
{
$recordid=$ExecEdit["recordid"];
$accountnumber=$ExecEdit["accountnumber"];
$accountname=$ExecEdit["accountname"];
$balance=$ExecEdit["openingbalance"];
$bankname=$ExecEdit["bankname"];
$branchname=$ExecEdit["branchname"];
$sortcode=$ExecEdit["sortcode"];
$branchaddress=$ExecEdit["branchaddress"];
$opendate=$ExecEdit["openingdate"];  $opendate=date('d-M-Y',strtotime($opendate));
$BalanceDate=$ExecEdit["BalanceDate"]; $BalanceDate=date('d-M-Y',strtotime($BalanceDate));

$ForEdit = array($accountnumber, $bankname, $branchname);
$ForEditFinal=  implode("", $ForEdit);

if(array_key_exists($ForEditFinal,$arrayBankDetails))
{
$con=mysql_connect("192.168.15.24","root","admin");
$db=mysql_select_db("heos",$con);
$queryselectBankDetails1 =mysql_query("select recordid from bankdetails where accountnumber='$accountnumber'",$con);
$recordid1 = mysql_result($queryselectBankDetails1, 0);
print"<form align=\"center\" name=\"BankDetails\" method=\"post\">
<table border=0 cellspacing=1 cellpadding=0>
<tr><th colspan=6>New Bank Account Edit<input type=\"hidden\" name=\"RecordId\" value=\"$recordid\"></th></tr>
<tr><td>Account Name</td><td><input type=\"text\" name=\"accountname\" id=\"accountname\" Maxlength=\"35\" onKeyPress=\"return keyRestrict(event,'abcdefghijklmnopqrstuvwxyz. '+String.fromCharCode(241))\" value=\"$accountname\"></td>
<td>Bank Name</td><td><input type=\"text\" name=\"bankname\" id=\"bankname\" Maxlength=\"30\" readonly onKeyPress=\"return keyRestrict(event,'abcdefghijklmnopqrstuvwxyz.& '+String.fromCharCode(241))\" value=\"$bankname\"></td>
<td>Holding Branch</td><td><input type=\"text\" name=\"branchname\" id=\"branchname\" Maxlength=\"40\" onKeyPress=\"return keyRestrict(event,'abcdefghijklmnopqrstuvwxyz.& '+String.fromCharCode(241))\" value=\"$branchname\"></td></tr>
<tr><td>Bank Address</td><td><textarea name=\"bankaddress\" id=\"bankaddress\" cols=\"30\" rows=\"4\">$branchaddress</textarea></td>
<td>Sort Code</td><td><input type=\"text\" class=\"size8\" name=\"sortcode\" id=\"sortcode\" size=8 maxlength=8 onKeyup=\"sFun1();\" onKeyPress=\"return keyRestrict(event,'1234567890-'+String.fromCharCode(241))\" value=\"$sortcode\"></td>
<td>Account Number</td><td><input type=\"text\" name=\"accountnumber\" id=\"accountnumber\" Maxlength=\"18\" readonly onKeyPress=\"return keyRestrict(event,'1234567890'+String.fromCharCode(241))\" value=\"$accountnumber\"></td></tr>
<tr><td>Date opened</td><td><input type=\"text\" class=\"date\" name=\"opendate\" id=\"opendate\" size=13 readonly value=\"$opendate\"></td>
<td>Opning Balance</td><td><input type=\"text\" name=\"opnbalance\" id=\"opnbalance\" Maxlength=\"20\" onKeyPress=\"return keyRestrict(event,'0123456789.'+String.fromCharCode(241))\" onchange=\"setOpnbalance(this.value)\" value=\"$balance\"></td>
<td>Balance Date</td><td><input type=\"text\" class=\"date\" name=\"balancedate\" id=\"balancedate\" size=13 readonly value=\"$BalanceDate\"></td></tr></table>
<br><br><table id=\"contactdeatils\" border=0 cellspacing=1 cellpadding=0>
<tr><th>Contact Person</th><th>Designation</th><th>E-mail</th><th>Mobile</th><th>Phone</th><th>Fax</th><th></th></tr>";
$seltot=mysql_query("select count(*) from contactdetails where recordid='$recordid' and tablename='bankdetails'");
$total=mysql_result($seltot,0);
if($total>0){
$index=0; $count=1;
$sel=mysql_query("select * from contactdetails where recordid='$recordid' and tablename='bankdetails'");
while($ar=mysql_fetch_array($sel)){
$contactperson=$ar['contactperson']; $designation=$ar['designation']; $email=$ar['email'];
$mobileno=$ar['mobileno']; $phoneno=$ar['phoneno']; $faxno=$ar['faxno'];
if($count!=$total){
print "<tr>
<td><input type=\"text\" name=\"contactperson[$index]\" id=\"contactperson[$index]\" value=\"$contactperson\" onKeyPress=\"return keyRestrict(event,'abcdefghijklmnopqrstuvwxyz. '+String.fromCharCode(241))\"></td>
<td><input type=\"text\" name=\"designation[$index]\" id=\"designation[$index]\" value=\"$designation\" onKeyPress=\"return keyRestrict(event,'abcdefghijklmnopqrstuvwxyz. '+String.fromCharCode(241))\"></td>
<td><input type=\"text\" name=\"email[$index]\" id=\"email[$index]\" value=\"$email\" onKeyPress=\"return keyRestrict(event,'1234567890abcdefghijklmnopqrstuvwxyz-._@*'+String.fromCharCode(241))\"></td>
<td><input type=\"text\" name=\"mobile[$index]\" id=\"mobile[$index]\" value=\"$mobileno\" onKeyPress=\"return keyRestrict(event,'1234567890+-'+String.fromCharCode(241))\"></td>
<td><input type=\"text\" name=\"phone[$index]\" id=\"phone[$index]\" value=\"$phoneno\" onKeyPress=\"return keyRestrict(event,'1234567890+-'+String.fromCharCode(241))\"></td>
<td><input type=\"text\" name=\"fax[$index]\" id=\"fax[$index]\" value=\"$faxno\" onKeyPress=\"return keyRestrict(event,'1234567890+-'+String.fromCharCode(241))\"></td>
<td></td></tr>"; }
else  { print "<tr>
<td><input type=\"text\" name=\"contactperson[$index]\" id=\"contactperson[$index]\" value=\"$contactperson\" onKeyPress=\"return keyRestrict(event,'abcdefghijklmnopqrstuvwxyz. '+String.fromCharCode(241))\"></td>
<td><input type=\"text\" name=\"designation[$index]\" id=\"designation[$index]\" value=\"$designation\" onKeyPress=\"return keyRestrict(event,'abcdefghijklmnopqrstuvwxyz. '+String.fromCharCode(241))\"></td>
<td><input type=\"text\" name=\"email[$index]\" id=\"email[$index]\" value=\"$email\" onKeyPress=\"return keyRestrict(event,'1234567890abcdefghijklmnopqrstuvwxyz-._@*'+String.fromCharCode(241))\"></td>
<td><input type=\"text\" name=\"mobile[$index]\" id=\"mobile[$index]\" value=\"$mobileno\" onKeyPress=\"return keyRestrict(event,'1234567890+-'+String.fromCharCode(241))\"></td>
<td><input type=\"text\" name=\"phone[$index]\" id=\"phone[$index]\" value=\"$phoneno\" onKeyPress=\"return keyRestrict(event,'1234567890+-'+String.fromCharCode(241))\"></td>
<td><input type=\"text\" name=\"fax[$index]\" id=\"fax[$index]\" value=\"$faxno\" onKeyPress=\"return keyRestrict(event,'1234567890+-'+String.fromCharCode(241))\"></td>
<td><a href=\"javascript:createRow();\">Add</a>&nbsp;&nbsp;<a href=\"javascript:deleteRow();\">Delete</a></td></tr>
<tr><td colspan=7 align=center><input type=\"submit\" id=\"btnupdate\" name=\"btnupdate\" onclick=\"return Bank_details_validation()\" value=\"Update\" class=\"buttonstatic\" onmouseover=\"changeimage(this,'buttonover');\" onmouseout=\"changeimage(this,'buttonstatic');\">
&nbsp;&nbsp;&nbsp;<input type=\"submit\" id=\"btncancel\" name=\"btncancel\" value=\"Cancel\" class=\"buttonstatic\" onmouseover=\"changeimage(this,'buttonover');\" onmouseout=\"changeimage(this,'buttonstatic');\"></td></tr></table><br>\n";
}
$index++; $count++; } }
else
print "<tr>
<td><input type=\"text\" name=\"contactperson[0]\" value=\"\" id=\"contactperson[0]\" onKeyPress=\"return keyRestrict(event,'abcdefghijklmnopqrstuvwxyz. '+String.fromCharCode(241))\"></td>
<td><input type=\"text\" name=\"designation[0]\" value=\"\" id=\"designation[0]\" onKeyPress=\"return keyRestrict(event,'abcdefghijklmnopqrstuvwxyz. '+String.fromCharCode(241))\"></td>
<td><input type=\"text\" name=\"email[0]\" id=\"email[0]\" onKeyPress=\"return keyRestrict(event,'1234567890abcdefghijklmnopqrstuvwxyz-._@*'+String.fromCharCode(241))\"></td>
<td><input type=\"text\" name=\"mobile[0]\" id=\"mobile[0]\" onKeyPress=\"return keyRestrict(event,'1234567890+-'+String.fromCharCode(241))\"></td>
<td><input type=\"text\" name=\"phone[0]\" id=\"phone[0]\" onKeyPress=\"return keyRestrict(event,'1234567890+-'+String.fromCharCode(241))\"></td>
<td><input type=\"text\" name=\"fax[0]\" id=\"fax[0]\" onKeyPress=\"return keyRestrict(event,'1234567890+-'+String.fromCharCode(241))\"></td>
<td><a href=\"javascript:createRow();\">Add</a></td></tr>
<tr><td colspan=7 align=center><input type=\"submit\" id=\"btnupdate\" name=\"btnupdate\" onclick=\"return Bank_details_validation()\" value=\"Update\" class=\"buttonstatic\" onmouseover=\"changeimage(this,'buttonover');\" onmouseout=\"changeimage(this,'buttonstatic');\">
&nbsp;&nbsp;&nbsp;<input type=\"submit\" id=\"btncancel\" name=\"btncancel\" value=\"Cancel\" class=\"buttonstatic\" onmouseover=\"changeimage(this,'buttonover');\" onmouseout=\"changeimage(this,'buttonstatic');\"></td></tr>";
}
}
print "</table></form>\n";
}
////////////////////////////////      End of Function   /////////////////////////////////////////////////////////////////
/////////////////////////////////Main Form in A function/////////////////////////////////////////////////////////////////

function MainForm()
{
print"<form align=\"center\" name=\"BankDetails\" method=\"post\">
<table border=0 cellspacing=1 cellpadding=0>
<tr><th colspan=6>New Bank Account</th></tr>
<tr><td>Account Name</td><td><input type=\"text\" name=\"accountname\" id=\"accountname\" Maxlength=\"35\" onKeyPress=\"return keyRestrict(event,'abcdefghijklmnopqrstuvwxyz. '+String.fromCharCode(241))\"></td>
<td>Bank Name</td><td><input type=\"text\" name=\"bankname\" id=\"bankname\" Maxlength=\"30\" onKeyPress=\"return keyRestrict(event,'abcdefghijklmnopqrstuvwxyz.& '+String.fromCharCode(241))\"></td>
<td>Holding Branch</td><td><input type=\"text\" name=\"branchname\" id=\"branchname\" Maxlength=\"40\" onKeyPress=\"return keyRestrict(event,'abcdefghijklmnopqrstuvwxyz.& '+String.fromCharCode(241))\"></td></tr>
<tr><td>Bank Address</td><td><textarea name=\"bankaddress\" id=\"bankaddress\"></textarea></td>
<td>Sort Code</td><td><input type=\"text\" class=\"size8\" name=\"sortcode\" id=\"sortcode\" size=8 maxlength=8 onKeyup=\"sFun1();\" onKeyPress=\"return keyRestrict(event,'1234567890-'+String.fromCharCode(241))\"></td>
<td>Account Number</td><td><input type=\"text\" name=\"accountnumber\" id=\"accountnumber\" Maxlength=\"18\" onKeyPress=\"return keyRestrict(event,'1234567890'+String.fromCharCode(241))\"></td></tr>
<tr><td>Date opened</td><td><input type=\"text\" class=\"date\" name=\"opendate\" id=\"opendate\" size=13 readonly>
<a href=\"javascript:NewCal('opendate','ddmmmyyyy')\"><img src=\"../Images/cal.gif\" alt=\"Pick a date\" width=\"16\" height=\"16\" border=\"0\"></a></td>
<td>Opning Balance</td><td><input type=\"text\" name=\"opnbalance\" id=\"opnbalance\" value=\"0.00\" Maxlength=\"20\" onKeyPress=\"return keyRestrict(event,'0123456789.'+String.fromCharCode(241))\" onchange=\"setOpnbalance(this.value)\"></td>
<td>Balance Date</td><td><input type=\"text\" class=\"date\" name=\"balancedate\" id=\"balancedate\" size=13 readonly>
<a href=\"javascript:NewCal('balancedate','ddmmmyyyy')\"><img src=\"../Images/cal.gif\" alt=\"Pick a date\" width=\"16\" height=\"16\" border=\"0\"></a></td></tr></table>
<br><br><table id=\"contactdeatils\" border=0 cellspacing=1 cellpadding=0>
<tr><th>Contact Person</th><th>Designation</th><th>E-mail</th><th>Mobile</th><th>Phone</th><th>Fax</th><th></th></tr>
<tr>
<td><input type=\"text\" name=\"contactperson[0]\" value=\"\" id=\"contactperson[0]\" onKeyPress=\"return keyRestrict(event,'abcdefghijklmnopqrstuvwxyz. '+String.fromCharCode(241))\"></td>
<td><input type=\"text\" name=\"designation[0]\" value=\"\" id=\"designation[0]\" onKeyPress=\"return keyRestrict(event,'abcdefghijklmnopqrstuvwxyz. '+String.fromCharCode(241))\"></td>
<td><input type=\"text\" name=\"email[0]\" id=\"email[0]\" onKeyPress=\"return keyRestrict(event,'1234567890abcdefghijklmnopqrstuvwxyz-._@*'+String.fromCharCode(241))\"></td>
<td><input type=\"text\" name=\"mobile[0]\" id=\"mobile[0]\" onKeyPress=\"return keyRestrict(event,'1234567890+-'+String.fromCharCode(241))\"></td>
<td><input type=\"text\" name=\"phone[0]\" id=\"phone[0]\" onKeyPress=\"return keyRestrict(event,'1234567890+-'+String.fromCharCode(241))\"></td>
<td><input type=\"text\" name=\"fax[0]\" id=\"fax[0]\" onKeyPress=\"return keyRestrict(event,'1234567890+-'+String.fromCharCode(241))\"></td>
<td><a href=\"javascript:createRow();\">Add</a></td></tr>
<tr><td colspan=7 align=center><input type=\"submit\" id=\"AddButton\" name=\"AddButton\" onclick=\"return Bank_details_validation()\" value=\"Add\" class=\"buttonstatic\" onmouseover=\"changeimage(this,'buttonover');\" onmouseout=\"changeimage(this,'buttonstatic');\"></td></tr></table><br>\n";
}
////////////////////////////////      End of Function   /////////////////////////////////////////////////////////////////
/////////////////////////////////Form to Display with Datas for Edit/////////////////////////////////////////////////////////////////

////////////////////////////////      End of Function   /////////////////////////////////////////////////////////////////
?>
</body></html>
