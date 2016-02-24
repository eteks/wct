<?php
include($_SERVER["DOCUMENT_ROOT"] . "/wct/common.php");
class parameterunitFunction {
    public $parametertypeid;
    public $parameterunitname;
    public $parameterunitid;
    public function parametertypeSelect(){
        $temp_arr = array();
        $res = mysql_query("select * from wc_parametertype where parametertype_status ='1'")or die(mysql_error());
        while($row = mysql_fetch_array($res)) {
            $temp_arr[] =$row;
        }
        return $temp_arr;
    }
    public function parameterunitSelect(){
        $temp_arr = array();
        $res = mysql_query("select * from wc_parameterunit inner join wc_parametertype on wc_parameterunit.parametertype_id=wc_parametertype.parametertype_id  where parametertype_status ='1' ORDER BY parameterunit_id DESC")or die(mysql_error());
        while($row = mysql_fetch_array($res)) {
            $temp_arr[] =$row;
        }
        return $temp_arr;
    }
    public function parameterunitSelectsingle(){
        $res = mysql_query("select * from wc_parameterunit inner join wc_parametertype on wc_parameterunit.parametertype_id=wc_parametertype.parametertype_id  where parametertype_status ='1' and wc_parameterunit.parameterunit_id = '".$this->parameterunitid."' ")or die(mysql_error());
        $row = mysql_fetch_assoc($res);
        return $row;
    }
    public function parameterunitinsertfunction(){
        $sql = "insert into wc_parameterunit (parametertype_id,parameterunit,parameterunit_status) values ('".$this->parametertypeid."','".$this->parameterunitname."','1')";
        mysql_query($sql) or die("delete".mysql_error());
        return true;
    }
    public function parameterdeletefunction(){
        $sql = "delete from wc_parameterunit where parameterunit_id ='".$this->parameterunitid."'";
        mysql_query($sql) or die("delete".mysql_error());
        return true;
    }
    public function parameterupdatefunction(){
        $sql = "update wc_parameterunit set parametertype_id = '".$this->parametertypeid."',parameterunit='".$this->parameterunitname."' where parameterunit_id ='".$this->parameterunitid."'";
        mysql_query($sql) or die("delete".mysql_error());
        return true;
    }
}
if(isset($_GET['adddata'])){
    $parametertype_id= $_POST['parametertype'];
    $parameterunit = $_POST['parameterunit'];
    $parameterunitadd = new parameterunitFunction();
    $parameterunitadd->parametertypeid = $parametertype_id;
    $parameterunitadd->parameterunitname = $parameterunit;
    if($parameterunitadd->parameterunitinsertfunction()){
        echo 'success';
    }else{
        echo "error";
    }
}
if(isset($_GET['deletedata'])){
    $parameterunitdel = new parameterunitFunction();
    $parameterunitdel->parameterunitid = $_POST['delete_id'];
    if($parameterunitdel->parameterdeletefunction()){
      echo $_POST['delete_id'];
    }else{
      echo "error";
    }
}
if(isset($_GET['getunitdata'])){
    $parameteruniteditget = new parameterunitFunction();
    $parameteruniteditget->parameterunitid = $_POST['id'];
    $output = $parameteruniteditget->parameterunitSelectsingle();
    print(json_encode($output));
}
if(isset($_GET['updateunitdata'])){
    $parameterunitupdate = new parameterunitFunction();
    $parameterunitupdate->parameterunitid = $_POST['edit_param_unit_id'];
    $parameterunitupdate->parametertypeid = $_POST['parameter_type'];
    $parameterunitupdate->parameterunitname = $_POST['parameter_unit'];
    if($parameterunitupdate->parameterupdatefunction()){
        echo "success";
    }else{
        echo "error";
    }
}
?>
