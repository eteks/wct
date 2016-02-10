<?php
	
    include ("../dbconnect.php");
    include ("../common.php");
	
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
		
		public function districtSelect(){
			$res = mysql_query("select d.district_id,s.states_name,d.district_name from wc_states s,wc_district d where d.districtstates_id=s.states_id")or die(mysql_error());
			return $res;
		}
		public function districtInsert(){
			$res = mysql_query("insert into wc_district (districtstates_id,district_name,district_status) values('".$this->statesid."','".$this->districtname."','1')")or die(mysql_error());			
			if($res){ return true; }
			else{ return false; }	 
		}
		public function isDistrictExist(){	
				$qr = mysql_query("SELECT * FROM wc_district WHERE district_name = '".$this->districtname."'");
				$row = mysql_num_rows($qr);
				if($row > 0){
					echo "row",$row;
					return true;
				} else {
					echo "row",$row;
					return false;
				}			
		}
		public function statenameSelect(){
			$res = mysql_query("SELECT states_name FROM wc_states WHERE states_id='".$this->statesid."'")or die(mysql_error());
			return $res;
		}
		public function selectData(){
			// $res = mysql_query("SELECT * FROM wc_district WHERE district_id = '".$this->districtid."'")or die(mysql_error());
			$res = mysql_query("SELECT * FROM wc_district as d INNER JOIN wc_states as s ON s.states_id = d.districtstates_id WHERE d.district_id='".$this->districtid."'")or die(mysql_error());
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
			//Multidimensional array looping for district	
			foreach ($DISTRICT as $element) {
		        if (in_array($_POST['district_name'], $element)){$addstatus = true;}
	        }
			if ($addstatus) {
				$district = $districtFunction->isdistrictExist();
				echo "district",$district;
				if(!$district){
					$districtinsert = $districtFunction->districtInsert();
					if($districtinsert){
						$states = mysql_fetch_array($districtFunction->statenameSelect());
						echo "success#District Inserted#".$districtinsert.'#'.$states['states_name'].'#'.$_POST['district_name'];
					}else{
						echo "failure#District Not Inserted";
					}
				}
				else {
					echo "failure#District Already Exist";
				}
			}
			else{
				echo "failure#No District Present in that Name";
			} 		
		}	
		// For display edit data 
		if(isset($_GET['chooseedit'])){
			$json = array();
			$districtFunction = new districtFunction();
			$districtFunction->districtid = $_POST['data_id'];
		    $edit_data = $districtFunction->selectData();
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
	  }
?>