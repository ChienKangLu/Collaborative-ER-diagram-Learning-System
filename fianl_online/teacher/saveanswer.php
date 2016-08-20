<?php
include_once ("mydb2.php");
include_once ("myphpfuntion.php");
// savetodb(jsontext,id,quesid,maxtix)
if(isset($_POST['jsontext'])){
    //echo $_POST['jsontext'];
}else{
    //echo $_POST['jsontext'];
    
}
//echo   $_POST['id'];
//echo   $_POST['quesid'];
//echo   "!!!~~".$_POST['matrix'];




date_default_timezone_set("Asia/Taipei");
$mydate=date("Y-m-d H:i:s");
//echo $mydate;
$str="INSERT INTO `upload` (`groupid`, `quesid`, `jsontext`, `datetime`, `maxtrix`) VALUES ('".$_POST['id']."', '".$_POST['quesid']."', '".$_POST['jsontext']."', '".$mydate."','".$_POST['matrix']."');";

//$str="INSERT INTO pic (`id`,`quesid`,`datetime`,`jsontext`,`maxtrix`)VALUES(".$_POST['id'].",".$_POST['quesid'].",'".$mydate."','".$_POST['jsontext']."','".$_POST['matrix']."');";
myinsert($str);

?>