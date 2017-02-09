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
        print "<form action=\"studentcomplaint.php\" method=\"post\" name=\"studentcomplaint\">
        <table align=\"center\" border=0 class=\"label\" cellspacing=1 cellpadding=0><tr><td align=\"center\" colspan=\"6\"><b>STUDENT COMPLAINT FORM</b></td></tr>";
        $con=mysql_connect("192.168.15.24","root","admin");
        $db=mysql_select_db("heos",$con);
        $rs1=mysql_query("select complaintno,detailsofcomplaint from studentcomplaintform",$con);
        while($res1=mysql_fetch_array($rs1))
        {
                $complaintno=$res1["complaintno"];
                $detailsofcomplaint=$res1["detailsofcomplaint"];
        }
        print "
        <tr><td>Complaint No :</td><td>$complaintno</td><td>Address :</td><td></td></tr>
        <tr><td>Telephone Number :</td><td></td><td>Mobile Number :</td><td></td></tr>
        <tr><td>Details of Complaint :</td><td>$detailsofcomplaint</td><td>Complaint Taken By :</td><td><input type=\"text\" name=\"complainttakenby\" id=\"complainttakenby\"></td></tr>
        <tr><td>Complaint Assessment :</td><td><textarea name=\"complaintassessment\" id=\"complaintassessment\" rows=\"4\"></textarea></td>
        <td>Corrective Measures Taken :</td><td><textarea name=\"correctivemeasuretaken\" id=\"correctivemeasuretaken\" rows=\"4\"></textarea></td></tr>
        <tr>"; $sysdate1=date('d-M-Y'); print "<td>Date :</td><td><input type=\"text\" name=\"Date1\" id=\"Date1\" value=\"$sysdate1\"><a href=\"javascript:NewCal('Date1','ddmmmyyyy')\"><img src=\"cal.gif\" alt=\"Pick a date\" width=\"20\" height=\"20\" border=\"0\"></a></td>
        <table align=\"center\" border=0 class=\"label\" cellspacing=1 cellpadding=0><tr><td>Student Informed of final outcome :</td><td>Yes<input type=\"radio\" name=\"radio1\" value=\"Yes\"></td><td>No<input type=\"radio\" name=\"radio1\" value=\"No\"></td>
        <br></br><td>Query satisfactorily dealt with :</td><td>Yes<input type=\"radio\" name=\"radio2\" value=\"Yes\"></td><td>No<input type=\"radio\" name=\"radio2\" value=\"No\"></td></tr>
        <table align=\"center\" cellspacing=1 cellpadding=0><tr><td><input type=\"submit\" id=\"submitButton\" name=\"submitButton\" value=\"Submit\"></td>
        <td><A href=\"javascript: closepopup()\">Close Window</A></td></tr>
        </table></form>\n";
?>

<?php
        if(isset($_POST['submitButton']))
        {
                $Date1=$_POST['Date1'];
                $complainttakenby=$_POST['complainttakenby'];
                $complaintassessment=$_POST['complaintassessment'];
                $cmeasuretaken=$_POST['correctivemeasuretaken'];
                if(!empty($_POST['radio1'])) $finaloutcome=$_POST['radio1']; else $finaloutcome=0;
                if(!empty($_POST['radio2'])) $querysatisfactorly=$_POST['radio2']; else $querysatisfactorly=0;
                $Dat1=date('Y-m-d',strtotime($Date1));
                $con=mysql_connect("192.168.15.24","root","admin");
                $db=mysql_select_db("heos",$con);

                $queryinsert=mysql_query("update studentcomplaintform SET complainttakenby='$complainttakenby',complaintassessment='$complaintassessment',correctivemeasuretaken='$cmeasuretaken',checkeddate='$Dat1',finaloutcome='$finaloutcome',querysatisfactorly='$querysatisfactorly',STATUS='1' where complaintno='$complaintno'",$con);
                echo "<script text/javascript>window.close();</script>";


        }


?>

</body>

</html>
