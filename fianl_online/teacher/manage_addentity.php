<!DOCTYPE html>
<script>
    var id = new Array();
    var studentid = new Array();
    var studentname = new Array(); <?php
    include_once("mydb2.php");
    include_once("myphpfuntion.php");
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

    <link rel="stylesheet" href="borderbtn.css">

    <link href="startbootstrap-scrolling-nav-gh-pages/css/scrolling-nav.css" rel="stylesheet">
    <link href="arrowbtn.css" rel="stylesheet">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.9.3/css/bootstrap-select.min.css">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.9.3/js/bootstrap-select.min.js"></script>
    
       <link rel="stylesheet" href="css3-notification-boxes/style2.css">
    

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
            background-color: #f0ad4e;
        }
        
        .zeropadding {
            padding-top: 0px;
        }
        
        .mybtn.outline {
            background: none;
            padding: 4px 10px;
        }
        /*******************/
        
        .btn-sq-lg {
            width: 150px !important;
            height: 150px !important;
        }
        
        .btn-sq {
            width: 100px !important;
            height: 100px !important;
            font-size: 10px;
        }
        
        .btn-sq-sm {
            width: 50px !important;
            height: 50px !important;
            font-size: 10px;
        }
        
        .btn-sq-xs {
            width: 25px !important;
            height: 25px !important;
            padding: 2px;
        }
        
        .fa {
            display: inline-block;
            font-style: normal;
            font-weight: normal;
            line-height: 1;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
            margin-top: 10px;
        }
        
        .fa-5x {
            font-size: 5em;
        }
        
        .topbtn div {
            padding-top: 1px;
            padding-bottom: 1px;
            padding-right: 1px;
            padding-left: 1px;
        }
        
        .hiderow {
            display: none;
        }
        
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
    <!--style="overflow-y:scroll;"-->

    <!--<button type="button" class="btn btn-danger btn-arrow-right">Danger1</button>-->
    <?php include ( "top_manage.php"); ?>

    <div id="container" class="container ">
        <div class="row topbtn">
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6 text-center">
                <a href="#topup" class="btn btn-sq-lg btn-primary page-scroll" onclick="changemode(0);">
                    <span class="fa fa-5x glyphicon glyphicon-user"></span></br>
                    Add
                    <br>Entity
                </a>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6 text-center">
                <a href="#" class="btn btn-sq-lg btn-primary" onclick="changemode(1);">
                    <span class="fa fa-5x glyphicon glyphicon-link"></span></br>
                    Add
                    <br>Relation
                </a>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6 text-center">
                <a href="#" class="btn btn-sq-lg btn-primary" onclick="changemode(2);">
                    <span class="fa fa-5x glyphicon glyphicon-pushpin"></span></br>
                    Add
                    <br>Cardinary
                </a>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6 text-center">
                <a href="#" class="btn btn-sq-lg btn-primary" onclick="changemode(3);">
                    <span class="fa fa-5x glyphicon glyphicon-list-alt"></span></br>
                    Add
                    <br>Question
                </a>
            </div>
        </div>
        <!--
            <h3>新增實體</h3>-->

        <div id="topup"></div>
        <hr>
        <div class="form-group">

            <div class="row" style="padding-left:10px;">
                <!--border:1px solid-->
                <div class="col-xs-4" style="">
                    <input class="form-control" id="num" type="text" name="email" size="10" placeholder="新增實體個數">
                </div>
                <div class="col-xs-8" style="">
                    <button id="group" class="btn btn-success ">
                        <span class="glyphicon glyphicon glyphicon-th-large"></span> 產生實體</button>

                    <button id="save" class="btn btn-info">
                        <span class="glyphicon glyphicon-ok"></span> 新增</button>
                </div>

                <div class="col-xs-3">
                </div>
            </div>
            <div id="block" class="panel panel-default text-center" style="display:none">
                <div class="panel-body">
                    <span id="howmuch">
                           
                       </span>
                </div>
            </div>

            <div class="row">
                <div id="work">

                </div>
                <div id="workques" class="hiderow">
                    <div class=" well text-center zeropadding">
                        <div class="row">
                            <div class="col-md-6">
                                <!--col-md-6 col-md-offset-3-->
                                <div class="form-horizontal">
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">題目名稱</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" id="title" placeholder="請輸入題目名稱">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">提示</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" id="tip" placeholder="請輸入提示">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">請輸入題目內容</label>
                                        <div class="col-sm-10">
                                            <textarea class="form-control" id="content" rows="3" placeholder="請輸入內容"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">實體</label>
                                        <select id="select0" class="selectpicker" multiple>
                                            <!--data-max-options="2"-->
                                            <option value="1" data-subtext="">Mustard</option>
                                            <option value="2">Ketchup</option>
                                            <option value="3">Relish</option>

                                            <option value="4" data-subtext="">Mustard</option>
                                            <option value="5">Ketchup</option>
                                            <option value="6">Relish</option>

                                            <option value="7" data-subtext="">Mustard</option>
                                            <option value="8">Ketchup</option>
                                            <option value="9">Relish</option>
                                        </select>
                                        <button class="btn btn-default " type="submit" onclick="getSelectedOptions('0')">Show</button>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">關聯</label>
                                        <select id="select1" class="selectpicker" multiple>
                                            <option value="1">Mustard</option>
                                            <option value="2">Ketchup</option>
                                            <option value="3">Relish</option>
                                        </select>
                                        <button class="btn btn-default" type="submit" onclick="getSelectedOptions('1')">Show</button>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">限制</label>
                                        <select id="select2" class="selectpicker" multiple>
                                            <!--data-max-options="2"-->
                                            <option value="1">Mustard</option>
                                            <option value="2">Ketchup</option>
                                            <option value="3">Relish</option>
                                        </select>
                                        <button class="btn btn-default" type="submit" onclick="getSelectedOptions('2')">Show</button>
                                    </div>
                                    <div class="form-group">
                                        <button id="saveques" type="button" class="btn btn-primary btn-lg btn2">新增問題</button>
                                    </div>
                                </div>
                                </br>
                                </br>
                            </div>
                            <div class="col-md-6">
                                <!--col-md-6 col-md-offset-3-->
                                <div id="quespanel0" class="well text-center zeropadding">
                                </div>
                                <div id="quespanel1" class="well text-center zeropadding">
                                </div>
                                <div id="quespanel2" class="well text-center zeropadding">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <hr>
                <script>
                    function sethtml(inn) {
                        var txt;
                        txt = '<div   class=" well text-center zeropadding">' +
                            inn +
                            '</div>';
                        return txt;
                    }

                    function entity(i, v) {
                        var txt;
                        txt = '<div class="form-inline" style="margin:5px;">' +
                            '<input value="' + v + '" id="entity' + i + '" class="form-control"  type="text" name="email"  placeholder="' + mode[nowmode] + i + '" size="3">' +
                            '</div>';
                        return txt;
                    }

                    function row(inn) {
                        var txt;
                        txt = '<div class="row">' +
                            inn +
                            '</div>';
                        return txt;
                    }

                    function col(inn) {
                        var txt;
                        txt = '<div class="col-md-2" >' +
                            inn +
                            '</div>';
                        return txt;
                    }

                    function newone() {
                        return '<button type="button" class="mybtn mybtn-primary btn-lg outline"  onclick="addentity();" style="margin:5px;" >' +
                            '<span class="glyphicon glyphicon-plus"></span>' +
                            '</button></br></br>';
                    }

                    function newone2() {

                        return '<div class="row">' +
                            '<div class="col-md-6 col-md-offset-3" >' +
                            '<div class="form-horizontal">' +
                            '<div class="form-group">' +
                            '<label class="col-sm-2 control-label">題目名稱</label>' +
                            '<div class="col-sm-10">' +
                            '<input class="form-control" id="inputEmail3" placeholder="請輸入題目名稱">' +
                            '</div>' +
                            '</div>' +
                            '<div class="form-group">' +
                            '<label class="col-sm-2 control-label">提示</label>' +
                            '<div class="col-sm-10">' +
                            '<input class="form-control" id="inputPassword3" placeholder="請輸入提示">' +
                            '</div>' +
                            '</div>' +
                            '<div class="form-group">' +
                            '<label for="inputPassword3" class="col-sm-2 control-label">請輸入題目內容</label>' +
                            '<div class="col-sm-10">' +
                            '<textarea class="form-control" rows="3" placeholder="請輸入內容"></textarea>' +
                            '</div>' +
                            '</div>' +



                            /*
                                          '<div class="form-group">'+
                                            '<div class="col-sm-offset-2 col-sm-10">'+
                                              '<div class="checkbox">'+
                                                '<label>'+
                                                  '<input type="checkbox"> Remember me'+
                                                '</label>'+
                                              '</div>'+
                                            '</div>'+
                                          '</div>'+
                                          '<div class="form-group">'+
                                            '<div class="col-sm-offset-2 col-sm-10">'+
                                              '<button type="submit" class="btn btn-default">Sign in</button>'+
                                            '</div>'+
                                          '</div>'+
                            */
                            '</div>' +
                            '</br></br>' +
                            '</div>' +
                            '</div>';

                    }
                    var old = 0;
                    var mode = new Array("實體", "關聯", "限制", "問題");
                    var nowmode = 0;

                    function changemode(id) {
                        $("#workques").addClass("hiderow");
                        nowmode = id;
                        // alert(nowmode);
                        old = 0;
                        document.getElementById("work").innerHTML = ""; //清空區塊
                        group.innerHTML = '<span class="glyphicon glyphicon glyphicon-th-large"></span> 產生' + mode[id];
                        num.value = "";
                        $("#num").attr("placeholder", "新增" + mode[nowmode] + "個數");
                        if (nowmode != 3) {
                            group.disabled = false;
                            save.disabled = false;
                        } else {
                            group.disabled = true;
                            save.disabled = true;
                            selectallentity(); //資料庫撈取
                            initialpanel();
                        }
                    }

                    function addentity() {
                        var temp = new Array();
                        for (var i = 0; i < old; i++) {
                            var now = "entity" + (i + 1);
                            temp.push((document.getElementById(now)).value);
                        }
                        //alert(JSON.stringify(temp));
                        old = Number(old) + 1;
                        build(old, temp);
                    }
                    group.onclick = function() {
                        if (nowmode != 3) {
                            build(num.value, new Array());
                        } else {
                            //build2(num.value,new Array());
                        }
                    }

                    function build(num, oldvalue) {
                        var out = "";
                        var inn = "";
                        var count = 0;
                        for (var i = 0; i < (Number(num) + 1); i++) {
                            if (count >= 6) {
                                out += row(inn);
                                inn = "";
                                count = 0;
                            }

                            if (i == num) {
                                inn += col(newone());
                            } else {
                                var value = oldvalue[i];
                                if (value == undefined) {
                                    value = "";
                                }
                                inn += col(entity((i + 1), value));
                            }
                            count++;
                        }
                        out += row(inn);
                        document.getElementById("work").innerHTML = sethtml(out);
                        old = num;
                    }

                    function option(value, name) {
                        var txt;
                        txt = '<option value="' + value + '" data-subtext="">' + name + '</option>';
                        return txt;
                    }

                    function build2(data) {

                        //alert(data[0][0][1]);
                        /*
                        var out = "";
                        var inn = "";
                        var count=0;
                        for (var i = 0; i < (Number(num)+1); i++) {
                            if(count>=6){
                                out+=row(inn);
                                inn="";
                                count=0;
                            }
                            
                            if(i==num){
                                inn+=col(newone2());   
                            }else{
                                var value=oldvalue[i];
                                if(value==undefined){
                                    value="";
                                }
                            inn+=col(entity((i+1),value));
                            }
                            count++;
                        }
                        out+=row(inn);
                        */
                        //document.getElementById("work").innerHTML =sethtml(newone2());
                        document.getElementById("work").innerHTML = "";
                        $("#workques").removeClass("hiderow");

                        var optionarray = new Array();

                        for (var key in data) {
                            var nowtxt = "";
                            //document.write(data[key].length+"</br>");
                            for (var key2 in data[key]) {
                                nowtxt += option(data[key][key2][0], data[key][key2][1]);
                                //document.write(option(data[key][key2][0],data[key][key2][1]));
                            }
                            optionarray.push(nowtxt);
                        }


                        $("#select0").html(optionarray[0]).selectpicker('refresh'); //'<option>city1</option><option>city2</option>'

                        $("#select1").html(optionarray[1]).selectpicker('refresh');

                        $("#select2").html(optionarray[2]).selectpicker('refresh');
                        //old=num;
                    }

                    function GUIbtn(i, txt, tag, id) { //i:css,txt:內容,slectid:which select,tagid
                        var txt;
                        var types;
                        if (i == 0) {
                            types = "btn-danger"; //
                        } else if (i == 1) {
                            types = "btn-warning";
                        } else if (i == 2) {
                            types = "btn-info";
                        }
                        txt = '<button onclick="removeselect(' + i + ',' + id + ');" type="button" class="btn ' + types + ' btn-arrow-right">' + '<span class="glyphicon glyphicon-remove"></span>  ' + txt + '</button>';

                        return txt;
                    }

                    function GUIcol(inn) {
                        var txt = '<div class="col-sm-3 col-xs-3" style="margin:15px;">' +
                            inn +
                            '</div>';
                        return txt;
                    }

                    function GUIrow(inn) {
                        var txt = '<div class="row">' +
                            inn +
                            '</div>';
                        return txt;
                    }


                    function showGUI(i, tags) { //which  quespanel
                        var nowid = "quespanel" + i;
                        var txt = "";
                        var inn = "";
                        var count = 0;
                        for (var j = 0; j < tags.length; j++) {
                            /*
                            if(count>=4){
                                txt += GUIrow(inn);
                                inn="";
                                count=0;
                            }
                            */
                            inn += GUIcol(GUIbtn(i, tags[j].name, tags[j].tag, tags[j].id));
                            count++;
                        }
                        txt += GUIrow(inn);

                        document.getElementById(nowid).innerHTML = txt;
                        ////取消
                        /*
                             <div class="well text-center zeropadding">
                                    <div class="row">
                                          <div class="col-sm-3 ">
                                              <button type="button" class="btn btn-danger btn-arrow-right">Danger1</button>
                                          </div>
                                          <div class="col-sm-3 ">
                                              <button type="button" class="btn btn-danger btn-arrow-right">Danger1</button>
                                          </div>
                                          <div class="col-sm-3 ">
                                              <button type="button" class="btn btn-danger btn-arrow-right">Danger1</button>
                                          </div>
                                          <div class="col-sm-3 ">
                                              <button type="button" class="btn btn-danger btn-arrow-right">Danger1</button>
                                          </div>
                                    </div>
                              </div>
                        */

                    }

                    function removeselect(i, tagid) {
                        var selectid = "select" + i;
                        var sel = document.getElementById(selectid);
                        var opt = sel.options[tagid];
                        opt.selected = false;
                        $('.selectpicker').selectpicker('render');
                        // alert(i);
                        getSelectedOptions(i);
                    }

                    function create(now, n) {


                    }
                    var json;
                    save.onclick = function() {
                        // alert(old);
                        //alert(nowmode);
                        var data = new Array();
                        for (var i = 0; i < old; i++) {
                            var now = "entity" + (i + 1);
                            var txt = (document.getElementById(now)).value;
                            data.push(txt);
                            //document.write(now+"</br>");
                        }
                        //alert(JSON.stringify(data));
                        saveunit(JSON.stringify(data), nowmode);
                        document.getElementById("work").innerHTML = ""; //清空區塊
                    }

                    function up() {

                    }

                    function getSelectedOptions(id) {
                        function tag(id, tag, name) {
                            this.id = id
                            this.tag = tag;
                            this.name = name;
                        }
                        //var e = document.getElementById(id);
                        //var strUser = e.options[e.selectedIndex].value;
                        var nowid = "select" + id;
                        var sel = document.getElementById(nowid);
                        var opts = new Array(),
                            opt;
                        var len = sel.options.length;
                        for (var i = 0; i < len; i++) {
                            opt = sel.options[i];

                            if (opt.selected) {
                                //opts.push(opt.value);

                                // opts.push(opt.innerHTML);
                                opts.push(new tag(i, opt.value, opt.innerHTML));
                                // opt.selected = false;

                            }
                        }
                        //  $('.selectpicker').selectpicker('render');
                        //  alert(JSON.stringify(opts));
                        showGUI(id, opts);
                    }

                    function initialpanel() {
                        //alert("clear start");
                        document.getElementById("quespanel0").innerHTML = "";
                        document.getElementById("quespanel1").innerHTML = "";
                        document.getElementById("quespanel2").innerHTML = "";
                        document.getElementById("title").value = "";
                        document.getElementById("tip").value = "";
                        document.getElementById("content").value = "";
                        $("#select0").html("").selectpicker('refresh'); //'<option>city1</option><option>city2</option>'

                        $("#select1").html("").selectpicker('refresh');

                        $("#select2").html("").selectpicker('refresh');
                        //alert("clear end");
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
                    saveques.onclick = function() {
                        var title = document.getElementById("title").value;
                       // alert(title);
                        var tip = document.getElementById("tip").value;
                       // alert(tip);
                        var content = document.getElementById("content").value;
                       // alert(content);
                        var data1 = getselectdata(0);
                       // alert(data1);
                        var data2 = getselectdata(1);
                       // alert(data2);
                        var data3 = getselectdata(2);
                       // alert(data3);
                        
                        if (title == "" || tip == "" || content == "" || getselectdata(0).length == 0 || getselectdata(1).length == 0 || getselectdata(2).length == 0) {
                            //alert("gg");
                            
                            $("#txt").fadeIn().delay(5000).fadeOut();
                            txt.innerHTML=goodOrBad(0,"新增問題失敗");
                        } else {
                            // alert("saveques");
                            $("#txt").fadeIn().delay(5000).fadeOut();
                            txt.innerHTML=goodOrBad(1,"成功新增問題");
                            selectallentity(); //資料庫撈取
                            initialpanel();
                            var json={};
                            json["title"]=title;
                            json["tip"]=tip;
                            json["content"]=content;
                            json["data1"]=data1;
                            json["data2"]=data2;
                            json["data3"]=data3;
                            var jsondata=JSON.stringify(json);
                            //alert(JSON.stringify(json));
                            savequesdb(jsondata);
                        }
                    }


                </script>

            </div>

</body>

<script src="startbootstrap-scrolling-nav-gh-pages/js/jquery.easing.min.js"></script>
<!-- Scrolling Nav JavaScript -->
<script src="startbootstrap-scrolling-nav-gh-pages/js/scrolling-nav.js"></script>

</html>