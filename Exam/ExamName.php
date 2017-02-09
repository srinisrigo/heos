<?php
session_start();
?>
<html><head>
<meta http-equiv="Page-Exit" content="revealTrans(Duration=0.5,Transition=22)">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="./Images/heoscss.css" rel="stylesheet" type="text/css">
<script language="javascript" type="text/javascript" src="./Images/MasterScript.js"></script>
<title>Exam Name Master</title></head>

<?php
        print "<body><form action=\"ExamName.php\" method=\"post\">
        <table align=center border=0 cellspacing=1 cellpadding=0>
        <tr class=\"headerrow\"><td colspan=2 align=center>EXAM NAME</td></tr>
        <tr class=\"label\"><td>Exam Name</td><td><input type=\"text\" name=\"ExamName\"></td></tr>
        <tr class=\"label\"><td colspan=\"2\" align=\"center\"><input type=\"submit\" name=\"btnsubmit\" onclick=\"return formValidator()\" value=\"Add\" class=\"buttonstatic\" onmouseover=\"changeimage(this,'buttonover');\" onmouseout=\"changeimage(this,'buttonstatic');\"></td>
        </tr></table></form></body></html>\n";

        if(!isset($_POST['btnsubmit']) && !isset($_POST['btnedit']) && !isset($_POST['btncancel']) && !isset($_POST['btndelete']) && !isset($_POST['btnupdate']))
        {
                $_SESSION['editreference']="";
                $_SESSION['updatereference']="";
                examfill();
        }


        function examfill()
        {
                if(!isset($_GET['page']))
                {
                        @$cat=$_GET['cat'];
                        if(strlen($cat)==0)
                        {
                                $page=1;
                                fillpage($page);
                        }
                        else if(strlen($cat)==6 || strlen($cat)==10 )
                        {
                        if(!isset($_SESSION['pagevalueforExamName']))
                        {
                                $page=1;
                                $_SESSION['pagevalueforExamName']=$page;
                                fillpage($page);
                        }
                        else
                        {
                                $page=$_SESSION['pagevalueforExamName'];
                                $_SESSION['pagevalueforExamName']=$page;
                        }
                }
                else
                {
                        $page=$_SESSION['pagevalueforExamName'];
                        fillpage($page);
                }
                }
                else
                {
                        $page = $_GET['page'];
                        $_SESSION['pagevalueforExamName']=$page;
                        fillpage($page);
                }
        }


        if(isset($_POST['btnsubmit']))
        {
                $ExamName=$_POST['ExamName'];
                $ExamName = ucfirst($ExamName);
                $con=mysql_connect("192.168.15.24","root","admin");
                $db=mysql_select_db("heos",$con);
                $queryExamcount=mysql_query("select count(ExamName) from examnames where ExamName='$ExamName'",$con);
                $ExamCount=mysql_result($queryExamcount,0);

                if($ExamCount==0)
                {
                        $queryExaminsert=mysql_query("insert into examnames values('$ExamName','')",$con);
                        echo "<script langauge=\"javascript\">alert('Successfully Inserted')</script>";
                        examfill();
                }
                else if($ExamCount>0)
                {
                        echo "<script langauge=\"javascript\">alert('Exam Name Already Exists')</script>";
                        examfill();
                }
        }


        function fillpage($page)
        {
                @$cat=$_GET['cat'];
                $_SESSION['pagevalueforExamName']=$page;
                $page  = (int) $page;
                $limit = 10;
                $con=mysql_connect("192.168.15.24","root","admin");
                $db=mysql_select_db("heos",$con);
                $result = mysql_query("select count(*) from examnames",$con);
                $total = mysql_result($result, 0);
                $pager  = getPagerData($total, $limit, $page);
                if($total==0){$offset=0;}
                else{$offset = $pager->offset;}
                $limit  = $pager->limit;
                $page   = $pager->page;
                $queryselectExam="select * from examnames order by ExamName limit $offset,$limit";
                $queryselectExamexec=mysql_query($queryselectExam,$con);

                print "<form action=\"ExamName.php\" method=\"post\">
                <table align=center border=0 cellspacing=1 cellpadding=0>
                <tr><td>S.No</td><td>Exam Name</td><td colspan=2>&nbsp;</td></tr>\n";
                $sno=1;
                 while($Fetch=mysql_fetch_array($queryselectExamexec))
                {
                        $ExamName=$Fetch["ExamName"];
                        $ExamNameId=$Fetch["ExamNameId"];
                        print "<tr class=\"label\"><td name=d[] value=\"$sno\">$sno</td>
                        <td>$ExamName</td><input type=\"hidden\" name=\"ExamNameId[]\" value=\"$ExamNameId\"><td>
                        <input type=\"submit\" name=\"btnedit[$ExamNameId]\" value=\"Edit\" class=\"buttonstatic\" onmouseover=\"changeimage(this,'buttonover');\" onmouseout=\"changeimage(this,'buttonstatic');\"></td>
                        <td><input type=\"submit\" name=\"btndelete[$ExamNameId]\"  value=\"Delete\" class=\"buttonstatic\" onmouseover=\"changeimage(this,'buttonover');\" onmouseout=\"changeimage(this,'buttonstatic');\"></td></tr>\n";
                        $sno=$sno+1;
                }
                print "<tr><td align=\"center\" colspan=\"4\" class=\"label\">\n";
                if ($page == 1) // this is the first page - there is no previous page
                echo "Previous";
                else            // not the first page, link to the previous page
                echo "<a href=\"ExamName.php?page=" . ($page - 1) . "\">Previous</a>";
                print " ||  \n";
                if ($page == $pager->numPages) // this is the last page - there is no next page
                echo "Next";
                else            // not the last page, link to the next page
                echo "<a href=\"ExamName.php?page=" . ($page + 1) . "\">Next</a>";
                print "<br>$page of $pager->numPages</td></tr></table></form>\n";
        }


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


        if(isset($_POST['btnedit']))
        {
                $ExamCount=$_POST['btnedit'];
                $_SESSION['Examafteredit']=$ExamCount;
                editfill();
        }


        function editfill()
        {
                $page=$_SESSION['pagevalueforExamName'];
                $limit = 10;
                $con=mysql_connect("192.168.15.24","root","admin");
                $db=mysql_select_db("heos",$con);
                $result =mysql_query("select count(*) from examnames",$con);
                $total = mysql_result($result, 0);
                $pager  = getPagerData($total, $limit, $page);
                $offset = $pager->offset;
                $limit  = $pager->limit;
                $page   = $pager->page;
                $arrayExam=$_SESSION['Examafteredit'];
                $queryselectExam ="select * from examnames order by ExamName limit $offset,$limit";
                $queryselectExamexec=mysql_query($queryselectExam,$con);
                print "<form action=\"ExamName.php\" method=\"post\">
                <table align=center border=0 cellspacing=1 cellpadding=0>
                <tr><td>S.No</td><td>Exam Name</td><td>&nbsp;</td><td>&nbsp;</td></tr>\n";
                $sno=1;
                while($EFetch=mysql_fetch_array($queryselectExamexec))
                {
                        $ExamName=$EFetch["ExamName"];
                        $ExamNameId=$EFetch["ExamNameId"];
                        if(array_key_exists($ExamNameId,$arrayExam))
                        {
                                print "<tr class=\"label\"><input type=\"hidden\" name=\"ExamNameId[]\" value=\"$ExamNameId\"><td name=d[] value=$sno>$sno</td>
                                <td><input width=\"2\" type=\"text\" name=\"ExamName[]\" onKeyPress=\"return keyRestrict(event,'abcdefghijklmnopqrstuvwxyz0123456789 '+String.fromCharCode(241))\"  value=\"$ExamName\"/></td>
                                <td><input type=\"submit\" name=\"btnupdate[$ExamNameId]\" value=\"Update\" class=\"buttonstatic\" onmouseover=\"changeimage(this,'buttonover');\" onmouseout=\"changeimage(this,'buttonstatic');\"></td>
                                <td><input type=\"submit\" name=\"btncancel[]\" value=\"Cancel\" class=\"buttonstatic\" onmouseover=\"changeimage(this,'buttonover');\" onmouseout=\"changeimage(this,'buttonstatic');\"></td></tr>\n";
                        }
                        else
                        {
                                print "<tr>
                                <input type=\"hidden\" name=\"ExamNameId1[]\" value=\"$ExamNameId\">
                                <td name=d[] value=$sno align=\"center\" class=\"balanceheaderrow\">$sno</td><td>$ExamName</td>
                                <td><input type=\"submit\" disabled name=\"btnupdate[$ExamNameId]\" value=\"Edit\" class=\"buttonstatic\" onmouseover=\"changeimage(this,'buttonover');\" onmouseout=\"changeimage(this,'buttonstatic');\"></td>
                                <td><input type=\"submit\" disabled name=\"btndelete[$ExamNameId]\" value=\"Delete\" class=\"buttonstatic\" onmouseover=\"changeimage(this,'buttonover');\" onmouseout=\"changeimage(this,'buttonstatic');\"></td></tr>\n";
                        }
                        $sno=$sno+1;
                }
                print "<tr><td align=\"center\" colspan=\"4\" class=\"label\">\n";
                if ($page == 1) // this is the first page - there is no previous page
                echo "Previous";
                else            // not the first page, link to the previous page
                echo "<a href=\"ExamName.php?page=" . ($page - 1) . "\">Previous</a>";
                print " ||  \n";
                if ($page == $pager->numPages) // this is the last page - there is no next page
                echo "Next";
                else            // not the last page, link to the next page
                echo "<a href=\"ExamName.php?page=" . ($page + 1) . "\">Next</a>";
                print "<br>$page of $pager->numPages</td></tr></table></form>\n";
        }


/***********************Cancel Button Code******************************/
        if(isset($_POST['btncancel']))
        {
                $page=$_SESSION['pagevalueforExamName'];
                fillpage($page);
        }

        if(isset($_POST['btnupdate']))
        {
                $flag=0;
                $examidforupdate=$_POST['btnupdate'];
                $ExamName=$_POST['ExamName'][0];
                $ExamName = ucfirst($ExamName);
                $examidarray=array();
                $examidarray=array_keys($examidforupdate);
                $examid=$examidarray[0];
                $con=mysql_connect("192.168.15.24","root","admin");
                $db=mysql_select_db("heos",$con);
                $queryExamexist=mysql_query("select count(*) from examnames where ExamName='$ExamName'",$con);
                $Examcount=mysql_result($queryExamexist,0);
                $examnamelen=strlen($ExamName);


                if($Examcount > 0)
                {
                        echo "<script langauge=\"javascript\">alert('Exam Name Already exists')</script>";
                        $page=$_SESSION['pagevalueforExamName'];
                        fillpage($page);
                }
                else
                {
                        $con=mysql_connect("192.168.15.24","root","admin");
                        $db=mysql_select_db("heos",$con);
                        $queryExamUpdate=mysql_query("update examnames set ExamName='$ExamName' where ExamNameId='$examid'",$con);
                        echo "<script langauge=\"javascript\">alert('Updated Successfully!')</script>";
                        $page=$_SESSION['pagevalueforExamName'];
                        fillpage($page);
                }
        }

/***********************Delete Button Code******************************/
        if(isset($_POST['btndelete']))
        {
                deletefill();
                $examfordelete=$_POST['btndelete'];
                $_SESSION['examfordelete']=$examfordelete;
                echo "<script langauge=\"javascript\">var result=confirm('Are You Sure Want to Delete');if(result){val='delete';self.location='ExamName.php?cat=' + val;}else{val='dontdelete';self.location='ExamName.php?cat=' + val;}</script>";
        }
/*****************************Deleet Button Code Ends***********************/

        function deletefill()
        {
                $page=$_SESSION['pagevalueforExamName'];
                fillpage($page);
        }


        @$cat=$_GET['cat'];
        if(isset($cat) and strlen($cat) == 6)
        {
                $examdelete=$_SESSION['examfordelete'];
                $examarray=array_keys($examdelete);
                $con=mysql_connect("192.168.15.24","root","admin");
                $db=mysql_select_db("heos",$con);

                $queryArrear=mysql_query("select count(ExamNameId) from arreardetails where ExamNameId='$examarray[0]'",$con);
                $ArrearTab=mysql_result($queryArrear,0);

                $queryExamttSlot=mysql_query("select count(ExamNameId) from examttslot where ExamNameId='$examarray[0]'",$con);
                $ExamttSlotTab=mysql_result($queryExamttSlot,0);

                if($ArrearTab==0 && $ExamttSlotTab==0)
                {
                        $querymenudelete=mysql_query("delete from examnames where ExamNameId='$examarray[0]'",$con);
                        echo "<script langauge=\"javascript\">alert('Successfully Deleted!')</script>";
                        $page=$_SESSION['pagevalueforExamName'];
                        fillpage($page);
                }
                else
                {
                        $tab='';
                        if($ArrearTab > 0){$tab="Arrear,";}
                        if($ExamttSlotTab > 0){$tab=$tab." Exam Timetable Slot.";}
                        echo "<script type=\"text/javascript\">alert(\"This Data is in Use in the following forms : $tab\")</script>";
                        $page=$_SESSION['pagevalueforExamName'];
                        fillpage($page);
                }
        }
        else if(isset($cat) and strlen($cat) == 10)
        {
                $page=$_SESSION['pagevalueforExamName'];
                fillpage($page);
        }
?>
