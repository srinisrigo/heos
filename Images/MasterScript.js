        function getKeyCode(e)
        {
                if (window.event)
                   return window.event.keyCode;
                else if (e)
                   return e.which;
                else

                   return null;
        }

        function keyRestrict(e, validchars)
        {
                var key='', keychar='';
                key = getKeyCode(e);
                if (key == null) return true;
                keychar = String.fromCharCode(key);
                keychar = keychar.toLowerCase();
                validchars = validchars.toLowerCase();
                if (validchars.indexOf(keychar) != -1)return true;
                if ( key==null || key==0 || key==8 || key==9 || key==13 || key==27 )return true;
                return false;
        }


function course_details_validation()
{
var coursecode = document.getElementById('CourseCodeTxt');
var coursename = document.getElementById('CourseNameTxt');
var courseduration = document.getElementById('CourseDurationTxt');
var modeofcourse = document.getElementById('ModeOfCourse');
var levelofcourse = document.getElementById('Levelofcourse');
var university = document.getElementById('UniversityName');
var scholarship = document.getElementById('Scholarship');
var noofsubject = document.getElementById('NumOfSubjectTxt');
var defaultdeposite = document.getElementById('DefaultDepositTxt');
var defaultfees = document.getElementById('DefaultFeesTxt');
var maxinstalment = document.getElementById('MaxInstalmentsTxt');
var Minadvance = document.getElementById('MinimumAdvanceTxt');

if(isEmpty(coursecode,"Kindly Enter The Course Code"))
{
if(isAlphaNumeric(coursecode,"Kindly Enter The Course Code in AlphaNumeric"))
{
if(isEmpty(coursename,"  Enter The Course Name"))
{
if(isAlpha(coursename,"Kindly Enter The Course Name in Alpha"))
{
if(isEmpty(courseduration,"Kindly Enter The Course Duration"))
{
if(isNumeric(courseduration,"Kindly Enter The Course Duration in Numeric"))
{
if(isMadeSelection(modeofcourse,"Kindly Select The Mode Of Course"))
{
if(isMadeSelection(levelofcourse,"Kindly Select The Level Of Course"))
{
if(isMadeSelection(university,"Kindly Select The University"))
{
if(isMadeSelection(scholarship,"Kindly Select The Scholarship"))
{
if(isEmpty(noofsubject,"Kindly Enter The Number Of Subject"))
{
if(isNumeric(noofsubject,"Kindly Enter The No Of Subject in Numeric"))
{
if(isEmpty(defaultdeposite,"Kindly Enter The Default Deposite"))
{
if(isDecimalNumeric(defaultdeposite,"Kindly Enter The Default Deposite in Numeric"))
{
if(isDecimalFormat(defaultdeposite,"Only Two decimal are allowed"))
{
if(isEmpty(defaultfees,"Kindly Enter The Default Fees"))
{
if(isDecimalNumeric(defaultfees,"Kindly Enter The Default Fees in Numeric"))
{
if(isDecimalFormat(defaultfees,"Only Two decimal are allowed"))
{
if(isEmpty(maxinstalment,"Kindly Enter The Max Instalment"))
{
if(isNumeric(maxinstalment,"Kindly Enter The Max Instalment in Numeric"))
{
if(isEmpty(Minadvance,"Kindly Enter The Minimum Advance"))
{
if(isDecimalNumeric(Minadvance,"Kindly Enter The Minimum Advance in Numeric"))
{
if(isDecimalFormat(Minadvance,"Only Two decimal are allowed"))
{
return true;
}
}
}
}
}
}
}
}
}
}
}
}
}
}
}
}
}
}
}
}
}
}
}

return false;
}



function university_details_validation()
{
var universitycode=document.getElementById('universityCodeTextBox');
var universityname = document.getElementById('universityNameTextBox');
var state = document.getElementById('stateTextBox');
var address = document.getElementById('AddLine1');
var pincode = document.getElementById('pincodeTextBox');
var phonenumber = document.getElementById('phoneNumberTextBox');
var faxnumber = document.getElementById('faxNumberTextBox');
var email = document.getElementById('emailIdTextBox');
var website = document.getElementById('websiteNameTextBox');
var conpersonname = document.getElementById('contactPersonNameTextBox');
var conpersonmailid = document.getElementById('contactPersonMailIdTextBox');
var conphonenumber = document.getElementById('contactPersonPhoneNumberTextBox');
if(isEmpty(universitycode,"Kindly Enter The University Code"))
{
if(isAlphaNumeric(universitycode,"Kindly Enter The University Code in AlphaNumeric"))
{
if(isEmpty(universityname,"Enter The University Name"))
{
if(isAlpha(universityname,"Kindly Enter The University Name in Alpha"))
{
if(isEmpty(state,"Enter The State Name"))
{
if(isAlpha(state,"Kindly Enter The State Name in Alpha"))
{
if(isEmpty(address,"Enter The Address"))
{
if(isEmpty(pincode,"Enter The Pincode"))
{
if(isNumeric(pincode,"Kindly Enter The Pincode in Numeric"))
{
if(isEmpty(phonenumber,"Enter The Phone Number"))
{
if(isNumericPhoneNo(phonenumber,"Kindly Enter The Phone Number in Numeric"))
{
if(isEmpty(faxnumber,"Enter The Fax Number"))
{
if(isNumericPhoneNo(faxnumber,"Kindly Enter The Fax Number in Numeric"))
{
if(isEmpty(email,"Enter The Email"))
{
if(emailValidator(email,"Enter A Valid Email Address"))
{
if(isEmpty(website,"Enter The Website"))
{
if(iswebsite(website,"Enter A Valid Website Address"))
{
if(isEmpty(conpersonname,"Enter The Contact Person Name"))
{
if(isnamealpha(conpersonname,"Enter A Valid Contact Person Name"))
{
if(isEmpty(conpersonmailid,"Enter The Contact Person Email Address"))
{
if(emailValidator(conpersonmailid,"Enter A Valid Contact Person Email Address"))
{
if(isEmpty(conphonenumber,"Enter The Contact Person Phone Number"))
{
if(isNumericPhoneNo(conphonenumber,"Kindly Enter The Contact Person Phone Number in Numeric"))
{
return true;
}
}
}
}
}
}
}
}
}
}
}
}
}
}
}
}
}
}
}
}
}
}
}
return false;
}


function university_edit_details_validation()
{
var universityname = document.getElementById('universityNameTextBox');
var state = document.getElementById('stateTextBox');
var address = document.getElementById('AddLine1');
var country = document.getElementById('countryTextBox');
var pincode = document.getElementById('pincodeTextBox');
var phonenumber = document.getElementById('phoneNumberTextBox');
var faxnumber = document.getElementById('faxNumberTextBox');
var email = document.getElementById('emailIdTextBox');
var website = document.getElementById('websiteNameTextBox');
var conpersonname = document.getElementById('contactPersonNameTextBox');
var conpersonmailid = document.getElementById('contactPersonMailIdTextBox');
var conphonenumber = document.getElementById('contactPersonPhoneNumberTextBox');
if(isEmpty(universityname,"Enter The University Name"))
{
if(isAlpha(universityname,"Kindly Enter The University Name in Alpha"))
{
if(isEmpty(state,"Enter The State Name"))
{
if(isAlpha(state,"Kindly Enter The State Name in Alpha"))
{
if(isEmpty(address,"Enter The Address"))
{
if(isEmpty(country,"Enter The Country Name"))
{
if(isAlpha(country,"Kindly Enter The Country Name in Alpha"))
{
if(isEmpty(pincode,"Enter The Pincode"))
{
if(isNumeric(pincode,"Kindly Enter The Pincode in Numeric"))
{
if(isEmpty(phonenumber,"Enter The Phone Number"))
{
if(isNumericPhoneNo(phonenumber,"Kindly Enter The Phone Number in Numeric"))
{
if(isEmpty(faxnumber,"Enter The Fax Number"))
{
if(isNumericPhoneNo(faxnumber,"Kindly Enter The Fax Number in Numeric"))
{
if(isEmpty(email,"Enter The Email"))
{
if(emailValidator(email,"Enter A Valid Email Address"))
{
if(isEmpty(website,"Enter The Website"))
{
if(iswebsite(website,"Enter A Valid Website Address"))
{
if(isEmpty(conpersonname,"Enter The Contact Person Name"))
{
if(isnamealpha(conpersonname,"Enter A Valid Contact Person Name"))
{
if(isEmpty(conpersonmailid,"Enter The Contact Person Email Address"))
{
if(emailValidator(conpersonmailid,"Enter A Valid Contact Person Email Address"))
{
if(isEmpty(conphonenumber,"Enter The Contact Person Phone Number"))
{
if(isNumericPhoneNo(conphonenumber,"Kindly Enter The Contact Person Phone Number in Numeric"))
{

return true;
}
}
}
}
}
}
}
}
}
}
}
}
}
}
}
}
}
}
}
}
}
}
}


return false;
}

        function agent_details_validation()
        {
                var agentcode = document.getElementById('AgentCodeTxt');
                var agentname = document.getElementById('AgentNameTxt');
                var agentcategory = document.getElementById('AgentCategoryCombo');
                var subagent = document.getElementById('MainAgentCodeTxt');
                var agentaddress = document.getElementById('address');
                var agentmailid = document.getElementById('AgentMailIdTxt');
                var agentphonenumber = document.getElementById('AgentPhNoTxt');
                var agentmobilenumber = document.getElementById('AgentMobileNoTxt');
                var agentfaxnumber = document.getElementById('AgentFaxNoTxt');
                var agentcommission = document.getElementById('AgentCommissionTxt');
                var agentmodeofpayment = document.getElementById('AgentModeOfPayComb');
                var agentaccountnumber = document.getElementById('AgentAccountNoTxt');
                var agentpaymentduration = document.getElementById('PaymentDurationTxt');
                var agentpaymentdurationcomb= document.getElementById('PaymentDurationComb');

                if(isEmpty(agentcode,"Agent Code can not be empty")){
                if(isAlphaNumeric(agentcode,"Kindly enter a valid Agent Code")){
                if(isEmpty(agentname,"Name can not be empty")){
                if(isnamealpha(agentname,"Kindly enter a valid Agent Name")){
                if(isMadeSelection(agentcategory,"Category must be selected")){
                if(isMadeSelectionSubAgent(subagent,agentcategory,"Main Agent Code must be selected")){
                if(isEmpty(agentaddress,"Address can not be empty")){
                if(isEmpty(agentmailid,"MailId can not be empty")){
                if(emailValidator(agentmailid,"Kindly enter a valid MailId")){
                if(isNumericPhoneNo(agentphonenumber,"Kindly enter a valid Phone Number")){
                if(isEmpty(agentmobilenumber,"Mobile Number can not be empty")){
                if(isNumericPhoneNo(agentmobilenumber,"Kindly enter a valid Mobile Number")){
                if(isNumericPhoneNo(agentfaxnumber,"Kindly enter a valid Fax Number")){
                if(isEmpty(agentcommission,"Commission can not be empty")){
                if(isDecimalNumeric1(agentcommission,"Kindly enter a valid Commission")){
                if(isDecimalFormat1(agentcommission,"Only Two decimal are allowed")){
                if(ischeckCombo(agentcommission,agentmodeofpayment,"Agent Mode of Payment must be selected")){
                if(checkAccountNumber(agentmodeofpayment,agentaccountnumber,"Account Number can not be empty")){
                if(isEmpty(agentpaymentduration,"Payment Duration can not be empty")){
                if(ischeckCombo(agentpaymentduration,agentpaymentdurationcomb,"Payment Duration must be selected")){
                return true;
                }}}}}}}}}}}}}}}}}}}}
                return false;
        }

        function agent_edit_details_validation()
        {
        var agentname = document.getElementById('AgentNameTxt');
        var agentcategory = document.getElementById('AgentCategoryCombo');
        var subagent = document.getElementById('MainAgentCodeTxt');
        var agentaddress = document.getElementById('address');
        var agentmailid = document.getElementById('AgentMailIdTxt');
        var agentphonenumber = document.getElementById('AgentPhNoTxt');
        var agentmobilenumber = document.getElementById('AgentMobileNoTxt');
        var agentfaxnumber = document.getElementById('AgentFaxNoTxt');
        var agentcommission = document.getElementById('AgentCommissionTxt');
        var agentmodeofpayment = document.getElementById('EAgentModeOfPayComb');
        var agentaccountnumber = document.getElementById('AgentAccountNoTxt');
        var agentpaymentduration = document.getElementById('PaymentDurationTxt');
        var agentpaymentdurationcomb= document.getElementById('PaymentDurationComb');

        if(isEmpty(agentname,"Name can not be empty")){
        if(isnamealpha(agentname,"Kindly enter a valid Agent Name")){
        if(isMadeSelection(agentcategory,"Category must be selected")){
        if(isMadeSelectionSubAgent(subagent,agentcategory,"Main Agent Code must be selected")){
        if(isEmpty(agentaddress,"Address can not be empty")){
        if(isEmpty(agentmailid,"MailId can not be empty")){
        if(emailValidator(agentmailid,"Kindly enter a valid MailId")){
        if(isNumericPhoneNo(agentphonenumber,"Kindly enter a valid Phone Number")){
        if(isEmpty(agentmobilenumber,"Mobile Number can not be empty")){
        if(isNumericPhoneNo(agentmobilenumber,"Kindly enter a valid Mobile Number")){
        if(isNumericPhoneNo(agentfaxnumber,"Kindly enter a valid Fax Number")){
        if(isEmpty(agentcommission,"Commission can not be empty")){
        if(isDecimalNumeric1(agentcommission,"Kindly enter a valid Commission")){
        if(isDecimalFormat1(agentcommission,"Only Two decimal are allowed")){
        if(checkit(agentcommission,agentmodeofpayment,"Agent Mode of Payment must be selected")){
        if(checkAccountNumber(agentmodeofpayment,agentaccountnumber,"Account Number can not be empty")){
        if(isEmpty(agentpaymentduration,"Payment Duration can not be empty")){
        if(checkit(agentpaymentduration,agentpaymentdurationcomb,"Payment Duration must be selected")){
        return true;
        }}}}}}}}}}}}}}}}}}
        return false;
        }

        function checkAccountNumber(elem1,elem2,helperMsg)
        {
                if(elem1.value=="Account Transaction")
                {
                        if(isEmpty(elem2,helperMsg))
                        if(isNumeric(elem2,"Kindly enter a valid Account Number"))
                        return true;
                }
                else return true;
        }

        function ischeckCombo(elem1,elem2,helperMsg)
        {
        var e = elem1.value;
                if(e!='')
                {
                 if(isNumeric(elem1,"Kindly enter a valid Payment Duration"))
                 {
                        if(elem2.value == "--Select--" || elem2.value == "")
                        {
                                //alert(helperMsg);
                                alert(helperMsg);
                                return false;
                        }
                        else
                        {
                                return true;
                        }
                 }
                }
                else return true;
        }

        function checkit(text,combo,helperMsg)
        {
                if((text.value==""||parseInt(text.value)==0||parseInt(text.value)=="NaN")&& combo.selectedIndex==0) return true;
                if((text.value==""||parseInt(text.value)==0||parseInt(text.value)=="NaN")&& combo.selectedIndex!=0) combo.selectedIndex=0;
                if((parseInt(text.value)>0) && combo.selectedIndex==0)  {alert(helperMsg); return false; }
        }


function customer_details_validation()
{
var customerid = document.getElementById('customerid');
var customername = document.getElementById('customername');
var addressline1 = document.getElementById('AddLine1');
var contactperson  = document.getElementById('contactperson');
var phonenumber  = document.getElementById('customerphonenumber');
var faxnumber  = document.getElementById('customerfaxnumber');
var mailid  = document.getElementById('customermailid');
var accountno  = document.getElementById('customeraccountnumber');
var bankname  = document.getElementById('customerbankname');
var branchname  = document.getElementById('customerbranchname');
if(isEmpty(customerid,"Kindly Enter The Customer ID"))
{
if(isAlphaNumeric(customerid,"Kindly Enter The Customer ID in AlphaNumeric"))
{
if(isEmpty(customername,"Kindly Enter The Customer Name"))
{
if(isnamealpha(customername,"Kindly Enter The Customer Name in Alpha"))
{
if(isEmpty(addressline1,"Kindly Enter The Address Line1"))
{
if(isEmpty(contactperson,"Kindly Enter The Contact Person Name"))
{
if(isnamealpha(contactperson,"Kindly Enter The Contact Person Name in Alpha"))
{
if(isEmpty(phonenumber,"Kindly Enter The Customer Phone Number"))
{
if(isNumericPhoneNo(phonenumber,"Kindly Enter The Phone Number in Numeric"))
{
if(isEmpty(faxnumber,"Kindly Enter The Customer Fax Number"))
{
if(isNumericPhoneNo(faxnumber,"Kindly Enter The Fax Number in Numeric"))
{
if(isEmpty(mailid,"Kindly Enter The Customer Mail Id"))
{
if(emailValidator(mailid,"Enter A Valid Customer Email Address"))
{
if(isEmpty(accountno,"Kindly Enter The Customer Account Number"))
{
if(isNumeric(accountno,"Kindly Enter The Account Number in Numeric"))
{
if(isEmpty(bankname,"Kindly Enter The Customer Bank Name"))
{
if(isAlpha(bankname,"Kindly Enter The Bank Name in Alpha"))
{
if(isEmpty(branchname,"Kindly Enter The Branch Name"))
{
if(isAlpha(branchname,"Kindly Enter The Branch Name in Alpha"))
{
return true;
}
}
}
}
}
}
}
}
}
}
}
}
}
}
}
}
}
}
}
return false;
}




function customer_edit_details_validation()
{
var customername = document.getElementById('customername');
var addressline1 = document.getElementById('EAddLine1');
var contactperson  = document.getElementById('contactperson');
var phonenumber  = document.getElementById('customerphonenumber');
var faxnumber  = document.getElementById('customerfaxnumber');
var mailid  = document.getElementById('customermailid');
var accountno  = document.getElementById('customeraccountnumber');
var bankname  = document.getElementById('customerbankname');
var branchname  = document.getElementById('customerbranchname');
if(isEmpty(customername,"Kindly Enter The Customer Name"))
{
if(isnamealpha(customername,"Kindly Enter The Customer Name in Alpha"))
{
if(isEmpty(addressline1,"Kindly Enter The Address Line1"))
{
if(isEmpty(contactperson,"Kindly Enter The Contact Person Name"))
{
if(isnamealpha(contactperson,"Kindly Enter The Contact Person Name in Alpha"))
{
if(isEmpty(phonenumber,"Kindly Enter The Customer Phone Number"))
{
if(isNumericPhoneNo(phonenumber,"Kindly Enter The Phone Number in Numeric"))
{
if(isEmpty(faxnumber,"Kindly Enter The Customer Fax Number"))
{
if(isNumericPhoneNo(faxnumber,"Kindly Enter The Fax Number in Numeric"))
{
if(isEmpty(mailid,"Kindly Enter The Customer Mail Id"))
{
if(emailValidator(mailid,"Enter A Valid Customer Email Address"))
{
if(isEmpty(accountno,"Kindly Enter The Customer Account Number"))
{
if(isNumeric(accountno,"Kindly Enter The Account Number in Numeric"))
{
if(isEmpty(bankname,"Kindly Enter The Customer Bank Name"))
{
if(isAlpha(bankname,"Kindly Enter The Bank Name in Alpha"))
{
if(isEmpty(branchname,"Kindly Enter The Branch Name"))
{
if(isAlpha(branchname,"Kindly Enter The Branch Name in Alpha"))
{
return true;
}
}
}
}
}
}
}
}
}
}
}
}
}
}
}
}
}
return false;
}


function Infrastructure_details_validation()
{
var hallname = document.getElementById('HallName');
var hallcapacity = document.getElementById('HallCapacity');
if(isEmpty(hallname,"Kindly Enter The Hall Name"))
{
if(isAlphaNumeric(hallname,"Kindly Enter The Hall Name in Alpha Numeric"))
{
if(isEmpty(hallcapacity,"Kindly Enter The Hall Capacity"))
{
if(isNumeric(hallcapacity,"Kindly Enter The Hall Capacity in Numeric"))
{
return true;
}
}
}
}
return false;
}



function Infrastructure_edit_details_validation()
{
var hallcapacity = document.getElementById('EHallCapacity');
if(isEmpty(hallcapacity,"Kindly Enter The Hall Capacity"))
{
if(isNumeric(hallcapacity,"Kindly Enter The Hall Capacity in Numeric"))
{
return true;
}
}

return false;
}

        function Bank_details_validation()
        {
                var accountnumber = document.getElementById('accountnumber');
                var accountname = document.getElementById('accountname');
                var balance = document.getElementById('balance');
                var bankname = document.getElementById('bankname');
                var branchname = document.getElementById('branchname');
                var sortcode = document.getElementById('sortcode');
                var openingdate = document.getElementById('Date');
                var address = document.getElementById('address');
                var balancedate = document.getElementById('Date1');
                var conperson = document.getElementById('contactperson');
                var phonenumber = document.getElementById('phone');
                var faxnumber = document.getElementById('fax');
                var website = document.getElementById('web');

                if(isEmpty(accountnumber,"Account Number can not be empty")){
                if(isNumeric(accountnumber,"Kindly enter a valid Account Number")){
                if(isEmpty(accountname,"Account Name can not be empty")){
                if(isnamealpha(accountname,"Kindly enter a valid Account Name")){
                if(isEmpty(balance,"Balance can not be empty")){
                if(isDecimalNumeric(balance,"Kindly enter a valid Balance")){
                if(isDecimalFormat(balance,"Only Two decimal are allowed")){
                if(isEmpty(bankname,"Bank Name can not be empty")){
                if(isbanknamealpha(bankname,"Kindly enter a valid Bank Name")){
                if(isEmpty(branchname,"Branch Name can not be empty")){
                if(isbanknamealpha(branchname,"Kindly enter a valid Branch Name")){
                if(isEmpty(sortcode,"Sort Code can not be empty")){
                if(isNumericSort(sortcode,"Kindly enter a valid Sort code")){
                if(checkSortcode(sortcode,"Kindly enter Sort code in xx-xx-xx format")){
                if(isEmpty(openingdate,"Opening Date must be selected")){
                if(isEmpty(address,"Address can not be empty")){
                if(isEmpty(balancedate,"Balance Date must be selected")){
                if(isnamealpha(conperson,"Kindly enter a valid Contact Person")){
                if(isNumericPhoneNo(phonenumber,"Kindly enter a valid Phone Number")){
                if(isNumericPhoneNo(faxnumber,"Kindly enter a valid Fax Number")){
                if(iswebsite(website,"Kindly enter a valid Website")){
                return true;
                }}}}}}}}}}}}}}}}}}}}}
                return false;
        }

        function Bank_edit_details_validation()
        {
                var accountname = document.getElementById('accountname');
                var balance = document.getElementById('balance');
                var branchname = document.getElementById('branchname');
                var sortcode = document.getElementById('sortcode');
                var branchaddress = document.getElementById('address');
                var balancedate = document.getElementById('Date1');
                var conperson = document.getElementById('contactperson');
                var phonenumber = document.getElementById('phone');
                var faxnumber = document.getElementById('fax');
                var website = document.getElementById('web');

                if(isEmpty(accountname,"Account Name can not be empty")){
                if(isnamealpha(accountname,"Kindly enter a valid Account Name")){
                if(isEmpty(balance,"Balance can not be empty")){
                if(isDecimalNumeric(balance,"Kindly enter a valid Balance")){
                if(isDecimalFormat(balance,"Only Two decimal are allowed")){
                if(isEmpty(branchname,"Branch Name can not be empty")){
                if(isbanknamealpha(branchname,"Kindly enter a valid Branch Name")){
                if(isEmpty(sortcode,"Sort Code can not be empty")){
                if(isNumericSort(sortcode,"Kindly enter a valid Sort code")){
                if(checkSortcode(sortcode,"Kindly enter Sort code in xx-xx-xx format")){
                if(isEmpty(branchaddress,"Address can not be empty")){
                if(isnamealpha(conperson,"Kindly enter a valid Contact Person")){
                if(isNumericPhoneNo(phonenumber,"Kindly enter a valid Phone Number")){
                if(isNumericPhoneNo(faxnumber,"Kindly enter a valid Fax Number")){
                if(iswebsite(website,"Kindly enter a valid Website")){
                return true;
                }}}}}}}}}}}}}}}
                return false;
        }

function countrydeposite_details_validation()
{
var countrycode = document.getElementById('CountryCodeCom');
var coursecode = document.getElementById('CourseCodeCom');
var deposit = document.getElementById('DepositTxt');
var fees = document.getElementById('FeesTxt');
if(isMadeSelection(countrycode,"Kindly Select The CountryCode"))
{
if(isMadeSelection(coursecode,"Kindly Select The CourseCode"))
{
if(isEmpty(deposit,"Kindly Enter The Deposit"))
{
if(isDecimalNumeric(deposit,"Kindly Enter The Deposite in Numeric"))
{
if(isDecimalFormat(deposit,"Only Two decimal are allowed"))
{
if(isEmpty(fees,"Kindly Enter The Fees"))
{
if(isDecimalNumeric(fees,"Kindly Enter The Fees in Numeric"))
{
if(isDecimalFormat(fees,"Only Two decimal are allowed"))
{
return true;
}
}
}
}
}
}
}
}
return false;
}


function college_details_validation()
{
var collegename = document.getElementById('CollegeNameTxt');
var template = document.getElementById('TemplateDesign');
var collegelogo = document.getElementById('File1');
var address = document.getElementById('AddLine1');
var countrycode = document.getElementById('CountryCodeCom');
var location = document.getElementById('Location');
var letterheaddim = document.getElementById('LetterHeadDimmension');
var phonenumber = document.getElementById('PhoneNumber');
var faxnumber = document.getElementById('Fax');
var mail = document.getElementById('MailId');
var website = document.getElementById('Website');
if(isEmpty(collegename,"Kindly Enter The College Name"))
{
if(isAlpha(collegename,"Kindly Enter The Valid College Name"))
{
if(isMadeSelection(template,"Kindly Select The Template Design"))
{
if(isMadeSelection(collegelogo,"Kindly Select The College Logo"))
{
if(isEmpty(address,"Kindly Enter The Address"))
{
if(isMadeSelection(countrycode,"Kindly Select The Country Code"))
{
if(isEmpty(location,"Kindly Enter The Location"))
{
if(isAlpha(location,"Kindly Enter The Valid Location"))
{
if(isMadeSelection(letterheaddim,"Kindly Select The Letter Head Dimmension"))
{
if(isEmpty(phonenumber,"Kindly Enter The Phone Number"))
{
if(isNumericPhoneNo(phonenumber,"Kindly Enter The Valid Phone Number"))
{
if(isEmpty(faxnumber,"Kindly Enter The Fax Number"))
{
if(isNumericPhoneNo(faxnumber,"Kindly Enter The Valid Fax Number"))
{
if(isEmpty(mail,"Kindly Enter The Mail Id"))
{
if(emailValidator(mail,"Enter A Valid  Email Address"))
{
if(isEmpty(website,"Kindly Enter The Website"))
{
if(iswebsite(website,"Enter A Valid Website Address"))
{
return true;
}
}
}
}
}
}
}
}
}
}
}
}
}
}
}
}
}

return false;
}



function college_edit_details_validation()
{
var template = document.getElementById('ETemplateDesign');
var address = document.getElementById('EAddLine1');
var countrycode = document.getElementById('ECountryCodeCom');
var location = document.getElementById('ELocation');
var letterheaddim = document.getElementById('ELetterHeadDimmension');
var phonenumber = document.getElementById('EPhoneNumber');
var faxnumber = document.getElementById('EFax');
var mail = document.getElementById('EMailId');
var website = document.getElementById('EWebsite');
if(isMadeSelection(template,"Kindly Select The Template Design"))
{
if(isEmpty(address,"Kindly Enter The Address"))
{
if(isMadeSelection(countrycode,"Kindly Select The Country Code"))
{
if(isEmpty(location,"Kindly Enter The Location"))
{
if(isAlpha(location,"Kindly Enter The Valid Location"))
{
if(isMadeSelection(letterheaddim,"Kindly Select The Letter Head Dimmension"))
{
if(isEmpty(phonenumber,"Kindly Enter The Phone Number"))
{
if(isNumericPhoneNo(phonenumber,"Kindly Enter The Valid Phone Number"))
{
if(isEmpty(faxnumber,"Kindly Enter The Fax Number"))
{
if(isNumericPhoneNo(faxnumber,"Kindly Enter The Valid Fax Number"))
{
if(isEmpty(mail,"Kindly Enter The Mail Id"))
{
if(emailValidator(mail,"Enter A Valid  Email Address"))
{
if(isEmpty(website,"Kindly Enter The Website"))
{
if(iswebsite(website,"Enter A Valid Website Address"))
{
return true;
}
}
}
}
}
}
}
}
}
}
}
}
}
}

return false;
}




function countrydeposite_edit_details_validation()
{
var deposit = document.getElementById('EDeposit');
var fees = document.getElementById('EFees');
if(isEmpty(deposit,"Kindly Enter The Deposit"))
{
if(isDecimalNumeric(deposit,"Kindly Enter The Deposite in Numeric"))
{
if(isDecimalFormat(deposit,"Only Two decimal are allowed"))
{
if(isEmpty(fees,"Kindly Enter The Fees"))
{
if(isDecimalNumeric(fees,"Kindly Enter The Fees in Numeric"))
{
if(isDecimalFormat(fees,"Only Two decimal are allowed"))
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


function country_details_validation()
{
var countrycode = document.getElementById('CountryCodeTxt');
var country = document.getElementById('CountryTxt');
var nationality = document.getElementById('NationalityTxt');
if(isEmpty(countrycode,"Kindly Enter The CountryCode"))
{
if(isAlpha(countrycode,"Kindly Enter The CountryCode in Alpha"))
{
if(isEmpty(country,"Kindly Enter The Country"))
{
if(isAlpha(country,"Kindly Enter The Country in Alpha"))
{
if(isEmpty(nationality,"Kindly Enter The Nationality"))
{
if(isAlpha(nationality,"Kindly Enter The Nationality in Alpha"))
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



function local_marketing_office_details_validation()
{
var officername = document.getElementById('officerNameTextBox');
var address = document.getElementById('addressTextArea');
var mailid = document.getElementById('mailIdTextBox');
var phonenumber = document.getElementById('phoneNumberTextBox');
var mobilenumber = document.getElementById('mobileNumberTextBox');
if(isEmpty(officername,"Kindly Enter The Officer Name"))
{
if(isAlpha(officername,"Kindly Enter The Officer Name in Alpha"))
{
if(isEmpty(address,"Kindly Enter The Address"))
{
if(isEmpty(mailid,"Kindly Enter The Mail Id"))
{
if(emailValidator(mailid,"Enter A Valid Mail Id"))
{
if(isEmpty(phonenumber,"Kindly Enter The Phone Number"))
{
if(isNumericPhoneNo(phonenumber,"Kindly Enter The Phone Number in Numeric"))
{
if(isEmpty(mobilenumber,"Kindly Enter The Mobile Number"))
{
if(isNumericPhoneNo(mobilenumber,"Kindly Enter The Mobile Number in Numeric"))
{
return true;
}
}
}
}
}
}
}
}
}
return false;
}



function local_marketing_office_edit_details_validation()
{
var officername = document.getElementById('EofficerNameTextBox');
var address = document.getElementById('EaddressTextArea');
var mailid = document.getElementById('EmailIdTextBox');
var phonenumber = document.getElementById('EphoneNumberTextBox');
var mobilenumber = document.getElementById('EmobileNumberTextBox');
if(isEmpty(officername,"Kindly Enter The Officer Name"))
{
if(isAlpha(officername,"Kindly Enter The Officer Name in Alpha"))
{
if(isEmpty(address,"Kindly Enter The Address"))
{
if(isEmpty(mailid,"Kindly Enter The Mail Id"))
{
if(emailValidator(mailid,"Enter A Valid Mail Id"))
{
if(isEmpty(phonenumber,"Kindly Enter The Phone Number"))
{
if(isNumericPhoneNo(phonenumber,"Kindly Enter The Phone Number in Numeric"))
{
if(isEmpty(mobilenumber,"Kindly Enter The Mobile Number"))
{
if(isNumericPhoneNo(mobilenumber,"Kindly Enter The Mobile Number in Numeric"))
{
return true;
}
}
}
}
}
}
}
}
}
return false;
}





function country_edit_details_validation()
{
var country = document.getElementById('ECountryName');
var nationality = document.getElementById('ENationality');
if(isEmpty(country,"Kindly Enter The Country"))
{
if(isAlpha(country,"Kindly Enter The Country in Alpha"))
{
if(isEmpty(nationality,"Kindly Enter The Nationality"))
{
if(isAlpha(nationality,"Kindly Enter The Nationality in Alpha"))
{
return true;
}
}
}
}
return false;
}



function registration_fees_details_validation()
{
var registrationfees = document.getElementById('RegistrationFeesTxt');
if(isEmpty(registrationfees,"Kindly Enter The Registration Fees"))
{
if(isDecimalNumeric(registrationfees,"Kindly Enter The Registration Fees in Numeric"))
{
if(isDecimalFormat(registrationfees,"Only Two decimal are allowed"))
{
return true;
}
}
}
return false;
}




function registration_fees_edit_details_validation()
{
var registrationfees = document.getElementById('ERegFeesTxt');
if(isEmpty(registrationfees,"Kindly Enter The Registration Fees"))
{
if(isDecimalNumeric(registrationfees,"Kindly Enter The Registration Fees in Numeric"))
{
if(isDecimalFormat(registrationfees,"Only Two decimal are allowed"))
{
return true;
}
}
}
return false;
}







function mark_scheme_details_validation()
{
var markschemename = document.getElementById('MarkSchemeName');
var noofcycle = document.getElementById('noofrow');
if(isEmpty(markschemename,"Kindly Enter The Mark Scheme Name"))
{
if(isAlpha(markschemename,"Kindly Enter The Mark Scheme Name in Alpha"))
{
if(isMadeSelection(noofcycle,"Kindly Select The Number Of Cycle"))
{
if(checknoofcycle())
{
return true;
}
}
}
}
return false;
}

        function cohort_details_validation()
        {
                var intake = document.getElementById('Intake');
                var startdate = document.getElementById('StartDate');
                var ExtensionDate1 = document.getElementById('ExtensionDate1');
                var ExtensionDate2 = document.getElementById('ExtensionDate2');

                if(isEmpty(startdate,"Start Date can not be empty")){
                if(isEmpty(ExtensionDate1,"Extension Date1 can not be empty")){
                if(extensiondate(startdate,ExtensionDate1,"Extension Date1 must be greater than Start Date" )){
                if(extensiondate(ExtensionDate1,ExtensionDate2,"Extension Date2 must be greater than Extension Date1" )){
                return true;
                }}}}
                return false;
        }

        function cohort_edit_details_validation()
        {
                var Estartdate = document.getElementById('EStartDate');
                var EExtensionDate1 = document.getElementById('EExtensionDate1');
                var EExtensionDate2 = document.getElementById('EExtensionDate2');

                if(isEmpty(Estartdate,"Start Date can not be empty")){
                if(isEmpty(EExtensionDate1,"Extension Date1 can not be empty")){
                if(extensiondate(Estartdate,EExtensionDate1,"Extension Date1 must be greater than Start Date" )){
                if(extensiondate(EExtensionDate1,EExtensionDate2,"Extension Date2 must be greater than Extension Date1" )){
                return true;
                }}}}
                return false;
        }






function checkSortcode(elem,helperMsg)
{
var sort=elem.value;
if(sort.charAt(2)=="-"&&sort.charAt(5)=="-")
{
return true;
}
else
{
elem.value="";
elem.focus();
//alert(helperMsg);
alert(helperMsg);
return false;
}


}

function checknoofcycle()
{
var tableobj = document.getElementById('table1').rows;
var i,limit1,symbol,limit2,grade;
for(i=1;i<=tableobj.length;i++)
{
        limit1='Upperlimit'+i;
        symbol='Symbol'+i;
        limit2='Lowerlimit'+i;
         grade='Grade'+i;
        var limit1obj=document.getElementById(limit1);
        var symbolobj=document.getElementById(symbol);
        var limit2obj=document.getElementById(limit2);
        var gradeobj=document.getElementById(grade);
        if(tableobj[i].style.display=='')
        {
                if(isEmpty(limit1obj,"Limit1 is missing"))
                {
                if(isDecimalNumeric(limit1obj,"Kindly Enter The Limit1 in Numeric"))
                {
                if(isMadeSelection(symbolobj,"Kindly Select The Symbol"))
                {
                if(isEmpty(limit2obj,"Lower Limit is missing"))
                {
                if(isDecimalNumeric(limit2obj,"Kindly Enter The Limit2 in Numeric"))
                {
                if(isEmpty(gradeobj,"Grade is missing"))
                {
                if(isAlpha(gradeobj,"Kindly Enter The Grade in Alpha"))
                {
                        continue;
                }else return false;
                }else return false;
                }else return false;
                }else return false;
                }else return false;
                }else return false;
                }else return false;
        }else return true;
}

}




function checkinglimit(limit1,limit2,obj,row)
{
if(parseInt(limit1.value) > parseInt(limit2.value))
{
limit2.value=""; obj.value="";
alert("limit2 should be less than limit1");
return false;
}
d=document.getElementById('table1').rows; v=parseInt(limit2.value);
if(d[row].style.display!='none') obj.value=++v;
}

function checkinglimit1(limit1,limit2)
{
if(parseInt(limit1.value)>parseInt(limit2.value))
{
limit2.value="";
alert("limit2 should be less than limit1");
}
}


function checkdate()
{
var today = new Date();
//alert(today);
var openingdate=document.getElementById('Date');
//alert(openingdate.value);
var myDate=new Date();
dat=openingdate.value.split('/');
//alert(dat[0]);
//alert(dat[1]);
//alert(dat[2]);
myDate.setFullYear(dat[0],dat[1]-1,dat[2]);
//alert(myDate);
if(myDate>today)
{
//alert("Select The Valid Date");
alert("Select The Valid Date");
 return false;
}
else return true;

}

function extensiondate(startdate,ExtensionDate1,helperMsg)
{

//alert(openingdate.value);
var myDate=new Date();
var myDate1=new Date();
var dat=startdate.value.split('-');
var dat1=ExtensionDate1.value.split('-');

//alert(dat[0]); alert(dat[1]); alert(dat[2]);

myDate.setFullYear(dat[2],dat[1]-1,dat[0]);
myDate1.setFullYear(dat1[0],dat1[1]-1,dat1[2]);
alert(myDate);
//if(parseInt(myDate1)>parseInt(myDate))
if(myDate1>myDate)
{
return true;
}

else
{
//alert(helperMsg);
alert(helperMsg);
ExtensionDate1.value="";
ExtensionDate1.focus();
return false;
}
}



function isDecimalFormat(elem,helperMsg)
{
var DigitsAfterDecimal = 2;
var val = elem.value;

if(val.indexOf(".") > -1)
{
        if(val.length - (val.indexOf(".")+1) > DigitsAfterDecimal)
        {
                //alert(helperMsg);
                  alert(helperMsg);
                elem.value="";
                elem.focus();
                return false;
        }
        else
        {
                return true;
        }

}
else
{
        return true;
}
}

function isDecimalFormat1(elem,helperMsg)
{
var DigitsAfterDecimal = 2;
var val = elem.value;
if(val!='')
{
        if(val.indexOf(".") > -1)
        {
                if(val.length - (val.indexOf(".")+1) > DigitsAfterDecimal)
                {
                        //alert(helperMsg);
                          alert(helperMsg);
                        elem.value="";
                        elem.focus();
                        return false;
                }
                else
                {
                        return true;
                }

        }
        else
        {
                return true;
        }
}
else return true;
}


function isEmpty(elem, helperMsg)
{
var elem1 = Trim(elem.value);
if(elem1.length == 0)
{
                //alert(helperMsg);
                alert(helperMsg);
                elem.value="";
                elem.focus(); // set the focus to this input
                return false;
        }
        else
        {
        return true;
        }
}

function isAlphaNumeric(elem, helperMsg)
{

        var numericExpression = /^[0-9a-zA-Z]+$/;
        if(elem.value.match(numericExpression))
        {
                return true;
        }else
        {
                //alert(helperMsg);
                alert(helperMsg);
                elem.value="";
                elem.focus();
                return false;

        }
}


function issubnameAlpha(elem, helperMsg)
{

        var numericExpression = /^[a-zA-Z\+\#]+$/;
        if(elem.value.match(numericExpression))
        {
                return true;
        }else
        {
                //alert(helperMsg);
                  alert(helperMsg);
                elem.value="";
                elem.focus();
                return false;

        }
}

function isAlpha(elem, helperMsg)
{

        var numericExpression = /^[a-zA-Z  ]+$/;
        if(elem.value.match(numericExpression))
        {
                return true;
        }else
        {
                //alert(helperMsg);
                alert(helperMsg);
                elem.value="";
                elem.focus();
                return false;

        }
}



function isnamealpha(elem, helperMsg)
{
        if(elem.value.length == 0)
        {
                return true;
        }
       else
        {

                var numericExpression = /^[a-zA-Z. ]+$/;
                if(elem.value.match(numericExpression))
                {
                        return true;
                }
        else
        {
                //alert(helperMsg);
                alert(helperMsg);
                elem.value="";
                elem.focus();
                return false;

        }
        }
}


function isbanknamealpha(elem, helperMsg)
{

        var numericExpression = /^[a-zA-Z\.\& ]+$/;
        if(elem.value.match(numericExpression))
        {
                return true;
        }
        else
        {
                //alert(helperMsg);
                alert(helperMsg);
                elem.value="";
                elem.focus();
                return false;

        }
}





function isNumeric(elem, helperMsg)
{


        var numericExpression = /^[0-9]+$/;
        if(elem.value.match(numericExpression))
        {
                return true;
        }
        else
        {
                //alert(helperMsg);
                alert(helperMsg);
                elem.value="";
                elem.focus();
                return false;

        }
}


function isNumericSort(elem, helperMsg)
{


        var numericExpression = /^[0-9-]+$/;
        if(elem.value.match(numericExpression))
        {
                return true;
        }
        else
        {
                //alert(helperMsg);
                alert(helperMsg);
                elem.value="";
                elem.focus();
                return false;

        }
}







function isNumericPhoneNo(elem, helperMsg)
{
        if(elem.value.length == 0)
        {
                return true;
        }
       else
       {
                var numericExpression = /^[+0-9-]+$/;
                if(elem.value.match(numericExpression))
                {
                return true;
                }
        else
        {
                //alert(helperMsg);
                alert(helperMsg);
                elem.value="";
                elem.focus();
                return false;
        }
        }
}




function emailValidator(elem, helperMsg)
{
                if(elem.value.length == 0)
                {
                        return true;
                }
                else
                {
                        var emailExp = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-\_]+\.[a-zA-z0-9]{2,4}$/;
                        if(elem.value.match(emailExp))
                        {
                        return true;
                        }
                else
                {
                        //alert(helperMsg);
                        alert(helperMsg);
                        elem.value="";
                        elem.focus();
                        return false;
                }
                }
}



function iswebsite(elem, helperMsg)
{
        if(elem.value.length == 0)
        {
                return true;
        }
        else
        {
                var numericExpression = /^[w][w][w]+\.[a-z0-9\.\-\_\*\@]+\.[a-z0-9]+$/;
                if(elem.value.match(numericExpression))
                {
                        return true;
                }
        else
        {
                //alert(helperMsg);
                alert(helperMsg);
                elem.value="";
                elem.focus();
                return false;

        }
        }
}






function isDecimalNumeric(elem, helperMsg)
{
        var numericExpression = /^[0-9.]+$/;
        if(elem.value.match(numericExpression))
        {
                return true;
        }
        else
        {
                //alert(helperMsg);
                alert(helperMsg);
                elem.value="";
                elem.focus();
                return false;

        }
}

function isDecimalNumeric1(elem, helperMsg)
{
        var numericExpression = /^[0-9.]+$/;
        if(elem.value!='')
        {
                if(elem.value.match(numericExpression))
                {
                        return true;
                }
                else
                {
                        //alert(helperMsg);
                        alert(helperMsg);
                        elem.value="";
                        elem.focus();
                        return false;
                }
        }
        else return true;
}


function isMadeSelection(elem, helperMsg)
{
        if(elem.value == "--Select--" || elem.value == "")
        {
                //alert(helperMsg);
                alert(helperMsg);
                return false;
        }
        else
        {
                return true;
        }
}

function isMadeSelectionSubAgent(elem,elem1, helperMsg)

{
        if(elem1.value=="Sub Agent")
        {
        if(elem.value == "Main Agent Code" || elem.value == "")
        {
                //alert(helperMsg);
                alert(helperMsg);
                return false;
        }
        else
        {
                return true;
        }
        }
        else return true;
}


function isMadeSelectionAgentcodeMainCode(elem,elem1,elem2,helperMsg)
{
        if(elem2.value=="Sub Agent")
        {
                if(elem.value==elem1.value)
                {
                        //alert(helperMsg);
                        alert(helperMsg);
                        return false;
                }
                else
                {
                        return true;
                }
        }
        else
        {
        return true;
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


        function course_edit_details_validation()
        {
                var coursename = document.getElementById('CourseNameTxt');
                var courseduration = document.getElementById('CourseDurationTxt');
                var modeofcourse = document.getElementById('ModeOfCourse');
                var levelofcourse = document.getElementById('Levelofcourse');
                var university = document.getElementById('UniversityName');
                var scholarship = document.getElementById('Scholarship');
                var noofsubject = document.getElementById('NumOfSubjectTxt');
                var defaultdeposite = document.getElementById('DefaultDepositTxt');
                var defaultfees = document.getElementById('DefaultFeesTxt');
                var maxinstalment = document.getElementById('MaxInstalmentsTxt');
                var Minadvance = document.getElementById('MinimumAdvanceTxt');

        if(isEmpty(coursename,"Kindly Enter The Course Name"))
        {
        if(isAlpha(coursename,"Kindly Enter The Course Name in Alpha"))
        {
        if(isEmpty(courseduration,"Kindly Enter The Course Duration"))
        {
        if(isNumeric(courseduration,"Kindly Enter The Course Duration in Numeric"))
        {
        if(isMadeSelection(modeofcourse,"Kindly Select The Mode Of Course"))
        {
        if(isMadeSelection(levelofcourse,"Kindly Select The Level Of Course"))
        {
        if(isMadeSelection(university,"Kindly Select The University"))
        {
        if(isMadeSelection(scholarship,"Kindly Select The Scholarship"))
        {
        if(isEmpty(noofsubject,"Kindly Enter The Number Of Subject"))
        {
        if(isNumeric(noofsubject,"Kindly Enter The No Of Subject in Numeric"))
        {
        if(isEmpty(defaultdeposite,"Kindly Enter The Default Deposite"))
        {
        if(isDecimalNumeric(defaultdeposite,"Kindly Enter The Default Deposite in Numeric"))
        {
        if(isDecimalFormat(defaultdeposite,"Only Two decimal are allowed"))
        {
        if(isEmpty(defaultfees,"Kindly Enter The Default Fees"))
        {
        if(isDecimalNumeric(defaultfees,"Kindly Enter The Default Fees in Numeric"))
        {
        if(isDecimalFormat(defaultfees,"Only Two decimal are allowed"))
        {
        if(isEmpty(maxinstalment,"Kindly Enter The Max Instalment"))
        {
        if(isNumeric(maxinstalment,"Kindly Enter The Max Instalment in Numeric"))
        {
        if(isEmpty(Minadvance,"Kindly Enter The Minimum Advance"))
        {
        if(isDecimalNumeric(Minadvance,"Kindly Enter The Minimum Advance in Numeric"))
        {
        if(isDecimalFormat(Minadvance,"Only Two decimal are allowed"))
        {

        return true;
        }
        }
        }
        }
        }
        }
        }
        }
        }
        }
        }
        }
        }
        }
        }
        }
        }
        }
        }
        }
        }
        return false;
        }


        function sub_credit_details_validation()
        {
                var subjectcode = document.getElementById('subjectCodeTextBox');
                var subjectname = document.getElementById('subjectNameTextBox');
                var credit = document.getElementById('creditTextBox');
                var coursecode = document.getElementById('courseCodeCombo');
                var currentIntakeCombo = document.getElementById('currentIntakeCombo');
                if(isEmpty(subjectcode,"Kindly Enter The Subject Code"))
                {
                        if(isAlphaNumeric(subjectcode,"Kindly Enter The Subject Code in AlphaNumeric"))
                        {
                                if(isEmpty(subjectname,"Kindly Enter The Subject Name"))
                                {
                                        if(issubnameAlpha(subjectname,"Kindly Enter The Subject Name in Alpha"))
                                        {
                                                if(isEmpty(credit,"Kindly Enter The Credit"))
                                                {
                                                        if(isNumeric(credit,"Kindly Enter The Credit in Numeric"))
                                                        {
                                                                if(isMadeSelection(coursecode,"Kindly Select The Course Code"))
                                                                        {
                                                                        if(isMadeSelection(currentIntakeCombo,"Kindly Select The Current Intake"))
                                                                        {
                                                                                return true;
                                                                        }
                                                                }
                                                        }
                                                }
                                        }
                                }
                        }
                }
                return false;
        }


        function sub_credit_edit_details_validation()
        {
                var subjectname = document.getElementById('Esubjectname');
                var credit = document.getElementById('Ecredit');
                if(isEmpty(subjectname,"Kindly Enter The Subject Name"))
                {
                        if(issubnameAlpha(subjectname,"Kindly Enter The Subject Name in Alpha"))
                        {
                                if(isEmpty(credit,"Kindly Enter The Credit"))
                                {
                                        if(isNumeric(credit,"Kindly Enter The Credit in Numeric"))
                                        {
                                                return true;
                                        }
                                }
                        }
                }
                return false;
        }

// Master Screen Functions

        function viewtable()
        {
                var rowtable1=document.getElementById('table1').rows;
                var noofrow=document.getElementById('noofrow');
                for(i=0;i<rowtable1.length;i++) rowtable1[i].style.display = 'none';
                if(noofrow.selectedIndex > 0)
                {
                        for(i=0;i<=noofrow.selectedIndex;i++) rowtable1[i].style.display = '';
                        for(i=noofrow.selectedIndex+1;i<=20;i++)
                        {
                        st1="Upperlimit"+i; st2="Lowerlimit"+i; st3="Symbol"+i; st4="Grade"+i;
                        document.getElementById(st1).value="";
                        document.getElementById(st2).value="";
                        document.getElementById(st3).selectedIndex=0;
                        document.getElementById(st4).value="";
                        }
                }
                if(noofrow.selectedIndex ==0) for(i=1;i<=20;i++)
                {
                st1="Upperlimit"+i; st2="Lowerlimit"+i; st3="Symbol"+i; st4="Grade"+i;
                document.getElementById(st1).value="";
                document.getElementById(st2).value="";
                document.getElementById(st3).selectedIndex=0;
                document.getElementById(st4).value="";
                }
        }
        

        function load()
        {
                var i;var rowtable=document.getElementById('table1').rows;
                for(i=0;i<rowtable.length;i++) rowtable[i].style.display = 'none';
        }

        function addOption(selectId, txt, val)
        {
                var objOption = new Option(txt,val);
                document.getElementById(selectId).options.add(objOption);
        }

        function sFun1()
        {
                var code=document.getElementById('sortcode').value;
                if(code.length==2 || code.length==5 ){code=code+"-"; document.getElementById('sortcode').value=code;}
        }

        function sFun2(obj)
        {
        var mlength=obj.getAttribute? parseInt(obj.getAttribute("maxlength")) : ""
        if (obj.getAttribute && obj.value.length>mlength)
        obj.value=obj.value.substring(0,mlength)
        }

        function change(obj,img){obj.background=img;}

        function asit(obj,img){obj.src=img;}

        function changeimage(obj,c){obj.className=c;}

        function PreStudImage()
        {
                //if(navigator.appName=='Netscape') { alert('Preview will not work in Netscape'); return false; }
                var img=new Image();
                img.src=document.getElementById('File1').value;
                var im=img.src;
                document.getElementById('StudentImage').src=im;
                return false;
        }


// Footer

        var Message="Higher Education On Line Software";
        var place=1;
        function scrollIn()
        {
                window.status=Message.substring(0, place);
                if (place >= Message.length){place=1;window.setTimeout("scrollOut()",300);}
                else{place++;window.setTimeout("scrollIn()",50);}
        }

        function scrollOut()
        {
                window.status=Message.substring(place, Message.length);
                if (place >= Message.length){place=1;window.setTimeout("scrollIn()", 100);}
                else {place++;window.setTimeout("scrollOut()", 100);}
        }
        scrollIn()

// Time Table

        function weekCancel() { document.getElementById('assign').innerHTML=""; document.getElementById('weeks').innerHTML=""; document.getElementById('nextWeeks').innerHTML="";}
        function assignCancel() { window.location='ExaminationtimeTable.php';}
        function callme(){ NewCal('Date1','yyyymmdd'); }


//User Rights Creation

        function reload(form)
        {
                var val=form.usertype.options[form.usertype.options.selectedIndex].value;
                self.location='UserRightCreation.php?cat=' + val ;
        }

        function moveForward()
        {
                var left=document.getElementById('listmultiple');
                var right=document.getElementById('listmultiple1');
                var list=document.getElementById('list'); var bind='';
                for(i=0;i<left.options.length;i++) if(left.options[i].selected==true){ f=1;
                for(j=0;j<right.options.length;j++)
                if(left.options[i].text==right.options[j].text) f=0;
                if(f) { var objOption = new Option(left.options[i].text,left.options[i].text);
                document.getElementById('listmultiple1').options.add(objOption); }  }
                list.value=''; for(k=0;k<right.options.length;k++) bind=bind+right.options[k].text+'.';
                list.value=bind;
        }

        function moveBackward()
        {
                var right=document.getElementById('listmultiple1');  var bind='';
                for(j=0;j<right.options.length;j++) if(right.options[j].selected==true) right.remove(right.selectedIndex);
                list.value=''; for(k=0;k<right.options.length;k++) bind=bind+right.options[k].text+'.';
                list.value=bind;
        }






