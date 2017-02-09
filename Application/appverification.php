<?php
session_start();
require_once(dirname(__FILE__) . '/xajax.inc.php');

function getApps($app,$corse)
{
$objResponse =& new xajaxResponse();
//$objResponse->addScript("document.getElementById('course').options[0].selected=true;");
$objResponse->addScript("document.getElementById('course').selectedIndex==0;");



if($app!="Select"){
$objResponse =& new xajaxResponse();
$con=mysql_connect('192.168.15.24','root','admin');
$db=mysql_select_db('heos');
$countquery=mysql_query("select count(*) from applicantdetails where intake='$app' AND appfill='1' AND appverified='0' AND appfillemail='0' AND appfillremarks=''");
if(mysql_result($countquery,0)==0){ //$objResponse->addScript("alert('No Allpications found in selected Intake');");
$noapp="<br><table align=center border=0 cellspacing=1 cellpadding=0><tr><th>No Applications found in selected Intake</th></tr></table>";
$objResponse->addScript("document.getElementById('Main').innerHTML='$noapp';");}
else{
$query=mysql_query("select * from applicantdetails where intake='$app' AND appfill='1'  AND appverified='0' AND appfillemail='0' AND appfillremarks=''");
$tabl="<br><table id=\"listtable\" align=center border=0 cellspacing=1 cellpadding=0><tr><th><input type=\"checkbox\" name=\"check[0]\" id=\"check[0]\" onclick=\"sel(this,0);\" checked></th><th>Applicant ID</th><th align=center>Location</th><th>Date of Birth</th><th>Passport Number</th><th>Remarks</th><th>Check to Resend</th></tr>";
$i=1;
while($ar=mysql_fetch_array($query))
{
$address=$ar["address"];
$dateofbirth=$ar["dateofbirth"];$dateofbirth=date('d-M-Y',strtotime($dateofbirth));
$passportnumber=$ar["passportnumber"];
$applicantid=$ar["applicantid"];
$tabl=$tabl."<tr><td><input type=\"checkbox\" name=\"check[$i]\" id=\"check[$i]\" value=\"$applicantid\" checked onclick=\"sel(this,$i);\"></td><td><a id=\"$applicantid\" name=\"$applicantid\" onclick=\"javascript:openNewWindow(this.name);\"><font color=\"blue\">$applicantid</font></td><td>$address</td><td>$dateofbirth</td><td>$passportnumber</td><td><input type=\"text\" name=\"remarks[$i]\" id=\"remarks[$i]\" disabled size=40 ></td><td align=center><input type=\"checkbox\" name=\"status[$applicantid]\" id=\"status[$applicantid]\" value=\"$i\" onclick=\"resendchk(this);\"></td></tr>";
$i++;
}
$myquery=mysql_query("select count(*) from applicantdetails where intake='$app' AND appfill='1' AND appverified='0' AND appfillemail='0' AND appfillremarks=''");
$myquery1=mysql_result($myquery,0);
$objResponse->addScript("document.getElementById('count').value='$myquery1';");
$tabl=$tabl."</table>";
$objResponse->addScript("document.getElementById('Main').innerHTML='$tabl';");
}}
else
{
$objResponse =& new xajaxResponse();
$tab="<br><table align=center><tr><th>Please Select Intake</th></tr></table>";
$objResponse->addScript("document.getElementById('Main').innerHTML='$tab';");
$objResponse->addScript("document.getElementById('count').value='';");}
return $objResponse->getXML();
}


function getcourseApps($corse,$app)
{
if($corse!="Select")
{
$objResponse =& new xajaxResponse();
$con=mysql_connect('192.168.15.24','root','admin');
$db=mysql_select_db('heos');
$countquery=mysql_query("select count(*) from applicantdetails where intake='$app' AND course='$corse' AND appfill='1' AND appverified='0' AND appfillemail='0' AND appfillremarks=''");
if(mysql_result($countquery,0)==0){ //$objResponse->addScript("alert('No Allpications found in selected Intake');");
$noapp="<br><table align=center border=0 cellspacing=1 cellpadding=0><tr><th>No Applications found in selected Intake </th></tr></table>";
$objResponse->addScript("document.getElementById('Main').innerHTML='$noapp';");}
else{
$query=mysql_query("select * from applicantdetails where intake='$app' AND course='$corse' AND appfill='1'  AND appverified='0' AND appfillemail='0' AND appfillremarks=''");
$tabl="<br><table id=\"listtable\" align=center border=0 cellspacing=1 cellpadding=0><tr><th><input type=\"checkbox\" name=\"check[0]\" id=\"check[0]\" onclick=\"sel(this,0);\" checked></th><th>Applicant ID</th><th align=center>Location</th><th>Date of Birth</th><th>Passport Number</th><th>Remarks</th><th>Check to Resend</th></tr>";
$i=1;
while($ar=mysql_fetch_array($query))
{
$address=$ar["address"];
$dateofbirth=$ar["dateofbirth"];$dateofbirth=date('d-M-Y',strtotime($dateofbirth));
$passportnumber=$ar["passportnumber"];
$applicantid=$ar["applicantid"];
$tabl=$tabl."<tr><td><input type=\"checkbox\" name=\"check[$i]\" id=\"check[$i]\" value=\"$applicantid\" checked onclick=\"sel(this,$i);\"></td><td><a id=\"$applicantid\" name=\"$applicantid\" onclick=\"javascript:openNewWindow(this.name);\"><font color=\"blue\">$applicantid</font></td><td>$address</td><td>$dateofbirth</td><td>$passportnumber</td><td><input type=\"text\" name=\"remarks[$i]\" id=\"remarks[$i]\" disabled size=40 ></td><td align=center><input type=\"checkbox\" name=\"status[$applicantid]\" id=\"status[$applicantid]\" value=\"$i\" onclick=\"resendchk(this);\"></td></tr>";
$i++;
}
$myquery=mysql_query("select count(*) from applicantdetails where intake='$app' AND course='$corse' AND appfill='1' AND appverified='0' AND appfillemail='0' AND appfillremarks=''");
$myquery1=mysql_result($myquery,0);
if($myquery1==0){
$objResponse->addScript("document.getElementById('count').value='';"); }
else{$objResponse->addScript("document.getElementById('count').value='$myquery1';");}
$tabl=$tabl."</table>";
$objResponse->addScript("document.getElementById('Main').innerHTML='$tabl';");
}}
else
{
$objResponse =& new xajaxResponse();
$tab="<br><table align=center><tr><th>Please Select Intake</th></tr></table>";
$objResponse->addScript("document.getElementById('Main').innerHTML='$tab';");
$objResponse->addScript("document.getElementById('count').value='';");}
return $objResponse->getXML();
}

$xajax =& new xajax();
$xajax->registerFunction("getApps");
$xajax->registerFunction("getcourseApps");
$xajax->processRequests();
?>
<html>
<head>
<link href="./Images/heoscss.css" rel="stylesheet" type="text/css">
<script language="javascript">
function openNewWindow(applicantid)
{
window.open('appinfo.php?applicantid='+applicantid,'mywin','left=20,top=20,width=500,height=500,toolbar=1,resizable=0');
return false;
}

function resendchk(appid)
{
x=appid.value;
chk="status["+x+"]";
rmk="remarks["+x+"]";
chkobj=document.getElementById(chk);
remark=document.getElementById(rmk);
//alert(appid.checked+"  "+remark.disabled);
if(appid.checked) remark.disabled=false; else remark.disabled=true;
}

function sel(obj,index){
tobj=document.getElementById('listtable').rows;
var setAll=0;
if(index > 0){
if(obj.checked){
for(i=1;i<=tobj.length-1;i++){ name="check["+i+"]"; if(document.getElementById(name).checked) setAll=1; else { setAll=0; break; } }
}
if(setAll) document.getElementById('check[0]').checked=true; else document.getElementById('check[0]').checked=false;
}
if(index==0){
if(obj.checked) for(i=1;i<=tobj.length-1;i++){ name="check["+i+"]"; document.getElementById(name).checked=true; }
else for(i=1;i<=tobj.length-1;i++){ name="check["+i+"]"; document.getElementById(name).checked=false; }
}
}
</script>
</head>
<body>
<?php
$xajax->printJavascript();
?>

<?php
error_reporting(0);
print"<form method=\"post\" name=\"appverification\" action=\"appverification.php\">
<table align=\"center\" cellspacing=1 cellpadding=0>
<tr><th colspan=9>Application Verification Screen</th></tr><tr><td>Intake:</td><td><select name=\"intake\" id=\"intake\" onchange=\"return xajax_getApps(this.value,document.getElementById('course').value);\"><option value=\"Select\">select</option>";
$c=mysql_connect("192.168.15.24","root","admin"); $d=mysql_select_db("heos");
$que=mysql_query("select Intake from cohortdetails");
while($aa=mysql_fetch_array($que))
{
$intake=$aa['Intake'];
echo "<option value=\"$intake\">$intake</option>";
}
print"</select></td>

<td>Course:</td><td colspan=3 ><select name=\"course\" id=\"course\" onchange=\"return xajax_getcourseApps(this.value,document.getElementById('intake').value);\"><option value=\"Select\">Select</option>";
$cours=mysql_query("select * from coursedetails");
while($ary=mysql_fetch_array($cours))
{
$CourseCode=$ary['CourseCode'];
$CourseName=$ary['CourseName'];
print"<option value=\"$CourseCode\">$CourseName</option>";
}
print"</select></td>";
//<td>No.of Applications:</td><td><input type=\"text\" name=\"count\" id=\"count\" size=5 readonly></td>
//print"<td><input type=\"submit\" name=\"Go\" value=\"Go\"></td>";
print"</tr></table>
<div id=\"Main\" name=\"Main\" align=\"center\"></div>
<br><table align=center cellspacing=0 cellpadding=1><tr><td><input type=\"submit\" name=\"apply\" value=\"Send\" class=\"buttonstatic\" onmouseover=\"changeimage(this,'buttonover');\" onmouseout=\"changeimage(this,'buttonstatic');\">
</td></tr></table></form>";

if(isset($_POST['apply']))
{
$c=mysql_connect("192.168.15.24","root","admin");
$d=mysql_select_db("heos",$c);

$checkarray=$_POST['check'];
$remarks=$_POST['remarks'];
foreach($checkarray as $k=>$value){  $appid=$value;
if(empty($remarks[$k]))
        {
        $updat=mysql_query("update applicantdetails set appverified='1'  where applicantid='$appid'");
        $mail=mysql_query("select mailid from applicantdetails where applicantid='$appid'");
                $mailid=mysql_result($mail,0);
                $recipient = $mailid;
                $subject = 'Successful in application fill kid';
                $message = 'Hi kid You have successfully Enrolled';

                $headers = 'From: kartyvimy@gmail.com'."\r\n"
                .'Reply-To: kartyvimy@gmail.com'."\r\n";
                if (mail($recipient, $subject, $message, $headers))
                {
               echo "<script type=\"text/javascript\">alert(\"Mail Sent Succesfully\")</script>";
               $updatemail=mysql_query("update applicantdetails set appfillemail='1' where applicantid='$appid'");
                }
                else  echo "<script type=\"text/javascript\">alert(\"Mail not Sent\")</script>";

        }
else
{
        $updat=mysql_query("update applicantdetails set appverified='1',appfillremarks='$remarks[$k]'  where applicantid='$appid'");
        $add=mysql_query("update applicantdetails set appfillremarks='$remarks[$k],appverified='1' where applicantid='$appid'");
                $mail=mysql_query("select mailid,appfillremarks from applicantdetails where applicantid='$appid'");

                while($ar=mysql_fetch_array($mail)){$mailid=$ar["mailid"]; $msg=$ar["appfillremarks"];}
                $recipient = $mailid;
                $subject = 'Confirmation From Saxon Admin';
                $message = $msg;

                $headers = 'From: kartyvimy@gmail.com'."\r\n"
                .'Reply-To:  kartyvimy@gmail.com'."\r\n";
                if (mail($recipient, $subject, $message, $headers))
                {
                echo "<script type=\"text/javascript\">alert(\"Mail Sent Succesfully\")</script>";
                $updatemail=mysql_query("update applicantdetails set appfillemail='1' where applicantid='$appid'");
                }
                //else  echo "<script type=\"text/javascript\">alert(\"Mail not Sent\")</script>";
        }

}
}//end isset
?>
</body>
</html>
