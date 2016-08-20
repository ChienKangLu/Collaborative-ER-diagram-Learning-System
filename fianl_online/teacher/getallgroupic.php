<?php
include_once ("mydb2.php");
include_once ("myphpfuntion.php");
// savetodb(jsontext,id,quesid,maxtix)
$ques=$_POST['ques'];
///////////////////////////////////////////////////查出剛剛新增的組別
$str="select * from cluster2_detail LEFT join member on cluster2_detail.userid=member.id";
$member=myquery2($str,$link2);

function whichq($id,$ques,$link){
    $str="select * from pic where quesid=".$ques." and id=".$id;
    $result=myquery2($str,$link);
    return $result;
}
$nowpic123=whichq(1,1,$link2);
//echo $nowpic123[0][4];
echo "\n\n\n";
//echo json_encode($nowpic123[0][4]+"~~~~~~~~");
//echo count($nowpic);
class student{
    public $id ;
    public $name ;
   // public $pic  ;

    public function __construct($id,$name,$pic) {
        $this->id = $id;
        $this->name = $name;
        $this->pic = $pic;
    }
}
class pic{
    public $id;
    public $json;
    public function __construct($id,$json) {
        $this->id = $id;
        $this->json = $json;
    }
}
$group=array();
for($i=0;$i<count($member);$i++){
    //echo $member[$i][2]."\n";
    if(!isset($group[$member[$i][0]])){
        $group[$member[$i][0]]=array();        
    }
    
    $nowpic=whichq($member[$i][1],$ques,$link2);
    
    $picarray=array();
    
    if(!count($nowpic)==0){
        for($j=0;$j<count($nowpic);$j++){
            //$picarray[]=new pic($nowpic[$j][0],"213");
            $picarray[]=new pic($nowpic[$j][0],htmlspecialchars("'".$nowpic[$j][4]."'"));//good
            
            
            //$picarray[]=new pic($nowpic[$j][0],urlencode($nowpic[$j][4]."'"));
        }
    }
    
    $group[$member[$i][0]][]=new student($member[$i][1],$member[$i][4],$picarray);//new pic($nowpic[0][0],$nowpic[0][4])
        
}


echo json_encode($group);
//echo json_encode($member);
/*
$group=array();//全部的資料
$txt=array("A1","A1","A3");//0 1 2 
for($i=0;$i<count($txt);$i++){
    if(isset($group[$txt[$i]])){}
    else{
        $group[$txt[$i]]=array($i);
        
    }
    
}
echo json_encode($group);
*/

//echo urldecode(stripslashes(json_encode($member)))

?>