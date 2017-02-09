<html>
<head> <title></title>
<script type="text/javascript" src="datetimepicker.js"></script>
<link href="./Images/heoscss.css" rel="stylesheet">
<script language="javascript">
  function agree(check){
  if(check.checked){ document.getElementById('others').disabled=false;
  document.getElementById('others').className="buttonstatic"; }
  else { document.getElementById('others').disabled=true;
  document.getElementById('others').className="buttondisable"; } }
</script>
</head>
<body>

<?php
        print "<form action=\"letterrequisitionform.php\" method=\"post\" name=\"letterrequisitionform\" enctype=\"multipart/form-data\">
        <table align=\"center\" border=0 cellspacing=1 cellpadding=0><tr><td align=\"center\" colspan=\"6\"><b>LETTER REQUISITION FORM</b></td></tr>
        <table align=center cellspacing=1 cellpadding=0><tr><td><textarea rows=1 cols=100 readonly wrap=\"on\">Please complete this form (in BLOCK letter) to obtain any type of document that you need from the College.Forms submitted with incomplete information may cause delay in issuing the document.</textarea></td></tr></table>
        <table align=center cellspacing=1 cellpadding=0><tr><td><textarea rows=1 cols=100 readonly wrap=\"on\">Please note that 3-5 days notice is required to obtain any type of document. Incomplete forms will not be processed. The requested documents can only be collected between 2:30pm-3:30pm Monday to Friday.</textarea></td></tr></table>

        <table align=\"center\" border=0 cellspacing=1 cellpadding=0><tr><br><td colspan=\"6\"><b>Purpose for which letter is required(Please tick as appropriate):</b></td></tr>
        <tr><td><input type=\"checkbox\" name=\"account\" value=\"To open a bank account\">To open a bank account</td><td><input type=\"checkbox\" name=\"register\" value=\"To register with a GP\">To register with a GP</td>
        <td><input type=\"checkbox\" name=\"address\" value=\"Change of Address\">Change of Address</td></tr>
        <tr><td><input type=\"checkbox\" name=\"idcard\" value=\"ID card\">ID card(replacement cast $5)</td>
        <td><input type=\"checkbox\" name=\"travelvisa\" value=\"To obtain travel visa\">To obtain travel visa</td><td><input type=\"checkbox\" name=\"tax\" value=\"Council Tax\">Council Tax</td></tr>
        <tr><td><input type=\"checkbox\" name=\"radio1\" value=\"ON\">Part-time work</td>
        <td><input type=\"checkbox\" name=\"others1\" value=\"Others\" onClick=\"return agree(this);\">Others(please specify)</td><td><input type=\"text\" name=\"others\" id=\"others\" value=\"\"></td></tr></table>";

        $con=mysql_connect("192.168.15.24","root","admin");
        $db=mysql_select_db("heos",$con);
        $rs1=mysql_query("select studentregistration.studentidno,studentregistration.intake,studentregistration.studentfirstname,studentregistration.studentsurname,studentregistration.citizenof,studentregistration.dateofbirth,studentregistration.course,studentinformationname.corraddress,studentinformationname.corrpostcode,studentinformationname.corrphoneno,studentinformationname.permaddress,studentregistration.email from studentregistration,studentinformationname where studentinformationname.studentidno = studentregistration.studentidno;",$con);
        while($res1=mysql_fetch_array($rs1))
        {
                $studentidno=$res1["studentidno"];  $studentfirstname=$res1["studentfirstname"];
                $studentsurname=$res1["studentsurname"];  $course=$res1["course"];
                $ukcorraddress=$res1["corraddress"];  $corrpostcode=$res1["corrpostcode"];
                $corrphoneno=$res1["corrphoneno"];  $email=$res1["email"]; $intake=$res1["intake"];
                $permaddress=$res1["permaddress"];  $dateofbirth=$res1["dateofbirth"]; $nationality=$res1["citizenof"];
                $studentname=$studentfirstname.$studentsurname;
        }
        print "<table align=\"center\" border=0 cellspacing=1 cellpadding=0>
        <tr><br><td>Student ID Number :</td><td>$studentidno</td><td>Student Name :</td><td>$studentname</td><td>Date of Birth</td><td>$dateofbirth</td></tr>
        <tr><td>Nationality :</td><td>$nationality</td><td>Address(UK) :</td><td>$ukcorraddress</td><td>Post Code :</td><td>$corrpostcode</td></tr>
        <tr><td>UK Phone No :</td><td>$corrphoneno</td><td>Overseas Address :</td><td>$permaddress</td><td>Email Address :</td><td>$email</td></tr>
        <tr><td>Course :</td><td>$course</td><td>Intake :</td><td>$intake</td></tr></table>

        <table align=\"center\" border=0 cellspacing=1 cellpadding=0><tr><br><td colspan=\"6\"><u>Additional Information for Travel visa request:</u></td></tr>
        <tr><td>Inteneded travel date :</td><td><input type=\"text\" name=\"Date2\" id=\"Date2\" value=\"0\" size=13><a href=\"javascript:NewCal('Date2','ddmmmyyyy')\"><img src=\"cal.gif\" alt=\"Pick a date\" width=\"20\" height=\"20\" border=\"0\"></a></td>
        <td>Expected Arrival date :</td><td><input type=\"text\" name=\"Date3\" id=\"Date3\" value=\"0\" size=13><a href=\"javascript:NewCal('Date3','ddmmmyyyy')\"><img src=\"cal.gif\" alt=\"Pick a date\" width=\"20\" height=\"20\" border=\"0\"></a></td></tr>
        <tr><td>Country of Visit :</td><td><input type=\"text\" name=\"country\" id=\"country\"></td><td>Purpose of visit :</td><td><input type=\"text\" name=\"purposeofvisit\" id=\"purposeofvisit\"></td></tr>
        <tr><td>Number of weeks planned to be spent abroad :</td><td><input type=\"text\" name=\"abroad\" id=\"abroad\"></td></tr></table>

        <table align=\"center\" cellspacing=1 cellpadding=0><tr><br><td><input type=\"submit\" id=\"submitButton\" name=\"submitButton\" value=\"Submit\"></td></tr></table></form>\n";
?>

<?php
        if(isset($_POST['submitButton']))
        {
                if(!empty($_POST['radio1']))
                $radio1=$_POST['radio1']; else $radio1=0;
                $Date2=$_POST['Date2'];
                $Date3=$_POST['Date3'];
                $country=$_POST['country'];
                $purposeofvisit=$_POST['purposeofvisit'];
                $abroad=$_POST['abroad'];
                $Date4=$_POST['Date4'];
                $Dat2=date('Y-m-d',strtotime($Date2));
                $Dat3=date('Y-m-d',strtotime($Date3));
                $sysdate=date('d-M-Y');
                $Dat4=date('Y-m-d',strtotime($Date4));
                $con=mysql_connect("192.168.15.24","root","admin");
                $db=mysql_select_db("heos",$con);

              // $queryinsert=mysql_query("insert into letterrequisitionform values('0','$radio1','$Dat2','$Dat3','$country','$purposeofvisit','$abroad','$Dat4')",$con);

        }

?>

</body>

</html>
