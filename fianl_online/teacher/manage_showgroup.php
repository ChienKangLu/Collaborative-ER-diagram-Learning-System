<!doctype html>
   <script>
//var student;
//var group=Array();
var id=new Array();
var studentid=new Array();
var studentname=new Array();
<?php
       
include_once ("mydb2.php");
include_once ("myphpfuntion.php");
       /*
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
       /*
    echo"id.push('".$now[0]."');";
    echo"studentid.push('".$now[1]."');";
    echo"studentname.push('".$now[2]."');";
                }    
       */
/*
//select * from cluster2_detail LEFT join member on cluster2_detail.userid=member.id

$str="select * from cluster2_detail LEFT join member on cluster2_detail.userid=member.id";
$member=myquery2($str,$link2);
       
       
array_walk_recursive($member, function(&$value, $key) {
    if(is_string($value)) {
        $value = urlencode($value);
    }
});

foreach( $member as $now){ 
    echo 'group["'.$now[0].'"]=Array();';
}
echo "student='".urldecode(stripslashes(json_encode($member)))."';";
       */
       
       
       
       
/*
foreach( $member as $now){ 
    for($i=0;$i<count($now)/2;$i++)
        echo $now[$i]." ";
    
   // echo "</br>";
   // echo"id.push('".$now[0]."');";
   // echo"studentid.push('".$now[1]."');";
    echo $now[4];
    echo "</br>";
   // echo"studentname.push('".$now[4]."');";
  }    
  */
?>
</script>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Untitled Document</title>
     <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <link rel="stylesheet" href="mycss/mybreadcrumb.css">
        
        
        
        
        
        <!--<link href="http://libs.baidu.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet">-->
        <!--<script src="http://libs.baidu.com/jquery/2.0.0/jquery.min.js"></script>-->
        <script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
        <script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
        <!--<script src="http://libs.baidu.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>-->
        <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">





<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
        
        
         <!-- Latest compiled and minified CSS -->
<!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.9.3/css/bootstrap-select.min.css">-->

<!-- Latest compiled and minified JavaScript -->
<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.9.3/js/bootstrap-select.min.js"></script>-->
    <link rel="stylesheet" href="borderbtn.css">
        <script src="myajaxfunction.js"></script>
        <style>
.btn-circle {
  width: 30px;
  height: 30px;
  text-align: center;
  padding: 6px;
  font-size: 12px;
  line-height: 1.428571429;
  border-radius: 15px;
}
.display-cell{
    display: table-cell;
    vertical-align: middle;
    float: none;
}
.display-table{
    display: table;
    table-layout: fixed;
    width: 100%;
}

    </style>
</head>

<body>
<!--
   <button type="button" class="mybtn mybtn-primary btn-lg outline" data-toggle="modal" onclick="getgroup();">
  Launch demo modal
</button>

<!--
 <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" onclick="fade();">
  Launch demo modal
</button>
-->
<!--
<div id="myModal">
    123
</div>
-->
<!--
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog " role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">陸建綱</h4>
      </div>
      <div class="modal-body">
            <div class="row text-center">
                <div class="col-md-6"><button class="btn btn-default" type="submit" >移除此人</button>
            </div>
          <div class="col-md-6">
              <div class="col-md-6"><button class="btn btn-default" type="submit" >設定組長</button></div>
          </div>
            </div>
      </div>
      <div class="modal-footer">
      </div>
    </div>
  </div>
</div>
  -->
    <?php
		include ("top_manage.php");
    ?>
        <div id="container" class="container ">
            <h3>分組名單</h3>
                <hr>
            
        </div>
<script>
   // getselectgroup();
    function studentdata(data){
        //alert(data);
        var getdata=JSON.parse(data);
        
        id=new Array();
        studentid=new Array();
        studentname=new Array();
        //id.push(getdata[0]);
        //studentid.push(getdata[1]);
       // studentname.push(getdata[2]);
       // alert(getdata[0]);
       // alert(getdata.length);
        for(var key in getdata){
         //    document.write(getdata[key][0]+"~~"+getdata[key][1]+"~~"+getdata[key][2]+"~~"+"\n"); 
            id.push(getdata[key][0]);
            studentid.push(getdata[key][1]);
            studentname.push(getdata[key][2]);
            /*
            for(var i=0;i<getdata.length;i++){
               document.write("屬性名稱："+ i +" 值： "+getdata[i]+"</br>"); 
            }
            */
        }
       // alert(data);
    }
    getgroup();
       /*
       //alert(getgroupdata());
       var check=1;
        function goorfix(){
            if(check==1){
                $('#myModal').modal('toggle');
                 check=0;
            }else{
                alert("1234");
            }
        }
        */
    function fade(myclass,time){
           // alert(myclass);
            var tt=myclass;
            $("."+tt).fadeToggle(time);
           // $("'."+myclass+"'").fadeToggle(1000);
        }   
     function fade2(myclass){
          //  alert(myclass);
            var tt=myclass;
            $("."+tt).css('display','none'); 
        }   
    function newone(){
        
        return '<button type="button" class="mybtn mybtn-primary btn-lg outline"  onclick=\'location.href="manage_addgroup.php";\' >'+
                    '新增組別'+
                '</button></br></br>';
    }
    function test(){
        alert("good");
    }
    function mystudent(id,name,leader){
        this.id=id;
        this.name=name;
        this.leader=leader;
    }
    /*測試專用
    for(var key in group){
        for(var i=0;i<group[key].length;i++){
            document.write(group[key][i]+"  ");
        }
        document.write("</br>");
    }
    */ 
    function everypeople(style,txt,gid){
        var people='<div class="display-table" style="padding:0px;">'+
                        '<div class="col-xs-4 display-cell text-center">'+
                            '<button class="btn '+style+'" type="submit" onclick=\'fade("a'+txt.id+'",1000);\'>'+txt.name+'</button></br></br>'+
                        '</div>';
                        
                        if(style!="btn-primary"){
                        people+='<div class="a'+txt.id+' col-xs-4 display-cell text-center" style="display: none;">'+
                             '<button class="btn '+style+'" type="submit" onclick="removefromgroup('+gid+','+txt.id+');">'+"移除"+'</button></br></br>'+
                        '</div>'+
                        '<div class="a'+txt.id+' col-xs-4 display-cell text-center" style="display: none;">'+
                             '<button class="btn '+style+'" type="submit" onclick="setgroupleader('+gid+','+txt.id+');">'+"設定組長"+'</button></br></br>'+
                        '</div>';                    
                        }
                        people+='</div>';
        return people;
    }
        function add(gid){//alert('+gid+');//addbtn'+gid+'
        var people= '<button class="addbtn'+gid+' btn btn-default" type="submit" onclick="fade2(\'addbtn'+gid+'\');fade(\'add'+gid+'\',1000);">'+'<sapn class="glyphicon glyphicon-plus"></span>'+'</button>';
        return people;
    }
    function everygroup(mygroupid,myarray){
        var inn="";
        var style;
        //alert(myarray.length);
        for(var i=0;i<myarray.length;i++){
            if(myarray[i].leader==myarray[i].id){
            style="btn-primary";
            }else{
                style="btn-default";
            }
            
             inn+=everypeople( style,myarray[i],mygroupid);
            // inn+=add( style,myarray[i],mygroupid);
        }
        
         var inn2 = "";
                        for (var i = 0; i < studentid.length; i++) {
                            inn2 += '<option value="'+id[i]+'">'+studentid[i]+"  "+studentname[i]+'</option>';
                        }
        
        //btn-default
        var everygroup='<div class="col-md-4">'+
                    '<div class="panel panel-default">'+
                        '<div class="panel-heading">'+ 
                            '<div class="display-table" style="padding:0px;">'+
                                '<div class="col-xs-4 display-cell text-center">'+
                                    '<button class="btn btn-circle btn-danger" onclick="deleteallgroup('+mygroupid+');" ><i class="glyphicon glyphicon-remove"></i></button>'+
                                '</div>'+
                                '<div class="col-xs-4 display-cell text-center">'+
                                    '<span><b><h4>第'+mygroupid+'組</h4></b></span>'+
                                '</div>'+
                                '<div class="col-xs-4 display-cell text-center">'+
                                        // glyphicon glyphicon-pencil glyphicon glyphicon-book
                                    '<button class="btn btn-circle btn-warning"><i class=" glyphicon glyphicon-book"></i></button>'+
                                '</div>'+
                            '</div>'+
                        '</div>'+
                        '<div class="panel-body text-center">'+
                            inn+
                            add(mygroupid)+
                            '<div class="add'+mygroupid+' display-table" style="display: none;padding:0px;">'+
                                '<div class="col-xs-8 col-sm-8 display-cell text-center">'+
                                    '<select class=" CHOOSE selectpicker" id="select'+mygroupid+'" title="選擇組員">' + inn2 + '</select>'+
                                '</div>'+   
                                '<div class="col-xs-4 col-sm-4  display-cell text-center">'+
                                    '<button class="btn btn-default" type="submit"onclick="fade2(\'add'+mygroupid+'\');fade(\'addbtn'+mygroupid+'\',1000);addnewmember('+mygroupid+');">'+"加入"+'</button>'+
                                '</div>'+ 
                                
                            '</div>'+
                        '</div>'+
                    '</div>'+
                '</div>';
        return everygroup;
    }
    function addblock(){
        var everygroup='<div class="col-md-4 col-centered">'+
                            newone()+
                        '</div>';
        return everygroup;
    }
    function everyrow(txt){
         var everyrow='<div class="row">'+
                txt+
            '</div>';
        return everyrow;
    }
    function create(group){
        //RELOAD DATA
        //alert(JSON.stringify(group));
        container.innerHTML="";
        var intxt="";
        var txt="";

        var groupnum=Object.keys(group).length;
        var count=0;
        for(var key in group){
            if(count!=3){

            }else{
                txt+=everyrow(intxt);
                count=0;
                intxt="";
            }

                count++;
           // document.write(key+"</br>");
            if(key!="group"){
                intxt+=everygroup(key,group[key]);//第key組 裡面有group[key]群人
            }else{
                intxt+=addblock(newone());
            }
        }
        txt+=everyrow(intxt);

        container.innerHTML+= txt;
        //$('.selectpicker').selectpicker('render');
        //alert("good");
    }
    function removefromgroup(gid,id){//removemember()
        alert(gid+","+id);
        removemember(gid,id)
        getgroup();
    }
    function setgroupleader(gid,id){//updateclusterleader()
        //alert(gid+","+id);
        updateclusterleader(gid,id);
        getgroup();
    }
    function getselectdata(id) {
        var nowid = "select" + id;
        var sel = document.getElementById(nowid);
        var opts = new Array(),
        opt;
        var len = sel.options.length;
        for (var i = 0; i < len; i++) {
            opt = sel.options[i];
            if (opt.selected) {
                opts.push(opt.value);
            }
        }
        return opts;
    }
    function addnewmember(gid){//addnewmemberdb();
        //alert(id);
        var data=getselectdata(gid);
        //alert(data.length);
        if(data[0]!=""){
            //alert(gid+","+data[0]);
            addnewmemberdb(gid,data);
            
        }else{
            alert("尚未選擇");
        }
    }
    function deleteallgroup(gid){
         deletegroup(gid);
    }
    
//$('.selectpicker').selectpicker('render');
</script>
</body>
</html>