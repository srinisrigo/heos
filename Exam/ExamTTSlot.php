<?php
session_start();
include "MasterAjax.php";
?>
<html><head><?php $xajax->printJavascript();?><title>Exam TimeTable Slot</title></head>
<meta http-equiv="Page-Exit" content="revealTrans(Duration=0.5,Transition=22)">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<script language="javascript" type="text/javascript" src="./Images/MasterScript.js"></script>
<link href="./Images/heoscss.css" rel="stylesheet" type="text/css">
<body>

<?php
////////////////////////////////    Form to Display Onload     ////////////////////////////////////////////////////
print "
<form action=\"ExamTTSlot.php\" method=\"post\" name=\"ExamTTSlot\">
<table align=center border=0 cellspacing=1 cellpadding=0><tr class=\"headerrow\"><td align=\"center\" colspan=\"4\">
EXAM TIME TABLE SLOT DETAILS</td></tr><tr class=\"label\">
                <td>Exam Name</td><td>
                <select name=\"ExamNameTxt\" id=\"ExamNameTxt\">
                <option value=\"None\">--Select--</option>";
                $con=mysql_connect("192.168.15.24","root","admin");
                $db=mysql_select_db("heos",$con);
                $queryselectExmName="select ExamName,ExamNameId from examnames order by ExamName";
                $queryselectExmNameexec=mysql_query($queryselectExmName,$con);
                while($Fetch=mysql_fetch_array($queryselectExmNameexec))
                {
                $ExamName=$Fetch["ExamName"];
                $ExamNameId=$Fetch["ExamNameId"];
                echo"<option value=\"$ExamNameId\">$ExamName</option>";
                }
                echo"</select>&nbsp;&nbsp;&nbsp;&nbsp;<a href=\"ExamName.php\">New</a></td>
                <td>Slot Name</td><td><input type=\"text\" name=\"SlotNameTxt\" id=\"SlotNameTxt\" onChange=\"return xajax_ExamSlot(document.getElementById('ExamNameTxt').value,document.getElementById('SlotNameTxt').value);\"> </td>
                </tr>

                <tr class=\"label\">
                <td>From Time</td><td>
                <select name=\"FromTime\" id=\"FromTime\">
                <option value=\"Time\" seleceted>Time</option>";
                for($i=0;$i<=23;$i++) for($j=0;$j<60;$j+=5)
                {
                if($i<10 && $j<10) $t=$i.':0'.$j;
                else if($i>9 && $j<10) $t=$i.':0'.$j;
                else if($i<10 && $j>9) $t=$i.':'.$j;
                else $t=$i.':'.$j;
                echo "<option value=\"$t\">$t</option>";
                }
                echo"</select></td>
                <td>To Time</td><td><select name=\"ToTime\" id=\"ToTime\"><option value=\"Time\" seleceted>Time</option>";
                for($i=0;$i<=23;$i++) for($j=0;$j<60;$j+=5)
                {
                if($i<10 && $j<10) $t=$i.':0'.$j;
                else if($i>9 && $j<10) $t=$i.':0'.$j;
                else if($i<10 && $j>9) $t=$i.':'.$j;
                else $t=$i.':'.$j;
                echo "<option value=\"$t\">$t</option>";
                }
                echo"</select></td>
                <tr><td colspan=4 align=center>
                <input type=\"submit\" value=\"Add\" id=\"addButton\" name=\"addButton\" class=\"buttonstatic\" onmouseover=\"changeimage(this,'buttonover');\" onmouseout=\"changeimage(this,'buttonstatic');\"></td></tr></table></form>\n";

////////////////////////////////    End of Onload Form     ////////////////////////////////////////////////////
/////////////////////////////////Loop to Display forms For Onload//////////////////////////////////////////////
        if(!isset($_POST['editButton']) && !isset($_POST['cancelbutton']) && !isset($_POST['deleteButton']) && !isset($_POST['updateButton']) && !isset($_POST['addButton']))
        {
           $_SESSION['editreference']="";$_SESSION['updatereference']="";ExamTTSlotFill();
        }
////////////////////////////////    End of Loop     /////////////////////////////////////////////////////////
/////////////////////////////////Function For Paging fill Table//////////////////////////////////////////////

        function ExamTTSlotFill()
        {
           if(!isset($_GET['page']))
           {
              @$cat=$_GET['cat'];
              if(strlen($cat)==0)
              {
                 $page=1;
                 fillPage($page);
              }
              else if(strlen($cat)==6 || strlen($cat)==10 )
              {
                 if(!isset($_SESSION['pagevalueForExmTTSlot']))
                 {
                    $page=1;
                    $_SESSION['pagevalueForExmTTSlot']=$page;
                    fillPage($page);
                 }
                 else
                 {
                    $page=$_SESSION['pagevalueForExmTTSlot'];
                    $_SESSION['pagevalueForExmTTSlot']=$page;
                 }
              }
              else
              {
                 $page=$_SESSION['pagevalueForExmTTSlot'];
                 fillPage($page);
              }
           }
           else
           {
              $page = $_GET['page'];
              $_SESSION['pagevalueForExmTTSlot']=$page;
              fillPage($page);
           }
        }
////////////////////////////////    End of Function     ////////////////////////////////////////////
/////////////////////////////////Action For Add Button//////////////////////////////////////////////

        if(isset($_POST['addButton']))
        {

           $ExamNameTxt=trim($_POST['ExamNameTxt']);
           $SlotNameTxt=trim($_POST['SlotNameTxt']);
           $SlotNameTxt = ucfirst($SlotNameTxt);
           $FromTime=trim($_POST['FromTime']);
           $ToTime=trim($_POST['ToTime']);

           $con=mysql_connect("192.168.15.24","root","admin");
           $db=mysql_select_db("heos",$con);
           $queryforExmSlotcount=mysql_query("select count(*) from examttslot where ExamNameId='$ExamNameTxt' and SlotName='$SlotNameTxt'",$con);
           $ExamSlotcount=mysql_result($queryforExmSlotcount,0);


          if($ExamSlotcount==0)
           {
              $queryExamSlotinsert=mysql_query("insert into examttslot values('0','$ExamNameTxt','$SlotNameTxt','$FromTime','$ToTime')",$con);
              echo "<script type=\"text/javascript\">alert(\"Successfully Inserted\")</script>";
              ExamTTSlotFill();
           }
           else
           {
              echo "<script type=\"text/javascript\">alert(\"Slot Already Assigned\")</script>";
              ExamTTSlotFill();
           }
        }

////////////////////////////////      End of Add Button Action     ////////////////////////////////////////////////////
/////////////////////////////////Function To Fill Datas in Table///////////////////////////////////////////////////////

        function fillPage($page)
        {
           @$cat=$_GET['cat'];
           $_SESSION['pagevalueForExmTTSlot']=$page;
           $page  = (int) $page;
           $limit = 10;
           $con=mysql_connect("192.168.15.24","root","admin");
           $db=mysql_select_db("heos",$con);
           $result =mysql_query("select count(*) from examttslot",$con);
           $total = mysql_result($result, 0);
           $pager  = getPagerData($total, $limit, $page);

           if($total==0)
           {
              $offset=0;
           }
           else
           {
              $offset = $pager->offset;
           }

           $limit  = $pager->limit;
           $page   = $pager->page;

           $queryselectExmttSlot="select * from examttslot limit $offset,$limit";
           $queryselectExmttSlotexec=mysql_query($queryselectExmttSlot,$con);
           print "<form action=\"ExamTTSlot.php\" method=\"post\" name=\"ExamTTSlot\">
           <br><table align=center border=0 cellspacing=1 cellpadding=0>
           <tr><td>S.No</td><td>Exam Name</td><td>Slot Name</td><td>From Time</td><td>To Time</td><td colspan=2></td></tr>\n";

           $sno=1;

           while($Fetch=mysql_fetch_array($queryselectExmttSlotexec))
             {
                $SlotId=$Fetch["SlotId"];
                $ExamNameId=$Fetch["ExamNameId"];
                $SlotName=$Fetch["SlotName"];
                $FromTime=$Fetch["FromTime"];
                $ToTime=$Fetch["ToTime"];
                $sql =mysql_query("select ExamName from examnames where ExamNameId='$ExamNameId'",$con);
                $ExamName = mysql_result($sql, 0);

                $ToEdit = array($SlotId, $ExamNameId, $SlotName);
                $ToEditFinal=  implode("_", $ToEdit);
                print "
                <tr class=\"label\"><td name=d[] value=\"$sno\">$sno</td>
                <td>$ExamName</td><td>$SlotName</td><td>$FromTime</td><td>$ToTime</td>

                <input type=\"hidden\" name=\"SlotId[]\" value=\"$SlotId\">\n";

                print "<td align=\"center\"><input type=\"submit\" id=\"editButton\" name=\"editButton[$ToEditFinal]\" value=\"Edit\" class=\"buttonstatic\" onmouseover=\"changeimage(this,'buttonover');\" onmouseout=\"changeimage(this,'buttonstatic');\"></td>
                <td align=\"center\"><input type=\"submit\" id=\"deleteButton\" name=\"deleteButton[$ToEditFinal]\"  value=\"Delete\" class=\"buttonstatic\" onmouseover=\"changeimage(this,'buttonover');\" onmouseout=\"changeimage(this,'buttonstatic');\"></td></tr>\n";
                $sno=$sno+1;

            }
            print "<tr><td align=\"center\" colspan=\"7\" class=\"label\">\n";
            if ($page == 1) // this is the first page - there is no previous page
            echo "Previous";
            else            // not the first page, link to the previous page
            echo "<a href=\"ExamTTSlot.php?page=" . ($page - 1) . "\">Previous</a>";
            print " ||  \n";
            if ($page == $pager->numPages) // this is the last page - there is no next page
            echo "Next";
            else            // not the last page, link to the next page
            echo "<a href=\"ExamTTSlot.php?page=" . ($page + 1) . "\">Next</a>";
            print "<br>$page of $pager->numPages</td></tr></table></form>\n";
        }

////////////////////////////////      End of Function     /////////////////////////////////////////////////////////////
/////////////////////////////////Function To Set Page Limit////////////////////////////////////////////////////////////

        function getPagerData($numHits, $limit, $page)
        {
            $numHits  = (int) $numHits;
            $limit    = max((int) $limit, 1);
            $page     = (int) $page;
            $numPages = ceil($numHits / $limit);
            $page = max($page, 1);
            $page = min($page, $numPages);
            $offset = ($page - 1) * $limit;
            $ret = new stdClass;
            $ret->offset   = $offset;
            $ret->limit    = $limit;
            $ret->numPages = $numPages;
            $ret->page     = $page;
            return $ret;
        }

////////////////////////////////      End of Function     /////////////////////////////////////////////////////////////
/////////////////////////////////Action For Edit Button////////////////////////////////////////////////////////////////

        if(isset($_POST['editButton']))
        {
           $presentcount=$_POST['editButton'];
           $_SESSION['ExamttSlotAftEdit']=$presentcount;
           editFill();
        }
////////////////////////////////                         End of Action     /////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////Function to fill datas in table when Edit Button is Clicked////////////////////////////////////////////////////////////////
        function editFill()
        {
                $page=$_SESSION['pagevalueForExmTTSlot'];
                $limit = 10;
                $con=mysql_connect("192.168.15.24","root","admin");
                $db=mysql_select_db("heos",$con);

                $result =mysql_query("select count(*) from examttslot",$con);
                $total = mysql_result($result, 0);


                $pager  = getPagerData($total, $limit, $page);
                $offset = $pager->offset;
                $limit  = $pager->limit;
                $page   = $pager->page;

                $arrayExamTtSlot=$_SESSION['ExamttSlotAftEdit'];

                $querySelectExamttSlot1="select * from examttslot limit $offset,$limit";
                $querySelectExmttSlotExec=mysql_query($querySelectExamttSlot1,$con);

                print "
                <form action=\"ExamTTSlot.php\" method=\"post\">
                <table align=center border=0 cellspacing=1 cellpadding=0>
                <tr><td>S.No</td><td>Exam Name</td><td>Slot Name</td><td>From Time</td><td>To Time</td><td></td><td></td></tr>\n";
                $sno=1;

                while($ExecEdit=mysql_fetch_array($querySelectExmttSlotExec))
                {
                        $SlotId=$ExecEdit["SlotId"];
                        $ExamNameId=$ExecEdit["ExamNameId"];
                        $SlotName=$ExecEdit["SlotName"];
                        $FromTime=$ExecEdit["FromTime"];
                        $ToTime=$ExecEdit["ToTime"];
                        $sql =mysql_query("select ExamName from examnames where ExamNameId='$ExamNameId'",$con);
                        $ExamName = mysql_result($sql, 0);

                        $ForEdit = array($SlotId, $ExamNameId, $SlotName);
                        $ForEditFinal=  implode("_", $ForEdit);

                        if(array_key_exists($ForEditFinal,$arrayExamTtSlot))
                        {
                                $Datas = explode("_", $ForEditFinal);
                                print "<tr class=\"label\">
                                <td name=d[] value=\"$sno\">$sno</td>
                                <td><select name=\"EExamName\" id=\"EExamName\">
                                <option selected value=\"$ExamNameId\">$ExamName</option>  \n";
                                $con=mysql_connect("192.168.15.24","root","admin");
                                $db=mysql_select_db("heos",$con);
                                $sql ="select ExamName,ExamNameId from examnames order by ExamName";
                                $rs=mysql_query($sql,$con);

                                while($Combo=mysql_fetch_array($rs))
                                {
                                        $id=$Combo["ExamNameId"];
                                        $name=$Combo["ExamName"];
                                        if($name==$ExamName){}else{echo"<option value=$id>$name</option>";}
                                }
                                print"</select></td>
                                <td><input type=\"text\" name=\"ESlotName\" id=\"ESlotName\" value=\"$SlotName\" onChange=\"return xajax_ExamSlot(document.getElementById('EExamName').value,document.getElementById('ESlotName').value);\"></td>
                                <td><select name=\"EFromTime\" id=\"EFromTime\"><option value=\"$FromTime\" seleceted>$FromTime</option>";
                                for($i=0;$i<=23;$i++) for($j=0;$j<60;$j+=5)
                                {
                                if($i<10 && $j<10) $t=$i.':0'.$j;
                                else if($i>9 && $j<10) $t=$i.':0'.$j;
                                else if($i<10 && $j>9) $t=$i.':'.$j;
                                else $t=$i.':'.$j;
                                if ($FromTime == $t){}
                                else
                                echo "<option value=\"$t\">$t</option>";
                                }
                                echo"</select></td>
                                <td><select name=\"EToTime\" id=\"EToTime\"><option value=\"$ToTime\" seleceted>$ToTime</option>";
                                for($i=0;$i<=23;$i++) for($j=0;$j<60;$j+=5)
                                {
                                if($i<10 && $j<10) $t=$i.':0'.$j;
                                else if($i>9 && $j<10) $t=$i.':0'.$j;
                                else if($i<10 && $j>9) $t=$i.':'.$j;
                                else $t=$i.':'.$j;
                                if ($ToTime == $t){}
                                else
                                echo "<option value=\"$t\">$t</option>";
                                }
                                echo"</select></td>
                                <td align=\"center\"><input type=\"submit\" id=\"updateButton\" name=\"updateButton[$ForEditFinal]\" value=\"Update\" class=\"buttonstatic\" onmouseover=\"changeimage(this,'buttonover');\" onmouseout=\"changeimage(this,'buttonstatic');\"></td>
                                <td align=\"center\"><input type=\"submit\" id=\"cancelButton\" name=\"cancelButton[]\" value=\"Cancel\" class=\"buttonstatic\" onmouseover=\"changeimage(this,'buttonover');\" onmouseout=\"changeimage(this,'buttonstatic');\"></td></tr>\n";
                        }
                        else
                        {
                                print "<tr class=\"label\">
                                <td name=d[] value=\"$sno\"><input type=\"hidden\" name=\"SlotId\" >$sno</td>
                                <td>$ExamName</td><td>$SlotName</td><td>$FromTime</td><td>$ToTime</td>
                                <td align=\"center\">
                                <input type=\"submit\" id=\"btnupdate\" disabled name=\"btnupdate[$SlotId]\" value=\"Edit\" class=\"buttonstatic\" onmouseover=\"changeimage(this,'buttonover');\" onmouseout=\"changeimage(this,'buttonstatic');\">
                                </td>
                                <td align=\"center\">
                                <input type=\"submit\" id=\"cancelbutton\" disabled name=\"cancelbutton[]\" value=\"Delete\" class=\"buttonstatic\" onmouseover=\"changeimage(this,'buttonover');\" onmouseout=\"changeimage(this,'buttonstatic');\">
                                </td>
                                </tr>\n";
                        }

                        $sno=$sno+1;
                }
                print "<tr><td align=\"center\" colspan=\"7\" class=\"label\">\n";
                if ($page == 1) // this is the first page - there is no previous page
                echo "Previous";
                else            // not the first page, link to the previous page
                echo "<a href=\"ExamTTSlot.php?page=" . ($page - 1) . "\">Previous</a>";
                print " ||  \n";
                if ($page == $pager->numPages) // this is the last page - there is no next page
                echo "Next";
                else            // not the last page, link to the next page
                echo "<a href=\"ExamTTSlot.php?page=" . ($page + 1) . "\">Next</a>";
                print "<br>$page of $pager->numPages</td></tr></table></form>\n";
        }

////////////////////////////////      End of Function     ///////////////////////////////////////////////////////////////
/////////////////////////////////Action For Cancel Button////////////////////////////////////////////////////////////////

        if(isset($_POST['cancelButton']))
        {
           $page=$_SESSION['pagevalueForExmTTSlot'];
        }
////////////////////////////////      End of Action     /////////////////////////////////////////////////////////////////
/////////////////////////////////Action For Update Button////////////////////////////////////////////////////////////////

        if(isset($_POST['updateButton']))
        {
                $flag=0;
                $EExamName=trim($_POST['EExamName']);
                $ESlotName=trim($_POST['ESlotName']);
                $ESlotName = ucfirst($ESlotName);
                $EFromTime=trim($_POST['EFromTime']);
                $EToTime=trim($_POST['EToTime']);
                $ForUpdate=$_POST['updateButton'];
                $ForUpdarray=array_keys($ForUpdate);
                $DatasUpd = explode("_", $ForUpdarray[0]);

                $con=mysql_connect("192.168.15.24","root","admin");
                $db=mysql_select_db("heos",$con);
                $queryforExmTTslotcount=mysql_query("select count(*) from examttslot where ExamNameId='$EExamName' and SlotName='$ESlotName' and SlotId<>'$DatasUpd[0]'",$con);
                $ExmSlotcount=mysql_result($queryforExmTTslotcount,0);

                if($ExmSlotcount==0)
                {
                    $queryExmSlotUpdate=mysql_query("update examttslot set ExamNameId='$EExamName',SlotName='$ESlotName',FromTime='$EFromTime',ToTime='$EToTime' where SlotId='$DatasUpd[0]'",$con);
                    echo "<script type=\"text/javascript\">alert(\"Updated Successfully\")</script>";
                }
                else
                {
                   echo "<script type=\"text/javascript\">alert(\"Exam Name and Slot already assigned\")</script>";
                }
                $page=$_SESSION['pagevalueForExmTTSlot'];
                fillPage($page);
        }

////////////////////////////////      End of Action     /////////////////////////////////////////////////////////////////
/////////////////////////////////Action For Delete Button////////////////////////////////////////////////////////////////

        if(isset($_POST['deleteButton']))
        {
           deleteFill();
           $ExmTTSlotFrdelete=$_POST['deleteButton'];
           $_SESSION['ExmTTSlotFrDelete']=$ExmTTSlotFrdelete;
           echo "<script langauge=\"javascript\">var result=confirm('Are You Sure Want to Delete');if(result){val='delete';self.location='ExamTTSlot.php?cat=' + val;}else{val='dontdelete';self.location='ExamTTSlot.php?cat=' + val;}</script>";
        }
////////////////////////////////           End of Action     /////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////Function to fill table when Delete Button clicked////////////////////////////////////////////////////////////////

        function deleteFill()
        {
           $page=$_SESSION['pagevalueForExmTTSlot'];
           fillPage($page);
        }
////////////////////////////////           End of Function   /////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////    Delete Action Performed Here/////////////////////////////////////////////////////////////////////////////////

@$cat=$_GET['cat'];
        if(isset($cat) and strlen($cat) == 6)
        {
                $ExmTtSlotDelete=$_SESSION['ExmTTSlotFrDelete'];
                $ExmTTSlotarray=array_keys($ExmTtSlotDelete);
                $Datas = explode("_", $ExmTTSlotarray[0]);

                $con=mysql_connect("192.168.15.24","root","admin");
                $db=mysql_select_db("heos",$con);

                $queryforExmName=mysql_query("select count(ExamNameId) from arreardetails where ExamNameId='$Datas[0]'",$con);
                $ArrearTable=mysql_result($queryforExmName,0);
                if($ArrearTable==0)
                {
                        $queryExmSlotDelete=mysql_query("delete from examttslot where SlotId='$Datas[0]'",$con);
                        echo "<script type=\"text/javascript\">alert(\"Successfully Deleted\")</script>";
                        $page=$_SESSION['pagevalueForExmTTSlot'];
                        fillpage($page);
                }
                else
                {         
                        $tab='';
                        if($ArrearTable > 0){$tab="Arrear";}
                        echo "<script type=\"text/javascript\">alert(\"This Data is in Use in the following forms $tab\")</script>";
                        $page=$_SESSION['pagevalueForExmTTSlot'];
                        fillpage($page);
                }

        }
        else if(isset($cat) and strlen($cat) == 10)
        {
                $page=$_SESSION['pagevalueForExmTTSlot'];
                fillpage($page);
        }
//////////////////////////////// End of Loop /////////////////////////////////////////////////////////////////////////////////////
?>

</body></html>
