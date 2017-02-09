<?php session_start();
include "../DataBase/dbconnection.php";
?>
<html><head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="../Style/heoscss.css" rel="stylesheet" type="text/css">
<title>Subject Area</title>
<script language="javascript"> function changeimage(obj,c){ obj.className=c; } </script>
</head>

<?php
print "<body><form action='Subjectarea.php' method='post'>
<table border=0 cellspacing=1 cellpadding=0>
<tr><th colspan=3>Subject Area</th></tr>
<tr><td>Subject Area</td><td><input type='text' name='subjectarea' id='subjectarea'></td>
<td><input type='submit' name='btnsubmit' value='Add'></td>
</tr></table></form></body></html>\n";

if(!isset($_POST['btnsubmit']) && !isset($_POST['btnedit']) && !isset($_POST['btncancel']) && !isset($_POST['btndelete']) && !isset($_POST['btnupdate']))
{
$_SESSION['editreference']="";
$_SESSION['updatereference']="";
screenfil();
}


function screenfil()
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
if(!isset($_SESSION['pagevalueforsubjectarea']))
{
$page=1;
$_SESSION['pagevalueforsubjectarea']=$page;
fillpage($page);
}
else
{
$page=$_SESSION['pagevalueforsubjectarea'];
$_SESSION['pagevalueforsubjectarea']=$page;
}
}
else
{
$page=$_SESSION['pagevalueforsubjectarea'];
fillpage($page);
}
}
else
{
$page = $_GET['page'];
$_SESSION['pagevalueforsubjectarea']=$page;
fillpage($page);
}
}


if(isset($_POST['btnsubmit']))
{
$subjectarea=$_POST['subjectarea'];


$queryscreencount=mysql_query("select count(subjectarea) from subjectarea where subjectarea='$subjectarea'");
$screencount=mysql_result($queryscreencount,0);

if($screencount==0)
{
$queryscreeninsert=mysql_query("insert into  subjectarea values('0','$subjectarea')");
if($queryscreeninsert)echo "<script langauge='javascript'>alert('Successfully Inserted')</script>";
screenfil();
}
else if($screencount>0)
{
echo "<script langauge='javascript'>alert('Subject Area Already Exists')</script>";
screenfil();
}
}


function fillpage($page)
{
@$cat=$_GET['cat'];
$_SESSION['pagevalueforsubjectarea']=$page;
$page  = (int) $page;
$limit = 5;


$result = mysql_query("select count(*) from subjectarea");
$total = mysql_result($result, 0);
$pager  = getPagerData($total, $limit, $page);
if($total==0){$offset=0;}
else{$offset = $pager->offset;}
$limit  = $pager->limit;
$page   = $pager->page;
$queryselectscreen="select * from subjectarea order by subjectarea limit $offset,$limit";
$queryselectscreenexec=mysql_query($queryselectscreen);
if(mysql_num_rows($queryselectscreenexec)){
print "<form method='post'>
<br><table border=0 cellspacing=1 cellpadding=0>
<tr><th>S.No</th><th>Subject Area</th><th colspan=2>&nbsp;</th></tr>\n";
$sno=1;
while($Fetch=mysql_fetch_array($queryselectscreenexec))
{
$subid=$Fetch["id"];
$subname=$Fetch["subjectarea"];
print "<tr><td name=d[] value='$sno'>$sno</td>
<td>$subname</td><input type='hidden' name='subid[]' value='$subid'><td>
<input type='submit' name='btnedit[$subid]' value='Edit'></td>
<td><input type='submit' name='btndelete[$subid]'  value='Delete'></td></tr>\n";
$sno=$sno+1;
}
print "<tr><td align='center' colspan='4'>\n";
if ($page == 1) // this is the first page - there is no previous page
echo "Previous";
else            // not the first page, link to the previous page
echo "<a href='Subjectarea.php?page=" . ($page - 1) . "'>Previous</a>";
print " ||  \n";
if ($page == $pager->numPages) // this is the last page - there is no next page
echo "Next";
else            // not the last page, link to the next page
echo "<a href='Subjectarea.php?page=" . ($page + 1) . "'>Next</a>";
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


if(isset($_POST['btnedit']))
{
$screencount=$_POST['btnedit'];
$_SESSION['subjectafteredit']=$screencount;
editfill();
}


function editfill()
{
$page=$_SESSION['pagevalueforsubjectarea'];
$limit = 5;


$result =mysql_query("select count(*) from subjectarea");
$total = mysql_result($result, 0);
$pager  = getPagerData($total, $limit, $page);
$offset = $pager->offset;
$limit  = $pager->limit;
$page   = $pager->page;
$arraysubject=$_SESSION['subjectafteredit'];
$queryselectScreen ="select * from subjectarea order by subjectarea limit $offset,$limit";
$queryselectScreenexec=mysql_query($queryselectScreen);
print "<form method='post'>
<br><table border=0 cellspacing=1 cellpadding=0>
<tr><th>S.No</th><th>Subject Area</th><th colspan=2>&nbsp;</th></tr>\n";
$sno=1;
while($EFetch=mysql_fetch_array($queryselectScreenexec))
{
$id=$EFetch["id"];
$subjectname=$EFetch["subjectarea"];
if(array_key_exists($id,$arraysubject))
{
print "<tr><input type='hidden' name='sunjectid[]' value='$id'><td name=d[] value=$sno>$sno</td>
<td><input width='2' type='text' name='subjectarea[]'   value='$subjectname'/></td>
<td><input type='submit' name='btnupdate[$id]' value='Update'></td>
<td><input type='submit' name='btncancel[]' value='Cancel'></td></tr>\n";
}
else
{
print "<tr>
<input type='hidden' name='id1[]' value='$id'>
<td name=d[] value=$sno>$sno</td><td>$subjectname</td>
<td><input type='submit' disabled name='btnupdate[$id]' value='Edit'></td>
<td><input type='submit' disabled name='btndelete[$id]' value='Delete'></td></tr>\n";
}
$sno=$sno+1;
}
print "<tr><td align='center' colspan='4'>\n";
if ($page == 1) // this is the first page - there is no previous page
echo "Previous";
else            // not the first page, link to the previous page
echo "<a href='Subjectarea.php?page=" . ($page - 1) . "'>Previous</a>";
print " ||  \n";
if ($page == $pager->numPages) // this is the last page - there is no next page
echo "Next";
else            // not the last page, link to the next page
echo "<a href='Subjectarea.php?page=" . ($page + 1) . "'>Next</a>";
print "<br>$page of $pager->numPages</td></tr></table></form>\n";
}


/***********************Cancel Button Code******************************/
if(isset($_POST['btncancel']))
{
$page=$_SESSION['pagevalueforsubjectarea'];
fillpage($page);
}

if(isset($_POST['btnupdate']))
{
$flag=0;
$screenidforupdate=$_POST['btnupdate'];
$screenname=$_POST['subjectarea'][0];
$screenidarray=array();
$screenidarray=array_keys($screenidforupdate);
$screenid=$screenidarray[0];


$queryscreenexist=mysql_query("select count(*) from subjectarea where subjectarea='$screenname'");
$screencount=mysql_result($queryscreenexist,0);
$screennamelen=strlen($screenname);

for ($i=0;$i<$screennamelen;$i++)
{
$ch=substr($screenname,$i,1);
if(($ch=="~")||($ch=="`")||($ch=="!")||($ch=="@")||($ch=="#")||($ch=="$")||($ch=="%")||($ch=="^")||($ch=="&")||($ch=="*")||($ch=="(")||($ch==")")||($ch=="-")||($ch=="_")||($ch=="+")||($ch=="=")||($ch=="[")||($ch=="]")||($ch=="{")||($ch=="}")||($ch=="'")||($ch==";")||($ch==":")||($ch=="/")||($ch=="?")||($ch==">")||($ch==",")||($ch=="<")||($ch=="|")||($ch=="0")||($ch=="1")||($ch=="2")||($ch=="3")||($ch=="4")||($ch=="5")||($ch=="6")||($ch=="7")||($ch=="8")||($ch=="9")||($ch=="%")||($ch=="(")||($ch==")"))
{$flag=1;}
else
{$flag=2;}
}


if(strlen($screenname)==0)
{
echo "<script langauge='javascript'>alert('Enter The Screen Name')</script>";
editfill();
}
else if($flag==1)
{
echo "<script langauge='javascript'>alert('Special Characters in Screen Name')</script>";
editfill();
}
else if($screencount>0)
{
echo "<script langauge='javascript'>alert('Screen Name Already exists')</script>";
$page=$_SESSION['pagevalueforscreenmaster'];
fillpage($page);
}
else
{
$queryScreenupdate=mysql_query("update subjectarea set subjectarea='$screenname' where id='$screenid'");
if($queryScreenupdate)echo "<script langauge='javascript'>alert('Updated Successfully!')</script>";
$page=$_SESSION['pagevalueforsubjectarea'];
fillpage($page);
}
}

/***********************Delete Button Code******************************/
if(isset($_POST['btndelete']))
{
deletefill();
$screenfordelete=$_POST['btndelete'];
$_SESSION['screenfordelete']=$screenfordelete;
echo "<script langauge='javascript'>var result=confirm('Are You Sure Want to Delete');if(result){val='delete';self.location='Subjectarea.php?cat=' + val;}else{val='dontdelete';self.location='Subjectarea.php?cat=' + val;}</script>";
}
/*****************************Deleet Button Code Ends***********************/

function deletefill()
{
$page=$_SESSION['pagevalueforsubjectarea'];
fillpage($page);
}


@$cat=$_GET['cat'];
if(isset($cat) and strlen($cat) == 6)
{
$screendelete=$_SESSION['screenfordelete'];
$screenarray=array_keys($screendelete);


$queryScreenRights=mysql_query("select count(subjectarea) from subjectcreditdetails where subjectarea='$screenarray[0]'");
$ScreenrightsTab=mysql_result($queryScreenRights,0);

if($ScreenrightsTab==0)
{
$queryscreendelete=mysql_query("delete from subjectarea where id='$screenarray[0]'");
echo "<script langauge='javascript'>alert('Successfully Deleted!')</script>";
$page=$_SESSION['pagevalueforsubjectarea'];
fillpage($page);
}
else
{
$tab='';
if($ScreenrightsTab > 0){$tab="Subject details";}
echo "<script type='text/javascript'>alert('This Data is in Use in the following forms : $tab')</script>";
$page=$_SESSION['pagevalueforsubjectarea'];
fillpage($page);
}

}
else if(isset($cat) and strlen($cat) == 10)
{
$page=$_SESSION['pagevalueforsubjectarea'];
fillpage($page);
}
?>







