<!DOCTYPE html>
<script>
var id=new Array();
var studentid=new Array();
var studentname=new Array();
<?php
include_once ("mydb2.php");
include_once ("myphpfuntion.php");

$str="SELECT * FROM member where id not in(select userid from cluster2_detail) and id!=124";
$member=myquery($str,$link2);
foreach( $member as $now){ 
    /*
                    echo "<tr>";
                    echo "<td>".$now[0]."</td>";
                    echo "<td>".$now[1]."</td>";
                    echo "<td>".$now[2]."</td>";
                    echo "<td>".$now[3]."</td>";
                    echo "<td>".$now[4]."</td>";
                    echo "<td>".$now[5]."</td>";
                    echo "</tr>";
                    */
    echo"id.push('".$now[0]."');";
    echo"studentid.push('".$now[1]."');";
    echo"studentname.push('".$now[2]."');";
                }    
?>
    /*
    for(var i=0;i<studentid.length;i++){
        document.writeln("["+studentid[i]+"]");
    }*/
</script>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.9.3/js/i18n/defaults-*.min.js"></script>

    <title>IIS7</title>
    <style type="text/css">
        .CHOOSE {
            margin: 10px;
        }
        
        .set {
            background-color: #5995A8;
            margin: 20px;
        }
        .masthead {
          background-color:  #f0ad4e;
        }        
        .zeropadding {
            padding-top: 0px;
        }

    </style>
</head>

<body>

    <?php
		include ("top_manage.php");
    ?>

        <div id="container" class="container ">
            <h3>新增組別</h3>
                <hr>
                <div class="form-group">
                   
            <div class="row">
               <div class="col-xs-3">
                    <input class="form-control" id="num" type="text" name="email" size="10" placeholder="請輸入組別個數">
                    </div>
               <div class="col-xs-6">
                    <button id="group" class="btn btn-success ">
                    <span class="glyphicon glyphicon glyphicon-th-large"></span> 產生組別</button>

                    <button id="save" class="btn btn-info">
                    <span class="glyphicon glyphicon-search"></span> 檢查</button>   
                </div>
                    </div>
                </div>
            <div id="block" class="panel panel-default text-center"style="display:none">
                 <div  class="panel-body">
                       <span id="howmuch">
                           
                       </span>
                  </div>
             </div>
           
            <div class="row">
            <div id="work">
                <script>
                    
                    var everynum=new Array();
                    
                    group.onclick = function () {
                        everynum=new Array();
                        var txt = "";
                        for (var i = 0; i < num.value; i++) {
                            
                            txt += '<div  id="set' + i + '" class=" well text-center"> <div class="form-inline"><div class="input-group"><input class="form-control" id="r' + i + '" type="text" name="email"  placeholder="組員個數"><span class="input-group-addon" id="sent" onclick="create(set' + i + ',r' + i + '.value);"><span class="glyphicon glyphicon-user"></span></span></div></div></div>';
                        }
                        document.getElementById("work").innerHTML = txt;
                    }

                    function create(now, n) {
                        everynum.push(n);
                        //alert(n+"~~"+num.value);
                        //document.getElementById("work").innerHTML =num.value;
                        var txt = "";
                        var inn = "";
                        for (var i = 0; i < studentid.length; i++) {
                            inn += '<option value="'+id[i]+'" data-subtext="'+studentname[i]+'">'+studentid[i]+'</option>';
                        }
                        var t="";
                        var plh="";
                        for (var i = 0; i < n; i++) {
                            if(i==0){
                                t=' data-style="btn-primary"';
                                plh="請選擇組長";
                            }else{
                                t='';
                                plh="請選擇組員";
                            }
                            txt += ' <div class="col-xs-4"><select '+ t+'  class="CHOOSE selectpicker" data-live-search="true" id="'+now.id+i+'" title="'+plh+'">' + inn + '</select></div>';
                        //    txt += '</br>';
                        }
                        //alert(txt);
                        now.innerHTML = '<div class="row zeropadding">'+txt+'</div>';
                        $('.selectpicker').selectpicker('render');
                        
                    }
                    var json ;
                    save.onclick = function () {
                        var numt= num.value;//set
                        var txt="";
                        json =new Array();
                        var good=true;
                      //  alert(everynum.length);
                        for(var i=0;i<everynum.length;i++){
                            txt+=everynum[i]+"~~";
                        }
                        //var txt1="";
                        
                        for(var i=0;i<num.value;i++){
                            var head="set"+i;
                            document.getElementById(head).classList.remove("masthead");
                        }
                        
                        var count=0;
                        var totalpeople=0;
                        for(var i=0;i<num.value;i++){//set0
                           // alert(everynum[i]);
                            if(everynum[i]==undefined){
                                continue;
                            }else{
                                count++;
                                totalpeople+=Number(everynum[i]);
                            }
                            var head="set"+i;
                            json[i]=new Array();
                            for(var j=0;j<everynum[i];j++){
                                //txt1+=head+j+"~~";
                                var gg=head+j;
                                if(document.getElementById(gg).value!=""){
                                    json[i][j]=document.getElementById(gg).value;
                                   // txt1+=document.getElementById(gg).value+"~~";
                                }
                                else{
                                    //alert("尚未填寫完畢");
                                     good=false;
                                    json[i]=new Array();
                                    var oldcss=document.getElementById(head).getAttribute("class");
                                    document.getElementById(head).setAttribute( 'class', oldcss+' masthead' );
                                   // document.getElementById(gg).innerHTML;
                                    block.style.display="";

                                    howmuch.innerHTML="第"+(i+1)+"組資料尚未填寫完畢";
                                    break;
                                }
                                
                            }
                           // txt1+="\n";
                        }
                        alert(count+"組,"+totalpeople+"人");
                        //alert(txt1);
                       // alert(JSON.stringify(json));
                        if(count>0&&good){                            
                            var check=new Array();
                            for(var i=0;i<json.length;i++){
                                check=check.concat(json[i]);
                            }
                            var beforen=check.length;
                             //alert(check.length);
                            
                            var temp = {};
                            for (var i = 0; i <  check.length; i++)
                                temp[check[i]] = true;
                            var r = [];
                            for (var k in temp)
                                r.push(k);
                            var aftern=r.length;
                            // alert(r.length);
                           
                            //alert("qq"+json.length);
                            
                            if(beforen==aftern){
                                block.style.display="";
                                howmuch.innerHTML="準備新增"+count+"筆組別資料  ";
                                howmuch.innerHTML+='<button onclick="up();"  id="up" type="button"  class="btn btn-danger" >'+
                                '<span class="glyphicon glyphicon-ok"></span> 新增資料'+
                            '</button>';
                                alert(JSON.stringify(json));
                            }else{ 
                                block.style.display="";
                                howmuch.innerHTML="資料重複,請檢查學生資料";
                            }
                            
                        }
                    }
                   function up () {
                       // alert("good");
                       // alert(JSON.stringify(json));
                       addgroup(JSON.stringify(json));
                       
                    }
                </script>
                
            </div>
            <div class="row">
               <div class="col-xs-12 text-center">
                <button id="save" class="btn btn-danger" onclick='location.href="manage_showgroup.php";' style="margin-button:30px;">
                    <span class="glyphicon glyphicon-th"></span> 觀看組別</button>
                </div>
            </div>
            
            </div>
        </div>

</body>
</html>