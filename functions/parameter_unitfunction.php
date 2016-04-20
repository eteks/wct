<?php
include('configu.php');
class parameterunitFunction {
    public $parametertypeid;
    public $parameterunitname;
    public $parameterunitid;
    public function parametertypeSelect(){
        $temp_arr = array();
        $res = mysql_query("select * from wc_parametertype where parametertype_status ='1' ORDER BY parametertype_name ASC")or die(mysql_error());
        while($row = mysql_fetch_array($res)) {
            $temp_arr[] =$row;
        }
        return $temp_arr;
    }
    public function parameterunitSelect(){
        $temp_arr1 = array();
		$res1 = mysql_query("select * from wc_parameterunit inner join wc_parametertype on wc_parameterunit.parametertype_id=wc_parametertype.parametertype_id ORDER BY wc_parametertype.parametertype_name ASC	")or die(mysql_error());
        while($row = mysql_fetch_array($res1)) {
            $temp_arr1[] =$row;
        }
        return $temp_arr1;
    }
    public function parameterunitSelectsingle(){
        $res = mysql_query("select * from wc_parameterunit inner join wc_parametertype on wc_parameterunit.parametertype_id=wc_parametertype.parametertype_id  where parametertype_status ='1' and wc_parameterunit.parameterunit_id = '".$this->parameterunitid."' ")or die(mysql_error());
        $row = mysql_fetch_assoc($res);
        return $row;
    }
    public function parameterunitinsertfunction(){
        $check_query = "select * from wc_parameterunit where parametertype_id = '".$this->parametertypeid."' and parameterunit = '".$this->parameterunitname."' ";
        if(!mysql_num_rows(mysql_query($check_query))){
            $sql = "insert into wc_parameterunit (parametertype_id,parameterunit,parameterunit_status) values ('".$this->parametertypeid."','".$this->parameterunitname."','1')";
            mysql_query($sql) or die("delete".mysql_error());
            return true;
        }else{
            return false;
        }
    }
    public function parameterdeletefunction(){
        $sql = "delete from wc_parameterunit where parameterunit_id ='".$this->parameterunitid."'";
        mysql_query($sql) or die("delete".mysql_error());
        return true;
    }
    public function parameterupdatefunction(){
        $res = mysql_query("update wc_parameterunit set parametertype_id = '".$this->parametertypeid."',parameterunit='".$this->parameterunitname."' where parameterunit_id ='".$this->parameterunitid."'")or die(mysql_error());
		if($res){ return true; }
		else{ return false; }
    }
    public function parametertypefunction(){
        $temp_arr = array();
        $res = mysql_query("SELECT * FROM wc_parametertype ORDER BY parametertype_id DESC") or die(mysql_error());
        $count=mysql_num_rows($res);
        while($row = mysql_fetch_array($res)) {
            $temp_arr[] =$row;
        }
        return $temp_arr;
    }
    public function parameterunitsearchSelect(){
        $temp_arr = array();
        $res = mysql_query("select * from wc_parametertype inner join wc_parameterunit on wc_parameterunit.parametertype_id = wc_parametertype.parametertype_id GROUP BY wc_parametertype.parametertype_name ORDER BY wc_parametertype.parametertype_name ASC")or die(mysql_error());
        $count=mysql_num_rows($res);
        while($row = mysql_fetch_array($res)) {
            $temp_arr[] =$row;
        }
        return $temp_arr;
    }
    public function isparameterunitExist(){
		$qr = mysql_query("SELECT * FROM wc_parameterunit WHERE parametertype_id = '".$this->parametertypeid."' AND parameterunit = '".$this->parameterunitname."' AND parameterunit_id NOT IN ('".$this->parameterunitid."')");
		$row = mysql_num_rows($qr);
		if($row > 0){
			return true;
		} else {
			return false;
		}
	}
}
if(isset($_GET['adddata'])){
    $parametertype_id= $_POST['parametertype'];
    $parameterunit = $_POST['parameterunit'];
    $parameterunitadd = new parameterunitFunction();
    $parameterunitadd->parametertypeid = $parametertype_id;
    $parameterunitadd->parameterunitname = $parameterunit;
    if($parameterunitadd->parameterunitinsertfunction()){
        echo 'success';
    }else{
        echo "error";
    }
}
if(isset($_GET['deletedata'])){
    $parameterunitdel = new parameterunitFunction();
    $parameterunitdel->parameterunitid = $_POST['delete_id'];
    if($parameterunitdel->parameterdeletefunction()){
      echo $_POST['delete_id'];
    }else{
      echo "error";
    }
}
if(isset($_GET['getunitdata'])){
    $parameteruniteditget = new parameterunitFunction();
    $parameteruniteditget->parameterunitid = $_POST['id'];
    $output = $parameteruniteditget->parameterunitSelectsingle();
    print(json_encode($output));
}
if(isset($_GET['updateunitdata'])){
	$valid = false;
    $parameterunitupdate = new parameterunitFunction();
    $parameterunitupdate->parameterunitid = $_POST['edit_param_unit_id'];
    $parameterunitupdate->parametertypeid = $_POST['parameter_type'];
    $parameterunitupdate->parameterunitname = $_POST['parameter_unit'];
	foreach ($DISTRICT as $element) {
        if (in_array($_POST['parameter_unit'], $element)){$valid = true;}
    }
	$parameter_unit = $parameterunitupdate->isparameterunitExist();
	if(!$parameter_unit){
		$parameter_unit_func = $parameterunitupdate->parameterupdatefunction();
		if($districtupdate){
			echo "success#Parameter Unit edited successfully!#".$_POST['edit_param_unit_id']."#".$_POST['parameter_unit'];
		}else{
			echo "failure#Parameter Unit edited successfully!";
		}
	}
	else {
		echo "failure#Parameter Unit already exists!";
	}
}

if(isset($_GET['param_unit_for_test_edit'])){
    $param_type = $_POST['type'];
    $temp = array();
    if($param_type == 'time'){

        $sql = mysql_query("select * from wc_parameterunit inner join wc_parametertype on wc_parameterunit.parametertype_id =wc_parametertype.parametertype_id where wc_parametertype.parametertype_name = 'time' ORDER BY wc_parametertype.parametertype_name DESC");
        while($output = mysql_fetch_assoc($sql)){
            $temp[] = $output;
        }
    }else{
        $sql = mysql_query("select * from wc_parameterunit inner join wc_parametertype on wc_parameterunit.parametertype_id =wc_parametertype.parametertype_id where wc_parametertype.parametertype_name = '$param_type' ORDER BY wc_parametertype.parametertype_name DESC");
        while($output = mysql_fetch_assoc($sql)){
            $temp[] = $output;
        }
    }
    print(json_encode($temp));
}
/** Parameter type in auto search for Parameter Unit model **/
if(isset($_GET['find_type'])){
    //include ("../dbconnect.php");
    $temp_arr = array();
    $typename = $_POST['id'];
    if($typename!=''){
        $sql = mysql_query("select * from wc_parametertype inner join wc_parameterunit on wc_parameterunit.parametertype_id = wc_parametertype.parametertype_id where wc_parametertype.parametertype_name like '".$typename."%' GROUP BY wc_parametertype.parametertype_name ORDER BY wc_parametertype.parametertype_name ASC")or die(mysql_error());
        while($row = mysql_fetch_assoc($sql)) {
            $temp_arr[] =$row;
        }
    }
    print(json_encode($temp_arr));
}

/** Parameter type in auto search for Parameter Unit model **/
if(isset($_GET['find_all_type'])){
    //include ("../dbconnect.php");
    $temp_arr = array();
    $typename = $_POST['id'];
    if($typename!=''){
        $sql = mysql_query("select * from wc_parametertype inner join wc_parameterunit on wc_parameterunit.parametertype_id = wc_parametertype.parametertype_id GROUP BY wc_parametertype.parametertype_name ORDER BY wc_parametertype.parametertype_name ASC")or die(mysql_error());
        while($row = mysql_fetch_assoc($sql)) {
            $temp_arr[] =$row;
        }
    }
    print(json_encode($temp_arr));
}

// Parameter type Edit Option in Parameter unit Module //

if(isset($_GET['paramstype_name_update'])){
        //include ("../dbconnect.php");
        $params_id = $_POST['params_id'];
        $params_name = $_POST['params_name'];
		$check_query = "select * from wc_parametertype where parametertype_id = '".$_POST['params_id']."' ";
		$row = mysql_query($check_query) or die(mysql_error());
        $data = mysql_fetch_array($row);
		if($data['parametertype_name'] == $_POST['params_name']){
			echo 'succeed';
		}
		else {
			$check_query1 = "select * from wc_parametertype where parametertype_name = '".$_POST['params_name']."' ";
			if(!mysql_num_rows(mysql_query($check_query1))){
				 $sql = "update wc_parametertype set parametertype_name = '".$_POST['params_name']."' where parametertype_id ='".$_POST['params_id']."'";
	        	mysql_query($sql) or die("delete".mysql_error());
				echo "succeed";
			}else{
				echo "exist";
			}
		}
        // if(isset($params_id)&&isset($params_name)){
            // $sql = mysql_query("update wc_parametertype set parametertype_name = '".$params_name."' where parametertype_id = '".$params_id."'");
            // echo "succeed";
        // }
}
if(isset($_GET['find_params_units'])){
        //include ("../dbconnect.php");
        $temp_arr = array();
        $test_arr = array();
        $param_arr = array();
        $paramstypeid = $_POST['id'];
        if($paramstypeid!=''){
            $sql = mysql_query("select * from wc_parameterunit inner join wc_parametertype on wc_parameterunit.parametertype_id =wc_parametertype.parametertype_id where wc_parametertype.parametertype_id = '".$paramstypeid."' ORDER BY wc_parameterunit.parameterunit ASC ")or die(mysql_error());
            while($row = mysql_fetch_assoc($sql)) {
                $test_arr[] =$row;
            }
            $sql1 = mysql_query("select * from wc_parametertype ORDER BY wc_parametertype.parametertype_name")or die(mysql_error());
            while($row1 = mysql_fetch_assoc($sql1)) {
                $param_arr[] =$row1;
            }
        }
        $temp_arr['test'] = $test_arr;
        $temp_arr['param'] = $param_arr;
        print(json_encode($temp_arr));
    }
   
?>
