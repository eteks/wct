<?php

if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && !empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest')
{
    //include ("../dbconnect.php");
    include ("../common.php");
}
// include ("../dbconnect.php");
// include ("../common.php");
class sportsfunction{
    public $sportsid;
    public $sportsname;
    public $sportsstatus;
    public function sportsinsertfunction(){
        $check_query = "select * from wc_sports where sports_name = '".$this->sportsname."' ";
        if(!mysql_num_rows(mysql_query($check_query))){
          $sql = "insert into wc_sports (sports_name,sports_status) values ('".$this->sportsname."','1') ";
          mysql_query($sql) or die("insert:".mysql_error());
          return true;
        }else{
          return false;
        }

    }
    public function sportsupdatefunction(){
        $check_query = "select * from wc_sports where sports_name = '".$this->sportsname."' ";
        if(!mysql_num_rows(mysql_query($check_query))){
            $sql = "update wc_sports set sports_name='".$this->sportsname."',sports_status='1' where sports_id ='".$this->sportsid."' ";
            mysql_query($sql) or die("update:".mysql_error());
            return true;
          }else{
            return false;
          }
    }
    public function sportsdeletefunction(){
        $sql = "delete from wc_sports where sports_id ='".$this->sportsid."' ";
        mysql_query($sql) or die("delete".mysql_error());
        return true;
    }
    public function sportsselectlastdatafunction(){
        $sql = "select * from wc_sports order by sports_id desc limit 1";
        $row = mysql_query($sql) or die(mysql_error());
        $data = mysql_fetch_array($row);
        return $data;
    }
    public function sportsselectfunction(){
      $temp_arr = array();
      $res = mysql_query("SELECT * FROM wc_sports ORDER BY sports_name DESC") or die(mysql_error());
      $count=mysql_num_rows($res);
      while($row = mysql_fetch_array($res)) {
          $temp_arr[] =$row;
      }
      return $temp_arr;
      }
    //added by kalai
    public function sportsSelect(){
      $res = mysql_query("SELECT * FROM wc_sports where sports_status='1'")or die(mysql_error());
      return $res;
    }

}
if(isset($_POST['sports_add'])){
    $sport = new sportsfunction();
    $sport->sportsname = $_POST['sports_name'];
    if($sport->sportsinsertfunction()){
      $last_data = $sport->sportsselectlastdatafunction();
      echo "<tr class='align_center delete_color'><td class='sports_id'>".$last_data['sports_id']."</td><td class='sports_name'>".$last_data['sports_name']."</td><td><span class='edit_state'>Edit</span><span class='delete_state'>Delete</span></td></tr>";
    }else {
      echo "error";
    }

}
if(isset($_POST['sportd_update'])){
    $sport = new sportsfunction();
    $sport->sportsname = $_POST['sports_name'];
    $sport->sportsid = $_POST['sports_id'];
    if($sport->sportsupdatefunction()){
      echo $_POST['sports_name'].'-'.$_POST['sports_id'];
    }else{
      echo "error";
    }

}
if(isset($_POST['sports_del'])){
    $sport = new sportsfunction();
    $sport->sportsid = $_POST['del_id'];
    if($sport->sportsdeletefunction()){
      echo $_POST['del_id'];
    }else{
      echo "error";
    }

}
 ?>
