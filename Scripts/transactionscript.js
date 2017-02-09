if (document.all){
document.onkeydown = function (){
var key_f5 = 116; key_enter = 13; // 116 = F5, 13 = enter
if(key_f5==event.keyCode){ event.keyCode=0; alert ("Not Allowed"); return false; }
//if(key_enter==event.keyCode){ event.keyCode=0; alert ("Not Allowed"); return false; }
}
}

function getKeyCode(e){
if (window.event) return window.event.keyCode;
else if (e) return e.which; else return null;
}

function keyRestrict(e, validchars) {
var key='', keychar='';
key = getKeyCode(e);
if (key == null) return true;
keychar = String.fromCharCode(key);
keychar = keychar.toLowerCase();
validchars = validchars.toLowerCase();
if (validchars.indexOf(keychar) != -1) return true;
if ( key==null || key==0 || key==8 || key==9 || key==13 || key==27 ) return true;
return false;
}

function isMadeSelection(elem, helperMsg){
if(elem.value == "none" || elem.value == ""){ alert(helperMsg); elem.focus(); return false; }
else { return true; }
}

function isEmpty(elem,helperMsg){
var elem1 = Trim(elem.value);
if(elem1.length == 0 || elem1 == 0){ alert(helperMsg); elem.focus(); return false; }
else { return true; }
}


function isNumeric(elem, helperMsg){
var numericExpression = /^[0-9\.]+$/;
if(elem.value.match(numericExpression)){ return true; }
else { alert(helperMsg); elem.value=""; elem.focus(); return false; }
}

function Trim(TRIM_VALUE){
if(TRIM_VALUE.length < 1){ return""; }
TRIM_VALUE = RTrim(TRIM_VALUE);
TRIM_VALUE = LTrim(TRIM_VALUE);
if(TRIM_VALUE==""){ return""; }
else { return TRIM_VALUE; }
}

function RTrim(VALUE){
var w_space = String.fromCharCode(32);
var v_length = VALUE.length;
var strTemp = "";
if(v_length < 0){ return""; }
var iTemp = v_length -1;
while(iTemp > -1){
if(VALUE.charAt(iTemp) == w_space){ }
else { strTemp = VALUE.substring(0,iTemp +1); break; }
iTemp = iTemp-1; }
return strTemp;
}

function LTrim(VALUE){
var w_space = String.fromCharCode(32);
if(v_length < 1){ return""; }
var v_length = VALUE.length;
var strTemp = "";
var iTemp = 0;
while(iTemp < v_length){ if(VALUE.charAt(iTemp) == w_space){ }
else { strTemp = VALUE.substring(iTemp,v_length); break; }
iTemp = iTemp + 1; }
return strTemp;
}

function emailValidator(elem, helperMsg){
if(elem.value.length == 0) return true;
else {
var emailExp = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
if(elem.value.match(emailExp)) return true;
else { alert(helperMsg); elem.value=''; elem.focus(); return false; } }
}

// Application entry validation

function entryValidation(){
var obj1=document.getElementById('titletext');
var obj2=document.getElementById('firstnametext');
var obj6=document.getElementById('levelofeducationcom');
var obj7=document.getElementById('courseappliedcom');
var obj8=document.getElementById('mailidtext');
var obj9=document.getElementById('confirmmailidtext');
var obj10=document.getElementById('countrytext');
if(isMadeSelection(obj1,'select the Title')){
if(isEmpty(obj2,'Name is Missing')){
if(isMadeSelection(obj6,'select the Level of Education')){
if(isMadeSelection(obj7,'select the Course Name')){
if(isEmpty(obj8,'E-mail is Missing')){
if(emailValidator(obj8,'Invalid E-mail format')){
if((obj8.value==obj9.value)?1:0){
if(isMadeSelection(obj10,'select the country residing')) return true;
} else { alert('Email Mismatch'); obj9.value=""; obj9.focus(); } } } } } } }
return false;
}

// Application validation
function applicationValidation(){
var obj1=document.getElementById('');
var obj2=document.getElementById('');
var obj3=document.getElementById('');
var obj4=document.getElementById('');
var obj5=document.getElementById('');
var obj6=document.getElementById('');
var obj7=document.getElementById('');
var obj8=document.getElementById('');
var obj9=document.getElementById('');
var obj10=document.getElementById('');
var obj11=document.getElementById('');
var obj12=document.getElementById('');
var obj13=document.getElementById('');
var obj14=document.getElementById('');
var obj15=document.getElementById('');
var obj16=document.getElementById('');
var obj17=document.getElementById('');
var obj18=document.getElementById('');
var obj19=document.getElementById('');
var obj20=document.getElementById('');
var obj21=document.getElementById('');
var obj22=document.getElementById('');
var obj23=document.getElementById('');
var obj24=document.getElementById('');
var obj25=document.getElementById('');
var obj26=document.getElementById('');
var obj27=document.getElementById('');
var obj28=document.getElementById('');
}
