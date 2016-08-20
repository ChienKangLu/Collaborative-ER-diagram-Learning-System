<!doctype html>
<?php
include_once ("mydb2.php");
include_once ("myphpfuntion.php");

$str='SELECT member.*, IF(cluster2_detail.userid!="NULL",true,false) as "check" FROM member left join cluster2_detail on member.id=cluster2_detail.userid';
$member=myquery($str,$link2);
?>
<html>
<head>
    <meta charset="UTF-8">
    
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Untitled Document</title>
     <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <link rel="stylesheet" href="mycss/mybreadcrumb.css">
        
        <link href="http://libs.baidu.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet">
        
        <script src="http://libs.baidu.com/jquery/2.0.0/jquery.min.js"></script>
        <script src="http://libs.baidu.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
        
        
        
        
		<script type="text/javascript" src="bootstrap-filestyle-1.2.1/src/bootstrap-filestyle.js"></script>
		
        <script src="myajaxfunction.js"></script>
        
        
            <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.9.3/css/bootstrap-select.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.9.3/js/bootstrap-select.min.js"></script>

<!-- (Optional) Latest compiled and minified JavaScript translation files -->
<!--
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.9.3/js/i18n/defaults-*.min.js"></script>
-->
    <link rel="stylesheet" href="borderbtn.css">
    
       <link rel="stylesheet" href="css3-notification-boxes/style2.css">
    
<style>
    .hiderow{
        display: none;
    }
    .hiderow2{
        display:block;
    }
    
    /****************/
            .Absolute-Center {
            margin: auto;
            position: fixed;
            top: 0;
            left: 0;
            bottom: 0;
            right: 0;
        }
        
        .Absolute-Center.is-Responsive {
            width: 50%;
            height: 50%;
            z-index: 7000;
        }
    .tr_black{
        background-color: bisque;
    }
    </style>
</head>

<body>
     <div class="con">
        <div id="txt" class="Absolute-Center is-Responsive" style="display:none" onclick="aer();">

        </div>
    </div>
        <script>
        function aer(){
            //alert(1234);
             //$("#txt").css("display","none");
            $("#txt").dequeue().fadeOut();
        }
    
    </script>
  <!--
   <input id="btnFadein" type="button" value="滑入" onclick='Fadein(".a1",".b1");'/> 
<input id="btnFadeout" type="button" value="滑出"/> 
<div id="divD" class="divD">這是div</div> 
<div class="divD2">這是div2</div> 
-->
<script type="text/javascript"> 
    


function Fadein(mya,myb){ 
if($(mya).is(":hidden")){
    //当前是hide状态
    $(myb).removeClass("hiderow");
    $(mya).slideToggle(250); //滑入
}else{
  //当前是show状态
    $(mya).slideToggle(250, function(){
            // Reenable the button
        $(myb).addClass("hiderow");
    }); //滑入
}
} 
    
function save(myid){ 
    var now="b"+myid;
    var change="c"+myid;
    //alert(myid);
    var json=new Array();
    for(var i=0;i<6;i++){
        var tag=now+i;
        var txt;
        if(document.getElementById(tag).value!=""){
            txt=document.getElementById(tag).value;
        }else{
            txt=document.getElementById(tag).placeholder;
        }
        json.push(txt);
        document.getElementById(change+i).innerHTML= txt;
        document.getElementById(tag).placeholder=txt;
       
    }
   // alert(JSON.stringify(json));
    updatemember(JSON.stringify(json));
    //alert(document.getElementById("b11").placeholder );
} 

</script> 
   
   
    <?php
		include ("top_manage.php");
    ?>


        <div id="container" class="container ">
          
           <h3>使用者</h3>
                <hr>
            <div id="show">
            <table class="table" id="show2" style=""><!--margin-bottom:0px;-->
                <thead>
                    <tr>
                        <th>流水號</th>
                        <th>學號</th>
                        <th>姓名</th>
                        <th>密碼</th>
                        <th>身分</th>
                        <th>班級</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody id="show3">
               <?php
                foreach( $member as $now){
                   // echo $now[0]."~".$now[1]."~".$now[3]."</br>";
                    $css="";
                    if($now[6]!="1"){
                        $css="tr_black";
                    }
                    echo "<tr class='".$css."'>";
                    echo '<td id="c'.$now[0].'0" >'.$now[0]."</td>";
                    echo '<td id="c'.$now[0].'1" >'.$now[1]."</td>";
                    echo '<td id="c'.$now[0].'2" >'.$now[2]."</td>";
                    echo '<td id="c'.$now[0].'3" >'.$now[3]."</td>";
                    echo '<td id="c'.$now[0].'4" >'.$now[4]."</td>";
                    echo '<td id="c'.$now[0].'5" >'.$now[5]."</td>";
                    /*
                    echo "<td>".'<button type="submit" class="btn btn-primary">
                                <span class="glyphicon glyphicon-pencil"></span> 修改
                            </button>'.'<button type="submit" class="btn btn-primary">
                                <span class="glyphicon glyphicon-trash"></span> 刪除
                            </button>'.'</td>';
                            */
                    
                    echo "<td>".'<div class="btn-group" role="group" aria-label="...">
  <button  onclick=\'Fadein(".a'.$now[0].'",".b'.$now[0].'");\'  type="button" class="btn btn-default"><span class="glyphicon glyphicon-pencil"></span> 修改</button>
  
  
</div>'."</td>";
                    //<button type="button" class="btn btn-default"><span class="glyphicon glyphicon-trash"></span> 刪除</button>
                    echo "</tr>";
                    echo '<tr>'.
                            '<td class="b'.$now[0].' hiderow"  >
                              <div class="a'.$now[0].' hiderow" >
                                <input  id="b'.$now[0].'0" class="form-control" id="num" type="text" name="email" size="5" placeholder="'.$now[0].'" disabled>
                              </div>   
                             </td>
                             <td class="b'.$now[0].' hiderow"  >
                              <div class="a'.$now[0].' hiderow" >
                                <input id="b'.$now[0].'1" class="form-control" id="num" type="text" name="email" size="5" placeholder="'.$now[1].'">
                              </div>   
                             </td>
                             <td class="b'.$now[0].' hiderow"  >
                              <div class="a'.$now[0].' hiderow" >
                                <input id="b'.$now[0].'2" class="form-control" id="num" type="text" name="email" size="5" placeholder="'.$now[2].'">
                              </div>   
                             </td>
                             <td class="b'.$now[0].' hiderow"  >
                              <div class="a'.$now[0].' hiderow" >
                                <input id="b'.$now[0].'3" class="form-control" id="num" type="text" name="email" size="5" placeholder="'.$now[3].'">
                              </div>   
                             </td>
                             <td class="b'.$now[0].' hiderow"  >
                              <div class="a'.$now[0].' hiderow" >
                                <input id="b'.$now[0].'4" class="form-control" id="num" type="text" name="email" size="5" placeholder="'.$now[4].'">
                              </div>   
                             </td>
                             <td class="b'.$now[0].' hiderow"  >
                              <div class="a'.$now[0].' hiderow" >
                                <input id="b'.$now[0].'5" class="form-control" id="num" type="text" name="email" size="5" placeholder="'.$now[5].'">
                              </div>   
                             </td>
                             <td class="b'.$now[0].' hiderow"  >
                              <div class="a'.$now[0].' hiderow" >
                              <button onclick=\'save("'.$now[0].'");\' type="button" class="btn btn-default"><span class="glyphicon glyphicon-ok"></span> 更新</button>
                              </div>   
                             </td>
                             
                            </tr>';
                    
                    
                }    
                ?>
                <tr>
                    <td>
                        <input id="add0" class="form-control" id="num" type="text" name="email" size="5" placeholder="" disabled>
                    </td>
                    <td>
                        <input id="add1" class="form-control" id="num" type="text" name="email" size="5" placeholder="學號">
                    </td>
                    <td>
                        <input id="add2" class="form-control" id="num" type="text" name="email" size="5" placeholder="姓名">
                    </td>
                    <td>
                        <input id="add3" class="form-control" id="num" type="text" name="email" size="5" placeholder="密碼">
                    </td>
                    <td>
                        <input id="add4" class="form-control" id="num" type="text" name="email" size="5" placeholder="身分">
                    </td>
                    <td>
                        <input id="add5" class="form-control" id="num" type="text" name="email" size="5" placeholder="班級">
                    </td>
                    <td>
                        <button onclick="addnews();" id="add"  type="button" class="btn btn-default"><span class="glyphicon glyphicon-plus"></span> 新增</button>
                    </td>
                </tr>

                </tbody>
            </table>
        </div>
        <!--
        <div class="row text-center" style="padding:0px;">
            <div class="col-xs-12" >
                <button type="button" class="mybtn mybtn-primary btn-lg outline"  onclick="addentity();" style="margin:5px;" >
                            <span class="glyphicon glyphicon-plus"></span>
                            </button>
                </br>
                </br>
            </div>
        </div>
        -->
    </div>
     <script>
         function goodOrBad(type,show){
                        var txt;
                        if(type==0){
                            txt='<div class="notify errorbox">'+
                                    '<h1>Warning!</h1>'+
                                    '<span class="alerticon"><img src="css3-notification-boxes/images/error.png" alt="error" /></span>'+
                                    '<p id="txtContect" class="text-center">'+
                                        show+                              
                                    '</p>'+
                                '</div>';
                        }else if(type==1){
                            txt='<div class="notify successbox">'+
                                    '<h1>Success!</h1>'+
                                    '<span class="alerticon"><img src="css3-notification-boxes/images/check.png" alt="checkmark" /></span>'+
                                    '<p id="txtContect" class="text-center">'+
                                        show+                              
                                    '</p>'+
                                '</div>';
                        }
                        return txt;
                    }
            function addnews(){
                if(add1.value==""||add2.value==""||add3.value==""||add4.value==""||add5.value==""){
                     $("#txt").fadeIn().delay(5000).fadeOut();
                            txt.innerHTML=goodOrBad(0,"新增學生失敗(資料尚未填寫)");
                    //alert("資料尚未填寫");
                }else{
                    var json=new Array();
                    json.push(add1.value);
                    json.push(add2.value);
                    json.push(add3.value);
                    json.push(add4.value);
                    json.push(add5.value);
                    
                    addclassmember(JSON.stringify(json));
                    //alert(add1.value+"~~"+add2.value+"~~"+add3.value+"~~"+add4.value+"~~"+add5.value);
                }
            }
    </script>
      
      
</body>
</html>