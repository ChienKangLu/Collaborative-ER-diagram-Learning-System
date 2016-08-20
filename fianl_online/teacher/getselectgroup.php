<?php
include_once ("mydb2.php");
include_once ("myphpfuntion.php");
// savetodb(jsontext,id,quesid,maxtix)
if(isset($_POST['jsontext'])){
    //echo $_POST['jsontext'];
}else{
    //echo $_POST['jsontext'];
}

$str="SELECT * FROM member where id not in(select userid from cluster2_detail) and pos!='老師'";
$data=myquery2($str,$link2);


array_walk_recursive($data, function(&$value, $key) {
    if(is_string($value)) {
        $value = urlencode($value);
    }
});
echo urldecode(stripslashes(json_encode($data)));
?>