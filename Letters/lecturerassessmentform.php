<html>
<head>
<title></title>
<script type="text/javascript" src="datetimepicker.js"></script>
<link href="./Images/heoscss.css" rel="stylesheet">
</head>
<body>
<?php
        print "<form action=\"lecturerassessmentform.php\" method=\"post\" name=\"lecturerassessmentform\">
        <table align=\"center\" border=0 cellspacing=1 cellpadding=0><tr><td align=\"center\" colspan=\"6\"><b>Lecturer Presentation/Assessment Form</b></td></tr>
        <tr><td>Lecturer Name :</td><td><input type=\"text\" name=\"lecturername\" id=\"lecturername\"></td>
        <td>Subject :</td><td><input type=\"text\" name=\"subject\" id=\"subject\"></td></tr>
        <tr><td>Level :</td><td><input type=\"text\" name=\"level\" id=\"level\"></td></tr>

        <table align=\"center\" border=0 cellspacing=1 cellpadding=0><tr><br><td colspan=\"6\"><b><u><i>To be marked by assessor only</i></u></b></td></tr>";
        $con=mysql_connect("192.168.15.24","root","admin");
        $db=mysql_select_db("heos",$con);
        $select=mysql_query("select assessmentname from lecturerassessment",$con);
        $var=1; $no=0;
        print "<tr><td>S.No.</td><td>Details</td><td>Marks out of 10</td></tr>";
        while($res=mysql_fetch_array($select))
        {
          $details=$res[0];
          print"<tr><td>$var</td><td>$details</td><input type=\"hidden\" value=\"$details\" name=\"details[]\"><td><input type=\"text\" name=\"marks[$no]\" value=\"\" size=12></td></tr>";
          $var=$var+1;  $no=$no+1;
        }
        print"<table align=\"center\" border=0 cellspacing=1 cellpadding=0><tr><br><td>Other Comments :</td><td><textarea name=\"other\" id=\"other\" rows=\"4\"></textarea></td>
        <td>Assessed By :</td><td><input type=\"text\" name=\"assessed\" id=\"assessed\"></td></tr>
        <table align=\"center\" cellspacing=1 cellpadding=0><tr><br><td><input type=\"submit\" id=\"submitButton\" name=\"submitButton\" value=\"Submit\"></td></tr></table>
        </table></form>\n";
?>

<?php
        if(isset($_POST['submitButton']))
        {
                $lecturername=$_POST['lecturername'];
                $subject=$_POST['subject'];
                $level=$_POST['level'];
                $details=array();  $details=$_POST['details'];
                $marks=$_POST['marks'];
                $other=$_POST['other'];
                $assessed=$_POST['assessed'];
                $ex1=mysql_query("select count(*) from lecturerassessment",$con);
                $count=mysql_result($ex1,0);
                $sysdate=date('d-M-Y');
                $Dat1=date('Y-m-d',strtotime($sysdate));
                $con=mysql_connect("192.168.15.24","root","admin");
                $db=mysql_select_db("heos",$con);
                for($i=0;$i<$count;$i++)
                 {
                     $queryinsert=mysql_query("insert into lecturerassessmentform values('0','$lecturername','$subject','$level','$details[$i]','$marks[$i]','$other','$assessed','$Dat1','','','')",$con);
                 }
        }
?>

</body>
</html>
