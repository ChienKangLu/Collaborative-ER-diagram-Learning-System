<?php
include_once ("mydb2.php");
include_once ("myphpfuntion.php");
//echo $_POST['id'];
//echo $_POST['quesid'];

$str="";

$str="select * from entity";
$entity=myquery2($str,$link2);
                 
$str="select * from relation";
$pic=myquery2($str,$link2);
                 
$str="select * from card";
$card=myquery2($str,$link2);

//echo $pic[0][4];

$data=array();
$data[]=$entity;
$data[]=$pic;
$data[]=$card;
array_walk_recursive($data, function(&$value, $key) {
    if(is_string($value)) {
        $value = urlencode($value);
    }
});
echo urldecode(stripslashes(json_encode($data)));
?>