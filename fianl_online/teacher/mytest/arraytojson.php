<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Untitled Document</title>
</head>




<body>
<script>
    function drawrect(x,y,id,text){
     var rectw={
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
    return rectw;
}
    /*
    a={
        name:[],
        data:[]
    };
    a.name.push("leo");
    a.data.push({w:60,h:170});
    b=JSON.stringify(a);
    document.write(b);
    */
    b={
      cells:[]  
    };
    
    rect={
        "type": "basic.Rect",
      "position": {
        "x": 290,
        "y": 350
      },
      "size": {
        "width": 70,
        "height": 40
      },
      "angle": 0,
      "id": "1",
      "embeds": "",
      "z": 1,
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
          "text": "老師",
          "fill": "white"
        }
      }
    }
    
    rel={
      "type": "erd.Relationship",
      "size": {
        "width": 70,
        "height": 40
      },
      "position": {
        "x": 290,
        "y": 480
      },
      "angle": 0,
      "id": "2",
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
          "text": "包含",
          "fill": "#ffffff",
          "letter-spacing": 0,
          "style": {
            "text-shadow": "1px 0 1px #333333"
          }
        }
      }
    }
    
    circle={
      "type": "basic.Circle",
      "size": {
        "width": 30,
        "height": 30
      },
      "position": {
        "x": 310,
        "y": 420
      },
      "angle": 0,
      "id": "3",
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
          "text": "0",
          "fill": "white"
        }
      }
    }
    var count=1;
    count++;
   
    
 
    link={
      "type": "link",
      "id": "w",
      "embeds": "",
      "source": {
        "id": "1"
      },
      "target": {
        "id": "3"
      },
      "z": 25,
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
    }
    
    
    b.cells.push(rect);
    b.cells.push(rel);
    b.cells.push(circle);
    b.cells.push(link);
    c=JSON.stringify(b);
     document.write(c);
    
    /*
    mypic={
      cells:[]  
    };
    x=290;
    y=350;
    id=1;
    for(var i=0;i<10;i++){
        mypic.cells.push(drawrect(x,y,id,"leojack"));
        y+=100;
        id++;
    }
    
    q=JSON.stringify(mypic);
     document.write(q);
     */
    

</script>


</body>
</html>