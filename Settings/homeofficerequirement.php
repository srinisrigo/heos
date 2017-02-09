<html>
<head>
<link href="../Style/heoscss.css" rel="stylesheet" type="text/css">
<script language="javascript">
function letterslots(){ st="<table border=0 cellspacing=0 cellpadding=0>";
var sobj=document.getElementById('sessions'); var wobj=document.getElementById('warningletter');
var step=Math.ceil(sobj.value/wobj.value);
for(i=1;i<=wobj.value;i++){
if((i*step)<sobj.value) st=st+"<tr><td>Warining "+i+"</td><td><input type=text name=\"warning"+i+"\" value=\""+(i*step)+"\" size=3></td></tr>";
else { st=st+"<tr><td>Warining "+i+"</td><td><input type=text name=\"warning"+i+"\" value=\""+(sobj.value)+"\" size=3></td></tr>"; break; }
}
st=st+"</table>";
document.getElementById('slots').innerHTML=st;
}
</script>
</head>
<body>
<?php
print"<form method=POST action=\"homeoffice\">
<table border=0 cellspacing=1 cellpadding=0>
<tr><td>Session</td><td><input type=\"text\" name=\"sessions\" id=\"sessions\" size=3>Slots</td></tr>
<tr><td>No of Warning Letters</td><td><input type=\"text\" name=\"warningleter\" id=\"warningletter\" size=3 onchange=\"letterslots();\"></td></tr></table>
<div id=\"slots\"></div></form>";
?>

</body>

</html>
