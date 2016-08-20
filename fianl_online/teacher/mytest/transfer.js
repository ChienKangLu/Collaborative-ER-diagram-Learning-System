function test(){
    alert("gg");
}
function nextline(){
    mywrite("</br>");
}
function mywrite(str){
    if(false){
    document.write(str);
    }
}    

function whichone(shape,link){
    var txt="";
    if( shape[link.source]!=undefined){
        mywrite(shape[link.source]);
        txt=shape[link.source];
    }else{
        mywrite(shape[link.target]);
        txt=shape[link.target];
    }
    return txt;
}
function relaentity(entity1,card1,relation,card2,entity2){
    var relation={
        "entity1": entity1,
        "card1": card1,
        "relation": relation,
        "card2": card2,
        "entity2": entity2
    };
    return relation;
}
function printmatrix(matrix,entity_name){
   // alert(matrix.length);
    mywrite("<p>");
    if(entity_name==undefined){
    mywrite("<table border='1'>");
    for(var i=0;i<matrix.length;i++){
        mywrite("<tr>");
        for(var j=0;j<matrix[i].length;j++){
            mywrite("<td>");
            mywrite(matrix[i][j]);
            mywrite("</td>");
        }
        mywrite("</tr>");
    }
    mywrite("</table>");
    }else{    
        mywrite("<table border='1'>");
        for(var i=0;i<matrix.length+1;i++){
            mywrite("<tr>");
            for(var j=0;j<matrix.length+1;j++){
                mywrite("<td>");
                if(i==0){
                    if(j!=0){
                        mywrite(entity_name[j-1]);
                    }
                }else{
                    if(j==0){
                        mywrite(entity_name[i-1]);
                    }else{
                        mywrite(matrix[i-1][j-1]);
                    }
                }
                mywrite("</td>");
            }
            mywrite("</tr>");
        }
        mywrite("</table>");
    }
    
    mywrite("</p>");
}
function gghaha(){
    alert("gghh");
}
function matrixtojson(matrix,entity_name){
    
    var mypic={
      cells:[]  
    };
    
    var x=230;
    var y=300;
    var id=1;
    var usedentity=new Array();
    var linkstack=new Array();
    function linktrash(id1,id2){
        this.id1=id1;
        this.id2=id2;
    }
    var count =0;
    for(var i=0;i<matrix.length;i++){
        for(var j=0;j<matrix.length;j++){
            if(matrix[i][j]!=undefined){
                count++;
                var entity1;
                var card1;
                var relation;
                var card2;
                var entity2;
                entity1=entity_name[i];
                    mywrite(entity_name[i]);
                card1=matrix[i][j].substr(matrix[i][j].length-1,1);
                    mywrite(matrix[i][j].substr(matrix[i][j].length-1,1));
                relation=matrix[i][j].substr(0,matrix[i][j].length-1);
                    mywrite(matrix[i][j].substr(0,matrix[i][j].length-1));
                card2=matrix[j][i].substr(matrix[i][j].length-1,1);
                    mywrite(matrix[j][i].substr(matrix[i][j].length-1,1));
                entity2=entity_name[j];
                    mywrite(entity_name[j]);
                nextline();
                matrix[i][j]=undefined;
                matrix[j][i]=undefined;
                
                var id1;
                var id2;
                var id3;
                var id4;
                var id5;
                
                var a;
                if(usedentity[entity1]==undefined){
                    a=drawrect(x,y,id,entity1);
                    mypic.cells.push(a);
                    id1=id;
                    usedentity[entity1]=id;
                    x+=100;
                    id++;
                }else{
                    id1=usedentity[entity1];
                    x+=100;
                }
                var b=drawcircle(x,y,id,card1);
                mypic.cells.push(b);
                id2=id;
                x+=100;
                id++;
                var c=drawrel(x,y,id,relation);
                mypic.cells.push(c);
                id3=id;
                x+=100;
                id++;
                var d=drawcircle(x,y,id,card2);
                mypic.cells.push(d);
                id4=id;
                x+=100;
                id++;
                var e;
                if(usedentity[entity2]==undefined){
                    var e=drawrect(x,y,id,entity2);
                    mypic.cells.push(e);
                    id5=id;
                    usedentity[entity2]=id;
                    x+=100;
                    id++;
                }else{
                    id5=usedentity[entity2];
                    x+=100;
                }
                y+=100;
                x=230;
                linkstack.push(new linktrash(id1,id2));
                linkstack.push(new linktrash(id2,id3));
                linkstack.push(new linktrash(id3,id4));
                linkstack.push(new linktrash(id4,id5));
                
            }
        }
    }
    /*
    for(var i=0;i<usedentity.length;i++){
         mypic.cells.push(drawlink(id,usedentity[i].id1,usedentity[i].id2));
         mywrite(usedentity[i].id1+"~"+usedentity[i].id2);
        nextline();
        id++;
    }*/
    for(var key2 in linkstack){
         mypic.cells.push(drawlink(id,linkstack[key2].id1,linkstack[key2].id2));
         mywrite(key2+"~"+linkstack[key2].id1+"~"+linkstack[key2].id2);
        nextline();
        id++;
    }
    mywrite(JSON.stringify(mypic));
    return JSON.stringify(mypic);
}
function drawrect(x,y,id,text){
     var rect={
        "type": "basic.Rect",
      "position": {
        "x": x,
        "y": y
      },
      "size": {
        "width": 70,
        "height": 40
      },
      "angle": 0,
      "id": id,
      "embeds": "",
      "z": id,
      "attrs": {
        "rect": {
          "fill": "#27AE60",
          "width": 50,
          "height": 30,
          "rx": 2,
          "ry": 2
        },
        "text": {
          "font-size": 10,
          "text": text,
          "fill": "white"
        }
      }
    };
    return rect;
}
function drawcircle(x,y,id,text){
    var circle={
          "type": "basic.Circle",
          "size": {
            "width": 30,
            "height": 30
          },
          "position": {
            "x": x,
            "y": y
          },
          "angle": 0,
          "id": id,
          "embeds": "",
          "z": 3,
          "attrs": {
            "circle": {
              "fill": "#E74C3C",
              "width": 15,
              "height": 15
            },
            "text": {
              "font-size": 10,
              "text": text,
              "fill": "white"
            }
          }
        };
    return circle;
}
function drawrel(x,y,id,text){
    var rel={
      "type": "erd.Relationship",
      "size": {
        "width": 70,
        "height": 40
      },
      "position": {
        "x": x,
        "y": y
      },
      "angle": 0,
      "id": id,
      "embeds": "",
      "z": 2,
      "attrs": {
        ".outer": {
          "fill": "#797d9a",
          "stroke": "none",
          "filter": {
            "name": "dropShadow",
            "args": {
              "dx": 0,
              "dy": 2,
              "blur": 1,
              "color": "#333333"
            }
          }
        },
        "text": {
          "text": text,
          "fill": "#ffffff",
          "letter-spacing": 0,
          "style": {
            "text-shadow": "1px 0 1px #333333"
          }
        }
      }
    };
    return rel;
}
function drawlink(id,id1,id2){
    var link={
      "type": "link",
      "id": id,
      "embeds": "",
      "source": {
        "id": ""+id1
      },
      "target": {
        "id": ""+id2
      },
      "z": id,
      "attrs": {
        ".marker-source": {
          "fill": "#4b4a67",
          "stroke": "#4b4a67"
        },
        ".marker-target": {
          "fill": "#4b4a67",
          "stroke": "#4b4a67"
        }
      }
    };
    return link;
}


function to2dmatrix(relationjson,entity_name){
    mywrite("<p>");
    mywrite(JSON.stringify(relationjson));
    mywrite("</p>");
    var matrix=new Array();
    var entity_number=new Array();
    
    for(var i=0;i<entity_name.length;i++){
        matrix[i]=new Array(entity_name.length);
        entity_number[entity_name[i]]=i;
    }  
    
    for(var i=0;i<relationjson.rel.length;i++){
        var entity1=relationjson.rel[i].entity1;
        var card1=relationjson.rel[i].card1;
        var relation=relationjson.rel[i].relation;
        var card2=relationjson.rel[i].card2;
        var entity2=relationjson.rel[i].entity2;
        matrix[entity_number[entity1]][entity_number[entity2]]=relation+card1;
        matrix[entity_number[entity2]][entity_number[entity1]]=relation+card2;
    }
    return matrix;
}

function show(txt) {
   //document.write(txt);
    function link(source,target){
        this.source=source;
        this.target=target;
        this.used=false;//尚未使用
    }
    
    var jsonobj=JSON.parse(txt);
    
    var Rect =new Array();
    var Relationship =new Array();
    var Circle =new Array();
    var Link =new Array();
    var relationjson={
      rel:[]  
    };
    
    var Rectsize=0;
    var Relationshipsize=0;
    var Circlesize=0;
    var Linksize=0;
    for(var i=0;i<jsonobj.cells.length;i++){
        /*
        if(jsonobj.cells[i].type=="basic.Rect"||jsonobj.cells[i].type=="erd.Relationship"||jsonobj.cells[i].type=="basic.Circle"){
            mywrite(jsonobj.cells[i].type);
            mywrite("~~~~~~~~~~");
            mywrite(jsonobj.cells[i].attrs.text.text);
            mywrite("~~~~~~~~~~");
            mywrite(jsonobj.cells[i].id);
            nextline();
        }else if(jsonobj.cells[i].type=="link"){
            mywrite(jsonobj.cells[i].id);
            mywrite("~~~~~~~~~~");
            mywrite(jsonobj.cells[i].source.id);
            mywrite("~~~~~~~~~~");
            mywrite(jsonobj.cells[i].target.id);
            nextline();
        }
        */
        if(jsonobj.cells[i].type=="basic.Rect"){
            Rect[jsonobj.cells[i].id]=jsonobj.cells[i].attrs.text.text;
            Rectsize++;
        }else if(jsonobj.cells[i].type=="erd.Relationship"){
            Relationship[jsonobj.cells[i].id]=jsonobj.cells[i].attrs.text.text;
            Relationshipsize++;
        }else if(jsonobj.cells[i].type=="basic.Circle"){
            Circle[jsonobj.cells[i].id]=jsonobj.cells[i].attrs.text.text;
            Circlesize++;
        }else if(jsonobj.cells[i].type=="link"){
            Link[jsonobj.cells[i].id]=new link(jsonobj.cells[i].source.id,jsonobj.cells[i].target.id);
            Linksize++;
        }
    }
    /*
        mywrite(Rect["09b6f44c-ed85-4e7d-8160-8d3e0a00d921"]);
    nextline();
        mywrite(Relationship["64e706f0-3b52-40a5-b3d9-49a1d7cdc0a3"]);
    nextline();
        mywrite(Circle["2a1cf7ba-2762-48c4-a2cb-9d3111d621b7"]);
    nextline();
        mywrite(Link["c3fc2eb9-868b-4d8c-867f-dfd821366f30"].source+"~"+Link["c3fc2eb9-868b-4d8c-867f-dfd821366f30"].target);
    nextline();
    for(var key in Link){ 
       mywrite(key+"~~~"+Link[key].source+"~~~"+Link[key].target);
        nextline();
    }
    for(var Rectid in Rect){ 
       mywrite(Rect[Rectid]);
    }   
    */

     var count=0;
     var ggtess=false;
   //  alert(Linksize+"~~"+Rectsize+"~~"+Circlesize+"~~"+Relationshipsize);
   //  if(Linksize%4==0&&Rectsize%2==0&&Circlesize%2==0&&Relationshipsize>=1){//除非有至少四條連線，兩個實體，兩個限制，一個關聯
         for(var key in Link){
             if(!ggtess){
             //check is used
             var entity1;
             var card1;
             var relation;
             var card2;
             var entity2;
             if(!Link[key].used){
                /*
                mywrite(key+"~~~"+Link[key].source+"~~~"+Link[key].target);
                */
                 var now =Link[key];
                 var source= now.source;
                 var target= now.target;
                 //check is a head
                 for(var Rectid in Rect){ 
                     if(source==Rectid||target==Rectid){
                         entity1=whichone(Rect,now);
                         now.used=true;
                         //find 4 line
                         var line4count=1;
                         while(line4count!=4){
                             for(var findid in Link){
                                 if(!Link[findid].used){
                                     if(now.source==Link[findid].source||now.source==Link[findid].target||
                                        now.target==Link[findid].source||now.target==Link[findid].target){
                                            var goodpath=false;
                                             if(line4count==1){
                                                 if(Rect[Link[findid].source]!=undefined||Rect[Link[findid].target]!=undefined){
                                                     goodpath=false;
                                                 }else{
                                                     goodpath=true;
                                                 }
                                             }else{
                                                 goodpath=true;
                                             }
                                             if(goodpath){
                                                 line4count++;
                                                 now=Link[findid];
                                                 if(line4count==2){
                                                      card1=whichone(Circle,now);
                                                 }else if(line4count==3){
                                                      relation=whichone(Relationship,now);
                                                 }else if(line4count==4){
                                                      card2=whichone(Circle,now);
                                                 }
                                                 now.used=true;
                                                 break;
                                             }
                                     }
                                 }
                             }                             
                         }
                        
                         entity2=whichone(Rect,now);
                         relationjson.rel.push(new relaentity(entity1,card1,relation,card2,entity2));
                         nextline();
                         break;
                     }
                 }
             }


             count++;
             }else{
                 break;
             }
        }
         /*
     }else{
         ggtess=true;//錯誤的圖
     }
    if(ggtess){
        relationjson={
            rel:[]  
        };
      //  alert("gg");
    }
    */
    return  relationjson;
    
    
}
