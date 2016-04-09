 <?php
class testfunction{
    public $testid;
    public $testname;
    public $teststatus;
    public $testattrid;
    public $testparameter;
    public $testtype;
    public $testunit;
    public $testformat;

    public function testSelect(){
      $res = mysql_query("SELECT * FROM wc_test where test_status='1' ORDER BY test_name ASC")or die(mysql_error());
      return $res;
    }

    public function testattributeSelect(){
      $res = mysql_query("SELECT * FROM wc_test_attribute where test_attribute_status='1' ORDER BY test_parameter_name ASC")or die(mysql_error());
      return $res;
    }

    public function testnameinsertfunction(){
        $check_query = "select * from wc_test where test_name = '".$this->testname."' ";
        if(!mysql_num_rows(mysql_query($check_query))){
          $sql = "insert into wc_test (test_name,test_status) values ('".$this->testname."','1') ";
          mysql_query($sql) or die("insert:".mysql_error());
          return true;
        }else{
          return false;
        }

    }

    public function testupdatefunction(){
        $check_query = "select * from wc_sports where sports_id = '".$this->sportsid."' ";
        if(!mysql_num_rows(mysql_query($check_query))){
            $sql = "update wc_sports set sports_name='".$this->sportsname."',sports_status='1' where sports_id ='".$this->sportsid."' ";
            mysql_query($sql) or die("update:".mysql_error());
            return true;
          }else{
            return false;
          }
    }
    public function testattributedeletefunction(){
        $sql = "delete from wc_test_attribute where test_attribute_id ='".$this->testid."'";
        mysql_query($sql) or die("delete".mysql_error());
        return true;
    }
    public function testnamedeletefunction(){
        $sql = "delete from wc_test where test_id ='".$this->testid."'";
        mysql_query($sql) or die("delete".mysql_error());
        return true;
    }
    public function testselectfunction(){
      $temp_arr = array();
      //$res = mysql_query("SELECT * FROM wc_test_attribute INNER JOIN wc_test ON wc_test_attribute.test_id = wc_test.test_id where wc_test.test_id = (SELECT MAX(test_id) FROM wc_test ) ORDER BY test_parameter_name ASC") or die(mysql_error());
      $res = mysql_query("SELECT * FROM wc_test_attribute INNER JOIN wc_test ON wc_test_attribute.test_id = wc_test.test_id ORDER BY test_parameter_name ASC") or die(mysql_error());
      $count=mysql_num_rows($res);
      while($row = mysql_fetch_array($res)) {
          $temp_arr[] =$row;
      }
      return $temp_arr;
      }
      public function testnamefunction(){
        $temp_arr = array();
        $res = mysql_query("SELECT * FROM wc_test ORDER BY test_name ASC") or die(mysql_error());
        $count=mysql_num_rows($res);
        while($row = mysql_fetch_array($res)) {
            $temp_arr[] =$row;
        }
        return $temp_arr;
        }
    public function testbatteryselectfunction(){
      $temp_arr = array();
      $res = mysql_query("SELECT * FROM wc_test_attribute INNER JOIN wc_test ON wc_test_attribute.test_id = wc_test.test_id group by wc_test_attribute.test_id ORDER BY wc_test.test_name ASC  ") or die(mysql_error());
      $count=mysql_num_rows($res);
      while($row = mysql_fetch_array($res)) {
          $temp_arr[] =$row;
      }
      return $temp_arr;
      }
}
    if(isset($_POST['test_add'])){
        include ("../dbconnect.php");
        $counter = (count($_POST)-2)/4;
        $test = new testfunction();
        $testname = $_POST['test_name'];
        $test->testname = $testname ;
        if($test->testnameinsertfunction()){
        	$exist = '';
            $row = mysql_fetch_array(mysql_query("select test_id from wc_test where test_name ='$testname'"));
            for($i=1;$i<=$counter;$i++){
                $test_id = $row['test_id'];
				
                $parameter = $_POST["parameter_name".$i.""];
                $type = $_POST["type".$i.""];
                $unit = $_POST["unit".$i.""];
                $format =  $_POST["format".$i.""];
                // $sql = "insert into wc_test_attribute (test_id,test_parameter_name,test_parameter_type,test_parameter_unit,test_parameter_format,test_attribute_status)values('$test_id','$parameter','$type','$unit','$format','1')";
                // mysql_query($sql) or die(mysql_error());
                //$check_query_param = "select * from wc_test_attribute where test_id = '$test_id' and test_parameter_type ='$type'";
				$check_query_param_name = "select * from wc_test_attribute where test_id = '$test_id' and test_parameter_name ='$parameter'";
				if(!mysql_num_rows(mysql_query($check_query_param_name))){
                	$sql = "insert into wc_test_attribute (test_id,test_parameter_name,test_parameter_type,test_parameter_unit,test_parameter_format,test_attribute_status)values('$test_id','$parameter','$type','$unit','$format','1')";
                	mysql_query($sql) or die(mysql_error());	
				}else{
					$exist .= $parameter.',';
				}
				
            }
            //header('Location:../test.php?insert=true');
           header('Location:../test.php?insert_new=true&params='.$exist); 
        }else {
            $row = mysql_fetch_array(mysql_query("select test_id from wc_test where test_name ='$testname'"));
			$exist = '';
            for($i=1;$i<=$counter;$i++){
                $test_id = $row['test_id'];
                $parameter = $_POST["parameter_name".$i.""];
                $type = $_POST["type".$i.""];
                $unit = $_POST["unit".$i.""];
                $format =  $_POST["format".$i.""];
				//$check_query_param = "select * from wc_test_attribute where test_id = '$test_id' and test_parameter_type ='$type'";
				$check_query_param_name = "select * from wc_test_attribute where test_id = '$test_id' and test_parameter_name ='$parameter'";
				if(!mysql_num_rows(mysql_query($check_query_param_name))){
                	$sql = "insert into wc_test_attribute (test_id,test_parameter_name,test_parameter_type,test_parameter_unit,test_parameter_format,test_attribute_status)values('$test_id','$parameter','$type','$unit','$format','1')";
                	mysql_query($sql) or die(mysql_error());	
				}else{
					$exist .= $parameter.',';
				}
            }
			header('Location:../test.php?insert_new=true&params='.$exist);  
        }
    }
    if(isset($_POST['parameter_update'])){
        include ("../dbconnect.php");
		$check_query1 = "select * from wc_test_attribute  where test_parameter_name = '".$_POST['parameter_name1']."' and test_id = '".$_POST['test_update_id']."'";
		if(!mysql_num_rows(mysql_query($check_query))){
		$check_query = "select * from wc_test_attribute  where test_parameter_name = '".$_POST['parameter_name1']."' and test_id = '".$_POST['test_update_id']."' and test_parameter_type = '". $_POST['type1']."' and test_parameter_unit = '".$_POST['unit1']."' and test_parameter_format = '".$_POST['format1']."' ";
		if(!mysql_num_rows(mysql_query($check_query))){
	        $parameter_id = $_POST['parameter_update'];
	        $testid =$_POST['test_update_id'];
	        $parameter_name = $_POST['parameter_name1'];
	        $paramtype = $_POST['type1'];
	        $paramunit = $_POST['unit1'];
	        $paramformat = $_POST['format1'];
	        //$test_name = $_POST['test_name'];
	        //mysql_query("update wc_test set test_name ='$test_name' where test_id = $testid ")or die(mysql_error());
	        mysql_query("update wc_test_attribute set test_parameter_name ='$parameter_name',test_parameter_type ='$paramtype',test_parameter_unit='$paramunit',test_parameter_format ='$paramformat' where test_attribute_id = $parameter_id ")or die(mysql_error());
	        header('Location:../test.php?update=true');
		}else{
			header('Location:../test.php?param_name_exists=true');
		}
		}else{
			header('Location:../test.php?param_name_exists=true');
		}

    }
    if(isset($_GET['gettestdata'])){
        include ("../dbconnect.php");
        $testattrid = $_POST['id'];
        $sql = mysql_query("SELECT * FROM wc_test_attribute INNER JOIN wc_test ON wc_test_attribute.test_id = wc_test.test_id where test_attribute_id='$testattrid' ORDER BY test_parameter_name ASC")or die(mysql_error());
        $res = mysql_fetch_assoc($sql);
        print(json_encode($res));

    }
    if(isset($_GET['find_test'])){
        include ("../dbconnect.php");
        $temp_arr = array();
        $testname = $_POST['id'];
        if($testname!=''){
            $sql = mysql_query("SELECT * FROM wc_test where  test_name like '".$testname."%' ORDER BY test_name ASC")or die(mysql_error());
            while($row = mysql_fetch_assoc($sql)) {
                $temp_arr[] =$row;
            }
        }
        print(json_encode($temp_arr));
    }
    if(isset($_GET['find_all_test'])){
        include ("../dbconnect.php");
        $temp_arr = array();
        $testname = $_POST['id'];
        if($testname!=''){
            $sql = mysql_query("SELECT * FROM wc_test ORDER BY test_name ASC")or die(mysql_error());
            while($row = mysql_fetch_assoc($sql)) {
                $temp_arr[] =$row;
            }
        }
        print(json_encode($temp_arr));
    }
    if(isset($_GET['find_test_attribute'])){
        include ("../dbconnect.php");
        $temp_arr = array();
        $test_arr = array();
        $parameter_arr = array();
        $testid = $_POST['id'];
        if($testid!=''){
            $sql = mysql_query("SELECT * FROM  wc_test_attribute where  test_id = '$testid' ORDER BY test_parameter_name ASC ")or die(mysql_error());
            while($row = mysql_fetch_assoc($sql)) {
                $test_arr[] =$row;
            }
        }
        $sql1 = mysql_query("SELECT * FROM  wc_parametertype ORDER BY parametertype_name ASC")or die(mysql_error());
        while($row1 = mysql_fetch_assoc($sql1)) {
            $parameter_arr[] =$row1;
        }
        $temp_arr['param'] = $parameter_arr;
        $temp_arr['test'] = $test_arr;
        print(json_encode($temp_arr));
    }
    if(isset($_GET['delete_test_name'])){
        include ("../dbconnect.php");
        $test = new testfunction();
        $test->testid = $_POST['delete_id'];
        if($test->testnamedeletefunction()){
          echo $_POST['delete_id'];
        }else{
          echo "error";
        }
    }
    if(isset($_GET['delete_test_attribute'])){
        include ("../dbconnect.php");
        $test = new testfunction();
        $sql = mysql_query("select * from wc_test_attribute where test_id ='".$_POST['delete_test_id']."'");
        $count = mysql_num_rows($sql);
        //echo $count;
        if($count >1){
            $test->testid = $_POST['delete_id'];
            if($test->testattributedeletefunction()){
              echo 'test_attribute';
            }else{
              echo "error";
            }
        }else if($count = 1){
            // $res = mysql_fetch_array($sql);
            // $testid = $res['test_id'];
            $exec=mysql_query("delete from wc_test where test_id ='".$_POST['delete_test_id']."'");
            if($exec){
                echo 'test_attribute_with_name';
            }else{
              echo "error";
            }

        }
    }
    if(isset($_GET['test_name_update'])){
        include ("../dbconnect.php");
        $test_id = $_POST['test_id'];
        $test_name = $_POST['test_name'];
        if(isset($test_id)&&isset($test_name)){
        	$check_query = "select * from wc_test  where test_name = '".$_POST['test_name']."'";
        	if(!mysql_num_rows(mysql_query($check_query))){
	            $sql = mysql_query("update wc_test set test_name = '".$test_name."' where test_id = '".$test_id."'");
	            echo "succeed";
			}else{
				echo "exists";
			}
        }
    }
    if(isset($_GET['check_parameter'])){
        include ("../dbconnect.php");
        $test_id = $_POST['testid'];
        $paramname = $_POST['param_name'];
        $sql = mysql_query("select * from wc_test_attribute where test_parameter_type ='".$paramname."'and test_id='".$test_id."' ORDER BY test_parameter_name ASC ");
        $count = mysql_num_rows($sql);
        if($count>0){
            echo 'error';
        }else{
            echo "succeed";
        }
    }
 ?>
