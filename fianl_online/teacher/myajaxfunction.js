function logout(id) {//登出
   // alert("123");
    var params="id="+id;
    var request=new XMLHttpRequest();
    request.open("POST","logout.php",true);
    request.setRequestHeader("Content-type","application/x-www-form-urlencoded");
   // request.setRequestHeader("Content-length",params.length);
   // request.setRequestHeader("Connection","close");
    request.onreadystatechange=function(){
        if(request.readyState==4){
            if(request.status==200){
                if(request.responseText!=null){
                   // alert(request.responseText);
                    //document.getElementById('info').innerHTML=request.responseText;
                    
                                
                    location.href='login.php';
                }
                else{
                    alert("ajax error:no data recieved");
                }
            }
            else{
                alert("ajax errorlogout:"+request.statusText);
            }
        }
    }
    request.send(params);
}

function savetodb(jsontext,id,quesid,entity_name) {//`id`,`quesid`,`datetime`,`jsontext`,`matrix` ,id,quesid,maxtix//存圖
   // alert(jsontext+""+id+""+quesid+""+maxtix);
    
    //alert(jsontext);
    var str1=show(jsontext);
    //document.write(JSON.stringify(str1));
   // alert(str1.rel.length);
    
    if(str1.rel.length>0){
        var matrix1=to2dmatrix(str1,entity_name);//轉為矩正
        var myjsonshow=JSON.stringify(matrix1);
        var myjsonshow2=JSON.stringify(entity_name);
        var matrix = myjsonshow;
        //alert(myjsonshow);
        //alert(myjsonshow2);
        // window.open('newwindows.php?text='+13+'&entity='+12, 'test', config='height=500,width=500');                
        window.open('newwindows.php?text='+myjsonshow+'&entity='+myjsonshow2, 'test', config='height=500,width=500');




        var params="jsontext="+jsontext+"&id="+id+"&quesid="+quesid+"&matrix="+matrix;
        var request=new XMLHttpRequest();
        request.open("POST","savetodb.php",true);
        request.setRequestHeader("Content-type","application/x-www-form-urlencoded");
   //     request.setRequestHeader("Content-length",params.length);
   //     request.setRequestHeader("Connection","close");
        request.onreadystatechange=function(){
            if(request.readyState==4){
                if(request.status==200){
                    if(request.responseText!=null){

                       reloadlist(id);

                    }
                    else{
                        alert("ajax error:no data recieved");
                    }
                }
                else{
                    alert("ajax error:"+request.statusText);
                }
            }
        }
        request.send(params);
    }else{
        alert("作圖錯誤")
    }
    
}
function getjson(id,quesid) {//id quesid
   // alert(jsontext+""+id+""+quesid+""+maxtix);
    
    var params="id="+id+"&quesid="+quesid;
    var request=new XMLHttpRequest();
    request.open("POST","getjson.php",true);
    request.setRequestHeader("Content-type","application/x-www-form-urlencoded");
 //   request.setRequestHeader("Content-length",params.length);
 //   request.setRequestHeader("Connection","close");
    request.onreadystatechange=function(){
        if(request.readyState==4){
            if(request.status==200){
                if(request.responseText!=null){
                  // alert(request.responseText);
                    fromjson2(request.responseText);
                }
                else{
                    alert("ajax error:no data recieved");
                }
            }
            else{
                alert("ajax error:"+request.statusText);
            }
        }
    }
    request.send(params);
}

function getmyjson(id) {//id quesid
    //alert(id);
    var params="id="+id;
    var request=new XMLHttpRequest();
    request.open("POST","getmyjson.php",true);
    request.setRequestHeader("Content-type","application/x-www-form-urlencoded");
  //  request.setRequestHeader("Content-length",params.length);
  //  request.setRequestHeader("Connection","close");
    request.onreadystatechange=function(){
        if(request.readyState==4){
            if(request.status==200){
                if(request.responseText!=null){
                    //alert("'"+request.responseText+"'");
                    
                    fromjson(request.responseText);
                }
                else{
                    alert("ajax error:no data recieved");
                }
            }
            else{
                alert("ajax error:"+request.statusText);
            }
        }
    }
    request.send(params);
}

function reloadlist(id) {//id quesid
    //alert(id);
    
    var params="id="+id;
    var request=new XMLHttpRequest();
    request.open("POST","reloadlist.php",true);
    request.setRequestHeader("Content-type","application/x-www-form-urlencoded");
  //  request.setRequestHeader("Content-length",params.length);
  //  request.setRequestHeader("Connection","close");
    request.onreadystatechange=function(){
        if(request.readyState==4){
            if(request.status==200){
                if(request.responseText!=null){
                   // alert(request.responseText);
                    mylist.innerHTML=request.responseText;
                }
                else{
                    alert("ajax error:no data recieved");
                }
            }
            else{
                alert("ajax error:"+request.statusText);
            }
        }
    }
    request.send(params);
}

function uploadfile(id,file) {//id quesid
    //alert(id);
    var formData = new FormData();
    //alert("載入"+file[0].name);
    //alert(file[0]);
    var request=new XMLHttpRequest();
    
    var formData = new FormData();
    
    formData.append('myfile', file[0]);
    
    request.open("POST","uploadfile.php",true);
    //request.setRequestHeader("Content-type","false");
    
    
    
   // request.setRequestHeader("Content-length",params.length);
    request.setRequestHeader("Connection","close");
    request.onreadystatechange=function(){
        if(request.readyState==4){
            if(request.status==200){
                if(request.responseText!=null){
                   // alert(request.responseText);
                    //textgg.innerHTML=request.responseText;
                    var tt=JSON.parse(request.responseText);
                    show3.innerHTML+=tt.show;
                    textgg.innerHTML=request.responseText;
                    block.style.display="";
                    up.style.display="";
                    //alert(tt.value.length);
                    howmuch.innerHTML="準備新增"+tt.value.length+"筆學生資料";
                   // alert(tt.value);
                    //mylist.innerHTML=request.responseText;
                }
                else{
                    alert("ajax error:no data recieved");
                }
            }
            else{
                alert("ajax error:"+request.statusText);
            }
        }
    }
    //alert(formData.get(0));
    request.send(formData);
}

function addstudent(jsontext) {//登出
   // alert("123");
    var params="jsontext="+jsontext;
    var request=new XMLHttpRequest();
    request.open("POST","addstudent.php",true);
    request.setRequestHeader("Content-type","application/x-www-form-urlencoded");
  //  request.setRequestHeader("Content-length",params.length);
  //  request.setRequestHeader("Connection","close");
    request.onreadystatechange=function(){
        if(request.readyState==4){
            if(request.status==200){
                if(request.responseText!=null){
                    alert(request.responseText);
                    //document.getElementById('info').innerHTML=request.responseText;
                    //location.href='login.php';
                }
                else{
                    alert("ajax error:no data recieved");
                }
            }
            else{
                alert("ajax error:"+request.statusText);
            }
        }
    }
    request.send(params);
}

function addgroup(jsontext) {//登出
   // alert("123");
    var params="jsontext="+jsontext;
    var request=new XMLHttpRequest();
    request.open("POST","addgroup.php",true);
    request.setRequestHeader("Content-type","application/x-www-form-urlencoded");
 //   request.setRequestHeader("Content-length",params.length);
 //   request.setRequestHeader("Connection","close");
    request.onreadystatechange=function(){
        if(request.readyState==4){
            if(request.status==200){
                if(request.responseText!=null){
                    alert(request.responseText);
                    location.reload();
                    //document.getElementById('info').innerHTML=request.responseText;
                    //location.href='login.php';
                }
                else{
                    alert("ajax error:no data recieved");
                }
            }
            else{
                alert("ajax error:"+request.statusText);
            }
        }
    }
    request.send(params);
}

var groupdata;
function getgroup() {//登出
  // alert("123");
    getselectgroup();
    var txt;
    var params="";
    var request=new XMLHttpRequest();
    request.open("POST","getgroup.php",true);
    request.setRequestHeader("Content-type","application/x-www-form-urlencoded");
  //  request.setRequestHeader("Content-length",params.length);
  //  request.setRequestHeader("Connection","close");
    request.onreadystatechange=function(){
        if(request.readyState==4){
            if(request.status==200){
                if(request.responseText!=null){
                    
                    var group=Array();
                    //alert("456");
                    //alert(request.responseText);
                    groupdata=request.responseText;
                    var arraystudent = JSON.parse(groupdata);
                   // alert( arraystudent);
                    
                    for (var i = 0; i < arraystudent.length+1; i++) {
                        if(i!=arraystudent.length)
                            group[arraystudent[i][0]]=Array();
                        else{
                            group["group"]=Array();
                        }
                    }
                    for (var i = 0; i < arraystudent.length+1; i++) {
                        if(i!=arraystudent.length){
                        group[arraystudent[i][0]][group[arraystudent[i][0]].length] = new mystudent(arraystudent[i][2], arraystudent[i][4], arraystudent[i][8]); //2id 4name  arraystudent[i][2]

                         //document.write(group[arraystudent[i][0]][group[arraystudent[i][0]].length-1].id+"~"+group[arraystudent[i][0]][group[arraystudent[i][0]].length-1].name);
                         //document.write("</br>");
                        }else{
                            group["group"][0] = "嘻嘻";
                            //document.write(group["group"][0]);
                         //document.write("</br>");
                        }
                    }
                    create(group);
                    //document.getElementById('info').innerHTML=request.responseText;
                    //location.href='login.php';
                }
                else{
                    alert("ajax error:no data recieved");
                }
            }
            else{
                alert("ajax error:"+request.statusText);
            }
        }
    }
   // request.send(params);
    request.send();
}
function mytestwrite(txt){
    if(false){
        document.write(txt);
    }
}
function getallgroupic(ques) {    
    //alert("good");
    var params="ques="+ques;
    var request=new XMLHttpRequest();
    request.open("POST","getallgroupic.php",true);
    request.setRequestHeader("Content-type","application/x-www-form-urlencoded");
  //  request.setRequestHeader("Content-length",params.length);
  //  request.setRequestHeader("Connection","close");
    request.onreadystatechange=function(){
        if(request.readyState==4){
            if(request.status==200){
                if(request.responseText!=null){
                    
                    var group=Array();
                    var groupdata=request.responseText;
                    //alert(groupdata);
                    
                    //document.write(request.responseText);
                    var arraystudent = JSON.parse(groupdata);
                    var txt="";
                    //alert(Object.keys(arraystudent).length);
                   // alert(arraystudent["1"][0]["name"]);
                    for(var key in arraystudent){ 
                        var groupnumber=arraystudent[key].length;
                        mytestwrite(key+"--->");
                        txt+=panel_head(key);
                        var out="";
                        var inn="";
                        var count=0;
                        for(var i=0;i<groupnumber+1;i++){
                            if(i!=groupnumber){
                                var pic="";
                                ///////////////////////
                                mytestwrite(arraystudent[key][i]["name"]);
                                var picnum=arraystudent[key][i]["pic"].length;
                                mytestwrite("("+picnum+")");
                                if(picnum>0){
                                    for(var t=0;t<picnum;t++){
                                        //document.write("("+arraystudent[key][i]["pic"][t].json+")");
                                        mytestwrite("("+arraystudent[key][i]["pic"][t].id+")");
                                        pic+=showpic(arraystudent[key][i]["pic"][t].id,arraystudent[key][i]["pic"][t].json);
                                    }
                                }
                                ///////////////////////
                                if(count==3){
                                    out+=row(inn);
                                    inn="";
                                }
                                //inn+=column( arraystudent[key][i]["name"]);
                                inn+=column( everyperson(arraystudent[key][i]["name"],key,i,pic));
                            }else{
                                inn+=column(colab("共識",key));
                            }
                        }
                        txt+=panel_collapse(inn,key);
                        mytestwrite("</br>");
                    }
                    
                    //finalshow.innerHTML=panel(panel_head(1)+panel_collapse("hi~",1)+panel_head(2)+panel_collapse("hi~",2));
                    finalshow.innerHTML=panel(txt);
                }
                else{
                    alert("ajax error:no data recieved");
                }
            }
            else{
                alert("ajax error:"+request.statusText);
            }
        }
    }
    request.send(params);
    //request.send();
}
function selectallentity(id) {//id quesid
    //alert(id);
    
   // var params="id="+id;
    var request=new XMLHttpRequest();
    request.open("POST","selectallentity.php",true);
    request.setRequestHeader("Content-type","application/x-www-form-urlencoded");
  //  request.setRequestHeader("Content-length",params.length);
  //  request.setRequestHeader("Connection","close");
    request.onreadystatechange=function(){
        if(request.readyState==4){
            if(request.status==200){
                if(request.responseText!=null){
                     //alert(request.responseText);
                     var data = JSON.parse(request.responseText);
                     //alert(data[0][0][1]);
                     build2(data,id);

                }
                else{
                    alert("ajax error:no data recieved");
                }
            }
            else{
                alert("ajax error:"+request.statusText);
            }
        }
    }
   // request.send(params);
    request.send();
}
function saveunit(jsontext,nowmode) {//登出
   // alert("123");
    var params="jsontext="+jsontext+"&nowmode="+nowmode;
    var request=new XMLHttpRequest();
    request.open("POST","saveunit.php",true);
    request.setRequestHeader("Content-type","application/x-www-form-urlencoded");
 //   request.setRequestHeader("Content-length",params.length);
 //   request.setRequestHeader("Connection","close");
    request.onreadystatechange=function(){
        if(request.readyState==4){
            if(request.status==200){
                if(request.responseText!=null){
                    alert(request.responseText);
                    //document.getElementById("work").innerHTML = ""; //清空區塊
                    //document.getElementById('info').innerHTML=request.responseText;
                    //location.href='login.php';
                }
                else{
                    alert("ajax error:no data recieved");
                }
            }
            else{
                alert("ajax error:"+request.statusText);
            }
        }
    }
    request.send(params);
}
function savequesdb(jsontext) {//登出
   // alert("123");
    var params="jsontext="+jsontext;
    var request=new XMLHttpRequest();
    request.open("POST","savequesdb.php",true);
    request.setRequestHeader("Content-type","application/x-www-form-urlencoded");
 //   request.setRequestHeader("Content-length",params.length);
 //   request.setRequestHeader("Connection","close");
    request.onreadystatechange=function(){
        if(request.readyState==4){
            if(request.status==200){
                if(request.responseText!=null){
                    //alert(request.responseText);
                    //document.getElementById("work").innerHTML = ""; //清空區塊
                    //document.getElementById('info').innerHTML=request.responseText;
                    //location.href='login.php';
                }
                else{
                    alert("ajax error:no data recieved");
                }
            }
            else{
                alert("ajax error:"+request.statusText);
            }
        }
    }
    request.send(params);
}
function removemember(gid,id) {//登出
   // alert("123");
    var params="gid="+gid+"&id="+id;
    var request=new XMLHttpRequest();
    request.open("POST","removemember.php",true);
    request.setRequestHeader("Content-type","application/x-www-form-urlencoded");
 //   request.setRequestHeader("Content-length",params.length);
 //   request.setRequestHeader("Connection","close");
    request.onreadystatechange=function(){
        if(request.readyState==4){
            if(request.status==200){
                if(request.responseText!=null){
                    //alert(request.responseText);
                    getgroup();
                    //document.getElementById("work").innerHTML = ""; //清空區塊
                    //document.getElementById('info').innerHTML=request.responseText;
                    //location.href='login.php';
                }
                else{
                    alert("ajax error:no data recieved");
                }
            }
            else{
                alert("ajax error:"+request.statusText);
            }
        }
    }
    request.send(params);
}
function updateclusterleader(gid,id) {//登出addnewmember
   // alert("123");
    var params="gid="+gid+"&id="+id;
    var request=new XMLHttpRequest();
    request.open("POST","updateclusterleader.php",true);
    request.setRequestHeader("Content-type","application/x-www-form-urlencoded");
 //   request.setRequestHeader("Content-length",params.length);
 //   request.setRequestHeader("Connection","close");
    request.onreadystatechange=function(){
        if(request.readyState==4){
            if(request.status==200){
                if(request.responseText!=null){
                    //alert(request.responseText);
                    getgroup();
                    //document.getElementById("work").innerHTML = ""; //清空區塊
                    //document.getElementById('info').innerHTML=request.responseText;
                    //location.href='login.php';
                }
                else{
                    alert("ajax error:no data recieved");
                }
            }
            else{
                alert("ajax error:"+request.statusText);
            }
        }
    }
    request.send(params);
}
function addnewmemberdb(gid,id) {//登出
   // alert("123");
    var params="gid="+gid+"&id="+id;
    var request=new XMLHttpRequest();
    request.open("POST","addnewmemberdb.php",true);
    request.setRequestHeader("Content-type","application/x-www-form-urlencoded");
 //   request.setRequestHeader("Content-length",params.length);
 //   request.setRequestHeader("Connection","close");
    request.onreadystatechange=function(){
        if(request.readyState==4){
            if(request.status==200){
                if(request.responseText!=null){                    
                    getgroup();
                    //alert(request.responseText);
                    //document.getElementById("work").innerHTML = ""; //清空區塊
                    //document.getElementById('info').innerHTML=request.responseText;
                    //location.href='login.php';
                }
                else{
                    alert("ajax error:no data recieved");
                }
            }
            else{
                alert("ajax error:"+request.statusText);
            }
        }
    }
    request.send(params);
}
function getselectgroup() {//登出
   // alert("123");
    //var params="gid="+gid+"&id="+id;
    var request=new XMLHttpRequest();
    request.open("POST","getselectgroup.php",true);
    request.setRequestHeader("Content-type","application/x-www-form-urlencoded");
 //   request.setRequestHeader("Content-length",params.length);
 //   request.setRequestHeader("Connection","close");
    request.onreadystatechange=function(){
        if(request.readyState==4){
            if(request.status==200){
                if(request.responseText!=null){                    
                    //getgroup();
                    //alert(request.responseText);
                   studentdata(request.responseText);
                    //document.getElementById("work").innerHTML = ""; //清空區塊
                    //document.getElementById('info').innerHTML=request.responseText;
                    //location.href='login.php';
                }
                else{
                    alert("ajax error:no data recieved");
                }
            }
            else{
                alert("ajax error:"+request.statusText);
            }
        }
    }
    //request.send(params);
    request.send();
}
function deletegroup(gid) {//登出
   // alert(gid);
    var params="gid="+gid;
    var request=new XMLHttpRequest();
    request.open("POST","deletegroup.php",true);
    request.setRequestHeader("Content-type","application/x-www-form-urlencoded");
 //   request.setRequestHeader("Content-length",params.length);
 //   request.setRequestHeader("Connection","close");
    request.onreadystatechange=function(){
        if(request.readyState==4){
            if(request.status==200){
                if(request.responseText!=null){                    
                    //getgroup();
                   // alert(request.responseText);
                    getgroup();
                    //studentdata(request.responseText);
                    //document.getElementById("work").innerHTML = ""; //清空區塊
                    //document.getElementById('info').innerHTML=request.responseText;
                    //location.href='login.php';
                }
                else{
                    alert("ajax error:no data recieved");
                }
            }
            else{
                alert("ajax error:"+request.statusText);
            }
        }
    }
    request.send(params);
   // request.send();
}
function updatemember(jsontext) {//登出
   // alert(gid);
    var params="jsontext="+jsontext;
    var request=new XMLHttpRequest();
    request.open("POST","updatemember.php",true);
    request.setRequestHeader("Content-type","application/x-www-form-urlencoded");
 //   request.setRequestHeader("Content-length",params.length);
 //   request.setRequestHeader("Connection","close");
    request.onreadystatechange=function(){
        if(request.readyState==4){
            if(request.status==200){
                if(request.responseText!=null){                    
                    //getgroup();
                    //alert(request.responseText);
                    //location.reload();
                    //studentdata(request.responseText);
                    //document.getElementById("work").innerHTML = ""; //清空區塊
                    //document.getElementById('info').innerHTML=request.responseText;
                    //location.href='login.php';
                }
                else{
                    alert("ajax error:no data recieved");
                }
            }
            else{
                alert("ajax error:"+request.statusText);
            }
        }
    }
    request.send(params);
   // request.send();
}
function addclassmember(jsontext) {//登出
   // alert("123");
    var params="jsontext="+jsontext;
    var request=new XMLHttpRequest();
    request.open("POST","addclassmember.php",true);
    request.setRequestHeader("Content-type","application/x-www-form-urlencoded");
 //   request.setRequestHeader("Content-length",params.length);
 //   request.setRequestHeader("Connection","close");
    request.onreadystatechange=function(){
        if(request.readyState==4){
            if(request.status==200){
                if(request.responseText!=null){                    
                    getgroup();
                    //alert(request.responseText);
                    $("#txt").fadeIn().delay(5000).fadeOut();
                            txt.innerHTML=goodOrBad(1,"成功新增學生*"+add2.value+"*");
                    location.reload();
                    //document.getElementById("work").innerHTML = ""; //清空區塊
                    //document.getElementById('info').innerHTML=request.responseText;
                    //location.href='login.php';
                }
                else{
                    alert("ajax error:no data recieved");
                }
            }
            else{
                alert("ajax error:"+request.statusText);
            }
        }
    }
    request.send(params);
}
function getselectques(quesid) {//登出
   // alert("123");
    var params="quesid="+quesid;
    var request=new XMLHttpRequest();
    request.open("POST","getselectques.php",true);
    request.setRequestHeader("Content-type","application/x-www-form-urlencoded");
 //   request.setRequestHeader("Content-length",params.length);
 //   request.setRequestHeader("Connection","close");
    request.onreadystatechange=function(){
        if(request.readyState==4){
            if(request.status==200){
                if(request.responseText!=null){                    
                    //getgroup();
                    //alert(request.responseText);
                    var data=JSON.parse(request.responseText);
                    //alert(data[0][1]);
                        document.getElementById("title").value = data[0][1];
                        document.getElementById("content").value =data[0][2];
                        document.getElementById("tip").value = data[0][3];
                    
                     $('#select0').selectpicker('val', data[1]).selectpicker('refresh');
                      getSelectedOptions('0');
                      
                        $('#select1').selectpicker('val', data[2]).selectpicker('refresh');
                      getSelectedOptions('1');
                      
                        $('#select2').selectpicker('val', data[3]).selectpicker('refresh');
                      getSelectedOptions('2');
                    //document.getElementById("work").innerHTML = ""; //清空區塊
                    //document.getElementById('info').innerHTML=request.responseText;
                    //location.href='login.php';
                }
                else{
                    alert("ajax error:no data recieved");
                }
            }
            else{
                alert("ajax error:"+request.statusText);
            }
        }
    }
    request.send(params);
    //request.send();
}
function selectallques() {//登出
   // alert("123");
    //var params="quesid="+quesid;
    var request=new XMLHttpRequest();
    request.open("POST","selectallques.php",true);
    request.setRequestHeader("Content-type","application/x-www-form-urlencoded");
 //   request.setRequestHeader("Content-length",params.length);
 //   request.setRequestHeader("Connection","close");
    request.onreadystatechange=function(){
        if(request.readyState==4){
            if(request.status==200){
                if(request.responseText!=null){                    
                    //getgroup();
                   // alert(request.responseText);
                    var data=JSON.parse(request.responseText);
                    var nowtxt="";

                        for (var key in data) {
                            //document.write(data[key].length+"</br>");
                                nowtxt += option(data[key][0], data[key][1]);
                                //document.write(option(data[key][key2][0],data[key][key2][1]));
                            
                        }
                        
                        $("#ques").html(nowtxt).selectpicker('refresh'); //'<option>city1</option><option>city2</option>'
                        
                    //alert(data[0][1]);
                    
                }
                else{
                    alert("ajax error:no data recieved");
                }
            }
            else{
                alert("ajax error:"+request.statusText);
            }
        }
    }
    //request.send(params);
    request.send();
}
function updatequesdb(jsontext,id) {//登出
   //alert(id);
    var params="jsontext="+jsontext+"&id="+id;
    var request=new XMLHttpRequest();
    request.open("POST","updatequesdb.php",true);
    request.setRequestHeader("Content-type","application/x-www-form-urlencoded");
 //   request.setRequestHeader("Content-length",params.length);
 //   request.setRequestHeader("Connection","close");
    request.onreadystatechange=function(){
        if(request.readyState==4){
            if(request.status==200){
                if(request.responseText!=null){
                    //alert(request.responseText);
                    initialpanel();
                    selectallentity(id); //資料庫撈取
                    selectallques();
                    //document.getElementById("work").innerHTML = ""; //清空區塊
                    //document.getElementById('info').innerHTML=request.responseText;
                    //location.href='login.php';
                }
                else{
                    alert("ajax error:no data recieved");
                }
            }
            else{
                alert("ajax error:"+request.statusText);
            }
        }
    }
    request.send(params);
}
function selectallques2() {//登出
   // alert("123");
    //var params="quesid="+quesid;
    var request=new XMLHttpRequest();
    request.open("POST","selectallques.php",true);
    request.setRequestHeader("Content-type","application/x-www-form-urlencoded");
 //   request.setRequestHeader("Content-length",params.length);
 //   request.setRequestHeader("Connection","close");
    request.onreadystatechange=function(){
        if(request.readyState==4){
            if(request.status==200){
                if(request.responseText!=null){                    
                    //getgroup();
                    //alert(request.responseText);
                    var data=JSON.parse(request.responseText);
                    var nowtxt="";

                        for (var key in data) {
                            //document.write(data[key].length+"</br>");
                                nowtxt += option(data[key][0], data[key][1]);
                                //document.write(option(data[key][key2][0],data[key][key2][1]));
                            
                        }
                        //alert("good");
                        $("#ques").html(nowtxt).selectpicker('refresh'); //'<option>city1</option><option>city2</option>'
                        
                    //alert(data[0][1]);
                    
                }
                else{
                    alert("ajax error:no data recieved");
                }
            }
            else{
                alert("ajax error:"+request.statusText);
            }
        }
    }
    //request.send(params);
    request.send();
}
function setonline(id) {//登出
   //alert(id);
    var params="id="+id;
    var request=new XMLHttpRequest();
    request.open("POST","setonline.php",true);
    request.setRequestHeader("Content-type","application/x-www-form-urlencoded");
 //   request.setRequestHeader("Content-length",params.length);
 //   request.setRequestHeader("Connection","close");
    request.onreadystatechange=function(){
        if(request.readyState==4){
            if(request.status==200){
                if(request.responseText!=null){
                    //alert(request.responseText);
                    //initialpanel();
                    //selectallentity(id); //資料庫撈取
                    //selectallques();
                    $("#txt").fadeIn().delay(5000).fadeOut();
                    txt.innerHTML=goodOrBad(1,"成功設定問題上線");
                }
                else{
                    alert("ajax error:no data recieved");
                }
            }
            else{
                alert("ajax error:"+request.statusText);
            }
        }
    }
    request.send(params);
}
function assemble(groupid,quesid,entity,name) {//id quesid
    //alert(name[0]);
    //alert(entity);
    //alert(howmuch.value);
    var howmuchvalue=howmuch.value;
    //alert(groupid);
   // alert(jsontext+""+id+""+quesid+""+maxtix);
    var groupjson=JSON.stringify(groupid);
    //alert(groupjson);
    var entityjson=JSON.stringify(entity);
    var params="groupid="+groupjson+"&quesid="+quesid;
    var request=new XMLHttpRequest();
    request.open("POST","assemble.php",true);
    request.setRequestHeader("Content-type","application/x-www-form-urlencoded");
 //   request.setRequestHeader("Content-length",params.length);
 //   request.setRequestHeader("Connection","close");
    request.onreadystatechange=function(){
        if(request.readyState==4){
            if(request.status==200){
                if(request.responseText!=null){
                   //alert(request.responseText);
                    computeassemble(request.responseText,entityjson,howmuchvalue);
                    showgrouptable(request.responseText,entityjson,name);
                    
                    //fromjson2(request.responseText);
                }
                else{
                    alert("ajax error:no data recieved");
                }
            }
            else{
                alert("ajax error:"+request.statusText);
            }
        }
    }
    request.send(params);
}
function showgrouptable(getdata,entityjson,name){
    // alert(getdata);
    var data=JSON.parse(getdata);
	//alert(data.length);
    var entity=JSON.parse(entityjson);
    for(var i=0;i<data.length;i++){
        data[i]=JSON.parse(data[i]);
        //compute.innerHTML+=printmatrix2(data[i],entity);
    }
    var thelastmatrix={};
    /*
    for(var i=0;i<entity.length;i++){
        thelastmatrix[i]=new Array();
    }
    */
    for(var j=0;j<entity.length;j++){
                thelastmatrix[entity[j]]=new Array();
    }

    for(var i=0;i<data.length;i++){//每個人
        for(var j=0;j<entity.length;j++){//左邊
            for(var k=0;k<entity.length;k++){//上面
                if(data[i][j][k]!=undefined){
                        thelastmatrix[entity[j]][i]="O";
                        break;
                        //document.write(data[i][j][k]);
                    }else{
                        thelastmatrix[entity[j]][i]="X";
                    }
            }
        }
    }
    //document.getElementById("tableshow").innerHTML="~~";
    var txt="";
    var inn="";
    inn+="<th>實體</th>";
    
    //var nameS=JSON.parse(name);
    
    for(var i=0;i<name.length;i++){
        inn+="<th>"+name[i]+"</th>";
    }
        inn+="<th>"+"共識"+"</th>";
        txt="<thead>"+
                "<tr>"+
                    inn
                "</tr>"+
            "</thead>";
    /*
    <tr>
									<td>".$a[$i]."</td>
									<td>O</td>
									<td>X</td>
									<td>X</td>
									<td>X</td>
									<td>3</td>
								</tr>
    */
    var txt2="";
    for(var key in thelastmatrix){ 
        txt+="<tr>";
        txt+="<td>"+key+"</td>";
        var counthh=0;
        for(var i=0;i<thelastmatrix[key].length;i++){
            txt+="<td>"+thelastmatrix[key][i]+"</td>";
            if(thelastmatrix[key][i]=="O"){
                counthh++;
            }
        }
        txt+="<td>"+counthh+"</td>";
        var ndata=(counthh/name.length)*100;
        if(ndata>0){
        txt2+='<li data-cp-size="'+Math.round(ndata)+'" style="">'+key+'<span style="float:right;border:none;">'+Math.round(ndata)+'%</span></li>';
        }
        /*<li data-cp-size="20" style="">老師<span style="float:right;border:none;">20%</span></li>*/
        
        txt+="</tr>";
    }    
  // document.write(JSON.stringify(thelastmatrix));
    document.getElementById("tableshow").innerHTML=txt;
    document.getElementById("chardata_data").innerHTML=txt2;
    
    /////////////////////////////////////////////////
    
    
    
}
function computeassemble(getdata,entityjson,howmuchvalue){
    
    //alert(getdata);
    var data=JSON.parse(getdata);
    
    var entity=JSON.parse(entityjson);
    compute.innerHTML=data;
    // window.open('newwindows.php?text='+data+'&entity='+entity, 'test', config='height=500,width=500');
   // alert(data.length);
    
    for(var i=0;i<data.length;i++){
        data[i]=JSON.parse(data[i]);
        compute.innerHTML+=printmatrix2(data[i],entity);
    }
    var thelastmatrix=new Array();
    for(var i=0;i<entity.length;i++){
        thelastmatrix[i]=new Array();
    }
        for(var j=0;j<entity.length;j++){
            for(var k=0;k<entity.length;k++){
                var now="";
                var nowcharge=new Array();
                for(var i=0;i<data.length;i++){//每個元素，有n個要比較//a a b b  a b c d  a a a b
                    nowcharge.push(data[i][j][k]);
                }
                if(howmuchvalue==0){
                    thelastmatrix[j][k]=way3(nowcharge);
                }else if(howmuchvalue==1){
                    thelastmatrix[j][k]=way2(nowcharge);
                }else if(howmuchvalue==2){
                    thelastmatrix[j][k]=way1(nowcharge);
                }
                
                //thelastmatrix[j][k]=data[i][j][k];
            }
        }
    compute.innerHTML+=printmatrix2(thelastmatrix,entity);
   // gghaha();
    //alert(matrixtojson(thelastmatrix,entity));
    var txt=matrixtojson(thelastmatrix,entity);
    fromjson2( txt);
    // alert( txt);
    //return thelastmatrix;
    function printmatrix2(matrix,entity_name){
   // alert(matrix.length);
    var str="";
    str+="<p>";
    if(entity_name==undefined){
    str+="<table border='1'>";
    for(var i=0;i<matrix.length;i++){
        str+="<tr>";
        for(var j=0;j<matrix[i].length;j++){
            str+="<td>";
            str+=(matrix[i][j]);
            str+="</td>";
        }
        str+="</tr>";
    }
    str+="</table>";
    }else{    
        str+="<table border='1'>";
        for(var i=0;i<matrix.length+1;i++){
            str+="<tr>";
            for(var j=0;j<matrix.length+1;j++){
                str+="<td>";
                if(i==0){
                    if(j!=0){
                        str+=(entity_name[j-1]);
                    }
                }else{
                    if(j==0){
                        str+=(entity_name[i-1]);
                    }else{
                        str+=(matrix[i-1][j-1]);
                    }
                }
                str+="</td>";
            }
            str+="</tr>";
        }
        str+="</table>";
    }
    
    str+="</p>";
    return str;
}
    function way1(array){//全部一樣 強

        var n = [array[0]]; //结果数组
        //从第二项开始遍历
        for(var i = 1; i < array.length; i++) {
        //如果当前数组的第i项在当前数组中第一次出现的位置不是i，
        //那么表示第i项是重复的，忽略掉。否则存入结果数组
        if (array.indexOf(array[i]) == i) n.push(array[i]);

        if(n.length==1&&n[0]!=null){
            return n[0];
        }else{
            return undefined;
        }
      }
    }
    function way2(array){//選擇最多人一樣的(包含null)  aaab abcd  null a a b  a1 b2 c1  null2 a1  a null null null 中
        var n=new Array;
        for(var i=0;i<array.length;i++){
            if(!n[array[i]]){
                n[array[i]]=1;
            }else{
                n[array[i]]++;
            }
        }
        var max=0;
        var maxkey=null;
        for(var key in n){ 
            //document.write(key+"~~"+n[key]+"</br>");
            if(n[key]>max){
                max=n[key];
                maxkey=key;
            }
            
        }
        if(maxkey=="null"){
            maxkey=undefined;
        }
        return maxkey;
        
    }
    function way3(array){//選擇最多人一樣的(不包含null)，個數相同選擇後面的(類似隨機，因為暫時沒有判斷點) 弱
        var n=new Array;
        for(var i=0;i<array.length;i++){
            if(!n[array[i]]){
                n[array[i]]=1;
            }else{
                n[array[i]]++;
            }
        }
        var max=0;
        var maxkey=null;
        for(var key in n){ 
            //document.write(key+"~~"+n[key]+"</br>");
            
            if(n[key]>max && key!="null"){
                max=n[key];
                maxkey=key;
            }
            
        }
        
        return maxkey;
        
    }
}
function saveanswer(jsontext,id,quesid,entity_name) {//`id`,`quesid`,`datetime`,`jsontext`,`matrix` ,id,quesid,maxtix//存圖
    //alert(jsontext+""+id+""+quesid+""+maxtix);
    
   //alert(jsontext);//觀看data
    var str1=show(jsontext);
   // alert(str1.rel.length);
    
    if(str1.rel.length>0){
        //alert(str1);
        //alert(entity_name);
        //document.write(JSON.stringify(str1));
        var matrix1=to2dmatrix(str1,entity_name);//轉為矩正
        var myjsonshow=JSON.stringify(matrix1);
        var myjsonshow2=JSON.stringify(entity_name);
        var matrix = myjsonshow;
       // alert(myjsonshow);////觀看data
       // alert(myjsonshow2)//;//觀看data
        // window.open('newwindows.php?text='+13+'&entity='+12, 'test', config='height=500,width=500');                

        var params="jsontext="+jsontext+"&id="+id+"&quesid="+quesid+"&matrix="+matrix;
        var request=new XMLHttpRequest();
        request.open("POST","saveanswer.php",true);
        request.setRequestHeader("Content-type","application/x-www-form-urlencoded");
   //     request.setRequestHeader("Content-length",params.length);
   //     request.setRequestHeader("Connection","close");
        request.onreadystatechange=function(){
            if(request.readyState==4){
                if(request.status==200){
                    if(request.responseText!=null){
                     //  alert(request.responseText)//觀看data
                       //reloadlist(id);
                        alert("更新答案成功");
        window.open('newwindows.php?text='+myjsonshow+'&entity='+myjsonshow2, 'test', config='height=500,width=500');

                    }
                    else{
                        alert("ajax error:no data recieved");
                    }
                }
                else{
                    alert("ajax error:"+request.statusText);
                }
            }
        }
        request.send(params);
    }else{
        alert("作圖錯誤")
    }
}
function selecques(quesid) {//登出
   // alert("123");
    var params="quesid="+quesid;
    var request=new XMLHttpRequest();
    request.open("POST","selecques.php",true);
    request.setRequestHeader("Content-type","application/x-www-form-urlencoded");
 //   request.setRequestHeader("Content-length",params.length);
 //   request.setRequestHeader("Connection","close");
    request.onreadystatechange=function(){
        if(request.readyState==4){
            if(request.status==200){
                if(request.responseText!=null){                    
                    //getgroup();
                    //alert(request.responseText);
                    var data=JSON.parse(request.responseText);
                    var entity=new Array();
                    var relationship=new Array();
                    var card=new Array();
                    for(var i=0;i<data.length;i++){
                        var x=0;
                        var y=10;
                        for(var j=0;j<data[i].length;j++){
                            
                            //alert(data[i][j]);
                            if(j%2==0){
                                x=0;
                                y=10+30*j;
                            }else{
                                x=80;
                            }
                            if(i==0){
                                entity.push(myrect(x,y,data[i][j])); 
                            }else if(i==1){
                                relationship.push(myrel(x,y,data[i][j]));
                            }else if(i==2){
                                card.push(mycard(x,y,data[i][j]));
                            }
                        }
                    }
                    document.getElementById("json").innerHTML=request.responseText;
                    stencil.load(entity, 'simple');
                    stencil.load(relationship, 'custom');
                    stencil.load(card,'Cardinality');
                }
                else{
                    alert("ajax error:no data recieved");
                }
            }
            else{
                alert("ajax error:"+request.statusText);
            }
        }
    }
    request.send(params);
    //request.send();
}
function saveteacheranswer(jsontext,id,quesid,entity_name) {//`id`,`quesid`,`datetime`,`jsontext`,`matrix` ,id,quesid,maxtix//存圖
   // alert(jsontext+""+id+""+quesid+""+maxtix);
    
    alert(jsontext);
    var str1=show(jsontext);
    
   // alert(str1.rel.length);
    alert(entity_name);
    alert("good");
    if(str1.rel.length>0){
        var matrix1=to2dmatrix(str1,entity_name);//轉為矩正
        var myjsonshow=JSON.stringify(matrix1);
        var myjsonshow2=JSON.stringify(entity_name);
        var matrix = myjsonshow;
        alert(myjsonshow);
        alert(myjsonshow2);
        // window.open('newwindows.php?text='+13+'&entity='+12, 'test', config='height=500,width=500');                
        window.open('newwindows.php?text='+myjsonshow+'&entity='+myjsonshow2, 'test', config='height=500,width=500');

        var params="jsontext="+jsontext+"&id="+id+"&quesid="+quesid+"&matrix="+matrix;
        var request=new XMLHttpRequest();
        request.open("POST","saveteacheranswer.php",true);
        request.setRequestHeader("Content-type","application/x-www-form-urlencoded");
   //     request.setRequestHeader("Content-length",params.length);
   //     request.setRequestHeader("Connection","close");
        request.onreadystatechange=function(){
            if(request.readyState==4){
                if(request.status==200){
                    if(request.responseText!=null){
                       alert(request.responseText)
                       //reloadlist(id);

                    }
                    else{
                        alert("ajax error:no data recieved");
                    }
                }
                else{
                    alert("ajax error:"+request.statusText);
                }
            }
        }
        request.send(params);
    }else{
        alert("作圖錯誤")
    }
}
function selecontent(quesid) {//登出
   // alert("123");
    var params="quesid="+quesid;
    var request=new XMLHttpRequest();
    request.open("POST","selecontent.php",true);
    request.setRequestHeader("Content-type","application/x-www-form-urlencoded");
 //   request.setRequestHeader("Content-length",params.length);
 //   request.setRequestHeader("Connection","close");
    request.onreadystatechange=function(){
        if(request.readyState==4){
            if(request.status==200){
                if(request.responseText!=null){    
                    //alert(request.responseText);
                    var data=JSON.parse(request.responseText);
                    document.getElementById("myTabspannel").getElementsByTagName("div")[0].getElementsByTagName("h3")[0].innerHTML="<b>"+data[0][1]+"</b>";
                     document.getElementById("myTabspannel").getElementsByTagName("div")[0].getElementsByTagName("pre")[0].innerHTML=data[0][2];
                     document.getElementById("myTabspannel").getElementsByTagName("div")[0].getElementsByTagName("p")[0].innerHTML=data[0][3];
                    //document.getElementById("myTabspannel").innerHTML="123";
                    //alert("good");
                }
                else{
                    alert("ajax error:no data recieved");
                }
            }
            else{
                alert("ajax error:"+request.statusText);
            }
        }
    }
    request.send(params);
    //request.send();
}
function selectallques2() {//登出
   // alert("123");
    //var params="quesid="+quesid;
    var request=new XMLHttpRequest();
    request.open("POST","selectallques.php",true);
    request.setRequestHeader("Content-type","application/x-www-form-urlencoded");
 //   request.setRequestHeader("Content-length",params.length);
 //   request.setRequestHeader("Connection","close");
    request.onreadystatechange=function(){
        if(request.readyState==4){
            if(request.status==200){
                if(request.responseText!=null){                    
                    //getgroup();
                   // alert(request.responseText);
                    var data=JSON.parse(request.responseText);
                    var nowtxt="";

                        for (var key in data) {
                            //document.write(data[key].length+"</br>");
                                nowtxt += option(data[key][0], data[key][1]);
                                //document.write(option(data[key][key2][0],data[key][key2][1]));
                            
                        }
                        document.getElementById("ques").innerHTML=nowtxt;
                        //$("#ques").html(nowtxt).selectpicker('refresh'); //'<option>city1</option><option>city2</option>'
                        
                    //alert(data[0][1]);
                    
                }
                else{
                    alert("ajax error:no data recieved");
                }
            }
            else{
                alert("ajax error:"+request.statusText);
            }
        }
    }
    //request.send(params);
    request.send();
}
function getquesjson(id) {//id quesid
    //alert(id);
    var params="id="+id;
    var request=new XMLHttpRequest();
    request.open("POST","getquesjson.php",true);
    request.setRequestHeader("Content-type","application/x-www-form-urlencoded");
  //  request.setRequestHeader("Content-length",params.length);
  //  request.setRequestHeader("Connection","close");
    request.onreadystatechange=function(){
        if(request.readyState==4){
            if(request.status==200){
                if(request.responseText!=null){
                    //alert(request.responseText);
                    
                    fromjson('{"cells":[]}');
                    getmyjson(request.responseText);
                    //fromjson(request.responseText);
                }
                else{
                    alert("ajax error:no data recieved");
                }
            }
            else{
                alert("ajax error:"+request.statusText);
            }
        }
    }
    request.send(params);
}
function showcolab(key,quesid) {//登出
    //alert(key);
    //alert(quesid);
    var params="jsontext="+key+"&quesid="+quesid;
    var request=new XMLHttpRequest();
    request.open("POST","showcolab.php",true);
    request.setRequestHeader("Content-type","application/x-www-form-urlencoded");
 //   request.setRequestHeader("Content-length",params.length);
 //   request.setRequestHeader("Connection","close");
    request.onreadystatechange=function(){
        if(request.readyState==4){
            if(request.status==200){
                if(request.responseText!=null){
                    //alert(request.responseText);
                    //document.write(request.responseText);
                    var data=JSON.parse(request.responseText);
                    fromjson2('{"cells":[]}');
                    if(data.length>0){
                        var json=data[1][0][0];
                        var maxtrix=data[1][0][1];
                        
                        
                        fromjson2(data[0][0][3]);
                        
                        document.getElementById("score").innerHTML=countscore(data[0][0][5],maxtrix);;
                    }else{
                        alert("尚未有共識產生");
                    }
                    //getmyjson(request.responseText);
                    //document.getElementById("work").innerHTML = ""; //清空區塊
                    //document.getElementById('info').innerHTML=request.responseText;
                    //location.href='login.php';
                }
                else{
                    alert("ajax error:no data recieved");
                }
            }
            else{
                alert("ajax error:"+request.statusText);
            }
        }
    }
    request.send(params);
}
function showanswer(quesid) {//登出
    //alert(key);
    //alert(quesid);
    var params="quesid="+quesid;
    var request=new XMLHttpRequest();
    request.open("POST","showanswer.php",true);
    request.setRequestHeader("Content-type","application/x-www-form-urlencoded");
 //   request.setRequestHeader("Content-length",params.length);
 //   request.setRequestHeader("Connection","close");
    request.onreadystatechange=function(){
        if(request.readyState==4){
            if(request.status==200){
                if(request.responseText!=null){
                    //alert(request.responseText);
                    //document.write(request.responseText);
                    var data=JSON.parse(request.responseText);
                    fromjson2(data[0][0]);
                    
                }
                else{
                    alert("ajax error:no data recieved");
                }
            }
            else{
                alert("ajax error:"+request.statusText);
            }
        }
    }
    request.send(params);
}
function getnewestjson(groupid,quesid) {//id quesid
   // alert(jsontext+""+id+""+quesid+""+maxtix);
    
    var params="id="+groupid+"&quesid="+quesid;
    var request=new XMLHttpRequest();
    request.open("POST","getnewestjson.php",true);
    request.setRequestHeader("Content-type","application/x-www-form-urlencoded");
 //   request.setRequestHeader("Content-length",params.length);
 //   request.setRequestHeader("Connection","close");
    request.onreadystatechange=function(){
        if(request.readyState==4){
            if(request.status==200){
                if(request.responseText!=null){
                  // alert(request.responseText);
                    fromjson2(request.responseText);
                }
                else{
                    alert("ajax error:no data recieved");
                }
            }
            else{
                alert("ajax error:"+request.statusText);
            }
        }
    }
    request.send(params);
}

