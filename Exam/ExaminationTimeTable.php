<?php
session_start();
include "MasterAjax.php";
?>

<html><head><title>Exam Time Table</title>
<?php
$xajax->printJavascript();
?>
<script language="javascript" type="text/javascript" src="./Images/MasterScript.js"></script>
<script language="javascript" type="text/javascript" src="./Images/datetimepicker.js"></script>
<link href="./Images/heoscss.css" rel="stylesheet" type="text/css">

<?php
        $con=mysql_connect("192.168.15.24","root","admin");
        $db=mysql_select_db("heos",$con);

        print "<form action=\"ExaminationtimeTable.php\" method=\"post\" name=\"ExaminationtimeTable\">
        <div id=\"MainOnload\" align=center><table align=center border=0 cellspacing=1 cellpadding=0>
        <tr class=\"headerrow\"><td align=\"center\" colspan=\"6\">Examination Time Table</tr>
        <tr class=\"label\"><td>Intake</td><td><select name=\"Intake\" id=\"Intake\"><option value=\"None\">--Select--</option>";
        $sql=("SELECT distinct(Intake) FROM cohortdetails");
        $rs=mysql_query($sql,$con);
        while($res=mysql_fetch_array($rs))
        {
        $Intake=$res["Intake"];
        echo"<option value=\"$Intake\">$Intake</option>";
        }
        print "</select>&nbsp;&nbsp;&nbsp;&nbsp;<a href=\"CohortDetails.php\">New</a></td>

        <td>Level of Course</td><td>
        <select name=\"Levelofcourse\" id=\"Levelofcourse\" onChange=\"return xajax_getCourse(this.value);\">
        <option value=\"None\">--Select--</option>
        <option value=\"Level1\">Level 1</option>
        <option value=\"Level2\">Level 2</option>
        <option value=\"Level3\">Level 3</option>
        <option value=\"Level4\">Level 4</option>
        <option value=\"Level5\">Level 5</option>
        </select>
        </td>

        <td>Course</td>
        <td><select name=\"ccode\" id=\"ccode\" class=\"citizen\" onChange=\"return xajax_getSection(this.value,document.getElementById('Levelofcourse').value,document.getElementById('Intake').value);\">
        <option value=\"None\">--Select--</option></select>&nbsp;&nbsp;&nbsp;&nbsp;<a href=\"CourseDetails.php\">New</a></td>
        <tr class=\"label\">
        <td>Section</td><td>
        <select name=\"section\" id=\"section\"><option value=\"None\">--Select--</option></select></td>

        <td>Term Number</td><td>
        <select name=\"TermNo\" id=\"TermNo\"><option value=\"None\">--Select--</option></select>
        </td>

        <td>Name of the Exam</td<b></b><td>
        <select name=\"NameOfTheExam\" id=\"NameOfTheExam\">
        <option value=\"None\">--Select--</option>";

        $queryselectExmName="select distinct ExamName from examnames";
        $queryselectExmNameexec=mysql_query($queryselectExmName,$con);
        while($Fetch=mysql_fetch_array($queryselectExmNameexec))
        {
        $ExamName=$Fetch["ExamName"]; $ExamNameid=$Fetch["ExamNameId"];
        echo"<option value=\"$ExamNameid\">$ExamName</option>";
        }
        echo"</select>&nbsp;&nbsp;&nbsp;&nbsp;<a href=\"ExamTTSlot.php\">New</a></td></tr>
        <tr><td colspan=6 align=center><input type=\"button\"  value=\"Create\" class=\"buttonstatic\" onmouseover=\"changeimage(this,'buttonover');\" onmouseout=\"changeimage(this,'buttonstatic');\" onClick=\"return xajax_ShowTable(document.getElementById('Intake').value,document.getElementById('Levelofcourse').value,document.getElementById('ccode').value,document.getElementById('section').value,document.getElementById('TermNo').value,document.getElementById('NameOfTheExam').value);\">
        &nbsp;&nbsp;&nbsp;<input type=\"submit\" value=\"Delete\" name=\"deleteButton\" id=\"deleteButton\" class=\"buttonstatic\" onmouseover=\"changeimage(this,'buttonover');\" onmouseout=\"changeimage(this,'buttonstatic');\" onClick=\"return ExamTimeTable_validation();\">
        </td></tr></table></div>
        <br><div id=\"AssignSubject\"></div><br><div id=\"Fillpage\"></div>";
        mysql_close($con); //return ExamTimeTable_validation();
?>
<?php

        if(isset($_POST['deleteButton']))
        {
        $Intake=$_POST['Intake'];
        $ccode=$_POST['ccode'];
        $Levelofcourse=$_POST['Levelofcourse'];
        $section=$_POST['section'];
        $TermNo=$_POST['TermNo'];
        $NameOfTheExam=$_POST['NameOfTheExam'];
        $Deletetablename = $Intake.'_'.$Levelofcourse.'_'.$ccode.'_'.$section.'_'.$TermNo.'_'.$NameOfTheExam;
        $_SESSION['Deletetablename']=$Deletetablename;

        echo "<script langauge=\"javascript\">var result=confirm('Are You Sure Want to Delete');
        if(result){ val='delete';self.location='ExaminationTimeTable.php?cat=' + val;}else{val='dontdelete';
        self.location='ExaminationTimeTable.php?cat=' + val; }</script>";
        }

        @$cat=$_GET['cat'];

        if(isset($cat) and strlen($cat) == 6)
        {
        $Deletetablename=$_SESSION['Deletetablename'];
        $con=mysql_connect("192.168.15.24","root","admin");
        $db=mysql_select_db("heos",$con);

        $result = mysql_list_tables("heos",$con); $TableExhist="false";
        while ($r=mysql_fetch_array($result))
        {
        $dbtablenames=strtoupper($r[0]);
        $Deletetablename=strtoupper($Deletetablename);

        if($Deletetablename==$dbtablenames) $TableExhist="true";
        }

        if($TableExhist=="true")
        {
        $Droptable = "DROP TABLE $Deletetablename;";
        $execcreatetable  = mysql_query($Droptable,$con);
        echo "<script type=\"text/javascript\">alert(\"Successfully Deleted\")</script>";
        }

        if($TableExhist=="false")
        {
        echo "<script type=\"text/javascript\">alert(\"Time Table Not Available\")</script>";
        }
        }
        else if(isset($cat) and strlen($cat) == 10)
        {

        }

        ?>




        </body>
        </html>

