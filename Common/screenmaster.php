<?php session_start();
include "../DataBase/dbconnection.php";
?>
<html><head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="../Style/heoscss.css" rel="stylesheet" type="text/css">
<title>Screen Master</title>
<script language="javascript"> function changeimage(obj,c){ obj.className=c; } </script>
</head>

<?php
print "<body><form action=\"screenmaster.php\" method=\"post\">
<table border=0 cellspacing=1 cellpadding=0 align=center>
<tr><th colspan=3>Screen Master</th></tr>
<tr><td>Screen Name</td><td><input type=\"text\" name=\"screenname\" onKeyPress=\"return keyRestrict(event,'abcdefghijklmnopqrstuvwxyz0123456789 '+String.fromCharCode(241))\"></td>
<td><input type=\"submit\" name=\"btnsubmit\" value=\"Add\"></td>
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
if(!isset($_SESSION['pagevalueforscreenmaster']))
{
$page=1;
$_SESSION['pagevalueforscreenmaster']=$page;
fillpage($page);
}
else
{
$page=$_SESSION['pagevalueforscreenmaster'];
$_SESSION['pagevalueforscreenmaster']=$page;
}
}
else
{
$page=$_SESSION['pagevalueforscreenmaster'];
fillpage($page);
}
}
else
{
$page = $_GET['page'];
$_SESSION['pagevalueforscreenmaster']=$page;
fillpage($page);
}
}


if(isset($_POST['btnsubmit']))
{
$screenname=$_POST['screenname'];
$queryscreencount=$GLOBALS['db']->query("select count(ScreenName) from screenmaster where ScreenName='$screenname'")->rows;
$screencount=$queryscreencount[0][0];

if($screencount==0)
{
$queryscreeninsert=$GLOBALS['db']->query("insert into  screenmaster values('','$screenname')")->rows;
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
$_SESSION['pagevalueforscreenmaster']=$page;
$page  = (int) $page;
$limit = 10;
$result = $GLOBALS['db']->query("select count(screenid) as screens from screenmaster")->rows;
$total = $result[0]['screens'];
$pager  = getPagerData($total, $limit, $page);
if($total==0){$offset=0;}
else{$offset = $pager->offset;}
$limit  = $pager->limit;
$page   = $pager->page;

print "<form action=\"screenmaster.php\" method=\"post\" style=\"position:center; top:0px; left: 0px;\">
<br><table border=0 cellspacing=1 cellpadding=0 align=center>
<tr><th>S.No</th><th>Sreen Name</th><th colspan=2>&nbsp;</th></tr>\n";
$screenmasters = $GLOBALS['db']->query("select * from screenmaster order by ScreenName limit $offset,$limit")->rows;
$sno=1;
foreach($screenmasters as $screenmaster) {
    $screenid=$screenmaster["ScreenId"];
    $screenname=$screenmaster["ScreenName"];
    print "<tr><td name=d[] value=\"$sno\">$sno</td>
    <td>$screenname</td><input type=\"hidden\" name=\"screenid[]\" value=\"$screenid\"><td>
    <input type=\"submit\" name=\"btnedit[$screenid]\" value=\"Edit\"></td>
    <td><input type=\"submit\" name=\"btndelete[$screenid]\"  value=\"Delete\"></td></tr>\n";
    $sno=$sno+1;
}
print "<tr><td align=\"center\" colspan=\"4\">\n";
if ($page == 1) // this is the first page - there is no previous page
echo "Previous";
else            // not the first page, link to the previous page
echo "<a href=\"screenmaster.php?page=" . ($page - 1) . "\">Previous</a>";
print " ||  \n";
if ($page == $pager->numPages) // this is the last page - there is no next page
echo "Next";
else            // not the last page, link to the next page
echo "<a href=\"screenmaster.php?page=" . ($page + 1) . "\">Next</a>";
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
$page=$_SESSION['pagevalueforscreenmaster'];
$limit = 10;
$result =$GLOBALS['db']->query("select count(screenid) as screenid from screenmaster")->rows;
$total = $result[0]["screenid"];
$pager  = getPagerData($total, $limit, $page);
$offset = $pager->offset;
$limit  = $pager->limit;
$page   = $pager->page;
$arrayscreen=$_SESSION['screenafteredit'];
$queryselectScreen ="select * from screenmaster order by ScreenName limit $offset,$limit";
$queryselectScreenexec=$GLOBALS['db']->query($queryselectScreen)->rows;
print "<form action=\"screenmaster.php\" method=\"post\">
<br><table align=center border=0 cellspacing=1 cellpadding=0>
<tr><th>S.No</th><th>Screen Name</th><th colspan=2>&nbsp;</th></tr>\n";
$sno=1;
foreach($queryselectScreenexec as $EFetch) {
$screenid=$EFetch["ScreenId"];
$screenname=$EFetch["ScreenName"];
if(array_key_exists($screenid,$arrayscreen))
{
print "<tr><input type=\"hidden\" name=\"screenid[]\" value=\"$screenid\"><td name=d[] value=$sno>$sno</td>
<td><input width=\"2\" type=\"text\" name=\"screenname[]\" onKeyPress=\"return keyRestrict(event,'abcdefghijklmnopqrstuvwxyz0123456789 '+String.fromCharCode(241))\"  value=\"$screenname\"/></td>
<td><input type=\"submit\" name=\"btnupdate[$screenid]\" value=\"Update\"></td>
<td><input type=\"submit\" name=\"btncancel[]\" value=\"Cancel\"></td></tr>\n";
}
else
{
print "<tr>
<input type=\"hidden\" name=\"screenid1[]\" value=\"$screenid\">
<td name=d[] value=$sno>$sno</td><td>$screenname</td>
<td><input type=\"submit\" disabled name=\"btnupdate[$screenid]\" value=\"Edit\"></td>
<td><input type=\"submit\" disabled name=\"btndelete[$screenid]\" value=\"Delete\"></td></tr>\n";
}
$sno=$sno+1;
}
print "<tr><td align=\"center\" colspan=\"4\">\n";
if ($page == 1) // this is the first page - there is no previous page
echo "Previous";
else            // not the first page, link to the previous page
echo "<a href=\"screenmaster.php?page=" . ($page - 1) . "\">Previous</a>";
print " ||  \n";
if ($page == $pager->numPages) // this is the last page - there is no next page
echo "Next";
else            // not the last page, link to the next page
echo "<a href=\"screenmaster.php?page=" . ($page + 1) . "\">Next</a>";
print "<br>$page of $pager->numPages</td></tr></table></form>\n";
}


/***********************Cancel Button Code******************************/
if(isset($_POST['btncancel']))
{
$page=$_SESSION['pagevalueforscreenmaster'];
fillpage($page);
}

if(isset($_POST['btnupdate']))
{
$flag=0;
$screenidforupdate=$_POST['btnupdate'];
$screenname=$_POST['screenname'][0];
$screenidarray=array();
$screenidarray=array_keys($screenidforupdate);
$screenid=$screenidarray[0];
$queryscreenexist=$GLOBALS['db']->query("select count(screenid) as screenid from screenmaster where ScreenName='$screenname'")->rows;
$screencount=$queryscreenexist[0]["screenid"];
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
echo "<script langauge=\"javascript\">alert('Enter The Screen Name')</script>";
editfill();
}
else if($flag==1)
{
echo "<script langauge=\"javascript\">alert('Special Characters in Screen Name')</script>";
editfill();
}
else if($screencount>0)
{
echo "<script langauge=\"javascript\">alert('Screen Name Already exists')</script>";
$page=$_SESSION['pagevalueforscreenmaster'];
fillpage($page);
}
else
{
$queryScreenupdate=$GLOBALS['db']->query("update screenmaster set ScreenName='$screenname' where ScreenId='$screenid'");
if($queryScreenupdate) echo "<script langauge=\"javascript\">alert('Updated Successfully!')</script>";
$page=$_SESSION['pagevalueforscreenmaster'];
fillpage($page);
}
}

/***********************Delete Button Code******************************/
if(isset($_POST['btndelete']))
{
deletefill();
$screenfordelete=$_POST['btndelete'];
$_SESSION['screenfordelete']=$screenfordelete;
echo "<script langauge=\"javascript\">var result=confirm('Are You Sure Want to Delete');if(result){val='delete';self.location='screenmaster.php?cat=' + val;}else{val='dontdelete';self.location='screenmaster.php?cat=' + val;}</script>";
}
/*****************************Deleet Button Code Ends***********************/

function deletefill()
{
$page=$_SESSION['pagevalueforscreenmaster'];
fillpage($page);
}


@$cat=$_GET['cat'];
if(isset($cat) and strlen($cat) == 6)
{
$screendelete=$_SESSION['screenfordelete'];
$screenarray=array_keys($screendelete);
$queryScreenRights=$GLOBALS['db']->query("select count(ScreenId) from screenrights where ScreenId='$screenarray[0]'")->rows;
$ScreenrightsTab=$queryScreenRights[0][0];

if($ScreenrightsTab==0)
{
$queryscreendelete=$GLOBALS['db']->query("delete from screenmaster where ScreenId='$screenarray[0]'")->rows;
if($queryscreendelete) echo "<script langauge=\"javascript\">alert('Successfully Deleted!')</script>";
$page=$_SESSION['pagevalueforscreenmaster'];
fillpage($page);
}
else
{
$tab='';
if($ScreenrightsTab > 0){$tab="Screen Rights";}
echo "<script type=\"text/javascript\">alert(\"This Data is in Use in the following forms : $tab\")</script>";
$page=$_SESSION['pagevalueforscreenmaster'];
fillpage($page);
}

}
else if(isset($cat) and strlen($cat) == 10)
{
$page=$_SESSION['pagevalueforscreenmaster'];
fillpage($page);
}
?>







