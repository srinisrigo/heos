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
        print "<form action=\"lecturerassessmentadmin.php\" method=\"post\" name=\"lecturerassessmentadmin\">
        <table align=\"center\" border=0 cellspacing=1 cellpadding=0><tr><td align=\"center\" colspan=\"6\"><b>LECTURER PRESENTATION/ASSESSMENT FORM</b></td></tr>";
        $con=mysql_connect("192.168.15.24","root","admin");
        $db=mysql_select_db("heos",$con);
        $rs1=mysql_query("select nameoflecturer,subject,level,details,marks,othercomments,assessedby from lecturerassessmentform;",$con);
        while($res1=mysql_fetch_array($rs1))
        {
                $nameoflecturer=$res1["nameoflecturer"];
                $subject=$res1["subject"];
                $level=$res1["level"];
                $details=$res1["details"];
                $marks=$res1["marks"];
                $othercomments=$res1["othercomments"];
                $assessedby=$res1["assessedby"];
        }
        print"<tr><td>Lecturer Name :</td><td>$nameoflecturer</td><td>Subject :</td><td>$subject</td><td>Level :</td><td>$level</td></tr>
        <table align=\"center\" border=0 cellspacing=1 cellpadding=0><tr><br><td colspan=\"6\"><b><u><i>To be marked by assessor only</i></u></b></td></tr>";
        $select=mysql_query("select details,marks from lecturerassessmentform where nameoflecturer='$nameoflecturer'",$con);
        $var=1; $no=0;
        print "<tr><td>S.No.</td><td>Details</td><td>Marks out of 10</td></tr>";
        while($res=mysql_fetch_array($select))
        {
          $details=$res[0];   $marks=$res[1];
          print"<tr><td>$var</td><td>$details</td><input type=\"hidden\" value=\"$details\" name=\"details[]\">";
          if($details=$marks) print"<td><input type=\"text\" name=\"marks[$no]\" id=\"marks[$no]\" value=\"$marks\" size=12></td></tr>";
          $var=$var+1; $no=$no+1;
        }
        print"<table align=\"center\" border=0 cellspacing=1 cellpadding=0>
        <tr><br><td>Other Comments :</td><td>$othercomments</td><td>Assessed By :</td><td>$assessedby</td></tr>
        <tr><td>Comments :</td><td><input type=\"text\" name=\"comments\" id=\"comments\"></td>";
        $sysdate=date('d-M-Y'); print "<td>Date :</td><td><input type=\"text\" name=\"Date1\" id=\"Date1\" value=\"$sysdate\" size=13><a href=\"javascript:NewCal('Date1','ddmmmyyyy')\"><img src=\"cal.gif\" alt=\"Pick a date\" width=\"20\" height=\"20\" border=\"0\"></a></td></tr>
        <table align=\"center\" cellspacing=1 cellpadding=0><tr><br><td><input type=\"submit\" id=\"submitButton\" name=\"submitButton\" value=\"Submit\"></td>
        <td><A href=\"javascript: closepopup()\">Close Window</A></td></tr>
        </table></form>\n";
?>

<?php
        if(isset($_POST['submitButton']))
        {
                $Date1=$_POST['Date1'];
                $comments=$_POST['comments'];
                $Dat1=date('Y-m-d',strtotime($Date1));
                $con=mysql_connect("192.168.15.24","root","admin");
                $db=mysql_select_db("heos",$con);
                $updatelecturer=mysql_query("update lecturerassessmentform set comments='$comments',checkeddate='$Dat1',STATUS='1'",$con);
                echo "<script text/javascript>window.close();</script>";

        }
?>

</body>
</html>
