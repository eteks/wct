<?php
	
    include ("../dbconnect.php");
    include ("../common.php");
	
 	class districtFunction {
 		public $statesid;
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
		public function districtInsert($stateid,$districtname){
			$res = mysql_query("insert into wc_district (districtstates_id,district_name,district_status) values('$stateid','$districtname','1')")or die(mysql_error());			
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
?>