<?php session_start(); include "../DataBase/dbconnection.php"; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Level Master</title>
<script language="javascript">
function changeimage(obj,c){ obj.className=c; }
function levelValid(obj){ if(obj.value==""){ alert('Level Should not be Empty'); return false; } else return true;  }
</script>
<link href="../Style/heoscss.css" rel="stylesheet" type="text/css" />
</head>

<body>
<form id="form1" name="form1" method="post">
  <table border="0">
    <tr>
      <th colspan="2">Level Master</th>
    </tr>
    <tr>
      <td>Level Name</td>
      <td><label>
        <input type="text" name="levelname" id="levelname" />
      </label></td>
    </tr>
    <tr>
      <td colspan="2"><div align="center">
        <label>
        <input type="submit" name="btnsubmit" value="Submit" onclick="return levelValid(document.getElementById('levelname'));" class="buttonstatic" onmouseover="changeimage(this,'buttonover');" onmouseout="changeimage(this,'buttonstatic');" />
        </label>
      </div></td>
    </tr>
  </table>
</form>
</body>
</html>
<?php 

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
if(!isset($_SESSION['pagevalueforlevelmaster']))
{
$page=1;
$_SESSION['pagevalueforlevelmaster']=$page;
fillpage($page);
}
else
{
$page=$_SESSION['pagevalueforlevelmaster'];
$_SESSION['pagevalueforlevelmaster']=$page;
}
}
else
{
$page=$_SESSION['pagevalueforlevelmaster'];
fillpage($page);
}
}
else
{
$page = $_GET['page'];
$_SESSION['pagevalueforlevelmaster']=$page;
fillpage($page);
}
}


if(isset($_POST['btnsubmit']))
{
$screenname=$_POST['levelname'];

$queryscreencount=mysql_query("select count(levelname) from levelmaster where levelname='$screenname'");
$screencount=mysql_result($queryscreencount,0);

if($screencount==0)
{
$queryscreeninsert=mysql_query("insert into levelmaster values('0','$screenname')");
if($queryscreeninsert) echo "<script langauge='javascript'>alert('Successfully Inserted')</script>";
screenfil();
}
else if($screencount>0)
{
echo "<script langauge='javascript'>alert('Level Already Exists')</script>";
screenfil();
}
}


function fillpage($page)
{
@$cat=$_GET['cat'];
$_SESSION['pagevalueforlevelmaster']=$page;
$page  = (int) $page;
$limit = 10;

$result = mysql_query("select count(*) from levelmaster");
$total = mysql_result($result, 0);
$pager  = getPagerData($total, $limit, $page);
if($total==0){$offset=0;}
else{$offset = $pager->offset;}
$limit  = $pager->limit;
$page   = $pager->page;
$queryselectscreen="select * from levelmaster order by levelname limit $offset,$limit";
$queryselectscreenexec=mysql_query($queryselectscreen);
if(mysql_num_rows($queryselectscreenexec)){
print "<form method='post'>
<br><table border=0 cellspacing=1 cellpadding=0>
<tr><th>S.No</th><th>Level Name</th><th colspan=2>&nbsp;</th></tr>\n";
$sno=1;
while($Fetch=mysql_fetch_array($queryselectscreenexec))
{
$screenid=$Fetch["recordid"];
$screenname=$Fetch["levelname"];
print "<tr><td name=d[] value='$sno'>$sno</td>
<td>$screenname</td><input type='hidden' name='screenid[]' value='$screenid'><td>
<input type='submit' name='btnedit[$screenid]' value='Edit'></td></tr>\n";
$sno=$sno+1;
}
print "<tr><td align='center' colspan='4'>\n";
if ($page == 1) // this is the first page - there is no previous page
echo "Previous";
else            // not the first page, link to the previous page
echo "<a href='levels?page=" . ($page - 1) . "'>Previous</a>";
print " ||  \n";
if ($page == $pager->numPages) // this is the last page - there is no next page
echo "Next";
else            // not the last page, link to the next page
echo "<a href='levels?page=" . ($page + 1) . "'>Next</a>";
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
$_SESSION['screenafteredit']=$screencount;
editfill();
}


function editfill()
{
$page=$_SESSION['pagevalueforlevelmaster'];
$limit = 10;

$result =mysql_query("select count(*) from levelmaster");
$total = mysql_result($result, 0);
$pager  = getPagerData($total, $limit, $page);
$offset = $pager->offset;
$limit  = $pager->limit;
$page   = $pager->page;
$arrayscreen=$_SESSION['screenafteredit'];
$queryselectScreen ="select * from levelmaster order by levelname limit $offset,$limit";
$queryselectScreenexec=mysql_query($queryselectScreen);
print "<form method='post'>
<br><table border=0 cellspacing=1 cellpadding=0>
<tr><th>S.No</th><th>Level Name</th><th colspan=2>&nbsp;</th></tr>\n";
$sno=1;
while($EFetch=mysql_fetch_array($queryselectScreenexec))
{
$screenid=$EFetch["recordid"];
$screenname=$EFetch["levelname"];
if(array_key_exists($screenid,$arrayscreen))
{
print "<tr><input type='hidden' name='screenid[]' value='$screenid'><td name=d[] value=$sno>$sno</td>
<td><input width='2' type='text' name='levelname[]' onKeyPress='return keyRestrict(event,'abcdefghijklmnopqrstuvwxyz0123456789 '+String.fromCharCode(241))'  value='$screenname'/></td>
<td><input type='submit' name='btnupdate[$screenid]' value='Update' onclick='return levelValid(document.getElementById('levelname[]'));'>
&nbsp;&nbsp;&nbsp;<input type='submit' name='btncancel[]' value='Cancel'></td></tr>\n";
}
else
{
print "<tr>
<input type='hidden' name='screenid1[]' value='$screenid'>
<td name=d[] value=$sno>$sno</td><td>$screenname</td>
<td><input type='submit' disabled name='btnupdate[$screenid]' value='Edit'></td></tr>\n";
}
$sno=$sno+1;
}
print "<tr><td align='center' colspan='4'>\n";
if ($page == 1) // this is the first page - there is no previous page
echo "Previous";
else            // not the first page, link to the previous page
echo "<a href='levels?page=" . ($page - 1) . "'>Previous</a>";
print " ||  \n";
if ($page == $pager->numPages) // this is the last page - there is no next page
echo "Next";
else            // not the last page, link to the next page
echo "<a href='levels?page=" . ($page + 1) . "'>Next</a>";
print "<br>$page of $pager->numPages</td></tr></table></form>\n";
}


/***********************Cancel Button Code******************************/
if(isset($_POST['btncancel']))
{
$page=$_SESSION['pagevalueforlevelmaster'];
fillpage($page);
}

if(isset($_POST['btnupdate']))
{
$flag=0;
$screenidforupdate=$_POST['btnupdate'];
$screenname=$_POST['levelname'][0];
$screenidarray=array();
$screenidarray=array_keys($screenidforupdate);
$screenid=$screenidarray[0];

$queryscreenexist=mysql_query("select count(*) from levelmaster where levelname='$screenname'");
$screencount=mysql_result($queryscreenexist,0);
$screennamelen=strlen($screenname);

for ($i=0;$i<$screennamelen;$i++)
{
$ch=substr($screenname,$i,1);
if(($ch=="~")||($ch=="`")||($ch=="!")||($ch=="@")||($ch=="#")||($ch=="$")||($ch=="%")||($ch=="^")||($ch=="&")||($ch=="*")||($ch=="(")||($ch==")")||($ch=="-")||($ch=="_")||($ch=="+")||($ch=="=")||($ch=="[")||($ch=="]")||($ch=="{")||($ch=="}")||($ch=="'")||($ch==";")||($ch==":")||($ch=="/")||($ch=="?")||($ch==">")||($ch==",")||($ch=="<")||($ch=="|")||($ch=="%")||($ch=="(")||($ch==")"))
{$flag=1;}
else
{$flag=2;}
}


if(strlen($screenname)==0)
{
echo "<script langauge='javascript'>alert('Enter The Level Name')</script>";
editfill();
}
else if($flag==1)
{
echo "<script langauge='javascript'>alert('Special Characters in Level Name')</script>";
editfill();
}
else if($screencount>0)
{
echo "<script langauge='javascript'>alert('Level Name Already exists')</script>";
$page=$_SESSION['pagevalueforlevelmaster'];
fillpage($page);
}
else
{
$queryScreenupdate=mysql_query("update levelmaster set levelname='$screenname' where recordid='$screenid'");
if($queryScreenupdate) echo "<script langauge='javascript'>alert('Updated Successfully!')</script>";
$page=$_SESSION['pagevalueforlevelmaster'];
fillpage($page);
}
}

/***********************Delete Button Code******************************/
if(isset($_POST['btndelete']))
{
deletefill();
$screenfordelete=$_POST['btndelete'];
$_SESSION['screenfordelete']=$screenfordelete;
echo "<script langauge='javascript'>var result=confirm('Are You Sure Want to Delete');if(result){val='delete';self.location='levels?cat=' + val;}else{val='dontdelete';self.location='levels?cat=' + val;}</script>";
}
/*****************************Deleet Button Code Ends***********************/

function deletefill()
{
$page=$_SESSION['pagevalueforlevelmaster'];
fillpage($page);
}


@$cat=$_GET['cat'];
if(isset($cat) and strlen($cat) == 6)
{
$screendelete=$_SESSION['screenfordelete'];
$screenarray=array_keys($screendelete);

$queryScreenRights=mysql_query("select count(recordid) from screenrights where recordid='$screenarray[0]'");
$ScreenrightsTab=mysql_result($queryScreenRights,0);

if($ScreenrightsTab==0)
{
$queryscreendelete=mysql_query("delete from levelmaster where ScreenId='$screenarray[0]'");
echo "<script langauge='javascript'>alert('Successfully Deleted!')</script>";
$page=$_SESSION['pagevalueforlevelmaster'];
fillpage($page);
}
else
{
$tab='';
if($ScreenrightsTab > 0){$tab="Screen Rights";}
echo "<script type='text/javascript'>alert('This Data is in Use in the following forms : $tab')</script>";
$page=$_SESSION['pagevalueforlevelmaster'];
fillpage($page);
}

}
else if(isset($cat) and strlen($cat) == 10)
{
$page=$_SESSION['pagevalueforlevelmaster'];
fillpage($page);
}
?>
