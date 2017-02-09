<?php session_start(); ?>
<?php include "xajaxtransaction.php"; include "./Images/dbconnection.php"; ?>
<html>
<head>
<?php $xajax->printJavascript(); ?>
<title>Student Details</title>
<script type="text/javascript" src="./Images/datetimepicker.js"></script>
<script type="text/javascript" src="./Images/transactionscript.js"></script>
<link rel="stylesheet" href="./Images/heoscss.css">
<script language="javascript">
window.status="Student Details";
function setBack(){ window.location="homePage.php"; }
function addOption(selectId, txt, val){ var objOption = new Option(txt,val); document.getElementById(selectId).options.add(objOption); }
function btover(obj,cname){ obj.className=cname; }
</script>
</head>
<body>
<?php
if($_SESSION['role']==''|$_SESSION['role']!=1) echo "<script type=\"text/javascript\">window.location='homePage.php';</script>";
else {
if($_SESSION['role']==1){
print "<form action=\"student.php\" method=\"POST\">
<table id=\"persional\" width=100% align=center cellspacing=1 cellpadding=0>
<tr class=\"headerrow\"><td colspan=6>Personal Details&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Applicant ID:&nbsp;
<input class=\"input\" type=\"text\" id=\"appid\" onChange=\"return xajax_setStuidpwd(this.value);\"></td></tr>
<tr class=\"label\"> <td>Student ID</td><td><input class=\"input\" type=\"text\" name=\"studentid\" id=\"studentid\" readonly></td>
<td>Student Password</td><td><input class=\"input\" type=\"text\" name=\"studentpwd\" id=\"studentpwd\" readonly></td>
<td>Assign English Course</td><td><select class=\"select\" name=\"englishclass\" id=\"englishclass\">
<option value=\"no\">No</option><option value=\"yes\">Yes</option></select></td></tr>
<tr class=\"label\"><td>Student Name</td><td><input class=\"input\" type=\"text\" name=\"studentname\" id=\"studentname\"></td>
<td>Intake</td><td><select class=\"select\" name=\"studentintake\" id=\"studentintake\"><option value=\"none\">select</option>";
$year=Date('Y'); $month=Date('n'); $feb='Feb'.$year; $may='May'.$year; $aug='Aug'.$year; $nov='Nov'.$year; $nextyear=$year+1;
if($month==12 || $month<=2) $cintake=$feb;
if($month>2 && $month<=5) $cintake=$may;
if($month>5 && $month<=8) $cintake=$aug;
if($month>8 && $month<=11) $cintake=$nov;
$nextIntake=0;
$rs=mysql_query("select Intake from cohortdetails");
while($a=mysql_fetch_array($rs)){ $intake=$a['Intake'];
if($cintake==$intake) { echo "<option value=\"$intake\" selected>$intake</option>"; $nextIntake=1; }
if($nextIntake==1 && $cintake!=$intake) echo "<option value=\"$intake\">$intake</option>"; }
print "</select></td>

<td>Level of Education</td><td><select class=\"select\" name=\"levelofeducation\" id=\"levelofeducation\" onChange=\"return xajax_setstuCourses(this.value);\">
<option value=\"none\">select</option>
<option value=\"Level1\">Level 1</option><option value=\"Level2\">Level 2</option>
<option value=\"Level3\">Level 3</option><option value=\"Level4\">Level 4</option>
<option value=\"Level5\">Level 5</option></select></td></tr>

<tr class=\"label\"><td>E-mail</td><td><input class=\"input\" type=\"text\" value=\"\" name=\"emailid\" id=\"emailid\"></td>

<td>Course name</td><td><table><tr class=\"label\"><td><select class=\"citizen\" name=\"coursename\" id=\"coursename\" onChange=\"return xajax_setCourseamount(this.value,document.getElementById('studentintake').value,document.getElementById('appid').value);\">
<option value=\"none\" selected>select</option></select></td><td>section</td><td><select class=\"select\" name=\"section\" id=\"section\"><option value=\"none\" selected>--</option></select></td></tr></table></td>

<td>Country Residence</td>
<td><select class=\"citizen\" name=\"countryresidence\" id=\"countryresidence\"><option value=\"none\">select</option>

<option value=\"AF\">Afghanistan</option><option value=\"AL\">Albania</option>
<option value=\"AG\">Algeria</option><option value=\"AS\">American Samoa</option>
<option value=\"AN\">Andorra</option><option value=\"AO\">Angola</option>
<option value=\"AI\">Anguilla</option><option value=\"AT\">Antarctica</option>
<option value=\"AB\">Antigua and Barbuda</option><option value=\"AR\">Argentina</option>
<option value=\"AM\">Armenia</option><option value=\"AU\">Aruba</option>
<option value=\"AA\">Australia</option><option value=\"AUU\">Austria</option>
<option value=\"AZ\">Azerbaijan</option><option value=\"BA\">Bahamas</option>
<option value=\"BH\">Bahrain</option><option value=\"BG\">Bangladesh</option>
<option value=\"BR\">Barbados</option><option value=\"BE\">Belarus</option>
<option value=\"BL\">Belgium</option><option value=\"BZ\">Belize</option>
<option value=\"BN\">Benin</option><option value=\"BM\">Bermuda</option>
<option value=\"BT\">Bhutan</option><option value=\"BV\">Bolivia</option>
<option value=\"BS\">Bosnia and Herzegovina</option><option value=\"BO\">Botswana</option>
<option value=\"BI\">Bouvet Island</option><option value=\"BRZ\">Brazil</option>
<option value=\"BVI\">British Virgin Islands</option><option value=\"BRN\">Brunei</option>
<option value=\"BU\">Bulgaria</option><option value=\"BF\">Burkina Faso</option>
<option value=\"BD\">Burundi</option><option value=\"CM\">Cambodia</option>
<option value=\"CR\">Cameroon</option><option value=\"CA\">Canada</option>
<option value=\"CV\">Cape Verde</option><option value=\"CI\">Cayman Islands</option>
<option value=\"CAR\">Central African Republic</option><option value=\"CH\">Chad</option>
<option value=\"CL\">Chile</option><option value=\"CN\">China</option>
<option value=\"CS\">Christmas Island</option><option value=\"CO\">Cocos Islands</option>
<option value=\"CB\">Colombia</option><option value=\"CMS\">Comoros</option>
<option value=\"CG\">Congo</option><option value=\"CK\">Cook Islands</option>
<option value=\"CRI\">Costa Rica</option><option value=\"CY\">Croatia</option>
<option value=\"CC\">Cuba</option><option value=\"CP\">Cyprus</option>
<option value=\"cz\">Czech Republic</option><option value=\"DN\">Denmark</option>
<option value=\"DJ\">Djibouti</option><option value=\"DM\">Dominica</option>
<option value=\"DR\">Dominican Republic</option><option value=\"ET\">East Timor</option>
<option value=\"EC\">Ecuador</option><option value=\"EG\">Egypt</option>
<option value=\"ES\">El Salvador</option><option value=\"EI\">Equatorial Guinea</option>
<option value=\"ER\">Eritrea</option><option value=\"EN\">Estonia</option>
<option value=\"EH\">Ethiopia</option><option value=\"FI\">Falkland Islands</option>
<option value=\"FA\">Faroe Islands</option><option value=\"FJ\">Fiji</option>
<option value=\"FL\">Finland</option><option value=\"FR\">France</option>
<option value=\"FG\">French Guiana</option><option value=\"FP\">French Polynesia</option>
<option value=\"FST\">FrenchSouthernTerritories</option><option value=\"GA\">Gabon</option>
<option value=\"GM\">Gambia</option><option value=\"GG\">Georgia</option>
<option value=\"GR\">Germany</option><option value=\"GH\">Ghana</option>
<option value=\"GI\">Gibraltar</option><option value=\"GE\">Greece</option>
<option value=\"GL\">Greenland</option><option value=\"GD\">Grenada</option>
<option value=\"GU\">Guadeloupe</option><option value=\"GUM\">Guam</option>
<option value=\"GT\">Guatemala</option><option value=\"GN\">Guinea</option>
<option value=\"GBI\">Guinea-Bissau</option><option value=\"GY\">Guyana</option>
<option value=\"HA\">Haiti</option><option value=\"HO\">Honduras</option>
<option value=\"HK\">Hong Kong</option><option value=\"HG\">Hungary</option>
<option value=\"IC\">Iceland</option><option value=\"IND\">India</option>
<option value=\"ID\">Indonesia</option><option value=\"IR\">Iran</option>
<option value=\"IQ\">Iraq</option><option value=\"IER\">Ireland</option>
<option value=\"ISR\">Israel</option><option value=\"ITY\">Italy</option>
<option value=\"IVC\">Ivory Coast</option><option value=\"JAM\">Jamaica</option>
<option value=\"JAP\">Japan</option><option value=\"JOD\">Jordan</option>
<option value=\"KAZ\">Kazakhstan</option><option value=\"KEY\">Kenya</option>
<option value=\"KBT\">Kiribati</option><option value=\"KUW\">Kuwait</option>
<option value=\"KYG\">Kyrgyzstan</option><option value=\"LOA\">Laos</option>
<option value=\"LAT\">Latvia</option><option value=\"LBN\">Lebanon</option>
<option value=\"LES\">Lesotho</option><option value=\"LIB\">Liberia</option>
<option value=\"LBY\">Libya</option><option value=\"LI\">Liechtenstein</option>
<option value=\"LUN\">Lithuania</option><option value=\"LXM\">Luxembourg</option>
<option value=\"MCU\">Macau</option><option value=\"MED\">Macedonia</option>
<option value=\"MS\">Madagascar</option><option value=\"MW\">Malawi</option>
<option value=\"MLS\">Malaysia</option><option value=\"MD\">Maldives</option>
<option value=\"ML\">Mali</option><option value=\"MT\">Malta</option>
<option value=\"MSI\">Marshall Islands</option><option value=\"MAT\">Martinique</option>
<option value=\"MAU\">Mauritania</option><option value=\"MIT\">Mauritius</option>
<option value=\"MY\">Mayotte</option><option value=\"MX\">Mexico</option>
<option value=\"MIC\">Micronesia</option><option value=\"MO\">Moldova</option>
<option value=\"MOC\">Monaco</option><option value=\"MG\">Mongolia</option>
<option value=\"MTR\">Montserrat</option><option value=\"MOR\">Morocco</option>
<option value=\"MZ\">Mozambique</option><option value=\"MYN\">Myanmar</option>
<option value=\"NA\">Namibia</option><option value=\"NR\">Nauru</option>
<option value=\"NP\">Nepal</option><option value=\"NET\">Netherlands</option>
<option value=\"NEL\">Netherlands Antilles</option><option value=\"NC\">New Caledonia</option>
<option value=\"NZ\">New Zealand</option><option value=\"NCG\">Nicaragua</option>
<option value=\"NG\">Niger</option><option value=\"NGR\">Nigeria</option>
<option value=\"NU\">Niue</option><option value=\"NFI\">Norfolk Island</option>
<option value=\"NK\">North Korea</option><option value=\"NMI\">Northern Mariana Islands</option>
<option value=\"NO\">Norway</option><option value=\"OM\">Oman</option>
<option value=\"PAK\">Pakistan</option><option value=\"PAL\">Palau</option>
<option value=\"PAN\">Panama</option><option value=\"PNG\">Papua New Guinea</option>
<option value=\"PG\">Paraguay</option><option value=\"PR\">Peru</option>
<option value=\"PHI\">Philippines</option><option value=\"PID\">Pitcairn Island</option>
<option value=\"PO\">Poland</option><option value=\"PA\">Portugal</option>
<option value=\"PRC\">Puerto Rico</option><option value=\"QAT\">Qatar</option>
<option value=\"RE\">Reunion</option><option value=\"ROM\">Romania</option>
<option value=\"RSA\">Russia</option><option value=\"RW\">Rwanda</option>
<option value=\"SKN\">Saint Kitts &amp; Nevis</option><option value=\"SL\">Saint Lucia</option>
<option value=\"SM\">Samoa</option><option value=\"SAM\">San Marino</option>
<option value=\"STP\">Sao Tome and Principe</option><option value=\"SUA\">Saudi Arabia</option>
<option value=\"SE\">Senegal</option><option value=\"SEM\">Serbia and Montenegro</option>
<option value=\"SY\">Seychelles</option><option value=\"SIL\">Sierra Leone</option>
<option value=\"SIN\">Singapore</option><option value=\"SVK\">Slovakia</option>
<option value=\"SLN\">Slovenia</option><option value=\"SIM\">Solomon Islands</option>
<option value=\"SI\">Somalia</option><option value=\"SA\">South Africa</option>
<option value=\"SOK\">South Korea</option><option value=\"SP\">Spain</option>
<option value=\"SIK\">Sri Lanka</option><option value=\"STH\">St. Helena</option>
<option value=\"SPM\">St. Pierre and Miquelon</option><option value=\"SU\">Sudan</option>
<option value=\"SME\">Suriname</option><option value=\"SZ\">Swaziland</option>
<option value=\"SW\">Sweden</option><option value=\"SIT\">Switzerland</option>
<option value=\"SYR\">Syria</option><option value=\"TI\">Taiwan</option>
<option value=\"TAJ\">Tajikistan</option><option value=\"TAZ\">Tanzania</option>
<option value=\"TAI\">Thailand</option><option value=\"TO\">Togo</option>
<option value=\"TK\">Tokelau</option><option value=\"TG\">Tonga</option>
<option value=\"TAT\">Trinidad and Tobago</option><option value=\"TIS\">Tunisia</option>
<option value=\"TUK\">Turkey</option><option value=\"TMT\">Turkmenistan</option>
<option value=\"TCI\">Turks and Caicos Islands</option><option value=\"TV\">Tuvalu</option>
<option value=\"UMO\">U.S. MinorOutlyingIslands</option><option value=\"UG\">Uganda</option>
<option value=\"UKI\">Ukraine</option><option value=\"UAE\">United Arab Emirates</option>
<option value=\"Uk\">United Kingdom</option><option value=\"UY\">Uruguay</option>
<option value=\"UZ\">Uzbekistan</option><option value=\"VAT\">Vanuatu</option>
<option value=\"VAC\">Vatican City</option><option value=\"VEN\">Venezuela</option>
<option value=\"VN\">Vietnam</option><option value=\"VIS\">Virgin Islands</option>
<option value=\"WFI\">Wallis and Futuna Islands</option><option value=\"WS\">Western Sahara</option>
<option value=\"YM\">Yemen</option><option value=\"ZR\">Zaire</option>
<option value=\"ZM\">Zambia</option><option value=\"ZIM\">Zimbabwe</option>

</select></td></tr>
<tr class=\"label\"><td>Address 1</td>
<td colspan=2><input class=\"inputaddress\" type=\"text\" name=\"addressline1\" id=\"addressline1\"></td>
<td>Address 2</td>
<td colspan=2><input class=\"inputaddress\" type=\"text\" name=\"addressline2\" id=\"addressline2\"></td></tr>

<tr class=\"label\"><td>Zip/Pin/Post Code</td><td><input class=\"input\" type=\"text\" value=\"\" name=\"postcode\" id=\"postcode\" size=5 maxlength=6></td>

<td>Date of birth</td><td>
<input class=\"date\" type=\"text\" readonly name=\"dateofbirth\" id=\"dateofbirth\" size=9 maxlength=10>
<a href=\"javascript:NewCal('dateofbirth','yyyymmdd')\">
<img src=\"./Images/cal.gif\" alt=\"Pick a date\" width=\"20\" height=\"20\" border=\"0\"></a></td>

<td>Passport Number</td><td><input class=\"input\" type=\"text\" value=\"\" name=\"passportnumber\" id=\"passportnumber\"></td>
<tr class=\"label\"><td>Phone Number</td><td><input class=\"input\" type=\"text\" value=\"\" name=\"phonenumber\" id=\"phonenumber\"></td>
<td>Mobile Number</td><td><input class=\"input\" type=\"text\" value=\"\" name=\"mobilenumber\" id=\"mobilenumber\"></td>
<td>Fax Number</td><td><input class=\"input\" type=\"text\" value=\"\" name=\"faxnumber\" id=\"faxnumber\"></td></tr>
<tr class=\"label\"><td>Course Amount</td><td><input class=\"input\" type=\"text\" name=\"courseamount\" id=\"courseamount\" readonly></td>
<td>Fee Paid</td><td><input class=\"input\" type=\"text\" name=\"feepaid\" id=\"feepaid\"></td><td>Agent ID</td><td><select class=\"citizen\" name=\"agentid\" id=\"agentid\"><option value=\"none\">select</option>";
$rs=mysql_query("select * from agentmaster order by AgentName");
while($a=mysql_fetch_array($rs)){ $AgentCode=$a['AgentCode']; $AgentName=$a['AgentName'];
echo "<option value=\"$AgentCode\">$AgentName - $AgentCode</option>";  }
print "</select></td></tr>
</table>

<table width=100% align=center cellspacing=1 cellpadding=0>
<tr class=\"headerrow\"><td colspan=4>Academic Backround</td></tr>
<tr class=\"label\"><td>Course Name</td><td>Institute Name</td><td>Duration</td><td>Grade</td></tr>
<tr class=\"label\"><td><input class=\"input\" type=\"text\" name=\"course1\" id=\"course1\"></td>
<td><input class=\"input\" type=\"text\" name=\"institute1\" id=\"institute1\"></td>
<td><input class=\"size2\" type=\"text\" name=\"duration1\" id=\"duration1\" size=2 maxlength=2> months</td>
<td><input class=\"size2\" type=\"text\" name=\"garde1\" id=\"garde1\" size=1 maxlength=1></td></tr>
<tr class=\"label\"><td><input class=\"input\" type=\"text\" name=\"course2\" id=\"course2\"></td>
<td><input class=\"input\" type=\"text\" name=\"institute2\" id=\"institute2\"></td>
<td><input class=\"size2\" type=\"text\" name=\"duration2\" id=\"duration2\" size=2 maxlength=2> months</td>
<td><input class=\"size2\" type=\"text\" name=\"garde2\" id=\"garde2\" size=1 maxlength=1></td></tr></table>
<table width=100% cellspacing=1 cellpadding=0>
<tr class=\"headerrow\"><td colspan=4>Employment Information</td></tr>
<tr class=\"label\"><td>Employer</td><td>Designation</td><td>Start Date</td><td>End Date</td></tr>
<tr class=\"label\"><td><input class=\"input\" type=\"text\" name=\"employer1\" id=\"employer1\"></td>
<td><input class=\"input\" type=\"text\" name=\"designation1\" id=\"designation1\"></td>
<td><input class=\"date\" type=\"text\" name=\"startdate1\" id=\"startdate1\" readonly size=9 maxlength=10>
<a href=\"javascript:NewCal('startdate1','yyyymmdd')\">
<img src=\"./Images/cal.gif\" alt=\"Pick a date\" width=\"20\" height=\"20\" border=\"0\"></a></td>
<td><input class=\"date\" type=\"text\" name=\"enddate1\" id=\"enddate1\" readonly size=9 maxlength=10>
<a href=\"javascript:NewCal('enddate1','yyyymmdd')\">
<img src=\"./Images/cal.gif\" alt=\"Pick a date\" width=\"20\" height=\"20\" border=\"0\"></a></td></tr>
<tr class=\"label\"><td><input class=\"input\" type=\"text\" name=\"employer2\" id=\"employer2\"></td>
<td><input class=\"input\" type=\"text\" name=\"designation2\" id=\"designation2\"></td>
<td><input class=\"date\" type=\"text\" name=\"startdate2\" id=\"startdate2\" readonly size=9 maxlength=10>
<a href=\"javascript:NewCal('startdate2','yyyymmdd')\">
<img src=\"./Images/cal.gif\" alt=\"Pick a date\" width=\"20\" height=\"20\" border=\"0\"></a></td>
<td><input class=\"date\" type=\"text\" name=\"enddate2\" id=\"enddate2\" readonly size=9 maxlength=10>
<a href=\"javascript:NewCal('enddate2','yyyymmdd')\">
<img src=\"./Images/cal.gif\" alt=\"Pick a date\" width=\"20\" height=\"20\" border=\"0\"></a></td></tr></table>

<table width=100% align=center cellspacing=1 cellpadding=0>
<tr class=\"headerrow\" colspan=4><td colspan=6>Reference Information</td></tr>
<tr class=\"label\"><td>Name</td><td>Occupation</td><td>Institution</td>
<td>Relationship</td><td>Phone number</td><td>E-mail ID</td></tr>
<tr class=\"label\"><td><input class=\"input\" type=\"text\" name=\"refname1\" id=\"refname1\"></td>
<td><input class=\"input\" type=\"text\" name=\"refoccupation1\" id=\"refoccupation1\"></td>
<td><input class=\"input\" type=\"text\" name=\"refinstitution1\" id=\"refinstitution1\"></td>
<td><input class=\"input\" type=\"text\" name=\"refrealtionship1\" id=\"refrealtionship1\"></td>
<td><input class=\"input\" type=\"text\" name=\"refphonenumber1\" id=\"refphonenumber1\"></td>
<td><input class=\"input\" type=\"text\" name=\"refemailid1\" id=\"refemailid1\"></td></tr>
<tr class=\"label\"><td><input class=\"input\" type=\"text\" name=\"refname2\" id=\"refname2\"></td>
<td><input class=\"input\" type=\"text\" name=\"refoccupation2\" id=\"refoccupation2\"></td>
<td><input class=\"input\" type=\"text\" name=\"refinstitution2\" id=\"refinstitution2\"></td>
<td><input class=\"input\" type=\"text\" name=\"refrealtionship2\" id=\"refrealtionship2\"></td>
<td><input class=\"input\" type=\"text\" name=\"refphonenumber2\" id=\"refphonenumber2\"></td>
<td><input class=\"input\" type=\"text\" name=\"refemailid2\" id=\"refemailid2\"></td></tr>
<tr class=\"label\"><td align=center colspan=6>
<input class=\"buttonstatic\" type=\"button\" value=\"Cancel\" onClick=\"setBack();\" onmouseover=\"btover(this,'buttonover');\" onmouseout=\"btover(this,'buttonstatic');\">&nbsp;&nbsp;&nbsp;
<input class=\"buttonstatic\" type=\"submit\" value=\"Submit\" name=\"submitButton\" id=\"submitButton\" onmouseover=\"btover(this,'buttonover');\" onmouseout=\"btover(this,'buttonstatic');\"></td></tr>
</table></form>";
}
}

?>

</body>

</html>

<?php
if(isset($_POST['submitButton'])){

$studentid=trim($_POST['studentid']);
$studentpwd=trim($_POST['studentpwd']);
$englishclass=trim($_POST['englishclass']);
$studentname=trim($_POST['studentname']);
$studentintake=trim($_POST['studentintake']);
$levelofeducation=trim($_POST['levelofeducation']);
$emailid=trim($_POST['emailid']);
$coursename=trim($_POST['coursename']);
$section=trim($_POST['section']);
$countryresidence=trim($_POST['countryresidence']);
$addressline1=trim($_POST['addressline1']);
$addressline2=trim($_POST['addressline2']);
$postcode=trim($_POST['postcode']);
$dateofbirth=trim($_POST['dateofbirth']);
$passportnumber=trim($_POST['passportnumber']);
$phonenumber=trim($_POST['phonenumber']);
$mobilenumber=trim($_POST['mobilenumber']);
$faxnumber=trim($_POST['faxnumber']);
$course1=trim($_POST['course1']);
$institute1=trim($_POST['institute1']);
$duration1=trim($_POST['duration1']);
$garde1=trim($_POST['garde1']);
$course2=trim($_POST['course2']);
$institute2=trim($_POST['institute2']);
$duration2=trim($_POST['duration2']);
$garde2=trim($_POST['garde2']);
$employer1=trim($_POST['employer1']);
$designation1=trim($_POST['designation1']);
$startdate1=trim($_POST['startdate1']);
$enddate1=trim($_POST['enddate1']);
$employer2=trim($_POST['employer2']);
$designation2=trim($_POST['designation2']);
$startdate2=trim($_POST['startdate2']);
$enddate2=trim($_POST['enddate2']);
$refname1=trim($_POST['refname1']);
$refoccupation1=trim($_POST['refoccupation1']);
$refinstitution1=trim($_POST['refinstitution1']);
$refrealtionship1=trim($_POST['refrealtionship1']);
$refphonenumber1=trim($_POST['refphonenumber1']);
$refemailid1=trim($_POST['refemailid1']);
$refname2=trim($_POST['refname2']);
$refoccupation2=trim($_POST['refoccupation2']);
$refinstitution2=trim($_POST['refinstitution2']);
$refrealtionship2=trim($_POST['refrealtionship2']);
$refphonenumber2=trim($_POST['refphonenumber2']);
$refemailid2=trim($_POST['refemailid2']);
$courseamount=trim($_POST['courseamount']);
$feepaid=trim($_POST['feepaid']);
$agentid=trim($_POST['agentid']);

if($englishclass == "yes") $enlishClass=1; else $enlishClass=0;
$count=mysql_query("select count(*) from student where mailid='$emailid'",$con);
$exist=mysql_result($count,0);
if($exist==0){
$getcount=mysql_query("select student from countdetails where intake='$studentintake'",$con); $nostu=mysql_result($getcount,"student")+1;
$update=mysql_query("update countdetails set student='$nostu' where intake='$studentintake'",$con);
$queryStudentInsert=mysql_query("insert into student values('0','$studentid','$studentpwd','$studentname','$studentintake','$studentintake','$levelofeducation','$emailid','$coursename','$section','$countryresidence','$addressline1','$addressline2','$postcode','$countryresidence','$phonenumber','$mobilenumber','$faxnumber','$dateofbirth','$passportnumber','$course1','$institute1','$duration1','$garde1','$course2','$institute2','$duration2','$garde2','$employer1','$designation1','$startdate1','$enddate1','$employer2','$designation2','$startdate2','$enddate2','$refname1','$refoccupation1','$refinstitution1','$refrealtionship1','$refphonenumber1','$refemailid1','$refname2','$refoccupation2','$refinstitution2','$refrealtionship2','$refphonenumber2','$refemailid2','$coursename','$courseamount','$feepaid','0','0','1','$enlishClass','1','$agentid')",$con);
if($queryStudentInsert) echo "<script type=\"text/javascript\">if(confirm('select subject don't want to study?')) window.location='subjectList.php'; else window.location='homePage.php';</script>";
$_SESSION['studentid']=$studentid;
}
else
{
$count=mysql_query("select sudentid from student where mailid='$emailid'",$con); $stid=mysql_result($count,0);
echo "<script text/javascript>alert('Already Registered...  StudentID : $stid');</script>"; }
$_SESSION['studentid']=$studentid;
echo "<script type=\"text/javascript\">if(confirm('select subject don't want to study?')) window.location='subjectList.php'; else window.location='homePage.php';</script>";
}
?>
