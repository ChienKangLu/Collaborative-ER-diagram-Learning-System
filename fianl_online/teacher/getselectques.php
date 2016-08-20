<?php
include_once ("mydb2.php");
include_once ("myphpfuntion.php");
// savetodb(jsontext,id,quesid,maxtix)
if(isset($_POST['jsontext'])){
    //echo $_POST['jsontext'];
}else{
    //echo $_POST['jsontext'];
}
$quesid=$_POST['quesid'];

$str="SELECT * FROM ques where quesid=".$quesid;
$data=myquery2($str,$link2);

$str="SELECT cardid FROM ques_card where quesid=".$quesid;
$card=myquery2($str,$link2);

$str="SELECT entityid FROM ques_entity where quesid=".$quesid;
$entity=myquery2($str,$link2);

$str="SELECT relationid FROM ques_relation where quesid=".$quesid;
$relation=myquery2($str,$link2);

/*
array_walk_recursive($data, function(&$value, $key) {
    if(is_string($value)) {
        $value = urlencode($value);
    }
});
echo urldecode(stripslashes(json_encode($data)));
*/
$finaldata=array();
$finaldata[]=$data[0];
$finaldata[]=$entity;
$finaldata[]=$relation;
$finaldata[]=$card;

/*
array_walk_recursive($finaldata, function(&$value, $key) {
    if(is_string($value)) {
        $value = urlencode($value);
    }
});
echo urldecode(stripslashes(json_encode($finaldata)));
*/

echo json_encode($finaldata);
/*
echo "\n".json_encode($card);
echo "\n";
echo "\n".json_encode($entity);
echo "\n";
echo "\n".json_encode($relation);*/

?>