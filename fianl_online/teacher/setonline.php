<?php
include_once ("mydb2.php");
include_once ("myphpfuntion.php");
// savetodb(jsontext,id,quesid,maxtix)
if(isset($_POST['jsontext'])){
    //echo $_POST['jsontext'];
}else{
    //echo $_POST['jsontext'];
}
$id=$_POST['id'];

$str="UPDATE `ques` SET `online` = '0' WHERE `ques`.`online` = 1;";//remove last online ques online
myinsert($str);
$str="UPDATE `ques` SET `online` = '1' WHERE `ques`.`quesid` = ".$id.";";//set now ques online
myinsert($str);

?>