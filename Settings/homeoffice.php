<html>
<head>
<title>Home Office</title>
<link href="../Style/heoscss.css" rel="stylesheet" type="text/css">
<script language="javascript">
function letterslots(){
var sobj=document.getElementById('sessions');
var wobj=document.getElementById('warningletter');
document.getElementById('SubHomeOffice').disabled=true;
tobj=document.getElementById('homeTable').rows;
if(tobj.length>3) for(i=2;i<=tobj.length-1;i++) document.getElementById('homeTable').deleteRow(i);
if(sobj.value<=0 ||(sobj.value<wobj.value) ||wobj.value<=0){ document.getElementById('warningletter').value=''; return false; }

for(i=1;i<=wobj.value;i++){
var tobj=document.getElementById('homeTable').rows;
var row=tobj.length-2;
var robj=tobj.insertRow(1);
c1=robj.insertCell(0);
c2=robj.insertCell(1);

}
document.getElementById('SubHomeOffice').disabled=false;
}
</script>
</head>

<body>
<?php
//  c1.innerHTML="Letter "+i; c2.innerHTML="<input type='text' name='warning["+(i-1)+"]' size=3>";
print"<form method='post'>
<table id='homeTable' name='homeTable' border=0 align='center'>
<tr><th align='left'>Session / Slot</th><td><input type='text' name='sessions' id='sessions' size=3 onKeyUp='letterslots();'></td></tr>
<tr><th align='left'>Number of Warning Letters</th><td><input type='text' name='warningleter' id='warningletter' size=3 onKeyUp='letterslots();'></td></tr>
<tr><td colspan='2' align='center'><input type='submit' name='SubHomeOffice' id='SubHomeOffice' value='Submit' disabled></div></td></tr>
</table>
</form>";
?>
</body>
</html>
