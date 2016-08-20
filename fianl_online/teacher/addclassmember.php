<?php
include_once ("mydb2.php");
include_once ("myphpfuntion.php");
// savetodb(jsontext,id,quesid,maxtix)
if(isset($_POST['jsontext'])){
    //echo $_POST['jsontext'];
}else{
    //echo $_POST['jsontext'];
}
//$gid=$_POST['gid'];
//$id= $_POST['id'];
//echo $_POST['jsontext'];
$json=json_decode($_POST['jsontext']);
echo $json[0];
$str1="INSERT INTO `member` (`studentid`, `name`, `code`, `pos`, `class`) VALUES ('".$json[0]."', '".$json[1]."', '".$json[2]."', '".$json[3]."', '".$json[4]."');";
myinsert($str1);
?>