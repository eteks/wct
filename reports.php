<?php
require_once "session.php";
if(isset($_POST['submit'])){
	header('Content-Type: text/csv; charset=utf-8');
	header('Content-Disposition: attachment; filename=export.csv');
	header("Cache-Control: no-cache, no-store, must-revalidate"); // HTTP 1.1
	header("Pragma: no-cache"); // HTTP 1.0
	header("Expires: 0"); //

}else{
require_once "header.php";
}
require_once "functions/create_schedule_function.php";
$createschedule = new createscheduleFunction();

?>
<?php
	if(isset($_POST['submit'])){
		$output = fopen('php://output', 'w');
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
				foreach($test1 as $testvalue){
					fputcsv($output, array('Schedule Name',$testvalue['createschedule_name']));
					fputcsv($output, array('Test Battery name',$testvalue['testbattery_name']));
					fputcsv($output, array('Date',date("d/m/Y", strtotime($testvalue['createschedule_date']))));
					fputcsv($output, array('Time',$testvalue['createschedule_time']));
					fputcsv($output, array('Venue',$testvalue['createschedule_venue']));
					break;
				}
				foreach($test1 as $testvalue){
					$sql4 = "select wc_result.result_id,wc_result.resultcreateschedule_id,wc_result.resultathlete_id,wc_result.resulttest_name,SUM(wc_result.points) as totalpoints,GROUP_CONCAT(CONCAT(wc_result.resulttest_name,'#',wc_result.resultparameter_name,'#',wc_result.result,'#',wc_result.points)) results  from wc_result where wc_result.resultcreateschedule_id ='$id' and wc_result.resultathlete_id ='".$testvalue['athlete_id']."'";
					$res = mysql_fetch_assoc(mysql_query($sql4));
					$test = array('','','','','','','','','','','');
					$pararms = explode(",",$res['results']);
					foreach($pararms as $single_param){
						$param_split = explode("#",$single_param);
						array_push($test,$param_split[0]);
						array_push($test,'');
						//array_push($test,'');
					}
					fputcsv($output, $test);
					break;
				}	
				foreach($test1 as $testvalue){
					$sql3 = "select wc_result.result_id,wc_result.resultcreateschedule_id,wc_result.resultathlete_id,wc_result.resulttest_name,SUM(wc_result.points) as totalpoints,GROUP_CONCAT(CONCAT(wc_result.resultparameter_name,'#',wc_result.result,'#',wc_result.points)) results  from wc_result where wc_result.resultcreateschedule_id ='$id' and wc_result.resultathlete_id ='".$testvalue['athlete_id']."'";
					$res1 = mysql_fetch_assoc(mysql_query($sql3));
					$pararms = explode(",",$res1['results']);
					$heading =  array('Athlete Name','Athelete DOB','Athlete Mobile Number','Gender','State','District','Taluka','Address','Sports','Category','BIB number');
					
					foreach($pararms as $single_param){
						$param_split = explode("#",$single_param);
						//array_push($heading,'Parameter Name');
						array_push($heading,$param_split[0].' Result');
						array_push($heading,$param_split[0].' Point');
					}
					array_push($heading,'Total points');
					fputcsv($output, $heading);
					break;
				}	
						
				foreach($test1 as $testvalue){
					$sql2 = "select wc_result.result_id,wc_result.resultcreateschedule_id,wc_result.resultathlete_id,wc_result.resulttest_name,SUM(wc_result.points) as totalpoints,GROUP_CONCAT(CONCAT(wc_result.resultparameter_name,'#',wc_result.result,'#',wc_result.points)) results  from wc_result where wc_result.resultcreateschedule_id ='$id' and wc_result.resultathlete_id ='".$testvalue['athlete_id']."'";
					$res = mysql_fetch_assoc(mysql_query($sql2));
					$csv_record = array($testvalue['athlete_name'],date("d/m/Y", strtotime($testvalue['athlete_dob'])),$testvalue['athlete_mobile'],$testvalue['athlete_gender'],$testvalue['states_name'],$testvalue['district_name'],$testvalue['athlete_taluka'],$testvalue['athlete_address'],$testvalue['sports_name'],$testvalue['categories_name'],$testvalue['assignbib_number']);
					$pararms = explode(",",$res['results']);
					foreach($pararms as $single_param){
						$param_split = explode("#",$single_param);
						//array_push($csv_record,$param_split[0]);
						if(isset($param_split[1])){
							array_push($csv_record,$param_split[1]);
						}else{
							array_push($csv_record,'-');
						}
						if(isset($param_split[2])){
							array_push($csv_record,$param_split[2]);
						}else{
							array_push($csv_record,'-');
						}
					}
					array_push($csv_record,$res['totalpoints']);
					fputcsv($output, $csv_record);
					
				}
			}
			exit;
		}
	} else {
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
							<div class="align_margin">
								<label>Select Schedule</label><br>
								<div class="area_scroll">
									<?php
									   $data = $createschedule->createscheduleselectfunction();
									   foreach( $data as $eachrecord ) {
										?>
									<div class="checkbox align_check">
							      		<label class="remember_txt"><input type="checkbox"  data-validation="checkbox_group" data-validation-qty="min1" value="<?php echo $eachrecord ['createschedule_id']; ?>" name="schedul_ids[]"><?php echo $eachrecord ['createschedule_name']; ?></label>
							    	</div>
									<?php } ?>
								</div>
							</div>
							<input type="submit" class="btn btn-primary test-submit clear report_sumbit" name="submit" value="Submit">
							<input type="reset" class="btn btn-primary clear" value="Cancel">
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
