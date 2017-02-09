<?php session_start();
require_once(dirname(__FILE__) . '/xajax.inc.php');
function setLevel($course)
{
        $objResponse =& new xajaxResponse();
        $con=mysql_connect("192.168.15.24","root","admin");
        $db=mysql_select_db("heos",$con);
        $sql="SELECT distinct CourseId,CourseName FROM coursedetails WHERE CourseLevel='$course'";
        $rs=mysql_query($sql,$con);
        $objResponse->addscript("document.getElementById('CourseId').options.length=0;");
        $objResponse->addScript("addOption('CourseId','select','select');");
        while($res=mysql_fetch_array($rs))
        {
                $courseid=$res["CourseId"];
                $Cname=$res["CourseName"];
                $objResponse->addScript("addOption('CourseId','" . $Cname . "','" . $courseid . "');");
        }
        return $objResponse->getXML();
}
$xajax =& new xajax();
$xajax->registerFunction("setLevel");
$xajax->processRequests();
?>

<html>
<head>
<title></title>
<?php $xajax->printJavascript(); ?>
<script language="javascript">
function rowAdd()
{
tobj=document.getElementById('issue'); crobj=tobj.rows;
var row=crobj.length; robj=tobj.insertRow(row);
c1=robj.insertCell(0); c2=robj.insertCell(1); c3=robj.insertCell(2); c4=robj.insertCell(3);
c5=robj.insertCell(4); c6=robj.insertCell(5); c7=robj.insertCell(6); arindex=crobj.length-2;
c1.innerHTML=crobj.length-1;
c2.innerHTML="<input type=\"text\" name=\"contectname["+arindex+"]\" id=\"contectname["+arindex+"]\">";
c3.innerHTML="<textarea name=\"contectaddress["+arindex+"]\" id=\"contectaddress["+arindex+"]\"></textarea>";
c4.innerHTML="<input type=\"text\" name=\"contectpostcode["+arindex+"]\" id=\"contectpostcode["+arindex+"]\" size=10>";
c5.innerHTML="<input type=\"text\" name=\"contectteleno["+arindex+"]\" id=\"contectteleno["+arindex+"]\" value=\"\">";
c6.innerHTML="<input type=\"text\" name=\"contectmobileno["+arindex+"]\" id=\"contectmobileno["+arindex+"]\" value=\"\" size=10>";
c7.innerHTML="<input type=\"text\" name=\"contectsemail["+arindex+"]\" id=\"contectsemail["+arindex+"]\" value=\"\">";
}
function deleteRow()
{
dtobj=document.getElementById('issue').rows; drow=dtobj.length-1;
if(dtobj.length > 2) document.getElementById('issue').deleteRow(drow); }
function indexAlert(obj) { alert(obj.name);
}
function addOption(selectId,txt, val)
{
        var objOption = new Option(txt,val);
        document.getElementById(selectId).options.add(objOption);
}
function setImage()
{
var img=new Image();
img.src=document.getElementById('file1').value; var im=img.src;
document.getElementById('myImage').src=im;
return false;
}
</script>
<script type="text/javascript" src="datetimepicker.js"></script>
<link href="./Images/heoscss.css" rel="stylesheet"></head>
<body>
<?php
        print "<form action=\"studentregistration.php\" method=\"post\" name=\"studentregistration\" enctype=\"multipart/form-data\">
        <table align=\"center\" border=0 cellspacing=1 cellpadding=0><tr><td align=\"center\" colspan=\"6\">
        <b>Student Registration Document</b></td></tr>
        <tr><td>Student First Name :</td><td><input type=\"text\" name=\"studentfirstname\" id=\"studentfirstname\"></td><td>Student Last Name :</td><td><input type=\"text\" name=\"studentlastname\" id=\"studentlastname\"></td>
        <td>Level of Course :</td><td><select size=\"1\" name=\"level1\" id=\"level1\" onChange=\"return xajax_setLevel(this.value);\"><option value=\"value1\">--Select--</option>";
        $con=mysql_connect("192.168.15.24","root","admin");
        $db=mysql_select_db("heos",$con);
        $sql="select recordid,levelname from levelmaster";
        $rs=mysql_query($sql,$con);
        while($res1=mysql_fetch_array($rs))
        {
                $recordid=$res1["recordid"];
                $level=$res1["levelname"];
                echo"<option value=\"$recordid\">$level</option>";
        }
        print "</select></td></tr>
        <tr><td> Course Name :</td><td><select size=\"1\" name=\"CourseId\" id=\"CourseId\"><option value=\"--Select--\">--Select--</option>"; print "</select></td>
        <td>Intake :</td><td><select size=\"1\" name=\"Intake\" id=\"Intake\"><option value=\"value1\">--Select--</option>";
        $con=mysql_connect("192.168.15.24","root","admin");
        $db=mysql_select_db("heos",$con);
        $sql="select CohortID,Intake from cohortdetails";
        $rs=mysql_query($sql,$con);
        while($res1=mysql_fetch_array($rs))
        {
                $cohortid=$res1["CohortID"];
                $Intake=$res1["Intake"];
                echo"<option value=\"$cohortid\">$Intake</option>";
        }
        print "</select></td>
        <td>Email :</td><td><input type=\"text\" name=\"email\" id=\"email\"></td>
        <td rowspan=4 align=\"left\" valign=\"bottom\">
        <img id=\"myImage\" src=\"\" alt=\"\" name=\"myImage\" width=\"70\" height=\"85\"></td></tr><tr><td></td><td></td><td></td>
        <td>Photo :</td><td colspan=2><input type=\"file\" name=\"file1\" id=\"file1\" onChange=\"setImage();\"></td></tr>

        <table align=\"center\">
        <tr><td>Student Address</td><td>Address</td><td>Post Code</td><td>Telephone Number</td><td>Mobile Number</td></tr>
        <tr><td>Correspondence Address<i> (Local Address)</i></td><td><textarea name=\"correspondence\" id=\"correspondence\"></textarea></td>
        <td><input type=\"text\" name=\"cpostcode\" id=\"cpostcode\"></td><td><input type=\"text\" name=\"cteleno\" id=\"cteleno\"></td><td><input type=\"text\" name=\"cmobileno\" id=\"cmobileno\"></td></tr>
        <tr><td>Permanent Address<i> (Overseas Address)</i></td><td><textarea name=\"permanent\" id=\"permanent\"></textarea></td>
        <td><input type=\"text\" name=\"ppostcode\" id=\"ppostcode\"></td><td><input type=\"text\" name=\"pteleno\" id=\"pteleno\"></td><td><input type=\"text\" name=\"pmobileno\" id=\"pmobileno\"></td></tr>
        <br><table align=\"center\" border=0 cellspacing=1 cellpadding=0><caption>Student Sponsor Details</caption>
        <tr><td>Name</td><td>Address</td><td>Post Code</td><td>Telephone Number</td><td>Mobile Number</td><td>Email</td></tr>
        <tr><td><input type=\"text\" name=\"sponsorname\" id=\"sponsorname\"></td><td><textarea name=\"sponsoraddress\" id=\"sponsoraddress\"></textarea></td>
        <td><input type=\"text\" name=\"sponsorpostcode\" id=\"sponsorpostcode\"></td><td><input type=\"text\" name=\"sponsorteleno\" id=\"sponsorteleno\"></td>
        <td><input type=\"text\" name=\"sponsormobileno\" id=\"sponsormobileno\"></td><td><input type=\"text\" name=\"sponsorsemail\" id=\"sponsorsemail\"></td></tr>";
        $no=0;  $var=1;
        print "<table align=\"center\" border=0 cellspacing=1 cellpadding=0 id=\"issue\" name=\"issue\"><caption>Student Guadian or Contect Person in case of Emergency</caption>
        <tr><td>S.No.</td><td>Name</td><td>Address</td><td>Post Code</td><td>Telephone Number</td><td>Mobile Number</td><td>Email</td></tr>
        <tr><td>$var</td><td><input type=\"text\" name=\"contectname[$no]\" id=\"contectname[$no]\"><td><textarea name=\"contectaddress[$no]\" id=\"contectaddress[$no]\"></textarea></td>
        <td><input type=\"text\" name=\"contectpostcode[$no]\" id=\"contectpostcode[$no]\" size=10><td><input type=\"text\" name=\"contectteleno[$no]\" id=\"contectteleno[$no]\"></td>
        <td><input type=\"text\" name=\"contectmobileno[$no]\" id=\"contectmobileno[$no]\" size=13></td><td><input type=\"text\" name=\"contectsemail[$no]\" id=\"contectsemail[$no]\"></td><td><input type=\"button\" value=\"add\" onClick=\"rowAdd();\"></td><td><input type=\"button\" value=\"delete\" onClick=\"deleteRow();\"></td></tr>";
        print "<table align=\"center\" border=0 cellspacing=1 cellpadding=0><tr><br><td align=\"left\" colspan=\"1\"><u></u><i>(Please give details of any Medical Problems and Medication Taken)</i></td></tr>
        <table align=\"center\" border=0 cellspacing=1 cellpadding=0><tr><tr><td>Medical History:</td><td><textarea name=\"medical\" id=\"medical\"></textarea></td>";
        $sysdate=date('d-M-Y'); print "<td>Date :</td><td><input type=\"text\" name=\"Date1\" id=\"Date1\" value=\"$sysdate\" size=13><a href=\"javascript:NewCal('Date2','ddmmmyyyy')\"><img src=\"cal.gif\" alt=\"Pick a date\" width=\"20\" height=\"20\" border=\"0\"></a></td></tr>
        <table align=\"center\" cellspacing=1 cellpadding=0><tr><td><input type=\"submit\" id=\"submitButton\" name=\"submitButton\" value=\"Submit\"></td></tr></table>
 </table></form>\n";

?>
<?php
if(isset($_POST['submitButton']))
   {
         $stfirstname=$_POST['studentfirstname'];
         $lastname=$_POST['studentlastname'];
         $course=$_POST['CourseId'];
         $sql="select CourseCode from coursedetails where CourseId='$course'";
         $rs=mysql_query($sql,$con);
         while($res4=mysql_fetch_array($rs)) {  $coursecode=$res4["CourseCode"];   }   
         $Intake=$_POST['Intake'];
         $email=$_POST['email'];
         $sql="select Intake from cohortdetails where CohortID='$Intake'";
         $rs=mysql_query($sql,$con);
         while($res3=mysql_fetch_array($rs)) {  $Intake=$res3["Intake"];   }
         $medical=$_POST['medical'];
         $Date1=$_POST['Date1'];
         $sdate=date('Y-m-d',strtotime($Date1));
         $correspondence=$_POST['correspondence']; $cpostcode=$_POST['cpostcode']; $cteleno=$_POST['cteleno']; $cmobileno=$_POST['cmobileno'];
         $permanent=$_POST['permanent'];  $ppostcode=$_POST['ppostcode'];  $pteleno=$_POST['pteleno'];  $pmobileno=$_POST['pmobileno'];
         $sponsorname=$_POST['sponsorname'];  $sponsoraddress=$_POST['sponsoraddress']; $sponsorpostcode=$_POST['sponsorpostcode'];
         $sponsorteleno=$_POST['sponsorteleno']; $sponsormobileno=$_POST['sponsormobileno']; $sponsorsemail=$_POST['sponsorsemail'];
         $contectname=$_POST['contectname'];  $contectaddress=$_POST['contectaddress']; $contectpostcode=$_POST['contectpostcode'];
         $contectteleno=$_POST['contectteleno']; $contectmobileno=$_POST['contectmobileno']; $contectsemail=$_POST['contectsemail'];
         $con=mysql_connect("192.168.15.24","root","admin");
         $db=mysql_select_db("heos",$con);

         $count=mysql_query("select recordid from studentregistration",$con);
         while($a=mysql_fetch_array($count)) $exist=$a['recordid'];   $existt=$exist+1;
         $chars = "1234567890abcdefghijkmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"; $password = "";
         for($i=0;$i<8;$i++) $password .= $chars{mt_rand(0,strlen($chars))};
         $studentid=$Intake.$coursecode.$existt;   // echo $studentid;
         uploadFunction();   $_SESSION['studid']=$studentid;
         $insertquery=mysql_query("insert into studentregistration values('0','$studentid','$password','$stfirstname','$lastname','$course','$Intake','$email','$medical','$sdate','')",$con);
         $insertquery1=mysql_query("insert into studentinformationname values('0','$studentid','$correspondence','$cpostcode','$cteleno','$cmobileno','$permanent','$ppostcode','$pteleno','$pmobileno','$sponsorname','$sponsoraddress','$sponsorpostcode','$sponsorteleno','$sponsormobileno','$sponsorsemail')",$con);
         foreach($contectname as $key=>$value)
         {
             $insertquery2=mysql_query("insert into contactdetails values('0','$existt','Studentdetails','$contectname[$key]','0','$contectsemail[$key]','$contectmobileno[$key]','$contectteleno[$key]','0')",$con);
         }
   }

?>

<?php
function uploadFunction()
{
       // $studentid=$_SESSION['studid'];
        $ar=split('/',$_FILES['file1']['type']);
        if($ar[1]=='pjpeg') $ext='jpeg'; if($ar[1]=='gif') $ext='gif'; if($ar[1]=='x-png') $ext='png';
        if ( $_FILES['file1']['name'] != "")
        {
         if(!(is_dir("StudentUpload"))) mkdir("StudentUpload");
         copy($_FILES['file1']['tmp_name'],"StudentUpload/".$studentid.'.'.$ext);
        }
}

?>

</body>
</html>
