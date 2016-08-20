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
    #top_sid{
        color: white;
        cursor:default;
    }
    #top_name{
        color: white;
        cursor:default;
    }
    #top_groupid{
        color: white;
        cursor:default;       
    }
    .n-c
    {
        position: absolute;
        left: 50%;
        text-align: center;
        margin: auto;
        padding: 15px 15px;
    }
    
    .n-c:hover{
        color: white;
        text-decoration: none;
    }
    .click_ques{
        cursor: pointer;
        font-size: 18px;
        line-height:15px;
        color: gray;
        text-decoration: none;
    }
    .small{
        font-size:0.2em;
    }
    .questioncss{
        display: none;
        padding: 30px;
        padding-top: 80px;
/*                position: fixed;*/
                box-shadow:2px 4px 5px rgba(3,3,3,0.2);
                background: #06406c;
                width: 100%;
                z-index: 900;
/*                margin-top: 50px;*/
            }
    .ques_title{
        color: white;
    }
    .pointer{
        
        cursor: pointer;
    }
    #homeworkclick{
        
        background-color:#222831;
        color: #EEEEEE;
    }
    #homeworkclick:hover{
        /*opacity: 0.8;*/
        
        background-color:#00ADB5;
        color: #EEEEEE;
    }
    #together{
        background-color:#222831;
        color: #EEEEEE;
    }
    #together:hover{
        
        background-color:#00ADB5;
        color: #EEEEEE;
    }
    .hahah{
        text-decoration: none;
        color:#fff;
            float: left;
    height: 50px;
    padding: 15px 15px;
    font-size: 18px;
    line-height: 20px;
        
    }

    .hahah:hover, .hahah:visited, .hahah:link, .hahah:active{
                text-decoration: none;
        color:#fff;
            float: left;
    height: 50px;
    padding: 15px 15px;
    font-size: 18px;
    line-height: 20px;
    }


</style>
<div class="navbar navbar-inverse navbar-static-top d-header "style="margin-bottom:5px;padding: 0px;">
  <div class="container">
      
      <a id="top_qbtn" class="n-c click_ques "href="#bigtopup">題目<br/><span id="top_qbtnsp" class="glyphicon glyphicon-chevron-down small "></span></a>
            
      
   	<a href="#" class="hahah" >線上合作學習平台<?php //echo $_SESSION['userid'];?></a>
	  <button class="navbar-toggle" data-toggle="collapse" data-target=".navHeaderCollapse"> 
         <span class="icon-bar"></span>
		 <span class="icon-bar"></span>
		 <span class="icon-bar"></span>
    </button>

	<div class="collapse navbar-collapse navHeaderCollapse">
        <ul class = "nav navbar-nav navbar-right">

			 <li><a id="homeworkclick" href="#">作答區</a></li>
			 
			 <li><a id="together" href="#">共識區</a></li>
			 <li><a id="top_sid" href="#">000000</a></li>
			 <li><a id="top_name" href="#" >陸陸陸</a></li>

			 <li><a id="top_groupid" href="#">00</a></li>
	    </ul>
	</div>
	
  </div>
  
</div>

<div id="top_q" class="questioncss">
           <div class="container">
            <h1 class="ques_title"><?php echo $questitle;?>  <span id="open_mydragQ" class="glyphicon glyphicon-new-window pointer"></span></h1>
            <h3>
            <p class="ques_title"><?php echo $quescontent;?></p>
               </h3>
               <hr>
               <h4 class="ques_title">
                   <?php echo $tip;?>
               </h4>
            </div>
        </div>
                            <script>
                                document.getElementById("homeworkclick").onclick=function(){  
                                    record(0,"<?php echo $_SESSION['id'];?>");
                                };  
                                document.getElementById("together").onclick=function(){  
                                    record(1,"<?php echo $_SESSION['id'];?>");
                                };  
                            </script>
