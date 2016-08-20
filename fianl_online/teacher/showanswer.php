<?php
include_once ("mydb2.php");
include_once ("myphpfuntion.php");
// savetodb(jsontext,id,quesid,maxtix)
if(isset($_POST['jsontext'])){
    //echo $_POST['jsontext'];
}else{
    //echo $_POST['jsontext'];
}
//$str="SELECT * FROM upload where groupid = ".$_POST['jsontext']." ORDER by uploadid DESC LIMIT 1";

$str2="SELECT pic.jsontext,pic.maxtrix FROM ques LEFT JOIN pic ON ques.pic_id=pic.pic_id where ques.quesid=".$_POST['quesid'];

$data=myquery2($str2,$link2);

//
//array_walk_recursive($data, function(&$value, $key) {
//    if(is_string($value)) {
//        $value = urlencode($value);
//    }
//});
//echo urldecode(stripslashes(json_encode($data)));

echo json_encode($data);
?>