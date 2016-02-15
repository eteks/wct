<?php
	include($_SERVER["DOCUMENT_ROOT"] . "/wct/common.php");
 	class resultFunction {
 		public $resultid;
 		public $createscheduleid;
 		public $athleteid;
		public function resultathleteRecord(){
			$res = mysql_query("SELECT * FROM wc_assignschedule as ash INNER JOIN wc_athlete as at ON at.athlete_id = ash.assignathlete_id WHERE ash.assigncreateschedule_id='".$this->createscheduleid."'")or die(mysql_error());
			return $res;
		}

		public function resultSelect(){
			$res = mysql_query("SELECT test_name, test_parameter_name,test_parameter_type,test_parameter_unit,test_parameter_format FROM wc_createschedule as cs INNER JOIN wc_testbattery tb
				 ON tb.testbattery_id = cs.createscheduletestbattery_id INNER JOIN
				 wc_testbattery_test_attribute as tbta ON tbta.testbattery_id=tb.testbattery_id
				 INNER JOIN wc_test as t ON t.test_id = tbta.testbattery_test_id INNER JOIN
				 wc_test_attribute as ta ON ta.test_id = t.test_id WHERE cs.createschedule_id='".$this->createscheduleid."'")or die(mysql_error());
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
		//To load test name and parameter name for entering reseult based on selected schedule and athelete
		if(isset($_GET['loadtestparam'])){
			$json =array();
			$resultFunction = new resultFunction();
			$resultFunction->createscheduleid = $_POST['result_createschedule'];
			$resultFunction->athleteid = $_POST['result_athleteid'];
			$select_testparam = $resultFunction->resultSelect();
			while ( $result = mysql_fetch_array( $select_testparam )){
				$tmp = array(
			   'athlete_id' => $_POST['result_athleteid'],
	           'test_name' => $result['test_name'],
	           'parameter_name' => $result['test_parameter_name'],
	           'parameter_type' => $result['test_parameter_type'],
	           'parameter_unit' => $result['test_parameter_unit'],
	           'parameter_format' => $result['test_parameter_format'],
	           );
	    		array_push( $json, $tmp );
		    }
		    echo json_encode($json);
		}	
	}
?>
