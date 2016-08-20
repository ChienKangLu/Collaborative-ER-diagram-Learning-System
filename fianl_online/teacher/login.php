<?php
session_start();
include_once ("mydb2.php");
include_once ("myphpfuntion.php");

    $s=0;

if(isset($_SESSION['key'])){
    header('Location: gonfinal.php');
}else if(isset($_POST['account'])&&isset($_POST['code'])){
    
    $str2="SELECT * FROM member where studentid='".$_POST['account']."'&&code='".$_POST['code']."'";
    //echo $_POST['account'];
   // echo $_POST['code'];
    $arr=myquery($str2,$link2);
    
    if(count($arr)>0){
    $_SESSION['id']=$arr[0][0];
	$_SESSION['studentid']=$arr[0][1];
	$_SESSION['name']=$arr[0][2];
	$_SESSION['pos']=$arr[0][4];
	$_SESSION['key']=1;
    
    date_default_timezone_set("Asia/Taipei");
    $mydate=date("Y-m-d H:i:s");
    $str="INSERT INTO `action_record` (`userid`,`date_time`,`action_tag`) VALUES ('".$_SESSION['id']."','".$mydate."','login');";
    myinsert($str);
    header('Location: gonfinal.php');
    
    }else{
        $s=1;
    }
    /*
    key 1-->登入
    key 0-->登出
    */
}
    
?>
<html>
<head>
<title></title>
<meta name="" content="" charset="UTF-8">
<!--<link rel="stylesheet" href="css/bootstrap.css">-->
 <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery.js"></script>
<script type="text/javascript" src="js/collapse.js"></script>

<style>

</style>

</head>
<body>
<center>
    <h1>線上合作學習平台</h1>
	<hr/>
<table>
<tr>
	<td>
	
	</td>
</tr>
<tr>
<td>
<form action="" method="post" class="form-horizontal" role="form" >
  <div class="form-group">
    <label   for="inputEmail3" class="col-sm-2 control-label">帳號</label>
    <div class="col-sm-10">
      <input style="width: 200" type="text" name="account"required="" class="form-control" id="inputEmail3" placeholder="帳號">
    </div>
  </div>
  <div class="form-group">
    <label  for="inputPassword3" class="col-sm-2 control-label">密碼</label>
    <div class="col-sm-10">
      <input style="width: 200" type="password" name="code" required="" class="form-control" id="inputPassword3" placeholder="密碼">
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
	<input type="hidden" name="key" value="1" />
      <button  type="submit" class="btn btn-default">Sign in</button>
    <div id="show" style="margin-top:10px;"></div>
      <!--
	  <button type="button" class="btn btn-default" onclick="self.location.href='CSIM_final_3.php'">註冊</button>
	  <button type="button" class="btn btn-default" onclick="self.location.href='CSIM_final_14.php?key=0'">訪客</button>
	  -->
    </div>
  </div>
</form>
 <?php
    if($s==1){
        
        echo '
        <script>
        var content=window.document.getElementById("show");
		
		content.innerHTML="帳號或密碼錯誤";
        </script>
        ';
    }
    ?>
  </td>
</tr>

</table>
</center>
</body>
</html>