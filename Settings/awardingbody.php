<?php
    session_start();
    include "../DataBase/dbconnection.php";
?>

<html>
<head>
<title>Awardingbody</title>
<link href="../Style/heoscss.css" rel="stylesheet" type="text/css">
<script language="javascript" type="text/javascript" src="../Scripts/MasterScript.js"></script>
<script language="javascript">
function createRow()
{
    tobj=document.getElementById('contactdeatils'); crobj=tobj.rows;
    var row=crobj.length-1; robj=tobj.insertRow(row);  sno=row-1;
    c1=robj.insertCell(0); c2=robj.insertCell(1); c3=robj.insertCell(2);
    c4=robj.insertCell(3); c5=robj.insertCell(4); c6=robj.insertCell(5); c7=robj.insertCell(6);
    arindex=crobj.length-3;
    c1.innerHTML="<input type='text' name='contactperson["+arindex+"]' id='contactperson["+arindex+"]'>";
    c2.innerHTML="<input type='text' name='designation["+arindex+"]' id='designation["+arindex+"]'>";
    c3.innerHTML="<input type='text' name='email["+arindex+"]' id='email["+arindex+"]'>";
    c4.innerHTML="<input type='text' name='mobile["+arindex+"]' id='mobile["+arindex+"]' size=12>";
    c5.innerHTML="<input type='text' name='phone["+arindex+"]' id='phone["+arindex+"]' size=17>";
    c6.innerHTML="<input type='text' name='fax["+arindex+"]' id='fax["+arindex+"]' size=17>";
    c7.innerHTML="<a href=\"javascript:createRow();\">Add</a>&nbsp;&nbsp;<a href=\"javascript:deleteRow();\">Delete</a>";
    robj=document.getElementById('contactdeatils').rows; prerow=row-1;
    cobj=document.getElementById('contactdeatils').rows[prerow].cells; cobj[6].innerHTML='';
}

function deleteRow()
{
    dtobj=document.getElementById('contactdeatils').rows; drow=dtobj.length-2;
    if(dtobj.length > 3){
        document.getElementById('contactdeatils').deleteRow(drow);
        robj=document.getElementById('contactdeatils').rows; prerow=drow-1;
        cobj=document.getElementById('contactdeatils').rows[prerow].cells;
        cobj[6].innerHTML='<a href=\"javascript:createRow();\">Add</a>&nbsp;&nbsp;<a href=\"javascript:deleteRow();\">Delete</a>';
    }
    if(dtobj.length == 3)
    {
        cobj=document.getElementById('contactdeatils').rows[1].cells;
        cobj[6].innerHTML='<a href=\"javascript:createRow();\">Add</a>';
    }
}

function deleteSingleRow(drow)
{
    alert(drow);
    document.getElementById('contactdeatils').deleteRow(drow);
}

</script>
</head>

<?php
/////////////////////////////////Loop to Display forms For Onload//////////////////////////////////////////////
if(!isset($_POST['editButton']) && !isset($_POST['cancelButton']) && !isset($_POST['deleteButton']) && !isset($_POST['btnupdate']) && !isset($_POST['addButton']))
{
$_SESSION['editreference']="";
$_SESSION['updatereference']="";
MainForm();
universityDetailsFill();
}
////////////////////////////////    End of Loop     /////////////////////////////////////////////////////////
/////////////////////////////////Function For Paging fill Table//////////////////////////////////////////////

function universityDetailsFill()
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
if(!isset($_SESSION['pagevalueforuniversity']))
{
$page=1;
$_SESSION['pagevalueforuniversity']=$page;
fillPage($page);
}
else
{
$page=$_SESSION['pagevalueforuniversity'];
$_SESSION['pagevalueforuniversity']=$page;
}
}
else
{
$page=$_SESSION['pagevalueforuniversity'];
fillPage($page);
}
}
else
{
$page = $_GET['page'];
$_SESSION['pagevalueforuniversity']=$page;
fillPage($page);
}
}
////////////////////////////////    End of Function     ////////////////////////////////////////////
/////////////////////////////////Action For Add Button//////////////////////////////////////////////

if(isset($_POST['addButton']))
{
$universityCode=trim($_POST['universityCodeTextBox']); $universityCode=strtoupper($universityCode);
$universityName=trim($_POST['universityNameTextBox']); $universityName = ucfirst($universityName);
$address=trim($_POST['address']);
$state=trim($_POST['stateTextBox']); $state = ucfirst($state);
$country=trim($_POST['countryTextBox']);
$pincode=trim($_POST['pincodeTextBox']);
$websiteName=trim($_POST['websiteNameTextBox']);

$f11=$_POST['contactperson'];
$f12=$_POST['designation'];
$f13=$_POST['email'];
$f14=$_POST['mobile'];
$f15=$_POST['phone'];
$f16=$_POST['fax'];



$query=mysql_query("select count(UniversityCode) from universitydetails where UniversityCode='$universityCode' or UniversityName='$universityName'");
$UnivCount=mysql_result($query,0);

if($UnivCount==0)
{
$queryUnivInsert=mysql_query("insert into universitydetails values('0','$universityCode','$universityName','$address','$state','$country','$pincode','$websiteName')");
$sel=mysql_query("select UniversityId from universitydetails"); while($ar=mysql_fetch_array($sel)){ $recordid=$ar['UniversityId']; }

foreach($f11 as $k=>$value){
if(!empty($value)){ $designation=$f12[$k]; $email=$f13[$k]; $mobile=$f14[$k]; $phone=$f15[$k]; $fax=$f16[$k];
$contact=mysql_query("insert into contactdetails values('0','$recordid','universitydetails','$value','$designation','$email','$mobile','$phone','$fax')");
} }
if($queryUnivInsert)echo "<script type='text/javascript'>alert('Successfully Inserted')</script>";
MainForm();
universityDetailsFill();
}
else
{
echo "<script type='text/javascript'>alert('University Name Already exists')</script>";
MainForm();
universityDetailsFill();
}

}
////////////////////////////////      End of Add Button Action     ////////////////////////////////////////////////////
/////////////////////////////////Function To Fill Datas in Table///////////////////////////////////////////////////////

function fillPage($page)
{
@$cat=$_GET['cat'];
$_SESSION['pagevalueforuniversity']=$page;
$page  = (int) $page;
$limit = 5;


$result = mysql_query("select count(*) from universitydetails");
$total = mysql_result($result, 0);
$pager  = getPagerData($total, $limit, $page);
if($total==0){$offset=0;}
else{$offset = $pager->offset;}
$limit  = $pager->limit;
$page   = $pager->page;
$querySelectUniv="select * from universitydetails limit $offset,$limit";
$querySelectUnivExec=mysql_query($querySelectUniv);
if(mysql_num_rows($querySelectUnivExec)){
print"<form method='post'>
<table border=0 cellspacing=1 cellpadding=0>
<tr><th>S.NO</th><th>Awarding Body Code</th><th>Awarding Body Name</th><th>Awarding Body Address</th><th colspan=2></th></tr>\n";
$sno=1;
while($Fetch=mysql_fetch_array($querySelectUnivExec))
{
$UniversityId=$Fetch["UniversityId"];
$UniversityCode=$Fetch["UniversityCode"];
$UniversityName=$Fetch["UniversityName"];
$UniversityPhNo=$Fetch["UniversityAddress"];

print "<tr><td name=d[] value='$sno'>$sno</td>
<td>$UniversityCode</td><td>$UniversityName</td><td>$UniversityPhNo</td><input type='hidden' name='universityid[]' value='$UniversityId'><td>
<input type='submit' id='editButton' name='editButton[$UniversityCode]' value='Edit'></td><td>
<input type='submit' id='deleteButton' name='deleteButton[$UniversityCode]'  value='Delete'></td></tr>\n";
$sno=$sno+1;
}
print "<tr><td align='center' colspan='6'>\n";
if ($page == 1) // this is the first page - there is no previous page
echo "Previous";
else            // not the first page, link to the previous page
echo "<a href='UniversityDetails.php?page=" . ($page - 1) . "'>Previous</a>";
print " ||  \n";
if ($page == $pager->numPages) // this is the last page - there is no next page
echo "Next";
else            // not the last page, link to the next page
echo "<a href='UniversityDetails.php?page=" . ($page + 1) . "'>Next</a>";
print "<br>$page of $pager->numPages</td></tr></table></form>\n";
}
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
$UnivFordelete=$_POST['deleteButton'];
$_SESSION['$UnivFordelete']=$UnivFordelete;
echo "<script langauge='javascript'>var result=confirm('Are You Sure Want to Delete');if(result){val='delete';self.location='UniversityDetails.php?cat=' + val;}else{val='dontdelete';self.location='UniversityDetails.php?cat=' + val;}</script>";
}
////////////////////////////////           End of Action   /////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////    Delete Action Performed Here/////////////////////////////////////////////////////////////////////////////////


@$cat=$_GET['cat'];
if(isset($cat) and strlen($cat) == 6)
{
$UnivDelete=$_SESSION['$UnivFordelete'];
$Univarray=array_keys($UnivDelete);



$querySelectUniversityName =mysql_query("select UniversityId from universitydetails where UniversityCode='$Univarray[0]'");
$UniversityId = mysql_result($querySelectUniversityName, 0);

$queryforUnivIdcount1exec=mysql_query("select count(*) from coursedetails where UniversityId='$UniversityId'");
$coursedetailsTable=mysql_result($queryforUnivIdcount1exec,0);

if($coursedetailsTable==0)
{
$queryUnivdelete=mysql_query("delete from universitydetails where UniversityCode='$Univarray[0]'");
echo "<script type='text/javascript'>alert('Successfully Deleted')</script>";
$page=$_SESSION['pagevalueforuniversity'];
fillpage($page);
}
else
{
echo "<script type='text/javascript'>alert('This Data is in Use in the following forms Course Details')</script>";
$page=$_SESSION['pagevalueforuniversity'];
fillpage($page);
}
}
else if(isset($cat) and strlen($cat) == 10)
{
$page=$_SESSION['pagevalueforuniversity'];
fillpage($page);
}

////////////////////////////////           End of Delete     /////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////Function to fill table when Delete Button clicked////////////////////////////////////////////////////////////////

function deletefill()
{
$page=$_SESSION['pagevalueforuniversity'];
fillpage($page);
}

////////////////////////////////      End of Function     /////////////////////////////////////////////////////////////////
/////////////////////////////////Action For Cancel Button////////////////////////////////////////////////////////////////

if(isset($_POST['editButton']))
{
$presentcount=$_POST['editButton'];
$_SESSION['universityafteredit']=$presentcount;
editFill();
}
////////////////////////////////      End of Action     /////////////////////////////////////////////////////////////////
/////////////////////////////////Action For Cancel Button////////////////////////////////////////////////////////////////
if(isset($_POST['btncancel']))
{
$page=$_SESSION['pagevalueforuniversity'];
}
////////////////////////////////      End of Action     /////////////////////////////////////////////////////////////////
/////////////////////////////////Action For Update Button////////////////////////////////////////////////////////////////

if(isset($_POST['btnupdate']))
{
$flag=0;
$universityId=trim($_POST['UniversityId']);
$universityCode=trim($_POST['universityCodeTextBox']);
$universityName=trim($_POST['universityNameTextBox']); $universityName = ucfirst($universityName);
$address=trim($_POST['EAddress']);
$state=trim($_POST['stateTextBox']); $state = ucfirst($state);
$country=trim($_POST['countryTextBox']);
$pincode=trim($_POST['pincodeTextBox']);
$websiteName=trim($_POST['websiteNameTextBox']);

$f11=$_POST['contactperson'];
$f12=$_POST['designation'];
$f13=$_POST['email'];
$f14=$_POST['mobile'];
$f15=$_POST['phone'];
$f16=$_POST['fax'];




$queryUnivUpdate=mysql_query("update universitydetails set UniversityName='$universityName',UniversityAddress='$address',UniversityState='$state',CountryId='$country',UniversityPincode='$pincode',UniversityWebsiteName='$websiteName' where UniversityId='$universityId' and UniversityCode='$universityCode'");
$delcon=mysql_query("delete from contactdetails where recordid='$universityId' and tablename='universitydetails'");

foreach($f11 as $k=>$value){
if(!empty($value)){ $designation=$f12[$k]; $email=$f13[$k]; $mobile=$f14[$k]; $phone=$f15[$k]; $fax=$f16[$k];
$contact=mysql_query("insert into contactdetails values('0','$universityId','universitydetails','$value','$designation','$email','$mobile','$phone','$fax')");
} }

MainForm();
universityDetailsFill();
echo "<script type='text/javascript'>alert('Updated Successfully')</script>";
}

//////////////////////////////////////////////////        End of Action     ////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////Function to fill datas in table when Edit Button is Clicked////////////////////////////////////////////////////////////////
function editFill()
{
$page=$_SESSION['pagevalueforuniversity'];
$limit = 5;


$result = mysql_query("select count(*) from universitydetails");
$total = mysql_result($result, 0);
$pager  = getPagerData($total, $limit, $page);
$offset = $pager->offset;
$limit  = $pager->limit;
$page   = $pager->page;

$arrayuniversity=$_SESSION['universityafteredit'];
$querySelectUniv ="select * from universitydetails limit $offset,$limit";
$querySelectUnivExec=mysql_query($querySelectUniv);

print "<form method='post'><tr><td> <table border='0'>\n";

while($ExecEdit=mysql_fetch_array($querySelectUnivExec))
{
$UniversityId=$ExecEdit["UniversityId"];
$UniversityCode=$ExecEdit["UniversityCode"];
$UniversityName=$ExecEdit["UniversityName"];
$UniversityAddress=$ExecEdit["UniversityAddress"];
$UniversityState=$ExecEdit["UniversityState"];
$CountryId=$ExecEdit["CountryId"];
$UniversityPincode=$ExecEdit["UniversityPincode"];
$UniversityWebsite=$ExecEdit["UniversityWebsiteName"];

if(array_key_exists($UniversityCode,$arrayuniversity))
{
$queryselectcourse1 =mysql_query("select UniversityId from universitydetails where UniversityCode='$UniversityCode'");
$courseid1 = mysql_result($queryselectcourse1, 0);
EditForm($UniversityId,$UniversityCode,$UniversityName,$UniversityAddress,$UniversityState,$CountryId,$UniversityPincode,$UniversityWebsite);
}

}

print "</table></td></tr> </form> \n";

}
////////////////////////////////      End of Function   /////////////////////////////////////////////////////////////////
/////////////////////////////////Main Form in a function/////////////////////////////////////////////////////////////////
// EditForm($UniversityId,$UniversityCode,$UniversityName,$UniversityAddress,$UniversityState,$CountryId,$UniversityPincode,$UniversityPhNo,$UniversityFaxNo,$UniversityMailId,$UniversityWebsite,$ContPersonName,$ContPersonMailId,$ContPersonNo,$CountryName);

function MainForm()
{
print
"<body onload='document.UniversityDetails.universityNameTextBox.focus();'>
<form method='post' name='UniversityDetails'>
<table border=0 cellspacing=1 cellpadding=0>
<tr><th colspan='4'>Awarding Body Details</th></tr>
<tr>
<td>Awarding Body Name</td>
<td><input type='text' name='universityNameTextBox' id='universityNameTextBox'></td>
<td>Awarding Body Code</td>
<td><input type='text' value='' class='SixDigitTxt' name='universityCodeTextBox' id='universityCodeTextBox'></td>
</tr>
<tr>
<td rowspan='2'>Awarding Body Address</td><td rowspan='2'><textarea name='address' id='address'></textarea></td>
<td>Awarding Body State</td><td><input type='text' value='' name='stateTextBox' id='stateTextBox'></td>
</tr>

<tr><td>Awarding Body Country</td>
<td>
<select name='countryTextBox' id='countryTextBox'>
<option value='--Select--'>--Select--</option>";


$sql ="select CountryId,CountryName from countrydetails order by CountryName";
$rs=mysql_query($sql);
while($Combo=mysql_fetch_array($rs))
{
$CountryId=$Combo["CountryId"];
$CountryName=$Combo["CountryName"];
echo"<option value='$CountryId'>$CountryName</option>";
}
echo" </select>&nbsp;&nbsp;&nbsp;&nbsp;<a href='country.php'>New</a></td>

<tr><td>Zipcode</td><td><input type='text' value='' name='pincodeTextBox' id='pincodeTextBox'></td>
<td>Awarding Body Website</td>
<td><input type='text' value='' name='websiteNameTextBox' id='websiteNameTextBox'></td></tr></tr>
</table><br>
<table id='contactdeatils' border=0 cellspacing=1 cellpadding=0>
<tr><th>Contact Person</th><th>Designation</th><th>E-mail</th><th>Mobile</th><th>Phone</th><th>Fax</th><th></th></tr>
<tr>
<td><input type='text' name='contactperson[0]' value='' id='contactperson[0]'></td>
<td><input type='text' name='designation[0]' value='' id='designation[0]'></td>
<td><input type='text' name='email[0]' id='email[0]'></td>
<td><input type='text' name='mobile[0]' id='mobile[0]' size=12></td>
<td><input type='text' name='phone[0]' id='phone[0]' size=17></td>
<td><input type='text' name='fax[0]' id='fax[0]' size=17></td>
<td><a href='javascript:createRow();'>Add</a></td></tr>
<tr><td colspan=7 align=center><input type='submit' id='addButton' value='Add' name='addButton' onclick='return university_details_validation();'></td></tr></table></form>\n";
}
////////////////////////////////      End of Function   /////////////////////////////////////////////////////////////////
/////////////////////////////////Form to Display with Datas for Edit/////////////////////////////////////////////////////////////////

function EditForm($UniversityId,$UniversityCode,$UniversityName,$UniversityAddress,$UniversityState,$CountryId,$UniversityPincode,$UniversityWebsite)
{
//$AddressLine = explode("+", $UniversityAddress);
print "
<form method='post' name='UniversityDetails'>
<table border=0 cellspacing=1 cellpadding=0>
<tr><td align='center' colspan='4'>Awarding Body Edit <input type='hidden' name='UniversityId' value='$UniversityId'></td></tr>
<tr><td>Awarding Body Name</td><td><input type='text' value='$UniversityName' name='universityNameTextBox' id='universityNameTextBox'></td>
<td>Awarding Body Code</td><td><input type='hidden' readonly value='$UniversityCode' class='SixDigitTxt' name='universityCodeTextBox'>$UniversityCode</td>
</tr>
<tr><td rowspan='2'>Awarding Body Address</td><td rowspan='2'><textarea class='textarea' name='EAddress' id='EAddress'>$UniversityAddress</textarea></td>
<td>Awarding Body State</td><td><input type='text' value='$UniversityState' name='stateTextBox' id='stateTextBox'></td></tr>
<tr><td>Awarding Body Country</td><td><select name='countryTextBox' id='countryTextBox'><option selected value='Select'>Select</option>";

$sql ="select CountryId,CountryName from countrydetails order by CountryName";
$rs=mysql_query($sql);
while($ComboE=mysql_fetch_array($rs)){ $id=$ComboE["CountryId"]; $name=$ComboE["CountryName"];
if($id==$CountryId) echo"<option value=$id selected>$name</option>"; else echo"<option value=$id>$name</option>";
}
print" </select>&nbsp;&nbsp;&nbsp;&nbsp;<a href='CountryDetail.php'>New</a></td></tr>
<tr><td>Zipcode</td><td><input type='text' value='$UniversityPincode' name='pincodeTextBox' id='pincodeTextBox'></td>
<td>Website Name</td><td><input type='text' value='$UniversityWebsite' name='websiteNameTextBox' id='websiteNameTextBox'></td></tr>
</table><br><br><table id='contactdeatils' border=0 cellspacing=1 cellpadding=0>
<tr><th>Contact Person</th><th>Designation</th><th>E-mail</th><th>Mobile</th><th>Phone</th><th>Fax</th><th></th></tr>";

$seltot=mysql_query("select count(*) from contactdetails where recordid='$UniversityId' and tablename='universitydetails'");
$total=mysql_result($seltot,0);
$index=0;
$sel=mysql_query("select * from contactdetails where recordid='$UniversityId' and tablename='universitydetails'");
while($ar=mysql_fetch_array($sel)){
$contactperson=$ar['contactperson']; $designation=$ar['designation']; $email=$ar['email'];
$mobileno=$ar['mobileno']; $phoneno=$ar['phoneno']; $faxno=$ar['faxno'];
if($index==($total-1)) break;
else {
print "<tr>
<td><input type='text' name='contactperson[$index]' id='contactperson[$index]' value='$contactperson'></td>
<td><input type='text' name='designation[$index]' id='designation[$index]' value='$designation'></td>
<td><input type='text' name='email[$index]' id='email[$index]' value='$email'></td>
<td><input type='text' name='mobile[$index]' id='mobile[$index]' value='$mobileno'></td>
<td><input type='text' name='phone[$index]' id='phone[$index]' value='$phoneno'></td>
<td><input type='text' name='fax[$index]' id='fax[$index]' value='$faxno'></td>
<td></td></tr>"; }
$index++;
}
print "<tr>
<td><input type='text' name='contactperson[$index]' id='contactperson[$index]' value='$contactperson'></td>
<td><input type='text' name='designation[$index]' id='designation[$index]' value='$designation'></td>
<td><input type='text' name='email[$index]' id='email[$index]' value='$email'></td>
<td><input type='text' name='mobile[$index]' id='mobile[$index]' value='$mobileno'></td>
<td><input type='text' name='phone[$index]' id='phone[$index]' value='$phoneno'></td>
<td><input type='text' name='fax[$index]' id='fax[$index]' value='$faxno'></td>
<td><a href='javascript:createRow();'>Add</a>&nbsp;&nbsp;<a href='javascript:deleteRow();'>Delete</a></td></tr>
<tr><td colspan=7 align=center><input type='submit' id='btnupdate' name='btnupdate[$UniversityCode]' onclick='return Bank_details_validation()' value='Update'>
&nbsp;&nbsp;&nbsp;<input type='submit' id='btncancel' name='btncancel' value='Cancel'></td></tr></table><br>\n";
}

////////////////////////////////      End of Function   /////////////////////////////////////////////////////////////////
?>
</body></html>
