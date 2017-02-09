<html>
<head>
<title></title>
<script type="text/javascript" src="datetimepicker.js"></script>
<link href="./Images/heoscss.css" rel="stylesheet">
<script language="javascript">
function closepopup()
{
 if(false == window.closed)
 {
    window.close ();
 }
}
</script>
</head>
<body>
<?php
        print "<form action=\"studentgeneralform.php\" method=\"post\" name=\"studentgeneralform\">
        <table align=\"center\" border=0 cellspacing=1 cellpadding=0><tr><td align=\"center\" colspan=\"6\"><b>STUDENT GENERAL FORM</b></td></tr>";
        $con=mysql_connect("192.168.15.24","root","admin");
        $db=mysql_select_db("heos",$con);
        $rs1=mysql_query("select studentgeneralformforstud.studentidno,studentregistration.studentfirstname,studentregistration.studentsurname,studentregistration.course,studentinformationname.corraddress,studentinformationname.corrpostcode,studentinformationname.corrphoneno,studentregistration.email,studentgeneralformforstud.query,studentgeneralformforstud.staffname,studentgeneralformforstud.feedback from studentregistration,studentinformationname,studentgeneralformforstud where studentinformationname.studentidno = studentregistration.studentidno = studentgeneralformforstud.studentidno;",$con);
        while($res1=mysql_fetch_array($rs1))
        {
                $studentidno=$res1["studentidno"];  $studentfirstname=$res1["studentfirstname"];
                $studentsurname=$res1["studentsurname"];  $course=$res1["course"];
                $ukcorraddress=$res1["corraddress"];  $corrpostcode=$res1["corrpostcode"];
                $corrphoneno=$res1["corrphoneno"];  $email=$res1["email"];
                $studentname=$studentfirstname.$studentsurname;
                $query=$res1["query"];  $staffname=$res1["staffname"]; $feedback=$res1["feedback"];
        }
        print "<tr><td>Student ID Number :</td><td>$studentidno</td>
        <td>Student Name :</td><td>$studentname</td></tr>
        <tr><td>Course :</td><td>$course</td>
        <td>Address(UK) :</td><td>$ukcorraddress</td></tr>
        <tr><td>Post Code :</td><td>$corrpostcode</td>
        <td>Phone Number :</td><td>$corrphoneno</td></tr>
        <tr><td>Email :</td><td>$email</td>
        <td>General Query :</td><td>$query</td></tr>
        <tr><td>Staff Name :</td><td>$staffname</td>
        <td>Feedback :</td><td>$feedback</td></tr>
        <table align=\"center\" border=0 class=\"label\" cellspacing=1 cellpadding=0>
        <tr><br><td>Student Informed of final outcome :</td><td>Yes<input type=\"radio\" name=\"radio1\" value=\"Yes\"></td><td>No<input type=\"radio\" name=\"radio1\" value=\"No\"></td></tr>
        <tr><td>Query satisfactorily dealt with :</td><td>Yes<input type=\"radio\" name=\"radio2\" value=\"Yes\"></td><td>No<input type=\"radio\" name=\"radio2\" value=\"No\"></td></tr>
        <tr>"; $sysdate=date('d-M-Y'); print "<td>Date</td><td><input type=\"text\" name=\"Date1\" id=\"Date1\" value=\"$sysdate\" size=\"13\"><a href=\"javascript:NewCal('Date1','ddmmmyyyy')\"><img src=\"cal.gif\" alt=\"Pick a date\" width=\"20\" height=\"20\" border=\"0\"></a></td></tr>
        <table align=\"center\" cellspacing=1 cellpadding=0><tr><br><td><input type=\"submit\" id=\"submitButton\" name=\"submitButton\" value=\"Submit\"></td>
        <td><A href=\"javascript: closepopup()\">Close Window</A></td></table></form>\n";
?>
<?php
        if(isset($_POST['submitButton']))
        {
                if(!empty($_POST['radio1'])) $finaloutcome=$_POST['radio1']; else $finaloutcome=0;
                if(!empty($_POST['radio2'])) $studentsatisfactorly=$_POST['radio2']; else $studentsatisfactorly=0;
                $Date1=$_POST['Date1'];
                $Dat1=date('Y-m-d',strtotime($Date1));
                $con=mysql_connect("192.168.15.24","root","admin");
                $db=mysql_select_db("heos",$con);
                $queryinsert=mysql_query("update studentgeneralformforstud SET finaloutcome='$finaloutcome',studentsatisfactorly='$studentsatisfactorly',checkeddate='$Dat1',STATUS='1' where studentidno='$studentidno'",$con);
                echo "<script text/javascript>window.close();</script>";
        }
?>

</body>

</html>
