<?php
//setlocale ( LC_ALL, 'en_US.UTF-8' );
//if(isset($_POST['myfile'])){//$_FILES['my_key']['name']
//    echo "good";
//}else{
//    echo "gg";
//}
//echo $_FILES['myfile']['size'];
$fileName = $_FILES['myfile']['name'];


$fileContent = file_get_contents($_FILES['myfile']['tmp_name']);//$_FILES['myfile']['tmp_name']

//echo iconv('UTF-8','gb2312//IGNORE',file_get_contents($_FILES['myfile']['tmp_name']));





//echo $fileName."<br/>\n";
/*
$arr = array( 
'name' => '腳本之家', 
'nick' => 'Gonn', 
'contact' => array( 
'email' => 'xxxxxxx@163.com', 
'website' => '', 
) 
); 
*/


$temp="";          
$myvalue=array();
$file = fopen($_FILES['myfile']['tmp_name'],"r");
while(! feof($file)){
    $data=fgetcsv($file);
    $num = count($data);
    $temp=$temp."<tr>";
   // echo "<tr>";
    $arrtemp=array();
      for ($c=0; $c < $num; $c++) {
          $temp=$temp."<td>";
           //echo "<td>";
          $temp=$temp.$data[$c];
         //echo $data[$c];
          $temp=$temp."</td>";
         // echo "</td>";
          $arrtemp[]=$data[$c];
          //$myvalue[]=$data[$c];
    }
    $myvalue[]=$arrtemp;
          $temp=$temp."</tr>";
   // echo "</tr>";
}

fclose($file);
$arr=array();
$arr["show"]=$temp;
$arr["value"]=$myvalue;

array_walk_recursive($arr, function(&$value, $key) {
    if(is_string($value)) {
        $value = urlencode($value);
    }
});

echo urldecode(stripslashes(json_encode($arr)));
//echo $fileContent;

/////////////////////

//＿echo "嘻嘻嘻";

?>