<?php
	include($_SERVER["DOCUMENT_ROOT"] . "/wct/common.php");
 	class rangeFunction {
 		public $rangeid;
 		public $rangetestbatteryid;
 		public $rangetestbatteryname;
	    public $rangecategoryid;
	    public $rangecategoryname;	
	    public $rangetestid;
	    public $rangetestname;
	    public $rangetestattributeid;
	    public $rangeparametername;
	    public $rangeattributeid;							  
	    public $rangestart;	
	    public $rangeend;	
	    public $rangepoint;				

		//To select all record for displaying data in table
		public function rangeSelect(){
			$res = mysql_query("select * from wc_range as r INNER JOIN wc_test as t ON r.rangetest_id=t.test_id INNER JOIN wc_test_attribute as ta ON ta.test_attribute_id = r.rangetestattribute_id where r.range_status='1' ORDER BY r.range_id DESC")or die(mysql_error());
			return $res;
		}
		public function rangeInsert(){
			$res = mysql_query("insert into wc_range (rangetestbattery_id,rangecategories_id,rangetest_id,rangetestattribute_id,range_status) values('".$this->rangetestbatteryid."','".$this->rangecategoryid."','".$this->rangetestid."','".$this->rangetestattributeid."','1')")or die(mysql_error());			
			$lastinsertid = mysql_insert_id();
			if($res){ return $lastinsertid; }
			else{ return false; }
		}
		public function rangeattributeInsert(){
			$res = mysql_query("insert into wc_range_attribute (range_id,range_start,range_end,range_point,range_attribute_status) values('".$this->rangeid."','".$this->rangestart."','".$this->rangeend."','".$this->rangepoint."','1')")or die(mysql_error());			
			$lastinsertid = mysql_insert_id();
			if($res){ return $lastinsertid; }
			else{ return false; }
		}
		public function rangeUpdate(){		
            $res = mysql_query("update wc_range set rangetestbattery_id='".$this->rangetestbatteryid."',rangetest_id='".$this->rangetestid."',rangetestattribute_id='".$this->rangetestattributeid."',rangecategories_id='".$this->rangecategoryid."' where range_id ='".$this->rangeid."'")or die(mysql_error());          
			if($res){ return true; }
			else{ return false; }		
		}
		public function rangeattributeUpdate(){		
            $res = mysql_query("update wc_range_attribute set range_start='".$this->rangestart."',range_end='".$this->rangeend."',range_point='".$this->rangepoint."' where range_attribute_id ='".$this->rangeattributeid."' and range_id ='".$this->rangeid."'")or die(mysql_error());          
			if($res){ return true; }
			else{ return false; }		
		}
		public function rangeDelete(){		
            $res = mysql_query("delete from wc_range where range_id ='".$this->rangeid."' ")or die(mysql_error());          			
			if($res){ return true; }
			else{ return false; }		
		}
		// To select particular data by using id
		public function rangeselectRecord(){
			$res = mysql_query("SELECT * FROM wc_range as r INNER JOIN wc_testbattery as tb INNER JOIN wc_categories as c INNER JOIN wc_test as t INNER JOiN wc_test_attribute as ta ON tb.testbattery_id = r.rangetestbattery_id and c.categories_id = r.rangecategories_id and t.test_id = r.rangetest_id and ta.test_attribute_id = r.rangetestattribute_id WHERE r.range_id='".$this->rangeid."'")or die(mysql_error());
			return $res;	
		}
		// To select particular data by using id
		public function rangeattributeselectRecord(){
			$res = mysql_query("SELECT * FROM wc_range_attribute WHERE range_id = '".$this->rangeid."'")or die(mysql_error());
			return $res;	
		}
		//Fetch Test name by selected test id
		public function testnameSelect(){
			$res = mysql_query("SELECT test_name FROM wc_test WHERE test_id='".$this->rangetestid."'")or die(mysql_error());
			return $res;
		}
		public function parameternameSelect(){
			$res = mysql_query("SELECT * FROM wc_test_attribute WHERE test_id='".$this->rangetestid."' ORDER BY test_attribute_id ASC LIMIT 1")or die(mysql_error());
			return $res;
		}
		public function parameterSelect(){
			$res = mysql_query("SELECT * FROM wc_test_attribute WHERE test_attribute_id='".$this->rangetestattributeid."'")or die(mysql_error());
			return $res;
		}
		//Fetch Category by selected testbattery id
		public function categoryselect(){
			$res = mysql_query("SELECT categories_id, categories_name FROM wc_categories as c INNER JOIN wc_testbattery_category_attribute as tbca ON 
				c.categories_id = tbca.testbattery_category_id WHERE tbca.testbattery_id='".$this->rangetestbatteryid."'")or die(mysql_error());
			return $res;
		}
		//Fetch Test by selected testbattery id
		public function testselect(){
			$res = mysql_query("SELECT test_id, test_name FROM wc_test as t INNER JOIN wc_testbattery_test_attribute as tbta ON 
				t.test_id = tbta.testbattery_test_id WHERE tbta.testbattery_id='".$this->rangetestbatteryid."'")or die(mysql_error());
			return $res;
		}
		public function isParameterExist(){
			// $qr = mysql_query("SELECT * FROM wc_range WHERE rangetestattribute_id = '".$this->rangetestattributeid."'");
			//newly changed
			// echo "SELECT * FROM wc_range WHERE rangecategories_id='".$this->rangecategoryid."' AND rangetest_id='".$this->rangetestid."' AND rangetestattribute_id='".$this->rangetestattributeid."'";
			$qr = mysql_query("SELECT * FROM wc_range WHERE rangecategories_id='".$this->rangecategoryid."' AND rangetest_id='".$this->rangetestid."' AND rangetestattribute_id='".$this->rangetestattributeid."'")or die(mysql_error());
			$row = mysql_num_rows($qr);
			if($row > 0){
				return true;
			} else {
				return false;
			}
		}
		// To select particular data by using id
		public function rangeselectCategory(){
			$res = mysql_query("SELECT categories_id,categories_name FROM wc_range as r INNER JOIN wc_testbattery_category_attribute as tca 
				ON tca.testbattery_id = r.rangetestbattery_id INNER JOIN wc_categories as c ON 
				c.categories_id = tca.testbattery_category_id WHERE range_id = '".$this->rangeid."'")or die(mysql_error());
			return $res;	
		}
		public function rangeselectTest(){
			$res = mysql_query("SELECT test_id,test_name FROM wc_range as r INNER JOIN wc_testbattery_test_attribute as tta ON
				tta.testbattery_id =r.rangetestbattery_id INNER JOIN wc_test as t On t.test_id = tta.testbattery_test_id 
				WHERE range_id = '".$this->rangeid."'")or die(mysql_error());
			return $res;	
		}	
	}
	//To insert data
	if(isset($_GET['adddata'])){
		$counter = (count($_POST)-3)/3;
		$rangeFunction = new rangeFunction();
		$rangeFunction->rangetestbatteryid = $_POST['range_testbattery']; 
		$rangeFunction->rangecategoryid =$_POST['range_category']; 
		$rangeFunction->rangetestid=$_POST['range_test']; 
		$rangeFunction->rangetestattributeid=$_POST['range_parameter']; 
		$testname = mysql_fetch_array( $rangeFunction->testnameSelect());
		$rangeFunction->rangetestname = $testname['test_name'];
		$paramters = $rangeFunction->isParameterExist();
		if(!$paramters){
			$rangeinsert = $rangeFunction->rangeInsert();
			if($rangeinsert){
				for($i=1;$i<=$counter;$i++){
	                $rangeFunction->rangeid = $rangeinsert;
	                $rangeFunction->rangestart = $_POST["range_start".$i.""];
	                $rangeFunction->rangeend = $_POST["range_end".$i.""];
	                $rangeFunction->rangepoint = $_POST["range_points".$i.""];
	                $rangeattrinsert = $rangeFunction->rangeattributeInsert();
	            }
	            echo "success#Range Inserted#".$rangeinsert.'#'.$rangeFunction->rangetestname;
			}
			else{
			 	echo "failure#Range Not Inserted";
			} 
		}
		else{
			// echo "failure#Already Assigned Range for this parameter";
			//newly changed
			echo "failure#Already Range Assigned";
		}
	}	
	// For display edit data 
	if(isset($_GET['chooseedit'])){
		$range_json = array();
		$rangeattr_json = array();
		$rangetest_json = array();
		$rangecategory_json = array();

		$rangeFunction = new rangeFunction();
		$rangeFunction->rangeid = $_POST['data_id'];

		$range_test = $rangeFunction->rangeselectTest();
	    $range_category = $rangeFunction->rangeselectCategory();

	    $range_edit_data = $rangeFunction->rangeselectRecord();
	    $rangeattr_edit_data = $rangeFunction->rangeattributeselectRecord();

	    while ( $result = mysql_fetch_array( $range_test )){
	    	$tmp = array(
           'test_id' => $result['test_id'],
           'test_name' => $result['test_name'],
           );
    		array_push( $rangetest_json, $tmp );
	    }
	    while ( $result = mysql_fetch_array( $range_category )){
	    	$tmp = array(
           'categories_id' => $result['categories_id'],
           'categories_name' => $result['categories_name'],
           );
    		array_push( $rangecategory_json, $tmp );
	    }
	    while ( $result = mysql_fetch_array( $range_edit_data )){
	    	$tmp = array(
           'range_id' => $result['range_id'],
           'rangetestbattery_id' => $result['rangetestbattery_id'],
           'rangetestbattery_name' => $result['testbattery_name'],
           'rangecategory_id' => $result['rangecategories_id'],
           'rangecategory_name' => $result['categories_name'],
           'rangetest_id' => $result['rangetest_id'],
           'rangetest_name' => $result['test_name'],
           'rangetestattribute_id' => $result['test_attribute_id'],
           'rangeparameter_name' => $result['test_parameter_name'],
           'rangeparameter_type' => $result['test_parameter_type'],
           'rangeparameter_unit' => $result['test_parameter_unit'],
           'rangeparameter_format' => $result['test_parameter_format'],
           );
    		array_push( $range_json, $tmp );
	    }
	    while ( $result = mysql_fetch_array( $rangeattr_edit_data )){
	    	$tmp = array(
           'rangeattribute_id' => $result['range_attribute_id'],
           'range_id' => $result['range_id'],
           'range_start' => $result['range_start'],
           'range_end' => $result['range_end'],
           'range_point' => $result['range_point'],
           );
    		array_push( $rangeattr_json, $tmp );
	    }
	    echo json_encode($rangetest_json).'#####'.json_encode($rangecategory_json).'#####'.json_encode($range_json).'#####'.json_encode($rangeattr_json);
	}	
	//To store edited data
	if(isset($_GET['editdata'])){
		$counter = (count($_POST)-3)/3;
		$rangeFunction = new rangeFunction();
		$rangeFunction->rangeid = $_POST['edit_range_id'];
		$rangeFunction->rangetestbatteryid = $_POST['edit_range_testbattery']; 
		$rangeFunction->rangecategoryid =$_POST['edit_range_category']; 
		$rangeFunction->rangetestid=$_POST['edit_range_test']; 
		$rangeFunction->rangetestattributeid=$_POST['edit_range_parameter']; 

		$testname = mysql_fetch_array( $rangeFunction->testnameSelect());
		$rangeFunction->rangetestname = $testname['test_name'];
		// $paramters = $rangeFunction->isParameterExist();
		// if(!$paramters){
			$rangeupdate = $rangeFunction->rangeUpdate();
			if($rangeupdate){
				for($i=1;$i<=$counter;$i++){
	                $rangeFunction->rangeattributeid = $_POST["edit_rangeattr_id".$i.""];
	                $rangeFunction->rangestart = $_POST["edit_range_start".$i.""];
	                $rangeFunction->rangeend = $_POST["edit_range_end".$i.""];
	                $rangeFunction->rangepoint = $_POST["edit_range_points".$i.""];
	                $rangeattrupdate = $rangeFunction->rangeattributeUpdate();
	            }
				echo "success#Record Updated#".$_POST['edit_range_id']."#".$rangeFunction->rangetestname;
			}else{
				echo "failure#Range Not Updated";
			}
		// }
		// else{
		// 	echo "failure#Already Assigned Range for this parameter";
		// }	
	}
	// To delete stored data
	if(isset($_GET['deletedata'])){
		$rangeFunction = new rangeFunction();
		$rangeFunction->rangeid = $_POST['delete_id'];
		$rangedelete = $rangeFunction->rangedelete();
		if($rangedelete){
			echo "success#Range Deleted#".$_POST['delete_id'];
		}
		else{
			echo "failure#Range not Deleted";
		}
	}
	// To load parameter for selected test 
	if(isset($_GET['loadparameter'])){
		$json =array();
		$rangeFunction = new rangeFunction();
		$rangeFunction->rangetestid =$_POST['test_id'];
		$select_data = $rangeFunction->parameternameSelect();
		while ( $result = mysql_fetch_array( $select_data )){
	    	$tmp = array(
	           'testattribute_id' => $result['test_attribute_id'],
	           'testparameter_name' => $result['test_parameter_name'],
           );
    		array_push( $json, $tmp );
	    }
	    echo json_encode($json);
	}
	// To load district for selected state
	if(isset($_GET['loaddatafromdb'])){
		$rangeFunction = new rangeFunction();
		$rangeFunction->rangetestbatteryid =$_POST['testbattery_id'];
		$selectcategory_data = $rangeFunction->categoryselect();
		$category_json =array();
		while ( $result = mysql_fetch_array( $selectcategory_data )){
	    	$tmp = array(
           'categories_id' => $result['categories_id'],
           'categories_name' => $result['categories_name'],
           );
    		array_push( $category_json, $tmp );
	    }
	    $selecttest_data = $rangeFunction->testselect();
	    $test_json =array();
		while ( $result = mysql_fetch_array( $selecttest_data )){
	    	$tmp = array(
           'test_id' => $result['test_id'],
           'test_name' => $result['test_name'],
           );
    		array_push( $test_json, $tmp );
	    }

	    echo json_encode($category_json).'#####'.json_encode($test_json);
	} 
	// To load parameter format and unit using testattribute id
	if(isset($_GET['paramformat'])){
		$json =array();
		$rangeFunction = new rangeFunction();
		$rangeFunction->rangetestattributeid =$_POST['testattribute_id'];
		$select_data = $rangeFunction->parameterSelect();
		while ( $result = mysql_fetch_array( $select_data )){
	    	$tmp = array(
	    	   'test_parameter_type' => $result['test_parameter_type'],
	           'test_parameter_unit' => $result['test_parameter_unit'],
	           'test_parameter_format' => $result['test_parameter_format'],
           );
    		array_push( $json, $tmp );
	    }
	    echo json_encode($json);
	}
?>