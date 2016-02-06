<?php
require_once 'dbconnect.php';
 	class statesFunction {		  
		function __construct() {			
			// connecting to database
			// $db = new dbConnect();
			// echo $db;			 
		}
		// destructor
		function __destruct() {
			
		}
		public function statesSelect(){
			$res = mysql_query("select * from wc_states")or die(mysql_error());
			return $res;
		}
		public function statesInsert($statesname){
			$res = mysql_query("insert into wc_states (states_name,states_status) values('$statesname','1')")or die(mysql_error());
			if($res){ return true; }
			else{ return false; }		 
		}
		public function isStatesExist($statesname){
			$qr = mysql_query("SELECT * FROM wc_states WHERE states_name = '".$statesname."'");
			$row = mysql_num_rows($qr);
			if($row > 0){
				return true;
			} else {
				return false;
			}
		}
	}
?>