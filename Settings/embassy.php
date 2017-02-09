<?php
session_start();
include "../AJAX/MasterAjax.php";
include "../DataBase/dbconnection.php";
?>
<html><head><?php $xajax->printJavascript();?> <meta http-equiv="Page-Exit" content="revealTrans(Duration=0.5,Transition=22)">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="../Style/heoscss.css" rel="stylesheet" type="text/css">
<script language="javascript" type="text/javascript" src="./Images/MasterScript.js"></script>
<title>Embassy Address</title>
<script language="javascript">
function createRow(){
tobj=document.getElementById('contactdeatils'); crobj=tobj.rows;
var row=crobj.length-1; robj=tobj.insertRow(row);  sno=row-1;
c1=robj.insertCell(0); c2=robj.insertCell(1); c3=robj.insertCell(2);
c4=robj.insertCell(3); c5=robj.insertCell(4); c6=robj.insertCell(5); c7=robj.insertCell(6);
arindex=crobj.length-2;
c1.innerHTML="<input type='text' name='contactperson["+arindex+"]' id='contactperson["+arindex+"]'>";
c2.innerHTML="<input type='text' name='designation["+arindex+"]' id='designation["+arindex+"]'>";
c3.innerHTML="<input type='text' name='email["+arindex+"]' id='email["+arindex+"]'>";
c4.innerHTML="<input type='text' name='mobile["+arindex+"]' id='mobile["+arindex+"]' size=12>";
c5.innerHTML="<input type='text' name='phone["+arindex+"]' id='phone["+arindex+"]' size=17>";
c6.innerHTML="<input type='text' name='fax["+arindex+"]' id='fax["+arindex+"]' size=17>";
c7.innerHTML="<a href='javascript:createRow();'>Add</a>&nbsp;&nbsp;<a href='javascript:deleteRow();'>Delete</a>";
robj=document.getElementById('contactdeatils').rows; prerow=row-1;
cobj=document.getElementById('contactdeatils').rows[prerow].cells; cobj[6].innerHTML='';
}
function deleteRow(){ dtobj=document.getElementById('contactdeatils').rows; drow=dtobj.length-2;
if(dtobj.length > 3){ document.getElementById('contactdeatils').deleteRow(drow);
robj=document.getElementById('contactdeatils').rows; prerow=drow-1;
cobj=document.getElementById('contactdeatils').rows[prerow].cells;
cobj[6].innerHTML="<a href='javascript:createRow();'>Add</a>&nbsp;&nbsp;<a href='javascript:deleteRow();'>Delete</a>";
}
}
function deleteSingleRow(drow){ document.getElementById('contactdeatils').deleteRow(drow); }
function alertme(obj){ alert(obj.name);
}
</script>
</head><body>


<?php
if(!isset($_POST['editButton']) && !isset($_POST['btncancel']) && !isset($_POST['deleteButton']) && !isset($_POST['btnupdate']) && !isset($_POST['addButton']))
{
$_SESSION['editreference']="";
$_SESSION['updatereference']="";
MainForm();
EmbassyAddressFill();
}

function EmbassyAddressFill()
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
if(!isset($_SESSION['pagevalueforEmbassy']))
{
$page=1;
$_SESSION['pagevalueforEmbassy']=$page;
fillPage($page);
}
else
{
$page=$_SESSION['pagevalueforEmbassy'];
$_SESSION['pagevalueforEmbassy']=$page;
}
}
else
{
$page=$_SESSION['pagevalueforEmbassy'];
fillPage($page);
}
}
else
{
$page = $_GET['page'];
$_SESSION['pagevalueforEmbassy']=$page;
fillPage($page);
}
}

if(isset($_POST['addButton']))
{
$CountryId=trim($_POST['CountryCodeCom']);
$EmbassyCode=trim($_POST['EmbassyCodeTxt']);
$EmbassyCode=strtoupper($EmbassyCode);
$Address=trim($_POST['address']);
$f11=$_POST['contactperson'];
$f12=$_POST['designation'];
$f13=$_POST['email'];
$f14=$_POST['mobile'];
$f15=$_POST['phone'];
$f16=$_POST['fax'];


$queryforEmbassycount=mysql_query("select count(*) from embassyaddress where EmbassyCode='$EmbassyCode'");
$Embassycount=mysql_result($queryforEmbassycount,0);

if($Embassycount==0)
{
$queryEmbassyinsert=mysql_query("insert into embassyaddress values('0','$CountryId','$EmbassyCode','$Address')");
$sel=mysql_query("select recordid from embassyaddress"); while($ar=mysql_fetch_array($sel)){ $recordid=$ar['recordid']; }
foreach($f11 as $k=>$value){
if(!empty($value)){ $designation=$f12[$k]; $email=$f13[$k]; $mobile=$f14[$k]; $phone=$f15[$k]; $fax=$f16[$k];
$contact=mysql_query("insert into contactdetails values('0','$recordid','embassyaddress','$value','$designation','$email','$mobile','$phone','$fax')");
}
}
if($queryEmbassyinsert) echo "<script langauge='javascript'>alert('Successfully Inserted')</script>";
MainForm();
EmbassyAddressFill();
}
else
{
echo "<script langauge='javascript'>alert('Embassy Code Already exists')</script>";
MainForm();
EmbassyAddressFill();
}
}


function fillPage($page)
{
@$cat=$_GET['cat'];
$_SESSION['pagevalueforEmbassy']=$page;
$page  = (int) $page;
$limit = 5;

$result = mysql_query("select count(*) from embassyaddress");
$total = mysql_result($result, 0);
$pager  = getPagerData($total, $limit, $page);

if($total==0){$offset=0;}
else{$offset = $pager->offset;}

$limit  = $pager->limit;
$page   = $pager->page;
$queryselectEmbassy="select * from embassyaddress limit $offset,$limit";
$queryselectEmbassyexec=mysql_query($queryselectEmbassy);
if(mysql_num_rows($queryselectEmbassyexec)){
print "<form method='post' name='EmbassyAddress'>
<table border='0' cellspacing='2' cellpadding='5' class='table'>
<tr><th>S.No</th><th>Embassy Code</th><th>Embassy Country</th><th>Embassy Address</th><th>&nbsp;</th></tr>\n";

$sno=1;
while($Fetch=mysql_fetch_array($queryselectEmbassyexec))
{
$recordid=$Fetch["recordid"];
$CountryId=$Fetch["CountryId"];
$EmbassyCode=$Fetch["EmbassyCode"];
$Address=$Fetch["Address"];

$sql =mysql_query("select CountryName from countrydetails where CountryId='$CountryId'");
$CountryName = mysql_result($sql, 0);
print "<tr><td align='center' name=d[] value='$sno' class='balanceheaderrow'>$sno</td><td>$EmbassyCode</td><td>$CountryName</td><td>$Address</td>
<input type='hidden' name='recordid[]' value='$recordid'>
<td><input type='submit' name='editButton[$EmbassyCode]' value='Edit'>
&nbsp;<input type='submit' name='deleteButton[$EmbassyCode]'  value='Delete'></td>
</tr>\n";
$sno=$sno+1;
}
print "<tr><td align='center' colspan='6'>\n";
if ($page == 1) // this is the first page - there is no previous page
echo "Previous";
else            // not the first page, link to the previous page
echo "<a href='EmbassyAddress.php?page=" . ($page - 1) . "'>Previous</a>";
print " ||  \n";
if ($page == $pager->numPages) // this is the last page - there is no next page
echo "Next";
else            // not the last page, link to the next page
echo "<a href='EmbassyAddress.php?page=" . ($page + 1) . "'>Next</a>";
print "<br>$page of $pager->numPages</td></tr></table></form>\n";
}
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

////////////////////////////DELETE////////////////////////////////////////////////////////////

if(isset($_POST['deleteButton']))
{
MainForm();
deletefill();
$EmbassyFordelete=$_POST['deleteButton'];
$_SESSION['$EmbassyFordelete']=$EmbassyFordelete;
echo "<script langauge='javascript'>var
result=confirm('Are You Sure Want to Delete');
if(result){val='delete';self.location='EmbassyAddress.php?cat=' + val;}else{val='dontdelete';self.location='EmbassyAddress.php?cat=' + val;}</script>";
}


@$cat=$_GET['cat'];
if(isset($cat) and strlen($cat) == 6)
{
$EmbassyDelete=$_SESSION['$EmbassyFordelete'];
$EmbassyArray=array_keys($EmbassyDelete);


$queryEmbassydelete=mysql_query("delete from embassyaddress where EmbassyCode='$EmbassyArray[0]'");
print "<body onLoad='alert('Successfully Deleted');'> \n";
$page=$_SESSION['pagevalueforEmbassy'];
fillpage($page);
}
else if(isset($cat) and strlen($cat) == 10)
{
$page=$_SESSION['pagevalueforEmbassy'];
fillpage($page);
}


function deletefill()
{
$page=$_SESSION['pagevalueforEmbassy'];
fillpage($page);
}

/////////////////////////////////////////////////////////////////////////////////////////


if(isset($_POST['editButton']))
{
$presentcount=$_POST['editButton'];
$_SESSION['EmbassyAfterEdit']=$presentcount;
editFill();
}

if(isset($_POST['btncancel']))
{
MainForm();
EmbassyAddressFill();
$page=$_SESSION['pagevalueforEmbassy'];
}

if(isset($_POST['btnupdate']))
{
$flag=0;
$RecordId=(trim($_POST['RecordId']));
$CountryId=trim($_POST['ECountryCode']);
$EmbassyCode=trim($_POST['EEmbassyCodeTxt']);
$EmbassyCode=strtoupper($EmbassyCode);
$Address=trim($_POST['Eaddress']);
$f11=$_POST['contactperson'];
$f12=$_POST['designation'];
$f13=$_POST['email'];
$f14=$_POST['mobile'];
$f15=$_POST['phone'];
$f16=$_POST['fax'];


$queryEmbassyUpdate=mysql_query("update embassyaddress set CountryId='$CountryId',Address='$Address' where EmbassyCode='$EmbassyCode'");
$delcon=mysql_query("delete from contactdetails where recordid='$RecordId' and tablename='embassyaddress'");
foreach($f11 as $k=>$value){
if(!empty($value)){ $designation=$f12[$k]; $email=$f13[$k]; $mobile=$f14[$k]; $phone=$f15[$k]; $fax=$f16[$k];
$contact=mysql_query("insert into contactdetails values('0','$RecordId','embassyaddress','$value','$designation','$email','$mobile','$phone','$fax')");
} }
echo "<script langauge='javascript'>alert('Updated Successfully')</script>";
MainForm();
EmbassyAddressFill();
}



function editFill()
{
$page=$_SESSION['pagevalueforEmbassy'];
$limit = 5;


$result = mysql_query("select count(*) from embassyaddress");
$total = mysql_result($result, 0);

$pager  = getPagerData($total, $limit, $page);
$offset = $pager->offset;
$limit  = $pager->limit;
$page   = $pager->page;

$arrayEmbassy=$_SESSION['EmbassyAfterEdit'];
$querySelectEmbassy ="select * from embassyaddress limit $offset,$limit";
$querySelectEmbassyExec=mysql_query($querySelectEmbassy);

while($Fetch=mysql_fetch_array($querySelectEmbassyExec))
{
$recordid=$Fetch["recordid"];
$CountryId=$Fetch["CountryId"];
$EmbassyCode=$Fetch["EmbassyCode"];
$Address=$Fetch["Address"];

$sqlE =mysql_query("select CountryName from countrydetails where CountryId='$CountryId'");
$CountryName = mysql_result($sqlE, 0);

if(array_key_exists($EmbassyCode,$arrayEmbassy))
{
$queryselectEmbassy1 =mysql_query("select recordid from embassyaddress where EmbassyCode='$EmbassyCode'");
$recordid1 = mysql_result($queryselectEmbassy1, 0);
EditForm($recordid,$CountryName,$EmbassyCode,$Address,$CountryId);
}
}
}


function MainForm()
{
print
"<form method='post' name='EmbassyAddress'>
<table border='0' class='table' cellspacing='1' cellpadding='0'><tr><tr><th colspan=6>Embassy Address</th></tr>
<tr><td align='right'>Embassy Code</td><td><input type='text' name='EmbassyCodeTxt' id='EmbassyCodeTxt'></td>
<td align='right' rowspan='2'>Embassy Address</td>
<td rowspan='2'><textarea class='textarea' name='address' id='address'></textarea></td></tr><tr>
<td align='right'>Embassy Country</td><td><select class='citizen' name='CountryCodeCom'>
<option value='Select'>--Select--</option>";


$sql ="select CountryId,CountryName from countrydetails order by CountryName";
$rs=mysql_query($sql);
while($Combot=mysql_fetch_array($rs))
{
$id=$Combot["CountryId"];
$name=$Combot["CountryName"];
echo"<option value='$id'>$name</option>";
}
echo" </select>&nbsp;&nbsp;&nbsp;&nbsp;<a href='CountryDetail.php'>New</a></td></tr></table>
<br><br><table id='contactdeatils' border=0 cellspacing=1 cellpadding=0>
<tr><th>Contact Person</th><th>Designation</th><th>E-mail</th><th>Mobile</th><th>Phone</th><th>Fax</th><th></th></tr>
<tr>
<td><input type='text' name='contactperson[0]' value='' id='contactperson[0]'></td>
<td><input type='text' name='designation[0]' value='' id='designation[0]'></td>
<td><input type='text' name='email[0]' id='email[0]'></td>
<td><input type='text' name='mobile[0]' id='mobile[0]' size=12></td>
<td><input type='text' name='phone[0]' id='phone[0]' size=17></td>
<td><input type='text' name='fax[0]' id='fax[0]' size=17></td>
<td><a href='javascript:createRow();'>Add</a>&nbsp;&nbsp;<a href='javascript:deleteRow();'>Delete</a></td></tr>
<tr><td colspan=7 align=center><input type='submit' name='addButton' value='Add'></tr></table><br>\n";
}

function  EditForm($recordid,$CountryName,$EmbassyCode,$Address,$CountryId)
{

print"<form method='post' name='EmbassyAddress'>
<table border='0' class='table' cellspacing='2' cellpadding='5'><tr><td align='center' colspan='4'>EMBASSY ADDRESS EDIT</td></tr>
<input type='hidden' name='RecordId' value='$recordid'>
<tr><td align='right'>Embassy Code</td><td><input type='text' name='EEmbassyCodeTxt' value='$EmbassyCode' readonly></td>
<td align='right' rowspan='2'>Embassy Address</td>
<td rowspan='2'><textarea class='textarea' name='Eaddress' id='Eaddress'>$Address</textarea></td></tr><tr>
<td align='right'>Embassy Country</td><td><select name='ECountryCode' class='citizen'>
<option selected value='$CountryId'>$CountryName</option>\n";


$sql ="select CountryId,CountryName from countrydetails order by CountryName";
$rs=mysql_query($sql);
while($CombotE=mysql_fetch_array($rs))
{
$id=$CombotE["CountryId"];
$name=$CombotE["CountryName"];
if($name==$CountryName){}
else{echo"<option value='$id'>$name</option>";}
}
print"</select>&nbsp;&nbsp;&nbsp;&nbsp;<a href='CountryDetail.php'>New</a></td></td></tr> </table>
<br><br><table id='contactdeatils' border=0 cellspacing=1 cellpadding=0>
<tr><th>Contact Person</th><th>Designation</th><th>E-mail</th><th>Mobile</th><th>Phone</th><th>Fax</th><th></th></tr>";
$seltot=mysql_query("select count(*) from contactdetails where recordid='$recordid' and tablename='embassyaddress'");
$total=mysql_result($seltot,0);
$index=0;
$sel=mysql_query("select * from contactdetails where recordid='$recordid' and tablename='embassyaddress'");
while($ar=mysql_fetch_array($sel))
{
$contactperson=$ar['contactperson']; $designation=$ar['designation']; $email=$ar['email']; $mobileno=$ar['mobileno']; $phoneno=$ar['phoneno']; $faxno=$ar['faxno'];
if($index==($total-1)) break;
print "<tr>
<td><input type='text' name='contactperson[$index]' id='contactperson[$index]' value='$contactperson'></td>
<td><input type='text' name='designation[$index]' id='designation[$index]' value='$designation'></td>
<td><input type='text' name='email[$index]' id='email[$index]' value='$email'></td>
<td><input type='text' name='mobile[$index]' id='mobile[$index]' value='$mobileno' size=12></td>
<td><input type='text' name='phone[$index]' id='phone[$index]' value='$phoneno' size=17></td>
<td><input type='text' name='fax[$index]' id='fax[$index]' value='$faxno' size=17></td>
<td></td></tr>";
$index++;
}
print "<tr>
<td><input type='text' name='contactperson[$index]' id='contactperson[$index]' value='$contactperson'></td>
<td><input type='text' name='designation[$index]' id='designation[$index]' value='$designation'></td>
<td><input type='text' name='email[$index]' id='email[$index]' value='$email'></td>
<td><input type='text' name='mobile[$index]' id='mobile[$index]' value='$mobileno' size=12></td>
<td><input type='text' name='phone[$index]' id='phone[$index]' value='$phoneno' size=17></td>
<td><input type='text' name='fax[$index]' id='fax[$index]' value='$faxno' size=17></td>
<td><a href='javascript:createRow();'>Add</a>&nbsp;&nbsp;<a href='javascript:deleteRow();'>Delete</a></td></tr>";

print"<tr><td colspan=7 align=center><input type='submit' name='btncancel' value='Cancel' onclick='return EformValidator()'>
&nbsp;<input type='submit' name='btnupdate[$EmbassyCode]' value='Update' onclick='return agent_edit_details_validation()'></tr></table>\n";
}
?>
</body></html>
