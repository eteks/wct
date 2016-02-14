<?php
class assignscheduleFunction {
    public $assignscheduleid;
    public $scheduleid;
    public $categoryid;
    public $athlete_id;
    public $bibnumber;
    public $assignschedule_status;
   public function assignscheduleSelect(){
       $temp_arr = array();
       $res = mysql_query("SELECT * from wc_assignschedule INNER JOIN wc_createschedule ON wc_assignschedule.assigncreateschedule_id=wc_createschedule.createschedule_id where wc_assignschedule.assignschedule_status='1' group by wc_createschedule.createschedule_id")or die(mysql_error());
       $count=mysql_num_rows($res);
       while($row = mysql_fetch_array($res)) {
           $temp_arr[] =$row;
       }
       return $temp_arr;
   }
   public function assignscheduleDelete(){
       $res = mysql_query("delete from wc_assignschedule where assignschedule_id ='".$this->assignscheduleid."' ")or die(mysql_error());
       if($res){ return true; }
       else{ return false; }
   }

}

    if(isset($_GET['add_assign_schdule'])){
        include ("../dbconnect.php");
        $counter = (count($_POST)-2)/2;
        for($i=1;$i<=$counter;$i++){
            $scheduleid =  $_POST['Schedule'];
            $categoryid = $_POST['category'];
            $athlete_id = $_POST["athlete_name".$i.""];
            $bib = $_POST["athlete_bib".$i.""];
            $sql = "insert into wc_assignschedule (assigncreateschedule_id,assigncategory_id,assignathlete_id,assignbib_number,assignschedule_status)values('$scheduleid','$categoryid','$athlete_id','$bib','1')";
            mysql_query($sql) or die(mysql_error());
        }
        echo 'success';
    }
    if(isset($_GET['deletedata'])){
        include ("../dbconnect.php");
        $assign = new assignscheduleFunction();
        $assign->assignscheduleid = $_POST['delete_id'];
        if($assign->assignscheduleDelete()){
          echo $_POST['delete_id'];
        }else{
          echo "error";
        }
    }
 ?>
