var action_tag=["answer_area_click","consensus_area_click","login","logout","look_","look_latest","generate_consensus","clear"];

function record(tag_id,id){//    arguments.length arguments[2]-->看誰的
    var tag="";
    
    if(tag_id!=4){
        tag=action_tag[tag_id];
    }else{
        tag=action_tag[tag_id]+arguments[2];
    }
    var json={};
    json["action_tag"]=tag;
    json["userid"]=id;
    save_action_record(tag_id,JSON.stringify(json));
    //alert(JSON.stringify(json));
}


function save_action_record(tag_id,jsontext) {//登出 tag_name user_id date_time
   // alert("123");
    var params="jsontext="+jsontext;
    var request=new XMLHttpRequest();
    request.open("POST","record.php",true);
    request.setRequestHeader("Content-type","application/x-www-form-urlencoded");
  //  request.setRequestHeader("Content-length",params.length);
  //  request.setRequestHeader("Connection","close");
    request.onreadystatechange=function(){
        if(request.readyState==4){
            if(request.status==200){
                if(request.responseText!=null){
//                    alert(request.responseText);
                    
                }
                else{
                    alert("ajax error:no data recieved");
                }
            }
            else{
                alert("ajax erroraction:"+request.statusText);
            }
        }
    }
    request.send(params);
}
