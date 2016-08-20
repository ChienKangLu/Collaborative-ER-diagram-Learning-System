<?php
session_start();
?>
<html>
<head>
<title></title>
<meta name="" content="" charset="UTF-8">

<link rel="stylesheet" href="css/bootstrap.css">
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery.js"></script>
<script type="text/javascript" src="js/collapse.js"></script>
<script type="text/javascript" src="myjs/mydropdown.js"></script>
<script type="text/javascript" src="myjs/myactive.js"></script>
<link rel="stylesheet" href="mycss/mybreadcrumb.css">
		
        <link rel="stylesheet" type="text/css" href="meteor-myjointjs-master/lib/css/joint.css" />
        <link rel="stylesheet" type="text/css" href="meteor-myjointjs-master/lib/css/joint.ui.stencil.css" />
        <link rel="stylesheet" type="text/css" href="meteor-myjointjs-master/lib/css/joint.ui.halo.css" />
        <link rel="stylesheet" type="text/css" href="meteor-myjointjs-master/lib/css/joint.ui.selectionView.css" />
        <link rel="stylesheet" type="text/css" href="meteor-myjointjs-master/lib/css/joint.ui.paperScroller.css" />
        <link rel="stylesheet" type="text/css" href="meteor-myjointjs-master/test/style.css" />
        <link rel="stylesheet" type="text/css" href="meteor-myjointjs-master/test/theme-dark.css" />
        

<style>
</style>

<script>


	
</script>
</head>
<body style="padding-bottom: 200;background-image: url('imagesL119FYI5.jpg');background-attachment: fixed; background-size: auto;" ><!--background-image: url('imagesL119FYI5.jpg');background-attachment: fixed; background-size: auto; -->
<?php
include("mydb.php");
?>
<?php
include("top.php");
?>
<br/>
<div class="toolbar">
            <button id="btn-undo"           class="btn">undo</button>
            <button id="btn-redo"           class="btn">redo</button>
            <button id="btn-clear"          class="btn">clear</button>
            <button id="btn-svg"            class="btn">open as SVG</button>
            <button id="btn-zoom-in"        class="btn">zoom in</button>
            <button id="btn-zoom-out"       class="btn">zoom out</button>
            <button id="btn-find-element"   class="btn">find element</button>
            <button id="btn-center-content" class="btn">center content</button>
            <button id="btn-layout"         class="btn">layout</button>
            <button id="btn-group"          class="btn">group</button>
            <button id="btn-ungroup"        class="btn">ungroup</button>
        </div>
		<div id="stencil">
        	<label>Stencil</label>
        </div>
        <div id="paper"></div>
        <div id="inspector-holder-create ">
        	<div class="inspector">
        		
        	</div>
        </div>
        <!--<div id="inspector-holder-create"></div>-->
        <!--<div id="message"></div>-->
        <!--<div class="inspector">-->
        <!--    <div id="layout"></div>-->
        <!--</div>-->

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
        <script src="meteor-myjointjs-master/lib/ElementInspector.js"></script>
        



        <script src="meteor-myjointjs-master/test/main.js"></script>

<?php
include("footer.php");
?>

</body>

</html>