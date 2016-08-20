<?php
$link2 = mysql_connect("localhost", "root");
mysql_select_db("final_erd", $link2) or die(mysql_error());
mysql_query("SET NAMES 'utf8'");

/*
$str2="SELECT * FROM store_picture";
$result2 = mysql_query($str2, $link) or die(mysql_error());
$sn_index = mysql_num_rows($result2);
   for ($index=0; $index < $sn_index ; $index++){
	  $arr[$index]= mysql_fetch_array($result2);
   };
 */
?>