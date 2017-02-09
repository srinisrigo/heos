<?php session_start(); require_once(dirname(__FILE__) . '/xajax.inc.php');  ?>
<html>
<head>
<title></title>
<script type="text/javascript" src="datetimepicker.js"></script>
<link href="./Images/heoscss.css" rel="stylesheet"></head>
</head>
<body>
<?php
        print "<form action=\"lecturerfeedbackform.php\" method=\"post\" name=\"lecturerfeedbackform\" enctype=\"multipart/form-data\">
        <table align =\"center\" border=0  cellspacing=1 cellpadding=0><tr><td align=\"center\" colspan=\"6\"><b>LECTURER FEED BACK FORM</b></td></tr>";
        $con=mysql_connect("192.168.15.24","root","admin");
        $db=mysql_select_db("heos",$con);
        $rs1=mysql_query("select studentidno from studentregistration;",$con);
        while($res1=mysql_fetch_array($rs1))
        {
                $studentidno=$res1["studentidno"];
        }
        print"<tr><td>Student IdNo :</td><td>$studentidno</td>
        <td>Student Name :</td><td><input type=\"text\" name=\"studentname\" id=\"studentname\">(Optional)</td></tr>
        <tr><td>Course :</td><td><input type=\"text\" name=\"course\" id=\"course\"></td>
        <td>Lecturer Name :</td><td><input type=\"text\" name=\"lecturername\" id=\"lecturername\"></td></tr>
        <tr><td>Subject :</td><td><input type=\"text\" name=\"subject\" id=\"subject\"></td>
        <td>Email :</td><td><input type=\"text\" name=\"email\" id=\"email\">(Optional)</td></tr>";
        $con=mysql_connect("192.168.15.24","root","admin");
        $db=mysql_select_db("heos",$con);
        $select=mysql_query("select feedbackname from lecturerfeedback",$con);
        $var=1;
        $no=0;
        print "<table align=\"center\"  border=0  cellspacing=1 cellpadding=0><tr><br><td>S.No.</td><td>(Tick as appropiate)</td><td>Excellent</td><td>Good</td><td>Fair</td><td>Poor</td></tr>";

        while($res=mysql_fetch_array($select))
        {
          $feedbackname=$res[0];
          print"<tr><td>$var</td><td>$feedbackname</td><input type=\"hidden\" value=\"$feedbackname\" name=\"feedbackname[]\"><td><input type=\"radio\" name=\"radio1[$no]\" value=\"Excellent\"></td><td><input type=\"radio\" name=\"radio1[$no]\" value=\"Good\"></td><td><input type=\"radio\" name=\"radio1[$no]\" value=\"Fair\"></td><td><input type=\"radio\" name=\"radio1[$no]\" value=\"Poor\"></td></tr>";
          $var=$var+1;
          $no=$no+1;
        }
        print"<table align=\"center\" border=0 cellspacing=1 cellpadding=0><tr><br><td><input type=\"submit\" id=\"submitButton\" name=\"submitButton\" value=\"Submit\"></td></tr>
        </table></form>\n";
?>

<?php
        if(isset($_POST['submitButton']))
        {
                if(!empty($_POST['studentname']))
                $studentname=$_POST['studentname']; else $studentname=0;
                $feed=array(); $feed=$_POST["feedbackname"];
                $course=$_POST['course'];
                $lecturername=$_POST['lecturername'];
                $subject=$_POST['subject'];
                $email=$_POST['email'];
                if(!empty($_POST['radio1'])) $radio1=$_POST['radio1']; else $radio1=0;
                $ex1=mysql_query("select count(*) from lecturerfeedback",$con);
                $count=mysql_result($ex1,0);
                $sysdate=date('d-M-Y');
                $Dat1=date('Y-m-d',strtotime($sysdate));
                $con=mysql_connect("192.168.15.24","root","admin");
                $db=mysql_select_db("heos",$con);
                for($i=0;$i<$count;$i++)
                 {
                    $queryinsert=mysql_query("insert into lecturerfeedbackform values('0','$studentidno','$studentname','$course','$lecturername','$subject','$email','$feed[$i]','$radio1[$i]','$Dat1','','','')",$con);

                 }
        }
?>

</body>
</html>
