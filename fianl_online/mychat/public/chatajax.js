nowcahtcount=0;

nowtime="";
function getfirst() {//登出
   // alert("123");
    var params="function=getfirst";
    var request=new XMLHttpRequest();
    request.open("POST","chatphp.php",true);
    request.setRequestHeader("Content-type","application/x-www-form-urlencoded");
 //   request.setRequestHeader("Content-length",params.length);
 //   request.setRequestHeader("Connection","close");
    request.onreadystatechange=function(){
        if(request.readyState==4){
            if(request.status==200){
                if(request.responseText!=null){
                    //alert(request.responseText);
                    //nowcahtcount=Number(request.responseText);//取得最剛開始的資料庫句子個數
                    
                    nowtime=request.responseText;
                    alert(request.responseText);
                    //alert(nowcahtcount+1);
                    //update(jsontext);
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


function savechat(jsontext,text) {//登出
   // alert("123");
    var params="function=savechat"+"&jsontext="+jsontext+"&text="+text;
    var request=new XMLHttpRequest();
    request.open("POST","http://163.14.72.37/teacher/chat3/chatphp.php",true);
    request.setRequestHeader("Content-type","application/x-www-form-urlencoded");
 //   request.setRequestHeader("Content-length",params.length);
 //   request.setRequestHeader("Connection","close");
    request.onreadystatechange=function(){
        if(request.readyState==4){
            if(request.status==200){
                if(request.responseText!=null){
                    //alert("save already");good means
                    //update(jsontext);
                    //test();
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

function logout(id) {//登出
   // alert("123");
    var params="function=logout"+"&id="+id;
    var request=new XMLHttpRequest();
    request.open("POST","http://163.14.72.37/teacher/chat3/chatphp.php",true);
    request.setRequestHeader("Content-type","application/x-www-form-urlencoded");
   // request.setRequestHeader("Content-length",params.length);
   // request.setRequestHeader("Connection","close");
   
   
    request.send(params);
}
function login(id) {//登出
   // alert("123");
    var params="function=login"+"&id="+id;
    var request=new XMLHttpRequest();
    request.open("POST","http://163.14.72.37/teacher/chat3/chatphp.php",true);
    request.setRequestHeader("Content-type","application/x-www-form-urlencoded");
   // request.setRequestHeader("Content-length",params.length);
   // request.setRequestHeader("Connection","close");
   
   
    request.send(params);
}
function update(jsontext) {//登出
   // alert("123");
    var params="function=update&"+"jsontext="+jsontext+"&nowtime="+nowtime;
    var request=new XMLHttpRequest();
    request.open("POST","chatphp.php",true);
    request.setRequestHeader("Content-type","application/x-www-form-urlencoded");
 //   request.setRequestHeader("Content-length",params.length);
 //   request.setRequestHeader("Connection","close");
    request.onreadystatechange=function(){
        if(request.readyState==4){
            if(request.status==200){
                if(request.responseText!=null){
                    //alert(request.responseText);
                    //alert(data[0][2]);
                    //document.write("目前id:"+user["userid"]+"</br>");
                    

                        //alert(request.responseText);
                        var user=JSON.parse(jsontext);
                        var data = JSON.parse(request.responseText);
                        var txt="";
                        var total=data[1].length;
                        if(total>0){
                            for(var i=0;i<total;i++){

                                var id =data[1][i][2];//id
                                var text=data[1][i][4];//text
                                var time=data[1][i][5];//time
                                var name=data[1][i][6];//time
                                if(user["userid"]==data[1][i][2]){
                                    txt=txt+self(text,time);
                                }else{
                                    txt=txt+other(name,text,time);
                                }
                            }
                            //alert(txt);
                            document.getElementById("big").innerHTML+=txt;
                            $('[data-toggle="tooltip"]').tooltip();
                            nowtime=data[0];
                        }
                    
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
