<?php
include_once ("mydb2.php");
include_once ("myphpfuntion.php");
//echo $_POST['id'];
//echo $_POST['quesid'];


$str="select pic_id from ques where quesid=".$_POST['id'];
$pic=myquery($str,$link2);
echo $pic[0][0];
?>