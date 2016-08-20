<style>
.d-header {
    background-color: rgba(58, 58, 58, 0.9) ;
    box-shadow: 0 2px 4px -1px rgba(0,0,0,0.25);
}
    .nav li a.gg{
        color:white;
    }
    .nav li a.gg:hover{
        background-color:#1C1C1D;
    }
    .container a.gg{
        color:white;
    }
    .container a.gg:hover{
        background-color:#1C1C1D;
    }
    .d-header{
        position: fixed;
        width: 100%;
    }
</style>
<div class="navbar navbar-inverse navbar-static-top d-header "style="margin-bottom:5px;padding: 0px;">
  <div class="container">
   	<a   href="#" class="navbar-brand gg" >線上合作學習平台<?php //echo $_SESSION['userid'];?></a>
	  <button class="navbar-toggle" data-toggle="collapse" data-target=".navHeaderCollapse"> 
         <span class="icon-bar"></span>
		 <span class="icon-bar"></span>
		 <span class="icon-bar"></span>
    </button>
	<div class="collapse navbar-collapse navHeaderCollapse">
        <ul class = "nav navbar-nav navbar-right">

			 <li><a class="gg" href="manage_showstudent.php">觀看修課名單</a></li>
			 <li><a class="gg"href="manage_showgroup.php">分組名單</a></li>
			 <li><a class="gg"href="manage_showpic.php">ERD檢視</a></li>
			 <li><a class="gg"href="manage_answer.php">撰寫答案</a></li>
			 <li class="dropdown">
             <a class="gg" href="#" class="dropdown-toggle" data-toggle="dropdown">編輯學生<b class="caret"></b></a>
			   <ul class="dropdown-menu">
                  <li><a href="manage_addstudent.php">新增學生</a></li>
			 <li><a href="manage_addgroup.php">新增組別</a></li>  
               </ul>
             </li>
			 
			 <li class="dropdown">
             <a class="gg" href="#" class="dropdown-toggle" data-toggle="dropdown">編輯問題<b class="caret"></b></a>
			   <ul class="dropdown-menu">
                  <li><a href="manage_addentity.php">新增元素</a></li>
			
               <li><a href="manage_showques.php">
                   檢視問題
               </a></li>              

               
               </ul>
             </li>
             <!--
			 <li class="dropdown">
             <a href="#" class="dropdown-toggle" data-toggle="dropdown">開發者<b class="caret"></b></a>
			   <ul class="dropdown-menu">
                  <li><a href="http://myweb.scu.edu.tw/~01156109/" target="iframe" onclick="document.getElementById('QQ').src='CSIM_final_15.php';">陸建綱</a></li>
                  <li><a href="http://myweb.scu.edu.tw/~01156104/" target="iframe" onclick="document.getElementById('QQ').src='CSIM_final_15.php';">余宗穎</a></li>
                  <li><a href="http://myweb.scu.edu.tw/~01156126/" target="iframe" onclick="document.getElementById('QQ').src='CSIM_final_15.php';">王登麒</a></li>
                  <li class="divider"></li>
                  <li><a href="#">開發動機</a></li>
                  <li class="divider"></li>
               </ul>
             </li>
             -->
	    </ul>
	</div>
	
  </div>
</div>
<br/>
<br/>
