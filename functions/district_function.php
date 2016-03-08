<?php
include('configu.php');
 	class districtFunction {
 		public $statesid;
 		public $statesname;
 		public $districtid;
	    public $districtname;
	    public $districtstatus;
		function __construct() {
		}
		// destructor
		function __destruct() {

		}
		//To select all record for displaying data in table
		public function districtSelect(){
			$res = mysql_query("select * from wc_states s,wc_district d where d.districtstates_id=s.states_id and d.district_status='1' ORDER BY district_id DESC")or die(mysql_error());
			return $res;
		}
		public function districtInsert(){
			$res = mysql_query("insert into wc_district (districtstates_id,district_name,district_status) values('".$this->statesid."','".$this->districtname."','1')")or die(mysql_error());
			$lastinsertid = mysql_insert_id();
			if($res){ return $lastinsertid; }
			else{ return false; }
		}
		public function districtUpdate(){
            $res = mysql_query("update wc_district set districtstates_id='".$this->statesid."',district_name='".$this->districtname."' where district_id ='".$this->districtid."'")or die(mysql_error());
			if($res){ return true; }
			else{ return false; }
		}
		public function districtDelete(){
            $res = mysql_query("delete from wc_district where district_id ='".$this->districtid."' ")or die(mysql_error());
			// $res = mysql_query("update wc_district set district_status='0' where district_id ='".$this->districtid."'")or die(mysql_error());
			if($res){ return true; }
			else{ return false; }
		}
		public function isDistrictExist(){
				$qr = mysql_query("SELECT * FROM wc_district WHERE districtstates_id = '".$this->statesid."' AND district_name = '".$this->districtname."'");
				$row = mysql_num_rows($qr);
				if($row > 0){
					return true;
				} else {
					return false;
				}
		}
		public function statenameSelect(){
			$res = mysql_query("SELECT states_name FROM wc_states WHERE states_id='".$this->statesid."'")or die(mysql_error());
			return $res;
		}
		// To select particular data by using id
		public function dsitrictselectRecord(){
			$res = mysql_query("SELECT * FROM wc_district as d INNER JOIN wc_states as s ON s.states_id = d.districtstates_id WHERE d.district_id='".$this->districtid."'")or die(mysql_error());
			return $res;
		}
		// To select set of record by matching state id
		public function dsitrictstateselectRecord(){
			$res = mysql_query("SELECT * FROM wc_district WHERE districtstates_id='".$this->statesid."'")or die(mysql_error());
			return $res;
		}
		public function districtsearchSelect(){
			$res = mysql_query("select * from wc_district as d INNER JOIN wc_states as s ON s.states_id=d.districtstates_id group by s.states_id")or die(mysql_error());
			return $res;
		}
	}
	if(isset($_POST)){
		//To insert data
		if(isset($_GET['adddata'])){
			$addstatus = false;
			$districtFunction = new districtFunction();
			$districtFunction->statesid = $_POST['district_state'];
			$districtFunction->districtname = $_POST['district_name'];
            $exist = '';
			foreach ($_POST['district_name'] as $key => $value) {
				$check_query = "select * from wc_district where districtstates_id = '".$_POST['district_state']."' and district_name = '".$value."' ";
				if(!mysql_num_rows(mysql_query($check_query))){
					mysql_query("insert into wc_district (districtstates_id,district_name,district_status) values('".$_POST['district_state']."','".$value."','1')")or die(mysql_error());
				}else{
					$exist .= $value.',';
				}
			}
			print $exist;

		}
		// For display edit data
		if(isset($_GET['chooseedit'])){
			$json = array();
			$districtFunction = new districtFunction();
			$districtFunction->districtid = $_POST['data_id'];
		    $edit_data = $districtFunction->dsitrictselectRecord();
		    while ( $result = mysql_fetch_array( $edit_data )){
		    	$tmp = array(
	           'district_id' => $result['district_id'],
	           'states_id' => $result['states_id'],
	           'states_name' => $result['states_name'],
	           'district_name' => $result['district_name'],
	           );
	    		array_push( $json, $tmp );
		    }
		    echo json_encode($json);
		}
		// To store edited data
		if(isset($_GET['editdata'])){
			$editstatus = false;
			$districtFunction = new districtFunction();
			$districtFunction->districtid = $_POST['edit_district_id'];
			$districtFunction->statesid = $_POST['edit_district_state'];
			$districtFunction->districtname = $_POST['edit_district_name'];
			//Multidimensional array looping for district
			foreach ($DISTRICT as $element) {
		        if (in_array($_POST['edit_district_name'], $element)){$editstatus = true;}
	        }
			// if ($editstatus) {
				$district = $districtFunction->isdistrictExist();
				if(!$district){
					$districtupdate = $districtFunction->districtUpdate();
					if($districtupdate){
						echo "success#District Updated#".$_POST['edit_district_id']."#".$_POST['edit_district_name'];
					}else{
						echo "failure#District Not Updated";
					}
				}
				else {
					echo "failure#District Already Exist";
				}
			// }
			// else{
			// 	echo "failure#No District Present in that Name";
			// }
		}
		// To delete stored data
		if(isset($_GET['deletedata'])){
			$districtFunction = new districtFunction();
			$districtFunction->districtid = $_POST['delete_id'];
			$dsitrictdelete = $districtFunction->districtDelete();
			if($dsitrictdelete){
				echo "success#District Deleted#".$_POST['delete_id'];
			}
			else{
				echo "failure#Record not found";
			}
		}
		// To load district for selected state
		if(isset($_GET['loaddistrict'])){
			$search=$_POST['states_name'];
			$json = array();
			foreach($DISTRICT as $key => $value) {
				if($key == $search){
					echo json_encode($value);
				}
			}
		}
		// To load district for selected state
		if(isset($_GET['loaddistrictfromdb'])){
			$json =array();
			$districtFunction = new districtFunction();
			$districtFunction->statesname =$_POST['states_name'];
			$districtFunction->statesid =$_POST['states_id'];
			$select_data = $districtFunction->dsitrictstateselectRecord();
			while ( $result = mysql_fetch_array( $select_data )){
		    	$tmp = array(
	           'district_id' => $result['district_id'],
	           'district_name' => $result['district_name'],
	           );
	    		array_push( $json, $tmp );
		    }
		    echo json_encode($json);
		}
	  }
?>
