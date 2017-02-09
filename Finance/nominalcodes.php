<?php session_start(); ?>
<html><head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="../Style/heoscss.css" rel="stylesheet" type="text/css">
<title>Nominal Names</title>
<script language="javascript"> function changeimage(obj,c){ obj.className=c; } </script>
</head>

<?php
print "<form method=\"post\"><table border=0 cellspacing=1 cellpadding=0>
<tr><th colspan=2>Nominal Codes</th></tr>
<tr><td>Nominal Code</td><td><input type=\"text\" name=\"nominalcode\" onKeyPress=\"return keyRestrict(event,'abcdefghijklmnopqrstuvwxyz0123456789 '+String.fromCharCode(241))\"></td></tr>
<tr><td>Nominal Name</td><td><input type=\"text\" name=\"nominalname\" onKeyPress=\"return keyRestrict(event,'abcdefghijklmnopqrstuvwxyz0123456789 '+String.fromCharCode(241))\"></td></tr>
<tr><td align=center colspan=2><input type=\"submit\" name=\"btnsubmit\"value=\"Add\" class=\"buttonstatic\" onmouseover=\"changeimage(this,'buttonover');\" onmouseout=\"changeimage(this,'buttonstatic');\"></td>
</tr></table></form>";

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
$nominalcode=$_POST['nominalcode'];
$nominalname=$_POST['nominalname'];
$con=mysql_connect("192.168.15.24","root","admin"); $db=mysql_select_db("heos",$con);
$queryscreencount=mysql_query("select count(nominalcode) from nominalcodes where nominalcode='$nominalcode'",$con);
$screencount=mysql_result($queryscreencount,0);

if($screencount==0)
{
$queryscreeninsert=mysql_query("insert into  nominalcodes values('','$nominalcode','$nominalname')",$con);
if($queryscreeninsert) echo "<script langauge=\"javascript\">alert('Successfully Inserted')</script>";
screenfil();
}
else if($screencount>0)
{
echo "<script langauge=\"javascript\">alert('Nominal Code Already Exists')</script>";
screenfil();
}
}


function fillpage($page)
{
@$cat=$_GET['cat'];
$_SESSION['pagevalueforscreenmaster']=$page;
$page  = (int) $page;
$limit = 10;
$con=mysql_connect("192.168.15.24","root","admin");
$db=mysql_select_db("heos",$con);
$result = mysql_query("select count(*) from nominalcodes",$con);
$total = mysql_result($result, 0);
$pager  = getPagerData($total, $limit, $page);
if($total==0){$offset=0;}
else{$offset = $pager->offset;}
$limit  = $pager->limit;
$page   = $pager->page;
$queryselectscreen="select * from nominalcodes order by nominalcode limit $offset,$limit";
$queryselectscreenexec=mysql_query($queryselectscreen,$con);

print "<form method=\"post\">
<br><table border=0 cellspacing=1 cellpadding=0>
<tr><th>S.No</th><th>Nominal Codee</th><th>Nominal Name</th><th>&nbsp;</th></tr>\n";
$sno=1;
while($Fetch=mysql_fetch_array($queryselectscreenexec))
{
$screenid=$Fetch["nominalcode"];
$screenname=$Fetch["nominalname"];
print "<tr><td name=d[] value=\"$sno\">$sno</td><td>$screenid</td>
<td>$screenname</td><input type=\"hidden\" name=\"screenid[]\" value=\"$screenid\"><td>
<input type=\"submit\" name=\"btnedit[$screenid]\" value=\"Edit\" class=\"buttonstatic\" onmouseover=\"changeimage(this,'buttonover');\" onmouseout=\"changeimage(this,'buttonstatic');\">
&nbsp;<input type=\"submit\" name=\"btndelete[$screenid]\"  value=\"Delete\" class=\"buttonstatic\" onmouseover=\"changeimage(this,'buttonover');\" onmouseout=\"changeimage(this,'buttonstatic');\"></td></tr>\n";
$sno=$sno+1;
}
print "<tr><td align=\"center\" colspan=\"4\">\n";
if ($page == 1) // this is the first page - there is no previous page
echo "Previous";
else            // not the first page, link to the previous page
echo "<a href=\"nominalcodes.php?page=" . ($page - 1) . "\">Previous</a>";
print " ||  \n";
if ($page == $pager->numPages) // this is the last page - there is no next page
echo "Next";
else            // not the last page, link to the next page
echo "<a href=\"nominalcodes.php?page=" . ($page + 1) . "\">Next</a>";
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
$con=mysql_connect("192.168.15.24","root","admin"); $db=mysql_select_db("heos",$con);
$result =mysql_query("select count(*) from nominalcodes",$con);
$total = mysql_result($result, 0);
$pager  = getPagerData($total, $limit, $page);
$offset = $pager->offset;
$limit  = $pager->limit;
$page   = $pager->page;
$arrayscreen=$_SESSION['screenafteredit'];
$queryselectScreen ="select * from nominalcodes order by nominalcode limit $offset,$limit";
$queryselectScreenexec=mysql_query($queryselectScreen,$con);
print "<form method=\"post\">
<br><table border=0 cellspacing=1 cellpadding=0>
<tr><th>S.No</th><th>Nominal Codee</th><th>Nominal Name</th><th>&nbsp;</th></tr>\n";
$sno=1;
while($EFetch=mysql_fetch_array($queryselectScreenexec))
{
$screenid=$EFetch["nominalcode"];
$screenname=$EFetch["nominalname"];
if(array_key_exists($screenid,$arrayscreen))
{
print "<tr><input type=\"hidden\" name=\"screenid[]\" value=\"$screenid\"><td name=d[] value=$sno>$sno</td><td>$screenid</td>
<td><input type=\"text\" name=\"screenname[]\" onKeyPress=\"return keyRestrict(event,'abcdefghijklmnopqrstuvwxyz0123456789 '+String.fromCharCode(241))\"  value=\"$screenname\"/></td>
<td><input type=\"submit\" name=\"btnupdate[$screenid]\" value=\"Update\" class=\"buttonstatic\" onmouseover=\"changeimage(this,'buttonover');\" onmouseout=\"changeimage(this,'buttonstatic');\">
&nbsp;<input type=\"submit\" name=\"btncancel[]\" value=\"Cancel\" class=\"buttonstatic\" onmouseover=\"changeimage(this,'buttonover');\" onmouseout=\"changeimage(this,'buttonstatic');\"></td></tr>\n";
}
else
{
print "<tr>
<input type=\"hidden\" name=\"screenid1[]\" value=\"$screenid\">
<td name=d[] value=$sno>$sno</td><td>$screenid</td><td>$screenname</td>
<td><input type=\"submit\" disabled name=\"btnupdate[$screenid]\" value=\"Edit\" class=\"buttonstatic\" onmouseover=\"changeimage(this,'buttonover');\" onmouseout=\"changeimage(this,'buttonstatic');\">
&nbsp;<input type=\"submit\" disabled name=\"btndelete[$screenid]\" value=\"Delete\" class=\"buttonstatic\" onmouseover=\"changeimage(this,'buttonover');\" onmouseout=\"changeimage(this,'buttonstatic');\"></td></tr>\n";
}
$sno=$sno+1;
}
print "<tr><td align=\"center\" colspan=\"4\">\n";
if ($page == 1) // this is the first page - there is no previous page
echo "Previous";
else            // not the first page, link to the previous page
echo "<a href=\"nominalcodes.php?page=" . ($page - 1) . "\">Previous</a>";
print " ||  \n";
if ($page == $pager->numPages) // this is the last page - there is no next page
echo "Next";
else            // not the last page, link to the next page
echo "<a href=\"nominalcodes.php?page=" . ($page + 1) . "\">Next</a>";
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
$con=mysql_connect("192.168.15.24","root","admin"); $db=mysql_select_db("heos",$con);
$queryScreenupdate=mysql_query("update nominalcodes set nominalname='$screenname' where nominalcode='$screenid'",$con);
if($queryScreenupdate) echo "<script langauge=\"javascript\">alert('Updated Successfully!')</script>";
$page=$_SESSION['pagevalueforscreenmaster'];
fillpage($page);
}

/***********************Delete Button Code******************************/
if(isset($_POST['btndelete']))
{
deletefill();
$screenfordelete=$_POST['btndelete'];
$_SESSION['screenfordelete']=$screenfordelete;
echo "<script langauge=\"javascript\">var result=confirm('Are You Sure Want to Delete');if(result){val='delete';self.location='nominalcodes.php?cat=' + val;}else{val='dontdelete';self.location='nominalcodes.php?cat=' + val;}</script>";
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
$con=mysql_connect("192.168.15.24","root","admin"); $db=mysql_select_db("heos",$con);
$queryscreendelete=mysql_query("delete from nominalcodes where nominalcode='$screenarray[0]'",$con);
if($queryscreendelete) echo "<script langauge=\"javascript\">alert('Successfully Deleted!')</script>";
$page=$_SESSION['pagevalueforscreenmaster'];
fillpage($page);
}
else if(isset($cat) and strlen($cat) == 10)
{
$page=$_SESSION['pagevalueforscreenmaster'];
fillpage($page);
}
?>







