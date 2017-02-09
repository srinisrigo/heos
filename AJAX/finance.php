<?php
include "../DataBase/dbconnection.php";
require_once(dirname(__FILE__) . '/xajax.inc.php');

function setonoff($clickedobject,$sno,$accountnumber,$payamount){
$objResponse =& new xajaxResponse();

//$objResponse->addScript("alert('$accountnumber')");
if($clickedobject=="true") $onoff=mysql_query("update random set ckbx='on',accountnumber='$accountnumber',dueamount='$payamount' where sno='$sno'",$con);
else $onoff=mysql_query("update random set ckbx='off',accountnumber='$accountnumber',dueamount='$payamount' where sno='$sno'",$con);

return $objResponse->getXML();
}

function setreadonly()
{
$objResponse =& new xajaxResponse();

$randomon=mysql_query("select * from random where ckbx='on'",$con);
while($rs=mysql_fetch_array($randomon)){
$onrecordeid=$rs['recordid'];
$oninvoicenumber=$rs['invoicenumber'];
$randomcount=mysql_query("select count(invoicenumber) from random where recordid='$onrecordeid' and invoicenumber='$oninvoicenumber'",$con);
if($randomcount>1) {
$setreadonly=mysql_query("select sno from random where recordid='$onrecordeid' and invoicenumber='$oninvoicenumber'",$con);
while($rs=mysql_fetch_array($setreadonly)) {
$sno=$rs['sno'];
$objResponse->addScript("document.getElementById('payamount[$sno]').readOnly = true;");
$objResponse->addScript("document.getElementById('ckbx[$sno]').checked = true;");
$objResponse->addScript("document.getElementById('ckbx[$sno]').disabled = true;");
}
}
}
return $objResponse->getXML();
}


function setpay()
{
$objResponse =& new xajaxResponse();



$selectcount=mysql_query("select count(*) from random where accountnumber='0' and ckbx='on'",$con);
$count=mysql_result($selectcount,0);
$flag=0;
if($count>0) { $objResponse->addScript("alert('Select Account Number')"); return $objResponse->getXML();}
$selectcount1=mysql_query("select count(*) from random where ckbx='on' AND (dueamount='' OR dueamount=0 )",$con);
$count1=mysql_result($selectcount1,0);
if($count1>0) { $objResponse->addScript("alert('Enter Due Amount')"); return $objResponse->getXML();}
$select=mysql_query("select * from random where ckbx='on'",$con);
while($rs=mysql_fetch_array($select)) {
$randomrecordid=$rs1['recordid'];
$randominvoicenumber=$rs1['invoicenumber'];
$randomwhichdue=$rs1['whichdue'];
$randomdueamount=$rs1['dueamount'];
$checkbox=$rs1['ckbx'];
$randomaccountnumber=$rs1['accountnumber'];
if($checkbox=="on" && $randomaccountnumber!=''){
$flag=1;
$sysdate=date('Y-m-d');
switch($randomwhichdue){
case 1:{ $curdue="dueamount1"; $nextdue="dueamount2"; $paiddue="due1paid"; } break;
case 2:{ $curdue="dueamount2"; $nextdue="dueamount3"; $paiddue="due2paid"; } break;
case 3:{ $curdue="dueamount3"; $nextdue="dueamount4"; $paiddue="due3paid"; } break;
case 4:{ $curdue="dueamount4"; $nextdue="dueamount5"; $paiddue="due4paid"; } break;
case 5:{ $curdue="dueamount5"; $nextdue="dueamount5"; $paiddue="due5paid"; } break;
}
$purchaseselect=mysql_query("select * from purchase where recordid='$randomrecordid' AND invoicenumber='$randominvoicenumber'",$con);
while($rs2=mysql_fetch_array($purchaseselect)) {
switch($randomwhichdue){
case 1:{ $purchasecurdueamount=$rs2['dueamount1']; $purchasenextdueamount=$rs2['dueamount2']; } break;
case 2:{ $purchasecurdueamount=$rs2['dueamount2']; $purchasenextdueamount=$rs2['dueamount3']; } break;
case 3:{ $purchasecurdueamount=$rs2['dueamount3']; $purchasenextdueamount=$rs2['dueamount4']; } break;
case 4:{ $purchasecurdueamount=$rs2['dueamount4']; $purchasenextdueamount=$rs2['dueamount5']; } break;
case 5:{ $purchasecurdueamount=$rs2['dueamount5']; $purchasenextdueamount=$rs2['dueamount5']; } break;
}
$purchaseduebalance=$rs2['dueamount'];
$purchaseduepending=$rs2['dueremaining'];
}
$nextduereplaceamount=$purchasenextdueamount;
if($purchasenextdueamount!=0)
{
if($purchasecurdueamount>$randomdueamount)
$nextduereplaceamount= ($purchasecurdueamount-$randomdueamount)+$purchasenextdueamount;


if($purchasecurdueamount<$randomdueamount)
$nextduereplaceamount= $purchasenextdueamount-($randomdueamount-$purchasecurdueamount);
//$objResponse->addScript("alert('$nextduereplaceamount')");
}
$balanceselect=mysql_query("select * from balance where accountnumber='$randomaccountnumber'",$con);
while($rs3=mysql_fetch_array($balanceselect)){
$curbalance=$rs3["balance"];
$curdate=$rs3["curdate"];
}

$prebalance=$curbalance; $predate=$curdate;
$newbalance=$curbalance-$randomdueamount;
$updatebalance=mysql_query("update balance set balance='$newbalance',curdate='$sysdate',lastbalance='$prebalance',lastdate='$predate' where accountnumber='$randomaccountnumber'",$con);
$updatebankdetails=mysql_query("update bankdetails set balance='$newbalance' where accountnumber='$randomaccountnumber'",$con);

$purchaseduebalance=$purchaseduebalance-$randomdueamount; $purchaseduepending--;
switch($randomwhichdue){
case 1:{ $updatepurchase=mysql_query("update purchase set dueamount1='$randomdueamount',dueamount2='$nextduereplaceamount',dueamount='$purchaseduebalance',dueremaining='$purchaseduepending',due1paid='yes' where recordid='$randomrecordid' and invoicenumber='$randominvoicenumber'",$con); } break;
case 2:{ $updatepurchase=mysql_query("update purchase set dueamount2='$randomdueamount',dueamount3='$nextduereplaceamount',dueamount='$purchaseduebalance',dueremaining='$purchaseduepending',due2paid='yes' where recordid='$randomrecordid' and invoicenumber='$randominvoicenumber'",$con); } break;
case 3:{ $updatepurchase=mysql_query("update purchase set dueamount3='$randomdueamount',dueamount4='$nextduereplaceamount',dueamount='$purchaseduebalance',dueremaining='$purchaseduepending',due3paid='yes' where recordid='$randomrecordid' and invoicenumber='$randominvoicenumber'",$con); } break;
case 4:{ $updatepurchase=mysql_query("update purchase set dueamount4='$randomdueamount',dueamount5='$nextduereplaceamount',dueamount='$purchaseduebalance',dueremaining='$purchaseduepending',due4paid='yes' where recordid='$randomrecordid' and invoicenumber='$randominvoicenumber'",$con); } break;
case 5:{ $updatepurchase=mysql_query("update purchase set dueamount5='$randomdueamount',dueamount='$purchaseduebalance',dueremaining='$purchaseduepending',due5paid='yes' where recordid='$randomrecordid' and invoicenumber='$randominvoicenumber'",$con); } break;
}
}
}

if($flag){$objResponse->addScript("alert('pay done success...')"); $objResponse->addScript("window.location.reload();");}
else $objResponse->addScript("alert('Select checkbox atleast one...')");
//echo "<script type=\"text\javascript\">alert(\"Success done..\");</script>";
//echo '<meta http-equiv="refresh" content="0">';
//$objResponse->addScript("alert('End of pay')");

return $objResponse->getXML();
}



function setbankdetails($accountnumber)
{
$objResponse =& new xajaxResponse();

if($accountnumber!="Select")
{
$result=mysql_query("select bankname,branchname from bankdetails where accountnumber='$accountnumber'",$con);
while($rs1=mysql_fetch_array($result)){
$bankname=$rs1["bankname"];
$branchname=$rs1["branchname"]; }

if ($bankname!="" && $branchname!="")
{
$objResponse->addScript("document.getElementById('bankname').disabled = false;");
$objResponse->addScript("document.getElementById('bankname').options.length = 0;");
$objResponse->addScript("document.getElementById('bankname').value ='".$bankname."';");

$objResponse->addScript("document.getElementById('branch').disabled = false;");
$objResponse->addScript("document.getElementById('branch').options.length = 0;");
$objResponse->addScript("document.getElementById('branch').value ='".$branchname."';");
}
else
{
$objResponse->addScript("document.getElementById('bankname').options.length = 0;");
$objResponse->addScript("document.getElementById('bankname').disabled = true;");

$objResponse->addScript("document.getElementById('branch').options.length = 0;");
$objResponse->addScript("document.getElementById('branch').disabled = true;");
}
return $objResponse->getXML();
}
else
{
$objResponse->addScript("alert('Kindly Select The Account Number')");
$objResponse->addScript("document.getElementById('bankname').value = '';");
$objResponse->addScript("document.getElementById('bankname').disabled = true;");

$objResponse->addScript("document.getElementById('branch').value = '';");
$objResponse->addScript("document.getElementById('branch').disabled = true;");
return $objResponse->getXML();
}
}

function setcustomer($id,$st){
$objResponse =& new xajaxResponse();

if($id=="") return $objResponse->getXML();
if($st==1){
$objResponse->addScript("document.getElementById('suppliername').value ='';");
$exec=mysql_query("select count(*) from supplierdetails where supplierid='$id'",$con);
if(mysql_result($exec,0)>0) { $exec=mysql_query("select suppliername from supplierdetails where supplierid='$id'",$con); $name=mysql_result($exec,0);
$objResponse->addScript("document.getElementById('suppliername').value ='".$name."';"); }
}
if($st==2){
$objResponse->addScript("document.getElementById('supplierid').value ='';");
$exec=mysql_query("select count(*) from supplierdetails where suppliername='$id'",$con);
if(mysql_result($exec,0)>0) { $exec=mysql_query("select supplierid from supplierdetails where suppliername='$id'",$con); $name=mysql_result($exec,0);
$objResponse->addScript("document.getElementById('supplierid').value ='".$name."';"); }
}
return $objResponse->getXML();
}

function setNominal($code,$objname,$st){
$objResponse =& new xajaxResponse();

if($code=="") return $objResponse->getXML();
if($st==1){
$objResponse->addScript("document.getElementById('$objname').value ='';");
$exec=mysql_query("select count(*) from nominalcodes where nominalcode='$code'",$con);
if(mysql_result($exec,0)>0) { $exec=mysql_query("select nominalname from nominalcodes where nominalcode='$code'",$con); $name=mysql_result($exec,0);
$objResponse->addScript("document.getElementById('$objname').value ='".$name."';"); }
}
if($st==2){
$objResponse->addScript("document.getElementById('$objname').value ='';");
$exec=mysql_query("select count(*) from nominalcodes where nominalname='$code'",$con);
if(mysql_result($exec,0)>0) { $exec=mysql_query("select nominalcode from nominalcodes where nominalname='$code'",$con); $name=mysql_result($exec,0);
$objResponse->addScript("document.getElementById('$objname').value ='".$name."';"); }
}
return $objResponse->getXML();
}


function setcourse($batchvalue)
{
$objResponse =& new xajaxResponse();

if($batchvalue!="Select"){
$objResponse->addScript("document.getElementById('coursecombo').disabled = false;");
$objResponse->addScript("document.getElementById('coursecombo').options.length = 0;");
$objResponse->addScript("addOption('coursecombo','" . 'Select' . "','" . 'Select' . "');");
$result=mysql_query("select DISTINCT(coursecode) from student where intake='$batchvalue'",$con);
while($rs1=mysql_fetch_array($result)){
$code=$rs1["coursecode"];
$sel=mysql_query("select CourseName from coursedetails where coursecode='$code'",$con); $name=mysql_result($sel,0);
$objResponse->addScript("addOption('coursecombo','" . $name . "','" . $code . "');"); }
}
if($batchvalue=="Select")
{
$objResponse->addScript("document.getElementById('coursecombo').options.length = 0;");
$objResponse->addScript("addOption('coursecombo','Select','" . 'Select' . "');");
$objResponse->addScript("document.getElementById('coursecombo').disabled = true;");

$objResponse->addScript("document.getElementById('studentcombo').options.length = 0;");
$objResponse->addScript("addOption('studentcombo','Select','" . 'Select' . "');");
$objResponse->addScript("document.getElementById('studentcombo').disabled = true;");
$objResponse->addScript("alert('Select the Batch')");
}
return $objResponse->getXML();
}

function setstudentid($batchvalue,$coursevalue){

$objResponse =& new xajaxResponse();

if($batchvalue!="Select" && $coursevalue!="Select"){
$objResponse->addScript("document.getElementById('studentcombo').disabled = false;");
$objResponse->addScript("document.getElementById('studentcombo').options.length = 0;");
$objResponse->addScript("addOption('studentcombo','" . 'Select' . "','" . 'Select' . "');");
$result=mysql_query("select count(*) from student where coursecode='$coursevalue' and intake='$batchvalue'",$con);
if(mysql_result($result,0)>0){
$result=mysql_query("select studentid from student where coursecode='$coursevalue' and intake='$batchvalue'",$con);
while($rs1=mysql_fetch_array($result)){ $student=$rs1["studentid"];
$objResponse->addScript("addOption('studentcombo','" . $student . "','" . $student . "');"); } }
}

if($batchvalue=="Select" || $coursevalue=="Select"){
$objResponse->addScript("document.getElementById('studentcombo').options.length = 0;");
$objResponse->addScript("addOption('studentcombo','Select','" . 'Select' . "');");
$objResponse->addScript("document.getElementById('studentcombo').disabled = true;");
$objResponse->addScript("alert('Select the Course')"); }
return $objResponse->getXML();
}


function setagentid($batchvalue,$coursevalue,$studentidvalue){

$objResponse =& new xajaxResponse();

if($batchvalue!="Select" && $coursevalue!="Select" && $studentidvalue!="Select"){
$result=mysql_query("select agentid,feepaid from student where intake='$batchvalue' and coursecode='$coursevalue' and studentid='$studentidvalue'",$con);
while($rs1=mysql_fetch_array($result)){
$agentid=$rs1["agentid"];
$amount=$rs1["feepaid"]; }
$countstudentidexec=mysql_query("select count(studentid) from refund where studentid='$studentidvalue'",$con);
$count=mysql_result($countstudentidexec,0);
if($count==0){
if ($agentid!="" || $amount!=""){
$result=mysql_query("select accountnumber from balance where balance >= '$amount'",$con);
$objResponse->addScript("document.getElementById('accountnumbercombo').disabled = false;");
$objResponse->addScript("document.getElementById('accountnumbercombo').options.length = 0;");
$objResponse->addScript("addOption('accountnumbercombo','" . 'Select' . "','" . 'Select' . "');");
while($rs2=mysql_fetch_array($result)){
$account=$rs2["accountnumber"];
$objResponse->addScript("addOption('accountnumbercombo','" . $account . "','" . $account . "');");  }

$objResponse->addScript("document.getElementById('agent').disabled = false;");
$objResponse->addScript("document.getElementById('agent').options.length = 0;");
$objResponse->addScript("document.getElementById('agent').value ='".$agentid."';");

$objResponse->addScript("document.getElementById('paidamount').disabled = false;");
$objResponse->addScript("document.getElementById('paidamount').options.length = 0;");
$objResponse->addScript("document.getElementById('paidamount').value ='".$amount."';");
$objResponse->addScript("document.getElementById('to').value ='".$studentidvalue."';");
} else {
$objResponse->addScript("document.getElementById('accountnumbercombo').options.length = 0;");
$objResponse->addScript("addOption('accountnumbercombo','Select','" . 'Select' . "');");
$objResponse->addScript("document.getElementById('bankname').value = '';");
$objResponse->addScript("document.getElementById('branch').value = '';");
$objResponse->addScript("alert('Refund amount is empty')");
$objResponse->addScript("document.getElementById('agent').options.length = 0;");
$objResponse->addScript("document.getElementById('agent').disabled = true;");
$objResponse->addScript("document.getElementById('paidamount').options.length = 0;");
$objResponse->addScript("document.getElementById('paidamount').disabled = true;");      }
} else $objResponse->addScript("alert('The Student Id $studentidvalue is already Refunded!');");
}

if($batchvalue=="Select" || $coursevalue=="Select" || $studentidvalue=="Select"){
$objResponse->addScript("document.getElementById('agent').options.length = 0;");
$objResponse->addScript("document.getElementById('agent').value = '';");
$objResponse->addScript("document.getElementById('agent').disabled = true;");
$objResponse->addScript("document.getElementById('paidamount').options.length = 0;");
$objResponse->addScript("document.getElementById('paidamount').value = '';");
$objResponse->addScript("document.getElementById('paidamount').disabled = true;");
$objResponse->addScript("document.getElementById('accountnumbercombo').options.length = 0;");
$objResponse->addScript("addOption('accountnumbercombo','Select','" . 'Select' . "');");
$objResponse->addScript("document.getElementById('bankname').value = '';");
$objResponse->addScript("document.getElementById('branch').value = '';");
$objResponse->addScript("alert('Select the Student Id')");
}
return $objResponse->getXML();
}

function setpersionname($id){
$objResponse =& new xajaxResponse();

if($id!="Select"){
$exec=mysql_query("select * from persondetails where personid='$id'",$con);
while($rs2=mysql_fetch_array($exec)) $name=$rs2["personname"];
$objResponse->addScript("document.getElementById('pcname').value ='".$name."';");
} else {
$objResponse->addScript("document.getElementById('pcname').value ='';");
$objResponse->addScript("alert('select customer id')");  }
return $objResponse->getXML();
}

function setaccountnumbers($amount){

$objResponse =& new xajaxResponse();

if(($amount!=''||$amount!=0)&&$amount>0){
$result=mysql_query("select accountnumber from balance where balance >= '$amount'",$con);
$objResponse->addScript("document.getElementById('accountnumbercombo').disabled = false;");
$objResponse->addScript("document.getElementById('accountnumbercombo').options.length = 0;");
$objResponse->addScript("addOption('accountnumbercombo','" . 'Select' . "','" . 'Select' . "');");
while($rs1=mysql_fetch_array($result)){
$account=$rs1["accountnumber"];
$objResponse->addScript("addOption('accountnumbercombo','" . $account . "','" . $account . "');"); }
}
if(($amount==''||$amount==0)&&$amount>0)
{
$objResponse =& new xajaxResponse();
$objResponse->addScript("document.getElementById('accountnumbercombo').options.length = 0;");
$objResponse->addScript("addOption('accountnumbercombo','Select','" . 'Select' . "');");
$objResponse->addScript("document.getElementById('bankname').value = '';");
$objResponse->addScript("document.getElementById('branch').value = '';");
$objResponse->addScript("alert('Salary amount is empty')");
}
return $objResponse->getXML();
}

function pettycashDropAmount($amount){

$objResponse =& new xajaxResponse();

if(($amount!=''||$amount!=0)&&$amount>0){
$result=mysql_query("select accountnumber from balance where balance >= '$amount'",$con);
$objResponse->addScript("document.getElementById('accountnumbercombo').disabled = false;");
$objResponse->addScript("document.getElementById('accountnumbercombo').options.length = 0;");
$objResponse->addScript("addOption('accountnumbercombo','" . 'Select' . "','" . 'Select' . "');");
while($rs1=mysql_fetch_array($result)){ $account=$rs1["accountnumber"];
$objResponse->addScript("addOption('accountnumbercombo','" . $account . "','" . $account . "');"); }
$objResponse->addScript("document.getElementById('pcdraw').value = '$amount';");
}
if(($amount==''||$amount==0)&&$amount>0){
$objResponse->addScript("document.getElementById('accountnumbercombo').options.length = 0;");
$objResponse->addScript("addOption('accountnumbercombo','Select','" . 'Select' . "');");
$objResponse->addScript("document.getElementById('bankname').value = '';");
$objResponse->addScript("document.getElementById('branch').value = '';");
$objResponse->addScript("alert('Salary amount is empty')");
$objResponse->addScript("document.getElementById('pcdraw').value = '$amount';");
}
return $objResponse->getXML();
}

function ddchequeonoff($clickedobject,$recordid)
{
$objResponse =& new xajaxResponse();


//$objResponse->addScript("alert('$accountnumber')");
if($clickedobject=="true") $onoff=mysql_query("update paythis set onoff='on' where recordid='$recordid'",$con);
else $onoff=mysql_query("update paythis set onoff='off' where recordid='$recordid'",$con);

return $objResponse->getXML();
}

function ddchequeclearance(){

$objResponse =& new xajaxResponse();

$sysdate=date('Y-m-d');
$onoff=mysql_query("select * from paythis where onoff='on'",$con);
while($rs1=mysql_fetch_array($onoff)){
$id=$rs1['recordid'];
$oneecord=mysql_query("select * from paymentdetails where recordid='$id'",$con);
while($rs2=mysql_fetch_array($oneecord)){
$recordid=$rs2['recordid'];
$amount=$rs2['amount'];
$accountnumber=$rs2['accountnumber'];
$description=$rs2['description'];
$paymode=$rs2['paymode'];
$cdnumber=$rs2['cdnumber'];
$cddate=$rs2['cddate'];
$bankname=$rs2['bankname'];
$branch=$rs2['branch'];
$towhom=$rs2['towhom'];
}
$selectbalance=mysql_query("select * from balance where accountnumber='$accountnumber'",$con);
while($rs3=mysql_fetch_array($selectbalance)){
$total=$rs3['total'];
$balance=$rs3['balance'];
$tablename=$rs3['tablename'];
$curdate=$rs3['curdate'];
}
$sysdate=date('Y-m-d');
if($description=="Deposit"){
$curtotal=$total+$amount;
$curbalance=$balance+$amount;
$randominsert="insert into ".$tablename." values('0','Cr','$description','$sysdate','$amount','$curbalance')";
$balanceup=mysql_query("update balance set total='$curtotal',balance='$curbalance',curdate='$sysdate',lastbalance='$balance',lastdate='$curdate' where accountnumber='$accountnumber'",$con);
$pamentup=mysql_query("update paymentdetails set done='yes' where recordid='$id'",$con);
$randomup=mysql_query($randominsert,$con);
if($balanceup&&$pamentup&&$randomup) $objResponse->addScript("alert('Successfully done')");
} else {
$curtotal=$total-$amount;
$randominsert="insert into ".$tablename." values('0','Dr','$description','$sysdate','$amount','$balance')";
$balanceup=mysql_query("update balance set total='$curtotal' where accountnumber='$accountnumber'",$con);
$pamentup=mysql_query("update paymentdetails set done='yes' where recordid='$id'",$con);
$randomup=mysql_query($randominsert,$con);
if($balanceup&&$pamentup&&$randomup) $objResponse->addScript("alert('Successfully done')");
}
}
$objResponse->addScript("window.location='pendings.php'");
return $objResponse->getXML();
}

function payAmount($payingamount,$nextpaydate,$accountnumbercombo,$pendingmode,$cnumber,$dnumber,$dbankname,$dbranch,$date,$ddto){


$objResponse =& new xajaxResponse();

//        $objResponse->addScript("alert('$nextpaydate, $date');");
$recordid=$_SESSION['recordid'];
$bank=mysql_query("select * from balance where accountnumber='$accountnumbercombo'",$con);
while($rs1=mysql_fetch_array($bank)){
$balance=$rs1['balance'];
$total=$rs1['total'];
$curdate=$rs1['curdate'];
$tablename=$rs1['tablename'];
}
$pur=mysql_query("select * from purchase where recordid='$recordid'",$con);
while($rs2=mysql_fetch_array($pur)){
$paidamount=$rs2['paidamount'];
$billamount=$rs2['billamount'];
$customername=$rs2['customername'];
}
$curbalance=$balance-$payingamount;
$curtotal=$total-$payingamount;
$piadset=$paidamount+$payingamount;
if($pendingmode=="Cash"){
$balanceup=mysql_query("update balance set total='$curtotal',balance='$curbalance',lastbalance='$balance',lastdate='$curdate',curdate='$date' where accountnumber='$accountnumbercombo'",$con);
$ranquery="insert into ".$tablename." values('0','Dr','$customername','$date','$payingamount','$curbalance')";
$rndomup=mysql_query($ranquery,$con);
if($billamount>=$piadset) $purcahseup=mysql_query("update purchase set paidamount='$piadset',paydate='$nextpaydate' where recordid='$recordid'",$con);
if($balanceup&&$rndomup&&$purcahseup) $objResponse->addScript("alert('Success...');");
}
else{
$balanceup=mysql_query("update balance set balance='$curbalance',lastbalance='$balance',lastdate='$curdate',curdate='$date' where accountnumber='$accountnumbercombo'",$con);
if($billamount>=$piadset) $purcahseup=mysql_query("update purchase set paidamount='$piadset',paydate='$nextpaydate' where recordid='$recordid'",$con);
if($pendingmode=="DD") $cdnumber=$dnumber; else $cdnumber=$cnumber;
$payment=mysql_query("insert into paymentdetails values('0','$payingamount','$accountnumbercombo','Pendings','$pendingmode','$cdnumber','$date','$dbankname','$dbranch','$ddto','no')",$con);
if($balanceup&&$purcahseup&&$payment) $objResponse->addScript("alert('Success...');");
}
$objResponse->addScript("window.location='invoicepay.php'");
return $objResponse->getXML();
}

function checkFunc($recordid){
$_SESSION['recordid']=$recordid;
$objResponse =& new xajaxResponse();

$objResponse->addScript("var obj=document.getElementById('paymode').rows;");
$objResponse->addScript("obj[0].style.display='';");
$objResponse->addScript("obj[1].style.display='';");
$objResponse->addScript("obj[2].style.display='';");
$objResponse->addScript("obj[3].style.display='';");
$objResponse->addScript("obj[8].style.display='';");
$objResponse->addScript("obj[9].style.display='';");
$objResponse->addScript("obj[10].style.display='';");
$selectquery=mysql_query("select * from purchase where recordid='$recordid'",$con);
while($rs1=mysql_fetch_array($selectquery)){
$invoicenumber=$rs1['invoicenumber'];
$customerid=$rs1['customerid'];
$billamount=$rs1['billamount'];
$billdate=$rs1['billdate'];
$paidamount=$rs1['paidamount'];
$paydate=$rs1['paydate'];
}
$pound=$billamount-$paidamount;
$result=mysql_query("select accountnumber from balance where balance >= '$pound'",$con);
$objResponse->addScript("document.getElementById('accountnumbercombo').disabled = false;");
$objResponse->addScript("document.getElementById('accountnumbercombo').options.length = 0;");
$objResponse->addScript("addOption('accountnumbercombo','" . 'Select' . "','" . 'Select' . "');");
while($rs2=mysql_fetch_array($result))
{
$account=$rs2["accountnumber"];
$objResponse->addScript("addOption('accountnumbercombo','" . $account . "','" . $account . "');");
}
//      $objResponse->addScript("alert('$customerid')");
$objResponse->addScript("document.getElementById('payingamount').value = $pound;");
$objResponse->addScript("document.getElementById('ddto').value = '$customerid';");
$objResponse->addScript("obj[1].style.display='none';");

return $objResponse->getXML();

}


function setinvoiceaccountnumbers($amount){

$objResponse =& new xajaxResponse();

if($amount!=''||$amount!=0){
$recordid=trim($_SESSION['recordid']);
$selectquery=mysql_query("select * from purchase where recordid='$recordid'",$con);
while($rs1=mysql_fetch_array($selectquery)){
$invoicenumber=$rs1['invoicenumber'];
$customerid=$rs1['customerid'];
$billamount=$rs1['billamount'];
$billdate=$rs1['billdate'];
$paidamount=$rs1['paidamount'];
$paydate=$rs1['paydate'];
}
$pound=$billamount-$paidamount;
if($billamount<($amount+$paidamount)) $objResponse->addScript("document.getElementById('payingamount').value='$pound';");
if($billamount<$amount) $objResponse->addScript("document.getElementById('payingamount').value='$pound';");
$objResponse->addScript("var obj=document.getElementById('paymode').rows;");
if($billamount<=($amount+$paidamount)) $objResponse->addScript("obj[1].style.display='none';");
else $objResponse->addScript("obj[1].style.display='';");
$selectaccount="select accountnumber from balance where balance >= '$amount'";
$result=mysql_query("select accountnumber from balance where balance >= '$amount'",$con);
$objResponse->addScript("document.getElementById('accountnumbercombo').disabled = false;");
$objResponse->addScript("document.getElementById('accountnumbercombo').options.length = 0;");
$objResponse->addScript("addOption('accountnumbercombo','" . 'Select' . "','" . 'Select' . "');");
while($rs2=mysql_fetch_array($result)){
$account=$rs2["accountnumber"];
$objResponse->addScript("addOption('accountnumbercombo','" . $account . "','" . $account . "');"); }
}
if($amount==''||$amount<=0 || $amount==0)
{
$objResponse->addScript("document.getElementById('accountnumbercombo').options.length = 0;");
$objResponse->addScript("addOption('accountnumbercombo','Select','" . 'Select' . "');");
$objResponse->addScript("alert('Amount is empty')");
}
return $objResponse->getXML();
}

function setaccountnumbersinrefund($amount,$paidamount){

$objResponse =& new xajaxResponse();

if(($amount!=''||$amount!=0)&&$amount>0){
if($amount>$paidamount){
$objResponse->addScript("document.getElementById('refundamount').value = '';");
$objResponse->addScript("alert('Refund amount is higher than paid amount')");
} else {
$result=mysql_query("select accountnumber from balance where balance >= '$amount'",$con);
$objResponse->addScript("document.getElementById('accountnumbercombo').disabled = false;");
$objResponse->addScript("document.getElementById('accountnumbercombo').options.length = 0;");
$objResponse->addScript("addOption('accountnumbercombo','" . 'Select' . "','" . 'Select' . "');");
while($rs1=mysql_fetch_array($result)){
$account=$rs1["accountnumber"];
$objResponse->addScript("addOption('accountnumbercombo','" . $account . "','" . $account . "');"); }
} }
if(($amount==''||$amount==0)&&$amount>0) {
$objResponse->addScript("document.getElementById('accountnumbercombo').options.length = 0;");
$objResponse->addScript("addOption('accountnumbercombo','Select','" . 'Select' . "');");
$objResponse->addScript("document.getElementById('bankname').value = '';");
$objResponse->addScript("document.getElementById('branch').value = '';");
$objResponse->addScript("alert('Salary amount is empty')");  }
return $objResponse->getXML();
}

function setCourses($degree){
$objResponse =& new xajaxResponse();

if($degree=='none'){
$objResponse->addScript("document.getElementById('courseappliedcom').options.length = 0;");
$objResponse->addScript("addOption('courseappliedcom','" . '- select -' . "','" . 'none' . "');");
} else {
$objResponse->addScript("document.getElementById('courseappliedcom').options.length = 0;");
$objResponse->addScript("addOption('courseappliedcom','" . '- select -' . "','" . '- select -' . "');");
$rs=mysql_query("select distinct(CourseName) from coursedetails where LevelOfTheCourse='$degree'",$con);
while($rs1=mysql_fetch_array($rs)){
$course=$rs1["CourseName"];
$objResponse->addScript("addOption('courseappliedcom','" . $course . "','" . $course . "');"); }
}
return $objResponse->getXML();
}

function setCrDrNote($invoice,$note){
$objResponse =& new xajaxResponse();
if($invoice=='') return $objResponse->getXML();

$select=mysql_query("select * from invoicedetails where invoicenumber='$invoice'",$con);
if(mysql_result($select,0)>0){
$select=mysql_query("select * from invoicedetails where invoicenumber='$invoice'",$con);
while($ar=mysql_fetch_array($select)){  $recordid=$ar['recordid'];
$purchaseordernumber=$ar['purchaseordernumber']; $supplierid=$ar['supplierid'];
$suppliername=$ar['suppliername']; $billdate=$ar['billdate'];
$billamount=$ar['billamount']; $paydate=$ar['paydate'];
$netamount=$ar['netamount']; $VAT=$ar['VAT'];
$transport=$ar['transport']; $grandtotal=$ar['grandtotal'];
}
$billdate=date('d-M-Y',strtotime($billdate)); $paydate=date('d-M-Y',strtotime($paydate));
$create="<table align=center border=0 cellspacing=1 cellpadding=0>";
$create=$create."<tr><td>Invoice Number</td><td><input type=\"hidden\" name=\"invoicenumber\" id=\"invoicenumber\" value=\"$invoice\">$invoice</td><td>Purchase Order Number</td><td><input type=\"hidden\" name=\"purchasenumber\" id=\"purchasenumber\" value=\"$purchaseordernumber\">$purchaseordernumber</td></tr>";
$create=$create."<tr><td>Supplier ID</td><td><input type=\"hidden\" name=\"supplierid\" id=\"supplierid\" value=\"$supplierid\">$supplierid</td><td>Supplier Name</td><td><input type=\"hidden\" name=\"suppliername\" id=\"suppliername\" value=\"$suppliername\">$suppliername</td></tr>";
$create=$create."<tr><td>Bill Date</td><td><input type=\"hidden\" name=\"billdate\" id=\"billdate\" value=\"$billdate\">$billdate</td><td>Bill Amount</td><td><input type=\"text\" name=\"billamount\" id=\"billamount\" value=\"$billamount\"></td></tr>";
$create=$create."<tr><td>Pay Date</td><td colspan=3><input type=\"hidden\" name=\"paydate\" id=\"paydate\" value=\"$paydate\">$paydate</td></tr></table>";

$create=$create."<br><br><table id=\"dtable\" align=center border=0 cellpadding=0 cellspacing=1><tr><th>S.no</th><th>Nominal Code</th><th>Nominal Name</th><th>Quantity</th><th>Unit Price</th><th>Net Amount</th><th></th></tr>";
//$create=$create."<tr><td>1</td><td><input type=\"text\" name=\"productcode[0]\" id=\"productcode[0]\" size=7 onChange=\"xajax_setNominal(this.value,0,1);\"></td><td><input type=\"text\" name=\"productname[0]\" id=\"productname[0]\" onChange=\"xajax_setNominal(this.value,0,2);\"></td><td><input type=\"text\" name=\"quantity[0]\" id=\"quantity[0]\" size=4 value=0 onchange=\"setNetamount(0);\" onKeyPress=\"return keyRestrict(event,'0123456789'+String.fromCharCode(241))\"></td><td><input type=\"text\" name=\"unitprice[0]\" id=\"unitprice[0]\" size=7 value=0.00 onChange=\"setNetamount(0);\" onKeyPress=\"return keyRestrict(event,'0123456789.'+String.fromCharCode(241))\"></td><td><input type=\"text\" name=\"netamount[0]\" id=\"netamount[0]\" size=9 readonly value=0.00></td><td><a href=\"javascript:createRow();\">Add</a></td></tr>";
$create=$create."<tr><td colspan=5 align=right>VAT ( 17.5% )</td><td><input type=\"text\" name=\"vat\" id=\"vat\" size=9 value=\"$VAT\" onChange=\"setNettotal();\" onKeyPress=\"return keyRestrict(event,'0123456789.'+String.fromCharCode(241))\"></td><td rowspan=3></td></tr>";
$create=$create."<tr><td colspan=5 align=right>Transport</td><td><input type=\"text\" name=\"transport\" id=\"transport\" size=9 value=\"$transport\" onChange=\"setNettotal();\" onKeyPress=\"return keyRestrict(event,'0123456789.'+String.fromCharCode(241))\"></td></tr>";
$create=$create."<tr><td colspan=5 align=right>Total Amount</td><td><input type=\"text\" name=\"totalamount\" id=\"totalamount\" size=9 value=\"$grandtotal\" readonly></td></tr></table>";

$objResponse->addScript("document.getElementById('invoicedetails').innerHTML = '$create';");
return $objResponse->getXML();  }
}


$xajax =& new xajax();
$xajax->registerFunction("setonoff");
$xajax->registerFunction("setpay");
$xajax->registerFunction("setreadonly");
$xajax->registerFunction("setbankdetails");
$xajax->registerFunction("setcustomer");
$xajax->registerFunction("setcourse");
$xajax->registerFunction("setstudentid");
$xajax->registerFunction("setagentid");
$xajax->registerFunction("setpersionname");
$xajax->registerFunction("setaccountnumbers");
$xajax->registerFunction("pettycashDropAmount");
$xajax->registerFunction("ddchequeonoff");
$xajax->registerFunction("ddchequeclearance");
$xajax->registerFunction("setaccountnumbersinrefund");
$xajax->registerFunction("checkFunc");
$xajax->registerFunction("setinvoiceaccountnumbers");
$xajax->registerFunction("payAmount");
$xajax->registerFunction("setCourses");
$xajax->registerFunction("setNominal");
$xajax->registerFunction("setCrDrNote");

$xajax->processRequests();
?>

