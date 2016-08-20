<!DOCTYPE html>
<?php
session_start();

include_once ("mydb2.php");
include_once ("myphpfuntion.php");
//$quesid=12;//1
if(isset($_SESSION['key'])){
    
    //echo $_SESSION['key'];
    /*
    echo "id:".$_SESSION['id']."</br>";
	echo "studentid:".$_SESSION['studentid']."</br>";
	echo "name:".$_SESSION['name']."</br>";
	echo "pos:".$_SESSION['pos']."</br>";
	echo "key:".$_SESSION['key']."</br>";
    */
    $str="SELECT * FROM ques where online=1;";
    $ques=myquery($str,$link2);
    $quesid=$ques[0][0];
    $questitle=$ques[0][1];
    $quescontent=$ques[0][2];
    $tip=$ques[0][3];
   // echo $quescontent;
    
    $str="SELECT * FROM ques where quesid=".$quesid;
    $ques=myquery($str,$link2);
    $_SESSION['quesid']=$quesid;
    //echo $ques[0][0].$ques[0][1].$ques[0][2].$ques[0][3];
    
    $str="SELECT * FROM ques_entity a left join entity b on a.entityid=b.entityid where quesid=".$ques[0][0];
    $result=myquery($str,$link2);

    foreach($result as $now){
       // echo $now[0]."~".$now[1]."~".$now[3]."</br>";
        $entity[]=$now[3];
    }
    
    $str="SELECT * FROM ques_relation a left join relation b on a.relationid=b.relationid where quesid=".$ques[0][0];
    $result=myquery($str,$link2);
    
     foreach($result as $now){
       // echo $now[0]."~".$now[1]."~".$now[3]."</br>";
        $relation[]=$now[3];
    }
    /*
    $str="select b.id,b.name,b.pos from cluster as a  LEFT join  member as b on  a.userid1=b.id ||  a.userid2=b.id || a.userid3=b.id|| a.userid4=b.id where b.id!=".$_SESSION['id'];*/
    
    
    $str="SELECT * from (SELECT * from  cluster2_detail  where cluster2_detail.groupid IN (SELECT groupid FROM cluster2_detail where userid =".$_SESSION['id'].") && userid!=".$_SESSION['id'].") AS A LEFT JOIN member B on A.userid=B.id";
    $result=myquery($str,$link2);
    foreach($result as $now){
        //echo $now[0]."~".$now[1]."</br>";
        $group[]=$now;
    }
     $_SESSION['groupid']=$group[0][0];
    
    $str="SELECT * FROM cluster2 where groupid=".$_SESSION['groupid'].";";
    $result=myquery($str,$link2);
    $_SESSION['LOCK']=$result[0][2];
    $_SESSION['leader']=$result[0][1];
    
    
    /*測試題目
    foreach($result as $now){
        echo $now[0]."~".$now[1]."~".$now[3]."</br>";
    }
    foreach($entity as $now){
        echo $now."</br>";
    }
    */
    
    
    
    
}else{
    header('Location:login.php');
}




?>
    <html>

    <head>
        <meta charset="utf8" />
        
  <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>My Test</title>
        <link rel="stylesheet" type="text/css" href="meteor-myjointjs-master/lib/joint.css" />
        <link rel="stylesheet" type="text/css" href="meteor-myjointjs-master/lib/joint.ui.stencil.css" />
        <link rel="stylesheet" type="text/css" href="meteor-myjointjs-master/lib/joint.ui.halo.css" />
        <link rel="stylesheet" type="text/css" href="meteor-myjointjs-master/lib/joint.ui.selectionView.css" />
        <link rel="stylesheet" type="text/css" href="meteor-myjointjs-master/lib/joint.ui.paperScroller.css" />
        <link rel="stylesheet" type="text/css" href="gonjs/style.css" />
        <link rel="stylesheet" type="text/css" href="gonjs/style2.css" />
        <link rel="stylesheet" type="text/css" href="gonjs/theme-dark.css" />
        <!--
		<link rel="stylesheet" href="css/bootstrap.css">
		<script type="text/javascript" src="js/bootstrap.min.js"></script>
		<script src="https://code.jquery.com/jquery.js"></script>
		<script type="text/javascript" src="js/collapse.js"></script>
		<script type="text/javascript" src="myjs/myactive.js"></script>-->

        <link rel="stylesheet" href="mycss/mybreadcrumb.css">
        <script>
		SVGElement.prototype.getTransformToElement = SVGElement.prototype.getTransformToElement || function(toElement) {
return toElement.getScreenCTM().inverse().multiply(this.getScreenCTM());
};
            
		</script>

<!--
        <link href="http://libs.baidu.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet">
        <script src="http://libs.baidu.com/jquery/2.0.0/jquery.min.js"></script>
        <script src="http://libs.baidu.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
        -->
        
        
          <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        
        <link href="startbootstrap-scrolling-nav-gh-pages/css/scrolling-nav.css" rel="stylesheet">

        <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.9.3/css/bootstrap-select.min.css">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.9.3/js/bootstrap-select.min.js"></script>
    

        <script src="mytest/transfer.js"></script>
        <script src="myajaxfunction.js"></script>
    <script src="record_js.js"></script>
       <SCRIPT>
           //myutest();
       </SCRIPT>
        <style>
            #myTabs li{
                cursor:pointer;
            }
            body{
                font-family: Microsoft JhengHei;
            }
            #draggable { 
/*              visibility: hidden;*/
                display: none;
              position:absolute;
              left: 100px;
              right: 100px;
              width: 200px; 
              height: 330px;
              padding: 20px; 
/*                padding-top: 5px;*/
              z-index: 99999;
              box-shadow:2px 4px 5px rgba(3,3,3,0.2);
              background: #06406c;
              border-radius: 25px;
            }
            
            
            /*scroll style*/
            
::-webkit-scrollbar {
    -webkit-appearance: none;
}

::-webkit-scrollbar:vertical {
    width: 12px;
}

::-webkit-scrollbar:horizontal {
    height: 12px;
}

::-webkit-scrollbar-thumb {
    background-color: rgba(0, 0, 0, .5);
    border-radius: 10px;
    border: 2px solid #ffffff;
}

::-webkit-scrollbar-track {
    border-radius: 10px;  
    background-color: #ffffff; 
}
            #leog{
            }
        </style>
        
        <!--<script src="MM_JAVASCRIPT2E/_js/jquery-1.7.2.min.js"></script>-->



    </head>

    <body style="margin: 0px;padding: 0px;" data-spy="scroll">

 <div id="bigtopup"></div>

        <!--style="padding-bottom: 200;"-->
        <?php
		//include ("mydb.php");
		?>

           
            
            <?php
		include ("top.php");
        
		?>
		        <script>
            $("#top_qbtn").click(function(){
                
                    $("#draggable").fadeOut(function(){
                        $("#top_q").slideToggle();
                    });
                    if($("#top_qbtnsp").hasClass("glyphicon-chevron-down")){
                        $("#top_qbtnsp").removeClass("glyphicon-chevron-down");
                        $("#top_qbtnsp").addClass("glyphicon-chevron-up");
                    }else{
                        $("#top_qbtnsp").removeClass("glyphicon-chevron-up");
                        $("#top_qbtnsp").addClass("glyphicon-chevron-down");
                    }
                   // $("#top_qbtnsp")
              
              });
            $("#open_mydragQ").click(function(){
                if($("#top_qbtnsp").hasClass("glyphicon-chevron-down")){
                        $("#top_qbtnsp").removeClass("glyphicon-chevron-down");
                        $("#top_qbtnsp").addClass("glyphicon-chevron-up");
                    }else{
                        $("#top_qbtnsp").removeClass("glyphicon-chevron-up");
                        $("#top_qbtnsp").addClass("glyphicon-chevron-down");
                    }
                $("#top_q").slideToggle(function(){
                    $("#draggable").fadeToggle();                    
                });
              });
                    
        </script>
        
 <div id="topup"></div>
        <div style="height:53px;">
    <!--我是空白-->
</div>
     <div id="draggable" class="ui-widget-content">
            <span id="leog" class="glyphicon glyphicon-remove-sign pointer" style="color:white;float:right;"onclick='
                    $("#draggable").fadeToggle(); ' ></span>
            <p class="ques_title"><?php echo $questitle;?></p>
            
            <p class="ques_title" style="height:200px;overflow-y: auto;"><?php echo $quescontent;?></p>
            
               <hr>
               <p class="ques_title">
                   <?php echo $tip;?>
               </p>
     </div>


                <script>
                    //document.getElementById("top_groupid").innerHTML=<?php //echo $_SESSION['group'];?>;
                    /*
                        var x = document.createElement("INPUT");
                        x.setAttribute("type", "text");
                        x.setAttribute("value", "Hello World!");
                        document.body.appendChild(x);
                        
                        var x = document.createElement("INPUT");
                        x.setAttribute("type", "text");
                        x.setAttribute("value", "Hello World!");
                        document.body.appendChild(x);
                        */
                </script>
                <script>
                    $( document ).ready(function() {
                        $(".tp").hover(function(){
                           $(this).dequeue().animate({fontSize : '40px'});
                        },function(){
                           $(this).dequeue().animate({fontSize : '30px'});
                        });
                        $("#tp2").click(function(){
                            if($("#changetext").is(":visible")){
                                
                                $("#changetext").fadeOut(function(){
                                    $("#chardata").fadeIn();
                                });
                                
                            }else{
                            
                                $("#chardata").fadeIn();
                            }
                            
                        });
                        $("#tp1").click(function(){
                            if($("#chardata").is(":visible")){
                                $("#chardata").fadeOut(function(){
                                    $("#changetext").fadeIn();
                                });
                                
                            }else{
                                $("#changetext").fadeIn();
                            }
                            
                        });

                        $("#homeworkclick").click(function(){
                            showworkblock();
                        });
                        $("#together").click(function(){
                            showabout();
                        });
                        /*homeworkclick together*///click
                        /*workblock     about*///block
                        
                        
                    });
                        function showworkblock(){
                            if($("#about").is(":visible")){
                                $("#about").fadeOut(function(){
                                    $("#workblock").fadeIn();
                                });
                            }
                        }                        
                        function showworkblock2(arg,action){
                            if($("#about").is(":visible")){
                                $("#about").fadeOut(function(){
                                    $("#workblock").fadeIn(function(){
                                        action(arg);
                                    });
                                });
                            }else{
                                        action(arg);
                            }
                        }
                        function showabout(){
                            if($("#workblock").is(":visible")){
                                $("#workblock").fadeOut(function(){
                                    $("#about").fadeIn();
                                });
                                
                            }
                        }
                        function showabout2(arg,action){
                            if($("#workblock").is(":visible")){
                                $("#workblock").fadeOut(function(){
                                    $("#about").fadeIn(function(){
                                        if(arg.length==2){
                                            action(arg[0],arg[1]);
                                        }else if(arg.length==3){
                                            action(arg[0],arg[1],arg[2]);
                                        }else if(arg.length==4){
                                            action(arg[0],arg[1],arg[2],arg[3]);
                                        }else if(arg.length==5){
                                            action(arg[0],arg[1],arg[2],arg[3],arg[4]);
                                        }
                                    });
                                });
                            }else{
                                        if(arg.length==2){
                                            action(arg[0],arg[1]);
                                        }else if(arg.length==3){
                                            action(arg[0],arg[1],arg[2]);
                                        }else if(arg.length==4){
                                            action(arg[0],arg[1],arg[2],arg[3]);
                                        }else if(arg.length==5){
                                            action(arg[0],arg[1],arg[2],arg[3],arg[4]);
                                        }
                            }
                        }
                    </script>
                <div class="container" style="width:100%;" style="margin: 0px;padding: 0px;">
                    <div id="workblock" class="row" style="margin: 0px;padding: 0px;" align="center">
                        <div class="col-md-2">
                            <div id="stencil"></div>

                            <hr style="border-color: #123456;" />
                            <button id="save" type="button" class="btn btn-primary" style="margin: 5px;display: block;width: 180px;" >                                  <!--把json轉為矩陣-->
                               <!--savetodb(jsontext,id,quesid,maxtix)-->
                                儲存我的ERD
                            </button>
                            <script>
                                save.onclick=function(){  
                                     var jsArray = ["<?php echo join("\", \"", $entity); ?>"];
                                    //var entity_name=new Array("老師","學生","醫生","教士","醫院","病人","校長","教室","主任","隊長");
                                    
                                    savetodb(tojson(),<?php echo $_SESSION['id'];?>,<?php echo $quesid; ?>,jsArray);
                                };  
                            </script>
                            <button id="btn-clear" type="button" class="btn btn-primary" style="margin: 5px;display: block; width: 180px;">
                                清除畫布
                            </button>
                            <script>
                                document.getElementById("btn-clear").onclick=function(){  
                                    record(7,"<?php echo $_SESSION['id'];?>");
                                };  
                            </script>

                        </div>
                        <div class="col-md-7" style="border: 2px solid #080808;margin: 0px;">
                           <!--
                            <div style="position: absolute;z-index: 1000;left: 45%;top:15px;">
                                <label>Edit text</label>
                                <input type="text" id="sketch-state-name" />
                            </div>

                            <div style="position: absolute;z-index: 1000;left: 30%;top:15px;">
                                <label>font size</label>
                                <input type="number" id="myfontsize" style="width: 40px;" />
                            </div>-->

                            <div style="position: absolute;z-index: 500;left: 10%;top:10px;">
                                <button id="btn-undo" class="btn btn-default" aria-label="Left Align">
                                    <span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span>
                                </button>

                            </div>

                            <div style="position: absolute;z-index: 500;left: 20%;top:10px;">
                                <button  id="btn-redo" class="btn btn-default" aria-label="Left Align">
                                    <span class="glyphicon glyphicon-arrow-right" aria-hidden="true"></span>
                                </button>

                            </div>
                            <div id="paper"></div>
                        </div>

                        <div class="col-md-3" style="padding-top:2px;">
<div>

  <!-- Nav tabs -->
  <!--
  <ul id="myTabs" class="nav nav-tabs" role="tablist">
    <li class="active"><a>題目</a></li>
    <li ><a>聊天室</a></li>
  </ul>-->

  <!-- Tab panes -->
  <!--
  <div id="myTabspannel" class="tab-content">
    <div class="tab-pane active"  style="overflow: scroll;height:500px;">
        <h3><b><?php echo $questitle;?></b></h3>
        <p>
           <pre style="text-align:left;"><?php echo $quescontent;?></pre>
        </p>
        <p>
            <?php echo $tip;?>
        </p>
    </div>
    <div class="tab-pane">
        <iframe src="http://localhost:3000/test?name=<?php //echo $_SESSION['name'];?>&id=<?php //echo $_SESSION['id'];?>&groupid=<?php //echo $_SESSION['groupid'];?>&ques=<?php //echo $quesid;?>" frameborder="0"  scrolling="false" width="100% " height="510px"></iframe>
    </div>
  </div>
  -->
<iframe src="http://163.14.72.37:3000/test?name=<?php echo $_SESSION['name'];?>&id=<?php echo $_SESSION['id'];?>&groupid=<?php echo $_SESSION['groupid'];?>&ques=<?php echo $quesid;?>" frameborder="0"  scrolling="false" width="100% " height="800px"></iframe><!--510px-->
</div>
<script>
    $('#myTabs li').click( function() {
         //GEt the current element
         var current = $(this);
        var bd = current.index();  
        //alert(bd);
        $('#myTabs li').removeClass('active');
        $('#myTabspannel div').removeClass('active');
        current.addClass("active");
        $("#myTabspannel div:eq("+bd+")").addClass("active");

    });
    //$('.active').removeClass('active');
    //$('#myTabs li:eq(2)').addClass("active");
    //$('#myTabs li:eq(0)').removeClass("active");

                            </script>
<!----><!----><!----><!----><!----><!----><!----><!----><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->
                        </div>
                    </div>
                    
                    <div id="about" class="row" style="margin: 0px;padding:0px;display:none;">
                       <style>
                           .tp{
                               font-size: 30px;
                               cursor: pointer;
                               margin: 10px;
                           }
                           .tp:hover { opacity: 0.8; }
                           #chardata{
                               display: none;
                           }
                           /*
                           .tabsq{
                               position: absolute;
                               width: 15px;
                               height: 30px;
                               z-index: 1000;
                               cursor: pointer;
                           }
                           .tabsqicon{
                               
                           }
                           .tabsq:hover { opacity: 0.8; }
                           .tabslide1{
                               background-color: #7FB6FF;
                           }
                           .tabslide2{
                               top: 35px;
                               background-color: #FF9D7F;
                           }
                           */
                        </style>
                        <div class="col-md-5" >
                            <span id="tp1" class="glyphicon glyphicon-th-large tp"></span><!--<div class="tabsq tabslide1"></div>-->
                            <span id="tp2" class="glyphicon glyphicon-align-left tp"></span><!--<div class="tabsq tabslide2"></div>-->
                            
                           <link media="all" rel="stylesheet" type="text/css" href="cssplot-master/build/cssplot.full.css" />
                           
    <link rel="stylesheet" href="cssplot-master/build/cssplot.group.css" type="text/css" media="screen" charset="utf-8">
    <link rel="stylesheet" href="cssplot-master/mycss.css" type="text/css" media="screen" charset="utf-8">
                            <div id="chardata" class="bar-chart">
                                <ul id="chardata_data" class="plot-container">
                                   <!--
                                    <li data-cp-size="20" style="">老師<span style="float:right;border:none;">20%</span></li>
                                    <li data-cp-size="80">80%</li>
                                    <li data-cp-size="20">20%</li>
                                    <li data-cp-size="40">40%</li>
                                    <li data-cp-size="20">20%</li>
                                    -->
                                </ul>
                            </div>
                           
                            <div id="changetext">
                                <table id="tableshow" class="table table-bordered table-striped">
                                 
                                   <!--
                                    <thead>
                                        <tr>
                                            <th>entity</th>
                                            <th>自己</th>
                                            <th>王慧縈</th>
                                            <th>柯浩元</th>
                                            <th>余宗穎</th>
                                            <th>共識</th>
                                        </tr>
                                    </thead>-->
                                    <!--
                                    <tbody>

                                        <?php 
							/*	$a=array("Research_report","Research_project","Research_topic","Agency","Employ","Employ","Employ","Employ");
								for ($i=0; $i <count($a); $i++){
								echo"
								<tr>
									<td>".$a[$i]."</td>
									<td>O</td>
									<td>X</td>
									<td>X</td>
									<td>X</td>
									<td>3</td>
								</tr>
								";
								
								};*/?>

                                    </tbody>
                                    -->
                                </table>
                                
                            </div>

                        </div>
                        <div class="col-md-7" style="border: 2px solid #080808;"><!--col-md-offset-2-->

                            <div id="myholder" style="top: 100px;"></div>


                        </div>

                    </div>

                </div>





                <script src="meteor-myjointjs-master/lib/joint.js"></script>
                <script src="meteor-myjointjs-master/lib/joint.shapes.devs.js"></script>
                <script src="meteor-myjointjs-master/lib/joint.shapes.uml.js"></script>
                <script src="meteor-myjointjs-master/lib/joint.ui.halo.js"></script>
                <script src="meteor-myjointjs-master/lib/joint.ui.selectionView.js"></script>
                <script src="meteor-myjointjs-master/lib/joint.ui.clipboard.js"></script>
                <script src="meteor-myjointjs-master/lib/joint.ui.stencil.js"></script>
                <script src="meteor-myjointjs-master/lib/joint.ui.paperScroller.js"></script>
                <script src="meteor-myjointjs-master/lib/joint.format.svg.js"></script>
                <script src="meteor-myjointjs-master/lib/joint.dia.command.js"></script>
                <script src="meteor-myjointjs-master/lib/joint.dia.validator.js"></script>



                <script src="jointroot/joint.shapes.erd.js"></script>


                <!--<iframe src="#" frameborder="0"  scrolling="yes" width="100% "height="450 "name="iframe_a"></iframe>-->

                <div class="navber navbar-default navbar-fixed-bottom" style="background-color: #97CBFF;">
                    <!--style="background-color: #97CBFF;-->
                    <div class="container text-center" >
                          <div class="row" style="padding: 0px; margin: 0px;">
                               <!--
                                <div class="col-lg-2" >
                                    <p class="navbar-text" style="color: #000000;"><?php echo $_SESSION['studentid']."   ".$_SESSION['name'];?>
                                    </p>
                                </div>
                                -->
                                <div class="col-md-1">
                                    <div class="navbar-btn">
                                    <div class="dropup">
                                        <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            我的ERD
                                            <span class="caret"></span>
                                        </button>
                                        <ul id="mylist" class="dropdown-menu" aria-labelledby="dropdownMenu2" style=" height:150px;overflow: scroll;">
                                            <?php 
                                            /*
                                            $mypic=selectmypic($link2,$_SESSION['id']);
                                            for($i=0;$i<count($mypic);$i++){
                                                echo '<li>';
                                                echo '<a class="page-scroll" id="mypic"'.$i.' href="#topup" onclick="getmyjson('.$mypic[$i][0].');">'.$mypic[$i][0].'</a>';
                                                echo '</li>';
                                            }
                                            */
                                            ?>
                                            <script>reloadlist(<?php echo $_SESSION['id'];?>)</script>
                                            <!--
                                            <li>
                                                <a href="#">ERD01</a>
                                            </li>
                                            <li>
                                                <a href="#">ERD02</a>
                                            </li>
                                            <li>
                                                <a href="#">ERD03</a>
                                            </li>
                                            <li>
                                                <a href="#">ERD04</a>
                                            </li>
        -->
                                        </ul>
                                    </div>

</div>
                                </div>
                                <div class="col-md-8 ">                                  
                                    <div class="navbar-btn" >
                                    <div class="row" style="padding: 0px; margin: 0px;">
                                    <div class="col-md-7 " style="padding: 0px;margin: 0px;">
                                    <a class="page-scroll" href="#about">
                                    <!--<div class="btn-group">-->
                                      <?php
                                        $groupmemberid=array();
                                        $groupmembername=array();
                                        for($i=0;$i<count($group);$i++){
                                            $groupmemberid[$i]=$group[$i][1];
                                            $groupmembername[$i]=$group[$i][4];
                                            echo'<button type="button" class="btn-primary btn btn-default" style="margin:0px;margin-right:2px;
                                            " onclick="record(4,'.$_SESSION['id'].','.$group[$i][1].');showabout2(['.$group[$i][1].','.$quesid.'],getjson)"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>'.$group[$i][4].'</button>';
                                        }
                                        $groupmemberid[count($group)]=$_SESSION['id'];
                                        $groupmembername[count($group)]=$_SESSION['name'];
                                       // echo json_encode($groupmembername);
                                        ?>
                                        </a>
                                        </div>
                                        
                                <div class="col-md-5" style="padding: 0px;margin: 0px;">
                                       <!--
                                        <button type="button" class="btn-primary btn btn-default" style="margin-right: 10px;"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> 王慧縈</button>
                                    </a>
                                    <a class="page-scroll" href="#about">
                                        <button type="button" class="btn-primary btn btn-default" style="margin-right: 10px;"><span class="glyphicon glyphicon-user" aria-hidden="true"> 柯浩元</button></a>
        <a class="page-scroll" href="#about"><button type="button" class="btn-primary btn btn-default" style="margin-right: 10px;" ><span class="glyphicon glyphicon-user" aria-hidden="true"> 余宗穎</button></a>-->

       
        <a><!--class="page-scroll" href="#about"-->
            
            <button id="consensus"  onclick='record(6,"<?php echo $_SESSION['id'];?>");showabout2([<?php echo json_encode($groupmemberid);?>,<?php echo $quesid; ?>,<?php echo json_encode($entity);?>,<?php echo json_encode($groupmembername);?>],assemble);' type="button"style="margin:0px;margin-right:2px" class="btn-primary btn btn-default"><span class="glyphicon glyphicon-tower"> 產生共識</span>
            </button>
            
        </a>
        <script>
            var LOCK=<?php echo $_SESSION['LOCK'];?>;
            if(LOCK==1){
                document.getElementById("consensus").style.display="none";
            }
        </script>
        
        <?php
                                        if($_SESSION['leader']==$_SESSION['id'])
                                        echo'
        <button id="uploadanswer" type="button" class="btn-primary btn btn-default" style="
                                            " onclick=""><span class="glyphicon glyphicon-saved" ></span> 上傳答案</button>
                                    
                                    ';
                                    ?>
                                    <script>
                                        uploadanswer.onclick=function(){  
                                            
                                             var jsArray = ["<?php echo join("\", \"", $entity); ?>"];
                                            
                                            //var entity_name=new Array("老師","學生","醫生","教士","醫院","病人","校長","教室","主任","隊長");
                                            //tojson2();
                                            //alert($_SESSION["groupid"]);
                                            //savetodb(tojson(),<?php //echo $_SESSION["id"];?>,<?php //echo $quesid; ?>,jsArray);
                                            if(LOCK==1){
                                                saveanswer(tojson(),<?php echo $_SESSION["groupid"];?>,<?php echo $quesid;?>,jsArray);
                                            }else{
                                                showabout2([tojson2(),<?php echo $_SESSION["groupid"];?>,<?php echo $quesid;?>,jsArray],saveanswer);
                                            }
                                            
                                            
                                            
                                        };  
                                    </script>
                                    <a class="page-scroll" href="#about">
                                    
            <button onclick="record(5,'<?php echo $_SESSION['id'];?>');showabout2([<?php echo $_SESSION['groupid'];?>,<?php echo $quesid; ?>],getnewestjson);" type="button"style="margin:0px;margin-right:2px" class="btn-primary btn btn-default"><span class="glyphicon glyphicon-eye-open"></span>
            </button>
        </a>
                                    </div>
        <!--</div>-->
</div>
                                    </div>
                                </div>
                               

                                
                                <div class="col-md-3">
                                    <div class="row" style="padding: 0px; margin: 0px;">
                                        <div class="col-md-6" style="padding: 0px;margin: 0px;">
                                         <div class="navbar-btn " style="">
                                            <select id="howmuch" class="selectpicker dropup" title="共識強度"  data-dropup-auto="false" data-width="100px">
                                              <option value="2">高</option>
                                              <option value="1">中</option>
                                              <option value="0" selected="selected">低</option>
                                            </select>
    </div>
                                       </div>
                                        <div class="col-md-3" style="padding: 0px;margin: 0px;">
                                            <div class="navbar-btn">
                                                <!--<button id="goin" type="button" class="  btn btn-default">進入</button>-->


                                                <script>
                                                    
//                                                    goin.onclick=function(){
//                                                        //alert("haha");
//                                                        if(mytool.style.display=='block'){
//                                                            mytool.style.display='none';
//                                                        }else{
//                                                             mytool.style.display='block';
//                                                        }
//
//                                                    };  
                                                    
                                                </script>
                                                <button id="logoutbtn"  type="button" class="btn-danger btn btn-default">登出</button>
                                                <script>
                                                    document.getElementById("logoutbtn").onclick=function(){  
                                                        
                                                        logout("<?php echo $_SESSION['id'];?>");
                                                        
                                                    };  
                                                </script>
                                            </div>
                                        </div>
                                        <div class="col-md-3" style="padding: 0px;margin: 0px;">
                                            <div class="navbar-btn">
                                        <a class="page-scroll" href="#bigtopup">
                                        <button class="btn btn-default">
                                            <span class="glyphicon glyphicon-arrow-up" ></span>
                                        </button>
                                        </a>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                               
                                
                         </div>

                <!--<a  target="iframe" href="CSIM_final_6.php" class="navbar-btn btn-danger btn pull-right">進入</a>-->
                <!--<a  href="CSIM_final_16.php" class="navbar-btn btn-danger btn pull-right">登出</a>-->
                  </div>
            </div>      
<br/><br/><br/>
<div id="mytool" style="display:none">
<!--我的測試工具-->
 
  <button type="button" onclick="tojson();">tojson</button>
  <button type="button" onclick="fromjson();">fromjson</button>
  <button type="button" onclick="getjson(<?php echo $_SESSION['id'];?>,<?php echo $quesid; ?>);">fromjson2</button>
  <button type="button" onclick="tojson2();">tojson2</button>
  <button type="button" id="btn-zoom-out2">out2</button>
  <button type="button" id="btn-zoom-in2">in2</button>
  
  <button type="button" id="btn-zoom-out">out</button>
  <button type="button" id="btn-zoom-in">in</button>
  
  <div id="show"></div>
    <br/>
<br/>
<br/>
<br/>
<br/>
<br/>
      
       <!--1111111111111111111111111111111-->
       <!--1111111111111111111111111111111-->
       <!--1111111111111111111111111111111-->
</div>
      <script>
         // tt=Array(<?php echo"'陸','建','綱'";?>);//給定entity
         
         // alert(tt[0]);
          var graph = new joint.dia.Graph;

// Create a paper and wrap it in a PaperScroller.
// ----------------------------------------------

var paperScroller = new joint.ui.PaperScroller({
    autoResizePaper: true
});

var paper = new joint.dia.Paper({
    el: paperScroller.el,
    width: 1000,
    height: 1000,
    gridSize: 10,
    perpendicularLinks: true,
    model: graph
});

paperScroller.options.paper = paper;

$('#paper').append(paperScroller.render().el);

paperScroller.center();

paperScroller.pan();
paper.on('blank:pointerdown', paperScroller.startPanning);

// Create and populate stencil.
// ----------------------------

var stencil = new joint.ui.Stencil({ 
	graph: graph
	,paper: paper
	,width: 200
	,height: 450
	,groups: {
		simple: { label: 'entity', index: 1, closed: false }
		,custom: { label: 'relation', index: 2, closed: true }
		,Cardinality: { label: 'Cardinality', index: 3, closed: true }
		//,Attribute:{ label: 'Attribute', index: 4, closed: true }
	}
});

$('#stencil').append(stencil.render().el);
      

var r = new joint.shapes.basic.Rect({
    position: { x: 100, y: 10 },
    size: { width: 70, height: 40 },
    attrs: {
        rect: { rx: 2, ry: 2, width: 50, height: 30, fill: '#27AE60' },
        text: { text:  'hi', fill: 'white', 'font-size': 10 }
    }
});

var c = new joint.shapes.basic.Circle({
    position: { x: 0, y: 20 },
    size: { width: 60, height: 60 },
    attrs: {
        circle: { width: 50, height: 30, fill: '#E74C3C' },
        text: { text: 'ellipse', fill: 'white', 'font-size': 10 }
    }
});
var w  = new joint.shapes.basic.Circle({
    position: { x: 0, y: 10 },
    size: { width: 30, height: 30 },
    attrs: {
        circle: { width: 15, height: 15, fill: '#E74C3C' },
        text: { text: '0', fill: 'white', 'font-size': 10 }
    }
});
var w2  = new joint.shapes.basic.Circle({
    position: { x: 0, y: 60 },
    size: { width: 30, height: 30 },
    attrs: {
        circle: { width: 15, height: 15, fill: '#E74C3C' },
        text: { text: 'M', fill: 'white', 'font-size': 10 }
    }
});
var w3  = new joint.shapes.basic.Circle({
    position: { x: 0, y: 110 },
    size: { width: 30, height: 30 },
    attrs: {
        circle: { width: 15, height: 15, fill: '#E74C3C' },
        text: { text: '1', fill: 'white', 'font-size': 10 }
    }
});

var w4  = new joint.shapes.basic.Circle({
    position: { x: 0, y: 160 },
    size: { width: 30, height: 30 },
    attrs: {
        circle: { width: 15, height: 15, fill: '#E74C3C' },
        text: { text: '0-1', fill: 'white', 'font-size': 10 }
    }
});
var m = new joint.shapes.devs.Model({
    position: { x: 75, y: 180 },
    size: { width: 80, height: 90 },
    inPorts: ['in1','in2'],
    outPorts: ['out'],
    attrs: {
	rect: { fill: '#8e44ad', rx: 2, ry: 2 },
        '.label': { text: 'model', fill: 'white', 'font-size': 10 },
	'.inPorts circle, .outPorts circle': { fill: '#f1c40f', opacity: 0.9 },
	'.inPorts text, .outPorts text': { 'font-size': 9 },
    }
});
var clazz = new joint.shapes.uml.Class({
    position: { x:60  , y: 140 },
    size: { width: 100, height: 60 },
    name: 'Clazz',
    attributes: [],
    methods: []
});
var uses = new joint.shapes.erd.Relationship({

    position: { x: 0,y: 10 },
    attrs: {
        text: {
            fill: '#ffffff',
            text: 'Uses',
            'letter-spacing': 0,
            style: { 'text-shadow': '1px 0 1px #333333' }
        },
        '.outer': {
            fill: '#797d9a',
            stroke: 'none',
            filter: { name: 'dropShadow',  args: { dx: 0, dy: 2, blur: 1, color: '#333333' }}
        }
        
    }
    
});

<?php //entity
          $entity_count=count($entity);
          //$entity_name=array("老師","學生","醫生","教士","醫院","病人","校長","教室","主任","隊長");
          $entity_name=$entity;
          echo "entity=new Array(".$entity_count.");";
          $y=10;
          for($i=0;$i<$entity_count;$i++){
              if($i%2==0){
                    $x=0;
                  $y=10+30*$i;
              }else{
                  $x=80;
              }
              
             // $count++;
          echo "var r".$i." = new joint.shapes.basic.Rect({
                            position: { x: ".$x.", y: ".$y." },
                            size: { width: 70, height: 40 },
                            attrs: {
                            rect: { rx: 2, ry: 2, width: 50, height: 30, fill: '#27AE60' },
                            text: { text:  '".$entity_name[$i]."', fill: 'white', 'font-size': 10 }
                            }
                        });
                    entity[".$i."]=r".$i.";";
              
          };
          
          ////////////////////////////////
          //relationship
          $relationship_count=count($relation);
          //$relation_name=array("關於","打掃","任教","包含","住宿","租借","任用","加入","攻擊","防禦");
          $relation_name=$relation;
          echo "relationship=new Array(".$relationship_count.");";
          $y=10;
          for($i=0;$i<$relationship_count;$i++){
              if($i%2==0){
                    $x=0;
                  $y=10+30*$i;
              }else{
                  $x=80;
              }
              
             // $count++;
          echo "
          var uses".$i." = new joint.shapes.erd.Relationship({

                position: { x: ".$x.",y: ".$y." },
                
        size: { width: 70, height: 40 },
    attrs: {
        text: {
            fill: '#ffffff',
            text: '".$relation_name[$i]."',
            'letter-spacing': 0,
            style: { 'text-shadow': '1px 0 1px #333333' }
        },
        '.outer': {
            fill: '#797d9a',
            stroke: 'none',
            filter: { name: 'dropShadow',  args: { dx: 0, dy: 2, blur: 1, color: '#333333' }}
        }
    }
    
});
           relationship[".$i."]=uses".$i.";";
              
          };
          
          
          ?>      

          
var cardinary=Array(w2,w3);
stencil.load(entity, 'simple');//rr
stencil.load(relationship, 'custom');
stencil.load(cardinary,'Cardinality');//[w,w2,w3,w4]
//stencil.load([c],'Attribute');
// Selection.
// ----------

var selection = new Backbone.Collection;

var selectionView = new joint.ui.SelectionView({
    paper: paper,
    graph: graph,
    model: selection
});


// Initiate selecting when the user grabs the blank area of the paper while the Shift key is pressed.
// Otherwise, initiate paper pan.
/*
paper.on('blank:pointerdown', function(evt, x, y) {

  //  alert('pointerdown on a blank area in the paper.')
    if (_.contains(KeyboardJS.activeKeys(), 'shift')) {
        selectionView.startSelecting(evt, x, y);
    } else {
        paperScroller.startPanning(evt, x, y);
    }
    
});
*/
paper.on('cell:pointerdown', function(cellView, evt) {
    // Select an element if CTRL/Meta key is pressed while the element is clicked.
    if ((evt.ctrlKey || evt.metaKey) && !(cellView.model instanceof joint.dia.Link)) {
        selectionView.createSelectionBox(cellView);
        selection.add(cellView.model);
    }
});

selectionView.on('selection-box:pointerdown', function(evt) {
    // Unselect an element if the CTRL/Meta key is pressed while a selected element is clicked.
    if (evt.ctrlKey || evt.metaKey) {
        var cell = selection.get($(evt.target).data('model'));
        selectionView.destroySelectionBox(paper.findViewByModel(cell));
        selection.reset(selection.without(cell));
    }
});

// Disable context menu inside the paper.
// This prevents from context menu being shown when selecting individual elements with Ctrl in OS X.
paper.el.oncontextmenu = function(evt) { evt.preventDefault(); };

// enable link inspector
paper.on('link:options', function(evt, cellView, x, y) {
    // Here you can create an inspector for the link the same way as it is done for normal elements.
    console.log('link inspector');
});



// An example of a simple element editor.
// --------------------------------------



// Halo - element tools.
// ---------------------

paper.on('cell:pointerdblclick ', 
    function(cellView, evt, x, y) {
      //  alert('cell view ' + cellView.model.id + ' was clicked');
		var content=window.document.getElementById("sketch-state-name");
		
		var fontsize=window.document.getElementById("myfontsize");
        cellView.model.attr('text/text',content.value);
        cellView.model.attr('text/font-size',fontsize.value);       
        
        
    }
);

paper.on('cell:pointerup', function(cellView, evt) {

    if (cellView.model instanceof joint.dia.Link || selection.contains(cellView.model)) return;
    
    var halo = new joint.ui.Halo({
        graph: graph,
        paper: paper,
        cellView: cellView,
        linkAttributes: {
        '.marker-source': { fill: '#4b4a67', stroke: '#4b4a67' },//M 10 0 L 0 5 L 10 10 z
        '.marker-target': { fill: '#4b4a67', stroke: '#4b4a67' }
        
       // '.connection': { stroke: 'blue' },
        }
        
    });

    halo.render();
	//createInspector(cellView);
	
});



// Command Manager - undo/redo.
// ----------------------------

var commandManager = new joint.dia.CommandManager({ graph: graph });

// Validator
// ---------
// nothing

// Hook on toolbar buttons.
// ------------------------

$('#btn-undo').on('click', _.bind(commandManager.undo, commandManager));
$('#btn-redo').on('click', _.bind(commandManager.redo, commandManager));
$('#btn-clear').on('click', _.bind(graph.clear, graph));
$('#btn-svg').on('click', function() {
    paper.openAsSVG();
    console.log(paper.toSVG()); // An exmaple of retriving the paper SVG as a string.
});
$('#btn-find-element, #btn-layout, #btn-group, #btn-ungroup').on('click', function() {
    alert('not ready yet');
});
$('#btn-center-content').click(function(){
	paperScroller.centerContent();
});


var zoomLevel = 1;

function zoom(paper, newZoomLevel) {

    if (newZoomLevel > 0.2 && newZoomLevel < 20) {

	var ox = (paper.el.scrollLeft + paper.el.clientWidth / 2) / zoomLevel;
	var oy = (paper.el.scrollTop + paper.el.clientHeight / 2) / zoomLevel;

	paper.scale(newZoomLevel, newZoomLevel, ox, oy);

	zoomLevel = newZoomLevel;
    }
}

$('#btn-zoom-in').on('click', function() { zoom(paper, zoomLevel + 0.2); });
$('#btn-zoom-out').on('click', function() { zoom(paper, zoomLevel - 0.2); });


function tojson(){
		var text=JSON.stringify(graph.toJSON());
	//alert(text);
		var content=window.document.getElementById("show");
		
		content.innerHTML=text;
    return text;
	} 
	function fromjson(textjson){
	
		//var textjson='{"cells":[{"type":"basic.Rect","position":{"x":400,"y":300},"size":{"width":100,"height":60},"angle":0,"id":"e6a85247-c642-42f0-b6dd-d0c2f319f4c2","embeds":"","z":0,"attrs":{"rect":{"fill":"#27AE60","width":50,"height":30,"rx":2,"ry":2},"text":{"font-size":10,"text":"Research_report","fill":"white"}}},{"type":"basic.Rect","position":{"x":400,"y":590},"size":{"width":100,"height":60},"angle":0,"id":"377676a1-195f-417b-ae7f-6e70e616a8a2","embeds":"","z":1,"attrs":{"rect":{"fill":"#27AE60","width":50,"height":30,"rx":2,"ry":2},"text":{"font-size":10,"text":"Research_project","fill":"white"}}},{"type":"erd.Relationship","size":{"width":80,"height":80},"position":{"x":410,"y":440},"angle":0,"id":"97bfe1f2-9348-409c-b770-c7b27824be51","embeds":"","z":2,"attrs":{".outer":{"fill":"#797d9a","stroke":"none","filter":{"name":"dropShadow","args":{"dx":0,"dy":2,"blur":1,"color":"#333333"}}},"text":{"text":"produces","fill":"#ffffff","letter-spacing":0,"style":{"text-shadow":"1px 0 1px #333333"}}}},{"type":"basic.Circle","size":{"width":30,"height":30},"position":{"x":430,"y":390},"angle":0,"id":"9dffcb08-fce2-4c16-b63c-a1e078c8a996","embeds":"","z":3,"attrs":{"circle":{"fill":"#E74C3C","width":15,"height":15},"text":{"font-size":10,"text":"1,1","fill":"white"}}},{"type":"basic.Circle","size":{"width":30,"height":30},"position":{"x":430,"y":540},"angle":0,"id":"5303068f-eba0-4f8f-8eb1-a9e032f5afc2","embeds":"","z":4,"attrs":{"circle":{"fill":"#E74C3C","width":15,"height":15},"text":{"font-size":10,"text":"1,n","fill":"white"}}},{"type":"basic.Rect","position":{"x":230,"y":590},"size":{"width":100,"height":60},"angle":0,"id":"f6d90ebe-623f-41f3-b3be-c3cca939012b","embeds":"","z":5,"attrs":{"rect":{"fill":"#27AE60","width":50,"height":30,"rx":2,"ry":2},"text":{"font-size":10,"text":"Research_topic","fill":"white"}}},{"type":"basic.Rect","position":{"x":640,"y":650},"size":{"width":100,"height":60},"angle":0,"id":"79e7b110-9d02-4531-ba36-c830e115a472","embeds":"","z":6,"attrs":{"rect":{"fill":"#27AE60","width":50,"height":30,"rx":2,"ry":2},"text":{"font-size":10,"text":"Agency","fill":"white"}}},{"type":"basic.Rect","position":{"x":780,"y":430},"size":{"width":100,"height":90},"angle":0,"id":"5a230071-72f6-4f0f-997f-fed0d034f284","embeds":"","z":7,"attrs":{"rect":{"fill":"#27AE60","width":50,"height":30,"rx":2,"ry":2},"text":{"font-size":10,"text":"Employee","fill":"white"}}},{"type":"link","id":"7e090239-aaba-4294-af89-dfa9d3f02862","embeds":"","source":{"id":"377676a1-195f-417b-ae7f-6e70e616a8a2"},"target":{"id":"5303068f-eba0-4f8f-8eb1-a9e032f5afc2"},"z":8,"attrs":{".marker-source":{"fill":"#4b4a67","stroke":"#4b4a67"},".marker-target":{"fill":"#4b4a67","stroke":"#4b4a67"}}},{"type":"link","id":"fdb6bccf-f5ab-468a-8aec-cb5dd8091a71","embeds":"","source":{"id":"5303068f-eba0-4f8f-8eb1-a9e032f5afc2"},"target":{"id":"97bfe1f2-9348-409c-b770-c7b27824be51"},"z":9,"attrs":{".marker-source":{"fill":"#4b4a67","stroke":"#4b4a67"},".marker-target":{"fill":"#4b4a67","stroke":"#4b4a67"}}},{"type":"link","id":"5da5319b-4be2-4c37-853c-954a3fef1d6b","embeds":"","source":{"id":"97bfe1f2-9348-409c-b770-c7b27824be51"},"target":{"id":"9dffcb08-fce2-4c16-b63c-a1e078c8a996"},"z":10,"attrs":{".marker-source":{"fill":"#4b4a67","stroke":"#4b4a67"},".marker-target":{"fill":"#4b4a67","stroke":"#4b4a67"}}},{"type":"link","id":"7c334574-bc23-4b78-afc5-c0d0acc6dbb8","embeds":"","source":{"id":"9dffcb08-fce2-4c16-b63c-a1e078c8a996"},"target":{"id":"e6a85247-c642-42f0-b6dd-d0c2f319f4c2"},"z":11,"attrs":{".marker-source":{"fill":"#4b4a67","stroke":"#4b4a67"},".marker-target":{"fill":"#4b4a67","stroke":"#4b4a67"}}},{"type":"erd.Relationship","size":{"width":80,"height":80},"position":{"x":230,"y":400},"angle":0,"id":"f3d2f3ee-2e87-4caa-96ae-283a823e3708","embeds":"","z":12,"attrs":{".outer":{"fill":"#797d9a","stroke":"none","filter":{"name":"dropShadow","args":{"dx":0,"dy":2,"blur":1,"color":"#333333"}}},"text":{"text":"addresses","fill":"#ffffff","letter-spacing":0,"style":{"text-shadow":"1px 0 1px #333333"}}}},{"type":"basic.Circle","size":{"width":30,"height":30},"position":{"x":-220,"y":530},"angle":0,"id":"dbd5dd47-11eb-40d9-bb58-9c7ffc4c1a2c","embeds":"","z":13,"attrs":{"circle":{"fill":"#E74C3C","width":15,"height":15},"text":{"font-size":10,"text":"1,n","fill":"white"}}},{"type":"basic.Circle","size":{"width":30,"height":30},"position":{"x":250,"y":530},"angle":0,"id":"9f61411f-53c3-4eac-b569-d3e6a7fa2afa","embeds":"","z":14,"attrs":{"circle":{"fill":"#E74C3C","width":15,"height":15},"text":{"font-size":10,"text":"1,n","fill":"white"}}},{"type":"basic.Circle","size":{"width":30,"height":30},"position":{"x":330,"y":320},"angle":0,"id":"135ef4ed-8109-47f6-855e-63602412debc","embeds":"","z":15,"attrs":{"circle":{"fill":"#E74C3C","width":15,"height":15},"text":{"font-size":10,"text":"1,n","fill":"white"}}},{"type":"link","id":"744bf447-0cfe-4f76-a110-2295828ea5ab","embeds":"","source":{"id":"e6a85247-c642-42f0-b6dd-d0c2f319f4c2"},"target":{"id":"135ef4ed-8109-47f6-855e-63602412debc"},"z":16,"attrs":{".marker-source":{"fill":"#4b4a67","stroke":"#4b4a67"},".marker-target":{"fill":"#4b4a67","stroke":"#4b4a67"}}},{"type":"link","id":"9217c05c-2b13-4d9f-8567-dacef3faab0d","embeds":"","source":{"id":"135ef4ed-8109-47f6-855e-63602412debc"},"target":{"id":"f3d2f3ee-2e87-4caa-96ae-283a823e3708"},"z":17,"vertices":[{"x":270,"y":330}],"attrs":{".marker-source":{"fill":"#4b4a67","stroke":"#4b4a67"},".marker-target":{"fill":"#4b4a67","stroke":"#4b4a67"}}},{"type":"link","id":"fac42085-7c77-4db5-be33-dfaabb91d57b","embeds":"","source":{"id":"f6d90ebe-623f-41f3-b3be-c3cca939012b"},"target":{"id":"9f61411f-53c3-4eac-b569-d3e6a7fa2afa"},"z":18,"attrs":{".marker-source":{"fill":"#4b4a67","stroke":"#4b4a67"},".marker-target":{"fill":"#4b4a67","stroke":"#4b4a67"}}},{"type":"link","id":"33d3e84d-bcf3-486c-885d-fba2b1d6df71","embeds":"","source":{"id":"9f61411f-53c3-4eac-b569-d3e6a7fa2afa"},"target":{"id":"f3d2f3ee-2e87-4caa-96ae-283a823e3708"},"z":19,"attrs":{".marker-source":{"fill":"#4b4a67","stroke":"#4b4a67"},".marker-target":{"fill":"#4b4a67","stroke":"#4b4a67"}}},{"type":"basic.Circle","size":{"width":30,"height":30},"position":{"x":260,"y":670},"angle":0,"id":"6c3ef476-c399-4f70-a04b-ef6c0359782d","embeds":"","z":21,"attrs":{"circle":{"fill":"#E74C3C","width":15,"height":15},"text":{"font-size":10,"text":"1,n","fill":"white"}}},{"type":"basic.Circle","size":{"width":30,"height":30},"position":{"x":430,"y":670},"angle":0,"id":"c664d193-7395-49b6-a334-ad0f10c55259","embeds":"","z":22,"attrs":{"circle":{"fill":"#E74C3C","width":15,"height":15},"text":{"font-size":10,"text":"1,n","fill":"white"}}},{"type":"erd.Relationship","size":{"width":80,"height":80},"position":{"x":320,"y":640},"angle":0,"id":"37d7bfa8-4218-4d48-ba59-43661eb89f22","embeds":"","z":22,"attrs":{".outer":{"fill":"#797d9a","stroke":"none","filter":{"name":"dropShadow","args":{"dx":0,"dy":2,"blur":1,"color":"#333333"}}},"text":{"text":"on","fill":"#ffffff","letter-spacing":0,"style":{"text-shadow":"1px 0 1px #333333"}}}},{"type":"link","id":"cad6443e-df6b-4ffc-8347-2d4c65d33c08","embeds":"","source":{"id":"377676a1-195f-417b-ae7f-6e70e616a8a2"},"target":{"id":"c664d193-7395-49b6-a334-ad0f10c55259"},"z":23,"attrs":{".marker-source":{"fill":"#4b4a67","stroke":"#4b4a67"},".marker-target":{"fill":"#4b4a67","stroke":"#4b4a67"}}},{"type":"link","id":"e4d5b41c-8ef3-4c31-b538-988823d2cd69","embeds":"","source":{"id":"37d7bfa8-4218-4d48-ba59-43661eb89f22"},"target":{"id":"c664d193-7395-49b6-a334-ad0f10c55259"},"z":24,"attrs":{".marker-source":{"fill":"#4b4a67","stroke":"#4b4a67"},".marker-target":{"fill":"#4b4a67","stroke":"#4b4a67"}}},{"type":"link","id":"961e3a4a-03ea-4047-a8cd-c22779629785","embeds":"","source":{"id":"37d7bfa8-4218-4d48-ba59-43661eb89f22"},"target":{"id":"6c3ef476-c399-4f70-a04b-ef6c0359782d"},"z":25,"attrs":{".marker-source":{"fill":"#4b4a67","stroke":"#4b4a67"},".marker-target":{"fill":"#4b4a67","stroke":"#4b4a67"}}},{"type":"link","id":"5a6eb1e7-0d82-4223-9055-caeb3bbe4956","embeds":"","source":{"id":"6c3ef476-c399-4f70-a04b-ef6c0359782d"},"target":{"id":"f6d90ebe-623f-41f3-b3be-c3cca939012b"},"z":26,"attrs":{".marker-source":{"fill":"#4b4a67","stroke":"#4b4a67"},".marker-target":{"fill":"#4b4a67","stroke":"#4b4a67"}}},{"type":"erd.Relationship","size":{"width":170,"height":70},"position":{"x":550,"y":340},"angle":0,"id":"7f22910f-cd86-4cde-b019-1e14f7f8bcaa","embeds":"","z":27,"attrs":{".outer":{"fill":"#797d9a","stroke":"none","filter":{"name":"dropShadow","args":{"dx":0,"dy":2,"blur":1,"color":"#333333"}}},"text":{"text":"Is_pricipal_investigator","fill":"#ffffff","letter-spacing":0,"style":{"text-shadow":"1px 0 1px #333333"}}}},{"type":"basic.Circle","size":{"width":30,"height":30},"position":{"x":760,"y":360},"angle":0,"id":"26a29644-427d-4437-8b66-fdff365cf414","embeds":"","z":28,"attrs":{"circle":{"fill":"#E74C3C","width":15,"height":15},"text":{"font-size":10,"text":"0,n","fill":"white"}}},{"type":"basic.Circle","size":{"width":30,"height":30},"position":{"x":500,"y":400},"angle":0,"id":"fea65678-ca9f-462c-9106-2f77316370b5","embeds":"","z":29,"attrs":{"circle":{"fill":"#E74C3C","width":15,"height":15},"text":{"font-size":10,"text":"1,1","fill":"white"}}},{"type":"link","id":"5e79a9a1-cab6-447a-9844-eeed3b18e183","embeds":"","source":{"id":"fea65678-ca9f-462c-9106-2f77316370b5"},"target":{"id":"7f22910f-cd86-4cde-b019-1e14f7f8bcaa"},"z":30,"vertices":[{"x":520,"y":370}],"attrs":{".marker-source":{"fill":"#4b4a67","stroke":"#4b4a67"},".marker-target":{"fill":"#4b4a67","stroke":"#4b4a67"}}},{"type":"link","id":"3060839a-91e6-4a6d-b1d9-4bfeebd4642f","embeds":"","source":{"id":"26a29644-427d-4437-8b66-fdff365cf414"},"target":{"id":"5a230071-72f6-4f0f-997f-fed0d034f284"},"z":31,"attrs":{".marker-source":{"fill":"#4b4a67","stroke":"#4b4a67"},".marker-target":{"fill":"#4b4a67","stroke":"#4b4a67"}}},{"type":"link","id":"b88fbc48-1c9c-46d4-a2d6-24e6be7afe15","embeds":"","source":{"id":"26a29644-427d-4437-8b66-fdff365cf414"},"target":{"id":"7f22910f-cd86-4cde-b019-1e14f7f8bcaa"},"z":32,"attrs":{".marker-source":{"fill":"#4b4a67","stroke":"#4b4a67"},".marker-target":{"fill":"#4b4a67","stroke":"#4b4a67"}}},{"type":"link","id":"26ae3504-7e98-4768-85a1-d2d6b3b65bc3","embeds":"","source":{"id":"97bfe1f2-9348-409c-b770-c7b27824be51"},"target":{"id":"fea65678-ca9f-462c-9106-2f77316370b5"},"z":33,"vertices":[{"x":520,"y":460}],"attrs":{".marker-source":{"fill":"#4b4a67","stroke":"#4b4a67"},".marker-target":{"fill":"#4b4a67","stroke":"#4b4a67"}}},{"type":"erd.Relationship","size":{"width":80,"height":80},"position":{"x":640,"y":440},"angle":0,"id":"4aebe025-5253-49b7-92ba-707d70e9b6e4","embeds":"","z":34,"attrs":{".outer":{"fill":"#797d9a","stroke":"none","filter":{"name":"dropShadow","args":{"dx":0,"dy":2,"blur":1,"color":"#333333"}}},"text":{"text":"works_on","fill":"#ffffff","letter-spacing":0,"style":{"text-shadow":"1px 0 1px #333333"}}}},{"type":"basic.Circle","size":{"width":30,"height":30},"position":{"x":570,"y":470},"angle":0,"id":"da8b7a61-a879-4b4d-a2b2-0969cf49ce12","embeds":"","z":35,"attrs":{"circle":{"fill":"#E74C3C","width":15,"height":15},"text":{"font-size":10,"text":"1,n","fill":"white"}}},{"type":"basic.Circle","size":{"width":30,"height":30},"position":{"x":730,"y":460},"angle":0,"id":"47c6ecb3-a4f2-4c24-b57b-5a2bf6b1afca","embeds":"","z":36,"attrs":{"circle":{"fill":"#E74C3C","width":15,"height":15},"text":{"font-size":10,"text":"0,n","fill":"white"}}},{"type":"link","id":"1044eeea-d7f2-41bc-91af-95ec6cc70b85","embeds":"","source":{"id":"da8b7a61-a879-4b4d-a2b2-0969cf49ce12"},"target":{"id":"97bfe1f2-9348-409c-b770-c7b27824be51"},"z":37,"attrs":{".marker-source":{"fill":"#4b4a67","stroke":"#4b4a67"},".marker-target":{"fill":"#4b4a67","stroke":"#4b4a67"}}},{"type":"link","id":"7a55bb8b-c712-45eb-a9f1-118d6790dde0","embeds":"","source":{"id":"da8b7a61-a879-4b4d-a2b2-0969cf49ce12"},"target":{"id":"4aebe025-5253-49b7-92ba-707d70e9b6e4"},"z":38,"attrs":{".marker-source":{"fill":"#4b4a67","stroke":"#4b4a67"},".marker-target":{"fill":"#4b4a67","stroke":"#4b4a67"}}},{"type":"link","id":"f4283e6f-8792-44c6-a76b-25f41a1fa3b2","embeds":"","source":{"id":"4aebe025-5253-49b7-92ba-707d70e9b6e4"},"target":{"id":"47c6ecb3-a4f2-4c24-b57b-5a2bf6b1afca"},"z":39,"attrs":{".marker-source":{"fill":"#4b4a67","stroke":"#4b4a67"},".marker-target":{"fill":"#4b4a67","stroke":"#4b4a67"}}},{"type":"link","id":"d6f4fbfc-a798-470e-93f1-6d9ba09ff583","embeds":"","source":{"id":"47c6ecb3-a4f2-4c24-b57b-5a2bf6b1afca"},"target":{"id":"5a230071-72f6-4f0f-997f-fed0d034f284"},"z":40,"attrs":{".marker-source":{"fill":"#4b4a67","stroke":"#4b4a67"},".marker-target":{"fill":"#4b4a67","stroke":"#4b4a67"}}},{"type":"erd.Relationship","size":{"width":80,"height":80},"position":{"x":760,"y":560},"angle":0,"id":"e3382e66-c227-48f3-8fe2-9bfbf7ec1573","embeds":"","z":41,"attrs":{".outer":{"fill":"#797d9a","stroke":"none","filter":{"name":"dropShadow","args":{"dx":0,"dy":2,"blur":1,"color":"#333333"}}},"text":{"text":"super-vises","fill":"#ffffff","letter-spacing":0,"style":{"text-shadow":"1px 0 1px #333333"}}}},{"type":"basic.Circle","size":{"width":30,"height":30},"position":{"x":860,"y":580},"angle":0,"id":"76ea33dc-87bd-4d12-b2f1-6393309cb36c","embeds":"","z":42,"attrs":{"circle":{"fill":"#E74C3C","width":15,"height":15},"text":{"font-size":10,"text":"1,1","fill":"white"}}},{"type":"basic.Circle","size":{"width":30,"height":30},"position":{"x":710,"y":580},"angle":0,"id":"7e19a189-8fc0-4096-b118-722c2b989eec","embeds":"","z":43,"attrs":{"circle":{"fill":"#E74C3C","width":15,"height":15},"text":{"font-size":10,"text":"0,n","fill":"white"}}},{"type":"link","id":"2a170d83-2a82-4078-b751-1b1a4e61230e","embeds":"","source":{"id":"5a230071-72f6-4f0f-997f-fed0d034f284"},"target":{"id":"76ea33dc-87bd-4d12-b2f1-6393309cb36c"},"z":44,"attrs":{".marker-source":{"fill":"#4b4a67","stroke":"#4b4a67"},".marker-target":{"fill":"#4b4a67","stroke":"#4b4a67"}}},{"type":"link","id":"1efd94d2-9296-4c95-b2e5-ecceded34a2b","embeds":"","source":{"id":"76ea33dc-87bd-4d12-b2f1-6393309cb36c"},"target":{"id":"e3382e66-c227-48f3-8fe2-9bfbf7ec1573"},"z":45,"attrs":{".marker-source":{"fill":"#4b4a67","stroke":"#4b4a67"},".marker-target":{"fill":"#4b4a67","stroke":"#4b4a67"}}},{"type":"link","id":"17aa4610-43d5-40c0-a89e-88853949ba03","embeds":"","source":{"id":"7e19a189-8fc0-4096-b118-722c2b989eec"},"target":{"id":"e3382e66-c227-48f3-8fe2-9bfbf7ec1573"},"z":46,"attrs":{".marker-source":{"fill":"#4b4a67","stroke":"#4b4a67"},".marker-target":{"fill":"#4b4a67","stroke":"#4b4a67"}}},{"type":"link","id":"f3dc3fad-ea4d-4d22-8897-46dbb31705d1","embeds":"","source":{"id":"7e19a189-8fc0-4096-b118-722c2b989eec"},"target":{"id":"5a230071-72f6-4f0f-997f-fed0d034f284"},"z":47,"vertices":[{"x":730,"y":510}],"attrs":{".marker-source":{"fill":"#4b4a67","stroke":"#4b4a67"},".marker-target":{"fill":"#4b4a67","stroke":"#4b4a67"}}},{"type":"erd.Relationship","size":{"width":80,"height":80},"position":{"x":570,"y":580},"angle":0,"id":"54d6332f-755d-4ef7-9b02-60e5a278e6c0","embeds":"","z":48,"attrs":{".outer":{"fill":"#797d9a","stroke":"none","filter":{"name":"dropShadow","args":{"dx":0,"dy":2,"blur":1,"color":"#333333"}}},"text":{"text":"funded_by","fill":"#ffffff","letter-spacing":0,"style":{"text-shadow":"1px 0 1px #333333"}}}},{"type":"basic.Circle","size":{"width":30,"height":30},"position":{"x":520,"y":600},"angle":0,"id":"4ea75e50-05ad-43ed-a015-b1ec6c9889bd","embeds":"","z":49,"attrs":{"circle":{"fill":"#E74C3C","width":15,"height":15},"text":{"font-size":10,"text":"1,1","fill":"white"}}},{"type":"basic.Circle","size":{"width":30,"height":30},"position":{"x":670,"y":600},"angle":0,"id":"916d4c20-70af-47ce-8d49-b9436808320a","embeds":"","z":50,"attrs":{"circle":{"fill":"#E74C3C","width":15,"height":15},"text":{"font-size":10,"text":"1,n","fill":"white"}}},{"type":"link","id":"8d9575b2-c22c-4adb-a7fb-315107ac0a11","embeds":"","source":{"id":"377676a1-195f-417b-ae7f-6e70e616a8a2"},"target":{"id":"4ea75e50-05ad-43ed-a015-b1ec6c9889bd"},"z":51,"attrs":{".marker-source":{"fill":"#4b4a67","stroke":"#4b4a67"},".marker-target":{"fill":"#4b4a67","stroke":"#4b4a67"}}},{"type":"link","id":"4af59a38-db74-4c79-a4dc-de5005aa50c1","embeds":"","source":{"id":"4ea75e50-05ad-43ed-a015-b1ec6c9889bd"},"target":{"id":"54d6332f-755d-4ef7-9b02-60e5a278e6c0"},"z":52,"attrs":{".marker-source":{"fill":"#4b4a67","stroke":"#4b4a67"},".marker-target":{"fill":"#4b4a67","stroke":"#4b4a67"}}},{"type":"link","id":"d4a321e2-f83b-4595-8b89-f7323dc75ca4","embeds":"","source":{"id":"54d6332f-755d-4ef7-9b02-60e5a278e6c0"},"target":{"id":"916d4c20-70af-47ce-8d49-b9436808320a"},"z":53,"attrs":{".marker-source":{"fill":"#4b4a67","stroke":"#4b4a67"},".marker-target":{"fill":"#4b4a67","stroke":"#4b4a67"}}},{"type":"link","id":"be30fc0e-b254-4bc9-878e-1e0a10af2490","embeds":"","source":{"id":"916d4c20-70af-47ce-8d49-b9436808320a"},"target":{"id":"79e7b110-9d02-4531-ba36-c830e115a472"},"z":54,"attrs":{".marker-source":{"fill":"#4b4a67","stroke":"#4b4a67"},".marker-target":{"fill":"#4b4a67","stroke":"#4b4a67"}}},{"type":"basic.Circle","size":{"width":40,"height":40},"position":{"x":170,"y":570},"angle":0,"id":"6f91a62e-73b2-4683-8d12-77de5926bfc1","embeds":"","z":55,"attrs":{"circle":{"fill":"#E74C3C","width":50,"height":30},"text":{"font-size":10,"text":"name","fill":"white"}}},{"type":"link","id":"406457d8-e5c3-40f7-8511-fc125b52d082","embeds":"","source":{"id":"6f91a62e-73b2-4683-8d12-77de5926bfc1"},"target":{"id":"f6d90ebe-623f-41f3-b3be-c3cca939012b"},"z":56,"attrs":{".marker-source":{"fill":"#4b4a67","stroke":"#4b4a67"},".marker-target":{"fill":"#4b4a67","stroke":"#4b4a67"}}},{"type":"basic.Circle","size":{"width":40,"height":40},"position":{"x":170,"y":620},"angle":0,"id":"a2dce734-3926-4b0f-9434-c62bd96bf226","embeds":"","z":57,"attrs":{"circle":{"fill":"#E74C3C","width":50,"height":30},"text":{"font-size":"10","text":"code","fill":"white"}}},{"type":"link","id":"6ed29f9c-714f-4c8c-b2f7-a6b3ef27262a","embeds":"","source":{"id":"a2dce734-3926-4b0f-9434-c62bd96bf226"},"target":{"id":"f6d90ebe-623f-41f3-b3be-c3cca939012b"},"z":58,"attrs":{".marker-source":{"fill":"#4b4a67","stroke":"#4b4a67"},".marker-target":{"fill":"#4b4a67","stroke":"#4b4a67"}}},{"type":"basic.Circle","size":{"width":80,"height":60},"position":{"x":480,"y":240},"angle":0,"id":"c7535b12-797c-47b3-a972-56a988a17849","embeds":"","z":59,"attrs":{"circle":{"fill":"#E74C3C","width":50,"height":30},"text":{"font-size":"10","text":"authors(1,n)","fill":"white"}}},{"type":"basic.Circle","size":{"width":50,"height":50},"position":{"x":330,"y":260},"angle":0,"id":"d6c0ccf3-2aa9-4509-8c5e-40c20ccff5c3","embeds":"","z":61,"attrs":{"circle":{"fill":"#E74C3C","width":50,"height":30},"text":{"font-size":"10","text":"title","fill":"white"}}},{"type":"link","id":"660896cd-f132-464b-8e25-ce3b3ee4924c","embeds":"","source":{"id":"d6c0ccf3-2aa9-4509-8c5e-40c20ccff5c3"},"target":{"id":"e6a85247-c642-42f0-b6dd-d0c2f319f4c2"},"z":62,"vertices":[{"x":430,"y":280}],"attrs":{".marker-source":{"fill":"#4b4a67","stroke":"#4b4a67"},".marker-target":{"fill":"#4b4a67","stroke":"#4b4a67"}}},{"type":"link","id":"1e7dd674-fee5-4276-90cf-1004a1bddfd8","embeds":"","source":{"id":"c7535b12-797c-47b3-a972-56a988a17849"},"target":{"id":"e6a85247-c642-42f0-b6dd-d0c2f319f4c2"},"z":62,"vertices":[{"x":460,"y":260}],"attrs":{".marker-source":{"fill":"#4b4a67","stroke":"#4b4a67"},".marker-target":{"fill":"#4b4a67","stroke":"#4b4a67"}}},{"type":"basic.Circle","size":{"width":50,"height":50},"position":{"x":530,"y":310},"angle":0,"id":"dfc85698-9384-4ef8-838e-3bcb8a803d55","embeds":"","z":63,"attrs":{"circle":{"fill":"#E74C3C","width":50,"height":30},"text":{"font-size":"10","text":"number","fill":"white"}}},{"type":"link","id":"54563226-8e97-42f4-8215-98871994c222","embeds":"","source":{"id":"dfc85698-9384-4ef8-838e-3bcb8a803d55"},"target":{"id":"e6a85247-c642-42f0-b6dd-d0c2f319f4c2"},"z":64,"attrs":{".marker-source":{"fill":"#4b4a67","stroke":"#4b4a67"},".marker-target":{"fill":"#4b4a67","stroke":"#4b4a67"}}},{"type":"basic.Circle","size":{"width":50,"height":50},"position":{"x":340,"y":530},"angle":0,"id":"b7eef031-dbf8-4747-a315-fda170413469","embeds":"","z":65,"attrs":{"circle":{"fill":"#E74C3C","width":50,"height":30},"text":{"font-size":"10","text":"name","fill":"white"}}},{"type":"link","id":"4bbd4856-5884-4654-8222-96053f8e777f","embeds":"","source":{"id":"b7eef031-dbf8-4747-a315-fda170413469"},"target":{"id":"377676a1-195f-417b-ae7f-6e70e616a8a2"},"z":66,"attrs":{".marker-source":{"fill":"#4b4a67","stroke":"#4b4a67"},".marker-target":{"fill":"#4b4a67","stroke":"#4b4a67"}}},{"type":"basic.Circle","size":{"width":50,"height":50},"position":{"x":500,"y":520},"angle":0,"id":"6de570f1-2295-4cb2-85e4-3db2fb27399e","embeds":"","z":67,"attrs":{"circle":{"fill":"#E74C3C","width":50,"height":30},"text":{"font-size":"10","text":"amount","fill":"white"}}},{"type":"basic.Circle","size":{"width":50,"height":50},"position":{"x":580,"y":510},"angle":0,"id":"a8ccf212-7e5d-4016-9f7c-565bd3310eae","embeds":"","z":68,"attrs":{"circle":{"fill":"#E74C3C","width":50,"height":30},"text":{"font-size":"10","text":"date","fill":"white"}}},{"type":"basic.Circle","size":{"width":50,"height":50},"position":{"x":520,"y":680},"angle":0,"id":"3c7fae0f-8ece-4301-ad83-708e112e0ce8","embeds":"","z":69,"attrs":{"circle":{"fill":"#E74C3C","width":50,"height":30},"text":{"font-size":"10","text":"contact","fill":"white"}}},{"type":"link","id":"faaa8e95-05fa-453c-97bc-c073d17ac517","embeds":"","source":{"id":"6de570f1-2295-4cb2-85e4-3db2fb27399e"},"target":{"id":"54d6332f-755d-4ef7-9b02-60e5a278e6c0"},"z":70,"attrs":{".marker-source":{"fill":"#4b4a67","stroke":"#4b4a67"},".marker-target":{"fill":"#4b4a67","stroke":"#4b4a67"}}},{"type":"link","id":"5227395b-eb3b-4993-b743-30d1c7e7a2b9","embeds":"","source":{"id":"a8ccf212-7e5d-4016-9f7c-565bd3310eae"},"target":{"id":"54d6332f-755d-4ef7-9b02-60e5a278e6c0"},"z":71,"attrs":{".marker-source":{"fill":"#4b4a67","stroke":"#4b4a67"},".marker-target":{"fill":"#4b4a67","stroke":"#4b4a67"}}},{"type":"link","id":"18721abf-0fef-4ce4-b329-243dcb7c8ced","embeds":"","source":{"id":"3c7fae0f-8ece-4301-ad83-708e112e0ce8"},"target":{"id":"54d6332f-755d-4ef7-9b02-60e5a278e6c0"},"z":72,"attrs":{".marker-source":{"fill":"#4b4a67","stroke":"#4b4a67"},".marker-target":{"fill":"#4b4a67","stroke":"#4b4a67"}}},{"type":"basic.Circle","size":{"width":50,"height":50},"position":{"x":790,"y":650},"angle":0,"id":"7e8f5482-6b1e-4ce4-a2f8-90ae900f4cf6","embeds":"","z":73,"attrs":{"circle":{"fill":"#E74C3C","width":50,"height":30},"text":{"font-size":"10","text":"name","fill":"white"}}},{"type":"link","id":"ef0c2acf-2d4c-4dde-865e-f5e6eb6f313e","embeds":"","source":{"id":"7e8f5482-6b1e-4ce4-a2f8-90ae900f4cf6"},"target":{"id":"79e7b110-9d02-4531-ba36-c830e115a472"},"z":74,"attrs":{".marker-source":{"fill":"#4b4a67","stroke":"#4b4a67"},".marker-target":{"fill":"#4b4a67","stroke":"#4b4a67"}}},{"type":"basic.Circle","size":{"width":50,"height":50},"position":{"x":810,"y":330},"angle":0,"id":"9695e4ae-cdc0-4349-839c-906a14639d7a","embeds":"","z":75,"attrs":{"circle":{"fill":"#E74C3C","width":50,"height":30},"text":{"font-size":"10","text":"name","fill":"white"}}},{"type":"link","id":"a949c4d5-4046-49aa-a68e-a0cef265e943","embeds":"","source":{"id":"9695e4ae-cdc0-4349-839c-906a14639d7a"},"target":{"id":"5a230071-72f6-4f0f-997f-fed0d034f284"},"z":76,"attrs":{".marker-source":{"fill":"#4b4a67","stroke":"#4b4a67"},".marker-target":{"fill":"#4b4a67","stroke":"#4b4a67"}}}]}';
		
		//var textjson='{"cells":[{"type":"basic.Rect","position":{"x":0,"y":20},"size":{"width":100,"height":60},"angle":0,"id":"38f90e3e-041b-4853-ab16-365e74cf87b5","z":0,"attrs":{"rect":{"fill":"#27AE60","width":50,"height":30,"rx":2,"ry":2},"text":{"font-size":10,"text":"rect","fill":"white"}}},{"type":"basic.Rect","position":{"x":300,"y":20},"size":{"width":100,"height":60},"angle":0,"id":"a51f6ea2-e7af-4441-874b-de434ab06bc6","embeds":"","z":1,"attrs":{"rect":{"fill":"#27AE60","width":50,"height":30,"rx":2,"ry":2},"text":{"font-size":10,"text":"rect","fill":"white"}}},{"type":"link","source":{"id":"38f90e3e-041b-4853-ab16-365e74cf87b5"},"target":{"id":"a51f6ea2-e7af-4441-874b-de434ab06bc6"},"id":"177cbd40-a88d-43fe-9653-0b5e399d716e","z":2,"attrs":{}},{"type":"erd.Relationship","size":{"width":80,"height":80},"position":{"x":167,"y":10},"angle":0,"id":"64c4c00e-c359-45eb-aaec-87ffc3afca48","z":3,"attrs":{".outer":{"fill":"#797d9a","stroke":"none","filter":{"name":"dropShadow","args":{"dx":0,"dy":2,"blur":1,"color":"#333333"}}},"text":{"text":"Uses","fill":"#ffffff","letter-spacing":0,"style":{"text-shadow":"1px 0 1px #333333"}}}}]}';
		var content=window.document.getElementById("show");
		
		content.innerHTML=textjson;
		graph.fromJSON(JSON.parse(textjson));
	}
	

      </script>
        
       <!--1111111111111111111111111111111-->
       <!--1111111111111111111111111111111-->
       <!--1111111111111111111111111111111-->
        <script src="gonjs/main2.js"></script>
 






<div style="display:none">
<div id="compute">
    
</div>
<br/>
<br/>
<br/>
<br/>
<br/>
</div>
   <script>
    document.getElementById("top_sid").innerHTML="<?php echo $_SESSION['studentid'];?>";
    document.getElementById("top_name").innerHTML="<?php echo $_SESSION['name'];?>";
    document.getElementById("top_groupid").innerHTML="<?php echo $_SESSION['groupid'];?>";
</script>
   
<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
 <script>
     $(function() {
    $( "#draggable" ).draggable();
  });
     </script>
    </body>
    
<script>
    
    /*
$(document).ready(function() {
	$('.tabs a').bind('click focus',function() {
		var $this = $(this);
		
		// hide panels
		$this.parents('.tabbedPanels')
		    .find('.panel').hide().end()
			.find('.active').removeClass('active');
		    
		// add active state to new tab
		$this.addClass('active').blur();	
		
		// retrieve href from link (is id of panel to display)
		var panel = $this.attr('href');
		// show panel
		$(panel).show();
		// don't follow link
		return false;
	}); // end click
	
	$('.tabs').find('li:first a').click();
}); // end ready*/

</script>

 <script src="startbootstrap-scrolling-nav-gh-pages/js/jquery.easing.min.js"></script>
    <!-- Scrolling Nav JavaScript -->
    <script src="startbootstrap-scrolling-nav-gh-pages/js/scrolling-nav.js"></script>
</html>