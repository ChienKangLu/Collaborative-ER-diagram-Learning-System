<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Untitled Document</title>
    
     <script src="mytest/transfer.js"></script>
</head>
<body>

    <?php //echo $_GET['text']; ?>
<script>
    var myarray=<?php echo $_GET['text']; ?>;
    var entity=<?php echo $_GET['entity']; ?>;
    
    //var entity_name=new Array("老師","學生","醫生","教士","醫院","病人","校長","教室","主任","隊長","食物");
    mywrite("good");
   printmatrix2(myarray,entity);
    
    
    function printmatrix2(matrix,entity_name){
   // alert(matrix.length);
   document.write("<p>");
    if(entity_name==undefined){
   document.write("<table border='1'>");
    for(var i=0;i<matrix.length;i++){
       document.write("<tr>");
        for(var j=0;j<matrix[i].length;j++){
           document.write("<td>");
           document.write(matrix[i][j]);
           document.write("</td>");
        }
       document.write("</tr>");
    }
   document.write("</table>");
    }else{    
       document.write("<table border='1'>");
        for(var i=0;i<matrix.length+1;i++){
           document.write("<tr>");
            for(var j=0;j<matrix.length+1;j++){
               document.write("<td>");
                if(i==0){
                    if(j!=0){
                       document.write(entity_name[j-1]);
                    }
                }else{
                    if(j==0){
                       document.write(entity_name[i-1]);
                    }else{
                       document.write(matrix[i-1][j-1]);
                    }
                }
               document.write("</td>");
            }
           document.write("</tr>");
        }
       document.write("</table>");
    }
    
   document.write("</p>");
}
</script>

</body>
</html>