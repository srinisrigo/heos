<html>
<head>
<title></title>
<script type="text/javascript" src="datetimepicker.js"></script>
<link href="./Images/heoscss.css" rel="stylesheet"></head>
</head>
<body>
<?php
        print "<form action=\"studentcomplaintform.php\" method=\"post\" name=\"studentcomplaintform\">
        <table align=\"center\" border=0 class=\"label\" cellspacing=1 cellpadding=0><tr><td align=\"center\" colspan=\"6\"><b>STUDENT COMPLAINT FORM</b></td></tr>";
        $con=mysql_connect("192.168.15.24","root","admin");
        $db=mysql_select_db("heos",$con);
        $rs1=mysql_query("select studentregistration.studentidno,studentregistration.studentfirstname,studentregistration.studentsurname,studentinformationname.corraddress,studentinformationname.corrphoneno,studentinformationname.corrmobileno from studentregistration,studentinformationname where studentinformationname.studentidno = studentregistration.studentidno;",$con);
        while($res1=mysql_fetch_array($rs1))
        {
                $studentidno=$res1["studentidno"];  $studentfirstname=$res1["studentfirstname"];
                $studentsurname=$res1["studentsurname"];  $ukcorraddress=$res1["corraddress"];
                $corrphoneno=$res1["corrphoneno"];   $corrmobileno=$res1["corrmobileno"];
                $studentname=$studentfirstname.$studentsurname;
        }
        print "
        <tr><td>Student Name :</td><td>$studentname</td>
        <td>Address :</td><td>$ukcorraddress</td></tr>
        <tr><td>Telephone Number :</td><td>$corrphoneno</td>
        <td>Mobile Number :</td><td>$corrmobileno</td></tr>
        <tr><td>Details of Complaint :</td><td><textarea name=\"detailsofcomplaint\" id=\"detailsofcomplaint\" rows=\"4\"></textarea></td>
        <td align=\"center\"><input type=\"checkbox\" name=\"anonymous\" id=\"anonymous\" value=\"ON\">Anonymous</td>
        <td align=\"center\"><input type=\"submit\" id=\"submitButton\" name=\"submitButton\" value=\"Submit\"></td></tr>
        </table></form>\n";
?>
                            
<?php
        if(isset($_POST['submitButton']))
        {
                $studentidno;
                $detailsofcomplaint=$_POST['detailsofcomplaint'];
                if(!empty($_POST['anonymous'])) $anonymous=$_POST['anonymous']; else $anonymous=0;
                $sysdate=date('d-M-Y');
                $Dat1=date('Y-m-d',strtotime($sysdate));
                $con=mysql_connect("192.168.15.24","root","admin");
                $db=mysql_select_db("heos",$con);

              if($anonymous!=checked)
                {
                   // echo "HI";
                   $queryinsert=mysql_query("insert into studentcomplaintform values('0','$studentidno','$detailsofcomplaint','$Dat1','','','','','','','0')",$con);
                }
                else
                {
                 // echo "Bye";
                  $queryinsert1=mysql_query("insert into studentcomplaintform values('0','_','$detailsofcomplaint','$Dat1','','','','','','','0')",$con);
                }

        }

?>

</body>

</html>
