<?php
include_once ("mydb2.php");
include_once ("myphpfuntion.php");
// savetodb(jsontext,id,quesid,maxtix)

///////////////////////////////////////////////////查出剛剛新增的組別
//$str="select * from cluster2_detail LEFT join member on cluster2_detail.userid=member.id";
$str="SELECT b.*,c.*,a.leader FROM `cluster2` as a Left JOIN cluster2_detail as b on a.groupid=b.groupid Left JOIN member as c on b.userid=c.id";
$member=myquery2($str,$link2);


       
array_walk_recursive($member, function(&$value, $key) {
    if(is_string($value)) {
        $value = urlencode($value);
    }
});
echo urldecode(stripslashes(json_encode($member)))

?>