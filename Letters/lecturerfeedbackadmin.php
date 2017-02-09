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
        print "<form action=\"lecturerfeedbackadmin.php\" method=\"post\" name=\"lecturerfeedbackadmin\" enctype=\"multipart/form-data\">
        <table align =\"center\" border=0  cellspacing=1 cellpadding=0><tr><td align=\"center\" colspan=\"6\"><b>Lecturer Feed Back Form</b></td></tr>";
        $con=mysql_connect("192.168.15.24","root","admin");
        $db=mysql_select_db("heos",$con);
        $rs1=mysql_query("select studentidno,studentname,course,lecturername,subject,email,grade from lecturerfeedbackform;",$con);
        while($res1=mysql_fetch_array($rs1))
        {
                $studentidno=$res1["studentidno"];
                $studentname=$res1["studentname"];
                $course=$res1["course"];
                $lecturername=$res1["lecturername"];
                $subject=$res1["subject"];
                $email=$res1["email"];
                $grade=$res1["grade"];
        }
        print"<tr><td>Student IdNo :</td><td>$studentidno</td>
        <td>Student Name :</td><td>$studentname</td></tr><tr><td>Course :</td><td>$course</td>
        <td>Lecturer Name :</td><td>$lecturername</td></tr><tr><td>Subject :</td><td>$subject</td>
        <td>Email :</td><td>$email</td></tr>";           
        $con=mysql_connect("192.168.15.24","root","admin");
        $db=mysql_select_db("heos",$con);
        $select=mysql_query("select feed,grade from lecturerfeedbackform where studentidno='$studentidno'",$con);
        $var=1;
        $no=0;
        print "<table align=\"center\"  border=0  cellspacing=1 cellpadding=0><tr><br><td>S.No.</td><td>(Tick as appropiate)</td><td>Excellent</td><td>Good</td><td>Fair</td><td>Poor</td></tr>";
        while($res=mysql_fetch_array($select))
        {
          $feedbackname=$res[0];  $grade=$res[1];
          print "<tr><td>$var</td><td>$feedbackname<input type=\"hidden\" value=\"$feedbackname\" name=\"feedbackname[]\"></td>";
          if($grade=='Excellent') print "<td><input type=\"radio\" name=\"radio1[$no]\" value=\"Excellent\" checked></td>"; else print "<td><input type=\"radio\" name=\"radio1[$no]\" value=\"Excellent\"></td>";
          if($grade=='Good') print "<td><input type=\"radio\" name=\"radio1[$no]\" value=\"Good\" checked></td>"; else print "<td><input type=\"radio\" name=\"radio1[$no]\" value=\"Good\"></td>";
          if($grade=='Fair') print "<td><input type=\"radio\" name=\"radio1[$no]\" value=\"Fair\" checked></td>"; else print "<td><input type=\"radio\" name=\"radio1[$no]\" value=\"Fair\"></td>";
          if($grade=='Poor') print "<td><input type=\"radio\" name=\"radio1[$no]\" value=\"Poor\" checked></td></tr>"; else print "<td><input type=\"radio\" name=\"radio1[$no]\" value=\"Poor\"></td></tr>";
          $var=$var+1;
          $no=$no+1;
        }
        print"<table align=\"center\" border=0 cellspacing=1 cellpadding=0><tr><br><td>General Comments :</td><td><textarea name=\"general\" id=\"general\" rows=\"4\"></textarea></td>";
        $sysdate=date('d-M-Y'); print "<td>Date :</td><td><input type=\"text\" name=\"Date1\" id=\"Date1\" value=\"$sysdate\" size=\"13\"><a href=\"javascript:NewCal('Date1','ddmmmyyyy')\"><img src=\"cal.gif\" alt=\"Pick a date\" width=\"20\" height=\"20\" border=\"0\"></a></td>
        <td><input type=\"submit\" id=\"submitButton\" name=\"submitButton\" value=\"Submit\"></td><td><A href=\"javascript: closepopup()\">Close Window</A></td></tr></table></form>\n";
?>

<?php
        if(isset($_POST['submitButton']))
        {
                $general=$_POST['general'];
                $Date1=$_POST['Date1'];
                $Dat1=date('Y-m-d',strtotime($Date1));
                $con=mysql_connect("192.168.15.24","root","admin");
                $db=mysql_select_db("heos",$con);

                $queryinsert=mysql_query("update lecturerfeedbackform set generalcomments='$general',checkeddate='$Dat1',STATUS='1'",$con);
                echo "<script text/javascript>window.close();</script>";
        }
?>

</body>
</html>
