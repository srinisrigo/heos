<?php session_start();
?>
<html>
<head>
<script src="heoshistorymenu.js" language="javascript1.2" type="text/javascript"></script>
<title>Saxon College</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel="stylesheet" type="text/css" href="../Style/heosmain.css">
<script language="JavaScript" type="text/javascript" src="heosnav.js"></script>
<script>if(window.history.forward(1) != null) window.history.forward(1); </script>
</head>
<body bgcolor="#FFFFFF" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0" onLoad="init();">
<?php
if(isset($_SESSION['heosusermode']) && $_SESSION['heosusermode']!='' || !empty($_SESSION['heosusermode'])){  $u=$_SESSION['heosusermode'];
print "<table style=\"position:center; top:0px; left: 0px;\" width=100% height=10% border=\"0\" cellpadding=\"0\" cellspacing=\"0\" background=\"../heos/images/logo.jpg\">
<tr><td align=center>&nbsp;</td></tr></table>
<table style=\"position:center; top:0px; left: 0px;\" border=\"0\" cellpadding=\"0\" width=100% height=2% cellspacing=\"0\" bgcolor=#E6E6E6>
<tr bgcolor=#267892 height=10%>
<td align=center><a href=\"#\" onmouseover=\"hideAll(); showLayer('layer1',this); stopTime()\" onmouseout=\"startTime();\"><font color=#ffffff size=2>Masters</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a href=\"#\" onmouseover=\"hideAll(); showLayer('layer2',this); stopTime()\" onmouseout=\"startTime();\"><font color=#ffffff size=2>Finance</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a href=\"#\" onmouseover=\"hideAll(); showLayer('layer3',this); stopTime()\" onmouseout=\"startTime();\"><font color=#ffffff size=2>Transaction</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a href=\"#\" onmouseover=\"hideAll();\" onmouseout=\"startTime();\"><font color=#ffffff size=2>Library</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a href=\"#\" onmouseover=\"hideAll();\" onmouseout=\"startTime();\"><font color=#ffffff size=2>Reports</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a href=\"#\" onmouseover=\"hideAll();\" onmouseout=\"startTime();\"><font color=#ffffff size=2>Search</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a href=\"logout.php\" onmouseover=\"hideAll();\" onmouseout=\"startTime();\"><font color=#ffffff size=2>Logout</a></td>
</tr></table>
<table style=\"position:center;\" id=\"Table_01\" width=100% border=\"0\" cellpadding=\"0\" cellspacing=\"0\" bgcolor=#ffffff>
<tr><td valign=\"top\">";
print "<div id=\"layer1\" style=\"position:center;\"><table>";
if(CheckMenu('AgentDetails')) print "<tr style=\"cursor:hand\" onmouseover=\"style.backgroundColor='#FAE9C7'\" onmouseout=\"style.backgroundColor=''\"><td style=\"border-bottom:thin white groove;\"><a href=\"AgentDetails.php\" onMouseOver=\"stopTime();\" onclick=\"hideAll();\" target=\"main\" onMouseOut=\"startTime();\">Agent Details</a></td></tr>";
if(CheckMenu('AssestmentDetails')) print "<tr style=\"cursor:hand\" onmouseover=\"style.backgroundColor='#FAE9C7'\" onmouseout=\"style.backgroundColor=''\"><td style=\"border-bottom:thin white groove;\"><a href=\"AssestmentDetails.php\" onMouseOver=\"stopTime();\" onclick=\"hideAll();\" target=\"main\" onMouseOut=\"startTime();\">Assestment Details</a></td></tr>";
if(CheckMenu('BankDetails')) print "<tr style=\"cursor:hand\" onmouseover=\"style.backgroundColor='#FAE9C7'\" onmouseout=\"style.backgroundColor=''\"><td style=\"border-bottom:thin white groove;\"><a href=\"BankDetails.php\" onMouseOver=\"stopTime();\" onclick=\"hideAll();\" target=\"main\" onMouseOut=\"startTime();\">Bank Details</a></td></tr>";
if(CheckMenu('CohortDetails')) print "<tr style=\"cursor:hand\" onmouseover=\"style.backgroundColor='#FAE9C7'\" onmouseout=\"style.backgroundColor=''\"><td style=\"border-bottom:thin white groove;\"><a href=\"CohortDetails.php\" onMouseOver=\"stopTime();\" onclick=\"hideAll();\" target=\"main\" onMouseOut=\"startTime();\">Cohort Details</a></td></tr>";
if(CheckMenu('CollegeDetails')) print "<tr style=\"cursor:hand\" onmouseover=\"style.backgroundColor='#FAE9C7'\" onmouseout=\"style.backgroundColor=''\"><td style=\"border-bottom:thin white groove;\"><a href=\"CollegeDetails.php\" onMouseOver=\"stopTime();\" onclick=\"hideAll();\" target=\"main\" onMouseOut=\"startTime();\">College Details</a></td></tr>";
if(CheckMenu('CountryDepositDetails')) print "<tr style=\"cursor:hand\" onmouseover=\"style.backgroundColor='#FAE9C7'\" onmouseout=\"style.backgroundColor=''\"><td style=\"border-bottom:thin white groove;\"><a href=\"CountryDepositDetails.php\" onMouseOver=\"stopTime();\" onclick=\"hideAll();\" target=\"main\" onMouseOut=\"startTime();\">Country Deposit Details</a></td></tr>";
if(CheckMenu('CountryDetails')) print "<tr style=\"cursor:hand\" onmouseover=\"style.backgroundColor='#FAE9C7'\" onmouseout=\"style.backgroundColor=''\"><td style=\"border-bottom:thin white groove;\"><a href=\"CountryDetail.php\" onMouseOver=\"stopTime();\" onclick=\"hideAll();\" target=\"main\" onMouseOut=\"startTime();\">Country Details</a></td></tr>";
if(CheckMenu('CourseDetails')) print "<tr style=\"cursor:hand\" onmouseover=\"style.backgroundColor='#FAE9C7'\" onmouseout=\"style.backgroundColor=''\"><td style=\"border-bottom:thin white groove;\"><a href=\"CourseDetails.php\" onMouseOver=\"stopTime();\" onclick=\"hideAll();\" target=\"main\" onMouseOut=\"startTime();\">Course Details</a></td></tr>";
if(CheckMenu('EmbassyAddress')) print "<tr style=\"cursor:hand\" onmouseover=\"style.backgroundColor='#FAE9C7'\" onmouseout=\"style.backgroundColor=''\"><td style=\"border-bottom:thin white groove;\"><a href=\"EmbassyAddress.php\" onMouseOver=\"stopTime();\" onclick=\"hideAll();\" target=\"main\" onMouseOut=\"startTime();\">Embassy Address</a></td></tr>";
if(CheckMenu('ExaminationTimeTable')) print "<tr style=\"cursor:hand\" onmouseover=\"style.backgroundColor='#FAE9C7'\" onmouseout=\"style.backgroundColor=''\"><td style=\"border-bottom:thin white groove;\"><a href=\"ExaminationTimeTable.php\" onMouseOver=\"stopTime();\" onclick=\"hideAll();\" target=\"main\" onMouseOut=\"startTime();\">Examination TimeTable</a></td></tr>";
if(CheckMenu('ExamName')) print "<tr style=\"cursor:hand\" onmouseover=\"style.backgroundColor='#FAE9C7'\" onmouseout=\"style.backgroundColor=''\"><td style=\"border-bottom:thin white groove;\"><a href=\"ExamName.php\" onMouseOver=\"stopTime();\" onclick=\"hideAll();\" target=\"main\" onMouseOut=\"startTime();\">Exam Names</a></td></tr>";
if(CheckMenu('ExamTTSlot')) print "<tr style=\"cursor:hand\" onmouseover=\"style.backgroundColor='#FAE9C7'\" onmouseout=\"style.backgroundColor=''\"><td style=\"border-bottom:thin white groove;\"><a href=\"ExamTTSlot.php\" onMouseOver=\"stopTime();\" onclick=\"hideAll();\" target=\"main\" onMouseOut=\"startTime();\">Exam TimeTable Slot</a></td></tr>";
if(CheckMenu('homeofficerequirement')) print "<tr style=\"cursor:hand\" onmouseover=\"style.backgroundColor='#FAE9C7'\" onmouseout=\"style.backgroundColor=''\"><td style=\"border-bottom:thin white groove;\"><a href=\"homeofficerequirement.php\" onMouseOver=\"stopTime();\" onclick=\"hideAll();\" target=\"main\" onMouseOut=\"startTime();\">Home Office Requirement</a></td></tr>";
if(CheckMenu('InfrastructureDetails')) print "<tr style=\"cursor:hand\" onmouseover=\"style.backgroundColor='#FAE9C7'\" onmouseout=\"style.backgroundColor=''\"><td style=\"border-bottom:thin white groove;\"><a href=\"InfrastructureDetails.php\" onMouseOver=\"stopTime();\" onclick=\"hideAll();\" target=\"main\" onMouseOut=\"startTime();\">Infrastructure Details</a></td></tr>";
if(CheckMenu('leaveMaster')) print "<tr style=\"cursor:hand\" onmouseover=\"style.backgroundColor='#FAE9C7'\" onmouseout=\"style.backgroundColor=''\"><td style=\"border-bottom:thin white groove;\"><a href=\"leaveMaster.php\" onMouseOver=\"stopTime();\" onclick=\"hideAll();\" target=\"main\" onMouseOut=\"startTime();\">Leave Master</a></td></tr>";
if(CheckMenu('MarkSchemeDetails')) print "<tr style=\"cursor:hand\" onmouseover=\"style.backgroundColor='#FAE9C7'\" onmouseout=\"style.backgroundColor=''\"><td style=\"border-bottom:thin white groove;\"><a href=\"MarkSchemeDetails.php\" onMouseOver=\"stopTime();\" onclick=\"hideAll();\" target=\"main\" onMouseOut=\"startTime();\">Mark Scheme Details</a></td></tr>";
if(CheckMenu('RegistrationFeesDetails')) print "<tr style=\"cursor:hand\" onmouseover=\"style.backgroundColor='#FAE9C7'\" onmouseout=\"style.backgroundColor=''\"><td style=\"border-bottom:thin white groove;\"><a href=\"RegistrationFeesDetails.php\" onMouseOver=\"stopTime();\" onclick=\"hideAll();\" target=\"main\" onMouseOut=\"startTime();\">Registration Fees Details</a></td></tr>";
if(CheckMenu('ScreenMaster')) print "<tr style=\"cursor:hand\" onmouseover=\"style.backgroundColor='#FAE9C7'\" onmouseout=\"style.backgroundColor=''\"><td style=\"border-bottom:thin white groove;\"><a href=\"screenmaster.php\" onMouseOver=\"stopTime();\" onclick=\"hideAll();\" target=\"main\" onMouseOut=\"startTime();\">Screen Master</a></td></tr>";
if(CheckMenu('ScreenRights')) print "<tr style=\"cursor:hand\" onmouseover=\"style.backgroundColor='#FAE9C7'\" onmouseout=\"style.backgroundColor=''\"><td style=\"border-bottom:thin white groove;\"><a href=\"screenrights.php\" onMouseOver=\"stopTime();\" onclick=\"hideAll();\" target=\"main\" onMouseOut=\"startTime();\">Screen Rights</a></td></tr>";
if(CheckMenu('SectionMaster')) print "<tr style=\"cursor:hand\" onmouseover=\"style.backgroundColor='#FAE9C7'\" onmouseout=\"style.backgroundColor=''\"><td style=\"border-bottom:thin white groove;\"><a href=\"SectionMaster.php\" onMouseOver=\"stopTime();\" onclick=\"hideAll();\" target=\"main\" onMouseOut=\"startTime();\">Section Master</a></td></tr>";
if(CheckMenu('SubjectDetails')) print "<tr style=\"cursor:hand\" onmouseover=\"style.backgroundColor='#FAE9C7'\" onmouseout=\"style.backgroundColor=''\"><td style=\"border-bottom:thin white groove;\"><a href=\"SubjectCreditDetails.php\" onMouseOver=\"stopTime();\" onclick=\"hideAll();\" target=\"main\" onMouseOut=\"startTime();\">Subject Details</a></td></tr>";
if(CheckMenu('SupplierDetails')) print "<tr style=\"cursor:hand\" onmouseover=\"style.backgroundColor='#FAE9C7'\" onmouseout=\"style.backgroundColor=''\"><td style=\"border-bottom:thin white groove;\"><a href=\"SupplierDetails.php\" onMouseOver=\"stopTime();\" onclick=\"hideAll();\" target=\"main\" onMouseOut=\"startTime();\">Supplier Details</a></td></tr>";
if(CheckMenu('UniversityDetails')) print "<tr style=\"cursor:hand\" onmouseover=\"style.backgroundColor='#FAE9C7'\" onmouseout=\"style.backgroundColor=''\"><td style=\"border-bottom:thin white groove;\"><a href=\"UniversityDetails.php\" onMouseOver=\"stopTime();\" onclick=\"hideAll();\" target=\"main\" onMouseOut=\"startTime();\">University Details</a></td></tr>";
if(CheckMenu('UserCreation')) print "<tr style=\"cursor:hand\" onmouseover=\"style.backgroundColor='#FAE9C7'\" onmouseout=\"style.backgroundColor=''\"><td style=\"border-bottom:thin white groove;\"><a href=\"usercreation.php\" onMouseOver=\"stopTime();\" onclick=\"hideAll();\" target=\"main\" onMouseOut=\"startTime();\">User Creation</a></td></tr>";
if(CheckMenu('UserRightCreation')) print "<tr style=\"cursor:hand\" onmouseover=\"style.backgroundColor='#FAE9C7'\" onmouseout=\"style.backgroundColor=''\"><td style=\"border-bottom:thin white groove;\"><a href=\"screenrights.php\" onMouseOver=\"stopTime();\" onclick=\"hideAll();\" target=\"main\" onMouseOut=\"startTime();\">User Right Creation</a></td></tr>";
if(CheckMenu('UserTypeMaster')) print "<tr style=\"cursor:hand\" onmouseover=\"style.backgroundColor='#FAE9C7'\" onmouseout=\"style.backgroundColor=''\"><td style=\"border-bottom:thin white groove;\"><a href=\"userrolemaster.php\" onMouseOver=\"stopTime();\" onclick=\"hideAll();\" target=\"main\" onMouseOut=\"startTime();\">User Type Master</a></td></tr>";
print "</table></div>
<div id=\"layer2\" style=\"position:center;\"><table>";
if(CheckMenu('balance')) print "<tr style=\"cursor:hand\" onmouseover=\"style.backgroundColor='#FAE9C7'\" onmouseout=\"style.backgroundColor=''\"><td style=\"border-bottom:thin white groove;\"><a href=\"balance.php\" onMouseOver=\"stopTime();\" onclick=\"hideAll();\" target=\"main\" onMouseOut=\"startTime();\">Balance Details</a></td></tr>";
if(CheckMenu('deposit')) print "<tr style=\"cursor:hand\" onmouseover=\"style.backgroundColor='#FAE9C7'\" onmouseout=\"style.backgroundColor=''\"><td style=\"border-bottom:thin white groove;\"><a href=\"deposit.php\" onMouseOver=\"stopTime();\" onclick=\"hideAll();\" target=\"main\" onMouseOut=\"startTime();\">Deposit Details</a></td></tr>";
if(CheckMenu('invoicepay')) print "<tr style=\"cursor:hand\" onmouseover=\"style.backgroundColor='#FAE9C7'\" onmouseout=\"style.backgroundColor=''\"><td style=\"border-bottom:thin white groove;\"><a href=\"invoicepay.php\" onMouseOver=\"stopTime();\" onclick=\"hideAll();\" target=\"main\" onMouseOut=\"startTime();\">Invoice Pay</a></td></tr>";
if(CheckMenu('pendings')) print "<tr style=\"cursor:hand\" onmouseover=\"style.backgroundColor='#FAE9C7'\" onmouseout=\"style.backgroundColor=''\"><td style=\"border-bottom:thin white groove;\"><a href=\"pendings.php\" onMouseOver=\"stopTime();\" onclick=\"hideAll();\" target=\"main\" onMouseOut=\"startTime();\">Cheque / DD Pending List</a></td></tr>";
if(CheckMenu('pettycash')) print "<tr style=\"cursor:hand\" onmouseover=\"style.backgroundColor='#FAE9C7'\" onmouseout=\"style.backgroundColor=''\"><td style=\"border-bottom:thin white groove;\"><a href=\"pettycash.php\" onMouseOver=\"stopTime();\" onclick=\"hideAll();\" target=\"main\" onMouseOut=\"startTime();\">Pettycash</a></td></tr>";
if(CheckMenu('purchase')) print "<tr style=\"cursor:hand\" onmouseover=\"style.backgroundColor='#FAE9C7'\" onmouseout=\"style.backgroundColor=''\"><td style=\"border-bottom:thin white groove;\"><a href=\"purchase.php\" onMouseOver=\"stopTime();\" onclick=\"hideAll();\" target=\"main\" onMouseOut=\"startTime();\">Purchase</a></td></tr>";
if(CheckMenu('refund')) print "<tr style=\"cursor:hand\" onmouseover=\"style.backgroundColor='#FAE9C7'\" onmouseout=\"style.backgroundColor=''\"><td style=\"border-bottom:thin white groove;\"><a href=\"refund.php\" onMouseOver=\"stopTime();\" onclick=\"hideAll();\" target=\"main\" onMouseOut=\"startTime();\">Refund</a></td></tr>";
if(CheckMenu('salary')) print "<tr style=\"cursor:hand\" onmouseover=\"style.backgroundColor='#FAE9C7'\" onmouseout=\"style.backgroundColor=''\"><td style=\"border-bottom:thin white groove;\"><a href=\"salary.php\" onMouseOver=\"stopTime();\" onclick=\"hideAll();\" target=\"main\" onMouseOut=\"startTime();\">Salary</a></td></tr>";
print "</table></div><div id=\"layer3\" style=\"position:center;\"><table>";
if(CheckMenu('appEntry')) print "<tr style=\"cursor:hand\" onmouseover=\"style.backgroundColor='#FAE9C7'\" onmouseout=\"style.backgroundColor=''\"><td style=\"border-bottom:thin white groove;\"><a href=\"appEntry.php\" onMouseOver=\"stopTime();\" onclick=\"hideAll();\" target=\"main\" onMouseOut=\"startTime();\">Application Entry</a></td></tr>";
if(CheckMenu('application')) print "<tr style=\"cursor:hand\" onmouseover=\"style.backgroundColor='#FAE9C7'\" onmouseout=\"style.backgroundColor=''\"><td style=\"border-bottom:thin white groove;\"><a href=\"application.php\" onMouseOver=\"stopTime();\" onclick=\"hideAll();\" target=\"main\" onMouseOut=\"startTime();\">Application</a></td></tr>";
if(CheckMenu('marksEntry')) print "<tr style=\"cursor:hand\" onmouseover=\"style.backgroundColor='#FAE9C7'\" onmouseout=\"style.backgroundColor=''\"><td style=\"border-bottom:thin white groove;\"><a href=\"marksEntry.php\" onMouseOver=\"stopTime();\" onclick=\"hideAll();\" target=\"main\" onMouseOut=\"startTime();\">Marks Entry</a></td></tr>";
if(CheckMenu('slotRepeat')) print "<tr style=\"cursor:hand\" onmouseover=\"style.backgroundColor='#FAE9C7'\" onmouseout=\"style.backgroundColor=''\"><td style=\"border-bottom:thin white groove;\"><a href=\"slotRepeat.php\" onMouseOver=\"stopTime();\" onclick=\"hideAll();\" target=\"main\" onMouseOut=\"startTime();\">Slot Allocation</a></td></tr>";
if(CheckMenu('staffAttendence')) print "<tr style=\"cursor:hand\" onmouseover=\"style.backgroundColor='#FAE9C7'\" onmouseout=\"style.backgroundColor=''\"><td style=\"border-bottom:thin white groove;\"><a href=\"staffAttendence.php\" onMouseOver=\"stopTime();\" onclick=\"hideAll();\" target=\"main\" onMouseOut=\"startTime();\">Staff Attendence</a></td></tr>";
if(CheckMenu('staffavailability')) print "<tr style=\"cursor:hand\" onmouseover=\"style.backgroundColor='#FAE9C7'\" onmouseout=\"style.backgroundColor=''\"><td style=\"border-bottom:thin white groove;\"><a href=\"staffavailability.php\" onMouseOver=\"stopTime();\" onclick=\"hideAll();\" target=\"main\" onMouseOut=\"startTime();\">Staff Availability</a></td></tr>";
if(CheckMenu('staffDetails')) print "<tr style=\"cursor:hand\" onmouseover=\"style.backgroundColor='#FAE9C7'\" onmouseout=\"style.backgroundColor=''\"><td style=\"border-bottom:thin white groove;\"><a href=\"staffDetails.php\" onMouseOver=\"stopTime();\" onclick=\"hideAll();\" target=\"main\" onMouseOut=\"startTime();\">Staff Details</a></td></tr>";
if(CheckMenu('student')) print "<tr style=\"cursor:hand\" onmouseover=\"style.backgroundColor='#FAE9C7'\" onmouseout=\"style.backgroundColor=''\"><td style=\"border-bottom:thin white groove;\"><a href=\"student.php\" onMouseOver=\"stopTime();\" onclick=\"hideAll();\" target=\"main\" onMouseOut=\"startTime();\">Student Details</a></td></tr>";
if(CheckMenu('studentAttendence')) print "<tr style=\"cursor:hand\" onmouseover=\"style.backgroundColor='#FAE9C7'\" onmouseout=\"style.backgroundColor=''\"><td style=\"border-bottom:thin white groove;\"><a href=\"studentAttendence.php\" onMouseOver=\"stopTime();\" onclick=\"hideAll();\" target=\"main\" onMouseOut=\"startTime();\">Student Attendence</a></td></tr>";
if(CheckMenu('studentMaster')) print "<tr style=\"cursor:hand\" onmouseover=\"style.backgroundColor='#FAE9C7'\" onmouseout=\"style.backgroundColor=''\"><td style=\"border-bottom:thin white groove;\"><a href=\"studentMaster.php\" onMouseOver=\"stopTime();\" onclick=\"hideAll();\" target=\"main\" onMouseOut=\"startTime();\">Student Master</a></td></tr>";
if(CheckMenu('subjectList')) print "<tr style=\"cursor:hand\" onmouseover=\"style.backgroundColor='#FAE9C7'\" onmouseout=\"style.backgroundColor=''\"><td style=\"border-bottom:thin white groove;\"><a href=\"subjectList.php\" onMouseOver=\"stopTime();\" onclick=\"hideAll();\" target=\"main\" onMouseOut=\"startTime();\">Subject List</a></td></tr>";
if(CheckMenu('timeTable')) print "<tr style=\"cursor:hand\" onmouseover=\"style.backgroundColor='#FAE9C7'\" onmouseout=\"style.backgroundColor=''\"><td style=\"border-bottom:thin white groove;\"><a href=\"timeTable.php\" onMouseOver=\"stopTime();\" onclick=\"hideAll();\" target=\"main\" onMouseOut=\"startTime();\">TimeTable</a></td></tr>";
print "</table></div></td></tr></table><br>
<iframe style=\"position:center; top:0px; left:0px;\" src=\"\" name=\"main\" frameborder=\"0\" width=100% height=90% marginheight=\"0\" marginwidth=\"0\" bgcolor=#f2f8f8></iframe>
<table style=\"position:center; top:0px; left: 0px;\" width=100% height=2% border=\"0\" cellpadding=\"0\" cellspacing=\"0\">
<tr><td align=center>&copy; <B>Design And Development By Jeppiaar Technologies</td></tr></table>";
}
else echo "<script language=\"javascript\">window.location='loginscreen.php';</script> ";

function CheckMenu($scrname){
if($_SESSION['heosusermode']==1 || $_SESSION['heosusermode']==2) return 1;
else {
$usertype=$_SESSION['heosusermode'];

$echeck=mysql_query("select count(ScreenId) from screenrights where UserType='$usertype'");
$isavail=mysql_result($echeck,'ScreenId');
if($isavail == 0) return 0;
if($isavail >= 1){
$sresult=mysql_query("select ScreenId from screenmaster where ScreenName='$scrname'"); $screenid=mysql_result($sresult,'ScreenId');
if(empty($screenid)) echo "<script language=\"javascript\">alert('$scrname');</script>";
$result=mysql_query("select count(ScreenId) from screenrights where ScreenId='$screenid' and UserType='$usertype'"); $exist=mysql_result($result,'ScreenId');
if($exist) return 1; else return 0; }
} // username else
}

?>
</body>
</html>
