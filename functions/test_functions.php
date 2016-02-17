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
      $res = mysql_query("SELECT * FROM wc_test where test_status='1'")or die(mysql_error());
      return $res;
    }

    public function testattributeSelect(){
      $res = mysql_query("SELECT * FROM wc_test_attribute where test_attribute_status='1'")or die(mysql_error());
      return $res;
    }

    public function testnameinsertfunction(){
        // $check_query = "select * from wc_test where test_name = '".$this->testname."' ";
        // if(!mysql_num_rows(mysql_query($check_query))){
          $sql = "insert into wc_test (test_name,test_status) values ('".$this->testname."','1') ";
          mysql_query($sql) or die("insert:".mysql_error());
          return true;
        // }else{
        //   return false;
        // }

    }

    public function testupdatefunction(){
        $check_query = "select * from wc_sports where sports_name = '".$this->sportsname."' ";
        if(!mysql_num_rows(mysql_query($check_query))){
            $sql = "update wc_sports set sports_name='".$this->sportsname."',sports_status='1' where sports_id ='".$this->sportsid."' ";
            mysql_query($sql) or die("update:".mysql_error());
            return true;
          }else{
            return false;
          }
    }
    public function testdeletefunction(){
        $sql = "delete from wc_test_attribute where test_attribute_id ='".$this->testid."'";
        mysql_query($sql) or die("delete".mysql_error());
        return true;
    }
    public function testselectfunction(){
      $temp_arr = array();
      $res = mysql_query("SELECT * FROM wc_test_attribute INNER JOIN wc_test ON wc_test_attribute.test_id = wc_test.test_id ") or die(mysql_error());
      $count=mysql_num_rows($res);
      while($row = mysql_fetch_array($res)) {
          $temp_arr[] =$row;
      }
      return $temp_arr;
      }
    public function testbatteryselectfunction(){
      $temp_arr = array();
      $res = mysql_query("SELECT * FROM wc_test_attribute INNER JOIN wc_test ON wc_test_attribute.test_id = wc_test.test_id group by wc_test_attribute.test_id  ") or die(mysql_error());
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
            $row = mysql_fetch_array(mysql_query("select test_id from wc_test where test_name ='$testname'"));
            for($i=1;$i<=$counter;$i++){
                $test_id = $row['test_id'];
                $parameter = $_POST["parameter_name".$i.""];
                $type = $_POST["type".$i.""];
                $unit = $_POST["unit".$i.""];
                $format =  $_POST["format".$i.""];
                $sql = "insert into wc_test_attribute (test_id,test_parameter_name,test_parameter_type,test_parameter_unit,test_parameter_format,test_attribute_status)values('$test_id','$parameter','$type','$unit','$format','1')";
                mysql_query($sql) or die(mysql_error());
            }
            header('Location:../test.php?insert=true');
        }else {
          echo "error";
        }
    }
    if(isset($_POST['parameter_update'])){
        include ("../dbconnect.php");
        $parameter_id = $_POST['parameter_update'];
        $testid =$_POST['test_update_id'];
        $parameter_name = $_POST['parameter_name1'];
        $paramtype = $_POST['type1'];
        $paramunit = $_POST['unit1'];
        $paramformat = $_POST['format1'];
        mysql_query("update wc_test_attribute set test_parameter_name ='$parameter_name',test_parameter_type ='$paramtype',test_parameter_unit='$paramunit',test_parameter_format ='$paramformat' where test_attribute_id = $parameter_id ")or die(mysql_error());
        header('Location:../test.php?update=true');

    }
    if(isset($_GET['gettestdata'])){
        include ("../dbconnect.php");
        $testattrid = $_POST['id'];
        $sql = mysql_query("SELECT * FROM wc_test_attribute INNER JOIN wc_test ON wc_test_attribute.test_id = wc_test.test_id where test_attribute_id='$testattrid'")or die(mysql_error());
        $res = mysql_fetch_assoc($sql);
        print(json_encode($res));

    }

    if(isset($_GET['deletedata'])){
        include ("../dbconnect.php");
        $test = new testfunction();
        $test->testid = $_POST['delete_id'];
        if($test->testdeletefunction()){
          echo $_POST['delete_id'];
        }else{
          echo "error";
        }
    }
 ?>
