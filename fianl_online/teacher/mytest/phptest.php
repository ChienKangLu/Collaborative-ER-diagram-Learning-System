<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Untitled Document</title>
    <script src="transfer.js"></script>
</head>

<body>

<?php
	include ("../mydb.php");
    $str2="SELECT * FROM test";
    $result2 = mysql_query($str2, $link) or die(mysql_error());
    $sn_index = mysql_num_rows($result2);
    for ($index=0; $index < $sn_index ; $index++){
	   $arr[$index]= mysql_fetch_array($result2);
     //   echo $index;
    }
    
    $valuen=$arr[5][2]; //取出來的JSON 2 3 4 5   [5 12]
    
    $value=$arr[5][2]; //取出來的JSON 2 3 4 5 
   // $value2=$arr[3][2]; //取出來的JSON 2 3 4 5 
    //echo $value;
    $value1=$arr[7][2];
  //  echo $value1;
    $value2=$arr[8][2];
  //  echo $value2;
    $value3=$arr[9][2];
  //  echo $value3;
    $value4=$arr[10][2];
    
    
    $value5=$arr[11][2];
  //  echo $value4;
?>

<div id="show"></div>

<script>
  // var text=JSON.stringify('<?php //echo $value; ?>');
   // var text=JSON.parse('<?php echo $value; ?>');
   //alert(text.cells[13].target.id);
   // var text1='<?php //echo $value; ?>';
   // var obj = eval ("(" + text1 + ")");
   // alert(obj.cells.length);
   // alert(obj.cells[1].type);
    
   // alert(obj.cells[2].attrs.text.text);
    var content=window.document.getElementById("show");
    //content.innerHTML='<?php //echo $value; ?>';//要用單引號刮起來
    
   
    //var str=show('<?php //echo $value; ?>');//產生關聯式字串
    //var matrix1=to2dmatrix(str);//轉為矩正

    var entity_name=new Array("老師","學生","醫生","教士","醫院","病人","校長","教室","主任","隊長");
    
    var str1=show('<?php echo $valuen; ?>');
    alert(str1.rel.length);
    //document.write(JSON.stringify(str1));
    /*
    var str2=show('<?php echo $value2; ?>');
    
    var str3=show('<?php echo $value3; ?>');
    
    var str4=show('<?php echo $value4; ?>');
    */
    var matrix1=to2dmatrix(str1, entity_name);//轉為矩正
    
    printmatrix(matrix1,entity_name);
    matrixtojson(matrix1, entity_name);
    
    //window.open('newwindows.php?text='+13+'&entity='+12, 'test', config='height=500,width=500');
        
    /*
    var matrix2=to2dmatrix(str2, entity_name);//轉為矩正
    
    var matrix3=to2dmatrix(str3, entity_name);//轉為矩正
    
    var matrix4=to2dmatrix(str4, entity_name);//轉為矩正
    var thesamematrix=findthesame( matrix1, matrix2, matrix3, matrix4);
    printarray(thesamematrix,entity_name);
    
    document.write("</br>");
    document.write("</br>");
    document.write("</br>");
    document.write("</br>");
    
    var str5=show('<?php echo $value5; ?>');
     var matrix5=to2dmatrix(str5);//轉為矩正
    */
    
    
    
    //var str2=show('<?php// echo $value2; ?>');
   // var matrix2=to2dmatrix(str2);
    
    //document.write(matrix1[0][1]);
    //document.write(matrix1.every(function(element,index1,index2){ return element === array2[index1][index2]}));
    //document.write(str[0]);
   // document.write(arraysEqual(matrix1,matrix2));//比較兩個矩陣是否相等
    
    //找出不同的元素
   // arrayunique();
    
    //arraytopic(matrixci);
    
   

  //  pic=arraytopic(matrix1,entity_name);
    
  //  document.write(pic);
    /*
S=new Array(1,1,2,2,3,4,5,6,7);
    S=S.unique()
    for(var i=0;i<S.length;i++){
        document.write(S[i]);
    }
    document.write("</br>");
    
    A1=new Array(new Array(1,2,3,4,5,6,7,8,undefined,10),
                 new Array(1,2,3,4,5,6,7,8,9,10),
                 new Array(1,2,3,4,5,6,7,8,9,10));
    
    A2=new Array(new Array(1,2,0,4,5,6,7,0,9,0),
                 new Array(1,2,0,4,5,6,7,0,9,10),
                 new Array(1,0,3,4,5,0,7,8,9,0));
    A3=findthesame(A1,A2)
    printarray(A1);
    printarray(A2);
    printarray(A3);
    //luchengon="王";
    getentityname();
    */
 
</script>

</body>

</html>