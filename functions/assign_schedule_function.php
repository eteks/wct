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
       $res = mysql_query("SELECT * from wc_assignschedule INNER JOIN wc_createschedule ON wc_assignschedule.assigncreateschedule_id=wc_createschedule.createschedule_id where wc_assignschedule.assignschedule_status='1' group by wc_assignschedule.assigncreateschedule_id,wc_assignschedule.assigncategory_id ORDER BY wc_assignschedule.assignschedule_id DESC")or die(mysql_error());
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
    if(isset($_GET['edit_get_data'])){
        include ("../dbconnect.php");
        $scheduleid = $_POST['shdl_id'];
        $categoryid = $_POST['cate_id'];
        $sql=mysql_query("select * from wc_assignschedule INNER JOIN wc_createschedule ON wc_assignschedule.assigncreateschedule_id=wc_createschedule.createschedule_id INNER JOIN wc_categories ON wc_categories.categories_id= wc_assignschedule.assigncategory_id INNER JOIN wc_athlete ON wc_athlete.athlete_id= wc_assignschedule.assignathlete_id where wc_assignschedule.assigncreateschedule_id = '$scheduleid'and wc_assignschedule.assigncategory_id ='$categoryid' ");
        $row = array();
        while($r = mysql_fetch_assoc($sql)) {
            $row[] = $r;
        }
        print(json_encode($row));
    }
    if(isset($_POST['assing_schedule_update'])){
        include ("../dbconnect.php");
        print_r($_POST);
        $counter = (count($_POST)-2)/3;
        for($i=1;$i<=$counter;$i++){
            $category_id = $_POST['category'];
            $assign_schedule_id = $_POST["assing_schedule_update_id".$i.""];
            $athlete_id = $_POST["athlete_name".$i.""];
            $athlete_bib = $_POST["athlete_bib".$i.""];
            $sql = "update wc_assignschedule set assigncategory_id='$category_id',assignathlete_id='$athlete_id',assignbib_number='$athlete_bib' where assignschedule_id='$assign_schedule_id'";
            mysql_query($sql) or die(mysql_error());
        }
        header('Location:../assign_schedule.php?update_success=true');
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
