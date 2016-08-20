<!DOCTYPE html>
<?php
session_start();

include_once ("mydb2.php");
include_once ("myphpfuntion.php");

    /*
    $str="SELECT * FROM ques_entity a left join entity b on a.entityid=b.entityid where quesid=".$ques[0][0];
    $result=myquery($str,$link2);

    foreach($result as $now){
       // echo $now[0]."~".$now[1]."~".$now[3]."</br>";
        $entity[]=$now[3];
    }
    
    $str="SELECT * FROM ques_relation a left join relation b on a.relationid=b.relationid where quesid=".$ques[0][0];
    $result=myquery($str,$link2);
    
     foreach($result as $now){
       // echo $now[0]."~".$now[1]."~".$now[3]."</br>";
        $relation[]=$now[3];
    }
    */
    
    
    



?>
    <html>

    <head>
        <meta charset="utf8" />
        
  <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>My Test</title>
        <link rel="stylesheet" type="text/css" href="meteor-myjointjs-master/lib/joint.css" />
        <link rel="stylesheet" type="text/css" href="meteor-myjointjs-master/lib/joint.ui.stencil.css" />
        <link rel="stylesheet" type="text/css" href="meteor-myjointjs-master/lib/joint.ui.halo.css" />
        <link rel="stylesheet" type="text/css" href="meteor-myjointjs-master/lib/joint.ui.selectionView.css" />
        <link rel="stylesheet" type="text/css" href="meteor-myjointjs-master/lib/joint.ui.paperScroller.css" />
        <link rel="stylesheet" type="text/css" href="gonjs/style.css" />
        <link rel="stylesheet" type="text/css" href="gonjs/style2.css" />
        <link rel="stylesheet" type="text/css" href="gonjs/theme-dark.css" />
        <!--
		<link rel="stylesheet" href="css/bootstrap.css">
		<script type="text/javascript" src="js/bootstrap.min.js"></script>
		<script src="https://code.jquery.com/jquery.js"></script>
		<script type="text/javascript" src="js/collapse.js"></script>
		<script type="text/javascript" src="myjs/myactive.js"></script>-->

        <link rel="stylesheet" href="mycss/mybreadcrumb.css">
        <script>
		SVGElement.prototype.getTransformToElement = SVGElement.prototype.getTransformToElement || function(toElement) {
return toElement.getScreenCTM().inverse().multiply(this.getScreenCTM());
};
            
		</script>

<!--
        <link href="http://libs.baidu.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet">
        <script src="http://libs.baidu.com/jquery/2.0.0/jquery.min.js"></script>
        <script src="http://libs.baidu.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
        -->
        
        
          <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        
        <link href="startbootstrap-scrolling-nav-gh-pages/css/scrolling-nav.css" rel="stylesheet">



        <script src="mytest/transfer.js"></script>
        <script src="myajaxfunction.js"></script>

    
        <style>
            #myTabs li{
                cursor:pointer;
            }
        </style>
        <!--<script src="MM_JAVASCRIPT2E/_js/jquery-1.7.2.min.js"></script>-->



    </head>

    <body style="margin: 0px;padding: 0px;" data-spy="scroll">


        <!--style="padding-bottom: 200;"-->
        <?php
		//include ("mydb.php");
		?>

            <div id="topup"></div>
            
   
    <?php
		include ("top_manage.php");
    ?>
		



                <script>
                    /*
                        var x = document.createElement("INPUT");
                        x.setAttribute("type", "text");
                        x.setAttribute("value", "Hello World!");
                        document.body.appendChild(x);
                        
                        var x = document.createElement("INPUT");
                        x.setAttribute("type", "text");
                        x.setAttribute("value", "Hello World!");
                        document.body.appendChild(x);
                        */
                </script>
                <div class="container" style="width:100%;" style="margin: 0px;padding: 0px; ">
                    <div class="row" style="margin-bottom:10px;" align="center">
                    <select  class="CHOOSE" id="ques"  title="choose" onchange="changeques();">
                    </select>
                            <!-- Latest compiled and minified CSS -->
<!--    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.9.3/css/bootstrap-select.min.css">-->

    <!-- Latest compiled and minified JavaScript -->
<!--    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.9.3/js/bootstrap-select.min.js"></script>-->
    
        <script>
                    function option(value, name) {
                        var txt;
                        txt = '<option value="' + value + '" data-subtext="">' + name + '</option>';
                        return txt;
                    }
            selectallques2();
        </script>
                      </div>
                    <div class="row" style="margin: 0px;padding: 0px; " align="center">
                        <div class="col-md-2">
                            <div id="stencil"></div>

                            <hr style="border-color: #123456;" />
                            <button id="save" type="button" class="btn btn-primary" style="margin: 5px;display: block;width: 180px;" >                                  <!--把json轉為矩陣-->
                               <!--savetodb(jsontext,id,quesid,maxtix)-->
                                save
                            </button>
                            <script>
                                save.onclick=function(){  
                                      var ent=JSON.parse(document.getElementById("json").innerHTML,true);
                                      var data=ent[0];
                                      var jsArray = data;
                                      //alert(jsArray);
                                      //var entity_name=new Array("老師","學生","醫生","教士","醫院","病人","校長","教室","主任","隊長");
                                    
                                      saveteacheranswer(tojson(),124,ques,jsArray);
                                    
                                };  
                            </script>
                            <button id="btn-clear" type="button" class="btn btn-primary" style="margin: 5px;display: block; width: 180px;">
                                clear paper
                            </button>

                        </div>
                        <div class="col-md-7" style="border: 2px solid #080808;margin: 0px;">
                           <!--
                            <div style="position: absolute;z-index: 1000;left: 45%;top:15px;">
                                <label>Edit text</label>
                                <input type="text" id="sketch-state-name" />
                            </div>

                            <div style="position: absolute;z-index: 1000;left: 30%;top:15px;">
                                <label>font size</label>
                                <input type="number" id="myfontsize" style="width: 40px;" />
                            </div>-->

                            <div style="position: absolute;z-index: 1000;left: 10%;top:10px;">
                                <button id="btn-undo" class="btn btn-default" aria-label="Left Align">
                                    <span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span>
                                </button>

                            </div>

                            <div style="position: absolute;z-index: 1000;left: 20%;top:10px;">
                                <button id="btn-redo" class="btn btn-default" aria-label="Left Align">
                                    <span class="glyphicon glyphicon-arrow-right" aria-hidden="true"></span>
                                </button>

                            </div>
                            <div id="paper"></div>
                        </div>

                        <div class="col-md-3">
<div>

  <!-- Nav tabs -->
  <ul id="myTabs" class="nav nav-tabs" role="tablist">
    <li class="active"><a>題目</a></li>
    <li ><a>聊天室</a></li>
    <!--<li><a>Messages</a></li>-->
  </ul>

  <!-- Tab panes -->
  <div id="myTabspannel" class="tab-content">
    <div class="tab-pane active"  style="overflow: scroll;height:500px;">
        <h3><b>題目</b></h3>
        
           <pre style="text-align:left;">內容</pre>
        
        <p>
            tips
        </p>
    </div>
    <div class="tab-pane">
       
    </div>
    <!--<div class="tab-pane">3</div>-->
  </div>

</div>
<script>
    
    $('#myTabs li').click( function() {
         //GEt the current element
         var current = $(this);
        var bd = current.index();  
        //alert(bd);
        $('#myTabs li').removeClass('active');
        $('#myTabspannel div').removeClass('active');
        current.addClass("active");
        $("#myTabspannel div:eq("+bd+")").addClass("active");

    });
    //$('.active').removeClass('active');
    //$('#myTabs li:eq(2)').addClass("active");
    //$('#myTabs li:eq(0)').removeClass("active");

                            </script>
<!----><!----><!----><!----><!----><!----><!----><!----><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->
                        </div>
                    </div>
  

                </div>





                <script src="meteor-myjointjs-master/lib/joint.js"></script>
                <script src="meteor-myjointjs-master/lib/joint.shapes.devs.js"></script>
                <script src="meteor-myjointjs-master/lib/joint.shapes.uml.js"></script>
                <script src="meteor-myjointjs-master/lib/joint.ui.halo.js"></script>
                <script src="meteor-myjointjs-master/lib/joint.ui.selectionView.js"></script>
                <script src="meteor-myjointjs-master/lib/joint.ui.clipboard.js"></script>
                <script src="meteor-myjointjs-master/lib/joint.ui.stencil.js"></script>
                <script src="meteor-myjointjs-master/lib/joint.ui.paperScroller.js"></script>
                <script src="meteor-myjointjs-master/lib/joint.format.svg.js"></script>
                <script src="meteor-myjointjs-master/lib/joint.dia.command.js"></script>
                <script src="meteor-myjointjs-master/lib/joint.dia.validator.js"></script>



                <script src="jointroot/joint.shapes.erd.js"></script>


                <!--<iframe src="#" frameborder="0"  scrolling="yes" width="100% "height="450 "name="iframe_a"></iframe>-->
      

      <script>
          
         // tt=Array(<?php echo"'陸','建','綱'";?>);//給定entity
         
         // alert(tt[0]);
          var graph = new joint.dia.Graph;

// Create a paper and wrap it in a PaperScroller.
// ----------------------------------------------

var paperScroller = new joint.ui.PaperScroller({
    autoResizePaper: true
});

var paper = new joint.dia.Paper({
    el: paperScroller.el,
    width: 1000,
    height: 1000,
    gridSize: 10,
    perpendicularLinks: true,
    model: graph
});

paperScroller.options.paper = paper;

$('#paper').append(paperScroller.render().el);

paperScroller.center();

paperScroller.pan();
paper.on('blank:pointerdown', paperScroller.startPanning);

// Create and populate stencil.
// ----------------------------

var stencil = new joint.ui.Stencil({ 
	graph: graph
	,paper: paper
	,width: 200
	,height: 450
	,groups: {
		simple: { label: 'entity', index: 1, closed: false }
		,custom: { label: 'relation', index: 2, closed: true }
		,Cardinality: { label: 'Cardinality', index: 3, closed: true }
		//,Attribute:{ label: 'Attribute', index: 4, closed: true }
	}
});

$('#stencil').append(stencil.render().el);

var w  = new joint.shapes.basic.Circle({
    position: { x: 0, y: 10 },
    size: { width: 30, height: 30 },
    attrs: {
        circle: { width: 15, height: 15, fill: '#E74C3C' },
        text: { text: '0', fill: 'white', 'font-size': 10 }
    }
});
var w2  = new joint.shapes.basic.Circle({
    position: { x: 0, y: 60 },
    size: { width: 30, height: 30 },
    attrs: {
        circle: { width: 15, height: 15, fill: '#E74C3C' },
        text: { text: 'N', fill: 'white', 'font-size': 10 }
    }
});
var w3  = new joint.shapes.basic.Circle({
    position: { x: 0, y: 110 },
    size: { width: 30, height: 30 },
    attrs: {
        circle: { width: 15, height: 15, fill: '#E74C3C' },
        text: { text: '1', fill: 'white', 'font-size': 10 }
    }
});

function myrect(x,y,name){
           var r= new joint.shapes.basic.Rect({
                            position: { x: x, y: y},
                            size: { width: 70, height: 40 },
                            attrs: {
                            rect: { rx: 2, ry: 2, width: 50, height: 30, fill: '#27AE60' },
                            text: { text:  name, fill: 'white', 'font-size': 10 }
                            }
                        });
            return r;
}
function myrel(x,y,name){
          var uses= new joint.shapes.erd.Relationship({
                        position: { x: x,y: y},
                        size: { width: 70, height: 40 },
                        attrs: {
                            text: {
                                fill: '#ffffff',
                                text: name,
                                'letter-spacing': 0,
                                style: { 'text-shadow': '1px 0 1px #333333' }
                            },
                            '.outer': {
                                fill: '#797d9a',
                                stroke: 'none',
                                filter: { name: 'dropShadow',  args: { dx: 0, dy: 2, blur: 1, color: '#333333' }}
                            }
                        }
    
                      }
                    );
    return uses;
}
function mycard(x,y,text){
    var card=new joint.shapes.basic.Circle({
                position: { x: x, y: y },
                size: { width: 30, height: 30 },
                attrs: {
                    circle: { width: 15, height: 15, fill: '#E74C3C' },
                    text: { text: text, fill: 'white', 'font-size': 10 }
                }
            });
    return card;
}
//var entity=new Array();
          //entity.push(myrect(0,50,"哈哈2"));
//var relationship=new Array();
          //relationship.push(myrel(0,10,"哈哈"));
//var cardinary=Array(w,w2,w3);
//stencil.load(entity, 'simple');//rr
//stencil.load(relationship, 'custom');
//stencil.load(cardinary,'Cardinality');//[w,w2,w3,w4]
          
/////////////////////core/////////////////////////////////////////////////////////////////
var ques=1;
selecques(ques);
selecontent(ques);
getquesjson(ques);
/////////////////////core/////////////////////////////////////////////////////////////////         
var selection = new Backbone.Collection;

var selectionView = new joint.ui.SelectionView({
    paper: paper,
    graph: graph,
    model: selection
});


// Initiate selecting when the user grabs the blank area of the paper while the Shift key is pressed.
// Otherwise, initiate paper pan.
/*
paper.on('blank:pointerdown', function(evt, x, y) {

  //  alert('pointerdown on a blank area in the paper.')
    if (_.contains(KeyboardJS.activeKeys(), 'shift')) {
        selectionView.startSelecting(evt, x, y);
    } else {
        paperScroller.startPanning(evt, x, y);
    }
    
});
*/
paper.on('cell:pointerdown', function(cellView, evt) {
    // Select an element if CTRL/Meta key is pressed while the element is clicked.
    if ((evt.ctrlKey || evt.metaKey) && !(cellView.model instanceof joint.dia.Link)) {
        selectionView.createSelectionBox(cellView);
        selection.add(cellView.model);
    }
});

selectionView.on('selection-box:pointerdown', function(evt) {
    // Unselect an element if the CTRL/Meta key is pressed while a selected element is clicked.
    if (evt.ctrlKey || evt.metaKey) {
        var cell = selection.get($(evt.target).data('model'));
        selectionView.destroySelectionBox(paper.findViewByModel(cell));
        selection.reset(selection.without(cell));
    }
});

// Disable context menu inside the paper.
// This prevents from context menu being shown when selecting individual elements with Ctrl in OS X.
paper.el.oncontextmenu = function(evt) { evt.preventDefault(); };

// enable link inspector
paper.on('link:options', function(evt, cellView, x, y) {
    // Here you can create an inspector for the link the same way as it is done for normal elements.
    console.log('link inspector');
});



// An example of a simple element editor.
// --------------------------------------



// Halo - element tools.
// ---------------------

paper.on('cell:pointerdblclick ', 
    function(cellView, evt, x, y) {
      //  alert('cell view ' + cellView.model.id + ' was clicked');
		var content=window.document.getElementById("sketch-state-name");
		
		var fontsize=window.document.getElementById("myfontsize");
        cellView.model.attr('text/text',content.value);
        cellView.model.attr('text/font-size',fontsize.value);       
        
        
    }
);

paper.on('cell:pointerup', function(cellView, evt) {

    if (cellView.model instanceof joint.dia.Link || selection.contains(cellView.model)) return;
    
    var halo = new joint.ui.Halo({
        graph: graph,
        paper: paper,
        cellView: cellView,
        linkAttributes: {
        '.marker-source': { fill: '#4b4a67', stroke: '#4b4a67' },//M 10 0 L 0 5 L 10 10 z
        '.marker-target': { fill: '#4b4a67', stroke: '#4b4a67' }
        
       // '.connection': { stroke: 'blue' },
        }
        
    });

    halo.render();
	//createInspector(cellView);
	
});



// Command Manager - undo/redo.
// ----------------------------

var commandManager = new joint.dia.CommandManager({ graph: graph });

// Validator
// ---------
// nothing

// Hook on toolbar buttons.
// ------------------------

$('#btn-undo').on('click', _.bind(commandManager.undo, commandManager));
$('#btn-redo').on('click', _.bind(commandManager.redo, commandManager));
$('#btn-clear').on('click', _.bind(graph.clear, graph));
$('#btn-svg').on('click', function() {
    paper.openAsSVG();
    console.log(paper.toSVG()); // An exmaple of retriving the paper SVG as a string.
});
$('#btn-find-element, #btn-layout, #btn-group, #btn-ungroup').on('click', function() {
    alert('not ready yet');
});
$('#btn-center-content').click(function(){
	paperScroller.centerContent();
});


var zoomLevel = 1;

function zoom(paper, newZoomLevel) {

    if (newZoomLevel > 0.2 && newZoomLevel < 20) {

	var ox = (paper.el.scrollLeft + paper.el.clientWidth / 2) / zoomLevel;
	var oy = (paper.el.scrollTop + paper.el.clientHeight / 2) / zoomLevel;

	paper.scale(newZoomLevel, newZoomLevel, ox, oy);

	zoomLevel = newZoomLevel;
    }
}

$('#btn-zoom-in').on('click', function() { zoom(paper, zoomLevel + 0.2); });
$('#btn-zoom-out').on('click', function() { zoom(paper, zoomLevel - 0.2); });


function tojson(){
		var text=JSON.stringify(graph.toJSON());
	//alert(text);
		var content=window.document.getElementById("show");
		
		content.innerHTML=text;
    return text;
	} 
	function fromjson(textjson){
	
		var content=window.document.getElementById("show");
		
		content.innerHTML=textjson;
		graph.fromJSON(JSON.parse(textjson));
	}
    function changeques() {
            var quesid= document.getElementById("ques").value;
            ques=quesid;
            
            selecques(quesid);
            selecontent(quesid);
        getquesjson(quesid);
    }

      </script>



            <div id="mytool" style="display:none">

              <div id="show"></div>
              <div id="json"></div>
              
            </div>
            
        </div>
    </body>
    

 <script src="startbootstrap-scrolling-nav-gh-pages/js/jquery.easing.min.js"></script>
    <!-- Scrolling Nav JavaScript -->
    <script src="startbootstrap-scrolling-nav-gh-pages/js/scrolling-nav.js"></script>
</html>