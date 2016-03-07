<html>
<body>
<?php
include('dbconnect.php');
//$sql="select * from wc_result inner join wc_createschedule on wc_result.resultcreateschedule_id = wc_createschedule.createschedule_id inner join wc_testbattery_test_attribute on wc_createschedule.createscheduletestbattery_id =wc_testbattery_test_attribute.testbattery_id inner join wc_test on wc_test.test_id = wc_testbattery_test_attribute.testbattery_test_id where wc_result.resultcreateschedule_id = '2' group by wc_result.resulttest_name";
$sql = "select wc_result.result_id,wc_result.resultcreateschedule_id,wc_result.resultathlete_id,wc_result.resulttest_name,GROUP_CONCAT(CONCAT(wc_result.resultparameter_name,'#',wc_result.result,'#',wc_result.points)) results  from wc_result join wc_athlete on wc_athlete.athlete_id =wc_result.resultathlete_id where wc_result.resultcreateschedule_id ='34' ";
$res = mysql_query($sql);
$row = mysql_fetch_assoc($res);
//while($row = mysql_fetch_array($res)){
$sql1 = "select * from wc_athlete  where athlete_id ='".$row['resultathlete_id']."'";
$athelete = mysql_fetch_assoc(mysql_query($sql1));
$result = $row;
print_r($athelete);
print_r($result);
//}
?>
</body>
</html>
