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

 	class editdeleteFunction {

	 	public $statesid;
	    public $statesname;
	    public $statesstatus;

		public function selectData(){
			$res = mysql_query("SELECT * FROM wc_states WHERE states_id = '".$this->statesid."'")or die(mysql_error());
			return $res;
		}
		public function updateData(){
            $res = mysql_query("update wc_states set states_name='".$this->statesname."' where states_id ='".$this->statesid."'")or die(mysql_error());
			if($res){ return true; }
			else{ return false; }
		}
		public function deleteData(){
			// $res_district = mysql_query("SELECT district_id FROM wc_district WHERE districtstates_id = '".$this->statesid."'")or die(mysql_error());
			// while ( $result = mysql_fetch_array( $res_district )){
		 //    	$res_update = mysql_query("update wc_athlete set athlete_status = '0' where athletedistrict_id='".$result."'")or die(mysql_error());
		 //    }
			// $res_update = mysql_query("update wc_athlete set athlete_status = '0' where athletedistrict_id='".$res_district."'")or die(mysql_error());
            $res = mysql_query("delete from wc_states where states_id ='".$this->statesid."' ")or die(mysql_error());
			if($res){ return true; }
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
		// For display edit data
		if(isset($_GET['chooseedit'])){
			$json = array();
			$editdeleteFunction = new editdeleteFunction();
			$editdeleteFunction->statesid = $_POST['data_id'];
		    $edit_data = $editdeleteFunction->selectData();
		    while ( $result = mysql_fetch_array( $edit_data )){
		    	$tmp = array(
	           'states_id' => $result['states_id'],
	           'states_name' => $result['states_name'],
	           );
	    		array_push( $json, $tmp );
		    }
		    echo json_encode($json);
		}
		// To store edited data
		if(isset($_GET['editdata'])){
			$editdeleteFunction = new editdeleteFunction();
			$editdeleteFunction->statesid = $_POST['edit_states_id'];
			$editdeleteFunction->statesname = $_POST['edit_states_name'];
			//if (in_array($_POST['edit_states_name'], $STATES)) {
				$states = $editdeleteFunction->isStatesExist();
				if(!$states){
					$statesinsert = $editdeleteFunction->updateData();
					if($statesinsert){
						echo "success#State edited successfully!#".$_POST['edit_states_id']."#".$_POST['edit_states_name'];
					}else{
						echo "failure#State not edited successfully!";
					}
				}
				else {
					echo "failure#State already Exists!";
				}
			// }
			// else{
			// 	echo "failure#No State Present in that Name";
			// }
		}
		// To delete stored data
		if(isset($_GET['deletedata'])){
			$editdeleteFunction = new editdeleteFunction();
			$editdeleteFunction->statesid = $_POST['delete_id'];
			$statesdelete = $editdeleteFunction->deleteData();
			if($statesdelete){
				echo "success#State deleted successfully!#".$_POST['delete_id'];
			}
			else{
				echo "failure#State not found";
			}
		}
	}

?>
