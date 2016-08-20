<?php
header('Access-Control-Allow-Origin: *'); 
include_once ("../mydb2.php");
include_once ("../myphpfuntion.php");

$function = $_POST['function'];
switch($function) {

  /* update case */
  case('getfirst'):
    $str="SELECT count(*) from chat where groupid=1 and quesid=1";
    $data=myquery2($str,$link2);
    date_default_timezone_set("Asia/Taipei");
    $mydate=date("Y-m-d H:i:s");
    echo $mydate;
    //echo  $data[0][0];
    break;

  /* update case */
  case('update'):
    $json=json_decode($_POST['jsontext']);
    $nowtime=$_POST['nowtime'];//oldone
    //echo $json->userid."\n";
    //echo $json->quesid."\n";
    //echo $json->groupid."\n";
    date_default_timezone_set("Asia/Taipei");
    $mydate=date("Y-m-d H:i:s");//newone
    $datago=array();
        $str="SELECT chat.*,member.name from chat LEFT join member on chat.userid=member.id where`time`>'".$nowtime."'";
        $data=myquery2($str,$link2);
        $datago[]=$mydate;
        $datago[]=$data;
        array_walk_recursive($datago, function(&$value, $key) {
        if(is_string($value)) {
            $value = urlencode($value);
        }
        });
        echo urldecode(stripslashes(json_encode($datago)));
    break;

  /* send case */
  case('savechat'):
    $json=json_decode($_POST['jsontext']);
    //echo $json->userid."\n";
    
   // echo $json->quesid."\n";
    //echo $json->groupid."\n";
    date_default_timezone_set("Asia/Taipei");
    $mydate=date("Y-m-d H:i:s");
    echo $mydate;
    $str="INSERT INTO `chat` ( `groupid`, `userid`, `quesid`, `text`, `time`) VALUES ('".$json->groupid."', '".$json->userid."', '".$json->quesid."', '".$_POST['text']."', '".$mydate."');";
    myinsert($str);
    //echo "savechat"+"\n";
    //echo $_POST['jsontext'];
    break;
  case('logout'):
	date_default_timezone_set("Asia/Taipei");
	$mydate=date("Y-m-d H:i:s");
	$str="INSERT INTO `action_record` (`userid`,`date_time`,`action_tag`) VALUES ('".$_POST['id']."','".$mydate."','logout_n');";
	myinsert($str);
	break;  
	case('login'):
	date_default_timezone_set("Asia/Taipei");
	$mydate=date("Y-m-d H:i:s");
	$str="INSERT INTO `action_record` (`userid`,`date_time`,`action_tag`) VALUES ('".$_POST['id']."','".$mydate."','login_n');";
	myinsert($str);
	break;
	
	
}
//echo $_POST['jsontext'];
?>

