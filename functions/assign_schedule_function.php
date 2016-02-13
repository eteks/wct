<?php
class assignscheduleFunction {
    public $assignscheduleid;
    public $scheduleid;
    public $categoryid;
    public $athlete_id;
    public $bibnumber;
    public $assignschedule_status;
   public function createscheduleSelect(){
       $res = mysql_query("SELECT * from wc_createschedule cs,wc_testbattery tb where cs.createscheduletestbattery_id=tb.testbattery_id and cs.createschedule_status='1'")or die(mysql_error());
       // $res = mysql_query("SELECT * FROM wc_createschedule where createschedule_status='1'")or die(mysql_error());
       return $res;
   }
   public function createscheduleInsert(){
       $res = mysql_query("insert into wc_createschedule (createschedule_name,createscheduletestbattery_id,createschedule_date,createschedule_time,createschedule_venue,createschedule_status)values('".$this->createschedulename."','".$this->createschedule_testbatteryid."','".$this->createscheduledate."','".$this->createscheduletime."','".$this->createschedulevenue."','1')")or die(mysql_error());
       if($res){ return true; }
       else{ return false; }
   }
   public function createscheduleUpdate(){
       $res = mysql_query("update wc_createschedule set createschedule_name='".$this->createschedulename."',createscheduletestbattery_id='".$this->createschedule_testbatteryid."',
                   createschedule_date='".$this->createscheduledate."',createschedule_time='".$this->createscheduletime."',
                   createschedule_venue='".$this->createschedulevenue."' where createschedule_id ='".$this->createscheduleid."'")or die(mysql_error());
       if($res){ return true; }
       else{ return false; }
   }
   public function createscheduleDelete(){
       $res = mysql_query("update wc_createschedule set createschedule_status='0' where createschedule_id ='".$this->createscheduleid."'")or die(mysql_error());
       if($res){ return true; }
       else{ return false; }
   }
   public function testbatterynameSelect(){
       $res = mysql_query("SELECT testbattery_name FROM wc_testbattery WHERE testbattery_id='".$this->createschedule_testbatteryid."'")or die(mysql_error());
       return $res;
   }
   // To select particular data by using id
   public function createscheduleselectRecord(){
       $res = mysql_query("SELECT * FROM wc_createschedule as cs INNER JOIN wc_testbattery as tb ON tb.testbattery_id=cs.createscheduletestbattery_id
               WHERE cs.createschedule_id='".$this->createscheduleid."'")or die(mysql_error());
       return $res;
   }

}

    if(isset($_GET['add_assign_schdule'])){
        print_r($_POST);
        include ("../dbconnect.php");
        $counter = (count($_POST)-2)/4;
        $assign = new assignscheduleFunction();
        $testname = $_POST['test_name'];
        $test->testname = $testname ;
        if($test->testnameinsertfunction()){
            $row = mysql_fetch_array(mysql_query("select test_id from wc_test where test_name ='$testname'"));
            for($i=1;$i<=$counter;$i++){
                $test_id = $row['test_id'];
                $parameter = $_POST["parameter_name".$i.""];
                $type = $_POST["type".$i.""];
                $unit = $_POST["unit".$i.""];
                $format =  $_POST["format".$i.""];
                $sql = "insert into wc_test_attribute (test_id,test_parameter_name,test_parameter_type,test_parameter_unit,test_parameter_format,test_attribute_status)values('$test_id','$parameter','$type','$unit','$format','1')";
                mysql_query($sql) or die(mysql_error());
            }
            header('Location:../test.php');
        }else {
          echo "error";
        }
    }
 ?>
