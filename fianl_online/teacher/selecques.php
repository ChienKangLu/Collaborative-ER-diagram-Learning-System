<?php
include_once ("mydb2.php");
include_once ("myphpfuntion.php");
// savetodb(jsontext,id,quesid,maxtix)
if(isset($_POST['jsontext'])){
    //echo $_POST['jsontext'];
}else{
    //echo $_POST['jsontext'];
}
//echo $_POST['quesid']+"\n";
$str="SELECT entityname FROM ques_entity a left join entity b on a.entityid=b.entityid where quesid=".$_POST['quesid'];
$entity=myquery2($str,$link2);

$str="SELECT relation_name FROM ques_relation a left join relation b on a.relationid=b.relationid where quesid=".$_POST['quesid'];
$relation=myquery2($str,$link2);

$str="SELECT cardname FROM ques_card a left join card b on a.cardid=b.cardid where quesid=".$_POST['quesid'];
$card=myquery2($str,$link2);
//print_r($entity);
$data=array();
$data[]=$entity;
$data[]=$relation;
$data[]=$card;
//print_r($data);
//$str="SELECT quesid,questitle FROM ques;";
//$data=myquery2($str,$link2);



array_walk_recursive($data, function(&$value, $key) {
    if(is_string($value)) {
        $value = urlencode($value);
    }
});
echo urldecode(stripslashes(json_encode($data)));


?>