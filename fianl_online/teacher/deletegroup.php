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
$str1="DELETE FROM cluster2_detail where groupid=".$gid;
myinsert($str1);
$str1="DELETE FROM cluster2 where groupid=".$gid;
myinsert($str1);
$str1="DELETE FROM upload where groupid=".$gid;
myinsert($str1);
?>