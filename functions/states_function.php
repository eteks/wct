<?php
if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && !empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest')
{
  include ("../dbconnect.php");
  include ("../common.php");
}
else {
  include ("dbconnect.php");
  include ("common.php");
}
 	class statesFunction {	
 		public $statesid;
	    public $statesname;
	    public $statesstatus;

		function __construct() {			
		}
		// destructor
		function __destruct() {
			
		}
		public function statesSelect(){
			$res = mysql_query("select * from wc_states where states_status='1'")or die(mysql_error());
			return $res;
		}
		public function statesInsert(){
			$res = mysql_query("insert into wc_states (states_name,states_status) values('".$this->statesname."','1')")or die(mysql_error());
			$lastinsertid = mysql_insert_id();
			if($res){ return $lastinsertid; }
			else{ return false; }		 
		}
		public function isStatesExist(){
			$qr = mysql_query("SELECT * FROM wc_states WHERE states_name = '".$this->statesname."'");
			$row = mysql_num_rows($qr);
			if($row > 0){
				return true;
			} else {
				return false;
			}
		}
	}
	if(isset($_POST)){
		if(isset($_GET['adddata'])){
			$statesFunction = new statesFunction();
			$statesFunction->statesname = $_POST['states_name'];	
			if ($_POST['states_name']){
				if (in_array($_POST['states_name'], $STATES)) {
				$states = $statesFunction->isStatesExist();
				if(!$states){
					$statesinsert = $statesFunction->statesInsert();
					if($statesinsert){
						echo "success#State Inserted#".$statesinsert.'#'.$_POST['states_name'];
					}else{
						echo "failure#State Not Inserted";
					}
				}
				else {
					echo "failure#State Already Exist";
				}
				}
				else{
					echo "failure#No State Present in that Name";
				}
			}
			else{
				echo "failure#Please Enter state";
			}
			
		}			
	  }
?>