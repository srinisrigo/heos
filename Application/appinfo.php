<html>

<head>
<link href="../Images/heoscss.css" rel="stylesheet" type="text/css">
</head>
<script language="javascript">
function clos()
{
window.close();
}
</script>
<body>
<?php
print"<form method=\"GET\" name=\"kkk\" action=\"appinfo.php\">";

@$applicantid=$_GET['applicantid'];

if(isset($applicantid)){
$c=mysql_connect("192.168.15.24","root","admin");
$d=mysql_select_db("heos",$c);
$query=mysql_query("select * from applicantdetails where applicantid='$applicantid'");
while($arry=mysql_fetch_array($query))
{
$firstname=$arry['firstname'];
$lastname=$arry['lastname'];
$intake=$arry['intake'];
$course=$arry['course'];
$mobilenumber=$arry['mobilenumber'];
$passportnumber=$arry['passportnumber'];$dateofbirth=$arry['dateofbirth'];$dateofbirth=date('d-M-Y',strtotime($dateofbirth));
}
print"<table align=center border=0><th colspan=2>Applicant Details</th><tr><td>First name:</td><td><input type=\"hidden\" name=\"appname\" id=\"appname\" value=\"$firstname\">$firstname</td></tr>
<tr><td>Last Name:</td><td><input type=\"hidden\" name=\"lastname\" id=\"lastname\" value=\"$lastname\">$lastname</td></tr>
<tr><td>Passport number:</td><td><input type=\"hidden\" name=\"ppno\" id=\"ppno\" value=\"$passportnumber\">$passportnumber</td></tr>
<tr><td>Mobile Number:</td><td><input type=\"hidden\" name=\"mobile\" id=\"mobile\" value=\"$mobilenumber\">$mobilenumber</td></tr>
<tr><td>Intake:</td><td><input type=\"hidden\" name=\"intake\" id=\"intake\" value=\"$intake\">$intake</td></tr>
<tr><td>Course:</td><td><input type=\"hidden\" name=\"course\" id=\"course\" value=\"$course\">$course</td></tr>
<tr><td>Date Of Birth:</td><td><input type=\"hidden\" name=\"dateofbirth\" id=\"dateofbirth\" value=\"$dateofbirth\">$dateofbirth</td></tr>
<br><tr><td colspan=2 align=center><a href=\"javascript:window.close();\">Close Window</a></td></tr></table></form>";
}
?>

</body>

</html>
