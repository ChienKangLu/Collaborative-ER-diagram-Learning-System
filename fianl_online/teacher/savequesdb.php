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

//echo $_POST['jsontext'];
//echo "\n";
$title=$json ->title;
//echo  $title;
$tip=$json ->tip;
//echo $tip;
$content=$json ->content;
//echo $content;
$str="INSERT INTO `ques` (`questitle`,`quescontent`,`tip`) VALUES ('".$title."','".$tip."','".$content."');";
$nowid=myinsert($str);

$data1=unitjson2($json ->data1,$nowid);
echo $data1;
echo "\n";
$str="INSERT INTO `ques_entity` (`quesid`,`entityid`) VALUES ".$data1.";";
myinsert($str);

$data2=unitjson2($json ->data2,$nowid);
echo $data2;
echo "\n";
$str="INSERT INTO `ques_relation` (`quesid`,`relationid`) VALUES ".$data2.";";
myinsert($str);

$data3=unitjson2($json ->data3,$nowid);
echo $data3;
echo "\n";
$str="INSERT INTO `ques_card` (`quesid`,`cardid`) VALUES ".$data3.";";
myinsert($str);

//$str="INSERT INTO `ques_entity` (`quesid`,`entityid`) VALUES ".$data1.";";
//myinsert($str);


/*
foreach ($json as $key=>$value) {
    if($key=="title"){
        
    }else if($key=="tip"){
        
    }else if($key=="content"){
        
    }else if($key=="data1"){
        
    }else if($key=="data2"){
        
    }else if($key=="data3"){
        
    }
    echo  $key;
    
    echo "\n";
}*/

$str="";
//$str="INSERT INTO `entity` (`entityname`) VALUES ".$data.";";
//myinsert($str);



//$str="INSERT INTO `member` (`studentid`, `name`, `code`, `pos`, `class`) VALUES ('123', '123', '123', '123', '123'), ('123', '123', '123', '123', '123');";
//$str1="INSERT INTO 'data` (`leader`) VALUES ('123'),('123');";

//select 後幾筆資料
//$str2="INSERT INTO `data_detail` (`groupid`,`userid`) VALUES ".$data_detail.";";
//myinsert($str2);
?>