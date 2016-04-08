<?php
	include('configu.php');
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
	    public $athlete_taluka;
	    public $athletesportsid;
	    public $athletesportsname;

		public function athleteSelect(){
			$res = mysql_query("SELECT * FROM wc_athlete as a INNER JOIN wc_sports as s ON s.sports_id = a.athletesports_id INNER JOIN wc_district as d ON d.district_id = a.athletedistrict_id where a.athlete_status='1' ORDER BY a.athlete_name ASC")or die(mysql_error());
			return $res;
		}

		public function athleteSelect1(){
            $temp_arr = array();
			$res = mysql_query("SELECT * FROM wc_athlete where athlete_status='1' order by athlete_name asc")or die(mysql_error());
			while($row = mysql_fetch_array($res)) {
				$temp_arr[] =$row;
			}
			return $temp_arr;
		}
		public function athleteInsert(){
			$res = mysql_query("insert into wc_athlete (athlete_name,athlete_dob,athlete_mobile,athlete_gender,athletestates_id,athletedistrict_id,athlete_address,athlete_taluka,athletesports_id,athlete_status)values('".$this->athletename."','".$this->athletedob."','".$this->athletemobile."','".$this->athletegender."','".$this->athletestatesid."','".$this->athletedistrictid."','".$this->athleteaddress."','".$this->athletetaluka."','".$this->athletesportsid."','1')")or die(mysql_error());
			$lastinsertid = mysql_insert_id();
			if($res){ return $lastinsertid; }
			else{ return false; }
		}
		public function athleteUpdate(){
            $res = mysql_query("update wc_athlete set athlete_name='".$this->athletename."',athlete_dob='".$this->athletedob."',
            			athlete_mobile='".$this->athletemobile."',athlete_gender='".$this->athletegender."',
            			athletestates_id='".$this->athletestatesid."',athletedistrict_id='".$this->athletedistrictid."',
            			athlete_address='".$this->athleteaddress."',athletesports_id='".$this->athletesportsid."' where athlete_id ='".$this->athleteid."'")or die(mysql_error());
			if($res){ return true; }
			else{ return false; }
		}
		public function athleteDelete(){
			$res = mysql_query("update wc_athlete set athlete_status='0' where athlete_id ='".$this->athleteid."'")or die(mysql_error());
			if($res){ return true; }
			else{ return false; }
		}
		// To select particular data by using id
		public function athleteselectRecord(){
			$res = mysql_query("SELECT * FROM wc_athlete as at INNER JOIN wc_states as st
					INNER JOIN wc_district as dt INNER JOIN wc_sports as sp ON
					st.states_id = at.athletestates_id and dt.district_id = at.athletedistrict_id
					and sp.sports_id = at.athletesports_id
					WHERE at.athlete_id='".$this->athleteid."'")or die(mysql_error());
			return $res;
		}
		//Check whether the athlete already exists
		public function isAthleteExist(){
			// $qr = mysql_query("SELECT * FROM wc_athlete WHERE athlete_name = '".$this->athletename."' AND athlete_dob = '".$this->athletedob."' AND athlete_gender = '".$this->athletegender."' AND athlete_mobile = '".$this->athletemobile."'");
			$qr = mysql_query("SELECT * FROM wc_athlete WHERE athlete_dob = '".$this->athletedob."' AND athlete_mobile = '".$this->athletemobile."'");
			$row = mysql_num_rows($qr);
			if($row > 0){
				return true;
			} else {
				return false;
			}
		}
		//newly added for v2
		public function athletenameUpdate(){
			$res = mysql_query("update wc_athlete set athlete_name='".$this->athletename."' where athlete_id ='".$this->athleteid."'")or die(mysql_error());
			if($res){ return true; }
			else{ return false; }
		}
	}
	if(isset($_POST)){

		//To insert data
		if(isset($_GET['adddata'])){
			$athletesFunction = new athletesFunction();
			$athletesFunction->athletename = $_POST['athlete_name'];
			$athletesFunction->athletedob = $_POST['dateyear'].'-'.$_POST['datemonth'].'-'.$_POST['dateday'];
			$athletesFunction->athletemobile = $_POST['athlete_mobile'];
			$athletesFunction->athletegender = $_POST['athlete_gender'];
			$athletesFunction->athletestatesid = $_POST['athlete_state'];
			$athletesFunction->athletedistrictid = $_POST['athlete_district'];
			$athletesFunction->athletegender = $_POST['athlete_gender'];
			$athletesFunction->athleteaddress = $_POST['athlete_address'];
			$athletesFunction->athletesportsid = $_POST['athlete_sports'];
			$athletesFunction->athletetaluka = $_POST['athlete_taluka'];
			$athletes = $athletesFunction->isAthleteExist();
			if (!$athletes){
				$athleteinsert = $athletesFunction->athleteInsert();
				$atheletedob = $athletesFunction->athletedob;
				if($athleteinsert){
					echo "success#Athlete inserted successfully!#".$athleteinsert.'#'.$_POST['athlete_name'].'#'.$_POST['athlete_gender'].'#'.$atheletedob.'#'.$_POST['athlete_address'];
				}else{
					echo "failure#Athlete not inserted successfully!";
				}
			}
			else{
				echo "failure#Athlete already Exists";
			}

		}

		// To delete stored data
		if(isset($_GET['deletedata'])){
			$athletesFunction = new athletesFunction();
			$athletesFunction->athleteid = $_POST['delete_id'];
			$statesdelete = $athletesFunction->athleteDelete();
			if($statesdelete){
				echo "success#Athlete deleted successfully!#".$_POST['delete_id'];
			}
			else{
				echo "failure#Athlete not found";
			}
		}

		// For display edit data
		if(isset($_GET['chooseedit'])){
			$json = array();
			$athletesFunction = new athletesFunction();
			$athletesFunction->athleteid = $_POST['data_id'];
			// echo $athletesFunction->athleteid;
		    $edit_data = $athletesFunction->athleteselectRecord();
		    while ( $result = mysql_fetch_array( $edit_data )){
		    	$tmp = array(
	           'athlete_id' => $result['athlete_id'],
	           'athlete_name' => $result['athlete_name'],
	           'athlete_dob' => $result['athlete_dob'],
	           'athlete_mobile' => $result['athlete_mobile'],
	           'athlete_gender' => $result['athlete_gender'],
	           'athletestates_id' => $result['athletestates_id'],
	           'athletestates_name' => $result['states_name'],
	           'athletedistrict_id' => $result['athletedistrict_id'],
	           'athletedistrict_name' => $result['district_name'],
	           'athlete_address' => $result['athlete_address'],
	           'athlete_taluka' => $result['athlete_taluka'],
	           'athletesports_id' => $result['athletesports_id'],
	           'athletesports_name' => $result['sports_name'],
	           );
	    		array_push( $json, $tmp );
		    }
		    echo json_encode($json);
		}
		// To store edited data
		if(isset($_GET['editdata'])){
			$athletesFunction = new athletesFunction();
			$athletesFunction->athleteid=$_POST['edit_athlete_id'];
 			$athletesFunction->athletename=$_POST['edit_athlete_name'];
 			$athletesFunction->athletedob=$_POST['dateyear'].'-'.$_POST['datemonth'].'-'.$_POST['dateday'];
 			$athletesFunction->athletemobile=$_POST['edit_athlete_mobile'];
	    	$athletesFunction->athletegender=$_POST['edit_athlete_gender'];
	   		$athletesFunction->athletestatesid=$_POST['edit_athlete_state'];
			$athletesFunction->athletedistrictid=$_POST['edit_athlete_district'];
	    	$athletesFunction->athleteaddress=$_POST['edit_athlete_address'];
	    	$athletesFunction->athletesportsid=$_POST['edit_athlete_sports'];

	    	// $edit_data = mysql_fetch_array($athletesFunction->selectData());
	    	// $athletesFunction->$athletestatesname = $edit_data['states_name'];

			$athletesupdate = $athletesFunction->athleteUpdate();
			if($athletesupdate){
				// echo "success#Record Updated";
				echo "success#Athlete edited successfully!#".$_POST['edit_athlete_id']."#".$_POST['edit_athlete_name'].'#'.$_POST['edit_athlete_gender']."#".$athletesFunction->athletedob."#".$_POST['edit_athlete_address'];
			}else{
				echo "failure#Athlete not edited successfully!";
			}
		}
        if(isset($_GET['get_ath'])){
            $athlete_id = $_POST['ath_id'];
            $sql = mysql_query("SELECT * FROM wc_athlete where athlete_status='1'and athlete_id='$athlete_id'")or die(mysql_error());
            $res = mysql_fetch_assoc($sql);
            print(json_encode($res));

        }
		if(isset($_GET['admin_login'])){
			session_start();
			$_SESSION['login'] = true;
			$_SESSION['userid'] = '100';
			$_SESSION['usertype'] = 'admin';
		}
		if(isset($_GET['athelete_check'])){
			$category = $_POST['cate'];
			$schedule = $_POST['sche'];
			$athelete = $_POST['athe'];
			$query = mysql_query("select * from wc_assignschedule where assigncreateschedule_id = '$schedule' and assignathlete_id = '$athelete'");
			if(mysql_num_rows($query) == 0){
				echo 'success';
			}else{
				echo 'error';
			}

		}
		//newly added for v2
		if(isset($_GET['athletename_update'])){
			$athletesFunction = new athletesFunction();
			$athletesFunction->athleteid=$_POST['check_athleteid'];
 			$athletesFunction->athletename=$_POST['check_athletename'];
			$athletename_update = $athletesFunction->athletenameUpdate();
			if($athletename_update){
				echo "success#Athlete name edited successfully!#".$_POST['check_athletename'];
			}else{
				echo "failure#Athlete name not edited successfully!";
			}
		}
	  }
?>
