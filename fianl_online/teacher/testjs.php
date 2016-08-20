<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Untitled Document</title>
     <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <link rel="stylesheet" href="mycss/mybreadcrumb.css">
        
        <link href="http://libs.baidu.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet">
        <script src="http://libs.baidu.com/jquery/2.0.0/jquery.min.js"></script>
        <script src="http://libs.baidu.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
        
        
        
        
		<script type="text/javascript" src="bootstrap-filestyle-1.2.1/src/bootstrap-filestyle.js"></script>
		
        <script src="myajaxfunction.js"></script>
        <style type="text/css"> 
        .divD{ 
        width:300px; 
        height:100px; 
        background-color:#CC99FF; 
            display: none;
        }         .divD2{ 
        width:300px; 
        height:100px; 
        background-color:#CC99FF; 
        } 
        </style> 
</head>

<body>
<input id="btnFadein" type="button" value="滑入" /> 
<input id="btnFadeout" type="button" value="滑出"/> 
<div id="divD" class="divD">這是div</div> 
<div class="divD2">這是div2</div> 

<script type="text/javascript"> 
$(document).ready(function(){ 
$("#btnFadein").bind("click",Fadein); //為btnFadein綁定click時間 
}) 

function Fadein(){ 
$("#divD").slideToggle(500); //滑入 
} 

function way2(array){//選擇最多人一樣的(包含null)  aaab abcd  null a a b  a1 b2 c1
        var n=new Array;
        for(var i=0;i<array.length;i++){
            if(!n[array[i]]){
                n[array[i]]=1;
            }else{
                n[array[i]]++;
            }
        }
        var max=0;
        var maxkey="";
        for(var key in n){ 
            if(n[key]>max && key!="undefined"){
                max=n[key];
                maxkey=key;
                alert(max+"~"+maxkey);
            }
        }
        return maxkey;
}
var jj=[,,"a",];
 alert(way2(jj));
</script> 



</body>
</html>