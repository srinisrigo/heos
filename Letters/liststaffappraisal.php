<html>
<head>
<title></title>
<script type="text/javascript" src="datetimepicker.js"></script>
<link href="./Images/heoscss.css" rel="stylesheet">
<script language="javascript">
function newwin(newwin)
{
 window.open('staffappraisaladmin.php?newwin='+newwin,'mywin','left=30,top=30,width=500,height=500,scrollbars=yes,toolbar=0,resizable=0');    return false;
}
</script>
</head>
<body>
<?php

        print "<form action=\"liststaffappraisal.php\" method=\"post\" name=\"liststaffappraisal\">
        <table align=\"center\" border=0 cellspacing=1 cellpadding=0><tr><td align=\"center\" colspan=\"6\"><b>List Staff Appraisal</b></td></tr>";
        $con=mysql_connect("192.168.15.24","root","admin");
        $db=mysql_select_db("heos",$con);
        $rs1=mysql_query("select staffappraisalno from staffappraisal;",$con);
        $var=1;  $no=0;
        print "<table align=\"left\"  border=0 cellspacing=1 cellpadding=0><tr><br><td>S.No.</td><td>Staff Appraisalno</td></tr>";
        while($res=mysql_fetch_array($rs1))
        {
          $staffappraisalno=$res[0];
          print"<tr><td>$var</td><td><a id=\"$staffappraisalno\" name=\"$staffappraisalno\" onclick=\"javascript:newwin(this.name);\"><font color=\"blue\">$staffappraisalno</font></td>";
          $var=$var+1;
          $no=$no+1;
        }

?>
</body>

</html>
