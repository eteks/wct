<?php
class assignscheduleFunction {
    public $assignscheduleid;
    public $scheduleid;
    public $categoryid;
    public $athlete_id;
    public $bibnumber;
    public $assignschedule_status;
   public function assignscheduleSelect(){
       $temp_arr = array();
       //$res = mysql_query("SELECT * from wc_assignschedule INNER JOIN wc_createschedule ON wc_assignschedule.assigncreateschedule_id=wc_createschedule.createschedule_id inner join wc_categories on wc_assignschedule.assigncategory_id = wc_categories.categories_id where wc_assignschedule.assignschedule_status='1' and wc_createschedule.createschedule_id = (select assigncreateschedule_id from wc_assignschedule where assignschedule_id = (select MAX(assignschedule_id) from wc_assignschedule)) group by wc_assignschedule.assigncreateschedule_id,wc_assignschedule.assigncategory_id ORDER BY wc_createschedule.createschedule_name ASC")or die(mysql_error());
       $res = mysql_query("SELECT * from wc_assignschedule INNER JOIN wc_createschedule ON wc_assignschedule.assigncreateschedule_id=wc_createschedule.createschedule_id inner join wc_categories on wc_assignschedule.assigncategory_id = wc_categories.categories_id where wc_assignschedule.assignschedule_status='1' group by wc_assignschedule.assigncreateschedule_id,wc_assignschedule.assigncategory_id ORDER BY wc_createschedule.createschedule_name ASC")or die(mysql_error());
       $count=mysql_num_rows($res);
       while($row = mysql_fetch_array($res)) {
           $temp_arr[] =$row;
       }
       return $temp_arr;
   }
   public function assignscheduleDelete(){
       $res = mysql_query("delete from wc_assignschedule where assigncreateschedule_id ='".$this->scheduleid."' ")or die(mysql_error());
       if($res){ return true; }
       else{ return false; }
   }
   public function assignschedulenamefunction(){
       $temp_arr = array();
      $res = mysql_query("SELECT * FROM wc_assignschedule inner join wc_createschedule on wc_assignschedule.assigncreateschedule_id = wc_createschedule.createschedule_id group by createschedule_name ORDER BY createschedule_name ASC") or die(mysql_error());
      $count=mysql_num_rows($res);
      while($row = mysql_fetch_array($res)) {
          $temp_arr[] =$row;
      }
      return $temp_arr;
   }

}

    if(isset($_GET['add_assign_schdule'])){
        include ("../dbconnect.php");
        $check_query = "select * from wc_assignschedule where assigncreateschedule_id = '".$_POST['Schedule']."' and assigncategory_id = '".$_POST['category']."'";
        if(!mysql_num_rows(mysql_query($check_query))){
            $counter = (count($_POST)-2)/2;
            for($i=1;$i<=$counter;$i++){
                $scheduleid =  $_POST['Schedule'];
                $categoryid = $_POST['category'];
                $athlete_id = $_POST["athlete_name".$i.""];
                $bib = $_POST["athlete_bib".$i.""];
                $sql = "insert into wc_assignschedule (assigncreateschedule_id,assigncategory_id,assignathlete_id,assignbib_number,assignschedule_status)values('$scheduleid','$categoryid','$athlete_id','$bib','1')";
                mysql_query($sql) or die(mysql_error());
            }
            echo 'success';
        }else {
            echo 'error';
        }
    }
    if(isset($_GET['edit_get_data'])){
        include ("../dbconnect.php");
        $scheduleid = $_POST['shdl_id'];
        $categoryid = $_POST['cate_id'];
        $sql=mysql_query("select * from wc_assignschedule INNER JOIN wc_createschedule ON wc_assignschedule.assigncreateschedule_id=wc_createschedule.createschedule_id INNER JOIN wc_categories ON wc_categories.categories_id= wc_assignschedule.assigncategory_id INNER JOIN wc_athlete ON wc_athlete.athlete_id= wc_assignschedule.assignathlete_id where wc_assignschedule.assigncreateschedule_id = '$scheduleid'and wc_assignschedule.assigncategory_id ='$categoryid' ");
        $row = array();
        while($r = mysql_fetch_assoc($sql)) {
            $row[] = $r;
        }
        print(json_encode($row));
    }
    if(isset($_POST['assing_schedule_update'])){
        include ("../dbconnect.php");
        //print_r($_POST);
        

        mysql_query("delete from wc_assignschedule where assigncreateschedule_id ='".$_POST["create_schedule_update_id"]."' and assigncategory_id ='".$_POST['category']."' ");
 		if(!empty($_POST["athlete_name"])){
 			$counter = count($_POST['athlete_name']);
 			for($i=0;$i<$counter;$i++){
            //echo $i;
            $category_id = $_POST['category'];
            //$assign_schedule_id = $_POST["assing_schedule_update_id".$i.""];
            $create_schedule_update_id = $_POST["create_schedule_update_id"];
            $athlete_id = $_POST["athlete_name"][$i];
            $athlete_bib = $_POST["athlete_bib"][$i];
            $sql = "insert into wc_assignschedule (assigncreateschedule_id,assigncategory_id,assignathlete_id,assignbib_number,assignschedule_status)values('$create_schedule_update_id','$category_id','$athlete_id','$athlete_bib','1')";
            //$sql = "update wc_assignschedule set assigncategory_id='$category_id',assignathlete_id='$athlete_id',assignbib_number='$athlete_bib' where assignschedule_id='$assign_schedule_id'";
            mysql_query($sql) or die(mysql_error());
        }
          
 		}
        header('Location:../assign_schedule.php?update_success=true');
    }
    if(isset($_GET['deletedata'])){
        include ("../dbconnect.php");
        $assign = new assignscheduleFunction();
        $assign->scheduleid = $_POST['delete_id'];
		$assign->categoryid = $_POST['del_cate'];
        if($assign->assignscheduleDelete()){
          echo $_POST['delete_id'];
        }else{
          echo "error";
        }
    }
    if(isset($_GET['cate_list_edit'])){
        include ("../dbconnect.php");
        $id = $_POST['id'];
        $query = mysql_query("select * from wc_createschedule inner join wc_range on wc_createschedule.createscheduletestbattery_id = wc_range.rangetestbattery_id inner join wc_categories on wc_categories.categories_id = wc_range.rangecategories_id where wc_createschedule.createschedule_id = '$id' group by wc_categories.categories_name ");
        while($row = mysql_fetch_array($query)){
            if($_POST['assign_id'] == $row['categories_id']){
                echo "<option value=".$row['categories_id']." selected>".$row['categories_name']."</option>";
            }
            else{
                echo "<option value=".$row['categories_id'].">".$row['categories_name']."</option>";
            }

        }
    }
    if(isset($_GET['cate_list'])){
        include ("../dbconnect.php");
        $id = $_POST['id'];
        $query = mysql_query("select * from wc_createschedule inner join wc_range on wc_createschedule.createscheduletestbattery_id = wc_range.rangetestbattery_id inner join wc_categories on wc_categories.categories_id = wc_range.rangecategories_id where wc_createschedule.createschedule_id = '$id' group by wc_categories.categories_name order by wc_categories.categories_name asc");
        while($row = mysql_fetch_array($query)){

                echo "<option value=".$row['categories_id'].">".$row['categories_name']."</option>";


        }
    }
	if(isset($_GET['find_create_schedule'])){
	    include ("../dbconnect.php");
	    $temp_arr = array();
	    $assignname = $_POST['id'];
	    if($assignname!=''){
	        $sql = mysql_query("SELECT * FROM wc_assignschedule inner join wc_createschedule on wc_assignschedule.assigncreateschedule_id = wc_createschedule.createschedule_id  where  wc_createschedule.createschedule_name like '".$assignname."%' group by wc_createschedule.createschedule_name ORDER BY wc_createschedule.createschedule_name ASC")or die(mysql_error());
	        while($row = mysql_fetch_assoc($sql)) {
	            $temp_arr[] =$row;
	        }
	    }
	    print(json_encode($temp_arr));
	
	}
	if(isset($_GET['find_all_create_schedule'])){
	    include ("../dbconnect.php");
	    $temp_arr = array();
	    $testbatteryname = $_POST['id'];
	    if($testbatteryname!=''){
	        $sql = mysql_query("SELECT * FROM wc_assignschedule inner join wc_createschedule on wc_assignschedule.assigncreateschedule_id = wc_createschedule.createschedule_id group by createschedule_name ORDER BY createschedule_name ASC")or die(mysql_error());
	        while($row = mysql_fetch_assoc($sql)) {
	            $temp_arr[] =$row;
	        }
	    }
	    print(json_encode($temp_arr));
	}
	if(isset($_GET['delete_assign_create_schedule'])){
	    include ("../dbconnect.php");
	     $assign = new assignscheduleFunction();
	     $assign->scheduleid = $_POST['delete_id'];
	    if($assign->assignscheduleDelete()){
	      echo $_POST['delete_id'];
	    }else{
	      echo "error";
	    }
	}
	if(isset($_GET['delete_assign_create_schedule_and_cate'])){
	    include ("../dbconnect.php");
	    $category_id = $_POST['cate_id'];
		$sche_id = $_POST['sche_id'];
		$res = mysql_query("delete from wc_assignschedule where assigncreateschedule_id ='$sche_id' and assigncategory_id = '$category_id'  ")or die(mysql_error());
       	if($res){ echo $sche_id; }
       	else{ echo "error";}
	}
	
	if(isset($_GET['append_schedules'])){
        include ("../dbconnect.php");
        $temp_arr = array();
		$assign_arr = array();
        $athelete_arr = array();
        $category_arr = array();
        $schedule_id = $_POST['id'];
        if($schedule_id!=''){
            $sql = mysql_query("SELECT * from wc_assignschedule INNER JOIN wc_createschedule ON wc_assignschedule.assigncreateschedule_id=wc_createschedule.createschedule_id inner join wc_categories on wc_assignschedule.assigncategory_id = wc_categories.categories_id where wc_assignschedule.assignschedule_status='1' and wc_createschedule.createschedule_id = '$schedule_id' group by wc_assignschedule.assigncreateschedule_id,wc_assignschedule.assigncategory_id ORDER BY wc_createschedule.createschedule_name ASC")or die(mysql_error());
            while($row = mysql_fetch_assoc($sql)) {
                $assign_arr[] =$row;
            }
            $sql1 = mysql_query("select * from wc_categories")or die(mysql_error());
            while($row1 = mysql_fetch_assoc($sql1)) {
                $category_arr[] =$row1;
            }
			 $sql2 = mysql_query("select * from wc_athlete")or die(mysql_error());
            while($row2 = mysql_fetch_assoc($sql2)) {
                $athelete_arr[] =$row2;
            }
        }
        $temp_arr['assign'] = $assign_arr;
        $temp_arr['cate'] = $category_arr;
        $temp_arr['athe'] = $athelete_arr;
        print(json_encode($temp_arr));
    }
 ?>
