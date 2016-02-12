<?php
class testbatteryfunction{
    public $testbatteryid;
    public $testbatteryname;
    public $testbatterysportsid;
    public $testbatterycategoryid;
    public $testbatterytestide;
    public $testbatterystatus;
    public $testbatterycreateddate;

    public function testbatteryinsertfunction(){
        $check_query = "select * from wc_testbattery where testbattery_name = '".$this->testbatteryname."' ";
        if(!mysql_num_rows(mysql_query($check_query))){
          $sql = "insert into wc_testbattery (testbattery_name,	testbatterysports_id,testbattery_status) values ('".$this->testbatteryname."','".$this->testbatterysportsid."','1') ";
          mysql_query($sql) or die("insert:".mysql_error());
          return true;
        }else{
          return false;
        }

    }

    public function testbatteryupdatefunction(){
        $check_query = "select * from wc_sports where sports_name = '".$this->sportsname."' ";
        if(!mysql_num_rows(mysql_query($check_query))){
            $sql = "update wc_sports set sports_name='".$this->sportsname."',sports_status='1' where sports_id ='".$this->sportsid."' ";
            mysql_query($sql) or die("update:".mysql_error());
            return true;
          }else{
            return false;
          }
    }
    public function testbatterydeletefunction(){
        $sql = "delete from wc_test_attribute where test_attribute_id ='".$this->testid."'";
        mysql_query($sql) or die("delete".mysql_error());
        return true;
    }
    public function testbatteryselectfunction(){
      $temp_arr = array();
      $res = mysql_query("SELECT * FROM wc_test_attribute INNER JOIN wc_test ON wc_test_attribute.test_id = wc_test.test_id") or die(mysql_error());
      $count=mysql_num_rows($res);
      while($row = mysql_fetch_array($res)) {
          $temp_arr[] =$row;
      }
      return $temp_arr;
      }
}
if(isset($_POST['testbattery_add'])){

    include ("../dbconnect.php");
    $test = new testbatteryfunction();
    $testbatteryname = $_POST['test_battery_name'];
    $test->testbatteryname = $testbatteryname;
    $test->testbatterysportsid = $_POST['Sport'];
    if($test->testbatteryinsertfunction()){
        $row = mysql_fetch_array(mysql_query("select testbattery_id from wc_testbattery where testbattery_name ='$testbatteryname'"));
        $test_battery = $row['testbattery_id'];
        if(!empty($_POST['categories'])) {
            foreach($_POST['categories'] as $cat_id) {
                mysql_query("insert into wc_testbattery_category_attribute (testbattery_id,testbattery_category_id,testbattery_category_status)values('$test_battery','$cat_id','1')");
            }
        }

        if(!empty($_POST['test'])) {
            //print_r($_POST['test']);
            foreach($_POST['test'] as $test_id) {
                mysql_query("insert into wc_testbattery_test_attribute (testbattery_id,testbattery_test_id,testbattery_test_attribute_status)values('$test_battery','$test_id','1')");
            }
        }
        header('Location:../test_battery.php');
    }else {
      echo "error";
    }
}

if(isset($_POST['test_update'])){
    include ("../dbconnect.php");
    $sport = new testfunction();
    $sport->sportsname = $_POST['sports_name'];
    $sport->sportsid = $_POST['sports_id'];
    if($sport->sportsupdatefunction()){
      echo $_POST['sports_name'].'-'.$_POST['sports_id'];
    }else{
      echo "error";
    }
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
