<?php
session_start();
require_once(dirname(__FILE__) . '/xajax.inc.php');
function setAge($date){
$objResponse =& new xajaxResponse();
$age=floor((strtotime(date('d-M-Y'))-strtotime($date))/(86400*365));
$objResponse->addScript("document.getElementById('agetext').value='$age';");
return $objResponse->getXML();
}

$xajax =& new xajax();
$xajax->registerFunction("setAge");
$xajax->processRequests();
?>
<html>
<head><title>Staff Details</title>
<link href="./Images/heoscss.css" rel="stylesheet">
<script language="javascript" type="text/javascript" src="staffvalidation.js"></script>
<script type="text/javascript" src="./Images/datetimepicker.js"></script>
<script language="javascript" type="text/javascript" src="./Images/javascript.js"></script>
<?php $xajax->printJavascript(); ?>

<script language="javascript">

function addOption(selectId,txt, val){ var objOption = new Option(txt,val); document.getElementById(selectId).options.add(objOption); }

function btover(obj,cname){ obj.className=cname; }

function createRow(){
tobj=document.getElementById('contactdeatils'); crobj=tobj.rows;
var row=crobj.length-1; robj=tobj.insertRow(row);  sno=row-1;
c1=robj.insertCell(0); c2=robj.insertCell(1); c3=robj.insertCell(2);
c4=robj.insertCell(3); c5=robj.insertCell(4); c6=robj.insertCell(5); c7=robj.insertCell(6);
arindex=crobj.length-2;
c1.innerHTML="<input type=\"text\" name=\"contactperson["+arindex+"]\" size=18 id=\"contactperson["+arindex+"]\">";
c2.innerHTML="<input type=\"text\" name=\"designation["+arindex+"]\" size=18 id=\"designation["+arindex+"]\">";
c3.innerHTML="<input type=\"text\" name=\"email["+arindex+"]\" size=18 id=\"email["+arindex+"]\">";
c4.innerHTML="<input type=\"text\" name=\"mobile["+arindex+"]\"size=18 id=\"mobile["+arindex+"]\">";
c5.innerHTML="<input type=\"text\" name=\"phone["+arindex+"]\" size=18 id=\"phone["+arindex+"]\">";
c6.innerHTML="<input type=\"text\" name=\"fax["+arindex+"]\" size=18 id=\"fax["+arindex+"]\">";
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
if(dtobj.length == 3){
cobj=document.getElementById('contactdeatils').rows[prerow].cells;
cobj[6].innerHTML='<a href=\"javascript:createRow();\">Add</a>';
}
}

function createExpRow(){
tobj=document.getElementById('addexp'); crobj=tobj.rows;
arindex=crobj.length-3;
var row=crobj.length; robj=tobj.insertRow(row);  sno=row-1;
c1=robj.insertCell(0); c2=robj.insertCell(1); c3=robj.insertCell(2);
c1.innerHTML="<input type=\"text\" name=\"txtfile["+arindex+"]\" id=\"txtfile["+arindex+"]\">";
c2.innerHTML="<input type=\"file\" name=\"uploadfile["+arindex+"]\" id=\"uploadfile["+arindex+"]\">";
c3.innerHTML="<a href=\"javascript:createExpRow();\">Add</a>&nbsp;&nbsp;<a href=\"javascript:deleteExpRow();\">Delete</a>";
robj=document.getElementById('addexp').rows; prerow=row-1;
cobj=document.getElementById('addexp').rows[prerow].cells; cobj[2].innerHTML='';
}
function deleteExpRow(){ dtobj=document.getElementById('addexp').rows; drow=dtobj.length-1;
if(dtobj.length > 4){ document.getElementById('addexp').deleteRow(drow);
robj=document.getElementById('addexp').rows; prerow=robj.length-1;
cobj=document.getElementById('addexp').rows[prerow].cells;
cobj[2].innerHTML='<a href=\"javascript:createExpRow();\">Add</a>&nbsp;&nbsp;<a href=\"javascript:deleteExpRow();\">Delete</a>';
}
if(dtobj.length==4){
cobj=document.getElementById('addexp').rows[3].cells;
cobj[2].innerHTML='<a href=\"javascript:createExpRow();\">Add</a>';
}
}

function createEduRow()
{
tobj=document.getElementById('Edutable');
crobj=tobj.rows;
arindex=crobj.length-2;
var row=crobj.length; robj=tobj.insertRow(row); sno=row-1;
c1=robj.insertCell(0);c2=robj.insertCell(1);c3=robj.insertCell(2);c4=robj.insertCell(3);
c5=robj.insertCell(4); c6=robj.insertCell(5);  c7=robj.insertCell(6);
c1.innerHTML="<input type=\"text\"  name=\"txt_degree["+arindex+"]\" id=\"txt_degree["+arindex+"]\" >";
c2.innerHTML="<input type=\"text\" name=\"txt_percentage["+arindex+"]\" id=\"txt_percentage1["+arindex+"]\"  size=5 >";
c3.innerHTML="<input  type=\"text\" name=\"txt_Specialization["+arindex+"]\" id=\"txt_Specialization["+arindex+"]\" >";
c4.innerHTML="<input  type=\"text\" name=\"txt_School["+arindex+"]\" id=\"txt_School["+arindex+"]\" >";
c5.innerHTML="<input  type=\"text\" name=\"txt_Board["+arindex+"]\" id=\"txt_Board["+arindex+"]\" >";
c6.innerHTML="<input  name=\"txt_duration["+arindex+"]\" type=\"text\" id=\"txt_duration["+arindex+"]\" maxlength=2 size=5 >Months";
c7.innerHTML="<a href=\"javascript:createEduRow();\">Add</a>&nbsp;&nbsp;<a href=\"javascript:createdelEduRow();\">Delete</a>";
robj=document.getElementById('Edutable').rows; prerow=row-1;
cobj=document.getElementById('Edutable').rows[prerow].cells; cobj[6].innerHTML='';
}
function createdelEduRow(){ dtobj=document.getElementById('Edutable').rows; drow=dtobj.length-1;
if(dtobj.length >4){ document.getElementById('Edutable').deleteRow(drow);
robj=document.getElementById('Edutable').rows; prerow=drow-1;
cobj=document.getElementById('Edutable').rows[prerow].cells;
cobj[6].innerHTML='<a href=\"javascript:createEduRow();\">Add</a>&nbsp;&nbsp;<a href=\"javascript:createdelEduRow();\">Delete</a>';
}
if(dtobj.length==4){
cobj=document.getElementById('Edutable').rows[3].cells;
cobj[6].innerHTML='<a href=\"javascript:createEduRow();\">Add</a>';
}
}

function createtwoexpRow()
{
tobj=document.getElementById('exptable');
crobj=tobj.rows;
arindex=crobj.length-2;
var row=crobj.length; robj=tobj.insertRow(row); sno=row-1;
c1=robj.insertCell(0);c2=robj.insertCell(1);c3=robj.insertCell(2);c4=robj.insertCell(3);
c5=robj.insertCell(4); c6=robj.insertCell(5);  c7=robj.insertCell(6);   c8=robj.insertCell(7);
c1.innerHTML="<input name=\"txt_name["+arindex+"]\" id=\"txt_name["+arindex+"]\" type=\"text\" size=18>";
c2.innerHTML="<input name=\"txt_subject["+arindex+"]\" id=\"txt_subject["+arindex+"]\"  type=\"text\" size=18>";
c3.innerHTML="<input name=\"txt_designation["+arindex+"]\" id=\"txt_designation["+arindex+"]\" type=\"text\" size=18>";
c4.innerHTML="<input name=\"txt_years["+arindex+"]\" id=\"txt_years["+arindex+"]\" type=\"text\" maxlength=2 size=4> years";
c5.innerHTML="<input type=\"text\" name=\"txt_rawards1["+arindex+"]\" id=\"txt_rawards["+arindex+"]\" size=18>";
c6.innerHTML="<input type=\"text\" name=\"txt_reference["+arindex+"]\" id=\"txt_reference["+arindex+"]\"  size=18>";
c7.innerHTML="<input name=\"txt_address["+arindex+"]\" id=\"txt_address["+arindex+"]\" type=\"text\" size=18>";
c8.innerHTML="<a href=\"javascript:createtwoexpRow();\">Add</a>&nbsp;&nbsp;<a href=\"javascript:createtwodelexpRow();\">Delete</a>";
robj=document.getElementById('exptable').rows; prerow=row-1;
cobj=document.getElementById('exptable').rows[prerow].cells; cobj[7].innerHTML='';
}
function createtwodelexpRow(){ dtobj=document.getElementById('exptable').rows; drow=dtobj.length-1;
if(dtobj.length >4){ document.getElementById('exptable').deleteRow(drow);
robj=document.getElementById('exptable').rows; prerow=drow-1;
cobj=document.getElementById('exptable').rows[prerow].cells;
cobj[7].innerHTML='<a href=\"javascript:createtwoexpRow();\">Add</a>&nbsp;&nbsp;<a href=\"javascript:createtwodelexpRow();\">Delete</a>';
}
if(dtobj.length==4){
cobj=document.getElementById('exptable').rows[3].cells;
cobj[7].innerHTML='<a href=\"javascript:createtwoexpRow();\">Add</a>';
}
}

function salaryDisable(flag){
if(flag){
document.getElementById('opt_yes1').disabled=1; document.getElementById('opt_yes2').disabled=1;
document.getElementById('opt_hours1').disabled=1; document.getElementById('opt_hours2').disabled=1;
document.getElementById('salarytxt').disabled=1;
}
else {
document.getElementById('opt_yes1').disabled=0; document.getElementById('opt_yes2').disabled=0;
document.getElementById('opt_hours1').disabled=0; document.getElementById('opt_hours2').disabled=0;
document.getElementById('salarytxt').disabled=0;
}
}

</script>
</head>
<?php
print"<form name=\"Form\" method=\"post\" enctype=\"multipart/form-data\">
<table border=0 cellspacing=1 cellpadding=0>
<tr><th colspan=8>Personal Information</th></tr>
<tr><td>Title</td><td><select name=\"titletext\"><option>Select</option><option>Dr</option>
<option>Mr</option><option>Mrs</option><option>Miss</option></select></td>
<td>First Name</td><td><input name=\"txtfirstname\" type=\"text\"></td>
<td>Last Name</td><td><input type=\"text\" name=\"staffnametext\"></td>
<td rowspan=4 valign=\"top\"><img id=\"myImage\" width=\"80\" height=\"100\"></td></tr>
<tr>
<td>Date of Birth</td><td><input readonly name=\"dateOfBirthtext\" id=\"txtdateOfBirth\" size=13 onchange=\"return xajax_setAge(this.value);\">
<A href=\"javascript:NewCal('txtdateOfBirth','ddmmmyyyy')\"><img src='./Images/cal.gif' width='18' height='20' border='0' valign=\"bottom\"></A></td>
<td>Age</td><td><input type=\"text\" name=\"agetext\" id=\"agetext\" size=1 maxlength=2>&nbsp;years</td>
<td>Blood Group</td><td><input type=\"text\" name=\"bloodgroupdrop\" id=\"bloodgroupdrop\"></td></tr>
<tr>
<td>Gender</td><td><input name=\"opt_gender\" type=\"radio\" value=\"Male\" checked>Male<input name=\"opt_gender\" type=\"radio\" value=\"Female\">Female</td>
<td>Marital Status</td><td><select name=\"maritaldrop\"><option value=\"none\">select</option><option value=\"Single\">Single</option><option value=\"Married\">Married</option><option value=\"Widow\">Widow</option></select></td>
<td>Nationality</td><td><select name=\"nationdrop\" id=\"nationdrop\"><option value=\"none\">Select</option>";
$con=mysql_connect("192.168.15.26","root","admin");
$db=mysql_select_db("heos",$con);
$sql=("select Countrycode,CountryName from countrydetails ORDER BY CountryName");
$rs=mysql_query($sql,$con);
while($a=mysql_fetch_array($rs))
{
$Countrycode=$a["Countrycode"];
$CountryName=$a["CountryName"];
echo"<option value=\"$Countrycode\">$CountryName</option>";
}
mysql_close($con);
print"</select></td></tr>
<tr><td>Present Address</td><td><textarea class=\"textarea\" name=\"presentAddresstext\" maxlength=\"200\"></textarea></td>
<td>Permanent Address</td><td><textarea class=\"textarea\" name=\"permanentaddresstext\"  maxlength=\"200\">-do-</textarea></td>
<td>Photo</td><td colspan=2><form name=\"staffform\"><iframe align=center src=\"imagepreview.php\" frameborder=0 height=\"20px\" width=\"228px\" scrolling=no marginHeight=0 marginWidth=0></iframe></form></td>
</tr>
<tr>
<td>Date of Joining</td><td><input type=\"text\" readonly name=\"dateofjoiningtext\" id=\"dateofjoiningtext\" size=13>
<a href=\"javascript:NewCal('dateofjoiningtext','ddmmmyyyy')\"><img src=\"./Images/cal.gif\" alt=\"Pick a date\" width=\"20\" height=\"20\" border=\"0\" valign=\"bottom\"></a></td>
<td>Designation</td><td ><select name=\"designationdrop\" onchange=\"if(this.selectedIndex!=0) document.getElementById('typeofjobdrop').disabled=0; else{  document.getElementById('typeofjobdrop').selectedIndex=0; document.getElementById('typeofjobdrop').disabled=1; salaryDisable(1); }\"><option value=\"none\">Select</option>";
$con=mysql_connect("192.168.15.26","root","admin");
$db=mysql_select_db("heos",$con);
$sql=("select distinct(designationname) from designation");
$rs=mysql_query($sql,$con);
while($a=mysql_fetch_array($rs))
{
$designationname=$a["designationname"];
echo"<option value=\"$designationname\">$designationname</option>";
}
mysql_close($con);
print"</select></td>
<td>Type of Job</td><td colspan=2><select name=\"typeofjobdrop\" id=\"typeofjobdrop\" disabled onchange=\"if(this.selectedIndex!=0) salaryDisable(0); else salaryDisable(1);\"><option value=\"none\">Select</option><option value=\"FullTime\">FullTime</option><option value=\"PartTime\">PartTime</option></select></td>
</tr>
<tr>
<td>Local Citizen</td><td><input name=\"opt_local\" id=\"opt_yes1\" type=\"radio\" value=\"Yes\" disabled>Yes<input name=\"opt_local\"  id=\"opt_yes2\" type=\"radio\" value=\"No\" disabled>No</td>
<td>Salary</td><td><input type=\"text\" disabled name=\"salarytxt\" value=\"0.00\" id=\"salarytxt\" size=5> <font size=3>£</td>
<td>Salary Mode</td><td colspan=2><input name=\"opt_hours\" disabled id=\"opt_hours1\" type=\"radio\" value=\"Hours\"> &nbsp;Hour&nbsp;<input name=\"opt_hours\" disabled id=\"opt_hours2\" type=\"radio\" value=\"Monthly\">Monthly</td>
</tr>
</table><br>


<table name=\"addexp\" id=\"addexp\" border=0 cellspacing=1 cellpadding=0>
<tr><th colspan=4>Attachments</th></tr><tr>
<td><input type=\"text\" value=\"Passport copy\" id=\"txtfile[0]\" name=\"txtfile[0]\" disabled></td><td colspan=2><input disabled  name=\"uploadfile[0]\"  type=\"file\" id=\"uploadfile[0]\"></td></tr>
<tr><td><input type=\"text\" value=\"Qualifications\" id=\"txtfile[1]\" name=\"txtfile[1]\" disabled></td><td colspan=2><input disabled  name=\"uploadfile[0]\"  type=\"file\" id=\"uploadfile[1]\"></td></tr>
<tr><td><input type=\"text\" value=\"Experience letters\" id=\"txtfile[2]\" name=\"txtfile[2]\" disabled></td><td><input disabled  name=\"uploadfile[0]\"  type=\"file\" id=\"uploadfile[2]\"></td><td></td></tr>
</table><br>


<table name=\"Edutable\" id=\"Edutable\" border=0 cellspacing=1 cellpadding=0>
<tr><td align=\"center\" colspan=8><b>Last Two Education Qualification</td></tr>
<tr><th>Degree</th><th>Percentage</th><th>Specialization</th><th>School/College</th><th>Board/University</th>
<th colspan=2>Duration</th></tr>
<tr><td><input name=\"txt_degree[0]\" id=\"txt_degree[0]\" type=\"text\"></td>
<td><input name=\"txt_percentage[0]\" id=\"txt_percentage[0]\" type=\"text\" size=5>%</td>
<td><input type=\"text\" name=\"txt_Specialization[0]\" id=\"txt_Specialization[0]\"></td>
<td><input type=\"text\" name=\"txt_School[0]\" id=\"txt_School[0]\"></td>
<td><input type=\"text\" name=\"txt_Board[0]\" id=\"txt_Board[0]\"></td>
<td><input name=\"txt_duration1[0]\" type=\"text\" id=\"txt_duration[0]\" size=5 maxlength=2>&nbsp;Months</td><td></td</tr>
<tr>
<td><input name=\"txt_degree[1]\" id=\"txt_degree[1]\" type=\"text\"></td>
<td><input name=\"txt_percentage[1]\" id=\"txt_percentage[1]\" type=\"text\" size=5>%</td>
<td><input type=\"text\" name=\"txt_Specialization[1]\" id=\"txt_Specialization[1]\"></td>
<td><input type=\"text\" name=\"txt_School[1]\" id=\"txt_School[1]\"></td>
<td><input type=\"text\" name=\"txt_Board[1]\" id=\"txt_Board[1]\"></td>
<td><input name=\"txt_duration[1]\" id=\"txt_duration[1]\" type=\"text\" maxlength=2 size=5>&nbsp;Months</td>
<td><a href=\"javascript:createEduRow();\" id=\"eduadd\">Add</a>&nbsp;&nbsp;</td></tr></table><br>



<table name=\"exptable\" id=\"exptable\" border=0 cellspacing=1 cellpadding=0>
<tr><td align=\"center\" colspan=8><b>Last Two Experience Details</td></tr>
<tr><th>Company/Institute</th><th>Subject Handled/Skill</th>
<th>Designation</th><th>Experience</th><th>Rewards</th><th>Reference</th>
<th colspan=2>Address</th></tr>
<tr><td><input name=\"txt_name[0]\" id=\"txt_name[0]\" type=\"text\"size=18></td>
<td><input name=\"txt_subject[0]\" id=\"txt_subject[0]\" type=\"text\" size=18></td>
<td><input name=\"txt_designation[0]\" id=\"txt_designation[0]\" type=\"text\" size=18></td>
<td><input name=\"txt_years[0]\" id=\"txt_years[0]\" type=\"text\" maxlength=2 size=4>&nbsp;years</td>
<td><input type=\"text\" name=\"txt_rawards[0]\" id=\"txt_rawards[0]\" size=18></td>
<td><input type=\"text\" name=\"txt_reference[0]\" id=\"txt_reference[0]\" size=18></td>
<td><input name=\"txt_address[0]\" id=\"txt_address[0]\" type=\"text\" size=18></td><td></td></tr>
<tr>
<td><input name=\"txt_name[1]\" id=\"txt_name[1]\" type=\"text\" size=18></td>
<td><input name=\"txt_subject[1]\" id=\"txt_subject[1]\"  type=\"text\" size=18></td>
<td><input name=\"txt_designation[1]\" id=\"txt_designation[1]\" type=\"text\" size=18></td>
<td><input name=\"txt_years[1]\" id=\"txt_years[1]\" type=\"text\" maxlength=2 size=4>&nbsp;years</td>
<td><input type=\"text\" name=\"txt_rawards[1]\" id=\"txt_rawards[1]\" size=18></td>
<td><input type=\"text\" name=\"txt_reference[1]\" id=\"txt_reference[1]\"  size=18></td>
<td><input name=\"txt_address[1]\" id=\"txt_address[1]\" type=\"text\" size=18></td>
<td><a href=\"javascript:createtwoexpRow();\" id=\"expadd\">Add</a>&nbsp;</td></tr></table><br>


<table id=\"contactdeatils\" border=0 cellspacing=1 cellpadding=0 >
<tr><th>Contact Person</th><th>Designation</th><th>E-mail</th><th>Mobile</th><th>Phone</th><th colspan=2>Fax</th></tr>
<tr>
<td><input type=\"text\" name=\"contactperson[0]\" size=18  id=\"contactperson[0]\" onKeyPress=\"return keyRestrict(event,'abcdefghijklmnopqrstuvwxyz. '+String.fromCharCode(241))\"></td>
<td><input type=\"text\" name=\"designation[0]\"  size=18 id=\"designation[0]\" onKeyPress=\"return keyRestrict(event,'abcdefghijklmnopqrstuvwxyz. '+String.fromCharCode(241))\"></td>
<td><input type=\"text\" name=\"email[0]\" id=\"email[0]\" size=18 onKeyPress=\"return keyRestrict(event,'1234567890abcdefghijklmnopqrstuvwxyz-._@*'+String.fromCharCode(241))\"></td>
<td><input type=\"text\" name=\"mobile[0]\" id=\"mobile[0]\" size=18 onKeyPress=\"return keyRestrict(event,'1234567890+-'+String.fromCharCode(241))\"></td>
<td><input type=\"text\" name=\"phone[0]\" id=\"phone[0]\" size=18 onKeyPress=\"return keyRestrict(event,'1234567890+-'+String.fromCharCode(241))\"></td>
<td><input type=\"text\" name=\"fax[0]\" id=\"fax[0]\" size=18 onKeyPress=\"return keyRestrict(event,'1234567890+-'+String.fromCharCode(241))\"></td>
<td><a href=\"javascript:createRow();\">Add</a></td></tr>
<tr><td colspan=8 align=\"center\"><input class=\"buttonstatic\" name=\"reset\" type=\"reset\" value=\"Reset\" onmouseover=\"btover(this,'buttonover');\" onmouseout=\"btover(this,'buttonstatic');\">
<input class=\"buttonstatic\" type=\"submit\" value=\"Submit\" name=\"submit\" onclick=\"return Validator()\" onmouseover=\"btover(this,'buttonover');\" onmouseout=\"btover(this,'buttonstatic');\"></td></tr>
</table>
</form>";
?>
<?php
if(isset($_POST['submit']))
{
if(!empty($_POST['titletext']))
$title=$_POST['titletext'];
else $title=0;
if(!empty($_POST['staffnametext']))
$lastname=$_POST['staffnametext']; else $lastname=0;
if(!empty($_POST['txtmiddlename']))
$middle=$_POST['txtmiddlename']; else $middle=0;
if(!empty($_POST['txtfirstname']))
$firstname=$_POST['txtfirstname']; else $firstname=0;
if(!empty($_POST['designationdrop']))
$designation=$_POST['designationdrop']; else $designation=0;
if(!empty($_POST['typeofjobdrop']))
$typeofjob=$_POST['typeofjobdrop']; else $typeofjob=0;
if(!empty($_POST['opt_gender']))
$gender=$_POST['opt_gender']; else $gender=0;
if(!empty($_POST['bloodgroupdrop']))
$boodgroup=$_POST['bloodgroupdrop'];else $boodgroup=0;
if(!empty($_POST['agetext']))
$age=$_POST['agetext'];else $age=0;
if(!empty($_POST['maritaldrop']))
$maritalstatus=$_POST['maritaldrop']; else $maritalstatus=0;
if(!empty($_POST['dateOfBirthtext']))
$dateofbirth=$_POST['dateOfBirthtext']; else $dateofbirth=0;
if(!empty($_POST['dateofjoiningtext']))
$dateofjoining=$_POST['dateofjoiningtext']; else $dateofjoining=0;
if(!empty($_POST['presentAddresstext']))
$presentaddress=$_POST['presentAddresstext'];else $presentaddress=0;
if(!empty($_POST['permanentaddresstext']))
$permanentaddress=$_POST['permanentaddresstext'];else $permanentaddress=0;
if(!empty($_POST['nationdrop']))
$nation=$_POST['nationdrop']; else $nation=0;
if(!empty($_POST['statedrop']))
$State=$_POST['statedrop']; else $State=0;
if(!empty($_POST['salarytxt']))
$salary=$_POST['salarytxt']; else $salary=0;
 if(!empty($_POST['opt_hours']))
$salarytype=$_POST['opt_hours']; else $salarytype=0;
if(!empty($_POST['opt_local']))
$LocalCitizen=$_POST['opt_local']; else $LocalCitizen=0;
if(!empty($_POST['opt_legal']))
$workfulltime=$_POST['opt_legal']; else $workfulltime=0;
if(!empty($_POST['opt_legally']))
$workparttime=$_POST['opt_legally']; else $workfulltime=0;
if(!empty($_POST['religiontext']))
$Religion=$_POST['religiontext']; else $Religion=0;
$f1=$_POST['txt_degree'];
$f2=$_POST['txt_Specialization'];
$f3=$_POST['txt_School'];
$f4=$_POST['txt_Board'];
$f5=$_POST['txt_duration'];
$f6=$_POST['txt_percentage'];
$f7=$_POST['txt_name'];
$f8=$_POST['txt_subject'];
$f9=$_POST['txt_designation'];
$f10=$_POST['txt_years'];
$ff11=$_POST['txt_rawards'];
$ff12=$_POST['txt_reference'];
$ff13=$_POST['txt_address'];

//$_SESSION['staffname']=$staffname;

$password1 = createPassword(4);

$f11=$_POST['contactperson'];
 $f12=$_POST['designation'];
 $f13=$_POST['email'];
 $f14=$_POST['mobile'];
 $f15=$_POST['phone'];
 $f16=$_POST['fax'];

$con=mysql_connect("192.168.15.26","root","admin");
$db=mysql_select_db("heos",$con);
$queryinsert=mysql_query("SELECT count(*) FROM staffpersonalinformation");
$attendancecount=mysql_result($queryinsert,0);
$count=$attendancecount+1;
/*$queryinsert=mysql_query("update countdetails set staff='$count'where intake='staff'");
$queryregiinsert=mysql_query($queryinsert,$con);
$sql="select CourseCode from coursedetails where CourseName='$course'";
$rs=mysql_query($sql,$con);
while($re1=mysql_fetch_array($rs)){ $course1=$re1["CourseCode"]; } */
$st='staff';
$des=substr($designation,0,2);
//$desig=strtoupper($des);
$staffid=strtoupper($st.$des.$count);
$queryinsert="insert into staffpersonalinformation values('0','$staffid','$title','$firstname','$middle','$lastname','$designationname','$typeofjob','$gender','$boodgroup','$age','$maritalstatus','$dateofbirth','$dateofjoining','$password1','$presentaddress','$permanentaddress','$nation','$State','$Religion','$salary','$salarytype','$LocalCitizen','workfulltime','workparttime')";
$queryregiinsert=mysql_query($queryinsert,$con);
foreach($f1 as $k=>$value)
{  echo $value;
if(!empty($value))
{
$degree=$f1[$k]; $specification=$f2[$k]; $institutename=$f3[$k]; $universityname=$f4[$k]; $duration=$f5[$k]; $percentage=$f6[$k];
$education=mysql_query("insert into staffeducationinfo values('0','$staffid','$degree','$specification','$institutename','$universityname','$duration','$percentage')");
}
}
foreach($f7 as $k=>$value)
{
if(!empty($value))
{
$compname=$f7[$k]; $subject=$f8[$k]; $compdesignation=$f9[$k]; $years=$f10[$k]; $rewards=$ff11[$k]; $reference=$ff12[$k]; $address=$ff13[$k];
$contact=mysql_query("insert into staffcompanyinfo values('0','$staffid','$compname','$subject','$compdesignation','$years','$rewards','$reference','$address')");
}
}
foreach($f11 as $k=>$value)
{
if(!empty($value))
{
$designation=$f12[$k]; $email=$f13[$k]; $mobile=$f14[$k]; $phone=$f15[$k]; $fax=$f16[$k];
$contact=mysql_query("insert into contactdetails values('0','$recordid','staffdetails','$value','$designation','$email','$mobile','$phone','$fax')");
}
}
uploadFunction();
uploadFunction1();
$_SESSION['staffid']=$staffid;

$to = "$f13";
$subject = "Username & Password";
$msg = "\t\t\t\tThank you for Registration,\n $staffid.$firstname
\t\tThank you for providing initial/Start up information towards Saxon College
admission. Click on the given link for logging onto Saxon College registration using the
user-id and password given below.
\nUser name:$f13,\n Password=$password1,\n Regards\n omkar nath tiwary";
$headers = "From: omkar.tiwary@yahoo.co.in\nReply-To: omkar.tiwary@yahoo.co.in";
$config = "-stfu@noob.com";
mail("$to", "$subject", "$msg", "$headers", "$config");
echo "<script text/javascript>alert('successive done');</script>";
}
?>
<?php
function createPassword($length)
{
$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
$i = 0; $password1 = "";
while ($i <= $length) { $password1 .= $chars{mt_rand(0,strlen($chars))}; $i++; }
return $password1;
}
function uploadFunction()
{
$staffname=$_SESSION['staffname'];
$ar=split('/',$_FILES['file']['type']);
if($ar[1]=='pjpeg') $ext='jpeg'; if($ar[1]=='gif') $ext='gif'; if($ar[1]=='x-png') $ext='png';
if ( $_FILES['file']['name'] != "")
{
if(!(is_dir("StaffUpload"))) mkdir("StaffUpload");
copy($_FILES['file']['tmp_name'],"StaffUpload/".$staffname.'.'.$ext);
 }

}
function uploadFunction1()
{
$_SESSION['staffid']=$staffid;
$con=mysql_connect('192.168.15.26','root','admin'); $db=mysql_select_db('heos');
$create="CREATE TABLE `stafffileattached` (
`RecordId` bigint(50) NOT NULL auto_increment,
`staffid` varchar(50) default NULL,
`filename` varchar(50) default NULL,
`filelocation` varchar(50) default NULL,
PRIMARY KEY (`RecordId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1";
mysql_query($create,$con);
$up=$_POST['txtfile'];
foreach($up as $k=>$v)
{
//foreach($up as $k=>$value)
if(!empty($_POST['uploadfile']))
$tmp=$_FILES['uploadfile']['tmp_name']; else $tmp=0;
foreach($_FILES['uploadfile']['name'] as $kk=>$vv)
{
$v=$up[$kk];
if($vv != "")
{
if(!(is_dir("mupload"))) {  mkdir("mupload"); }
copy($tmp[$kk],"mupload/".$vv); }
$queryinsert="insert into stafffileattached values('0','$staffid','$v','$vv')";
$queryregiinsert=mysql_query($queryinsert,$con);
}
}
}
?>
</body>
</html>

