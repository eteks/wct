<?php
	include('configu.php');
 	class parametertypeFunction {
 		public $parametertypeid;
	    public $parametertypename;
	    public $parametertypestatus;

		function __construct() {
		}
		// destructor
		function __destruct() {

		}
		public function parametertypeSelect(){
			$res = mysql_query("select * from wc_parametertype where parametertype_status ='1' ORDER BY parametertype_id DESC")or die(mysql_error());
			return $res;
		}
		public function selectData(){
			$res = mysql_query("select * from wc_parametertype where parametertype_status ='1' and parametertype_id = '".$this->parametertypeid."'")or die(mysql_error());
			return $res;
		}
		public function parametertypeInsert(){
			$check_query = "select * from wc_parametertype where parametertype_name = '".$this->parametertypename."' ";
			if(!mysql_num_rows(mysql_query($check_query))){
				$res = mysql_query("insert into wc_parametertype (parametertype_name,parametertype_status) values('".$this->parametertypename."','1')")or die(mysql_error());
				$lastinsertid = mysql_insert_id();
				if($res){ return $lastinsertid; }
				else{ return false; }
			}else{
	          return false;
	        }
		}
		public function isparametertypeExist(){
			$qr = mysql_query("SELECT * FROM wc_parametertype WHERE parametertype_name = '".$this->parametertypename."'");
			$row = mysql_num_rows($qr);
			if($row > 0){
				return true;
			} else {
				return false;
			}
		}
		public function parameterdeletefunction(){
	        $sql = "delete from wc_parametertype where parametertype_id ='".$this->parametertypeid."'";
	        mysql_query($sql) or die("delete".mysql_error());
	        return true;
	    }
		public function parameterupdatefunction(){
	        $sql = "update wc_parametertype set parametertype_name = '".$this->parametertypename."' where parametertype_id ='".$this->parametertypeid."'";
	        mysql_query($sql) or die("delete".mysql_error());
	        return true;
	    }
	}
	if(isset($_POST)){
		if(isset($_GET['adddata'])){
			$parametertypeFunction = new parametertypeFunction();
			$parametertypeFunction->parametertypename = $_POST['parameter_type'];
			// if ($_POST['states_name']){
			$parametertypeinsert = $parametertypeFunction->parametertypeInsert();
			if($parametertypeinsert){
				echo "success#ParameterType Inserted#".$parametertypeinsert.'#'.$_POST['parameter_type'];
			}else{
				echo "failure#ParameterType Not Inserted";
			}
		}
	}
	if(isset($_GET['deletedata'])){
        $parametertypeFunction = new parametertypeFunction();
        $parametertypeFunction->parametertypeid = $_POST['delete_id'];
        if($parametertypeFunction->parameterdeletefunction()){
          echo $_POST['delete_id'];
        }else{
          echo "error";
        }
    }
	if(isset($_GET['chooseedit'])){
		$json = array();
		$parametertypeFunction = new parametertypeFunction();
		$parametertypeFunction->parametertypeid = $_POST['data_id'];
		$edit_data = $parametertypeFunction->selectData();
		while ( $result = mysql_fetch_array( $edit_data )){
			$tmp = array(
		   'parametertype_id' => $result['parametertype_id'],
		   'parametertype_name' => $result['parametertype_name'],
		   );
			array_push( $json, $tmp );
		}
		echo json_encode($json);
	}
	if(isset($_GET['editdata'])){
        $parametertypeFunction = new parametertypeFunction();
        $parametertypeFunction->parametertypeid = $_POST['edit_parameter_id'];
		$parametertypeFunction->parametertypename = $_POST['edit_parameter_type'];
		$check_query = "select * from wc_parametertype where parametertype_name = '".$_POST['edit_parameter_type']."' ";
		if(!mysql_num_rows(mysql_query($check_query))){
	        if($parametertypeFunction->parameterupdatefunction()){
	          echo 'success';
	        }else{
	          echo "error";
	        }
		}
		else{
			echo 'exist';
		}
    }
?>
