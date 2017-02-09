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
        <table align=\"center\" border=0 cellspacing=1 cellpadding=0><tr><td align=\"center\" colspan=\"6\"><b>LETTER REQUISITION FORM</b></td></tr>";
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

        <table align=\"center\" border=0 cellspacing=1 cellpadding=0><tr><br></tr>
        <tr><td>Reason for not issuing the document(s) :</td><td><textarea name=\"reason\" id=\"reason\" rows=\"4\"></textarea></td>
        <td>Any other comments :</td><td><textarea name=\"comments\" id=\"comments\" rows=\"4\"></textarea></td></tr></table>

        <table align=\"center\" border=0 cellspacing=1 cellpadding=0><tr><br><td colspan=\"8\"><u>Authorised By:</u></td></tr>
        <tr><td>Name :</td><td><input type=\"text\" name=\"name\" id=\"name\"></td>
        <td>Signed :</td><td><input type=\"text\" name=\"signed\" id=\"signed\"></td>
        <td>Date Checked :</td><td><input type=\"text\" name=\"date1\" id=\"date1\" value=\"0\" size=13><a href=\"javascript:NewCal('date1','ddmmmyyyy')\"><img src=\"cal.gif\" alt=\"Pick a date\" width=\"20\" height=\"20\" border=\"0\"></a></td>
        <td>Time :</td><td><input type=\"text\" name=\"time\" id=\"time\"></td></tr>

        <tr><td colspan=\"8\"><u>Attendance Check:</u></td></tr>
        <tr><td>Duration :</td><td><input type=\"text\" name=\"duration\" id=\"duration\"></td>
        <td>Possible :</td><td><input type=\"text\" name=\"possible\" id=\"possible\"></td>
        <td>Actual :</td><td><input type=\"text\" name=\"actual\" id=\"actual\"></td>
        <td>Percentage :</td><td><input type=\"text\" name=\"percentage\" id=\"percentage\"></td></tr></table>

        <table align=\"center\" border=0 cellspacing=1 cellpadding=0><tr><br><td colspan=\"10\"><u>Fee status:</u></td></tr>
        <tr><td>Folio # :</td><td><input type=\"text\" name=\"folio\" id=\"folio\" size=13></td>  <td>Tuition Fee :</td><td><input type=\"text\" name=\"tuitionfee\" id=\"tuitionfee\" size=13></td>
        <td>Fee Paid :</td><td><input type=\"text\" name=\"feepaid\" id=\"feepaid\" size=13></td>
        <td>Remaining Balance :</td><td><input type=\"text\" name=\"remainingbalabce\" id=\"remainingbalabce\" size=13></td>
        <td>Signed/Date :</td><td><input type=\"text\" name=\"date2\" id=\"date2\" value=\"0\" size=13><a href=\"javascript:NewCal('date2','ddmmmyyyy')\"><img src=\"cal.gif\" alt=\"Pick a date\" width=\"20\" height=\"20\" border=\"0\"></a></td></tr>

        <table align=\"center\" cellspacing=1 cellpadding=0><tr><br><td><input type=\"submit\" id=\"submitButton\" name=\"submitButton\" value=\"Submit\"></td></tr></table></form>\n";



?>


</body>

</html>
