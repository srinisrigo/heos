<html>
<head>
  <title></title>
  <script type="text/javascript" src="datetimepicker.js"></script>
  <link href="./Images/heoscss.css" rel="stylesheet">
</head>
<body>
<?php
        print "<form action=\"appealsform.php\" method=\"post\" name=\"appealsform\" enctype=\"multipart/form-data\">
        <table align=\"center\" border=0 cellspacing=1 cellpadding=0><tr><td align=\"center\" colspan=\"6\"><b>APPEALS FORM</b></td></tr>

        <table align=center cellspacing=1 cellpadding=0>
        <tr><td><textarea rows=1 cols=100 readonly wrap=\"on\">
        Your appeal should be submitted to the Academic Office within 7 days. You will be informed of the outcome of your appeal within 14 days unless otherwise stated.
        </textarea></td></tr></table>

        <table align=\"center\"><tr><br><td><b>Please note that appeals will not be considered against the academic judgment of the Examiners.</b></td></tr>";
        $con=mysql_connect("192.168.15.24","root","admin");
        $db=mysql_select_db("heos",$con);
        $select=mysql_query("select studentregistration.studentidno,studentregistration.studentfirstname,studentregistration.studentsurname,studentregistration.course,studentregistration.intake,studentinformationname.corraddress,studentinformationname.corrpostcode from studentregistration,studentinformationname where studentregistration.studentidno=studentinformationname.studentidno",$con);
        while($res=mysql_fetch_array($select))
        {
           $studentidno=$res["studentidno"];
           $studentfirstname=$res["studentfirstname"];
           $studentsurname=$res["studentsurname"];
           $studentname=$studentfirstname.$studentsurname;
           $course=$res["course"];
           $intake=$res["intake"];
           $corraddress=$res["corraddress"];
           $postcode=$res["corrpostcode"];

        }

        print"<table align=\"center\" border=0 cellspacing=1 cellpadding=0><tr><br><td colspan=\"6\">
        <u><b>SECTION A-YOUR DETAILS</b></u></tr>
        <tr><td>Student ID Number :</td><td>$studentidno</td><td>Student Name :</td><td>$studentname</td><td>Address :</td><td>$corraddress</td></tr>
        <tr><td>Post Code :</td><td>$postcode</td><td>Course :</td><td>$course</td><td>Intake :</td><td>$intake</td></tr>

        <table align=\"center\" border=0 cellspacing=1 cellpadding=0><tr><br><td colspan=\"6\">
        <u><b>SECTION B-STATEMENT OF APPEAL</b></u><br>Please set out your case here or attach a separate statement.</tr>
        <tr><br><td>Grounds of Appleal :</td><td><textarea name=\"groundsappeal\" id=\"groundsappeal\" rows=\"4\"></textarea></td>
        <td>Your Case :</td><td><textarea name=\"yourcase\" id=\"yourcase\" rows=\"4\"></textarea></td></tr>
        <tr><td><textarea name=\"additionalsheet\" id=\"additionalsheet\" rows=\"4\"></textarea></td><td><i>Use an additional sheet if necessary. Please keep a copy of the form for your records.</i></td></tr></table>

        <table align=\"center\" border=0 cellspacing=1 cellpadding=0><tr><br><td colspan=\"6\">
        <u><b>SECTION C-AN OUTLINE OF ANY ACTION YOU HAVE TAKEN SO FAR</b></u><br>If you have already taken action to attempt to resolve the matter <b>informally</b>, please give the details below:-</td></tr>
        <tr><td>Name :</td><td><input type=\"text\" name=\"name\" id=\"name\"></td><td>Department :</td><td><input type=\"text\" name=\"department\" id=\"department\"></td>
        <td>Date Discussed :</td><td>Date :</td><td><input type=\"text\" name=\"Date1\" id=\"Date1\" value=\"\" size=\"13\"><a href=\"javascript:NewCal('Date1','ddmmmyyyy')\"><img src=\"cal.gif\" alt=\"Pick a date\" width=\"20\" height=\"20\" border=\"0\"></a></td></tr>

        <table align=\"center\" border=0 cellspacing=1 cellpadding=0><tr><br><td colspan=\"6\">
        <u><b>SECTION D-DECLARATION</b></u><br>I believe that the above information is accurate. <i>I confirm that details of this appeal can be passed on to the Principal, Director, Trustees and other staff concerned.</i></td></tr>
        <td>PLEASE LIST ANY DOCUMENTARY EVIDENCE YOU HAVE ATTACHED.<br>(eg. any correspondence or other documentation related to your appeal)</br></td>
        <td><textarea name=\"correspondence\" id=\"correspondence\" rows=\"4\"></textarea></td>
        <td><input class=\"input\" type=\"file\" name=\"document\" id=\"document\"></td></tr>
        <table align=\"center\" cellspacing=1 cellpadding=0><tr><td><input type=\"submit\" id=\"submitButton\" name=\"submitButton\" value=\"Submit\"></td></tr></table>
        </table></form>\n";
?>
<?php
     if(isset($_POST['submitButton']))
     {
        $groundsappeal=$_POST['groundsappeal'];
        $yourcase=$_POST['yourcase'];
        $additionalsheet=$_POST['additionalsheet'];
        $name=$_POST['name'];
        $department=$_POST['department'];
        $correspondence=$_POST['correspondence'];
        $document=$_FILES['document']['name'];
        if ($_FILES['document']['name'] != ""){ if(!(is_dir("upload"))) mkdir("upload");
        copy($_FILES['document']['tmp_name'],"upload/".$_FILES['document']['name']);   }
        $Date1=$_POST['Date1'];
        $Dat1=date('Y-m-d',strtotime($Date1));
        $sysdate=date('d-M-Y');
        $sdate=date('Y-m-d',strtotime($sysdate));
        $con=mysql_connect("192.168.15.24","root","admin");
        $db=mysql_select_db("heos",$con);

        $queryappeals=mysql_query("insert into appealsform values('0','$studentidno','$groundsappeal','$yourcase','$additionalsheet','$name','$department','$Dat1','$sdate','$correspondence','','','','')",$con);

     }

?>


</body>

</html>
