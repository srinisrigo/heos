<?php session_start(); ?>
<?//php include "xajaxtransaction.php"; include "./Images/dbconnection.php";
?>
<html>
<head>
<title>Applicant Registration</title>
<script type="text/javascript" src="./Images/datetimepicker.js"></script>
<script type="text/javascript" src="./Images/transactionscript.js"></script>
<link rel="stylesheet" href="./Images/heoscss.css">
<script language="javascript">
function setBack(){ window.location="homePage.php"; }
function btover(obj,cname){ obj.className=cname; }

function createRow(){
tobj=document.getElementById('contactdetails');
crobj=tobj.rows;
var row=crobj.length; robj=tobj.insertRow(row);  sno=row-1;
c1=robj.insertCell(0); c2=robj.insertCell(1); c3=robj.insertCell(2);
c4=robj.insertCell(3); c5=robj.insertCell(4); c6=robj.insertCell(5); c7=robj.insertCell(6);
arindex=crobj.length-2;
c1.innerHTML="<input type=\"text\" name=\"contactperson["+arindex+"]\" id=\"contactperson["+arindex+"]\">";
c2.innerHTML="<input type=\"text\" name=\"relation["+arindex+"]\" id=\"designation["+arindex+"]\">";
c3.innerHTML="<input type=\"text\" name=\"email["+arindex+"]\" id=\"email["+arindex+"]\">";
c4.innerHTML="<input type=\"text\" name=\"mobile["+arindex+"]\" id=\"mobile["+arindex+"]\">";
c5.innerHTML="<input type=\"text\" name=\"phone["+arindex+"]\" id=\"phone["+arindex+"]\">";
c6.innerHTML="<input type=\"text\" name=\"fax["+arindex+"]\" id=\"fax["+arindex+"]\">";
c7.innerHTML="<a href=\"javascript:createRow();\">Add</a>&nbsp;&nbsp;<a href=\"javascript:deleteRow();\">Delete</a>";
robj=document.getElementById('contactdetails').rows; prerow=row-1;
stDlrow="<a href=\"javascript:deleteSingleRow("+prerow+");\">Delete</a>";
cobj=document.getElementById('contactdetails').rows[prerow].cells; cobj[6].innerHTML="";
}

function deleteRow(){ dtobj=document.getElementById('contactdetails').rows; drow=dtobj.length-1;
if(dtobj.length >2){ document.getElementById('contactdetails').deleteRow(drow);
robj=document.getElementById('contactdetails').rows; prerow=drow-1;
cobj=document.getElementById('contactdetails').rows[prerow].cells;
cobj[6].innerHTML='<a href=\"javascript:createRow();\">Add</a>&nbsp;&nbsp;<a href=\"javascript:deleteRow();\">Delete</a>';}}

function deleteSingleRow(drow){ document.getElementById('contactdetails').deleteRow(drow);}


function createRow1(){
tobj=document.getElementById('uploadcopies');
crobj=tobj.rows;
var row=crobj.length; robj=tobj.insertRow(row);  sno=row-1;
c1=robj.insertCell(0);//c6=robj.insertCell(5);
c7=robj.insertCell(1);
arindex=crobj.length-2;
c1.innerHTML="<input type=\"file\" name=\"upload["+arindex+"]\" id=\"upload["+arindex+"]\">";
c7.innerHTML="<a href=\"javascript:createRow1();\">Add</a>&nbsp;&nbsp;<a href=\"javascript:deleteRow1();\">Delete</a>";
robj=document.getElementById('uploadcopies').rows; prerow=row-1;
stDlrow="<a href=\"javascript:deleteSingleRow1("+prerow+");\">Delete</a>";
cobj=document.getElementById('uploadcopies').rows[prerow].cells; cobj[1].innerHTML="";
}
function deleteRow1()
{
dtobj=document.getElementById('uploadcopies').rows; drow=dtobj.length-1;
if(dtobj.length >2)
{
document.getElementById('uploadcopies').deleteRow(drow);
robj=document.getElementById('uploadcopies').rows; prerow=drow-1;
cobj=document.getElementById('uploadcopies').rows[prerow].cells;
cobj[1].innerHTML='<a href=\"javascript:createRow1();\">Add</a>&nbsp;&nbsp;<a href=\"javascript:deleteRow1();\">Delete</a>';}}
function deleteSingleRow1(drow){ document.getElementById('uploadcopies').deleteRow(drow);}

function createRowAC(){
tobj=document.getElementById('acadamicBG');
crobj=tobj.rows;
var row=crobj.length; robj=tobj.insertRow(row);  sno=row-1;
c1=robj.insertCell(0); c2=robj.insertCell(1); c3=robj.insertCell(2);
c4=robj.insertCell(3); c7=robj.insertCell(4);
arindex=crobj.length-3;
c1.innerHTML="<input type=\"text\" name=\"course["+arindex+"]\" id=\"course["+arindex+"]\">";
c2.innerHTML="<input type=\"text\" name=\"institute["+arindex+"]\" id=\"institute["+arindex+"]\">";
c3.innerHTML="<input type=\"text\" name=\"duration["+arindex+"]\" id=\"duration["+arindex+"]\"  size=2 maxlength=2>";
c4.innerHTML="<input type=\"text\" name=\"garde["+arindex+"]\" id=\"garde["+arindex+"]\"  size=1 maxlength=1>";
c7.innerHTML="<a href=\"javascript:createRowAC();\">Add</a>&nbsp;&nbsp;<a href=\"javascript:deleteRowAC();\">Delete</a>";
robj=document.getElementById('acadamicBG').rows; prerow=row-1;
stDlrow="<a href=\"javascript:deleteSingleRowAC("+prerow+");\">Delete</a>";
cobj=document.getElementById('acadamicBG').rows[prerow].cells; cobj[4].innerHTML="";
}

function deleteRowAC(){ dtobj=document.getElementById('acadamicBG').rows; drow=dtobj.length-1;
if(dtobj.length >3){ document.getElementById('acadamicBG').deleteRow(drow);
robj=document.getElementById('acadamicBG').rows; prerow=drow-1;
cobj=document.getElementById('acadamicBG').rows[prerow].cells;
cobj[4].innerHTML='<a href=\"javascript:createRowAC();\">Add</a>&nbsp;&nbsp;<a href=\"javascript:deleteRowAC();\">Delete</a>';}}

function deleteSingleRowAC(drow){ document.getElementById('acadamicBG').deleteRow(drow);}

function createRowRI(){
tobj=document.getElementById('Referenceinfo');
crobj=tobj.rows;
var row=crobj.length; robj=tobj.insertRow(row);  sno=row-1;
c1=robj.insertCell(0); c2=robj.insertCell(1); c3=robj.insertCell(2);
c4=robj.insertCell(3);c5=robj.insertCell(4);c6=robj.insertCell(5); c7=robj.insertCell(6);
arindex=crobj.length-3;
c1.innerHTML="<input type=\"text\" name=\"refname["+arindex+"]\" id=\"refname["+arindex+"]\">";
c2.innerHTML="<input type=\"text\" name=\"refoccupation["+arindex+"]\" id=\"refoccupation["+arindex+"]\">";
c3.innerHTML="<input type=\"text\" name=\"refinstitution["+arindex+"]\" id=\"refinstitution["+arindex+"]\">";
c4.innerHTML="<input type=\"text\" name=\"refrealtionship["+arindex+"]\" id=\"refrealtionship["+arindex+"]\">";
c5.innerHTML="<input type=\"text\" name=\"refphonenumber["+arindex+"]\" id=\"refphonenumber["+arindex+"]\">";
c6.innerHTML="<input type=\"text\" name=\"refemailid["+arindex+"]\" id=\"refemailid["+arindex+"]\">";
c7.innerHTML="<a href=\"javascript:createRowRI();\">Add</a>&nbsp;&nbsp;<a href=\"javascript:deleteRowRI();\">Delete</a>";
robj=document.getElementById('Referenceinfo').rows; prerow=row-1;
stDlrow="<a href=\"javascript:deleteSingleRowRI("+prerow+");\">Delete</a>";
cobj=document.getElementById('Referenceinfo').rows[prerow].cells; cobj[6].innerHTML="";
}

function deleteRowRI(){ dtobj=document.getElementById('Referenceinfo').rows; drow=dtobj.length-1;
if(dtobj.length >3){ document.getElementById('Referenceinfo').deleteRow(drow);
robj=document.getElementById('Referenceinfo').rows; prerow=drow-1;
cobj=document.getElementById('Referenceinfo').rows[prerow].cells;
cobj[6].innerHTML='<a href=\"javascript:createRowRI();\">Add</a>&nbsp;&nbsp;<a href=\"javascript:deleteRowRI();\">Delete</a>';}}

function deleteSingleRowRI(drow){ document.getElementById('Referenceinfo').deleteRow(drow);}

</script>
</head>
<body>
<?php
print "<form enctype=\"multipart/form-data\" action=\"application.php\" method=POST>
<table id=\"perinfo\" width=100% align=center cellspacing=1 cellpadding=0>
<tr class=\"balanceheaderrow\"><th colspan=7><b>Personal Infromation</th></tr>
<tr class=\"label\"><td>Address</td>
<td><textarea class=\"textarea\" name=\"address\" id=\"address\" cols=\"30\" rows=\"4\"></textarea></td><td>Zip/Pin/Post Code</td>
<td><input class=\"input\" type=\"text\" name=\"postcode\" id=\"postcode\"></td>
<td>passport number</td><td><input type=\"text\" name=\"passportno\" id=\"passportno\"></td></tr></table><br>\n";
//contact details
print"<table name=\"contactdetails\" id=\"contactdetails\" align=center border=0 cellspacing=1 cellpadding=0 width=100%>
<tr><th>Contact Person</th><th>Relationship</th><th>E-mail</th><th>Mobile</th><th>Phone</th><th>Fax</th><th></th></tr>
<tr>
<td><input type=\"text\" name=\"contactperson[0]\" value=\"\" id=\"contactperson[0]\" onKeyPress=\"return keyRestrict(event,'abcdefghijklmnopqrstuvwxyz. '+String.fromCharCode(241))\"></td>
<td><input type=\"text\" name=\"relation[0]\" value=\"\" id=\"designation[0]\" onKeyPress=\"return keyRestrict(event,'abcdefghijklmnopqrstuvwxyz. '+String.fromCharCode(241))\"></td>
<td><input type=\"text\" name=\"email[0]\" id=\"email[0]\" onKeyPress=\"return keyRestrict(event,'1234567890abcdefghijklmnopqrstuvwxyz-._@*'+String.fromCharCode(241))\"></td>
<td><input type=\"text\" name=\"mobile[0]\" id=\"mobile[0]\" onKeyPress=\"return keyRestrict(event,'1234567890+-'+String.fromCharCode(241))\"></td>
<td><input type=\"text\" name=\"phone[0]\" id=\"phone[0]\" onKeyPress=\"return keyRestrict(event,'1234567890+-'+String.fromCharCode(241))\"></td>
<td><input type=\"text\" name=\"fax[0]\" id=\"fax[0]\" onKeyPress=\"return keyRestrict(event,'1234567890+-'+String.fromCharCode(241))\"></td>
<td><a href=\"javascript:createRow();\">Add</a>&nbsp;&nbsp;<a href=\"javascript:deleteRow();\">Delete</a></td></tr>
</table><br>\n";
//copies to upload
print"<table name=\"uploadcopies\" id=\"uploadcopies\" align=center border=0 cellspacing=1 cellpadding=0>
<tr><th colspan=2>Copies to upload</th></tr>
<tr><td><input type=\"file\" name=\"upload[0]\" value=\"\" id=\"upload[0]\" onKeyPress=\"return keyRestrict(event,'abcdefghijklmnopqrstuvwxyz. '+String.fromCharCode(241))\"></td>
<td><a href=\"javascript:createRow1();\">Add</a>&nbsp;&nbsp;<a href=\"javascript:deleteRow1();\">Delete</a></td></tr>
</table><br>\n";

//acadamic bg
print"<table name=\"acadamicBG\" id=\"acadamicBG\" width=100% align=center cellspacing=1 cellpadding=0>
<tr><th colspan=5><b>Academic Backround</th></tr>
<tr><td>Course Name</td><td>Institute Name</td><td>Duration</td><td>Grade</td><td>&nbsp;</td></tr>
<tr><td><input class=\"input\" type=\"text\" name=\"course[0]\" id=\"course[0]\"></td>
<td><input type=\"text\" name=\"institute[0]\" id=\"institute[0]\"></td>
<td><input type=\"text\" name=\"duration[0]\" id=\"duration[0]\" size=2 maxlength=2>months</td>
<td><input type=\"text\" name=\"garde[0]\" id=\"garde[0]\" size=1 maxlength=1></td>
<td><a href=\"javascript:createRowAC();\">Add</a>&nbsp;&nbsp;<a href=\"javascript:deleteRowAC();\">Delete</a></td></tr>
</table><br>\n";
//
print"<table width=100% align=center cellspacing=1 cellpadding=0>
<tr class=\"balanceheaderrow\"><th colspan=4>Employment Information</th></tr>
<tr class=\"label\"><td>Employer</td><td>Designation</td><td>Start Date</td><td>End Date</td></tr>
<tr class=\"label\"><td><input class=\"input\" type=\"text\" name=\"employer1\" id=\"employer1\"></td>
<td><input class=\"input\" type=\"text\" name=\"designation1\" id=\"designation1\"></td>
<td><input class=\"date\" type=\"text\" name=\"startdate1\" readonly id=\"startdate1\" size=9 maxlength=10>
<a href=\"javascript:NewCal('startdate1','yyyymmdd')\">
<img src=\"./Images/cal.gif\" alt=\"Pick a date\" widtd=\"20\" height=\"20\" border=\"0\"></a></td>
<td><input class=\"date\" type=\"text\" name=\"enddate1\" id=\"enddate1\" readonly size=9 maxlength=10>
<a href=\"javascript:NewCal('enddate1','yyyymmdd')\">
<img src=\"./Images/cal.gif\" alt=\"Pick a date\" widtd=\"20\" height=\"20\" border=\"0\"></a></td></tr>
<tr class=\"label\"><td><input class=\"input\" type=\"text\" name=\"employer2\" id=\"employer2\"></td>
<td><input class=\"input\" type=\"text\" name=\"designation2\" id=\"designation2\"></td>
<td><input class=\"date\" type=\"text\" name=\"startdate2\" readonly id=\"startdate2\" size=9 maxlength=10>
<a href=\"javascript:NewCal('startdate2','yyyymmdd')\">
<img src=\"./Images/cal.gif\" alt=\"Pick a date\" widtd=\"20\" height=\"20\" border=\"0\"></a></td>
<td><input class=\"date\" type=\"text\" name=\"enddate2\" id=\"enddate2\" readonly size=9 maxlength=10>
<a href=\"javascript:NewCal('enddate2','yyyymmdd')\">
<img src=\"./Images/cal.gif\" alt=\"Pick a date\" widtd=\"20\" height=\"20\" border=\"0\"></a></td></tr>
</table><br>\n";

//Reference information
print"<table name=\"Referenceinfo\" id=\"Referenceinfo\" align=center cellspacing=1 cellpadding=0 width=100%>
<tr class=\"balanceheaderrow\"><th colspan=7>Reference Information</th></tr>
<tr class=\"label\"><td>Name</td><td>Occupation</td><td>Institution</td>
<td>Relationship</td><td>Phone number</td><td>E-mail ID</td><td>&nbsp;</td></tr>
<tr class=\"label\"><td><input class=\"input\" type=\"text\" name=\"refname[0]\" id=\"refname[0]\"></td>
<td><input class=\"input\" type=\"text\" name=\"refoccupation[0]\" id=\"refoccupation[0]\"></td>
<td><input class=\"input\" type=\"text\" name=\"refinstitution[0]\" id=\"refinstitution[0]\"></td>
<td><input class=\"input\" type=\"text\" name=\"refrealtionship[0]\" id=\"refrealtionship[0]\"></td>
<td><input class=\"input\" type=\"text\" name=\"refphonenumber[0]\" id=\"refphonenumber[0]\"></td>
<td><input class=\"input\" type=\"text\" name=\"refemailid[0]\" id=\"refemailid[0]\"></td>
<td><a href=\"javascript:createRowRI();\">Add</a>&nbsp;&nbsp;<a href=\"javascript:deleteRowRI();\">Delete</a></td></tr></table>
<table align=center cellpadding=1 cellspacing=0><tr class=\"label\"><td align=center colspan=6><input class=\"buttonstatic\" type=\"button\" value=\"Cancel\"
 onClick=\"setBack();\" onmouseover=\"btover(this,'buttonover');\" onmouseout=\"btover(this,'buttonstatic');\">
&nbsp;&nbsp;&nbsp;<input class=\"buttonstatic\" type=\"submit\" value=\"Submit\" name=\"submit\"
onmouseover=\"btover(this,'buttonover');\" onmouseout=\"btover(this,'buttonstatic');\"></td></tr>
</table></form>";
?>

</body>
</html>
<?php
if(isset($_POST['submit'])){

$address=$_POST['address']; $postcode=$_POST['postcode'];
$citizen=$_POST['citizen']; $phoneno=$_POST['phoneno'];
$mobileno=$_POST['mobileno']; $faxno=$_POST['faxno'];
$dob=$_POST['dob']; $passportno=$_POST['passportno'];
$passportcopy=$_FILES['passportcopy']['name'];  $photo=$_FILES['photo']['name'];
$course1=$_POST['course1']; $institute1=$_POST['institute1'];
$duration1=$_POST['duration1']; $garde1=$_POST['garde1'];
$course2=$_POST['course2']; $institute2=$_POST['institute2'];
$duration2=$_POST['duration2']; $garde2=$_POST['garde2'];
$employer1=$_POST['employer1']; $designation1=$_POST['designation1'];
$startdate1=$_POST['startdate1']; $enddate1=$_POST['enddate1'];
$employer2=$_POST['employer2']; $designation2=$_POST['designation2'];
$startdate2=$_POST['startdate2']; $enddate2=$_POST['enddate2'];
$refname1=$_POST['refname1']; $refoccupation1=$_POST['refoccupation1'];
$refinstitution1=$_POST['refinstitution1']; $refrealtionship1=$_POST['refrealtionship1'];
$refphonenumber1=$_POST['refphonenumber1']; $refemailid1=$_POST['refemailid1'];
$refname2=$_POST['refname2']; $refoccupation2=$_POST['refoccupation2'];
$refinstitution2=$_POST['refinstitution2']; $refrealtionship2=$_POST['refrealtionship2'];
$refphonenumber2=$_POST['refphonenumber2']; $refemailid2=$_POST['refemailid2'];

$username=$_SESSION['username']; $password=$_SESSION['password'];

$fetch=mysql_query("select * from applicantdetails where applicantid='$username' and password='$password'",$con);
while($a=mysql_fetch_array($fetch)){ $title=$a['title']; $firstname=$a['firstname']; $middlename=$a['middlename']; $lastname=$a['lastname']; $email=$a['mailid']; }
$applicantname=$title.'.'.$firstname.$middlename.$lastname;

if ($_FILES['passportcopy']['name'] != ""){ if(!(is_dir("upload"))) mkdir("upload");
copy($_FILES['passportcopy']['tmp_name'],"upload/".$_FILES['passportcopy']['name']);   }
if ($_FILES['photo']['name'] != ""){ if(!(is_dir("upload"))) mkdir("upload");
copy($_FILES['photo']['tmp_name'],"upload/".$_FILES['photo']['name']);     }

$queryupdate="update applicantdetails set address='$address',
postcode='$postcode',citizenof='$citizen',phonenumber='$phoneno',mobilenumber='$mobileno',faxnumber='$faxno',
dateofbirth='$dob',passportnumber='$passportno',passportcopy='$passportcopy',photocopy='$photo',
course1='$course1',institute1='$institute1',duration1='$duration1',grade1='$garde1',course2='$course2',institute2='$institute2',
duration2='$duration2',grade2='$garde2',employer1='$employer1',designation1='$designation1',startdate1='$startdate1',enddate1='$enddate1',
employer2='$employer2',designation2='$designation2',startdate2='$startdate2',enddate2='$enddate2',refname1='$refname1',
refoccupation1='$refoccupation1',refinstitution1='$refinstitution1',refrelationship1='$refrealtionship1',refphonenumber1='$refphonenumber1',refemail1='$refemailid1',
refname2='$refname2',refoccupation2='$refoccupation2',refinstitution2='$refinstitution2',refrelationship2='$refrealtionship2',refphonenumber2='$refphonenumber2',
refemail2='$refemailid2',appfill='1' where applicantid='$username' and password='$password'";

$queryregiinsert=mysql_query($queryupdate,$con);
/*
$to = "$email";
$subject = "Course confirmation";
$msg = "\t\t\t\tHello $applicantname\n\t\tThanks for your Apply.\nconfirm your VISA.";
$headers = "From:trn_sash@yahoo.co.in\nReply-To: trn_sash@yahoo.co.in";
$config = "-stfu@noob.com";
mail("$to", "$subject", "$msg", "$headers", "$config"); */
$_SESSION['studentid']=$username;
echo "<script text/javascript>window.location='homePage.php';</script>";
}

?>
