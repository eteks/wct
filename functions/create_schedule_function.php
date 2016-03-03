<?php
    include($_SERVER["DOCUMENT_ROOT"] . "/wct/common.php");
 	class createscheduleFunction {
 		public $createscheduleid;
 		public $createschedulename;
	    public $createschedule_testbatteryid;
	    public $createschedule_testbatteryname;
	    public $createscheduledate;
	    public $createscheduletime;
	    public $createschedulevenue;

		public function createscheduleSelect(){
			$res = mysql_query("SELECT * from wc_createschedule cs,wc_testbattery tb where cs.createscheduletestbattery_id=tb.testbattery_id and cs.createschedule_status='1' ORDER BY cs.createschedule_id DESC")or die(mysql_error());
			// $res = mysql_query("SELECT * FROM wc_createschedule where createschedule_status='1'")or die(mysql_error());
			return $res;
		}
		public function createscheduleInsert(){
			$res = mysql_query("insert into wc_createschedule (createschedule_name,createscheduletestbattery_id,createschedule_date,createschedule_time,createschedule_venue,createschedule_status)values('".$this->createschedulename."','".$this->createschedule_testbatteryid."','".$this->createscheduledate."','".$this->createscheduletime."','".$this->createschedulevenue."','1')")or die(mysql_error());
			$lastinsertid = mysql_insert_id();
			if($res){ return $lastinsertid; }
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
			$res = mysql_query("delete from wc_createschedule where createschedule_id ='".$this->createscheduleid."'")or die(mysql_error());
			if($res){ return true; }
			else{ return false; }
		}
        public function createscheduleselectfunction(){
            $temp_arr = array();
            $res = mysql_query("SELECT * FROM wc_createschedule") or die(mysql_error());
            while($row = mysql_fetch_array($res)) {
                $temp_arr[] =$row;
            }
            return $temp_arr;
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
		//Check whether the schedule name already exists
		public function isScheduleExist(){
			$qr = mysql_query("SELECT * FROM wc_createschedule WHERE createschedule_name = '".$this->createschedulename."'");
			$row = mysql_num_rows($qr);
			if($row > 0){
				return true;
			} else {
				return false;
			}
		}
	}
	if(isset($_POST)){
		//To insert data
		if(isset($_GET['adddata'])){
			$createscheduleFunction = new createscheduleFunction();
			$createscheduleFunction->createschedulename = $_POST['schedule_name'];
			$createscheduleFunction->createschedule_testbatteryid = $_POST['schedule_testbattery'];
			$createscheduleFunction->createscheduledate = $_POST['dateyear'].'-'.$_POST['datemonth'].'-'.$_POST['dateday'];
			$createscheduleFunction->createscheduletime = $_POST['schedule_hour'].':'.$_POST['schedule_minute'].':'.$_POST['schedule_seconds'];
			$createscheduleFunction->createschedulevenue = $_POST['schedule_venue'];	
			$scheduledate = $createscheduleFunction->createscheduledate;
			$scheduletime = $createscheduleFunction->createscheduletime;
			$createschedule = $createscheduleFunction->isScheduleExist();
			if (!$createschedule){
				$createscheduleinsert = $createscheduleFunction->createscheduleInsert();
				if($createscheduleinsert){
					$testbattery = mysql_fetch_array($createscheduleFunction->testbatterynameSelect());
					echo "success#Schedule Created#".$createscheduleinsert.'#'.$_POST['schedule_name'].'#'.$testbattery['testbattery_name'].'#'.$scheduledate.'#'.$scheduletime.'#'.$_POST['schedule_venue'];
				}else{
					echo "failure#Schedule Not Created";
				}
				echo "success";
			}
			else{
				echo "failure#Already Created schedule with the entered name";
			}
		}

		// To delete stored data
		if(isset($_GET['deletedata'])){
			$createscheduleFunction = new createscheduleFunction();
			$createscheduleFunction->createscheduleid = $_POST['delete_id'];
			$scheduledelete = $createscheduleFunction->createscheduleDelete();
			if($scheduledelete){
				echo "success#Schedule Deleted#".$_POST['delete_id'];
			}
			else{
				echo "failure#Schedule not found";
			}
		}
		// For display edit data
		if(isset($_GET['chooseedit'])){
			$json = array();
			$createscheduleFunction = new createscheduleFunction();
			$createscheduleFunction->createscheduleid = $_POST['data_id'];
		    $edit_data = $createscheduleFunction->createscheduleselectRecord();
		    while ( $result = mysql_fetch_array( $edit_data )){
		    	$tmp = array(
	           'createschedule_id' => $result['createschedule_id'],
	           'createschedule_name' => $result['createschedule_name'],
	           'createschedule_testbatteryid' => $result['createscheduletestbattery_id'],
	           'createschedule_testbatteryname' => $result['testbattery_name'],
	           'createschedule_date' => $result['createschedule_date'],
	           'createschedule_time' => $result['createschedule_time'],
	           'createschedule_venue' => $result['createschedule_venue'],
	           );
	    		array_push( $json, $tmp );
		    }
		    echo json_encode($json);
		}
		// To store edited data
		if(isset($_GET['editdata'])){
			$createscheduleFunction = new createscheduleFunction();
			$createscheduleFunction->createscheduleid=$_POST['edit_schedule_id'];
 			$createscheduleFunction->createschedulename=$_POST['edit_schedule_name'];
 			$createscheduleFunction->createschedule_testbatteryid=$_POST['edit_schedule_testbattery'];
 			$createscheduleFunction->createscheduledate=$_POST['dateyear'].'-'.$_POST['datemonth'].'-'.$_POST['dateday'];
 			$createscheduleFunction->createscheduletime=$_POST['edit_schedule_hour'].':'.$_POST['edit_schedule_minute'].':'.$_POST['edit_schedule_seconds'];
	    	$createscheduleFunction->createschedulevenue=$_POST['edit_schedule_venue'];
			$createscheduleupdate = $createscheduleFunction->createscheduleUpdate();
			if($createscheduleupdate){
				$testbattery = mysql_fetch_array($createscheduleFunction->testbatterynameSelect());
				echo "success#Schedule Updated#".$_POST['edit_schedule_id']."#".$_POST['edit_schedule_name'].'#'.$testbattery['testbattery_name']."#".$createscheduleFunction->createscheduledate."#".$createscheduleFunction->createscheduletime.'#'.$_POST['edit_schedule_venue'];
			}else{
				echo "failure#Schedule Not Updated";
			}
		}
	  }
?>
