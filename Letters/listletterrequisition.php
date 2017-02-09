<html>

<head>
  <title></title>
</head>

<body>

<?php

        print "<form action=\"listletterrequisition.php\" method=\"post\" name=\"listletterrequisition\">
        <table align=\"center\" border=0 cellspacing=1 cellpadding=0><tr><td align=\"center\" colspan=\"6\"><b>List Letter Requisition</b></td></tr>";
        $con=mysql_connect("192.168.15.24","root","admin");
        $db=mysql_select_db("heos",$con);
        $rs1=mysql_query("select studentidno from studentcomplaintform;",$con);
        $var=1;  $no=0;
        print "<table align=\"left\"  border=0 cellspacing=1 cellpadding=0><tr><br><td>S.No.</td><td>Student Id No</td></tr>";
        while($res=mysql_fetch_array($rs1))
        {
          $studentidno=$res[0];
          print"<tr><td>$var</td><td><a href=\"http://localhost/1heos/studentcomplaint.php\">$studentidno</a></td>";
          $var=$var+1;
          $no=$no+1;
        }

?>

</body>

</html>
