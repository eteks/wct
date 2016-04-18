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
      $res = mysql_query("SELECT * FROM wc_testbattery where testbattery_status='1' ORDER BY testbattery_name ASC")or die(mysql_error());
      return $res;
    }
    public function testbatterynamefunction(){
      $temp_arr = array();
      $res = mysql_query("SELECT * FROM wc_testbattery ORDER BY testbattery_name ASC") or die(mysql_error());
      $count=mysql_num_rows($res);
      while($row = mysql_fetch_array($res)) {
          $temp_arr[] =$row;
      }
      return $temp_arr;
      }
    public function testbatteryinsertfunction(){
        $check_query = "select * from wc_testbattery where testbattery_name = '".$this->testbatteryname."' ";
        if(!mysql_num_rows(mysql_query($check_query))){
          $sql = "insert into wc_testbattery (testbattery_name,testbattery_status) values ('".$this->testbatteryname."','1') ";
          mysql_query($sql) or die("insert:".mysql_error());
          return true;
        }else{
          return false;
        }
    }
    public function testbatteryupdatefunction(){
        $sql = "update wc_testbattery set testbattery_name='".$this->testbatteryname."',testbattery_status='1' where testbattery_id ='".$this->testbatteryid."'";
        //echo "update wc_testbattery set testbattery_name='".$this->testbatteryname."',testbatterysports_id='".$this->testbatterysportsid."',testbattery_status='1' where testbattery_id ='".$this->testbatteryid."'";
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

    public function testbatterysportslastselectfunction(){
        $sql = "SELECT * FROM wc_testbattery
                 INNER JOIN wc_sports ON wc_testbattery.testbatterysports_id = wc_sports.sports_id
                 where wc_testbattery.testbattery_id = (SELECT MAX(testbattery_id) FROM wc_testbattery) order by wc_sports.sports_name asc";
        $res = mysql_query($sql) or die("delete".mysql_error());
        return $res;

    }
    public function testbatteryselectfunction(){
      $temp_arr = array();
      $res = mysql_query("SELECT * FROM wc_testbattery
          INNER JOIN wc_sports ON wc_testbattery.testbatterysports_id = wc_sports.sports_id ORDER BY wc_testbattery.testbattery_name ASC") or die(mysql_error());
      $count=mysql_num_rows($res);
      while($row = mysql_fetch_array($res)) {
          $temp_arr[] =$row;
      }
      //echo $temp_arr;
      return $temp_arr;
      }
      public function categorylastselectfunction(){
          //$sql = "select * from wc_testbattery_category_attribute inner join wc_categories on wc_testbattery_category_attribute.testbattery_category_id =wc_categories.categories_id where wc_testbattery_category_attribute.testbattery_id = (SELECT MAX(testbattery_id) FROM wc_testbattery) order by wc_categories.categories_name asc";
          $sql = "select * from wc_testbattery_category_attribute inner join wc_categories on wc_testbattery_category_attribute.testbattery_category_id =wc_categories.categories_id group by wc_categories.categories_name order by wc_categories.categories_name asc";
          $row = mysql_query($sql) or die(mysql_error());
          return $row;
      }
  	  public function sportslastselectfunction(){
          //$sql = "select * from wc_testbattery_sports_attribute inner join wc_sports on wc_testbattery_sports_attribute.wc_testbattery_sports_id =wc_sports.sports_id where wc_testbattery_sports_attribute.wc_testbattery_id = (SELECT MAX(testbattery_id) FROM wc_testbattery)";
		  $sql = "select * from wc_testbattery_sports_attribute inner join wc_sports on wc_testbattery_sports_attribute.wc_testbattery_sports_id =wc_sports.sports_id group by wc_sports.sports_name order by wc_sports.sports_name";
          $row = mysql_query($sql) or die(mysql_error());
          return $row;
      }
      public function testbatterytestlastselectfunction(){
          //$sql = "select * from wc_testbattery_test_attribute inner join wc_test on wc_testbattery_test_attribute.testbattery_test_id =wc_test.test_id where wc_testbattery_test_attribute.testbattery_id = (SELECT MAX(testbattery_id) FROM wc_testbattery) order by wc_test.test_name asc";
          $sql = "select * from wc_testbattery_test_attribute inner join wc_test on wc_testbattery_test_attribute.testbattery_test_id =wc_test.test_id group by wc_test.test_name order by wc_test.test_name asc";
          $row = mysql_query($sql) or die(mysql_error());
          return $row;
      }
      public function testbatterylastidfunction(){
          $sql = "SELECT MAX(testbattery_id) FROM wc_testbattery";
          $row = mysql_query($sql) or die(mysql_error());
          $res = mysql_fetch_array($row);
          return $res;
      }
      //Function called when update testbattery name from range
      public function testbatterynameUpdate(){
        $res = mysql_query("update wc_testbattery set testbattery_name='".$this->testbatteryname."' where testbattery_id ='".$this->testbatteryid."'")or die(mysql_error());
        if($res){ return true; }
        else{ return false; }
      }
      public function istestbatteryExist(){
        $qr = mysql_query("SELECT * FROM wc_testbattery WHERE testbattery_name = '".$this->testbatteryname."' AND testbattery_id NOT IN ('".$this->testbatteryid."')");
        $row = mysql_num_rows($qr);
        if($row > 0){
          return true;
        } else {
          return false;
        }
      }
}
if(isset($_POST['testbattery_add'])){
    include ("../dbconnect.php");
    $test = new testbatteryfunction();
    $testbatteryname = $_POST['test_battery_name'];
    $test->testbatteryname = $testbatteryname;
    if($test->testbatteryinsertfunction()){
        $row = mysql_fetch_array(mysql_query("select testbattery_id from wc_testbattery where testbattery_name ='$testbatteryname'"));
        $test_battery = $row['testbattery_id'];
		if(!empty($_POST['sports'])) {
            foreach($_POST['sports'] as $sprts_id) {
                mysql_query("insert into wc_testbattery_sports_attribute (wc_testbattery_id,wc_testbattery_sports_id,wc_testbattery_sports_status)values('$test_battery','$sprts_id','1')");
				
            }
        }
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
      header('Location:../test_battery.php?duplicate=true');
    }
}

if(isset($_POST['testbattery_update'])){
    include ("../dbconnect.php");
    $test = new testbatteryfunction();
    $testbatteryname = $_POST['test_battery_name'];
    $test_battery = $_POST['testbattery_update'];
    $test->testbatteryid = $test_battery;
    $test->testbatteryname = $testbatteryname;
    //$test->testbatterysportsid = $_POST['Sport'];
    if($test->testbatteryupdatefunction()){
        $row = mysql_fetch_array(mysql_query("select testbattery_id from wc_testbattery where testbattery_name ='$testbatteryname'"));
        mysql_query("delete from wc_testbattery_category_attribute where testbattery_id ='".$test_battery."'");
        mysql_query("delete from wc_testbattery_test_attribute where testbattery_id ='".$test_battery."'");
        mysql_query("delete from wc_testbattery_sports_attribute where wc_testbattery_id ='".$test_battery."'");
        $test_battery = $row['testbattery_id'];
		if(!empty($_POST['sports'])) {
            foreach($_POST['sports'] as $spts_id) {
                mysql_query("insert into wc_testbattery_sports_attribute (wc_testbattery_id,wc_testbattery_sports_id,wc_testbattery_sports_status)values('$test_battery','$spts_id','1')");
            }
        }
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
    $sql=mysql_query("SELECT * FROM wc_testbattery where testbattery_id = '$test_battery_id'") or die(mysql_error());
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
if(isset($_GET['getsportsdata'])){
    include ("../dbconnect.php");
    $test_battery_id =  $_POST['id'];
    $sql3=mysql_query("SELECT * FROM wc_testbattery_sports_attribute
                 INNER JOIN wc_sports ON wc_sports.sports_id = wc_testbattery_sports_attribute.wc_testbattery_sports_id where wc_testbattery_sports_attribute.wc_testbattery_id = '$test_battery_id'") or die(mysql_error());
    $rows3 = array();
    while($r = mysql_fetch_assoc($sql3)) {
        $row3[] = $r;
    }
    print(json_encode($row3));
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
if(isset($_GET['find_test_battery'])){
    include ("../dbconnect.php");
    $temp_arr = array();
    $testbatteryname = $_POST['id'];
    if($testbatteryname!=''){
        $sql = mysql_query("SELECT * FROM wc_testbattery where  testbattery_name like '".$testbatteryname."%' ORDER BY testbattery_id DESC")or die(mysql_error());
        while($row = mysql_fetch_assoc($sql)) {
            $temp_arr[] =$row;
        }
    }
    print(json_encode($temp_arr));
}
if(isset($_GET['find_all_test_battery'])){
    include ("../dbconnect.php");
    $temp_arr = array();
    $testbatteryname = $_POST['id'];
    if($testbatteryname!=''){
        $sql = mysql_query("SELECT * FROM wc_testbattery ORDER BY testbattery_id DESC")or die(mysql_error());
        while($row = mysql_fetch_assoc($sql)) {
            $temp_arr[] =$row;
        }
    }
    print(json_encode($temp_arr));
}
if(isset($_GET['testbattery_name_update'])){
    include ("../dbconnect.php");
    $testbattery_id = $_POST['test_battery_id'];
    $testbattery_name = $_POST['test_battery_name'];
	$check_query = "select * from wc_testbattery where testbattery_id = '".$_POST['test_battery_id']."' ";
	$row = mysql_query($check_query) or die(mysql_error());
    $data = mysql_fetch_array($row);
    if($data['testbattery_name'] == $_POST['test_battery_name'] ){
    	echo "succeed";
    }else{
    	$check_query1 = "select * from wc_testbattery where testbattery_name = '".$_POST['test_battery_name']."' ";
    	if(!mysql_num_rows(mysql_query($check_query1))){
        	$sql = mysql_query("update wc_testbattery set testbattery_name = '".$testbattery_name."' where testbattery_id = '".$testbattery_id."'");
        	echo "succeed";
    	}
		else{
			echo "exist";
		}
	}
}
if(isset($_GET['delete_test_battery_name'])){
    include ("../dbconnect.php");
    $test = new testbatteryfunction();
    $test->testbatteryid = $_POST['delete_id'];
    if($test->testbatterydeletefunction()){
      echo $_POST['delete_id'];
    }else{
      echo "error";
    }
}
if(isset($_GET['find_test_battery_category'])){
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
if(isset($_GET['find_test_battery_sports_attr'])){
    include ("../dbconnect.php");
    $test_battery_id =  $_POST['id'];
    $sql1=mysql_query("SELECT * FROM wc_testbattery_sports_attribute
                 INNER JOIN wc_sports ON wc_sports.sports_id = wc_testbattery_sports_attribute.wc_testbattery_sports_id where wc_testbattery_sports_attribute.wc_testbattery_id = '$test_battery_id'") or die(mysql_error());
    $rows1 = array();
    while($r = mysql_fetch_assoc($sql1)) {
        $row1[] = $r;
    }
    print(json_encode($row1));
}
if(isset($_GET['find_test_battery_tests'])){
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
if(isset($_GET['find_test_battery_sports'])){
    include ("../dbconnect.php");
    $test_battery_id =  $_POST['id'];
    $sql2=mysql_query("SELECT * FROM wc_testbattery where testbattery_id = '$test_battery_id'") or die(mysql_error());
    $rows2 = array();
    while($r = mysql_fetch_assoc($sql2)) {
        $row2[] = $r;
    }
    print(json_encode($row2));
}

    // To Update only testbattery name from range page
    if(isset($_GET['testbatteryname_edit'])){
      include ("../dbconnect.php");
      $testbatteryFunction = new testbatteryfunction();
      $testbatteryFunction->testbatteryid = $_POST['edit_testbattery_id'];
      $testbatteryFunction->testbatteryname = $_POST['edit_testbattery_name'];
        $testbattery = $testbatteryFunction->istestbatteryExist();
        if(!$testbattery){
          $testbatteryupdate = $testbatteryFunction->testbatterynameUpdate();
          if($testbatteryupdate){
            echo "success#Test Battery Name edited successfully!#".$_POST['edit_testbattery_id']."#".$_POST['edit_testbattery_name'];
          }else{
            echo "failure#Test Battery Name not edited successfully!";
          }
        }
        else {
          echo "failure#Test Battery Name already exists!";
        }
    }
	if(isset($_GET['check_validation'])){
	    include ("../dbconnect.php");
	    $test_battery_id =  $_POST['id'];
	    $query = mysql_query("select * from wc_createschedule where createscheduletestbattery_id = '$test_battery_id'");
		$query1 = mysql_query("select * from wc_range where rangetestbattery_id = '$test_battery_id'");
		if(!mysql_num_rows($query) && !mysql_num_rows($query1)){
			echo 'ok';
		}else{
			echo "no";
	}
	}
	if(isset($_GET['find_test_battery_category_all'])){
	    include ("../dbconnect.php");
	 
	    $sql1=mysql_query("select * from wc_testbattery_category_attribute inner join wc_categories on wc_testbattery_category_attribute.testbattery_category_id =wc_categories.categories_id group by wc_categories.categories_name order by wc_categories.categories_name asc") or die(mysql_error());
	    $rows1 = array();
	    while($r = mysql_fetch_assoc($sql1)) {
	        $row1[] = $r;
	    }
	    print(json_encode($row1));
	}
if(isset($_GET['find_test_battery_sports_attr_all'])){
	    include ("../dbconnect.php");
	    $sql1=mysql_query("select * from wc_testbattery_sports_attribute inner join wc_sports on wc_testbattery_sports_attribute.wc_testbattery_sports_id =wc_sports.sports_id group by wc_sports.sports_name order by wc_sports.sports_name") or die(mysql_error());
	    $rows1 = array();
	    while($r = mysql_fetch_assoc($sql1)) {
	        $row1[] = $r;
	    }
	    print(json_encode($row1));
}
if(isset($_GET['find_test_battery_tests_all'])){
    include ("../dbconnect.php");
    
    $sql2=mysql_query("select * from wc_testbattery_test_attribute inner join wc_test on wc_testbattery_test_attribute.testbattery_test_id =wc_test.test_id group by wc_test.test_name order by wc_test.test_name asc") or die(mysql_error());
    $rows2 = array();
    while($r = mysql_fetch_assoc($sql2)) {
        $row2[] = $r;
    }
    print(json_encode($row2));
}

 ?>
