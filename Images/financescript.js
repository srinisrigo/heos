if (document.all)
{
     document.onkeydown = function ()
     {
          var key_f5 = 116; // 116 = F5
          var key_enter = 13; //13 = enter
          if(key_f5==event.keyCode)
          {
               event.keyCode=0;
               alert ("You are Not Allowed to Refresh the Page");
               return false;
          }
          if(key_enter==event.keyCode)
          {
               event.keyCode=0;
               alert ("You are Not Allowed to Submit the Page By Enter Button");
               return false;
          }
     }
}

function getKeyCode(e)
{
if (window.event)
return window.event.keyCode;
else if (e)
return e.which;
else
return null;
}
function keyRestrict(e, validchars) {
var key='', keychar='';
key = getKeyCode(e);
if (key == null) return true;
keychar = String.fromCharCode(key);
keychar = keychar.toLowerCase();
validchars = validchars.toLowerCase();
if (validchars.indexOf(keychar) != -1)
return true;
if ( key==null || key==0 || key==8 || key==9 || key==13 || key==27 )
return true;
return false;
}


//////deposit.php

function depositTextArea(){
var ref=document.getElementById('ref').value;
if((ref.split("\n")).length>=5 || ref.length>=120) document.getElementById('mode').focus();
}


function depositValidation()
{
var amount = document.getElementById('damount');
var accountnumber = document.getElementById('accountnumbercombo');
var by = document.getElementById('by');
var ref = document.getElementById('ref');
var mode = document.getElementById('depositmode');

if(isEmpty(amount,"Amount is empty"))
{
if(isNumeric(amount,"Amount in numeric"))
{
if(isMadeSelection(accountnumber,"Account number is not selected"))
{
if(isEmpty(by,"Deposited by field is empty"))
{
if(isEmpty(ref,"Reference field is empty"))
{
if(modeCheckDeposit(mode))
{
return true;
}
}
}
}
}
}
return false;
}


////////Script For pettycash.php file

function pettycashDropAmount(){
var amount = document.getElementById('pcamount');
var balance = document.getElementById('pcprebalance');
var drop = document.getElementById('pcdraw');
document.getElementById('pcdraw').value=amount.value-balance.value;
if(drop.value<0) { drop.value=amount.value; balance.value=0; }
}

function pettycashValidation()
{
var personid = document.getElementById('pcid');
var accountnumber = document.getElementById('accountnumbercombo');
var amount = document.getElementById('pcamount');
var date = document.getElementById('date');

if(isMadeSelection(personid,"Person Id is not selected"))
{
if(isEmpty(amount,"Amount is empty"))
{
if(isNumeric(amount,"Amount in numeric"))
{
if(isEmpty(date,"Date is missing"))
{
if(isMadeSelection(accountnumber,"Account number is not selected"))
{
return true;
}
}
}
}
}
return false;
}


//////Script for purchase.php


function purchaseAddButton(){
var coll=document.getElementById('billtable').rows;
var next=0;
for(var i=1;i<coll.length-4;i++) if(coll[i].style.display=="") next++;
if(coll.length-3>next) { next++; coll[next].style.display=""; }
}

function purchaseCancelButton(){
var coll=document.getElementById('billtable').rows;
var pre=0;
for(var i=1;i<coll.length-4;i++) if(coll[i].style.display=="") pre++;
coll[pre].style.display="none";
var quantity="quantity"+pre;
var price="price"+pre;
var amount="Amount"+pre;
document.getElementById(quantity).value=0;
document.getElementById(price).value=0;
document.getElementById(amount).value=0;
var aobj1=document.getElementById('Amount1'); var aobj11=document.getElementById('Amount11');
var aobj2=document.getElementById('Amount2'); var aobj12=document.getElementById('Amount12');
var aobj3=document.getElementById('Amount3'); var aobj13=document.getElementById('Amount13');
var aobj4=document.getElementById('Amount4'); var aobj14=document.getElementById('Amount14');
var aobj5=document.getElementById('Amount5'); var aobj15=document.getElementById('Amount15');
var aobj6=document.getElementById('Amount6'); var aobj16=document.getElementById('Amount16');
var aobj7=document.getElementById('Amount7'); var aobj17=document.getElementById('Amount17');
var aobj8=document.getElementById('Amount8'); var aobj18=document.getElementById('Amount18');
var aobj9=document.getElementById('Amount9'); var aobj19=document.getElementById('Amount19');
var aobj10=document.getElementById('Amount10'); var aobj20=document.getElementById('Amount20');
var aobj21=document.getElementById('taxamount'); var aobj22=document.getElementById('otheramount');
document.getElementById('billtotal').value=parseFloat(aobj1.value)+parseFloat(aobj2.value)+parseFloat(aobj3.value)+parseFloat(aobj4.value)+parseFloat(aobj5.value)+parseFloat(aobj6.value)+parseFloat(aobj7.value)+parseFloat(aobj8.value)+parseFloat(aobj9.value)+parseFloat(aobj10.value)+parseFloat(aobj11.value)+parseFloat(aobj12.value)+parseFloat(aobj13.value)+parseFloat(aobj14.value)+parseFloat(aobj15.value)+parseFloat(aobj16.value)+parseFloat(aobj17.value)+parseFloat(aobj18.value)+parseFloat(aobj19.value)+parseFloat(aobj20.value)+parseFloat(aobj21.value)+parseFloat(aobj22.value);
}

function purchaseBillAmount(quantity,price,amountObj){
amountObj.value=quantity*price;
var aobj1=document.getElementById('Amount1'); var aobj11=document.getElementById('Amount11');
var aobj2=document.getElementById('Amount2'); var aobj12=document.getElementById('Amount12');
var aobj3=document.getElementById('Amount3'); var aobj13=document.getElementById('Amount13');
var aobj4=document.getElementById('Amount4'); var aobj14=document.getElementById('Amount14');
var aobj5=document.getElementById('Amount5'); var aobj15=document.getElementById('Amount15');
var aobj6=document.getElementById('Amount6'); var aobj16=document.getElementById('Amount16');
var aobj7=document.getElementById('Amount7'); var aobj17=document.getElementById('Amount17');
var aobj8=document.getElementById('Amount8'); var aobj18=document.getElementById('Amount18');
var aobj9=document.getElementById('Amount9'); var aobj19=document.getElementById('Amount19');
var aobj10=document.getElementById('Amount10'); var aobj20=document.getElementById('Amount20');
var aobj21=document.getElementById('taxamount'); var aobj22=document.getElementById('otheramount');
document.getElementById('billtotal').value=parseFloat(aobj1.value)+parseFloat(aobj2.value)+parseFloat(aobj3.value)+parseFloat(aobj4.value)+parseFloat(aobj5.value)+parseFloat(aobj6.value)+parseFloat(aobj7.value)+parseFloat(aobj8.value)+parseFloat(aobj9.value)+parseFloat(aobj10.value)+parseFloat(aobj11.value)+parseFloat(aobj12.value)+parseFloat(aobj13.value)+parseFloat(aobj14.value)+parseFloat(aobj15.value)+parseFloat(aobj16.value)+parseFloat(aobj17.value)+parseFloat(aobj18.value)+parseFloat(aobj19.value)+parseFloat(aobj20.value)+parseFloat(aobj21.value)+parseFloat(aobj22.value);
}

function setTotal(){
var aobj1=document.getElementById('Amount1'); var aobj11=document.getElementById('Amount11');
var aobj2=document.getElementById('Amount2'); var aobj12=document.getElementById('Amount12');
var aobj3=document.getElementById('Amount3'); var aobj13=document.getElementById('Amount13');
var aobj4=document.getElementById('Amount4'); var aobj14=document.getElementById('Amount14');
var aobj5=document.getElementById('Amount5'); var aobj15=document.getElementById('Amount15');
var aobj6=document.getElementById('Amount6'); var aobj16=document.getElementById('Amount16');
var aobj7=document.getElementById('Amount7'); var aobj17=document.getElementById('Amount17');
var aobj8=document.getElementById('Amount8'); var aobj18=document.getElementById('Amount18');
var aobj9=document.getElementById('Amount9'); var aobj19=document.getElementById('Amount19');
var aobj10=document.getElementById('Amount10'); var aobj20=document.getElementById('Amount20');
var aobj21=document.getElementById('taxamount'); var aobj22=document.getElementById('otheramount');
document.getElementById('billtotal').value=parseFloat(aobj1.value)+parseFloat(aobj2.value)+parseFloat(aobj3.value)+parseFloat(aobj4.value)+parseFloat(aobj5.value)+parseFloat(aobj6.value)+parseFloat(aobj7.value)+parseFloat(aobj8.value)+parseFloat(aobj9.value)+parseFloat(aobj10.value)+parseFloat(aobj11.value)+parseFloat(aobj12.value)+parseFloat(aobj13.value)+parseFloat(aobj14.value)+parseFloat(aobj15.value)+parseFloat(aobj16.value)+parseFloat(aobj17.value)+parseFloat(aobj18.value)+parseFloat(aobj19.value)+parseFloat(aobj20.value)+parseFloat(aobj21.value)+parseFloat(aobj22.value);
}


function purchaseValidation()
{
var invoicenumber=document.getElementById('invoicenumber');
var customerid=document.getElementById('customerid');
var billamount=document.getElementById('billamount');
var date=document.getElementById('billdate');
var duemode=document.getElementById('duemode');
var paydate=document.getElementById('paydate');
var otheramount=document.getElementById('otheramount');
var billtotal=document.getElementById('billtotal');
if(isEmpty(invoicenumber,"Invoice number is missing"))
{
if(isMadeSelection(customerid,"Customer id is not selected"))
{
if(isEmpty(billamount,"Bill Amount is missing"))
{
if(isNumeric(billamount,"Bill Amount in numeric"))
{
if(isEmpty(date,"Bill date is missing"))
{
if(isEmpty(paydate,"Paydate is missing"))
{
if(billtableMissings())
{
if(parseInt(billamount.value)==parseInt(billtotal.value)) return true;
else { alert("Billamount and BillToatal are not Tallied"); billamount.focus(); }
}
}
}
}
}
}
}
return false;
}


function isMadeSelection(elem, helperMsg){

if(elem.value == "Select" || elem.value == ""){
alert(helperMsg);
elem.focus();
return false;
}else{
return true;
}
}

function modeCheckDeposit(elem)
{

var val = elem.value;

if(val=="Cash")
{
var date2 = document.getElementById('dddate');
var to = document.getElementById('to');
if(isEmpty(date2,"Date is missing"))
{
if(isEmpty(to,"To Whom is missing"))
{
return true;
}
}
}
else if(val=="Cheque")
{
var chequenumber = document.getElementById('cknumber');
var date2 = document.getElementById('dddate');
var to = document.getElementById('to');
if(isEmpty(chequenumber,"Cheque number is missing"))
{
if(isNumeric(chequenumber,"Cheque number in numeric"))
{
if(isEmpty(date2,"Date is missing"))
{
if(isEmpty(to,"To Whom is missing"))
{
return true;
}
}
}
}
return false;
}
else if(val=="DD")
{
var ddnumber = document.getElementById('ddnumber');
var date2 = document.getElementById('dddate');
var bankname = document.getElementById('ddbankname');
var branch = document.getElementById('ddbranch');
var to = document.getElementById('to');
if(isEmpty(ddnumber,"DD number is missing"))
{
if(isNumeric(ddnumber,"DD number in numeric"))
{
if(isEmpty(date2,"Date is missing"))
{
if(isEmpty(bankname,"Bank name is missing"))
{
if(isEmpty(branch,"Branch name is missing"))
{
if(isEmpty(to,"To Whom is missing"))
{
return true;
}
}
}
}
}
}
return false;

}
return false;

}


/// script for refund.php ///////


function refundValidation(){
var batch = document.getElementById('batchcombo');
var course = document.getElementById('coursecombo');
var id = document.getElementById('studentcombo');
var amount = document.getElementById('refundamount');
var acnumber = document.getElementById('accountnumbercombo');
var date = document.getElementById('refunddate');
var refundmode = document.getElementById('refundmode');

if(isMadeSelection(batch,"Batch is not selected"))
if(isMadeSelection(course,"Course is not selected"))
if(isMadeSelection(id,"Studentid is not selected"))
if(isEmpty(amount,"Refund amount is missing"))
if(isMadeSelection(acnumber,"Account number is not selected"))
if(modeCheckRefund(refundmode))return true;

return false;
}


/// script for salary.php ///////

function salaryValidation()
{

var month = document.getElementById('month');
var salaryamount = document.getElementById('amount');
var accountnumbercombo = document.getElementById('accountnumbercombo');
var salarymode = document.getElementById('mode');

if(isEmpty(month,"Month of salary is missing"))
if(isEmpty(salaryamount,"Total salary is missing"))
if(isMadeSelection(accountnumbercombo,"Account number is not selected"))
if(modeCheckSalary(salarymode)) return true;

return false;
}



function modeCheckSalary(elem)
{
var val = elem.value;
var date = document.getElementById('date');
var to = document.getElementById('to');
if(val=="Cash")
{
if(isEmpty(date,"Date is missing"))
{
if(isEmpty(to,"To whom is missing"))
{
return true;
}else return false;
}else return false;
}
else if(val=="Cheque")
{
var chequenumber = document.getElementById('cnumber');

if(isEmpty(chequenumber,"Cheque number is missing"))
{
if(isNumeric(chequenumber,"Cheque number in numeric"))
{
if(isEmpty(date,"Date is missing"))
{
if(isEmpty(to,"To Whom is empty"))
{
return true;
}
}
}
}
return false;
}
else if(val=="DD")
{
var ddnumber = document.getElementById('dnumber');
var bankname = document.getElementById('dbankname');
var branch = document.getElementById('dbranch');

if(isEmpty(ddnumber,"DD number is missing"))
{
if(isNumeric(ddnumber,"DD number in numeric"))
{
if(isEmpty(date,"Date is missing"))
{
if(isEmpty(bankname,"Bank name is missing"))
{
if(isEmpty(branch,"Branch is missing"))
{
if(isEmpty(to,"To Whom is missing"))
{
return true;
}
}
}
}
}
}
return false;

}
return false;
}


function modeCheckRefund(elem)
{
var val = elem.value;
var to = document.getElementById('to');
var dddate = document.getElementById('dddate');
if(val=="Cash")
{
if(isEmpty(dddate,"Date is missing"))
{
if(isEmpty(to,"To whom is missing")) return true;
}
return false;
}
else if(val=="Cheque")
{
var chequenumber = document.getElementById('cnumber');
if(isEmpty(chequenumber,"Cheque number is missing"))
{
if(isNumeric(chequenumber,"Cheque number in numeric"))
{
if(isEmpty(dddate,"Date is missing"))
{
if(isEmpty(to,"To whom is empty"))
{
return true;
}
}
}
}
return false;
}
else if(val=="DD")
{
var ddnumber = document.getElementById('dnumber');
var bankname = document.getElementById('dbankname');
var branch = document.getElementById('dbranch');

if(isEmpty(ddnumber,"DD number is missing"))
{
if(isNumeric(ddnumber,"DD number in numeric"))
{
if(isEmpty(dddate,"Date is missing"))
{
if(isEmpty(bankname,"Bank name is missing"))
{
if(isEmpty(branch,"Branch is missing"))
{
if(isEmpty(to,"To Whom is missing"))
{
return true;
}
}
}
}
}
}
return false;

}
return false;
}


function isEmpty(elem,helperMsg)
{
var elem1 = Trim(elem.value);
if(elem1.length == 0 || elem1 == 0)
{
alert(helperMsg);
elem.focus(); // set the focus to this input
return false;
}
else
{
return true;
}
}


function isNumeric(elem, helperMsg){

var numericExpression = /^[0-9\.]+$/;
if(elem.value.match(numericExpression)){
return true;
}else{
alert(helperMsg);
elem.value="";
elem.focus();
return false;
}
}

function Trim(TRIM_VALUE)
{
if(TRIM_VALUE.length < 1)
{
return"";
}
TRIM_VALUE = RTrim(TRIM_VALUE);
TRIM_VALUE = LTrim(TRIM_VALUE);
if(TRIM_VALUE=="")
{
return"";
}
else
{
return TRIM_VALUE;
}
}

function RTrim(VALUE)
{
var w_space = String.fromCharCode(32);
var v_length = VALUE.length;
var strTemp = "";
if(v_length < 0)
{
return"";
}
var iTemp = v_length -1;
while(iTemp > -1)
{
if(VALUE.charAt(iTemp) == w_space)
{
}
else
{
strTemp = VALUE.substring(0,iTemp +1);
break;
}
iTemp = iTemp-1;
} //End While
return strTemp;
} //End Function

function LTrim(VALUE)
{
var w_space = String.fromCharCode(32);
if(v_length < 1)
{
return"";
}
var v_length = VALUE.length;
var strTemp = "";
var iTemp = 0;
while(iTemp < v_length)
{
if(VALUE.charAt(iTemp) == w_space)
{
}
else
{
strTemp = VALUE.substring(iTemp,v_length);
break;
}
iTemp = iTemp + 1;
} //End While
return strTemp;

} //End Function

function billtableMissings()
{
var totalrows = document.getElementById('billtable').rows;
var i,quantity,particulars,price;

for(i=1;i<totalrows.length-1;i++)
{
if(totalrows[i].style.display=='')
{
quantity="quantity"+i;
particulars="particular"+i;
price="price"+i;
var quan=document.getElementById(quantity);
var part=document.getElementById(particulars);
var pri=document.getElementById(price);
if(isEmpty(quan,"Quantity is missing"))
{
if(isNumeric(quan,"Quantity in numeric"))
{
if(isEmpty(part,"Particular is missing"))
{
if(isEmpty(pri,"Price is missing"))
{
if(isNumeric(pri,"Price in numeric"))
{
continue;
} else return false;
} else return false;
} else return false;
} else return false;
} else return false;
} else return true;
}

}

function isDueChangeMade()
{
var tableobj = document.getElementById('duetable').rows;
var mode = document.getElementById('duemode');
var i,duedate,dueamount;

for(i=1;i<=tableobj.length-1;i++)
{
duedate='duedate'+i;
dueamount='dueamount'+i;
var dateobj=document.getElementById(duedate);
var amountobj=document.getElementById(dueamount);
if(tableobj[i].style.display=='')
{
if(isEmpty(dateobj,"Due date is missing"))
{
if(isEmpty(amountobj,"Due amount is missing")) continue;
else return false;
}else return false;
}else return true;
}
}

function totalCheck()
{
var billamount=document.getElementById('billamount').value;
var bill=document.getElementById('billtotal').value;
var due=document.getElementById('duetotal').value;
//alert(billamount + bill + due);
if(billamount==bill)
{
if(billamount==due) return true; else { alert("Due total is mismatch to bill amount"); return false; }
}
else { alert("Bill total is mismatch to bill amount"); return false; }
}

function invoicepayValidation()
{
var amount=document.getElementById('payingamount');
var paymode = document.getElementById('paymode').rows;
var accountnumbercombo=document.getElementById('accountnumbercombo');
var pendingmode=document.getElementById('pendingmode');

if(isEmpty(amount,"Amount is empty"))
{
if(isDateVisible(paymode))
{
if(isMadeSelection(accountnumbercombo,"Select the account number"))
{
if(modeCheckInvoicePay(pendingmode))
{
return true;
}
}
}
}


return false;
}

function isDateVisible(elem)
{
if(elem[1].style.display=='')
{
var nextpaydate=document.getElementById('nextpaydate');
if(isEmpty(nextpaydate,"Next pay date is empty"))
{
return true;
}else return false;
}else return true;

}

function modeCheckInvoicePay(elem)
{
var val = elem.value;
var ddto=document.getElementById('ddto');
var date=document.getElementById('date');
if(val=="Cash")
{
if(isEmpty(date,"Date is missing"))
{
if(isEmpty(ddto,"To whom is missing")) return true;
}
return false;
}
else if(val=="Cheque")
{
var cnumber=document.getElementById('cnumber');
if(isEmpty(cnumber,"Cheque number is missing"))
{
if(isNumeric(cnumber,"Cheque number in numeric"))
{
if(isEmpty(date,"Date is missing"))
{
if(isEmpty(ddto,"To whom is empty"))
{
return true;
}
}
}
}
return false;
}
else if(val=="DD")
{
var dnumber=document.getElementById('dnumber');
var dbankname=document.getElementById('dbankname');
var dbranch=document.getElementById('dbranch');

if(isEmpty(dnumber,"DD number is missing"))
{
if(isNumeric(dnumber,"DD number in numeric"))
{
if(isEmpty(dbankname,"Bank name is missing"))
{
if(isEmpty(dbranch,"Branch is missing"))
{
if(isEmpty(date,"Date is missing"))
{
if(isEmpty(ddto,"To Whom is missing"))
{
return true;
}
}
}
}
}
}
return false;

}
return false;
}

