<?php
//user 大頭照
 $link = mysql_connect("localhost", "root");
	mysql_select_db("html", $link) or die(mysql_error());
    mysql_query("SET NAMES 'utf8'");
$result=mysql_query("SELECT userp FROM user_detail WHERE userid=".$_GET['userid'].";"); 
$row=mysql_fetch_object($result);

//Header( "Content-type: image/jpeg");
 echo $row->userp;
?> 

