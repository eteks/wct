<?php
require_once "session.php";
if(isset($_POST['submit'])){
	$name = '';
	foreach($_POST['schedule_name'] as $check1) {
		$name .= $check1.'_';
	}
	$full_name = 'Result for '.$name.date('d/m/Y H:i:s').'.xls';
	header("Content-type: application/octet-stream;charset=utf-8'");
	header('Content-Disposition: attachment; filename="'.$full_name.'"');
	header("Pragma: no-cache");
	header ("Expires: 0");
}else{
	require_once "header.php";
}
require_once "functions/create_schedule_function.php";
$createschedule = new createscheduleFunction();

?>
<?php
	if(isset($_POST['submit'])){
		if(!empty($_POST['schedul_ids'])) {
			foreach($_POST['schedul_ids'] as $check) {
				$id = $check;
				$i=1;
				$sql1 = "select * from wc_athlete inner join wc_assignschedule on wc_assignschedule.assignathlete_id= wc_athlete.athlete_id inner join wc_categories on wc_categories.categories_id = wc_assignschedule.assigncategory_id inner join wc_createschedule on wc_createschedule.createschedule_id = wc_assignschedule.assigncreateschedule_id inner join wc_states on wc_states.states_id = wc_athlete.athletestates_id inner join wc_district on wc_district.district_id = wc_athlete.athletedistrict_id inner join wc_sports on wc_sports.sports_id = wc_athlete.athletesports_id inner join wc_testbattery on wc_testbattery.testbattery_id = wc_createschedule.createscheduletestbattery_id where wc_assignschedule.assigncreateschedule_id = '$id'";
				$test = mysql_query($sql1);
				$test1 = array();
				while($row = mysql_fetch_assoc($test)){
					$test1[] = $row;
				}
				?>
				<style type="text/css" media="screen">
					.te{
  				mso-number-format:"\@";/*force text*/
			}
				</style>
				<table width="100%" border="1">
					<?php
						foreach($test1 as $testvalue){
					?>
						<tr>
							<td>Schedule Name</td><td align="center"><?php echo $testvalue['createschedule_name'];?></td>
						</tr>
						<tr>
							<td>Test Battery name</td><td align="center"><?php echo $testvalue['testbattery_name'];?></td>
						</tr>
						<tr>
							<td>Date</td><td align="center"><?php echo date("d/m/Y", strtotime($testvalue['createschedule_date']));?></td>
						</tr>
						<tr>
							<td>Time</td><td align="center"><?php echo $testvalue['createschedule_time'];?></td>
						</tr>
						<tr>
							<td>Venue</td><td align="center"><?php echo $testvalue['createschedule_venue'];?></td>
						</tr>
				
					<?php	
						break;
					}
					foreach($test1 as $testvalue){
						$sql4 = "select wc_result.result_id,wc_result.resultcreateschedule_id,wc_result.resultathlete_id,wc_result.resulttest_name,SUM(wc_result.points) as totalpoints,GROUP_CONCAT(CONCAT(wc_result.resulttest_name,'#',wc_result.resultparameter_name,'#',wc_result.resultparameter_unit,'#',wc_result.resultparameter_format,'#',wc_result.result,'#',wc_result.points)) results  from wc_result where wc_result.resultcreateschedule_id ='$id' and wc_result.resultathlete_id ='".$testvalue['athlete_id']."'";
						$res = mysql_fetch_assoc(mysql_query($sql4));
					?>
						<tr>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
					<?php
						$pararms = explode(",",$res['results']);
						$temp = '';
						$check = '';
						$merge_count = array();
						$merge_data = array();
						array_push($merge_count,'0');
						array_push($merge_data,'0');
						foreach($pararms as $single_param){
							$param_split = explode("#",$single_param);
							if($temp == $param_split[0]){
								$last_value = end($merge_count);
								$increment = $last_value+2;
								array_pop($merge_count);
								array_push($merge_count,$increment);
								$temp = $param_split[0];
							}else{
								array_push($merge_count,'2');
								array_push($merge_data,$param_split[0]);
								$temp = $param_split[0];
							}
						}
						for($m=1;$m<count($merge_data);$m++){
					?>
							<td colspan="<?php echo $merge_count[$m];?>" align="center"><?php echo $merge_data[$m];?></td>
					<?php
						}
					?>
						</tr>
						<tr>
					<?php
						break;
					}	
					foreach($test1 as $testvalue){
						$sql3 = "select wc_result.result_id,wc_result.resultcreateschedule_id,wc_result.resultathlete_id,wc_result.resulttest_name,SUM(wc_result.points) as totalpoints,GROUP_CONCAT(CONCAT(wc_result.resulttest_name,'#',wc_result.resultparameter_name,'#',wc_result.resultparameter_unit,'#',wc_result.resultparameter_format,'#',wc_result.result,'#',wc_result.points)) results  from wc_result where wc_result.resultcreateschedule_id ='$id' and wc_result.resultathlete_id ='".$testvalue['athlete_id']."'";
						$res1 = mysql_fetch_assoc(mysql_query($sql3));
						$pararms = explode(",",$res1['results']);
					?>
							<td align="center">Athlete Name</td><td align="center">Athelete DOB</td><td align="center">Athlete Mobile Number</td><td align="center">Gender</td><td align="center">State</td><td align="center">District</td><td align="center">Taluka</td><td align="center">Address</td><td align="center">Sports</td><td align="center">Category</td><td align="center">BIB number</td>
					<?php
						foreach($pararms as $single_param){
							$param_split = explode("#",$single_param);
							
					?>
							<td align="center"><?php echo 'Result For '.$param_split[1].'(Unit:'.$param_split[2].'; Format:'.$param_split[3].' decimal places)';?></td><td align="center"><?php echo 'Points For '.$param_split[1];?></td>
					<?php	
						}
					?>
							<td align="center">Total points</td>
				
					<?php
						break;
					}	
					?>
						</tr>
				
					<?php		
					foreach($test1 as $testvalue){
						$sql2 = "select wc_result.result_id,wc_result.resultcreateschedule_id,wc_result.resultathlete_id,wc_result.resulttest_name,SUM(wc_result.points) as totalpoints,GROUP_CONCAT(CONCAT(wc_result.resultparameter_name,'#',wc_result.result,'#',wc_result.points)) results  from wc_result where wc_result.resultcreateschedule_id ='$id' and wc_result.resultathlete_id ='".$testvalue['athlete_id']."'";
						$res = mysql_fetch_assoc(mysql_query($sql2));
					?>
						<tr>
							<td align="center"><?php echo $testvalue['athlete_name']; ?></td>
							<td align="center"><?php echo date("d/m/Y", strtotime($testvalue['athlete_dob']));?></td>
							<td align="center"><?php echo $testvalue['athlete_mobile']; ?></td>
							<td align="center"><?php echo $testvalue['athlete_gender']; ?></td>
							<td align="center"><?php echo $testvalue['states_name']; ?></td>
							<td align="center"><?php echo $testvalue['district_name']; ?></td>
							<td align="center"><?php echo $testvalue['athlete_taluka']; ?></td>
							<td align="center"><?php echo $testvalue['athlete_address']; ?></td>
							<td align="center"><?php echo $testvalue['sports_name']; ?></td>
							<td align="center"><?php echo $testvalue['categories_name']; ?></td>
							<td align="center"><?php echo $testvalue['assignbib_number']; ?></td>
					<?php
						
						$pararms = explode(",",$res['results']);
						foreach($pararms as $single_param){
							$param_split = explode("#",$single_param);
							if($param_split[1] == '-'){
					?>
								<td align="center">A</td>
								<td align="center">A</td>
					<?php
								
							}else if($param_split[1] == '0'){
					?>
								<td align="center">DNF</td>
								<td align="center">DNF</td>
					<?php
							}else if($param_split[1] == ''){
					?>
								<td align="center">-</td>
								<td align="center">-</td>
					<?php
							}else{
					?>
								<td align="center" class="te"><?php echo '&#8232;'.$param_split[1].'&#8232;';?></td> <!-- &#8232; ===> hidden character -->
								<td align="center" class="te"><?php echo '&#8232;'.$param_split[2].'&#8232;';?></td> <!-- &#8232; ===> hidden character -->
					<?php
							}
						}
					?>
							<td align="center"><?php echo $res['totalpoints']; ?></td>

						</tr>
		
					<?php
					}
					?>
					</table>
					<?php
				}
				exit;
			}
		} 
		else {
		?>
		<style type="text/css">
			.footer_txt{
				position: absolute !important;
			}
			
		</style>
		<div class="container">
			<div class="container left_align_testbattery align_height">
				<span class="sports">REPORTS</span>
			</div><!--end container-->
			<div class="container">
				<div class="col-xs-12 col-md-10">
				<!--	<div class="col-md-4 hidden-xs"></div> -->
					<div class="col-xs-12 col-md-7 align_margin">
						<form id="report_form" name="report_form" action="reports.php" method="post">
							<div class="align_margin form-group">
								<label>Select Schedule</label><br>
								<div class="area_scroll">
									<?php
									   $data = $createschedule->createscheduleselectreportfunction();
									   $length = count($data);
									   foreach( $data as $eachrecord ) {
									?>
									<div class="checkbox align_check">
							      		<label class="remember_txt"><input class="report_checkbox" type="checkbox"  data-validation="checkbox_group" data-validation-qty="min1" value="<?php echo $eachrecord ['createschedule_id']; ?>" name="schedul_ids[]"><?php echo $eachrecord ['createschedule_name']; ?></label>
							      		<input type="checkbox" class="report_checkbox_name hided" name="schedule_name[]" value="<?php echo $eachrecord ['createschedule_name']; ?>"/>
							    	</div>
									<?php } ?>
								</div>
							</div>
							<input type="submit" class="btn btn-primary test-submit clear report_sumbit" name="submit" value="Save" <?php if($length == 0){ echo 'disabled'; }?>>
							<input type="reset" class="btn btn-primary clear" value="Cancel" <?php if($length == 0){ echo 'disabled'; }?>>
						</form>
					</div>
				</div>
			</div><!-- end  container-->
		</div><!-- end  container-->
<?php
}
?>
<?php
require_once "footer.php" ?>
