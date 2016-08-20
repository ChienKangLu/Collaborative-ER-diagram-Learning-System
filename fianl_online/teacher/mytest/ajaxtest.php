<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Untitled Document</title>
   
</head>
<body>

<div id="info">will be replace</div>

       
<script>
    /*
    function loadDoc() {
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function () {
                if (xhttp.readyState == 4 && xhttp.status == 200) {
                    document.getElementById("info").innerHTML = xhttp.responseText;
                }
            };
            xhttp.open("POST", "ajaxtest_php.php", true);
            xhttp.send();
        }
    loadDoc();
    */
    function loadDoc() {
    var params="url=1234";
    var request=new XMLHttpRequest();
    request.open("POST","ajaxtest_php.php",true);
    request.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    request.setRequestHeader("Content-length",params.length);
    request.setRequestHeader("Connection","close");
    request.onreadystatechange=function(){
        if(request.readyState==4){
            if(request.status==200){
                if(request.responseText!=null){
                    document.getElementById('info').innerHTML=request.responseText;
                    
                    
                }
                else{
                    alert("ajax error:no data recieved");
                }
            }
            else{
                alert("ajax error:"+request.statusText);
            }
        }
    }
    request.send(params);
    }
    
    
</script>
<button onclick="loadDoc();">click</button>
</body>
</html>