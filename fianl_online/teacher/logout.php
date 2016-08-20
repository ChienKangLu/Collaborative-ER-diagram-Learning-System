<?php
include_once ("mydb2.php");
include_once ("myphpfuntion.php");
session_start();
session_unset();
session_destroy();


date_default_timezone_set("Asia/Taipei");
$mydate=date("Y-m-d H:i:s");


$str="INSERT INTO `action_record` (`userid`,`date_time`,`action_tag`) VALUES ('".$_POST['id']."','".$mydate."','logout');";
myinsert($str);
//echo "123";
//header('Location: login.php');
?>