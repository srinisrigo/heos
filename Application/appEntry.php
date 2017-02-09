<?php session_start(); ?>
<?php include "xajaxtransaction.php"; include "./Images/dbconnection.php"; ?>
<html>
<head>
<title>Online Student Information</title>
<?php $xajax->printJavascript(); ?>
<script type="text/javascript" src="./Images/datetimepicker.js"></script>
<script type="text/javascript" src="./Images/transactionscript.js"></script>
<link rel="stylesheet" href="./Images/heoscss.css">
<script language="javascript">
function addOption(selectId, txt, val){ var objOption = new Option(txt,val); document.getElementById(selectId).options.add(objOption); }
function agree(check){
if(check.checked){ document.getElementById('submitbutton').disabled=false;
document.getElementById('submitbutton').className="buttonstatic"; }
else { document.getElementById('submitbutton').disabled=true;
document.getElementById('submitbutton').className="buttondisable"; } }

function entryLoad(){ document.getElementById('submitbutton').disabled=true;
document.getElementById('submitbutton').className="buttondisable"; }
function resetMe(){ window.location="homePage.php"; }
function btover(obj,cname){ obj.className=cname; }
</script>

</head>
<body onLoad="entryLoad();">

<?php
//   class=\"table\"
print "<form method=\"post\" action=\"appEntry.php\" enctype=\"multipart/form-data\">
<table style=\"border-width:0px;padding-left:15px;!important\">
<tr><td>Title</td><td><select class=\"select\" name=\"titletext\" id=\"titletext\"><option value=\"Mr.\">Mr</option><option value=\"Mrs.\">Mrs</option><option value=\"Miss.\">Miss</option></select></td></tr>
<tr><td>First Name</td><td><input type=\"text\" id=\"firstnametext\" name=\"firstnametext\" onKeyPress=\"return keyRestrict(event,'abcdefghijklmnopqrstuvwxyz')\"></td></tr>
<tr><td>Middle Name</td><td><input type=\"text\" id=\"middlenametext\" name=\"middlenametext\" onKeyPress=\"return keyRestrict(event,'abcdefghijklmnopqrstuvwxyz')\"></td></tr>
<tr><td>Last Name</td><td><input type=\"text\" id=\"lastnametext\" name=\"lastnametext\" onKeyPress=\"return keyRestrict(event,'abcdefghijklmnopqrstuvwxyz')\"></td></tr>
<tr><td>Intake</td><td><select class=\"select\" name=\"intakecom\" id=\"intakecom\"><option value=\"none\">select</option>";
$year=Date('Y'); $month=Date('n'); $feb='Feb'.$year; $may='May'.$year; $aug='Aug'.$year; $nov='Nov'.$year; $nextyear=$year+1;
if($month==12 || $month<=2) $cintake=$feb;
if($month>2 && $month<=5) $cintake=$may;
if($month>5 && $month<=8) $cintake=$aug;
if($month>8 && $month<=11) $cintake=$nov;
$rs=mysql_query("select * from cohortdetails order by Intake",$con);
while($a=mysql_fetch_array($rs)){ $intake=$a['Intake'];
if($cintake==$intake) echo "<option value=\"$intake\" selected>$intake</option>"; else echo "<option value=\"$intake\">$intake</option>"; }

print "</select></td></tr>
<tr><td>Level of Education</td><td><select class=\"select\" name=\"levelofeducationcom\" id=\"levelofeducationcom\" size=\"1\" onChange=\"return xajax_setExCourses(document.getElementById('experiencecheck').checked,this.value);\"><option value=\"none\">select</option>";
$rs=mysql_query("select distinct(LevelOfTheCourse) from coursedetails order by LevelOfTheCourse",$con);
while($a=mysql_fetch_array($rs)){ $level=$a['LevelOfTheCourse'];
echo "<option value=\"$level\">$level</option>"; }
print "</select></td></tr>
<tr><td>Experience</td><td><select class=\"select\" name=\"experiencecheck\" id=\"experiencecheck\" onChange=\"return xajax_setExCourses(this.value,document.getElementById('levelofeducationcom').value);\"><option value=\"false\" selected>no</option><option value=\"true\">yes</option></select>&nbsp;<font color=#ff0000>*</font></td></tr>
<tr><td>Programme</td><td><select name=\"courseappliedcom\" id=\"courseappliedcom\"><option value=\"none\">select</option></select></td></tr>
<tr><td>e-mail ID</td><td><input type=\"text\" name=\"mailidtext\" id=\"mailidtext\"onKeyPress=\"return keyRestrict(event,'abcdefghijklmnopqrstuvwxyz0123456789.@_-')\"></td></tr>
<tr><td>Confirm e-mail ID</td><td><input type=\"text\" name=\"confirmmailidtext\" id=\"confirmmailidtext\" onKeyPress=\"return keyRestrict(event,'abcdefghijklmnopqrstuvwxyz0123456789.@_-')\"></td></tr>
<tr><td>Country Residenting</td><td><select name=\"countrytext\" id=\"countrytext\">";
$fPointer=fopen("countries.txt","r"); $Country="";
$insert=mysql_query("DROP TABLE IF EXISTS heos.countrydetails;
CREATE TABLE `countrydetails` (`CountryId` bigint(50) NOT NULL auto_increment,`Countrycode` varchar(5) NOT NULL default '',`CountryName` varchar(50) default NULL,  `Nationality` varchar(50) NOT NULL default '',PRIMARY KEY  (`CountryId`)) ENGINE=MyISAM DEFAULT CHARSET=latin1;",$con);
echo "insert =".$insert;
//while(!feof($fPointer)){ $Country=$Country."**".fgets($fPointer); } fclose($fPointer); $Country=explode("**",$Country); foreach($Country as $k=>$value) if($value!="") print "<option>$value</option>"; 
//while(!feof($fPointer)){ $insert=mysql_query("insert into countrydetails values('0','','".fgets($fPointer)."','')"); } fclose($fPointer);
print "</select></td></tr></table>";
if(file_exists("experiance_note.txt")){ $fPointer=fopen("experiance_note.txt","r");
print "<p style=\"color:red;width:600px;\">* Note, "; print_r(fgets($fPointer)); print "</p>"; fclose($fPointer); }
else print "file does not exist";
print "<div style=\"height:220px;width:800px;padding-right:15px;color:#865124;\"><ol>"; 
if(file_exists("Terms_And_Conditions.txt")){ $fPointer=fopen("Terms_And_Conditions.txt","r"); $TRstring="";
while(!feof($fPointer)){ $TRstring.=fgets($fPointer); } fclose($fPointer);
$TRArray=explode('*',$TRstring); foreach($TRArray as $k=>$value) if($value!="") print "<li>$value</li>";
print "</ol></div><p style=\"padding-left:15px;\"><input type=\"checkbox\" name=\"Check\" id=\"check\" onClick=\"return agree(this);\" >&nbsp;I have read and I understood all the terms and conditions.</p>"; }
else print "<blink>Terms and Conditions not yet Set. create a file namely &#147; Terms_And_Conditions.txt &#148;.</blink>";
print "<div style=\"padding-left:200px;\"><input type=\"hidden\" name=\"REMOTE_ADDR\"><input class=\"buttonstatic\" type=\"button\" value=\"Decline\" name=\"Resettext\" onClick=\"resetMe();\" onmouseover=\"btover(this,'buttonover');\" onmouseout=\"btover(this,'buttonstatic');\">
<input class=\"buttonstatic\" type=\"submit\" value=\"Accept\" name=\"submitbutton\" id=\"submitbutton\" onmouseover=\"btover(this,'buttonover');\" onmouseout=\"btover(this,'buttonstatic');\" onClick=\"return entryValidation();\"></div></form>\n";
?>

<?php
if(isset($_POST['submitbutton']))
{
$title=$_POST['titletext'];
$firstname=$_POST['firstnametext'];
$middlename=$_POST['middlenametext'];
$lastname=$_POST['lastnametext'];
$LevelOfTheCourse=$_POST['levelofeducationcom'];
$CourseName=$_POST['courseappliedcom'];
$intake=$_POST['intakecom'];
$exper=($_POST['experiencecheck']=='true')?1:0;
$mailid=$_POST['mailidtext'];
$countryresidence=$_POST['countrytext'];
$experience=$_POST['experiencecheck'];
$domain = gethostbyname($_POST['REMOTE_ADDR']);

$count=mysql_query("select count(*) as exist from applicantdetails where mailid='$mailid'",$con);
while($a=mysql_fetch_array($count)) $exist=$a['exist'];
if($exist==0){
$chars = "1234567890abcdefghijkmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"; $password1 = "";
for($i=0;$i<8;$i++) $password1 .= $chars{mt_rand(0,strlen($chars))};
$ids=mysql_query("select application from countdetails where intake='$intake'",$con);
while($a=mysql_fetch_array($ids)) $registrationid=$a["application"]; $registrationid++;
$applicantid=$intake.$CourseName.$registrationid;
$update=mysql_query("update countdetails set application='$registrationid' where intake='$intake'",$con);

$queryinsert="insert into applicantdetails values('0','$title','$firstname','$middlename','$lastname','$intake','$LevelOfTheCourse','$exper','$CourseName','$mailid','$applicantid','$password1','$countryresidence','$domain','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','0')";
$queryregiinsert=mysql_query($queryinsert,$con);
/*
$to = "$mailid";
$subject = "test from localhost";
$msg = "\t\t\t\tThank you for Registration,\n $title $firstname $middlename $lastname\t\t
Thank you for providing initial/Start up information towards Saxon College
admission. Click on the given link for logging onto Saxon College registration using the
user-id and password given below.\nUser name:$applicantid,\n Password=$password1";
$headers = "From: srinivasanr@jeppiaartech.com\nReply-To: srinivasanr@jeppiaartech.com";
$config = "-stfu@noob.com";
mail($to, $subject, $msg, $headers, $config);
echo "<script text/javascript>window.location='homePage.php';</script>"; */
}else {
$count=mysql_query("select applicantid from applicantdetails where mailid='$mailid'",$con); $appid=mysql_result($count,0);
echo "<script text/javascript>alert('Already Applied...   your ID: $appid');</script>"; }
}
?>
</body>

</html>

