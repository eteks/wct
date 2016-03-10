<?php
	include('configu.php');
 	class resultFunction {
 		public $resultid;
 		public $createscheduleid;
 		public $athleteid;
 		public $resulttest_name;
 		public $resultparameter_name;
 		public $result;
 		public $points;
		public function resultathleteRecord(){
			$res = mysql_query("SELECT * FROM wc_assignschedule as ash INNER JOIN wc_athlete as at ON ash.assignathlete_id=at.athlete_id WHERE ash.assigncreateschedule_id='".$this->createscheduleid."'")or die(mysql_error());
			return $res;

			// $res = mysql_query("SELECT * FROM wc_assignschedule as ash INNER JOIN wc_athlete as at ON ash.assignathlete_id=at.athlete_id WHERE ash.assigncreateschedule_id='".$this->createscheduleid."'")or die(mysql_error());
			// $results = mysql_fetch_array($res);
			// if($results){
			// 	return $res;
			// }
			// else{
			// 	return false;
			// }
		}

		public function resultassignscheduleSelect(){
			$res = mysql_query("SELECT DISTINCT createschedule_id,createschedule_name FROM wc_assignschedule as asch INNER JOIN wc_createschedule cs
				 ON asch.assigncreateschedule_id = cs.createschedule_id")or die(mysql_error());
			return $res;
		}

		public function resultSelect(){
			// $res = mysql_query("SELECT * FROM wc_assignschedule as asch INNER JOIN wc_testbattery_category_attribute tca
			// 	 ON tca.testbattery_category_id = asch.assigncategory_id INNER JOIN
			// 	 wc_testbattery_test_attribute as tbta ON tbta.testbattery_id=tca.testbattery_id
			// 	 INNER JOIN wc_test as t ON t.test_id = tbta.testbattery_test_id INNER JOIN
			// 	 wc_test_attribute as ta ON ta.test_id = t.test_id LEFT JOIN wc_range as r ON
			// 	 r.rangetestattribute_id = ta.test_attribute_id WHERE asch.assigncreateschedule_id='".$this->createscheduleid."' AND asch.assignathlete_id='".$this->athleteid."' GROUP BY test_name,test_parameter_name")or die(mysql_error());
			$res = mysql_query("SELECT * FROM wc_assignschedule as asch INNER JOIN wc_createschedule as cs ON cs.createschedule_id = asch.assigncreateschedule_id INNER JOIN 
				 wc_testbattery_test_attribute as tbta ON tbta.testbattery_id=cs.createscheduletestbattery_id
				 INNER JOIN wc_test as t ON t.test_id = tbta.testbattery_test_id INNER JOIN
				 wc_test_attribute as ta ON ta.test_id = t.test_id LEFT JOIN wc_range as r ON
				 r.rangetestattribute_id = ta.test_attribute_id WHERE asch.assigncreateschedule_id='".$this->createscheduleid."' AND 
				 asch.assignathlete_id='".$this->athleteid."' GROUP BY test_name,test_parameter_name")or die(mysql_error());
			return $res;

		}
		public function resultInsert(){
			$res = mysql_query("insert into wc_result (resultcreateschedule_id,resultathlete_id,resulttest_name,resultparameter_name,result,points,result_status)
				values('".$this->createscheduleid."','".$this->athleteid."','".$this->resulttest_name."','".$this->resultparameter_name."','".$this->result."','".$this->points."','1')")or die(mysql_error());
			$lastinsertid = mysql_insert_id();
			if($res){ return $lastinsertid; }
			else{ return false; }
		}
		public function isresultExist(){
			$qr = mysql_query("SELECT * FROM wc_result WHERE resultcreateschedule_id = '".$this->createscheduleid."' AND resultathlete_id = '".$this->athleteid."' AND resulttest_name = '".$this->resulttest_name."' AND resultparameter_name = '".$this->resultparameter_name."'");
			$row = mysql_num_rows($qr);
			if($row > 0){
				return true;
			} else {
				return false;
			}
		}
		public function isresultExistgetdata(){
			$qr = mysql_query("SELECT * FROM wc_result WHERE resultcreateschedule_id = '".$this->createscheduleid."' AND resultathlete_id = '".$this->athleteid."' AND resulttest_name = '".$this->resulttest_name."' AND resultparameter_name = '".$this->resultparameter_name."'");
			return $qr;
		}
		public function resultUpdate(){
			$res = mysql_query("update wc_result set resultcreateschedule_id = '".$this->createscheduleid."', resultathlete_id = '".$this->athleteid."', resulttest_name = '".$this->resulttest_name."', resultparameter_name = '".$this->resultparameter_name."', result = '".$this->result."', points = '".$this->points."' where result_id ='".$this->resultid."'")or die(mysql_error());
			if($res){ return true; }
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
			// if($select_athletes){
				while ( $result = mysql_fetch_array( $select_athletes )){
		    		array_push( $json, $result );
			    }
			    // echo json_encode($json);
			    echo "success#".json_encode($json);
			// }
			// else{
			// 	echo "failure#No Athletes assign for this schedule";
			// }
		}
		//To load test name and parameter name for entering reseult based on selected schedule and athelete
		if(isset($_GET['loadtestparam'])){
			$json =array();
			$jsonresult =array();
			$resultFunction = new resultFunction();
			$resultFunction->createscheduleid = $_POST['result_createschedule'];
			$resultFunction->athleteid = $_POST['result_athleteid'];
			$select_testparam = $resultFunction->resultSelect();
			while ( $result = mysql_fetch_array( $select_testparam )){
				$range_id = $result['range_id'];
				$select_rangeattribute = mysql_query("SELECT * FROM wc_range_attribute WHERE range_id='$range_id'") or die(mysql_error());
				$rangejson = array();
				while ( $result_range = mysql_fetch_array( $select_rangeattribute )){
					$tmp1 = array(
						// 'rangeattribute_id' => $result_range['range_attribute_id'],
						'range_start' => $result_range['range_start'],
						'range_end' => $result_range['range_end'],
						'range_point' => $result_range['range_point'],
					);
					array_push( $rangejson, $tmp1 );
				}
				// echo json_encode($rangejson);
				$tmp2 = array(
			   'athlete_id' => $_POST['result_athleteid'],
	           'test_name' => $result['test_name'],
	           'parameter_name' => $result['test_parameter_name'],
	           'parameter_type' => $result['test_parameter_type'],
	           'parameter_unit' => $result['test_parameter_unit'],
	           'parameter_format' => $result['test_parameter_format'],
	           'ranges' => $rangejson,
	            );
    			array_push( $json, $tmp2 );

    			//newly added
    			$resultFunction->resulttest_name = $result['test_name'];
    			$resultFunction->resultparameter_name = $result['test_parameter_name'];
    			$checkresult = $resultFunction->isresultExistgetdata();
    			if(count($checkresult)!=0){
    				while ( $result_data = mysql_fetch_array( $checkresult )){
    					$tmp3 = array(
						   'result_id' => $result_data['result_id'],
				           'resulttest_name' => $result['test_name'],
				           'resultparameter_name' => $result['test_parameter_name'],
				           'result' => $result_data['result'],
				           'points' => $result_data['points'],
			            );
		    			array_push( $jsonresult, $tmp3 );
    				}
    			}
		    }
		    echo json_encode($json).'###'.json_encode($jsonresult);
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
				if($value->enter_points){
					$resultFunction->points = $value->enter_points;
				}
				else {
					$resultFunction->points = 0;
				}
				$result = $resultFunction->isresultExist();
				if($result){
					$status = 0;
					$resultFunction->resultid = $value->result_id;
					$resultupdate = $resultFunction->resultUpdate();
				}else{
					$status = 1;
					$resultinsert = $resultFunction->resultInsert();
				}
				// $result = $resultFunction->isresultExist();

				// if(!$result){
				// 	$resultinsert = $resultFunction->resultInsert();
				// 	$status = true;
				// }
				// else{
				// 	$status = false;
				// }
			}
			if($status == 1)
				echo "success#Result Created";
			else
				echo "success#Result Updated";
			// if($status == true)
			// 	echo "success#Result Created";
			// else
			// 	echo "failure#Result Already Created for this athlete with the same parameter name";
		}
	}
?>
