<?php session_start();
include "../DataBase/dbconnection.php";
?>
<html>
<head>
<title>Desigantion</title>
<link rel="stylesheet" href="../Style/heoscss.css">
<script language="javascript">
function btover(obj,cname){ obj.className=cname; }
</script>
</head>
<body>

<?php
print"<form method='post' name='designation' id='designation'>
<table border=0 cellspacing=1 cellpadding=0>
<tr><th colspan=2>Designation</th></tr>
<tr><td>Designation Name</td><td><input type='text' name='designationname' id='designationname'></td></tr>
<tr><td colspan='2' align='center'><input type='submit' name='add' id='add' value='Add'></td></tr></table></form>";

if(!isset($_POST['edit']) && !isset($_POST['delete']) && !isset($_POST['cancel']) && !isset($_POST['update']) && !isset($_POST['add']))
{
$_SESSION['editreference']="";
$_SESSION['updatereference']="";
mainform();
}

function mainform()
{
if(!isset($_GET['page']))
{
@$cat=$_GET['cat'];
if(strlen($cat)==0)
{
$page=1;
fillpage($page);
}
else if(strlen($cat)==6 || strlen($cat)==10 )
{
if(!isset($_SESSION['pagevaluefordesignation']))
{
$page=1;
$_SESSION['pagevaluefordesignation']=$page;
fillpage($page);
}
else
{
$page=$_SESSION['pagevaluefordesignation'];
$_SESSION['pagevaluefordesignation']=$page;
}
}
else
{
$page=$_SESSION['pagevaluefordesignation'];
fillpage($page);
}
}
else
{
$page = $_GET['page'];
$_SESSION['pagevaluefordesignation']=$page;
fillpage($page);
}
}


if(isset($_POST['add']))
{
$designationname=$_POST['designationname'];


$query=mysql_query("select count(designationname) from designation where designationname='$designationname'");
$querycount=mysql_result($query,0);
if($querycount==0)
{
$queryinsert=mysql_query("insert into designation values('0','$designationname')");
if($queryinsert)echo "<script language='javascript'>alert('Successfully Inserted...')</script>";
else echo "<script language='javascript'>alert('Failed...')</script>";
mainform();
}

else if($querycount>0)
{
echo"<script language='javascript'>alert('Designationname Already Exits')</script>";
mainform();
}
}

function fillpage($page)
{
@$cat=$_GET['cat'];
$_SESSION['pagevaluefordesignation']=$page;
$page  = (int) $page;
$limit = 5;

$result = mysql_query("select count(*) from designation");
$total = mysql_result($result, 0);
$pager  = getPagerData($total, $limit, $page);
if($total==0){$offset=0;}
else{$offset = $pager->offset;}
$limit  = $pager->limit;
$page   = $pager->page;
$queryselectdesig="select * from designation order by designationname limit $offset,$limit";
$queryselectdesigexec=mysql_query($queryselectdesig);
if(mysql_num_rows($queryselectdesigexec)){
print "<form method='post'><br>
<table border=0 cellspacing=1 cellpadding=0>
<tr><th>S.No</th><th>Designation Name</th><th colspan='2'>&nbsp;</th></tr>\n";
$sno=1;
while($Fetch=mysql_fetch_array($queryselectdesigexec))
{
$desigid=$Fetch["desigid"];
$designationname=$Fetch["designationname"];
print "<tr class='label'><td name=d[] value='$sno'>$sno</td>
<td>$designationname</td><input type='hidden' name='desigid[]' value='$desigid'><td>
<input type='submit' name='edit[$desigid]' id='edit' value='Edit'></td>
<td><input type='submit' name='delete[$desigid]' id='delete' value='Delete'></td></tr>\n";
$sno=$sno+1;
}
print "<tr><td align='center' colspan='4' class='label'>\n";
if ($page == 1)
echo "Previous";
else
echo "<a href='designation.php?page=" . ($page - 1) . "'>Previous</a>";
print " ||  \n";
if ($page == $pager->numPages)
echo "Next";
else
echo "<a href='designation.php?page=" . ($page + 1) . "'>Next</a>";
print "<br>$page of $pager->numPages</td></tr></table></form>\n";
}
}

function getPagerData($numHits, $limit, $page)
{
$numHits  = (int) $numHits;
$limit    = max((int) $limit, 1);
$page     = (int) $page;
$numPages = ceil($numHits / $limit);
$page = max($page, 1);
$page = min($page, $numPages);
$offset = ($page - 1) * $limit;
$ret = new stdClass;
$ret->offset   = $offset;
$ret->limit    = $limit;
$ret->numPages = $numPages;
$ret->page     = $page;
return $ret;
}

if(isset($_POST['edit']))
{
$desigcount=$_POST['edit'];
$_SESSION['designationafteredit']=$desigcount;
editfill();
}

function editfill()
{
$page=$_SESSION['pagevaluefordesignation'];
$limit = 5;


$result =mysql_query("select count(*) from designation");
$total = mysql_result($result, 0);
$pager  = getPagerData($total, $limit, $page);
$offset = $pager->offset;
$limit  = $pager->limit;
$page   = $pager->page;
$arraydesig=$_SESSION['designationafteredit'];
$queryselectdesignation ="select * from designation order by designationname limit $offset,$limit";
$queryselectdesignationexec=mysql_query($queryselectdesignation);
print "<form method='post'><br>
<table border=0 cellpacing=1 cellpadding=0>
<tr><th>S.No</th><th>Designation Name</th><th colspan='2'>&nbsp;</th></tr>\n";
$sno=1;
while($EFetch=mysql_fetch_array($queryselectdesignationexec))
{
$desigid=$EFetch["desigid"];
$designationname=$EFetch["designationname"];
if(array_key_exists($desigid,$arraydesig))
{
print "<tr class='label'><input type='hidden' name='desigid[]' value='$desigid'><td name=d[] value=$sno>$sno</td>
<td><input width='2' type='text' name='designationname[]'  value='$designationname'/></td>
<td><input type='submit' name='update[$desigid]' value='Update'></td>
<td><input type='submit' name='cancel[]' value='Cancel'></td></tr>\n";
}
else
{
print "<tr class='label'>
<input type='hidden' name='desigid[]' value='$desigid'>
<td name=d[] value=$sno>$sno</td><td>$designationname</td>
<td><input type='submit' disabled name='update[$desigid]' value='Edit'></td>
<td><input type='submit' disabled name='delete[$desigid]' value='Delete'></td></tr>\n";
}
$sno=$sno+1;
}
print "<tr><td align='center' colspan='4' class='label'>\n";
if ($page == 1)
echo "Previous";
else
echo "<a href='designation.php?page=" . ($page - 1) . "'>Previous</a>";
print " ||  \n";
if ($page == $pager->numPages)
echo "Next";
else
echo "<a href='designation.php?page=" . ($page + 1) . "'>Next</a>";
print "<br>$page of $pager->numPages</td></tr></table></form>\n";
}

if(isset($_POST['cancel']))
{
$page=$_SESSION['pagevaluefordesignation'];
fillpage($page);
}

if(isset($_POST['update']))
{
$flag=0;
$desigidforupdate=$_POST['update'];
$designationname=$_POST['designationname'][0];
$designationidarray=array();
$designationidarray=array_keys($desigidforupdate);
$desigid=$designationidarray[0];


$querydesignationexist=mysql_query("select count(*) from designation where designationname='$designationname'");
$screencount=mysql_result($querydesignationexist,0);
$designationnamelen=strlen($designationname);

for ($i=0;$i<$designationnamelen;$i++)
{
$ch=substr($designationname,$i,1);
if(($ch=="~")||($ch=="`")||($ch=="!")||($ch=="@")||($ch=="#")||($ch=="$")||($ch=="%")||($ch=="^")||($ch=="&")||($ch=="*")||($ch=="(")||($ch==")")||($ch=="-")||($ch=="_")||($ch=="+")||($ch=="=")||($ch=="[")||($ch=="]")||($ch=="{")||($ch=="}")||($ch=="'")||($ch==";")||($ch==":")||($ch=="/")||($ch=="?")||($ch==">")||($ch==",")||($ch=="<")||($ch=="|")||($ch=="0")||($ch=="1")||($ch=="2")||($ch=="3")||($ch=="4")||($ch=="5")||($ch=="6")||($ch=="7")||($ch=="8")||($ch=="9")||($ch=="%")||($ch=="(")||($ch==")"))
{$flag=1;}
else
{$flag=2;}
}


if(strlen($designationname)==0)
{
echo "<script langauge='javascript'>alert('Enter The Designation Name')</script>";
editfill();
}
else if($flag==1)
{
echo "<script langauge='javascript'>alert('Special Characters in Designation Name')</script>";
editfill();
}
else if($screencount>0)
{
echo "<script langauge='javascript'>alert('Designation Already exists')</script>";
$page=$_SESSION['pagevaluefordesignation'];
fillpage($page);
}
else
{
$queryScreenupdate=mysql_query("update designation set designationname='$designationname' where desigid='$desigid'");
if($queryScreenupdate) echo "<script langauge='javascript'>alert('Updated Successfully!')</script>";
$page=$_SESSION['pagevaluefordesignation'];
fillpage($page);
}
}


if(isset($_POST['delete']))
{
deletefill();
$designationfordelete=$_POST['delete'];
$_SESSION['designationfordelete']=$designationfordelete;
echo "<script langauge='javascript'>var result=confirm('Are You Sure Want to Delete');if(result){val='delete';self.location='designation.php?cat=' + val;}else{val='dontdelete';self.location='designation.php?cat=' + val;}</script>";
}

function deletefill()
{
$page=$_SESSION['pagevaluefordesignation'];
fillpage($page);
}


@$cat=$_GET['cat'];
if(isset($cat) and strlen($cat) == 6)
{
$designationdelete=$_SESSION['designationfordelete'];
$designationarray=array_keys($designationdelete);

$querycustomerdelete=mysql_query("delete from designation where desigid='$designationarray[0]'");
echo "<script type='text/javascript'>alert('Successfully Deleted')</script>";
$page=$_SESSION['pagevaluefordesignation'];
fillpage($page);
}
else if(isset($cat) and strlen($cat) == 10)
{
$page=$_SESSION['pagevaluefordesignation'];
fillpage($page);
}




?>

</body>

</html>
