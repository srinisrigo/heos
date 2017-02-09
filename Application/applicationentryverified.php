<?php
require_once(dirname(__FILE__) . '/xajax.inc.php');
function StuApp($plica,$applica)
{
$objResponse =& new xajaxResponse();
$objResponse->addScript("document.getElementById('coun').selectedIndex==0;");
if($plica!="Select"){
$objResponse =& new xajaxResponse();
$con=mysql_connect("192.168.15.24","root","admin");
$db=mysql_select_db("heos");
$ab=mysql_query("select count(*) from applicantdetails where intake='$plica' AND emailsr='0'  AND applicationentryverified='0' AND remarksforentry=''");
if(mysql_result($ab,0)==0){
$application="<br><table align=center border=0 cellspacing=1 cellpadding=0><tr><td>No Applications Found In Selected Intake</td></tr></table>";
$objResponse->addScript("document.getElementById('DivExample').innerHTML='$application';");}
else{
$abc=mysql_query("select * from applicantdetails where intake='$plica' AND emailsr='0'  AND applicationentryverified='0' AND remarksforentry=''");
$tab="<br><table align=\"center\" name=\"listoftables\" id=\"listoftables\" border=\"0\" cellspacing=1 cellpadding=0><tr><td><input type=\"checkbox\" name=\"check[0]\" id=\"check[0]\"  checked></td><td align=\"center\">Name</td><td align=\"center\">Programme</td><td align=\"center\">E-mail</td><td>Experience</td><td align=\"center\">Date</td><td>Country Name</td><td align=\"center\">Remarks</td><td>Check to Re-apply</td></tr>";
$i=0;
while($ar=mysql_fetch_array($abc))
{
$title=$ar["title"];
$firstname=$ar["firstname"];
$lastname=$ar["lastname"];
$email=$ar["mailid"];
$experience=$ar["experience"];
$applicantid=$ar["applicantid"];
if($experience==1)
{$xperience='yes';} else {$xperience='no';}
$countryresidence=$ar["countryresidence"];
$course=$ar["course"];
$name=$title ."." .$firstname. " ". $lastname;
$prog=mysql_query("select CourseName from coursedetails where CourseCode='$course'");
$program=mysql_result($prog,'CourseName');
$country=mysql_query("select CountryName from countrydetails where Countrycode='$countryresidence'");
$countrry=mysql_result($country,'CountryName');
$date1=$ar["date"];
$date1=date('d-M-Y',strtotime($date1));
$tab=$tab."<tr><td><input type=\"checkbox\" name=\"check[$i]\" id=\"check[$i]\" value=\"$applicantid\"  checked></td><td>$name</td><td>$program</td><td>$email</td><td>$xperience</td><td>$date1</td><td>$countrry</td><td><input type=\"text\" name=\"remarks[$i]\" id=\"remarks[$i]\" disabled size=40></td><td align=center><input type=\"checkbox\" name=\"chk[$applicantid]\" id=\"chk[$applicantid]\" value=\"$i\" onclick=\"resendchk(this);\"></td></tr>";
$i++;
}
$coun=mysql_query("select count(*) from applicantdetails where intake='$plica' AND emailsr='0'  AND applicationentryverified='0' AND remarksforentry=''");
$county=mysql_result($coun,0);
$objResponse->addScript("document.getElementById('coun').value='$county';");
$tab=$tab."</table>";
$objResponse->addScript("document.getElementById('DivExample').innerHTML='$tab';");
}}
else
{
$objResponse =& new xajaxResponse();
$table="<br><table align=center><tr><td>Please Select Intake</td></tr></table>";
$objResponse->addScript("document.getElementById('DivExample').innerHTML='$table';");
$objResponse->addScript("document.getElementById('coun').value='';");}
return $objResponse->getXML();
}
//$xajax =& new xajax();
//$xajax->registerFunction("StuApp");
//$xajax->processRequests();

function course($applica,$plica)
{
if($applica!="Select"){
$objResponse =& new xajaxResponse();
$con=mysql_connect("192.168.15.24","root","admin");
$db=mysql_select_db("heos");
$ab=mysql_query("select count(*) from applicantdetails where intake='$plica' AND course='$applica' AND emailsr='0'  AND applicationentryverified='0' AND remarksforentry=''");
if(mysql_result($ab,0)==0){
$application="<br><table align=center border=0 cellspacing=1 cellpadding=0><tr><td>No Applications Found In Selected Intake</td></tr></table>";
$objResponse->addScript("document.getElementById('DivExample').innerHTML='$application';");}
else{
$abc=mysql_query("select * from applicantdetails where intake='$plica' AND course='$applica' AND emailsr='0'  AND applicationentryverified='0' AND remarksforentry=''");
$tab="<br><table align=\"center\" name=\"listoftables\" id=\"listoftables\" border=\"0\" cellspacing=1 cellpadding=0><tr><td><input type=\"checkbox\" name=\"check[0]\" id=\"check[0]\"  checked></td><td align=\"center\">Name</td><td align=\"center\">Programme</td><td align=\"center\">E-mail</td><td>Experience</td><td align=\"center\">Date</td><td>Country Name</td><td align=\"center\">Remarks</td><td>Check to Re-apply</td></tr>";
$i=0;
while($ar=mysql_fetch_array($abc))
{
$title=$ar["title"];
$firstname=$ar["firstname"];
$lastname=$ar["lastname"];
$email=$ar["mailid"];
$experience=$ar["experience"];
$applicantid=$ar["applicantid"];
if($experience==1)
{$xperience='yes';} else {$xperience='no';}
$countryresidence=$ar["countryresidence"];
$course=$ar["course"];
$name=$title ."." .$firstname. " ". $lastname;
$prog=mysql_query("select CourseName from coursedetails where CourseCode='$course'");
$program=mysql_result($prog,'CourseName');
$country=mysql_query("select CountryName from countrydetails where Countrycode='$countryresidence'");
$countrry=mysql_result($country,'CountryName');
$date1=$ar["date"];
$date1=date('d-M-Y',strtotime($date1));
$tab=$tab."<tr><td><input type=\"checkbox\" name=\"check[$i]\" id=\"check[$i]\" value=\"$applicantid\"  checked></td><td>$name</td><td>$program</td><td>$email</td><td>$xperience</td><td>$date1</td><td>$countrry</td><td><input type=\"text\" name=\"remarks[$i]\" id=\"remarks[$i]\" disabled size=40 ></td><td align=center><input type=\"checkbox\" name=\"chk[$applicantid]\" id=\"chk[$applicantid]\" value=\"$i\" onclick=\"resendchk(this);\"></td></tr>";
$i++;
}
$coune=mysql_query("select count(*) from applicantdetails where intake='$plica' AND course='$applica' AND emailsr='0'  AND applicationentryverified='0' AND remarksforentry=''");
$counte=mysql_result($coune,0);
if($counte==0){
$objResponse->addScript("document.getElementById('coun').value='';"); }
else{$objResponse->addScript("document.getElementById('coun').value='$counte';");}
$tab=$tab."</table>";
$objResponse->addScript("document.getElementById('DivExample').innerHTML='$tab';");
}}
else
{
$objResponse =& new xajaxResponse();
$table="<br><table align=center><tr><td>Please Select Intake</td></tr></table>";
$objResponse->addScript("document.getElementById('DivExample').innerHTML='$table';");
$objResponse->addScript("document.getElementById('coun').value='';");}
return $objResponse->getXML();
}
$xajax =& new xajax();
$xajax->registerFunction("StuApp");
$xajax->registerFunction("course");
$xajax->processRequests();

?>
<html>
<head>
<link href="./Images/heoscss.css" rel="stylesheet" type="text/css">
<script language="javascript">
function resendchk(appid)
{
x=appid.value;
chk="chk["+x+"]";
rmk="remarks["+x+"]";
chkobj=document.getElementById(chk);
remark=document.getElementById(rmk);
if(appid.checked) remark.disabled=false; else remark.disabled=true;
}




</script>
<title></title>
</head>
<body>
 <?php
$xajax->printJavascript();
?>
<?php
error_reporting(0);
print"<form action=\"applicationentryverified.php\" method=\"post\" name=\"applicationentryverified\" id=\"applicationentryverified\">
<table align=\"center\" border=\"0\" cellspacing=\"1\" cellpadding=\"0\">
<tr><th colspan=8>Application Entry Verified</th></tr>
<tr><td>Intake</td>
<td><select name=\"intake\" id=\"intake\" onchange=\"return xajax_StuApp(this.value,document.getElementById('coun').value);\">
<option value=\"Select\">--Select--</option>";
$con=mysql_connect("192.168.15.24","root","admin");
$db=mysql_select_db("heos",$con);
$sel=mysql_query("select Intake from cohortdetails");
while($ar=mysql_fetch_array($sel))
{
$intake=$ar["Intake"];
echo"<option value=\"$intake\">$intake</option>";
}
print"</select></td>
<td>Programme Name</td><td><select name=\"coun\" id=\"coun\" onchange=\"return xajax_course(this.value,document.getElementById('intake').value);\">
<option value=\"Select\">--Select--</option>";
$selec=mysql_query("select * from coursedetails");
while($arr=mysql_fetch_array($selec))
{
$coursecode=$arr["CourseCode"];
$coursename=$arr["CourseName"];
echo"<option value=\"$coursecode\">$coursename</option>";
}
print"</select></td>";
print"</tr></table>
<div id=\"DivExample\" name=\"DivExample\" align=\"center\"></div>";
print"<br><table align=center border=0 cellspacing=0 cellpadding=0><tr><td><input type=\"submit\" name=\"send\" id=\"send\" value=\"Send\" class=\"buttonstatic\" onmouseover=\"changeimage(this,'buttonover');\" onmouseout=\"changeimage(this,'buttonstatic');\"></td></tr></table></form>";



if(isset($_POST['send']))
{
$con=mysql_connect("192.168.15.24","root","admin");
$db=mysql_select_db("heos");
$chk=$_POST['check'];
$remar=$_POST['remarks'];
foreach($chk as $k=>$value){ $appid=$value;
if(empty($remar[$k]))
{
$updat=mysql_query("UPDATE applicantdetails  set applicationentryverified='1' where applicantid='$appid'");

$abd=mysql_query("select * from applicantdetails where applicantid='$appid'");
while($ar=mysql_fetch_array($abd))
{
$title=$ar["title"];
$firstname=$ar["firstname"];
$lastname=$ar["lastname"];
$name=$title ."." .$firstname. " ". $lastname.",";
}
$mail=mysql_query("select mailid from applicantdetails where applicantid='$appid'");
$mailid=mysql_result($mail,0);
$chars = "1234567890abcdefghijkmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"; $password1 = "";
for($i=0;$i<8;$i++)$password1 .= $chars{mt_rand(0,strlen($chars))};

$recipient = $mailid;
$subject = 'Confirmation From Saxon College';
$message = 'Thanks For Trying'." ".$name
."\n\n\t".'Username:'." ".$mailid
."\n\n\t".'Password:'.$password1
."\n\n\t"."\n\n\t".'Please check the link below to fill the application'
."\n\n\t".'http://localhost/HEOS11/loginscreen.php'
."\n\n\t".'Regards'.","
."\n\t".'Saxon College'.".";
$headers = 'From: sonu.tiwary@gmail.com'."\r\n"
.'Reply-To: sonu.tiwary@gmail.com'."\r\n";

if (mail($recipient, $subject, $message, $headers))
{
$mailquery=mysql_query("update applicantdetails set emailsr='1' where applicantid='$appid'");
echo "<script langauge=\"javascript\">alert('Mail Sent Successfully!')</script>";
}
else {echo"<script langauge=\"javascript\">alert('Mail Not Sent!')</script>";}
}

else
{
$updat=mysql_query("UPDATE applicantdetails  set remarksforentry='$remar[$k]',applicationentryverified='0' where applicantid='$appid'");
$mail=mysql_query("select mailid,remarksforentry,title,firstname,lastname from applicantdetails where applicantid='$appid'");
while($ar=mysql_fetch_array($mail)){$mailid=$ar['mailid'];$remarksforentry=$ar['remarksforentry'];$title=$ar["title"];
$firstname=$ar["firstname"];
$lastname=$ar["lastname"];
$name=$title ."." .$firstname. " ". $lastname.",";
}
$recipient = $mailid;
$subject = 'Mail From Saxon College';
$messagee = 'Re-Apply'." ".$name;
$message1 ="\n\t". $remarksforentry
."\n\n\t".'Regards'.","
."\n\t".'Saxon College'.".";
$headers = 'From: sonu.tiwary@gmail.com'."\r\n"
.'Reply-To: sonu.tiwary@gmail.com'."\r\n";

if (mail($recipient, $subject,$message1,$messagee,$headers)){
$mailquery=mysql_query("update applicantdetails set emailsr='1' where applicantid='$appid'");
echo "<script type=\"text/javascript\">alert(\"Mail Sent Succesfully\")</script>";
}
else{
echo "<script type=\"text/javascript\">alert(\"Mail Not Sent!\")</script>";
}
}
}
}

?>

</body>

</html>
