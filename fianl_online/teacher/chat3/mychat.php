<!doctype html>
<?php
session_start();
?>
<script>
var userid=<?php echo $_SESSION['id'];?>;
var quesid=<?php echo $_SESSION['quesid'];?>;
var groupid=<?php echo $_SESSION['groupid'];?>;

var myjsontext={};
              
          myjsontext["userid"]=userid;
          myjsontext["quesid"]=quesid;
          myjsontext["groupid"]=groupid;
var tt=JSON.stringify(myjsontext);

//alert(groupid);
</script>
<html>
<head>
    <meta charset="UTF-8">
    <title>Untitled Document</title>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    
    <link rel="stylesheet" href="chatcss.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="chatajax.js"></script>

</head>
<body onload="setInterval('update(tt)', 1000)"><!--onload="setInterval('update(tt)', 5000)"-->

<div id="big" class="bigblock">
 <!--
  <div class="block" >  
       <div class="float_right shapediv self" data-toggle="tooltip" data-placement="left" title="9:12">
           你好阿
       </div>
  </br>
  </div>
  <div class="block">
       <div class="othername">
           王慧縈
       </div>
         <div class="shapediv other" data-toggle="tooltip" data-placement="right" title="9:15">
           你好阿你好阿你好阿你好阿你好阿你好阿你好阿你好阿你好阿你好阿你好阿你好阿你好阿你好阿你好阿你好阿你好阿
       </div>
     
  </div>
  <div class="block">
       <div class="othername">
           王慧縈
       </div>
         <div class="shapediv other" data-toggle="tooltip" data-placement="right" title="9:16">
           你好阿
       </div>
     
  </div>
 <div class="block">  
       <div class="float_right shapediv self" data-toggle="tooltip" data-placement="left" title="9:18">
           你好阿
       </div>
  </br>
  </div>
  <div class="block">  
       <div class="float_right shapediv self" data-toggle="tooltip" data-placement="left" title="9:18">
           你好阿你好阿你好阿
       </div>
  </br>
  </div> 
   <div class="block">
       <div class="othername">
           王慧縈
       </div>
         <div class="shapediv other" data-toggle="tooltip" data-placement="right" title="9:15">
           你好阿你好阿你好阿你好阿你好阿你好阿你好阿你好阿你好阿你好阿你好阿你好阿你好阿你好阿你好阿你好阿你好阿
       </div>
     
  </div>
-->
</div>
  <div class="form-group">
  <textarea id="posttext"  class="form-control" rows="4" id="comment" placeholder="輸入訊息‧‧‧‧‧‧"></textarea>
</div>

<script>//send update
    
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();

});
    
getfirst();
   $('#posttext').keyup(function(e) {
      if (e.keyCode == 13) {
          if(event.shiftKey){
              alert("new line");
          }else{
            var text=$(this).val().substring(0, $(this).val().length-1);
              
            savechat(JSON.stringify(myjsontext),text);
            $(this).val("");
          }
      }
   });
function self(text,time){
    var txt='<div class="block" >'+  
                    '<div class="float_right shapediv self" data-toggle="tooltip" data-placement="left" title="'+time+'">'+
                        text+
                    '</div>'+
                    '<div class="shapediv blank">1</div>'
              '</div>';
    return txt;
}
    function other(name,text,time){
        var txt='<div class="block">'+
                       '<div class="othername">'+
                           name+
                       '</div>'+
                       '<div class="shapediv other" data-toggle="tooltip" data-placement="right" title="'+time+'">'+
                           text+
                       '</div>'+
                  '</div>';
        return txt;
    }
   // document.getElementById("big").innerHTML+=self("hi~","000000000");
</script>


</body>
</html>