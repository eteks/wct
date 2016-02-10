<?php
if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && !empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest')
{
  include ("../dbconnect.php");
}
else {
  include ("../dbconnect.php");
}
class testfunction{
    public $testid;
    public $testname;
    public $teststatus;
    public function testinsertfunction(){
        $check_query = "select * from wc_sports where sports_name = '".$this->sportsname."' ";
        if(!mysql_num_rows(mysql_query($check_query))){
          $sql = "insert into wc_sports (sports_name,sports_status) values ('".$this->sportsname."','1') ";
          mysql_query($sql) or die("insert:".mysql_error());
          return true;
        }else{
          return false;
        }

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
        $sql = "delete from wc_sports where sports_id ='".$this->sportsid."'";
        mysql_query($sql) or die("delete".mysql_error());
        return true;
    }
    public function testselectlastdatafunction(){
        $sql = "select * from wc_sports order by sports_id desc limit 1";
        $row = mysql_query($sql) or die(mysql_error());
        $data = mysql_fetch_array($row);
        return $data;
    }
    public function testselectfunction(){
      $temp_arr = array();
      $res = mysql_query("SELECT * FROM wc_sports") or die(mysql_error());
      $count=mysql_num_rows($res);
      while($row = mysql_fetch_array($res)) {
          $temp_arr[] =$row;
      }
      return $temp_arr;
      }
}
if(isset($_POST['test_add'])){
    print_r($_POST);
    // $sport = new testfunction();
    // $sport->sportsname = $_POST['sports_name'];
    // if($sport->sportsinsertfunction()){
    //   $last_data = $sport->sportsselectlastdatafunction();
    //   echo "<tr class='align_center delete_color'><td class='sports_id'>".$last_data['sports_id']."</td><td class='sports_name'>".$last_data['sports_name']."</td><td><span class='edit_state'>Edit</span><span class='delete_state'>Delete</span></td></tr>";
    // }else {
    //   echo "error";
    // }
}

if(isset($_POST['test_update'])){
    $sport = new testfunction();
    $sport->sportsname = $_POST['sports_name'];
    $sport->sportsid = $_POST['sports_id'];
    if($sport->sportsupdatefunction()){
      echo $_POST['sports_name'].'-'.$_POST['sports_id'];
    }else{
      echo "error";
    }
}

if(isset($_POST['test_del'])){
    $sport = new testfunction();
    $sport->sportsid = $_POST['del_id'];
    if($sport->sportsdeletefunction()){
      echo $_POST['del_id'];
    }else{
      echo "error";
    }
}
 ?>
 [test_name] => asdfsdcvb [parameter_name1] => xcvbxcv [type1] => weight [unit1] => KG [format1] => 3 [parameter_name2] => fgbcxcv [type2] => number [unit2] => NUMBER [format2] => 4 [parameter_name3] => sdfgd [type3] => time [unit3] => [test_add] => 1
