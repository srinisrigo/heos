<html>
<head>
<title></title>
<script type="text/javascript" src="datetimepicker.js"></script>
<link href="./Images/heoscss.css" rel="stylesheet"></head>
<script language="javascript">
function rowAdd()
  {
        tobj=document.getElementById('issue'); crobj=tobj.rows;
        var row=crobj.length; robj=tobj.insertRow(row);
        c1=robj.insertCell(0); c2=robj.insertCell(1); c3=robj.insertCell(2); c4=robj.insertCell(3);
        c5=robj.insertCell(4); c6=robj.insertCell(5); c7=robj.insertCell(6); arindex=crobj.length-2;
        c1.innerHTML=crobj.length-2;
        c2.innerHTML="<input type=\"text\" name=\"subject["+arindex+"]\" id=\"subject["+arindex+"]\">";
        c3.innerHTML="<input type=\"text\" name=\"exammark["+arindex+"]\" id=\"exammark["+arindex+"]\" size=10>";
        c4.innerHTML="<input type=\"text\" name=\"assignment["+arindex+"]\" id=\"assignment["+arindex+"]\" size=10>";
        c5.innerHTML="<input type=\"text\" name=\"othermark["+arindex+"]\" id=\"othermark["+arindex+"]\" value=\"\" size=10>";
        c6.innerHTML="<input type=\"text\" name=\"totalmark["+arindex+"]\" id=\"totalmark["+arindex+"]\" value=\"\" size=10>";
        c7.innerHTML="<input type=\"text\" name=\"dateofcopletion["+arindex+"]\" id=\"dateofcopletion["+arindex+"]\" value=\"\" size=\"13\"><a href=\"javascript:NewCal('dateofcopletion["+arindex+"]','ddmmmyyyy')\"><img src=\"cal.gif\" alt=\"Pick a date\" width=\"20\" height=\"20\" border=\"0\"></a>";
   }
function deleteRow()
  {
        dtobj=document.getElementById('issue').rows; drow=dtobj.length-1;
        if(dtobj.length > 3) document.getElementById('issue').deleteRow(drow); }
        function indexAlert(obj) { alert(obj.name);
   }
function agree(check){
  if(check.checked){ document.getElementById('submitButton').disabled=false;
  document.getElementById('submitButton').className="buttonstatic"; }
  else { document.getElementById('submitButton').disabled=true;
  document.getElementById('submitButton').className="buttondisable"; } }
</script>
</head>
<body>
<?php
        print "<form action=\"slip.php\" method=\"post\" name=\"slip\">
        <table align=\"center\" border=0 cellspacing=1 cellpadding=0><tr><td align=\"center\" colspan=\"6\"><b>STUDENT LEARNING INDIVIDUAL PLAN</b></td></tr>
        <table align=center cellspacing=1 cellpadding=0><tr><br><tr><td>Data Protection Acts 1998:</td></tr>
        <tr><td><textarea rows=1 cols=100 readonly wrap=\"on\">(Name of College)......... may share this information with other organisations required under the laws of UK, Department for Education and Skills (Dfes), Home Office, sponser/guardian/parents and University.</textarea></td></tr></table>
        <table align=\"center\" border=0 cellspacing=1 cellpadding=0><tr><br><td colspan=\"6\"><b>Student Details:</b></td></tr>";
        $con=mysql_connect("192.168.15.24","root","admin");
        $db=mysql_select_db("heos",$con);
        $rs1=mysql_query("select studentregistration.studentidno,studentregistration.studentfirstname,studentregistration.studentsurname,studentregistration.course,studentinformationname.corraddress,studentinformationname.corrpostcode,studentinformationname.corrphoneno,studentregistration.email from studentregistration,studentinformationname where studentinformationname.studentidno = studentregistration.studentidno;",$con);
        while($res1=mysql_fetch_array($rs1))
        {
                $studentidno=$res1["studentidno"];  $studentfirstname=$res1["studentfirstname"];
                $studentsurname=$res1["studentsurname"];  $course=$res1["course"];
                $studentname=$studentfirstname." ".$studentsurname;
        }
        print "<tr><td>Student ID Number :</td><td>$studentidno</td>
        <td>Student Name :</td><td>$studentname</td></tr>
        <tr><td>Awarding Body & Course :</td><td></td>
        <td>Term & Attendance(%) :</td><td></td></tr>
        <tr><td>Personal Tutor :</td><td></td></tr>";
        $no=0;  $var=1;  print "<table align=\"center\" border=0 cellspacing=1 cellpadding=0 id=\"issue\" name=\"issue\"><tr><br><td colspan=\"6\"><b>Student Progress Report:</b></td></tr>
        <tr><td>S.No.</td><td>Title of Subject(s)</td><td>Exam Mark(%)</td><td>Assignment(%)</td>
        <td>Other Mark(%)</td><td>Total Mark(%)</td><td>Date of Copletion</td></tr>

        <tr><td>$var</td><td><input type=\"text\" name=\"subject[$no]\" id=\"subject[$no]\">
        <td><input type=\"text\" name=\"exammark[$no]\" id=\"exammark[$no]\" size=10></td>
        <td><input type=\"text\" name=\"assignment[$no]\" id=\"assignment[$no]\" size=10></td>
        <td><input type=\"text\" name=\"othermark[$no]\" id=\"othermark[$no]\" size=10></td>
        <td><input type=\"text\" name=\"totalmark[$no]\" id=\"totalmark[$no]\" size=10></td>
        <td><input type=\"text\" name=\"dateofcopletion\" id=\"dateofcopletion\" value=\"\" size=\"13\"><a href=\"javascript:NewCal('dateofcopletion','ddmmmyyyy')\"><img src=\"cal.gif\" alt=\"Pick a date\" width=\"20\" height=\"20\" border=\"0\"></a></td>
        <td><input type=\"button\" value=\"add\" onClick=\"rowAdd();\"></td><td><input type=\"button\" value=\"delete\" onClick=\"deleteRow();\"></td></tr>";
        print "<table align=\"center\" cellspacing=1 cellpadding=0><tr><br>";$sysdate=date('d-M-Y');
        print "<td>Review of Progress and any Agreed Change/s-TARGETS :</td><td><textarea name=\"review\" id=\"review\" rows=\"2\"></textarea></td>
        <td>Date</td><td><input type=\"text\" name=\"Date1\" id=\"Date1\" value=\"$sysdate\" size=\"13\"><a href=\"javascript:NewCal('Date1','ddmmmyyyy')\"><img src=\"cal.gif\" alt=\"Pick a date\" width=\"20\" height=\"20\" border=\"0\"></a></td>
        <table align=\"center\" border=0 cellspacing=1 cellpadding=0><tr><br><td colspan=\"6\">
        <br><input type=\"checkbox\" name=\"Check\" id=\"check\" onClick=\"return agree(this);\">We hereby confirm that we have read, understood and agree with the contents of the SLIP.</td></tr>
        <table align=\"center\" cellspacing=1 cellpadding=0><tr><br><td><input type=\"submit\" id=\"submitButton\" name=\"submitButton\" value=\"Submit\"></td></tr></table>
        </table></form>\n";
?>

<?php
        if(isset($_POST['submitButton']))
        {

        }

?>

</body>
</html>
