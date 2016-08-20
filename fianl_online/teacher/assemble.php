<?php
include_once ("mydb2.php");
include_once ("myphpfuntion.php");
//echo $_POST['id'];
//echo $_POST['quesid'];
//echo $_POST['groupid']."\n";
//echo $_POST['quesid']."\n";
$json=[];

$groupid=json_decode($_POST['groupid'],true);
foreach ($groupid as $key => $value) {
    $str="select maxtrix from pic where id=".$value." && quesid=".$_POST['quesid']." ORDER by datetime DESC";
    $pic=myquery2($str,$link2);
    if(count($pic)>0){
        $json[]=$pic[0][0];
    }
    //echo "Array: $key, $value";
}
//echo "\n";
//$str="select * from pic where id=".$_POST['id']." && quesid=".$_POST['quesid']." ORDER by datetime DESC";
//$pic=myquery2($str,$link2);
//$str="select * from pic where id=".$_POST['id']." && quesid=".$_POST['quesid']." ORDER by datetime DESC";
    //$pic=myquery($str,$link2);
//echo $pic[0][4];

/*
array_walk_recursive($json, function(&$value, $key) {
    if(is_string($value)) {
        $value = urlencode($value);
    }
});
echo urldecode(stripslashes(json_encode($json)));
*/
echo json_encode($json);
?>