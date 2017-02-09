<?php session_start(); require_once(dirname(__FILE__) . '/xajax.inc.php');  ?>

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
        print "<form action=\"appealsadmin.php\" method=\"post\" name=\"appealsadmin\" enctype=\"multipart/form-data\">
        <table align=\"center\" border=0 cellspacing=1 cellpadding=0><tr><td align=\"center\" colspan=\"6\"><b>APPEALS FORM</b></td></tr>";
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
        <tr><td>Post Code :</td><td>$postcode</td><td>Course :</td><td>$course</td><td>Intake :</td><td>$intake</td></tr>";

        $select=mysql_query("select groundsofappeals,yourcase,additionalsheet,name,department,datediscuss from appealsform",$con);
        while($res=mysql_fetch_array($select))
        {
           $groundsofappeals=$res["groundsofappeals"];
           $yourcase=$res["yourcase"];
           $additionalsheet=$res["additionalsheet"];
           $name=$res["name"];
           $department=$res["department"];
           $datediscuss=$res["datediscuss"];
           $datediscuss=date('d-M-Y',strtotime($datediscuss));
        }

        print"<table align=\"center\" border=0 cellspacing=1 cellpadding=0><tr><br><td colspan=\"6\">
        <u><b>SECTION B-STATEMENT OF APPEAL</b></u></tr>
        <tr><td>Grounds of Appleal :</td><td>$groundsofappeals</td><td>Your Case :</td><td>$yourcase</td><td>Additional Sheet</td><td>$additionalsheet</td></tr></table>

        <table align=\"center\" border=0 cellspacing=1 cellpadding=0><tr><br><td colspan=\"6\">
        <u><b>SECTION C-AN OUTLINE OF ANY ACTION YOU HAVE TAKEN SO FAR</b></u><br></td></tr>
        <tr><td>Name :</td><td>$name</td><td>Department :</td><td>$department</td>
        <td>Date Discussed :</td><td>$datediscuss</td></tr>";
        $sysdate=date('d-M-Y'); print "<tr><td>Received Date :</td><td><input type=\"text\" name=\"Date1\" id=\"Date1\" value=\"$sysdate\" size=\"13\"><a href=\"javascript:NewCal('Date1','ddmmmyyyy')\"><img src=\"cal.gif\" alt=\"Pick a date\" width=\"20\" height=\"20\" border=\"0\"></a></td>
        <td>Acknowledgement</td><td><textarea name=\"acknowledgement\" id=\"acknowledgement\" rows=\"3\"></textarea></td>";
        $sysdate=date('d-M-Y'); print "<td>Acknowledgement Date :</td><td><input type=\"text\" name=\"Date2\" id=\"Date2\" value=\"$sysdate\" size=\"13\"><a href=\"javascript:NewCal('Date2','ddmmmyyyy')\"><img src=\"cal.gif\" alt=\"Pick a date\" width=\"20\" height=\"20\" border=\"0\"></a></td></tr>
        <table align=\"center\" cellspacing=1 cellpadding=0><tr><td><input type=\"submit\" id=\"submitButton\" name=\"submitButton\" value=\"Submit\"></td>
        <td><A href=\"javascript: closepopup()\">Close Window</A></td></tr>
        </table></form>\n";
?>
<?php
     if(isset($_POST['submitButton']))
     {
      $Date1=$_POST['Date1'];
      $received=date('Y-m-d',strtotime($Date1));
      $acknowledgement=$_POST['acknowledgement'];
      $Date2=$_POST['Date2'];                           //echo $Date1.$acknowledgement;
      $ackdate=date('Y-m-d',strtotime($Date2));

      $queryappeals=mysql_query("update appealsform set Recieveddate='$received',ack='$acknowledgement',ackdate='$ackdate',STATUS='1'",$con);
      echo "<script text/javascript>window.close();</script>";

     }

?>


</body>

</html>
