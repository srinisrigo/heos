<html>
<head>  <title></title>
  <script type="text/javascript" src="datetimepicker.js"></script>
  <link href="./Images/heoscss.css" rel="stylesheet">
  <script language="javascript">
      function rowAdd()
      {
        tobj=document.getElementById('issue'); crobj=tobj.rows;
        var row=crobj.length; robj=tobj.insertRow(row);
        c1=robj.insertCell(0); c2=robj.insertCell(1); c3=robj.insertCell(2); c4=robj.insertCell(3);
        c5=robj.insertCell(4);  arindex=crobj.length-2;
        c1.innerHTML=crobj.length-2;
        c2.innerHTML="<input type=\"text\" name=\"activity["+arindex+"]\" id=\"activity["+arindex+"]\">";
        c3.innerHTML="<input type=\"text\" name=\"responsibility["+arindex+"]\" id=\"responsibility["+arindex+"]\">";
        c4.innerHTML="<input type=\"text\" name=\"resources["+arindex+"]\" id=\"resources["+arindex+"]\" value=\"\">";
        c5.innerHTML="<input type=\"text\" name=\"targetdate["+arindex+"]\" id=\"targetdate["+arindex+"]\" value=\"\" size=13><a href=\"javascript:NewCal('targetdate["+arindex+"]','ddmmmyyyy')\"><img src=\"cal.gif\" alt=\"Pick a date\" width=\"20\" height=\"20\" border=\"0\"></a>";
      }
      function deleteRow()
      {
        dtobj=document.getElementById('issue').rows; drow=dtobj.length-1;
        if(dtobj.length > 3) document.getElementById('issue').deleteRow(drow); }
        function indexAlert(obj) { alert(obj.name);
      }
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
        print "<form action=\"staffappraisaladmin.php\" method=\"post\" name=\"staffappraisaladmin\" enctype=\"multipart/form-data\">
        <table align=\"center\" border=0 cellspacing=1 cellpadding=0><tr><td align=\"center\" colspan=\"6\"><b>STAFF APPRAISAL FORM</b></td></tr>";
        $con=mysql_connect("192.168.15.24","root","admin");
        $db=mysql_select_db("heos",$con);
        $rs1=mysql_query("select nameofappraise,posttitle,dateofappointment,nameofappraiser,place,dateofappraisal,time,activities,helped,achievement,suggest,outline,otherissues,dateofapplication from staffappraisal;",$con);
        while($res1=mysql_fetch_array($rs1))
        {
                $nameofappraise=$res1["nameofappraise"];
                $posttitle=$res1["posttitle"];
                $dateofappointment=$res1["dateofappointment"];
                $nameofappraiser=$res1["nameofappraiser"];
                $place=$res1["place"];
                $dateofappraisal=$res1["dateofappraisal"];
                $time=$res1["time"];
                $activities=$res1["activities"];
                $helped=$res1["helped"];
                $achievement=$res1["achievement"];
                $suggest=$res1["suggest"];
                $outline=$res1["outline"];
                $otherissues=$res1["otherissues"];
                $dateofapplication=$res1["dateofapplication"];
        }
        print"<table align=\"center\" border=0 cellspacing=1 cellpadding=0>
        <tr><br><td>Name of Appraisal :</td><td>$nameofappraise</td><td>Post Title/Grade :</td><td>$posttitle</td>
        <td>Date of Appointment :</td><td>$dateofappointment</td></tr>
        <tr><td>Name of Appraiser :</td><td>$nameofappraiser</td><td>Place :</td><td>$place</td><td>Date of Appraisal :</td><td>$dateofappraisal</td></tr>
        <tr><td>Time :</td><td>$time</td><td>Date of Application :</td><td>$dateofapplication</td></tr>

        <table align=\"center\" border=0 cellspacing=1 cellpadding=0><tr><br><td colspan=\"6\"><b>Assessment of key achievements for the previous year(if any)</b></td></tr>
        <tr><td>1) List of significant activities, tasks and objectives set by yourself and others over the last year and comment on the achievement of each.</td><tr></tr><td>$activities</td></tr>
        <tr><td>2) What has helped/hindered you in your work over the last year?</td><tr></tr><td>$helped</td></tr>
        <tr><td>3) What have you done in the last year which has given you most satisfaction/sense of achievement?</td><tr></tr><td>$achievement</td></tr>
        <tr><td colspan=\"6\"><b>Key objectives for the coming Year</b></td></tr>
        <tr><td>4) Can you suggest ways that would make your job more effective and satisfying, including training and development?</td><tr></tr><td>$suggest</td></tr>
        <tr><td>5) Outline your objectives for next year and success criteria, in relation to all aspects of your work.</td><tr></tr><td>$outline</td></tr>
        <tr><td>6) Note other issues that you wish to discuss in the appraisal.</td><tr></tr><td>$otherissues</td></tr></table>

        <table align=\"center\" border=0 cellspacing=1 cellpadding=0><tr><br><td colspan=\"6\"><b>Appraiser's Comments</b><br><i>(To be completed by the appraisal meeting)</i></td></tr>
        <tr><td>1) Appraiser to comment on the appraisee's achievements and activities over the past year.(If any)</td><tr></tr><td><textarea name=\"appraisercomment\" id=\"appraisercomment\" rows=\"2\" cols=\"126\"></textarea></td></tr>
        <tr><td>2) Appraser to list agreed key tasks, objectives, and action points for the coming year.<br><i>This section to be completed to the satisfaction of the appraisee and the appraiser.</i></td><tr></tr><td><textarea name=\"appraiserlist\" id=\"appraiserlist\" rows=\"2\" cols=\"126\"></textarea></td></tr>
        <tr><td>3) Additional comments by either party.<br><i>if as appraiser or appraisee, you wish to make further comments or record any points of dissent in respect of the above, please comment below.</i></td><tr></tr><td><textarea name=\"additionalcomments\" id=\"additionalcomments\" rows=\"2\" cols=\"126\"></textarea></td></tr>
        <tr><td colspan=\"6\"><b>Action Plan</b><br><i>(To be completed by the appraiser)</i></td></tr><tr></tr><td><textarea name=\"actionplan\" id=\"actionplan\" rows=\"2\" cols=\"126\"></textarea></td></tr>";

         $no=0;  $var=1; print "<table align=\"center\" border=0 cellspacing=1 cellpadding=0 id=\"issue\" name=\"issue\"><tr><br><td colspan=\"6\"><b>List the type of training or other activity</b></td></tr>
        <tr><td>S.No.</td><td>Activity</td><td>Providers/Responsibility</td><td>Cost/Resources</td><td>Target Date</td></tr>
        <tr><td>$var</td><td><input type=\"text\" name=\"activity[$no]\" id=\"activity[$no]\"></td>
        <td><input type=\"text\" name=\"responsibility[$no]\" id=\"responsibility[$no]\"></td>
        <td><input type=\"text\" name=\"resources[$no]\" id=\"resources[$no]\"></td>
        <td><input type=\"text\" name=\"targetdate[$no]\" id=\"targetdate[$no]\" value=\"\" size=13><a href=\"javascript:NewCal('targetdate[$no]','ddmmmyyyy')\"><img src=\"cal.gif\" alt=\"Pick a date\" width=\"20\" height=\"20\" border=\"0\"></a></td><td><input type=\"button\" value=\"add\" onClick=\"rowAdd();\"></td><td><input type=\"button\" value=\"delete\" onClick=\"deleteRow();\"></td></tr>

        <table align=\"center\" border=0 cellspacing=1 cellpadding=0><tr><br>"; $sysdate=date('d-M-Y'); print "<td>Date :</td><td><input type=\"text\" name=\"Date1\" id=\"Date1\" value=\"$sysdate\" size=13><a href=\"javascript:NewCal('Date1','ddmmmyyyy')\"><img src=\"cal.gif\" alt=\"Pick a date\" width=\"20\" height=\"20\" border=\"0\"></a></td>
        <td><input type=\"submit\" id=\"submitButton\" name=\"submitButton\" value=\"Submit\"></td>
        <td><A href=\"javascript: closepopup()\">Close Window</A></td></tr></table></form>\n";
?>
<?php
        if(isset($_POST['submitButton']))
        {
                $nameofappraise;
                $appraisercomment=$_POST['appraisercomment'];
                $appraiserlist=$_POST['appraiserlist'];
                $additionalcomments=$_POST['additionalcomments'];
                $actionplan=$_POST['actionplan'];
                $Date1=$_POST['Date1'];
                $Dat1=date('Y-m-d',strtotime($Date1));
                $activity=$_POST['activity'];
                $responsibility=$_POST['responsibility'];
                $resources=$_POST['resources'];
                $targetdate1=$_POST['targetdate'];
                $con=mysql_connect("192.168.15.24","root","admin");
                $db=mysql_select_db("heos",$con);

                $updatestaffappraisal=mysql_query("update staffappraisal set appraisercomment='$appraisercomment',appraiserlist='$appraiserlist',additionalcomments='$additionalcomments',actionplan='$actionplan',checkeddate='$Dat1',STATUS='1'",$con);
                echo "<script text/javascript>window.close();</script>";
               foreach($activity as $key=>$value)
                {
                        $targetdate=date('Y-m-d',strtotime($targetdate1[$key]));
                        $insertraining=mysql_query("insert into trianing values('0','$nameofappraise','$activity[$key]','$responsibility[$key]','$resources[$key]','$targetdate')",$con);
                }    
     }
?>

</body>

</html>
