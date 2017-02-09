<?php
session_start();
include "../DataBase/dbconnection.php";
?>
<html>
<head>
<script language="javascript" type="text/javascript" src="../Scripts/MasterScript.js"></script>
<script language="javascript">
function createRow()
{
    tobj=document.getElementById('contactdeatils');
    crobj=tobj.rows;
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
    stDlrow="<a href=\"javascript:deleteSingleRow("+prerow+");\">Delete</a>";
    cobj=document.getElementById('contactdeatils').rows[prerow].cells; cobj[6].innerHTML="";
}

function deleteRow()
{
    dtobj=document.getElementById('contactdeatils').rows; drow=dtobj.length-2;
    if(dtobj.length >3)
    {
        document.getElementById('contactdeatils').deleteRow(drow);
        robj=document.getElementById('contactdeatils').rows; prerow=drow-1;
        cobj=document.getElementById('contactdeatils').rows[prerow].cells;
        cobj[6].innerHTML='<a href=\"javascript:createRow();\">Add</a>&nbsp;&nbsp;<a href=\"javascript:deleteRow();\">Delete</a>';
    }
}

function deleteSingleRow(drow)
{
    document.getElementById('contactdeatils').deleteRow(drow);
}

function prevImage()
{
    document.getElementById('StudentImage').src=document.getElementById('File1').value;
}
</script>
<link href="../Style/heoscss.css" rel="stylesheet" type="text/css">
<title>College</title>
</head>

<?php
if(!isset($_POST['editButton']) && !isset($_POST['btncancel']) && !isset($_POST['deleteButton']) && !isset($_POST['btnupdate']) && !isset($_POST['addButton']))
{
$_SESSION['editreference']="";
$_SESSION['updatereference']="";
MainForm();
CollegeDetailsFill();
}

function CollegeDetailsFill()
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
if(!isset($_SESSION['pagevalueforCollege']))
{
$page=1;
$_SESSION['pagevalueforCollege']=$page;
fillPage($page);
}
else
{
$page=$_SESSION['pagevalueforCollege'];
$_SESSION['pagevalueforCollege']=$page;
}
}
else
{
$page=$_SESSION['pagevalueforCollege'];
fillPage($page);
}
}
else
{
$page = $_GET['page'];
$_SESSION['pagevalueforCollege']=$page;
fillPage($page);
}
}

if(isset($_POST['addButton']))
{
$CollegeNameTxt=trim($_POST['CollegeNameTxt']);
if(!empty($CollegeNameTxt)){
$TemplateDesign=trim($_POST['TemplateDesign']);
$Address=trim($_POST['address']);
$CountryId=trim($_POST['CountryCodeCom']);
$Location=trim($_POST['Location']);
$LetterHeadDimmension=trim($_POST['LetterHeadDimmension']);
$Website=trim($_POST['Website']);
$noofslots=trim($_POST['noofslots']);
$Collegelogo=$_POST['File1']['name'];
$CollegeNameTxt = ucfirst($CollegeNameTxt);
//$AddressImp = array($AddLine1, $AddLine2, $AddLine3, $AddLine4);
//$Address =  implode("+", $AddressImp);
$contactperson=$_POST['contactperson'];
$designation1=$_POST['designation'];
$email1=$_POST['email'];
$mobile1=$_POST['mobile'];
$phone1=$_POST['phone'];
$fax1=$_POST['fax'];

//$con=mysql_connect("localhost","root","admin"); $db=mysql_select_db("heos");
$queryforCollegecount=mysql_query("select count(*) from collegedetails where Collegename='$CollegeNameTxt'");
$Collegecount=mysql_result($queryforCollegecount,0);

if($Collegecount==0)
{
$name=trim($_POST['CollegeNameTxt']);
$ext='.jpg';
$name.=$ext;
$name=strtoupper($name);

if($_FILES['File1']['name'] != "")
{
    if(!(is_dir("upload"))) mkdir("upload");
    copy($_FILES['File1']['tmp_name'],"upload/".$name);
}

$queryCollegeinsert=mysql_query("insert into collegedetails values('0','$CollegeNameTxt','$name','$TemplateDesign','$LetterHeadDimmension','$Location','$Address','$CountryId','$Website','$noofslots')");
$sel=mysql_query("select Collegeid from collegedetails");
while($ar=mysql_fetch_array($sel)) { $Collegeid=$ar['Collegeid']; }

foreach($contactperson as $k=>$value)
{
    if(!empty($value))
    {
        $designation=$designation1[$k];
        $email=$email1[$k];
        $mobile=$mobile1[$k];
        $phone=$phone1[$k];
        $fax=$fax1[$k];
        $contact=mysql_query("insert into contactdetails values('0','$Collegeid','collegedetails','$value','$designation','$email','$mobile','$phone','$fax')");
    }
}

echo "<meta http-equiv='refresh' content='0;URL=college.php'>";
if($queryCollegeinsert) echo "<script type=\"text/javascript'>alert('Successfully Inserted')</script>";
}
else echo "<script type='text/javascript'>alert('College Already exists')</script>";
}
MainForm();
CollegeDetailsFill();
}

function fillPage($page)
{
@$cat=$_GET['cat'];
$_SESSION['pagevalueforCollege']=$page;
$page  = (int) $page;
$limit = 5;
//$con=mysql_connect("192.168.15.26","root","admin"); $db=mysql_select_db("heos");
$result = mysql_query("select count(*) from collegedetails");
$total = mysql_result($result, 0);
$pager  = getPagerData($total, $limit, $page);

if($total==0){$offset=0;}
else{$offset = $pager->offset;}
$limit  = $pager->limit;
$page   = $pager->page;
$queryselectCollege="select * from collegedetails order by Collegename limit $offset,$limit";
$queryselectCollegeExec=mysql_query($queryselectCollege);
if(mysql_num_rows($queryselectCollegeExec)){
print "<form enctype='multipart/form-data' method='post' name='CollegeDetails'>
<table border=0 cellspacing=1 cellpadding=0>
<tr><th>S.No</th><th>College Name</th><th>College Website</th><th>College Loaction</th><th>College Address</th><th colspan=2></th></tr>\n";
$sno=1;
while($Fetch=mysql_fetch_array($queryselectCollegeExec)){
$Collegeid=$Fetch["Collegeid"];
$Collegename=$Fetch["Collegename"];
$Collegelogo=$Fetch["Collegelogo"];
$Templatedesign=$Fetch["Templatedesign"];
$Letterheaddimensions=$Fetch["Letterheaddimensions"];
$Location=$Fetch["Location"];
$Address=$Fetch["Address"];
$CountryID=$Fetch["CountryID"];
$website=$Fetch["website"];
$sql =mysql_query("select CountryName from countrydetails where CountryId='$CountryID'");
$CountryName = mysql_result($sql,0);
print "<tr class='label'><td name=d[] value='$sno'>$sno</td>
<td>$Collegename</td><td>$website</td><td>$Location</td><td>$Address</td>
<input type='hidden' name='Collegeid[]' value='$Collegeid'>
<td><input type='submit' id='editButton' name='editButton[$Collegename]' value='Edit'></td>
<td><input type='submit' id='deleteButton' name='deleteButton[$Collegename]'  value='Delete'></td></tr>\n";
$sno=$sno+1;
}
print "<tr><td align='center' colspan='8' class='label'>\n";
if ($page == 1) // this is the first page - there is no previous page
echo "Previous";
else            // not the first page, link to the previous page
echo "<a href='college.php?page=" . ($page - 1) . "'>Previous</a>";
print " ||  \n";
if ($page == $pager->numPages) // this is the last page - there is no next page
echo "Next";
else            // not the last page, link to the next page
echo "<a href='college.php?page=" . ($page + 1) . "'>Next</a>";
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
$CollegeFordelete=$_POST['deleteButton'];
$_SESSION['$CollegeFordelete']=$CollegeFordelete;
echo "<script langauge='javascript'>var
result=confirm('Are You Sure Want to Delete');
if(result){val='delete';self.location='college.php?cat=' + val;}else{val='dontdelete';self.location='college.php?cat=' + val;}</script>";
}


@$cat=$_GET['cat'];
if(isset($cat) and strlen($cat) == 6)
{
$CollegeDelete=$_SESSION['$CollegeFordelete'];
$CollegeArray=array_keys($CollegeDelete);
//$con=mysql_connect("192.168.15.26","root","admin"); $db=mysql_select_db("heos");
$queryCollegedelete=mysql_query("delete from collegedetails where Collegename='$CollegeArray[0]'");
if($queryCollegedelete) echo "<script type='text/javascript'>alert('Successfully Deleted')</script>";
$page=$_SESSION['pagevalueforCollege'];
fillpage($page);
}
else if(isset($cat) and strlen($cat) == 10)
{
$page=$_SESSION['pagevalueforCollege'];
fillpage($page);
}

function deletefill()
{
$page=$_SESSION['pagevalueforCollege'];
fillpage($page);
}

/////////////////////////////////////////////////////////////////////////////////////////
if(isset($_POST['editButton']))
{
$presentcount=$_POST['editButton'];
$_SESSION['CollegeAfterEdit']=$presentcount;
editFill();
}

if(isset($_POST['btncancel']))
{
$page=$_SESSION['pagevalueforCollege'];
MainForm();
CollegeDetailsFill();
}

if(isset($_POST['btnupdate']))
{
$flag=0;
$Ecollegeid=$_POST['ECollegeId'];
$ECollegeNameTxt=trim($_POST['ECollegeNameTxt']);
$ECollegelogo=trim($_POST['ECollegelogo']);
$ETemplateDesign=trim($_POST['ETemplateDesign']);
$Address=trim($_POST['Eaddress']);
$ECountryId=trim($_POST['ECountryCodeCom']);
$ELocation=trim($_POST['ELocation']);
$ELetterHeadDimmension=trim($_POST['ELetterHeadDimmension']);
$EWebsite=trim($_POST['EWebsite']);
$Enoofslots=trim($_POST['Enoofslots']);
$ECollegeNameTxt = ucfirst($ECollegeNameTxt);
//$AddressImp = array($EAddLine1, $EAddLine2, $EAddLine3, $EAddLine4);
//$Address =  implode("+", $AddressImp);

$f11=$_POST['contactperson'];
$f12=$_POST['designation'];
$f13=$_POST['email'];
$f14=$_POST['mobile'];
$f15=$_POST['phone'];
$f16=$_POST['fax'];

//$con=mysql_connect("192.168.15.26","root","admin"); $db=mysql_select_db("heos");
$queryCollegeUpdate=mysql_query("update collegedetails set Templatedesign='$ETemplateDesign',Letterheaddimensions='$ELetterHeadDimmension',Location='$ELocation',Address='$Address',CountryID='$ECountryId',website='$EWebsite',noofslots='$Enoofslots' where Collegename='$ECollegeNameTxt'");

$delcon=mysql_query("delete from contactdetails where recordid='$Ecollegeid' and tablename='collegedetails'");
foreach($f11 as $k=>$value)
{
if(!empty($value))
{
$designation=$f12[$k];
$email=$f13[$k];
$mobile=$f14[$k];
$phone=$f15[$k];
$fax=$f16[$k];
$contact=mysql_query("insert into contactdetails values('0','$Ecollegeid','collegedetails','$value','$designation','$email','$mobile','$phone','$fax')");
}}
if($queryCollegeUpdate) echo "<script type='text/javascript'>alert('Updated Successfully')</script>";
MainForm();
CollegeDetailsFill();
}


function editFill()
{
$page=$_SESSION['pagevalueforCollege'];
$limit = 5;
//$con=mysql_connect("192.168.15.26","root","admin"); $db=mysql_select_db("heos");
$result = mysql_query("select count(*) from collegedetails");
$total = mysql_result($result, 0);
$pager  = getPagerData($total, $limit, $page);
$offset = $pager->offset;
$limit  = $pager->limit;
$page   = $pager->page;
$arrayEmbassy=$_SESSION['CollegeAfterEdit'];

$querySelectCollegeE="select * from collegedetails order by Collegename limit $offset,$limit";
$querySelectCollegeExecE=mysql_query($querySelectCollegeE);

while($EFetch=mysql_fetch_array($querySelectCollegeExecE))
{
$Collegeid=$EFetch["Collegeid"];
$Collegename=$EFetch["Collegename"];
$Collegelogo=$EFetch["Collegelogo"];
$Templatedesign=$EFetch["Templatedesign"];
$Letterheaddimensions=$EFetch["Letterheaddimensions"];
$Location=$EFetch["Location"];
$Address=$EFetch["Address"];
$CountryID=$EFetch["CountryID"];
$website=$EFetch["website"];
$noofslots=$EFetch["noofslots"];

if(array_key_exists($Collegename,$arrayEmbassy))
{
$queryselectCollege1 =mysql_query("select Collegeid from collegedetails where Collegename='$Collegename'");
$CollegeId1 = mysql_result($queryselectCollege1, 0);


//EditForm($Collegeid,$Collegename,$Collegelogo,$Templatedesign,$Letterheaddimensions,$Location,$Address,$CountryID,$website);
$CollegenameUpper=strtoupper($Collegename);
$Logo="";
$imgdir = "upload"; // the directory, where your images are stored
$allowed_types = array('png','jpg','jpeg','gif'); // list of filetypes you want to show
$dimg = opendir($imgdir);
while($imgfile = readdir($dimg))
{
if(in_array(strtolower(substr($imgfile,-3)),$allowed_types))
{
$a_img[] = $imgfile;
sort($a_img);
reset ($a_img);
}
}
$totimg = count($a_img); // total image number
for($x=0; $x < $totimg; $x++)
{
$size = getimagesize($imgdir.'/'.$a_img[$x]);
$halfwidth = ceil($size[0]/2);
$halfheight = ceil($size[1]/2);
$name=$CollegenameUpper ;
$exten='.jpg';
$name.=$exten;
if($a_img[$x]==strtoupper($name)){$Logo="upload/".$a_img[$x];}else{}
}

/////////////////////////////////////////////////////////////////////////////////////////

print"<body onload='document.ECollegeDetails.ECollegeNameTxt.focus()'>
<form enctype='multipart/form-data' method='post' name='ECollegeDetails'>
<table border=0 cellspacing=1 cellpadding=0><tr class='headerrow'><th align='center' colspan='4'>
<input type='hidden' name='ECollegeId' value='$CollegeId1'><input type='hidden' name='ECollegelogo' value='$Collegelogo'>COLLEGE DETAILS EDIT</th></tr>

<tr class='label'><td>College Name</td><td><input type='text' value='$Collegename' input name='ECollegeNameTxt' id='ECollegeNameTxt' readonly></td>
<td>Template Design</td><td><select name='ETemplateDesign' id='ETemplateDesign'>
<option value='select'>Select</option> \n";
if($Templatedesign=="Template1") print "<option value='Template1' selected>Template1</option>"; else print "<option value='Template1'>Template1</option>";
if($Templatedesign=="Template2") print "<option value='Template2' selected>Template2</option>"; else print "<option value='Template2'>Template2</option>";
if($Templatedesign=="Template3") print "<option value='Template3' selected>Template3</option>"; else print "<option value='Template3'>Template3</option>";
if($Templatedesign=="Template4") print "<option value='Template4' selected>Template4</option>"; else print "<option value='Template4'>Template4</option>";   //return PreStudImage();
print "</select></td></tr>

<tr class='label'><td>Address</td><td><textarea class='textarea' name='Eaddress' id='Eaddress'>$Address</textarea></td>
<td>College Logo</td><td><input type='file' input name='File1' id='File1'></td>
</tr>

<tr class='label'><td>Location</td><td><input type='text' value='$Location' name='ELocation' id='ELocation'></td><td>Country</td><td><select name='ECountryCodeCom' id='ECountryCodeCom' class='citizen'>
<option  value='select'>Select</option>";
//$con=mysql_connect("192.168.15.26","root","admin"); $db=mysql_select_db("heos");
$sqlE ="select CountryId,CountryName from countrydetails order by CountryName";
$rsE=mysql_query($sqlE);

while($Combo=mysql_fetch_array($rsE))
{
$id=$Combo["CountryId"];
$name=$Combo["CountryName"];
if($id==$CountryID){echo "<option value='$id' selected>$name</option>"; }else{echo"<option value='$id'>$name</option>";}
}
print" </select>&nbsp;&nbsp;&nbsp;&nbsp;<a href='country.php'>New</a></td>
</tr>

<tr class='label'>
<td>Letter Head Dimension</td><td><select name='ELetterHeadDimmension' id= 'ELetterHeadDimmension'>
<option value='select'>Select</option> \n";
if($Letterheaddimensions=="A4") print "<option value='A3' selected>A3</option>"; else print "<option value='A3'>A3</option>";
if($Letterheaddimensions=="A3") print "<option value='A4' selected>A4</option>"; else print "<option value='A4'>A4</option>";
print "</select></td><td>Website</td><td><input type='text' value='$website' name='EWebsite' id='EWebsite'></td>
</tr>

<tr><td>Number of slots/Day</td><td colspan=3><input type='text' value='$noofslots' name='Enoofslots' id='Enoofslots' size=2></td></tr>
</table>
<br><br><table id='contactdeatils' border=0 cellspacing=1 cellpadding=0>
<tr><th>Contact Person</th><th>Designation</th><th>E-mail</th><th>Mobile</th><th>Phone</th><th>Fax</th><th></th></tr>";
$seltot=mysql_query("select count(*) from contactdetails where recordid='$Collegeid' and tablename='collegedetails'");
$total=mysql_result($seltot,0);
$index=0;

$sel=mysql_query("select * from contactdetails where recordid='$Collegeid' and tablename='collegedetails'");
while($ar=mysql_fetch_array($sel)){
$contactperson=$ar['contactperson']; $designation=$ar['designation']; $email=$ar['email']; $mobileno=$ar['mobileno']; $phoneno=$ar['phoneno']; $faxno=$ar['faxno'];
if($index==($total-1)) break;
print "<tr>
<td><input type='text' name='contactperson[$index]' id='contactperson[$index]' value='$contactperson'></td>
<td><input type='text' name='designation[$index]' id='designation[$index]' value='$designation'></td>
<td><input type='text' name='email[$index]' id='email[$index]' value='$email'></td>
<td><input type='text' name='mobile[$index]' id='mobile[$index]' value='$mobileno'></td>
<td><input type='text' name='phone[$index]' id='phone[$index]' value='$phoneno'></td>
<td><input type='text' name='fax[$index]' id='fax[$index]' value='$faxno'></td>
<td></td></tr>";
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
<tr><td colspan=7 align=center><input type='submit' id='btnupdate' name='btnupdate' onclick='return Bank_details_validation()' value='Update'>
&nbsp;&nbsp;&nbsp;<input type='submit' id='btncancel' name='btncancel' value='Cancel'></td></tr></table><br>\n";
} //while
} //arraykey
print "</td></tr></table></form>\n";
}

function MainForm()
{
// return PreStudImage();
print"<body onload='document.CollegeDetails.CollegeNameTxt.focus()'>
<form enctype='multipart/form-data' method='post' name='CollegeDetails'>
<table border=0 cellspacing=1 cellpadding=0>
<tr class='headerrow'><th colspan='4'>COLLEGE DETAILS</th></tr>
<tr class='label'><td>College Name</td><td><input type='text' value='' name='CollegeNameTxt' id='CollegeNameTxt'></td>
<td>Template Design</td><td><select name='TemplateDesign' id='TemplateDesign'>
<option value='--Select--'>--Select--</option><option value='Template1'>Template1</option><option value='Template2'>Template2</option>
<option value='Template3'>Template3</option><option value='Template4'>Template4</option></select></td></tr>

<tr class='label'><td>Address</td><td><textarea class='textarea' name='address' id='address'></textarea></td>
<td>College Logo</td><td><input type='file' input name='File1' id='File1'></td>
</tr>
<tr><td>Location</td><td><input type='text' value='' name='Location' id='Location'></td><td>Country</td><td><select name='CountryCodeCom' id='CountryCodeCom' class='citizen'>
<option value='--Select--'>--Select--</option>";
//$con=mysql_connect("192.168.15.26","root","admin"); $db=mysql_select_db("heos");
$sql ="select CountryId,CountryName from countrydetails order by CountryName";
$rs=mysql_query($sql);
while($Combo=mysql_fetch_array($rs))
{
$CountryId=$Combo["CountryId"];
$CountryName=$Combo["CountryName"];
echo"<option value=$CountryId>$CountryName</option>";
}
echo"</select>&nbsp;&nbsp;&nbsp;&nbsp;<a href='country.php'>New</a></td>
</tr>

<tr class='label'>
<td>Letter Head Dimension</td><td><select name='LetterHeadDimmension' id='LetterHeadDimmension'>
<option value='--Select--'>--Select--</option><option value='A4'>A4</option><option value='A3'>A3</option>
</select></td><td>Website</td><td><input type='text' value='' name='Website' id='Website'></td></tr>
<tr class='label'>
<td>Number of slots/Day</td><td colspan=3><input type='text' value='' name='noofslots' id='noofslots' size=2></td></tr></table>";

print"<br><table id='contactdeatils' border=0 cellspacing=1 cellpadding=0>
<tr><th>Contact Person</th><th>Designation</th><th>E-mail</th><th>Mobile</th><th>Phone</th><th>Fax</th><th></th></tr>
<tr>
<td><input type='text' name='contactperson[0]' value='' id='contactperson[0]'></td>
<td><input type='text' name='designation[0]' value='' id='designation[0]'></td>
<td><input type='text' name='email[0]' id='email[0]'></td>
<td><input type='text' name='mobile[0]' id='mobile[0]'></td>
<td><input type='text' name='phone[0]' id='phone[0]'></td>
<td><input type='text' name='fax[0]' id='fax[0]'></td>
<td><a href='javascript:createRow();'>Add</a>&nbsp;&nbsp;<a href='javascript:deleteRow();'>Delete</a></td></tr>

<tr><td colspan=7 align=center><input type='submit' id='addButton' name='addButton' onclick='return college_details_validation();' value='Add'>
</td></tr></table><br>\n";
}
?>
</body></html>
