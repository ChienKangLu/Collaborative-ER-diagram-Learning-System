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
echo $_POST['jsontext'];

echo "版本:".$_POST['nowmode'];
$version=$_POST['nowmode'];
$data="";
$groupn=count($json);
for($i=0;$i<$groupn;$i++){
    
   if($json[$i]!=null){
        if($i!=0){
            $data=$data.",";
        }
        $data=$data."('".$json[$i]."')";
   }
}
echo $data;
$str="";
if($version==0){
    $str="INSERT INTO `entity` (`entityname`) VALUES ".$data.";";
}else if($version==1){
    $str="INSERT INTO `relation` (`relation_name`) VALUES ".$data.";";
}else if($version==2){
    $str="INSERT INTO `card` (`cardname`) VALUES ".$data.";";
}
myinsert($str);
//$str="INSERT INTO `member` (`studentid`, `name`, `code`, `pos`, `class`) VALUES ('123', '123', '123', '123', '123'), ('123', '123', '123', '123', '123');";
//$str1="INSERT INTO 'data` (`leader`) VALUES ('123'),('123');";

//select 後幾筆資料
//$str2="INSERT INTO `data_detail` (`groupid`,`userid`) VALUES ".$data_detail.";";
//myinsert($str2);
?>