<?php
	
    include ("../dbconnect.php");
    include ("../common.php");
	
 	class athletesFunction {
 		public $athleteid;
 		public $athletename;
 		public $athletedob;
 		public $athletemobile;
	    public $athletegender;
	    public $athletestatesid;
	    public $athletestatesname;	
	    public $athletedistrictid;
	    public $athletedistrictname;
	    public $athleteaddress;	
	    public $athletesportsid;	
	    public $athletesportsname;		  
	
		public function athleteSelect(){
			$res = mysql_query("SELECT * FROM wc_athlete where athlete_status='1'")or die(mysql_error());
			return $res;
		}
		public function athleteInsert(){		
			$res = mysql_query("insert into wc_athlete (athlete_name,athlete_dob,athlete_mobile,athlete_gender,athletestates_id,athletedistrict_id,athlete_address,athlete_status)values('".$this->athletename."','".$this->athletedob."','".$this->athletemobile."','".$this->athletegender."','".$this->athletestatesid."','".$this->athletedistrictid."','".$this->athleteaddress."','1')")or die(mysql_error());
			if($res){ return true; }
			else{ return false; }	 
		}
		public function athleteDelete(){		
			$res = mysql_query("update wc_athlete set athlete_status='0' where athlete_id ='".$this->athleteid."'")or die(mysql_error()); 
			if($res){ return true; }
			else{ return false; }		
		}

	}
	if(isset($_POST)){
		
		//To insert data
		if(isset($_GET['adddata'])){
			echo "post",print_r($_POST);
			$athletesFunction = new athletesFunction();
			$athletesFunction->athletename = $_POST['athlete_name'];
			$athletesFunction->athletedob = $_POST['athlete_dobyear'].'-'.$_POST['athlete_dobmonth'].'-'.$_POST['athlete_dobday'];
			$athletesFunction->athletemobile = $_POST['athlete_mobile'];
			$athletesFunction->athletegender = $_POST['athlete_gender'];
			$athletesFunction->athletestatesid = $_POST['athlete_state'];
			$athletesFunction->athletedistrictid = $_POST['athlete_district'];
			$athletesFunction->athletegender = $_POST['athlete_gender'];
			$athletesFunction->athleteaddress = $_POST['athlete_address'];
			$athletesFunction->athletesportsid = $_POST['athlete_sports'];	
			$athleteinsert = $athletesFunction->athleteInsert();
			$atheletedob = $athletesFunction->athletedob;
			if($athleteinsert){
				echo "success#Athletes Inserted#".$athleteinsert.'#'.$_POST['athlete_name'].'#'.$_POST['athlete_gender'].'#'.$atheletedob.'#'.$_POST['athlete_address'];
			}else{
				echo "failure#Athletes Not Inserted";
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