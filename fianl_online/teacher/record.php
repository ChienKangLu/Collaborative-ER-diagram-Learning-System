<?php
include_once ("mydb2.php");
include_once ("myphpfuntion.php");
// savetodb(jsontext,id,quesid,maxtix)
if(isset($_POST['jsontext'])){
    //echo $_POST['jsontext'];
}else{
    //echo $_POST['jsontext'];
}
$json=json_decode($_POST['jsontext']);


$action_tag=$json -> action_tag;
//echo  $action_tag;
//echo "\n";
$userid=$json ->userid;
//echo $userid;

date_default_timezone_set("Asia/Taipei");
$mydate=date("Y-m-d H:i:s");


$str="INSERT INTO `action_record` (`userid`,`date_time`,`action_tag`) VALUES ('".$userid."','".$mydate."','".$action_tag."');";
myinsert($str);
?>