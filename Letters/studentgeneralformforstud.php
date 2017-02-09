<html>
<head>
<title></title>
<script type="text/javascript" src="datetimepicker.js"></script>
<link href="./Images/heoscss.css" rel="stylesheet"></head>
</head>
<body>
<?php
        print "<form action=\"studentgeneralformforstud.php\" method=\"post\" name=\"studentgeneralformforstud\">
        <table align=\"center\" border=0 cellspacing=1 cellpadding=0><tr><td align=\"center\" colspan=\"6\"><b>STUDENT GENERAL FORM</b></td></tr>";
        $con=mysql_connect("192.168.15.24","root","admin");
        $db=mysql_select_db("heos",$con);
        $rs1=mysql_query("select studentregistration.studentidno,studentregistration.studentfirstname,studentregistration.studentsurname,studentregistration.course,studentinformationname.corraddress,studentinformationname.corrpostcode,studentinformationname.corrphoneno,studentregistration.email from studentregistration,studentinformationname where studentinformationname.studentidno = studentregistration.studentidno;",$con);
        while($res1=mysql_fetch_array($rs1))
        {
                $studentidno=$res1["studentidno"];  $studentfirstname=$res1["studentfirstname"];
                $studentsurname=$res1["studentsurname"];  $course=$res1["course"];
                $ukcorraddress=$res1["corraddress"];  $corrpostcode=$res1["corrpostcode"];
                $corrphoneno=$res1["corrphoneno"];  $email=$res1["email"];
                $studentname=$studentfirstname.$studentsurname;
        }
        print "<tr><td>Student ID Number :</td><td>$studentidno</td>
        <td>Student Name :</td><td>$studentname</td></tr>
        <tr><td>Course :</td><td>$course</td>
        <td>Address(UK) :</td><td>$ukcorraddress</td></tr>
        <tr><td>Post Code :</td><td>$corrpostcode</td>
        <td>Phone Number :</td><td>$corrphoneno</td></tr>
        <tr><td>Email :</td><td>$email</td>
        <td>General Query :</td><td><textarea name=\"query\" id=\"query\" rows=\"4\"></textarea></td></tr>
        <tr><td>Staff Name :</td><td><select size=\"1\" name=\"staff\" id=\"staff\"><option value=\"value1\">--Select--</option>";
        $con=mysql_connect("192.168.15.24","root","admin");
        $db=mysql_select_db("heos",$con);
        $rs=mysql_query("select staffinformationid,title,firstname,middlename,lastname from staffpersonalinformation",$con);
        while($res1=mysql_fetch_array($rs))
        {
                $staffinformationid=$res1["staffinformationid"];
                $title=$res1["title"]; $firstname=$res1["firstname"]; $middlename=$res1["middlename"]; $lastname=$res1["lastname"];
                $staffname=$title.' '.$firstname.' '.$middlename.' '.$lastname;
                echo"<option value=\"$staffinformationid\">$staffname</option>";
        }
        print "</select></td>
        <td>Feedback :</td><td><textarea name=\"feedback\" id=\"feedback\" rows=\"4\"></textarea></td></tr>";
        $sysdate=date('d-M-Y'); print "<tr><td>Date</td><td><input type=\"text\" name=\"Date1\" id=\"Date1\" value=\"$sysdate\" size=\"13\"><a href=\"javascript:NewCal('Date1','ddmmmyyyy')\"><img src=\"cal.gif\" alt=\"Pick a date\" width=\"20\" height=\"20\" border=\"0\"></a></td></tr>
        <table align=\"center\" cellspacing=1 cellpadding=0><tr><br><td><input type=\"submit\" id=\"submitButton\" name=\"submitButton\" value=\"Submit\"></td></tr></table>
        </table></form>\n";
?>

<?php
        if(isset($_POST['submitButton']))
        {
                $query=$_POST['query'];
                $staff=$_POST['staff'];
                $feedback=$_POST['feedback'];
                $Date1=$_POST['Date1'];
                $Dat1=date('Y-m-d',strtotime($Date1));
                $con=mysql_connect("192.168.15.24","root","admin");
                $db=mysql_select_db("heos",$con);

                $queryinsert=mysql_query("insert into studentgeneralformforstud values('0','$studentidno','$query','$staff','$feedback','$Dat1','','','','0' )",$con);

        }

?>

</body>

</html>
