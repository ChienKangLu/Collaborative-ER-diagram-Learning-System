<?php
include_once ("mydb2.php");
include_once ("myphpfuntion.php");
// savetodb(jsontext,id,quesid,maxtix)
if(isset($_POST['jsontext'])){
   // echo $_POST['jsontext'];
}else{
   // echo $_POST['jsontext'];
}

$json=json_decode($_POST['jsontext']);

$str="";
for($i=0;$i<count($json->value);$i++){
    //echo $i."-";
    $id;
    $name;
    $class;
    for($j=0;$j<count($json->value[$i]);$j++){
        //echo $json->value[$i][$j];
        if($j==0){
            $id=$json->value[$i][$j];
            //$id=str_replace("&#65279;","123",$id);
           // $id="1234";
        }else if($j==1){
            $name=$json->value[$i][$j];
        }else if($j==2){
            $class=$json->value[$i][$j];
        }
    }
    if($i!=0){
        $str=$str.",";
    }
    $str=$str.insertst($id,$name,$id,"學生",$class);//`studentid`, `name`, `code`, `pos`, `class`
    //echo "\n";
}
echo $str;
$str=str_replace("﻿","",$str);//錯誤處理
//print_r($json);
//date_default_timezone_set("Asia/Taipei");
//$mydate=date("Y-m-d H:i:s");
//echo $mydate;

//$str="INSERT INTO `member` (`studentid`, `name`, `code`, `pos`, `class`) VALUES ('123', '123', '123', '123', '123'), ('123', '123', '123', '123', '123');";
$str="INSERT INTO `member` (`studentid`, `name`, `code`, `pos`, `class`) VALUES".$str;
myinsert($str);
?>