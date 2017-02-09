if (document.all){
document.onkeydown = function (){
var key_f5 = 116; // 116 = F5
if(key_f5==event.keyCode){ event.keyCode=0; return false; } }
}

function isEmpty(elem,helperMsg){
if(elem.value.length == 0){ alert(helperMsg); elem.focus(); return false; }
else return true; }

function isAlphabet(elem, helperMsg){
var alphaExp = /^[a-zA-Z\.]+$/;
if(elem.value.match(alphaExp)) return true;
else { alert(helperMsg); elem.focus(); return false; }
}

function isNumeric(elem, helperMsg){
var numericExpression = /^[0-9]+$/;
if(elem.value.match(numericExpression)) return true;
else { alert(helperMsg); elem.focus(); return false; }
}

function emailValidator(elem, helperMsg){
if(elem.value.length == 0) return true;
else {
var emailExp = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
if(elem.value.match(emailExp)) return true;
else { alert(helperMsg); elem.focus(); return false; } }
}

// application entry validation
function entryValidation(){

}
