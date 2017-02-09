<?php
include "./images/dbconnection.php";
?>
<html>

<head>
  <title></title>
<link rel="stylesheet" href="./Images/heoscss.css">
<script language="javascript">

function moveForward(){
var left=document.getElementById('coursecodelist1');
var right=document.getElementById('coursecodelist2');
var list=document.getElementById('list'); var bind='';
for(i=0;i<left.options.length;i++) if(left.options[i].selected==true){ f=1;
for(j=0;j<right.options.length;j++)
if(left.options[i].text==right.options[j].text) f=0;
if(f) { var objOption = new Option(left.options[i].text,left.options[i].value);
document.getElementById('coursecodelist2').options.add(objOption); }  }
list.value=''; for(k=0;k<right.options.length;k++) bind=bind+right.options[k].text+'.';
list.value=bind;
}

function moveBackward()
{
var right=document.getElementById('coursecodelist2');
var list=document.getElementById('list');  var bind='';
for(j=0;j<right.options.length;j++) if(right.options[j].selected==true) right.remove(right.selectedIndex);
list.value=''; for(k=0;k<right.options.length;k++) bind=bind+right.options[k].text+'.';
list.value=bind;
}
function btover(obj,cname){ obj.className=cname; }
</script>
</head>

<body>

<?php


echo "<form method=post><table align=center border=0 cellspacing=1 cellpadding=0>
<tr><th colspan=3>Current Intake Settings</th</tr>
<tr><td><select multiple name='coursecodelist1' id='coursecodelist1' size=5>";
$result=mysql_query("select * from cohortdetails order by CohortID desc");
while($re=mysql_fetch_array($result)){ $intake=$re["Intake"]; print"<option value='$intake'>$intake</option>"; }
print "</select></td><td><input type='button' value='---->' onClick='moveForward();'><br>
<br><input type='button' value='<----' onClick='moveBackward();'></td>
<td><select multiple name='coursecodelist2' id='coursecodelist2' size=5>";
$result=mysql_query("select * from currentintakelist order by recordid desc"); $Ilist='';
while($re=mysql_fetch_array($result)){ $intake=$re["intake"]; $Ilist=$Ilist.'.'.$intake; print"<option value='$intake'>$intake</option>"; }
print "</select><input type='hidden' name='list' id='list' value='$Ilist'></td></tr>
<tr><td align=center colspan=3><input type='submit' name='setintakes' id='setintakes' value='Set Intakes'></td></tr>
</table></form>";

if(isset($_POST['setintakes'])){

$Ilist=$_POST['list']; $AIlist=explode('.',$Ilist);
$delete=mysql_query("delete from currentintakelist");
foreach($AIlist as $k=>$intake) if(!empty($intake)) $insert=mysql_query("insert into currentintakelist values('0','$intake')");
print "<script language='javascript'>self.location='currentintakes.php';</script>";
}


?>

</body>

</html>
