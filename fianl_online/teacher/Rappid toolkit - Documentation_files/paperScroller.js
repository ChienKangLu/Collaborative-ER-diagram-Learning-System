(function() {

    var graph = new joint.dia.Graph;

    var $app = $('#mytt');

    var paper = new joint.dia.Paper({
        width: 800,
        height: 800,
        gridSize: 1,
        model: graph
    });

    var paperScroller = new joint.ui.PaperScroller({
        autoResizePaper: true,
        padding: 50,
        paper: paper
    });

    // Initiate panning when the user grabs the blank area of the paper.
    paper.on('blank:pointerdown', paperScroller.startPanning);

    paperScroller.$el.css({
        width: 400,
        height: 300
    });

    $app.append(paperScroller.render().el);

    // Example of centering the paper.
    paperScroller.center();


    var r = new joint.shapes.basic.Rect({ 
        position: { x: 300, y: 300 }, size: { width: 90, height: 60 },
        attrs: { rect: { fill: '#31D0C6', stroke: '#4B4A67', 'stroke-width': 2 }, text: { text: 'rect', fill: 'white' } }
    });
    var c = new joint.shapes.basic.Circle({ 
        position: { x: 400, y: 400 }, size: { width: 90, height: 60 },
        attrs: { circle: { fill: '#FE854F', 'stroke-width': 2, stroke: '#4B4A67' }, text: { text: 'ellipse', fill: 'white' } }
    });

    graph.addCells([r, c]);

    // Toolbar buttons.

    $('#btn-center').on('click', _.bind(paperScroller.center, paperScroller));
    $('#btn-center-content').on('click', _.bind(paperScroller.centerContent, paperScroller));

    $('#btn-zoomin').on('click', function() {
        paperScroller.zoom(0.2, { max: 2 });
    });
    $('#btn-zoomout').on('click', function() {
        paperScroller.zoom(-0.2, { min: 0.2 });
    });
    $('#btn-zoomtofit').on('click', function() {
        paperScroller.zoomToFit({
            minScale: 0.2,
            maxScale: 2
        });
    });
    //fromjson3()
    	function fromjson3(text){
		//var textjson='{"cells":[{"type":"basic.Rect","position":{"x":100,"y":30},"size":{"width":100,"height":30},"angle":0,"id":"3a32d116-285b-44d2-978b-668fe2b20af4","z":1,"attrs":{"rect":{"fill":"blue"},"text":{"fill":"white","text":"my box"}}},{"type":"basic.Rect","position":{"x":400,"y":30},"size":{"width":100,"height":30},"angle":0,"id":"87161223-9b51-42f1-b4a6-5968f126c7e4","embeds":"","z":2,"attrs":{"rect":{"fill":"blue"},"text":{"fill":"white","text":"my box"}}},{"type":"link","source":{"id":"3a32d116-285b-44d2-978b-668fe2b20af4"},"target":{"id":"87161223-9b51-42f1-b4a6-5968f126c7e4"},"id":"55e7721b-1895-49ca-a80a-a5beb088c81f","z":3,"attrs":{}}]}';
		//var textjson='{"cells":[{"type":"basic.Rect","position":{"x":0,"y":20},"size":{"width":100,"height":60},"angle":0,"id":"38f90e3e-041b-4853-ab16-365e74cf87b5","z":0,"attrs":{"rect":{"fill":"#27AE60","width":50,"height":30,"rx":2,"ry":2},"text":{"font-size":10,"text":"rect","fill":"white"}}},{"type":"basic.Rect","position":{"x":300,"y":20},"size":{"width":100,"height":60},"angle":0,"id":"a51f6ea2-e7af-4441-874b-de434ab06bc6","embeds":"","z":1,"attrs":{"rect":{"fill":"#27AE60","width":50,"height":30,"rx":2,"ry":2},"text":{"font-size":10,"text":"rect","fill":"white"}}},{"type":"link","source":{"id":"38f90e3e-041b-4853-ab16-365e74cf87b5"},"target":{"id":"a51f6ea2-e7af-4441-874b-de434ab06bc6"},"id":"177cbd40-a88d-43fe-9653-0b5e399d716e","z":2,"attrs":{}},{"type":"erd.Relationship","size":{"width":80,"height":80},"position":{"x":168,"y":19},"angle":0,"id":"64c4c00e-c359-45eb-aaec-87ffc3afca48","z":3,"attrs":{".outer":{"fill":"#797d9a","stroke":"none","filter":{"name":"dropShadow","args":{"dx":0,"dy":2,"blur":1,"color":"#333333"}}},"text":{"text":"Uses","fill":"#ffffff","letter-spacing":0,"style":{"text-shadow":"1px 0 1px #333333"}}}}]}';
		//var textjson=JSON.stringify(graph.toJSON());
		//var textjson='{"cells":[{"type":"basic.Rect","position":{"x":0,"y":20},"size":{"width":100,"height":60},"angle":0,"id":"38f90e3e-041b-4853-ab16-365e74cf87b5","z":0,"attrs":{"rect":{"fill":"#27AE60","width":50,"height":30,"rx":2,"ry":2},"text":{"font-size":10,"text":"rect","fill":"white"}}},{"type":"basic.Rect","position":{"x":300,"y":20},"size":{"width":100,"height":60},"angle":0,"id":"a51f6ea2-e7af-4441-874b-de434ab06bc6","embeds":"","z":1,"attrs":{"rect":{"fill":"#27AE60","width":50,"height":30,"rx":2,"ry":2},"text":{"font-size":10,"text":"rect","fill":"white"}}},{"type":"link","source":{"id":"38f90e3e-041b-4853-ab16-365e74cf87b5"},"target":{"id":"a51f6ea2-e7af-4441-874b-de434ab06bc6"},"id":"177cbd40-a88d-43fe-9653-0b5e399d716e","z":2,"attrs":{}},{"type":"erd.Relationship","size":{"width":80,"height":80},"position":{"x":168,"y":19},"angle":0,"id":"64c4c00e-c359-45eb-aaec-87ffc3afca48","z":3,"attrs":{".outer":{"fill":"#797d9a","stroke":"none","filter":{"name":"dropShadow","args":{"dx":0,"dy":2,"blur":1,"color":"#333333"}}},"text":{"text":"Uses","fill":"#ffffff","letter-spacing":0,"style":{"text-shadow":"1px 0 1px #333333"}}}}]}';
		//var textjson='{"cells":[{"type":"basic.Rect","position":{"x":0,"y":20},"size":{"width":100,"height":60},"angle":0,"id":"38f90e3e-041b-4853-ab16-365e74cf87b5","z":0,"attrs":{"rect":{"fill":"#27AE60","width":50,"height":30,"rx":2,"ry":2},"text":{"font-size":10,"text":"rect","fill":"white"}}},{"type":"basic.Rect","position":{"x":300,"y":20},"size":{"width":100,"height":60},"angle":0,"id":"a51f6ea2-e7af-4441-874b-de434ab06bc6","embeds":"","z":1,"attrs":{"rect":{"fill":"#27AE60","width":50,"height":30,"rx":2,"ry":2},"text":{"font-size":10,"text":"rect","fill":"white"}}},{"type":"link","source":{"id":"38f90e3e-041b-4853-ab16-365e74cf87b5"},"target":{"id":"a51f6ea2-e7af-4441-874b-de434ab06bc6"},"id":"177cbd40-a88d-43fe-9653-0b5e399d716e","z":2,"attrs":{}},{"type":"erd.Relationship","size":{"width":80,"height":80},"position":{"x":167,"y":10},"angle":0,"id":"64c4c00e-c359-45eb-aaec-87ffc3afca48","z":3,"attrs":{".outer":{"fill":"#797d9a","stroke":"none","filter":{"name":"dropShadow","args":{"dx":0,"dy":2,"blur":1,"color":"#333333"}}},"text":{"text":"Uses","fill":"#ffffff","letter-spacing":0,"style":{"text-shadow":"1px 0 1px #333333"}}}}]}';
        
		//var content=window.document.getElementById("show");
		//var textjson=content.innerHTML;
		//content.innerHTML=textjson;
		graph.fromJSON(JSON.parse(text));
		/*
		zoom(paper2, zoomLevel - 0.2);
		zoom(paper2, zoomLevel - 0.2);
		zoom(paper2, zoomLevel - 0.2);
		zoom(paper2, zoomLevel - 0.2);
		zoom(paper2, zoomLevel - 0.2);
		*/
	}
}())
