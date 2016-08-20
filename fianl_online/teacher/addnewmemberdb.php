<?php
include_once ("mydb2.php");
include_once ("myphpfuntion.php");
// savetodb(jsontext,id,quesid,maxtix)
if(isset($_POST['jsontext'])){
    //echo $_POST['jsontext'];
}else{
    //echo $_POST['jsontext'];
}
$gid=$_POST['gid'];
$id= $_POST['id'];
$str1="INSERT INTO `cluster2_detail` (`groupid`, `userid`) VALUES ('".$gid."', '".$id."');";
myinsert($str1);
?>