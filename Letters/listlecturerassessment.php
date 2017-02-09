<html>

<head> <title></title>
<script language="javascript">
function newwin(newwin)
{
 window.open('lecturerassessmentadmin.php?newwin='+newwin,'mywin','left=30,top=30,width=500,height=500,toolbar=1,resizable=0');    return false;
}
</script>
</head>

<body>

<?php

        print "<form action=\"listlecturerassessment.php\" method=\"post\" name=\"listlecturerassessment\">
        <table align=\"center\" border=0 cellspacing=1 cellpadding=0><tr><td align=\"center\" colspan=\"6\"><b>List Lecturer Assessment</b></td></tr>";
        $con=mysql_connect("192.168.15.24","root","admin");
        $db=mysql_select_db("heos",$con);
        $rs1=mysql_query("select distinct(nameoflecturer) from lecturerassessmentform;",$con);
        $var=1;  $no=0;
        print "<table align=\"left\"  border=0 cellspacing=1 cellpadding=0><tr><br><td>S.No.</td><td></td><td>Name of Lecturer</td></tr>";
        while($res=mysql_fetch_array($rs1))
        {
          $lecturerno=$res[0];
          print"<tr><td>$var</td><td></td><td><a id=\"$lecturerno\" name=\"$lecturerno\" onclick=\"javascript:newwin(this.name);\"><font color=\"blue\">$lecturerno</font></td>";
          $var=$var+1;
          $no=$no+1;
        }

?>

</body>

</html>
