<html>
<head> <title></title>
<script language="javascript">
function newwin(newwin)
{
 window.open('appealsadmin.php?newwin='+newwin,'mywin','left=30,top=30,width=500,height=500,toolbar=1,resizable=0');    return false;
}
</script>
</head>
<body>
<?php

        print "<form action=\"listappeals.php\" method=\"post\" name=\"listappeals\">
        <table align=\"center\" border=0 cellspacing=1 cellpadding=0><tr><td align=\"center\" colspan=\"6\"><b>List Appeals</b></td></tr>";
        $con=mysql_connect("192.168.15.24","root","admin");
        $db=mysql_select_db("heos",$con);
        $rs1=mysql_query("select studentidno from appealsform;",$con);
        $var=1;  $no=0;
        print "<table align=\"left\"  border=0 cellspacing=1 cellpadding=0><tr><br><td>S.No.</td><td></td><td>Student Id No</td></tr>";
        while($res=mysql_fetch_array($rs1))
        {
          $studentidno=$res[0];
          print"<tr><td>$var</td><td></td><td><a id=\"$studentidno\" name=\"$studentidno\" onclick=\"javascript:newwin(this.name);\"><font color=\"blue\">$studentidno</font></td>";
          $var=$var+1;
          $no=$no+1;
        }

?>

</body>

</html>
