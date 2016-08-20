<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Untitled Document</title>
     <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <link rel="stylesheet" href="mycss/mybreadcrumb.css">
        
        <link href="http://libs.baidu.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet">
        <script src="http://libs.baidu.com/jquery/2.0.0/jquery.min.js"></script>
        <script src="http://libs.baidu.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
        
        
        
        
		<script type="text/javascript" src="bootstrap-filestyle-1.2.1/src/bootstrap-filestyle.js"></script>
		
        <script src="myajaxfunction.js"></script>
</head>

<body>
    <?php
		include ("top_manage.php");
    ?>

        <div id="container" class="container ">
            <form id="myform" role="form" enctype="multipart/form-data" method="post">
                <h3>新增學生</h3>
                <hr>
                <div class="row">
                    <div class="col-xs-6">
                        <div class="form-group">
                            <input type="file" class="filestyle" id="txtfile">
                        </div>
                    </div>
                    <div class="col-xs-6">
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">
                                <span class="glyphicon glyphicon-plus"></span> 載入資料
                            </button>
                            
                   <button id="up" type="button"  class="btn btn-danger" style="display:none">
                                <span class="glyphicon glyphicon-ok"></span> 新增資料
                            </button>
                            <button id="remove" type="button"  class="btn btn-warning">
                                <span class="glyphicon glyphicon-remove"></span> 清除資料
                            </button>
                        </div>
                    </div>
                </div>
            </form>
            
            <div id="block" class="panel panel-default text-center"style="display:none">
                  <div  class="panel-body">
                  <span id="howmuch"></span>
                   
                  </div>
                  
            </div>
            <div id="show">
            <table class="table" id="show2">
                <thead>
                    <tr>
                        <th>學號</th>
                        <th>姓名</th>
                        <th>班級</th>
                    </tr>
                </thead>
                <tbody id="show3">

                </tbody>
            </table>
        </div>
        <div id="textgg" style="display:none">

        </div>
        <script>
            myform.onsubmit = function (event) {
                event.preventDefault();
             //   alert("123");
                uploadfile(1, txtfile.files);
                
            }
            /*
            show3.innerHTML+="<tr>"+
                        "<td>July</td>"+
                        "<td>Dooley</td>"+
                        "<td>july@example.com</td>"+
                    "</tr>";*/
            up.onclick=function(){
                var tt=JSON.parse(textgg.innerHTML);
                alert(tt.value);
                addstudent(textgg.innerHTML);
            };  
            remove.onclick=function(){
                location.reload();
            }
            
        </script>
</body>
</html>