<?php session_start();
include "../DataBase/dbconnection.php";
?>
<html><head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="../Style/heoscss.css" rel="stylesheet" type="text/css">
<title>User Role Master</title>                                                                  2
<script language="javascript"> function changeimage(obj,c){ obj.className=c; } </script>
</head>

<?php
if(isset($_SESSION['heosusermode']) && ($_SESSION['heosusermode']==1 || $_SESSION['heosusermode']=3 ) && $_SESSION['heosusermode']!='' && !empty($_SESSION['heosusermode'])){
print "<body><form action=\"userrolemaster.php\" method=\"post\">
<table border=0 cellspacing=1 cellpadding=0>
<tr><th colspan=3>User Role</th></tr>
<tr><td>User Role Name</td><td><input type=\"text\" name=\"screenname\" onKeyPress=\"return keyRestrict(event,'abcdefghijklmnopqrstuvwxyz0123456789 '+String.fromCharCode(241))\"></td>
<td><input type=\"submit\" name=\"btnsubmit\"value=\"Add\"></td>
</tr></table></form></body></html>\n";
}
else echo "<script language=\"javascript\">window.location='loginscreen.php';</script> ";

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
if(!isset($_SESSION['pagevalueforusertypemaster']))
{
$page=1;
$_SESSION['pagevalueforusertypemaster']=$page;
fillpage($page);
}
else
{
$page=$_SESSION['pagevalueforusertypemaster'];
$_SESSION['pagevalueforusertypemaster']=$page;
}
}
else
{
$page=$_SESSION['pagevalueforusertypemaster'];
fillpage($page);
}
}
else
{
$page = $_GET['page'];
$_SESSION['pagevalueforusertypemaster']=$page;
fillpage($page);
}
}


if(isset($_POST['btnsubmit']))
{
$screenname=$_POST['screenname'];
$queryscreencount=mysql_query("select count(UserType) from usertypemaster where UserType='$screenname'",$con);
$screencount=mysql_result($queryscreencount,0);

if($screencount==0)
{
$queryscreeninsert=mysql_query("insert into usertypemaster values('','$screenname')",$con);
if($queryscreeninsert) echo "<script langauge=\"javascript\">alert('Successfully Inserted')</script>";
screenfil();
}
else if($screencount>0)
{
echo "<script langauge=\"javascript\">alert('Screen Already Exists')</script>";
screenfil();
}
}


function fillpage($page)
{
@$cat=$_GET['cat'];
$_SESSION['pagevalueforusertypemaster']=$page;
$page  = (int) $page;
$limit = 10;
$result = mysql_query("select count(*) from usertypemaster",$con);
$total = mysql_result($result, 0);
$pager  = getPagerData($total, $limit, $page);
if($total==0){$offset=0;}
else{$offset = $pager->offset;}
$limit  = $pager->limit;
$page   = $pager->page;
$queryselectscreen="select * from usertypemaster order by UserType limit $offset,$limit";
$queryselectscreenexec=mysql_query($queryselectscreen,$con);

print "<form action=\"userrolemaster.php\" method=\"post\">
<br><table border=0 cellspacing=1 cellpadding=0>
<tr><th>S.No</th><th>Sreen Name</th><th colspan=2>&nbsp;</th></tr>\n";
$sno=1;
while($Fetch=mysql_fetch_array($queryselectscreenexec))
{
$UserId=$Fetch["UserId"];
$screenname=$Fetch["UserType"];
print "<tr><td name=d[] value=\"$sno\">$sno</td>
<td>$screenname</td><input type=\"hidden\" name=\"UserId[]\" value=\"$UserId\"><td>
<input type=\"submit\" name=\"btnedit[$UserId]\" value=\"Edit\" ></td>
<td><input type=\"submit\" name=\"btndelete[$UserId]\"  value=\"Delete\"></td></tr>\n";
$sno=$sno+1;
}
print "<tr><td align=\"center\" colspan=\"4\">\n";
if ($page == 1) // this is the first page - there is no previous page
echo "Previous";
else            // not the first page, link to the previous page
echo "<a href=\"userrolemaster.php?page=" . ($page - 1) . "\">Previous</a>";
print " ||  \n";
if ($page == $pager->numPages) // this is the last page - there is no next page
echo "Next";
else            // not the last page, link to the next page
echo "<a href=\"userrolemaster.php?page=" . ($page + 1) . "\">Next</a>";
print "<br>$page of $pager->numPages</td></tr></table></form>\n";
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
$_SESSION['screenafteredit']=$screencount;
editfill();
}


function editfill()
{
$page=$_SESSION['pagevalueforusertypemaster'];
$limit = 10;
$result =mysql_query("select count(*) from usertypemaster",$con);
$total = mysql_result($result, 0);
$pager  = getPagerData($total, $limit, $page);
$offset = $pager->offset;
$limit  = $pager->limit;
$page   = $pager->page;
$arrayscreen=$_SESSION['screenafteredit'];
$queryselectScreen ="select * from usertypemaster order by UserType limit $offset,$limit";
$queryselectScreenexec=mysql_query($queryselectScreen,$con);
print "<form action=\"userrolemaster.php\" method=\"post\">
<br><table border=0 cellspacing=1 cellpadding=0>
<tr><th>S.No</th><th>Screen Name</th><th colspan=2>&nbsp;</th></tr>\n";
$sno=1;
while($EFetch=mysql_fetch_array($queryselectScreenexec))
{
$UserId=$EFetch["UserId"];
$screenname=$EFetch["UserType"];
if(array_key_exists($UserId,$arrayscreen))
{
print "<tr><input type=\"hidden\" name=\"UserId[]\" value=\"$UserId\"><td name=d[] value=$sno>$sno</td>
<td><input width=\"2\" type=\"text\" name=\"screenname[]\" onKeyPress=\"return keyRestrict(event,'abcdefghijklmnopqrstuvwxyz0123456789 '+String.fromCharCode(241))\"  value=\"$screenname\"/></td>
<td><input type=\"submit\" name=\"btnupdate[$UserId]\" value=\"Update\"></td>
<td><input type=\"submit\" name=\"btncancel[]\" value=\"Cancel\"></td></tr>\n";
}
else
{
print "<tr>
<input type=\"hidden\" name=\"UserId1[]\" value=\"$UserId\">
<td name=d[] value=$sno>$sno</td><td>$screenname</td>
<td><input type=\"submit\" disabled name=\"btnupdate[$UserId]\" value=\"Edit\"></td>
<td><input type=\"submit\" disabled name=\"btndelete[$UserId]\" value=\"Delete\"></td></tr>\n";
}
$sno=$sno+1;
}
print "<tr><td align=\"center\" colspan=\"4\">\n";
if ($page == 1) // this is the first page - there is no previous page
echo "Previous";
else            // not the first page, link to the previous page
echo "<a href=\"userrolemaster.php?page=" . ($page - 1) . "\">Previous</a>";
print " ||  \n";
if ($page == $pager->numPages) // this is the last page - there is no next page
echo "Next";
else            // not the last page, link to the next page
echo "<a href=\"userrolemaster.php?page=" . ($page + 1) . "\">Next</a>";
print "<br>$page of $pager->numPages</td></tr></table></form>\n";
}


/***********************Cancel Button Code******************************/
if(isset($_POST['btncancel']))
{
$page=$_SESSION['pagevalueforusertypemaster'];
fillpage($page);
}

if(isset($_POST['btnupdate']))
{
$flag=0;
$UserIdforupdate=$_POST['btnupdate'];
$screenname=$_POST['screenname'][0];
$UserIdarray=array();
$UserIdarray=array_keys($UserIdforupdate);
$UserId=$UserIdarray[0];
$queryscreenexist=mysql_query("select count(*) from usertypemaster where UserType='$screenname'",$con);
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
echo "<script langauge=\"javascript\">alert('Enter The UserType')</script>";
editfill();
}
else if($flag==1)
{
echo "<script langauge=\"javascript\">alert('Special Characters in UserType')</script>";
editfill();
}
else if($screencount>0)
{
echo "<script langauge=\"javascript\">alert('UserType Already exists')</script>";
$page=$_SESSION['pagevalueforusertypemaster'];
fillpage($page);
}
else
{
$queryScreenupdate=mysql_query("update usertypemaster set UserType='$screenname' where UserId='$UserId'",$con);
if($queryScreenupdate) echo "<script langauge=\"javascript\">alert('Updated Successfully!')</script>";
$page=$_SESSION['pagevalueforusertypemaster'];
fillpage($page);
}
}

/***********************Delete Button Code******************************/
if(isset($_POST['btndelete']))
{
deletefill();
$screenfordelete=$_POST['btndelete'];
$_SESSION['screenfordelete']=$screenfordelete;
echo "<script langauge=\"javascript\">var result=confirm('Are You Sure Want to Delete');if(result){val='delete';self.location='userrolemaster.php?cat=' + val;}else{val='dontdelete';self.location='userrolemaster.php?cat=' + val;}</script>";
}
/*****************************Deleet Button Code Ends***********************/

function deletefill()
{
$page=$_SESSION['pagevalueforusertypemaster'];
fillpage($page);
}


@$cat=$_GET['cat'];
if(isset($cat) and strlen($cat) == 6)
{
$screendelete=$_SESSION['screenfordelete'];
$screenarray=array_keys($screendelete);
$queryScreenRights=mysql_query("select count(UserId) from screenrights where UserId='$screenarray[0]'",$con);
$ScreenrightsTab=mysql_result($queryScreenRights,0);

if($ScreenrightsTab==0)
{
$queryscreendelete=mysql_query("delete from usertypemaster where UserId='$screenarray[0]'",$con);
if($queryscreendelete) echo "<script langauge=\"javascript\">alert('Successfully Deleted!')</script>";
$page=$_SESSION['pagevalueforusertypemaster'];
fillpage($page);
}
else
{
$tab='';
if($ScreenrightsTab > 0){$tab="Screen Rights";}
echo "<script type=\"text/javascript\">alert(\"This Data is in Use in the following forms : $tab\")</script>";
$page=$_SESSION['pagevalueforusertypemaster'];
fillpage($page);
}

}
else if(isset($cat) and strlen($cat) == 10)
{
$page=$_SESSION['pagevalueforusertypemaster'];
fillpage($page);
}
?>







