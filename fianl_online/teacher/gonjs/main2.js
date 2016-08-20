var graph2 = new joint.dia.Graph;

// Create a paper and wrap it in a PaperScroller.
// ----------------------------------------------

var paperScroller2 = new joint.ui.PaperScroller({
    autoResizePaper: true
});
//var $app = $('#myholder');
var paper2 = new joint.dia.Paper({
    el: paperScroller2.el,
    width: 1000,
    height: 1000,
    gridSize: 10,
    perpendicularLinks: true,
    model: graph2
});

paperScroller2.options.paper = paper2;

$('#myholder').append(paperScroller2.render().el);

paperScroller2.center();

paperScroller2.pan();
paper2.on('blank:pointerdown', paperScroller2.startPanning);



var zoomLevel = 1;

function zoom(paper, newZoomLevel) {

    if (newZoomLevel > 0.2 && newZoomLevel < 20) {

	var ox = (paper.el.scrollLeft + paper.el.clientWidth / 2) / zoomLevel;
	var oy = (paper.el.scrollTop + paper.el.clientHeight / 2) / zoomLevel;

	paper.scale(newZoomLevel, newZoomLevel, ox, oy);

	zoomLevel = newZoomLevel;
    }
}

$('#btn-zoom-in2').on('click', function() { zoom(paper2, zoomLevel + 0.2); });
$('#btn-zoom-out2').on('click', function() { zoom(paper2, zoomLevel - 0.2); });

function tojson2(){
		var text=JSON.stringify(graph2.toJSON());
    return text;
	} 
	function fromjson2(text){
		
		graph2.fromJSON(JSON.parse(text));
	}
	
