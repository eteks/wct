<?php
	include($_SERVER["DOCUMENT_ROOT"] . "/wct/common.php");
	class resultFunction {
		public $resultid;
		public $createscheduleid;

		public function resultathleteRecord(){
			$res = mysql_query("SELECT * FROM wc_assignschedule as ash INNER JOIN wc_athlete as at ON at.athlete_id = ash.assignathlete_id WHERE ash.assigncreateschedule_id='".$this->createscheduleid."'")or die(mysql_error());
			return $res;
		}
	}
	if(isset($_POST)){
		//To load athletes based on selected schedule
		if(isset($_GET['loadathletes'])){
			$json =array();
			$resultFunction = new resultFunction();
			$resultFunction->createscheduleid = $_POST['createschedule_id'];
			$select_athletes = $resultFunction->resultathleteRecord();
			while ( $result = mysql_fetch_array( $select_athletes )){
	    		array_push( $json, $result );
		    }
		    echo json_encode($json);
		}
	}
?>
