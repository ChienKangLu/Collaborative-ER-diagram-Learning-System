<?php
include_once ("mydb2.php");
include_once ("myphpfuntion.php");
// savetodb(jsontext,id,quesid,maxtix)




//echo $_POST['quesid']+"\n";
$str="SELECT * FROM ques where quesid=".$_POST['quesid'];
$ques=myquery2($str,$link2);


$data=$ques;



//array_walk_recursive($data, function(&$value, $key) {
//    if(is_string($value)) {
//        $value = urlencode($value);
//    }
//});
//echo urldecode(stripslashes(json_encode($data)));
echo json_encode($data);

?>