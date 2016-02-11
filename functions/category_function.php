<?php
if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && !empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest')
{
  include ("../dbconnect.php");
}
class categoryfunction{
    public $categoryid;
    public $categoryname;
    public $categorystatus;
    public function categoryinsertfunction(){
        $check_query = "select * from wc_categories where categories_name = '".$this->categoryname."' ";
        if(!mysql_num_rows(mysql_query($check_query))){
          $sql = "insert into wc_categories (categories_name,categories_status) values ('".$this->categoryname."','1') ";
          mysql_query($sql) or die("insert:".mysql_error());
          return true;
        }else{
          return false;
        }

    }
    public function categoryupdatefunction(){
        $check_query = "select * from wc_categories where categories_name = '".$this->categoryname."' ";
        if(!mysql_num_rows(mysql_query($check_query))){
            $sql = "update wc_categories set categories_name='".$this->categoryname."',categories_status='1' where categories_id ='".$this->categoryid."' ";
            mysql_query($sql) or die("update:".mysql_error());
            return true;
          }else{
            return false;
          }
    }
    public function categorydeletefunction(){
        $sql = "delete from wc_categories where categories_id ='".$this->categoryid."' ";
        mysql_query($sql) or die("delete".mysql_error());
        return true;
    }
    public function categoryselectlastdatafunction(){
        $sql = "select * from wc_categories order by categories_id desc limit 1";
        $row = mysql_query($sql) or die(mysql_error());
        $data = mysql_fetch_array($row);
        return $data;
    }
    public function categoryselectfunction(){
      $temp_arr = array();
      $res = mysql_query("SELECT * FROM wc_categories") or die(mysql_error());
      $count=mysql_num_rows($res);
      while($row = mysql_fetch_array($res)) {
          $temp_arr[] =$row;
      }
      return $temp_arr;
      }

}
if(isset($_POST['category_add'])){
    $sport = new categoryfunction();
    $sport->categoryname = $_POST['category_name'];
    if($sport->categoryinsertfunction()){
      $last_data = $sport->categoryselectlastdatafunction();
      echo "<tr class='align_center delete_color'><td class='category_id'>".$last_data['categories_id']."</td><td class='category_name'>".$last_data['categories_name']."</td><td><span class='edit_state'>Edit</span><span class='delete_state'>Delete</span></td></tr>";
    }else {
      echo "error";
    }

}
if(isset($_POST['category_update'])){
    $sport = new categoryfunction();
    $sport->categoryname = $_POST['category_name'];
    $sport->categoryid = $_POST['category_id'];
    if($sport->categoryupdatefunction()){
      echo $_POST['category_name'].'-'.$_POST['category_id'];
    }else{
      echo "error";
    }

}
if(isset($_POST['category_del'])){
    $sport = new categoryfunction();
    $sport->categoryid = $_POST['del_id'];
    if($sport->categorydeletefunction()){
      echo $_POST['del_id'];
    }else{
      echo "error";
    }

}
 ?>
