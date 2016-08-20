<?php

if(isset($_POST['url'])){
    echo $_POST['url'];
}else{
echo $_POST['url'];
}


	include ("../mydb.php");
/*select
    
    $str2="SELECT * FROM test";
    $result2 = mysql_query($str2, $link) or die(mysql_error());
    $sn_index = mysql_num_rows($result2);
    for ($index=0; $index < $sn_index ; $index++){
	   $arr[$index]= mysql_fetch_array($result2);
     //   echo $index;
    }
    $value=$arr[0][2]; 
    echo $arr[0][2];
*/

/*insert
$str2="INSERT INTO user (name)VALUES('".$_POST['url']."');";
     mysql_query($str2) or die(mysql_error());
*/

?>