<?php
include_once ("mydb2.php");
include_once ("myphpfuntion.php");
// savetodb(jsontext,id,quesid,maxtix)
if(isset($_POST['jsontext'])){
    //echo $_POST['jsontext'];
}else{
    //echo $_POST['jsontext'];
}
//echo $_POST['jsontext'];
$json=json_decode($_POST['jsontext']);
//echo $json[0];
//echo $json[1];
//echo $json[2];
//echo $json[3];
//echo $json[4];
$str1="UPDATE `member` SET `studentid` = '".$json[1]."', `name` = '".$json[2]."' , `code` = '".$json[3]."' , `pos` = '".$json[4]."', `class` = '".$json[5]."' WHERE `member`.`id` = ".$json[0].";";
myinsert($str1);

?>