<?php

if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && !empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest')
{
  include ("../dbconnect.php");
}
else {
    include ("dbconnect.php");
}
class sportsfunction{
    public $sportsid;
    public $sportsname;
    public $sportsstatus;
    public function sportsinsertfunction(){
        $sql = "insert into wc_sports (sports_name,sports_status) values ('".$this->sportsname."','1') ";
        mysql_query($sql) or die("insert:".mysql_error());
    }
    public function sportsupdatefunction(){
        $sql = "update wc_sports set sports_name='".$this->sportsname."',sports_status='1' where sports_id ='".$this->sportsid."' ";
        mysql_query($sql) or die("update:".mysql_error());
    }
    public function sportsdeletefunction(){
        $sql = "delete from wc_sports where sports_id ='".$this->sportsid."' ";
        mysql_query($sql) or die("delete".mysql_error());
    }
    public function sportsselectlastdatafunction(){
        $sql = "select * from wc_sports order by sports_id desc limit 1";
        $row = mysql_query($sql) or die(mysql_error());
        $data = mysql_fetch_array($row);
        return $data;
    }

}
if($_POST){
    $sport = new sportsfunction();
    $sport->sportsname = $_POST['sports_name'];
    $sport->sportsinsertfunction();
    $last_data = $sport->sportsselectlastdatafunction();
    echo "<tr class='align_center'><td>".$last_data['sports_id']."</td><td>".$last_data['sports_name']."</td><td>Edit <span class='align_left1'>Delete</span></td></tr>";
}
 ?>
