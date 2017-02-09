<?php
session_start();
include "../AJAX/MasterAjax.php";
include "../DataBase/dbconnection.php";
?>
<html>
<head>
<?php
    $xajax->printJavascript();
?>
<script language="javascript" type="text/javascript" src="../Scripts/MasterScript.js"></script>
<link href="../Style/heoscss.css" rel="stylesheet" type="text/css">
<title>Country Details</title>
</head><body>

<?php
print "<form method='post' name='CountryDetails'>
<table border='0' cellspacing='1' cellpadding='0'><tr><th colspan=2>COUNTRY DETAILS</th></tr>
<tr><td>Country Code</td><td><input type='text' value='' name='CountryCodeTxt' id='CountryCodeTxt' maxlength=3></td></tr>
<tr><td>Country</td><td><input type='text' value='' name='CountryTxt' id='CountryTxt'></td></tr>
<tr><td>Nationality</td><td><input type='text' value='' name='NationalityTxt' id='NationalityTxt'></td></tr>
<tr><td align='center' colspan='2'>
<input type='submit' id='addButton' value='Add' name='addButton' onclick='return country_details_validation();'></td></tr>
</table></form>";

if(!isset($_POST['editButton']) && !isset($_POST['cancelbutton']) && !isset($_POST['deleteButton']) && !isset($_POST['updateButton']) && !isset($_POST['addButton']))
{
$_SESSION['editreference']="";
$_SESSION['updatereference']="";
CountryDetailsFill();
}

function CountryDetailsFill()
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
if(!isset($_SESSION['pagevalueForCountry']))
{
$page=1;
$_SESSION['pagevalueForCountry']=$page;
fillPage($page);
}
else
{
$page=$_SESSION['pagevalueForCountry'];
$_SESSION['pagevalueForCountry']=$page;
}
}
else
{
$page=$_SESSION['pagevalueForCountry'];
fillPage($page);
}
}
else
{
$page = $_GET['page'];
$_SESSION['pagevalueForCountry']=$page;
fillPage($page);
}
}

if(isset($_POST['addButton']))
{

$CountryCode=trim($_POST['CountryCodeTxt']);
$CountryCode=strtoupper($CountryCode);
$CountryName=trim($_POST['CountryTxt']);
$CountryName = ucfirst($CountryName);
$Nationality=trim($_POST['NationalityTxt']);
$Nationality = ucfirst($Nationality);



$queryforCountrycount=mysql_query("select count(*) from countrydetails where Countrycode='$CountryCode' or CountryName='$CountryName'");
$Countrycount=mysql_result($queryforCountrycount,0);
if($Countrycount==0)
{
$querycohortinsert=mysql_query("insert into countrydetails values('0','$CountryCode','$CountryName','$Nationality')");
CountryDetailsFill();
echo "<script type='text/javascript'>alert('Successfully Inserted')</script>";
}
else
{
CountryDetailsFill();
echo "<script type='text/javascript'>alert('Country Code/Country Name Already exists')</script>";
}
}

function fillPage($page)
{
@$cat=$_GET['cat'];
$_SESSION['pagevalueForCountry']=$page;
$page  = (int) $page;
$limit = 10;


$result = mysql_query("select count(*) from countrydetails");
$total = mysql_result($result, 0);
$pager  = getPagerData($total, $limit, $page);
if($total==0){$offset=0;}
else{$offset = $pager->offset;}
$limit  = $pager->limit;
$page   = $pager->page;
$queryselectCountry="select * from countrydetails order by CountryName limit $offset,$limit";
$queryselectCountryexec=mysql_query($queryselectCountry);

print "<form method='post' name='CountryDetails'>
<br><table border=0 cellspacing=1 cellpadding=0>
<tr><th>S.No</th><th>Country Code</th><th>Country Name</th><th>Nationality</th><th colspan=2>&nbsp;</th></tr>";
$sno=1;
while($Fetch=mysql_fetch_array($queryselectCountryexec))
{
$CountryId=$Fetch["CountryId"];
$CountryCode=$Fetch["Countrycode"];
$CountryName=$Fetch["CountryName"];
$Nationality=$Fetch["Nationality"];

print "<tr><td name=d[] value='$sno' align='center' class='balanceheaderrow'>
$sno</td><td>$CountryCode</td><td>$CountryName</td><td>$Nationality</td>
<input type='hidden' name='CountryId[]' value='$CountryId'><td align='center'>
<input type='submit' id='editButton' name='editButton[$CountryCode]' value='Edit'></td>
<td align='center'><input type='submit' id='deleteButton' name='deleteButton[$CountryCode]'  value='Delete'></td></tr>";
$sno=$sno+1;
}
print "<tr><td align='center' colspan='6'>";
if ($page == 1) // this is the first page - there is no previous page
echo "Previous";
else            // not the first page, link to the previous page
echo "<a href='CountryDetail.php?page=" . ($page - 1) . "'>Previous</a>";
print " ||  ";
if ($page == $pager->numPages) // this is the last page - there is no next page
echo "Next";
else            // not the last page, link to the next page
echo "<a href='CountryDetail.php?page=" . ($page + 1) . "'>Next</a>";
print "<br>$page of $pager->numPages</td></tr></table></form>";
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

/***************Edit*****************/
if(isset($_POST['editButton']))
{
$presentcount=$_POST['editButton'];
$_SESSION['Countryafteredit']=$presentcount;
editFill();
}

function editFill()
{
$page=$_SESSION['pagevalueForCountry'];
$limit = 10;


$result = mysql_query("select count(*) from countrydetails");
$total = mysql_result($result, 0);
$pager  = getPagerData($total, $limit, $page);
$offset = $pager->offset;
$limit  = $pager->limit;
$page   = $pager->page;
$arrayCohort=$_SESSION['Countryafteredit'];
$queryselectCountry ="select * from countrydetails order by CountryName limit $offset,$limit";
$queryselectCountryexec=mysql_query($queryselectCountry);

print "<form method='post'>
<br><table border=0 cellspacing=1 cellpadding=0>
<tr><th>S.No</th><th>Country Code</th><th>Country Name</th><th>Nationality</th><th colspan=2>&nbsp;</th></tr>";
$sno=1;
while($EFetch=mysql_fetch_array($queryselectCountryexec))
{
$CountryId=$EFetch["CountryId"];
$CountryCode=$EFetch["Countrycode"];
$CountryName=$EFetch["CountryName"];
$Nationality=$EFetch["Nationality"];
if(array_key_exists($CountryCode,$arrayCohort))
{
$sqlE =mysql_query("select CountryId from countrydetails where CountryCode='$CountryCode'");
$CountryId1 = mysql_result($sqlE, 0);
echo "<tr><input type='hidden' name='CountryId' value='$CountryId1'><td name=d[] value='$sno' align='center'>
$sno</td><td><input type='text' name='ECountryCode' value='$CountryCode' readonly></td>
<td><input type='text' name='ECountryName' value='$CountryName' id='ECountryName' onChange=\"return xajax_CountryName(document.getElementById('ECountryName').value);\"></td>
<td><input type='text' name='ENationality' value='$Nationality' id='ENationality'></td><td>
<input type='submit' id='updateButton' name='updateButton[$CountryCode]' value='Update' onclick='return country_edit_details_validation()'></td>
<td><input type='submit' id='cancelButton' name='cancelButton[]' value='Cancel'></td></tr>";
}
else
{
print "<tr><input type='hidden' name='courseid1'><td name=d[] value='$sno' class='balanceheaderrow' align='center'>
$sno</td><td>$CountryCode</td><td>$CountryName</td><td>$Nationality</td><td>
<input type='submit' id='btnupdate' disabled name='btnupdate[$CountryCode]' value='Edit'></td><td>
<input type='submit'  id='cancelbutton' disabled name='cancelbutton[]' value='Delete'></td></tr>";
}
$sno=$sno+1;
}
print "<tr><td align='center' colspan='6'>";
if ($page == 1) // this is the first page - there is no previous page
echo "Previous";
else            // not the first page, link to the previous page
echo "<a href='CountryDetail.php?page=" . ($page - 1) . "'>Previous</a>";
print " ||  ";
if ($page == $pager->numPages) // this is the last page - there is no next page
echo "Next";
else            // not the last page, link to the next page
echo "<a href='CountryDetail.php?page=" . ($page + 1) . "'>Next</a>";
print "<br>$page of $pager->numPages</td></tr></table></form>";
}

/***********************Cancel Button Code******************************/
if(isset($_POST['cancelButton']))
{
$page=$_SESSION['pagevalueForCountry'];
// fillPage($page);
}

if(isset($_POST['updateButton']))
{


$flag=0;
$CountryCode=trim($_POST['ECountryCode']);
$CountryName=trim($_POST['ECountryName']);
$CountryName = ucfirst($CountryName);
$Nationality=trim($_POST['ENationality']);
$Nationality = ucfirst($Nationality);
$queryCountryupdate=mysql_query("update countrydetails set CountryName='$CountryName',Nationality='$Nationality' where Countrycode='$CountryCode'");
echo "<script type='text/javascript'>alert('Updated Successfully')</script>";
$page=$_SESSION['pagevalueForCountry'];
fillPage($page);
}


/***********************Delete Button Code******************************/
if(isset($_POST['deleteButton']))
{
deleteFill();
$Countryfordelete=$_POST['deleteButton'];
$_SESSION['Countryfordelete']=$Countryfordelete;
echo "<script langauge='javascript'>var result=confirm('Are You Sure Want to Delete');if(result){val='delete';self.location='CountryDetail.php?cat=' + val;}else{val='dontdelete';self.location='CountryDetail.php?cat=' + val;}</script>";
}
/*****************************Deleet Button Code Ends***********************/

function deleteFill()
{
$page=$_SESSION['pagevalueForCountry'];
fillPage($page);
}

@$cat=$_GET['cat'];
if(isset($cat) and strlen($cat) == 6)
{
$CountryDelete=$_SESSION['Countryfordelete'];
$CountryArray=array_keys($CountryDelete);


$querySelectCountryDelete ="select CountryName,CountryId from countrydetails where Countrycode='$CountryArray[0]'";
$querySelectCountryDeleteExec=mysql_query($querySelectCountryDelete);

while($DFetch=mysql_fetch_array($querySelectCountryDeleteExec))
{
$CountryId=$DFetch["CountryId"];
$CountryName=$DFetch["CountryName"];
}

$queryCollege=mysql_query("select count(CountryID) from collegedetails where CountryID='$CountryId'");
$CollegeDetailsTab=mysql_result($queryCollege,0);
$queryCountryDepo=mysql_query("select count(CountryId) from countrydepositdetails where CountryId='$CountryId'");
$CountryDepoTab=mysql_result($queryCountryDepo,0);
$queryEmbassy=mysql_query("select count(CountryId) from embassyaddress where CountryId='$CountryId'");
$embassyaddTab=mysql_result($queryEmbassy,0);
$queryStudent=mysql_query("select count(countryresidence) from student where countryresidence='$CountryArray[0]'");
$StudentTab=mysql_result($queryStudent,0);
$queryUniversity=mysql_query("select count(CountryId) from universitydetails where CountryId='$CountryId'");
$UnivTab=mysql_result($queryUniversity,0);


if($CollegeDetailsTab==0 && $CountryDepoTab==0 && $embassyaddTab==0 && $StudentTab==0 && $UnivTab==0)
{
$queryCountrydelete=mysql_query("delete from countrydetails where Countrycode='$CountryArray[0]'");
echo "<script type='text/javascript'>alert('Successfully Deleted')</script>";
$page=$_SESSION['pagevalueForCountry'];
fillpage($page);
}
else
{
$tab='';
if($CollegeDetailsTab > 0){$tab="College Details,";}
if($CountryDepoTab > 0){$tab=$tab." Country Deposit,";}
if($embassyaddTab > 0){$tab=$tab." Embassy Address,";}
if($StudentTab > 0){$tab=$tab." Student,";}
if($UnivTab > 0){$tab=$tab." University Details";}
echo "<script type='text/javascript'>alert('This Data is in Use in the following forms $tab')</script>";
$page=$_SESSION['pagevalueForCountry'];
fillpage($page);
}
}
else if(isset($cat) and strlen($cat) == 10)
{
$page=$_SESSION['pagevalueForCountry'];
fillpage($page);
}
?>
</body></html>
