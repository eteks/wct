<?php
	
    include ("../dbconnect.php");
    include ("../common.php");
	
 	class rangeFunction {
 		public $rangeid;
 		public $rangetestbatteryid;
 		public $rangetestbatteryname;
	    public $rangecategoryid;
	    public $rangecategoryname;	
	    public $rangetestid;
	    public $rangetestname;
	    public $rangeattributeid;							  
	    public $rangestart;	
	    public $rangeend;	
	    public $rangepoint;				

		//To select all record for displaying data in table
		public function rangeSelect(){
			$res = mysql_query("select * from wc_range r,wc_test t where r.rangetest_id=t.test_id and r.range_status='1'")or die(mysql_error());
			return $res;
		}
		public function rangeInsert(){
			$res = mysql_query("insert into wc_range (rangetestbattery_id,rangecategories_id,rangetest_id,range_status) values('".$this->rangetestbatteryid."','".$this->rangecategoryid."','".$this->rangetestid."','1')")or die(mysql_error());			
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
            $res = mysql_query("update wc_district set districtstates_id='".$this->statesid."',district_name='".$this->districtname."' where district_id ='".$this->districtid."'")or die(mysql_error());          
			if($res){ return true; }
			else{ return false; }		
		}
		public function rangeDelete(){		
            // $res = mysql_query("delete from wc_states where states_id ='".$this->statesid."' ")or die(mysql_error());          
			$res = mysql_query("update wc_district set district_status='0' where district_id ='".$this->districtid."'")or die(mysql_error()); 
			if($res){ return true; }
			else{ return false; }		
		}
		// To select particular data by using id
		public function rangeselectRecord(){
			$res = mysql_query("SELECT * FROM wc_range as r INNER JOIN wc_testbattery as tb INNER JOIN wc_categories as c INNER JOIN wc_test as t ON tb.testbattery_id = r.rangetestbattery_id and c.categories_id = r.rangecategories_id and t.test_id = r.rangetest_id WHERE r.range_id='".$this->rangeid."'")or die(mysql_error());
			return $res;	
		}
		// To select particular data by using id
		public function rangeattributeselectRecord(){
			$res = mysql_query("SELECT * FROM wc_range_attribute WHERE range_id = '".$this->rangeid."'")or die(mysql_error());
			return $res;	
		}
		public function testnameSelect(){
			$res = mysql_query("SELECT test_name FROM wc_test WHERE test_id='".$this->rangetestid."'")or die(mysql_error());
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
		$testname = mysql_fetch_array( $rangeFunction->testnameSelect());
		$rangeFunction->rangetestname = $testname['test_name'];
		$rangeinsert = $rangeFunction->rangeInsert();
		if($rangeinsert){
			for($i=1;$i<=$counter;$i++){
                $rangeFunction->rangeid = $rangeinsert;
                $rangeFunction->rangestart = $_POST["range_start".$i.""];
                $rangeFunction->rangeend = $_POST["range_end".$i.""];
                $rangeFunction->rangepoint = $_POST["range_points".$i.""];
                $rangeattrinsert = $rangeFunction->rangeattributeInsert();
            }
            echo "success#Range Inserted#".$rangeinsert,'#'.$rangeFunction->rangetestname;
		}
		else{
		 	echo "failure#Range Not Inserted";
		} 
	}	
	// For display edit data 
	if(isset($_GET['chooseedit'])){
		$range_json = array();
		$rangeattr_json = array();
		$rangeFunction = new rangeFunction();
		$rangeFunction->rangeid = $_POST['data_id'];
	    $range_edit_data = $rangeFunction->rangeselectRecord();
	    $rangeattr_edit_data = $rangeFunction->rangeattributeselectRecord();
	    while ( $result = mysql_fetch_array( $range_edit_data )){
	    	$tmp = array(
           'range_id' => $result['range_id'],
           'rangetestbattery_id' => $result['rangetestbattery_id'],
           'rangetestbattery_name' => $result['testbattery_name'],
           'rangecategory_id' => $result['rangecategories_id'],
           'rangecategory_name' => $result['categories_name'],
           'rangetest_id' => $result['rangetest_id'],
           'rangetest_name' => $result['test_name'],
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
	    echo json_encode($range_json).'#####'.json_encode($rangeattr_json);
	}	
?>