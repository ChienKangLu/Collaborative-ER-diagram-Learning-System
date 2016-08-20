<!DOCTYPE html>
<?php
include_once ("mydb2.php");
include_once ("myphpfuntion.php");


?>
    <html>

    <head>
        <meta charset="utf8" />

        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>My Test</title>
        <link rel="stylesheet" type="text/css" href="meteor-myjointjs-master/lib/joint.css" />
        <link rel="stylesheet" type="text/css" href="meteor-myjointjs-master/lib/joint.ui.paperScroller.css" />
        <link rel="stylesheet" type="text/css" href="gonjs/style2.css" />


        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <link rel="stylesheet" href="mycss/mybreadcrumb.css">
        <link href="http://libs.baidu.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet">
        <script src="http://libs.baidu.com/jquery/2.0.0/jquery.min.js"></script>
        <script src="http://libs.baidu.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
        <link href="startbootstrap-scrolling-nav-gh-pages/css/scrolling-nav.css" rel="stylesheet">
        <link rel="stylesheet" href="gonjs/mydrop.css">

        <script src="mytest/transfer.js"></script>
        <script src="myajaxfunction.js"></script>
        
       <!-- <script src="MM_JAVASCRIPT2E/_js/jquery-1.7.2.min.js"></script>-->
 <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.9.3/css/bootstrap-select.min.css">


    <!--<link rel="stylesheet" href="./Rappid toolkit - Documentation_files/rappid.min.css">-->


<style>
            .CHOOSE {
            margin: 10px;
        }
    .fixed{
        position:relative;
        
    }
/*       .bootstrap-select .dropdown-menu{
    position:relative;
}*/
    .myfix2{
        position:relative;
        padding-top:40px;
        margin-left:-35px;
        list-style:none;
        text-align:left;   
    }
    
    .myfix2 li{
        width: 10px;
    }
    .dropdown-menu>li>a {
        !important
    padding: 0px 0px;
    
}
    .row-height {
  display: table;
  table-layout: fixed;
  height: 100%;
  width: 100%;
}
.col-height {
  display: table-cell;
  float: none;
  height: 100%;
}
    .scrollable-menu {
    height: auto;
    max-height: 200px;
    overflow-x: hidden;
}
::-webkit-scrollbar {
    -webkit-appearance: none;
}

::-webkit-scrollbar:vertical {
    width: 12px;
}

::-webkit-scrollbar:horizontal {
    height: 12px;
}

::-webkit-scrollbar-thumb {
    background-color: rgba(0, 0, 0, .5);
    border-radius: 10px;
    border: 2px solid #ffffff;
}

::-webkit-scrollbar-track {
    border-radius: 10px;  
    background-color: #ffffff; 
}
    
        </style>
    </head>

 <body >

<script>
    
/* When the user clicks on the button, 
toggle between hiding and showing the dropdown content */
function myFunction(id) {
    document.getElementById(id).classList.toggle("show");
}

// Close the dropdown if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {

    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}
</script>
    <!--style="padding-bottom: 200;"-->
                                               
    <?php
            include ("top_manage.php");
        ?>
        
        <script>
           
            
            var quesid=1;
            getallgroupic(quesid);
            
            function changeques() {
                var x = document.getElementById("ques").value;
               // alert(x);
                quesid=x;
                getallgroupic(quesid);
                //document.getElementById("demo").innerHTML = "You selected: " + x;
            }
        </script>
        <div class="container" style="width:100%;" style="margin: 0px;padding: 0px; ">
          <div class="row" style="margin: 0px;padding-top: 10dp;">
<!--
                    <div class="col-xs-3">
                        <input class="form-control" id="num" type="text" name="email" size="10" placeholder="請輸入組別個數">
                    </div>
                    <div class="col-xs-6">
                        <button id="group" class="btn btn-success ">
                            <span class="glyphicon glyphicon glyphicon-th-large"></span> 產生組別
                        </button>
                    </div>-->
                    <div class="col-xs-5 col-md-5 text-center">
                    <select  class="CHOOSE selectpicker" data-live-search="true" id="ques" title="問題" onchange="changeques();">
                        <option value="1">題目1</option><!--data-subtext="陸建綱"-->
                        <option value="2">題目2</option><!--data-subtext="陸建綱"-->
                        <option value="3">題目3</option><!--data-subtext="陸建綱"-->
                        <option value="4">題目4</option><!--data-subtext="陸建綱"-->
                    </select>
                    </div>
            </div>
            <div id="about" class="row" style="margin: 0px;padding-top: 10dp;" align="center">

                <div class="col-md-5">
                    <div id="finalshow"></div>
                </div>
                <div class="col-md-7" style="border: 2px solid #080808;margin: 0px;">

                    <div id="myholder" style="top: 100px;" class="paper" ></div>
                </div>
            </div>

        </div>
        
        
        <script src="meteor-myjointjs-master/lib/joint.js"></script>
        <script src="meteor-myjointjs-master/lib/joint.ui.paperScroller.js"></script>
        <script src="meteor-myjointjs-master/lib/joint.dia.command.js"></script>
        <script src="jointroot/joint.shapes.erd.js"></script>
        
        
        
        
        
        
        <script src="gonjs/main2.js"></script>
        
<!-- Latest compiled and minified JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.9.3/js/bootstrap-select.min.js"></script>
        <script>
            selectallques();
        </script>
        <!--顯示code--><script>
            //fromjson2('{"cells":[{"type":"basic.Rect","position":{"x":290,"y":350},"size":{"width":70,"height":40},"angle":0,"id":"09b6f44c-ed85-4e7d-8160-8d3e0a00d921","embeds":"","z":0,"attrs":{"rect":{"fill":"#27AE60","width":50,"height":30,"rx":2,"ry":2},"text":{"font-size":10,"text":"老師","fill":"white"}}},{"type":"basic.Rect","position":{"x":590,"y":340},"size":{"width":70,"height":40},"angle":0,"id":"0d64a5b5-29dc-44e9-9622-80c77eab32d4","embeds":"","z":1,"attrs":{"rect":{"fill":"#27AE60","width":50,"height":30,"rx":2,"ry":2},"text":{"font-size":10,"text":"學生","fill":"white"}}},{"type":"basic.Rect","position":{"x":300,"y":630},"size":{"width":70,"height":40},"angle":0,"id":"f984d204-68da-4eae-81f7-0987fbc610ac","embeds":"","z":2,"attrs":{"rect":{"fill":"#27AE60","width":50,"height":30,"rx":2,"ry":2},"text":{"font-size":10,"text":"教士","fill":"white"}}},{"type":"basic.Rect","position":{"x":560,"y":640},"size":{"width":70,"height":40},"angle":0,"id":"fb5d8d65-ef28-4048-abbe-da8f1212e381","embeds":"","z":3,"attrs":{"rect":{"fill":"#27AE60","width":50,"height":30,"rx":2,"ry":2},"text":{"font-size":10,"text":"醫生","fill":"white"}}},{"type":"erd.Relationship","size":{"width":70,"height":40},"position":{"x":290,"y":480},"angle":0,"id":"64e706f0-3b52-40a5-b3d9-49a1d7cdc0a3","embeds":"","z":4,"attrs":{".outer":{"fill":"#797d9a","stroke":"none","filter":{"name":"dropShadow","args":{"dx":0,"dy":2,"blur":1,"color":"#333333"}}},"text":{"text":"包含","fill":"#ffffff","letter-spacing":0,"style":{"text-shadow":"1px 0 1px #333333"}}}},{"type":"erd.Relationship","size":{"width":70,"height":40},"position":{"x":430,"y":340},"angle":0,"id":"36def20a-1cfb-4816-992c-df2d09ee071d","embeds":"","z":5,"attrs":{".outer":{"fill":"#797d9a","stroke":"none","filter":{"name":"dropShadow","args":{"dx":0,"dy":2,"blur":1,"color":"#333333"}}},"text":{"text":"打掃","fill":"#ffffff","letter-spacing":0,"style":{"text-shadow":"1px 0 1px #333333"}}}},{"type":"erd.Relationship","size":{"width":70,"height":40},"position":{"x":550,"y":480},"angle":0,"id":"2dc7b6c9-5607-45b1-9baa-cee0d5e5259d","embeds":"","z":6,"attrs":{".outer":{"fill":"#797d9a","stroke":"none","filter":{"name":"dropShadow","args":{"dx":0,"dy":2,"blur":1,"color":"#333333"}}},"text":{"text":"加入","fill":"#ffffff","letter-spacing":0,"style":{"text-shadow":"1px 0 1px #333333"}}}},{"type":"erd.Relationship","size":{"width":70,"height":40},"position":{"x":430,"y":640},"angle":0,"id":"0eba2120-041c-40bb-93f6-4d1d521c89c3","embeds":"","z":7,"attrs":{".outer":{"fill":"#797d9a","stroke":"none","filter":{"name":"dropShadow","args":{"dx":0,"dy":2,"blur":1,"color":"#333333"}}},"text":{"text":"防禦","fill":"#ffffff","letter-spacing":0,"style":{"text-shadow":"1px 0 1px #333333"}}}},{"type":"basic.Circle","size":{"width":30,"height":30},"position":{"x":310,"y":420},"angle":0,"id":"2a1cf7ba-2762-48c4-a2cb-9d3111d621b7","embeds":"","z":8,"attrs":{"circle":{"fill":"#E74C3C","width":15,"height":15},"text":{"font-size":10,"text":"0","fill":"white"}}},{"type":"basic.Circle","size":{"width":30,"height":30},"position":{"x":310,"y":560},"angle":0,"id":"bd2b96fb-0054-4d64-aacb-4d4e64598ad6","embeds":"","z":9,"attrs":{"circle":{"fill":"#E74C3C","width":15,"height":15},"text":{"font-size":10,"text":"N","fill":"white"}}},{"type":"basic.Circle","size":{"width":30,"height":30},"position":{"x":380,"y":350},"angle":0,"id":"745df97b-0d61-4cf0-a38d-ff75a07e274a","embeds":"","z":10,"attrs":{"circle":{"fill":"#E74C3C","width":15,"height":15},"text":{"font-size":10,"text":"N","fill":"white"}}},{"type":"basic.Circle","size":{"width":30,"height":30},"position":{"x":520,"y":350},"angle":0,"id":"07fc22d4-59f6-4f9f-974c-7e9290d1a8f6","embeds":"","z":11,"attrs":{"circle":{"fill":"#E74C3C","width":15,"height":15},"text":{"font-size":10,"text":"1","fill":"white"}}},{"type":"basic.Circle","size":{"width":30,"height":30},"position":{"x":580,"y":420},"angle":0,"id":"b0e19379-a71d-4668-ac40-509557b25725","embeds":"","z":12,"attrs":{"circle":{"fill":"#E74C3C","width":15,"height":15},"text":{"font-size":10,"text":"0","fill":"white"}}},{"type":"basic.Circle","size":{"width":30,"height":30},"position":{"x":570,"y":560},"angle":0,"id":"1a62f282-35fc-4c6e-baf0-d5e7c67fe89a","embeds":"","z":13,"attrs":{"circle":{"fill":"#E74C3C","width":15,"height":15},"text":{"font-size":10,"text":"1","fill":"white"}}},{"type":"link","id":"a9b0a6ca-44ef-423c-94e9-1220e71d6dfa","embeds":"","source":{"id":"09b6f44c-ed85-4e7d-8160-8d3e0a00d921"},"target":{"id":"2a1cf7ba-2762-48c4-a2cb-9d3111d621b7"},"z":14,"attrs":{".marker-source":{"fill":"#4b4a67","stroke":"#4b4a67"},".marker-target":{"fill":"#4b4a67","stroke":"#4b4a67"}}},{"type":"link","id":"bd7de7d4-5b79-45cb-9a9c-80ab8f741f99","embeds":"","source":{"id":"64e706f0-3b52-40a5-b3d9-49a1d7cdc0a3"},"target":{"id":"2a1cf7ba-2762-48c4-a2cb-9d3111d621b7"},"z":15,"attrs":{".marker-source":{"fill":"#4b4a67","stroke":"#4b4a67"},".marker-target":{"fill":"#4b4a67","stroke":"#4b4a67"}}},{"type":"link","id":"ae8833fc-074f-4fa4-9e75-dad5a78f2dfa","embeds":"","source":{"id":"bd2b96fb-0054-4d64-aacb-4d4e64598ad6"},"target":{"id":"64e706f0-3b52-40a5-b3d9-49a1d7cdc0a3"},"z":16,"attrs":{".marker-source":{"fill":"#4b4a67","stroke":"#4b4a67"},".marker-target":{"fill":"#4b4a67","stroke":"#4b4a67"}}},{"type":"link","id":"2b2c8795-7f16-452f-8edf-48cc22211d6f","embeds":"","source":{"id":"f984d204-68da-4eae-81f7-0987fbc610ac"},"target":{"id":"bd2b96fb-0054-4d64-aacb-4d4e64598ad6"},"z":17,"attrs":{".marker-source":{"fill":"#4b4a67","stroke":"#4b4a67"},".marker-target":{"fill":"#4b4a67","stroke":"#4b4a67"}}},{"type":"link","id":"27743d31-34e9-48d3-a495-35bda60d149e","embeds":"","source":{"id":"09b6f44c-ed85-4e7d-8160-8d3e0a00d921"},"target":{"id":"745df97b-0d61-4cf0-a38d-ff75a07e274a"},"z":18,"attrs":{".marker-source":{"fill":"#4b4a67","stroke":"#4b4a67"},".marker-target":{"fill":"#4b4a67","stroke":"#4b4a67"}}},{"type":"link","id":"5f98c30c-61b5-4cbb-8e9e-e9b2a6d201bd","embeds":"","source":{"id":"745df97b-0d61-4cf0-a38d-ff75a07e274a"},"target":{"id":"36def20a-1cfb-4816-992c-df2d09ee071d"},"z":19,"attrs":{".marker-source":{"fill":"#4b4a67","stroke":"#4b4a67"},".marker-target":{"fill":"#4b4a67","stroke":"#4b4a67"}}},{"type":"link","id":"9ac0eac1-adf0-4930-a1a1-d2be4e0d34ad","embeds":"","source":{"id":"36def20a-1cfb-4816-992c-df2d09ee071d"},"target":{"id":"07fc22d4-59f6-4f9f-974c-7e9290d1a8f6"},"z":20,"attrs":{".marker-source":{"fill":"#4b4a67","stroke":"#4b4a67"},".marker-target":{"fill":"#4b4a67","stroke":"#4b4a67"}}},{"type":"link","id":"90c1a76c-6536-4e1d-89b8-458c8686b626","embeds":"","source":{"id":"07fc22d4-59f6-4f9f-974c-7e9290d1a8f6"},"target":{"id":"0d64a5b5-29dc-44e9-9622-80c77eab32d4"},"z":21,"attrs":{".marker-source":{"fill":"#4b4a67","stroke":"#4b4a67"},".marker-target":{"fill":"#4b4a67","stroke":"#4b4a67"}}},{"type":"link","id":"c6a4fcc9-eed3-4970-9a1a-eb1c7165212c","embeds":"","source":{"id":"0d64a5b5-29dc-44e9-9622-80c77eab32d4"},"target":{"id":"b0e19379-a71d-4668-ac40-509557b25725"},"z":22,"attrs":{".marker-source":{"fill":"#4b4a67","stroke":"#4b4a67"},".marker-target":{"fill":"#4b4a67","stroke":"#4b4a67"}}},{"type":"link","id":"ed51d21b-e0fc-4879-8a96-ebbbb5940844","embeds":"","source":{"id":"b0e19379-a71d-4668-ac40-509557b25725"},"target":{"id":"2dc7b6c9-5607-45b1-9baa-cee0d5e5259d"},"z":23,"attrs":{".marker-source":{"fill":"#4b4a67","stroke":"#4b4a67"},".marker-target":{"fill":"#4b4a67","stroke":"#4b4a67"}}},{"type":"link","id":"28415916-f05e-432e-9e59-2cdb744f63b4","embeds":"","source":{"id":"2dc7b6c9-5607-45b1-9baa-cee0d5e5259d"},"target":{"id":"1a62f282-35fc-4c6e-baf0-d5e7c67fe89a"},"z":24,"attrs":{".marker-source":{"fill":"#4b4a67","stroke":"#4b4a67"},".marker-target":{"fill":"#4b4a67","stroke":"#4b4a67"}}},{"type":"link","id":"f0168b6b-a0c9-46d5-a623-7dc34d874d3f","embeds":"","source":{"id":"fb5d8d65-ef28-4048-abbe-da8f1212e381"},"target":{"id":"1a62f282-35fc-4c6e-baf0-d5e7c67fe89a"},"z":25,"attrs":{".marker-source":{"fill":"#4b4a67","stroke":"#4b4a67"},".marker-target":{"fill":"#4b4a67","stroke":"#4b4a67"}}},{"type":"basic.Circle","size":{"width":30,"height":30},"position":{"x":390,"y":640},"angle":0,"id":"689d05c2-10c6-4487-91e0-cffb68be182e","embeds":"","z":26,"attrs":{"circle":{"fill":"#E74C3C","width":15,"height":15},"text":{"font-size":10,"text":"0","fill":"white"}}},{"type":"basic.Circle","size":{"width":30,"height":30},"position":{"x":510,"y":640},"angle":0,"id":"87a46d85-cfa9-4281-a472-b2422e3e5a9c","embeds":"","z":27,"attrs":{"circle":{"fill":"#E74C3C","width":15,"height":15},"text":{"font-size":10,"text":"1","fill":"white"}}},{"type":"link","id":"fb4bf1ae-3930-448c-95b6-dbf603ace93d","embeds":"","source":{"id":"f984d204-68da-4eae-81f7-0987fbc610ac"},"target":{"id":"689d05c2-10c6-4487-91e0-cffb68be182e"},"z":28,"attrs":{".marker-source":{"fill":"#4b4a67","stroke":"#4b4a67"},".marker-target":{"fill":"#4b4a67","stroke":"#4b4a67"}}},{"type":"link","id":"519b3c6f-724c-494f-91df-d1c3ef8656e4","embeds":"","source":{"id":"689d05c2-10c6-4487-91e0-cffb68be182e"},"target":{"id":"0eba2120-041c-40bb-93f6-4d1d521c89c3"},"z":29,"attrs":{".marker-source":{"fill":"#4b4a67","stroke":"#4b4a67"},".marker-target":{"fill":"#4b4a67","stroke":"#4b4a67"}}},{"type":"link","id":"032aca24-9680-4fa3-b947-216afbec5da2","embeds":"","source":{"id":"0eba2120-041c-40bb-93f6-4d1d521c89c3"},"target":{"id":"87a46d85-cfa9-4281-a472-b2422e3e5a9c"},"z":30,"attrs":{".marker-source":{"fill":"#4b4a67","stroke":"#4b4a67"},".marker-target":{"fill":"#4b4a67","stroke":"#4b4a67"}}},{"type":"link","id":"130c57ca-23a6-48c9-8d70-b7f0989e5250","embeds":"","source":{"id":"87a46d85-cfa9-4281-a472-b2422e3e5a9c"},"target":{"id":"fb5d8d65-ef28-4048-abbe-da8f1212e381"},"z":31,"attrs":{".marker-source":{"fill":"#4b4a67","stroke":"#4b4a67"},".marker-target":{"fill":"#4b4a67","stroke":"#4b4a67"}}},{"type":"basic.Rect","position":{"x":860,"y":210},"size":{"width":70,"height":40},"angle":0,"id":"24f953cc-63e7-4b93-9cac-5b632ca15835","embeds":"","z":32,"attrs":{"rect":{"fill":"#27AE60","width":50,"height":30,"rx":2,"ry":2},"text":{"font-size":10,"text":"病人","fill":"white"}}},{"type":"erd.Relationship","size":{"width":70,"height":40},"position":{"x":650,"y":200},"angle":0,"id":"cadd5a6d-1e2b-4b31-a117-849d90a5273a","embeds":"","z":33,"attrs":{".outer":{"fill":"#797d9a","stroke":"none","filter":{"name":"dropShadow","args":{"dx":0,"dy":2,"blur":1,"color":"#333333"}}},"text":{"text":"攻擊","fill":"#ffffff","letter-spacing":0,"style":{"text-shadow":"1px 0 1px #333333"}}}},{"type":"basic.Circle","size":{"width":30,"height":30},"position":{"x":750,"y":210},"angle":0,"id":"b1e03796-415b-4545-8213-d6d24194e9ac","embeds":"","z":34,"attrs":{"circle":{"fill":"#E74C3C","width":15,"height":15},"text":{"font-size":10,"text":"0","fill":"white"}}},{"type":"basic.Circle","size":{"width":30,"height":30},"position":{"x":620,"y":270},"angle":0,"id":"e9c41517-0a8d-40db-ae2e-73528df6f94d","embeds":"","z":35,"attrs":{"circle":{"fill":"#E74C3C","width":15,"height":15},"text":{"font-size":10,"text":"1","fill":"white"}}},{"type":"link","id":"2af05f22-f6fc-4441-b21c-aa24efc46a2f","embeds":"","source":{"id":"0d64a5b5-29dc-44e9-9622-80c77eab32d4"},"target":{"id":"e9c41517-0a8d-40db-ae2e-73528df6f94d"},"z":36,"attrs":{".marker-source":{"fill":"#4b4a67","stroke":"#4b4a67"},".marker-target":{"fill":"#4b4a67","stroke":"#4b4a67"}}},{"type":"link","id":"05b5f555-eaf3-4812-b056-77123f7af52e","embeds":"","source":{"id":"e9c41517-0a8d-40db-ae2e-73528df6f94d"},"target":{"id":"cadd5a6d-1e2b-4b31-a117-849d90a5273a"},"z":37,"attrs":{".marker-source":{"fill":"#4b4a67","stroke":"#4b4a67"},".marker-target":{"fill":"#4b4a67","stroke":"#4b4a67"}}},{"type":"link","id":"06d27cce-1d08-4e0d-b987-5e9be8f801ba","embeds":"","source":{"id":"cadd5a6d-1e2b-4b31-a117-849d90a5273a"},"target":{"id":"b1e03796-415b-4545-8213-d6d24194e9ac"},"z":38,"attrs":{".marker-source":{"fill":"#4b4a67","stroke":"#4b4a67"},".marker-target":{"fill":"#4b4a67","stroke":"#4b4a67"}}},{"type":"link","id":"6089e392-d4a8-45fb-8a5a-aed79af7a17f","embeds":"","source":{"id":"b1e03796-415b-4545-8213-d6d24194e9ac"},"target":{"id":"24f953cc-63e7-4b93-9cac-5b632ca15835"},"z":39,"attrs":{".marker-source":{"fill":"#4b4a67","stroke":"#4b4a67"},".marker-target":{"fill":"#4b4a67","stroke":"#4b4a67"}}},{"type":"basic.Rect","position":{"x":50,"y":180},"size":{"width":70,"height":40},"angle":0,"id":"b4895213-a052-4af0-b0c1-3613ab558e52","embeds":"","z":40,"attrs":{"rect":{"fill":"#27AE60","width":50,"height":30,"rx":2,"ry":2},"text":{"font-size":10,"text":"隊長","fill":"white"}}},{"type":"erd.Relationship","size":{"width":70,"height":40},"position":{"x":170,"y":260},"angle":0,"id":"21670399-246c-4c30-b404-ac01d22e8690","embeds":"","z":41,"attrs":{".outer":{"fill":"#797d9a","stroke":"none","filter":{"name":"dropShadow","args":{"dx":0,"dy":2,"blur":1,"color":"#333333"}}},"text":{"text":"住宿","fill":"#ffffff","letter-spacing":0,"style":{"text-shadow":"1px 0 1px #333333"}}}},{"type":"basic.Circle","size":{"width":30,"height":30},"position":{"x":80,"y":260},"angle":0,"id":"2d0864e7-0c87-49ac-8c14-cff2045edf01","embeds":"","z":42,"attrs":{"circle":{"fill":"#E74C3C","width":15,"height":15},"text":{"font-size":10,"text":"0","fill":"white"}}},{"type":"basic.Circle","size":{"width":30,"height":30},"position":{"x":230,"y":310},"angle":0,"id":"f7ee4853-2cc4-47f6-b564-f7af3eb527cf","embeds":"","z":43,"attrs":{"circle":{"fill":"#E74C3C","width":15,"height":15},"text":{"font-size":10,"text":"1","fill":"white"}}},{"type":"link","id":"d277ba4e-77df-4497-99af-ae10b29026af","embeds":"","source":{"id":"b4895213-a052-4af0-b0c1-3613ab558e52"},"target":{"id":"2d0864e7-0c87-49ac-8c14-cff2045edf01"},"z":44,"attrs":{".marker-source":{"fill":"#4b4a67","stroke":"#4b4a67"},".marker-target":{"fill":"#4b4a67","stroke":"#4b4a67"}}},{"type":"link","id":"46c5a476-0c90-4958-b573-24c8162875e7","embeds":"","source":{"id":"f7ee4853-2cc4-47f6-b564-f7af3eb527cf"},"target":{"id":"21670399-246c-4c30-b404-ac01d22e8690"},"z":46,"attrs":{".marker-source":{"fill":"#4b4a67","stroke":"#4b4a67"},".marker-target":{"fill":"#4b4a67","stroke":"#4b4a67"}}},{"type":"link","id":"19dc8e5a-fdfc-42c8-bf53-ade99281ad3b","embeds":"","source":{"id":"09b6f44c-ed85-4e7d-8160-8d3e0a00d921"},"target":{"id":"f7ee4853-2cc4-47f6-b564-f7af3eb527cf"},"z":47,"attrs":{".marker-source":{"fill":"#4b4a67","stroke":"#4b4a67"},".marker-target":{"fill":"#4b4a67","stroke":"#4b4a67"}}},{"type":"erd.Relationship","size":{"width":70,"height":40},"position":{"x":430,"y":480},"angle":0,"id":"dd6200ea-ca6b-4b27-9972-488e86da3803","embeds":"","z":48,"attrs":{".outer":{"fill":"#797d9a","stroke":"none","filter":{"name":"dropShadow","args":{"dx":0,"dy":2,"blur":1,"color":"#333333"}}},"text":{"text":"關於","fill":"#ffffff","letter-spacing":0,"style":{"text-shadow":"1px 0 1px #333333"}}}},{"type":"basic.Circle","size":{"width":30,"height":30},"position":{"x":380,"y":550},"angle":0,"id":"02891931-f13b-4526-9fa8-add1ee05953e","embeds":"","z":49,"attrs":{"circle":{"fill":"#E74C3C","width":15,"height":15},"text":{"font-size":10,"text":"N","fill":"white"}}},{"type":"basic.Circle","size":{"width":30,"height":30},"position":{"x":500,"y":410},"angle":0,"id":"15b4cdee-3115-4781-99cf-12fd183cd316","embeds":"","z":50,"attrs":{"circle":{"fill":"#E74C3C","width":15,"height":15},"text":{"font-size":10,"text":"1","fill":"white"}}},{"type":"link","id":"2b4cbdf3-7737-4587-b27b-7c26d24f785e","embeds":"","source":{"id":"0d64a5b5-29dc-44e9-9622-80c77eab32d4"},"target":{"id":"15b4cdee-3115-4781-99cf-12fd183cd316"},"z":51,"attrs":{".marker-source":{"fill":"#4b4a67","stroke":"#4b4a67"},".marker-target":{"fill":"#4b4a67","stroke":"#4b4a67"}}},{"type":"link","id":"c3fc2eb9-868b-4d8c-867f-dfd821366f30","embeds":"","source":{"id":"15b4cdee-3115-4781-99cf-12fd183cd316"},"target":{"id":"dd6200ea-ca6b-4b27-9972-488e86da3803"},"z":52,"attrs":{".marker-source":{"fill":"#4b4a67","stroke":"#4b4a67"},".marker-target":{"fill":"#4b4a67","stroke":"#4b4a67"}}},{"type":"link","id":"44a9c421-0953-4d4e-806b-3b69c04f9b8d","embeds":"","source":{"id":"dd6200ea-ca6b-4b27-9972-488e86da3803"},"target":{"id":"02891931-f13b-4526-9fa8-add1ee05953e"},"z":53,"attrs":{".marker-source":{"fill":"#4b4a67","stroke":"#4b4a67"},".marker-target":{"fill":"#4b4a67","stroke":"#4b4a67"}}},{"type":"link","id":"c7b1075a-917d-4a73-91a0-dc936ab05843","embeds":"","source":{"id":"02891931-f13b-4526-9fa8-add1ee05953e"},"target":{"id":"f984d204-68da-4eae-81f7-0987fbc610ac"},"z":54,"attrs":{".marker-source":{"fill":"#4b4a67","stroke":"#4b4a67"},".marker-target":{"fill":"#4b4a67","stroke":"#4b4a67"}}},{"type":"link","id":"77853176-69b6-4cc4-b100-a0a61ae8d35a","embeds":"","source":{"id":"21670399-246c-4c30-b404-ac01d22e8690"},"target":{"id":"2d0864e7-0c87-49ac-8c14-cff2045edf01"},"z":54,"attrs":{".marker-source":{"fill":"#4b4a67","stroke":"#4b4a67"},".marker-target":{"fill":"#4b4a67","stroke":"#4b4a67"}}}]}');
        </script>
        <script>
            function panel(inn){
                var txt="";
                txt='<div class="panel panel-default">'+
                    inn+
                    '</div>';
                return txt;
            }           
            function panel_head(group){
                var txt="";
                txt='<div class="panel-heading" role="tab" id="headingOne">'+
                        '<h4 class="panel-title">'+
                            '<a role="button" data-toggle="collapse" data-parent="#accordion" href="#group'+group+'" aria-expanded="true" aria-controls="collapseOne">'+
                                "第"+group+"組"+
                            '</a>'+
                        '</h4>'+
                    '</div>';
                
                return txt;
                
            }
            function panel_collapse(inn,group){
                var txt="";
                txt='<div id="group'+group+'" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">'+
                        '<div class="panel-body">'+
                            inn+
                        '</div>'+
                    '</div>';
                
                return txt;
            }
            function row(inn){
                var txt="";
                txt='<div class="row " style="padding:0px;">'+
                        inn+
                    '</div>';
                return txt;
            }
            function column(inn){
                var txt="";
                txt='<div class="col-xs-4 "  style="">'+
                        inn+        
                    '</div>';
                return txt;
            }
            function everyperson(name,group,id,pic){//pic-->陣列
                var txt="";
                txt='<div class="dropdown">'+
                        '<button onclick=\'myFunction("drop'+group+""+id+'")\' class="dropbtn ">'+name+'</button>'+
                            '<div id="drop'+group+""+id+'" class="dropdown-content scrollable-menu">'+
                               // '<a href="#home">Home</a>'+
                               // '<a href="#about">About</a>'+
                               // '<a href="#contact">Contact</a>'+
                               pic+
                            '</div>'+
                     '</div></br></br>';
                     
                return txt;
            }
            function showpic(id,json){
                var txt="";
                txt='<a href="#home" onclick="fromjson2('+json+');">'+id+'</a>';
              // txt='<a href="#home" onclick="getjson('+id+',1)">'+id+'</a>';
                return txt;
            }
            function option(value, name) {
                        var txt;
                        txt = '<option value="' + value + '" data-subtext="">' + name + '</option>';
                        return txt;
                    }

                    
        </script>
        <script>
     
     
     
     </script>
<!--
    <script src="./Rappid toolkit - Documentation_files/lodash.min.js"></script>
    <script src="./Rappid toolkit - Documentation_files/backbone-min.js"></script>
    <script src="./Rappid toolkit - Documentation_files/rappid.min.js"></script>

        <button class="btn" id="btn-center">center</button>
        <button class="btn" id="btn-center-content">center content</button>
        <button class="btn" id="btn-zoomout">zoom out</button>
        <button class="btn" id="btn-zoomin">zoom in</button>
        <button class="btn" id="btn-zoomtofit">zoom to fit</button>
        <br>
        <div id="mytt" class="paper"></div>

    <script src="./Rappid toolkit - Documentation_files/paperScroller.js"></script>
    
-->

</body>
   
    <script>
        $(document).ready(function () {   
        }); // end ready

    </script>

    <script src="startbootstrap-scrolling-nav-gh-pages/js/jquery.easing.min.js"></script>
    <!-- Scrolling Nav JavaScript -->
    <script src="startbootstrap-scrolling-nav-gh-pages/js/scrolling-nav.js"></script>

    </html>