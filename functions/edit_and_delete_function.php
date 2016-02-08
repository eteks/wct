<?php 
	if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && !empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest')
	{
	  include ("../dbconnect.php");
	}
	else {
	    include ("dbconnect.php");
	}
 	class editdeleteFunction {		  
		public function selectData($data_id){
			$res = mysql_query("SELECT * FROM wc_states WHERE states_id = '".$data_id."'")or die(mysql_error());
			return $res;	
		}
		// public function editData($data_id){
		// 	$res = mysql_query("")or die(mysql_error());
		// 	return $res;	
		// }
	}
	if(isset($_POST)){
		$json = array();
		$data_id = $_POST['data_id'];
		$editdeleteFunction = new editdeleteFunction();
	    $edit_data = $editdeleteFunction->selectData($data_id);
	    while ( $result = mysql_fetch_array( $edit_data )){
	    	$tmp = array(
           'states_id' => $result['states_id'],
           'states_name' => $result['states_name'],
           );
    		array_push( $json, $tmp );
	    }
	    echo json_encode($json);
	}	
	
?>	