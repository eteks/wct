<?php
require_once 'dbconnect.php';
require_once 'common.php';
 	class districtFunction {		  
		function __construct() {			
			// connecting to database
			// $db = new dbConnect();
			// echo $db;			 
		}
		// destructor
		function __destruct() {
			
		}
		public function districtSelect(){
			$res = mysql_query("select * from wc_district")or die(mysql_error());
			return $res;
		}
		public function districtInsert($stateid,$districtname){
			$res = mysql_query("insert into wc_district (districtstates_id,district_name,district_status) values('$stateid','$districtname','1')")or die(mysql_error());
			// $res = mysql_query("insert into wc_district (districtstates_id,district_name,district_status) values(mysql_query("SELECT '$states_id' FROM wc_states WHERE 'states_id' = '".$stateid."'"),'$districtname','1')")or die(mysql_error());
			echo "res",$res;
			if($res){ return true; }
			else{ return false; }	 
		}
		public function isDistrictExist($districtname){	
				$qr = mysql_query("SELECT * FROM wc_district WHERE district_name = '".$districtname."'");
				$row = mysql_num_rows($qr);
				if($row > 0){
					return true;
				} else {
					return false;
				}			
		}
	}
	// class loaddistrictFunction{
	// 	if(isset($_GET['loaddistrict'])){
	// 		echo "yes get function";
	// 		echo $_GET['loaddistrict'];
	// 		return "success";
	// 	}

	// }
	// $loaddistrictFunction = new loaddistrictFunction();
?>