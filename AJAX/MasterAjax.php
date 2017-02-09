<?php
require_once(dirname(__FILE__) . '/xajax.inc.php');

        function AgentCode($AgentCodeTxt,$con)
        {


                $sql=mysql_query("select count(AgentCode) from agentmaster where AgentCode='$AgentCodeTxt'",$con);
                $AgentCount=mysql_result($sql,0);
                $objResponse =& new xajaxResponse();
                if($AgentCount == 0){}
                else
                {
                $objResponse->addScript("alert('Agent Code $AgentCodeTxt already exist!');");
                $objResponse->addScript("document.getElementById('AgentCodeTxt').value = '';");
                }
                return $objResponse->getXML();
        }

        function AgentMailId($AgentMailTxt,$con)
        {


                $sql=mysql_query("select count(AgentMailId) from agentmaster where AgentMailId='$AgentMailTxt'",$con);
                $AgentCount=mysql_result($sql,0);
                $objResponse =& new xajaxResponse();
                if($AgentCount == 0){}
                else
                {
                $objResponse->addScript("alert('Agent MailId $AgentMailTxt already exist!');");
                $objResponse->addScript("document.getElementById('AgentMailIdTxt').value = '';");
                }
                return $objResponse->getXML();
        }

        function Assestment($Criteria,$type,$con)
        {
                $objResponse =& new xajaxResponse();


                $queryforAssestcount=mysql_query("select count(Criteria) from assestmentdetails where Criteria='$Criteria' and AssestmentType='$type'",$con);
                $Assestcount=mysql_result($queryforAssestcount,0);
                if($Assestcount == 0){}
                else
                {
                $objResponse->addScript("alert('Already assigned for this Criteria and Assestment');");
                $objResponse->addScript("document.getElementById('AssestmentTypeTxt').value = '';");
                $objResponse->addScript("document.getElementById('CriteriaTxt').value = '';");
                $objResponse->addScript("document.getElementById('EAssestmentType').value = '';");
                }
                return $objResponse->getXML();
        }

        function BankDetails($AccNo,$BnkNam,$con)
        {
                $objResponse =& new xajaxResponse();


                $query=mysql_query("select count(accountnumber) from bankdetails where accountnumber='$AccNo' and bankname='$BnkNam'",$con);
                $AccountCount=mysql_result($query,0);
                if($AccountCount == 0){}
                else
                {
                $objResponse->addScript("alert('Bank Name and Account Number already exist!');");
                $objResponse->addScript("document.getElementById('accountnumber').value = '';");
                $objResponse->addScript("document.getElementById('bankname').value = '';");
                }
                return $objResponse->getXML();
        }

        function IntakeMast($Month,$Intake,$con)
        {
                $objResponse =& new xajaxResponse();


                $Intake=$Month.$Intake;
                $queryforcohortcount=mysql_query("select count(Intake) from cohortdetails where Intake='$Intake'",$con);
                $cohortcount=mysql_result($queryforcohortcount,0);
                if($cohortcount == 0){}
                else
                {
                $objResponse->addScript("alert('Intake $Intake already exist!');");
                $objResponse->addScript("document.getElementById('Month').selectedIndex = 7;");
                $objResponse->addScript("document.getElementById('Intake').selectedIndex = 5;");
                }
                return $objResponse->getXML();
        }

        function CollegeDet($ColgNam,$con)
        {


                $query=mysql_query("select count(Collegename) from collegedetails where Collegename='$ColgNam'",$con);
                $Collegecount=mysql_result($query,0);
                $objResponse =& new xajaxResponse();
                if($Collegecount == 0){}
                else
                {
                $objResponse->addScript("alert('College Name $ColgNam already exist!');");
                $objResponse->addScript("document.getElementById('CollegeNameTxt').value = '';");
                }
                return $objResponse->getXML();
        }

        function CountryDepo($Country,$Course,$con)
        {
                $objResponse =& new xajaxResponse();


                $query=mysql_query("select count(CountryDepositDetailsId) from countrydepositdetails where CountryId='$Country' and CourseId='$Course'",$con);
                $CountryDepositCount=mysql_result($query,0);
                if($CountryDepositCount == 0){}
                else
                {
                $objResponse->addScript("alert('Already assigned for this Country and Course');");
                $objResponse->addScript("document.getElementById('CountryCodeCom').selectedIndex = 0;");
                $objResponse->addScript("document.getElementById('CourseCodeCom').selectedIndex = 0;");
                $objResponse->addScript("document.getElementById('ECountryCode').selectedIndex = 0;");
                $objResponse->addScript("document.getElementById('ECourseCode').selectedIndex = 0;");
                }
                return $objResponse->getXML();
        }

        function CountryCode($CountryCode,$con)
        {


                $query=mysql_query("select count(Countrycode) from countrydetails where Countrycode='$CountryCode'",$con);
                $Countrycount=mysql_result($query,0);
                $objResponse =& new xajaxResponse();
                if($Countrycount == 0){}
                else
                {
                $objResponse->addScript("alert('Country Code $CountryCode already exist!');");
                $objResponse->addScript("document.getElementById('CountryCodeTxt').value = '';");
                }
                return $objResponse->getXML();
        }

        function CountryName($CountryName,$con)
        {


                $query=mysql_query("select count(CountryName) from countrydetails where CountryName='$CountryName'",$con);
                $Countrycount=mysql_result($query,0);
                $objResponse =& new xajaxResponse();
                if($Countrycount == 0){}
                else
                {
                $objResponse->addScript("alert('Country Name $CountryName already exist!');");
                $objResponse->addScript("document.getElementById('CountryTxt').value = '';");
                $objResponse->addScript("document.getElementById('ECountryName').value = '';");
                }
                return $objResponse->getXML();
        }

        function CourseMast($CourseCode,$con)
        {


                $query=mysql_query("select count(CourseCode) from coursedetails where CourseCode='$CourseCode'",$con);
                $CourseCount=mysql_result($query,0);
                $objResponse =& new xajaxResponse();
                if($CourseCount == 0){}
                else
                {
                $objResponse->addScript("alert('Course Code $CourseCode already exist!');");
                $objResponse->addScript("document.getElementById('CourseCodeTxt').value = '';");
                }
                return $objResponse->getXML();
        }

        function CourseName($Name,$con)
        {


                $query=mysql_query("select count(CourseName) from coursedetails where CourseName='$Name'",$con);
                $CourseCount=mysql_result($query,0);
                $objResponse =& new xajaxResponse();
                if($CourseCount == 0){}
                else
                {
                $objResponse->addScript("alert('Course Name $Name already exist!');");
                $objResponse->addScript("document.getElementById('CourseNameTxt').value = '';");
                }
                return $objResponse->getXML();
        }

        function EmbasyCode($EmbyCode,$con)
        {


                $query=mysql_query("select count(EmbassyCode) from embassyaddress where EmbassyCode='$EmbyCode'",$con);
                $Embassycount=mysql_result($query,0);
                $objResponse =& new xajaxResponse();
                if($Embassycount == 0){}
                else
                {
                $objResponse->addScript("alert('Embasy Code $EmbyCode already exist!');");
                $objResponse->addScript("document.getElementById('EmbassyCodeTxt').value = '';");
                }
                return $objResponse->getXML();
        }

        function ExamSlot($ExmNam,$slot,$con)
        {


                $query=mysql_query("select count(ExamNameId) from examttslot where ExamNameId='$ExmNam' and SlotName='$slot'",$con);
                $ExamSlotcount=mysql_result($query,0);
                $objResponse =& new xajaxResponse();
                if($ExamSlotcount == 0){}
                else
                {
                $objResponse->addScript("alert('Exam Name and Slot is already assigned');");
                $objResponse->addScript("document.getElementById('ExamNameTxt').value = '';");
                $objResponse->addScript("document.getElementById('SlotNameTxt').value = '';");
                $objResponse->addScript("document.getElementById('ESlotName').value = '';");
                }
                return $objResponse->getXML();
        }

        function InfraStructure($HallName,$con)
        {


                $query=mysql_query("select count(HallName) from infrastructuredetails where HallName='$HallName'",$con);
                $infracount=mysql_result($query,0);
                $objResponse =& new xajaxResponse();
                if($infracount == 0){}
                else
                {
                $objResponse->addScript("alert('Hall Name $HallName already exist!');");
                $objResponse->addScript("document.getElementById('HallName').value = '';");
                }
                return $objResponse->getXML();
        }

        function MarkScheme($Name,$con)
        {


                $query=mysql_query("select count(MarkSchemeName) from markschemedetails where MarkSchemeName='$Name'");
                $MarkSchemeCount=mysql_result($query,0);
                $objResponse =& new xajaxResponse();
                if($MarkSchemeCount == 0){}
                else
                {
                $objResponse->addScript("alert('Mark Scheme Name $Name already exist!');");
                $objResponse->addScript("document.getElementById('MarkSchemeName').value = '';");
                }
                return $objResponse->getXML();
        }

        function SubCredit($SubCode,$con)
        {


                $query=mysql_query("select count(SubjectCode) from subjectcreditdetails where SubjectCode='$SubCode'",$con);
                $subjectcount=mysql_result($query,0);
                $objResponse =& new xajaxResponse();
                if($subjectcount == 0){}
                else
                {
                $objResponse->addScript("alert('Subject Code $SubCode already assigned');");
                $objResponse->addScript("document.getElementById('subjectCodeTextBox').value = '';");
                }
                return $objResponse->getXML();
        }

        function SuppId($suppid,$con)
        {


                $query=mysql_query("select count(customerid) from customerdetails where customerid='$suppid'",$con);
                $CustomerCount=mysql_result($query,0);
                $objResponse =& new xajaxResponse();
                if($CustomerCount == 0){}
                else
                {
                $objResponse->addScript("alert('Supplier Id $suppid already exist');");
                $objResponse->addScript("document.getElementById('customerid').value = '';");
                }
                return $objResponse->getXML();
        }

        function Suppmail($Suppmail,$con)
        {


                $query=mysql_query("select count(customerid) from customerdetails where emailid='$Suppmail'",$con);
                $CustomerCount=mysql_result($query,0);
                $objResponse =& new xajaxResponse();
                if($CustomerCount == 0){}
                else
                {
                $objResponse->addScript("alert('Supplier Mail ID $Suppmail already exist');");
                $objResponse->addScript("document.getElementById('customermailid').value = '';");
                }
                return $objResponse->getXML();
        }

        function UnivCode($Code,$con)
        {


                $query=mysql_query("select count(UniversityCode) from universitydetails where UniversityCode='$Code'",$con);
                $UnivCount=mysql_result($query,0);
                $objResponse =& new xajaxResponse();
                if($UnivCount == 0){}
                else
                {
                $objResponse->addScript("alert('University Code $Code already exist');");
                $objResponse->addScript("document.getElementById('universityCodeTextBox').value = '';");
                }
                return $objResponse->getXML();
        }

        function UnivName($Name,$con)
        {


                $query=mysql_query("select count(UniversityCode) from universitydetails where UniversityName='$Name'",$con);
                $UnivCount=mysql_result($query,0);
                $objResponse =& new xajaxResponse();
                if($UnivCount == 0){}
                else
                {
                $objResponse->addScript("alert('University Name $Name already exist');");
                $objResponse->addScript("document.getElementById('universityNameTextBox').value = '';");
                }
                return $objResponse->getXML();
        }

        function UserCreation($usName,$con)
        {


                $query=mysql_query("select count(UserName) from usercreation where UserName='$usName'",$con);
                $Usercount=mysql_result($query,0);
                $objResponse =& new xajaxResponse();
                if($Usercount == 0){}
                else
                {
                $objResponse->addScript("alert('User Name $usName already exist');");
                $objResponse->addScript("document.getElementById('username').value = '';");
                }
                return $objResponse->getXML();
        }



        function MainAgentCode($AgentCategory,$con)
        {
                $AgentCodeArray = array();


                if($AgentCategory=="Main Agent" || $AgentCategory=="--Select--")
                {
                        $objResponse =& new xajaxResponse();
                        $objResponse->addScript("document.getElementById('MainAgentCodeTxt').disabled = true;");
                        $objResponse->addScript("addOption('MainAgentCodeTxt','" . 'Main Agent Code' . "','Main Agent Code');");
                        return $objResponse->getXML();
                }
                else
                {
                        $sqlgetAgentCode ="select DISTINCT(AgentCode) from agentmaster order by AgentCode";
                        $rs=mysql_query($sqlgetAgentCode,$con);

                        while($Combo=mysql_fetch_array($rs))
                        {
                                $section=$Combo["AgentCode"];
                                $AgentCodeArray[$section]=$section;
                        }
                        $objResponse =& new xajaxResponse();
                        if (count($AgentCodeArray) > 0)
                        {
                                $objResponse->addScript("document.getElementById('MainAgentCodeTxt').disabled = false;");
                                $objResponse->addScript("document.getElementById('MainAgentCodeTxt').options.length = 0;");
                                $objResponse->addScript("addOption('MainAgentCodeTxt','" . 'Main Agent Code' . "','Main Agent Code');");
                                foreach ($AgentCodeArray as $id => $secname3)
                                {
                                     $objResponse->addScript("addOption('MainAgentCodeTxt','" . $secname3 . "','" . $id . "');");
                                }

                        }
                        else
                        {
                                $objResponse->addScript("alert('Please enter the main agent first')");
                                $objResponse->addScript("document.getElementById('MainAgentCodeTxt').options.length = 0;");
                                $objResponse->addScript("addOption('MainAgentCodeTxt','Main Agent Code','Main Agent Code');");
                                $objResponse->addScript("document.getElementById('MainAgentCodeTxt').disabled = true;");
                        }
                        return $objResponse->getXML();
                }
        }

        function getCourse($Settings,$con)
        {
                $objResponse =& new xajaxResponse();
                if($Settings!="None")
                {


                        $sql="SELECT CourseCode,CourseName FROM coursedetails WHERE CourseLevel='$Settings' order by CourseName";
                        $rs=mysql_query($sql,$con);
                        $objResponse->addScript("document.getElementById('ccode').disabled = false;");
                        $objResponse->addScript("document.getElementById('ccode').options.length = 0;");
                        $objResponse->addScript("addOption('ccode','--Select--','None');");
                        while($res=mysql_fetch_array($rs))
                        {
                                $name=$res["CourseCode"];
                                $Cname=$res["CourseName"];
                                $objResponse->addScript("addOption('ccode','" . $Cname . "','" . $name . "');");
                        }
                        mysql_close($con);
                }
                else
                {
                        $objResponse->addScript("document.getElementById('ccode').disabled = false;");
                        $objResponse->addScript("document.getElementById('ccode').options.length = 0;");
                        $objResponse->addScript("addOption('ccode','--Select--','None');");
                        $objResponse->addScript("document.getElementById('section').disabled = false;");
                        $objResponse->addScript("document.getElementById('section').options.length = 0;");
                        $objResponse->addScript("addOption('section','--Select--','None');");
                }
                return $objResponse->getXML();
        }

        function getSection($course,$lvlofCourse,$IntakeA,$con)
        {
                $objResponse =& new xajaxResponse();
                if($course!="None")
                {


                        $exec1=mysql_query("select Section from sectionmaster where CourseCode='$course' and LevelOfCourse='$lvlofCourse'and Intake='$IntakeA'",$con);
                        $objResponse->addScript("document.getElementById('section').disabled = false;");
                        $objResponse->addScript("document.getElementById('section').options.length = 0;");
                        $objResponse->addScript("addOption('section','--Select--','None');");
                        while($res1=mysql_fetch_array($exec1))
                        {
                                $name=$res1["Section"];
                                $objResponse->addScript("addOption('section','" . $name . "','" . $name . "');");
                        }
                        $sqlgetNoOfTerm=mysql_query("select NoOfTerms from coursedetails where CourseCode='$course'",$con);
                        while($res2=mysql_fetch_array($sqlgetNoOfTerm))
                        {
                                $NoOfTerms=$res2["NoOfTerms"];
                        }
                        $objResponse->addScript("document.getElementById('TermNo').disabled = false;");
                        $objResponse->addScript("document.getElementById('TermNo').options.length = 0;");
                        $objResponse->addScript("addOption('TermNo','" . '--Select--' . "','None');");
                        for($i=0;$i<$NoOfTerms;$i++)
                        {
                                $j=$i+1;
                                $objResponse->addScript("addOption('TermNo','" . $j . "','" . $j . "');");
                        }
                        mysql_close($con);
                }
                else
                {
                        $objResponse->addScript("alert('Select the Course code');");
                        $objResponse->addScript("document.getElementById('section').disabled = false;");
                        $objResponse->addScript("document.getElementById('section').options.length = 0;");
                        $objResponse->addScript("addOption('section','--Select--','None');");
                }
                return $objResponse->getXML();
        }

        function ShowTable($Intake,$levelOfCourse,$ccode,$Section,$TermNo,$NameOftheExam,$con)
        {
                $objResponse =& new xajaxResponse();

                if($Intake=='None') { $objResponse->addScript("alert(\"Kindly Select the Intake\");"); return $objResponse->getXML(); }
                if($levelOfCourse=='None') { $objResponse->addScript("alert(\"Kindly Select the Level of Course\");"); return $objResponse->getXML(); }
                if($ccode=='None') { $objResponse->addScript("alert(\"Kindly Select Course Name\");"); return $objResponse->getXML(); }
                if($Section=='None') { $objResponse->addScript("alert(\"Kindly Select the Section\");"); return $objResponse->getXML(); }
                if($TermNo=='None') { $objResponse->addScript("alert(\"Kindly Select the Term Number\");"); return $objResponse->getXML(); }
                if($NameOftheExam=='None') { $objResponse->addScript("alert(\"Kindly Select Name of the Exam\");"); return $objResponse->getXML(); }

                $_SESSION['Intake']=$Intake;
                $_SESSION['LevelOfCourse']=$levelOfCourse;
                $_SESSION['CourseCode']=$ccode;
                $_SESSION['Section']=$Section;
                $_SESSION['TermNo']=$TermNo;
                $_SESSION['NameOfTheExam']=$NameOftheExam;
                $_SESSION['subjectcode']='';
                $_SESSION['date']='';
                $_SESSION['SlotName']='';

                $PrintTable="<table align=center border=0 cellspacing=1 cellpadding=0><tr class=\"headerrow\"><td align=\"center\" colspan=\"6\">Examination Time Table</td></tr><tr height=\"30px\" class=\"label\"><td>Intake</td><td>$Intake</td><td>Level of Course</td><td>$levelOfCourse</td><td>Course Code</td><td>$ccode</td></tr><tr height=\"30px\" class=\"label\"><td>Section</td><td>$Section</td><td>Term Number</td><td>$TermNo</td><td>Name of the Exam</td><td>$NameOftheExam</td></tr></table>";
                $objResponse->addScript("document.getElementById('MainOnload').innerHTML='';");
                $objResponse->addScript("document.getElementById('MainOnload').innerHTML='$PrintTable';");
                $objResponse->addScript("document.getElementById('AssignSubject').innerHTML='';");



                $newtablename = $Intake.'_'.$levelOfCourse.'_'.$ccode.'_'.$Section.'_'.$TermNo.'_'.$NameOftheExam;
                $_SESSION['tablename']=$newtablename;

                $result = mysql_list_tables("heos"); $showtt="true"; $tablename=$newtablename;
                while ($r=mysql_fetch_array($result))
                {
                        $dbtablenames=strtoupper($r[0]);
                        if($newtablename==$dbtablenames) $showtt="false";
                }
                if($showtt=="true")
                {
                        $createtable = "CREATE TABLE $newtablename (`ExamId` bigint(20) NOT NULL auto_increment,`Section` varchar(5) default NULL,`TermNo` varchar(50) default NULL,`NameOfTheExam` varchar(50) default NULL,`SubjectCode` varchar(50) default NULL,`Day` varchar(50) default NULL,`SlotName` varchar(50) default NULL,`Arrear` varchar(50) default NULL,PRIMARY KEY  (`ExamId`)) ENGINE=MyISAM DEFAULT CHARSET=latin1;";
                        $execcreatetable  = mysql_query($createtable,$con);
                }

                $create="<table align=center border=0 cellspacing=1 cellpadding=0><tr class=\"label\"><td>Subject</td><td><select class=\"citizen\" name=\"subjectcombo\" id=\"subjectcombo\" onChange=\"return xajax_setSubject(this.value);\"><option value=\"Select\" Seleceted>Select</option>";

                $execSubjectname=mysql_query("select SubjectCode,SubjectName from subjectcreditdetails where CourseCode='$ccode' and TermNumber='$TermNo'",$con);
                while($r=mysql_fetch_array($execSubjectname))
                {
                        $name=$r["SubjectName"];
                        $Code=$r["SubjectCode"];
                        $querySubCode=mysql_query("select count(SubjectCode) from $newtablename where SubjectCode='$Code'",$con);
                        $SubCount=mysql_result($querySubCode,0);
                        if($SubCount==0)$create=$create."<option value=\"$Code\">$name</option>";
                }
                $execSubjectArrear=mysql_query("Select b.SubjectName,b.SubjectCode from arreardetails as a,subjectcreditdetails as b where a.SubjectCode=b.SubjectCode and a.Term < '$TermNo' and a.CourseCode='$ccode';",$con);
                while($d=mysql_fetch_array($execSubjectArrear))
                {
                        $name=$d["SubjectName"];
                        $Code=$d["SubjectCode"];
                        $querySubCodeA=mysql_query("select count(SubjectCode) from $newtablename where SubjectCode='$Code'",$con);
                        $SubCountA=mysql_result($querySubCodeA,0);
                        if($SubCountA==0)$create=$create."<option value=\"$Code\">A_$name</option>";
                }

                $create=$create."</select></td></tr><tr class=\"label\"><td>Date</td><td><input type=\"text\" name=\"Date1\" id=\"Date1\" readonly class=\"date\" onChange=\"return xajax_setDate(this.value);\">&nbsp;<a href=\"javascript:callme();\"><img src=\"./Images/cal.gif\" alt=\"Pick a date\" width=\"17\" height=\"17\" border=\"0\"></a>";
                $create=$create."</td></tr><tr class=\"label\"><td>Slot Name</td><td><select name=\"SlotName\" id=\"SlotName\" onChange=\"return xajax_setSlotName(this.value);\"><option value=\"Select\">Select</option>";
                $queryselectSlotName="select SlotName from examttslot where ExamName='$NameOftheExam'";
                $queryselectSlotNameexec=mysql_query($queryselectSlotName,$con);
                while($Fetch=mysql_fetch_array($querysxelectSlotNameexec))
                {
                        $SlotName=$Fetch["SlotName"];
                        $create=$create."<option value=\"$SlotName\">$SlotName</option>";
                }
                $create=$create." </select></td></tr>";
                $create=$create."<tr class=\"label\"><td align=\"center\" colspan=\"2\"><input type=\"button\" name=\"btnsubmit\" value=\"Save\" class=\"buttonstatic\" onClick=\"return xajax_setFilltable();\">&nbsp;&nbsp;&nbsp;<input type=\"button\" class=\"buttonstatic\" name=\"btncancel\" value=\"Cancel\" onClick=\"assignCancel();\"></td></tr></table>";

                $createFill="<table align=center border=0 cellspacing=1 cellpadding=0><tr class=\"balanceheaderrow\" height=\"30px\" align=\"center\"><td>S.No</td><td>Subject</td><td>Date</td><td>From Time</td><td>To Time</td><td>Term Number</td><td>Current</td><td></td>";
                $select=mysql_query("select * from $newtablename",$con); $sno=1;
                while($a=mysql_fetch_array($select)){$ExamIdf=$a['ExamId']; $SubjectCodef=$a['SubjectCode']; $datef=$a['Day']; $SlotNamef=$a['SlotName'];$Arrearf=$a['Arrear'];$TermNof=$a['TermNo'];if($TermNof==$Arrearf){$Arrearf='YES';}else{$Arrearf='NO';}
                $selectFT1=mysql_query("select FromTime,ToTime from examttslot where ExamName='$NameOftheExam' and SlotName='$SlotNamef'",$con); while($aFT1=mysql_fetch_array($selectFT1)){$FromTimef=$aFT1['FromTime'];$ToTimef=$aFT1['ToTime'];}
                $createFill=$createFill."<tr class=\"label\"><td height=\"30px\" class=\"balanceheaderrow\" align=\"center\">$sno</td><td>$SubjectCodef</td><td>$datef</td><td>$FromTimef</td><td>$ToTimef</td><td>$TermNo</td><td>$Arrearf</td><td align=\"center\"><input type=\"button\" class=\"buttonstatic\" value=\"Delete\" onClick=\"return xajax_DeleteRecord($ExamIdf);\"></td></tr>";
                $sno++; }
                $createFill=$createFill."</table>";

                $objResponse->addScript("document.getElementById('Fillpage').innerHTML='$createFill';");
                $objResponse->addScript("document.getElementById('AssignSubject').innerHTML='$create';");

                return $objResponse->getXML();
        }

        function setFilltable($con)
        {
                $objResponse =& new xajaxResponse();
                $Intake=$_SESSION['Intake'];
                $levelOfCourse=$_SESSION['LevelOfCourse'];
                $ccode=$_SESSION['CourseCode'];
                $Section=$_SESSION['Section'];
                $TermNo=$_SESSION['TermNo'];
                $NameOftheExam=$_SESSION['NameOfTheExam'];
                $subjectCode=$_SESSION['subjectcode'];
                $date=$_SESSION['date'];
                $SlotName=$_SESSION['SlotName'];

                if($subjectCode=='' || $subjectCode=='Select') { $objResponse->addScript("alert(\"Kindly Select the Subject Name\");"); return $objResponse->getXML(); }
                if($date=='') { $objResponse->addScript("alert(\"Kindly Enter the Date\");"); return $objResponse->getXML(); }
                if($SlotName=='' || $SlotName=='Select') { $objResponse->addScript("alert(\"Kindly Select Slot Name\");"); return $objResponse->getXML(); }



                $execSubjectCodeTerm=mysql_query("select TermNumber from subjectcreditdetails where SubjectCode='$subjectCode'",$con);
                while($r=mysql_fetch_array($execSubjectCodeTerm))
                {
                        $SubjectTerm=$r["TermNumber"];
                }

                $Arrear=$TermNo;
                If($SubjectTerm != $TermNo)$Arrear=$SubjectTerm;

                $newtablename = $Intake.'_'.$levelOfCourse.'_'.$ccode.'_'.$Section.'_'.$TermNo.'_'.$NameOftheExam;
                $SubAlreadyQuery=mysql_query("select count(*) FROM $newtablename WHERE SubjectCode ='$subjectCode' || (SlotName='$SlotName' && Day='$date')",$con);
                $SubAlready=mysql_result($SubAlreadyQuery,0);
                if($SubAlready==0)
                {
                        $queryExamTimeInsert=mysql_query("insert into $newtablename values('0','$Section','$TermNo','$NameOftheExam','$subjectCode','$date','$SlotName','$Arrear')",$con);
                        $objResponse->addScript("alert(\"Assigned Successfully\");");
                }
                if($SubAlready > 0)
                {
                        $objResponse->addScript("alert(\"Already Assigned\");");
                }

                $objResponse->addScript("document.getElementById('subjectcombo').selectedIndex=0;");
                $objResponse->addScript("document.getElementById('SlotName').selectedIndex=0;");
                $objResponse->addScript("document.getElementById('Date1').value='';");
                $_SESSION['subjectcode']='';
                $_SESSION['date']='';
                $_SESSION['SlotName']='';


                $createS="<table align=center border=0 cellspacing=1 cellpadding=0><tr class=\"label\"><td>Subject</td><td><select class=\"citizen\" name=\"subjectcombo\" id=\"subjectcombo\" onChange=\"return xajax_setSubject(this.value);\"><option value=\"Select\" Seleceted >Select</option>";

                $execSubjectname=mysql_query("select SubjectCode,SubjectName from subjectcreditdetails where CourseCode='$ccode' and TermNumber='$TermNo'",$con);
                while($r=mysql_fetch_array($execSubjectname))
                {
                        $name=$r["SubjectName"];
                        $Code=$r["SubjectCode"];
                        $querySubCode=mysql_query("select count(SubjectCode) from $newtablename where SubjectCode='$Code'",$con);
                        $SubCount=mysql_result($querySubCode,0);
                        if($SubCount==0)$createS=$createS."<option value=\"$Code\">$name</option>";
                }
                $execSubjectArrear=mysql_query("Select b.SubjectName,b.SubjectCode from arreardetails as a,subjectcreditdetails as b where a.SubjectCode=b.SubjectCode and a.Term < '$TermNo' and a.CourseCode='$ccode';",$con);
                while($d=mysql_fetch_array($execSubjectArrear))
                {
                        $name=$d["SubjectName"];
                        $Code=$d["SubjectCode"];
                        $querySubCodeA=mysql_query("select count(SubjectCode) from $newtablename where SubjectCode='$Code'",$con);
                        $SubCountA=mysql_result($querySubCodeA,0);
                        if($SubCountA==0)$createS=$createS."<option value=\"$Code\">A_$name</option>";
                }
                $createS=$createS."</select></td></tr><tr class=\"label\"><td>Date</td><td><input type=\"text\" name=\"Date1\" class=\"date\" id=\"Date1\" readonly onChange=\"return xajax_setDate(this.value);\">&nbsp;<a href=\"javascript:callme();\"><img src=\"./Images/cal.gif\" alt=\"Pick a date\" width=\"17\" height=\"17\" border=\"0\"></a>";
                $createS=$createS."</td></tr><tr class=\"label\"><td>Slot Name</td><td><select name=\"SlotName\" id=\"SlotName\" onChange=\"return xajax_setSlotName(this.value);\"><option value=\"Select\">Select</option>";
                $queryselectSlotName="select SlotName from examttslot where ExamName='$NameOftheExam'";
                $queryselectSlotNameexec=mysql_query($queryselectSlotName,$con);
                while($Fetch=mysql_fetch_array($queryselectSlotNameexec))
                {
                        $SlotName=$Fetch["SlotName"];
                        $createS=$createS."<option value=\"$SlotName\">$SlotName</option>";
                }
                $createS=$createS." </select></td></tr>";
                $createS=$createS."<tr class=\"label\"><td align=\"center\" colspan=2><input type=\"button\" name=\"btnsubmit\" value=\"Save\" class=\"buttonstatic\" onClick=\"return xajax_setFilltable();\">&nbsp;&nbsp;&nbsp;<input type=\"button\" name=\"btncancel\" value=\"Cancel\" class=\"buttonstatic\" onClick=\"assignCancel();\"></td></tr></table>";

                $createFillS="<table align=center border=0 cellspacing=1 cellpadding=0><tr class=\"balanceheaderrow\" height=\"30px\" align=\"center\"><td>S.No</td><td>Subject</td><td>Date</td><td>From Time</td><td>To Time</td><td>Term Number</td><td>Current</td><td></td>";
                $select=mysql_query("select * from $newtablename",$con);
                $sno=1;
                while($a=mysql_fetch_array($select)){$ExamIdf=$a['ExamId']; $SubjectCodef=$a['SubjectCode']; $datef=$a['Day']; $SlotNamef=$a['SlotName'];$Arrearf=$a['Arrear'];$TermNof=$a['TermNo'];if($TermNof==$Arrearf){$Arrearf='YES';}else{$Arrearf='NO';}
                $selectFT=mysql_query("select FromTime,ToTime from examttslot where ExamName='$NameOftheExam' and SlotName='$SlotNamef'",$con); while($aFT=mysql_fetch_array($selectFT)){$FromTimef=$aFT['FromTime'];$ToTimef=$aFT['ToTime'];}
                $createFillS=$createFillS."<tr class=\"label\"><td height=\"30px\" class=\"balanceheaderrow\" align=\"center\">$sno</td><td>$SubjectCodef</td><td>$datef</td><td>$FromTimef</td><td>$ToTimef</td><td>$TermNo</td><td>$Arrearf</td><td  align=\"center\"><input type=\"button\" value=\"Delete\" class=\"buttonstatic\" onClick=\"return xajax_DeleteRecord($ExamIdf);\"></td></tr>";
                $sno++; }
                $createFillS=$createFillS."</table>";

                $objResponse->addScript("document.getElementById('Fillpage').innerHTML='';");
                $objResponse->addScript("document.getElementById('Fillpage').innerHTML='$createFillS';");
                $objResponse->addScript("document.getElementById('AssignSubject').innerHTML='';");
                $objResponse->addScript("document.getElementById('AssignSubject').innerHTML='$createS';");

                return $objResponse->getXML();
        }

        function DeleteRecord($ExamId,$con)
        {
                $objResponse =& new xajaxResponse();

                $newtablenameDel=$_SESSION['tablename'];
                $NameOftheExam=$_SESSION['NameOfTheExam'];
                $ccode=$_SESSION['CourseCode'];
                $newtablename=$_SESSION['tablename'];
                $TermNo=$_SESSION['TermNo'];
                 $db=mysql_select_db("heos");
                $queryCourseDelete=mysql_query("delete from $newtablenameDel where ExamId='$ExamId'",$con);
                $objResponse->addScript("alert(\"Deleted Successfully\");");

                $createD="<table align=center border=0 cellspacing=1 cellpadding=0><tr class=\"label\"><td>Subject</td><td><select class=\"citizen\" name=\"subjectcombo\" id=\"subjectcombo\" onChange=\"return xajax_setSubject(this.value);\"><option value=\"Select\" Seleceted >Select</option>";
                $execSubjectname=mysql_query("select SubjectCode,SubjectName from subjectcreditdetails where CourseCode='$ccode' and TermNumber='$TermNo'",$con);
                while($r=mysql_fetch_array($execSubjectname))
                {
                        $name=$r["SubjectName"];
                        $Code=$r["SubjectCode"];
                        $querySubCode=mysql_query("select count(SubjectCode) from $newtablename where SubjectCode='$Code'",$con);
                        $SubCount=mysql_result($querySubCode,0);
                        if($SubCount==0)$createD=$createD."<option value=\"$Code\">$name</option>";
                }
                $execSubjectArrear=mysql_query("Select b.SubjectName,b.SubjectCode from arreardetails as a,subjectcreditdetails as b where a.SubjectCode=b.SubjectCode and a.Term < '$TermNo' and a.CourseCode='$ccode';",$con);
                while($d=mysql_fetch_array($execSubjectArrear))
                {
                        $name=$d["SubjectName"];
                        $Code=$d["SubjectCode"];
                        $querySubCodeA=mysql_query("select count(SubjectCode) from $newtablename where SubjectCode='$Code'",$con);
                        $SubCountA=mysql_result($querySubCodeA,0);
                        if($SubCountA==0)$createD=$createD."<option value=\"$Code\">A_$name</option>";
                }

                $createD=$createD."</select></td></tr><tr class=\"label\"><td>Date</td><td><input type=\"text\" name=\"Date1\" class=\"date\" id=\"Date1\" readonly onChange=\"return xajax_setDate(this.value);\">&nbsp;<a href=\"javascript:callme();\"><img src=\"./Images/cal.gif\" alt=\"Pick a date\" width=\"17\" height=\"17\" border=\"0\"></a>";
                $createD=$createD."</td></tr><tr class=\"label\"><td>Slot Name</td><td><select name=\"SlotName\" id=\"SlotName\" onChange=\"return xajax_setSlotName(this.value);\"><option value=\"Select\">Select</option>";
                $queryselectSlotName="select SlotName from examttslot where ExamName='$NameOftheExam'";
                $queryselectSlotNameexec=mysql_query($queryselectSlotName,$con);
                while($Fetch=mysql_fetch_array($queryselectSlotNameexec))
                {
                        $SlotName=$Fetch["SlotName"];
                        $createD=$createD."<option value=\"$SlotName\">$SlotName</option>";
                }
                $createD=$createD." </select></td></tr>";
                $createD=$createD."<tr class=\"label\"><td align=\"center\" colspan=2><input type=\"button\" class=\"buttonstatic\" name=\"btnsubmit\" value=\" save \" onClick=\"return xajax_setFilltable();\">&nbsp;&nbsp;&nbsp;<input type=\"button\" class=\"buttonstatic\" name=\"btncancel\" value=\"Cancel\" onClick=\"assignCancel();\"></td></tr></table>";


                $createFillD="<table align=center border=0 cellspacing=1 cellpadding=0><tr class=\"balanceheaderrow\" height=\"30px\" align=\"center\"><td>S.No</td><td>Subject</td><td>Date</td><td>From Time</td><td>To Time</td><td>Term Number</td><td>Current</td><td></td>";
                $select=mysql_query("select * from $newtablenameDel",$con);
                $sno=1;
                while($a=mysql_fetch_array($select)){$ExamIdf=$a['ExamId']; $SubjectCodef=$a['SubjectCode']; $datef=$a['Day']; $SlotNamef=$a['SlotName'];$Arrearf=$a['Arrear'];$TermNof=$a['TermNo'];if($TermNof==$Arrearf){$Arrearf='YES';}else{$Arrearf='NO';}
                $selectFT2=mysql_query("select FromTime,ToTime from examttslot where ExamName='$NameOftheExam' and SlotName='$SlotNamef'",$con); while($aFT2=mysql_fetch_array($selectFT2)){$FromTimef=$aFT2['FromTime'];$ToTimef=$aFT2['ToTime'];}
                $createFillD=$createFillD."<tr class=\"label\"><td height=\"30px\" class=\"balanceheaderrow\" align=\"center\">$sno</td><td>$SubjectCodef</td><td>$datef</td><td>$FromTimef</td><td>$ToTimef</td><td>$TermNo</td><td>$Arrearf</td><td align=\"center\"><input type=\"button\" class=\"buttonstatic\" value=\"Delete\" onClick=\"return xajax_DeleteRecord($ExamIdf);\"></td></tr>";
                $sno++; }
                $createFillD=$createFillD."</table>";

                $objResponse->addScript("document.getElementById('Fillpage').innerHTML='';");
                $objResponse->addScript("document.getElementById('AssignSubject').innerHTML='';");
                $objResponse->addScript("document.getElementById('AssignSubject').innerHTML='$createD';");
                $objResponse->addScript("document.getElementById('Fillpage').innerHTML='$createFillD';");

                return $objResponse->getXML();
        }

        function setSubject($hallname,$con){ $objResponse =& new xajaxResponse(); $_SESSION['subjectcode']=$hallname;  return $objResponse->getXML(); }
        function setDate($hallname,$con){ $objResponse =& new xajaxResponse(); $_SESSION['date']=$hallname;  return $objResponse->getXML(); }
        function setSlotName($hallname,$con){ $objResponse =& new xajaxResponse(); $_SESSION['SlotName']=$hallname;  return $objResponse->getXML(); }

        function getCourseSec($Settings,$con)
        {
                $objResponse =& new xajaxResponse();
                if($Settings!="--Select--")
                {


                        $sql="SELECT distinct CourseName,CourseCode FROM coursedetails WHERE LevelOfTheCourse='$Settings' order by CourseName";
                        $rs=mysql_query($sql,$con);
                        $objResponse->addScript("document.getElementById('ccode').disabled = false;");
                        $objResponse->addScript("document.getElementById('ccode').options.length = 0;");
                        $objResponse->addScript("addOption('ccode','--Select--','--Select--');");
                        while($res=mysql_fetch_array($rs))
                        {
                                $name=$res["CourseName"];
                                $Code=$res["CourseCode"];

                                $objResponse->addScript("addOption('ccode','" . $name . "','" . $Code . "');");
                        }
                        mysql_close($con);
                }
                else
                {
                        $objResponse->addScript("document.getElementById('ccode').disabled = false;");
                        $objResponse->addScript("document.getElementById('ccode').options.length = 0;");
                        $objResponse->addScript("addOption('ccode','--Select--','--Select--');");
                }
        return $objResponse->getXML();
        }

         function TermNum($CourseCode,$con)
        {



                $sqlgetNoOfTerm="select NoOfTerms from coursedetails where CourseCode='$CourseCode'";
                $rs=mysql_query($sqlgetNoOfTerm,$con);
                $NoOfTerms=mysql_result($rs,0);
                $objResponse =& new xajaxResponse();

                $objResponse->addScript("document.getElementById('TermNoCombo').disabled = false;");
                $objResponse->addScript("document.getElementById('TermNoCombo').options.length = 0;");
                $objResponse->addScript("addOption('TermNoCombo','" . 'Select' . "','--Select--');");
                for($i=1;$i<=$NoOfTerms;$i++) $objResponse->addScript("addOption('TermNoCombo','" . $i . "','" . $i . "');");
                return $objResponse->getXML();
        }

function setScreenlist($userid,$con){
$objResponse =& new xajaxResponse();
if($userid=='none'){ $objResponse->addscript("document.getElementById('btnsubmit').disabled=1;");
$objResponse->addscript("document.getElementById('divarea').innerHTML='';");
return $objResponse->getXML(); }

$create="<table border=0 cellpadding=0 cellspacing=0><tr><td><select name=\"left\" id=\"left\" size=5>";
$select=mysql_query("select * from screenmaster",$con);
while($ar=mysql_fetch_array($select)){ $scrname=$ar['ScreenName']; $create=$create."<option value=$scrname>$scrname</option>"; }
$create=$create."</select></td><td><input class=\"buttonstatic\" type=\"button\" value=\"---->\" onClick=\"moveForward();\"><br><input class=\"buttonstatic\" type=\"button\" value=\"<----\" onClick=\"moveBackward();\" ></td>";
$create=$create."<td><select name=\"right\" id=\"right\" size=5>";
$dselect=mysql_query("select ScreenId from screenrights where UserType='$userid'",$con);
while($dar=mysql_fetch_array($dselect)){ $scrid=$dar['ScreenId'];
$eselect=mysql_query("select ScreenName from screenmaster where ScreenId='$scrid'",$con);  $scrname=mysql_result($eselect,0);
$create=$create."<option value=$scrname>$scrname</option>"; }
$create=$create."</select></td></tr></table>";
$objResponse->addscript("document.getElementById('divarea').innerHTML='$create';");
$objResponse->addscript("document.getElementById('btnsubmit').disabled=0;");
return $objResponse->getXML();
}




$xajax =& new xajax();
$xajax->registerFunction("AgentCode");
$xajax->registerFunction("AgentMailId");
$xajax->registerFunction("Assestment");
$xajax->registerFunction("BankDetails");
$xajax->registerFunction("IntakeMast");
$xajax->registerFunction("CollegeDet");
$xajax->registerFunction("CountryDepo");
$xajax->registerFunction("CountryCode");
$xajax->registerFunction("CountryName");
$xajax->registerFunction("CourseMast");
$xajax->registerFunction("CourseName");
$xajax->registerFunction("EmbasyCode");
$xajax->registerFunction("ExamSlot");
$xajax->registerFunction("InfraStructure");
$xajax->registerFunction("MarkScheme");
$xajax->registerFunction("SubCredit");
$xajax->registerFunction("SuppId");
$xajax->registerFunction("Suppmail");
$xajax->registerFunction("UnivCode");
$xajax->registerFunction("UnivName");
$xajax->registerFunction("UserCreation");
$xajax->registerFunction("MainAgentCode");
$xajax->registerFunction("getCourse");
$xajax->registerFunction("DeleteRecord");
$xajax->registerFunction("ShowTable");
$xajax->registerFunction("getSection");
$xajax->registerFunction("setFilltable");
$xajax->registerFunction("setSubject");
$xajax->registerFunction("setDate");
$xajax->registerFunction("setSlotName");
$xajax->registerFunction("getCourseSec");
$xajax->registerFunction("TermNum");
$xajax->registerFunction("setScreenlist");
$xajax->processRequests();

?>
