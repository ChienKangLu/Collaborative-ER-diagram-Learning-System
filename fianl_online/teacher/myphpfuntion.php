<?php
function myquery($str,$link){
    $result = mysql_query($str, $link) or die(mysql_error());
    $sn_index = mysql_num_rows($result);
    $arr=array();
    for ($index=0; $index < $sn_index ; $index++){
	   $arr[$index]= mysql_fetch_array($result);
     //   echo $index;
    }
    
    return $arr;
}
function myquery2($str,$link){
    $result = mysql_query($str, $link) or die(mysql_error());
    $sn_index = mysql_num_rows($result);
    $arr=array();
    for ($index=0; $index < $sn_index ; $index++){
	   $arr[$index]= mysql_fetch_row($result);
     //   echo $index;
    }
    
    return $arr;
}

function myinsert($str){
    
    mysql_query($str) or die(mysql_error());
    return mysql_insert_id();
    
}
function selectmypic($link,$id){
    $str="SELECT * FROM `pic` WHERE id=".$id;
    $result=myquery($str,$link);
    return $result;
}
function insertst($studentid, $name, $code, $pos, $class){//`studentid`, `name`, `code`, `pos`, `class`
    $str="('".$studentid."', '".$name."', '".$code."', '".$pos."', '".$class."')";
    return $str;
}
function unitjson($group){
    $data="";
    for($i=0;$i<count($group);$i++){
        if($i!=0){
            $data=$data.",";
        }
        $data=$data."('".$group[$i]."')";
    }
    return $data;
}
function unitjson2($group,$nowid){
    $data="";
    for($i=0;$i<count($group);$i++){
        if($i!=0){
            $data=$data.",";
        }
        $data=$data."('".$nowid."','".$group[$i]."')";
    }
    return $data;
}
?>