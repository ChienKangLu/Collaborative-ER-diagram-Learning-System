<!--<iframe src="#" frameborder="0"  scrolling="yes" width="100% "height="450 "name="iframe_a"></iframe>-->
<div class="navber navbar-default navbar-fixed-bottom ">
  <div class="container">
    <p class="navbar-text pull-left"><?php echo $_SESSION['name']; ?></p>
	<div class="btn-group pull-right navbar-btn">
  <button type="button" class="  btn btn-default" onclick="document.getElementById('QQ').src='CSIM_final_15.php';document.getElementById('display').src='CSIM_final_6.php';">進入</button>
  <button type="button" class="btn-danger btn btn-default" onclick="self.location.href='CSIM_final_16.php'" >登出</button>
</div>
	<!--<a  target="iframe" href="CSIM_final_6.php" class="navbar-btn btn-danger btn pull-right">進入</a>-->
	<!--<a  href="CSIM_final_16.php" class="navbar-btn btn-danger btn pull-right">登出</a>-->
  </div>
</div>

