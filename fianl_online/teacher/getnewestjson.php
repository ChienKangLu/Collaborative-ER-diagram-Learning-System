<?php
include_once ("mydb2.php");
include_once ("myphpfuntion.php");
//echo $_POST['id'];
//echo $_POST['quesid'];

$str="select * from upload where `groupid`=".$_POST['id']." && quesid=".$_POST['quesid']." order by datetime DESC";
//$str="select * from pic where id=".$_POST['id']." && quesid=".$_POST['quesid']." ORDER by datetime DESC";
$pic=myquery($str,$link2);
echo $pic[0][3];
?>