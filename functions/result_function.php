<?php
	include($_SERVER["DOCUMENT_ROOT"] . "/wct/common.php");
 	class resultFunction {
 		public $resultid;
 		public $createscheduleid;
 		public $athleteid;
 		public $resulttest_name;
 		public $resultparameter_name;
 		public $result;
 		public $points;
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
		public function resultInsert(){
			$res = mysql_query("insert into wc_result (resultcreateschedule_id,resultathlete_id,resulttest_name,resultparameter_name,result,points,result_status)
				values('".$this->createscheduleid."','".$this->athleteid."','".$this->resulttest_name."','".$this->resultparameter_name."','".$this->result."','".$this->points."','1')")or die(mysql_error());
			$lastinsertid = mysql_insert_id();
			if($res){ return $lastinsertid; }
			else{ return false; }
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
		if(isset($_GET['storeresult'])){
			$strRequest = file_get_contents('php://input');
			$Request = json_decode($strRequest);
			$resultFunction = new resultFunction();
			foreach($Request as $value){
				$resultFunction->createscheduleid = $value->createschedule_id;
				$resultFunction->athleteid = $value->athlete_id; 
				$resultFunction->resulttest_name = $value->test_name; 
				$resultFunction->resultparameter_name = $value->parameter_name; 
				$resultFunction->result = $value->enter_result; 
				$resultFunction->points = $value->enter_points;  
				$resultinsert = $resultFunction->resultInsert();
			}
			echo "<script>Result Created</script>";
		}
	}
?>
