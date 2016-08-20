<?php
include_once ("mydb2.php");
include_once ("myphpfuntion.php");
// savetodb(jsontext,id,quesid,maxtix)
if(isset($_POST['jsontext'])){
    //echo $_POST['jsontext'];
}else{
    //echo $_POST['jsontext'];
}
$json=json_decode($_POST['jsontext']);


$cluster2="";
$cluster2_detail="";
$groupn=count($json);
for($i=0;$i<$groupn;$i++){
    if($i!=0){
        $cluster2=$cluster2.",";
    }
    $cluster2=$cluster2."('".$json[$i][0]."')";

}
echo $cluster2;
echo "\n";
////////////////////////////////////////////////////新增組別
$str1="INSERT INTO `cluster2` (`leader`) VALUES ".$cluster2.";";
myinsert($str1);

///////////////////////////////////////////////////查出剛剛新增的組別
$str="SELECT * FROM (SELECT * FROM cluster2 order by `groupid` DESC LIMIT ".$groupn.") A order by A.groupid ";
$result=myquery($str,$link2);

foreach($result as $now){
  // echo $now[0]."~".$now[1]."~".$now[3]."</br>";
   // echo $now[1];
    $groupid[]=$now[0];
}

for($i=0;$i<count($json);$i++){
    //$cluster2=$cluster2."('".$json[$i][0]."')";
        if($i!=0){
            $cluster2_detail=$cluster2_detail.",";
        }
    for($j=0;$j<count($json[$i]);$j++){
        
        if($j!=0){
            $cluster2_detail=$cluster2_detail.",";
        }
       $cluster2_detail=$cluster2_detail."('".$groupid[$i]."','".$json[$i][$j] ."')";
    }
}
echo $cluster2_detail;

//$str="INSERT INTO `member` (`studentid`, `name`, `code`, `pos`, `class`) VALUES ('123', '123', '123', '123', '123'), ('123', '123', '123', '123', '123');";
//$str1="INSERT INTO 'cluster2` (`leader`) VALUES ('123'),('123');";

//select 後幾筆資料
$str2="INSERT INTO `cluster2_detail` (`groupid`,`userid`) VALUES ".$cluster2_detail.";";
myinsert($str2);
?>