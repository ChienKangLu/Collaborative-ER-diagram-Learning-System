<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  
        <link rel="stylesheet" type="text/css" href="jointroot/joint.css" />
        <script src="jointroot/jquery.min.js"></script>
        <script src="jointroot/lodash.min.js"></script>
        <script src="jointroot/backbone-min.js"></script>
        <script src="jointroot/joint.js"></script>
        <script src="jointroot/joint.shapes.erd.js"></script>
        
        <link rel="stylesheet" type="text/css" href="meteor-myjointjs-master/lib/css/joint.ui.paperScroller.css" />
        <script src="meteor-myjointjs-master/lib/joint.ui.paperScroller.js"></script>        
        <style>
        	/* Paper */

#myholder {
	
	width:100%;
	height: 100px;
}

#myholder .paper-scroller {
   width: 100%;
   height: 100%;
}

#myholder svg {
   /* Grid background image */
   background-image: url('data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAoAAAAKCAYAAACNMs+9AAAAHUlEQVQYV2NkYGAwBuKzQIwXMBJSAJMfVUidcAQAnUQBC6jEGBUAAAAASUVORK5CYII=');
   background-color: white;
   box-shadow: 1px 1px 1px lightgray;
}

#myholder svg .drawable {
   /* Grid background image */
   fill: white;
   stroke: black;
   stroke-width: 1px;
}

.element.basic.Rect rect,
.element.basic.Circle circle,
.element.devs.Model rect {
   -webkit-svg-shadow: 2px 2px 5px gray;
}

.element.basic.Path path { -webkit-svg-shadow: 1px 1px 2px gray; }
.element.basic.Path path { fill: #3e3f47; }
        </style>
</head>

<body>
	<div id="myholder" style="top: 100px;"></div>
  <script type="text/javascript">
    var graph = new joint.dia.Graph;

    var paper = new joint.dia.Paper({
        el: $('#myholder'),
        width: 600,
        height: 200,
        model: graph,
        gridSize: 1
    });
    
paper.on('blank:pointerdown', function(evt, x, y) { 
    alert('pointerdown on a blank area in the paper.')
})
paper.on('cell:pointerdblclick ', 
    function(cellView, evt, x, y) { 
        alert('cell view ' + cellView.model.id + ' was clicked'); 
    }
);
    var rect = new joint.shapes.basic.Rect({
        position: { x: 100, y: 30 },
        size: { width: 100, height: 30 },
        attrs: { rect: { fill: 'blue' }, text: { text: 'my box', fill: 'white' } }
    });
    

    var rect2 = rect.clone();
    rect2.translate(300);

    var link = new joint.dia.Link({
        source: { id: rect.id },
        target: { id: rect2.id },
        labels: [
        { position: 25, attrs: { text: { text: '1..n' } }},
        { position: 0.45, attrs: { text: { text: 'multiple', fill: 'white', 'font-family': 'sans-serif' }, rect: { stroke: '#31d0c6', 'stroke-width': 20, rx: 5, ry: 5 } }},
        { position: -25, attrs: { text: { text: '*' } }}
    ]
    });
    
var uses = new joint.shapes.erd.Relationship({

    position: { x: 0,y: 0 },
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
    graph.addCells([rect, rect2, link,uses]);
    
	//var text=JSON.stringify(graph.toJSON());
	function tojson(){
		var content=window.document.getElementById("show");
		
		content.innerHTML=text;
	alert(JSON.stringify(graph.toJSON()));
	} 
	function fromjson(){
		//var textjson='{"cells":[{"type":"basic.Rect","position":{"x":100,"y":30},"size":{"width":100,"height":30},"angle":0,"id":"3a32d116-285b-44d2-978b-668fe2b20af4","z":1,"attrs":{"rect":{"fill":"blue"},"text":{"fill":"white","text":"my box"}}},{"type":"basic.Rect","position":{"x":400,"y":30},"size":{"width":100,"height":30},"angle":0,"id":"87161223-9b51-42f1-b4a6-5968f126c7e4","embeds":"","z":2,"attrs":{"rect":{"fill":"blue"},"text":{"fill":"white","text":"my box"}}},{"type":"link","source":{"id":"3a32d116-285b-44d2-978b-668fe2b20af4"},"target":{"id":"87161223-9b51-42f1-b4a6-5968f126c7e4"},"id":"55e7721b-1895-49ca-a80a-a5beb088c81f","z":3,"attrs":{}}]}';
		var textjson=JSON.stringify(graph.toJSON());
		var content=window.document.getElementById("show");
		
		content.innerHTML=textjson;
		graph.fromJSON(JSON.parse(textjson));
	}
  </script>
  <button type="button" onclick="tojson();">tojson</button>
  <button type="button" onclick="fromjson();">fromjson</button>
  <div id="show"></div>
</body>

</html>
