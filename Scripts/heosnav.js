var activeSub=0;
var SubNum=0;

function reDo(){ window.location.reload() }
window.onresize = reDo;
//Define global variables

var timerID = null;
var timerOn = false;
var timecount = 200;
var what = null;
var newbrowser = true;
var check = false;

function init(){
if(document.layers) { layerRef="document.layers"; styleSwitch=""; visibleVar="show";
screenSize = window.innerWidth; what ="ns4";
}else if(document.all){
layerRef="document.all";
styleSwitch=".style";
visibleVar="visible";
screenSize = document.body.clientWidth;
what ="ie";

}else if(document.getElementById){
layerRef="document.getElementByID";
styleSwitch=".style";
visibleVar="visible";
what="moz";
}else{
what="none";
newbrowser = false;
}


window.status='status bar text to go here';
check = true;
}

// Turns the layers on and off
function showLayer(layerName,obj){
if(check){
if(what =="none") return;
else if(what == "moz") document.getElementById(layerName).style.visibility="visible";
else eval(layerRef+'["'+layerName+'"]'+styleSwitch+'.visibility="visible"');
var x=obj.offsetLeft; var y=obj.offsetTop;
document.getElementById(layerName).style.left=x+20; document.getElementById(layerName).style.top=(y+76);
}
else return;
}

function hideLayer(layerName){
if(check){
if(what =="none") return;
else if(what == "moz") document.getElementById(layerName).style.visibility="hidden";
else eval(layerRef+'["'+layerName+'"]'+styleSwitch+'.visibility="hidden"');
}
else return;
}


function hideAll(){
hideLayer('layer1');
hideLayer('layer2');
hideLayer('layer3');
}


function startTime() {
if(timerOn == false) { timerID=setTimeout( "hideAll()" , timecount); timerOn = true; }
}


function stopTime() {
if(timerOn) { clearTimeout(timerID); timerID = null; timerOn = false; }
}

function onLoad(){ init(); }
