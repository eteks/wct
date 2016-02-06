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
		public function districtInsert($statesname){
			$res = mysql_query("insert into wc_district (states_name,states_status) values('$statesname','1')")or die(mysql_error());
			if($res){ return true; }
			else{ return false; }		 
		}
		public function isDistrictExist($statesname){
			$qr = mysql_query("SELECT * FROM wc_district WHERE states_name = '".$statesname."'");
			$row = mysql_num_rows($qr);
			if($row > 0){
				return true;
			} else {
				return false;
			}
		}
	}
?>