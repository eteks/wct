<?php
	
    include ("../dbconnect.php");
    include ("../common.php");
	
 	class createscheduleFunction {
 		public $createscheduleid;
 		public $createschedulename;
	    public $createschedule_testbatteryid;
	    public $createschedule_testbatteryname;	
	    public $createscheduledate;
	    public $createscheduletime;
	    public $createschedulevenue;	 
	
		public function createscheduleSelect(){
			$res = mysql_query("SELECT * FROM wc_createschedule where createschedule_status='1'")or die(mysql_error());
			return $res;
		}
		public function createscheduleInsert(){		
			$res = mysql_query("insert into wc_createschedule (createschedule_name,createscheduletestbattery_id,createschedule_date,createschedule_time,createschedule_venue,createschedule_status)values('".$this->createschedulename."','".$this->createschedule_testbatteryid."','".$this->createscheduledate."','".$this->createscheduletime."','".$this->createschedulevenue."','1')")or die(mysql_error());
			if($res){ return true; }
			else{ return false; }	 
		}
		public function createscheduleDelete(){		
			$res = mysql_query("update wc_athlete set athlete_status='0' where athlete_id ='".$this->athleteid."'")or die(mysql_error()); 
			if($res){ return true; }
			else{ return false; }		
		}
		public function testbatterynameSelect(){
			$res = mysql_query("SELECT createschedule_name FROM wc_testbattery WHERE testbattery_id='".$this->createschedule_testbatteryid."'")or die(mysql_error());
			return $res;
		}

	}
	if(isset($_POST)){
		
		//To insert data
		if(isset($_GET['adddata'])){
			echo "post",print_r($_POST);
			$createscheduleFunction = new createscheduleFunction();
			$createscheduleFunction->createschedulename = $_POST['schedule_name'];
			$createscheduleFunction->createschedule_testbatteryid = $_POST['schedule_testbattery'];
			$createscheduleFunction->createscheduledate = $_POST['schedule_year'].'-'.$_POST['schedule_month'].'-'.$_POST['schedule_day'];
			// $createscheduleFunction->createscheduletime = $_POST['schedule_hour'].':'.$_POST['schedule_minute'].':'.$_POST['schedule_seconds'];
			$createscheduleFunction->createscheduletime = '';
			$createscheduleFunction->createschedulevenue = $_POST['schedule_venue'];	
			$createscheduleinsert = $createscheduleFunction->createscheduleInsert();
			$scheduledate = $createscheduleFunction->createscheduledate;	
			$scheduletime = $createscheduleFunction->createscheduletime;		
			if($createscheduleinsert){
				$testbattery = mysql_fetch_array($createscheduleFunction->testbatterynameSelect());
				echo "success#Schedule Created#".$createscheduleinsert.'#'.$_POST['schedule_name'].'#'.$testbattery.'#'.$scheduledate.'#'.$scheduletime.'#'.$_POST['schedule_venue'];
			}else{
				echo "failure#Schedule Not Created";
			}
		}	

		// To delete stored data
		if(isset($_GET['deletedata'])){
			$athletesFunction = new athletesFunction();
			$athletesFunction->athleteid = $_POST['delete_id'];
			$statesdelete = $athletesFunction->athleteDelete();
			if($statesdelete){
				echo "success#State Deleted#".$_POST['delete_id'];
			}
			else{
				echo "failure#Record not found";
			}
		}	
	  }
?>