<?php
class testbatteryfunction{
    public $testbatteryid;
    public $testbatteryname;
    public $testbatterysportsid;
    public $testbatterycategoryid;
    public $testbatterytestide;
    public $testbatterystatus;
    public $testbatterycreateddate;

    public function testbatterySelect(){
      $res = mysql_query("SELECT * FROM wc_testbattery where testbattery_status='1'")or die(mysql_error());
      return $res;
    }

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
        $sql = "update wc_testbattery set testbattery_name='".$this->testbatteryname."',testbatterysports_id='".$this->testbatterysportsid."',testbattery_status='1' where testbattery_id ='".$this->testbatteryid."'";
        echo "update wc_testbattery set testbattery_name='".$this->testbatteryname."',testbatterysports_id='".$this->testbatterysportsid."',testbattery_status='1' where testbattery_id ='".$this->testbatteryid."'";
        if(mysql_query($sql)){
            return true;
        }else{
            return false;
        }

    }
    public function testbatterydeletefunction(){
        $sql = "delete from wc_testbattery where testbattery_id ='".$this->testbatteryid."'";
        mysql_query($sql) or die("delete".mysql_error());
        return true;
    }
    public function testbatteryselectfunction(){
      $temp_arr = array();
      $res = mysql_query("SELECT * FROM wc_testbattery
          INNER JOIN wc_sports ON wc_testbattery.testbatterysports_id = wc_sports.sports_id ORDER BY testbattery_id DESC") or die(mysql_error());
      $count=mysql_num_rows($res);
      while($row = mysql_fetch_array($res)) {
          $temp_arr[] =$row;
      }
      //echo $temp_arr;
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
            foreach($_POST['test'] as $test_id) {
                mysql_query("insert into wc_testbattery_test_attribute (testbattery_id,testbattery_test_id,testbattery_test_attribute_status)values('$test_battery','$test_id','1')");
            }
        }
        header('Location:../test_battery.php?insert_success=true');
    }else {
      echo "error";
    }
}

if(isset($_POST['testbattery_update'])){
    include ("../dbconnect.php");
    $test = new testbatteryfunction();
    $testbatteryname = $_POST['test_battery_name'];
    $test_battery = $_POST['testbattery_update'];
    $test->testbatteryid = $test_battery;
    $test->testbatteryname = $testbatteryname;
    $test->testbatterysportsid = $_POST['Sport'];
    if($test->testbatteryupdatefunction()){
        $row = mysql_fetch_array(mysql_query("select testbattery_id from wc_testbattery where testbattery_name ='$testbatteryname'"));
        mysql_query("delete from wc_testbattery_category_attribute where testbattery_id ='".$test_battery."'");
        mysql_query("delete from wc_testbattery_test_attribute where testbattery_id ='".$test_battery."'");
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
        header('Location:../test_battery.php?update_success=true');
    }else{
      echo "error";
    }
}
if(isset($_GET['gettestbatdata'])){
    include ("../dbconnect.php");
    $test_battery_id =  $_POST['id'];
    //echo $test_battery_id;
    //$sql=mysql_query("SELECT * FROM wc_testbattery
                // INNER JOIN wc_sports ON wc_testbattery.testbatterysports_id = wc_sports.sports_id
                 //INNER JOIN wc_testbattery_category_attribute ON wc_testbattery.testbattery_id = wc_testbattery_category_attribute.testbattery_id
                // INNER JOIN wc_testbattery_test_attribute ON wc_testbattery.testbattery_id = wc_testbattery_test_attribute.testbattery_id
                 //INNER JOIN wc_test ON wc_testbattery_test_attribute.testbattery_test_id = wc_test.test_id
                 //INNER JOIN wc_categories ON wc_categories.categories_id = wc_testbattery_category_attribute.testbattery_category_id where wc_testbattery.testbattery_id = '$test_battery_id'") or die(mysql_error());
    $sql=mysql_query("SELECT * FROM wc_testbattery
                             INNER JOIN wc_sports ON wc_testbattery.testbatterysports_id = wc_sports.sports_id
                             where wc_testbattery.testbattery_id = '$test_battery_id'") or die(mysql_error());

    $sql1=mysql_query("SELECT * FROM wc_testbattery_category_attribute
                 INNER JOIN wc_categories ON wc_categories.categories_id = wc_testbattery_category_attribute.testbattery_category_id where wc_testbattery_category_attribute.testbattery_id = '$test_battery_id'") or die(mysql_error());

    $row = mysql_fetch_assoc($sql);
    print(json_encode($row));
}
if(isset($_GET['getcatedata'])){
    include ("../dbconnect.php");
    $test_battery_id =  $_POST['id'];
    $sql1=mysql_query("SELECT * FROM wc_testbattery_category_attribute
                 INNER JOIN wc_categories ON wc_categories.categories_id = wc_testbattery_category_attribute.testbattery_category_id where wc_testbattery_category_attribute.testbattery_id = '$test_battery_id'") or die(mysql_error());
    $rows1 = array();
    while($r = mysql_fetch_assoc($sql1)) {
        $row1[] = $r;
    }
    print(json_encode($row1));
}
if(isset($_GET['gettestdata'])){
    include ("../dbconnect.php");
    $test_battery_id =  $_POST['id'];
    $sql2=mysql_query("SELECT * FROM wc_testbattery_test_attribute
                INNER JOIN wc_test ON wc_testbattery_test_attribute.testbattery_test_id = wc_test.test_id where wc_testbattery_test_attribute.testbattery_id = '$test_battery_id'") or die(mysql_error());
    $rows2 = array();
    while($r = mysql_fetch_assoc($sql2)) {
        $row2[] = $r;
    }
    print(json_encode($row2));
}
if(isset($_GET['deletedata'])){
    include ("../dbconnect.php");
    $test = new testbatteryfunction();
    $test->testbatteryid = $_POST['delete_id'];
    if($test->testbatterydeletefunction()){
      echo $_POST['delete_id'];
    }else{
      echo "error";
    }
}
 ?>
