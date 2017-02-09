<html>
<head>  <title></title>
  <script type="text/javascript" src="datetimepicker.js"></script>
  <link href="./Images/heoscss.css" rel="stylesheet">
</head> 
<body>

<?php
        print "<form action=\"staffappraisalform.php\" method=\"post\" name=\"staffappraisalform\" enctype=\"multipart/form-data\">
        <table align=\"center\" border=0 cellspacing=1 cellpadding=0><tr><td align=\"center\" colspan=\"6\"><b>STAFF APPRAISAL FORM</b></td></tr>
        <table align=center cellspacing=1 cellpadding=0><tr><td><textarea rows=1 cols=100 readonly wrap=\"on\">This appraisal form is designed to faciliate a formal discussion between you and your appraiser concentrating on performance, achievement of key objectives, agreeing future key objectives, identifying future training needs and career aspirations.</textarea></td></tr></table>

        <table align=\"center\" border=0 cellspacing=1 cellpadding=0>
        <tr><br><td>Name of Appraisal :</td><td><input type=\"text\" name=\"appraisal\" id=\"appraisal\"></td><td>Post Title/Grade :</td><td><input type=\"text\" name=\"grade\" id=\"grade\"></td>
        <td>Date of Appointment :</td><td><input type=\"text\" name=\"date1\" id=\"date1\" value=\"\" size=\"13\"><a href=\"javascript:NewCal('date1','ddmmmyyyy')\"><img src=\"cal.gif\" alt=\"Pick a date\" width=\"20\" height=\"20\" border=\"0\"></a></td></tr>
        <tr><td>Name of Appraiser :</td><td><input type=\"text\" name=\"appraiser\" id=\"appraiser\"></td><td>Place :</td><td><input type=\"text\" name=\"place\" id=\"place\"></td>
        <td>Date of Appraisal :</td><td><input type=\"text\" name=\"date2\" id=\"date2\" value=\"\" size=\"13\"><a href=\"javascript:NewCal('date2','ddmmmyyyy')\"><img src=\"cal.gif\" alt=\"Pick a date\" width=\"20\" height=\"20\" border=\"0\"></a></td></tr>
        <tr><td>Time :</td><td><input type=\"text\" name=\"time1\" id=\"time1\"></td></tr>
        <tr><td colspan=\"6\"><i>Note: space on the form is limited, if you wish to expand the sections and continue onto a separate sheet, then please do so.<br>The appraisee should complete and submit parts one and two at least one week prior to the appraisal meeting.</i></td></tr></table>

        <table align=\"center\" border=0 cellspacing=1 cellpadding=0><tr><br><td colspan=\"6\"><b>Assessment of key achievements for the previous year(if any)</b><br><i>(To be completed by the appraisee)</i></td></tr>
        <tr><td>1) List of significant activities, tasks and objectives set by yourself and others over the last year and comment on the achievement of each.</td><tr></tr><td><textarea name=\"activities\" id=\"activities\" rows=\"2\" cols=\"126\"></textarea></td></tr>
        <tr><td>2) What has helped/hindered you in your work over the last year?</td><tr></tr><td><textarea name=\"helped\" id=\"helped\" rows=\"2\" cols=\"126\"></textarea></td></tr>
        <tr><td>3) What have you done in the last year which has given you most satisfaction/sense of achievement?</td><tr></tr><td><textarea name=\"achievement\" id=\"achievement\" rows=\"2\" cols=\"126\"></textarea></td></tr>
        <tr><td colspan=\"6\"><b>Key objectives for the coming Year</b><br><i>(To be completed by the appraisee)</i></td></tr>
        <tr><td>4) Can you suggest ways that would make your job more effective and satisfying, including training and development?</td><tr></tr><td><textarea name=\"suggest\" id=\"suggest\" rows=\"2\" cols=\"126\"></textarea></td></tr>
        <tr><td>5) Outline your objectives for next year and success criteria, in relation to all aspects of your work.</td><tr></tr><td><textarea name=\"outline\" id=\"outline\" rows=\"2\" cols=\"126\"></textarea></td></tr>
        <tr><td>6) Note other issues that you wish to discuss in the appraisal.</td><tr></tr><td><textarea name=\"otherissues\" id=\"otherissues\" rows=\"2\" cols=\"126\"></textarea></td></tr></table>

        <table align=\"center\" cellspacing=1 cellpadding=0><tr><br><td><input type=\"submit\" id=\"submitButton\" name=\"submitButton\" value=\"Submit\"></td></tr></table></form>\n";
?>
<?php
     if(isset($_POST['submitButton']))
     {
       $appraiseename=$_POST['appraisal'];
       $grade=$_POST['grade'];
       $appoint=$_POST['date1'];
       $appointdate=date('Y-m-d',strtotime($appoint));
       $appraisername=$_POST['appraiser'];
       $place=$_POST['place'];
       $appraisal=$_POST['date2'];
       $appraisaldate=date('Y-m-d',strtotime($appraisal));
       $time1=$_POST['time1'];
       $activities=$_POST['activities'];
       $helped=$_POST['helped'];
       $achievement=$_POST['achievement'];
       $suggest=$_POST['suggest'];
       $outline=$_POST['outline'];
       $otherissues=$_POST['otherissues'];
       $sysdate=date('d-M-Y');
       $dateofapplication=date('Y-m-d',strtotime($sysdate));
       $con=mysql_connect("192.168.15.24","root","admin");
       $db=mysql_select_db("heos",$con);

       $insertappraisal=mysql_query("insert into staffappraisal values('0','$appraiseename','$grade','$appointdate','$appraisername','$place','$appraisaldate','$time1','$activities','$helped','$achievement','$suggest','$outline','$otherissues','$dateofapplication','')",$con);
     }
?>



</body>

</html>
