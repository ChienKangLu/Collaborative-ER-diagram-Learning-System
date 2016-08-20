<?php             

include_once ("mydb2.php");
include_once ("myphpfuntion.php");

    $mypic=selectmypic($link2,$_POST['id']);
    for($i=0;$i<count($mypic);$i++){
        echo '<li>';
        echo '<a class="page-scroll" id="mypic"'.$i.' href="#topup" onclick="showworkblock2('.$mypic[$i][0].',getmyjson);">'.'作圖編號 '.$mypic[$i][0].'</a>';
        echo '</li>';
}?>